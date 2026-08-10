<?php namespace App\Libraries\Agreement;

use App\Models\Agreement\Agreement_page_initial_model;

require_once __DIR__ . '/AgreementPdf.php';

// Pure-PHP (TCPDF) fallback for when AgreementHtmlPdfBuilder's headless-Chrome mirror can't
// run on this server (no Chrome/Chromium binary installed, exec() disabled, etc.). Renders a
// hand-built approximation of the eSign page's design — one PDF page per numbered clause
// (fees/milestones on page 1 alongside clause 1), a running header on every later page, each
// page's captured client initial shown bottom-right, and a dedicated final page for the
// completed signatures — rather than a byte-for-byte match, but always works with no external
// process required.
class AgreementPdfBuilder
{
    public function build(array $agreement, array $milestones, array $additionalFees, string $typeLabel): string
    {
        $clauses      = AgreementClauses::all($agreement);
        $pageInitials = $this->indexPageInitials((int) $agreement['id']);
        $totalPages   = count($clauses) + 2; // +1 dedicated cover/fees page, +1 dedicated signature page, matching sign.php

        $pdf = new AgreementPdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator('SIA Immigration Solutions Inc.');
        $pdf->SetAuthor('SIA Immigration Solutions Inc.');
        $pdf->SetTitle('Retainer Agreement - ' . ($agreement['reference_number'] ?? $agreement['id']));
        $pdf->setPrintHeader(true);
        $pdf->setPrintFooter(true);
        $pdf->SetMargins(15, 28, 15);
        $pdf->SetHeaderMargin(8);
        $pdf->SetFooterMargin(16);
        $pdf->SetAutoPageBreak(true, 22);

        // Page 1: cover/fees only, no clause text — mirrors sign.php's standalone #page-1.
        $pdf->AddPage();
        $this->resetTextState($pdf);
        $pdf->writeHTML($this->titleBlockHtml($agreement, $typeLabel), true, false, true, false, '');
        $this->resetTextState($pdf);
        $pdf->writeHTML($this->feesHtml($agreement, $milestones, $additionalFees), true, false, true, false, '');
        $this->drawPageInitial($pdf, $pageInitials[1] ?? null);

        foreach ($clauses as $i => $clause) {
            $pageNum = $i + 2;
            $pdf->AddPage();
            $this->resetTextState($pdf);
            $pdf->writeHTML($this->runningHeaderHtml($pageNum, $totalPages), true, false, true, false, '');

            // The fee table's red "TOTAL PAYABLE"/heading styling can leave TCPDF's internal
            // text-colour state stuck on red — reset it explicitly so clause body text is never
            // accidentally tinted by whatever the previous writeHTML() call left behind.
            $this->resetTextState($pdf);
            $pdf->writeHTML($this->clauseHtml($clause), true, false, true, false, '');
            $this->drawPageInitial($pdf, $pageInitials[$pageNum] ?? null);
        }

        $pdf->AddPage();
        $this->resetTextState($pdf);
        $pdf->writeHTML($this->runningHeaderHtml($totalPages, $totalPages), true, false, true, false, '');
        $this->resetTextState($pdf);
        $this->writeSignaturePage($pdf, $agreement);

        $pdf->AddPage();
        $this->resetTextState($pdf);
        $pdf->writeHTML('<h1 style="text-align:center;font-size:18px;">SIGNATURE CERTIFICATE</h1>', true, false, true, false, '');
        $this->writeCertificateStatus($pdf);
        $this->resetTextState($pdf);
        $pdf->writeHTML($this->certificateHtml($agreement), true, false, true, false, '');

        $filename = 'agreement_' . (int) $agreement['id'] . '_' . preg_replace('/[^A-Za-z0-9\-]/', '', (string) ($agreement['reference_number'] ?? 'draft')) . '.pdf';
        $outputPath = $this->pdfDir() . $filename;

        // Printed to a throwaway path first, then swapped into place — see the matching
        // comment in AgreementHtmlPdfBuilder::build() for why: printing straight over an
        // existing, possibly-open (locked) destination file can silently leave the old file
        // untouched while still reporting success.
        $tmpPdfPath = $this->pdfDir() . 'tmp_' . (int) $agreement['id'] . '_' . uniqid('', true) . '.pdf';
        $pdf->Output($tmpPdfPath, 'F');

        if (!is_file($tmpPdfPath) || filesize($tmpPdfPath) === 0) {
            @unlink($tmpPdfPath);
            throw new \RuntimeException('Signed PDF generation failed: TCPDF did not produce an output file.');
        }

        if (!@rename($tmpPdfPath, $outputPath)) {
            if (!@copy($tmpPdfPath, $outputPath)) {
                @unlink($tmpPdfPath);
                throw new \RuntimeException('Signed PDF generation succeeded but could not replace the existing file at ' . $outputPath . ' — it may be open in another program.');
            }
            @unlink($tmpPdfPath);
        }

        return 'assets/agreement_pdfs/' . $filename;
    }

