<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Appointment Admin Dashboard</title>
    <style>
        *  { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f0f4f8; font-size: 13px; color: #333; }

        /* ── Navbar ── */
        .navbar {
            background: linear-gradient(135deg, #1a73e8, #0d47a1);
            color: #fff; padding: 0 24px;
            display: flex; align-items: center; justify-content: space-between;
            height: 56px; position: sticky; top: 0; z-index: 100;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }
        .navbar .brand { font-size: 16px; font-weight: 700; display: flex; align-items: center; gap: 8px; }
        .navbar .nav-right { display: flex; align-items: center; gap: 14px; }
        .navbar .admin-info { font-size: 12px; opacity: 0.85; }
        .btn-logout {
            background: rgba(255,255,255,0.18); color: #fff; border: 1px solid rgba(255,255,255,0.3);
            padding: 5px 14px; border-radius: 20px; font-size: 12px; cursor: pointer;
            text-decoration: none; transition: background 0.2s;
        }
        .btn-logout:hover { background: rgba(255,255,255,0.3); }

        /* ── Main wrap ── */
        .wrap { padding: 20px 24px; }

        /* ── Stats ── */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 12px;
            margin-bottom: 20px;
        }
        .stat-card {
            background: #fff; border-radius: 10px;
            padding: 14px 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            border-left: 4px solid #ccc;
            cursor: pointer; transition: transform 0.15s, box-shadow 0.15s;
            text-decoration: none; color: inherit; display: block;
        }
        .stat-card:hover { transform: translateY(-2px); box-shadow: 0 4px 14px rgba(0,0,0,0.10); }
        .stat-card .val { font-size: 26px; font-weight: 700; line-height: 1; }
        .stat-card .lbl { font-size: 11px; color: #888; margin-top: 4px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.4px; }
        .s-inoffice  { border-left-color: #6f42c1; } .s-inoffice .val  { color: #6f42c1; }
        .s-today     { border-left-color: #1a73e8; } .s-today .val     { color: #1a73e8; }
        .s-pending   { border-left-color: #f39c12; } .s-pending .val   { color: #f39c12; }
        .s-confirmed { border-left-color: #27ae60; } .s-confirmed .val { color: #27ae60; }
        .s-tomorrow  { border-left-color: #2980b9; } .s-tomorrow .val  { color: #2980b9; }
        .s-cancelled { border-left-color: #e74c3c; } .s-cancelled .val { color: #e74c3c; }

        /* ── Two-column layout ── */
        .body-cols {
            display: flex;
            gap: 18px;
            align-items: flex-start;
        }
        .sidebar {
            width: 268px;
            flex-shrink: 0;
            position: sticky;
            top: 74px;
        }
        .main-col { flex: 1; min-width: 0; }

        /* ── Calendar ── */
        .cal-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            overflow: hidden;
            margin-bottom: 16px;
        }
        .cal-header {
            background: linear-gradient(135deg, #1a73e8, #0d47a1);
            color: #fff;
            padding: 14px 16px 12px;
            display: flex; align-items: center; justify-content: space-between;
        }
        .cal-header .cal-title { font-size: 14px; font-weight: 700; }
        .cal-nav {
            background: rgba(255,255,255,0.2);
            border: none; color: #fff;
            width: 26px; height: 26px; border-radius: 50%;
            cursor: pointer; font-size: 14px; font-weight: 700;
            display: flex; align-items: center; justify-content: center;
            transition: background 0.2s;
        }
        .cal-nav:hover { background: rgba(255,255,255,0.35); }
        .cal-body { padding: 10px; }
        .cal-dow {
            display: grid; grid-template-columns: repeat(7, 1fr);
            margin-bottom: 4px;
        }
        .cal-dow span {
            text-align: center; font-size: 10px;
            font-weight: 700; color: #aaa;
            padding: 4px 0; text-transform: uppercase;
        }
        .cal-grid {
            display: grid; grid-template-columns: repeat(7, 1fr);
            gap: 2px;
        }
        .cal-day {
            text-align: center; font-size: 12px;
            padding: 5px 2px; border-radius: 50%;
            cursor: default; position: relative;
            line-height: 1.3;
            width: 30px; height: 30px;
            display: flex; align-items: center; justify-content: center;
            margin: 1px auto;
        }
        .cal-day.other-month { color: #ddd; }
        .cal-day.today {
            background: #1a73e8; color: #fff;
            font-weight: 700; border-radius: 50%;
        }
        .cal-day.has-appt {
            cursor: pointer;
            font-weight: 700;
            color: #0d47a1;
        }
        .cal-day.has-appt::after {
            content: '';
            display: block;
            width: 5px; height: 5px;
            background: #e74c3c;
            border-radius: 50%;
            position: absolute;
            bottom: 2px; left: 50%; transform: translateX(-50%);
        }
        .cal-day.today.has-appt::after { background: #fff; }
        .cal-day.has-appt:hover { background: #e8f0fe; border-radius: 50%; }
        .cal-day.active-filter {
            background: #0d47a1; color: #fff; border-radius: 50%;
        }
        .cal-day.active-filter::after { background: #fff; }
        .cal-legend {
            padding: 8px 12px 10px;
            display: flex; gap: 14px; font-size: 10px; color: #888;
            border-top: 1px solid #f0f0f0;
        }
        .cal-legend span { display: flex; align-items: center; gap: 4px; }
        .leg-today { width: 10px; height: 10px; background: #1a73e8; border-radius: 50%; display:inline-block; }
        .leg-appt  { width: 6px; height: 6px; background: #e74c3c; border-radius: 50%; display:inline-block; }

        /* ── Upcoming mini list ── */
        .upcoming-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .upcoming-head {
            background: #f8f9fa;
            padding: 10px 14px;
            font-size: 12px; font-weight: 700; color: #555;
            border-bottom: 1px solid #eee;
            text-transform: uppercase; letter-spacing: 0.4px;
        }
        .upcoming-list { padding: 8px 0; max-height: 280px; overflow-y: auto; }
        .upcoming-item {
            padding: 7px 14px;
            border-bottom: 1px solid #f5f5f5;
            display: flex; gap: 10px; align-items: flex-start;
        }
        .upcoming-item:last-child { border-bottom: none; }
        .up-date {
            background: #e8f0fe; color: #1a73e8;
            border-radius: 6px; padding: 3px 6px;
            font-size: 10px; font-weight: 700;
            text-align: center; min-width: 36px; line-height: 1.4;
            flex-shrink: 0;
        }
        .up-info { flex: 1; min-width: 0; }
        .up-name { font-size: 12px; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .up-meta { font-size: 10px; color: #888; margin-top: 1px; }
        .up-empty { padding: 16px 14px; color: #aaa; font-size: 12px; text-align: center; }

        /* ── Filter bar ── */
        .filter-bar {
            background: #fff; border-radius: 10px;
            padding: 14px 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            margin-bottom: 16px;
            display: flex; gap: 10px; align-items: center; flex-wrap: wrap;
        }
        .filter-bar input, .filter-bar select {
            border: 1px solid #ddd; border-radius: 6px;
            padding: 7px 10px; font-size: 12px; color: #333;
            outline: none; background: #fafafa;
            transition: border-color 0.2s;
        }
        .filter-bar input:focus, .filter-bar select:focus { border-color: #1a73e8; background: #fff; }
        .filter-bar input[name=search] { min-width: 180px; }
        .btn-filter {
            background: #1a73e8; color: #fff; border: none;
            padding: 7px 16px; border-radius: 6px; font-size: 12px;
            cursor: pointer; font-weight: 600;
        }
        .btn-reset { background: #6c757d; color: #fff; border: none; padding: 7px 14px; border-radius: 6px; font-size: 12px; cursor: pointer; text-decoration: none; }
        .btn-add   { background: #6f42c1; color: #fff; border: none; padding: 7px 16px; border-radius: 6px; font-size: 12px; cursor: pointer; font-weight: 600; text-decoration: none; margin-left: auto; }

        /* ── Table ── */
        .tbl-wrap {
            background: #fff; border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            overflow: hidden;
        }
        .tbl-head {
            padding: 12px 16px;
            display: flex; align-items: center; justify-content: space-between;
            border-bottom: 1px solid #f0f0f0;
        }
        .tbl-head h2 { font-size: 14px; font-weight: 700; color: #333; }
        .tbl-head .result-count { font-size: 12px; color: #888; }
        table { width: 100%; border-collapse: collapse; }
        thead tr { background: #f8f9fa; }
        th { padding: 10px 10px; text-align: left; font-size: 11px; font-weight: 700; color: #666; text-transform: uppercase; letter-spacing: 0.4px; white-space: nowrap; border-bottom: 2px solid #e9ecef; }
        td { padding: 10px 10px; border-bottom: 1px solid #f0f0f0; vertical-align: middle; }
        tr:hover td { background: #fafbff; }

        /* Badges */
        .badge {
            display: inline-block; padding: 3px 9px; border-radius: 12px;
            font-size: 11px; font-weight: 700;
        }
        .b0 { background:#fef3cd; color:#856404; }
        .b1 { background:#d1e7dd; color:#0f5132; }
        .b2 { background:#cfe2ff; color:#084298; }
        .b3 { background:#f8d7da; color:#842029; }

        /* Team status note */
        .ts-box textarea {
            width: 100%; box-sizing: border-box; resize: vertical;
            border: 1px solid #f6e2b8; border-radius: 6px; background: #fdf3e2;
            padding: 6px 7px; font-size: 11px; line-height: 1.4; color: #1f2430;
            transition: border-color .15s, box-shadow .15s;
        }
        .ts-box textarea::placeholder { color: #b8a276; }
        .ts-box textarea:focus { outline: none; border-color: #c98a1a; background: #fff; box-shadow: 0 0 0 3px rgba(201,138,26,.15); }

        /* Action btns */
        .act-btn {
            display: inline-flex; align-items: center;
            border: none; padding: 4px 9px; border-radius: 4px;
            font-size: 11px; font-weight: 600; cursor: pointer;
            text-decoration: none; gap: 3px;
            transition: opacity 0.15s;
        }
        .act-btn:hover { opacity: 0.8; }
        .ab-reschedule { background: #fff3cd; color: #856404; }
        .ab-assign   { background: #cfe2ff; color: #084298; }
        .ab-resend   { background: #d1e7dd; color: #0a3622; }
        .act-btn.ab-disabled {
            background: #f0f0f0; color: #bbb; cursor: not-allowed; pointer-events: none;
        }
        .avail-badge {
            display: inline-block; padding: 4px 12px; border-radius: 20px;
            font-size: 12px; font-weight: 700; margin-top: 2px;
        }
        .avail-ok   { background: #d1e7dd; color: #0f5132; }
        .avail-no   { background: #f8d7da; color: #842029; }
        .avail-none { display: none; }
        .btn-check {
            background: #e9ecef; border: 1px solid #dee2e6; border-radius: 6px;
            padding: 6px 14px; font-size: 12px; font-weight: 700;
            color: #333; cursor: pointer; transition: background 0.2s; margin-bottom: 14px;
        }
        .btn-check:hover { background: #dee2e6; }
        .ab-view     { background: #e9ecef; color: #333; }
        .ab-edit     { background: #fff3cd; color: #856404; }
        .ab-delete   { background: #f8d7da; color: #842029; }
        .ab-restore  { background: #d1e7dd; color: #0a3622; }

        .btn-archived-toggle {
            display: inline-flex; align-items: center; gap: 6px; font-size: 12.5px; font-weight: 700;
            color: #555; background: #fff; border: 1px solid #dee2e6; border-radius: 6px; padding: 8px 14px;
            text-decoration: none; transition: background 0.15s;
        }
        .btn-archived-toggle:hover { background: #f0f0f0; color: #222; }
        .archived-banner {
            background: #fff8e6; color: #8a6d1f; font-size: 13px; padding: 10px 16px; border-radius: 8px;
            margin-bottom: 14px; display: flex; align-items: center; gap: 8px; flex-wrap: wrap;
        }

        /* Assigned chip */
        .assigned-chip {
            display: inline-block; background: #e8f0fe; color: #1a73e8;
            border-radius: 10px; padding: 2px 8px; font-size: 11px;
            max-width: 120px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
        }
        .unassigned { color: #aaa; font-style: italic; font-size: 11px; }

        /* Modal */
        .modal-overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(0,0,0,0.45); z-index: 999;
            align-items: center; justify-content: center;
        }
        .modal-overlay.open { display: flex; }
        .modal {
            background: #fff; border-radius: 12px;
            width: 90%; max-width: 480px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.2);
            overflow: hidden; animation: slideUp 0.25s ease;
        }
        .modal.wide { max-width: 580px; }
        @keyframes slideUp { from { transform: translateY(30px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        .modal-header {
            background: linear-gradient(135deg, #1a73e8, #0d47a1);
            color: #fff; padding: 16px 20px;
            display: flex; align-items: center; justify-content: space-between;
        }
        .modal-header h3 { font-size: 15px; font-weight: 700; }
        .modal-close { background: none; border: none; color: #fff; font-size: 20px; cursor: pointer; line-height: 1; }
        .modal-body { padding: 20px; }
        .modal-body label { display: block; font-size: 12px; font-weight: 700; color: #555; margin-bottom: 6px; }
        .modal-body select, .modal-body input[type=date], .modal-body input[type=time] {
            width: 100%; padding: 10px 12px; border: 2px solid #e0e0e0;
            border-radius: 8px; font-size: 13px; outline: none;
            transition: border-color 0.2s; margin-bottom: 14px;
        }
        .modal-body select:focus, .modal-body input:focus { border-color: #1a73e8; }
        .modal-footer { padding: 0 20px 18px; display: flex; gap: 10px; justify-content: flex-end; }
        .btn-save { background: #1a73e8; color: #fff; border: none; padding: 9px 20px; border-radius: 7px; font-size: 13px; font-weight: 700; cursor: pointer; }
        .btn-save:disabled { opacity: 0.45; cursor: not-allowed; }
        .btn-cancel { background: #e9ecef; color: #555; border: none; padding: 9px 16px; border-radius: 7px; font-size: 13px; cursor: pointer; }
        .btn-spinner { display:inline-block;width:13px;height:13px;border:2px solid rgba(255,255,255,0.5);border-top-color:#fff;border-radius:50%;animation:btnSpin .6s linear infinite;vertical-align:middle;margin-right:6px; }
        @keyframes btnSpin { to { transform: rotate(360deg); } }

        /* Full View modal body */
        .fv-row { display: flex; gap: 0; border-bottom: 1px solid #f0f0f0; }
        .fv-row:last-child { border-bottom: none; }
        .fv-lbl { width: 40%; padding: 8px 12px; font-size: 12px; font-weight: 700; color: #666; background: #f8f9fa; }
        .fv-val { flex: 1; padding: 8px 12px; font-size: 12px; color: #333; word-break: break-word; }

        /* Toast */
        .toast {
            position: fixed; bottom: 24px; right: 24px;
            background: #1a1a2e; color: #fff;
            padding: 12px 20px; border-radius: 8px;
            font-size: 13px; z-index: 9999;
            display: none; align-items: center; gap: 8px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }
        .toast.show { display: flex; }
        .toast.success { border-left: 4px solid #27ae60; }
        .toast.error   { border-left: 4px solid #e74c3c; }

        /* flash msg */
        .flash-msg { background:#d1e7dd; color:#0f5132; padding:10px 16px; border-radius:8px; margin-bottom:14px; font-size:13px; }

        @media(max-width: 1100px) {
            .stats-row { grid-template-columns: repeat(3, 1fr); }
        }
        @media(max-width: 860px) {
            .body-cols { flex-direction: column; }
            .sidebar { width: 100%; position: static; }
        }
        @media(max-width: 600px) {
            .stats-row { grid-template-columns: repeat(2, 1fr); }
            .wrap { padding: 12px; }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <div class="brand">&#128197; Appointment Admin</div>
    <div class="nav-right">
        <a href="<?php echo base_url('Siaportal/dashboard'); ?>" class="btn-logout" style="background:#6c757d;margin-right:8px;">&#8592; Back</a>
        <a href="<?php echo base_url('appoint/AppointAdmin/logout'); ?>" class="btn-logout">Logout</a>
    </div>
</div>

<?php
$allApptDates = [];
foreach ($appointments as $a) {
    $allApptDates[$a['appointment_date']] = true;
}
$todayStr = date('Y-m-d');
$upcomingList = [];
foreach ($appointments as $a) {
    if ($a['appointment_date'] >= $todayStr && (int)$a['status'] !== 3 && count($upcomingList) < 6) {
        $upcomingList[] = $a;
    }
}

// Flash message
$flashMsg = session()->getFlashdata('msg');
?>

<div class="wrap">

    <?php if ($flashMsg): ?>
    <div class="flash-msg">&#10003; <?php echo htmlspecialchars($flashMsg); ?></div>
    <?php endif; ?>

    <!-- Stats -->
    <div class="stats-row">
        <a href="?consultation_type=In-Person" class="stat-card s-inoffice">
            <div class="val"><?php echo $stat_inoffice; ?></div>
            <div class="lbl">In Office</div>
        </a>
        <a href="?date=<?php echo date('Y-m-d'); ?>" class="stat-card s-today">
            <div class="val"><?php echo $stat_today; ?></div>
            <div class="lbl">Today</div>
        </a>
        <a href="?status=0" class="stat-card s-pending">
            <div class="val"><?php echo $stat_pending; ?></div>
            <div class="lbl">Pending</div>
        </a>
        <a href="?status=1" class="stat-card s-confirmed">
            <div class="val"><?php echo $stat_confirmed; ?></div>
            <div class="lbl">Confirmed</div>
        </a>
        <a href="?date=<?php echo date('Y-m-d', strtotime('+1 day')); ?>" class="stat-card s-tomorrow">
            <div class="val"><?php echo $stat_tomorrow; ?></div>
            <div class="lbl">Tomorrow</div>
        </a>
        <a href="?status=3" class="stat-card s-cancelled">
            <div class="val"><?php echo $stat_cancelled; ?></div>
            <div class="lbl">Cancelled</div>
        </a>
    </div>

    <!-- Two-column body -->
    <div class="body-cols">

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Calendar card -->
            <div class="cal-card">
                <div class="cal-header">
                    <button class="cal-nav" id="calPrev">&#8249;</button>
                    <span class="cal-title" id="calTitle"></span>
                    <button class="cal-nav" id="calNext">&#8250;</button>
                </div>
                <div class="cal-body">
                    <div class="cal-dow">
                        <span>Su</span><span>Mo</span><span>Tu</span><span>We</span>
                        <span>Th</span><span>Fr</span><span>Sa</span>
                    </div>
                    <div class="cal-grid" id="calGrid"></div>
                </div>
                <div class="cal-legend">
                    <span><i class="leg-today"></i> Today</span>
                    <span><i class="leg-appt"></i> Has appointment</span>
                </div>
            </div>

            <!-- Upcoming appointments mini list -->
            <div class="upcoming-card">
                <div class="upcoming-head">&#128337; Upcoming Appointments</div>
                <div class="upcoming-list">
                <?php if (empty($upcomingList)): ?>
                    <div class="up-empty">No upcoming appointments</div>
                <?php else: ?>
                    <?php foreach ($upcomingList as $u): ?>
                    <div class="upcoming-item">
                        <div class="up-date">
                            <?php echo date('d', strtotime($u['appointment_date'])); ?><br>
                            <span style="font-size:9px;font-weight:400;"><?php echo date('M', strtotime($u['appointment_date'])); ?></span>
                        </div>
                        <div class="up-info">
                            <div class="up-name" title="<?php echo htmlspecialchars($u['client_name']); ?>"><?php echo htmlspecialchars($u['client_name']); ?></div>
                            <div class="up-meta"><?php echo date('h:i A', strtotime($u['appointment_time'])); ?> &bull; <?php echo htmlspecialchars($u['service_type']); ?></div>
                            <div class="up-meta">
                                <?php
                                $sl = [0=>'Pending',1=>'Confirmed',2=>'Completed',3=>'Cancelled'];
                                $sc = ['0'=>'#856404','1'=>'#0f5132','2'=>'#084298','3'=>'#842029'];
                                $ss = (string)$u['status'];
                                echo '<span style="color:'.$sc[$ss].';font-weight:600;">'.$sl[(int)$ss].'</span>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                </div>
            </div>

        </div><!-- /sidebar -->

        <!-- Main column -->
        <div class="main-col">

            <?php $isArchived = !empty($filters['fArchived']); ?>
            <?php if ($isArchived): ?>
            <div class="archived-banner">
                &#128193; Viewing <strong><?php echo (int) $archived_count; ?></strong> archived appointment<?php echo $archived_count === 1 ? '' : 's'; ?> — hidden from the active dashboard, not deleted.
            </div>
            <?php endif; ?>

            <!-- Filter bar -->
            <form method="get" action="" id="filterForm">
            <div class="filter-bar">
                <input type="text"   name="search" placeholder="&#128269; Search name, email, phone..." value="<?php echo htmlspecialchars($filters['fSearch'] ?? ''); ?>" />
                <input type="date"   name="date" id="filterDate"  value="<?php echo htmlspecialchars($filters['fDate'] ?? ''); ?>" />
                <select name="status">
                    <option value="">All Statuses</option>
                    <option value="0" <?php echo ($filters['fStatus']==='0')?'selected':''; ?>>Pending</option>
                    <option value="1" <?php echo ($filters['fStatus']==='1')?'selected':''; ?>>Confirmed</option>
                    <option value="3" <?php echo ($filters['fStatus']==='3')?'selected':''; ?>>Cancelled</option>
                </select>
                <select name="member">
                    <option value="">All Members</option>
                    <?php foreach ($team_members as $tm): ?>
                    <option value="<?php echo htmlspecialchars($tm['firstname'].' '.$tm['lastname']); ?>"
                        <?php echo (($filters['fMember'] ?? '') === $tm['firstname'].' '.$tm['lastname'])?'selected':''; ?>>
                        <?php echo htmlspecialchars($tm['firstname'].' '.$tm['lastname']); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <?php if ($isArchived): ?><input type="hidden" name="archived" value="1"><?php endif; ?>
                <button type="submit" class="btn-filter">Filter</button>
                <a href="<?php echo $isArchived ? '?archived=1' : '?'; ?>" class="btn-reset">Reset</a>
                <a href="<?php echo base_url('appoint/Appoint/add'); ?>?from=dashboard" class="btn-add">+ Add Appointment</a>
                <a class="btn-archived-toggle" href="<?php echo base_url('appoint/AppointAdmin/dashboard' . ($isArchived ? '' : '?archived=1')); ?>">
                    <?php echo $isArchived ? '&#11013; Active Appointments' : '&#128193; View Archived (' . (int) $archived_count . ')'; ?>
                </a>
            </div>
            </form>

            <!-- Table -->
            <div class="tbl-wrap">
                <div class="tbl-head">
                    <h2>Appointments</h2>
                    <span class="result-count"><?php echo count($appointments); ?> record<?php echo count($appointments)!=1?'s':''; ?></span>
                </div>
                <div style="overflow-x:auto;">
                <table id="apptTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date / Time</th>
                            <th>Client</th>
                            <th>Phone / Email</th>
                            <th>Service / Type</th>
                            <th>Assigned To</th>
                            <th>Status</th>
                            <th>Team Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (empty($appointments)): ?>
                        <tr><td colspan="9" style="text-align:center;padding:30px;color:#aaa;">No appointments found.</td></tr>
                    <?php else: ?>
                    <?php foreach ($appointments as $i => $a):
                        $s = (int)$a['status'];
                        $sLabels = [0=>'Pending', 1=>'Confirmed', 2=>'Completed', 3=>'Cancelled'];
                        $canAct = ($s === 1)
                            && !empty($a['appointment_date'])
                            && !empty($a['appointment_time'])
                            && !empty($a['service_type'])
                            && !empty($a['appointment_type'])
                            && !empty($a['client_name']);
                        $disabledTitle = 'title="Only available for Confirmed appointments with all details filled"';
                    ?>
                    <tr data-id="<?php echo $a['id']; ?>" data-status="<?php echo $s; ?>" id="row-<?php echo $a['id']; ?>">
                        <td style="color:#aaa;"><?php echo $i+1; ?></td>
                        <td style="white-space:nowrap;">
                            <div style="font-weight:600;"><?php echo date('d M Y', strtotime($a['appointment_date'])); ?></div>
                            <div style="font-size:10px;color:#aaa;"><?php echo date('D', strtotime($a['appointment_date'])); ?></div>
                            <div style="font-size:11px;color:#555;"><?php echo date('h:i A', strtotime($a['appointment_time'])); ?></div>
                        </td>
                        <td>
                            <div style="font-weight:600;"><?php echo htmlspecialchars($a['client_name']); ?></div>
                            <?php if (!empty($a['prospect_id'])): ?>
                                <div style="font-size:10px;color:#888;">&#128100; Prospect #<?php echo $a['prospect_id']; ?></div>
                            <?php else: ?>
                                <div style="font-size:10px;color:#bbb;">&#128101; Guest</div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($a['client_phone']): ?><div>&#128222; <?php echo htmlspecialchars($a['client_phone']); ?></div><?php endif; ?>
                            <?php if ($a['client_email']): ?><div style="font-size:11px;color:#666;">&#9993; <?php echo htmlspecialchars($a['client_email']); ?></div><?php endif; ?>
                        </td>
                        <td style="font-size:11px;">
                            <?php echo htmlspecialchars($a['service_type']); ?>
                            <?php if (!empty($a['appointment_type'])): ?>
                                <div style="margin-top:3px;"><span style="background:#f3e8ff;color:#6f42c1;padding:2px 7px;border-radius:10px;font-size:10px;font-weight:600;">&#128197; <?php echo htmlspecialchars($a['appointment_type']); ?></span></div>
                            <?php endif; ?>
                            <?php if (!empty($a['consultation_type'])): ?>
                                <div style="margin-top:3px;">
                                    <?php if ($a['consultation_type'] === 'Telephonic'): ?>
                                        <span style="background:#e3f2fd;color:#1565c0;padding:2px 7px;border-radius:10px;font-size:10px;font-weight:600;">&#128222; Telephonic</span>
                                    <?php else: ?>
                                        <span style="background:#f3e5f5;color:#6a1b9a;padding:2px 7px;border-radius:10px;font-size:10px;font-weight:600;">&#127970; In-Person</span>
                                        <?php if (!empty($a['office_location'])): ?>
                                            <span style="font-size:10px;color:#666;margin-left:3px;">&#128205; <?php echo htmlspecialchars($a['office_location']); ?></span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if (!empty($a['assigned_to'])): ?>
                                <span class="assigned-chip" title="<?php echo htmlspecialchars($a['assigned_to']); ?>"><?php echo htmlspecialchars($a['assigned_to']); ?></span>
                            <?php else: ?>
                                <span class="unassigned">Unassigned</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <span class="badge b<?php echo $s; ?>"><?php echo $sLabels[$s]; ?></span>
                        </td>
                        <td style="min-width:180px;">
                            <?php if (!empty($a['prospect_id'])): ?>
                            <div class="ts-box">
                                <textarea rows="2" placeholder="Add a note..." onkeyup="addStatus(<?php echo (int)$a['prospect_id']; ?>, this.value)"><?php echo str_replace('%20', ' ', $prospect_status[$a['prospect_id']] ?? ''); ?></textarea>
                            </div>
                            <?php else: ?>
                                <span style="font-size:10px;color:#bbb;">&mdash;</span>
                            <?php endif; ?>
                        </td>
                        <td style="white-space:nowrap;">
                            <div style="display:flex;flex-direction:column;gap:3px;">
                                <!-- Reschedule: Confirmed + complete only -->
                                <?php if ($canAct): ?>
                                <button class="act-btn ab-reschedule"
                                    onclick="openReschedule(<?php echo $a['id']; ?>, '<?php echo $a['appointment_date']; ?>', '<?php echo $a['appointment_time']; ?>')">
                                    &#128197; Reschedule
                                </button>
                                <?php else: ?>
                                <button class="act-btn ab-disabled" <?php echo $disabledTitle; ?>>
                                    &#128197; Reschedule
                                </button>
                                <?php endif; ?>
                                <!-- Reassign Team Member: Confirmed + complete only -->
                                <?php if ($canAct): ?>
                                <button class="act-btn ab-assign"
                                    onclick="openAssign(<?php echo $a['id']; ?>, '<?php echo htmlspecialchars($a['assigned_to'] ?? '', ENT_QUOTES); ?>', '<?php echo $a['appointment_date']; ?>', '<?php echo $a['appointment_time']; ?>')">
                                    &#128100; Reassign Team Member
                                </button>
                                <?php else: ?>
                                <button class="act-btn ab-disabled" <?php echo $disabledTitle; ?>>
                                    &#128100; Reassign Team Member
                                </button>
                                <?php endif; ?>
                                <!-- Resend Confirmation: Confirmed + complete only -->
                                <?php if ($canAct): ?>
                                <button class="act-btn ab-resend" id="resendBtn-<?php echo $a['id']; ?>"
                                    onclick="resendConfirmation(<?php echo $a['id']; ?>)">
                                    &#9993; Resend
                                </button>
                                <?php else: ?>
                                <button class="act-btn ab-disabled" <?php echo $disabledTitle; ?>>
                                    &#9993; Resend
                                </button>
                                <?php endif; ?>
                                <!-- Full View -->
                                <button class="act-btn ab-view" onclick="openFullView(<?php echo $a['id']; ?>)">
                                    &#128065; Full View
                                </button>
                                <!-- Edit -->
                                <a class="act-btn ab-edit" href="<?php echo base_url('appoint/Appoint/edit/'.$a['id']); ?>?from=dashboard">
                                    &#9998; Edit
                                </a>
                                <!-- Archive / Restore -->
                                <?php if ($isArchived): ?>
                                <button class="act-btn ab-restore" onclick="restoreAppointment(<?php echo $a['id']; ?>)">
                                    &#8630; Restore
                                </button>
                                <?php else: ?>
                                <button class="act-btn ab-delete" onclick="archiveAppointment(<?php echo $a['id']; ?>)">
                                    &#128193; Archive
                                </button>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
                </div>
            </div>

        </div><!-- /main-col -->

    </div><!-- /body-cols -->

</div><!-- /wrap -->

<!-- Reassign Team Member Modal -->
<div class="modal-overlay" id="assignModal">
    <div class="modal">
        <div class="modal-header">
            <h3>&#128100; Reassign Team Member</h3>
            <button class="modal-close" onclick="closeModal('assignModal')">&times;</button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="assignId" value="" />
            <input type="hidden" id="assignDate" value="" />
            <input type="hidden" id="assignTime" value="" />
            <label>Select Team Member <span style="color:#e74c3c;">*</span></label>
            <select id="assignSelect" onchange="resetAssignBadge(); document.getElementById('assignSaveBtn').disabled = true; checkMemberSlot();">
                <option value="">— Select a team member —</option>
                <?php foreach ($team_members as $tm): ?>
                <option value="<?php echo htmlspecialchars($tm['firstname'].' '.$tm['lastname']); ?>">
                    <?php echo htmlspecialchars($tm['firstname'].' '.$tm['lastname']); ?>
                </option>
                <?php endforeach; ?>
            </select>
            <button type="button" class="btn-check" id="assignCheckBtn" onclick="checkMemberSlot()" style="margin-top:-4px;">&#10003; Check Availability at Appointment Time</button>
            <span class="avail-badge avail-none" id="assignAvailBadge"></span>
            <p style="font-size:11px;color:#888;margin-top:6px;">Email &amp; WhatsApp notification will be sent to the entire team after reassignment.</p>
        </div>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal('assignModal')">Cancel</button>
            <button class="btn-save" id="assignSaveBtn" onclick="saveAssign()" disabled>Save &amp; Notify</button>
        </div>
    </div>
</div>

<!-- Reschedule Modal -->
<div class="modal-overlay" id="rescheduleModal">
    <div class="modal">
        <div class="modal-header">
            <h3>&#128197; Reschedule Appointment</h3>
            <button class="modal-close" onclick="closeModal('rescheduleModal')">&times;</button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="rescheduleId" value="" />
            <label>New Date <span style="color:#e74c3c;">*</span></label>
            <input type="date" id="rescheduleDate" onchange="checkRescheduleSlot()" />
            <label>New Time <span style="color:#e74c3c;">*</span></label>
            <input type="time" id="rescheduleTime" onchange="checkRescheduleSlot()" />
            <button type="button" class="btn-check" onclick="checkRescheduleSlotBtn()">&#10003; Check Team Member Availability</button>
            <span class="avail-badge avail-none" id="rescheduleAvailBadge"></span>
            <p style="font-size:11px;color:#888;margin-top:4px;">Reschedule email will be sent automatically to client and team.</p>
        </div>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal('rescheduleModal')">Cancel</button>
            <button class="btn-save" id="rescheduleSaveBtn" onclick="saveReschedule()" disabled>Save &amp; Send Email</button>
        </div>
    </div>
</div>

<!-- Full View Modal -->
<div class="modal-overlay" id="fullViewModal">
    <div class="modal wide">
        <div class="modal-header">
            <h3>&#128065; Appointment Full View</h3>
            <button class="modal-close" onclick="closeModal('fullViewModal')">&times;</button>
        </div>
        <div class="modal-body" id="fullViewBody" style="padding:0;max-height:70vh;overflow-y:auto;">
            <p style="padding:20px;color:#aaa;">Loading...</p>
        </div>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal('fullViewModal')">Close</button>
        </div>
    </div>
</div>

<!-- Toast -->
<div class="toast" id="toast"></div>

<script>
var BASE        = '<?php echo rtrim(base_url(), '/') . '/'; ?>';
var APPT_DATES  = <?php echo json_encode($all_appt_dates ?? array_keys($allApptDates)); ?>;
var ACTIVE_DATE = '<?php echo htmlspecialchars($filters['fDate'] ?? ''); ?>';

// All appointments data for Full View
var APPT_DATA = <?php
$apptMap = [];
foreach ($appointments as $a) {
    $apptMap[$a['id']] = $a;
}
echo json_encode($apptMap);
?>;

/* ══════════════════════════════
   Toast
══════════════════════════════ */
function showToast(msg, type) {
    var t = document.getElementById('toast');
    t.textContent = msg;
    t.className = 'toast show ' + (type || 'success');
    setTimeout(function(){ t.classList.remove('show'); }, 3500);
}

/* ── Reschedule ── */
function openReschedule(id, date, time) {
    document.getElementById('rescheduleId').value   = id;
    document.getElementById('rescheduleDate').value = date;
    document.getElementById('rescheduleTime').value = time;
    document.getElementById('rescheduleDate').setAttribute('data-orig', date);
    document.getElementById('rescheduleTime').setAttribute('data-orig', time);
    var b = document.getElementById('rescheduleAvailBadge');
    b.className = 'avail-badge avail-none';
    b.textContent = '';
    document.getElementById('rescheduleSaveBtn').disabled = true;
    document.getElementById('rescheduleModal').classList.add('open');
}
function saveReschedule() {
    var id   = document.getElementById('rescheduleId').value;
    var date = document.getElementById('rescheduleDate').value;
    var time = document.getElementById('rescheduleTime').value;
    if (!date || !time) { alert('Please select a new date and time.'); return; }
    var btn = document.getElementById('rescheduleSaveBtn');
    btn.disabled = true;
    btn.innerHTML = '<span class="btn-spinner"></span>Sending...';
    ajax(BASE + 'appoint/AppointAdmin/reschedule/' + id, { appointment_date: date, appointment_time: time }, function(res) {
        btn.disabled = false;
        btn.innerHTML = 'Save &amp; Send Email';
        closeModal('rescheduleModal');
        showToast('Appointment rescheduled. Email sent to client & team.', 'success');
        // Update row display
        var row = document.getElementById('row-' + id);
        if (row) {
            var dateCell = row.querySelector('td:nth-child(2)');
            if (dateCell) {
                var d = new Date(date + 'T' + time);
                var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                var days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
                var hh = d.getHours(), mm = d.getMinutes(), ampm = hh >= 12 ? 'PM' : 'AM';
                hh = hh % 12 || 12;
                var mmStr = mm < 10 ? '0'+mm : mm;
                dateCell.innerHTML = '<div style="font-weight:600;">' + String(d.getDate()).padStart(2,'0') + ' ' + months[d.getMonth()] + ' ' + d.getFullYear() + '</div>' +
                    '<div style="font-size:10px;color:#aaa;">' + days[d.getDay()] + '</div>' +
                    '<div style="font-size:11px;color:#555;">' + hh + ':' + mmStr + ' ' + ampm + '</div>';
            }
        }
    }, function() {
        btn.disabled = false;
        btn.innerHTML = 'Save &amp; Send Email';
    });
}

/* ── Reassign ── */
function resetAssignBadge() {
    var b = document.getElementById('assignAvailBadge');
    b.className = 'avail-badge avail-none';
    b.textContent = '';
}
function openAssign(id, current, date, time) {
    document.getElementById('assignId').value     = id;
    document.getElementById('assignDate').value   = date || '';
    document.getElementById('assignTime').value   = time || '';
    document.getElementById('assignSelect').value = current || '';
    document.getElementById('assignSaveBtn').disabled = true;
    resetAssignBadge();
    document.getElementById('assignModal').classList.add('open');
    if (current) { checkMemberSlot(); }
}
function checkRescheduleSlotBtn() {
    var date = document.getElementById('rescheduleDate').value;
    var time = document.getElementById('rescheduleTime').value;
    if (!date || !time) { alert('Please select a new date and time first.'); return; }
    checkRescheduleSlot();
}
function checkRescheduleSlot() {
    var id       = document.getElementById('rescheduleId').value;
    var date     = document.getElementById('rescheduleDate').value;
    var time     = document.getElementById('rescheduleTime').value;
    var origDate = document.getElementById('rescheduleDate').getAttribute('data-orig') || '';
    var origTime = document.getElementById('rescheduleTime').getAttribute('data-orig') || '';
    var badge    = document.getElementById('rescheduleAvailBadge');
    var member   = (APPT_DATA[id] && APPT_DATA[id].assigned_to) ? APPT_DATA[id].assigned_to : '';
    if (!date || !time) { return; }
    if (date === origDate && time === origTime) {
        badge.className = 'avail-badge avail-no';
        badge.textContent = '⚠ Same date & time — nothing changed';
        document.getElementById('rescheduleSaveBtn').disabled = true;
        return;
    }
    badge.className = 'avail-badge';
    badge.textContent = 'Checking...';
    var form = new FormData();
    form.append('appointment_date', date);
    form.append('appointment_time', time);
    if (member) {
        form.append('team_member', member);
        form.append('exclude_id', id);
        fetch(BASE + 'appoint/AppointAdmin/check_member_slot', { method: 'POST', body: form })
            .then(function(r) { return r.json(); })
            .then(function(res) {
                if (res.available) {
                    badge.className = 'avail-badge avail-ok';
                    badge.textContent = '✓ ' + member + ' is free at this time';
                    document.getElementById('rescheduleSaveBtn').disabled = false;
                } else {
                    badge.className = 'avail-badge avail-no';
                    badge.textContent = '✗ ' + member + ' already has an appointment at this time';
                    document.getElementById('rescheduleSaveBtn').disabled = true;
                }
            })
            .catch(function() {
                badge.className = 'avail-badge avail-no';
                badge.textContent = 'Check failed';
            });
    } else {
        form.append('exclude_id', id);
        fetch(BASE + 'appoint/AppointAdmin/check_slot', { method: 'POST', body: form })
            .then(function(r) { return r.json(); })
            .then(function(res) {
                if (res.available) {
                    badge.className = 'avail-badge avail-ok';
                    badge.textContent = '✓ Slot available';
                    document.getElementById('rescheduleSaveBtn').disabled = false;
                } else {
                    badge.className = 'avail-badge avail-no';
                    badge.textContent = '✗ Slot already booked';
                    document.getElementById('rescheduleSaveBtn').disabled = true;
                }
            })
            .catch(function() {
                badge.className = 'avail-badge avail-no';
                badge.textContent = 'Check failed';
            });
    }
}

function checkMemberSlot() {
    var id     = document.getElementById('assignId').value;
    var date   = document.getElementById('assignDate').value;
    var time   = document.getElementById('assignTime').value;
    var member = document.getElementById('assignSelect').value;
    var badge  = document.getElementById('assignAvailBadge');
    var saveBtn = document.getElementById('assignSaveBtn');
    if (!member) { return; }
    badge.className = 'avail-badge';
    badge.textContent = 'Checking...';
    saveBtn.disabled = true;
    var form = new FormData();
    form.append('appointment_date', date);
    form.append('appointment_time', time);
    form.append('team_member', member);
    form.append('exclude_id', id);
    fetch(BASE + 'appoint/AppointAdmin/check_member_slot', { method: 'POST', body: form })
        .then(function(r) { return r.json(); })
        .then(function(res) {
            if (res.available) {
                badge.className = 'avail-badge avail-ok';
                badge.textContent = '✓ ' + member + ' is free at this time';
                saveBtn.disabled = false;
            } else {
                badge.className = 'avail-badge avail-no';
                badge.textContent = '✗ ' + member + ' already has an appointment at this time';
                saveBtn.disabled = true;
            }
        })
        .catch(function() {
            badge.className = 'avail-badge avail-no';
            badge.textContent = 'Check failed';
            saveBtn.disabled = true;
        });
}

function saveAssign() {
    var id     = document.getElementById('assignId').value;
    var member = document.getElementById('assignSelect').value;
    if (!member) { alert('Please select a team member.'); return; }
    var btn = document.getElementById('assignSaveBtn');
    btn.disabled = true;
    btn.innerHTML = '<span class="btn-spinner"></span>Sending...';
    ajax(BASE + 'appoint/AppointAdmin/assign/' + id, { assigned_to: member }, function(res) {
        var row  = document.getElementById('row-' + id);
        if (row) {
            var chip = row.querySelector('.assigned-chip, .unassigned');
            if (chip) {
                chip.className = 'assigned-chip'; chip.textContent = member; chip.title = member;
            }
        }
        btn.disabled = false;
        btn.innerHTML = 'Save &amp; Notify';
        closeModal('assignModal');
        showToast('Reassigned to ' + member + '. Team notified.', 'success');
    }, function() {
        btn.disabled = false;
        btn.innerHTML = 'Save &amp; Notify';
    });
}

/* ── Resend Confirmation ── */
function resendConfirmation(id) {
    var btn = document.getElementById('resendBtn-' + id);
    if (!btn || btn.disabled) return;
    btn.disabled = true;
    var orig = btn.innerHTML;
    btn.innerHTML = '<span class="btn-spinner" style="border-color:rgba(10,54,34,0.3);border-top-color:#0a3622;"></span>Sending...';
    ajax(BASE + 'appoint/AppointAdmin/resend_confirmation/' + id, {}, function(res) {
        btn.disabled = false;
        btn.innerHTML = orig;
        showToast('Confirmation email resent to client.', 'success');
    }, function() {
        btn.disabled = false;
        btn.innerHTML = orig;
    });
}

/* ── Full View ── */
function openFullView(id) {
    var a = APPT_DATA[id];
    if (!a) { return; }
    var sLabels = {0:'Pending', 1:'Confirmed', 2:'Completed', 3:'Cancelled'};
    var rows = [
        ['Reference',         'SIA-' + a.id],
        ['Prospect / Client', a.prospect_id ? 'Prospect #' + a.prospect_id : 'Guest (Walk-in / Website)'],
        ['Client Name',       a.client_name || '—'],
        ['Client Email',      a.client_email || '—'],
        ['Client Phone',      a.client_phone || '—'],
        ['Appointment Date',  a.appointment_date || '—'],
        ['Appointment Time',  a.appointment_time || '—'],
        ['Service Type',      a.service_type || '—'],
        ['Appointment Type',  a.appointment_type || '—'],
        ['Consultation Type',  a.consultation_type || '—'],
        ['Office Location',    a.office_location || '—'],
        ['Contact Method',     a.contact_method || '—'],
        ['Inside Canada',      a.inside_canada || '—'],
        ['Existing Client',    a.existing_client || '—'],
        ['Immigration Status', a.immigration_status || '—'],
        ['Assigned To',        a.assigned_to || 'Unassigned'],
        ['Status',            sLabels[a.status] || '—'],
        ['Notes',             a.notes || '—'],
        ['Created On',        a.insert_on || '—'],
        ['Updated On',        a.update_on || '—'],
    ];
    var html = '';
    rows.forEach(function(r) {
        html += '<div class="fv-row"><div class="fv-lbl">' + r[0] + '</div><div class="fv-val">' + escHtml(String(r[1])) + '</div></div>';
    });
    document.getElementById('fullViewBody').innerHTML = html;
    document.getElementById('fullViewModal').classList.add('open');
}
function escHtml(s) {
    return s.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
}

/* ── Team Status note (shared with Prospect/Client pages) ── */
var addStatusTimers = {};
function addStatus(prospectId, value) {
    clearTimeout(addStatusTimers[prospectId]);
    addStatusTimers[prospectId] = setTimeout(function() {
        var form = new FormData();
        fetch(BASE + 'Siaportal/st_chang/' + prospectId + '/' + encodeURIComponent(value), { method: 'POST', body: form });
    }, 400);
}

/* ── Archive / Restore ── */
function archiveAppointment(id) {
    if (!confirm('Archive this appointment? It will be hidden from the active dashboard, not deleted — you can restore it anytime from "View Archived".')) return;
    ajax(BASE + 'appoint/AppointAdmin/bulk_action', { action: 'archive', ids: JSON.stringify([id]) }, function() {
        var row = document.getElementById('row-' + id);
        if (row) row.remove();
        showToast('Appointment archived.', 'success');
    });
}
function restoreAppointment(id) {
    if (!confirm('Restore this appointment to the active dashboard?')) return;
    ajax(BASE + 'appoint/AppointAdmin/bulk_action', { action: 'restore', ids: JSON.stringify([id]) }, function() {
        var row = document.getElementById('row-' + id);
        if (row) row.remove();
        showToast('Appointment restored.', 'success');
    });
}

/* ══════════════════════════════
   CALENDAR
══════════════════════════════ */
var calYear, calMonth;
(function() {
    var now = new Date();
    if (ACTIVE_DATE) {
        var p = ACTIVE_DATE.split('-');
        calYear  = parseInt(p[0]);
        calMonth = parseInt(p[1]) - 1;
    } else {
        calYear  = now.getFullYear();
        calMonth = now.getMonth();
    }
    buildCal();
})();

document.getElementById('calPrev').addEventListener('click', function() {
    calMonth--;
    if (calMonth < 0) { calMonth = 11; calYear--; }
    buildCal();
});
document.getElementById('calNext').addEventListener('click', function() {
    calMonth++;
    if (calMonth > 11) { calMonth = 0; calYear++; }
    buildCal();
});

function buildCal() {
    var months = ['January','February','March','April','May','June',
                  'July','August','September','October','November','December'];
    document.getElementById('calTitle').textContent = months[calMonth] + ' ' + calYear;

    var today   = new Date();
    var todayY  = today.getFullYear();
    var todayM  = today.getMonth();
    var todayD  = today.getDate();

    var firstDay    = new Date(calYear, calMonth, 1).getDay();
    var daysInMonth = new Date(calYear, calMonth + 1, 0).getDate();
    var daysInPrev  = new Date(calYear, calMonth, 0).getDate();

    var grid = document.getElementById('calGrid');
    grid.innerHTML = '';

    var cells = firstDay + daysInMonth;
    var total = cells <= 35 ? 35 : 42;

    for (var i = 0; i < total; i++) {
        var day = document.createElement('div');
        day.className = 'cal-day';

        var d, m, y, iso;
        if (i < firstDay) {
            d = daysInPrev - firstDay + i + 1;
            m = calMonth === 0 ? 11 : calMonth - 1;
            y = calMonth === 0 ? calYear - 1 : calYear;
            day.classList.add('other-month');
        } else if (i >= firstDay + daysInMonth) {
            d = i - firstDay - daysInMonth + 1;
            m = calMonth === 11 ? 0 : calMonth + 1;
            y = calMonth === 11 ? calYear + 1 : calYear;
            day.classList.add('other-month');
        } else {
            d = i - firstDay + 1;
            m = calMonth;
            y = calYear;
        }

        iso = y + '-' + String(m + 1).padStart(2,'0') + '-' + String(d).padStart(2,'0');
        day.textContent = d;
        day.setAttribute('data-date', iso);

        if (!day.classList.contains('other-month') && y === todayY && m === todayM && d === todayD) {
            day.classList.add('today');
        }
        if (APPT_DATES.indexOf(iso) !== -1) {
            day.classList.add('has-appt');
            day.title = 'Has appointments on ' + iso;
        }
        if (iso === ACTIVE_DATE) {
            day.classList.add('active-filter');
        }
        if (day.classList.contains('has-appt') || !day.classList.contains('other-month')) {
            day.addEventListener('click', function() {
                var dt = this.getAttribute('data-date');
                if (this.classList.contains('has-appt')) {
                    filterByDate(dt);
                }
            });
        }
        grid.appendChild(day);
    }
}

function filterByDate(date) {
    document.getElementById('filterDate').value = date;
    document.getElementById('filterForm').submit();
}

/* ── Modal helpers ── */
function closeModal(id) { document.getElementById(id).classList.remove('open'); }
document.querySelectorAll('.modal-overlay').forEach(function(o){
    o.addEventListener('click', function(e){ if (e.target === o) o.classList.remove('open'); });
});

/* ── AJAX helper ── */
function ajax(url, data, cb, errCb) {
    var form = new FormData();
    Object.keys(data).forEach(function(k){ form.append(k, data[k]); });
    fetch(url, { method: 'POST', body: form })
        .then(function(r){ return r.json(); })
        .then(function(res){
            if (res.error) { showToast(res.error, 'error'); if (errCb) errCb(); return; }
            if (cb) cb(res);
        })
        .catch(function(){ showToast('Request failed.', 'error'); if (errCb) errCb(); });
}
</script>
</body>
</html>
