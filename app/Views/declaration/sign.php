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
        .sg-gradient-bar { height: 5px; background: linear-gradient(90deg,#e23b3b,#f39c12,#2ecc71,#3498db,#8e44ad); }
        .sg-header { display: flex; justify-content: space-between; align-items: center; padding: 20px 30px 10px; }
        .sg-header img { height: 36px; }
        .sg-body { padding: 10px 34px 34px; }
        .sg-title { text-align: center; font-size: 20px; font-weight: 800; margin: 10px 0 4px; }
        .sg-subtitle { text-align: center; font-size: 12.5px; color: #e23b3b; font-weight: 700; margin-bottom: 16px; }
        .sg-meta { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; font-size: 12px; color: #6b7280; border-bottom: 1px solid #eceef1; padding-bottom: 18px; margin-bottom: 22px; }
        .sg-meta b { color: #1f2430; }
        .sg-content { font-size: 14px; line-height: 1.8; }
        .sg-content p { margin: 0 0 12px; }

        .sg-banner { padding: 14px 18px; border-radius: 10px; font-size: 13.5px; font-weight: 600; margin-bottom: 20px; }
        .sg-banner-success { background: #e8f8ee; color: #1e7e42; }
        .sg-banner-error { background: #fdecec; color: #c0392b; }
        .sg-signed-box { background: #eefaf1; border-radius: 10px; padding: 18px; margin-top: 24px; text-align: center; color: #1e7e42; font-weight: 700; }
        .sg-declined-box { background: #fdecec; border-radius: 10px; padding: 18px; margin-top: 24px; text-align: center; color: #c0392b; font-weight: 700; }

        .sg-consent-row { display: flex; align-items: flex-start; gap: 10px; margin: 26px 0; font-size: 13.5px; background: #fafbfc; border: 1px solid #eceef1; border-radius: 10px; padding: 14px 16px; }
        .sg-consent-row input { margin-top: 3px; width: 16px; height: 16px; }

        .sg-sign-section { border-top: 1px solid #eceef1; padding-top: 24px; margin-top: 10px; }
        .sg-sign-section h4 { font-size: 14px; font-weight: 800; margin: 0 0 14px; }
        .sg-tabs { display: flex; gap: 6px; margin-bottom: 12px; }
        .sg-tab { padding: 8px 16px; border: 1.5px solid #e0e3e8; border-radius: 8px; font-size: 12.5px; font-weight: 700; cursor: pointer; color: #6b7280; }
        .sg-tab.active { background: #1f2430; color: #fff; border-color: #1f2430; }
        .sg-pad-canvas { border: 1.5px dashed #d0d4da; border-radius: 10px; width: 100%; height: 130px; touch-action: none; cursor: crosshair; display: block; }
        .sg-typed-input { width: 100%; padding: 12px 14px; border: 1.5px solid #e0e3e8; border-radius: 10px; font-size: 22px; font-family: 'Brush Script MT', cursive, sans-serif; }
        .sg-clear-btn { font-size: 12px; color: #6b7280; cursor: pointer; margin-top: 6px; display: inline-block; }
        .sg-upload-preview { max-height: 90px; margin-top: 8px; display: none; }

        .sg-initials-block { margin-top: 22px; }
        .sg-initials-block .sg-pad-canvas { height: 80px; }

        .sg-btns-row { display: flex; gap: 12px; margin-top: 26px; flex-wrap: wrap; }
        .sg-btn { padding: 13px 24px; border: none; border-radius: 10px; font-size: 14px; font-weight: 700; cursor: pointer; font-family: inherit; }
        .sg-btn-submit { background: #e23b3b; color: #fff; box-shadow: 0 4px 12px rgba(226,59,59,0.28); }
        .sg-btn-decline { background: #fff; color: #c0392b; border: 1.5px solid #f3b9b9; }
        .sg-btn:disabled { opacity: .5; cursor: not-allowed; }
        .sg-footer { text-align: center; font-size: 11.5px; color: #9aa0aa; margin-top: 18px; }
    </style>
</head>
<body>
<div class="sg-wrap">
    <div class="sg-page">
        <div class="sg-gradient-bar"></div>
        <div class="sg-header">
            <img src="<?php echo base_url('public/assets_client/img/sia_logo.png'); ?>" alt="SIA Immigration">
        </div>
        <div class="sg-body">

            <?php if (!empty($signSuccess)): ?><div class="sg-banner sg-banner-success"><?php echo esc($signSuccess); ?></div><?php endif; ?>
            <?php if (!empty($signError)): ?><div class="sg-banner sg-banner-error"><?php echo esc($signError); ?></div><?php endif; ?>

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
                        <h4>Your Signature</h4>
                        <div class="sg-tabs">
                            <div class="sg-tab active" data-tab="draw" data-target="signature">Draw</div>
                            <div class="sg-tab" data-tab="type" data-target="signature">Type</div>
                            <div class="sg-tab" data-tab="upload" data-target="signature">Upload</div>
                        </div>
                        <div id="sgSignDraw"><canvas class="sg-pad-canvas" id="sgSignCanvas"></canvas><span class="sg-clear-btn" onclick="sgSignCtrl.clear()">Clear</span></div>
                        <div id="sgSignType" style="display:none;"><input type="text" class="sg-typed-input" id="sgTypedName" name="typed_name" placeholder="Type your full name"></div>
                        <div id="sgSignUpload" style="display:none;">
                            <input type="file" name="signature_file" id="sgUploadFile" accept="image/png,image/jpeg">
                            <br><img id="sgUploadPreview" class="sg-upload-preview">
                        </div>
                        <input type="hidden" name="signature_type" id="sgSignatureType" value="draw">
                        <input type="hidden" name="signature_data" id="sgSignatureData">
                    </div>

                    <?php if (!empty($declaration['require_initials'])): ?>
                    <div class="sg-initials-block">
                        <h4>Your Initials</h4>
                        <div class="sg-tabs">
                            <div class="sg-tab active" data-tab="draw" data-target="initials">Draw</div>
                            <div class="sg-tab" data-tab="type" data-target="initials">Type</div>
                            <div class="sg-tab" data-tab="upload" data-target="initials">Upload</div>
                        </div>
                        <div id="sgInitDraw"><canvas class="sg-pad-canvas" id="sgInitCanvas"></canvas><span class="sg-clear-btn" onclick="sgInitCtrl.clear()">Clear</span></div>
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
                        <button type="submit" class="sg-btn sg-btn-submit" id="sgSubmitBtn">Sign Document</button>
                        <button type="button" class="sg-btn sg-btn-decline" onclick="sgDecline()">Decline</button>
                    </div>
                </form>

            <?php endif; ?>

            <div class="sg-footer">Signed electronically &middot; SIA Immigration Solutions Inc. &middot; This link is unique to you — please do not forward it.</div>
        </div>
    </div>
</div>

<form id="sgDeclineForm" method="post" action="<?php echo base_url('declaration/sign/' . $declaration['sign_token'] . '/decline'); ?>" style="display:none;">
    <input type="hidden" name="reason" id="sgDeclineReason">
</form>

<script>
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
