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
            .dc-flash { padding: 12px 18px; border-radius: 10px; font-size: 13.5px; font-weight: 600; margin-bottom: 18px; transition: opacity .4s ease, max-height .4s ease, margin .4s ease, padding .4s ease; overflow: hidden; display: flex; align-items: center; gap: 8px; }
            .dc-flash.dc-flash-hide { opacity: 0; max-height: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0; }
            .dc-flash-success { background: #e8f8ee; color: #1e7e42; }
            .dc-flash-error { background: #fdecec; color: #c0392b; }

            .dc-locked-banner { background: #fdecec; color: #842029; font-size: 13.5px; padding: 12px 18px; border-radius: 10px; margin-bottom: 18px; }
            .dc-signed-banner { background: #e8f8ee; color: #1e7e42; font-size: 13.5px; padding: 12px 18px; border-radius: 10px; margin-bottom: 18px; display:flex; align-items:center; justify-content:space-between; gap:10px; flex-wrap: wrap; }

            /* ── Breadcrumb + title banner ── */
            .dc-breadcrumb { display: flex; align-items: center; gap: 8px; font-size: 12.5px; color: #9aa0aa; margin-bottom: 14px; flex-wrap: wrap; }
            .dc-breadcrumb a { color: #6b7280; font-weight: 600; }
            .dc-breadcrumb a:hover { color: #e23b3b; }
            .dc-breadcrumb .cur { color: #1f2430; font-weight: 700; }

            .dc-title-banner {
                background: linear-gradient(120deg,#e23b3b,#c92f2f); color: #fff; border-radius: 12px;
                padding: 16px 22px; display: flex; align-items: center; justify-content: space-between;
                gap: 14px; flex-wrap: wrap; margin-bottom: 22px; box-shadow: 0 8px 20px rgba(226,59,59,0.22);
            }
            .dc-title-banner-left { display: flex; align-items: center; gap: 12px; }
            .dc-title-banner-icon {
                width: 38px; height: 38px; border-radius: 10px; background: rgba(255,255,255,0.18);
                display: flex; align-items: center; justify-content: center; flex-shrink: 0;
            }
            .dc-title-banner-icon svg { width: 19px; height: 19px; color: #fff; }
            .dc-title-banner-icon i { font-size: 18px; color: #fff; }
            .dc-title-banner h4 { margin: 0; font-weight: 800; font-size: 18px; color: #fff; }
            .dc-status-badge { display: inline-block; padding: 5px 14px; border-radius: 20px; font-size: 12px; font-weight: 700; margin-left: 10px; vertical-align: middle; }
            .dc-badge-draft { background: rgba(255,255,255,0.9); color: #41464b; }
            .dc-badge-sent { background: #fff3cd; color: #856404; }
            .dc-badge-viewed { background: #cfe2ff; color: #084298; }
            .dc-badge-signed { background: #d1e7dd; color: #0f5132; }
            .dc-badge-declined { background: #fff; color: #c0392b; }
            .dc-btn-backlist {
                display: inline-flex; align-items: center; gap: 6px; font-size: 12.5px; font-weight: 700; color: #fff;
                background: rgba(255,255,255,0.16); border: 1px solid rgba(255,255,255,0.3); border-radius: 9px; padding: 9px 14px;
                transition: background .15s ease;
            }
            .dc-btn-backlist:hover { background: rgba(255,255,255,0.28); color: #fff; }

            /* ── Status timeline ── */
            .dc-timeline-card { background: #fff; border-radius: 14px; padding: 20px 26px; box-shadow: 0 2px 10px rgba(20,20,43,0.05); margin-bottom: 22px; }
            .dc-timeline { display: flex; align-items: flex-start; }
            .dc-tl-step { flex: 1; display: flex; flex-direction: column; align-items: center; text-align: center; position: relative; min-width: 0; }
            .dc-tl-line { position: absolute; top: 15px; left: -50%; width: 100%; height: 2px; background: #e6e8eb; z-index: 0; }
            .dc-tl-step:first-child .dc-tl-line { display: none; }
            .dc-tl-step.dc-tl-done .dc-tl-line { background: #2ecc71; }
            .dc-tl-step.dc-tl-declined .dc-tl-line { background: #e74c3c; }
            .dc-tl-dot {
                width: 30px; height: 30px; border-radius: 50%; background: #eef0f2; color: #9aa0aa;
                display: flex; align-items: center; justify-content: center; position: relative; z-index: 1;
                border: 2px solid #fff; box-shadow: 0 0 0 2px #eef0f2; flex-shrink: 0;
            }
            .dc-tl-dot svg { width: 14px; height: 14px; }
            .dc-tl-step.dc-tl-done .dc-tl-dot { background: #2ecc71; color: #fff; box-shadow: 0 0 0 2px #2ecc71; }
            .dc-tl-step.dc-tl-current .dc-tl-dot { background: #e23b3b; color: #fff; box-shadow: 0 0 0 4px rgba(226,59,59,0.15); animation: dcPulse 1.8s ease-in-out infinite; }
            .dc-tl-step.dc-tl-declined .dc-tl-dot { background: #e74c3c; color: #fff; box-shadow: 0 0 0 2px #e74c3c; }
            @keyframes dcPulse { 0%,100% { box-shadow: 0 0 0 4px rgba(226,59,59,0.15); } 50% { box-shadow: 0 0 0 7px rgba(226,59,59,0.08); } }
            .dc-tl-label { font-size: 12px; font-weight: 700; color: #6b7280; margin-top: 8px; }
            .dc-tl-step.dc-tl-done .dc-tl-label, .dc-tl-step.dc-tl-current .dc-tl-label { color: #1f2430; }
            .dc-tl-step.dc-tl-declined .dc-tl-label { color: #c0392b; }
            .dc-tl-time { font-size: 10.5px; color: #b3b8bf; margin-top: 2px; }
            @media (max-width: 620px) { .dc-tl-label { font-size: 10.5px; } .dc-timeline-card { padding: 16px; } }

            .dc-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 22px; align-items: start; }
            .dc-card { background: #fff; border-radius: 14px; padding: 22px; box-shadow: 0 2px 10px rgba(20,20,43,0.05); }
            .dc-card h6 { font-weight: 800; color: #1f2430; margin: 0 0 16px; font-size: 14.5px; }
            .dc-card-hint { font-size: 11px; color: #9aa0aa; font-weight: 600; margin-left: 6px; text-transform: none; letter-spacing: 0; }

            .dc-field { margin-bottom: 16px; }
            .dc-field label {
                font-weight: 700; font-size: 11.5px; color: #6b7280; text-transform: uppercase; letter-spacing: .02em;
                margin-bottom: 6px; display: flex; align-items: center; gap: 6px;
            }
            .dc-field label svg { width: 13px; height: 13px; color: #b3b8bf; flex-shrink: 0; }
            .dc-field input[type="text"], .dc-field input[type="date"], .dc-field select, .dc-field textarea {
                width: 100%; padding: 10px 12px; border: 1.5px solid #e0e3e8; border-radius: 10px; font-size: 13.5px;
                color: #1f2430; background: #fff; transition: border-color .15s ease, box-shadow .15s ease;
            }
            .dc-field input:not(:disabled):focus, .dc-field select:not(:disabled):focus { outline: none; border-color: #e23b3b; box-shadow: 0 0 0 3px rgba(226,59,59,0.08); }
            .dc-field input:disabled, .dc-field select:disabled { background: #f8f9fb; color: #6b7280; }
            .dc-field-error select, .dc-field-error .select2-selection { border-color: #e23b3b !important; box-shadow: 0 0 0 3px rgba(226,59,59,0.1); }
            .dc-field-error-msg { color: #e23b3b; font-size: 11.5px; font-weight: 600; margin-top: 5px; }

            /* Read-only "auto-filled" chips (Application Category / Type) once a client+application is picked */
            .dc-readonly-box {
                background: #fafbfc; border: 1.5px solid #eceef1; border-radius: 10px; padding: 10px 12px;
                font-size: 13px; font-weight: 700; color: #1f2430; min-height: 40px; display: flex; align-items: center;
            }
            .dc-readonly-box.dc-empty { color: #b3b8bf; font-weight: 600; }

            .dc-word-count { text-align: right; font-size: 11px; color: #9aa0aa; font-weight: 600; margin-top: 6px; }

            /* ── Document Preview: branded to resemble the actual signed PDF/signing page ── */
            .dc-preview-outer { border-radius: 12px; overflow: hidden; border: 1px solid #eceef1; }
            .dc-preview-gradient { height: 4px; background: linear-gradient(90deg,#e23b3b,#f39c12,#2ecc71,#3498db,#8e44ad); }
            .dc-preview {
                background: #fff; padding: 20px; font-size: 12.5px; line-height: 1.6;
                position: relative; overflow: hidden;
            }
            /* Faint SIA watermark behind the content, matching the branded look of the actual
               signing page and generated PDF — otherwise the preview reads as a plain unbranded
               text box that doesn't resemble what the client will actually receive. Uses a
               boosted-alpha derivative (sia_watermark_declaration.png) rather than the source
               sia_watermark.png used elsewhere in the app — that source file is only ~3% opaque
               on average by design, so stacking CSS opacity on top of it compounds to
               functionally invisible. The derivative's own alpha channel does the fading, so
               this layer is left at full opacity. */
            .dc-preview::before {
                content: ''; position: absolute; inset: 0; margin: auto; width: 70%; max-width: 260px; aspect-ratio: 779 / 335;
                background: url('<?php echo base_url('public/assets_client/img/sia_watermark_declaration.png'); ?>') center / contain no-repeat;
                pointer-events: none; z-index: 0;
            }
            .dc-preview > * { position: relative; z-index: 1; }
            .dc-preview .p-logo { display: flex; align-items: center; gap: 8px; margin-bottom: 12px; }
            .dc-preview .p-logo img { height: 22px; }
            .dc-preview .p-title { text-align: center; font-weight: 800; font-size: 15px; margin-bottom: 4px; }
            .dc-preview .p-meta { font-size: 11px; color: #6b7280; border-bottom: 1px solid #eceef1; padding-bottom: 10px; margin-bottom: 12px; }
            .dc-preview .p-sign-line { margin-top: 18px; padding-top: 14px; border-top: 1px dashed #e0e3e8; text-align: center; font-size: 10.5px; color: #9aa0aa; }
            .dc-preview .p-sign-line b { display: block; font-size: 11px; color: #1f2430; margin-top: 3px; }

            /* Compact inline preview: clipped to a fixed height with a fade-out at the bottom,
               since the 3-column layout leaves too little width/height to read the full
               document — "Preview PDF" below opens the same content in a big modal. */
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
                transition: background .15s ease, border-color .15s ease;
            }
            .dc-btn-expand:hover { background: #f5f4ff; border-color: #4c3ff5; }
            .dc-btn-view-full {
                width: 100%; margin-top: 12px; padding: 10px; border: 1.5px dashed #d0d4da; border-radius: 10px;
                background: #fafbfc; color: #4c3ff5; font-size: 12.5px; font-weight: 700; cursor: pointer; font-family: inherit;
                display: inline-flex; align-items: center; justify-content: center; gap: 6px;
                transition: background .15s ease, border-color .15s ease;
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
                box-shadow: 0 20px 50px rgba(20,20,43,0.3); overflow: hidden;
            }
            .dc-modal-head { display: flex; justify-content: space-between; align-items: center; padding: 18px 24px; border-bottom: 1px solid #eef0f2; }
            .dc-modal-head strong { font-size: 15.5px; }
            .dc-modal-close { width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #9aa0aa; font-size: 22px; }
            .dc-modal-close:hover { background: #f4f4f6; color: #1f2430; }
            .dc-modal-body { padding: 0; max-height: 78vh; overflow-y: auto; }
            .dc-modal-body .dc-preview { padding: 30px; }

            .dc-btns-row { display: flex; gap: 10px; margin-top: 20px; flex-wrap: wrap; }
            .dc-btn { padding: 12px 20px; border: none; border-radius: 10px; cursor: pointer; font-size: 13.5px; font-weight: 700; font-family: inherit; display: inline-flex; align-items: center; gap: 8px; transition: transform .12s ease, box-shadow .15s ease, background .15s ease; }
            .dc-btn-primary { background: #e23b3b; color: #fff; box-shadow: 0 4px 12px rgba(226,59,59,0.28); }
            .dc-btn-primary:hover { background: #c92f2f; transform: translateY(-1px); }
            .dc-btn-secondary { background: #f1f2f4; color: #1f2430; }
            .dc-btn-secondary:hover { background: #e8e9ec; }
            .dc-btn-send { background: #4c3ff5; color: #fff; box-shadow: 0 4px 12px rgba(76,63,245,0.28); }
            .dc-btn-send:hover { background: #3d31d6; transform: translateY(-1px); }
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
                            <div class="dc-flash dc-flash-success">&#9989; <?php echo esc($flashMsg); ?></div>
                        <?php endif; ?>
                        <?php if (!empty($flashErr = session()->getFlashdata('error'))): ?>
                            <div class="dc-flash dc-flash-error">&#9888;&#65039; <?php echo esc($flashErr); ?></div>
                        <?php endif; ?>

                        <?php
                        $isLocked = $declaration && in_array($declaration['status'], ['signed', 'declined'], true);
                        $status = $declaration['status'] ?? 'draft';
                        ?>

                        <div class="dc-breadcrumb">
                            <a href="<?php echo base_url('declaration/Declaration/dashboard'); ?>">Dashboard</a>
                            <span>&rsaquo;</span>
                            <a href="<?php echo base_url('declaration/Declaration/dashboard'); ?>">Declaration / Consent</a>
                            <span>&rsaquo;</span>
                            <span class="cur"><?php echo $declaration ? 'Edit' : 'Create New'; ?></span>
                        </div>

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

                        <div class="dc-title-banner">
                            <div class="dc-title-banner-left">
                                <div class="dc-title-banner-icon">
                                    <i class="fas fa-handshake"></i>
                                </div>
                                <h4><?php echo $declaration ? 'Edit Disclaimer / Consent' : 'Create Disclaimer / Consent'; ?>
                                    <?php if ($declaration): ?><span class="dc-status-badge dc-badge-<?php echo esc($status); ?>"><?php echo esc(ucfirst($status)); ?></span><?php endif; ?>
                                </h4>
                            </div>
                            <a class="dc-btn-backlist" href="<?php echo base_url('declaration/Declaration/dashboard'); ?>">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                                Back to list
                            </a>
                        </div>

                        <?php if ($declaration): ?>
                        <div class="dc-timeline-card">
                            <?php
                            // Draft is always "reached" the moment a row exists. Sent/Viewed only
                            // light up once their timestamp is actually set. The last step branches
                            // to Declined (red, terminal) instead of Signed when that's how it ended.
                            $tlSteps = [
                                ['label' => 'Draft', 'time' => $declaration['insert_on'] ?? null, 'reached' => true],
                                ['label' => 'Sent', 'time' => $declaration['last_sent_at'] ?? null, 'reached' => !empty($declaration['last_sent_at'])],
                                ['label' => 'Viewed', 'time' => $declaration['viewed_at'] ?? null, 'reached' => !empty($declaration['viewed_at'])],
                            ];
                            if ($status === 'declined') {
                                $tlSteps[] = ['label' => 'Declined', 'time' => $declaration['declined_at'] ?? null, 'reached' => true, 'declined' => true];
                            } else {
                                $tlSteps[] = ['label' => 'Signed', 'time' => $declaration['client_signed_at'] ?? null, 'reached' => $status === 'signed'];
                            }
                            // The "current" step is the last reached one, as long as the document
                            // isn't already at a done/terminal state (signed or declined) — those
                            // get the solid green/red dot instead of the pulsing red "in progress" one.
                            $lastReachedIndex = 0;
                            foreach ($tlSteps as $i => $s) { if ($s['reached']) $lastReachedIndex = $i; }
                            $isTerminal = in_array($status, ['signed', 'declined'], true);
                            ?>
                            <div class="dc-timeline">
                                <?php foreach ($tlSteps as $i => $s): ?>
                                    <?php
                                    $cls = 'dc-tl-step';
                                    if (!empty($s['declined'])) {
                                        $cls .= ' dc-tl-declined';
                                    } elseif ($s['reached'] && ($i < $lastReachedIndex || $isTerminal)) {
                                        $cls .= ' dc-tl-done';
                                    } elseif ($i === $lastReachedIndex && !$isTerminal) {
                                        $cls .= ' dc-tl-current';
                                    }
                                    ?>
                                    <div class="<?php echo $cls; ?>">
                                        <div class="dc-tl-line"></div>
                                        <div class="dc-tl-dot">
                                            <?php if (!empty($s['declined'])): ?>
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
                                            <?php elseif ($s['reached'] && ($i < $lastReachedIndex || $isTerminal)): ?>
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"/></svg>
                                            <?php else: ?>
                                                <?php echo $i + 1; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="dc-tl-label"><?php echo esc($s['label']); ?></div>
                                        <div class="dc-tl-time"><?php echo !empty($s['time']) ? esc(date('d M, g:i A', strtotime($s['time']))) : '&ndash;'; ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <form id="dcForm" method="post" action="<?php echo $declaration
                            ? base_url('declaration/Declaration/save/' . $declaration['id'])
                            : base_url('declaration/Declaration/store'); ?>">
                            <input type="hidden" name="send_after_save" id="dc_send_after_save" value="0">
                            <?php if (!$declaration): ?>
                            <input type="hidden" name="form_token" value="<?php echo esc($formToken ?? ''); ?>">
                            <?php endif; ?>

                            <div class="dc-grid">
                                <div class="dc-card">
                                    <h6>Client &amp; Application Details<?php echo $declaration ? '' : ' <span class="dc-card-hint">(Auto-pulled from CRM)</span>'; ?></h6>

                                    <?php if ($declaration): ?>
                                        <div class="dc-field">
                                            <label><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg> Client / Prospect</label>
                                            <input type="text" value="<?php echo esc($declaration['client_name']); ?>" disabled>
                                        </div>
                                        <div class="dc-field">
                                            <label><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v16H4z"/><path d="m4 6 8 7 8-7"/></svg> Email</label>
                                            <input type="text" value="<?php echo esc($declaration['client_email']); ?>" disabled>
                                        </div>
                                        <div class="dc-field">
                                            <label><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3.1-8.7A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.7a2 2 0 0 1-.4 2.1L8 9.9a16 16 0 0 0 6 6l1.4-1.4a2 2 0 0 1 2.1-.4c.9.3 1.8.5 2.7.6a2 2 0 0 1 1.8 2Z"/></svg> Phone</label>
                                            <input type="text" value="<?php echo esc($declaration['client_phone']); ?>" disabled>
                                        </div>
                                        <div class="dc-field">
                                            <label><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 10h18M8 2v4M16 2v4"/></svg> SiaID / File Number</label>
                                            <input type="text" value="<?php echo (int) $declaration['prospect_id']; ?>" disabled>
                                        </div>
                                        <div class="dc-field">
                                            <label><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2Z"/></svg> Application Category</label>
                                            <div class="dc-readonly-box"><?php echo esc($categoryName ?? '—'); ?></div>
                                        </div>
                                        <div class="dc-field">
                                            <label><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8Z"/><path d="M14 3v5h5"/></svg> Application Type / Service Type</label>
                                            <div class="dc-readonly-box"><?php echo esc($typeName ?? '—'); ?></div>
                                        </div>
                                    <?php else: ?>
                                        <div class="dc-field" id="dc_client_field">
                                            <label><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg> Client / Prospect</label>
                                            <select id="dc_client" style="width:100%;">
                                                <option value="">Type name, ID, email or phone to search...</option>
                                            </select>
                                        </div>
                                        <div class="dc-field" id="dc_application_field">
                                            <label><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12h6M9 16h6M9 8h1"/><rect x="4" y="3" width="16" height="18" rx="2"/></svg> Application</label>
                                            <select id="dc_application" name="application_id" disabled>
                                                <option value="">-- Select a client first --</option>
                                            </select>
                                            <div class="dc-field-error-msg" id="dc_application_error" style="display:none;"></div>
                                            <div id="dc_app_msg" style="font-size:12.5px;margin-top:6px;"></div>
                                            <!-- Only shown once the client's existing applications have loaded, so staff
                                                 can add a second (or third) category for the same client instead of being
                                                 limited to whichever categories already exist. -->
                                            <div id="dc_add_new_wrap" style="display:none;margin-top:6px;">
                                                <a href="javascript:void(0)" onclick="dcShowQuickAdd()" style="font-size:12.5px;color:#4c3ff5;font-weight:700;text-decoration:none;">+ Add New Category / Application</a>
                                            </div>
                                        </div>
                                        <!-- Shown only when the picked client has no CRM application yet — lets the
                                             admin create a minimal one (Category + Type) on the spot rather than
                                             having to leave this page and use the full CRM application form. -->
                                        <div class="dc-field" id="dc_quickadd_wrap" style="display:none;background:#fafafa;border:1px dashed #d8dce1;border-radius:10px;padding:14px;">
                                            <label style="margin-bottom:10px;">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg>
                                                Quick-Add Application
                                            </label>
                                            <select id="dc_qa_category" style="width:100%;margin-bottom:10px;">
                                                <option value="">-- Select category --</option>
                                            </select>
                                            <select id="dc_qa_type" disabled style="width:100%;">
                                                <option value="">-- Select category first --</option>
                                            </select>
                                            <select id="dc_qa_status" disabled style="width:100%;margin-top:10px;">
                                                <option value="">-- Select type first --</option>
                                            </select>
                                            <div id="dc_qa_msg" style="margin-top:8px;font-size:12.5px;"></div>
                                            <button type="button" class="dc-btn dc-btn-send" id="dc_qa_submit" onclick="dcQuickAddApplication()" disabled style="margin-top:12px;width:100%;justify-content:center;">Create Application &amp; Continue</button>
                                        </div>
                                        <div class="dc-field">
                                            <label><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2Z"/></svg> Application Category</label>
                                            <div class="dc-readonly-box dc-empty" id="dc_prev_category">Select a client &amp; application</div>
                                        </div>
                                        <div class="dc-field">
                                            <label><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8Z"/><path d="M14 3v5h5"/></svg> Application Type / Service Type</label>
                                            <div class="dc-readonly-box dc-empty" id="dc_prev_type">—</div>
                                        </div>
                                        <input type="hidden" id="dc_prospect_id" name="prospect_id" value="">
                                    <?php endif; ?>

                                    <div class="dc-field">
                                        <label><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 9v4M12 17h.01"/><circle cx="12" cy="12" r="9"/></svg> Disclaimer / Consent Type</label>
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
                                        <label><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg> Consultant</label>
                                        <input type="text" name="consultant_name" value="<?php echo esc($declaration['consultant_name'] ?? $consultantDefault ?? ''); ?>" <?php echo $isLocked ? 'disabled' : ''; ?>>
                                    </div>
                                    <div class="dc-field">
                                        <label><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg> Date</label>
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
                                        <textarea name="content" id="dc_content" rows="10"><?php echo $declaration['content'] ?? ''; ?></textarea>
                                        <div class="dc-word-count"><span id="dcWordCount">0</span> / 3000 words</div>
                                    </div>

                                    <?php if (!$isLocked): ?>
                                    <div class="dc-btns-row">
                                        <button type="submit" class="dc-btn dc-btn-primary">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2Z"/><path d="M17 21v-8H7v8M7 3v5h8"/></svg>
                                            <?php echo $declaration ? 'Save Changes' : 'Save as Draft'; ?>
                                        </button>
                                        <a class="dc-btn dc-btn-secondary" href="<?php echo base_url('declaration/Declaration/dashboard'); ?>">Cancel</a>
                                        <button type="button" class="dc-btn dc-btn-send" onclick="dcSendForSignature(<?php echo (int) ($declaration['id'] ?? 0); ?>)">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 2 11 13"/><path d="M22 2 15 22l-4-9-9-4Z"/></svg>
                                            Send for Signature
                                        </button>
                                    </div>
                                    <?php endif; ?>
                                </div>

                                <div class="dc-card">
                                    <div class="dc-card-head-row">
                                        <h6>Document Preview</h6>
                                        <button type="button" class="dc-btn-expand" onclick="dcOpenPreviewModal()" title="Open full preview">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8Z"/><path d="M14 3v5h5"/></svg>
                                            Preview PDF
                                        </button>
                                    </div>
                                    <div class="dc-preview-outer">
                                        <div class="dc-preview-gradient"></div>
                                        <div class="dc-preview dc-preview-clip" id="dcPreview">
                                            <div class="p-logo">
                                                <img src="<?php echo base_url('public/assets_client/img/sia_logo.png'); ?>" alt="SIA Immigration">
                                            </div>
                                            <div class="p-title" id="dcPrevTitle"><?php echo esc($declaration['title'] ?? 'Untitled Document'); ?></div>
                                            <div class="p-meta">
                                                Client: <strong id="dcPrevClientName"><?php echo esc($declaration['client_name'] ?? '—'); ?></strong><br>
                                                SiaID: <strong id="dcPrevSiaId"><?php echo (int) ($declaration['prospect_id'] ?? 0); ?></strong><br>
                                                Date: <strong><?php echo esc($declaration['consent_date'] ?? date('Y-m-d')); ?></strong>
                                            </div>
                                            <div id="dcPrevContent"><?php echo $declaration['content'] ?? ''; ?></div>
                                            <div class="p-sign-line">............................<br>Client Signature<b>(Sign Here)</b></div>
                                        </div>
                                    </div>
                                    <button type="button" class="dc-btn-view-full" onclick="dcOpenPreviewModal()">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                                        View Full Preview
                                    </button>
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

        <div class="dc-modal-wrap" id="dcPreviewModal" onclick="dcMaybeClosePreview(event)">
            <div class="dc-modal-box">
                <div class="dc-modal-head">
                    <strong>Document Preview</strong>
                    <span class="dc-modal-close" onclick="dcClosePreviewModal()">&times;</span>
                </div>
                <div class="dc-modal-body">
                    <div class="dc-preview-gradient"></div>
                    <div class="dc-preview">
                        <div class="p-logo"><img src="<?php echo base_url('public/assets_client/img/sia_logo.png'); ?>" alt="SIA Immigration"></div>
                        <div class="p-title" id="dcModalTitle"></div>
                        <div class="p-meta" id="dcModalMeta"></div>
                        <div id="dcModalContent"></div>
                        <div class="p-sign-line">............................<br>Client Signature<b>(Sign Here)</b></div>
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

            // "Send for Signature" redirects back to this exact same URL — the browser's own
            // scroll restoration then re-applies whatever scroll position the page was at
            // BEFORE the submit (e.g. mid-page, wherever the admin was editing), landing the
            // flash banner above the visible viewport even though it's rendered at the top of
            // the page. Force it back to the top whenever a flash message is present so it's
            // always seen.
            if (document.querySelector('.dc-flash')) {
                if ('scrollRestoration' in history) {
                    history.scrollRestoration = 'manual';
                }
                window.scrollTo(0, 0);
            }

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

            // ClassicEditor replaces #dc_content with its own editing UI but never writes the
            // live-edited HTML back into that textarea's actual value — without this, the form
            // silently posts whatever HTML was there at page load (the old/default text) no
            // matter what's typed into the editor. Sync it just before the browser submits.
            document.getElementById('dcForm').addEventListener('submit', function (e) {
                if (dcEditor) {
                    document.getElementById('dc_content').value = dcEditor.getData();
                }
                var words = parseInt(document.getElementById('dcWordCount').textContent, 10) || 0;
                if (words > DC_MAX_WORDS) {
                    e.preventDefault();
                    alert('Disclaimer / Consent Content is too long (' + words + ' words). Please keep it under ' + DC_MAX_WORDS + ' words.');
                }
            });

            var DC_MAX_WORDS = 3000;
            function dcUpdatePreview() {
                var html = dcEditor ? dcEditor.getData() : '';
                document.getElementById('dcPrevContent').innerHTML = html;
                var text = html.replace(/<[^>]*>/g, ' ').replace(/&nbsp;/g, ' ').trim();
                var words = text === '' ? 0 : text.split(/\s+/).length;
                var countEl = document.getElementById('dcWordCount');
                countEl.textContent = words;
                countEl.style.color = words > DC_MAX_WORDS ? '#e23b3b' : '';
                countEl.style.fontWeight = words > DC_MAX_WORDS ? '700' : '';
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

            // Tracks whichever client is currently picked, so the quick-add-application form
            // (shown when they have none) knows who to attach the new application to.
            var dcCurrentClientId = null;
            var dcCategoriesLoaded = false;

            // Shared by the select2:select handler (client picked by searching) and the
            // prospect-id pre-fill path below (client already known — e.g. opened from a
            // specific row on Siaportal/view_prospect) — both need to end up in the same state.
            function dcLoadApplicationsForClient(clientId, clientName) {
                document.getElementById('dc_prospect_id').value = clientId;
                dcCurrentClientId = clientId;
                clientName = clientName || '—';
                document.getElementById('dcPrevClientName').textContent = clientName;
                document.getElementById('dcPrevSiaId').textContent = clientId;
                dcApplyClientNameToContent(clientName);
                var appSelect = document.getElementById('dc_application');
                appSelect.innerHTML = '<option value="">Loading...</option>';
                appSelect.disabled = true;
                document.getElementById('dc_app_msg').innerHTML = '';
                document.getElementById('dc_add_new_wrap').style.display = 'none';
                dcHideQuickAdd();
                dcSetCategoryType('', '');

                $.get(DC_BASE + 'declaration/Declaration/applications_for_client/' + clientId, function (data) {
                    var results = data.results || [];
                    if (results.length === 0) {
                        appSelect.innerHTML = '<option value="">-- No applications found --</option>';
                        document.getElementById('dc_app_msg').innerHTML = '<span style="color:#f5a623;">&#9888;&#65039; This client has no applications yet.</span>';
                        dcShowQuickAdd();
                        return;
                    }
                    var html = '<option value="">-- Select an application --</option>';
                    results.forEach(function (r) {
                        html += '<option value="' + r.id + '" data-category="' + (r.category || '').replace(/"/g, '&quot;') + '" data-type="' + (r.type || '').replace(/"/g, '&quot;') + '">' + r.text + (r.status ? ' (' + r.status + ')' : '') + '</option>';
                    });
                    appSelect.innerHTML = html;
                    appSelect.disabled = false;
                    // Client already has at least one category/application — offer a way to add
                    // another instead of limiting them to the ones that already exist.
                    document.getElementById('dc_add_new_wrap').style.display = 'block';
                }, 'json');
            }

            function dcShowQuickAdd() {
                document.getElementById('dc_add_new_wrap').style.display = 'none';
                document.getElementById('dc_quickadd_wrap').style.display = 'block';
                document.getElementById('dc_qa_type').innerHTML = '<option value="">-- Select category first --</option>';
                document.getElementById('dc_qa_type').disabled = true;
                document.getElementById('dc_qa_status').innerHTML = '<option value="">-- Select type first --</option>';
                document.getElementById('dc_qa_status').disabled = true;
                document.getElementById('dc_qa_submit').disabled = true;
                document.getElementById('dc_qa_msg').innerHTML = '';
                document.getElementById('dc_qa_category').value = '';

                if (dcCategoriesLoaded) return;
                var catSelect = document.getElementById('dc_qa_category');
                $.get(DC_BASE + 'declaration/Declaration/categories', function (data) {
                    var html = '<option value="">-- Select category --</option>';
                    (data.results || []).forEach(function (r) {
                        html += '<option value="' + r.id + '">' + r.text + '</option>';
                    });
                    catSelect.innerHTML = html;
                    dcCategoriesLoaded = true;
                }, 'json');
            }

            function dcHideQuickAdd() {
                document.getElementById('dc_quickadd_wrap').style.display = 'none';
            }

            function dcQaResetStatus() {
                document.getElementById('dc_qa_status').innerHTML = '<option value="">-- Select type first --</option>';
                document.getElementById('dc_qa_status').disabled = true;
                document.getElementById('dc_qa_submit').disabled = true;
            }

            document.getElementById('dc_qa_category').addEventListener('change', function () {
                var typeSelect = document.getElementById('dc_qa_type');
                dcQaResetStatus();
                if (!this.value) {
                    typeSelect.innerHTML = '<option value="">-- Select category first --</option>';
                    typeSelect.disabled = true;
                    return;
                }
                typeSelect.innerHTML = '<option value="">Loading...</option>';
                typeSelect.disabled = true;
                $.get(DC_BASE + 'declaration/Declaration/types_for_category/' + this.value, function (data) {
                    var results = data.results || [];
                    if (results.length === 0) {
                        typeSelect.innerHTML = '<option value="">-- No types for this category --</option>';
                        typeSelect.disabled = true;
                        return;
                    }
                    var html = '<option value="">-- Select type --</option>';
                    results.forEach(function (r) {
                        html += '<option value="' + r.id + '">' + r.text + '</option>';
                    });
                    typeSelect.innerHTML = html;
                    typeSelect.disabled = false;
                }, 'json');
            });

            document.getElementById('dc_qa_type').addEventListener('change', function () {
                var statusSelect = document.getElementById('dc_qa_status');
                dcQaResetStatus();
                if (!this.value) return;
                statusSelect.innerHTML = '<option value="">Loading...</option>';
                statusSelect.disabled = true;
                $.get(DC_BASE + 'declaration/Declaration/statuses_for_type/' + this.value, function (data) {
                    var results = data.results || [];
                    if (results.length === 0) {
                        statusSelect.innerHTML = '<option value="">-- No statuses for this type --</option>';
                        statusSelect.disabled = true;
                        return;
                    }
                    var html = '<option value="">-- Select status --</option>';
                    results.forEach(function (r) {
                        html += '<option value="' + r.id + '">' + r.text + '</option>';
                    });
                    statusSelect.innerHTML = html;
                    statusSelect.disabled = false;
                }, 'json');
            });

            document.getElementById('dc_qa_status').addEventListener('change', function () {
                document.getElementById('dc_qa_submit').disabled = !this.value;
            });

            function dcQuickAddApplication() {
                var categoryId = document.getElementById('dc_qa_category').value;
                var typeId = document.getElementById('dc_qa_type').value;
                var statusId = document.getElementById('dc_qa_status').value;
                if (!dcCurrentClientId || !categoryId || !typeId || !statusId) return;

                var qaSubmit = document.getElementById('dc_qa_submit');
                qaSubmit.disabled = true;
                document.getElementById('dc_qa_msg').innerHTML = 'Creating application...';

                $.post(DC_BASE + 'declaration/Declaration/quick_add_application', {
                    prospect_id: dcCurrentClientId,
                    category_id: categoryId,
                    type_id: typeId,
                    status_id: statusId
                }, function (data) {
                    if (!data.success) {
                        document.getElementById('dc_qa_msg').innerHTML = '<span style="color:#e74c3c;">&#9888;&#65039; ' + (data.error || 'Could not create application.') + '</span>';
                        qaSubmit.disabled = false;
                        return;
                    }
                    dcHideQuickAdd();
                    dcLoadApplicationsForClient(dcCurrentClientId);
                }, 'json').fail(function () {
                    document.getElementById('dc_qa_msg').innerHTML = '<span style="color:#e74c3c;">&#9888;&#65039; Could not create application. Please try again.</span>';
                    qaSubmit.disabled = false;
                });
            }

            $('#dc_client').on('select2:select', function (e) {
                dcLoadApplicationsForClient(e.params.data.id, e.params.data.name);
            });

            <?php if (!empty($prefillProspect)): ?>
            // Opened from a specific prospect's row (e.g. "+ Start Consent" on
            // Siaportal/view_prospect) — pre-select that client instead of making the admin
            // search for someone they're already looking at.
            (function () {
                var prefillId = <?php echo (int) $prefillProspect['id']; ?>;
                var prefillName = <?php echo json_encode($prefillProspect['heading'] ?? ''); ?>;
                var option = new Option(prefillName + ' (' + prefillId + ')', prefillId, true, true);
                $('#dc_client').append(option).trigger('change');
                dcLoadApplicationsForClient(prefillId, prefillName);
            })();
            <?php endif; ?>

            $('#dc_client').on('select2:clear', function () {
                document.getElementById('dc_application').innerHTML = '<option value="">-- Select a client first --</option>';
                document.getElementById('dc_application').disabled = true;
                document.getElementById('dc_prospect_id').value = '';
                document.getElementById('dcPrevClientName').textContent = '—';
                document.getElementById('dcPrevSiaId').textContent = '0';
                dcSetCategoryType('', '');
            });

            // Mirrors the selected application's category/type into the two read-only display
            // boxes, matching the reference design's separate "Application Category" / "Application
            // Type" fields instead of only showing them combined inside the dropdown option text.
            function dcSetCategoryType(category, type) {
                var catBox = document.getElementById('dc_prev_category');
                var typeBox = document.getElementById('dc_prev_type');
                if (category) {
                    catBox.textContent = category;
                    catBox.classList.remove('dc-empty');
                } else {
                    catBox.textContent = 'Select a client & application';
                    catBox.classList.add('dc-empty');
                }
                if (type) {
                    typeBox.textContent = type;
                    typeBox.classList.remove('dc-empty');
                } else {
                    typeBox.textContent = '—';
                    typeBox.classList.add('dc-empty');
                }
            }

            document.getElementById('dc_application').addEventListener('change', function () {
                if (!this.value) { dcSetCategoryType('', ''); return; }
                document.getElementById('dc_application_error').style.display = 'none';
                document.getElementById('dc_client_field').classList.remove('dc-field-error');
                document.getElementById('dc_application_field').classList.remove('dc-field-error');
                var opt = this.options[this.selectedIndex];
                dcSetCategoryType(opt.dataset.category || '', opt.dataset.type || '');
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

            // Guards against a double-click (or an impatient second click while the request is
            // still in flight) firing two separate submissions — which, on the create page,
            // would insert two separate declaration rows and send duplicate emails, since
            // there's no server-side dedup on a brand-new row the way generate_link() has for
            // resends via last_sent_at. Checks e.defaultPrevented so a validation failure above
            // (which calls preventDefault but doesn't stop this listener from also running)
            // doesn't leave the buttons stuck disabled.
            document.getElementById('dcForm').addEventListener('submit', function (e) {
                if (e.defaultPrevented) return;
                document.querySelectorAll('.dc-btns-row button').forEach(function (b) { b.disabled = true; });
            });

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
                    // Always goes through the main form (create -> store, edit -> save/id —
                    // #dcForm's action already points at the right one) with this flag set, so
                    // whatever is currently typed/edited gets saved and sent in one step — no
                    // separate "Save Changes" click required first. requestSubmit() (not
                    // submit()) so the existing client/application picker validation listener
                    // (create page only) still runs first.
                    document.getElementById('dc_send_after_save').value = '1';
                    document.getElementById('dcForm').requestSubmit();
                });
            }
        </script>
    </body>
</html>
