<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Application Finder — Siaportal</title>
    <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        * { box-sizing: border-box; }
        .af-wrap { max-width: 1400px; margin: 30px auto; padding: 0 16px 60px; }

        /* Page banner */
        .af-banner {
            background: #fff; border: 1px solid #e8ecf0;
            border-radius: 16px; padding: 22px 26px; color: #1f2430;
            display: flex; align-items: center; gap: 14px;
            margin-bottom: 20px; box-shadow: 0 2px 10px rgba(20,20,43,0.06);
        }
        .af-banner-icon {
            width: 48px; height: 48px; border-radius: 50%;
            background: #eef8ef; color: #2E7D32;
            display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0;
        }
        .af-banner h1 { font-size: 19px; font-weight: 700; margin: 0; color: #1f2430; }
        .af-banner p { font-size: 12.5px; color: #6b7280; margin: 2px 0 0; }

        .af-table-card { background: #fff; border-radius: 14px; box-shadow: 0 2px 10px rgba(20,20,43,0.06); padding: 20px; overflow: hidden; }

        /* Toolbar: length + search, restyled into one clean bar */
        .af-toolbar { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; margin-bottom: 16px; padding-bottom: 16px; border-bottom: 1px solid #f1f2f4; }
        .af-toolbar-left .dataTables_length label { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #6b7280; font-weight: 600; margin: 0; }
        .af-toolbar-right .dataTables_filter label { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #6b7280; font-weight: 600; margin: 0; }
        .dataTables_wrapper .dataTables_filter input,
        .dataTables_wrapper .dataTables_length select {
            border: 2px solid #e8ecf0; border-radius: 8px; padding: 8px 12px;
            font-size: 13px; color: #333; background: #fafbfc; outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .dataTables_wrapper .dataTables_filter input:focus,
        .dataTables_wrapper .dataTables_length select:focus {
            border-color: #2E7D32; box-shadow: 0 0 0 3px rgba(76,175,80,0.12); background: #fff;
        }
        .dataTables_wrapper .dataTables_filter input { min-width: 220px; }

        table.af-table { width: 100%; border-collapse: separate; border-spacing: 0; table-layout: fixed; }
        .af-table thead th {
            background: #f8f9fb; text-align: left; font-size: 11px; font-weight: 700; color: #6b7280;
            text-transform: uppercase; letter-spacing: 0.5px;
            padding: 13px 18px; border-bottom: 2px solid #eef0f2; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .af-table thead th i { color: #9aa0aa; margin-right: 5px; font-size: 11px; }
        .af-table thead th.af-col-center { text-align: center; }
        .af-table tbody td { padding: 15px 18px; border-bottom: 1px solid #f1f2f4; font-size: 13px; color: #1f2430; vertical-align: middle; overflow-wrap: break-word; }
        .af-table tbody td.af-col-center { text-align: center; }
        .af-table tbody tr:nth-child(even) { background: #fbfcfe; }
        .af-table tbody tr:hover { background: #f2faf3; }
        .af-table tbody tr:last-child td { border-bottom: none; }
        .af-id-pill {
            display: inline-block; min-width: 30px; padding: 3px 8px; border-radius: 6px;
            background: #f1f2f4; color: #6b7280; font-weight: 700; font-size: 12px;
        }

        .af-name { font-weight: 700; color: #1f2430; }
        .af-team { font-size: 11.5px; color: #9aa0aa; margin-top: 3px; }

        .af-gc-line { display: flex; align-items: flex-start; gap: 7px; font-size: 12px; margin-bottom: 5px; font-family: monospace; }
        .af-gc-line:last-child { margin-bottom: 0; }
        .af-gc-line i { color: #9aa0aa; font-size: 11px; width: 12px; flex-shrink: 0; margin-top: 2px; }
        .af-gc-label {
            font-size: 9.5px; font-weight: 800; color: #6b7280; text-transform: uppercase;
            width: 36px; flex-shrink: 0; background: #f1f2f4; border-radius: 4px; padding: 2px 5px; text-align: center;
            margin-top: 1px;
        }
        .af-appnum {
            display: inline-block; background: #eef2fb; color: #34495e; border: 1px solid #d7deed;
            border-radius: 6px; padding: 4px 10px; font-size: 12px; font-weight: 700; font-family: monospace;
        }

        .af-gc-val { font-weight: 600; color: #1f2430; min-width: 0; word-break: break-all; overflow-wrap: anywhere; }
        .af-gc-none { color: #c3c6cc; font-size: 12px; }

        .af-cat { font-size: 12.5px; font-weight: 600; color: #1f2430; }
        .af-cat i { color: #9aa0aa; font-size: 11px; margin-right: 3px; }
        .af-type { font-size: 11.5px; color: #9aa0aa; margin-top: 2px; }
        .af-badge {
            display: inline-block; margin-top: 7px; padding: 3px 11px; border-radius: 20px;
            font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.3px;
            white-space: nowrap;
        }
        .af-badge-success { background: #d4edda; color: #1e7e34; }
        .af-badge-warning { background: #fdf0cd; color: #93650f; }
        .af-badge-danger  { background: #f6cdd1; color: #a1222f; }
        .af-badge-default { background: #e5e6ea; color: #55596a; }

        /* Colored card wrapper for merged cells so each row's status/context reads at a glance */
        .af-card { border-radius: 8px; padding: 10px 12px; border: 1px solid transparent; }
        .af-card-success { background: #eef8ef; border-color: #bfe3c2; }
        .af-card-warning { background: #fdf6e3; border-color: #f5e3ab; }
        .af-card-danger  { background: #fbeaec; border-color: #f1c0c5; }
        .af-card-default { background: #f4f5f7; border-color: #e2e3e5; }
        .af-card-info    { background: #eef8ef; border-color: #d3ecd6; }

        /* DataTables chrome: info + pagination row underneath */
        .dataTables_wrapper .dataTables_info { font-size: 12.5px; color: #9aa0aa; padding-top: 14px; }
        .dataTables_wrapper .dataTables_paginate { padding-top: 10px; }
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border-radius: 6px; padding: 6px 12px; margin-left: 4px; font-size: 12.5px; border: 1px solid transparent !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #eef8ef !important; color: #2E7D32 !important; border: 1px solid #bfe3c2 !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #2E7D32 !important; color: #fff !important; border: none !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled { opacity: 0.4; }
        .dataTables_wrapper .dataTables_processing {
            background: #fff; border-radius: 10px; box-shadow: 0 4px 16px rgba(0,0,0,0.1);
            font-size: 13px; font-weight: 700; color: #2E7D32;
        }

        @media (max-width: 767px) {
            .af-toolbar { flex-direction: column; align-items: stretch; }
            .dataTables_wrapper .dataTables_filter input { width: 100%; min-width: 0; }

            /* Below ~991px the table no longer fits its container; letting it scroll
               horizontally at a real width keeps cell text readable instead of the
               fixed % columns squeezing every word onto its own vertical letter. */
            .af-table { table-layout: auto; min-width: 760px; }
            .af-table tbody td { overflow-wrap: normal; word-break: normal; }
            .af-gc-val { word-break: normal; overflow-wrap: normal; white-space: nowrap; }
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
                <div class="af-wrap">

                    <div class="af-banner">
                        <div class="af-banner-icon"><i class="fas fa-search"></i></div>
                        <div>
                            <h1>Application Finder</h1>
                            <p>Search and browse client application records</p>
                        </div>
                    </div>

                    <div class="af-table-card">
                        <div class="table-responsive">
                            <table class="af-table" id="dataTable" width="100%" cellspacing="0">
                                <colgroup>
                                    <col style="width:6%;">
                                    <col style="width:8%;">
                                    <col style="width:17%;">
                                    <col style="width:13%;">
                                    <col style="width:17%;">
                                    <col style="width:11%;">
                                    <col style="width:28%;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th class="af-col-center">Id</th>
                                        <th class="af-col-center">Sia Portal Id</th>
                                        <th><i class="fas fa-user"></i> Name / Team Member</th>
                                        <th><i class="fas fa-file-alt"></i> Application Number</th>
                                        <th><i class="fas fa-key"></i> GC Key</th>
                                        <th><i class="fas fa-calendar-alt"></i> Date Of Submission</th>
                                        <th><i class="fas fa-tags"></i> Category / Type / Status</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted"></div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

    <script>
    function afEsc(s) {
        return (s === null || s === undefined) ? '' : String(s).replace(/[&<>"']/g, function (c) {
            return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
        });
    }

    $('#dataTable').DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 100,
        "dom": "<'af-toolbar'<'af-toolbar-left'l><'af-toolbar-right'f>>tip",
        "ajax": {
            "url": "<?php echo base_url('Siaportal/get_app_finder_data'); ?>",
            "type": "POST"
        },
        "columns": [
            { "data": "id", "className": "af-col-center", "render": function (d) { return '<span class="af-id-pill">#' + afEsc(d) + '</span>'; } },
            { "data": "siaportalid", "className": "af-col-center" },
            { "data": null, "render": function (row) {
                var team = row.team_member_name || row.team_member_col || '';
                if (['Default', 'Defult'].indexOf(team) !== -1) team = '';
                var html = '<div class="af-name">' + afEsc(row.name || '') + '</div>';
                html += '<div class="af-team">' + (team ? afEsc(team) : '&ndash;') + '</div>';
                return html;
            }},
            { "data": "application_number", "render": function (d) {
                return d ? '<span class="af-appnum">' + afEsc(d) + '</span>' : '<span class="af-gc-none">&ndash;</span>';
            }},
            { "data": null, "render": function (row) {
                if (!row.gc_username && !row.gc_password) {
                    return '<span class="af-gc-none">&ndash;</span>';
                }
                var html = '<div class="af-card af-card-info">';
                html += '<div class="af-gc-line"><i class="fas fa-user-circle"></i><span class="af-gc-label">User</span> <span class="af-gc-val">' + afEsc(row.gc_username || '&ndash;') + '</span></div>';
                html += '<div class="af-gc-line"><i class="fas fa-lock"></i><span class="af-gc-label">Pass</span> <span class="af-gc-val">' + afEsc(row.gc_password || '&ndash;') + '</span></div>';
                html += '</div>';
                return html;
            }},
            { "data": "app_sub_date", "render": function (d) {
                return (!d || d.indexOf('0000-00-00') === 0) ? '<span class="af-gc-none">&ndash;</span>' : afEsc(d);
            }},
            { "data": null, "render": function (row) {
                var st = (row.st || '').toLowerCase();
                var cardCls = 'af-card-default';
                if (st.indexOf('submit') !== -1 || st.indexOf('approved') !== -1 || st.indexOf('complete') !== -1) cardCls = 'af-card-success';
                else if (st.indexOf('process') !== -1 || st.indexOf('pending') !== -1 || st.indexOf('wait') !== -1) cardCls = 'af-card-warning';
                else if (st.indexOf('reject') !== -1 || st.indexOf('declin') !== -1 || st.indexOf('refus') !== -1) cardCls = 'af-card-danger';
                var badgeCls = cardCls.replace('af-card-', 'af-badge-');
                var html = '<div class="af-card ' + cardCls + '">';
                html += '<div class="af-cat"><i class="fas fa-folder-open"></i> ' + afEsc(row.ct || '&ndash;') + '</div>';
                html += '<div class="af-type">' + afEsc(row.ty || '') + '</div>';
                html += '<span class="af-badge ' + badgeCls + '">' + afEsc(row.st || 'N/A') + '</span>';
                html += '</div>';
                return html;
            }}
        ]
    });
    </script>

</body>
</html>