    // Must be an absolute path: TCPDF's file-output mode prepends "file://" to whatever
    // path it's given, and "file://./..." gets parsed as a remote host (".") and rejected.
    private function pdfDir(): string
    {
        $dir = FCPATH . 'assets/agreement_pdfs/';
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        return $dir;
    }

    private function money(array $agreement, $amount): string
    {
        return esc($agreement['currency'] ?? 'CAD') . ' $' . number_format((float) $amount, 2);
    }

    // Renders cursive script text to a transparent PNG via GD/FreeType, for the typed
    // initials/signature text. TCPDF's own TrueType embedding (SetFont() + Cell()) corrupts
    // this specific font's glyph data into unrelated garbage characters — reproducible even
    // with a completely independently reconverted copy of the font, so the bug is in TCPDF's
    // decade-old TTF parser, not the font file. GD's FreeType-based text rendering (the same
    // engine underlying most system/browser text rendering) draws it correctly, so the typed
    // text is rendered to an image here and placed into the PDF via Image() instead of Cell().
    private function cursiveTextImage(string $text, array $rgb, int $fontSizePx = 70): ?array
    {
        $ttf = FCPATH . 'app/Libraries/TCPDF/fonts/dancingscript-bold-raw.ttf';
        $text = trim($text);
        if ($text === '' || !is_file($ttf) || !function_exists('imagettftext')) {
            return null;
        }

        $bbox = imagettfbbox($fontSizePx, 0, $ttf, $text);
        $minX = min($bbox[0], $bbox[2], $bbox[4], $bbox[6]);
        $maxX = max($bbox[0], $bbox[2], $bbox[4], $bbox[6]);
        $minY = min($bbox[1], $bbox[3], $bbox[5], $bbox[7]);
        $maxY = max($bbox[1], $bbox[3], $bbox[5], $bbox[7]);
        $pad = (int) round($fontSizePx * 0.15);
        $imgW = ($maxX - $minX) + ($pad * 2);
        $imgH = ($maxY - $minY) + ($pad * 2);
        if ($imgW <= 0 || $imgH <= 0) {
            return null;
        }

        $img = imagecreatetruecolor($imgW, $imgH);
        imagesavealpha($img, true);
        imagefill($img, 0, 0, imagecolorallocatealpha($img, 255, 255, 255, 127));
        $color = imagecolorallocate($img, $rgb[0], $rgb[1], $rgb[2]);
        imagettftext($img, $fontSizePx, 0, $pad - $minX, $pad - $minY, $color, $ttf, $text);

        $tmpPath = sys_get_temp_dir() . '/agreement_cursive_' . uniqid('', true) . '.png';
        imagepng($img, $tmpPath);
        imagedestroy($img);

        return ['path' => $tmpPath, 'width' => $imgW, 'height' => $imgH];
    }

    // Places a cursiveTextImage() result into the PDF, scaled down (never up) to fit within
    // the given box, and cleans up the temp file afterward.
    private function placeCursiveImage(AgreementPdf $pdf, array $img, float $x, float $y, float $maxW, float $maxH, string $align = 'left'): void
    {
        $dpi = 200;
        $wMm = $img['width'] / $dpi * 25.4;
        $hMm = $img['height'] / $dpi * 25.4;
        $scale = min($maxW / $wMm, $maxH / $hMm, 1);
        $drawW = $wMm * $scale;
        $drawH = $hMm * $scale;
        $drawX = $align === 'center' ? $x + (($maxW - $drawW) / 2) : $x;
        $drawY = $y + (($maxH - $drawH) / 2);
        $pdf->Image($img['path'], $drawX, $drawY, $drawW, $drawH, 'PNG', '', '', false, 300);
        @unlink($img['path']);
    }

