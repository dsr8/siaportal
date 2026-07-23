<?php namespace App\Controllers\Declaration;

use App\Controllers\BaseController;
use App\Models\Declaration\Declaration_model;
use App\Models\Client_application_model;
use App\Models\Prospect_model;
use App\Models\Type_client_model;

class Declaration extends BaseController
{
    // Rapid repeat clicks of "Send for Signature" within this window are treated as the same
    // click (double-click, slow network double-submit) and silently no-op instead of
    // re-emailing the client a second time.
    private const RESEND_DEBOUNCE_SECONDS = 10;

    private function isAuthorized(): bool
    {
        return session()->get('isLoggedIn') == true;
    }

    // Shared cc+number phone composition, used by both the create form and the client search.
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

        $DeclarationModel = new Declaration_model();
        $counts = $DeclarationModel->getDashboardCounts();
        $archivedCount = $DeclarationModel->getArchivedCount();
        $total  = $DeclarationModel->getDashboardTotal($filters);
        $totalPages = max(1, (int) ceil($total / $perPage));
        $page = max(1, min($totalPages, (int) ($get['page'] ?? 1)));
        $rows = $DeclarationModel->getDashboardList($filters, $page, $perPage);

        $TypeClient = new Type_client_model();

        return view('declaration/dashboard', [
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

    // Soft-hide: removes the document from the active dashboard without deleting it — it
    // stays in the database and stays reachable via the "View Archived" list.
    public function archive($id = null)
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url());
        }

        $id = (int) $id;
        $DeclarationModel = new Declaration_model();
        $declaration = $DeclarationModel->find($id);
        if (!$declaration) {
            return redirect()->to(base_url('declaration/Declaration/dashboard'))->with('error', 'Disclaimer / Consent not found.');
        }

        $DeclarationModel->update($id, ['hide' => 1]);

        return redirect()->to(base_url('declaration/Declaration/dashboard'))->with('message', 'Disclaimer archived successfully.');
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
        $DeclarationModel = new Declaration_model();
        $declaration = $DeclarationModel->find($id);
        if (!$declaration) {
            return redirect()->to(base_url('declaration/Declaration/dashboard?archived=1'))->with('error', 'Disclaimer / Consent not found.');
        }

        $DeclarationModel->update($id, ['hide' => 0]);

