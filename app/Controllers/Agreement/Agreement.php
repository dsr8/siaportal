<?php namespace App\Controllers\Agreement;

use App\Controllers\BaseController;
use App\Models\Agreement\Agreement_model;
use App\Models\Agreement\Agreement_milestone_model;
use App\Models\Agreement\Agreement_additional_fee_model;
use App\Models\Agreement\Agreement_template_model;
use App\Models\Client_application_model;
use App\Models\Prospect_model;
use App\Models\Type_client_model;
use App\Libraries\Agreement\AgreementClauses;

class Agreement extends BaseController
{
    private const CONSULTANT_NAME = 'Manpreet Joshi';
    private const RCIC_NUMBER     = 'R515734';

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

        try {
            $agreement = $AgreementModel->createDraft([
                'application_id' => $applicationId,
                'prospect_id'    => $application['siaportalid'],
                'client_name'    => $prospect['heading'],
                'client_email'   => $prospect['email'],
                'client_phone'   => $phone,
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
        $data['milestones']      = $MilestoneModel->getByAgreementId($agreement['id']);
        $data['additionalFees']  = $AdditionalFeeModel->getByAgreementId($agreement['id']);
        $data['signUrl']         = !empty($agreement['sign_token']) ? base_url('agreement/sign/' . $agreement['sign_token']) : null;
        $data['templates']       = $TemplateModel->getAll();

        return view('agreement/detail', $data);
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
        if (in_array($agreement['status'], ['signed', 'declined'], true)) {
            return redirect()->to(base_url('agreement/Agreement/detail/' . $id))
                ->with('error', $agreement['status'] === 'signed'
                    ? 'This agreement has been signed and is locked — it can no longer be edited.'
                    : 'This agreement was declined by the client and can no longer be edited. Create a new agreement instead.');
        }

        $post = $this->request->getPost();

        $serviceFee    = (float) ($post['service_fee'] ?? 0);
        $gstRate       = 5.0;
        $govtProcMain        = (float) ($post['govt_proc_main'] ?? 0);
        $govtProcSpouse      = (float) ($post['govt_proc_spouse'] ?? 0);
        $govtProcDepAbove22  = (float) ($post['govt_proc_dep_above22'] ?? 0);
        $govtProcDepUnder22  = (float) ($post['govt_proc_dep_under22'] ?? 0);
        $govtPrMain          = (float) ($post['govt_pr_main'] ?? 0);
        $govtPrSpouse        = (float) ($post['govt_pr_spouse'] ?? 0);
        $govtPrPnp           = (float) ($post['govt_pr_pnp'] ?? 0);
        $governmentFee = round($govtProcMain + $govtProcSpouse + $govtProcDepAbove22 + $govtProcDepUnder22
            + $govtPrMain + $govtPrSpouse + $govtPrPnp, 2);
        $otherFee      = (float) ($post['other_fee'] ?? 0);
        $gstAmount     = round($serviceFee * $gstRate / 100, 2);
        $totalAmount   = round($serviceFee + $gstAmount + $governmentFee + $otherFee, 2);

        $typeId = (int) ($post['type_id'] ?? 0) ?: null;
        $TypeClient = new Type_client_model();
        $categoryId = $typeId ? ($TypeClient->find($typeId)['category_id'] ?? null) : $agreement['category_id'];

        $AgreementModel->update($id, [
            'type_id'         => $typeId ?? $agreement['type_id'],
            'category_id'     => $categoryId,
            'client_name'     => trim($post['client_name'] ?? '') ?: $agreement['client_name'],
            'client_email'    => trim($post['client_email'] ?? '') ?: $agreement['client_email'],
            'client_phone'    => trim($post['client_phone'] ?? '') ?: $agreement['client_phone'],
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
            'govt_proc_dep_above22' => $govtProcDepAbove22,
            'govt_proc_dep_under22' => $govtProcDepUnder22,
            'govt_pr_main'          => $govtPrMain,
            'govt_pr_spouse'        => $govtPrSpouse,
            'govt_pr_pnp'           => $govtPrPnp,
            'other_fee'       => $otherFee,
            'total_amount'    => $totalAmount,
            'update_on'       => date('Y-m-d H:i:s'),
        ]);

        $MilestoneModel = new Agreement_milestone_model();
        $MilestoneModel->replaceAll($id, $post['milestones'] ?? []);

        $AdditionalFeeModel = new Agreement_additional_fee_model();
        $AdditionalFeeModel->replaceAll($id, $post['additional_fees'] ?? []);

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
        if (in_array($agreement['status'], ['signed', 'declined'], true)) {
            return redirect()->to(base_url('agreement/Agreement/detail/' . $id))
                ->with('error', $agreement['status'] === 'signed'
                    ? 'This agreement has already been signed — the signing link can no longer be sent.'
                    : 'This agreement was declined by the client. Create a new agreement instead of resending this one.');
        }

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
            return redirect()->to(base_url('agreement/Agreement/detail/' . $id))->with('message', $successMsg);
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

    // Per-agreement clause text editor: lets an admin override the legal wording for THIS
    // agreement only (every other agreement keeps the standard text). Clause 6 (Payment Terms)
    // is never shown here — it's always auto-generated from the real fee numbers.
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
        if (in_array($agreement['status'], ['signed', 'declined'], true)) {
            return redirect()->to(base_url('agreement/Agreement/detail/' . $id))
                ->with('error', $agreement['status'] === 'signed'
                    ? 'This agreement has been signed and is locked — its clause text can no longer be edited.'
                    : 'This agreement was declined by the client and can no longer be edited. Create a new agreement instead.');
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
            if ($i === AgreementClauses::FEE_CLAUSE_INDEX) {
                continue;
            }
            $clauseHtml[$i] = AgreementClauses::blocksToHtml($clause['blocks']);
            $defaultHtml[$i] = AgreementClauses::blocksToHtml($defaults[$i]['blocks']);
        }

        return view('agreement/edit_clauses', [
            'agreement'      => $agreement,
            'clauses'        => $clauses,
            'clauseHtml'     => $clauseHtml,
            'defaultHtml'    => $defaultHtml,
            'feeClauseIndex' => AgreementClauses::FEE_CLAUSE_INDEX,
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
        if (in_array($agreement['status'], ['signed', 'declined'], true)) {
            return redirect()->to(base_url('agreement/Agreement/detail/' . $id))
                ->with('error', 'This agreement can no longer be edited.');
        }

        // Full-replace semantics: the editor always posts every editable clause's current
        // content together, so whatever's empty here has been deliberately cleared back to
        // the standard default text, not accidentally dropped.
        $overrides = [];
        foreach ((array) $this->request->getPost('clause') as $index => $html) {
            $index = (int) $index;
            if ($index === AgreementClauses::FEE_CLAUSE_INDEX) {
                continue;
            }
            $html = trim((string) $html);
            if ($html !== '') {
                $overrides[$index] = $html;
            }
        }

        $AgreementModel->update($id, ['custom_clauses' => !empty($overrides) ? json_encode($overrides) : null]);

        return redirect()->to(base_url('agreement/Agreement/edit_clauses/' . $id))->with('message', 'Clause text saved.');
    }
}
