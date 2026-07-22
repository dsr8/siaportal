<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Retainer Agreement Summary</title>
        <link rel="icon" type="image/png" href="<?php echo base_url();?>/public/assets_client/img/favicon.png" />
        <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <style>
            .ca-page { font-family: 'Segoe UI', Arial, sans-serif; color: #1f2430; padding-top: 6px; }
            .ca-page * { box-sizing: border-box; }
            .ca-legend { text-align: center; font-size: 12.5px; color: #6b7280; margin-bottom: 18px; }
            .ca-legend .dot { display: inline-block; width: 8px; height: 8px; border-radius: 50%; margin-right: 5px; }
            .ca-legend .dot-dyn { background: #2ecc71; }
            .ca-legend .dot-static { background: #9aa0aa; }
            .ca-legend span { margin-right: 20px; }

            .ca-grid { display: flex; gap: 20px; align-items: flex-start; }
            .ca-form-col { flex: 1.4; min-width: 0; }
            .ca-preview-col { flex: 1; min-width: 0; position: sticky; top: 12px; }

            .ca-card { background: #fff; border-radius: 14px; padding: 20px 22px; margin-bottom: 18px; box-shadow: 0 2px 10px rgba(20,20,43,0.05); }
            .ca-card h5 { font-size: 15px; font-weight: 700; margin: 0 0 16px; display: flex; align-items: center; gap: 10px; }
            .ca-card-icon { display: inline-flex; align-items: center; justify-content: center; flex: 0 0 32px; width: 32px; height: 32px; border-radius: 9px; font-size: 14px; }
            .ca-row { display: flex; gap: 14px; margin-bottom: 14px; flex-wrap: wrap; }
            .ca-field { flex: 1; min-width: 160px; }
            .ca-field label { font-size: 12.5px; font-weight: 600; color: #444; margin-bottom: 4px; display: block; }
            .ca-field input, .ca-field select {
                width: 100%; padding: 8px 10px; border: 1px solid #d8dce1; border-radius: 6px; font-size: 13.5px;
            }
            .ca-field input[readonly] { background: #f5f5f5; color: #666; }
            .ca-subsection-title { font-size: 12px; font-weight: 700; color: #8e44ad; text-transform: uppercase; letter-spacing: .02em; margin: 4px 0 10px; }

            .ca-table { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
            .ca-table th { text-align: left; font-size: 11.5px; color: #6b7280; padding: 6px 8px; border-bottom: 1px solid #eef0f2; }
            .ca-table td { padding: 5px 6px; border-bottom: 1px solid #f4f4f6; }
            .ca-table td input { width: 100%; padding: 6px 8px; border: 1px solid #d8dce1; border-radius: 5px; font-size: 13px; }
            .ca-table td.ca-actions { white-space: nowrap; text-align: center; }
            .ca-table td.ca-actions button { border: none; background: none; cursor: pointer; color: #e74c3c; font-size: 14px; }
            .ca-date-input-wrap { position: relative; }
            .ca-table td .ca-date-input-wrap input { padding-right: 26px; }
            .ca-date-input-wrap .ca-date-icon { position: absolute; right: 8px; top: 50%; transform: translateY(-50%); color: #9aa0aa; font-size: 12px; pointer-events: none; }

            .ca-btn-add { background: none; border: 1px dashed #cfd4da; color: #1a73e8; padding: 6px 14px; border-radius: 6px; font-size: 13px; font-weight: 600; cursor: pointer; }

            .ca-total-box { background: #fdecec; color: #e23b3b; border-radius: 8px; padding: 12px 16px; font-weight: 700; display: flex; justify-content: space-between; align-items: center; margin-top: 10px; }
            .ca-total-box .amt { font-size: 20px; }

            .ca-check-row { display: flex; gap: 22px; flex-wrap: wrap; margin-bottom: 14px; }
            .ca-check-row label { font-size: 13px; font-weight: 600; display: flex; align-items: center; gap: 6px; }

            .ca-actions-row { display: flex; align-items: center; gap: 10px; margin-top: 4px; }
            .ca-actions-row button { padding: 10px 20px; border-radius: 8px; font-size: 14px; font-weight: 700; border: none; cursor: pointer; }
            .ca-btn-draft { background: #f1f2f4; color: #1f2430; }
            .ca-btn-save { background: #fff; color: #1f2430; border: 1px solid #d8dce1 !important; }
            .ca-btn-send { background: #e23b3b; color: #fff; padding: 16px 34px; font-size: 17px; border-radius: 10px; box-shadow: 0 4px 14px rgba(226,59,59,0.35); }
            .ca-btn-send:hover { background: #c92f2f; }

            .ca-note { margin-top: 16px; background: #eef4ff; color: #1f2430; font-size: 12.5px; padding: 10px 14px; border-radius: 8px; }

            /* Preview panel */
            .ca-preview-card { background: #fff; border-radius: 14px; padding: 20px; box-shadow: 0 2px 10px rgba(20,20,43,0.05); }
            .ca-preview-head { display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px; }
            .ca-preview-head strong { font-size: 14px; }
            .ca-preview-badge { background: #e8f8ee; color: #27ae60; font-size: 11px; font-weight: 700; padding: 3px 10px; border-radius: 12px; }
            .ca-doc-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; }
            .ca-doc-header .brand { color: #e23b3b; font-weight: 800; font-size: 15px; }
            .ca-doc-header .brand small { display: block; color: #9aa0aa; font-weight: 400; font-size: 10px; }
            .ca-doc-title { text-align: center; font-weight: 800; font-size: 17px; margin: 6px 0 2px; }
            .ca-doc-subtitle { text-align: center; color: #e23b3b; font-weight: 700; font-size: 12.5px; margin-bottom: 12px; }
            .ca-doc-meta { display: flex; justify-content: space-between; font-size: 11.5px; color: #6b7280; margin-bottom: 14px; }
            .ca-info-grid { display: flex; gap: 14px; margin-bottom: 14px; }
            .ca-info-box { flex: 1; font-size: 11.5px; background: #fafafa; border: 1px solid #eceef1; border-radius: 10px; padding: 10px 12px; }
            .ca-info-box .h { display: flex; align-items: center; gap: 6px; color: #e23b3b; font-weight: 700; margin-bottom: 6px; font-size: 11px; }
            .ca-info-box .h .badge-icon { display: inline-flex; align-items: center; justify-content: center; flex: 0 0 20px; width: 20px; height: 20px; border-radius: 50%; background: #fdf1f1; font-size: 10px; }
            .ca-info-box div { margin-bottom: 2px; }
            .ca-fee-table { width: 100%; font-size: 12px; border-collapse: collapse; margin-bottom: 10px; }
            .ca-fee-table td { padding: 4px 8px; border-bottom: 1px solid #f4f4f6; }
            .ca-fee-table td:last-child { text-align: right; }
            .ca-fee-table tr.total td { font-weight: 800; color: #e23b3b; background: #fdf1f1; border-top: 1px solid #e23b3b; border-bottom: none; padding-top: 8px; padding-bottom: 8px; }
            .ca-fee-table tr.total td:first-child { border-radius: 6px 0 0 6px; }
            .ca-fee-table tr.total td:last-child { border-radius: 0 6px 6px 0; }
            .ca-preview-section-title { color: #e23b3b; font-weight: 700; font-size: 11.5px; margin: 10px 0 6px; }
            .ca-preview-mini-table { width: 100%; font-size: 11px; border-collapse: collapse; }
            .ca-preview-mini-table th, .ca-preview-mini-table td { padding: 4px 6px; border-bottom: 1px solid #f4f4f6; text-align: left; }
            .ca-sig-row { display: flex; gap: 14px; margin-top: 16px; }
            .ca-sig-box { flex: 1; border: 1px dashed #d8dce1; border-radius: 10px; padding: 14px 12px; text-align: center; }
            .ca-sig-box .lbl { color: #e23b3b; font-weight: 700; font-size: 11px; margin-bottom: 8px; }
            .ca-sig-box .placeholder { color: #b3b8bf; font-size: 11.5px; display: flex; flex-direction: column; align-items: center; gap: 6px; }
            .ca-sig-box .placeholder i { font-size: 20px; color: #d8dce1; }

            /* Toast */
            #ca-toast { display:none; position:fixed; bottom:24px; right:24px; background:#1f2430; color:#fff; padding:12px 20px; border-radius:8px; font-size:13.5px; z-index:9999; box-shadow:0 6px 20px rgba(0,0,0,0.2); align-items:center; gap:8px; }
            #ca-toast.ca-toast-success { background:#1e7e42; }
            #ca-toast.ca-toast-error { background:#c0392b; }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <?= view('admininclude/header.php'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?= view('admininclude/admin_nav'); ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid ca-page">
                        <h4 style="margin-bottom:6px;">Create / Edit Agreement</h4>
                        <div class="ca-legend">
                            <span><span class="dot dot-dyn"></span>Dynamic Field (Editable)</span>
                            <span><span class="dot dot-static"></span>Static Field (Non-editable)</span>
                        </div>

                        <?php $locked = in_array($agreement['status'], ['signed', 'declined'], true); ?>
                        <?php if ($locked): ?>
                            <div class="ca-note" style="background:#fdecec;color:#c0392b;font-weight:700;font-size:13.5px;margin-bottom:16px;">
                                <?php if ($agreement['status'] === 'signed'): ?>
                                    &#128274; This agreement has been signed and is now locked. It can no longer be edited, resent, or signed again.
                                <?php else: ?>
                                    &#128683; This agreement was declined by the client and is locked. Create a new agreement instead of editing or resending this one.
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <form id="caEditForm" method="post" action="<?php echo base_url('agreement/Agreement/save/' . $agreement['id']); ?>">
                        <div class="ca-grid">
                            <div class="ca-form-col">
                                <fieldset<?php echo $locked ? ' disabled' : ''; ?> style="border:none;padding:0;margin:0;">

                                <div class="ca-card">
                                    <h5><span class="ca-card-icon" style="background:#e8f8ee;color:#27ae60;"><i class="fas fa-file-alt"></i></span> Agreement Information</h5>
                                    <div class="ca-row">
                                        <div class="ca-field">
                                            <label>Application Type</label>
                                            <select name="type_id" id="f_type_id">
                                                <?php foreach ($typeOptions as $t): ?>
                                                    <option value="<?php echo $t['tyid']; ?>" <?php echo ((int)$agreement['type_id'] === (int)$t['tyid']) ? 'selected' : ''; ?>>
                                                        <?php echo esc(($t['ct'] ?? '') . ' — ' . $t['type']); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="ca-field">
                                            <label>Agreement Template</label>
                                            <select id="f_template_id">
                                                <option value="">-- Select Template --</option>
                                                <?php foreach ($templates as $tpl): ?>
                                                    <option value="<?php echo $tpl['id']; ?>"><?php echo esc($tpl['name']); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="ca-row">
                                        <div class="ca-field">
                                            <label>Client Name</label>
                                            <input type="text" name="client_name" id="f_client_name" value="<?php echo esc($agreement['client_name']); ?>">
                                        </div>
                                        <div class="ca-field">
                                            <label>SiaID</label>
                                            <input type="text" value="<?php echo (int) $agreement['prospect_id']; ?>" readonly>
                                        </div>
                                        <div class="ca-field">
                                            <label>Date</label>
                                            <input type="date" name="agreement_date" id="f_agreement_date" value="<?php echo esc($agreement['agreement_date']); ?>">
                                        </div>
                                    </div>
                                    <div class="ca-row">
                                        <div class="ca-field">
                                            <label>Client Email</label>
                                            <input type="text" name="client_email" id="f_client_email" value="<?php echo esc($agreement['client_email']); ?>">
                                        </div>
                                        <div class="ca-field">
                                            <label>Client Phone</label>
                                            <input type="text" name="client_phone" id="f_client_phone" value="<?php echo esc($agreement['client_phone']); ?>">
                                        </div>
                                    </div>
                                    <div class="ca-row">
                                        <div class="ca-field">
                                            <label>Consultant Name</label>
                                            <input type="text" id="f_consultant_name" value="<?php echo esc($agreement['consultant_name']); ?>" readonly>
                                        </div>
                                        <div class="ca-field">
                                            <label>RCIC Number</label>
                                            <input type="text" id="f_rcic_number" value="<?php echo esc($agreement['rcic_number']); ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="ca-card">
                                    <h5><span class="ca-card-icon" style="background:#f4eafb;color:#8e44ad;"><i class="fas fa-file-invoice-dollar"></i></span> Application &amp; Fees</h5>
                                    <div class="ca-row">
                                        <div class="ca-field">
                                            <label>Professional Service Fee (<span class="ca-cur-label">CAD</span>)</label>
                                            <input type="number" step="0.01" name="service_fee" id="f_service_fee" value="<?php echo esc($agreement['service_fee']); ?>">
                                        </div>
                                        <input type="hidden" id="f_gst_rate" value="5">
                                        <div class="ca-field">
                                            <label>GST Amount (5%) (<span class="ca-cur-label">CAD</span>)</label>
                                            <input type="text" id="f_gst_amount_display" readonly>
                                        </div>
                                        <div class="ca-field">
                                            <label>Total Service Fee incl. GST (<span class="ca-cur-label">CAD</span>)</label>
                                            <input type="text" id="f_service_total_display" readonly>
                                        </div>
                                    </div>
                                    <div class="ca-subsection-title">Government processing fee</div>
                                    <div class="ca-row">
                                        <div class="ca-field">
                                            <label>Main Applicant (<span class="ca-cur-label">CAD</span>)</label>
                                            <input type="number" step="0.01" name="govt_proc_main" id="f_govt_proc_main" value="<?php echo esc($agreement['govt_proc_main'] ?? 0); ?>">
                                        </div>
                                        <div class="ca-field">
                                            <label>Spouse (<span class="ca-cur-label">CAD</span>)</label>
                                            <input type="number" step="0.01" name="govt_proc_spouse" id="f_govt_proc_spouse" value="<?php echo esc($agreement['govt_proc_spouse'] ?? 0); ?>">
                                        </div>
                                    </div>
                                    <div class="ca-row">
                                        <div class="ca-field">
                                            <label>Dependent Child Above 22 (<span class="ca-cur-label">CAD</span>)</label>
                                            <input type="number" step="0.01" name="govt_proc_dep_above22" id="f_govt_proc_dep_above22" value="<?php echo esc($agreement['govt_proc_dep_above22'] ?? 0); ?>">
                                        </div>
                                        <div class="ca-field">
                                            <label>Dependent Child Under 22 (<span class="ca-cur-label">CAD</span>)</label>
                                            <input type="number" step="0.01" name="govt_proc_dep_under22" id="f_govt_proc_dep_under22" value="<?php echo esc($agreement['govt_proc_dep_under22'] ?? 0); ?>">
                                        </div>
                                    </div>

                                    <div class="ca-subsection-title">Government Right of Permanent Residence fee</div>
                                    <div class="ca-row">
                                        <div class="ca-field">
                                            <label>Main Applicant (<span class="ca-cur-label">CAD</span>)</label>
                                            <input type="number" step="0.01" name="govt_pr_main" id="f_govt_pr_main" value="<?php echo esc($agreement['govt_pr_main'] ?? 0); ?>">
                                        </div>
                                        <div class="ca-field">
                                            <label>Spouse (<span class="ca-cur-label">CAD</span>)</label>
                                            <input type="number" step="0.01" name="govt_pr_spouse" id="f_govt_pr_spouse" value="<?php echo esc($agreement['govt_pr_spouse'] ?? 0); ?>">
                                        </div>
                                        <div class="ca-field">
                                            <label>PNP Govt. (<span class="ca-cur-label">CAD</span>)</label>
                                            <input type="number" step="0.01" name="govt_pr_pnp" id="f_govt_pr_pnp" value="<?php echo esc($agreement['govt_pr_pnp'] ?? 0); ?>">
                                        </div>
                                    </div>

                                    <div class="ca-row">
                                        <div class="ca-field">
                                            <label>Government / Application Fee — Total (auto-calculated) (<span class="ca-cur-label">CAD</span>)</label>
                                            <input type="text" id="f_government_fee_display" readonly>
                                        </div>
                                        <div class="ca-field">
                                            <label>Other Fee (If Any) (<span class="ca-cur-label">CAD</span>)</label>
                                            <input type="number" step="0.01" name="other_fee" id="f_other_fee" value="<?php echo esc($agreement['other_fee']); ?>">
                                        </div>
                                    </div>
                                    <div class="ca-total-box">
                                        <span>Total Payable (<span class="ca-cur-label">CAD</span>)</span>
                                        <span class="amt" id="f_total_display">$0.00</span>
                                    </div>
                                </div>

                                <div class="ca-card">
                                    <h5><span class="ca-card-icon" style="background:#eaf1fb;color:#3498db;"><i class="fas fa-calendar-alt"></i></span> Payment Schedule / Milestones</h5>
                                    <table class="ca-table" id="milestoneTable">
                                        <thead>
                                            <tr><th style="width:26%;">Milestone</th><th style="width:18%;">Amount (GST Included)</th><th>Included Services</th><th style="width:36px;"></th></tr>
                                        </thead>
                                        <tbody id="milestoneBody">
                                            <?php foreach ($milestones as $i => $m): ?>
                                            <tr>
                                                <td><input type="text" name="milestones[<?php echo $i; ?>][milestone]" value="<?php echo esc($m['milestone']); ?>"></td>
                                                <td><input type="number" step="0.01" name="milestones[<?php echo $i; ?>][amount]" value="<?php echo esc($m['amount']); ?>" placeholder="Included"></td>
                                                <td><input type="text" name="milestones[<?php echo $i; ?>][included_services]" value="<?php echo esc($m['included_services']); ?>"></td>
                                                <td class="ca-actions"><button type="button" onclick="caRemoveRow(this)">&#128465;</button></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <button type="button" class="ca-btn-add" onclick="caAddMilestone()">+ Add Milestone</button>
                                </div>

                                <div class="ca-card">
                                    <h5><span class="ca-card-icon" style="background:#fdf1e3;color:#e08e2b;"><i class="fas fa-folder-plus"></i></span> Additional Fees (If Applicable)</h5>
                                    <table class="ca-table" id="feeTable">
                                        <thead>
                                            <tr><th>Description</th><th style="width:20%;">Amount</th><th style="width:36px;"></th></tr>
                                        </thead>
                                        <tbody id="feeBody">
                                            <?php foreach ($additionalFees as $i => $f): ?>
                                            <tr>
                                                <td><input type="text" name="additional_fees[<?php echo $i; ?>][description]" value="<?php echo esc($f['description']); ?>"></td>
                                                <td><input type="number" step="0.01" name="additional_fees[<?php echo $i; ?>][amount]" value="<?php echo esc($f['amount']); ?>"></td>
                                                <td class="ca-actions"><button type="button" onclick="caRemoveRow(this)">&#128465;</button></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <button type="button" class="ca-btn-add" onclick="caAddFee()">+ Add Additional Fee</button>
                                </div>
                                </fieldset>

                                <div class="ca-card">
                                    <input type="hidden" name="template_save_name" id="f_template_save_name">
                                    <?php if (!$locked): ?>
                                    <div class="ca-actions-row">
                                        <button type="button" class="ca-btn-draft" onclick="document.getElementById('caEditForm').submit();">Save as Draft</button>
                                        <button type="button" class="ca-btn-draft" onclick="caSaveAsTemplate();">Save as Template</button>
                                        <button type="button" class="ca-btn-save" onclick="document.getElementById('caEditForm').submit();">Save &amp; Generate Preview</button>
                                        <button type="button" class="ca-btn-send" id="caSendBtn" onclick="caSendForEsign();">Send for eSign</button>
                                    </div>
                                    <div class="ca-actions-row" style="margin-top:10px;">
                                        <a href="<?php echo base_url('agreement/Agreement/edit_clauses/' . $agreement['id']); ?>" class="ca-btn-draft" style="text-decoration:none;display:inline-flex;align-items:center;justify-content:center;flex:none;padding:10px 20px;">Edit Clause Text</a>
                                    </div>
                                    <div class="ca-note">Dynamic fields are editable and will appear in the final agreement. Fee/milestone changes update the live preview instantly. "Send for eSign" emails the client a signing link; the PDF is generated automatically once they sign.</div>

                                    <div class="ca-note" style="background:#fff8e6;margin-top:10px;">
                                        <strong>Signing link (manual)</strong> — generates/shows the link without emailing it, for cases where you want to send it yourself (e.g. WhatsApp).
                                        <?php if (!empty($signUrl)): ?>
                                            <div style="display:flex;gap:8px;margin-top:8px;">
                                                <input type="text" readonly value="<?php echo esc($signUrl); ?>" id="caSignUrl" style="flex:1;padding:6px 10px;border:1px solid #d8dce1;border-radius:6px;font-size:12.5px;">
                                                <button type="button" class="ca-btn-add" onclick="navigator.clipboard.writeText(document.getElementById('caSignUrl').value); caComingSoon('Link copied.');">Copy</button>
                                                <a href="<?php echo esc($signUrl); ?>" target="_blank" class="ca-btn-add" style="text-decoration:none;display:inline-flex;align-items:center;">Open</a>
                                            </div>
                                        <?php else: ?>
                                            <button type="button" class="ca-btn-add" style="margin-top:8px;" onclick="caGenerateLinkOnly();">Generate Signing Link</button>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>

                                    <?php if (!empty($agreement['pdf_path'])): ?>
                                    <div class="ca-note" style="background:#eafaf0;margin-top:10px;">
                                        <strong>Signed PDF</strong> — available any time, no client link/access code needed.
                                        <div style="margin-top:8px;">
                                            <a href="<?php echo base_url('agreement/Agreement/pdf/' . $agreement['id']); ?>" target="_blank" class="ca-btn-add" style="text-decoration:none;display:inline-block;">View / Download Signed PDF</a>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>

                            </div>

                            <div class="ca-preview-col">
                                <div class="ca-preview-card">
                                    <div class="ca-preview-head">
                                        <strong>&#128065; Live Agreement Preview</strong>
                                        <span class="ca-preview-badge">Updates in real-time</span>
                                    </div>
                                    <div class="ca-doc-header">
                                        <div class="brand">SIA IMMIGRATION<br><small>SOLUTIONS INC.</small></div>
                                        <div class="brand" style="color:#c0392b;">RCIC</div>
                                    </div>
                                    <div class="ca-doc-title">SERVICE AGREEMENT</div>
                                    <div class="ca-doc-subtitle" id="p_agreement_type">—</div>
                                    <div class="ca-doc-meta">
                                        <span>SiaID: <?php echo (int) $agreement['prospect_id']; ?></span>
                                        <span id="p_date">—</span>
                                    </div>
                                    <div class="ca-info-grid">
                                        <div class="ca-info-box">
                                            <div class="h"><span class="badge-icon">&#128100;</span> CLIENT INFORMATION</div>
                                            <div>Name: <span id="p_client_name">—</span></div>
                                            <div>Phone: <span id="p_client_phone">—</span></div>
                                            <div>Email: <span id="p_client_email">—</span></div>
                                        </div>
                                        <div class="ca-info-box">
                                            <div class="h"><span class="badge-icon">&#128737;&#65039;</span> RCIC INFORMATION</div>
                                            <div>Name: <span id="p_consultant_name">—</span></div>
                                            <div>RCIC#: <span id="p_rcic_number">—</span></div>
                                        </div>
                                    </div>
                                    <div class="ca-preview-section-title">FEES &amp; PAYMENT SUMMARY</div>
                                    <table class="ca-fee-table">
                                        <tr><td>Professional Service Fee</td><td id="p_service_fee">$0.00</td></tr>
                                        <tr><td>GST (<span id="p_gst_rate">0</span>%) on Service Fee</td><td id="p_gst_amount">$0.00</td></tr>
                                        <tbody id="p_govt_fee_rows"></tbody>
                                        <tr><td>Other Fee (If Any)</td><td id="p_other_fee">$0.00</td></tr>
                                        <tr class="total"><td>TOTAL PAYABLE</td><td id="p_total">$0.00</td></tr>
                                    </table>
                                    <div class="ca-preview-section-title">PAYMENT SCHEDULE / MILESTONES</div>
                                    <table class="ca-preview-mini-table">
                                        <thead><tr><th>Milestone</th><th>Amount (GST Included)</th></tr></thead>
                                        <tbody id="p_milestones"></tbody>
                                    </table>
                                    <div class="ca-preview-section-title">ADDITIONAL FEES (IF APPLICABLE)</div>
                                    <table class="ca-preview-mini-table">
                                        <thead><tr><th>Description</th><th>Amount</th></tr></thead>
                                        <tbody id="p_additional_fees"></tbody>
                                    </table>
                                    <div class="ca-sig-row">
                                        <div class="ca-sig-box">
                                            <div class="lbl">CLIENT SIGNATURE</div>
                                            <?php if (!empty($agreement['client_signature'])): ?>
                                                <img src="<?php echo base_url($agreement['client_signature']); ?>" alt="Client signature" style="max-height:44px;">
                                            <?php elseif (!empty($agreement['client_typed_name'])): ?>
                                                <div style="font-family:'Brush Script MT',cursive;font-size:22px;color:#1f2430;"><?php echo esc($agreement['client_typed_name']); ?></div>
                                            <?php else: ?>
                                                <div class="placeholder"><i class="fas fa-user-circle"></i> To be signed by client</div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="ca-sig-box">
                                            <div class="lbl">CONSULTANT SIGNATURE</div>
                                            <img src="<?php echo base_url('public/assets_client/img/rcic_signature.png'); ?>" alt="Consultant signature" style="max-height:44px;">
                                        </div>
                                    </div>
                                    <div class="ca-note" style="margin-top:14px;">This is a preview. Final PDF may include additional clauses and pages.</div>
                                </div>
                            </div>
                        </div>
                        </form>

                    </div>
                </main>
            </div>
        </div>
        <div id="ca-toast"></div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/public/assets_client/js/plugins/sweetalert2.js"></script>
        <script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>
        <script>
            var caTypeOptions = <?php echo json_encode($typeOptions); ?>;
            var caMilestoneCounter = <?php echo count($milestones); ?>;
            var caFeeCounter = <?php echo count($additionalFees); ?>;
            var CA_BASE = '<?php echo base_url(); ?>/';
            var CA_AGREEMENT_ID = <?php echo (int) $agreement['id']; ?>;

            function caFmt(n) {
                n = parseFloat(n) || 0;
                return '$' + n.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }

            function caUpdateApplicationTypeDisplay() {
                var sel = document.getElementById('f_type_id');
                var label = sel.options[sel.selectedIndex] ? sel.options[sel.selectedIndex].text : '';
                document.getElementById('p_agreement_type').textContent = label;
            }

            // The 7 itemized government-fee inputs (Government processing fee: Main Applicant/
            // Spouse/Dependent above+under 22; Government Right of Permanent Residence fee: Main
            // Applicant/Spouse/PNP Govt.) auto-sum into the single "Government / Application Fee"
            // total used everywhere else (page-1 summary, total payable) — no manual entry for it.
            function caGovtFeeIds() {
                return ['f_govt_proc_main', 'f_govt_proc_spouse', 'f_govt_proc_dep_above22', 'f_govt_proc_dep_under22',
                        'f_govt_pr_main', 'f_govt_pr_spouse', 'f_govt_pr_pnp'];
            }

            function caUpdateFees() {
                var service = parseFloat(document.getElementById('f_service_fee').value) || 0;
                var gstRate = parseFloat(document.getElementById('f_gst_rate').value) || 0;
                var govt = caGovtFeeIds().reduce(function (sum, id) {
                    return sum + (parseFloat(document.getElementById(id).value) || 0);
                }, 0);
                var other = parseFloat(document.getElementById('f_other_fee').value) || 0;
                var gstAmount = Math.round(service * gstRate) / 100;
                var serviceTotal = service + gstAmount;
                var total = serviceTotal + govt + other;

                document.getElementById('f_gst_amount_display').value = caFmt(gstAmount);
                document.getElementById('f_service_total_display').value = caFmt(serviceTotal);
                document.getElementById('f_government_fee_display').value = caFmt(govt);
                document.getElementById('f_total_display').textContent = caFmt(total);

                document.getElementById('p_service_fee').textContent = caFmt(service);
                document.getElementById('p_gst_rate').textContent = gstRate;
                document.getElementById('p_gst_amount').textContent = caFmt(gstAmount);
                caUpdateGovtFeeRows();
                document.getElementById('p_other_fee').textContent = caFmt(other);
                document.getElementById('p_total').textContent = caFmt(total);
            }

            // Mirrors AgreementClauses::governmentFeeLines() (PHP) so the live preview matches
            // the client-facing "Fees & Payment Summary" table exactly: one grouped sub-heading
            // row per non-zero government-fee category, or a single legacy total line if none
            // of the 7 breakdown fields have been filled in yet.
            function caUpdateGovtFeeRows() {
                var groups = [
                    { group: 'Government Processing Fee', items: [
                        ['Main Applicant', 'f_govt_proc_main'],
                        ['Spouse', 'f_govt_proc_spouse'],
                        ['Dependent Child Above 22 Years of Age', 'f_govt_proc_dep_above22'],
                        ['Dependent Child Under 22 Years of Age', 'f_govt_proc_dep_under22']
                    ] },
                    { group: 'Government Right of Permanent Residence Fee', items: [
                        ['Main Applicant', 'f_govt_pr_main'],
                        ['Spouse', 'f_govt_pr_spouse'],
                        ['PNP Govt.', 'f_govt_pr_pnp']
                    ] }
                ];

                var html = '';
                var any = false;
                groups.forEach(function (g) {
                    var rows = '';
                    g.items.forEach(function (item) {
                        var amt = parseFloat(document.getElementById(item[1]).value) || 0;
                        if (amt > 0) {
                            rows += '<tr><td style="padding-left:10px;color:#555;">' + item[0] + '</td><td>' + caFmt(amt) + '</td></tr>';
                        }
                    });
                    if (rows) {
                        any = true;
                        html += '<tr><td colspan="2" style="font-weight:700;color:#e23b3b;padding-top:6px;">' + g.group + '</td></tr>' + rows;
                    }
                });

                if (!any) {
                    var total = caGovtFeeIds().reduce(function (sum, id) {
                        return sum + (parseFloat(document.getElementById(id).value) || 0);
                    }, 0);
                    html = '<tr><td>Government / Application Fee</td><td>' + caFmt(total) + '</td></tr>';
                }

                document.getElementById('p_govt_fee_rows').innerHTML = html;
            }

            function caUpdateHeaderPreview() {
                document.getElementById('p_client_name').textContent = document.getElementById('f_client_name').value || '—';
                document.getElementById('p_client_phone').textContent = document.getElementById('f_client_phone').value || '—';
                document.getElementById('p_client_email').textContent = document.getElementById('f_client_email').value || '—';
                document.getElementById('p_consultant_name').textContent = document.getElementById('f_consultant_name').value || '—';
                document.getElementById('p_rcic_number').textContent = document.getElementById('f_rcic_number').value || '—';
                document.getElementById('p_date').textContent = document.getElementById('f_agreement_date').value || '—';
            }

            // Milestone amounts are entered pre-GST; the preview (and the client-facing document)
            // always shows what the client actually pays at that milestone, i.e. amount + 5% GST.
            function caUpdateMilestonesPreview() {
                var rows = document.querySelectorAll('#milestoneBody tr');
                var html = '';
                rows.forEach(function (row) {
                    var inputs = row.querySelectorAll('input');
                    var m = inputs[0].value, amtStr = inputs[1].value;
                    if (!m) return;
                    var display = amtStr ? caFmt((parseFloat(amtStr) || 0) * 1.05) : 'Included';
                    html += '<tr><td>' + m + '</td><td>' + display + '</td></tr>';
                });
                document.getElementById('p_milestones').innerHTML = html;
            }

            function caUpdateFeesPreview() {
                var rows = document.querySelectorAll('#feeBody tr');
                var html = '';
                rows.forEach(function (row) {
                    var inputs = row.querySelectorAll('input');
                    var d = inputs[0].value, amt = inputs[1].value;
                    if (!d) return;
                    html += '<tr><td>' + d + '</td><td>' + caFmt(amt) + '</td></tr>';
                });
                document.getElementById('p_additional_fees').innerHTML = html;
            }

            function caUpdatePreview() {
                caUpdateApplicationTypeDisplay();
                caUpdateFees();
                caUpdateHeaderPreview();
                caUpdateMilestonesPreview();
                caUpdateFeesPreview();
            }

            function caRemoveRow(btn) {
                btn.closest('tr').remove();
                caUpdatePreview();
            }

            function caAddMilestone() {
                var idx = caMilestoneCounter++;
                var tr = document.createElement('tr');
                tr.innerHTML =
                    '<td><input type="text" name="milestones[' + idx + '][milestone]"></td>' +
                    '<td><input type="number" step="0.01" name="milestones[' + idx + '][amount]" placeholder="Included"></td>' +
                    '<td><input type="text" name="milestones[' + idx + '][included_services]"></td>' +
                    '<td class="ca-actions"><button type="button" onclick="caRemoveRow(this)">&#128465;</button></td>';
                document.getElementById('milestoneBody').appendChild(tr);
            }

            function caAddFee() {
                var idx = caFeeCounter++;
                var tr = document.createElement('tr');
                tr.innerHTML =
                    '<td><input type="text" name="additional_fees[' + idx + '][description]"></td>' +
                    '<td><input type="number" step="0.01" name="additional_fees[' + idx + '][amount]"></td>' +
                    '<td class="ca-actions"><button type="button" onclick="caRemoveRow(this)">&#128465;</button></td>';
                document.getElementById('feeBody').appendChild(tr);
            }

            // type: 'success' | 'error' | 'info'
            function caShowToast(msg, type) {
                var t = document.getElementById('ca-toast');
                var icon = type === 'success' ? '✅ ' : (type === 'error' ? '⚠️ ' : '');
                t.textContent = icon + msg;
                t.className = type === 'success' ? 'ca-toast-success' : (type === 'error' ? 'ca-toast-error' : '');
                t.style.display = 'flex';
                setTimeout(function () { t.style.display = 'none'; }, 4000);
            }

            function caComingSoon(msg) {
                caShowToast(msg, 'info');
            }

            function caGenerateLinkOnly() {
                var form = document.getElementById('caEditForm');
                form.action = CA_BASE + 'agreement/Agreement/generate_link/' + CA_AGREEMENT_ID;
                form.submit();
            }

            // caSending guards against a rapid double-click firing two Swal confirms / two
            // form submits; the server's last_sent_at debounce is the authoritative guard
            // (also covers two separate browser tabs), this just avoids the obvious case.
            var caSending = false;
            function caSendForEsign() {
                if (caSending) return;
                Swal.fire({
                    title: 'Send for eSign?',
                    text: 'Send this agreement to the client\'s email now for e-signature?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Send It',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#4c3ff5',
                    reverseButtons: true
                }).then(function (result) {
                    if (!result.value) return;
                    caSending = true;
                    var btn = document.getElementById('caSendBtn');
                    if (btn) { btn.disabled = true; btn.textContent = 'Sending…'; }
                    var form = document.getElementById('caEditForm');
                    form.action = CA_BASE + 'agreement/Agreement/generate_link/' + CA_AGREEMENT_ID + '?notify=1';
                    form.submit();
                });
            }

            function caSaveAsTemplate() {
                var name = prompt('Name this template:');
                if (!name) return;
                document.getElementById('f_template_save_name').value = name;
                var form = document.getElementById('caEditForm');
                form.action = CA_BASE + 'agreement/Template/save/' + CA_AGREEMENT_ID;
                form.submit();
            }

            function caApplyTemplate(tpl) {
                if (tpl.type_id) {
                    document.getElementById('f_type_id').value = tpl.type_id;
                }
                document.getElementById('f_service_fee').value = tpl.service_fee || 0;
                document.getElementById('f_govt_proc_main').value = tpl.govt_proc_main || 0;
                document.getElementById('f_govt_proc_spouse').value = tpl.govt_proc_spouse || 0;
                document.getElementById('f_govt_proc_dep_above22').value = tpl.govt_proc_dep_above22 || 0;
                document.getElementById('f_govt_proc_dep_under22').value = tpl.govt_proc_dep_under22 || 0;
                document.getElementById('f_govt_pr_main').value = tpl.govt_pr_main || 0;
                document.getElementById('f_govt_pr_spouse').value = tpl.govt_pr_spouse || 0;
                document.getElementById('f_govt_pr_pnp').value = tpl.govt_pr_pnp || 0;
                document.getElementById('f_other_fee').value = tpl.other_fee || 0;

                caMilestoneCounter = 0;
                document.getElementById('milestoneBody').innerHTML = '';
                (tpl.milestones || []).forEach(function (m) {
                    var idx = caMilestoneCounter++;
                    var tr = document.createElement('tr');
                    tr.innerHTML =
                        '<td><input type="text" name="milestones[' + idx + '][milestone]" value="' + (m.milestone || '') + '"></td>' +
                        '<td><input type="number" step="0.01" name="milestones[' + idx + '][amount]" value="' + (m.amount || '') + '" placeholder="Included"></td>' +
                        '<td><input type="text" name="milestones[' + idx + '][included_services]" value="' + (m.included_services || '') + '"></td>' +
                        '<td class="ca-actions"><button type="button" onclick="caRemoveRow(this)">&#128465;</button></td>';
                    document.getElementById('milestoneBody').appendChild(tr);
                });

                caFeeCounter = 0;
                document.getElementById('feeBody').innerHTML = '';
                (tpl.additional_fees || []).forEach(function (f) {
                    var idx = caFeeCounter++;
                    var tr = document.createElement('tr');
                    tr.innerHTML =
                        '<td><input type="text" name="additional_fees[' + idx + '][description]" value="' + (f.description || '') + '"></td>' +
                        '<td><input type="number" step="0.01" name="additional_fees[' + idx + '][amount]" value="' + (f.amount || '') + '"></td>' +
                        '<td class="ca-actions"><button type="button" onclick="caRemoveRow(this)">&#128465;</button></td>';
                    document.getElementById('feeBody').appendChild(tr);
                });

                caUpdatePreview();
            }

            $('#f_template_id').on('change', function () {
                var id = this.value;
                if (!id) return;
                $.get(CA_BASE + 'agreement/Template/get/' + id, function (data) {
                    if (data && Object.keys(data).length) caApplyTemplate(data);
                }, 'json');
            });

            document.getElementById('caEditForm').addEventListener('input', caUpdatePreview);
            document.getElementById('caEditForm').addEventListener('change', caUpdatePreview);
            caUpdatePreview();

            <?php if ($flashMessage = session()->getFlashdata('message')): ?>
                caShowToast(<?php echo json_encode($flashMessage); ?>, 'success');
            <?php elseif ($flashError = session()->getFlashdata('error')): ?>
                caShowToast(<?php echo json_encode($flashError); ?>, 'error');
            <?php endif; ?>
        </script>
    </body>
</html>