    // writeHTML() styling (e.g. the fee table's red "TOTAL PAYABLE" row) can leave TCPDF's
    // internal font/colour state changed after the call returns; call this before writing
    // plain body content so it always starts from the same clean baseline.
    private function resetTextState(AgreementPdf $pdf): void
    {
        $pdf->SetFont('helvetica', '', 9.5);
        $pdf->SetTextColor(30, 30, 30);
    }

    // Keyed by page_number, for O(1) lookup while looping clause pages.
    private function indexPageInitials(int $agreementId): array
    {
        $rows = (new Agreement_page_initial_model())->getByAgreementId($agreementId);
        $byPage = [];
        foreach ($rows as $row) {
            $byPage[(int) $row['page_number']] = $row;
        }
        return $byPage;
    }

    // Page 1 only: doc title, red subtitle, meta row, and the client/RCIC info boxes —
    // mirrors sign.php's #page-1 header block.
    private function titleBlockHtml(array $agreement, string $typeLabel): string
    {
        $html  = '<h1 style="text-align:center;font-size:19px;margin-bottom:2px;">SERVICE AGREEMENT</h1>';
        $html .= '<p style="text-align:center;color:#e23b3b;font-weight:bold;font-size:11.5px;margin-top:0;">' . esc($typeLabel) . '</p>';
        $html .= '<table cellpadding="0" style="width:100%;font-size:9px;color:#6b7280;">
            <tr>
                <td width="50%">SiaID: ' . (int) ($agreement['prospect_id'] ?? 0) . '</td>
                <td width="50%" align="right">' . esc($agreement['agreement_date'] ?? '—') . '</td>
            </tr>
        </table><br>';

        $html .= '<table cellpadding="7" style="width:100%;font-size:9px;">
            <tr>
                <td width="49%" style="background-color:#fafafa;border:0.5px solid #eceef1;">
                    <span style="color:#e23b3b;font-weight:bold;font-size:9.5px;">CLIENT INFORMATION</span><br><br>
                    Name: ' . esc($agreement['client_name'] ?? '—') . '<br>
                    Phone: ' . esc($agreement['client_phone'] ?? '—') . '<br>
                    Email: ' . esc($agreement['client_email'] ?? '—') . '<br>
                    Address: ' . esc($agreement['client_address'] ?: '—') . '
                </td>
                <td width="2%"></td>
                <td width="49%" style="background-color:#fafafa;border:0.5px solid #eceef1;">
                    <span style="color:#e23b3b;font-weight:bold;font-size:9.5px;">RCIC INFORMATION</span><br><br>
                    Name: ' . esc($agreement['consultant_name'] ?: 'Sia Immigration Solutions Inc.') . '<br>
                    RCIC#: ' . esc($agreement['rcic_number'] ?: '—') . '<br>
                    Address: #304, 8318 120 Street, Surrey, BC V3W 3N4, Canada<br>#301, 246 2 Ave, Kamloops, BC V2C 2C9, Canada
                </td>
            </tr>
        </table><br>';

        return $html;
    }

    // Pages 2+: the small uppercase "Retainer Agreement — Page N of Total" strip that
    // replaces the title block on every page after the first.
    private function runningHeaderHtml(int $pageNum, int $totalPages): string
    {
        return '<p style="font-size:8.5px;color:#9aa0aa;text-transform:uppercase;letter-spacing:1px;
            border-bottom:0.4px solid #eceef1;padding-bottom:4px;margin-bottom:10px;">
            RETAINER AGREEMENT — PAGE ' . $pageNum . ' OF ' . $totalPages . '</p>';
    }