        return redirect()->to(base_url('declaration/Declaration/dashboard?archived=1'))->with('message', 'Disclaimer restored.');
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
                'id'       => $r['id'],
                'text'     => trim(($r['ct'] ?? 'Uncategorized') . ' — ' . ($r['ty'] ?? '')),
                'category' => $r['ct'] ?? 'Uncategorized',
                'type'     => $r['ty'] ?? '',
                'status'   => $r['st'] ?? '',
            ];
        }

        return $this->response->setJSON(['results' => $results]);
    }

    // One-click entry point from an application row (e.g. Siaportal/view_client's "Start
    // Consent" button) — creates a blank draft pre-filled from CRM and drops the admin straight
    // into the edit form to write the actual title/content. Unlike Agreement's equivalent, this
    // never redirects to an existing row instead of creating one: an application can have several
    // Declaration/Consent documents over time (different consent_type each), so every click here
    // is meant to start a new one, not resume the latest.
    public function start_from_application($applicationId = null)
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url());
        }

        $applicationId = (int) $applicationId;
        $ApplicationModel = new Client_application_model();
        $application = $ApplicationModel->get_detail($applicationId)[0] ?? null;
        if (!$application) {
            return redirect()->to(base_url())->with('error', 'Application not found.');
        }

        $Prospect = new Prospect_model();
        $prospect = $Prospect->getpost_id((int) $application['siaportalid'])[0] ?? null;
        if (!$prospect) {
            return redirect()->to(base_url())->with('error', 'Client record not found.');
        }

        $DeclarationModel = new Declaration_model();
        $id = $DeclarationModel->insert([
            'application_id'  => $applicationId,
            'prospect_id'     => $prospect['id'],
            'client_name'     => $prospect['heading'],
            'client_email'    => $prospect['email'],
            'client_phone'    => $this->composePhone($prospect),
            'category_id'     => $application['category'],
            'type_id'         => $application['type'],
            'title'           => 'Untitled Disclaimer / Consent',
            'content'         => "Dear [Client Name],\n\nThis declaration is to inform you of the potential consequences related to your application due to the following issue(s)...\n\nI have read and understand the above declaration.",
            'consultant_name' => trim((string) session()->get('firstname') . ' ' . (string) session()->get('lastname')),
            'consent_date'    => date('Y-m-d'),
            'status'          => 'draft',
            'hide'            => 0,
            'require_client_signature' => 1,
            'require_initials'         => 0,
            'show_consent_checkbox'    => 1,
            'created_by'      => session()->get('id'),
            'insert_on'       => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(base_url('declaration/Declaration/detail/' . $id));
    }

    // Blank "Create Disclaimer / Consent" form — client + application are picked right on
    // this page (auto-pulled from CRM), unlike the Agreement module's separate picker modal.
    // ?prospect_id= (e.g. from a "+ Start Consent" link on a specific prospect's row on
    // Siaportal/view_prospect) pre-selects that client instead of leaving the picker blank.
    public function create()
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }

        $prefillProspect = null;
        $prefillProspectId = (int) ($this->request->getGet('prospect_id') ?? 0);
        if ($prefillProspectId) {
            $Prospect = new Prospect_model();
            $prefillProspect = $Prospect->getpost_id($prefillProspectId)[0] ?? null;
        }

        return view('declaration/form', [
            'declaration'   => null,
            'consentType'   => 'sent',
            'consultantDefault' => trim((string) session()->get('firstname') . ' ' . (string) session()->get('lastname')),
            'prefillProspect' => $prefillProspect,
        ]);
    }

    // Inserts the new row from the create form's POST, then lands on the normal edit screen.
    public function store()
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url());
        }

        $post = $this->request->getPost();
        $applicationId = (int) ($post['application_id'] ?? 0);

        if (!$applicationId) {
            return redirect()->back()->withInput()->with('error', 'Please select a client and an application first.');
        }

        $ApplicationModel = new Client_application_model();
        $application = $ApplicationModel->get_detail($applicationId)[0] ?? null;
        if (!$application) {
            return redirect()->back()->withInput()->with('error', 'Application not found.');
        }

        // The owning client is derived from the application record itself (siaportalid),
        // never from a separately-posted prospect_id — the picker loads each client's
        // applications via its own AJAX call, so a fast client-switch before that response
        // lands could otherwise submit an application_id/prospect_id pair that don't match.
        $Prospect = new Prospect_model();
        $prospect = $Prospect->getpost_id((int) $application['siaportalid'])[0] ?? null;
        if (!$prospect) {
            return redirect()->back()->withInput()->with('error', 'Client record not found.');
        }

        $title = trim((string) ($post['title'] ?? ''));
        $content = (string) ($post['content'] ?? '');
        if ($title === '' || trim(html_entity_decode(strip_tags($content), ENT_QUOTES)) === '') {
            return redirect()->back()->withInput()->with('error', 'Title and content are required.');
        }

        $DeclarationModel = new Declaration_model();
        $id = $DeclarationModel->insert([
            'application_id'  => $applicationId,
            'prospect_id'     => $prospect['id'],
            'client_name'     => $prospect['heading'],
            'client_email'    => $prospect['email'],
            'client_phone'    => $this->composePhone($prospect),
            'category_id'     => $application['category'],
            'type_id'         => $application['type'],
            'consent_type'    => trim((string) ($post['consent_type'] ?? '')) ?: null,
            'title'           => $title,
            'content'         => $content,
            'consultant_name' => trim((string) ($post['consultant_name'] ?? '')) ?: trim((string) session()->get('firstname') . ' ' . (string) session()->get('lastname')),
            'consent_date'    => trim((string) ($post['consent_date'] ?? '')) ?: date('Y-m-d'),
            'status'          => 'draft',
            'hide'            => 0,
            'require_client_signature' => !empty($post['require_client_signature']) ? 1 : 0,
            'require_initials'         => !empty($post['require_initials']) ? 1 : 0,
            'show_consent_checkbox'    => !empty($post['show_consent_checkbox']) ? 1 : 0,
            'created_by'      => session()->get('id'),
            'insert_on'       => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(base_url('declaration/Declaration/detail/' . $id))->with('message', 'Disclaimer saved as draft successfully.');
    }

    public function detail($id = null)
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }

        $DeclarationModel = new Declaration_model();
        $declaration = $DeclarationModel->find((int) $id);
        if (!$declaration || (int) $declaration['hide'] === 1) {
            return redirect()->to(base_url('declaration/Declaration/dashboard'))->with('error', 'Disclaimer / Consent not found.');
        }

        $typeInfo = $declaration['type_id'] ? ((new Type_client_model())->getpost_id((int) $declaration['type_id'])[0] ?? null) : null;

        $data['declaration']  = $declaration;
        $data['categoryName'] = $typeInfo['ct'] ?? '—';
        $data['typeName']     = $typeInfo['type'] ?? '—';
        $data['signUrl']      = !empty($declaration['sign_token']) ? base_url('declaration/sign/' . $declaration['sign_token']) : null;

        return view('declaration/form', $data);
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
        $DeclarationModel = new Declaration_model();
        $declaration = $DeclarationModel->find($id);
        if (!$declaration || (int) $declaration['hide'] === 1) {
            return redirect()->to(base_url('declaration/Declaration/dashboard'))->with('error', 'Disclaimer / Consent not found.');
        }
        if (in_array($declaration['status'], ['signed', 'declined'], true)) {
            return redirect()->to(base_url('declaration/Declaration/detail/' . $id))
                ->with('error', $declaration['status'] === 'signed'
                    ? 'This document has been signed and is locked — it can no longer be edited.'
                    : 'This document was declined by the client and can no longer be edited. Create a new one instead.');
        }

        $post = $this->request->getPost();
        $title = trim((string) ($post['title'] ?? ''));
        $content = (string) ($post['content'] ?? '');
        if ($title === '' || trim(html_entity_decode(strip_tags($content), ENT_QUOTES)) === '') {
            return redirect()->to(base_url('declaration/Declaration/detail/' . $id))->with('error', 'Title and content are required.');
        }

        $DeclarationModel->update($id, [
            'consent_type'    => trim((string) ($post['consent_type'] ?? '')) ?: null,
            'title'           => $title,
            'content'         => $content,
            'consultant_name' => trim((string) ($post['consultant_name'] ?? '')) ?: $declaration['consultant_name'],
            'consent_date'    => trim((string) ($post['consent_date'] ?? '')) ?: $declaration['consent_date'],
            'require_client_signature' => !empty($post['require_client_signature']) ? 1 : 0,
            'require_initials'         => !empty($post['require_initials']) ? 1 : 0,
            'show_consent_checkbox'    => !empty($post['show_consent_checkbox']) ? 1 : 0,
            'update_on'       => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(base_url('declaration/Declaration/detail/' . $id))->with('message', 'Disclaimer saved as draft successfully.');
    }

    // Generates (if needed) the signing-link token, moves the document out of draft, and
    // emails the client the link to review + sign. Re-clicking "Send"/"Resend" resends it.
    public function generate_link($id = null)
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url());
        }

        $id = (int) $id;
        $DeclarationModel = new Declaration_model();
        $declaration = $DeclarationModel->find($id);
        if (!$declaration || (int) $declaration['hide'] === 1) {
            return redirect()->to(base_url('declaration/Declaration/dashboard'))->with('error', 'Disclaimer / Consent not found.');
        }
        if (in_array($declaration['status'], ['signed', 'declined'], true)) {
            return redirect()->to(base_url('declaration/Declaration/detail/' . $id))
                ->with('error', $declaration['status'] === 'signed'
                    ? 'This document has already been signed — the signing link can no longer be sent.'
                    : 'This document was declined by the client. Create a new one instead of resending this.');
        }

        if (empty($declaration['client_email'])) {
            return redirect()->to(base_url('declaration/Declaration/detail/' . $id))->with('error', 'No client email is on file — could not send.');
        }

        $declaration = $DeclarationModel->ensureSignToken($declaration);
        $wasFirstSend = $declaration['status'] === 'draft';
        if ($wasFirstSend) {
            $DeclarationModel->update($id, ['status' => 'sent']);
        }

        // Duplicate-click guard: a repeat send within the debounce window (double-click, a
        // slow request retried by the browser, etc.) is silently treated as a no-op — same
        // success message, but only the first request actually emails the client.
        $justSent = !empty($declaration['last_sent_at'])
            && (time() - strtotime($declaration['last_sent_at'])) < self::RESEND_DEBOUNCE_SECONDS;

        if (!$justSent) {
            helper('declaration_email_helper');
            $signUrl = base_url('declaration/sign/' . $declaration['sign_token']);
            sia_send_declaration_email($declaration, $signUrl);
            $DeclarationModel->update($id, ['last_sent_at' => date('Y-m-d H:i:s')]);
        }

        $successMsg = $wasFirstSend ? 'Disclaimer sent successfully.' : 'Disclaimer resent successfully.';
        return redirect()->to(base_url('declaration/Declaration/detail/' . $id))->with('message', $successMsg);
    }

    // Staff-side download of the signed PDF, gated by the normal staff login so the sender
    // can pull it up any time from the document's detail page.
    public function pdf($id = null)
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }

        $id = (int) $id;
        $DeclarationModel = new Declaration_model();
        $declaration = $DeclarationModel->find($id);
        if (!$declaration || empty($declaration['pdf_path'])) {
            return redirect()->to(base_url('declaration/Declaration/detail/' . $id))->with('error', 'No signed PDF available yet.');
        }

        $path = './' . ltrim($declaration['pdf_path'], '/');
        if (!is_file($path)) {
            return redirect()->to(base_url('declaration/Declaration/detail/' . $id))->with('error', 'Signed PDF file not found.');
        }

        // Streams the file directly rather than using CodeIgniter's Response::download()/Files\File,
        // whose getSize() return-type declaration crashes under PHP 8.2 on this old CI4 version.
        $this->response->setHeader('Content-Type', 'application/pdf');
        $this->response->setHeader('Content-Disposition', 'attachment; filename="' . basename($path) . '"');
        $this->response->setHeader('Content-Transfer-Encoding', 'binary');
        $this->response->setHeader('Content-Length', (string) filesize($path));
        return $this->response->setBody(file_get_contents($path));
    }
}
