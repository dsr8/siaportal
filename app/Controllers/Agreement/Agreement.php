<?php namespace App\Controllers\Agreement;

use App\Controllers\BaseController;
use App\Models\Agreement\Agreement_model;
use App\Models\Agreement\Agreement_milestone_model;
use App\Models\Agreement\Agreement_additional_fee_model;
use App\Models\Agreement\Agreement_template_model;
use App\Models\Client_application_model;
use App\Models\Prospect_model;
use App\Models\Type_client_model;
use App\Models\Category_model;
use App\Libraries\Agreement\AgreementClauses;
use App\Libraries\Agreement\AgreementHtmlPdfBuilder;
use App\Libraries\Agreement\AgreementPdfBuilder;

class Agreement extends BaseController
{
    private const CONSULTANT_NAME = 'Manpreet Joshi';
    private const RCIC_NUMBER     = 'R515734';

    // Secret token for the cPanel curl-triggered cron (see cron_send_reminders()) — same
    // pattern as AppointAdmin::auto_reminder()'s SIA_REMIND_CRON, just a distinct token so the
    // two cron entries can't be swapped/confused in the cPanel cron list.
    private const REMINDER_CRON_TOKEN = 'SIA_AGREEMENT_REMINDER_CRON';

    // Rapid repeat clicks of "Send for eSign" within this window are treated as the same
    // click (double-click, slow network double-submit) and silently no-op instead of
    // re-emailing the client a second time.
    private const RESEND_DEBOUNCE_SECONDS = 10;

    private function isAuthorized(): bool
    {
        return session()->get('isLoggedIn') == true;
    }

    // Shared cc+number phone composition, used by both the draft-creation flow and the client search.
    private function composePhone(array $prospect): string
    {
        $number = ($prospect['number'] !== null && $prospect['number'] !== '')
            ? $prospect['number']
            : ($prospect['alt_mobile_no'] ?? '');
        $cc = trim((string) ($prospect['cc'] ?? ''));
        return trim((!empty($cc) ? '+' . ltrim($cc, '+') . ' ' : '') . $number);
    }

    // Shared address+city composition, used by the draft-creation flow (see composePhone() above).
    private function composeAddress(array $prospect): string
    {
        $address = trim((string) ($prospect['address'] ?? ''));
        $city    = trim((string) ($prospect['city'] ?? ''));
        return trim($address . (($address !== '' && $city !== '') ? ', ' : '') . $city);
    }

