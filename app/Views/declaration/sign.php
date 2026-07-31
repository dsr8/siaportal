<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo esc($declaration['title'] ?: 'Disclaimer / Consent'); ?> - SIA Immigration</title>
    <link rel="icon" type="image/png" href="<?php echo base_url();?>/public/assets_client/img/favicon.png" />
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; padding: 0; background: #f1f2f4; font-family: 'Segoe UI', Arial, sans-serif; color: #1f2430; }
        .sg-wrap { max-width: 820px; margin: 0 auto; padding: 24px 16px 60px; }
        .sg-page {
            background: #fff; border-radius: 14px; overflow: hidden; box-shadow: 0 4px 24px rgba(20,20,43,0.08);
            position: relative;
        }
        .sg-gradient-bar { height: 5px; background: linear-gradient(90deg,#e23b3b,#f39c12,#2ecc71,#3498db,#8e44ad); position: relative; z-index: 1; }
        /* Faint SIA watermark behind the whole document card, matching the branded PDF the
           client will download after signing. Uses a boosted-alpha derivative of the app-wide
           sia_watermark.png (see form.php for why) rather than that near-invisible source file. */
        .sg-page::before {
            content: ''; position: absolute; inset: 0; margin: auto; width: 60%; max-width: 420px; aspect-ratio: 779 / 335;
            background: url('<?php echo base_url('public/assets_client/img/sia_watermark_declaration.png'); ?>') center / contain no-repeat;
            pointer-events: none; z-index: 0;
        }
        .sg-header { display: flex; justify-content: space-between; align-items: center; padding: 20px 30px 10px; position: relative; z-index: 1; }
        .sg-header-logos { display: flex; align-items: center; gap: 14px; }
        .sg-header-logos .sg-logo-sia { height: 36px; }
        .sg-header-logos .sg-logo-rcic { height: 32px; }
        .sg-lock-pill {
            display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 700; color: #1e7e42;
            background: #e8f8ee; padding: 5px 11px; border-radius: 20px;
        }
        .sg-lock-pill svg { width: 11px; height: 11px; }
        .sg-body { padding: 10px 34px 34px; position: relative; z-index: 1; }
        .sg-title { text-align: center; font-size: 20px; font-weight: 800; margin: 10px 0 4px; }
        .sg-subtitle { text-align: center; font-size: 12.5px; color: #e23b3b; font-weight: 700; margin-bottom: 16px; }
        .sg-meta { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; font-size: 12px; color: #6b7280; padding-bottom: 18px; margin-bottom: 6px; }
        .sg-meta b { color: #1f2430; }
        .sg-content { font-size: 14px; line-height: 1.8; margin-top: 18px; }
        .sg-content p { margin: 0 0 12px; }

        /* ── Sent → Viewed → Signed progress stepper ── */
        .sg-stepper { display: flex; align-items: flex-start; max-width: 380px; margin: 0 auto 22px; padding-top: 8px; }
        .sg-step { flex: 1; display: flex; flex-direction: column; align-items: center; text-align: center; position: relative; min-width: 0; }
        .sg-step-line { position: absolute; top: 13px; left: -50%; width: 100%; height: 2px; background: #e6e8eb; z-index: 0; }
        .sg-step:first-child .sg-step-line { display: none; }
        .sg-step.sg-step-done .sg-step-line { background: #2ecc71; }
        .sg-step-dot {
            width: 26px; height: 26px; border-radius: 50%; background: #eef0f2; color: #9aa0aa;
            display: flex; align-items: center; justify-content: center; position: relative; z-index: 1;
            border: 2px solid #fff; box-shadow: 0 0 0 2px #eef0f2; font-size: 11.5px; font-weight: 700; flex-shrink: 0;
        }
        .sg-step-dot svg { width: 12px; height: 12px; }
        .sg-step.sg-step-done .sg-step-dot { background: #2ecc71; color: #fff; box-shadow: 0 0 0 2px #2ecc71; }
        .sg-step.sg-step-current .sg-step-dot { background: #e23b3b; color: #fff; box-shadow: 0 0 0 4px rgba(226,59,59,0.15); }
        .sg-step-label { font-size: 11px; font-weight: 700; color: #9aa0aa; margin-top: 6px; }
        .sg-step.sg-step-done .sg-step-label, .sg-step.sg-step-current .sg-step-label { color: #1f2430; }

        .sg-banner { padding: 14px 18px; border-radius: 10px; font-size: 13.5px; font-weight: 600; margin-bottom: 20px; transition: opacity .4s ease, max-height .4s ease, margin .4s ease, padding .4s ease; overflow: hidden; }
        .sg-banner.sg-banner-hide { opacity: 0; max-height: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0; }
        .sg-banner-success { background: #e8f8ee; color: #1e7e42; }
        .sg-banner-error { background: #fdecec; color: #c0392b; }
        .sg-signed-box { background: #eefaf1; border-radius: 10px; padding: 18px; margin-top: 24px; text-align: center; color: #1e7e42; font-weight: 700; }
        .sg-declined-box { background: #fdecec; border-radius: 10px; padding: 18px; margin-top: 24px; text-align: center; color: #c0392b; font-weight: 700; }

        .sg-consent-row { display: flex; align-items: flex-start; gap: 10px; margin: 26px 0 0; font-size: 13.5px; background: #fafbfc; border: 1.5px solid #eceef1; border-radius: 10px; padding: 14px 16px; transition: border-color .15s ease, background .15s ease; }
        .sg-consent-row:has(input:checked) { border-color: #bfe8cf; background: #f3fbf6; }
        .sg-consent-row input { margin-top: 3px; width: 17px; height: 17px; accent-color: #e23b3b; cursor: pointer; }

        .sg-sign-section { background: #fafbfc; border: 1.5px solid #eceef1; border-radius: 12px; padding: 20px; margin-top: 22px; }
        .sg-sign-section h4 { font-size: 13.5px; font-weight: 800; margin: 0 0 14px; display: flex; align-items: center; gap: 8px; }
        .sg-sign-section h4 svg { width: 15px; height: 15px; color: #e23b3b; }
        .sg-tabs { display: flex; gap: 6px; margin-bottom: 12px; }
        .sg-tab { padding: 8px 14px; border: 1.5px solid #e0e3e8; border-radius: 8px; font-size: 12.5px; font-weight: 700; cursor: pointer; color: #6b7280; background: #fff; display: inline-flex; align-items: center; gap: 6px; transition: background .15s ease, color .15s ease, border-color .15s ease; }
        .sg-tab svg { width: 13px; height: 13px; }
        .sg-tab:hover { border-color: #c7cbd1; }
        .sg-tab.active { background: #1f2430; color: #fff; border-color: #1f2430; }
        .sg-pad-canvas { border: 1.5px dashed #c7cbd1; border-radius: 10px; width: 100%; height: 130px; touch-action: none; cursor: crosshair; display: block; background: #fff; }
        .sg-typed-input { width: 100%; padding: 12px 14px; border: 1.5px solid #e0e3e8; border-radius: 10px; font-size: 22px; font-family: 'Brush Script MT', cursive, sans-serif; background: #fff; }
        .sg-typed-input:focus { outline: none; border-color: #e23b3b; box-shadow: 0 0 0 3px rgba(226,59,59,0.08); }
        .sg-clear-btn { font-size: 11.5px; color: #6b7280; font-weight: 700; cursor: pointer; margin-top: 8px; display: inline-flex; align-items: center; gap: 4px; }
        .sg-clear-btn:hover { color: #e23b3b; }
        .sg-upload-preview { max-height: 90px; margin-top: 8px; display: none; border-radius: 6px; }

        .sg-initials-block { margin-top: 22px; }
        .sg-initials-block .sg-pad-canvas { height: 80px; }

        .sg-btns-row { display: flex; gap: 12px; margin-top: 26px; flex-wrap: wrap; }
        .sg-btn { padding: 13px 24px; border: none; border-radius: 10px; font-size: 14px; font-weight: 700; cursor: pointer; font-family: inherit; display: inline-flex; align-items: center; gap: 8px; transition: transform .12s ease, box-shadow .15s ease, background .15s ease; }
        .sg-btn-submit { background: #e23b3b; color: #fff; box-shadow: 0 4px 12px rgba(226,59,59,0.28); }
        .sg-btn-submit:not(:disabled):hover { background: #c92f2f; transform: translateY(-1px); }
        .sg-btn-decline { background: #fff; color: #c0392b; border: 1.5px solid #f3b9b9; }
        .sg-btn-decline:hover { background: #fdf1f1; }
        .sg-btn:disabled { opacity: .5; cursor: not-allowed; }
        .sg-footer { text-align: center; font-size: 11.5px; color: #9aa0aa; margin-top: 22px; display: flex; align-items: center; justify-content: center; gap: 6px; flex-wrap: wrap; }
        .sg-footer svg { width: 12px; height: 12px; }

        @media (max-width: 560px) {
            .sg-body { padding: 8px 18px 26px; }
            .sg-header { padding: 16px 18px 6px; }
            .sg-title { font-size: 17px; }
            .sg-sign-section { padding: 14px; }
            .sg-btns-row { flex-direction: column; }
            .sg-btn { width: 100%; justify-content: center; }
        }
    </style>
</head>
<body>
<div class="sg-wrap">
    <div class="sg-page">
        <div class="sg-gradient-bar"></div>
        <div class="sg-header">
            <div class="sg-header-logos">
                <img src="<?php echo base_url('public/assets_client/img/sia_logo.png'); ?>" alt="SIA Immigration" class="sg-logo-sia">
                <img src="<?php echo base_url('public/assets_client/img/rcic_logo.png'); ?>" alt="RCIC - Regulated Canadian Immigration Consultant" class="sg-logo-rcic">
            </div>
            <span class="sg-lock-pill">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="10" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                Secure eSign
            </span>
        </div>
        <div class="sg-body">

            <?php if (!empty($signSuccess)): ?><div class="sg-banner sg-banner-success"><?php echo esc($signSuccess); ?></div><?php endif; ?>
            <?php if (!empty($signError)): ?><div class="sg-banner sg-banner-error"><?php echo esc($signError); ?></div><?php endif; ?>

            <?php
            // Sent -> Viewed -> Signed progress, mirroring the admin-side status timeline.
            // Declined is its own dead-end message below rather than a stepper state.
            if (!in_array($declaration['status'], ['declined'], true)):
                $sgSteps = ['sent' => 'Sent', 'viewed' => 'Viewed', 'signed' => 'Signed'];
                $sgOrder = array_keys($sgSteps);
                $sgCurrentIdx = array_search($declaration['status'], $sgOrder, true);
                if ($sgCurrentIdx === false) { $sgCurrentIdx = 0; }
            ?>
            <div class="sg-stepper">
                <?php foreach ($sgSteps as $key => $label): $idx = array_search($key, $sgOrder, true); ?>
                    <div class="sg-step<?php echo $idx < $sgCurrentIdx ? ' sg-step-done' : ($idx === $sgCurrentIdx ? ' sg-step-current' : ''); ?>">
                        <div class="sg-step-line"></div>
                        <div class="sg-step-dot">
                            <?php if ($idx < $sgCurrentIdx): ?>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"/></svg>
                            <?php else: ?>
                                <?php echo $idx + 1; ?>
                            <?php endif; ?>
                        </div>
                        <div class="sg-step-label"><?php echo esc($label); ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <div class="sg-title"><?php echo esc($declaration['title'] ?: 'Disclaimer / Consent'); ?></div>
            <?php if (!empty($declaration['consent_type'])): ?><div class="sg-subtitle"><?php echo esc($declaration['consent_type']); ?></div><?php endif; ?>

            <div class="sg-meta">
                <div>Client: <b><?php echo esc($declaration['client_name']); ?></b></div>
                <div>SiaID: <b><?php echo (int) $declaration['prospect_id']; ?></b></div>
                <div>Date: <b><?php echo esc(!empty($declaration['consent_date']) ? date('M j, Y', strtotime($declaration['consent_date'])) : date('M j, Y')); ?></b></div>
            </div>

            <div class="sg-content"><?php echo $declaration['content']; ?></div>

            <?php $isActionable = in_array($declaration['status'], ['sent', 'viewed'], true); ?>

            <?php if ($declaration['status'] === 'signed'): ?>
                <div class="sg-signed-box">
                    &#9989; This document was signed electronically on <?php echo esc(!empty($declaration['client_signed_at']) ? date('M j, Y \a\t g:i A', strtotime($declaration['client_signed_at'])) : ''); ?>.
                    <?php if (!empty($declaration['pdf_path'])): ?>
                        <div style="margin-top:12px;"><a href="<?php echo base_url('declaration/sign/' . $declaration['sign_token'] . '/pdf'); ?>" style="color:#1e7e42;font-weight:700;">Download Signed PDF</a></div>
                    <?php endif; ?>
                </div>
            <?php elseif ($declaration['status'] === 'declined'): ?>
                <div class="sg-declined-box">This document was declined<?php echo !empty($declaration['decline_reason']) ? ': "' . esc($declaration['decline_reason']) . '"' : '.'; ?></div>
            <?php elseif ($isActionable): ?>

                <form id="sgForm" method="post" action="<?php echo base_url('declaration/sign/' . $declaration['sign_token'] . '/submit'); ?>" enctype="multipart/form-data">

                    <?php if (!empty($declaration['show_consent_checkbox'])): ?>
                    <label class="sg-consent-row">
                        <input type="checkbox" name="consent" value="1" id="sgConsent">
                        <span>I have read and understand the above declaration, and I consent to sign this document electronically.</span>
                    </label>
                    <?php endif; ?>

                    <div class="sg-sign-section">
                        <h4>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.85 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
                            Your Signature
                        </h4>
                        <div class="sg-tabs">
                            <div class="sg-tab active" data-tab="draw" data-target="signature"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.85 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg> Draw</div>
                            <div class="sg-tab" data-tab="type" data-target="signature"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M6 8h.01M10 8h.01M14 8h.01M18 8h.01M6 12h12M6 16h6"/></svg> Type</div>
                            <div class="sg-tab" data-tab="upload" data-target="signature"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="M7 10l5-5 5 5"/><path d="M12 5v11"/></svg> Upload</div>
                        </div>
                        <div id="sgSignDraw"><canvas class="sg-pad-canvas" id="sgSignCanvas"></canvas><span class="sg-clear-btn" onclick="sgSignCtrl.clear()"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m3 0v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6h14Z"/></svg> Clear</span></div>
                        <div id="sgSignType" style="display:none;"><input type="text" class="sg-typed-input" id="sgTypedName" name="typed_name" placeholder="Type your full name"></div>
                        <div id="sgSignUpload" style="display:none;">
                            <input type="file" name="signature_file" id="sgUploadFile" accept="image/png,image/jpeg">
                            <br><img id="sgUploadPreview" class="sg-upload-preview">
                        </div>
                        <input type="hidden" name="signature_type" id="sgSignatureType" value="draw">
                        <input type="hidden" name="signature_data" id="sgSignatureData">
                    </div>

                    <?php if (!empty($declaration['require_initials'])): ?>
                    <div class="sg-sign-section sg-initials-block">
                        <h4>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                            Your Initials
                        </h4>
                        <div class="sg-tabs">
                            <div class="sg-tab active" data-tab="draw" data-target="initials"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.85 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg> Draw</div>
                            <div class="sg-tab" data-tab="type" data-target="initials"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M6 8h.01M10 8h.01M14 8h.01M18 8h.01M6 12h12M6 16h6"/></svg> Type</div>
                            <div class="sg-tab" data-tab="upload" data-target="initials"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="M7 10l5-5 5 5"/><path d="M12 5v11"/></svg> Upload</div>
                        </div>
                        <div id="sgInitDraw"><canvas class="sg-pad-canvas" id="sgInitCanvas"></canvas><span class="sg-clear-btn" onclick="sgInitCtrl.clear()"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m3 0v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6h14Z"/></svg> Clear</span></div>
                        <div id="sgInitType" style="display:none;"><input type="text" class="sg-typed-input" id="sgTypedInitials" name="typed_initials" placeholder="Initials" style="font-size:16px;"></div>
                        <div id="sgInitUpload" style="display:none;">
                            <input type="file" name="initials_file" id="sgInitUploadFile" accept="image/png,image/jpeg">
                            <br><img id="sgInitUploadPreview" class="sg-upload-preview">
                        </div>
                        <input type="hidden" name="initials_type" id="sgInitialsType" value="draw">
                        <input type="hidden" name="initials_data" id="sgInitialsData">
                    </div>
                    <?php endif; ?>

                    <div class="sg-btns-row">
                        <button type="submit" class="sg-btn sg-btn-submit" id="sgSubmitBtn">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.85 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
                            Sign Document
                        </button>
                        <button type="button" class="sg-btn sg-btn-decline" onclick="sgDecline()">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
                            Decline
                        </button>
                    </div>
                </form>

            <?php endif; ?>

            <div class="sg-footer">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="10" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                Signed electronically &middot; SIA Immigration Solutions Inc. &middot; This link is unique to you — please do not forward it.
            </div>
        </div>
    </div>
</div>

<form id="sgDeclineForm" method="post" action="<?php echo base_url('declaration/sign/' . $declaration['sign_token'] . '/decline'); ?>" style="display:none;">
    <input type="hidden" name="reason" id="sgDeclineReason">
</form>

<script>
    // Success/error banners (e.g. "Document signed successfully") auto-dismiss after 10s
    // instead of sitting on screen until the client navigates away.
    document.querySelectorAll('.sg-banner').forEach(function (el) {
        setTimeout(function () {
            el.classList.add('sg-banner-hide');
            setTimeout(function () { el.remove(); }, 400);
        }, 10000);
    });

    // Shared canvas signature-pad setup, adapted from the Agreement module's sign.php —
    // no external drawing library, just pointer/touch events on a plain <canvas>.
    function sgSetupCanvas(canvas, onDraw) {
        var ctx = canvas.getContext('2d');
        function resize() {
            var ratio = window.devicePixelRatio || 1;
            var rect = canvas.getBoundingClientRect();
            canvas.width = rect.width * ratio;
            canvas.height = rect.height * ratio;
            ctx.scale(ratio, ratio);
            ctx.lineWidth = 2.2;
            ctx.lineCap = 'round';
            ctx.strokeStyle = '#1f2430';
        }
        resize();
        var drawing = false, hasDrawn = false;

        // Re-fit the drawing buffer to the element's new on-screen size on rotation/resize —
        // this is a signing page that's explicitly meant to be mobile-friendly, and without
        // this a phone rotated mid-signature would leave the canvas's pixel buffer mismatched
        // against its new CSS size, distorting anything drawn afterward. Any in-progress
        // drawing is cleared first since the old buffer can't be rescaled without redrawing it.
        var resizeTimer = null;
        window.addEventListener('resize', function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function () {
                var hadDrawing = hasDrawn;
                resize();
                hasDrawn = false;
                if (hadDrawing) onDraw('');
            }, 200);
        });
        function pos(evt) {
            var rect = canvas.getBoundingClientRect();
            var t = evt.touches ? evt.touches[0] : evt;
            return { x: t.clientX - rect.left, y: t.clientY - rect.top };
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
        canvas.addEventListener('touchstart', start, { passive: false });
        canvas.addEventListener('touchmove', move, { passive: false });
        canvas.addEventListener('touchend', end);

        return {
            clear: function () { ctx.clearRect(0, 0, canvas.width, canvas.height); hasDrawn = false; },
            hasDrawn: function () { return hasDrawn; }
        };
    }

    var sgSignCanvas = document.getElementById('sgSignCanvas');
    var sgSignCtrl = sgSignCanvas ? sgSetupCanvas(sgSignCanvas, function (dataUrl) {
        document.getElementById('sgSignatureData').value = dataUrl;
    }) : null;

    var sgInitCanvas = document.getElementById('sgInitCanvas');
    var sgInitCtrl = sgInitCanvas ? sgSetupCanvas(sgInitCanvas, function (dataUrl) {
        document.getElementById('sgInitialsData').value = dataUrl;
    }) : null;

    document.querySelectorAll('.sg-tab').forEach(function (tab) {
        tab.addEventListener('click', function () {
            var target = tab.dataset.target;
            var group = document.querySelectorAll('.sg-tab[data-target="' + target + '"]');
            group.forEach(function (t) { t.classList.remove('active'); });
            tab.classList.add('active');

            var prefix = target === 'signature' ? 'sgSign' : 'sgInit';
            ['Draw', 'Type', 'Upload'].forEach(function (mode) {
                var el = document.getElementById(prefix + mode);
                if (el) el.style.display = (mode.toLowerCase() === tab.dataset.tab) ? 'block' : 'none';
            });
            document.getElementById(target === 'signature' ? 'sgSignatureType' : 'sgInitialsType').value = tab.dataset.tab;
        });
    });

    document.getElementById('sgTypedName') && document.getElementById('sgTypedName').addEventListener('input', function () {
        document.getElementById('sgSignatureType').value = 'type';
    });
    document.getElementById('sgTypedInitials') && document.getElementById('sgTypedInitials').addEventListener('input', function () {
        document.getElementById('sgInitialsType').value = 'type';
    });

    document.getElementById('sgUploadFile') && document.getElementById('sgUploadFile').addEventListener('change', function (e) {
        var file = e.target.files[0];
        if (!file) return;
        var preview = document.getElementById('sgUploadPreview');
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
        document.getElementById('sgSignatureType').value = 'upload';
    });
    document.getElementById('sgInitUploadFile') && document.getElementById('sgInitUploadFile').addEventListener('change', function (e) {
        var file = e.target.files[0];
        if (!file) return;
        var preview = document.getElementById('sgInitUploadPreview');
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
        document.getElementById('sgInitialsType').value = 'upload';
    });

    var sgForm = document.getElementById('sgForm');
    if (sgForm) {
        sgForm.addEventListener('submit', function (e) {
            var consentBox = document.getElementById('sgConsent');
            if (consentBox && !consentBox.checked) {
                e.preventDefault();
                alert('Please accept the consent checkbox before signing.');
                return;
            }
            var sigType = document.getElementById('sgSignatureType').value;
            if (sigType === 'draw' && (!sgSignCtrl || !sgSignCtrl.hasDrawn())) {
                e.preventDefault(); alert('Please draw your signature.'); return;
            }
            if (sigType === 'type' && !document.getElementById('sgTypedName').value.trim()) {
                e.preventDefault(); alert('Please type your full name.'); return;
            }
            if (sigType === 'upload' && !document.getElementById('sgUploadFile').files.length) {
                e.preventDefault(); alert('Please upload a signature image.'); return;
            }

            var initType = document.getElementById('sgInitialsType');
            if (initType) {
                var t = initType.value;
                if (t === 'draw' && (!sgInitCtrl || !sgInitCtrl.hasDrawn())) {
                    e.preventDefault(); alert('Please draw your initials.'); return;
                }
                if (t === 'type' && !document.getElementById('sgTypedInitials').value.trim()) {
                    e.preventDefault(); alert('Please type your initials.'); return;
                }
                if (t === 'upload' && !document.getElementById('sgInitUploadFile').files.length) {
                    e.preventDefault(); alert('Please upload an initials image.'); return;
                }
            }

            document.getElementById('sgSubmitBtn').disabled = true;
            document.getElementById('sgSubmitBtn').textContent = 'Signing...';
        });
    }

    function sgDecline() {
        var reason = prompt('Optional: let us know why you\'re declining this document.', '');
        if (reason === null) return;
        document.getElementById('sgDeclineReason').value = reason;
        document.getElementById('sgDeclineForm').submit();
    }
</script>
</body>
</html>
