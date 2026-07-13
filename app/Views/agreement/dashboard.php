<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agreement Dashboard - Siaportal</title>
        <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            .agreement-dashboard { font-family: 'Segoe UI', Arial, sans-serif; color: #1f2430; padding-top: 6px; }
            .agreement-dashboard * { box-sizing: border-box; }
            .agreement-dashboard a { text-decoration: none; }

            .ag-topbar-row { display: flex; justify-content: flex-end; margin-bottom: 22px; }
            .ag-btn-create {
                display: inline-flex; align-items: center; gap: 8px;
                background: #e23b3b; color: #fff; font-weight: 700; font-size: 14px;
                padding: 12px 20px; border-radius: 10px; border: none; cursor: pointer;
                box-shadow: 0 6px 14px rgba(226,59,59,0.28);
            }

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

            /* ── Filters ── */
            .ag-filters-row { display: flex; align-items: stretch; gap: 14px; margin-bottom: 22px; }
            .ag-filter-box {
                background: #fff; border: 1px solid #e6e8eb; border-radius: 10px; padding: 10px 16px; flex: 1;
                display: flex; flex-direction: column; gap: 4px; justify-content: center;
            }
            .ag-filter-box .f-label { font-size: 12px; color: #9aa0aa; font-weight: 600; }
            .ag-filter-box .f-value { font-size: 14px; font-weight: 700; color: #1f2430; display: flex; align-items: center; justify-content: space-between; gap: 8px; }
            .ag-filter-box .f-value svg { width: 16px; height: 16px; color: #9aa0aa; flex-shrink: 0; }
            .ag-btn-filters {
                background: #fff; border: 1px solid #e6e8eb; border-radius: 10px; padding: 0 22px;
                display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 700; color: #1f2430;
                cursor: pointer; white-space: nowrap;
            }

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
            .ag-client-id { font-weight: 700; color: #1f2430; }
            .ag-client-sia { font-size: 12px; color: #9aa0aa; margin-top: 2px; }

            .ag-badge { display: inline-block; padding: 5px 14px; border-radius: 20px; font-size: 12.5px; font-weight: 700; }
            .ag-badge-pending  { background: #fef3e2; color: #f5a623; }
            .ag-badge-signed   { background: #e8f8ee; color: #27ae60; }
            .ag-badge-declined { background: #fdebea; color: #e74c3c; }

            .ag-actions { display: flex; align-items: center; gap: 14px; color: #9aa0aa; }
            .ag-actions svg { width: 17px; height: 17px; cursor: pointer; }

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

                        <div class="ag-topbar-row">
                            <button class="ag-btn-create" id="ag-btn-create" onclick="caOpen()">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg>
                                Create New Agreement
                            </button>
                        </div>

                        <!-- ── Stat cards ── -->
                        <div class="ag-stats-row">
                            <a class="ag-stat-card ag-stat-pending" href="#">
                                <div class="ag-stat-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.85 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
                                </div>
                                <div class="ag-stat-body">
                                    <div class="val">68</div>
                                    <div class="lbl">Pending Signature</div>
                                    <a class="view-all" href="#">View all &rarr;</a>
                                </div>
                            </a>
                            <a class="ag-stat-card ag-stat-signed" href="#">
                                <div class="ag-stat-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"/></svg>
                                </div>
                                <div class="ag-stat-body">
                                    <div class="val">25</div>
                                    <div class="lbl">Signed</div>
                                    <a class="view-all" href="#">View all &rarr;</a>
                                </div>
                            </a>
                            <a class="ag-stat-card ag-stat-declined" href="#">
                                <div class="ag-stat-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
                                </div>
                                <div class="ag-stat-body">
                                    <div class="val">6</div>
                                    <div class="lbl">Declined</div>
                                    <a class="view-all" href="#">View all &rarr;</a>
                                </div>
                            </a>
                            <a class="ag-stat-card ag-stat-total" href="#">
                                <div class="ag-stat-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8Z"/><path d="M14 3v5h5"/><path d="M9 13h6M9 17h6"/></svg>
                                </div>
                                <div class="ag-stat-body">
                                    <div class="val">156</div>
                                    <div class="lbl">Total Agreements</div>
                                    <a class="view-all" href="#">View all &rarr;</a>
                                </div>
                            </a>
                        </div>

                        <!-- ── Filters ── -->
                        <div class="ag-filters-row">
                            <div class="ag-filter-box">
                                <div class="f-label">Date Range</div>
                                <div class="f-value">01 May 2026 - 31 May 2026
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                                </div>
                            </div>
                            <div class="ag-filter-box">
                                <div class="f-label">Application Type</div>
                                <div class="f-value">All Types
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                                </div>
                            </div>
                            <div class="ag-filter-box">
                                <div class="f-label">Status</div>
                                <div class="f-value">All Status
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                                </div>
                            </div>
                            <div class="ag-filter-box">
                                <div class="f-label">Payment Status</div>
                                <div class="f-value">All
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                                </div>
                            </div>
                            <div class="ag-btn-filters">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16l-6 8v6l-4 2v-8Z"/></svg>
                                Filters
                            </div>
                        </div>

                        <!-- ── Table ── -->
                        <div class="ag-table-card">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Client (SIA ID) <span class="sort-arrows">&#9650;&#9660;</span></th>
                                        <th>Application Type</th>
                                        <th>Service Fee<br>(Incl. GST)</th>
                                        <th>Government Fee<br>(No GST)</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th>Sent Date</th>
                                        <th>Signed Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><div class="ag-client-id">27288 &nbsp;Munish Joshi</div><div class="ag-client-sia">SIA123456</div></td>
                                        <td>RCIP Based Work Permit</td>
                                        <td>$627.50</td>
                                        <td>$1,000.00</td>
                                        <td>$1,627.50</td>
                                        <td><span class="ag-badge ag-badge-pending">Pending</span></td>
                                        <td>12 May 2026</td>
                                        <td>&ndash;</td>
                                        <td>
                                            <div class="ag-actions">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 2 11 13"/><path d="M22 2 15 22l-4-9-9-4Z"/></svg>
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                                                <svg viewBox="0 0 24 24" fill="currentColor"><circle cx="5" cy="12" r="2"/><circle cx="12" cy="12" r="2"/><circle cx="19" cy="12" r="2"/></svg>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="ag-client-id">27287 &nbsp;Amanpreet Kaur</div><div class="ag-client-sia">SIA123457</div></td>
                                        <td>Visitor Visa</td>
                                        <td>$367.50</td>
                                        <td>$85.00</td>
                                        <td>$452.50</td>
                                        <td><span class="ag-badge ag-badge-pending">Pending</span></td>
                                        <td>18 May 2026</td>
                                        <td>&ndash;</td>
                                        <td>
                                            <div class="ag-actions">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 2 11 13"/><path d="M22 2 15 22l-4-9-9-4Z"/></svg>
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                                                <svg viewBox="0 0 24 24" fill="currentColor"><circle cx="5" cy="12" r="2"/><circle cx="12" cy="12" r="2"/><circle cx="19" cy="12" r="2"/></svg>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="ag-client-id">27286 &nbsp;Jaspreet Kaur</div><div class="ag-client-sia">SIA123458</div></td>
                                        <td>Study Permit</td>
                                        <td>$827.50</td>
                                        <td>$150.00</td>
                                        <td>$977.50</td>
                                        <td><span class="ag-badge ag-badge-pending">Pending</span></td>
                                        <td>20 May 2026</td>
                                        <td>&ndash;</td>
                                        <td>
                                            <div class="ag-actions">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 2 11 13"/><path d="M22 2 15 22l-4-9-9-4Z"/></svg>
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                                                <svg viewBox="0 0 24 24" fill="currentColor"><circle cx="5" cy="12" r="2"/><circle cx="12" cy="12" r="2"/><circle cx="19" cy="12" r="2"/></svg>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="ag-client-id">27285 &nbsp;Harpreet Singh</div><div class="ag-client-sia">SIA123459</div></td>
                                        <td>Spousal Sponsorship</td>
                                        <td>$1,127.50</td>
                                        <td>$550.00</td>
                                        <td>$1,677.50</td>
                                        <td><span class="ag-badge ag-badge-pending">Pending</span></td>
                                        <td>22 May 2026</td>
                                        <td>&ndash;</td>
                                        <td>
                                            <div class="ag-actions">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 2 11 13"/><path d="M22 2 15 22l-4-9-9-4Z"/></svg>
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                                                <svg viewBox="0 0 24 24" fill="currentColor"><circle cx="5" cy="12" r="2"/><circle cx="12" cy="12" r="2"/><circle cx="19" cy="12" r="2"/></svg>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="ag-client-id">27284 &nbsp;Gurpreet Kaur</div><div class="ag-client-sia">SIA123460</div></td>
                                        <td>PR &ndash; Express Entry</td>
                                        <td>$1,527.50</td>
                                        <td>$1,325.00</td>
                                        <td>$2,852.50</td>
                                        <td><span class="ag-badge ag-badge-signed">Signed</span></td>
                                        <td>10 May 2026</td>
                                        <td>13 May 2026</td>
                                        <td>
                                            <div class="ag-actions">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 2 11 13"/><path d="M22 2 15 22l-4-9-9-4Z"/></svg>
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                                                <svg viewBox="0 0 24 24" fill="currentColor"><circle cx="5" cy="12" r="2"/><circle cx="12" cy="12" r="2"/><circle cx="19" cy="12" r="2"/></svg>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="ag-client-id">27283 &nbsp;Simranjeet Singh</div><div class="ag-client-sia">SIA123461</div></td>
                                        <td>Work Permit</td>
                                        <td>$627.50</td>
                                        <td>$155.00</td>
                                        <td>$782.50</td>
                                        <td><span class="ag-badge ag-badge-declined">Declined</span></td>
                                        <td>08 May 2026</td>
                                        <td>&ndash;</td>
                                        <td>
                                            <div class="ag-actions">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 2 11 13"/><path d="M22 2 15 22l-4-9-9-4Z"/></svg>
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                                                <svg viewBox="0 0 24 24" fill="currentColor"><circle cx="5" cy="12" r="2"/><circle cx="12" cy="12" r="2"/><circle cx="19" cy="12" r="2"/></svg>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="ag-pagination-row">
                                <div class="ag-pg-info">Showing 1 to 6 of 68 agreements</div>
                                <div class="ag-pg-controls">
                                    <div class="ag-pg-btn nav">&lsaquo;</div>
                                    <div class="ag-pg-btn active">1</div>
                                    <div class="ag-pg-btn">2</div>
                                    <div class="ag-pg-btn">3</div>
                                    <div class="ag-pg-btn">4</div>
                                    <div class="ag-pg-dots">...</div>
                                    <div class="ag-pg-btn">12</div>
                                    <div class="ag-pg-btn nav">&rsaquo;</div>
                                </div>
                                <div class="ag-pg-perpage">10 / page
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                                </div>
                            </div>
                        </div>

                    </div>

                    <?= view('agreement/_create_modal'); ?>

                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>
    </body>
</html>
