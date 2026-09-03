<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agreement Dashboard - Siaportal</title>
        <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23e23b3b' d='M6 2h7l7 7v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z'/%3E%3Cpath fill='%23ffffff' fill-opacity='0.85' d='M13 2v6a1 1 0 0 0 1 1h6z'/%3E%3Cpath fill='none' stroke='white' stroke-width='1.6' stroke-linecap='round' d='M6.5 16.5c1.2-1.6 2.2-1.6 3.2 0s2 1.6 3.2 0 2-1.6 3.2 0'/%3E%3C/svg%3E" />
        <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            .agreement-dashboard { font-family: 'Segoe UI', Arial, sans-serif; color: #1f2430; padding-top: 6px; }
            .agreement-dashboard * { box-sizing: border-box; }
            .agreement-dashboard a { text-decoration: none; }

            .ag-topbar-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 22px; flex-wrap: wrap; gap: 12px; }
            .ag-btn-create {
                display: inline-flex; align-items: center; gap: 8px;
                background: #e23b3b; color: #fff; font-weight: 700; font-size: 14px;
                padding: 12px 20px; border-radius: 10px; border: none; cursor: pointer;
                box-shadow: 0 6px 14px rgba(226,59,59,0.28);
            }
            .ag-btn-archived-toggle {
                display: inline-flex; align-items: center; gap: 7px; font-size: 13.5px; font-weight: 700;
                color: #6b7280; background: #fff; border: 1px solid #e6e8eb; border-radius: 10px; padding: 10px 16px;
                transition: background .15s ease, color .15s ease;
            }
            .ag-btn-archived-toggle:hover { background: #f8f9fb; color: #1f2430; }

            .ag-flash { padding: 12px 18px; border-radius: 10px; font-size: 13.5px; font-weight: 600; margin-bottom: 18px; }
            .ag-flash-success { background: #e8f8ee; color: #1e7e42; }
            .ag-flash-error { background: #fdecec; color: #c0392b; }
            .ag-archived-banner {
                background: #fff8e6; color: #8a6d1f; font-size: 13.5px; padding: 12px 18px; border-radius: 10px;
                margin-bottom: 18px; display: flex; align-items: center; gap: 8px; flex-wrap: wrap;
            }
            .ag-archived-banner a { color: #2f5fd6; font-weight: 700; margin-left: auto; }

            /* ── Stat cards ── */
            .ag-stats-row { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; margin-bottom: 22px; }
            .ag-stat-card {
                background: #fff; border-radius: 14px; padding: 20px 22px;
                border-left: 4px solid transparent; box-shadow: 0 2px 10px rgba(20,20,43,0.05);
                display: flex; align-items: flex-start; gap: 16px;
            }
            .ag-stat-icon { width: 46px; height: 46px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
            .ag-stat-icon svg { width: 22px; height: 22px; }
            .ag-stat-body .val { font-size: 28px; font-weight: 800; line-height: 1.1; }
            .ag-stat-body .lbl { font-size: 13.5px; color: #6b7280; margin-top: 2px; font-weight: 500; }
            .ag-stat-body .view-all { font-size: 13px; font-weight: 700; margin-top: 10px; display: inline-flex; align-items: center; gap: 5px; }

            .ag-stat-pending  { border-left-color: #f5a623; }
            .ag-stat-pending  .ag-stat-icon { background: #f5a623; }
            .ag-stat-pending  .val, .ag-stat-pending  .view-all { color: #f5a623; }

            .ag-stat-signed   { border-left-color: #2ecc71; }
            .ag-stat-signed   .ag-stat-icon { background: #2ecc71; }
            .ag-stat-signed   .val, .ag-stat-signed   .view-all { color: #2ecc71; }

            .ag-stat-declined { border-left-color: #e74c3c; }
            .ag-stat-declined .ag-stat-icon { background: #e74c3c; }
            .ag-stat-declined .val, .ag-stat-declined .view-all { color: #e74c3c; }

            .ag-stat-total    { border-left-color: #2f80ed; }
            .ag-stat-total    .ag-stat-icon { background: #2f80ed; }
            .ag-stat-total    .val, .ag-stat-total    .view-all { color: #2f80ed; }

            /* ── Filters (compact) ── */
            .ag-filters-row { display: flex; align-items: stretch; gap: 12px; margin-bottom: 20px; }
            .ag-filter-box {
                background: #fff; border: 1px solid #e6e8eb; border-radius: 9px; padding: 7px 14px; flex: 1;
                display: flex; flex-direction: column; gap: 2px; justify-content: center; min-width: 0;
            }
            /* Application Type / Status hold longer text (category — type labels, status
               words) than the other filter boxes, so they get more of the row's width. */
            .ag-filter-box-wide { flex: 1.7; }
            .ag-filter-box .f-label { font-size: 10.5px; color: #9aa0aa; font-weight: 600; }
            .ag-filter-box .f-value { font-size: 13px; font-weight: 700; color: #1f2430; display: flex; align-items: center; justify-content: space-between; gap: 8px; }
            .ag-filter-box .f-value svg { width: 14px; height: 14px; color: #9aa0aa; flex-shrink: 0; }
            .ag-btn-filters {
                background: #e23b3b; border: 1px solid #e23b3b; border-radius: 9px; padding: 0 22px;
                display: flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 700; color: #fff;
                cursor: pointer; white-space: nowrap; font-family: inherit; box-shadow: 0 4px 12px rgba(226,59,59,0.28);
            }
            .ag-btn-reset {
                background: #fff; border: 1.5px solid #e23b3b; border-radius: 9px; padding: 0 16px;
                display: flex; align-items: center; gap: 7px; font-size: 13px; font-weight: 700; color: #e23b3b;
                cursor: pointer; white-space: nowrap;
            }
            .ag-btn-reset-inactive { opacity: .55; }
            /* Real <select>/<input type=date>/<input type=text> controls styled to sit inside
               .ag-filter-box looking like the mockup's plain text value, instead of default
               browser chrome. */
            .ag-filter-box select, .ag-filter-box input[type="date"], .ag-filter-box input[type="text"] {
                border: none; background: transparent; padding: 0; margin: 0; font: inherit;
                font-size: 13px; font-weight: 700; color: #1f2430; width: 100%; appearance: none;
                -webkit-appearance: none; cursor: pointer;
            }
            .ag-filter-box input[type="text"] { cursor: text; }
            .ag-filter-box input[type="text"]::placeholder { color: #9aa0aa; font-weight: 600; }
            .ag-filter-box .f-value.f-daterange { gap: 6px; }
            .ag-filter-box .f-value.f-daterange input[type="date"] { flex: 1; min-width: 0; font-weight: 600; font-size: 11.5px; }
            .ag-filter-box .f-value.f-daterange span.sep { color: #9aa0aa; font-weight: 400; }

            /* select2 (Application Type / Status filters) restyled to sit inline inside
               .ag-filter-box looking like the plain text value it replaces — own arrow hidden
               since the box already has its own chevron icon after it. */
            .ag-filter-box .select2-container { flex: 1; min-width: 0; }
            .ag-filter-box .select2-container--default .select2-selection--single {
                border: none; background: transparent; height: auto; padding: 0; display: flex; align-items: center;
            }
            .ag-filter-box .select2-selection__rendered {
                padding: 0 !important; font-size: 13px !important; font-weight: 700; color: #1f2430 !important;
                line-height: normal !important; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
            }
            .ag-filter-box .select2-selection__arrow { display: none !important; }
            .ag-filter-box .select2-container--open .select2-selection--single { color: #e23b3b; }
            .select2-dropdown.ag-filter-dropdown { border-color: #e0e3e8; border-radius: 10px; overflow: hidden; box-shadow: 0 10px 26px rgba(20,20,43,0.12); }
            .ag-filter-dropdown .select2-search--dropdown .select2-search__field { border: 1.5px solid #e0e3e8; border-radius: 8px; padding: 6px 10px; }
            .ag-filter-dropdown .select2-results__option--highlighted[aria-selected] { background: #e23b3b !important; }

            /* ── Table ── */
            .ag-table-card { background: #fff; border-radius: 14px; overflow: hidden; box-shadow: 0 2px 10px rgba(20,20,43,0.05); }
            .ag-table-card table { width: 100%; border-collapse: collapse; margin: 0; }
            .ag-table-card thead th {
                background: #f8f9fb; text-align: left; font-size: 12.5px; font-weight: 700; color: #6b7280;
                padding: 14px 18px; border-bottom: 1px solid #eef0f2; white-space: nowrap;
            }
            .ag-table-card thead th .sort-arrows { display: inline-flex; flex-direction: column; margin-left: 4px; vertical-align: middle; color: #c8ccd2; }
            .ag-table-card tbody td { padding: 16px 18px; border-bottom: 1px solid #f1f2f4; font-size: 14px; color: #1f2430; white-space: nowrap; }
            .ag-table-card tbody tr:last-child td { border-bottom: none; }
            .ag-client-cell { white-space: normal; max-width: 220px; }
            .ag-client-id { font-weight: 700; color: #1f2430; white-space: normal; word-break: break-word; }
            .ag-client-sia { font-size: 12px; color: #9aa0aa; margin-top: 2px; }
            .ag-fee-cell, .ag-date-cell { white-space: normal; font-size: 12.5px; line-height: 1.6; }
            .ag-fee-cell .ag-fee-total { font-weight: 700; color: #1f2430; font-size: 13.5px; }

            /* CRM status (client_prospect.entery_status) at the time the dashboard is viewed —
               distinct from the agreement's own status badge — so staff can tell whether an
               agreement was sent to someone still a Prospect vs. an already-converted Client. */
            .ag-entry-badge { display: inline-block; padding: 2px 9px; border-radius: 20px; font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: .02em; margin-left: 6px; vertical-align: 1px; text-decoration: none; cursor: pointer; transition: filter .15s ease; }
            .ag-entry-badge:hover { filter: brightness(0.93); }
            .ag-entry-client   { background: #d4edda; color: #1e7e34; }
            .ag-entry-prospect { background: #fff3cd; color: #856404; }

            /* Same per-status color coding as the "Agreement: {status}" badge on
               Siaportal/view_client, so an agreement's status reads identically everywhere
               in the app instead of the dashboard's own bucketed Draft/Pending/Signed/Declined. */
            .ag-badge { display: inline-block; padding: 5px 14px; border-radius: 20px; font-size: 12.5px; font-weight: 700; }
            .ag-badge-draft     { background: #e2e3e5; color: #41464b; }
            .ag-badge-sent      { background: #fff3cd; color: #856404; }
            .ag-badge-viewed    { background: #cfe2ff; color: #084298; }
            .ag-badge-signed    { background: #d1e7dd; color: #0f5132; }
            .ag-badge-declined  { background: #f8d7da; color: #842029; }
            .ag-badge-cancelled { background: #f8d7da; color: #842029; }

            .ag-actions { display: flex; align-items: center; gap: 14px; color: #9aa0aa; }
            .ag-actions svg { width: 17px; height: 17px; cursor: pointer; }

            .ag-menu-panel {
                display: none; position: fixed; z-index: 9998; background: #fff; border-radius: 10px;
                box-shadow: 0 10px 28px rgba(20,20,43,0.16); border: 1px solid #eceef1; padding: 6px; min-width: 190px;
            }
            .ag-menu-panel a {
                display: block; padding: 9px 12px; border-radius: 7px; font-size: 13.5px; font-weight: 600;
                color: #1f2430; text-decoration: none; cursor: pointer;
            }
            .ag-menu-panel a:hover { background: #f8f9fb; }
            .ag-menu-panel a.ag-menu-disabled { color: #c2c6cc; cursor: not-allowed; pointer-events: none; }
            .ag-menu-panel a.ag-menu-danger { color: #c0392b; }
            .ag-menu-panel a.ag-menu-danger:hover { background: #fdecec; }

            /* ── Pagination ── */
            .ag-pagination-row { display: flex; align-items: center; justify-content: space-between; padding: 16px 18px; }
            .ag-pg-info { font-size: 13.5px; color: #6b7280; }
            .ag-pg-controls { display: flex; align-items: center; gap: 6px; }
            .ag-pg-btn {
                width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center;
                font-size: 13.5px; font-weight: 700; color: #6b7280; cursor: pointer; border: 1px solid transparent;
            }
            .ag-pg-btn.active { background: #e23b3b; color: #fff; }
            .ag-pg-btn.nav { color: #e23b3b; }
            .ag-pg-dots { color: #9aa0aa; padding: 0 4px; font-size: 13.5px; }
            .ag-pg-perpage { border: 1px solid #e6e8eb; border-radius: 8px; padding: 7px 14px; font-size: 13.5px; font-weight: 600; color: #1f2430; display: flex; align-items: center; gap: 8px; }

            /* ── Polish: hover/focus feedback, table overflow safety, empty state, toast, responsiveness ── */
            .ag-btn-create { transition: transform .15s ease, box-shadow .15s ease; }
            .ag-btn-create:hover { transform: translateY(-1px); box-shadow: 0 8px 18px rgba(226,59,59,0.36); }

            .ag-stat-card { transition: transform .15s ease, box-shadow .15s ease; }
            .ag-stat-card:hover { transform: translateY(-2px); box-shadow: 0 6px 18px rgba(20,20,43,0.09); }
            .ag-stat-body .view-all { transition: gap .15s ease; }
            .ag-stat-body .view-all:hover { gap: 8px; }

            .ag-filter-box { transition: border-color .15s ease, box-shadow .15s ease; }
            .ag-filter-box:focus-within { border-color: #c7cbd1; box-shadow: 0 0 0 3px rgba(226,59,59,0.08); }
            .ag-btn-filters { transition: background .15s ease, box-shadow .15s ease, transform .12s ease; }
            .ag-btn-filters:hover { background: #c92f2f; box-shadow: 0 6px 16px rgba(226,59,59,0.36); transform: translateY(-1px); }
            .ag-btn-reset { transition: background .15s ease, color .15s ease; }
            .ag-btn-reset:hover { background: #fdf1f1; }

            /* Wide/real data (long client or application-type names) scrolls within the card
               instead of forcing the whole admin layout to scroll horizontally. */
            .ag-table-scroll { overflow-x: auto; }
            .ag-table-card tbody tr { transition: background .1s ease; }
            .ag-table-card tbody tr:hover { background: #fafbfc; }
            .ag-actions a { color: inherit; display: inline-flex; }
            .ag-actions a { transition: color .15s ease; }
            .ag-actions a:hover { color: #e23b3b; }
            .ag-actions svg[data-disabled] { pointer-events: none; }

            .ag-pg-btn { transition: background .15s ease, color .15s ease; }
            .ag-pg-btn:not(.active):hover { background: #f8f9fb; color: #1f2430; }
            .ag-pg-perpage select:focus, .ag-filter-box select:focus, .ag-filter-box input:focus { outline: none; }

            .ag-empty-state { display: flex; flex-direction: column; align-items: center; gap: 10px; padding: 48px 18px; color: #9aa0aa; }
            .ag-empty-state svg { width: 34px; height: 34px; color: #d8dce1; }
            .ag-empty-state .t { font-size: 14px; font-weight: 600; color: #6b7280; }
            .ag-empty-state .s { font-size: 12.5px; }

            #ag-toast {
                display: none; position: fixed; bottom: 24px; right: 24px; color: #fff;
                padding: 12px 20px; border-radius: 8px; font-size: 13.5px; z-index: 9999;
                box-shadow: 0 6px 20px rgba(0,0,0,0.2); align-items: center; gap: 8px;
            }
            #ag-toast.ag-toast-success { background: #1e7e42; }
            #ag-toast.ag-toast-error { background: #c0392b; }
            #ag-toast.ag-toast-info { background: #1f2430; }

            @media (max-width: 1100px) {
                .ag-stats-row { grid-template-columns: repeat(2, 1fr); }
                .ag-filters-row { flex-wrap: wrap; }
                .ag-filter-box { flex: 1 1 45%; }
                .ag-btn-filters, .ag-btn-reset { flex: 1 1 100%; justify-content: center; }
            }
            @media (max-width: 620px) {
                .ag-stats-row { grid-template-columns: 1fr; }
                .ag-filter-box { flex: 1 1 100%; }
                .ag-pagination-row { flex-direction: column; align-items: flex-start; gap: 12px; }
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
                    <div class="container-fluid agreement-dashboard">

                        <?php $isArchived = !empty($filters['archived']); ?>

                        <?php if (!empty($flashMsg = session()->getFlashdata('message'))): ?>
                            <div class="ag-flash ag-flash-success"><?php echo esc($flashMsg); ?></div>
                        <?php endif; ?>
                        <?php if (!empty($flashErr = session()->getFlashdata('error'))): ?>
                            <div class="ag-flash ag-flash-error"><?php echo esc($flashErr); ?></div>
                        <?php endif; ?>

                        <?php if ($isArchived): ?>
                            <div class="ag-archived-banner">
                                &#128193; Viewing <strong><?php echo (int) $archivedCount; ?></strong> archived agreement<?php echo $archivedCount === 1 ? '' : 's'; ?> — hidden from the active dashboard, not deleted.
                                <a href="<?php echo base_url('agreement/Agreement/dashboard'); ?>">&larr; Back to active agreements</a>
                            </div>
                        <?php endif; ?>

                        <div class="ag-topbar-row">
                            <a class="ag-btn-archived-toggle" href="<?php echo base_url('agreement/Agreement/dashboard' . ($isArchived ? '' : '?archived=1')); ?>">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="4" rx="1"/><path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8M10 12h4"/></svg>
                                <?php echo $isArchived ? 'Active Agreements' : 'View Archived (' . (int) $archivedCount . ')'; ?>
                            </a>
                            <button class="ag-btn-create" id="ag-btn-create" onclick="caOpen()">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg>
                                Create New Agreement
                            </button>
                        </div>

                        <!-- ── Stat cards ── -->
                        <?php if (!$isArchived): ?>
                        <div class="ag-stats-row">
                            <div class="ag-stat-card ag-stat-pending">
                                <div class="ag-stat-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.85 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
                                </div>
                                <div class="ag-stat-body">
                                    <div class="val"><?php echo (int) $counts['pending']; ?></div>
                                    <div class="lbl">Pending Signature</div>
                                    <a class="view-all" href="<?php echo base_url('agreement/Agreement/dashboard?status=pending'); ?>">View all &rarr;</a>
                                </div>
                            </div>
                            <div class="ag-stat-card ag-stat-signed">
                                <div class="ag-stat-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"/></svg>
                                </div>
                                <div class="ag-stat-body">
                                    <div class="val"><?php echo (int) $counts['signed']; ?></div>
                                    <div class="lbl">Signed</div>
                                    <a class="view-all" href="<?php echo base_url('agreement/Agreement/dashboard?status=signed'); ?>">View all &rarr;</a>
                                </div>
                            </div>
                            <div class="ag-stat-card ag-stat-declined">
                                <div class="ag-stat-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
                                </div>
                                <div class="ag-stat-body">
                                    <div class="val"><?php echo (int) $counts['declined']; ?></div>
                                    <div class="lbl">Declined</div>
                                    <a class="view-all" href="<?php echo base_url('agreement/Agreement/dashboard?status=declined'); ?>">View all &rarr;</a>
                                </div>
                            </div>
                            <div class="ag-stat-card ag-stat-total">
                                <div class="ag-stat-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8Z"/><path d="M14 3v5h5"/><path d="M9 13h6M9 17h6"/></svg>
                                </div>
                                <div class="ag-stat-body">
                                    <div class="val"><?php echo (int) $counts['total']; ?></div>
                                    <div class="lbl">Total Agreements</div>
                                    <a class="view-all" href="<?php echo base_url('agreement/Agreement/dashboard'); ?>">View all &rarr;</a>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- ── Filters ── -->
                        <form id="agFilterForm" method="get" action="<?php echo base_url('agreement/Agreement/dashboard'); ?>">
                        <?php if ($isArchived): ?><input type="hidden" name="archived" value="1"><?php endif; ?>
                        <div class="ag-filters-row">
                            <div class="ag-filter-box">
                                <div class="f-label">Search</div>
                                <div class="f-value">
                                    <input type="text" name="q" value="<?php echo esc($filters['q'] ?? ''); ?>" placeholder="Name, phone, email, or SiaID...">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                                </div>
                            </div>
                            <div class="ag-filter-box">
                                <div class="f-label">Date Range</div>
                                <div class="f-value f-daterange">
                                    <input type="date" name="date_from" value="<?php echo esc($filters['date_from'] ?? ''); ?>" onchange="document.getElementById('agFilterForm').submit();">
                                    <span class="sep">&ndash;</span>
                                    <input type="date" name="date_to" value="<?php echo esc($filters['date_to'] ?? ''); ?>" onchange="document.getElementById('agFilterForm').submit();">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                                </div>
                            </div>
                            <div class="ag-filter-box ag-filter-box-wide">
                                <div class="f-label">Application Type</div>
                                <div class="f-value">
                                    <select name="type_id" id="agTypeFilter" onchange="document.getElementById('agFilterForm').submit();">
                                        <option value="">All Types</option>
                                        <?php foreach ($typeOptions as $t): ?>
                                            <option value="<?php echo (int) $t['tyid']; ?>" <?php echo ((int) ($filters['type_id'] ?? 0) === (int) $t['tyid']) ? 'selected' : ''; ?>><?php echo esc(($t['ct'] ?? '') . ' — ' . $t['type']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                                </div>
                            </div>
                            <div class="ag-filter-box ag-filter-box-wide">
                                <div class="f-label">Status</div>
                                <div class="f-value">
                                    <select name="status" id="agStatusFilter" onchange="document.getElementById('agFilterForm').submit();">
                                        <?php $statusOptions = ['' => 'All Status', 'pending' => 'Pending', 'sent' => 'Sent', 'viewed' => 'Viewed', 'signed' => 'Signed', 'declined' => 'Declined', 'cancelled' => 'Cancelled']; ?>
                                        <?php foreach ($statusOptions as $val => $label): ?>
                                            <option value="<?php echo esc($val); ?>" <?php echo ($filters['status_bucket'] ?? '') === $val ? 'selected' : ''; ?>><?php echo esc($label); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                                </div>
                            </div>
                            <button type="submit" class="ag-btn-filters">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16l-6 8v6l-4 2v-8Z"/></svg>
                                Filters
                            </button>
                            <?php $hasActiveFilters = !empty($filters['q']) || !empty($filters['date_from']) || !empty($filters['date_to']) || !empty($filters['type_id']) || !empty($filters['status_bucket']); ?>
                            <a class="ag-btn-reset<?php echo $hasActiveFilters ? '' : ' ag-btn-reset-inactive'; ?>" href="<?php echo base_url('agreement/Agreement/dashboard'); ?>" title="Clear all filters">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 3-6.7"/><path d="M3 4v5h5"/></svg>
                                Reset
                            </a>
                        </div>
                        </form>

                        <!-- ── Table ── -->
                        <div class="ag-table-card">
                            <div class="ag-table-scroll">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Client (SIA ID) <span class="sort-arrows">&#9650;&#9660;</span></th>
                                        <th>Application Type</th>
                                        <th>Fees</th>
                                        <th>Status</th>
                                        <th>Sent / Signed</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($rows)): ?>
                                        <tr><td colspan="6">
                                            <div class="ag-empty-state">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8Z"/><path d="M14 3v5h5"/><path d="M9 13h6M9 17h6"/></svg>
                                                <div class="t">No agreements found</div>
                                                <div class="s">Try widening your filters, or clear them to see everything.</div>
                                            </div>
                                        </td></tr>
                                    <?php endif; ?>
                                    <?php foreach ($rows as $row): ?>
                                        <?php
                                        // Shows the raw status (Draft/Sent/Viewed/Signed/Declined/Cancelled) with the
                                        // same color coding as the "Agreement: {status}" badge on Siaportal/view_client,
                                        // rather than the dashboard's own bucketed Pending/Signed/Declined.
                                        $badgeLabel = ucfirst($row['status']);
                                        $badgeClass = 'ag-badge-' . $row['status'];
                                        $typeCategory = esc($row['category_name'] ?? '');
                                        $typeName     = esc($row['type_name'] ?? '');
                                        $typeLabel = trim($typeCategory . '<br>— ' . $typeName, ' —') ?: '—';
                                        $canSend = in_array($row['status'], ['draft', 'sent', 'viewed'], true);
                                        // last_sent_at is only populated by sends made after this column existed —
                                        // for older agreements that are already viewed/signed/declined (so we know
                                        // for a fact they WERE sent), fall back to the first-viewed timestamp so
                                        // the column doesn't show a nonsensical "–" next to a Signed badge.
                                        $sentAt = $row['last_sent_at'] ?: ($row['status'] !== 'draft' ? ($row['viewed_at'] ?: $row['insert_on']) : null);
                                        $entryStatus = $row['prospect_entery_status'] ?? '';
                                        $entryBadgeClass = $entryStatus === 'prospect' ? 'ag-entry-prospect' : 'ag-entry-client';
                                        $entryBadgeLabel = $entryStatus === 'prospect' ? 'Prospect' : 'Client';
                                        $entryBadgeUrl = base_url($entryStatus === 'prospect' ? 'Siaportal/view_prospect' : 'Siaportal/view_client');
                                        ?>
                                        <tr>
                                            <td class="ag-client-cell"><div class="ag-client-id">#<?php echo (int) $row['id']; ?> &nbsp;<?php echo esc($row['client_name']); ?></div><div class="ag-client-sia">SiaID: <?php echo (int) $row['prospect_id']; ?><a href="<?php echo $entryBadgeUrl; ?>" class="ag-entry-badge <?php echo $entryBadgeClass; ?>"><?php echo esc($entryBadgeLabel); ?></a></div></td>
                                            <td><?php echo $typeLabel; ?></td>
                                            <td class="ag-fee-cell">
                                                <div>Service: $<?php echo number_format((float) $row['service_fee'] + (float) $row['gst_amount'], 2); ?></div>
                                                <div>Govt: $<?php echo number_format(\App\Libraries\Agreement\AgreementClauses::governmentFeeTotal($row), 2); ?></div>
                                                <div class="ag-fee-total">Total: $<?php echo number_format((float) $row['total_amount'], 2); ?></div>
                                            </td>
                                            <td><span class="ag-badge <?php echo $badgeClass; ?>"><?php echo esc($badgeLabel); ?></span></td>
                                            <td class="ag-date-cell">
                                                <div>Sent: <?php echo !empty($sentAt) ? esc(date('d M Y', strtotime($sentAt))) : '&ndash;'; ?></div>
                                                <div>Signed: <?php echo !empty($row['client_signed_at']) ? esc(date('d M Y', strtotime($row['client_signed_at']))) : '&ndash;'; ?></div>
                                            </td>
                                            <td>
                                                <div class="ag-actions">
                                                    <a href="<?php echo base_url('agreement/Agreement/detail/' . $row['id']); ?>" title="View">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                                    </a>
                                                    <?php if (!$isArchived): ?>
                                                        <?php if ($canSend): ?>
                                                        <a href="#" title="Send for eSign" onclick="agSend(<?php echo (int) $row['id']; ?>); return false;">
                                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 2 11 13"/><path d="M22 2 15 22l-4-9-9-4Z"/></svg>
                                                        </a>
                                                        <?php else: ?>
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="opacity:.3;cursor:default;"><title><?php echo $row['status'] === 'signed' ? 'Already signed — locked' : ($row['status'] === 'cancelled' ? 'Cancelled — create a new agreement instead' : 'Declined — create a new agreement instead'); ?></title><path d="M22 2 11 13"/><path d="M22 2 15 22l-4-9-9-4Z"/></svg>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <a href="#" class="ag-menu-trigger" title="More options"
                                                       data-id="<?php echo (int) $row['id']; ?>"
                                                       data-can-edit="<?php echo $canSend ? '1' : '0'; ?>"
                                                       data-can-cancel="<?php echo (!$isArchived && in_array($row['status'], ['sent', 'viewed', 'signed'], true)) ? '1' : '0'; ?>"
                                                       data-pdf="<?php echo !empty($row['pdf_path']) ? base_url($row['pdf_path']) : ''; ?>"
                                                       data-archived="<?php echo $isArchived ? '1' : '0'; ?>"
                                                       onclick="agOpenMenu(event, this); return false;">
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
                            // Builds a dashboard URL for page $p, preserving every other active filter/per_page.
                            $agPageUrl = function (int $p) use ($filters, $perPage) {
                                $qs = array_filter([
                                    'q'         => $filters['q'] ?? null,
                                    'date_from' => $filters['date_from'] ?? null,
                                    'date_to'   => $filters['date_to'] ?? null,
                                    'type_id'   => $filters['type_id'] ?? null,
                                    'status'    => $filters['status_bucket'] ?? null,
                                    'archived'  => $filters['archived'] ?? null,
                                    'per_page'  => $perPage !== 10 ? $perPage : null,
                                    'page'      => $p > 1 ? $p : null,
                                ], static fn ($v) => $v !== null && $v !== '');
                                return base_url('agreement/Agreement/dashboard') . (!empty($qs) ? '?' . http_build_query($qs) : '');
                            };
                            $rangeStart = $total > 0 ? (($page - 1) * $perPage) + 1 : 0;
                            $rangeEnd = min($total, $page * $perPage);
                            ?>
                            <div class="ag-pagination-row">
                                <div class="ag-pg-info">Showing <?php echo $rangeStart; ?> to <?php echo $rangeEnd; ?> of <?php echo (int) $total; ?> agreements</div>
                                <div class="ag-pg-controls">
                                    <a class="ag-pg-btn nav" href="<?php echo $agPageUrl(max(1, $page - 1)); ?>">&lsaquo;</a>
                                    <?php
                                    // Windowed page list (first, last, and up to 2 pages either side of current), with "…" gaps.
                                    $pagesToShow = [];
                                    for ($p = 1; $p <= $totalPages; $p++) {
                                        if ($p === 1 || $p === $totalPages || abs($p - $page) <= 2) {
                                            $pagesToShow[] = $p;
                                        }
                                    }
                                    $prevShown = 0;
                                    foreach ($pagesToShow as $p):
                                        if ($prevShown && $p - $prevShown > 1): ?>
                                            <div class="ag-pg-dots">...</div>
                                        <?php endif;
                                        $prevShown = $p; ?>
                                        <a class="ag-pg-btn<?php echo $p === $page ? ' active' : ''; ?>" href="<?php echo $agPageUrl($p); ?>"><?php echo $p; ?></a>
                                    <?php endforeach; ?>
                                    <a class="ag-pg-btn nav" href="<?php echo $agPageUrl(min($totalPages, $page + 1)); ?>">&rsaquo;</a>
                                </div>
                                <form method="get" action="<?php echo base_url('agreement/Agreement/dashboard'); ?>">
                                    <input type="hidden" name="q" value="<?php echo esc($filters['q'] ?? ''); ?>">
                                    <input type="hidden" name="date_from" value="<?php echo esc($filters['date_from'] ?? ''); ?>">
                                    <input type="hidden" name="date_to" value="<?php echo esc($filters['date_to'] ?? ''); ?>">
                                    <input type="hidden" name="type_id" value="<?php echo esc($filters['type_id'] ?? ''); ?>">
                                    <input type="hidden" name="status" value="<?php echo esc($filters['status_bucket'] ?? ''); ?>">
                                    <?php if ($isArchived): ?><input type="hidden" name="archived" value="1"><?php endif; ?>
                                    <label class="ag-pg-perpage" style="cursor:pointer;">
                                        <select name="per_page" onchange="this.form.submit();" style="border:none;background:transparent;font:inherit;font-weight:600;color:#1f2430;cursor:pointer;">
                                            <?php foreach ([10, 25, 50] as $pp): ?>
                                                <option value="<?php echo $pp; ?>" <?php echo $perPage === $pp ? 'selected' : ''; ?>><?php echo $pp; ?> / page</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </form>
                            </div>
                        </div>

                    </div>

                </main>
            </div>
        </div>
        <form id="agActionForm" method="post" style="display:none;"></form>
        <div id="ag-toast"></div>

        <!-- Single shared "More options" panel, repositioned/repopulated per row on open —
             kept at the body level (not nested in the scrolling table) so position:fixed
             placement is never clipped by .ag-table-card/.ag-table-scroll's overflow. -->
        <div id="agMenuPanel" class="ag-menu-panel">
            <a href="#" id="agMenuEditAgreement">Edit Agreement</a>
            <a href="#" id="agMenuEdit">Edit Clause Text</a>
            <a href="#" id="agMenuPdf" target="_blank">Download Signed PDF</a>
            <a href="#" id="agMenuCancel">&#128683; Cancel Agreement</a>
            <a href="#" id="agMenuArchive"></a>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <?php // Included down here, after jQuery/select2 have loaded — its own inline <script>
              // block calls $(...).select2() immediately, which throws silently ($ undefined)
              // and kills the whole modal's client-search if it's included any earlier in the DOM. ?>
        <?= view('agreement/_create_modal'); ?>
        <script src="<?php echo base_url();?>/public/assets_client/js/plugins/sweetalert2.js"></script>
        <script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>
        <script>
            var AG_BASE = '<?php echo base_url(); ?>/';

            // Application Type has 50+ options, so a searchable select2 is a real win there;
            // Status gets it too for a consistent look across both filter dropdowns. Reuses
            // the same select2 build already loaded above for the Create Agreement modal.
            $(function () {
                $('#agTypeFilter, #agStatusFilter').select2({
                    width: '100%',
                    minimumResultsForSearch: 0,
                    dropdownCssClass: 'ag-filter-dropdown'
                });
                // select2 replaces the visible control but the underlying <select> (and its
                // inline onchange="...submit()") still fires on selection — nothing else needed.
            });

            // type: 'success' | 'error' | 'info' — matches the toast styling already used on
            // the Create/Edit Agreement page, for a consistent feel across the module.
            function agToast(msg, type) {
                var t = document.getElementById('ag-toast');
                var icon = type === 'success' ? '✅ ' : (type === 'error' ? '⚠️ ' : 'ℹ️ ');
                t.textContent = icon + msg;
                t.className = type === 'success' ? 'ag-toast-success' : (type === 'error' ? 'ag-toast-error' : 'ag-toast-info');
                t.style.display = 'flex';
                setTimeout(function () { t.style.display = 'none'; }, 3000);
            }

            function agComingSoon(msg) {
                agToast(msg, 'info');
            }

            // Same POST-to-generate_link flow as the Create/Edit Agreement page's "Send for
            // eSign" button, triggered from a dashboard row instead.
            function agSend(id) {
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
                    var form = document.getElementById('agActionForm');
                    form.action = AG_BASE + 'agreement/Agreement/generate_link/' + id + '?notify=1';
                    form.submit();
                });
            }

            // Shared "More options" panel: repositioned/repopulated for whichever row's ⋮ was
            // clicked, instead of one dropdown per row — keeps it at the body level so it's
            // never clipped by the table's own scroll/overflow container.
            var agMenuPanel = document.getElementById('agMenuPanel');

            function agOpenMenu(e, trigger) {
                e.stopPropagation();
                var id = trigger.dataset.id;
                if (agMenuPanel.dataset.openFor === id && agMenuPanel.style.display !== 'none') {
                    agCloseMenu();
                    return;
                }

                var canEdit = trigger.dataset.canEdit === '1';
                var pdfUrl = trigger.dataset.pdf;
                var archived = trigger.dataset.archived === '1';

                var editAgreementLink = document.getElementById('agMenuEditAgreement');
                editAgreementLink.href = AG_BASE + 'agreement/Agreement/detail/' + id;
                editAgreementLink.classList.toggle('ag-menu-disabled', !canEdit);
                editAgreementLink.title = canEdit ? '' : 'Locked — this agreement is signed or declined.';

                var editLink = document.getElementById('agMenuEdit');
                editLink.href = AG_BASE + 'agreement/Agreement/edit_clauses/' + id;
                editLink.classList.toggle('ag-menu-disabled', !canEdit);
                editLink.title = canEdit ? '' : 'Locked — this agreement is signed or declined.';

                var pdfLink = document.getElementById('agMenuPdf');
                if (pdfUrl) {
                    pdfLink.href = pdfUrl;
                    pdfLink.classList.remove('ag-menu-disabled');
                    pdfLink.title = '';
                } else {
                    pdfLink.removeAttribute('href');
                    pdfLink.classList.add('ag-menu-disabled');
                    pdfLink.title = 'Available only after the agreement is signed.';
                }

                var canCancel = trigger.dataset.canCancel === '1';
                var cancelLink = document.getElementById('agMenuCancel');
                cancelLink.className = canCancel ? 'ag-menu-danger' : 'ag-menu-disabled';
                if (canCancel) {
                    cancelLink.title = '';
                    cancelLink.onclick = function () { agCloseMenu(); agCancel(id); return false; };
                } else {
                    cancelLink.title = 'Only a Sent, Viewed, or Signed agreement can be cancelled.';
                    cancelLink.onclick = function () { return false; };
                }

                var archiveLink = document.getElementById('agMenuArchive');
                archiveLink.className = archived ? '' : 'ag-menu-danger';
                archiveLink.textContent = archived ? '↩️ Restore' : '🗄️ Hide / Archive';
                archiveLink.onclick = function () {
                    agCloseMenu();
                    if (archived) { agRestore(id); } else { agArchive(id); }
                    return false;
                };

                var rect = trigger.getBoundingClientRect();
                agMenuPanel.style.top = (rect.bottom + 6) + 'px';
                agMenuPanel.style.right = (window.innerWidth - rect.right) + 'px';
                agMenuPanel.style.left = 'auto';
                agMenuPanel.style.display = 'block';
                agMenuPanel.dataset.openFor = id;
            }

            function agCloseMenu() {
                agMenuPanel.style.display = 'none';
                agMenuPanel.dataset.openFor = '';
            }

            document.addEventListener('click', function (e) {
                if (agMenuPanel.style.display !== 'none' && !agMenuPanel.contains(e.target) && !e.target.closest('.ag-menu-trigger')) {
                    agCloseMenu();
                }
            });
            window.addEventListener('scroll', agCloseMenu, true);
            window.addEventListener('resize', agCloseMenu);

            function agCancel(id) {
                Swal.fire({
                    title: 'Cancel this agreement?',
                    text: 'The client and team will be notified by email. Any signed PDF and history stay saved in the CRM — it just can no longer be edited or signed.',
                    icon: 'warning',
                    input: 'textarea',
                    inputPlaceholder: 'Optional: reason for cancelling',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Cancel It',
                    cancelButtonText: 'No, Keep It',
                    confirmButtonColor: '#e23b3b',
                    reverseButtons: true
                }).then(function (result) {
                    if (!result.value && result.value !== '') return;
                    var form = document.getElementById('agActionForm');
                    form.action = AG_BASE + 'agreement/Agreement/cancel/' + id;
                    form.innerHTML = '';
                    var reasonInput = document.createElement('input');
                    reasonInput.type = 'hidden';
                    reasonInput.name = 'reason';
                    reasonInput.value = result.value || '';
                    form.appendChild(reasonInput);
                    form.submit();
                });
            }

            function agArchive(id) {
                Swal.fire({
                    title: 'Archive this agreement?',
                    text: 'It\'s hidden from the active dashboard, not deleted — you can restore it anytime from "View Archived".',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Archive It',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#e23b3b',
                    reverseButtons: true
                }).then(function (result) {
                    if (!result.value) return;
                    var form = document.getElementById('agActionForm');
                    form.action = AG_BASE + 'agreement/Agreement/archive/' + id;
                    form.submit();
                });
            }

            function agRestore(id) {
                Swal.fire({
                    title: 'Restore this agreement?',
                    text: 'It will reappear on the active dashboard.',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Restore It',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#4c3ff5',
                    reverseButtons: true
                }).then(function (result) {
                    if (!result.value) return;
                    var form = document.getElementById('agActionForm');
                    form.action = AG_BASE + 'agreement/Agreement/restore/' + id;
                    form.submit();
                });
            }
        </script>
    </body>
</html>
