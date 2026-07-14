<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title><?php echo esc($typeLabel); ?> - SIA Immigration eSign</title>
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
            .sg-rcic-badge { color: var(--sg-red); font-weight: 800; font-size: 15px; border: 2px solid var(--sg-red); border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; }
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
            .sg-toc-card a { display: flex; justify-content: space-between; align-items: center; padding: 7px 0; font-size: 12.5px; color: #1f2430; text-decoration: none; border-bottom: 1px solid #f4f4f6; }
            .sg-toc-card a:last-child { border-bottom: none; }
            .sg-toc-card a .tick { color: #2ecc71; }
            .sg-toc-note { background: #eef4ff; border-radius: 10px; padding: 12px 14px; font-size: 12px; margin-top: 14px; }

            .sg-doc-col { flex: 1; min-width: 0; }
            .sg-card { background: #fff; border-radius: 14px; padding: 26px 30px; box-shadow: 0 2px 10px rgba(20,20,43,0.05); margin-bottom: 18px; }
            .sg-doc-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
            .sg-doc-title { text-align: center; font-weight: 800; font-size: 22px; margin: 10px 0 4px; }
            .sg-doc-subtitle { text-align: center; color: var(--sg-red); font-weight: 700; font-size: 13px; margin-bottom: 16px; }
            .sg-doc-meta { display: flex; justify-content: space-between; font-size: 12px; color: #6b7280; margin-bottom: 18px; flex-wrap: wrap; gap: 6px; }
            .sg-info-grid { display: flex; gap: 20px; background: #fafafa; border-radius: 10px; padding: 16px 18px; margin-bottom: 20px; }
            .sg-info-box { flex: 1; font-size: 12.5px; }
            .sg-info-box .h { color: var(--sg-red); font-weight: 700; margin-bottom: 6px; font-size: 11.5px; }
            .sg-info-box div { margin-bottom: 3px; }

            .sg-section { margin-bottom: 20px; scroll-margin-top: 16px; }
            .sg-section h5 { color: var(--sg-red); font-weight: 700; font-size: 13.5px; margin: 0 0 8px; }
            .sg-section p, .sg-section li { font-size: 13px; line-height: 1.6; color: #333; }
            .sg-section ul { margin: 6px 0; padding-left: 20px; }
            hr.sg-sep { border: none; border-top: 1px solid #eceef1; margin: 18px 0; }

            .sg-fee-table { width: 100%; font-size: 13px; border-collapse: collapse; margin-bottom: 10px; }
            .sg-fee-table td { padding: 7px 4px; border-bottom: 1px solid #f4f4f6; }
            .sg-fee-table td:last-child { text-align: right; }
            .sg-fee-table tr.total td { font-weight: 800; color: var(--sg-red); border-top: 2px solid var(--sg-red); border-bottom: none; padding-top: 10px; }
            .sg-mini-table { width: 100%; font-size: 12.5px; border-collapse: collapse; }
            .sg-mini-table th, .sg-mini-table td { padding: 6px 4px; border-bottom: 1px solid #f4f4f6; text-align: left; }

            .sg-esign-panel { background: #eef8f0; border: 1px solid #cdeed9; border-radius: 12px; padding: 18px 20px; display: flex; justify-content: space-between; align-items: center; gap: 14px; flex-wrap: wrap; }
            .sg-esign-panel .t { font-weight: 700; color: #1e7e42; font-size: 14px; }
            .sg-esign-panel .s { font-size: 12.5px; color: #4c5a53; }
            .sg-btn { padding: 11px 22px; border-radius: 8px; font-size: 14px; font-weight: 700; border: none; cursor: pointer; }
            .sg-btn-primary { background: #4c3ff5; color: #fff; }
            .sg-btn-primary:hover { background: #3c30d9; }
            .sg-btn-outline { background: #fff; border: 1px solid #d8dce1 !important; color: #1f2430; }
            .sg-btn-danger-outline { background: #fff; border: 1px solid #f2b8b5 !important; color: #c0392b; }

            .sg-sign-box { display: none; margin-top: 18px; border-top: 1px dashed #d8dce1; padding-top: 18px; }
            .sg-sign-box.open { display: block; }
            .sg-tabs { display: flex; gap: 8px; margin-bottom: 14px; }
            .sg-tab { padding: 8px 16px; border-radius: 20px; font-size: 12.5px; font-weight: 700; cursor: pointer; background: #f1f2f4; color: #6b7280; }
            .sg-tab.active { background: var(--sg-red); color: #fff; }
            .sg-tab-pane { display: none; }
            .sg-tab-pane.active { display: block; }

            #sgCanvas { border: 1.5px dashed #c7cbd1; border-radius: 8px; width: 100%; max-width: 480px; height: 160px; touch-action: none; background: #fff; }
            .sg-typed-input { font-family: 'Brush Script MT', cursive; font-size: 34px; width: 100%; max-width: 480px; border: none; border-bottom: 2px solid #c7cbd1; padding: 6px 4px; background: transparent; }
            .sg-upload-preview { max-width: 320px; max-height: 140px; margin-top: 10px; border: 1px solid #eceef1; border-radius: 6px; display: none; }
            .sg-small-btn { background: none; border: 1px solid #d8dce1; border-radius: 6px; padding: 5px 12px; font-size: 12px; cursor: pointer; color: #444; margin-top: 8px; }

            .sg-consent { display: flex; align-items: flex-start; gap: 8px; margin: 18px 0; font-size: 12.5px; }
            .sg-consent input { margin-top: 3px; }

            .sg-rcic-sig { background: #fafafa; border-radius: 8px; padding: 12px 16px; font-size: 12px; color: #555; margin-top: 14px; }
            .sg-rcic-sig .h { color: var(--sg-red); font-weight: 700; font-size: 11.5px; margin-bottom: 4px; }

            .sg-signed-box { background: #e8f8ee; border: 1px solid #bfe8cf; border-radius: 12px; padding: 18px 20px; }
            .sg-signed-box .t { color: #1e7e42; font-weight: 700; font-size: 14px; margin-bottom: 6px; }
            .sg-signed-box img { max-height: 70px; margin-top: 8px; }

            .sg-footer { display: flex; justify-content: space-around; text-align: center; padding: 26px 10px; background: #fff; border-top: 1px solid #eceef1; font-size: 11.5px; color: #6b7280; flex-wrap: wrap; gap: 16px; }

            #sg-toast { display:none; position:fixed; bottom:24px; right:24px; background:#1f2430; color:#fff; padding:10px 18px; border-radius:8px; font-size:13px; z-index:9999; box-shadow:0 6px 20px rgba(0,0,0,0.2); }

            @media (max-width: 820px) {
                .sg-grid { flex-direction: column; }
                .sg-toc { position: static; flex: none; width: 100%; }
                .sg-card { padding: 20px; }
            }
        </style>
    </head>
    <body>
        <div class="sg-topbar">
            <div class="sg-topbar-inner">
                <div class="sg-brand">
                    <img src="<?php echo base_url();?>/public/assets_client/img/sia_logo.png" alt="SIA Immigration">
                </div>
                <div class="sg-rcic-badge">RCIC</div>
            </div>
        </div>
        <div class="sg-gradient-bar"></div>

        <div class="sg-page">
            <div class="sg-header-row">
                <h4>Agreement eSign</h4>
                <span class="sg-badge sg-badge-<?php echo esc($agreement['status']); ?>"><?php echo esc(ucfirst($agreement['status'])); ?></span>
            </div>

            <?php if (!empty($signSuccess)): ?>
                <div class="sg-alert sg-alert-success"><?php echo esc($signSuccess); ?></div>
            <?php endif; ?>
            <?php if (!empty($signError)): ?>
                <div class="sg-alert sg-alert-error"><?php echo esc($signError); ?></div>
            <?php endif; ?>

            <div class="sg-grid">
                <div class="sg-toc">
                    <div class="sg-toc-card">
                        <div class="h">AGREEMENT CONTENTS</div>
                        <a href="#sec-1">1. Introduction <span class="tick">&#10003;</span></a>
                        <a href="#sec-2">2. Scope of Services <span class="tick">&#10003;</span></a>
                        <a href="#sec-3">3. Client Responsibilities <span class="tick">&#10003;</span></a>
                        <a href="#sec-4">4. Fees and Payment <span class="tick">&#10003;</span></a>
                        <a href="#sec-5">5. Refund Policy <span class="tick">&#10003;</span></a>
                        <a href="#sec-6">6. Confidentiality <span class="tick">&#10003;</span></a>
                        <a href="#sec-7">7. Limitation of Liability <span class="tick">&#10003;</span></a>
                        <a href="#sec-8">8. Termination <span class="tick">&#10003;</span></a>
                        <a href="#sec-9">9. Governing Law <span class="tick">&#10003;</span></a>
                        <a href="#sec-10">10. Entire Agreement <span class="tick">&#10003;</span></a>
                    </div>
                    <div class="sg-toc-note">Please review the complete document before eSigning.</div>
                </div>

                <div class="sg-doc-col">
                    <div class="sg-card">
                        <div class="sg-doc-header">
                            <div style="font-weight:800;color:var(--sg-red);font-size:15px;">SIA IMMIGRATION<br><small style="color:#9aa0aa;font-weight:400;font-size:10px;">SOLUTIONS INC.</small></div>
                            <div style="font-weight:800;color:var(--sg-red);">RCIC</div>
                        </div>
                        <div class="sg-doc-title">RETAINER AGREEMENT</div>
                        <div class="sg-doc-subtitle"><?php echo esc($typeLabel); ?></div>
                        <div class="sg-doc-meta">
                            <span>Agreement Ref: <?php echo esc($agreement['reference_number'] ?? '—'); ?></span>
                            <span>SiaID: <?php echo (int) $agreement['prospect_id']; ?></span>
                            <span>Date: <?php echo esc($agreement['agreement_date'] ?? '—'); ?></span>
                        </div>
                        <div class="sg-info-grid">
                            <div class="sg-info-box">
                                <div class="h">CLIENT INFORMATION</div>
                                <div>Name: <?php echo esc($agreement['client_name']); ?></div>
                                <div>Phone: <?php echo esc($agreement['client_phone']); ?></div>
                                <div>Email: <?php echo esc($agreement['client_email']); ?></div>
                            </div>
                            <div class="sg-info-box">
                                <div class="h">RCIC INFORMATION</div>
                                <div>Consultant: <?php echo esc($agreement['consultant_name'] ?: 'Sia Immigration Solutions Inc.'); ?></div>
                                <div>RCIC#: <?php echo esc($agreement['rcic_number'] ?: '—'); ?></div>
                            </div>
                        </div>

                        <div class="sg-section" id="sec-1">
                            <h5>1. INTRODUCTION</h5>
                            <p>This Retainer Agreement is made between Sia Immigration Solutions Inc., a Regulated Canadian Immigration Consultant (RCIC), and the Client identified above. Sia Immigration Solutions Inc. agrees to provide immigration and related consultancy services to the Client in accordance with the terms and conditions set out in this Agreement.</p>
                        </div>
                        <div class="sg-section" id="sec-2">
                            <h5>2. SCOPE OF SERVICES</h5>
                            <p>Sia Immigration Solutions Inc. will provide the immigration services as agreed upon with the Client, including:</p>
                            <ul>
                                <li>Assessment and eligibility review</li>
                                <li>Application preparation and submission</li>
                                <li>Representation before IRCC (if applicable)</li>
                                <li>Communication and updates on the application status</li>
                            </ul>
                        </div>
                        <div class="sg-section" id="sec-3">
                            <h5>3. CLIENT RESPONSIBILITIES</h5>
                            <p>The Client agrees to provide accurate, complete, and truthful information and documentation in a timely manner, and to promptly notify Sia Immigration Solutions Inc. of any change in circumstances relevant to the application.</p>
                        </div>
                        <div class="sg-section" id="sec-4">
                            <h5>4. FEES AND PAYMENT</h5>
                            <p>The Client agrees to pay the following fees for the services:</p>
                            <table class="sg-fee-table">
                                <tr><td>Professional Service Fee</td><td><?php echo esc($agreement['currency']); ?> $<?php echo number_format((float) $agreement['service_fee'], 2); ?></td></tr>
                                <tr><td>GST (<?php echo esc($agreement['gst_rate']); ?>%) on Service Fee</td><td><?php echo esc($agreement['currency']); ?> $<?php echo number_format((float) $agreement['gst_amount'], 2); ?></td></tr>
                                <tr><td>Government / Application Fee</td><td><?php echo esc($agreement['currency']); ?> $<?php echo number_format((float) $agreement['government_fee'], 2); ?></td></tr>
                                <?php if ((float) $agreement['other_fee'] > 0): ?>
                                <tr><td>Other Fee</td><td><?php echo esc($agreement['currency']); ?> $<?php echo number_format((float) $agreement['other_fee'], 2); ?></td></tr>
                                <?php endif; ?>
                                <tr class="total"><td>TOTAL PAYABLE</td><td><?php echo esc($agreement['currency']); ?> $<?php echo number_format((float) $agreement['total_amount'], 2); ?></td></tr>
                            </table>
                            <?php if (!empty($milestones)): ?>
                                <p style="margin-top:14px;"><strong>Payment Schedule:</strong></p>
                                <table class="sg-mini-table">
                                    <thead><tr><th>Milestone</th><th>Amount</th><th>Due</th></tr></thead>
                                    <tbody>
                                    <?php foreach ($milestones as $m): ?>
                                        <tr><td><?php echo esc($m['milestone']); ?></td><td><?php echo $m['amount'] !== null ? '$' . number_format((float) $m['amount'], 2) : 'Included'; ?></td><td><?php echo esc($m['due_date'] ?: '—'); ?></td></tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                            <?php if (!empty($additionalFees)): ?>
                                <p style="margin-top:14px;"><strong>Additional Fees:</strong></p>
                                <table class="sg-mini-table">
                                    <thead><tr><th>Description</th><th>Amount</th></tr></thead>
                                    <tbody>
                                    <?php foreach ($additionalFees as $f): ?>
                                        <tr><td><?php echo esc($f['description']); ?></td><td>$<?php echo number_format((float) $f['amount'], 2); ?></td></tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                            <p style="margin-top:10px;font-size:12px;color:#6b7280;">All fees are non-refundable except as outlined in the Refund Policy.</p>
                        </div>
                        <div class="sg-section" id="sec-5">
                            <h5>5. REFUND POLICY</h5>
                            <p>Professional service fees are earned upon commencement of work and are generally non-refundable. Government/application fees, once submitted to IRCC or another authority, are non-refundable by that authority and by Sia Immigration Solutions Inc.</p>
                        </div>
                        <div class="sg-section" id="sec-6">
                            <h5>6. CONFIDENTIALITY</h5>
                            <p>Sia Immigration Solutions Inc. will keep all Client information confidential in accordance with applicable privacy law, and will not disclose it to third parties except as required to provide the services or as required by law.</p>
                        </div>
                        <div class="sg-section" id="sec-7">
                            <h5>7. LIMITATION OF LIABILITY</h5>
                            <p>Sia Immigration Solutions Inc. will exercise reasonable professional care in providing the services but does not guarantee the outcome of any application, as final decisions rest with the relevant government authority.</p>
                        </div>
                        <div class="sg-section" id="sec-8">
                            <h5>8. TERMINATION</h5>
                            <p>Either party may terminate this Agreement by written notice. Fees for work already performed remain payable up to the date of termination.</p>
                        </div>
                        <div class="sg-section" id="sec-9">
                            <h5>9. GOVERNING LAW</h5>
                            <p>This Agreement is governed by the laws of the Province of British Columbia and the federal laws of Canada applicable therein.</p>
                        </div>
                        <div class="sg-section" id="sec-10">
                            <h5>10. ENTIRE AGREEMENT</h5>
                            <p>This Agreement, together with any attached schedules, constitutes the entire agreement between the parties and supersedes all prior discussions and understandings, written or oral, relating to its subject matter.</p>
                        </div>

                        <hr class="sg-sep">

                        <?php if ($agreement['status'] === 'signed'): ?>
                            <div class="sg-signed-box">
                                <div class="t">&#9989; This agreement has been signed.</div>
                                <div>Signed on <?php echo esc(date('F j, Y \a\t g:i A', strtotime($agreement['client_signed_at']))); ?></div>
                                <?php if ($agreement['client_signature_type'] === 'type'): ?>
                                    <div class="sg-typed-input" style="border:none;max-width:none;font-size:30px;"><?php echo esc($agreement['client_typed_name']); ?></div>
                                <?php elseif (!empty($agreement['client_signature'])): ?>
                                    <img src="<?php echo base_url($agreement['client_signature']); ?>" alt="Client signature">
                                <?php endif; ?>
                                <div style="margin-top:10px;font-size:12px;color:#4c5a53;">A copy of your signed agreement and the final PDF will be emailed to you once available.</div>
                            </div>
                        <?php elseif ($agreement['status'] === 'declined'): ?>
                            <div class="sg-alert sg-alert-error">
                                You declined this agreement<?php echo $agreement['declined_at'] ? ' on ' . esc(date('F j, Y \a\t g:i A', strtotime($agreement['declined_at']))) : ''; ?>.
                                <?php if (!empty($agreement['decline_reason'])): ?><br>Reason: <?php echo esc($agreement['decline_reason']); ?><?php endif; ?>
                            </div>
                        <?php elseif (in_array($agreement['status'], ['sent', 'viewed'], true)): ?>
                            <div class="sg-esign-panel">
                                <div>
                                    <div class="t">&#128737; Ready to eSign?</div>
                                    <div class="s">You are all set to eSign this agreement electronically.</div>
                                </div>
                                <button type="button" class="sg-btn sg-btn-primary" id="sgOpenSignBtn">&#9998; eSign Agreement</button>
                            </div>

                            <div class="sg-sign-box" id="sgSignBox">
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
                                        <input type="text" class="sg-typed-input" id="sgTypedName" name="typed_name" placeholder="Type your full name">
                                    </div>
                                    <div class="sg-tab-pane" data-pane="upload">
                                        <input type="file" name="signature_file" id="sgUploadFile" accept="image/png,image/jpeg">
                                        <br><img id="sgUploadPreview" class="sg-upload-preview">
                                    </div>
                                    <input type="hidden" name="signature_type" id="sgSignatureType" value="draw">

                                    <div class="sg-rcic-sig">
                                        <div class="h">RCIC SIGNATURE</div>
                                        <div><?php echo esc($agreement['consultant_name'] ?: 'Sia Immigration Solutions Inc.'); ?> — signature on file, applied automatically once you sign.</div>
                                    </div>

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
                        <?php else: ?>
                            <div class="sg-alert sg-alert-error">This agreement is not yet available for signing.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="sg-footer">
            <div>&#128737; Secure &amp; Legal<br>Legally valid and encrypted electronic signature.</div>
            <div>&#128196; Legally Binding<br>This e-signed agreement is legally binding.</div>
            <div>&#9729; Download Anytime<br>Download the signed agreement anytime from your portal.</div>
            <div>&#127911; Need Help?<br>Email info@siaimmigration.com</div>
        </div>

        <div id="sg-toast"></div>

        <?php if (in_array($agreement['status'], ['sent', 'viewed'], true)): ?>
        <script>
            var sgToken = <?php echo json_encode($agreement['sign_token']); ?>;

            var sgOpenBtn = document.getElementById('sgOpenSignBtn');
            var sgSignBox = document.getElementById('sgSignBox');
            sgOpenBtn.addEventListener('click', function () {
                sgSignBox.classList.add('open');
                sgSignBox.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });

            // Tabs
            document.querySelectorAll('.sg-tab').forEach(function (tab) {
                tab.addEventListener('click', function () {
                    document.querySelectorAll('.sg-tab').forEach(function (t) { t.classList.remove('active'); });
                    document.querySelectorAll('.sg-tab-pane').forEach(function (p) { p.classList.remove('active'); });
                    tab.classList.add('active');
                    document.querySelector('.sg-tab-pane[data-pane="' + tab.dataset.tab + '"]').classList.add('active');
                    document.getElementById('sgSignatureType').value = tab.dataset.tab;
                });
            });

            function sgToast(msg) {
                var t = document.getElementById('sg-toast');
                t.textContent = msg;
                t.style.display = 'block';
                setTimeout(function () { t.style.display = 'none'; }, 2500);
            }

            function sgSaveDraft(formData) {
                fetch('<?php echo base_url('agreement/sign/'); ?>' + sgToken + '/draft', {
                    method: 'POST',
                    body: formData
                }).then(function (r) { return r.json(); }).then(function (res) {
                    if (res.ok) { sgToast('Draft saved'); }
                }).catch(function () {});
            }

            // --- Draw ---
            var canvas = document.getElementById('sgCanvas');
            var ctx = canvas.getContext('2d');
            ctx.strokeStyle = '#1f2430';
            ctx.lineWidth = 2;
            ctx.lineJoin = 'round';
            ctx.lineCap = 'round';
            var drawing = false;
            var hasDrawn = false;

            function sgPos(evt) {
                var rect = canvas.getBoundingClientRect();
                var scaleX = canvas.width / rect.width;
                var scaleY = canvas.height / rect.height;
                var point = evt.touches ? evt.touches[0] : evt;
                return { x: (point.clientX - rect.left) * scaleX, y: (point.clientY - rect.top) * scaleY };
            }
            function sgStart(evt) {
                drawing = true;
                var p = sgPos(evt);
                ctx.beginPath();
                ctx.moveTo(p.x, p.y);
                evt.preventDefault();
            }
            function sgMove(evt) {
                if (!drawing) return;
                var p = sgPos(evt);
                ctx.lineTo(p.x, p.y);
                ctx.stroke();
                hasDrawn = true;
                evt.preventDefault();
            }
            function sgEnd() {
                if (!drawing) return;
                drawing = false;
                if (hasDrawn) {
                    document.getElementById('sgSignatureData').value = canvas.toDataURL('image/png');
                    var fd = new FormData();
                    fd.append('signature_type', 'draw');
                    fd.append('signature_data', canvas.toDataURL('image/png'));
                    sgSaveDraft(fd);
                }
            }
            canvas.addEventListener('mousedown', sgStart);
            canvas.addEventListener('mousemove', sgMove);
            window.addEventListener('mouseup', sgEnd);
            canvas.addEventListener('touchstart', sgStart);
            canvas.addEventListener('touchmove', sgMove);
            canvas.addEventListener('touchend', sgEnd);

            document.getElementById('sgClearCanvas').addEventListener('click', function () {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                hasDrawn = false;
                document.getElementById('sgSignatureData').value = '';
            });

            // --- Type ---
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

            // --- Upload ---
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

            // --- Submit guard ---
            document.getElementById('sgSignForm').addEventListener('submit', function (e) {
                if (!document.getElementById('sgConsent').checked) {
                    e.preventDefault();
                    sgToast('Please accept the consent checkbox first.');
                    return;
                }
                var type = document.getElementById('sgSignatureType').value;
                if (type === 'draw' && !hasDrawn) {
                    e.preventDefault();
                    sgToast('Please draw your signature first.');
                    return;
                }
                if (type === 'type' && !document.getElementById('sgTypedName').value.trim()) {
                    e.preventDefault();
                    sgToast('Please type your full name.');
                    return;
                }
                if (type === 'upload' && !document.getElementById('sgUploadFile').files.length) {
                    e.preventDefault();
                    sgToast('Please choose a signature image to upload.');
                    return;
                }
            });

            // --- Decline ---
            document.getElementById('sgDeclineBtn').addEventListener('click', function () {
                var f = document.getElementById('sgDeclineForm');
                f.style.display = f.style.display === 'none' ? 'block' : 'none';
            });
        </script>
        <?php endif; ?>
    </body>
</html>
