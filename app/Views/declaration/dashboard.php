<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Declaration / Consent Dashboard - Siaportal</title>
        <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23e23b3b' d='M2 16l8-6 3 2v3l-8 6-3-2z'/%3E%3Cpath fill='%23e23b3b' d='M22 16l-8-6-3 2v3l8 6 3-2z'/%3E%3Ccircle fill='%23ffffff' cx='12' cy='12' r='2.2'/%3E%3C/svg%3E" />
        <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            .dc-dashboard { font-family: 'Segoe UI', Arial, sans-serif; color: #1f2430; padding-top: 6px; }
            .dc-dashboard * { box-sizing: border-box; }
            .dc-dashboard a { text-decoration: none; }

            .dc-topbar-row { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 24px; flex-wrap: wrap; gap: 14px; }
            .dc-title-group { display: flex; align-items: center; gap: 12px; }
            .dc-title-icon {
                width: 42px; height: 42px; border-radius: 12px; background: linear-gradient(135deg,#e23b3b,#c92f2f);
                display: flex; align-items: center; justify-content: center; flex-shrink: 0;
                box-shadow: 0 6px 14px rgba(226,59,59,0.28);
            }
            .dc-title-icon svg { width: 21px; height: 21px; color: #fff; }
            .dc-title-group h4 { margin: 0; font-weight: 800; font-size: 21px; line-height: 1.2; }
            .dc-title-group .dc-subtitle { font-size: 12.5px; color: #9aa0aa; margin-top: 2px; }

            .dc-btn-create {
                display: inline-flex; align-items: center; gap: 8px;
                background: #e23b3b; color: #fff; font-weight: 700; font-size: 14px;
                padding: 12px 20px; border-radius: 10px; border: none; cursor: pointer;
                box-shadow: 0 6px 14px rgba(226,59,59,0.28);
                transition: transform .15s ease, box-shadow .15s ease, background .15s ease;
            }
            .dc-btn-create:hover { transform: translateY(-1px); box-shadow: 0 8px 18px rgba(226,59,59,0.36); background: #c92f2f; }
            .dc-btn-archived-toggle {
                display: inline-flex; align-items: center; gap: 7px; font-size: 13.5px; font-weight: 700;
                color: #6b7280; background: #fff; border: 1px solid #e6e8eb; border-radius: 10px; padding: 10px 16px;
                transition: background .15s ease, color .15s ease, border-color .15s ease;
            }
            .dc-btn-archived-toggle:hover { background: #f8f9fb; color: #1f2430; border-color: #d8dce1; }

            .dc-flash { padding: 12px 18px; border-radius: 10px; font-size: 13.5px; font-weight: 600; margin-bottom: 18px; transition: opacity .4s ease, max-height .4s ease, margin .4s ease, padding .4s ease; overflow: hidden; display: flex; align-items: center; gap: 8px; }
            .dc-flash.dc-flash-hide { opacity: 0; max-height: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0; }
            .dc-flash-success { background: #e8f8ee; color: #1e7e42; }
            .dc-flash-error { background: #fdecec; color: #c0392b; }
            .dc-archived-banner {
                background: #fff8e6; color: #8a6d1f; font-size: 13.5px; padding: 12px 18px; border-radius: 10px;
                margin-bottom: 18px; display: flex; align-items: center; gap: 8px; flex-wrap: wrap;
            }
            .dc-archived-banner a { color: #2f5fd6; font-weight: 700; margin-left: auto; }

            /* ── Stat cards ── */
            .dc-stats-row { display: grid; grid-template-columns: repeat(5, 1fr); gap: 16px; margin-bottom: 24px; }
            .dc-stat-card {
                background: #fff; border-radius: 14px; padding: 18px 20px;
                border-left: 4px solid transparent; box-shadow: 0 2px 10px rgba(20,20,43,0.05);
                display: flex; align-items: center; gap: 14px;
                transition: transform .15s ease, box-shadow .15s ease;
            }
            .dc-stat-card:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(20,20,43,0.09); }
            .dc-stat-icon { width: 40px; height: 40px; border-radius: 11px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
            .dc-stat-icon svg { width: 19px; height: 19px; }
            .dc-stat-body .val { font-size: 25px; font-weight: 800; line-height: 1.1; }
            .dc-stat-body .lbl { font-size: 12.5px; color: #6b7280; margin-top: 3px; font-weight: 600; }

            .dc-stat-draft     { border-left-color: #9aa0aa; } .dc-stat-draft .val { color: #6b7280; } .dc-stat-draft .dc-stat-icon { background: #eef0f2; } .dc-stat-draft .dc-stat-icon svg { color: #6b7280; }
            .dc-stat-pending   { border-left-color: #f5a623; } .dc-stat-pending .val { color: #f5a623; } .dc-stat-pending .dc-stat-icon { background: #fef2e0; } .dc-stat-pending .dc-stat-icon svg { color: #f5a623; }
            .dc-stat-signed    { border-left-color: #2ecc71; } .dc-stat-signed .val { color: #2ecc71; } .dc-stat-signed .dc-stat-icon { background: #e6f9ee; } .dc-stat-signed .dc-stat-icon svg { color: #2ecc71; }
            .dc-stat-declined  { border-left-color: #e74c3c; } .dc-stat-declined .val { color: #e74c3c; } .dc-stat-declined .dc-stat-icon { background: #fdecec; } .dc-stat-declined .dc-stat-icon svg { color: #e74c3c; }
            .dc-stat-total     { border-left-color: #2f80ed; } .dc-stat-total .val { color: #2f80ed; } .dc-stat-total .dc-stat-icon { background: #e8f0fe; } .dc-stat-total .dc-stat-icon svg { color: #2f80ed; }

            /* ── Filters ── */
            .dc-filters-row { display: flex; align-items: stretch; gap: 12px; margin-bottom: 20px; }
            .dc-filter-box {
                background: #fff; border: 1px solid #e6e8eb; border-radius: 9px; padding: 7px 14px; flex: 1;
                display: flex; flex-direction: column; gap: 2px; justify-content: center; min-width: 0;
                transition: border-color .15s ease, box-shadow .15s ease;
            }
            .dc-filter-box:focus-within { border-color: #c7cbd1; box-shadow: 0 0 0 3px rgba(226,59,59,0.08); }
            .dc-filter-box-wide { flex: 1.7; }
            .dc-filter-box .f-label { font-size: 10.5px; color: #9aa0aa; font-weight: 600; }
            .dc-filter-box .f-value { font-size: 13px; font-weight: 700; color: #1f2430; display: flex; align-items: center; justify-content: space-between; gap: 8px; }
            .dc-filter-box .f-value svg { width: 14px; height: 14px; color: #9aa0aa; flex-shrink: 0; }
            .dc-filter-box select, .dc-filter-box input[type="text"] {
                border: none; background: transparent; padding: 0; margin: 0; font: inherit;
                font-size: 13px; font-weight: 700; color: #1f2430; width: 100%; appearance: none; -webkit-appearance: none;
            }
            .dc-filter-box input[type="text"]::placeholder { color: #9aa0aa; font-weight: 600; }
            .dc-filter-box select { cursor: pointer; }
            .dc-btn-filters {
                background: #e23b3b; border: 1px solid #e23b3b; border-radius: 9px; padding: 0 22px;
                display: flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 700; color: #fff;
                cursor: pointer; white-space: nowrap; font-family: inherit;
                transition: background .15s ease, box-shadow .15s ease, transform .12s ease;
            }
            .dc-btn-filters:hover { background: #c92f2f; box-shadow: 0 6px 16px rgba(226,59,59,0.32); transform: translateY(-1px); }
            .dc-btn-reset {
                background: #fff; border: 1.5px solid #e23b3b; border-radius: 9px; padding: 0 16px;
                display: flex; align-items: center; gap: 7px; font-size: 13px; font-weight: 700; color: #e23b3b;
                cursor: pointer; white-space: nowrap; transition: background .15s ease;
            }
            .dc-btn-reset:hover { background: #fdf1f1; }
            .dc-btn-reset-inactive { opacity: .5; }

            /* ── Table ── */
            .dc-table-card { background: #fff; border-radius: 14px; overflow: hidden; box-shadow: 0 2px 10px rgba(20,20,43,0.05); }
            .dc-table-card table { width: 100%; border-collapse: collapse; margin: 0; }
            .dc-table-card thead th {
                background: #f8f9fb; text-align: left; font-size: 12px; font-weight: 700; color: #6b7280;
                text-transform: uppercase; letter-spacing: .02em;
                padding: 14px 18px; border-bottom: 1px solid #eef0f2; white-space: nowrap;
            }
            .dc-table-card tbody td { padding: 14px 18px; border-bottom: 1px solid #f1f2f4; font-size: 13.5px; color: #1f2430; white-space: nowrap; }
            .dc-table-card tbody tr:last-child td { border-bottom: none; }
            .dc-table-card tbody tr { transition: background .12s ease; }
            .dc-table-card tbody tr:hover { background: #fafbfc; }

            .dc-client-cell { display: flex; align-items: center; gap: 10px; }
            .dc-avatar {
                width: 34px; height: 34px; border-radius: 50%; flex-shrink: 0; display: flex; align-items: center;
                justify-content: center; font-size: 12.5px; font-weight: 800; color: #fff;
            }
            .dc-client-id { font-weight: 700; color: #1f2430; line-height: 1.3; }
            .dc-client-sia { font-size: 11.5px; color: #9aa0aa; margin-top: 1px; }
            .dc-doc-title { max-width: 220px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: inline-block; vertical-align: bottom; }

            .dc-badge { display: inline-flex; align-items: center; gap: 6px; padding: 5px 12px 5px 10px; border-radius: 20px; font-size: 12px; font-weight: 700; }
            .dc-badge::before { content: ''; width: 6px; height: 6px; border-radius: 50%; background: currentColor; flex-shrink: 0; }
            .dc-badge-draft     { background: #eef0f2; color: #6b7280; }
            .dc-badge-sent      { background: #fff3cd; color: #8a6d1f; }
            .dc-badge-viewed    { background: #cfe2ff; color: #0b5ed7; }
            .dc-badge-signed    { background: #d1e7dd; color: #198754; }
            .dc-badge-declined  { background: #f8d7da; color: #c0392b; }
            .dc-badge-cancelled { background: #f8d7da; color: #c0392b; }

            .dc-actions { display: flex; align-items: center; gap: 6px; color: #9aa0aa; }
            .dc-actions a {
                color: inherit; display: inline-flex; align-items: center; justify-content: center;
                width: 30px; height: 30px; border-radius: 8px; transition: background .15s ease, color .15s ease;
            }
            .dc-actions svg { width: 16px; height: 16px; }
            .dc-actions a:hover { color: #e23b3b; background: #fdf1f1; }

            .dc-menu-panel {
                display: none; position: fixed; z-index: 9998; background: #fff; border-radius: 10px;
                box-shadow: 0 10px 28px rgba(20,20,43,0.16); border: 1px solid #eceef1; padding: 6px; min-width: 190px;
            }
            .dc-menu-panel a {
                display: block; padding: 9px 12px; border-radius: 7px; font-size: 13.5px; font-weight: 600;
                color: #1f2430; text-decoration: none; cursor: pointer; transition: background .12s ease;
            }
            .dc-menu-panel a:hover { background: #f8f9fb; }
            .dc-menu-panel a.dc-menu-disabled { color: #c2c6cc; cursor: not-allowed; pointer-events: none; }
            .dc-menu-panel a.dc-menu-danger { color: #c0392b; }
            .dc-menu-panel a.dc-menu-danger:hover { background: #fdecec; }

            .dc-pagination-row { display: flex; align-items: center; justify-content: space-between; padding: 14px 18px; }
            .dc-pg-info { font-size: 13px; color: #6b7280; }
            .dc-pg-controls { display: flex; align-items: center; gap: 6px; }
            .dc-pg-btn {
                width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center;
                font-size: 13px; font-weight: 700; color: #6b7280; cursor: pointer; border: 1px solid transparent;
                transition: background .15s ease, color .15s ease;
            }
            .dc-pg-btn:not(.active):hover { background: #f8f9fb; color: #1f2430; }
            .dc-pg-btn.active { background: #e23b3b; color: #fff; }
            .dc-pg-btn.nav { color: #e23b3b; }
            .dc-pg-dots { color: #9aa0aa; padding: 0 4px; font-size: 13px; }

            .dc-empty-state { display: flex; flex-direction: column; align-items: center; gap: 10px; padding: 56px 18px; color: #9aa0aa; }
            .dc-empty-state svg { width: 36px; height: 36px; color: #d8dce1; }
            .dc-empty-state .t { font-size: 14px; font-weight: 700; color: #6b7280; }
            .dc-empty-state .s { font-size: 12.5px; }

            #dc-toast {
                display: none; position: fixed; bottom: 24px; right: 24px; color: #fff;
                padding: 12px 20px; border-radius: 8px; font-size: 13.5px; z-index: 9999;
                box-shadow: 0 6px 20px rgba(0,0,0,0.2); align-items: center; gap: 8px;
            }
            #dc-toast.dc-toast-success { background: #1e7e42; }
            #dc-toast.dc-toast-error { background: #c0392b; }
            #dc-toast.dc-toast-info { background: #1f2430; }

            @media (max-width: 1100px) {
                .dc-stats-row { grid-template-columns: repeat(2, 1fr); }
                .dc-filters-row { flex-wrap: wrap; }
                .dc-filter-box { flex: 1 1 45%; }
            }
            @media (max-width: 620px) {
                .dc-stats-row { grid-template-columns: 1fr; }
                .dc-filter-box { flex: 1 1 100%; }
                .dc-pagination-row { flex-direction: column; align-items: flex-start; gap: 12px; }
            }
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
                    <div class="container-fluid dc-dashboard">

                        <?php $isArchived = !empty($filters['archived']); ?>

                        <?php if (!empty($flashMsg = session()->getFlashdata('message'))): ?>
                            <div class="dc-flash dc-flash-success">&#9989; <?php echo esc($flashMsg); ?></div>
                        <?php endif; ?>
                        <?php if (!empty($flashErr = session()->getFlashdata('error'))): ?>
                            <div class="dc-flash dc-flash-error">&#9888;&#65039; <?php echo esc($flashErr); ?></div>
                        <?php endif; ?>

                        <?php if ($isArchived): ?>
                            <div class="dc-archived-banner">
                                &#128193; Viewing <strong><?php echo (int) $archivedCount; ?></strong> archived document<?php echo $archivedCount === 1 ? '' : 's'; ?> — hidden from the active dashboard, not deleted.
                                <a href="<?php echo base_url('declaration/Declaration/dashboard'); ?>">&larr; Back to active list</a>
                            </div>
                        <?php endif; ?>

                        <div class="dc-topbar-row">
                            <div class="dc-title-group">
                                <div class="dc-title-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8Z"/><path d="M14 3v5h5"/><path d="M9 13h6M9 17h6"/></svg>
                                </div>
                                <div>
                                    <h4>Disclaimer / Consent</h4>
                                    <div class="dc-subtitle">Prepare, send, and track e-signed disclaimer &amp; consent documents</div>
                                </div>
                            </div>
                            <div style="display:flex;gap:12px;">
                                <a class="dc-btn-archived-toggle" href="<?php echo base_url('declaration/Declaration/dashboard' . ($isArchived ? '' : '?archived=1')); ?>">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="4" rx="1"/><path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8M10 12h4"/></svg>
                                    <?php echo $isArchived ? 'Active Documents' : 'View Archived (' . (int) $archivedCount . ')'; ?>
                                </a>
                                <a class="dc-btn-create" href="<?php echo base_url('declaration/Declaration/create'); ?>">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg>
                                    New Disclaimer / Consent
                                </a>
                            </div>
                        </div>

                        <?php if (!$isArchived): ?>
                        <div class="dc-stats-row">
                            <div class="dc-stat-card dc-stat-draft">
                                <div class="dc-stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg></div>
                                <div class="dc-stat-body"><div class="val"><?php echo (int) $counts['draft']; ?></div><div class="lbl">Draft</div></div>
                            </div>
                            <div class="dc-stat-card dc-stat-pending">
                                <div class="dc-stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg></div>
                                <div class="dc-stat-body"><div class="val"><?php echo (int) $counts['pending']; ?></div><div class="lbl">Pending Signature</div></div>
                            </div>
                            <div class="dc-stat-card dc-stat-signed">
                                <div class="dc-stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"/></svg></div>
                                <div class="dc-stat-body"><div class="val"><?php echo (int) $counts['signed']; ?></div><div class="lbl">Signed</div></div>
                            </div>
                            <div class="dc-stat-card dc-stat-declined">
                                <div class="dc-stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg></div>
                                <div class="dc-stat-body"><div class="val"><?php echo (int) $counts['declined']; ?></div><div class="lbl">Declined</div></div>
                            </div>
                            <div class="dc-stat-card dc-stat-total">
                                <div class="dc-stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8Z"/><path d="M14 3v5h5"/><path d="M9 13h6M9 17h6"/></svg></div>
                                <div class="dc-stat-body"><div class="val"><?php echo (int) $counts['total']; ?></div><div class="lbl">Total</div></div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <form id="dcFilterForm" method="get" action="<?php echo base_url('declaration/Declaration/dashboard'); ?>">
                        <?php if ($isArchived): ?><input type="hidden" name="archived" value="1"><?php endif; ?>
                        <div class="dc-filters-row">
                            <div class="dc-filter-box">
                                <div class="f-label">Search</div>
                                <div class="f-value">
                                    <input type="text" name="q" value="<?php echo esc($filters['q'] ?? ''); ?>" placeholder="Name, SiaID, email, or title...">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                                </div>
                            </div>
                            <div class="dc-filter-box dc-filter-box-wide">
                                <div class="f-label">Application Type</div>
                                <div class="f-value">
                                    <select name="type_id" id="dcTypeFilter" onchange="document.getElementById('dcFilterForm').submit();">
                                        <option value="">All Types</option>
                                        <?php foreach ($typeOptions as $t): ?>
                                            <option value="<?php echo (int) $t['tyid']; ?>" <?php echo ((int) ($filters['type_id'] ?? 0) === (int) $t['tyid']) ? 'selected' : ''; ?>><?php echo esc(($t['ct'] ?? '') . ' — ' . $t['type']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                                </div>
                            </div>
                            <div class="dc-filter-box dc-filter-box-wide">
                                <div class="f-label">Status</div>
                                <div class="f-value">
                                    <select name="status" id="dcStatusFilter" onchange="document.getElementById('dcFilterForm').submit();">
                                        <?php $statusOptions = ['' => 'All Status', 'draft' => 'Draft', 'sent' => 'Sent', 'viewed' => 'Viewed', 'signed' => 'Signed', 'declined' => 'Declined']; ?>
                                        <?php foreach ($statusOptions as $val => $label): ?>
                                            <option value="<?php echo esc($val); ?>" <?php echo ($filters['status_bucket'] ?? '') === $val ? 'selected' : ''; ?>><?php echo esc($label); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                                </div>
                            </div>
                            <button type="submit" class="dc-btn-filters">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16l-6 8v6l-4 2v-8Z"/></svg>
                                Filter
                            </button>
                            <?php $hasActiveFilters = !empty($filters['q']) || !empty($filters['date_from']) || !empty($filters['date_to']) || !empty($filters['type_id']) || !empty($filters['status_bucket']); ?>
                            <a class="dc-btn-reset<?php echo $hasActiveFilters ? '' : ' dc-btn-reset-inactive'; ?>" href="<?php echo base_url('declaration/Declaration/dashboard'); ?>" title="Clear all filters">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 3-6.7"/><path d="M3 4v5h5"/></svg>
                                Reset
                            </a>
                        </div>
                        </form>

                        <div class="dc-table-card">
                            <div style="overflow-x:auto;">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Client (SiaID)</th>
                                        <th>Application Type</th>
                                        <th>Document Title</th>
                                        <th>Status</th>
                                        <th>Sent Date</th>
                                        <th>Viewed Date</th>
                                        <th>Signed Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($rows)): ?>
                                        <tr><td colspan="8">
                                            <div class="dc-empty-state">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8Z"/><path d="M14 3v5h5"/><path d="M9 13h6M9 17h6"/></svg>
                                                <div class="t">No documents found</div>
                                                <div class="s">Try widening your filters, or create a new one.</div>
                                            </div>
                                        </td></tr>
                                    <?php endif; ?>
                                    <?php
                                    $dcAvatarColors = ['#e23b3b', '#f5a623', '#2ecc71', '#3498db', '#8e44ad', '#e67e22', '#16a085'];
                                    ?>
                                    <?php foreach ($rows as $row): ?>
                                        <?php
                                        $badgeLabel = ucfirst($row['status']);
                                        $badgeClass = 'dc-badge-' . $row['status'];
                                        $typeLabel = trim(($row['category_name'] ?? '') . ' — ' . ($row['type_name'] ?? ''), ' —') ?: '—';
                                        $canSend = in_array($row['status'], ['draft', 'sent', 'viewed'], true);
                                        $initial = strtoupper(substr(trim((string) $row['client_name']), 0, 1)) ?: '?';
                                        $avatarColor = $dcAvatarColors[(int) $row['id'] % count($dcAvatarColors)];
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="dc-client-cell">
                                                    <div class="dc-avatar" style="background:<?php echo $avatarColor; ?>;"><?php echo esc($initial); ?></div>
                                                    <div>
                                                        <div class="dc-client-id"><?php echo esc($row['client_name']); ?></div>
                                                        <div class="dc-client-sia">SiaID: <?php echo (int) $row['prospect_id']; ?></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo esc($typeLabel); ?></td>
                                            <td><span class="dc-doc-title" title="<?php echo esc($row['title'] ?: ''); ?>"><?php echo esc($row['title'] ?: '—'); ?></span></td>
                                            <td><span class="dc-badge <?php echo $badgeClass; ?>"><?php echo esc($badgeLabel); ?></span></td>
                                            <td><?php echo !empty($row['last_sent_at']) ? esc(date('d M Y', strtotime($row['last_sent_at']))) : '&ndash;'; ?></td>
                                            <td><?php echo !empty($row['viewed_at']) ? esc(date('d M Y', strtotime($row['viewed_at']))) : '&ndash;'; ?></td>
                                            <td><?php echo !empty($row['client_signed_at']) ? esc(date('d M Y', strtotime($row['client_signed_at']))) : '&ndash;'; ?></td>
                                            <td>
                                                <div class="dc-actions">
                                                    <a href="<?php echo base_url('declaration/Declaration/detail/' . $row['id']); ?>" title="View / Edit">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                                    </a>
                                                    <?php if (!$isArchived && $canSend): ?>
                                                    <a href="#" title="Send / Resend" onclick="dcSend(<?php echo (int) $row['id']; ?>); return false;">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 2 11 13"/><path d="M22 2 15 22l-4-9-9-4Z"/></svg>
                                                    </a>
                                                    <?php endif; ?>
                                                    <?php if (!empty($row['pdf_path'])): ?>
                                                    <a href="<?php echo base_url($row['pdf_path']); ?>" target="_blank" title="Download Signed PDF">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="M7 10l5 5 5-5"/><path d="M12 15V3"/></svg>
                                                    </a>
                                                    <?php endif; ?>
                                                    <a href="#" class="dc-menu-trigger" title="More options"
                                                       data-id="<?php echo (int) $row['id']; ?>"
                                                       data-archived="<?php echo $isArchived ? '1' : '0'; ?>"
                                                       onclick="dcOpenMenu(event, this); return false;">
                                                        <svg viewBox="0 0 24 24" fill="currentColor"><circle cx="5" cy="12" r="2"/><circle cx="12" cy="12" r="2"/><circle cx="19" cy="12" r="2"/></svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            </div>

                            <?php
                            $dcPageUrl = function (int $p) use ($filters, $perPage) {
                                $qs = array_filter([
                                    'q'         => $filters['q'] ?? null,
                                    'type_id'   => $filters['type_id'] ?? null,
                                    'status'    => $filters['status_bucket'] ?? null,
                                    'archived'  => $filters['archived'] ?? null,
                                    'per_page'  => $perPage !== 10 ? $perPage : null,
                                    'page'      => $p > 1 ? $p : null,
                                ], static fn ($v) => $v !== null && $v !== '');
                                return base_url('declaration/Declaration/dashboard') . (!empty($qs) ? '?' . http_build_query($qs) : '');
                            };
                            $rangeStart = $total > 0 ? (($page - 1) * $perPage) + 1 : 0;
                            $rangeEnd = min($total, $page * $perPage);
                            ?>
                            <div class="dc-pagination-row">
                                <div class="dc-pg-info">Showing <?php echo $rangeStart; ?>-<?php echo $rangeEnd; ?> of <?php echo (int) $total; ?></div>
                                <div class="dc-pg-controls">
                                    <a class="dc-pg-btn nav" href="<?php echo $dcPageUrl(max(1, $page - 1)); ?>">&lsaquo;</a>
                                    <?php
                                    $pagesToShow = [];
                                    for ($p = 1; $p <= $totalPages; $p++) {
                                        if ($p === 1 || $p === $totalPages || abs($p - $page) <= 2) {
                                            $pagesToShow[] = $p;
                                        }
                                    }
                                    $prevShown = 0;
                                    foreach ($pagesToShow as $p):
                                        if ($prevShown && $p - $prevShown > 1): ?>
                                            <div class="dc-pg-dots">...</div>
                                        <?php endif;
                                        $prevShown = $p; ?>
                                        <a class="dc-pg-btn<?php echo $p === $page ? ' active' : ''; ?>" href="<?php echo $dcPageUrl($p); ?>"><?php echo $p; ?></a>
                                    <?php endforeach; ?>
                                    <a class="dc-pg-btn nav" href="<?php echo $dcPageUrl(min($totalPages, $page + 1)); ?>">&rsaquo;</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>
            </div>
        </div>
        <form id="dcActionForm" method="post" style="display:none;"></form>
        <div id="dc-toast"></div>

        <div id="dcMenuPanel" class="dc-menu-panel">
            <a href="#" id="dcMenuEdit">Edit</a>
            <a href="#" id="dcMenuArchive"></a>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/public/assets_client/js/plugins/sweetalert2.js"></script>
        <script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>
        <script>
            var DC_BASE = '<?php echo base_url(); ?>/';

            // Flash banners (save/archive/restore success or errors) auto-dismiss after 10s
            // instead of sitting on screen until the next page load.
            document.querySelectorAll('.dc-flash').forEach(function (el) {
                setTimeout(function () {
                    el.classList.add('dc-flash-hide');
                    setTimeout(function () { el.remove(); }, 400);
                }, 10000);
            });

            function dcToast(msg, type) {
                var t = document.getElementById('dc-toast');
                var icon = type === 'success' ? '✅ ' : (type === 'error' ? '⚠️ ' : 'ℹ️ ');
                t.textContent = icon + msg;
                t.className = type === 'success' ? 'dc-toast-success' : (type === 'error' ? 'dc-toast-error' : 'dc-toast-info');
                t.style.display = 'flex';
                setTimeout(function () { t.style.display = 'none'; }, 3000);
            }

            function dcSend(id) {
                Swal.fire({
                    title: 'Send for signature?',
                    text: 'Send this document to the client\'s email now for e-signature?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Send It',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#4c3ff5',
                    reverseButtons: true
                }).then(function (result) {
                    if (!result.value) return;
                    var form = document.getElementById('dcActionForm');
                    form.action = DC_BASE + 'declaration/Declaration/generate_link/' + id;
                    form.submit();
                });
            }

            var dcMenuPanel = document.getElementById('dcMenuPanel');

            function dcOpenMenu(e, trigger) {
                e.stopPropagation();
                var id = trigger.dataset.id;
                if (dcMenuPanel.dataset.openFor === id && dcMenuPanel.style.display !== 'none') {
                    dcCloseMenu();
                    return;
                }

                var archived = trigger.dataset.archived === '1';

                var editLink = document.getElementById('dcMenuEdit');
                editLink.href = DC_BASE + 'declaration/Declaration/detail/' + id;

                var archiveLink = document.getElementById('dcMenuArchive');
                archiveLink.className = archived ? '' : 'dc-menu-danger';
                archiveLink.textContent = archived ? '↩️ Restore' : '🗄️ Hide / Archive';
                archiveLink.onclick = function () {
                    dcCloseMenu();
                    if (archived) { dcRestore(id); } else { dcArchive(id); }
                    return false;
                };

                var rect = trigger.getBoundingClientRect();
                dcMenuPanel.style.top = (rect.bottom + 6) + 'px';
                dcMenuPanel.style.right = (window.innerWidth - rect.right) + 'px';
                dcMenuPanel.style.left = 'auto';
                dcMenuPanel.style.display = 'block';
                dcMenuPanel.dataset.openFor = id;
            }

            function dcCloseMenu() {
                dcMenuPanel.style.display = 'none';
                dcMenuPanel.dataset.openFor = '';
            }

            document.addEventListener('click', function (e) {
                if (dcMenuPanel.style.display !== 'none' && !dcMenuPanel.contains(e.target) && !e.target.closest('.dc-menu-trigger')) {
                    dcCloseMenu();
                }
            });
            window.addEventListener('scroll', dcCloseMenu, true);
            window.addEventListener('resize', dcCloseMenu);

            function dcArchive(id) {
                Swal.fire({
                    title: 'Archive this document?',
                    text: 'It\'s hidden from the active list, not deleted — you can restore it anytime.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Archive It',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#e23b3b',
                    reverseButtons: true
                }).then(function (result) {
                    if (!result.value) return;
                    var form = document.getElementById('dcActionForm');
                    form.action = DC_BASE + 'declaration/Declaration/archive/' + id;
                    form.submit();
                });
            }

            function dcRestore(id) {
                Swal.fire({
                    title: 'Restore this document?',
                    text: 'It will reappear on the active list.',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Restore It',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#4c3ff5',
                    reverseButtons: true
                }).then(function (result) {
                    if (!result.value) return;
                    var form = document.getElementById('dcActionForm');
                    form.action = DC_BASE + 'declaration/Declaration/restore/' + id;
                    form.submit();
                });
            }
        </script>
    </body>
</html>
