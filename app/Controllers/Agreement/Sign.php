<?php namespace App\Controllers\Agreement;

use App\Controllers\BaseController;
use App\Models\Agreement\Agreement_model;
use App\Models\Agreement\Agreement_milestone_model;
use App\Models\Agreement\Agreement_additional_fee_model;
use App\Models\Agreement\Agreement_page_initial_model;
use App\Models\Type_client_model;
use App\Libraries\Agreement\AgreementClauses;
use App\Libraries\Agreement\AgreementHtmlPdfBuilder;
use App\Libraries\Agreement\AgreementPdfBuilder;

class Sign extends BaseController
{
    // Statuses in which a client can still act on the agreement (view/draft-sign/submit/decline).
    private const ACTIONABLE_STATUSES = ['sent', 'viewed'];

    private const MAX_UPLOAD_BYTES = 2 * 1024 * 1024;

    // Page 1 is the cover/fees page, pages 2-14 are the numbered clauses — all require an
    // initial; page 15 (the final signature page) uses the full signature instead.
    private const REQUIRED_INITIAL_PAGES = 14;

    private function loadAgreement(string $token): ?array
    {
        $AgreementModel = new Agreement_model();
        return $AgreementModel->findByToken($token);
    }

    public function index($token = null)
    {
        $token = (string) $token;
        $agreement = $this->loadAgreement($token);
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
        $data['clauses']         = AgreementClauses::all($agreement);
        $data['governmentFeeLines'] = AgreementClauses::governmentFeeLines($agreement);
        $data['signSuccess']     = session()->getFlashdata('sign_success');
        $data['signError']       = session()->getFlashdata('sign_error');
        $data['pageInitials']    = (new Agreement_page_initial_model())->getByAgreementId($agreement['id']);

        return view('agreement/sign', $data);
    }

    // AJAX: records the initial for one page of the signing document (draw/type/upload,
    // captured fresh on every page — auto-saves as the client interacts, like draft()).
    public function initial($token = null)
    {
        $token = (string) $token;
        $agreement = $this->loadAgreement($token);
        if (!$agreement || !in_array($agreement['status'], self::ACTIONABLE_STATUSES, true)) {
            return $this->response->setJSON(['ok' => false])->setStatusCode(404);
        }

        $pageNumber = (int) $this->request->getPost('page_number');
        if ($pageNumber < 1 || $pageNumber > self::REQUIRED_INITIAL_PAGES) {
            return $this->response->setJSON(['ok' => false, 'error' => 'Invalid page.'])->setStatusCode(422);
        }

        $captured = $this->captureSignatureFromPost($agreement);
        if ($captured === null) {
            return $this->response->setJSON(['ok' => false, 'error' => 'No initial provided.'])->setStatusCode(422);
        }

        $PageInitialModel = new Agreement_page_initial_model();
        $PageInitialModel->recordInitial($agreement['id'], $pageNumber, [
            'initial_type'   => $captured['client_signature_type'],
            'initial_path'   => $captured['client_signature'],
            'typed_initials' => $captured['client_typed_name'],
            'initialed_at'   => date('Y-m-d H:i:s'),
            'initialed_ip'   => $this->request->getIPAddress(),
        ]);

        return $this->response->setJSON([
            'ok'   => true,
            'type' => $captured['client_signature_type'],
            'path' => $captured['client_signature'] ? base_url($captured['client_signature']) : null,
            'name' => $captured['client_typed_name'],
        ]);
    }