    // The client's actual fee amounts (service fee/GST/government fee/milestones), shown
    // once on page 1 ahead of the numbered clauses rather than as its own numbered section.
    private function feesHtml(array $agreement, array $milestones, array $additionalFees): string
    {
        $html = '<p style="font-size:9.5px;">The Client agrees to pay the following fees for the services:</p>';
        $html .= '<table cellpadding="3" style="width:100%;font-size:9.5px;" border="0.5">
            <tr><td>Professional Service Fee</td><td align="right">' . $this->money($agreement, $agreement['service_fee']) . '</td></tr>
            <tr><td>GST (' . esc($agreement['gst_rate']) . '%) on Service Fee</td><td align="right">' . $this->money($agreement, $agreement['gst_amount']) . '</td></tr>';

        $govtGroup = false;
        foreach (AgreementClauses::governmentFeeLines($agreement) as $line) {
            if ($line['group'] !== $govtGroup && $line['group'] !== null) {
                $govtGroup = $line['group'];
                $html .= '<tr><td colspan="2"><b>' . esc($line['group']) . '</b></td></tr>';
            }
            $indent = $line['group'] !== null ? 'padding-left:10px;' : '';
            $html .= '<tr><td style="' . $indent . '">' . esc($line['label']) . '</td><td align="right">' . $this->money($agreement, $line['amount']) . '</td></tr>';
        }
        $html .= '</table>';

        $html .= '<p style="font-size:9.5px;color:#e23b3b;"><b>PAYMENT SCHEDULE / MILESTONES</b></p><table cellpadding="3" style="width:100%;font-size:9px;" border="0.5">
            <tr><td><b>Milestone</b></td><td><b>Timeline</b></td><td><b>Amount (GST Included)</b></td></tr>';
        foreach ($milestones as $m) {
            $amt = $m['amount'] !== null ? $this->money($agreement, (float) $m['amount'] * 1.05) : 'Included';
            $html .= '<tr><td>' . esc($m['milestone']) . '</td><td>' . (esc($m['due_date']) ?: '—') . '</td><td>' . $amt . '</td></tr>';
        }
        $html .= '</table>';

        $html .= '<p style="font-size:9.5px;color:#e23b3b;"><b>ADDITIONAL FEES (IF APPLICABLE)</b></p><table cellpadding="3" style="width:100%;font-size:9px;" border="0.5">
            <tr><td><b>Description</b></td><td><b>Amount (GST Included)</b></td></tr>';
        foreach ($additionalFees as $f) {
            $html .= '<tr><td>' . esc($f['description']) . '</td><td>' . $this->money($agreement, (float) $f['amount'] * 1.05) . '</td></tr>';
        }
        $html .= '</table>';

        $html .= '<table cellpadding="3" style="width:100%;font-size:9.5px;" border="0.5">
            <tr style="background-color:#fdf1f1;"><td><b style="color:#e23b3b;">TOTAL PAYABLE</b></td><td align="right"><b style="color:#e23b3b;">' . $this->money($agreement, $agreement['total_amount']) . '</b></td></tr>
        </table>';

        $html .= '<p style="font-size:8.5px;color:#777;">All fees are non-refundable except as outlined in the Refund Policy.</p><br>';

        return $html;
    }

    private function clauseHtml(array $clause): string
    {
        $html = '<h3 style="color:#e23b3b;font-size:12px;">' . esc($clause['title']) . '</h3>';
        foreach ($clause['blocks'] as $block) {
            if ($block['type'] === 'p') {
                $html .= '<p style="font-size:9.5px;">' . esc($block['text']) . '</p>';
            } elseif ($block['type'] === 'h') {
                $html .= '<p style="font-size:9.5px;font-weight:bold;margin-bottom:2px;">' . esc($block['text']) . '</p>';
            } elseif ($block['type'] === 'bullets') {
                $html .= '<ul style="font-size:9.5px;">';
                foreach ($block['items'] as $b) {
                    $html .= '<li>' . esc($b) . '</li>';
                }
                $html .= '</ul>';
            } elseif ($block['type'] === 'html') {
                // Admin-edited via the rich-text clause editor; trusted, not client input.
                $html .= '<div style="font-size:9.5px;">' . $block['html'] . '</div>';
            }
        }
        return $html;
    }

