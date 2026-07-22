<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title><?php echo $declaration ? 'Edit' : 'Create'; ?> Disclaimer / Consent - Siaportal</title>
        <link rel="icon" type="image/png" href="<?php echo base_url();?>/public/assets_client/img/favicon.png" />
        <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            .dc-form-wrap { font-family: 'Segoe UI', Arial, sans-serif; color: #1f2430; padding-top: 6px; }
            .dc-form-wrap * { box-sizing: border-box; }
            .dc-flash { padding: 12px 18px; border-radius: 10px; font-size: 13.5px; font-weight: 600; margin-bottom: 18px; transition: opacity .4s ease, max-height .4s ease, margin .4s ease, padding .4s ease; overflow: hidden; }
            .dc-flash.dc-flash-hide { opacity: 0; max-height: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0; }
            .dc-flash-success { background: #e8f8ee; color: #1e7e42; }
            .dc-flash-error { background: #fdecec; color: #c0392b; }

            .dc-locked-banner { background: #fdecec; color: #842029; font-size: 13.5px; padding: 12px 18px; border-radius: 10px; margin-bottom: 18px; }
            .dc-signed-banner { background: #e8f8ee; color: #1e7e42; font-size: 13.5px; padding: 12px 18px; border-radius: 10px; margin-bottom: 18px; display:flex; align-items:center; justify-content:space-between; gap:10px; flex-wrap: wrap; }

            .dc-header-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 12px; }
            .dc-header-row h4 { margin: 0; font-weight: 800; }
            .dc-status-badge { display: inline-block; padding: 5px 14px; border-radius: 20px; font-size: 12.5px; font-weight: 700; margin-left: 10px; vertical-align: middle; }
            .dc-badge-draft { background: #e2e3e5; color: #41464b; }
            .dc-badge-sent { background: #fff3cd; color: #856404; }
            .dc-badge-viewed { background: #cfe2ff; color: #084298; }
            .dc-badge-signed { background: #d1e7dd; color: #0f5132; }
            .dc-badge-declined { background: #f8d7da; color: #842029; }

            .dc-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 22px; align-items: start; }
            .dc-card { background: #fff; border-radius: 14px; padding: 22px; box-shadow: 0 2px 10px rgba(20,20,43,0.05); }
            .dc-card h6 { font-weight: 800; color: #1f2430; margin: 0 0 16px; font-size: 14.5px; }

            .dc-field { margin-bottom: 16px; }
            .dc-field label { font-weight: 700; font-size: 12px; color: #6b7280; text-transform: uppercase; letter-spacing: .02em; margin-bottom: 6px; display: block; }
            .dc-field input[type="text"], .dc-field input[type="date"], .dc-field select, .dc-field textarea {
                width: 100%; padding: 10px 12px; border: 1.5px solid #e0e3e8; border-radius: 10px; font-size: 13.5px;
                color: #1f2430; background: #fff;
            }
            .dc-field input:disabled, .dc-field select:disabled { background: #f8f9fb; color: #6b7280; }
            .dc-field-check { display: flex; align-items: center; gap: 8px; font-size: 13.5px; font-weight: 600; color: #1f2430; margin-bottom: 12px; }
            .dc-field-error select, .dc-field-error .select2-selection { border-color: #e23b3b !important; box-shadow: 0 0 0 3px rgba(226,59,59,0.1); }
            .dc-field-error-msg { color: #e23b3b; font-size: 11.5px; font-weight: 600; margin-top: 5px; }

            .dc-preview {
                background: #fff; border: 1px solid #eceef1; border-radius: 10px; padding: 20px; font-size: 12.5px; line-height: 1.6;
                position: relative; overflow: hidden;
            }
            /* Faint SIA watermark behind the content, matching the branded look of the actual
               signing page and generated PDF — otherwise the preview reads as a plain unbranded
               text box that doesn't resemble what the client will actually receive. */
            .dc-preview::before {
                content: ''; position: absolute; inset: 0; margin: auto; width: 70%; max-width: 260px; aspect-ratio: 779 / 335;
                background: url('<?php echo base_url('public/assets_client/img/sia_watermark.png'); ?>') center / contain no-repeat;
                opacity: 0.06; pointer-events: none; z-index: 0;
            }
            .dc-preview > * { position: relative; z-index: 1; }
            .dc-preview .p-title { text-align: center; font-weight: 800; font-size: 15px; margin-bottom: 4px; }
            .dc-preview .p-meta { font-size: 11px; color: #6b7280; border-bottom: 1px solid #eceef1; padding-bottom: 10px; margin-bottom: 12px; }

            /* Compact inline preview: clipped to a fixed height with a fade-out at the bottom,
               since the 3-column layout leaves too little width/height to read the full
               document — "View Full Preview" below opens the same content in a big modal. */
            .dc-preview-clip { max-height: 220px; overflow: hidden; position: relative; }
            .dc-preview-clip::after {
                content: ''; position: absolute; left: 0; right: 0; bottom: 0; height: 50px;
                background: linear-gradient(rgba(255,255,255,0), #fff);
                pointer-events: none; z-index: 2;
            }
            .dc-card-head-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; }
            .dc-card-head-row h6 { margin: 0; }
            .dc-btn-expand {
                display: inline-flex; align-items: center; gap: 6px; background: #fff; border: 1.5px solid #e0e3e8;
                border-radius: 8px; padding: 7px 12px; font-size: 12px; font-weight: 700; color: #4c3ff5; cursor: pointer;
            }
            .dc-btn-expand:hover { background: #f5f4ff; border-color: #4c3ff5; }
            .dc-btn-view-full {
                width: 100%; margin-top: 12px; padding: 10px; border: 1.5px dashed #d0d4da; border-radius: 10px;
                background: #fafbfc; color: #4c3ff5; font-size: 12.5px; font-weight: 700; cursor: pointer; font-family: inherit;
            }
            .dc-btn-view-full:hover { background: #f5f4ff; border-color: #4c3ff5; }

            /* Full document preview modal */
            .dc-modal-wrap {
                display: none; position: fixed; inset: 0; background: rgba(20,20,43,0.55); z-index: 9999;
                overflow-y: auto; padding: 40px 16px;
            }
            .dc-modal-wrap.dc-show { display: block; }
            .dc-modal-box {
                background: #fff; border-radius: 16px; max-width: 760px; width: 100%; margin: 0 auto;
                box-shadow: 0 20px 50px rgba(20,20,43,0.3);
            }
            .dc-modal-head { display: flex; justify-content: space-between; align-items: center; padding: 18px 24px; border-bottom: 1px solid #eef0f2; }
            .dc-modal-head strong { font-size: 15.5px; }
            .dc-modal-close { width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #9aa0aa; font-size: 22px; }
            .dc-modal-close:hover { background: #f4f4f6; color: #1f2430; }
            .dc-modal-body { padding: 26px 30px; max-height: 78vh; overflow-y: auto; }

            .dc-btns-row { display: flex; gap: 10px; margin-top: 20px; flex-wrap: wrap; }
            .dc-btn { padding: 12px 20px; border: none; border-radius: 10px; cursor: pointer; font-size: 13.5px; font-weight: 700; font-family: inherit; }
            .dc-btn-primary { background: #e23b3b; color: #fff; box-shadow: 0 4px 12px rgba(226,59,59,0.28); }
            .dc-btn-secondary { background: #f1f2f4; color: #1f2430; }
            .dc-btn-send { background: #4c3ff5; color: #fff; box-shadow: 0 4px 12px rgba(76,63,245,0.28); }
            .dc-btn:disabled { opacity: .5; cursor: not-allowed; }

            .ck-editor__editable { min-height: 260px; }

            @media (max-width: 1100px) { .dc-grid { grid-template-columns: 1fr; } }
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
                    <div class="container-fluid dc-form-wrap">

                        <?php if (!empty($flashMsg = session()->getFlashdata('message'))): ?>
                            <div class="dc-flash dc-flash-success"><?php echo esc($flashMsg); ?></div>
                        <?php endif; ?>
                        <?php if (!empty($flashErr = session()->getFlashdata('error'))): ?>
                            <div class="dc-flash dc-flash-error"><?php echo esc($flashErr); ?></div>
                        <?php endif; ?>

                        <?php
                        $isLocked = $declaration && in_array($declaration['status'], ['signed', 'declined'], true);
                        $status = $declaration['status'] ?? 'draft';
                        ?>

                        <?php if ($isLocked): ?>
                            <div class="<?php echo $status === 'signed' ? 'dc-signed-banner' : 'dc-locked-banner'; ?>">
                                <span>
                                <?php if ($status === 'signed'): ?>
                                    &#9989; This document has been signed and is permanently locked.
                                <?php else: ?>
                                    &#10060; This document was declined by the client<?php echo !empty($declaration['decline_reason']) ? ': "' . esc($declaration['decline_reason']) . '"' : '.'; ?> Create a new Disclaimer / Consent instead.
                                <?php endif; ?>
                                </span>
                                <?php if ($status === 'signed' && !empty($declaration['pdf_path'])): ?>
                                    <a class="dc-btn dc-btn-primary" href="<?php echo base_url('declaration/Declaration/pdf/' . $declaration['id']); ?>">Download Signed PDF</a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <div class="dc-header-row">
                            <h4><?php echo $declaration ? 'Edit Disclaimer / Consent' : 'Create Disclaimer / Consent'; ?>
                                <?php if ($declaration): ?><span class="dc-status-badge dc-badge-<?php echo esc($status); ?>"><?php echo esc(ucfirst($status)); ?></span><?php endif; ?>
                            </h4>
                            <a href="<?php echo base_url('declaration/Declaration/dashboard'); ?>" style="font-size:13.5px;font-weight:700;color:#6b7280;">&larr; Back to list</a>
                        </div>

                        <form id="dcForm" method="post" action="<?php echo $declaration
                            ? base_url('declaration/Declaration/save/' . $declaration['id'])
                            : base_url('declaration/Declaration/store'); ?>">

                            <div class="dc-grid">
                                <div class="dc-card">
                                    <h6>Client &amp; Application Details <?php echo $declaration ? '' : '(Auto-pulled from CRM)'; ?></h6>

                                    <?php if ($declaration): ?>
                                        <div class="dc-field"><label>Client / Prospect</label><input type="text" value="<?php echo esc($declaration['client_name']); ?>" disabled></div>
                                        <div class="dc-field"><label>Email</label><input type="text" value="<?php echo esc($declaration['client_email']); ?>" disabled></div>
                                        <div class="dc-field"><label>Phone</label><input type="text" value="<?php echo esc($declaration['client_phone']); ?>" disabled></div>
                                        <div class="dc-field"><label>SiaID / File Number</label><input type="text" value="<?php echo (int) $declaration['prospect_id']; ?>" disabled></div>
                                    <?php else: ?>
                                        <div class="dc-field" id="dc_client_field">
                                            <label>Client / Prospect</label>
                                            <select id="dc_client" style="width:100%;">
                                                <option value="">Type name, ID, email or phone to search...</option>
                                            </select>
                                        </div>
                                        <div class="dc-field" id="dc_application_field">
                                            <label>Application</label>
                                            <select id="dc_application" name="application_id" disabled>
                                                <option value="">-- Select a client first --</option>
                                            </select>
                                            <div class="dc-field-error-msg" id="dc_application_error" style="display:none;"></div>
                                        </div>
                                        <input type="hidden" id="dc_prospect_id" name="prospect_id" value="">
                                    <?php endif; ?>

                                    <div class="dc-field">
                                        <label>Disclaimer / Consent Type</label>
                                        <input type="text" name="consent_type" list="dcConsentTypes" placeholder="e.g. Risk Acknowledgement, Medical Issue"
                                               value="<?php echo esc($declaration['consent_type'] ?? ''); ?>" <?php echo $isLocked ? 'disabled' : ''; ?>>
                                        <datalist id="dcConsentTypes">
                                            <option value="Risk Acknowledgement Declaration">
                                            <option value="Medical Issue Declaration">
                                            <option value="Declaration of Consent">
                                            <option value="Refund Policy Acknowledgement">
                                        </datalist>
                                    </div>
                                    <div class="dc-field">
                                        <label>Consultant</label>
                                        <input type="text" name="consultant_name" value="<?php echo esc($declaration['consultant_name'] ?? $consultantDefault ?? ''); ?>" <?php echo $isLocked ? 'disabled' : ''; ?>>
                                    </div>
                                    <div class="dc-field">
                                        <label>Date</label>
                                        <input type="date" name="consent_date" id="dc_consent_date" value="<?php echo esc($declaration['consent_date'] ?? date('Y-m-d')); ?>" <?php echo $isLocked ? 'disabled' : ''; ?>>
                                    </div>
                                </div>

                                <div class="dc-card">
                                    <h6>Document</h6>
                                    <div class="dc-field">
                                        <label>Title <span style="color:#e23b3b;">*</span></label>
                                        <input type="text" name="title" id="dc_title" required
                                               value="<?php echo esc($declaration['title'] ?? ''); ?>" <?php echo $isLocked ? 'disabled' : ''; ?>>
                                    </div>
                                    <div class="dc-field">
                                        <label>Disclaimer / Consent Content <span style="color:#e23b3b;">*</span></label>
                                        <textarea name="content" id="dc_content" rows="10"><?php echo $declaration['content'] ?? "Dear [Client Name],\n\nThis declaration is to inform you of the potential consequences related to your application due to the following issue(s)...\n\nI have read and understand the above declaration."; ?></textarea>
                                    </div>

                                    <label class="dc-field-check"><input type="checkbox" name="require_client_signature" value="1" <?php echo empty($declaration) || !empty($declaration['require_client_signature']) ? 'checked' : ''; ?> <?php echo $isLocked ? 'disabled' : ''; ?>> Require Client Signature</label>
                                    <label class="dc-field-check"><input type="checkbox" name="require_initials" value="1" <?php echo !empty($declaration['require_initials']) ? 'checked' : ''; ?> <?php echo $isLocked ? 'disabled' : ''; ?>> Require Initials</label>
                                    <label class="dc-field-check"><input type="checkbox" name="show_consent_checkbox" value="1" <?php echo empty($declaration) || !empty($declaration['show_consent_checkbox']) ? 'checked' : ''; ?> <?php echo $isLocked ? 'disabled' : ''; ?>> Show Consent Checkbox to Client</label>

                                    <?php if (!$isLocked): ?>
                                    <div class="dc-btns-row">
                                        <button type="submit" class="dc-btn dc-btn-primary"><?php echo $declaration ? 'Save Changes' : 'Save as Draft'; ?></button>
                                        <a class="dc-btn dc-btn-secondary" href="<?php echo base_url('declaration/Declaration/dashboard'); ?>">Cancel</a>
                                        <?php if ($declaration): ?>
                                        <button type="button" class="dc-btn dc-btn-send" onclick="dcSendForSignature(<?php echo (int) $declaration['id']; ?>)">Send for Signature</button>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>

                                <div class="dc-card">
                                    <div class="dc-card-head-row">
                                        <h6>Document Preview</h6>
                                        <button type="button" class="dc-btn-expand" onclick="dcOpenPreviewModal()" title="Open full preview">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg>
                                            Expand
                                        </button>
                                    </div>
                                    <div class="dc-preview dc-preview-clip" id="dcPreview">
                                        <div class="p-title" id="dcPrevTitle"><?php echo esc($declaration['title'] ?? 'Untitled Document'); ?></div>
                                        <div class="p-meta">
                                            Client: <strong id="dcPrevClientName"><?php echo esc($declaration['client_name'] ?? '—'); ?></strong><br>
                                            SiaID: <strong id="dcPrevSiaId"><?php echo (int) ($declaration['prospect_id'] ?? 0); ?></strong><br>
                                            Date: <strong><?php echo esc($declaration['consent_date'] ?? date('Y-m-d')); ?></strong>
                                        </div>
                                        <div id="dcPrevContent"><?php echo $declaration['content'] ?? ''; ?></div>
                                    </div>
                                    <button type="button" class="dc-btn-view-full" onclick="dcOpenPreviewModal()">&#128269; View Full Preview</button>
                                    <?php if ($declaration): ?>
                                    <div style="margin-top:16px;font-size:12.5px;color:#6b7280;">
                                        <?php if (!empty($declaration['last_sent_at'])): ?><div>Sent: <?php echo esc(date('d M Y g:i A', strtotime($declaration['last_sent_at']))); ?></div><?php endif; ?>
                                        <?php if (!empty($declaration['viewed_at'])): ?><div>Viewed: <?php echo esc(date('d M Y g:i A', strtotime($declaration['viewed_at']))); ?> (IP: <?php echo esc($declaration['viewed_ip']); ?>)</div><?php endif; ?>
                                        <?php if (!empty($declaration['client_signed_at'])): ?><div>Signed: <?php echo esc(date('d M Y g:i A', strtotime($declaration['client_signed_at']))); ?> (IP: <?php echo esc($declaration['client_signed_ip']); ?>)</div><?php endif; ?>
                                        <?php if (!empty($signUrl)): ?><div style="margin-top:8px;word-break:break-all;">Signing link: <a href="<?php echo esc($signUrl); ?>" target="_blank"><?php echo esc($signUrl); ?></a></div><?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>
        <form id="dcSendForm" method="post" style="display:none;"></form>

        <div class="dc-modal-wrap" id="dcPreviewModal" onclick="dcMaybeClosePreview(event)">
            <div class="dc-modal-box">
                <div class="dc-modal-head">
                    <strong>Document Preview</strong>
                    <span class="dc-modal-close" onclick="dcClosePreviewModal()">&times;</span>
                </div>
                <div class="dc-modal-body">
                    <div class="dc-preview">
                        <div class="p-title" id="dcModalTitle"></div>
                        <div class="p-meta" id="dcModalMeta"></div>
                        <div id="dcModalContent"></div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
        <script src="<?php echo base_url();?>/public/assets_client/js/plugins/sweetalert2.js"></script>
        <script>
            var DC_BASE = '<?php echo base_url(); ?>/';
            var dcIsLocked = <?php echo $isLocked ? 'true' : 'false'; ?>;

            // Flash banners (save/send success or validation errors) auto-dismiss after 10s
            // instead of sitting on screen until the next page load.
            document.querySelectorAll('.dc-flash').forEach(function (el) {
                setTimeout(function () {
                    el.classList.add('dc-flash-hide');
                    setTimeout(function () { el.remove(); }, 400);
                }, 10000);
            });

            var dcEditor = null;
            var dcLastAppliedClientName = null; // tracks what [Client Name] was last replaced with, so switching clients re-replaces the right text
            ClassicEditor.create(document.getElementById('dc_content'))
                .then(function (editor) {
                    dcEditor = editor;
                    if (dcIsLocked) { editor.enableReadOnlyMode('dc-locked'); }
                    editor.model.document.on('change:data', dcUpdatePreview);
                    dcUpdatePreview();
                })
                .catch(function (err) { console.error(err); });

            function dcUpdatePreview() {
                document.getElementById('dcPrevContent').innerHTML = dcEditor ? dcEditor.getData() : '';
            }

            // Fills the "[Client Name]" merge field in the content editor with the actually
            // selected client's name — swaps the literal placeholder the first time, or the
            // previously-applied name if the client selection is changed afterward. Editor
            // content is trusted admin-authored HTML, so plain split/join text substitution
            // (not touching markup) is safe here.
            function dcApplyClientNameToContent(name) {
                if (!dcEditor) return;
                var needle = dcLastAppliedClientName || '[Client Name]';
                var data = dcEditor.getData();
                if (data.indexOf(needle) === -1) { dcLastAppliedClientName = name; return; }
                dcEditor.setData(data.split(needle).join(name));
                dcLastAppliedClientName = name;
            }
            document.getElementById('dc_title').addEventListener('input', function () {
                document.getElementById('dcPrevTitle').textContent = this.value || 'Untitled Document';
            });

            // Reads live from the inline preview's own meta spans (rather than a value snapshotted
            // once at page load) so the modal always matches what's currently picked/typed —
            // including the client/SiaID, which only exist once a client has been selected in
            // create mode (see the select2:select handler below, which keeps #dcPrevClientName /
            // #dcPrevSiaId in sync as the user picks a client).
            function dcOpenPreviewModal() {
                document.getElementById('dcModalTitle').textContent = document.getElementById('dcPrevTitle').textContent;
                var dateEl = document.getElementById('dc_consent_date');
                document.getElementById('dcModalMeta').innerHTML =
                    'Client: <strong>' + document.getElementById('dcPrevClientName').textContent + '</strong><br>' +
                    'SiaID: <strong>' + document.getElementById('dcPrevSiaId').textContent + '</strong><br>' +
                    'Date: <strong>' + (dateEl ? dateEl.value : '') + '</strong>';
                document.getElementById('dcModalContent').innerHTML = document.getElementById('dcPrevContent').innerHTML;

                var modal = document.getElementById('dcPreviewModal');
                modal.classList.add('dc-show');
                document.body.style.overflow = 'hidden';
            }
            function dcClosePreviewModal() {
                document.getElementById('dcPreviewModal').classList.remove('dc-show');
                document.body.style.overflow = '';
            }
            function dcMaybeClosePreview(e) {
                if (e.target === document.getElementById('dcPreviewModal')) dcClosePreviewModal();
            }
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') dcClosePreviewModal();
            });

            <?php if (!$declaration): ?>
            $('#dc_client').select2({
                placeholder: 'Type name, ID, email or phone to search...',
                allowClear: true,
                minimumInputLength: 1,
                width: '100%',
                ajax: {
                    url: DC_BASE + 'declaration/Declaration/search_clients',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) { return { q: params.term }; },
                    processResults: function (data) { return { results: data.results }; },
                    cache: true
                }
            });

            $('#dc_client').on('select2:select', function (e) {
                var clientId = e.params.data.id;
                document.getElementById('dc_prospect_id').value = clientId;
                var clientName = e.params.data.name || '—';
                document.getElementById('dcPrevClientName').textContent = clientName;
                document.getElementById('dcPrevSiaId').textContent = clientId;
                dcApplyClientNameToContent(clientName);
                var appSelect = document.getElementById('dc_application');
                appSelect.innerHTML = '<option value="">Loading...</option>';
                appSelect.disabled = true;

                $.get(DC_BASE + 'declaration/Declaration/applications_for_client/' + clientId, function (data) {
                    var results = data.results || [];
                    if (results.length === 0) {
                        appSelect.innerHTML = '<option value="">-- No applications found --</option>';
                        return;
                    }
                    var html = '<option value="">-- Select an application --</option>';
                    results.forEach(function (r) {
                        html += '<option value="' + r.id + '">' + r.text + (r.status ? ' (' + r.status + ')' : '') + '</option>';
                    });
                    appSelect.innerHTML = html;
                    appSelect.disabled = false;
                }, 'json');
            });

            $('#dc_client').on('select2:clear', function () {
                document.getElementById('dc_application').innerHTML = '<option value="">-- Select a client first --</option>';
                document.getElementById('dc_application').disabled = true;
                document.getElementById('dc_prospect_id').value = '';
                document.getElementById('dcPrevClientName').textContent = '—';
                document.getElementById('dcPrevSiaId').textContent = '0';
            });

            document.getElementById('dc_application').addEventListener('change', function () {
                if (!this.value) return;
                document.getElementById('dc_application_error').style.display = 'none';
                document.getElementById('dc_client_field').classList.remove('dc-field-error');
                document.getElementById('dc_application_field').classList.remove('dc-field-error');
            });

            // Catch a missing client/application right here instead of round-tripping to the
            // server for the generic "Please select a client and an application first" error —
            // picking a client alone isn't enough, an application must also be explicitly chosen
            // from the (initially empty) second dropdown once it populates.
            document.getElementById('dcForm').addEventListener('submit', function (e) {
                var appSelect = document.getElementById('dc_application');
                var errorMsg = document.getElementById('dc_application_error');
                var clientField = document.getElementById('dc_client_field');
                var appField = document.getElementById('dc_application_field');

                if (!appSelect.value) {
                    e.preventDefault();
                    var reason = !document.getElementById('dc_prospect_id').value
                        ? 'Please select a client, then choose one of their applications.'
                        : 'Please choose an application for this client.';
                    errorMsg.textContent = reason;
                    errorMsg.style.display = 'block';
                    clientField.classList.toggle('dc-field-error', !document.getElementById('dc_prospect_id').value);
                    appField.classList.add('dc-field-error');
                    (document.getElementById('dc_prospect_id').value ? appSelect : document.getElementById('dc_client')).scrollIntoView({ behavior: 'smooth', block: 'center' });
                    return;
                }
                errorMsg.style.display = 'none';
                clientField.classList.remove('dc-field-error');
                appField.classList.remove('dc-field-error');
            });
            <?php endif; ?>

            function dcSendForSignature(id) {
                Swal.fire({
                    title: 'Send for signature?',
                    text: 'This will email the client a link to review and eSign this document.',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Send It',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#4c3ff5',
                    reverseButtons: true
                }).then(function (result) {
                    if (!result.value) return;
                    var form = document.getElementById('dcSendForm');
                    form.action = DC_BASE + 'declaration/Declaration/generate_link/' + id;
                    form.submit();
                });
            }
        </script>
    </body>
</html>
