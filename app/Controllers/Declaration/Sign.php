<?php namespace App\Controllers\Declaration;

use App\Controllers\BaseController;
use App\Models\Declaration\Declaration_model;
use App\Libraries\Declaration\DeclarationPdfBuilder;

class Sign extends BaseController
{
    // Statuses in which a client can still act on the document (view/draft-sign/submit/decline).
    private const ACTIONABLE_STATUSES = ['sent', 'viewed'];

    private const MAX_UPLOAD_BYTES = 2 * 1024 * 1024;

    private function loadDeclaration(string $token): ?array
    {
        $DeclarationModel = new Declaration_model();
        return $DeclarationModel->findByToken($token);
    }

    public function index($token = null)
    {
        $token = (string) $token;
        $declaration = $this->loadDeclaration($token);
        if (!$declaration) {
            return $this->response->setStatusCode(404)->setBody(view('declaration/sign_not_found'));
        }

        $DeclarationModel = new Declaration_model();

        if ($declaration['status'] === 'sent') {
            $DeclarationModel->update($declaration['id'], [
                'status'    => 'viewed',
                'viewed_at' => date('Y-m-d H:i:s'),
                'viewed_ip' => $this->request->getIPAddress(),
            ]);
            $declaration['status'] = 'viewed';

            helper('declaration_email_helper');
            sia_send_declaration_viewed_email($declaration);
        }

        $data['declaration'] = $declaration;
        $data['signSuccess'] = session()->getFlashdata('sign_success');
        $data['signError']   = session()->getFlashdata('sign_error');

        return view('declaration/sign', $data);
    }

    // AJAX auto-save: persists whatever signature/initials the client currently has in
    // progress without finalizing, mirroring the Agreement module's draft() endpoint.
    public function draft($token = null)
    {
        $token = (string) $token;
        $declaration = $this->loadDeclaration($token);
        if (!$declaration || !in_array($declaration['status'], self::ACTIONABLE_STATUSES, true)) {
            return $this->response->setJSON(['ok' => false])->setStatusCode(404);
        }

        $update = $this->captureSignatureFromPost($declaration);
        $update = array_merge($update ?? [], $this->captureInitialsFromPost($declaration) ?? []);
        if (empty($update)) {
            return $this->response->setJSON(['ok' => false, 'error' => 'No signature provided.'])->setStatusCode(422);
        }

        (new Declaration_model())->update($declaration['id'], $update);

        return $this->response->setJSON(['ok' => true]);
    }

    public function submit($token = null)
    {
        $token = (string) $token;
        $declaration = $this->loadDeclaration($token);
        if (!$declaration || !in_array($declaration['status'], self::ACTIONABLE_STATUSES, true)) {
            return redirect()->to(base_url('declaration/sign/' . $token));
        }

        if (!empty($declaration['show_consent_checkbox']) && empty($this->request->getPost('consent'))) {
            return redirect()->to(base_url('declaration/sign/' . $token))
                ->with('sign_error', 'Please accept the consent checkbox before signing.');
        }

        $update = $this->captureSignatureFromPost($declaration);
        if ($update === null && empty($declaration['client_signature']) && empty($declaration['client_typed_name'])) {
            return redirect()->to(base_url('declaration/sign/' . $token))
                ->with('sign_error', 'Please draw, type, or upload your signature before signing.');
        }

        if (!empty($declaration['require_initials'])) {
            $initials = $this->captureInitialsFromPost($declaration);
            if ($initials === null && empty($declaration['client_initials']) && empty($declaration['client_typed_initials'])) {
                return redirect()->to(base_url('declaration/sign/' . $token))
                    ->with('sign_error', 'Please provide your initials before signing.');
            }
            $update = array_merge($update ?? [], $initials ?? []);
        }

        $update = $update ?? [];
        $update['status']                 = 'signed';
        $update['consent_accepted']       = 1;
        $update['client_signed_at']       = date('Y-m-d H:i:s');
        $update['client_signed_ip']       = $this->request->getIPAddress();
        $update['client_signed_device']   = (string) $this->request->getUserAgent();
        $update['client_signed_browser']  = (string) ($this->request->getUserAgent()->getBrowser() . ' ' . $this->request->getUserAgent()->getVersion());

        // Atomic claim: only the first of any near-simultaneous submissions (double-click, a
        // slow request the browser silently retried, two open tabs) flips sent/viewed ->
        // signed. Every request that loses the race lands here with a false — it must NOT
        // regenerate the PDF or re-send the confirmation email, since the winner already did.
        $DeclarationModel = new Declaration_model();
        if (!$DeclarationModel->claimSigning($declaration['id'], $update)) {
            return redirect()->to(base_url('declaration/sign/' . $token))
                ->with('sign_success', 'Document signed successfully. Thank you.');
        }

        $signed = array_merge($declaration, $update);
        $pdfPath = $this->generateSignedPdf($signed);
        if ($pdfPath !== null) {
            $DeclarationModel->update($declaration['id'], ['pdf_path' => $pdfPath]);
            $signed['pdf_path'] = $pdfPath;
        }

        helper('declaration_email_helper');
        sia_send_declaration_signed_email($signed);

        return redirect()->to(base_url('declaration/sign/' . $token))
            ->with('sign_success', 'Document signed successfully. Thank you.');
    }

