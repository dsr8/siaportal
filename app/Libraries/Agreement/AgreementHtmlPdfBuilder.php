<?php namespace App\Libraries\Agreement;

use App\Models\Agreement\Agreement_page_initial_model;

// Renders the exact same view used by the client-facing eSign page
// (app/Views/agreement/sign.php) and prints it to PDF with headless Chrome.
// Because it's the literal page HTML/CSS — not a hand-translated TCPDF re-implementation —
// the downloaded PDF is a pixel-for-pixel mirror of what the client saw while signing.
// The view's own @media print rules (see sign.php) turn each ".sg-pdf-page" card into one
// physical PDF page and append a signature-certificate page when the agreement is signed.
class AgreementHtmlPdfBuilder
{
    // Checked in order; first match wins. Override in production via the
    // AGREEMENT_CHROME_PATH environment variable if Chrome lives somewhere else
    // (or isn't installed under these names at all).
    private const CHROME_CANDIDATES = [
        'C:/Program Files/Google/Chrome/Application/chrome.exe',
        'C:/Program Files (x86)/Google/Chrome/Application/chrome.exe',
        'C:/Program Files/Microsoft/Edge/Application/msedge.exe',
        'C:/Program Files (x86)/Microsoft/Edge/Application/msedge.exe',
        '/usr/bin/google-chrome',
        '/usr/bin/google-chrome-stable',
        '/usr/bin/chromium-browser',
        '/usr/bin/chromium',
    ];

    // Builds the PDF and returns its path relative to the public/ document root,
    // for storing in tbl_agreement_agreement.pdf_path.
    public function build(array $agreement, array $milestones, array $additionalFees, string $typeLabel): string
    {
        $html = view('agreement/sign', [
            'agreement'      => $agreement,
            'typeLabel'      => $typeLabel,
            'milestones'     => $milestones,
            'additionalFees' => $additionalFees,
            'clauses'        => AgreementClauses::all($agreement),
            'governmentFeeLines' => AgreementClauses::governmentFeeLines($agreement),
            'signSuccess'    => null,
            'signError'      => null,
            'pageInitials'   => (new Agreement_page_initial_model())->getByAgreementId($agreement['id']),
        ]);

        $tmpHtmlPath = $this->tmpDir() . 'agreement_' . (int) $agreement['id'] . '_' . uniqid('', true) . '.html';
        file_put_contents($tmpHtmlPath, $html);

        $filename   = 'agreement_' . (int) $agreement['id'] . '_' . preg_replace('/[^A-Za-z0-9\-]/', '', (string) ($agreement['reference_number'] ?? 'draft')) . '.pdf';
        $outputPath = $this->pdfDir() . $filename;

        // Printed to a throwaway path first, then swapped into place — regenerating an
        // existing agreement's PDF (see Agreement::regenerate_pdf()) prints to the SAME
        // deterministic filename as before. Printing straight over it let a locked/open
        // destination file (e.g. still open in a PDF viewer, common on Windows) cause Chrome
        // to silently fail to write while leaving the old file in place — which passed the
        // old is_file()/filesize() check below and got reported as a successful regeneration
        // even though nothing had actually changed. Printing to a fresh temp path first means
        // any write failure is caught here, before touching the real file at all.
        $tmpPdfPath = $this->pdfDir() . 'tmp_' . (int) $agreement['id'] . '_' . uniqid('', true) . '.pdf';
        try {
            $this->printToPdf($tmpHtmlPath, $tmpPdfPath);
        } finally {
            @unlink($tmpHtmlPath);
        }

        if (!is_file($tmpPdfPath) || filesize($tmpPdfPath) === 0) {
            @unlink($tmpPdfPath);
            throw new \RuntimeException('Signed PDF generation failed: headless Chrome did not produce an output file.');
        }

        if (!@rename($tmpPdfPath, $outputPath)) {
            // rename() can fail on Windows if $outputPath is currently open elsewhere; fall
            // back to copy+delete, which succeeds as long as the destination isn't locked.
            if (!@copy($tmpPdfPath, $outputPath)) {
                @unlink($tmpPdfPath);
                throw new \RuntimeException('Signed PDF generation succeeded but could not replace the existing file at ' . $outputPath . ' — it may be open in another program.');
            }
            @unlink($tmpPdfPath);
        }

        return 'assets/agreement_pdfs/' . $filename;
    }

