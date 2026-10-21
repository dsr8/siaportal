<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Invitation Received - Siaportal</title>
        <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <style>
            .inv-dash { font-family: 'Segoe UI', Arial, sans-serif; color: #1f2430; padding-top: 10px; padding-bottom: 30px; }
            .inv-dash * { box-sizing: border-box; }
            .inv-dash a { text-decoration: none; }

            .inv-head { display: flex; justify-content: space-between; align-items: flex-start; gap: 12px; flex-wrap: wrap; margin-bottom: 14px; }
            .inv-head h1 { font-size: 26px; font-weight: 800; margin: 0; color: #111827; }
            .inv-head p { font-size: 14px; color: #6b7280; margin: 3px 0 0; }
            .inv-head-actions { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; }
            .inv-btn {
                display: inline-flex; align-items: center; gap: 8px; background: #fff; color: #1f2430;
                border: 1px solid #e3e6ea; border-radius: 9px; padding: 9px 15px; font-size: 13.5px; font-weight: 600;
                cursor: pointer; transition: background .15s ease, border-color .15s ease;
            }
            .inv-btn:hover { background: #f8f9fb; color: #1f2430; }
            .inv-btn[disabled] { opacity: .5; cursor: not-allowed; }
            .inv-btn-primary { background: #1f2430; border-color: #1f2430; color: #fff; }
            .inv-btn-primary:hover { background: #374151; color: #fff; }
            .inv-btn .badge-count { background: #F15B62; color: #fff; border-radius: 10px; padding: 1px 7px; font-size: 11.5px; }
            .inv-date-chip { display: inline-flex; align-items: center; gap: 8px; border: 1px solid #e3e6ea; border-radius: 9px; padding: 9px 15px; font-size: 13.5px; font-weight: 600; background: #fff; }

            .inv-flash { padding: 11px 16px; border-radius: 9px; font-size: 13.5px; font-weight: 600; margin-bottom: 14px; }
            .inv-flash-success { background: #eef8e6; color: #3f7a17; }
            .inv-flash-error { background: #fdecec; color: #c8323b; }
            .inv-hidden-banner { background: #fff7e0; color: #8a6400; font-size: 13.5px; padding: 11px 16px; border-radius: 9px; margin-bottom: 14px; display: flex; gap: 8px; align-items: center; flex-wrap: wrap; }
            .inv-hidden-banner a { margin-left: auto; font-weight: 700; color: #2563c9; }

            /* ── Three slim summary cards ── */
            .inv-cards { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin-bottom: 14px; }
            .inv-card { display: flex; align-items: center; gap: 14px; padding: 12px 18px; border-radius: 10px; border: 1px solid; transition: transform .15s ease, box-shadow .15s ease; }
            .inv-card:hover { transform: translateY(-1px); box-shadow: 0 4px 12px rgba(20,20,43,.07); }
            .inv-card.active { box-shadow: 0 0 0 2px currentColor inset; }
            .inv-card .ic { width: 44px; height: 44px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
            .inv-card .ic svg { width: 22px; height: 22px; }
            .inv-card .val { font-size: 23px; font-weight: 800; line-height: 1.1; }
            .inv-card .lbl { font-size: 14px; font-weight: 600; }
            .inv-card-received { background: #f1f8ea; border-color: #cfe6b8; color: #4d8a1f; }
            .inv-card-received .ic { background: #dcefc9; color: #79B63C; }
            .inv-card-pending { background: #fff8e6; border-color: #fbe2a6; color: #a8760a; }
            .inv-card-pending .ic { background: #fdebb9; color: #F5B51B; }
            .inv-card-overdue { background: #fdeeef; border-color: #f8c9cc; color: #d63c45; }
            .inv-card-overdue .ic { background: #fbd5d7; color: #F15B62; }

            /* ── Filters ── */
            .inv-filters { background: #fff; border: 1px solid #eceef1; border-radius: 10px; padding: 12px 14px; display: flex; gap: 14px; align-items: flex-end; flex-wrap: wrap; margin-bottom: 14px; }
            .inv-filters .f { display: flex; flex-direction: column; gap: 4px; }
            .inv-filters label { font-size: 12.5px; font-weight: 600; color: #374151; margin: 0; }
            .inv-filters select, .inv-filters input {
                height: 36px; border: 1px solid #dfe3e8; border-radius: 7px; padding: 0 10px; font-size: 13px; background: #fff; color: #1f2430;
            }
            .inv-filters select { min-width: 220px; }
            .inv-range { display: flex; align-items: center; gap: 6px; border: 1px solid #dfe3e8; border-radius: 7px; padding: 0 8px; height: 36px; }
            .inv-range input { border: none; height: 32px; padding: 0 4px; }
            .inv-range span { color: #9aa0aa; }
            .inv-search { margin-left: auto; position: relative; }
            .inv-search input { width: 220px; padding-left: 32px; }
            .inv-search svg { position: absolute; left: 10px; bottom: 10px; width: 15px; height: 15px; color: #9aa0aa; }
            .inv-clear { font-size: 12.5px; font-weight: 600; color: #6b7280; align-self: center; padding-top: 18px; }

            /* ── Table ── */
            .inv-table-card { background: #fff; border: 1px solid #eceef1; border-radius: 10px; overflow: hidden; }
            .inv-table-top { display: flex; justify-content: space-between; align-items: center; padding: 12px 14px; }
            .inv-table-top h2 { font-size: 17px; font-weight: 800; margin: 0; }
            .inv-table-top select { height: 34px; border: 1px solid #dfe3e8; border-radius: 7px; padding: 0 10px; font-size: 13px; }
            .inv-scroll { overflow-x: auto; }
            .inv-table { width: 100%; border-collapse: collapse; margin: 0; }
            /* Sized to fit all 11 columns without horizontal scroll on a 1366px screen at 100%
               zoom (sidebar open): headers may wrap to two lines, names/categories wrap. */
            .inv-table th { background: #f3f5f8; font-size: 12px; font-weight: 700; color: #1f2430; padding: 9px 6px; text-align: left; line-height: 1.3; border-bottom: 1px solid #e6e9ee; vertical-align: bottom; }
            .inv-table td { padding: 8px 6px; font-size: 12.5px; border-bottom: 1px solid #f0f2f5; vertical-align: middle; }
            .inv-table th:first-child, .inv-table td:first-child { padding-left: 12px; }
            .inv-table th:last-child, .inv-table td:last-child { padding-right: 12px; }
            .inv-table tbody tr:hover { background: #fafbfc; }
            .inv-table tbody tr.is-overdue { background: #fffafa; }
            .inv-table td.nowrap { white-space: nowrap; }
            .inv-client { min-width: 110px; }
            .inv-client .nm { font-weight: 700; color: #111827; }
            .inv-client .id { font-size: 11.5px; color: #6b7280; white-space: nowrap; }
            .inv-cat { min-width: 105px; }
            .inv-pill { display: inline-flex; align-items: center; gap: 5px; padding: 3px 8px; border-radius: 6px; font-size: 11px; font-weight: 600; white-space: nowrap; }
            .inv-pill .dot { width: 8px; height: 8px; border-radius: 50%; }
            .inv-pill-received { background: #e6f0fd; color: #2563c9; }
            .inv-pill-pending { background: #fff4d9; color: #a8760a; }
            .inv-pill-pending .dot { background: #F5B51B; }
            .inv-pill-overdue { background: #fde6e7; color: #d63c45; }
            .inv-pill-overdue .dot { background: #F15B62; }
            .inv-date-overdue { color: #d63c45; font-weight: 700; }

            .inv-ret { background: #f1f8ea; border: 1px solid #d6ebc3; border-radius: 7px; padding: 5px 8px; font-size: 11px; line-height: 1.5; min-width: 196px; }
            .inv-ret .row-l { display: flex; justify-content: space-between; gap: 8px; white-space: nowrap; }
            .inv-ret .row-l span:last-child { font-weight: 600; }
            .inv-ret .total { border-top: 1px dashed #c7e1af; margin-top: 2px; padding-top: 2px; font-weight: 800; font-size: 11.5px; }
            .inv-ret .st { margin-top: 3px; display: flex; align-items: center; gap: 6px; }
            .inv-ret-none { background: #f4f5f7; border-color: #e5e7eb; color: #6b7280; text-align: center; padding: 10px; }
            .inv-ag-badge { display: inline-block; padding: 1px 9px; border-radius: 5px; font-size: 11px; font-weight: 700; }
            .inv-ag-signed { background: #79B63C; color: #fff; }
            .inv-ag-pending { background: #F5B51B; color: #fff; }
            .inv-ag-closed { background: #F15B62; color: #fff; }

            .inv-actions { display: flex; align-items: center; gap: 10px; color: #374151; }
            .inv-actions a { color: inherit; display: inline-flex; }
            .inv-actions a:hover { color: #F15B62; }
            .inv-actions svg { width: 17px; height: 17px; }

            .inv-menu { display: none; position: fixed; z-index: 9998; background: #fff; border: 1px solid #eceef1; border-radius: 9px; box-shadow: 0 10px 26px rgba(20,20,43,.15); padding: 5px; min-width: 210px; }
            .inv-menu a { display: block; padding: 8px 11px; border-radius: 6px; font-size: 13px; font-weight: 600; color: #1f2430; }
            .inv-menu a:hover { background: #f5f6f8; }
            .inv-menu a.disabled { color: #c2c6cc; pointer-events: none; }
            .inv-menu a.danger { color: #d63c45; }

            .inv-empty { text-align: center; padding: 44px 10px; color: #6b7280; font-size: 14px; }

            .inv-pager { display: flex; justify-content: space-between; align-items: center; padding: 12px 14px; flex-wrap: wrap; gap: 10px; }
            .inv-pager .info { font-size: 13px; color: #6b7280; }
            .inv-pager .pages { display: flex; gap: 6px; }
            .inv-pager .pages a, .inv-pager .pages span { min-width: 32px; height: 32px; border: 1px solid #e3e6ea; border-radius: 7px; display: inline-flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 600; color: #374151; padding: 0 8px; }
            .inv-pager .pages a.active { background: #1f2430; border-color: #1f2430; color: #fff; }
            .inv-pager .pages span { border: none; }

            @media (max-width: 900px) {
                .inv-cards { grid-template-columns: 1fr; }
                .inv-search { margin-left: 0; }
                .inv-filters select, .inv-search input { min-width: 0; width: 100%; }
                .inv-filters .f { flex: 1 1 100%; }
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
                    <div class="container-fluid inv-dash">
                        <?php
                        $dashUrl = base_url('invitation/Invitation/dashboard');
                        // Builds a dashboard URL keeping every current filter, with $overrides applied.
                        $invUrl = function (array $overrides = []) use ($filters, $perPage, $dashUrl) {
                            $qs = array_merge([
                                'q'         => $filters['q'],
                                'team'      => $filters['team'],
                                'date_from' => $filters['date_from'],
                                'date_to'   => $filters['date_to'],
                                'inv'       => $filters['inv'],
                                'hidden'    => $filters['hidden'],
                                'per_page'  => $perPage !== 100 ? $perPage : null,
                            ], $overrides);
                            $qs = array_filter($qs, static fn ($v) => $v !== null && $v !== '');
                            return $dashUrl . ($qs ? '?' . http_build_query($qs) : '');
                        };
                        ?>

                        <div class="inv-head">
                            <div>
                                <h1><?php echo $isHidden ? 'Hidden Applications' : 'Invitation Received'; ?></h1>
                                <p><?php echo $isHidden ? 'Applications hidden from the Invitation Received dashboard and its emails. Restore them anytime.' : 'Track and manage all applications with invitation received.'; ?></p>
                            </div>
                            <div class="inv-head-actions">
                                <?php if ($isHidden): ?>
                                    <button type="button" class="inv-btn inv-btn-primary" id="invBulkBtn" disabled onclick="invBulk('restore')">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 3-6.7"/><path d="M3 4v5h5"/></svg>
                                        Restore Selected <span class="badge-count" id="invSelCount" style="display:none;"></span>
                                    </button>
                                <?php else: ?>
                                    <button type="button" class="inv-btn" id="invBulkBtn" disabled onclick="invBulk('archive')" title="Select applications in the table first">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19M1 1l22 22"/></svg>
                                        Archive / Hide <span class="badge-count" id="invSelCount" style="display:none;"></span>
                                    </button>
                                <?php endif; ?>
                                <a class="inv-btn" href="<?php echo $isHidden ? $dashUrl : $dashUrl . '?hidden=1'; ?>">
                                    <?php echo $isHidden ? '&larr; Back to Dashboard' : 'View Hidden (' . (int) $archivedCount . ')'; ?>
                                </a>
                                <span class="inv-date-chip">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                                    <?php echo esc(date('M j, Y', strtotime($today))); ?>
                                </span>
                            </div>
                        </div>

                        <?php if (!empty($flashMsg = session()->getFlashdata('message'))): ?>
                            <div class="inv-flash inv-flash-success"><?php echo esc($flashMsg); ?></div>
                        <?php endif; ?>
                        <?php if (!empty($flashErr = session()->getFlashdata('error'))): ?>
                            <div class="inv-flash inv-flash-error"><?php echo esc($flashErr); ?></div>
                        <?php endif; ?>

                        <?php if ($isHidden): ?>
                            <div class="inv-hidden-banner">
                                &#128065;&#65039; Hidden entries are excluded from dashboard counts, reminders and the daily summary. The client's records, status and agreements are unchanged.
                            </div>
                        <?php else: ?>
                        <div class="inv-cards">
                            <a class="inv-card inv-card-received<?php echo $filters['inv'] === null ? ' active' : ''; ?>" href="<?php echo $invUrl(['inv' => null]); ?>">
                                <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 6-10 7L2 6"/></svg></div>
                                <div><div class="val"><?php echo (int) $counts['total']; ?></div><div class="lbl">Invitation Received</div></div>
                            </a>
                            <a class="inv-card inv-card-pending<?php echo $filters['inv'] === 'pending' ? ' active' : ''; ?>" href="<?php echo $invUrl(['inv' => 'pending']); ?>">
                                <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></div>
                                <div><div class="val"><?php echo (int) $counts['pending']; ?></div><div class="lbl">Pending</div></div>
                            </a>
                            <a class="inv-card inv-card-overdue<?php echo $filters['inv'] === 'overdue' ? ' active' : ''; ?>" href="<?php echo $invUrl(['inv' => 'overdue']); ?>">
                                <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><path d="M12 9v4M12 17h.01"/></svg></div>
                                <div><div class="val"><?php echo (int) $counts['overdue']; ?></div><div class="lbl">Overdue</div></div>
                            </a>
                        </div>
                        <?php endif; ?>

                        <form id="invFilterForm" method="get" action="<?php echo $dashUrl; ?>" class="inv-filters">
                            <?php if ($isHidden): ?><input type="hidden" name="hidden" value="1"><?php endif; ?>
                            <?php if ($filters['inv']): ?><input type="hidden" name="inv" value="<?php echo esc($filters['inv']); ?>"><?php endif; ?>
                            <?php if ($perPage !== 100): ?><input type="hidden" name="per_page" value="<?php echo (int) $perPage; ?>"><?php endif; ?>
                            <div class="f">
                                <label for="invTeam">Team Member</label>
                                <select name="team" id="invTeam" onchange="this.form.submit();">
                                    <option value="">All</option>
                                    <?php foreach ($teamMembers as $tm): ?>
                                        <option value="<?php echo (int) $tm['id']; ?>" <?php echo (int) $filters['team'] === (int) $tm['id'] ? 'selected' : ''; ?>><?php echo esc($tm['name']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="f">
                                <label>Tentative Date Range</label>
                                <div class="inv-range">
                                    <input type="date" name="date_from" value="<?php echo esc($filters['date_from'] ?? ''); ?>" onchange="this.form.submit();" title="From">
                                    <span>&ndash;</span>
                                    <input type="date" name="date_to" value="<?php echo esc($filters['date_to'] ?? ''); ?>" onchange="this.form.submit();" title="To">
                                </div>
                            </div>
                            <?php if ($filters['q'] || $filters['team'] || $filters['date_from'] || $filters['date_to'] || $filters['inv']): ?>
                                <a class="inv-clear" href="<?php echo $dashUrl . ($isHidden ? '?hidden=1' : ''); ?>">Clear filters</a>
                            <?php endif; ?>
                            <div class="f inv-search">
                                <input type="text" name="q" value="<?php echo esc($filters['q'] ?? ''); ?>" placeholder="Search...">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                            </div>
                        </form>

                        <form id="invBulkForm" method="post" action="">
                        <div class="inv-table-card">
                            <div class="inv-table-top">
                                <h2>Applications (<?php echo (int) $total; ?>)</h2>
                                <select onchange="window.location = this.value;">
                                    <?php foreach ($perPageOptions as $pp): ?>
                                        <option value="<?php echo esc($invUrl(['per_page' => $pp !== 100 ? $pp : null]), 'attr'); ?>" <?php echo $perPage === $pp ? 'selected' : ''; ?>><?php echo $pp; ?> per page</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="inv-scroll">
                            <table class="inv-table">
                                <thead>
                                    <tr>
                                        <th style="width:30px;"><input type="checkbox" id="invSelAll" title="Select all on this page"></th>
                                        <th>#</th>
                                        <th>Client Name / ID</th>
                                        <th>Team Member</th>
                                        <th>Category / Type</th>
                                        <th>Client Status</th>
                                        <th>Invitation Status</th>
                                        <th>Tentative Date</th>
                                        <th>Final Date</th>
                                        <th>Retainer Agreement</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($rows)): ?>
                                        <tr><td colspan="11"><div class="inv-empty"><?php echo $isHidden ? 'No hidden applications.' : 'No Invitation Received applications match these filters.'; ?></div></td></tr>
                                    <?php endif; ?>
                                    <?php foreach ($rows as $i => $row):
                                        $isOverdue = $row['invitation_status'] === 'overdue';
                                        $ag = sia_inv_agreement_summary($row['agreement'] ?? null);
                                        $editUrl = base_url('Siaportal/edit_client_application/' . (int) $row['category'] . '/' . (int) $row['id'] . '/' . (int) $row['siaportalid'] . '/' . (int) $row['type']);
                                    ?>
                                        <tr class="<?php echo $isOverdue ? 'is-overdue' : ''; ?>">
                                            <td><input type="checkbox" class="inv-sel" name="ids[]" value="<?php echo (int) $row['id']; ?>"></td>
                                            <td><?php echo (($page - 1) * $perPage) + $i + 1; ?></td>
                                            <td class="inv-client">
                                                <div class="nm"><?php echo esc($row['client_name'] ?: '—'); ?></div>
                                                <div class="id">(SiaID <?php echo (int) $row['siaportalid']; ?>)</div>
                                            </td>
                                            <td><?php echo esc($row['team_member_name'] ?: '—'); ?></td>
                                            <td class="inv-cat"><?php echo esc(sia_inv_category_type($row)); ?></td>
                                            <td><span class="inv-pill inv-pill-received">Invitation Received</span></td>
                                            <td>
                                                <?php if ($isOverdue): ?>
                                                    <span class="inv-pill inv-pill-overdue"><span class="dot"></span>Overdue</span>
                                                <?php else: ?>
                                                    <span class="inv-pill inv-pill-pending"><span class="dot"></span>Pending</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="nowrap <?php echo $isOverdue ? 'inv-date-overdue' : ''; ?>"><?php echo esc(sia_inv_date($row['invitation_date_tantative'])); ?></td>
                                            <td class="nowrap"><?php echo esc(sia_inv_date($row['invitation_date_final'])); ?></td>
                                            <td>
                                                <?php if ($ag === null): ?>
                                                    <div class="inv-ret inv-ret-none">No agreement yet</div>
                                                <?php else: ?>
                                                    <div class="inv-ret">
                                                        <div class="row-l"><span>Service Fee (CAD)</span><span><?php echo sia_inv_money($ag['service_fee']); ?></span></div>
                                                        <div class="row-l"><span>GST (<?php echo esc($ag['gst_rate']); ?>%)</span><span><?php echo sia_inv_money($ag['gst_amount']); ?></span></div>
                                                        <div class="row-l"><span>Government Fee (CAD)</span><span><?php echo sia_inv_money($ag['government_fee']); ?></span></div>
                                                        <div class="row-l total"><span>Total Payable (CAD)</span><span><?php echo sia_inv_money($ag['total']); ?></span></div>
                                                        <div class="st">Status: <span class="inv-ag-badge inv-ag-<?php echo esc($ag['status_key']); ?>"><?php echo esc($ag['status_label']); ?></span></div>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="inv-actions">
                                                    <a href="<?php echo $editUrl; ?>" target="_blank" title="Edit Application">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                                                    </a>
                                                    <a href="#" class="inv-menu-trigger" title="More options"
                                                       data-id="<?php echo (int) $row['id']; ?>"
                                                       onclick="invOpenMenu(event, this); return false;">
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
                            $from = $total > 0 ? (($page - 1) * $perPage) + 1 : 0;
                            $to   = min($total, $page * $perPage);
                            ?>
                            <div class="inv-pager">
                                <div class="info">Showing <?php echo $from; ?> to <?php echo $to; ?> of <?php echo (int) $total; ?> entries</div>
                                <?php if ($totalPages > 1): ?>
                                <div class="pages">
                                    <a href="<?php echo $invUrl(['page' => max(1, $page - 1)]); ?>">&lsaquo;</a>
                                    <?php $prev = 0; for ($p = 1; $p <= $totalPages; $p++):
                                        if ($p !== 1 && $p !== $totalPages && abs($p - $page) > 2) { continue; }
                                        if ($prev && $p - $prev > 1): ?><span>&hellip;</span><?php endif; $prev = $p; ?>
                                        <a class="<?php echo $p === $page ? 'active' : ''; ?>" href="<?php echo $invUrl(['page' => $p > 1 ? $p : null]); ?>"><?php echo $p; ?></a>
                                    <?php endfor; ?>
                                    <a href="<?php echo $invUrl(['page' => min($totalPages, $page + 1)]); ?>">&rsaquo;</a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        </form>

                    </div>
                </main>
            </div>
        </div>

        <!-- Shared "More options" panel, kept at body level so the table's scroll box never clips it. -->
        <div id="invMenu" class="inv-menu">
            <a href="#" id="invMenuEdit" target="_blank">&#9998;&#65039; Edit Application</a>
            <a href="#" id="invMenuToggle" class="danger"></a>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/public/assets_client/js/plugins/sweetalert2.js"></script>
        <script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>
        <script>
            var INV_BASE = '<?php echo base_url(); ?>/';
            var INV_HIDDEN = <?php echo $isHidden ? 'true' : 'false'; ?>;

            // ── Selection + bulk Archive/Hide (or Restore in the hidden list) ──
            var selAll = document.getElementById('invSelAll');
            var bulkBtn = document.getElementById('invBulkBtn');
            var selCount = document.getElementById('invSelCount');

            function invSelected() {
                return Array.prototype.slice.call(document.querySelectorAll('.inv-sel:checked'));
            }
            function invRefreshSel() {
                var n = invSelected().length;
                bulkBtn.disabled = n === 0;
                selCount.style.display = n ? 'inline-block' : 'none';
                selCount.textContent = n;
                var all = document.querySelectorAll('.inv-sel');
                selAll.checked = all.length > 0 && n === all.length;
            }
            selAll.addEventListener('change', function () {
                document.querySelectorAll('.inv-sel').forEach(function (cb) { cb.checked = selAll.checked; });
                invRefreshSel();
            });
            document.querySelectorAll('.inv-sel').forEach(function (cb) { cb.addEventListener('change', invRefreshSel); });

            // SweetAlert2 here is the old v7 build — the confirm result is result.value, not result.isConfirmed.
            function invBulk(action, singleId) {
                var ids = singleId ? [singleId] : invSelected().map(function (cb) { return cb.value; });
                if (!ids.length) return;
                var restore = action === 'restore';
                Swal.fire({
                    title: restore ? 'Restore ' + ids.length + ' application(s)?' : 'Hide ' + ids.length + ' application(s)?',
                    text: restore
                        ? 'They will reappear on the Invitation Received dashboard, and its reminders/summary will include them again.'
                        : 'They disappear from this dashboard only, and their Invitation Received reminders and summary emails stop. Client records, status and agreements are not changed.',
                    type: restore ? 'question' : 'warning',
                    showCancelButton: true,
                    confirmButtonText: restore ? 'Yes, Restore' : 'Yes, Hide',
                    confirmButtonColor: restore ? '#1f2430' : '#F15B62',
                    reverseButtons: true
                }).then(function (result) {
                    if (!result.value) return;
                    var form = document.getElementById('invBulkForm');
                    if (singleId) {
                        // Menu action on one row: submit only that id, regardless of checkboxes.
                        document.querySelectorAll('.inv-sel').forEach(function (cb) { cb.checked = cb.value === String(singleId); });
                    }
                    form.action = INV_BASE + 'invitation/Invitation/' + action;
                    form.submit();
                });
            }

            // ── Row "More options" menu ──
            var invMenu = document.getElementById('invMenu');
            function invOpenMenu(e, trigger) {
                e.stopPropagation();
                var id = trigger.dataset.id;
                if (invMenu.dataset.openFor === id && invMenu.style.display === 'block') { invCloseMenu(); return; }

                var row = trigger.closest('tr');
                document.getElementById('invMenuEdit').href = row.querySelector('.inv-actions a').href;

                var toggle = document.getElementById('invMenuToggle');
                toggle.textContent = INV_HIDDEN ? '↩️ Restore to Dashboard' : '🙈 Archive / Hide';
                toggle.onclick = function () { invCloseMenu(); invBulk(INV_HIDDEN ? 'restore' : 'archive', id); return false; };

                var rect = trigger.getBoundingClientRect();
                invMenu.style.top = (rect.bottom + 6) + 'px';
                invMenu.style.right = (window.innerWidth - rect.right) + 'px';
                invMenu.style.display = 'block';
                invMenu.dataset.openFor = id;
            }
            function invCloseMenu() { invMenu.style.display = 'none'; invMenu.dataset.openFor = ''; }
            document.addEventListener('click', function (e) {
                if (invMenu.style.display === 'block' && !invMenu.contains(e.target)) invCloseMenu();
            });
            window.addEventListener('scroll', invCloseMenu, true);
            window.addEventListener('resize', invCloseMenu);
        </script>
    </body>
</html>