    public function dashboard()
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }

        $get = $this->request->getGet();
        $filters = [
            'q'             => trim((string) ($get['q'] ?? '')) ?: null,
            'date_from'     => trim((string) ($get['date_from'] ?? '')) ?: null,
            'date_to'       => trim((string) ($get['date_to'] ?? '')) ?: null,
            'type_id'       => (int) ($get['type_id'] ?? 0) ?: null,
            'status_bucket' => trim((string) ($get['status'] ?? '')) ?: null,
            'archived'      => !empty($get['archived']) ? 1 : null,
        ];

        $perPage = (int) ($get['per_page'] ?? 10);
        $perPage = in_array($perPage, [10, 25, 50], true) ? $perPage : 10;

        $AgreementModel = new Agreement_model();
        $counts = $AgreementModel->getDashboardCounts();
        $archivedCount = $AgreementModel->getArchivedCount();
        $total  = $AgreementModel->getDashboardTotal($filters);
        $totalPages = max(1, (int) ceil($total / $perPage));
        $page = max(1, min($totalPages, (int) ($get['page'] ?? 1)));
        $rows = $AgreementModel->getDashboardList($filters, $page, $perPage);

        $TypeClient = new Type_client_model();

        return view('agreement/dashboard', [
            'counts'        => $counts,
            'archivedCount' => $archivedCount,
            'rows'          => $rows,
            'typeOptions'   => $TypeClient->getpost(),
            'filters'       => $filters,
            'page'          => $page,
            'perPage'       => $perPage,
            'total'         => $total,
            'totalPages'    => $totalPages,
        ]);
    }

    // Soft-hide: removes the agreement from the active dashboard without deleting it — it
    // stays in the database and stays reachable via the "View Archived" list. Available
    // regardless of status (unlike editing, archiving isn't a change to the document itself).
    public function archive($id = null)
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url());
        }

        $id = (int) $id;
        $AgreementModel = new Agreement_model();
        $agreement = $AgreementModel->find($id);
        if (!$agreement) {
            return redirect()->to(base_url('agreement/Agreement/dashboard'))->with('error', 'Agreement not found.');
        }

        $AgreementModel->update($id, ['hide' => 1]);

        return redirect()->to(base_url('agreement/Agreement/dashboard'))->with('message', 'Agreement archived.');
    }

    public function restore($id = null)
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url());
        }

        $id = (int) $id;
        $AgreementModel = new Agreement_model();
        $agreement = $AgreementModel->find($id);
        if (!$agreement) {
            return redirect()->to(base_url('agreement/Agreement/dashboard?archived=1'))->with('error', 'Agreement not found.');
        }

        $AgreementModel->update($id, ['hide' => 0]);

        return redirect()->to(base_url('agreement/Agreement/dashboard?archived=1'))->with('message', 'Agreement restored.');
    }

    // Team/Admin-side cancellation: Sent, Viewed, and Signed documents can all be cancelled
    // (a Draft was never sent — nothing to cancel, archive it instead; Declined/Cancelled are
    // already terminal). The row, its signed PDF (if any), and its full history stay in the
    // CRM untouched — only status/cancelled_at/cancel_reason change — and every edit/sign
    // entry point (save/generate_link/edit_clauses/save_clauses/Sign::*) already rejects
    // anything outside its own allow-list, so a cancelled row is automatically locked there too.
    public function cancel($id = null)
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url());
        }

        $id = (int) $id;
        $AgreementModel = new Agreement_model();
        $agreement = $AgreementModel->find($id);
        if (!$agreement || (int) $agreement['hide'] === 1) {
            return redirect()->to(base_url('agreement/Agreement/dashboard'))->with('error', 'Agreement not found.');
        }
        if (!in_array($agreement['status'], Agreement_model::CANCELLABLE_STATUSES, true)) {
            return redirect()->to(base_url('agreement/Agreement/dashboard'))->with('error', 'Only a Sent, Viewed, or Signed agreement can be cancelled.');
        }

        $wasSigned = $agreement['status'] === 'signed';
        $reason = trim((string) $this->request->getPost('reason'));

        $AgreementModel->update($id, [
            'status'        => 'cancelled',
            'cancelled_at'  => date('Y-m-d H:i:s'),
            'cancel_reason' => $reason !== '' ? $reason : null,
            'cancelled_by'  => session()->get('id'),
        ]);

        $agreement = array_merge($agreement, [
            'status'        => 'cancelled',
            'cancel_reason' => $reason,
        ]);

        helper('agreement_email_helper');
        sia_send_agreement_cancelled_email($agreement, $wasSigned);

        return redirect()->to(base_url('agreement/Agreement/dashboard'))->with('message', 'Agreement cancelled.');
    }

    public function search_clients()
    {
        if (!$this->isAuthorized()) {
            return $this->response->setJSON(['results' => []]);
        }

        $q = trim($this->request->getGet('q') ?? '');
        $Prospect = new Prospect_model();
        $rows = $Prospect->searchActiveClients($q);

        $results = [];
        foreach ($rows as $r) {
            $results[] = [
                'id'    => $r['id'],
                'text'  => $r['heading'] . ' (' . $r['id'] . ')',
                'name'  => $r['heading'],
                'email' => $r['email'] ?? '',
                'phone' => $this->composePhone($r),
            ];
        }

        return $this->response->setJSON(['results' => $results]);
    }

    public function applications_for_client($prospectId = null)
    {
        if (!$this->isAuthorized()) {
            return $this->response->setJSON(['results' => []]);
        }

        $ApplicationModel = new Client_application_model();
        $rows = $ApplicationModel->getclient((int) $prospectId);

        $results = [];
        foreach ($rows as $r) {
            $results[] = [
                'id'     => $r['id'],
                'text'   => trim(($r['ct'] ?? 'Uncategorized') . ' — ' . ($r['ty'] ?? '')),
                'status' => $r['st'] ?? '',
            ];
        }

        return $this->response->setJSON(['results' => $results]);
    }

    // Category/Type dropdowns for the "Create New Agreement" modal's quick-add-application
    // form (shown when a picked client has no CRM application yet to attach the agreement to).
    public function categories()
    {
        if (!$this->isAuthorized()) {
            return $this->response->setJSON(['results' => []]);
        }

        $rows = (new Category_model())->getpost();
        $results = [];
        foreach ($rows as $r) {
            $results[] = ['id' => $r['id'], 'text' => $r['category']];
        }

        return $this->response->setJSON(['results' => $results]);
    }

    public function types_for_category($categoryId = null)
    {
        if (!$this->isAuthorized()) {
            return $this->response->setJSON(['results' => []]);
        }

        $rows = (new Type_client_model())->where('category_id', (int) $categoryId)->findAll();
        $results = [];
        foreach ($rows as $r) {
            $results[] = ['id' => $r['id'], 'text' => $r['type']];
        }

        return $this->response->setJSON(['results' => $results]);
    }

    // Status dropdown, filtered by the selected Type — same field Siaportal::add_client_application()
    // asks for ("Status"), so a quick-added application looks like one made through that form.
    public function statuses_for_type($typeId = null)
    {
        if (!$this->isAuthorized()) {
            return $this->response->setJSON(['results' => []]);
        }

        // Siaportal::gettype_status() (add_client_application's Status field) doesn't actually
        // query by type — it always shows the single hardcoded option id=35 "Ready to Apply".
        // Matched here so a quick-added application looks identical to one made through that form.
        $results = [['id' => 35, 'text' => 'Ready to Apply']];

        return $this->response->setJSON(['results' => $results]);
    }

    // Creates the minimal CRM application record needed to attach a new agreement to a client
    // who doesn't have one yet — mirrors the fields Siaportal::add_client_application() actually
    // sets (siaportalid/category/type/application_status/insert_on); every other column on this
    // legacy table is left to its own implicit default, exactly as that existing flow does.
    // Deliberately skips add_client_application()'s "Ready to Apply" team email and its Team
    // Member field — this is a quick unblock-agreement-drafting shortcut, not a full replacement
    // for that form.
    public function quick_add_application()
    {
        if (!$this->isAuthorized()) {
            return $this->response->setJSON(['success' => false, 'error' => 'Unauthorized']);
        }
        if ($this->request->getMethod() !== 'post') {
            return $this->response->setJSON(['success' => false, 'error' => 'Invalid request']);
        }

        $prospectId = (int) $this->request->getPost('prospect_id');
        $categoryId = (int) $this->request->getPost('category_id');
        $typeId     = (int) $this->request->getPost('type_id');
        $statusId   = (int) $this->request->getPost('status_id');

        if (!$prospectId || !$categoryId || !$typeId || !$statusId) {
            return $this->response->setJSON(['success' => false, 'error' => 'Client, category, type, and status are all required.']);
        }

        $ApplicationModel = new Client_application_model();

        // Same client already has an application in this exact category+type — block the
        // duplicate instead of silently creating a second identical one (which produced two
        // indistinguishable "AINP — NA" entries in the Application dropdown).
        $duplicate = $ApplicationModel->where('siaportalid', $prospectId)
            ->where('category', $categoryId)
            ->where('type', $typeId)
            ->first();
        if ($duplicate) {
            return $this->response->setJSON(['success' => false, 'error' => 'This client already has an application in that category and type.']);
        }

        $newId = $ApplicationModel->insert([
            'siaportalid'         => $prospectId,
            'category'            => $categoryId,
            'type'                => $typeId,
            'application_status'  => $statusId,
            'insert_on'           => date('Y-m-d H:i:s'),
        ]);

        if (!$newId) {
            return $this->response->setJSON(['success' => false, 'error' => 'Could not create application.']);
        }

        return $this->response->setJSON(['success' => true, 'id' => $newId]);
    }

    public function start_from_application($applicationId = null)
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }

        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url());
        }

        $applicationId = (int) $applicationId;
        $AgreementModel = new Agreement_model();

        $existing = $AgreementModel->getByApplicationId($applicationId);
        if ($existing) {
            return redirect()->to(base_url('agreement/Agreement/detail/' . $existing['id']));
        }

        $ApplicationModel = new Client_application_model();
        $application = $ApplicationModel->get_detail($applicationId)[0] ?? null;
        if (!$application) {
            return redirect()->to(base_url('agreement/Agreement/dashboard'))->with('error', 'Application not found.');
        }

        $Prospect = new Prospect_model();
        $prospect = $Prospect->getpost_id($application['siaportalid'])[0] ?? null;
        if (!$prospect) {
            return redirect()->to(base_url('agreement/Agreement/dashboard'))->with('error', 'Client record not found.');
        }

        $phone = $this->composePhone($prospect);
        $address = $this->composeAddress($prospect);

        try {
            $agreement = $AgreementModel->createDraft([
                'application_id' => $applicationId,
                'prospect_id'    => $application['siaportalid'],
                'client_name'    => $prospect['heading'],
                'client_email'   => $prospect['email'],
                'client_phone'   => $phone,
                'client_address' => $address,
                'category_id'    => $application['category'],
                'type_id'        => $application['type'],
                'status'         => 'draft',
                'hide'           => 0,
                'consultant_name' => self::CONSULTANT_NAME,
                'rcic_number'     => self::RCIC_NUMBER,
                'created_by'     => session()->get('id'),
                'insert_on'      => date('Y-m-d H:i:s'),
            ]);
        } catch (\RuntimeException $e) {
            return redirect()->to(base_url('agreement/Agreement/dashboard'))->with('error', 'Could not create agreement draft. Please try again.');
        }

        return redirect()->to(base_url('agreement/Agreement/detail/' . $agreement['id']));
    }

    public function detail($id = null)
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }

        $AgreementModel = new Agreement_model();
        $agreement = $AgreementModel->find((int) $id);
        if (!$agreement || (int) $agreement['hide'] === 1) {
            return redirect()->to(base_url('agreement/Agreement/dashboard'))->with('error', 'Agreement not found.');
        }

        $agreement = $AgreementModel->ensureReferenceNumber($agreement);

        if (empty($agreement['agreement_date'])) {
            $agreement['agreement_date'] = date('Y-m-d');
        }

        $TypeClient = new Type_client_model();
        $MilestoneModel = new Agreement_milestone_model();
        $AdditionalFeeModel = new Agreement_additional_fee_model();
        $TemplateModel = new Agreement_template_model();

        $data['agreement']       = $agreement;
        $data['typeOptions']     = $TypeClient->getpost();
        // Default to one blank starting row (same pattern as depAbove22Fees below) so the
        // tables aren't empty-with-just-an-Add-button on a brand-new agreement.
        $data['milestones']      = $MilestoneModel->getByAgreementId($agreement['id'])
            ?: [['milestone' => '', 'due_date' => '', 'amount' => null, 'included_services' => '']];
        $data['additionalFees']  = $AdditionalFeeModel->getByAgreementId($agreement['id'])
            ?: [['description' => '', 'amount' => null]];
        $data['signUrl']         = !empty($agreement['sign_token']) ? base_url('agreement/sign/' . $agreement['sign_token']) : null;
        $data['templates']       = $TemplateModel->getAll();
        $data['depAbove22Fees']  = AgreementClauses::depAbove22Fees($agreement) ?: [0.0];

        return view('agreement/detail', $data);
    }

    // Persists the posted edit-form fields (client info/type/fees/milestones/additional fees)
    // onto the agreement and returns the fresh row. Shared by save() and generate_link() —
    // "Send for eSign" and "Generate Signing Link" both submit the same full edit form directly
    // to generate_link() (no separate Save click first), so it needs this too. Without it,
    // clicking "Send for eSign" on an unsaved draft would email the client stale/zero fees.
    private function persistAgreementForm(int $id, array $agreement): array
    {
        $post = $this->request->getPost();

        $serviceFee    = (float) ($post['service_fee'] ?? 0);
        $gstRate       = 5.0;
        $govtProcMain        = (float) ($post['govt_proc_main'] ?? 0);
        $govtProcSpouse      = (float) ($post['govt_proc_spouse'] ?? 0);
        $govtProcDepAbove22Fees = AgreementClauses::sanitizeFeeList($post['govt_proc_dep_above22'] ?? []);
        $govtProcDepAbove22  = array_sum($govtProcDepAbove22Fees);
        $govtPrPnp           = (float) ($post['govt_pr_pnp'] ?? 0);
        $governmentFee = round($govtProcMain + $govtProcSpouse + $govtProcDepAbove22 + $govtPrPnp, 2);
        $otherFee      = (float) ($post['other_fee'] ?? 0);
        // Additional fees are entered pre-GST, same as Milestones — the amount charged (and
        // shown everywhere: preview, sign page, PDF) is amount + GST.
        $additionalFeesTotal = round(array_sum(array_map(
            fn ($f) => (float) ($f['amount'] ?? 0),
            $post['additional_fees'] ?? []
        )) * (1 + $gstRate / 100), 2);
        $gstAmount     = round($serviceFee * $gstRate / 100, 2);
        $totalAmount   = round($serviceFee + $gstAmount + $governmentFee + $otherFee + $additionalFeesTotal, 2);

        $typeId = (int) ($post['type_id'] ?? 0) ?: null;
        $TypeClient = new Type_client_model();
        $categoryId = $typeId ? ($TypeClient->find($typeId)['category_id'] ?? null) : $agreement['category_id'];

        $AgreementModel = new Agreement_model();
        $AgreementModel->update($id, [
            'type_id'         => $typeId ?? $agreement['type_id'],
            'category_id'     => $categoryId,
            'client_name'     => trim($post['client_name'] ?? '') ?: $agreement['client_name'],
            'client_email'    => trim($post['client_email'] ?? '') ?: $agreement['client_email'],
            'client_phone'    => trim($post['client_phone'] ?? '') ?: $agreement['client_phone'],
            'client_address'  => trim($post['client_address'] ?? '') ?: $agreement['client_address'],
            'case_description' => trim($post['case_description'] ?? ''),
            'template_name'   => trim($post['template_name'] ?? '') ?: 'Default Template',
            'agreement_date'  => trim($post['agreement_date'] ?? '') ?: null,
            'consultant_name' => self::CONSULTANT_NAME,
            'rcic_number'     => self::RCIC_NUMBER,
            'currency'        => 'CAD',
            'service_fee'     => $serviceFee,
            'gst_rate'        => $gstRate,
            'gst_amount'      => $gstAmount,
            'government_fee'  => $governmentFee,
            'govt_proc_main'        => $govtProcMain,
            'govt_proc_spouse'      => $govtProcSpouse,
            'govt_proc_dep_above22' => json_encode($govtProcDepAbove22Fees),
            'govt_pr_pnp'           => $govtPrPnp,
            'other_fee'       => $otherFee,
            'total_amount'    => $totalAmount,
            'update_on'       => date('Y-m-d H:i:s'),
        ]);

        $MilestoneModel = new Agreement_milestone_model();
        $MilestoneModel->replaceAll($id, $post['milestones'] ?? []);

        $AdditionalFeeModel = new Agreement_additional_fee_model();
        $AdditionalFeeModel->replaceAll($id, $post['additional_fees'] ?? []);

        return $AgreementModel->find($id);
    }

    public function save($id = null)
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }

        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url());
        }

        $id = (int) $id;
        $AgreementModel = new Agreement_model();
        $agreement = $AgreementModel->find($id);
        if (!$agreement || (int) $agreement['hide'] === 1) {
            return redirect()->to(base_url('agreement/Agreement/dashboard'))->with('error', 'Agreement not found.');
        }
        if (in_array($agreement['status'], ['signed', 'declined', 'cancelled'], true)) {
            return redirect()->to(base_url('agreement/Agreement/detail/' . $id))
                ->with('error', $agreement['status'] === 'signed'
                    ? 'This agreement has been signed and is locked — it can no longer be edited.'
                    : ($agreement['status'] === 'cancelled'
                        ? 'This agreement has been cancelled and can no longer be edited. Create a new agreement instead.'
                        : 'This agreement was declined by the client and can no longer be edited. Create a new agreement instead.'));
        }

        $this->persistAgreementForm($id, $agreement);

        return redirect()->to(base_url('agreement/Agreement/detail/' . $id))->with('message', 'Agreement saved as draft successfully.');
    }

    // Generates (if needed) the signing-link token, moves the agreement out of draft, and
    // emails the client the link to review + sign. Re-clicking "Send for eSign" resends it.
    public function generate_link($id = null)
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }

        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url());
        }

        $id = (int) $id;
        $AgreementModel = new Agreement_model();
        $agreement = $AgreementModel->find($id);
        if (!$agreement || (int) $agreement['hide'] === 1) {
            return redirect()->to(base_url('agreement/Agreement/dashboard'))->with('error', 'Agreement not found.');
        }
        if (in_array($agreement['status'], ['signed', 'declined', 'cancelled'], true)) {
            return redirect()->to(base_url('agreement/Agreement/detail/' . $id))
                ->with('error', $agreement['status'] === 'signed'
                    ? 'This agreement has already been signed — the signing link can no longer be sent.'
                    : ($agreement['status'] === 'cancelled'
                        ? 'This agreement has been cancelled. Create a new agreement instead of resending this one.'
                        : 'This agreement was declined by the client. Create a new agreement instead of resending this one.'));
        }

        // Both "Send for eSign" and "Generate Signing Link" submit the full edit form straight
        // here (no separate Save click first) — persist it now so the token/PDF/email always
        // reflect what's currently in the form, not a stale/never-saved DB row.
        $agreement = $this->persistAgreementForm($id, $agreement);

        $agreement = $AgreementModel->ensureSignToken($agreement);
        $wasFirstSend = $agreement['status'] === 'draft';
        if ($wasFirstSend) {
            $AgreementModel->update($id, ['status' => 'sent']);
        }

        // "Send for eSign" passes ?notify=1 to actually email the client; the plain
        // "Generate Signing Link" utility omits it to just produce a copyable link.
        if ($this->request->getGet('notify') === '1') {
            if (empty($agreement['client_email'])) {
                return redirect()->to(base_url('agreement/Agreement/detail/' . $id))->with('error', 'Signing link generated, but no client email is on file — could not send.');
            }

            // Duplicate-click guard: a repeat send within the debounce window (double-click,
            // a slow request retried by the browser, etc.) is silently treated as a no-op —
            // same success message, but only the first request actually emails the client.
            $justSent = !empty($agreement['last_sent_at'])
                && (time() - strtotime($agreement['last_sent_at'])) < self::RESEND_DEBOUNCE_SECONDS;

            if (!$justSent) {
                helper('agreement_email_helper');
                $signUrl = base_url('agreement/sign/' . $agreement['sign_token']);
                sia_send_agreement_email($agreement, $signUrl);
                $AgreementModel->update($id, ['last_sent_at' => date('Y-m-d H:i:s')]);
            }

            $successMsg = $wasFirstSend ? 'Agreement sent successfully.' : 'Agreement resent successfully.';
            return redirect()->to(base_url('agreement/Agreement/dashboard'))->with('message', $successMsg);
        }

        return redirect()->to(base_url('agreement/Agreement/detail/' . $id))->with('message', 'Signing link generated.');
    }

    // Staff-side download of the signed PDF, gated by the normal staff login (not the client's
    // token/PIN gate) so the sender can pull it up any time from the agreement's detail page.
    public function pdf($id = null)
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }

        $id = (int) $id;
        $AgreementModel = new Agreement_model();
        $agreement = $AgreementModel->find($id);
        if (!$agreement || empty($agreement['pdf_path'])) {
            return redirect()->to(base_url('agreement/Agreement/detail/' . $id))->with('error', 'No signed PDF available yet.');
        }

        $path = './' . ltrim($agreement['pdf_path'], '/');
        if (!is_file($path)) {
            return redirect()->to(base_url('agreement/Agreement/detail/' . $id))->with('error', 'Signed PDF file not found.');
        }

        // Streams the file directly rather than using CodeIgniter's Response::download()/Files\File,
        // whose getSize() return-type declaration crashes under PHP 8.2 on this old CI4 version.
        $this->response->setHeader('Content-Type', 'application/pdf');
        $this->response->setHeader('Content-Disposition', 'attachment; filename="' . basename($path) . '"');
        $this->response->setHeader('Content-Transfer-Encoding', 'binary');
        $this->response->setHeader('Content-Length', (string) filesize($path));
        return $this->response->setBody(file_get_contents($path));
    }

    // Re-renders and overwrites the locked PDF for an already-signed agreement, using the
    // current PDF-builder templates. Needed because the PDF is otherwise generated exactly
    // once, at the moment of signing (see Sign::generateSignedPdf()) — any template fix made
    // afterward (e.g. a missing address, a wording tweak) never reaches agreements that were
    // already signed unless someone explicitly re-runs it, which is what this does. The
    // signature/signed-on-date/legal content are untouched; only the rendered document refreshes.
    public function regenerate_pdf($id = null)
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url());
        }

        $id = (int) $id;
        $AgreementModel = new Agreement_model();
        $agreement = $AgreementModel->find($id);
        if (!$agreement || $agreement['status'] !== 'signed') {
            return redirect()->to(base_url('agreement/Agreement/detail/' . $id))->with('error', 'Only a signed agreement has a PDF to regenerate.');
        }

        $TypeClient = new Type_client_model();
        $type = $agreement['type_id'] ? ($TypeClient->getpost_id((int) $agreement['type_id'])[0] ?? null) : null;
        $typeLabel = $type ? trim(($type['ct'] ?? '') . ' — ' . $type['type']) : 'Retainer Agreement';

        $MilestoneModel = new Agreement_milestone_model();
        $AdditionalFeeModel = new Agreement_additional_fee_model();
        $milestones = $MilestoneModel->getByAgreementId($id);
        $additionalFees = $AdditionalFeeModel->getByAgreementId($id);

        $pdfPath = null;
        try {
            $pdfPath = (new AgreementHtmlPdfBuilder())->build($agreement, $milestones, $additionalFees, $typeLabel);
        } catch (\Throwable $e) {
            log_message('error', 'Agreement #' . $id . ' PDF regeneration (Chrome) failed, falling back to TCPDF: ' . $e->getMessage());
            try {
                $pdfPath = (new AgreementPdfBuilder())->build($agreement, $milestones, $additionalFees, $typeLabel);
            } catch (\Throwable $e2) {
                log_message('error', 'Agreement #' . $id . ' PDF regeneration (TCPDF fallback) also failed: ' . $e2->getMessage());
            }
        }

        if ($pdfPath === null) {
            return redirect()->to(base_url('agreement/Agreement/detail/' . $id))->with('error', 'PDF regeneration failed. Check the error log.');
        }

        $AgreementModel->update($id, ['pdf_path' => $pdfPath]);

        return redirect()->to(base_url('agreement/Agreement/detail/' . $id))->with('message', 'Signed PDF regenerated successfully.');
    }

    // Per-agreement clause text editor: lets an admin override the legal wording for THIS
    // agreement only (every other agreement keeps the standard text).
    public function edit_clauses($id = null)
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }

        $id = (int) $id;
        $AgreementModel = new Agreement_model();
        $agreement = $AgreementModel->find($id);
        if (!$agreement || (int) $agreement['hide'] === 1) {
            return redirect()->to(base_url('agreement/Agreement/dashboard'))->with('error', 'Agreement not found.');
        }
        if (in_array($agreement['status'], ['signed', 'declined', 'cancelled'], true)) {
            return redirect()->to(base_url('agreement/Agreement/detail/' . $id))
                ->with('error', $agreement['status'] === 'signed'
                    ? 'This agreement has been signed and is locked — its clause text can no longer be edited.'
                    : ($agreement['status'] === 'cancelled'
                        ? 'This agreement has been cancelled and can no longer be edited. Create a new agreement instead.'
                        : 'This agreement was declined by the client and can no longer be edited. Create a new agreement instead.'));
        }

        // Current effective content per clause (saved override if one exists, else the
        // standard default text) — this is what the client actually sees right now, so it's
        // also what the editor should start from. defaultHtml is passed too so the editor can
        // offer a "Reset to standard text" per clause without another request.
        $clauses = AgreementClauses::all($agreement);
        $defaults = AgreementClauses::defaults($agreement);
        $clauseHtml = [];
        $defaultHtml = [];
        foreach ($clauses as $i => $clause) {
            $clauseHtml[$i] = AgreementClauses::blocksToHtml($clause['blocks']);
            $defaultHtml[$i] = AgreementClauses::blocksToHtml($defaults[$i]['blocks']);
        }

        return view('agreement/edit_clauses', [
            'agreement'      => $agreement,
            'clauses'        => $clauses,
            'clauseHtml'     => $clauseHtml,
            'defaultHtml'    => $defaultHtml,
        ]);
    }

    public function save_clauses($id = null)
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url());
        }

        $id = (int) $id;
        $AgreementModel = new Agreement_model();
        $agreement = $AgreementModel->find($id);
        if (!$agreement || (int) $agreement['hide'] === 1) {
            return redirect()->to(base_url('agreement/Agreement/dashboard'))->with('error', 'Agreement not found.');
        }
        if (in_array($agreement['status'], ['signed', 'declined', 'cancelled'], true)) {
            return redirect()->to(base_url('agreement/Agreement/detail/' . $id))
                ->with('error', 'This agreement can no longer be edited.');
        }

        // Full-replace semantics: the editor always posts every editable clause's current
        // content together, so whatever's empty here has been deliberately cleared back to
        // the standard default text, not accidentally dropped.
        $overrides = [];
        foreach ((array) $this->request->getPost('clause') as $index => $html) {
            $index = (int) $index;
            $html = trim((string) $html);
            if ($html !== '') {
                $overrides[$index] = $html;
            }
        }

        $AgreementModel->update($id, ['custom_clauses' => !empty($overrides) ? json_encode($overrides) : null]);

        return redirect()->to(base_url('agreement/Agreement/edit_clauses/' . $id))->with('message', 'Clause text saved.');
    }

    // ONE-TIME migration for the "remove clause 6 (Payment Terms and Conditions)" change —
    // removing that clause shifted every later clause's array index down by one, so any
    // agreement with a saved custom_clauses override on a post-clause-6 index now needs that
    // key shifted too, or the override lands on the wrong clause. Visit this URL once after
    // deploying, then delete this method + its route — it's not meant to stay live.
    public function migrate_clause_indices_once()
    {
        if ($this->request->getGet('token') !== 'SIA_CLAUSE6_MIGRATE_ONCE') {
            return $this->response->setStatusCode(403)->setBody('Forbidden');
        }

        $AgreementModel = new Agreement_model();
        $rows = $AgreementModel->where('custom_clauses IS NOT NULL')->where('custom_clauses !=', '')->findAll();
        $log = [];
        foreach ($rows as $row) {
            $decoded = json_decode((string) $row['custom_clauses'], true);
            if (!is_array($decoded)) {
                continue;
            }
            $shifted = [];
            foreach ($decoded as $index => $html) {
                $index = (int) $index;
                if ($index === 5) {
                    continue; // was always the skipped fee clause, shouldn't exist, drop defensively
                }
                $shifted[$index > 5 ? $index - 1 : $index] = $html;
            }
            ksort($shifted);
            $AgreementModel->update($row['id'], ['custom_clauses' => json_encode($shifted)]);
            $log[] = 'Migrated agreement #' . $row['id'] . ': old keys [' . implode(',', array_keys($decoded)) . '] -> new keys [' . implode(',', array_keys($shifted)) . ']';
        }

        return $this->response->setBody(empty($log) ? 'No agreements needed migration.' : implode("\n", $log));
    }

    // URL-triggered cron endpoint (no login) for hosts like this one where cPanel's cron runs
    // `curl` against a token-gated URL rather than a CLI `php spark` command — mirrors
    // AppointAdmin::auto_reminder()'s pattern. Same 24h/3d/7d fixed-ladder logic as
    // App\Commands\SendAgreementReminders (kept for local/CLI testing); run only one of the
    // two on a schedule, not both, to avoid double-sending.
    public function cron_send_reminders()
    {
        if ($this->request->getGet('token') !== self::REMINDER_CRON_TOKEN) {
            return $this->response->setStatusCode(403)->setBody('Forbidden');
        }

        set_time_limit(0);
        helper('agreement_email_helper');

        $AgreementModel = new Agreement_model();
        $due = $AgreementModel->getDueForReminder();
        $sent = 0;

        foreach ($due as $agreement) {
            $signUrl = base_url('agreement/sign/' . $agreement['sign_token']);
            try {
                sia_send_agreement_reminder_email($agreement, $signUrl);
                $AgreementModel->update($agreement['id'], [
                    'reminders_sent'   => (int) $agreement['reminders_sent'] + 1,
                    'last_reminder_at' => date('Y-m-d H:i:s'),
                ]);
                $sent++;
            } catch (\Throwable $e) {
                log_message('error', '[AgreementReminderCron] Agreement #' . $agreement['id'] . ': ' . $e->getMessage());
            }
        }

        return $this->response->setBody($sent . ' of ' . count($due) . ' reminder(s) sent.');
    }
}