    // AJAX auto-save: persists whatever signature the client currently has in progress without finalizing.
    public function draft($token = null)
    {
        $token = (string) $token;
        $agreement = $this->loadAgreement($token);
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
        $token = (string) $token;
        $agreement = $this->loadAgreement($token);
        if (!$agreement || !in_array($agreement['status'], self::ACTIONABLE_STATUSES, true)) {
            return redirect()->to(base_url('agreement/sign/' . $token));
        }

        // page_number comes back from the DB as a numeric string, not an int, so cast before
        // the strict in_array check below — otherwise 1 !== "1" fails for every page.
        $initialedPages = array_map('intval', array_column((new Agreement_page_initial_model())->getByAgreementId($agreement['id']), 'page_number'));
        for ($p = 1; $p <= self::REQUIRED_INITIAL_PAGES; $p++) {
            if (!in_array($p, $initialedPages, true)) {
                return redirect()->to(base_url('agreement/sign/' . $token))
                    ->with('sign_error', 'Please initial every page before signing.');
            }
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

        // Atomic claim: only the first of any near-simultaneous submissions (double-click,
        // a slow request the browser silently retried, two open tabs) flips sent/viewed ->
        // signed. Every request that loses the race lands here with a false — it must NOT
        // regenerate the PDF or re-send the confirmation email, since the winner already did.
        $AgreementModel = new Agreement_model();
        if (!$AgreementModel->claimSigning($agreement['id'], $update)) {
            return redirect()->to(base_url('agreement/sign/' . $token))
                ->with('sign_success', 'Agreement signed successfully. Thank you.');
        }

        $agreement = $AgreementModel->ensureReferenceNumber($agreement);
        $signed = array_merge($agreement, $update);
        $pdfPath = $this->generateSignedPdf($signed);
        if ($pdfPath !== null) {
            $AgreementModel->update($agreement['id'], ['pdf_path' => $pdfPath]);
            $signed['pdf_path'] = $pdfPath;
        }

        helper('agreement_email_helper');
        sia_send_signed_agreement_email($signed, base_url('agreement/sign/' . $token . '/pdf'));

        return redirect()->to(base_url('agreement/sign/' . $token))
            ->with('sign_success', 'Agreement signed successfully. Thank you.');
    }

    // Renders and saves the final locked PDF, returning its path relative to public/, or null
    // if generation failed entirely. Signing itself must never be lost over a PDF-rendering
    // problem, so failures here are logged, not thrown — the client still ends up signed.
    //
    // Tries the pixel-perfect headless-Chrome mirror (AgreementHtmlPdfBuilder) first; if that
    // server has no Chrome/Chromium binary (or printing otherwise fails), falls back to the
    // pure-PHP TCPDF renderer (AgreementPdfBuilder) so a PDF still gets produced everywhere,
    // with no server-level dependency required.
    private function generateSignedPdf(array $agreement): ?string
    {
        $TypeClient = new Type_client_model();
        $type = $agreement['type_id'] ? ($TypeClient->getpost_id((int) $agreement['type_id'])[0] ?? null) : null;
        $typeLabel = $type ? trim(($type['ct'] ?? '') . ' — ' . $type['type']) : 'Retainer Agreement';

        $MilestoneModel = new Agreement_milestone_model();
        $AdditionalFeeModel = new Agreement_additional_fee_model();
        $milestones = $MilestoneModel->getByAgreementId($agreement['id']);
        $additionalFees = $AdditionalFeeModel->getByAgreementId($agreement['id']);

        try {
            $builder = new AgreementHtmlPdfBuilder();
            return $builder->build($agreement, $milestones, $additionalFees, $typeLabel);
        } catch (\Throwable $e) {
            log_message('error', 'Agreement #' . ($agreement['id'] ?? '?') . ' Chrome PDF generation failed, falling back to TCPDF: ' . $e->getMessage());
        }

        try {
            $builder = new AgreementPdfBuilder();
            return $builder->build($agreement, $milestones, $additionalFees, $typeLabel);
        } catch (\Throwable $e) {
            log_message('error', 'Agreement #' . ($agreement['id'] ?? '?') . ' TCPDF fallback also failed: ' . $e->getMessage());
            return null;
        }
    }

    public function pdf($token = null)
    {
        $token = (string) $token;
        $agreement = $this->loadAgreement($token);
        if (!$agreement || $agreement['status'] !== 'signed' || empty($agreement['pdf_path'])) {
            return redirect()->to(base_url('agreement/sign/' . $token));
        }

        $path = './' . ltrim($agreement['pdf_path'], '/');
        if (!is_file($path)) {
            return redirect()->to(base_url('agreement/sign/' . $token));
        }

        return $this->sendPdf($path);
    }

    // Streams a PDF as a forced download without CodeIgniter's Response::download()/Files\File,
    // whose getSize() return-type declaration crashes under PHP 8.2 on this old CI4 version.
    private function sendPdf(string $path)
    {
        $this->response->setHeader('Content-Type', 'application/pdf');
        $this->response->setHeader('Content-Disposition', 'attachment; filename="' . basename($path) . '"');
        $this->response->setHeader('Content-Transfer-Encoding', 'binary');
        $this->response->setHeader('Content-Length', (string) filesize($path));
        return $this->response->setBody(file_get_contents($path));
    }

    public function decline($token = null)
    {
        $token = (string) $token;
        $agreement = $this->loadAgreement($token);
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
