<?php namespace App\Libraries\Declaration;

use App\Libraries\Agreement\AgreementPdf;

require_once APPPATH . 'Libraries/Agreement/AgreementPdf.php';

// Pure-PHP (TCPDF) renderer for a signed Disclaimer/Consent document. Reuses the Agreement
// module's branded page chrome (AgreementPdf: SIA letterhead, gradient bar, corner ribbons,
// watermark, footer) since it's generic to the whole app, not specific to retainer
// agreements — a single simple document (no per-page clauses/initials like the Agreement
// module) so this builder is a lot smaller than AgreementPdfBuilder.
class DeclarationPdfBuilder
{
    public function build(array $declaration): string
    {
        $pdf = new AgreementPdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator('SIA Immigration Solutions Inc.');
        $pdf->SetAuthor('SIA Immigration Solutions Inc.');
        $pdf->SetTitle($declaration['title'] ?? 'Disclaimer / Consent');
        $pdf->setPrintHeader(true);
        $pdf->setPrintFooter(true);
        $pdf->SetMargins(15, 28, 15);
        $pdf->SetHeaderMargin(8);
        $pdf->SetFooterMargin(16);
        $pdf->SetAutoPageBreak(true, 22);

        $pdf->AddPage();
        $this->resetTextState($pdf);
        $pdf->writeHTML($this->titleBlockHtml($declaration), true, false, true, false, '');
        $this->resetTextState($pdf);
        $pdf->writeHTML($this->contentHtml($declaration), true, false, true, false, '');
        $this->resetTextState($pdf);
        $this->writeSignatureBlock($pdf, $declaration);
        $this->resetTextState($pdf);
        $pdf->writeHTML($this->certificateHtml($declaration), true, false, true, false, '');

        $filename = 'declaration_' . (int) $declaration['id'] . '_' . time() . '.pdf';
        $pdf->Output($this->pdfDir() . $filename, 'F');

        return 'assets/declaration_pdfs/' . $filename;
    }

    // Must be an absolute path: TCPDF's file-output mode prepends "file://" to whatever
    // path it's given, and "file://./..." gets parsed as a remote host (".") and rejected.
    private function pdfDir(): string
    {
        $dir = FCPATH . 'assets/declaration_pdfs/';
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        return $dir;
    }

    private function resetTextState(AgreementPdf $pdf): void
    {
        $pdf->SetFont('helvetica', '', 9.5);
        $pdf->SetTextColor(30, 30, 30);
    }

    private function titleBlockHtml(array $declaration): string
    {
        $html  = '<h1 style="text-align:center;font-size:18px;margin-bottom:2px;">' . esc(strtoupper($declaration['title'] ?? 'DECLARATION OF CONSENT')) . '</h1>';
        if (!empty($declaration['consent_type'])) {
            $html .= '<p style="text-align:center;color:#e23b3b;font-weight:bold;font-size:11px;margin-top:0;">' . esc($declaration['consent_type']) . '</p>';
        }
        $html .= '<table cellpadding="7" style="width:100%;font-size:9px;margin-top:6px;">
            <tr>
                <td width="49%" style="background-color:#fafafa;border:0.5px solid #eceef1;">
                    Client: ' . esc($declaration['client_name'] ?? '—') . '<br>
                    SiaID: ' . (int) ($declaration['prospect_id'] ?? 0) . '
                </td>
                <td width="2%"></td>
                <td width="49%" style="background-color:#fafafa;border:0.5px solid #eceef1;">
                    Date: ' . esc(!empty($declaration['consent_date']) ? date('F j, Y', strtotime($declaration['consent_date'])) : date('F j, Y')) . '<br>
                    Prepared by: ' . esc($declaration['consultant_name'] ?: 'Sia Immigration Solutions Inc.') . '
                </td>
            </tr>
        </table><br>';

        return $html;
    }

    // The admin-authored rich text is trusted (staff-only editor), not client input.
    private function contentHtml(array $declaration): string
    {
        $content = (string) ($declaration['content'] ?? '');
        return '<div style="font-size:9.5px;">' . $content . '</div><br>';
    }

