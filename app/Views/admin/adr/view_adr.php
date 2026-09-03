<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>View ADR — Siaportal</title>
    <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        * { box-sizing: border-box; }
        .adr-wrap { max-width: 1300px; margin: 30px auto; padding: 0 16px 60px; }
        .adr-head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 22px; flex-wrap: wrap; gap: 10px; }
        .adr-head h1 { font-size: 22px; font-weight: 700; color: #1f2430; margin: 0; }
        .adr-add-btn {
            display: inline-flex; align-items: center; gap: 8px;
            background: linear-gradient(135deg, #4CAF50, #2E7D32);
            color: #fff; border: none; padding: 10px 18px;
            border-radius: 10px; font-size: 13.5px; font-weight: 700;
            text-decoration: none; box-shadow: 0 4px 14px rgba(76,175,80,0.3);
            transition: opacity 0.2s;
        }
        .adr-add-btn:hover { opacity: 0.92; color: #fff; text-decoration: none; }

        /* Summary stat cards */
        .adr-stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 22px; }
        .adr-stat-card {
            background: #fff; border-radius: 14px; padding: 18px 20px;
            box-shadow: 0 2px 10px rgba(20,20,43,0.06);
            border-left: 4px solid #e2e3e5; display: flex; flex-direction: column; gap: 4px;
        }
        .adr-stat-card .n { font-size: 26px; font-weight: 800; color: #1f2430; line-height: 1; }
        .adr-stat-card .l { font-size: 12px; font-weight: 700; color: #9aa0aa; text-transform: uppercase; letter-spacing: 0.4px; }
        .adr-stat-total    { border-left-color: #3498db; }
        .adr-stat-pending  { border-left-color: #f5a623; }
        .adr-stat-complete { border-left-color: #2ecc71; }

        /* Search / filter bar */
        .adr-filter-bar {
            display: flex; gap: 12px; flex-wrap: wrap; align-items: flex-end;
            background: #fff; border-radius: 14px; padding: 16px 18px; margin-bottom: 18px;
            box-shadow: 0 2px 10px rgba(20,20,43,0.06);
        }
        .adr-filter-field { flex: 1 1 220px; min-width: 180px; }
        .adr-filter-field label {
            display: block; font-size: 11px; font-weight: 700; color: #6b7280;
            text-transform: uppercase; letter-spacing: 0.4px; margin-bottom: 6px;
        }
        .adr-filter-field input, .adr-filter-field select {
            width: 100%; padding: 9px 12px; border: 2px solid #e8ecf0; border-radius: 8px;
            font-size: 13px; color: #333; background: #fafbfc; outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .adr-filter-field input:focus, .adr-filter-field select:focus {
            border-color: #4CAF50; box-shadow: 0 0 0 3px rgba(76,175,80,0.12); background: #fff;
        }
        .adr-filter-btns { display: flex; gap: 8px; }
        .adr-btn-search {
            background: linear-gradient(135deg, #4CAF50, #2E7D32); color: #fff; border: none;
            padding: 10px 20px; border-radius: 8px; font-size: 13px; font-weight: 700; cursor: pointer;
        }
        .adr-btn-search:hover { opacity: 0.92; }
        .adr-btn-reset {
            display: inline-flex; align-items: center; padding: 10px 16px; border-radius: 8px;
            font-size: 13px; font-weight: 700; color: #6b7280; background: #f1f2f4;
            border: none; text-decoration: none;
        }
        .adr-btn-reset:hover { background: #e6e7ea; color: #6b7280; text-decoration: none; }

        .adr-table-card { background: #fff; border-radius: 14px; box-shadow: 0 2px 10px rgba(20,20,43,0.06); overflow: hidden; }
        .adr-table-scroll { overflow-x: auto; }
        table.adr-table { width: 100%; border-collapse: collapse; margin: 0; }
        .adr-table thead th {
            background: #f8f9fb; text-align: left; font-size: 12px; font-weight: 700; color: #6b7280;
            text-transform: uppercase; letter-spacing: 0.4px;
            padding: 16px 18px; border-bottom: 1px solid #eef0f2; white-space: nowrap;
        }
        .adr-table tbody td { padding: 18px; border-bottom: 1px solid #f1f2f4; font-size: 13.5px; color: #1f2430; vertical-align: middle; }
        .adr-table tbody tr:last-child td { border-bottom: none; }
        .adr-table tbody tr:hover { background: #f8faf8; }

        .adr-client-name { font-weight: 700; color: #1f2430; }
        .adr-sia-id { font-size: 11.5px; color: #9aa0aa; margin-top: 3px; }
        .adr-notes { max-width: 220px; white-space: normal; color: #555; line-height: 1.5; }
        .adr-team { color: #555; }

        .adr-doc-link {
            display: inline-flex; align-items: center; gap: 5px;
            color: #2E7D32; border: 1px solid #bfe3c2; background: #eef8ef;
            border-radius: 6px; padding: 5px 11px; font-size: 12px; font-weight: 600;
            text-decoration: none; white-space: nowrap;
        }
        .adr-doc-link:hover { background: #e2f3e3; color: #2E7D32; text-decoration: none; }
        .adr-doc-none { color: #c3c6cc; }

        .adr-badge {
            display: inline-block; padding: 4px 12px; border-radius: 20px;
            font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.3px;
            white-space: nowrap;
        }
        .adr-badge-complete { background: #d4edda; color: #1e7e34; }
        .adr-badge-pending  { background: #fdf6e3; color: #b7791f; }

        .adr-actions { display: flex; flex-wrap: wrap; gap: 8px; }
        .adr-actions a {
            display: inline-flex; align-items: center; gap: 6px;
            font-size: 12px; font-weight: 600; text-decoration: none;
            padding: 6px 12px; border-radius: 6px; white-space: nowrap;
        }
        .adr-act-edit { color: #1a73e8; border: 1px solid #cfe2ff; background: #eaf2fe; }
        .adr-act-edit:hover { background: #dcebfd; color: #1a73e8; text-decoration: none; }
        .adr-act-complete { color: #2E7D32; border: 1px solid #bfe3c2; background: #eef8ef; }
        .adr-act-complete:hover { background: #e2f3e3; color: #2E7D32; text-decoration: none; }

        .adr-empty-state { text-align: center; padding: 50px 20px; color: #9aa0aa; }
        .adr-empty-state svg { width: 40px; height: 40px; margin-bottom: 10px; opacity: 0.6; }
        .adr-empty-state .t { font-size: 14px; font-weight: 700; color: #6b7280; }

        /* ── Mobile: stacked cards instead of a sideways-scrolling table ── */
        @media (max-width: 860px) {
            .adr-stats { grid-template-columns: 1fr; }
            .adr-table thead { display: none; }
            .adr-table, .adr-table tbody, .adr-table tr { display: block; width: 100%; }
            .adr-table-scroll { overflow-x: visible; }
            .adr-table tr {
                margin-bottom: 14px; border: 1px solid #eef0f2; border-radius: 12px;
                box-shadow: 0 2px 8px rgba(20,20,43,0.05); overflow: hidden;
            }
            .adr-table td {
                display: block; width: 100%; box-sizing: border-box;
                border-bottom: 1px solid #f4f5f7 !important; padding: 10px 16px !important;
            }
            .adr-table tr td:last-child { border-bottom: none !important; }
            .adr-table td[data-label]::before {
                content: attr(data-label);
                display: block; font-size: 10.5px; font-weight: 800; color: #2E7D32;
                text-transform: uppercase; letter-spacing: 0.4px; margin-bottom: 4px;
            }
            .adr-notes { max-width: none; }
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
                <div class="adr-wrap">

                    <div class="adr-head">
                        <h1>ADR Records</h1>
                        <a href="<?php echo base_url('Siaportal/add_adr'); ?>" class="adr-add-btn">
                            <i class="fas fa-plus"></i> Add ADR
                        </a>
                    </div>

                    <?php
                        $adrTotal = count($adr);
                        $adrCompleteCount = count(array_filter($adr, fn($r) => $r['status'] != '0'));
                        $adrPendingCount = $adrTotal - $adrCompleteCount;
                    ?>
                    <div class="adr-stats">
                        <div class="adr-stat-card adr-stat-total">
                            <div class="n"><?php echo $adrTotal; ?></div>
                            <div class="l">Total Records</div>
                        </div>
                        <div class="adr-stat-card adr-stat-pending">
                            <div class="n"><?php echo $adrPendingCount; ?></div>
                            <div class="l">Not Complete</div>
                        </div>
                        <div class="adr-stat-card adr-stat-complete">
                            <div class="n"><?php echo $adrCompleteCount; ?></div>
                            <div class="l">Complete</div>
                        </div>
                    </div>

                    <form method="get" action="<?php echo base_url('Siaportal/view_adr'); ?>" class="adr-filter-bar">
                        <div class="adr-filter-field">
                            <label>Search</label>
                            <input type="text" name="q" value="<?php echo htmlspecialchars($filters['q'] ?? ''); ?>" placeholder="Client name, SIA ID, Application #">
                        </div>
                        <div class="adr-filter-field" style="flex:0 1 180px;">
                            <label>Status</label>
                            <select name="status">
                                <option value="">All Status</option>
                                <option value="0" <?php echo (($filters['status'] ?? '') === '0') ? 'selected' : ''; ?>>Not Complete</option>
                                <option value="1" <?php echo (($filters['status'] ?? '') === '1') ? 'selected' : ''; ?>>Complete</option>
                            </select>
                        </div>
                        <div class="adr-filter-btns">
                            <button type="submit" class="adr-btn-search"><i class="fas fa-search"></i> Search</button>
                            <a href="<?php echo base_url('Siaportal/view_adr'); ?>" class="adr-btn-reset">Reset</a>
                        </div>
                    </form>

                    <div class="adr-table-card">
                        <div class="adr-table-scroll">
                        <table class="adr-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client</th>
                                    <th>Team Member / Notes</th>
                                    <th>Start / End Date</th>
                                    <th>Application # / Document / Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($adr)): ?>
                                <tr><td colspan="6">
                                    <div class="adr-empty-state">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8Z"/><path d="M14 3v5h5"/><path d="M9 13h6M9 17h6"/></svg>
                                        <div class="t">No ADR records found</div>
                                    </div>
                                </td></tr>
                                <?php endif; ?>
                                <?php foreach ($adr as $nf): ?>
                                <tr>
                                    <td data-label="#"><?php echo (int) $nf['id']; ?></td>
                                    <td data-label="Client">
                                        <div class="adr-client-name"><?php echo htmlspecialchars($nf['client_name']); ?></div>
                                        <div class="adr-sia-id">SiaID: <?php echo htmlspecialchars($nf['sia_id']); ?></div>
                                    </td>
                                    <td class="adr-notes" data-label="Team Member / Notes">
                                        <div class="adr-team"><b><?php echo htmlspecialchars($nf['team_member_name'] ?? '') ?: '&ndash;'; ?></b></div>
                                        <div style="margin-top:4px;"><?php echo htmlspecialchars($nf['notes']); ?></div>
                                    </td>
                                    <td data-label="Start / End Date">
                                        <div>Start: <?php echo htmlspecialchars($nf['adr_start_date']); ?></div>
                                        <div>End: <?php echo htmlspecialchars($nf['adr_end_date']); ?></div>
                                    </td>
                                    <td data-label="Application # / Document / Status">
                                        <div>App #: <?php echo htmlspecialchars($nf['app_number']); ?></div>
                                        <div style="margin-top:6px;">
                                            <?php if (empty($nf['link'])): ?>
                                                <span class="adr-doc-none">No Document</span>
                                            <?php else: ?>
                                                <a class="adr-doc-link" target="_blank" href="<?php echo htmlspecialchars($nf['link']); ?>">
                                                    <i class="fas fa-file-alt"></i> View Document
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                        <div style="margin-top:6px;">
                                            <?php if ($nf['status'] == '0'): ?>
                                                <span class="adr-badge adr-badge-pending">Not Complete</span>
                                            <?php else: ?>
                                                <span class="adr-badge adr-badge-complete">Complete</span>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td data-label="Actions">
                                        <div class="adr-actions">
                                            <a class="adr-act-edit" href="<?php echo base_url('Siaportal/edit_adr/' . $nf['id']); ?>"><i class="fas fa-pen"></i> Edit</a>
                                            <?php if ($nf['status'] == '0'): ?>
                                            <a class="adr-act-complete" href="<?php echo base_url('Siaportal/del_adr/' . $nf['id']); ?>"><i class="fas fa-check"></i> Mark Completed</a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        </div>
                    </div>

                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted"></div>
                        <div>
                            <a href="#"></a>
                            <a href="#"></a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>
</body>
</html>
