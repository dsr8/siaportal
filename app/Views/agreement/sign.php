<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title><?php echo esc($typeLabel); ?> - SIA Immigration eSign</title>
        <link rel="icon" type="image/png" href="<?php echo base_url();?>/public/assets_client/img/favicon.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500;700&display=swap" rel="stylesheet">
        <style>
            :root { --sg-red: #e23b3b; }
            * { box-sizing: border-box; }
            body { margin: 0; font-family: 'Segoe UI', Arial, sans-serif; color: #1f2430; background: #f4f5f7; }

            .sg-topbar { background: #fff; border-bottom: 1px solid #eceef1; }
            .sg-topbar-inner { max-width: 1180px; margin: 0 auto; padding: 16px 20px; display: flex; justify-content: space-between; align-items: center; }
            .sg-brand { display: flex; align-items: center; gap: 10px; }
            .sg-brand img { height: 40px; }
            .sg-brand .name { font-weight: 800; color: var(--sg-red); font-size: 16px; line-height: 1.1; }
            .sg-brand .name small { display: block; color: #9aa0aa; font-weight: 400; font-size: 10.5px; }
            .sg-rcic-badge img { height: 40px; width: auto; }
            .sg-gradient-bar { height: 4px; background: linear-gradient(90deg,#e23b3b,#f39c12,#2ecc71,#3498db,#8e44ad); }

            .sg-page { max-width: 1180px; margin: 0 auto; padding: 22px 20px 60px; }
            .sg-header-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; flex-wrap: wrap; gap: 10px; }
            .sg-header-row h4 { margin: 0; font-size: 16px; }
            .sg-badge { font-size: 11.5px; font-weight: 700; padding: 4px 12px; border-radius: 12px; }
            .sg-badge-sent, .sg-badge-viewed { background: #fff6df; color: #b9840c; }
            .sg-badge-signed { background: #e8f8ee; color: #27ae60; }
            .sg-badge-declined { background: #fdecec; color: #e23b3b; }

            .sg-alert { border-radius: 10px; padding: 12px 16px; margin-bottom: 18px; font-size: 13.5px; }
            .sg-alert-success { background: #e8f8ee; color: #1e7e42; border: 1px solid #bfe8cf; }
            .sg-alert-error { background: #fdecec; color: #c0392b; border: 1px solid #f5c6c2; }

            .sg-grid { display: flex; gap: 20px; align-items: flex-start; }
            .sg-toc { flex: 0 0 210px; position: sticky; top: 16px; }
            .sg-toc-card { background: #fff; border-radius: 14px; padding: 16px; box-shadow: 0 2px 10px rgba(20,20,43,0.05); }
            .sg-toc-card .h { font-size: 11px; font-weight: 700; color: #9aa0aa; letter-spacing: .03em; margin-bottom: 10px; }
            .sg-toc-card a { display: flex; justify-content: space-between; align-items: center; padding: 7px 0; font-size: 12.5px; color: #1f2430; text-decoration: none; border-bottom: 1px solid #f4f4f6; cursor: pointer; }
            .sg-toc-card a:last-child { border-bottom: none; }
            .sg-toc-card a .tick { display: inline-flex; align-items: center; justify-content: center; flex: 0 0 18px; width: 18px; height: 18px; border-radius: 50%; font-size: 10px; border: 1.5px solid #d8dce1; color: transparent; background: #fff; }
            .sg-toc-card a .tick.tick-done { background: #2ecc71; border-color: #2ecc71; color: #fff; }
            .sg-toc-card a.sg-page-done { color: #2ecc71; font-weight: 700; }
            .sg-toc-note { background: #eef4ff; border-radius: 10px; padding: 12px 14px; font-size: 12px; margin-top: 14px; }

            .sg-doc-col { flex: 1; min-width: 0; }
            .sg-card { background: #fff; border-radius: 14px; padding: 26px 30px; box-shadow: 0 2px 10px rgba(20,20,43,0.05); margin-bottom: 18px; }
            .sg-doc-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; }
            .sg-doc-title { text-align: center; font-weight: 800; font-size: 17px; margin: 6px 0 2px; }
            .sg-doc-subtitle { text-align: center; color: var(--sg-red); font-weight: 700; font-size: 12.5px; margin-bottom: 12px; }
            .sg-doc-meta { display: flex; justify-content: space-between; font-size: 11.5px; color: #6b7280; margin-bottom: 14px; }
            .sg-info-grid { display: flex; gap: 14px; margin-bottom: 14px; }
            .sg-info-box { flex: 1; font-size: 11.5px; background: #fafafa; border: 1px solid #eceef1; border-radius: 10px; padding: 10px 12px; }
            .sg-info-box .h { display: flex; align-items: center; gap: 6px; color: var(--sg-red); font-weight: 700; margin-bottom: 6px; font-size: 11px; }
            .sg-info-box .h .badge-icon { display: inline-flex; align-items: center; justify-content: center; flex: 0 0 20px; width: 20px; height: 20px; border-radius: 50%; background: #fdf1f1; font-size: 11px; }
            .sg-info-box div { margin-bottom: 2px; }
            .sg-preview-title { color: var(--sg-red); font-weight: 700; font-size: 11.5px; margin: 10px 0 6px; }

            .sg-section { margin-bottom: 20px; scroll-margin-top: 16px; }
            .sg-section h5 { color: var(--sg-red); font-weight: 700; font-size: 13.5px; margin: 0 0 8px; }
            .sg-section p, .sg-section li { font-size: 13px; line-height: 1.6; color: #333; }
            .sg-section ul { margin: 6px 0; padding-left: 20px; }
            hr.sg-sep { border: none; border-top: 1px solid #eceef1; margin: 18px 0; }

            .sg-fee-table { width: 100%; font-size: 12px; border-collapse: collapse; margin-bottom: 10px; }
            .sg-fee-table td { padding: 4px 8px; border-bottom: 1px solid #f4f4f6; }
            .sg-fee-table td:last-child { text-align: right; }
            .sg-total-payable { display: flex; align-items: center; justify-content: space-between; background: #fdf1f1; border: 1px solid var(--sg-red); border-radius: 8px; padding: 12px 18px; margin-top: 4px; }
            .sg-total-payable .h { font-weight: 800; color: var(--sg-red); font-size: 15px; letter-spacing: .02em; text-transform: uppercase; }
            .sg-total-payable .amt { font-weight: 800; color: var(--sg-red); font-size: 19px; }
            .sg-mini-table { width: 100%; font-size: 11px; border-collapse: collapse; }
            .sg-mini-table th, .sg-mini-table td { padding: 4px 6px; border-bottom: 1px solid #f4f4f6; text-align: left; }

            .sg-esign-panel { background: #fdf1f1; border: 1px solid #f6d3d3; border-radius: 12px; padding: 16px 20px; display: flex; justify-content: space-between; align-items: center; gap: 14px; flex-wrap: wrap; margin-bottom: 18px; }
            .sg-esign-panel .t { font-weight: 700; color: var(--sg-red); font-size: 14px; }
            .sg-esign-panel .s { font-size: 12.5px; color: #6b5959; }
            .sg-btn { padding: 11px 22px; border-radius: 8px; font-size: 14px; font-weight: 700; border: none; cursor: pointer; }
            .sg-btn-primary { background: #4c3ff5; color: #fff; }
            .sg-btn-primary:hover { background: #3c30d9; }
            .sg-btn-primary:disabled { background: #c9c6f9; cursor: not-allowed; }
            .sg-btn-outline { background: #fff; border: 1px solid #d8dce1 !important; color: #1f2430; }
            .sg-btn-outline:disabled { color: #c2c6cc; cursor: not-allowed; }
            .sg-btn-danger-outline { background: #fff; border: 1px solid #f2b8b5 !important; color: #c0392b; }

            .sg-sign-box { margin-top: 18px; border-top: 1px dashed #d8dce1; padding-top: 18px; }
            .sg-tabs { display: flex; gap: 8px; margin-bottom: 14px; }
            .sg-tab { padding: 8px 16px; border-radius: 20px; font-size: 12.5px; font-weight: 700; cursor: pointer; background: #f1f2f4; color: #6b7280; }
            .sg-tab.active { background: var(--sg-red); color: #fff; }
            .sg-tab-pane { display: none; }
            .sg-tab-pane.active { display: block; }

            #sgCanvas { border: 1.5px dashed #c7cbd1; border-radius: 8px; width: 100%; max-width: 480px; height: 160px; touch-action: none; background: #fff; }
            .sg-typed-input { font-family: 'Dancing Script', 'Brush Script MT', cursive; font-weight: 700; font-size: 34px; width: 100%; max-width: 480px; border: none; border-bottom: 2px solid #c7cbd1; padding: 6px 4px; background: transparent; }
            .sg-upload-preview { max-width: 320px; max-height: 140px; margin-top: 10px; border: 1px solid #eceef1; border-radius: 6px; display: none; }
            .sg-small-btn { background: none; border: 1px solid #d8dce1; border-radius: 6px; padding: 5px 12px; font-size: 12px; cursor: pointer; color: #444; margin-top: 8px; }

            .sg-consent { display: flex; align-items: flex-start; gap: 8px; margin: 18px 0; font-size: 12.5px; }
            .sg-consent input { margin-top: 3px; }

            .sg-sig-row { display: flex; gap: 24px; flex-wrap: wrap; margin-bottom: 18px; }
            .sg-sig-col { flex: 1; min-width: 220px; }
            .sg-sig-col .sig-area { height: 56px; display: flex; align-items: flex-end; }
            .sg-sig-col .sig-line { border-top: 1.5px solid #1f2430; padding-top: 4px; font-size: 11.5px; font-weight: 700; color: #1f2430; }
            .sg-rcic-sig-img { display: block; height: 46px; width: auto; }
            .sg-rcic-sig-name { font-size: 11px; color: #6b7280; font-weight: 400; margin-top: 1px; }

            .sg-signed-box { background: #e8f8ee; border: 1px solid #bfe8cf; border-radius: 12px; padding: 18px 20px; }
            .sg-signed-box .t { color: #1e7e42; font-weight: 700; font-size: 14px; margin-bottom: 6px; }
            .sg-signed-box img { max-height: 70px; margin-top: 8px; }

            .sg-swal-initials { border-radius: 18px !important; padding-bottom: 26px !important; }
            .sg-swal-initials .swal2-title { font-size: 19px !important; color: #1f2430 !important; padding-top: 22px !important; }
            .sg-swal-initials .swal2-content { font-size: 13.5px !important; color: #6b7280 !important; }
            .sg-swal-initials .swal2-input { border: 1.5px solid #d8dce1 !important; border-radius: 10px !important; height: 48px !important; font-size: 18px !important; font-weight: 700 !important; text-align: center; letter-spacing: 2px; text-transform: uppercase; box-shadow: none !important; margin-top: 10px !important; }
            .sg-swal-initials .swal2-input:focus { border-color: var(--sg-red) !important; }
            .sg-swal-initials .swal2-confirm, .sg-swal-initials .swal2-cancel { border-radius: 8px !important; font-weight: 700 !important; padding: 10px 22px !important; }
            .sg-swal-initials .swal2-cancel { background: #fff !important; color: #6b7280 !important; border: 1px solid #d8dce1 !important; }

            .sg-footer { display: flex; justify-content: space-around; text-align: center; padding: 26px 10px; background: #fff; border-top: 1px solid #eceef1; font-size: 11.5px; color: #6b7280; flex-wrap: wrap; gap: 20px; }
            .sg-footer-item { max-width: 200px; }
            .sg-footer-icon { width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 17px; margin: 0 auto 8px; }
            .sg-footer-item .t { font-weight: 700; color: #1f2430; margin-bottom: 2px; }
            .sg-footer-item .s { font-size: 11.5px; color: #6b7280; }

            #sg-toast { display:none; position:fixed; bottom:24px; right:24px; background:#1f2430; color:#fff; padding:10px 18px; border-radius:8px; font-size:13px; z-index:9999; box-shadow:0 6px 20px rgba(0,0,0,0.2); }

            /* Paginated PDF-style signing flow — client scrolls through all pages continuously */
            html { scroll-behavior: smooth; }
            /* Corner-fold ribbons + watermark are painted as background layers (not positioned
               elements) so they always sit behind every page's content with no z-index juggling. */
            .sg-pdf-page {
                min-height: 300px; scroll-margin-top: 16px; position: relative; overflow: hidden;
                background-color: #fff;
                background-repeat: no-repeat;
                background-image:
                    linear-gradient(to bottom left, var(--sg-red) 0, var(--sg-red) 26px, transparent 26px),
                    linear-gradient(to bottom left, transparent 26px, rgba(31,36,48,.15) 26px, rgba(31,36,48,.15) 29px, transparent 29px),
                    linear-gradient(to top left, var(--sg-red) 0, var(--sg-red) 26px, transparent 26px),
                    linear-gradient(to top left, transparent 26px, rgba(31,36,48,.15) 26px, rgba(31,36,48,.15) 29px, transparent 29px),
                    url("<?php echo base_url('public/assets_client/img/sia_watermark.png'); ?>");
                background-position: top right, top right, bottom right, bottom right, center center;
                background-size: 26px 26px, 29px 29px, 26px 26px, 29px 29px, 380px auto;
            }
            .sg-page-doc-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; padding-right: 6px; }
            .sg-page-doc-header .sg-logo-sia { height: 34px; width: auto; }
            .sg-page-doc-header .sg-logo-rcic { height: 30px; width: auto; }
            .sg-page-running-header { font-size: 11px; color: #9aa0aa; text-transform: uppercase; letter-spacing: .04em; margin-bottom: 16px; padding-bottom: 8px; border-bottom: 1px solid #eceef1; }
            .sg-page-footer { text-align: left; font-size: 11px; color: #9aa0aa; margin-top: 22px; padding-top: 10px; border-top: 1px dashed #eceef1; }
            .sg-pdf-page-body { display: flex; flex-direction: column; gap: 20px; }
            .sg-pdf-page-content { flex: 1; min-width: 0; }
            .sg-pdf-page-initial { align-self: flex-end; width: auto; max-width: 100%; }
            .sg-initial-box { background: #fff; border: 1.5px solid var(--sg-red); border-radius: 6px; padding: 7px 16px; display: flex; align-items: center; gap: 6px; }
            .sg-initial-box .sg-typed-input { font-family: 'Dancing Script', 'Brush Script MT', cursive; font-size: 26px; font-weight: 700; color: var(--sg-red); text-transform: uppercase; letter-spacing: .03em; max-width: none; padding: 0; width: 92px; text-align: center; border: none; background: transparent; }
            .sg-initial-box .sg-typed-input::placeholder { font-family: 'Segoe UI', Arial, sans-serif; font-size: 12px; font-weight: 700; text-transform: none; letter-spacing: normal; color: var(--sg-red); opacity: .8; }
            .sg-initial-box [data-init-status] { font-size: 12px; color: #2ecc71; font-weight: 700; white-space: nowrap; }
            .sg-initial-box-readonly { cursor: default; }
            .sg-initial-box-readonly .sg-typed-input { width: auto; }
            .sg-initial-img-readonly { height: 26px; width: auto; display: block; }

            @media (max-width: 820px) {
                .sg-grid { flex-direction: column; }
                .sg-toc { position: static; flex: none; width: 100%; }
                .sg-card { padding: 20px; }
            }

            .sg-cert-page { display: none; }

            /* Print / PDF output (headless Chrome --print-to-pdf renders this exact stylesheet,
               so the downloaded PDF is a literal mirror of this page — not a re-implementation).
               Each .sg-pdf-page becomes its own physical page; chrome/toc/footer chrome is hidden
               since only the document itself belongs in the saved record. */
            @media print {
                @page { size: A4; margin: 0; }
                * { -webkit-print-color-adjust: exact !important; print-color-adjust: exact !important; }
                body { background: #fff; }
                .sg-topbar, .sg-gradient-bar, .sg-header-row, .sg-alert, .sg-toc, .sg-footer, #sg-toast, .sg-no-print { display: none !important; }
                .sg-page { max-width: none; padding: 0; margin: 0; }
                .sg-grid { display: block; }
                .sg-doc-col { width: 100%; }
                .sg-pdf-pages { display: block; }
                .sg-card.sg-pdf-page {
                    box-shadow: none; border-radius: 0; margin: 0; padding: 15mm 15mm 20mm;
                    min-height: 297mm; page-break-after: always; overflow: visible;
                }
                .sg-card.sg-pdf-page:last-of-type { page-break-after: auto; }
                .sg-cert-page { display: block; page-break-before: always; }
            }
        </style>
    </head>
    <body>
        <div class="sg-topbar">
            <div class="sg-topbar-inner">
                <div class="sg-brand">
                    <img src="<?php echo base_url();?>/public/assets_client/img/sia_logo.png" alt="SIA Immigration">
                </div>
                <div class="sg-rcic-badge">
                    <img src="<?php echo base_url('public/assets_client/img/rcic_logo.png'); ?>" alt="RCIC - Regulated Canadian Immigration Consultant">
                </div>
            </div>
        </div>
        <div class="sg-gradient-bar"></div>

        <div class="sg-page">
            <div class="sg-header-row">
                <h4>Agreement eSign</h4>
                <span class="sg-badge sg-badge-<?php echo esc($agreement['status']); ?>"><?php echo esc(ucfirst($agreement['status'])); ?></span>
            </div>

            <?php if (!empty($signSuccess)): ?>
                <div class="sg-alert sg-alert-success sg-flash-alert"><?php echo esc($signSuccess); ?></div>
            <?php endif; ?>
            <?php if (!empty($signError)): ?>
                <div class="sg-alert sg-alert-error sg-flash-alert"><?php echo esc($signError); ?></div>
            <?php endif; ?>

            <?php
            // Page 1 is a dedicated cover/fees page (title, client/RCIC info, fee summary,
            // milestones, additional fees) with no clause text on it — clauses start fresh on
            // page 2 so a clause's content is never crowded onto the same page as the cover.
            // AgreementHtmlPdfBuilder prints this exact view (see its @media print rules below)
            // to generate the signed PDF, so the same paginated card layout is used for every
            // agreement status — before signing (interactive initials + sign form) and
            // after (read-only initials + the completed signatures) — so the document always
            // looks the same; only the last page's content and each page's initial box change.
            $pageSections = [];
            foreach ($clauses as $i => $clause) {
                $pageSections[] = ['num' => $i + 2, 'clause' => $clause];
            }
            // +1 for the cover page, +1 for the final signature page — both requiring their own initial/signature.
            $totalPages = count($pageSections) + 2;
            $signPageNum = $totalPages;
            $isActionable = in_array($agreement['status'], ['sent', 'viewed'], true);

            $pageInitialsByPage = [];
            foreach ($pageInitials as $row) {
                $pageInitialsByPage[(int) $row['page_number']] = $row;
            }
            ?>

            <div class="sg-grid">
                <div class="sg-toc">
                    <div class="sg-toc-card">
                        <div class="h">AGREEMENT PAGES</div>
                        <?php $coverDone = isset($pageInitialsByPage[1]); ?>
                        <a href="#page-1" class="sg-page-link<?php echo $coverDone ? ' sg-page-done' : ''; ?>" data-page="1">Cover &amp; Fees <span class="tick<?php echo $coverDone ? ' tick-done' : ''; ?>" data-page-tick="1">&#10003;</span></a>
                        <?php foreach ($pageSections as $sec): $label = $sec['clause']['title']; $pageDone = isset($pageInitialsByPage[$sec['num']]); ?>
                            <a href="#page-<?php echo $sec['num']; ?>" class="sg-page-link<?php echo $pageDone ? ' sg-page-done' : ''; ?>" data-page="<?php echo $sec['num']; ?>"><?php echo esc(ucwords(strtolower($label))); ?> <span class="tick<?php echo $pageDone ? ' tick-done' : ''; ?>" data-page-tick="<?php echo $sec['num']; ?>">&#10003;</span></a>
                        <?php endforeach; ?>
                        <a href="#page-<?php echo $signPageNum; ?>" class="<?php echo $agreement['status'] === 'signed' ? 'sg-page-done' : ''; ?>"><?php echo $isActionable ? 'Sign Agreement' : 'Signature'; ?> <span class="<?php echo $agreement['status'] === 'signed' ? 'tick tick-done' : ''; ?>"><?php echo $agreement['status'] === 'signed' ? '&#10003;' : '&#9999;&#65039;'; ?></span></a>
                    </div>
                    <div class="sg-toc-note"><?php echo $isActionable ? 'Type your initial on each page, then sign on the final page. Scroll or click a page to jump to it.' : 'Scroll or click a page to jump to it.'; ?></div>
                </div>

                <div class="sg-doc-col">
                    <div class="sg-pdf-pages">
                        <div class="sg-card sg-pdf-page" id="page-1">
                            <div class="sg-page-doc-header">
                                <img src="<?php echo base_url('public/assets_client/img/sia_logo.png'); ?>" alt="SIA Immigration" class="sg-logo-sia">
                                <img src="<?php echo base_url('public/assets_client/img/rcic_logo.png'); ?>" alt="RCIC - Regulated Canadian Immigration Consultant" class="sg-logo-rcic">
                            </div>

                            <div class="sg-doc-title">SERVICE AGREEMENT</div>
                            <div class="sg-doc-subtitle"><?php echo esc($typeLabel); ?></div>
                            <?php if (trim($agreement['case_description'] ?? '') !== ''): ?>
                            <div style="text-align:center;font-size:12px;color:#444;margin:-8px 0 10px;"><?php echo nl2br(esc($agreement['case_description'])); ?></div>
                            <?php endif; ?>
                            <div class="sg-doc-meta">
                                <span>SiaID: <?php echo (int) $agreement['prospect_id']; ?></span>
                                <span><?php echo esc($agreement['agreement_date'] ?? '—'); ?></span>
                            </div>
                            <div class="sg-info-grid">
                                <div class="sg-info-box">
                                    <div class="h"><span class="badge-icon">&#128100;</span> CLIENT INFORMATION</div>
                                    <div>Name: <?php echo esc($agreement['client_name']); ?></div>
                                    <div>Phone: <?php echo esc($agreement['client_phone']); ?></div>
                                    <div>Email: <?php echo esc($agreement['client_email']); ?></div>
                                    <div>Address: <?php echo esc($agreement['client_address']) ?: '—'; ?></div>
                                </div>
                                <div class="sg-info-box">
                                    <div class="h"><span class="badge-icon">&#128737;&#65039;</span> RCIC INFORMATION</div>
                                    <div>Name: <?php echo esc($agreement['consultant_name'] ?: 'Sia Immigration Solutions Inc.'); ?></div>
                                    <div>RCIC#: <?php echo esc($agreement['rcic_number'] ?: '—'); ?></div>
                                    <div>Address: #304, 8318 120 Street, Surrey, BC V3W 3N4, Canada<br>#301, 246 2 Ave, Kamloops, BC V2C 2C9, Canada</div>
                                </div>
                            </div>

                            <div class="sg-pdf-page-body">
                                <div class="sg-pdf-page-content">

                                <div class="sg-section">
                                    <div class="sg-preview-title">PROFESSIONAL FEES AND GOVERNMENT FEES</div>
                                    <table class="sg-fee-table">
                                        <tr><td>Professional Service Fee</td><td>$<?php echo number_format((float) $agreement['service_fee'], 2); ?></td></tr>
                                        <tr><td>GST (<?php echo esc((string) (float) $agreement['gst_rate']); ?>%) on Service Fee</td><td>$<?php echo number_format((float) $agreement['gst_amount'], 2); ?></td></tr>
                                        <?php $govtGroup = false; foreach ($governmentFeeLines as $line): ?>
                                            <?php if ($line['group'] !== $govtGroup && $line['group'] !== null): $govtGroup = $line['group']; ?>
                                                <tr><td colspan="2" style="font-weight:700;color:var(--sg-red);padding-top:8px;"><?php echo esc($line['group']); ?></td></tr>
                                            <?php endif; ?>
                                            <tr><td style="<?php echo $line['group'] !== null ? 'padding-left:20px;color:#555;' : ''; ?>"><?php echo esc($line['label']); ?></td><td>$<?php echo number_format($line['amount'], 2); ?></td></tr>
                                        <?php endforeach; ?>
                                    </table>
                                    <?php if (!empty($milestones)): ?>
                                    <div class="sg-preview-title">PAYMENT SCHEDULE / MILESTONES</div>
                                    <table class="sg-mini-table">
                                        <thead><tr><th>Milestone</th><th>Timeline</th><th>Amount (GST Included)</th></tr></thead>
                                        <tbody>
                                        <?php foreach ($milestones as $m): ?>
                                            <tr><td><?php echo esc($m['milestone']); ?></td><td><?php echo esc($m['due_date']) ?: '—'; ?></td><td><?php echo $m['amount'] !== null ? '$' . number_format((float) $m['amount'] * 1.05, 2) : 'Included'; ?></td></tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <?php endif; ?>
                                    <?php if (!empty($additionalFees)): ?>
                                    <div class="sg-preview-title">ADDITIONAL FEES (IF APPLICABLE)</div>
                                    <table class="sg-mini-table">
                                        <thead><tr><th>Description</th><th>Amount (GST Included)</th></tr></thead>
                                        <tbody>
                                        <?php foreach ($additionalFees as $f): ?>
                                            <tr><td><?php echo esc($f['description']); ?></td><td>$<?php echo number_format((float) $f['amount'] * 1.05, 2); ?></td></tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <?php endif; ?>
                                    <div class="sg-total-payable">
                                        <span class="h">Total Payable</span>
                                        <span class="amt">$<?php echo number_format((float) $agreement['total_amount'], 2); ?></span>
                                    </div>
                                </div>

                                </div>
                                <div class="sg-pdf-page-initial">
                                    <?php if ($isActionable): ?>
                                        <div class="sg-initial-box">
                                            <input type="text" class="sg-typed-input" data-init-typed="1" placeholder="Initials" maxlength="4">
                                            <span style="display:none;" data-init-status="1">&#10003;</span>
                                        </div>
                                    <?php else: $initRow = $pageInitialsByPage[1] ?? null; ?>
                                        <div class="sg-initial-box sg-initial-box-readonly">
                                            <?php if ($initRow && $initRow['initial_type'] === 'type' && !empty($initRow['typed_initials'])): ?>
                                                <span class="sg-typed-input"><?php echo esc(strtoupper($initRow['typed_initials'])); ?></span>
                                            <?php elseif ($initRow && !empty($initRow['initial_path'])): ?>
                                                <img src="<?php echo base_url($initRow['initial_path']); ?>" alt="Initial" class="sg-initial-img-readonly">
                                            <?php endif; ?>
                                            <span<?php echo $initRow ? '' : ' style="display:none;"'; ?>>&#10003;</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="sg-page-footer">Page 1 of <?php echo $totalPages; ?></div>
                        </div>

                        <?php foreach ($pageSections as $sec): $n = $sec['num']; ?>
                        <div class="sg-card sg-pdf-page" id="page-<?php echo $n; ?>">
                            <div class="sg-page-doc-header">
                                <img src="<?php echo base_url('public/assets_client/img/sia_logo.png'); ?>" alt="SIA Immigration" class="sg-logo-sia">
                                <img src="<?php echo base_url('public/assets_client/img/rcic_logo.png'); ?>" alt="RCIC - Regulated Canadian Immigration Consultant" class="sg-logo-rcic">
                            </div>

                            <div class="sg-page-running-header">Retainer Agreement — Page <?php echo $n; ?> of <?php echo $totalPages; ?></div>

                            <div class="sg-pdf-page-body">
                                <div class="sg-pdf-page-content">

                            <div class="sg-section">
                                <h5><?php echo esc($sec['clause']['title']); ?></h5>
                                <?php foreach ($sec['clause']['blocks'] as $block): ?>
                                    <?php if ($block['type'] === 'p'): ?>
                                        <p><?php echo esc($block['text']); ?></p>
                                    <?php elseif ($block['type'] === 'h'): ?>
                                        <p style="font-weight:700;margin-top:10px;margin-bottom:2px;"><?php echo esc($block['text']); ?></p>
                                    <?php elseif ($block['type'] === 'bullets'): ?>
                                        <ul><?php foreach ($block['items'] as $b): ?><li><?php echo esc($b); ?></li><?php endforeach; ?></ul>
                                    <?php elseif ($block['type'] === 'html'): ?>
                                        <?php echo $block['html']; // admin-edited via the rich-text clause editor; trusted, not client input ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>

                                </div>
                                <div class="sg-pdf-page-initial">
                                    <?php if ($isActionable): ?>
                                        <div class="sg-initial-box">
                                            <input type="text" class="sg-typed-input" data-init-typed="<?php echo $n; ?>" placeholder="Initials" maxlength="4">
                                            <span style="display:none;" data-init-status="<?php echo $n; ?>">&#10003;</span>
                                        </div>
                                    <?php else: $initRow = $pageInitialsByPage[$n] ?? null; ?>
                                        <div class="sg-initial-box sg-initial-box-readonly">
                                            <?php if ($initRow && $initRow['initial_type'] === 'type' && !empty($initRow['typed_initials'])): ?>
                                                <span class="sg-typed-input"><?php echo esc(strtoupper($initRow['typed_initials'])); ?></span>
                                            <?php elseif ($initRow && !empty($initRow['initial_path'])): ?>
                                                <img src="<?php echo base_url($initRow['initial_path']); ?>" alt="Initial" class="sg-initial-img-readonly">
                                            <?php endif; ?>
                                            <span<?php echo $initRow ? '' : ' style="display:none;"'; ?>>&#10003;</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="sg-page-footer">Page <?php echo $n; ?> of <?php echo $totalPages; ?></div>
                        </div>
                        <?php endforeach; ?>

                        <div class="sg-card sg-pdf-page" id="page-<?php echo $signPageNum; ?>">
                            <div class="sg-page-doc-header">
                                <img src="<?php echo base_url('public/assets_client/img/sia_logo.png'); ?>" alt="SIA Immigration" class="sg-logo-sia">
                                <img src="<?php echo base_url('public/assets_client/img/rcic_logo.png'); ?>" alt="RCIC - Regulated Canadian Immigration Consultant" class="sg-logo-rcic">
                            </div>
                            <div class="sg-page-running-header">Retainer Agreement — Page <?php echo $signPageNum; ?> of <?php echo $totalPages; ?></div>

                            <?php if ($isActionable): ?>
                                <div class="sg-esign-panel">
                                    <div>
                                        <div class="t">&#128737; Final step — eSign this agreement</div>
                                        <div class="s">You've reviewed and initialed every page. Sign below to complete.</div>
                                    </div>
                                </div>
                                <div class="sg-sign-box">
                                    <div class="sg-sig-row">
                                        <div class="sg-sig-col">
                                            <div class="sig-area">
                                                <img src="<?php echo base_url('public/assets_client/img/rcic_signature.png'); ?>" alt="<?php echo esc($agreement['consultant_name'] ?: 'RCIC'); ?> signature" class="sg-rcic-sig-img">
                                            </div>
                                            <div class="sig-line">RCIC's Signature</div>
                                            <div class="sg-rcic-sig-name"><?php echo esc($agreement['consultant_name'] ?: 'Sia Immigration Solutions Inc.'); ?> — on file, applied automatically once you sign.</div>
                                        </div>
                                    </div>

                                    <form id="sgSignForm" method="post" action="<?php echo base_url('agreement/sign/' . $agreement['sign_token'] . '/submit'); ?>" enctype="multipart/form-data">
                                        <div class="sg-tabs">
                                            <div class="sg-tab active" data-tab="draw">Draw</div>
                                            <div class="sg-tab" data-tab="type">Type</div>
                                            <div class="sg-tab" data-tab="upload">Upload</div>
                                        </div>

                                        <div class="sg-tab-pane active" data-pane="draw">
                                            <canvas id="sgCanvas" width="480" height="160"></canvas><br>
                                            <button type="button" class="sg-small-btn" id="sgClearCanvas">Clear</button>
                                            <input type="hidden" name="signature_data" id="sgSignatureData">
                                        </div>
                                        <div class="sg-tab-pane" data-pane="type">
                                            <input type="text" class="sg-typed-input" id="sgTypedName" name="typed_name" placeholder="Type your full name" maxlength="60">
                                        </div>
                                        <div class="sg-tab-pane" data-pane="upload">
                                            <input type="file" name="signature_file" id="sgUploadFile" accept="image/png,image/jpeg">
                                            <br><img id="sgUploadPreview" class="sg-upload-preview">
                                        </div>
                                        <input type="hidden" name="signature_type" id="sgSignatureType" value="draw">

                                        <label class="sg-consent">
                                            <input type="checkbox" name="consent" id="sgConsent" value="1">
                                            <span>I have read and agree to the terms of this Retainer Agreement and consent to sign this document electronically.</span>
                                        </label>

                                        <div style="display:flex;gap:10px;">
                                            <button type="submit" class="sg-btn sg-btn-primary">Submit &amp; Sign</button>
                                            <button type="button" class="sg-btn sg-btn-danger-outline" id="sgDeclineBtn">Decline</button>
                                        </div>
                                    </form>

                                    <form id="sgDeclineForm" method="post" action="<?php echo base_url('agreement/sign/' . $agreement['sign_token'] . '/decline'); ?>" style="display:none;margin-top:14px;">
                                        <textarea name="reason" placeholder="Optional: let us know why you're declining" style="width:100%;max-width:480px;padding:8px;border:1px solid #d8dce1;border-radius:6px;font-size:13px;" rows="3"></textarea><br>
                                        <button type="submit" class="sg-btn sg-btn-danger-outline" style="margin-top:8px;">Confirm Decline</button>
                                    </form>
                                </div>
                            <?php elseif ($agreement['status'] === 'signed'): ?>
                                <div class="sg-esign-panel" style="background:#e8f8ee;border-color:#bfe8cf;">
                                    <div>
                                        <div class="t" style="color:#1e7e42;">&#9989; This agreement has been signed electronically</div>
                                        <div class="s">Signed on <?php echo esc(date('F j, Y \a\t g:i A', strtotime($agreement['client_signed_at']))); ?></div>
                                    </div>
                                </div>
                                <div class="sg-sign-box">
                                    <div class="sg-sig-row">
                                        <div class="sg-sig-col">
                                            <div class="sig-area">
                                                <img src="<?php echo base_url('public/assets_client/img/rcic_signature.png'); ?>" alt="<?php echo esc($agreement['consultant_name'] ?: 'RCIC'); ?> signature" class="sg-rcic-sig-img">
                                            </div>
                                            <div class="sig-line">RCIC's Signature</div>
                                            <div class="sg-rcic-sig-name"><?php echo esc($agreement['consultant_name'] ?: 'Sia Immigration Solutions Inc.'); ?></div>
                                        </div>
                                        <div class="sg-sig-col">
                                            <div class="sig-area">
                                                <?php if ($agreement['client_signature_type'] === 'type' && !empty($agreement['client_typed_name'])): ?>
                                                    <div class="sg-typed-input" style="border:none;max-width:none;font-size:28px;"><?php echo esc($agreement['client_typed_name']); ?></div>
                                                <?php elseif (!empty($agreement['client_signature'])): ?>
                                                    <img src="<?php echo base_url($agreement['client_signature']); ?>" alt="Client signature" class="sg-rcic-sig-img">
                                                <?php endif; ?>
                                            </div>
                                            <div class="sig-line">Client's Signature</div>
                                            <div class="sg-rcic-sig-name"><?php echo esc($agreement['client_name']); ?></div>
                                        </div>
                                    </div>

                                    <?php if (!empty($agreement['pdf_path'])): ?>
                                        <div style="margin-top:6px;" class="sg-no-print">
                                            <a href="<?php echo base_url('agreement/sign/' . $agreement['sign_token'] . '/pdf'); ?>" target="_blank" class="sg-btn sg-btn-primary" style="text-decoration:none;display:inline-block;">View / Download Signed PDF</a>
                                        </div>
                                        <div style="margin-top:10px;font-size:12px;color:#4c5a59;">A copy has also been emailed to you.</div>
                                    <?php else: ?>
                                        <div style="margin-top:10px;font-size:12px;color:#4c5a59;">Your signed PDF is being prepared and will be emailed to you shortly.</div>
                                    <?php endif; ?>
                                </div>
                            <?php elseif ($agreement['status'] === 'declined'): ?>
                                <div class="sg-sign-box">
                                    <div class="sg-alert sg-alert-error">
                                        You declined this agreement<?php echo $agreement['declined_at'] ? ' on ' . esc(date('F j, Y \a\t g:i A', strtotime($agreement['declined_at']))) : ''; ?>.
                                        <?php if (!empty($agreement['decline_reason'])): ?><br>Reason: <?php echo esc($agreement['decline_reason']); ?><?php endif; ?>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="sg-sign-box">
                                    <div class="sg-alert sg-alert-error">This agreement is not yet available for signing.</div>
                                </div>
                            <?php endif; ?>

                            <div class="sg-page-footer">Page <?php echo $signPageNum; ?> of <?php echo $totalPages; ?></div>
                        </div>

                        <?php if ($agreement['status'] === 'signed'):
                            $certViewedOn = !empty($agreement['viewed_at']) ? date('F j, Y \a\t g:i A', strtotime($agreement['viewed_at'])) : '—';
                            $certSignedOn = !empty($agreement['client_signed_at']) ? date('F j, Y \a\t g:i A', strtotime($agreement['client_signed_at'])) : '—';
                            $certificateId = strtoupper(substr(hash('sha256', $agreement['id'] . '|' . ($agreement['sign_token'] ?? '') . '|' . ($agreement['client_signed_at'] ?? '')), 0, 16));
                        ?>
                        <div class="sg-card sg-pdf-page sg-cert-page">
                            <div class="sg-page-doc-header">
                                <img src="<?php echo base_url('public/assets_client/img/sia_logo.png'); ?>" alt="SIA Immigration" class="sg-logo-sia">
                                <img src="<?php echo base_url('public/assets_client/img/rcic_logo.png'); ?>" alt="RCIC - Regulated Canadian Immigration Consultant" class="sg-logo-rcic">
                            </div>

                            <div class="sg-doc-title">SIGNATURE CERTIFICATE</div>
                            <div class="sg-doc-subtitle" style="color:#1e7e42;">&#9989; Document Signed Successfully</div>

                            <table class="sg-mini-table" style="margin-top:14px;">
                                <tbody>
                                    <tr><td style="width:32%;font-weight:700;">Reference No.</td><td><?php echo esc($agreement['reference_number'] ?? '—'); ?></td></tr>
                                    <tr><td style="font-weight:700;">Document Name</td><td>Retainer Agreement</td></tr>
                                    <tr><td style="font-weight:700;">Client Name</td><td><?php echo esc($agreement['client_name'] ?? '—'); ?></td></tr>
                                    <tr><td style="font-weight:700;">Client Email</td><td><?php echo esc($agreement['client_email'] ?? '—'); ?></td></tr>
                                    <tr><td style="font-weight:700;">Consultant</td><td><?php echo esc($agreement['consultant_name'] ?: 'Sia Immigration Solutions Inc.'); ?> (RCIC# <?php echo esc($agreement['rcic_number'] ?: '—'); ?>)</td></tr>
                                    <tr><td style="font-weight:700;">Viewed On</td><td><?php echo esc($certViewedOn); ?> (IP: <?php echo esc($agreement['viewed_ip'] ?? '—'); ?>)</td></tr>
                                    <tr><td style="font-weight:700;">Signed On</td><td><?php echo esc($certSignedOn); ?> (IP: <?php echo esc($agreement['client_signed_ip'] ?? '—'); ?>)</td></tr>
                                    <tr><td style="font-weight:700;">Signature Method</td><td><?php echo esc(ucfirst($agreement['client_signature_type'] ?? '—')); ?></td></tr>
                                    <tr><td style="font-weight:700;">Device / Browser</td><td style="font-size:10px;"><?php echo esc($agreement['client_signed_device'] ?? '—'); ?></td></tr>
                                    <tr><td style="font-weight:700;">Consent</td><td>Client confirmed agreement to the terms and consented to sign electronically.</td></tr>
                                    <tr><td style="font-weight:700;">Certificate ID</td><td><?php echo esc($certificateId); ?></td></tr>
                                </tbody>
                            </table>

                            <p style="text-align:center;font-size:11px;color:#666;margin-top:18px;">This document has been electronically signed and is legally binding.<br>You may download and print a copy for your records.</p>

                            <div class="sg-page-footer">Signature Certificate</div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="sg-footer">
            <div class="sg-footer-item">
                <div class="sg-footer-icon" style="background:#e8f8ee;">&#128737;</div>
                <div class="t">Secure &amp; Legal</div>
                <div class="s">Legally valid and encrypted electronic signature.</div>
            </div>
            <div class="sg-footer-item">
                <div class="sg-footer-icon" style="background:#fdf1e3;">&#128196;</div>
                <div class="t">Legally Binding</div>
                <div class="s">This e-signed agreement is legally binding.</div>
            </div>
            <div class="sg-footer-item">
                <div class="sg-footer-icon" style="background:#eaf1fb;">&#9729;</div>
                <div class="t">Download Anytime</div>
                <div class="s">Download the signed agreement anytime from your portal.</div>
            </div>
            <div class="sg-footer-item">
                <div class="sg-footer-icon" style="background:#f4eafb;">&#127911;</div>
                <div class="t">Need Help?</div>
                <div class="s">Email Consult@siaimmigration.com</div>
            </div>
        </div>

        <div id="sg-toast"></div>

        <script>
            // Flash messages (sign success/error) come from session flashdata and would
            // otherwise sit on screen forever on reload/back-nav — fade them out after 10s.
            // Unconditional (outside the isActionable-only script block below) since the
            // success message specifically only ever appears once status is no longer actionable.
            document.querySelectorAll('.sg-flash-alert').forEach(function (el) {
                setTimeout(function () {
                    el.style.transition = 'opacity 0.4s ease';
                    el.style.opacity = '0';
                    setTimeout(function () { el.remove(); }, 400);
                }, 10000);
            });
        </script>

        <?php if ($isActionable): ?>
        <script src="<?php echo base_url();?>/public/assets_client/js/plugins/sweetalert2.js"></script>
        <script>
            var sgToken = <?php echo json_encode($agreement['sign_token']); ?>;
            var SG_BASE = '<?php echo base_url(); ?>/';
            var sgPageInitials = <?php echo json_encode($pageInitials); ?>;
            var sgInitialedPages = {}; // page_number -> true
            var sgTotalPages = <?php echo (int) $totalPages; ?>;
            var sgRequiredInitialPages = sgTotalPages - 1;
            var sgClientInitials = null; // once set (first page), auto-filled into every later page's field
            var sgClientName = <?php echo json_encode($agreement['client_name'] ?? ''); ?>;

            // "Dharminder Randhawa" -> "D.R", suggested as a starting point in the initials prompt.
            function sgSuggestInitials(name) {
                if (!name) return '';
                return name.trim().split(/\s+/).map(function (w) { return w.charAt(0).toUpperCase(); }).join('.');
            }

            function sgToast(msg) {
                var t = document.getElementById('sg-toast');
                t.textContent = msg;
                t.style.display = 'block';
                setTimeout(function () { t.style.display = 'none'; }, 2500);
            }

            // No page locking: the client can freely read/navigate the whole agreement.
            // Only final Submit (the last page) is blocked (server-side too) until every page is initialed.
            function sgUpdateToc() {
                document.querySelectorAll('.sg-page-link').forEach(function (a) {
                    var p = parseInt(a.dataset.page, 10);
                    var tick = a.querySelector('[data-page-tick]');
                    var done = !!sgInitialedPages[p];
                    a.classList.toggle('sg-page-done', done);
                    tick.classList.toggle('tick-done', done);
                });
            }

            function sgMarkPageDone(n) {
                sgInitialedPages[n] = true;
                var status = document.querySelector('[data-init-status="' + n + '"]');
                if (status) status.style.display = 'block';
                sgUpdateToc();
                sgToast('Initial saved.');
                sgScrollToNextPage(n);
            }

            // After a page's initial is saved, land the client on the next page that still
            // needs one (or the final sign page, once every content page is done) instead of
            // leaving them to scroll/click their way there manually.
            function sgScrollToNextPage(n) {
                var next = null;
                for (var p = n + 1; p <= sgRequiredInitialPages; p++) {
                    if (!sgInitialedPages[p]) { next = p; break; }
                }
                // The next initial box sits at the BOTTOM of its page card, after the clause
                // text — landing on the page's top (old behaviour) left the client still
                // needing to scroll further to reach it. Target the initial box itself instead.
                var target = next
                    ? (document.querySelector('[data-init-typed="' + next + '"]') || document.getElementById('page-' + next))
                    : document.getElementById('page-' + sgTotalPages);
                if (!target) return;
                setTimeout(function () { target.scrollIntoView({ behavior: 'smooth', block: 'center' }); }, 400);
            }

            // --- Reusable canvas drawing (used by every page's initial canvas and the final-signature canvas) ---
            function sgSetupCanvas(canvas, onDraw) {
                var ctx = canvas.getContext('2d');
                ctx.strokeStyle = '#1f2430';
                ctx.lineWidth = 2;
                ctx.lineJoin = 'round';
                ctx.lineCap = 'round';
                var drawing = false, hasDrawn = false;

                function pos(evt) {
                    var rect = canvas.getBoundingClientRect();
                    var scaleX = canvas.width / rect.width;
                    var scaleY = canvas.height / rect.height;
                    var point = evt.touches ? evt.touches[0] : evt;
                    return { x: (point.clientX - rect.left) * scaleX, y: (point.clientY - rect.top) * scaleY };
                }
                function start(evt) { drawing = true; var p = pos(evt); ctx.beginPath(); ctx.moveTo(p.x, p.y); evt.preventDefault(); }
                function move(evt) {
                    if (!drawing) return;
                    var p = pos(evt); ctx.lineTo(p.x, p.y); ctx.stroke(); hasDrawn = true; evt.preventDefault();
                }
                function end() { if (!drawing) return; drawing = false; if (hasDrawn) onDraw(canvas.toDataURL('image/png')); }

                canvas.addEventListener('mousedown', start);
                canvas.addEventListener('mousemove', move);
                window.addEventListener('mouseup', end);
                canvas.addEventListener('touchstart', start);
                canvas.addEventListener('touchmove', move);
                canvas.addEventListener('touchend', end);

                return {
                    clear: function () { ctx.clearRect(0, 0, canvas.width, canvas.height); hasDrawn = false; },
                    hasDrawn: function () { return hasDrawn; }
                };
            }

            // --- Pages 1 through sgRequiredInitialPages: each has its own full initial widget, auto-saving as the client draws/types/uploads ---
            function sgSaveInitial(n, fd) {
                fd.append('page_number', String(n));
                fetch(SG_BASE + 'agreement/sign/' + sgToken + '/initial', { method: 'POST', body: fd })
                    .then(function (r) { return r.json(); })
                    .then(function (res) {
                        if (!res.ok) { sgToast(res.error || 'Could not save your initial.'); return; }
                        sgMarkPageDone(n);
                    })
                    .catch(function () { sgToast('Network error saving your initial. Please try again.'); });
            }

            function sgApplyAndSaveInitial(n, input, value) {
                input.value = value;
                var fd = new FormData();
                fd.append('signature_type', 'type');
                fd.append('typed_name', value);
                sgSaveInitial(n, fd);
            }

            // First click on any page's initial field prompts once for the client's initials;
            // every page after that auto-fills and auto-saves with the same value on click.
            function sgSetupInitialWidget(n) {
                var input = document.querySelector('[data-init-typed="' + n + '"]');
                var promptOpen = false;

                input.addEventListener('focus', function () {
                    if (promptOpen) return;
                    if (input.value.trim()) return;
                    if (sgClientInitials) {
                        sgApplyAndSaveInitial(n, input, sgClientInitials);
                        return;
                    }
                    promptOpen = true;
                    // SweetAlert2 captures document.activeElement when it opens and, on close
                    // (confirm OR cancel), refocuses it ~100ms later via its own internal timer
                    // (see restoreActiveElement in sweetalert2.js). Left alone, that refocus would
                    // re-trigger this very 'focus' handler and reopen the prompt in a loop —
                    // blurring first means SweetAlert2 captures nothing of ours to restore.
                    input.blur();
                    Swal.fire({
                        title: 'Enter Your Initials',
                        text: 'This will be applied to every page of the agreement.',
                        input: 'text',
                        inputValue: sgSuggestInitials(sgClientName),
                        inputPlaceholder: 'e.g. JD',
                        showCancelButton: true,
                        confirmButtonText: 'Apply',
                        cancelButtonText: 'Cancel',
                        confirmButtonColor: '#4c3ff5',
                        reverseButtons: true,
                        customClass: 'sg-swal-initials',
                        inputValidator: function (value) {
                            if (!value || !value.trim()) return 'Please type your initials';
                        }
                    }).then(function (result) {
                        if (result.value) {
                            sgClientInitials = result.value.trim();
                            sgApplyAndSaveInitial(n, input, sgClientInitials);
                        }
                        input.blur();
                        setTimeout(function () { promptOpen = false; }, 250);
                    });
                });

                var typedTimer = null;
                input.addEventListener('input', function (e) {
                    clearTimeout(typedTimer);
                    var val = e.target.value;
                    if (!val.trim()) {
                        // Cleared after being saved: this page is incomplete again, so Submit's
                        // missing-page check must stop treating it as done.
                        delete sgInitialedPages[n];
                        var status = document.querySelector('[data-init-status="' + n + '"]');
                        if (status) status.style.display = 'none';
                        sgUpdateToc();
                        return;
                    }
                    typedTimer = setTimeout(function () {
                        sgClientInitials = val.trim();
                        var fd = new FormData();
                        fd.append('signature_type', 'type');
                        fd.append('typed_name', val);
                        sgSaveInitial(n, fd);
                    }, 700);
                });
            }
            for (var sgInitN = 1; sgInitN <= sgRequiredInitialPages; sgInitN++) { sgSetupInitialWidget(sgInitN); }

            // --- Restore progress on reload ---
            sgPageInitials.forEach(function (row) {
                var n = parseInt(row.page_number, 10);
                sgInitialedPages[n] = true;
                var typedInput = document.querySelector('[data-init-typed="' + n + '"]');
                if (typedInput && row.typed_initials) typedInput.value = row.typed_initials;
                if (!sgClientInitials && row.typed_initials) sgClientInitials = row.typed_initials;
            });
            sgUpdateToc();
            document.querySelectorAll('[data-init-status]').forEach(function (el) {
                if (sgInitialedPages[parseInt(el.dataset.initStatus, 10)]) el.style.display = 'block';
            });

            // --- Final page: existing full-signature flow (draw/type/upload + consent + submit + decline) ---
            var sgTabsActive = 'draw';
            document.querySelectorAll('.sg-tab[data-tab]').forEach(function (tab) {
                tab.addEventListener('click', function () {
                    document.querySelectorAll('.sg-tab[data-tab]').forEach(function (t) { t.classList.remove('active'); });
                    document.querySelectorAll('.sg-tab-pane[data-pane]').forEach(function (p) { p.classList.remove('active'); });
                    tab.classList.add('active');
                    document.querySelector('.sg-tab-pane[data-pane="' + tab.dataset.tab + '"]').classList.add('active');
                    document.getElementById('sgSignatureType').value = tab.dataset.tab;
                    sgTabsActive = tab.dataset.tab;
                });
            });

            function sgSaveDraft(formData) {
                fetch(SG_BASE + 'agreement/sign/' + sgToken + '/draft', { method: 'POST', body: formData })
                    .then(function (r) { return r.json(); }).then(function (res) {
                        if (res.ok) { sgToast('Draft saved'); }
                    }).catch(function () {});
            }

            var sgCanvasEl = document.getElementById('sgCanvas');
            var sgCanvasCtrl = sgSetupCanvas(sgCanvasEl, function (dataUrl) {
                document.getElementById('sgSignatureData').value = dataUrl;
                var fd = new FormData();
                fd.append('signature_type', 'draw');
                fd.append('signature_data', dataUrl);
                sgSaveDraft(fd);
            });
            document.getElementById('sgClearCanvas').addEventListener('click', function () {
                sgCanvasCtrl.clear();
                document.getElementById('sgSignatureData').value = '';
            });

            var typedTimer = null;
            document.getElementById('sgTypedName').addEventListener('input', function (e) {
                clearTimeout(typedTimer);
                var val = e.target.value;
                typedTimer = setTimeout(function () {
                    if (!val.trim()) return;
                    var fd = new FormData();
                    fd.append('signature_type', 'type');
                    fd.append('typed_name', val);
                    sgSaveDraft(fd);
                }, 700);
            });

            document.getElementById('sgUploadFile').addEventListener('change', function (e) {
                var file = e.target.files[0];
                if (!file) return;
                var preview = document.getElementById('sgUploadPreview');
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';

                var fd = new FormData();
                fd.append('signature_type', 'upload');
                fd.append('signature_file', file);
                sgSaveDraft(fd);
            });

            // Guards against duplicate signatures/emails from a rapid double-click, a slow
            // network request the browser silently retries, etc. — once the client has
            // confirmed and the real submit fires, the button is disabled so a second click
            // can't fire it again; the server also enforces this atomically as the final guard.
            var sgSubmitting = false;
            document.getElementById('sgSignForm').addEventListener('submit', function (e) {
                e.preventDefault();
                if (sgSubmitting) return;

                var missing = [];
                for (var mp = 1; mp <= sgRequiredInitialPages; mp++) { if (!sgInitialedPages[mp]) missing.push(mp); }
                if (missing.length) {
                    sgToast('Please initial page' + (missing.length > 1 ? 's' : '') + ' ' + missing.join(', ') + ' before signing.');
                    document.getElementById('page-' + missing[0]).scrollIntoView({ behavior: 'smooth', block: 'start' });
                    return;
                }
                if (!document.getElementById('sgConsent').checked) {
                    sgToast('Please accept the consent checkbox first.');
                    return;
                }
                var type = document.getElementById('sgSignatureType').value;
                if (type === 'draw' && !sgCanvasCtrl.hasDrawn()) {
                    sgToast('Please draw your signature first.');
                    return;
                }
                if (type === 'type' && !document.getElementById('sgTypedName').value.trim()) {
                    sgToast('Please type your full name.');
                    return;
                }
                if (type === 'upload' && !document.getElementById('sgUploadFile').files.length) {
                    sgToast('Please choose a signature image to upload.');
                    return;
                }

                var sgSignFormEl = this;
                Swal.fire({
                    title: 'Confirm Your Signature',
                    text: 'Once you sign this agreement, your signature cannot be changed or undone. Please review the document carefully before continuing. A signed copy in PDF format will be sent to your email address.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Sign the Agreement',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#4c3ff5',
                    reverseButtons: true
                }).then(function (result) {
                    if (result.value) {
                        sgSubmitting = true;
                        var submitBtn = sgSignFormEl.querySelector('button[type="submit"]');
                        if (submitBtn) { submitBtn.disabled = true; submitBtn.textContent = 'Signing…'; }
                        sgSignFormEl.submit();
                    }
                });
            });

            document.getElementById('sgDeclineBtn').addEventListener('click', function () {
                var f = document.getElementById('sgDeclineForm');
                f.style.display = f.style.display === 'none' ? 'block' : 'none';
            });

            var sgDeclining = false;
            document.getElementById('sgDeclineForm').addEventListener('submit', function (e) {
                if (sgDeclining) { e.preventDefault(); return; }
                sgDeclining = true;
                var declineBtn = this.querySelector('button[type="submit"]');
                if (declineBtn) { declineBtn.disabled = true; declineBtn.textContent = 'Declining…'; }
            });
        </script>
        <?php endif; ?>
    </body>
</html>
