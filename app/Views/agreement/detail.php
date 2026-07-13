<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Create / Edit Agreement - Siaportal</title>
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
            .ca-card h5 { font-size: 15px; font-weight: 700; margin: 0 0 16px; display: flex; align-items: center; gap: 8px; }
            .ca-row { display: flex; gap: 14px; margin-bottom: 14px; flex-wrap: wrap; }
            .ca-field { flex: 1; min-width: 160px; }
            .ca-field label { font-size: 12.5px; font-weight: 600; color: #444; margin-bottom: 4px; display: block; }
            .ca-field input, .ca-field select {
                width: 100%; padding: 8px 10px; border: 1px solid #d8dce1; border-radius: 6px; font-size: 13.5px;
            }
            .ca-field input[readonly] { background: #f5f5f5; color: #666; }

            .ca-table { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
            .ca-table th { text-align: left; font-size: 11.5px; color: #6b7280; padding: 6px 8px; border-bottom: 1px solid #eef0f2; }
            .ca-table td { padding: 5px 6px; border-bottom: 1px solid #f4f4f6; }
            .ca-table td input { width: 100%; padding: 6px 8px; border: 1px solid #d8dce1; border-radius: 5px; font-size: 13px; }
            .ca-table td.ca-actions { white-space: nowrap; text-align: center; }
            .ca-table td.ca-actions button { border: none; background: none; cursor: pointer; color: #e74c3c; font-size: 14px; }

            .ca-btn-add { background: none; border: 1px dashed #cfd4da; color: #1a73e8; padding: 6px 14px; border-radius: 6px; font-size: 13px; font-weight: 600; cursor: pointer; }

            .ca-total-box { background: #fdecec; color: #e23b3b; border-radius: 8px; padding: 12px 16px; font-weight: 700; display: flex; justify-content: space-between; align-items: center; margin-top: 10px; }
            .ca-total-box .amt { font-size: 20px; }

            .ca-check-row { display: flex; gap: 22px; flex-wrap: wrap; margin-bottom: 14px; }
            .ca-check-row label { font-size: 13px; font-weight: 600; display: flex; align-items: center; gap: 6px; }

            .ca-actions-row { display: flex; gap: 10px; margin-top: 4px; }
            .ca-actions-row button { padding: 10px 20px; border-radius: 8px; font-size: 14px; font-weight: 700; border: none; cursor: pointer; }
            .ca-btn-draft { background: #f1f2f4; color: #1f2430; }
            .ca-btn-save { background: #e23b3b; color: #fff; }
            .ca-btn-send { background: #fff; color: #1f2430; border: 1px solid #d8dce1 !important; }

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
            .ca-info-box { flex: 1; font-size: 11.5px; }
            .ca-info-box .h { color: #e23b3b; font-weight: 700; margin-bottom: 4px; font-size: 11px; }
            .ca-info-box div { margin-bottom: 2px; }
            .ca-fee-table { width: 100%; font-size: 12px; border-collapse: collapse; margin-bottom: 10px; }
            .ca-fee-table td { padding: 4px 0; border-bottom: 1px solid #f4f4f6; }
            .ca-fee-table td:last-child { text-align: right; }
            .ca-fee-table tr.total td { font-weight: 800; color: #e23b3b; border-top: 1px solid #e23b3b; border-bottom: none; }
            .ca-preview-section-title { color: #e23b3b; font-weight: 700; font-size: 11.5px; margin: 10px 0 6px; }
            .ca-preview-mini-table { width: 100%; font-size: 11px; border-collapse: collapse; }
            .ca-preview-mini-table th, .ca-preview-mini-table td { padding: 4px 6px; border-bottom: 1px solid #f4f4f6; text-align: left; }

            /* Toast */
            #ca-toast { display:none; position:fixed; bottom:24px; right:24px; background:#1f2430; color:#fff; padding:12px 20px; border-radius:8px; font-size:13.5px; z-index:9999; box-shadow:0 6px 20px rgba(0,0,0,0.2); }
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

                        <form id="caEditForm" method="post" action="<?php echo base_url('agreement/Agreement/save/' . $agreement['id']); ?>">
                        <div class="ca-grid">
                            <div class="ca-form-col">

                                <div class="ca-card">
                                    <h5>Agreement Information</h5>
                                    <div class="ca-row">
                                        <div class="ca-field">
                                            <label>Agreement Type</label>
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
                                            <select name="template_name">
                                                <option value="Default Template" selected>Default Template</option>
                                            </select>
                                        </div>
                                        <div class="ca-field">
                                            <label>Reference Number</label>
                                            <input type="text" value="<?php echo esc($agreement['reference_number']); ?>" readonly>
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
                                            <label>File Number</label>
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
                                            <input type="text" name="consultant_name" id="f_consultant_name" value="<?php echo esc($agreement['consultant_name']); ?>">
                                        </div>
                                        <div class="ca-field">
                                            <label>RCIC Number</label>
                                            <input type="text" name="rcic_number" id="f_rcic_number" value="<?php echo esc($agreement['rcic_number']); ?>">
                                        </div>
                                        <div class="ca-field">
                                            <label>Agreement Currency</label>
                                            <select name="currency" id="f_currency">
                                                <?php foreach (['CAD' => 'CAD - Canadian Dollar', 'USD' => 'USD - US Dollar'] as $code => $label): ?>
                                                    <option value="<?php echo $code; ?>" <?php echo ($agreement['currency'] === $code) ? 'selected' : ''; ?>><?php echo esc($label); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="ca-card">
                                    <h5>Application &amp; Fees</h5>
                                    <div class="ca-row">
                                        <div class="ca-field" style="flex:2;">
                                            <label>Application Type</label>
                                            <input type="text" id="f_application_type_display" readonly>
                                        </div>
                                        <div class="ca-field">
                                            <label>Professional Service Fee (<span class="ca-cur-label">CAD</span>)</label>
                                            <input type="number" step="0.01" name="service_fee" id="f_service_fee" value="<?php echo esc($agreement['service_fee']); ?>">
                                        </div>
                                        <div class="ca-field">
                                            <label>GST Rate (%)</label>
                                            <select name="gst_rate" id="f_gst_rate">
                                                <?php foreach ([0, 5, 12, 13, 15] as $rate): ?>
                                                    <option value="<?php echo $rate; ?>" <?php echo ((float)$agreement['gst_rate'] === (float)$rate) ? 'selected' : ''; ?>><?php echo $rate; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="ca-field">
                                            <label>GST Amount (<span class="ca-cur-label">CAD</span>)</label>
                                            <input type="text" id="f_gst_amount_display" readonly>
                                        </div>
                                    </div>
                                    <div class="ca-row">
                                        <div class="ca-field">
                                            <label>Government / Application Fee (<span class="ca-cur-label">CAD</span>)</label>
                                            <input type="number" step="0.01" name="government_fee" id="f_government_fee" value="<?php echo esc($agreement['government_fee']); ?>">
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
                                    <h5>Payment Schedule / Milestones</h5>
                                    <table class="ca-table" id="milestoneTable">
                                        <thead>
                                            <tr><th style="width:22%;">Milestone</th><th style="width:14%;">Amount</th><th style="width:16%;">Due Date</th><th>Included Services</th><th style="width:36px;"></th></tr>
                                        </thead>
                                        <tbody id="milestoneBody">
                                            <?php foreach ($milestones as $i => $m): ?>
                                            <tr>
                                                <td><input type="text" name="milestones[<?php echo $i; ?>][milestone]" value="<?php echo esc($m['milestone']); ?>"></td>
                                                <td><input type="number" step="0.01" name="milestones[<?php echo $i; ?>][amount]" value="<?php echo esc($m['amount']); ?>" placeholder="Included"></td>
                                                <td><input type="text" name="milestones[<?php echo $i; ?>][due_date]" value="<?php echo esc($m['due_date']); ?>"></td>
                                                <td><input type="text" name="milestones[<?php echo $i; ?>][included_services]" value="<?php echo esc($m['included_services']); ?>"></td>
                                                <td class="ca-actions"><button type="button" onclick="caRemoveRow(this)">&#128465;</button></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <button type="button" class="ca-btn-add" onclick="caAddMilestone()">+ Add Milestone</button>
                                </div>

                                <div class="ca-card">
                                    <h5>Additional Fees (If Applicable)</h5>
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

                                <div class="ca-card">
                                    <h5>Signature &amp; Delivery Settings</h5>
                                    <div class="ca-check-row">
                                        <label><input type="checkbox" name="require_client_signature" value="1" <?php echo $agreement['require_client_signature'] ? 'checked' : ''; ?>> Require Client Signature</label>
                                        <label><input type="checkbox" name="require_consultant_signature" value="1" <?php echo $agreement['require_consultant_signature'] ? 'checked' : ''; ?>> Require Consultant Signature</label>
                                        <label><input type="checkbox" name="email_verification" value="1" <?php echo $agreement['email_verification'] ? 'checked' : ''; ?>> Email Verification</label>
                                        <label><input type="checkbox" name="send_reminder" value="1" <?php echo $agreement['send_reminder'] ? 'checked' : ''; ?>> Send Reminder</label>
                                    </div>
                                    <div class="ca-row">
                                        <div class="ca-field">
                                            <label>Reminder Days</label>
                                            <select name="reminder_days">
                                                <?php foreach ([1, 2, 3, 5, 7] as $d): ?>
                                                    <option value="<?php echo $d; ?>" <?php echo ((int)$agreement['reminder_days'] === $d) ? 'selected' : ''; ?>><?php echo $d; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="ca-field">
                                            <label>Max Reminders</label>
                                            <select name="max_reminders">
                                                <?php foreach ([1, 2, 3, 4] as $d): ?>
                                                    <option value="<?php echo $d; ?>" <?php echo ((int)$agreement['max_reminders'] === $d) ? 'selected' : ''; ?>><?php echo $d; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ca-actions-row">
                                        <button type="button" class="ca-btn-draft" onclick="document.getElementById('caEditForm').submit();">Save as Draft</button>
                                        <button type="button" class="ca-btn-save" onclick="document.getElementById('caEditForm').submit();">Save &amp; Generate Preview</button>
                                        <button type="button" class="ca-btn-send" onclick="caComingSoon('Sending for eSign will be available in a later phase.')">Send for eSign</button>
                                    </div>
                                    <div class="ca-note">Dynamic fields are editable and will appear in the final agreement. Fee/milestone changes update the live preview instantly. Sending and PDF generation are not available yet.</div>
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
                                        <span>Agreement Ref: <?php echo esc($agreement['reference_number']); ?></span>
                                        <span>SiaID: <?php echo (int) $agreement['prospect_id']; ?></span>
                                        <span id="p_date">—</span>
                                    </div>
                                    <div class="ca-info-grid">
                                        <div class="ca-info-box">
                                            <div class="h">CLIENT INFORMATION</div>
                                            <div>Name: <span id="p_client_name">—</span></div>
                                            <div>Phone: <span id="p_client_phone">—</span></div>
                                            <div>Email: <span id="p_client_email">—</span></div>
                                        </div>
                                        <div class="ca-info-box">
                                            <div class="h">RCIC INFORMATION</div>
                                            <div>Name: <span id="p_consultant_name">—</span></div>
                                            <div>RCIC#: <span id="p_rcic_number">—</span></div>
                                        </div>
                                    </div>
                                    <div class="ca-preview-section-title">FEES &amp; PAYMENT SUMMARY</div>
                                    <table class="ca-fee-table">
                                        <tr><td>Professional Service Fee</td><td id="p_service_fee">$0.00</td></tr>
                                        <tr><td>GST (<span id="p_gst_rate">0</span>%) on Service Fee</td><td id="p_gst_amount">$0.00</td></tr>
                                        <tr><td>Government / Application Fee</td><td id="p_government_fee">$0.00</td></tr>
                                        <tr><td>Other Fee (If Any)</td><td id="p_other_fee">$0.00</td></tr>
                                        <tr class="total"><td>TOTAL PAYABLE</td><td id="p_total">$0.00</td></tr>
                                    </table>
                                    <div class="ca-preview-section-title">PAYMENT SCHEDULE / MILESTONES</div>
                                    <table class="ca-preview-mini-table">
                                        <thead><tr><th>Milestone</th><th>Amount</th><th>Due</th></tr></thead>
                                        <tbody id="p_milestones"></tbody>
                                    </table>
                                    <div class="ca-preview-section-title">ADDITIONAL FEES (IF APPLICABLE)</div>
                                    <table class="ca-preview-mini-table">
                                        <thead><tr><th>Description</th><th>Amount</th></tr></thead>
                                        <tbody id="p_additional_fees"></tbody>
                                    </table>
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
        <script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>
        <script>
            var caTypeOptions = <?php echo json_encode($typeOptions); ?>;
            var caMilestoneCounter = <?php echo count($milestones); ?>;
            var caFeeCounter = <?php echo count($additionalFees); ?>;

            function caFmt(n) {
                n = parseFloat(n) || 0;
                return '$' + n.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }

            function caUpdateApplicationTypeDisplay() {
                var sel = document.getElementById('f_type_id');
                var label = sel.options[sel.selectedIndex] ? sel.options[sel.selectedIndex].text : '';
                document.getElementById('f_application_type_display').value = label;
                document.getElementById('p_agreement_type').textContent = label;
            }

            function caUpdateFees() {
                var service = parseFloat(document.getElementById('f_service_fee').value) || 0;
                var gstRate = parseFloat(document.getElementById('f_gst_rate').value) || 0;
                var govt = parseFloat(document.getElementById('f_government_fee').value) || 0;
                var other = parseFloat(document.getElementById('f_other_fee').value) || 0;
                var gstAmount = Math.round(service * gstRate) / 100;
                var total = service + gstAmount + govt + other;

                document.getElementById('f_gst_amount_display').value = caFmt(gstAmount);
                document.getElementById('f_total_display').textContent = caFmt(total);

                document.getElementById('p_service_fee').textContent = caFmt(service);
                document.getElementById('p_gst_rate').textContent = gstRate;
                document.getElementById('p_gst_amount').textContent = caFmt(gstAmount);
                document.getElementById('p_government_fee').textContent = caFmt(govt);
                document.getElementById('p_other_fee').textContent = caFmt(other);
                document.getElementById('p_total').textContent = caFmt(total);
            }

            function caUpdateHeaderPreview() {
                document.getElementById('p_client_name').textContent = document.getElementById('f_client_name').value || '—';
                document.getElementById('p_client_phone').textContent = document.getElementById('f_client_phone').value || '—';
                document.getElementById('p_client_email').textContent = document.getElementById('f_client_email').value || '—';
                document.getElementById('p_consultant_name').textContent = document.getElementById('f_consultant_name').value || '—';
                document.getElementById('p_rcic_number').textContent = document.getElementById('f_rcic_number').value || '—';
                document.getElementById('p_date').textContent = document.getElementById('f_agreement_date').value || '—';
                var curLabel = document.getElementById('f_currency').selectedOptions[0].value;
                document.querySelectorAll('.ca-cur-label').forEach(function (el) { el.textContent = curLabel; });
            }

            function caUpdateMilestonesPreview() {
                var rows = document.querySelectorAll('#milestoneBody tr');
                var html = '';
                rows.forEach(function (row) {
                    var inputs = row.querySelectorAll('input');
                    var m = inputs[0].value, amt = inputs[1].value, due = inputs[2].value;
                    if (!m) return;
                    html += '<tr><td>' + m + '</td><td>' + (amt ? caFmt(amt) : 'Included') + '</td><td>' + (due || '—') + '</td></tr>';
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
                    '<td><input type="text" name="milestones[' + idx + '][due_date]"></td>' +
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

            function caComingSoon(msg) {
                var t = document.getElementById('ca-toast');
                t.textContent = msg;
                t.style.display = 'block';
                setTimeout(function () { t.style.display = 'none'; }, 3000);
            }

            document.getElementById('caEditForm').addEventListener('input', caUpdatePreview);
            document.getElementById('caEditForm').addEventListener('change', caUpdatePreview);
            caUpdatePreview();
        </script>
    </body>
</html>
