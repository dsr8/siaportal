<?php namespace App\Controllers\Agreement;

use App\Controllers\BaseController;
use App\Models\Agreement\Agreement_model;
use App\Models\Agreement\Agreement_milestone_model;
use App\Models\Agreement\Agreement_additional_fee_model;
use App\Models\Type_client_model;

class Sign extends BaseController
{
    // Statuses in which a client can still act on the agreement (view/draft-sign/submit/decline).
    private const ACTIONABLE_STATUSES = ['sent', 'viewed'];

    private const MAX_UPLOAD_BYTES = 2 * 1024 * 1024;

    private function loadAgreement(string $token): ?array
    {
        $AgreementModel = new Agreement_model();
        return $AgreementModel->findByToken($token);
    }

    public function index($token = null)
    {
        $agreement = $this->loadAgreement((string) $token);
        if (!$agreement) {
            return $this->response->setStatusCode(404)->setBody(view('agreement/sign_not_found'));
        }

        $AgreementModel = new Agreement_model();

        if ($agreement['status'] === 'sent') {
            $AgreementModel->update($agreement['id'], [
                'status'    => 'viewed',
                'viewed_at' => date('Y-m-d H:i:s'),
                'viewed_ip' => $this->request->getIPAddress(),
            ]);
            $agreement['status'] = 'viewed';
        }

        $TypeClient = new Type_client_model();
        $type = $agreement['type_id'] ? ($TypeClient->getpost_id((int) $agreement['type_id'])[0] ?? null) : null;

        $MilestoneModel = new Agreement_milestone_model();
        $AdditionalFeeModel = new Agreement_additional_fee_model();

        $data['agreement']       = $agreement;
        $data['typeLabel']       = $type ? trim(($type['ct'] ?? '') . ' — ' . $type['type']) : 'Retainer Agreement';
        $data['milestones']      = $MilestoneModel->getByAgreementId($agreement['id']);
        $data['additionalFees']  = $AdditionalFeeModel->getByAgreementId($agreement['id']);
        $data['signSuccess']     = session()->getFlashdata('sign_success');
        $data['signError']       = session()->getFlashdata('sign_error');

        return view('agreement/sign', $data);
    }

    // AJAX auto-save: persists whatever signature the client currently has in progress without finalizing.
    public function draft($token = null)
    {
        $agreement = $this->loadAgreement((string) $token);
        if (!$agreement || !in_array($agreement['status'], self::ACTIONABLE_STATUSES, true)) {
            return $this->response->setJSON(['ok' => false])->setStatusCode(404);
        }

        $update = $this->captureSignatureFromPost($agreement);
        if ($update === null) {
            return $this->response->setJSON(['ok' => false, 'error' => 'No signature provided.'])->setStatusCode(422);
        }

        (new Agreement_model())->update($agreement['id'], $update);

        return $this->response->setJSON(['ok' => true]);
    }

    public function submit($token = null)
    {
        $agreement = $this->loadAgreement((string) $token);
        if (!$agreement || !in_array($agreement['status'], self::ACTIONABLE_STATUSES, true)) {
            return redirect()->to(base_url('agreement/sign/' . $token));
        }

        if (empty($this->request->getPost('consent'))) {
            return redirect()->to(base_url('agreement/sign/' . $token))
                ->with('sign_error', 'Please accept the consent checkbox before signing.');
        }

        $update = $this->captureSignatureFromPost($agreement);
        if ($update === null && empty($agreement['client_signature']) && empty($agreement['client_typed_name'])) {
            return redirect()->to(base_url('agreement/sign/' . $token))
                ->with('sign_error', 'Please draw, type, or upload your signature before signing.');
        }

        $update = $update ?? [];
        $update['status']               = 'signed';
        $update['consent_accepted']     = 1;
        $update['client_signed_at']     = date('Y-m-d H:i:s');
        $update['client_signed_ip']     = $this->request->getIPAddress();
        $update['client_signed_device'] = (string) $this->request->getUserAgent();

        (new Agreement_model())->update($agreement['id'], $update);

        return redirect()->to(base_url('agreement/sign/' . $token))
            ->with('sign_success', 'Agreement signed successfully. Thank you.');
    }

    public function decline($token = null)
    {
        $agreement = $this->loadAgreement((string) $token);
        if (!$agreement || !in_array($agreement['status'], self::ACTIONABLE_STATUSES, true)) {
            return redirect()->to(base_url('agreement/sign/' . $token));
        }

        (new Agreement_model())->update($agreement['id'], [
            'status'         => 'declined',
            'declined_at'    => date('Y-m-d H:i:s'),
            'decline_reason' => trim((string) $this->request->getPost('reason')),
        ]);

        return redirect()->to(base_url('agreement/sign/' . $token))
            ->with('sign_success', 'You have declined this agreement.');
    }

    // Reads signature_type/signature_data/typed_name/signature_file from POST and returns the
    // fields to persist (saving an image file for draw/upload), or null if nothing usable was submitted.
    private function captureSignatureFromPost(array $agreement): ?array
    {
        $type = $this->request->getPost('signature_type');

        if ($type === 'type') {
            $name = trim((string) $this->request->getPost('typed_name'));
            if ($name === '') {
                return null;
            }
            return [
                'client_signature_type' => 'type',
                'client_typed_name'     => $name,
                'client_signature'      => null,
            ];
        }

        if ($type === 'draw') {
            $path = $this->saveDataUrlSignature((int) $agreement['id'], (string) $this->request->getPost('signature_data'));
            if ($path === null) {
                return null;
            }
            return [
                'client_signature_type' => 'draw',
                'client_signature'      => $path,
                'client_typed_name'     => null,
            ];
        }

        if ($type === 'upload') {
            $file = $this->request->getFile('signature_file');
            $path = $this->saveUploadedSignature((int) $agreement['id'], $file);
            if ($path === null) {
                return null;
            }
            return [
                'client_signature_type' => 'upload',
                'client_signature'      => $path,
                'client_typed_name'     => null,
            ];
        }

        return null;
    }

    private function signatureDir(): string
    {
        $dir = './assets/agreement_signatures/';
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        return $dir;
    }

    private function saveDataUrlSignature(int $agreementId, string $dataUrl): ?string
    {
        if (!preg_match('/^data:image\/(png|jpeg);base64,([a-zA-Z0-9+\/=]+)$/', $dataUrl, $m)) {
            return null;
        }

        $binary = base64_decode($m[2], true);
        if ($binary === false || strlen($binary) < 50 || strlen($binary) > self::MAX_UPLOAD_BYTES) {
            return null;
        }

        $ext = $m[1] === 'jpeg' ? 'jpg' : 'png';
        $filename = 'sig_' . $agreementId . '_' . time() . '.' . $ext;
        file_put_contents($this->signatureDir() . $filename, $binary);

        return 'assets/agreement_signatures/' . $filename;
    }

    private function saveUploadedSignature(int $agreementId, $file): ?string
    {
        if (!$file || !$file->isValid() || $file->hasMoved()) {
            return null;
        }
        if ($file->getSize() > self::MAX_UPLOAD_BYTES) {
            return null;
        }
        if (!in_array($file->getMimeType(), ['image/png', 'image/jpeg'], true)) {
            return null;
        }

        $ext = $file->getMimeType() === 'image/png' ? 'png' : 'jpg';
        $filename = 'sig_' . $agreementId . '_' . time() . '.' . $ext;
        $file->move($this->signatureDir(), $filename);

        return 'assets/agreement_signatures/' . $filename;
    }
}