    private function printToPdf(string $htmlPath, string $outputPath): void
    {
        $chrome = $this->findChrome();
        if ($chrome === null) {
            throw new \RuntimeException('No Chrome/Chromium binary found for PDF generation. Set the AGREEMENT_CHROME_PATH environment variable.');
        }

        // An isolated, disposable profile dir is required: pointing at a normal Chrome
        // install's default profile just forwards the CLI args to any already-running
        // Chrome window ("Opening in existing browser session") instead of running headless.
        $profileDir = $this->tmpDir() . 'chrome-profile-' . uniqid('', true);
        mkdir($profileDir, 0755, true);

        $url = 'file:///' . str_replace('\\', '/', $htmlPath);

        $cmd = escapeshellarg($chrome)
            . ' --headless=new --disable-gpu --no-sandbox'
            // Server-process hardening: PHP-FPM/Apache's worker user (www-data etc.) has no
            // real login session, so Chrome needs to be told not to rely on one — otherwise it
            // silently crashes (or hangs) once actually installed on a real Linux host, even
            // though the exact same flags are harmless no-ops here in local Windows testing.
            . ' --disable-dev-shm-usage --disable-software-rasterizer --disable-extensions'
            . ' --user-data-dir=' . escapeshellarg($profileDir)
            . ' --print-to-pdf=' . escapeshellarg($outputPath)
            . ' --print-to-pdf-no-header'
            . ' --run-all-compositor-stages-before-draw'
            . ' --virtual-time-budget=15000'
            . ' ' . escapeshellarg($url);

        // Chrome also expects $HOME to point somewhere writable; a web server worker process
        // usually has none set at all. Reuse the disposable profile dir for it (Linux only —
        // Windows Chrome doesn't consult $HOME the same way, and "VAR=val cmd" isn't valid syntax there).
        $isWindows = stripos(PHP_OS, 'WIN') === 0;
        if (!$isWindows) {
            $cmd = 'HOME=' . escapeshellarg($profileDir) . ' ' . $cmd;
        }

        exec($cmd . ' 2>&1', $outputLines, $exitCode);
        $this->rrmdir($profileDir);

        if ($exitCode !== 0 && !is_file($outputPath)) {
            throw new \RuntimeException('Headless Chrome exited with code ' . $exitCode . ': ' . implode("\n", $outputLines));
        }
    }

    private function findChrome(): ?string
    {
        $envPath = getenv('AGREEMENT_CHROME_PATH');
        if ($envPath && is_file($envPath)) {
            return $envPath;
        }
        foreach (self::CHROME_CANDIDATES as $path) {
            if (is_file($path)) {
                return $path;
            }
        }
        return null;
    }

    private function rrmdir(string $dir): void
    {
        if (!is_dir($dir)) {
            return;
        }
        $items = scandir($dir);
        foreach ($items as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }
            $path = $dir . DIRECTORY_SEPARATOR . $item;
            is_dir($path) ? $this->rrmdir($path) : @unlink($path);
        }
        @rmdir($dir);
    }

    // Must be an absolute path: file:// URLs need one, and TCPDF's sibling library used
    // the same FCPATH-based pattern for consistency.
    private function pdfDir(): string
    {
        $dir = FCPATH . 'assets/agreement_pdfs/';
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        return $dir;
    }

    private function tmpDir(): string
    {
        $dir = FCPATH . 'writable/agreement_pdf_tmp/';
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        return $dir;
    }
}