    // Renders and saves the final locked PDF, returning its path relative to public/, or null
    // if generation failed entirely. Signing itself must never be lost over a PDF-rendering
    // problem, so failures here are logged, not thrown — the client still ends up signed.
    private function generateSignedPdf(array $declaration): ?string
    {
        try {
            $builder = new DeclarationPdfBuilder();
            return $builder->build($declaration);
        } catch (\Throwable $e) {
            log_message('error', 'Declaration #' . ($declaration['id'] ?? '?') . ' PDF generation failed: ' . $e->getMessage());
            return null;
        }
    }

    public function pdf($token = null)
    {
        $token = (string) $token;
        $declaration = $this->loadDeclaration($token);
        if (!$declaration || $declaration['status'] !== 'signed' || empty($declaration['pdf_path'])) {
            return redirect()->to(base_url('declaration/sign/' . $token));
        }

        $path = './' . ltrim($declaration['pdf_path'], '/');
        if (!is_file($path)) {
            return redirect()->to(base_url('declaration/sign/' . $token));
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

    // Once declined, the document is dead-ended — the signing link stays invalid and a brand
    // new Disclaimer/Consent must be created (no re-opening the same row).
    public function decline($token = null)
    {
        $token = (string) $token;
        $declaration = $this->loadDeclaration($token);
        if (!$declaration || !in_array($declaration['status'], self::ACTIONABLE_STATUSES, true)) {
            return redirect()->to(base_url('declaration/sign/' . $token));
        }

        (new Declaration_model())->update($declaration['id'], [
            'status'         => 'declined',
            'declined_at'    => date('Y-m-d H:i:s'),
            'decline_reason' => trim((string) $this->request->getPost('reason')),
        ]);

        helper('declaration_email_helper');
        sia_send_declaration_declined_email(array_merge($declaration, [
            'decline_reason' => trim((string) $this->request->getPost('reason')),
        ]));

        return redirect()->to(base_url('declaration/sign/' . $token))
            ->with('sign_success', 'You have declined this document.');
    }

    // Reads signature_type/signature_data/typed_name/signature_file from POST and returns the
    // fields to persist (saving an image file for draw/upload), or null if nothing usable was submitted.
    private function captureSignatureFromPost(array $declaration): ?array
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
            $path = $this->saveDataUrlImage((int) $declaration['id'], (string) $this->request->getPost('signature_data'), 'sig');
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
            $path = $this->saveUploadedImage((int) $declaration['id'], $file, 'sig');
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

    // Same shape as captureSignatureFromPost() but for the separate initials fields
    // (initials_type/initials_data/typed_initials/initials_file), only used when the
    // document's require_initials flag is on.
    private function captureInitialsFromPost(array $declaration): ?array
    {
        $type = $this->request->getPost('initials_type');

        if ($type === 'type') {
            $name = trim((string) $this->request->getPost('typed_initials'));
            if ($name === '') {
                return null;
            }
            return [
                'client_initials_type'  => 'type',
                'client_typed_initials' => $name,
                'client_initials'       => null,
            ];
        }

        if ($type === 'draw') {
            $path = $this->saveDataUrlImage((int) $declaration['id'], (string) $this->request->getPost('initials_data'), 'init');
            if ($path === null) {
                return null;
            }
            return [
                'client_initials_type'  => 'draw',
                'client_initials'       => $path,
                'client_typed_initials' => null,
            ];
        }

        if ($type === 'upload') {
            $file = $this->request->getFile('initials_file');
            $path = $this->saveUploadedImage((int) $declaration['id'], $file, 'init');
            if ($path === null) {
                return null;
            }
            return [
                'client_initials_type'  => 'upload',
                'client_initials'       => $path,
                'client_typed_initials' => null,
            ];
        }

        return null;
    }

    private function signatureDir(): string
    {
        $dir = './assets/declaration_signatures/';
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        return $dir;
    }

    private function saveDataUrlImage(int $declarationId, string $dataUrl, string $prefix): ?string
    {
        if (!preg_match('/^data:image\/(png|jpeg);base64,([a-zA-Z0-9+\/=]+)$/', $dataUrl, $m)) {
            return null;
        }

        $binary = base64_decode($m[2], true);
        if ($binary === false || strlen($binary) < 50 || strlen($binary) > self::MAX_UPLOAD_BYTES) {
            return null;
        }

        $ext = $m[1] === 'jpeg' ? 'jpg' : 'png';
        $filename = $prefix . '_' . $declarationId . '_' . time() . '_' . random_int(1000, 9999) . '.' . $ext;
        file_put_contents($this->signatureDir() . $filename, $binary);

        return 'assets/declaration_signatures/' . $filename;
    }

    private function saveUploadedImage(int $declarationId, $file, string $prefix): ?string
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
        $filename = $prefix . '_' . $declarationId . '_' . time() . '_' . random_int(1000, 9999) . '.' . $ext;
        $file->move($this->signatureDir(), $filename);

        return 'assets/declaration_signatures/' . $filename;
    }
}
