<?php namespace App\Libraries\Agreement;

require_once APPPATH . 'Libraries/TCPDF/tcpdf.php';

// Thin TCPDF subclass that repeats the SIA letterhead/footer on every page of the
// generated agreement PDF. Mirrors the branded "page card" look of the client-facing
// eSign page (app/Views/agreement/sign.php): logo lettermark row, multi-colour gradient
// bar, folded-corner ribbons, and a faint centered watermark behind the content.
//
// This is the fallback renderer used by AgreementPdfBuilder when AgreementHtmlPdfBuilder's
// headless-Chrome mirror isn't available on the server (no Chrome/Chromium binary installed) —
// pure PHP, no external process required, so it always works, at the cost of not being a
// byte-for-byte match to the browser page the way the Chrome-rendered version is.
class AgreementPdf extends \TCPDF
{
    private const SIA_LOGO  = FCPATH . 'public/assets_client/img/sia_logo.png';
    private const RCIC_LOGO = FCPATH . 'public/assets_client/img/rcic_logo.png';
    private const WATERMARK = FCPATH . 'public/assets_client/img/sia_watermark.png';

    public function Header()
    {
        // Logo heights sized to roughly the same proportion of the page width as the eSign
        // page's 34px/30px logos are of its ~950px page card (~8.5% / ~7.5%).
        if (is_file(self::SIA_LOGO)) {
            $this->Image(self::SIA_LOGO, 15, 9, 0, 8, 'PNG');
        }
        if (is_file(self::RCIC_LOGO)) {
            $this->Image(self::RCIC_LOGO, 195 - 17, 9.5, 0, 7, 'PNG');
        }

        // Multi-colour gradient bar, matching the eSign page's ".sg-gradient-bar".
        $stops = [[226, 59, 59], [243, 156, 18], [46, 204, 113], [52, 152, 219], [142, 68, 173]];
        $segW  = 180 / (count($stops) - 1);
        for ($i = 0; $i < count($stops) - 1; $i++) {
            $this->LinearGradient(15 + $i * $segW, 19, $segW, 1.3, $stops[$i], $stops[$i + 1]);
        }

        $this->drawCornerRibbon(0);
        $this->drawCornerRibbon(297);
        $this->drawWatermark();
    }

    // Folded-corner ribbon in the top-right or bottom-right, echoing the ".sg-pdf-page"
    // background gradients on the client-facing signing page.
    private function drawCornerRibbon(float $edgeY): void
    {
        $dir = $edgeY === 0.0 ? 1 : -1; // grows downward from top edge, upward from bottom edge
        $this->setAlpha(0.85);
        $this->Polygon(
            [210, $edgeY, 210, $edgeY + (5.5 * $dir), 204.5, $edgeY],
            'F', [], [226, 59, 59]
        );
        $this->setAlpha(1);

        $this->setAlpha(0.15);
        $this->SetLineStyle(['width' => 0.4, 'color' => [31, 36, 48]]);
        $this->Line(203.4, $edgeY + (6 * $dir), 210, $edgeY + (0.3 * $dir));
        $this->setAlpha(1);
    }

    // The watermark PNG is already ~95% transparent by design (thin logo strokes on a
    // transparent background) — draw it at full opacity so the PNG's own transparency does
    // the work; stacking TCPDF alpha on top of that compounds to invisible.
    private function drawWatermark(): void
    {
        if (!is_file(self::WATERMARK)) {
            return;
        }
        $w = 110;
        $h = $w * (335 / 779);
        $this->Image(self::WATERMARK, (210 - $w) / 2, (297 - $h) / 2, $w, $h, 'PNG');
    }

    public function Footer()
    {
        $this->SetLineStyle(['width' => 0.2, 'color' => [236, 238, 241]]);
        $this->Line(15, 279, 195, 279);

        $this->SetY(-15);
        $this->SetFont('helvetica', '', 7.5);
        $this->SetTextColor(120, 120, 120);
        $this->SetX(15);
        $this->Cell(120, 5, '+1 778-238-8172   |   Consult@siaimmigration.com   |   www.siaimmigration.com', 0, 0, 'L');

        $this->SetFont('helvetica', 'B', 8);
        $this->SetTextColor(226, 59, 59);
        $this->SetX(-45);
        $this->Cell(30, 5, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, 0, 'R');
    }
}
