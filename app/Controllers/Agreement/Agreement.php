<?php namespace App\Controllers\Agreement;

use App\Controllers\BaseController;
use App\Models\Agreement\Agreement_model;
use App\Models\Agreement\Agreement_milestone_model;
use App\Models\Agreement\Agreement_additional_fee_model;
use App\Models\Client_application_model;
use App\Models\Prospect_model;
use App\Models\Type_client_model;

class Agreement extends BaseController
{
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

        return view('agreement/dashboard');
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
            return redirect()->to(base_url())->with('error', 'Application not found.');
        }

        $Prospect = new Prospect_model();
        $prospect = $Prospect->getpost_id($application['siaportalid'])[0] ?? null;
        if (!$prospect) {
            return redirect()->to(base_url())->with('error', 'Client record not found.');
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
                'created_by'     => session()->get('id'),
                'insert_on'      => date('Y-m-d H:i:s'),
            ]);
        } catch (\RuntimeException $e) {
            return redirect()->to(base_url())->with('error', 'Could not create agreement draft. Please try again.');
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

        if (empty($agreement['consultant_name'])) {
            $agreement['consultant_name'] = trim(session()->get('firstname') . ' ' . session()->get('lastname'));
        }
        if (empty($agreement['agreement_date'])) {
            $agreement['agreement_date'] = date('Y-m-d');
        }

        $TypeClient = new Type_client_model();
        $MilestoneModel = new Agreement_milestone_model();
        $AdditionalFeeModel = new Agreement_additional_fee_model();

        $data['agreement']       = $agreement;
        $data['typeOptions']     = $TypeClient->getpost();
        $data['milestones']      = $MilestoneModel->getByAgreementId($agreement['id']);
        $data['additionalFees']  = $AdditionalFeeModel->getByAgreementId($agreement['id']);
        $data['signUrl']         = !empty($agreement['sign_token']) ? base_url('agreement/sign/' . $agreement['sign_token']) : null;

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

        $post = $this->request->getPost();

        $serviceFee    = (float) ($post['service_fee'] ?? 0);
        $gstRate       = (float) ($post['gst_rate'] ?? 0);
        $governmentFee = (float) ($post['government_fee'] ?? 0);
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
            'consultant_name' => trim($post['consultant_name'] ?? ''),
            'rcic_number'     => trim($post['rcic_number'] ?? ''),
            'currency'        => trim($post['currency'] ?? '') ?: 'CAD',
            'service_fee'     => $serviceFee,
            'gst_rate'        => $gstRate,
            'gst_amount'      => $gstAmount,
            'government_fee'  => $governmentFee,
            'other_fee'       => $otherFee,
            'total_amount'    => $totalAmount,
            'require_client_signature'     => !empty($post['require_client_signature']) ? 1 : 0,
            'require_consultant_signature' => !empty($post['require_consultant_signature']) ? 1 : 0,
            'email_verification'           => !empty($post['email_verification']) ? 1 : 0,
            'send_reminder'                => !empty($post['send_reminder']) ? 1 : 0,
            'reminder_days'   => (int) ($post['reminder_days'] ?? 3),
            'max_reminders'   => (int) ($post['max_reminders'] ?? 2),
            'update_on'       => date('Y-m-d H:i:s'),
        ]);

        $MilestoneModel = new Agreement_milestone_model();
        $MilestoneModel->replaceAll($id, $post['milestones'] ?? []);

        $AdditionalFeeModel = new Agreement_additional_fee_model();
        $AdditionalFeeModel->replaceAll($id, $post['additional_fees'] ?? []);

        return redirect()->to(base_url('agreement/Agreement/detail/' . $id))->with('message', 'Draft saved.');
    }

    // Minimal stand-in for the full "Send for eSign" flow (email + reminders, built in a later phase):
    // generates the signing-link token and moves the agreement out of draft so the link is reachable.
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

        $agreement = $AgreementModel->ensureSignToken($agreement);
        if ($agreement['status'] === 'draft') {
            $AgreementModel->update($id, ['status' => 'sent']);
        }

        return redirect()->to(base_url('agreement/Agreement/detail/' . $id))->with('message', 'Signing link generated.');
    }
}