    private function writeSignatureBlock(AgreementPdf $pdf, array $declaration): void
    {
        // The block below spans ~51mm (16mm status box + 22mm gap + 24mm signature/name/date
        // rows -- plus writeHTML() before this call may have left extra breathing room via
        // its own trailing margin). With the 16mm footer margin, anything starting past ~220mm
        // would run past the printable area, so break to a fresh page well before that.
        $y = $pdf->GetY();
        if ($y > 220) {
            $pdf->AddPage();
            $y = $pdf->GetY();
        }

        $pdf->RoundedRect(15, $y, 180, 16, 2, '1111', 'F', [], [232, 248, 238]);
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->SetTextColor(30, 126, 66);
        $pdf->SetXY(20, $y + 5);
        $pdf->Cell(0, 6, 'This document has been signed electronically.', 0, 1);
        $y += 22;

        $pdf->SetFont('helvetica', 'B', 8);
        $pdf->SetTextColor(226, 59, 59);
        $pdf->SetXY(20, $y);
        $pdf->Cell(80, 4, 'CLIENT SIGNATURE', 0, 0);
        if (!empty($declaration['require_initials'])) {
            $pdf->SetXY(140, $y);
            $pdf->Cell(50, 4, 'INITIALS', 0, 0);
        }

        $sigImgY = $y + 5;
        if ($declaration['client_signature_type'] === 'type' && !empty($declaration['client_typed_name'])) {
            $pdf->SetFont('times', 'BI', 16);
            $pdf->SetTextColor(30, 30, 30);
            $pdf->SetXY(20, $sigImgY);
            $pdf->Cell(80, 8, $declaration['client_typed_name'], 0, 0);
        } elseif (!empty($declaration['client_signature'])) {
            $path = './' . ltrim($declaration['client_signature'], '/');
            if (is_file($path)) {
                $pdf->Image($path, 20, $sigImgY, 40, 0, '', '', '', false, 150);
            }
        }

        if (!empty($declaration['require_initials'])) {
            if ($declaration['client_initials_type'] === 'type' && !empty($declaration['client_typed_initials'])) {
                $pdf->SetFont('times', 'BI', 14);
                $pdf->SetTextColor(30, 30, 30);
                $pdf->SetXY(140, $sigImgY);
                $pdf->Cell(50, 8, $declaration['client_typed_initials'], 0, 0);
            } elseif (!empty($declaration['client_initials'])) {
                $path = './' . ltrim($declaration['client_initials'], '/');
                if (is_file($path)) {
                    $pdf->Image($path, 140, $sigImgY, 20, 0, '', '', '', false, 150);
                }
            }
        }

        $pdf->SetFont('helvetica', '', 8);
        $pdf->SetTextColor(90, 90, 90);
        $pdf->SetXY(20, $sigImgY + 12);
        $pdf->Cell(80, 4, 'Name: ' . ($declaration['client_name'] ?? ''), 0, 0);

        $signedDate = !empty($declaration['client_signed_at']) ? date('M j, Y', strtotime($declaration['client_signed_at'])) : '—';
        $pdf->SetXY(20, $sigImgY + 16);
        $pdf->Cell(80, 4, 'Date: ' . $signedDate, 0, 0);

        $pdf->SetY($sigImgY + 24);
    }

    private function certificateHtml(array $declaration): string
    {
        $signedOn = !empty($declaration['client_signed_at']) ? date('F j, Y \a\t g:i A', strtotime($declaration['client_signed_at'])) : '—';
        $viewedOn = !empty($declaration['viewed_at']) ? date('F j, Y \a\t g:i A', strtotime($declaration['viewed_at'])) : '—';
        $certificateId = strtoupper(substr(hash('sha256', $declaration['id'] . '|' . ($declaration['sign_token'] ?? '') . '|' . ($declaration['client_signed_at'] ?? '')), 0, 16));

        $html = '<hr style="border:0.5px solid #eceef1;"><p style="font-size:9.5px;font-weight:bold;color:#e23b3b;">SIGNATURE CERTIFICATE</p>';
        $html .= '<table cellpadding="4" style="width:100%;font-size:9px;" border="0.5">
            <tr><td width="35%"><b>Client Name</b></td><td>' . esc($declaration['client_name'] ?? '—') . '</td></tr>
            <tr><td><b>Client Email</b></td><td>' . esc($declaration['client_email'] ?? '—') . '</td></tr>
            <tr><td><b>Viewed On</b></td><td>' . esc($viewedOn) . '  (IP: ' . esc($declaration['viewed_ip'] ?? '—') . ')</td></tr>
            <tr><td><b>Signed On</b></td><td>' . esc($signedOn) . '  (IP: ' . esc($declaration['client_signed_ip'] ?? '—') . ')</td></tr>
            <tr><td><b>Signature Method</b></td><td>' . esc(ucfirst($declaration['client_signature_type'] ?? '—')) . '</td></tr>
            <tr><td><b>Device / Browser</b></td><td style="font-size:8px;">' . esc($declaration['client_signed_browser'] ?: ($declaration['client_signed_device'] ?? '—')) . '</td></tr>
            <tr><td><b>Certificate ID</b></td><td>' . esc($certificateId) . '</td></tr>
        </table>';

        return $html;
    }
}