    // Small red-bordered box right after each clause's content, echoing sign.php's
    // ".sg-initial-box" that sits bottom-right of every page the client initials.
    private function drawPageInitial(AgreementPdf $pdf, ?array $initialRow): void
    {
        $w = 46;
        $h = 11;
        $x = 195 - $w;
        $y = $pdf->GetY() + 3;

        if ($y + $h > 275) {
            // Clause overflowed onto a fresh page (very long clause) — anchor to that page instead.
            $pdf->AddPage();
            $y = $pdf->GetY();
        }

        $pdf->RoundedRect($x, $y, $w, $h, 1.5, '1111', 'D', ['width' => 0.3, 'color' => [226, 59, 59]]);

        if ($initialRow && $initialRow['initial_type'] === 'type' && !empty($initialRow['typed_initials'])) {
            // Cursive "Dancing Script" rendering, matching the ".sg-typed-input" style the
            // client actually typed into on sign.php — plain Helvetica here made the initial
            // look like flat typed letters, not a signature. Rendered via GD (see
            // cursiveTextImage()), not TCPDF's own font engine — see that method for why.
            $img = $this->cursiveTextImage(strtoupper($initialRow['typed_initials']), [226, 59, 59]);
            if ($img) {
                $this->placeCursiveImage($pdf, $img, $x + 2, $y + 1, $w - 4, $h - 2, 'center');
            }
        } elseif ($initialRow && !empty($initialRow['initial_path'])) {
            $path = './' . ltrim($initialRow['initial_path'], '/');
            if (is_file($path)) {
                $pdf->Image($path, $x + 3, $y + 1.5, 0, $h - 3, '', '', '', false, 150);
            }
        }

        $pdf->SetY($y + $h);
    }

    // Signature block isn't pure HTML (embeds actual signature image files), so it's
    // written directly against the TCPDF instance rather than through writeHTML. Always
    // starts on a fresh page (called right after AddPage()) so the fixed Y offsets below
    // never run past the page bottom and force an unwanted extra page per line.
    private function writeSignaturePage(AgreementPdf $pdf, array $agreement): void
    {
        $pdf->Ln(4);

        // "Signed" status panel, echoing sign.php's ".sg-signed-box".
        $y = $pdf->GetY();
        $pdf->RoundedRect(15, $y, 180, 16, 2, '1111', 'F', [], [232, 248, 238]);
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->SetTextColor(30, 126, 66);
        $pdf->SetXY(20, $y + 5);
        $pdf->Cell(0, 6, 'This agreement has been signed electronically.', 0, 1);
        $pdf->SetY($y + 22);

        // Acknowledgement box.
        $y = $pdf->GetY();
        $pdf->RoundedRect(15, $y, 180, 45, 2, '1111', 'DF', ['width' => 0.3, 'color' => [191, 232, 207]], [232, 248, 238]);

        $pdf->SetXY(20, $y + 4);
        $pdf->SetFont('helvetica', 'B', 9.5);
        $pdf->SetTextColor(30, 126, 66);
        $pdf->Cell(0, 5, 'ACKNOWLEDGEMENT', 0, 1);
        $pdf->SetX(20);
        $pdf->SetFont('helvetica', '', 8.5);
        $pdf->SetTextColor(60, 60, 60);
        $pdf->MultiCell(170, 4, 'By signing below, the Client confirms that they have read, understood, and agree to the terms and conditions of this Retainer Agreement.', 0, 'L');

        $sigY = $y + 16;

        $pdf->SetFont('helvetica', 'B', 8);
        $pdf->SetTextColor(226, 59, 59);
        $pdf->SetXY(20, $sigY);
        $pdf->Cell(80, 4, "RCIC'S SIGNATURE", 0, 0);
        $pdf->SetXY(110, $sigY);
        $pdf->Cell(80, 4, 'CLIENT SIGNATURE', 0, 0);

        $sigImgY = $sigY + 5;
        $rcicSignature = FCPATH . 'public/assets_client/img/rcic_signature.png';
        if (is_file($rcicSignature)) {
            $pdf->Image($rcicSignature, 20, $sigImgY, 32, 0, '', '', '', false, 150);
        }

        if ($agreement['client_signature_type'] === 'type' && !empty($agreement['client_typed_name'])) {
            // Same cursive rendering as the per-page initial box (see cursiveTextImage()),
            // matching what the client actually typed into sign.php's cursive
            // ".sg-typed-input" signature field.
            $img = $this->cursiveTextImage($agreement['client_typed_name'], [30, 30, 30], 90);
            if ($img) {
                $this->placeCursiveImage($pdf, $img, 110, $sigImgY - 3, 75, 12, 'left');
            }
        } elseif (!empty($agreement['client_signature'])) {
            $path = './' . ltrim($agreement['client_signature'], '/');
            if (is_file($path)) {
                $pdf->Image($path, 110, $sigImgY, 40, 0, '', '', '', false, 150);
            }
        }

        $pdf->SetFont('helvetica', '', 8);
        $pdf->SetTextColor(90, 90, 90);
        $pdf->SetXY(20, $sigImgY + 11);
        $pdf->Cell(80, 4, 'Name: ' . ($agreement['consultant_name'] ?: 'Sia Immigration Solutions Inc.'), 0, 0);
        $pdf->SetXY(110, $sigImgY + 11);
        $pdf->Cell(80, 4, 'Name: ' . ($agreement['client_name'] ?? ''), 0, 0);

        $signedDate = !empty($agreement['client_signed_at']) ? date('M j, Y', strtotime($agreement['client_signed_at'])) : '—';
        $pdf->SetXY(20, $sigImgY + 15);
        $pdf->Cell(80, 4, 'Date: ' . $signedDate, 0, 0);
        $pdf->SetXY(110, $sigImgY + 15);
        $pdf->Cell(80, 4, 'Date: ' . $signedDate, 0, 0);

        $pdf->SetY($y + 47);
    }

    // Green checkmark + status line at the top of the certificate page, written directly
    // (rather than as an HTML entity) since the core Helvetica font has no glyph for it.
    private function writeCertificateStatus(AgreementPdf $pdf): void
    {
        $pdf->Ln(2);
        $pdf->SetFont('dejavusans', '', 11);
        $pdf->SetTextColor(39, 174, 96);
        $pdf->Cell(0, 8, "\xe2\x9c\x93 Document Signed Successfully", 0, 1, 'C');
        $pdf->SetFont('helvetica', '', 9);
    }

    private function certificateHtml(array $agreement): string
    {
        $signedOn = !empty($agreement['client_signed_at']) ? date('F j, Y \a\t g:i A', strtotime($agreement['client_signed_at'])) : '—';
        $viewedOn = !empty($agreement['viewed_at']) ? date('F j, Y \a\t g:i A', strtotime($agreement['viewed_at'])) : '—';
        $certificateId = strtoupper(substr(hash('sha256', $agreement['id'] . '|' . ($agreement['sign_token'] ?? '') . '|' . ($agreement['client_signed_at'] ?? '')), 0, 16));

        $html  = '<br><table cellpadding="4" style="width:100%;font-size:9.5px;" border="0.5">
            <tr><td width="35%"><b>Reference No.</b></td><td>' . esc($agreement['reference_number'] ?? '—') . '</td></tr>
            <tr><td><b>Document Name</b></td><td>Retainer Agreement</td></tr>
            <tr><td><b>Client Name</b></td><td>' . esc($agreement['client_name'] ?? '—') . '</td></tr>
            <tr><td><b>Client Email</b></td><td>' . esc($agreement['client_email'] ?? '—') . '</td></tr>
            <tr><td><b>Consultant</b></td><td>' . esc($agreement['consultant_name'] ?: 'Sia Immigration Solutions Inc.') . ' (RCIC# ' . esc($agreement['rcic_number'] ?: '—') . ')</td></tr>
            <tr><td><b>Viewed On</b></td><td>' . esc($viewedOn) . '  (IP: ' . esc($agreement['viewed_ip'] ?? '—') . ')</td></tr>
            <tr><td><b>Signed On</b></td><td>' . esc($signedOn) . '  (IP: ' . esc($agreement['client_signed_ip'] ?? '—') . ')</td></tr>
            <tr><td><b>Signature Method</b></td><td>' . esc(ucfirst($agreement['client_signature_type'] ?? '—')) . '</td></tr>
            <tr><td><b>Device / Browser</b></td><td style="font-size:8px;">' . esc($agreement['client_signed_device'] ?? '—') . '</td></tr>
            <tr><td><b>Consent</b></td><td>Client confirmed agreement to the terms and consented to sign electronically.</td></tr>
            <tr><td><b>Certificate ID</b></td><td>' . esc($certificateId) . '</td></tr>
        </table><br>';

        $html .= '<p style="text-align:center;font-size:9px;color:#666;">This document has been electronically signed and is legally binding.<br>You may download and print a copy for your records.</p>';

        return $html;
    }
}
