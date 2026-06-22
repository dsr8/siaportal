<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>My Appointment</title>
    <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }

        /* ── Page layout ── */
        .appt-wrap { display: flex; gap: 22px; align-items: flex-start; padding: 20px 24px 40px; }
        .sidebar   { width: 270px; flex-shrink: 0; position: sticky; top: 66px; }
        .main-col  { flex: 1; min-width: 0; }

        /* ── Top bar ── */
        .top-bar {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 22px; flex-wrap: wrap; gap: 10px;
        }
        .top-bar h2 { font-size: 20px; font-weight: 700; color: #1a1a2e; margin: 0; }
        .btn-add-appt {
            background: linear-gradient(135deg, #6f42c1, #4a2d8a);
            color: #fff; border: none; padding: 9px 18px;
            border-radius: 8px; font-size: 13px; font-weight: 600;
            text-decoration: none; display: inline-flex; align-items: center; gap: 6px;
            box-shadow: 0 3px 10px rgba(111,66,193,0.3);
            transition: opacity 0.2s, transform 0.1s;
        }
        .btn-add-appt:hover { opacity: 0.9; color: #fff; text-decoration: none; }
        .btn-add-appt:active { transform: scale(0.97); }

        /* ── Calendar widget ── */
        .cal-widget {
            background: #fff; border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.09);
            overflow: hidden; margin-bottom: 18px;
        }
        .cal-hdr {
            background: linear-gradient(135deg, #1a73e8, #0d47a1);
            padding: 14px 16px 12px; color: #fff;
            display: flex; align-items: center; justify-content: space-between;
        }
        .cal-hdr .cal-title { font-size: 14px; font-weight: 700; }
        .cal-nav-btn {
            background: rgba(255,255,255,0.2); border: none; color: #fff;
            width: 28px; height: 28px; border-radius: 50%; cursor: pointer;
            font-size: 16px; display: flex; align-items: center; justify-content: center;
            transition: background 0.2s;
        }
        .cal-nav-btn:hover { background: rgba(255,255,255,0.35); }
        .cal-body { padding: 10px 12px 14px; }
        .cal-dow {
            display: grid; grid-template-columns: repeat(7,1fr);
            text-align: center; margin-bottom: 4px;
        }
        .cal-dow span { font-size: 10px; font-weight: 700; color: #aaa; padding: 3px 0; }
        .cal-days { display: grid; grid-template-columns: repeat(7,1fr); gap: 2px; }
        .cal-day {
            text-align: center; font-size: 12px; color: #333;
            padding: 5px 2px; border-radius: 50%;
            cursor: pointer; transition: background 0.15s; line-height: 1.3;
            position: relative; width: 30px; height: 30px;
            display: flex; align-items: center; justify-content: center;
            margin: 1px auto;
        }
        .cal-day:hover:not(.empty) { background: #f0f4f8; }
        .cal-day.empty { cursor: default; pointer-events: none; }
        .cal-day.other-month { color: #ddd; }
        .cal-day.today { background: #1a73e8; color: #fff; font-weight: 700; }
        .cal-day.today:hover { background: #1557b0; }
        .cal-day.has-appt::after {
            content: ''; display: block; width: 5px; height: 5px;
            background: #e74c3c; border-radius: 50%;
            position: absolute; bottom: 2px; left: 50%; transform: translateX(-50%);
        }
        .cal-day.today.has-appt::after { background: #fff; }
        .cal-day.selected:not(.today) { background: #e8f0fe; color: #1a73e8; font-weight: 700; }
        .cal-legend {
            padding: 0 12px 12px; font-size: 10px; color: #999;
            display: flex; gap: 12px; border-top: 1px solid #f0f0f0; padding-top: 8px;
        }
        .cal-legend span { display: flex; align-items: center; gap: 4px; }
        .dot { width: 7px; height: 7px; border-radius: 50%; display: inline-block; }

        /* ── Stats mini strip ── */
        .stats-strip {
            display: grid; grid-template-columns: repeat(2,1fr); gap: 10px;
            margin-bottom: 18px;
        }
        .stat-chip {
            background: #fff; border-radius: 10px;
            padding: 12px 14px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            border-left: 3px solid #ccc;
            text-align: center;
        }
        .stat-chip .sv { font-size: 22px; font-weight: 700; line-height: 1; }
        .stat-chip .sl { font-size: 10px; color: #999; margin-top: 2px; text-transform: uppercase; letter-spacing: 0.4px; font-weight: 600; }
        .sc-today  { border-left-color: #e74c3c; } .sc-today .sv  { color: #e74c3c; }
        .sc-tom    { border-left-color: #e67e22; } .sc-tom .sv    { color: #e67e22; }
        .sc-dayaft { border-left-color: #2980b9; } .sc-dayaft .sv { color: #2980b9; }
        .sc-total  { border-left-color: #6c757d; } .sc-total .sv  { color: #6c757d; }

        /* ── Section ── */
        .appt-section { margin-bottom: 26px; }
        .section-hdr {
            display: flex; align-items: center; justify-content: space-between;
            padding: 12px 18px; border-radius: 12px 12px 0 0;
            color: #fff; font-size: 14px; font-weight: 700;
        }
        .section-hdr .hdr-right { font-size: 12px; font-weight: 400; opacity: 0.85; }
        .sh-today   { background: linear-gradient(135deg, #e74c3c, #c0392b); }
        .sh-tomorrow{ background: linear-gradient(135deg, #e67e22, #ca6f1e); }
        .sh-dayafter{ background: linear-gradient(135deg, #2980b9, #1a6fa0); }
        .sh-rest    { background: linear-gradient(135deg, #4a4a6a, #2d2d4e); }
        .section-body {
            background: #f8f9fc; border: 1px solid #e8ecf0; border-top: none;
            border-radius: 0 0 12px 12px; padding: 14px;
        }

        /* ── Appointment Cards ── */
        .cards-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 12px; }
        .appt-card {
            background: #fff; border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
            border-top: 3px solid #ccc;
            padding: 14px; position: relative;
            transition: transform 0.15s, box-shadow 0.15s;
        }
        .appt-card:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(0,0,0,0.12); }
        .appt-card.s0 { border-top-color: #f39c12; }
        .appt-card.s1 { border-top-color: #27ae60; }
        .appt-card.s2 { border-top-color: #2980b9; }
        .appt-card.s3 { border-top-color: #e74c3c; }

        .card-time {
            font-size: 18px; font-weight: 800; color: #1a1a2e;
            margin-bottom: 10px; display: flex; align-items: center; gap: 6px;
        }
        .card-time span { font-size: 11px; font-weight: 600; padding: 2px 8px; border-radius: 10px; }
        .card-avatar-row { display: flex; align-items: center; gap: 10px; margin-bottom: 8px; }
        .avatar {
            width: 36px; height: 36px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 14px; font-weight: 700; color: #fff;
            flex-shrink: 0; text-transform: uppercase;
        }
        .card-client { flex: 1; min-width: 0; }
        .card-client .name { font-size: 13px; font-weight: 700; color: #1a1a2e; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .card-client .email { font-size: 11px; color: #888; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

        .card-meta { font-size: 11px; color: #666; line-height: 1.8; margin-bottom: 8px; }
        .card-meta i { width: 14px; }

        .service-pill {
            display: inline-block; background: #eef2ff; color: #3d5a99;
            font-size: 10px; font-weight: 600; padding: 3px 8px; border-radius: 10px;
            margin-bottom: 6px; max-width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
        }
        .assigned-pill {
            display: inline-flex; align-items: center; gap: 4px;
            background: #e8f5e9; color: #2e7d32;
            font-size: 10px; font-weight: 600; padding: 3px 8px; border-radius: 10px;
            margin-bottom: 6px;
        }
        .unassigned-pill {
            display: inline-flex; align-items: center; gap: 4px;
            background: #f5f5f5; color: #aaa;
            font-size: 10px; font-weight: 600; padding: 3px 8px; border-radius: 10px;
            margin-bottom: 6px;
        }

        .status-badge {
            font-size: 10px; font-weight: 700; padding: 3px 8px;
            border-radius: 10px; display: inline-block;
        }
        .sb0 { background:#fef3cd; color:#856404; }
        .sb1 { background:#d1e7dd; color:#0f5132; }
        .sb2 { background:#cfe2ff; color:#084298; }
        .sb3 { background:#f8d7da; color:#842029; }

        .card-footer-btns { display: flex; gap: 6px; margin-top: 10px; padding-top: 8px; border-top: 1px solid #f0f0f0; }
        .card-footer-btns a {
            flex: 1; text-align: center; font-size: 11px; font-weight: 600;
            padding: 5px; border-radius: 6px; text-decoration: none;
            transition: opacity 0.2s;
        }
        .card-footer-btns a:hover { opacity: 0.8; text-decoration: none; }
        .btn-edit-card { background: #fff8e1; color: #e65100; border: 1px solid #ffe0b2; }
        .btn-del-card  { background: #fce4ec; color: #c62828; border: 1px solid #f8bbd0; }

        .empty-state {
            text-align: center; padding: 30px; color: #bbb; font-size: 13px;
        }
        .empty-state .empty-icon { font-size: 36px; display: block; margin-bottom: 8px; opacity: 0.4; }

        /* ── Rest Table ── */
        .rest-wrap { overflow-x: auto; }
        .rest-tbl { width: 100%; border-collapse: collapse; }
        .rest-tbl thead tr { background: #f0f2f8; }
        .rest-tbl th {
            padding: 10px 12px; font-size: 11px; font-weight: 700;
            color: #555; text-transform: uppercase; letter-spacing: 0.4px;
            border-bottom: 2px solid #e0e4f0; white-space: nowrap;
        }
        .rest-tbl td { padding: 10px 12px; font-size: 12px; border-bottom: 1px solid #f0f2f8; vertical-align: middle; }
        .rest-tbl tr:hover td { background: #f8f9fd; }
        .date-row td {
            background: linear-gradient(135deg, #f0f2f8, #e8ecf8);
            color: #333; font-weight: 700; font-size: 12px;
            padding: 7px 12px;
        }
        .tbl-avatar {
            width: 28px; height: 28px; border-radius: 50%;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 11px; font-weight: 700; color: #fff; vertical-align: middle; margin-right: 7px;
        }
        .tbl-act a {
            font-size: 11px; padding: 3px 9px; border-radius: 4px;
            text-decoration: none; font-weight: 600; display: inline-block;
        }
        .tbl-act a.e { background: #fff8e1; color: #e65100; }
        .tbl-act a.d { background: #fce4ec; color: #c62828; margin-left: 4px; }

        /* ── Avatar colors ── */
        .av-0 { background: #e74c3c; }
        .av-1 { background: #9b59b6; }
        .av-2 { background: #2980b9; }
        .av-3 { background: #27ae60; }
        .av-4 { background: #f39c12; }
        .av-5 { background: #16a085; }
        .av-6 { background: #d35400; }
        .av-7 { background: #7f8c8d; }

        @media(max-width:860px) {
            .appt-wrap { flex-direction: column; }
            .sidebar { width: 100%; position: static; }
            .stats-strip { grid-template-columns: repeat(4,1fr); }
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
                <div class="appt-wrap">

                    <!-- ── Sidebar ── -->
                    <div class="sidebar">

                        <!-- Stats -->
                        <div class="stats-strip">
                            <div class="stat-chip sc-today">
                                <div class="sv"><?php echo count($today); ?></div>
                                <div class="sl">Today</div>
                            </div>
                            <div class="stat-chip sc-tom">
                                <div class="sv"><?php echo count($tomorrow); ?></div>
                                <div class="sl">Tomorrow</div>
                            </div>
                            <?php
                            $totalCount = count($today)+count($tomorrow)+count($dayafter)+count($rest);
                            ?>
                            <div class="stat-chip sc-dayaft">
                                <div class="sv"><?php echo count($dayafter); ?></div>
                                <div class="sl">Day After</div>
                            </div>
                            <div class="stat-chip sc-total">
                                <div class="sv"><?php echo $totalCount; ?></div>
                                <div class="sl">Total</div>
                            </div>
                        </div>

                        <!-- Calendar -->
                        <div class="cal-widget">
                            <div class="cal-hdr">
                                <button class="cal-nav-btn" id="calPrev">&#8249;</button>
                                <span class="cal-title" id="calMonthYear"></span>
                                <button class="cal-nav-btn" id="calNext">&#8250;</button>
                            </div>
                            <div class="cal-body">
                                <div class="cal-dow">
                                    <span>Su</span><span>Mo</span><span>Tu</span>
                                    <span>We</span><span>Th</span><span>Fr</span><span>Sa</span>
                                </div>
                                <div class="cal-days" id="calDays"></div>
                            </div>
                            <div class="cal-legend">
                                <span><i class="dot" style="background:#1a73e8;"></i> Today</span>
                                <span><i class="dot" style="background:#e74c3c;"></i> Has appointment</span>
                            </div>
                        </div>

                    </div><!-- /sidebar -->

                    <!-- ── Main ── -->
                    <div class="main-col">

                        <div class="top-bar">
                            <h2>&#128197; My Appointments</h2>
                        </div>

                        <?php
                        $statuses   = [0=>'Pending', 1=>'Confirmed', 2=>'Completed', 3=>'Cancelled'];
                        $avColors   = ['av-0','av-1','av-2','av-3','av-4','av-5','av-6','av-7'];

                        function getInitials($name) {
                            $parts = explode(' ', trim($name));
                            $i = strtoupper(substr($parts[0], 0, 1));
                            if (isset($parts[1])) $i .= strtoupper(substr($parts[1], 0, 1));
                            return $i ?: '?';
                        }
                        function avatarColor($name) {
                            $colors = ['av-0','av-1','av-2','av-3','av-4','av-5','av-6','av-7'];
                            return $colors[abs(crc32($name)) % count($colors)];
                        }

                        function renderCards($rows, $statuses, $showDate = false) {
                            if (empty($rows)) {
                                echo '<div class="empty-state"><span class="empty-icon">📭</span>No appointments scheduled.</div>';
                                return;
                            }
                            echo '<div class="cards-grid">';
                            foreach ($rows as $r) {
                                $s    = (int)$r['status'];
                                $lbl  = $statuses[$s] ?? '';
                                $init = getInitials($r['client_name']);
                                $avc  = avatarColor($r['client_name']);
                                echo '<div class="appt-card s' . $s . '">';

                                // Date (only for Upcoming section)
                                if ($showDate) {
                                    $apptDate = (string)($r['appointment_date'] ?? '');
                                    if ($apptDate !== '' && $apptDate !== '0000-00-00') {
                                        echo '<div style="font-size:11px;font-weight:700;color:#1a73e8;margin-bottom:3px;">&#128197; ' . htmlspecialchars(date('D, d M Y', strtotime($apptDate))) . '</div>';
                                    }
                                }

                                // Time + Status
                                echo '<div class="card-time">';
                                echo '&#128336; ' . htmlspecialchars(date('h:i A', strtotime($r['appointment_time'])));
                                echo '<span class="sb' . $s . '">' . $lbl . '</span>';
                                echo '</div>';

                                // Avatar + Name
                                echo '<div class="card-avatar-row">';
                                echo '<div class="avatar ' . $avc . '">' . $init . '</div>';
                                echo '<div class="card-client">';
                                echo '<div class="name" title="' . htmlspecialchars($r['client_name']) . '">' . htmlspecialchars($r['client_name']) . '</div>';
                                if ($r['client_email']) echo '<div class="email">' . htmlspecialchars($r['client_email']) . '</div>';
                                echo '</div>';
                                echo '</div>';

                                // Phone
                                if ($r['client_phone']) {
                                    echo '<div class="card-meta">&#128222; ' . htmlspecialchars($r['client_phone']) . '</div>';
                                }

                                // Service
                                echo '<div><span class="service-pill" title="' . htmlspecialchars($r['service_type']) . '">&#128203; ' . htmlspecialchars($r['service_type']) . '</span></div>';

                                // Consultation type + contact method / office location
                                if (!empty($r['consultation_type'])) {
                                    if ($r['consultation_type'] === 'Telephonic') {
                                        $method = !empty($r['contact_method']) ? ' &bull; ' . htmlspecialchars($r['contact_method']) : '';
                                        echo '<div><span style="background:#e3f2fd;color:#1565c0;padding:2px 8px;border-radius:10px;font-size:10px;font-weight:600;">&#128222; Telephonic' . $method . '</span></div>';
                                    } else {
                                        $loc = !empty($r['office_location']) ? ' &bull; &#128205; ' . htmlspecialchars($r['office_location']) : '';
                                        echo '<div><span style="background:#f3e5f5;color:#6a1b9a;padding:2px 8px;border-radius:10px;font-size:10px;font-weight:600;">&#127970; In-Person' . $loc . '</span></div>';
                                    }
                                }

                                // Assigned
                                if (!empty($r['assigned_to'])) {
                                    echo '<div><span class="assigned-pill">&#128100; ' . htmlspecialchars($r['assigned_to']) . '</span></div>';
                                }

                                echo '</div>';
                            }
                            echo '</div>';
                        }
                        ?>

                        <!-- TODAY -->
                        <div class="appt-section" id="section-<?php echo date('Y-m-d'); ?>">
                            <div class="section-hdr sh-today">
                                <span>&#128197; Today &mdash; <?php echo date('D, d M Y'); ?></span>
                                <span class="hdr-right"><?php echo count($today); ?> appointment<?php echo count($today)!=1?'s':''; ?></span>
                            </div>
                            <div class="section-body"><?php renderCards($today, $statuses); ?></div>
                        </div>

                        <!-- TOMORROW -->
                        <div class="appt-section" id="section-<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                            <div class="section-hdr sh-tomorrow">
                                <span>&#128198; Tomorrow &mdash; <?php echo date('D, d M Y', strtotime('+1 day')); ?></span>
                                <span class="hdr-right"><?php echo count($tomorrow); ?> appointment<?php echo count($tomorrow)!=1?'s':''; ?></span>
                            </div>
                            <div class="section-body"><?php renderCards($tomorrow, $statuses); ?></div>
                        </div>

                        <!-- DAY AFTER -->
                        <div class="appt-section" id="section-<?php echo date('Y-m-d', strtotime('+2 days')); ?>">
                            <div class="section-hdr sh-dayafter">
                                <span>&#128199; Day After Tomorrow &mdash; <?php echo date('D, d M Y', strtotime('+2 days')); ?></span>
                                <span class="hdr-right"><?php echo count($dayafter); ?> appointment<?php echo count($dayafter)!=1?'s':''; ?></span>
                            </div>
                            <div class="section-body"><?php renderCards($dayafter, $statuses); ?></div>
                        </div>

                        <!-- REST -->
                        <div class="appt-section" id="section-rest">
                            <div class="section-hdr sh-rest">
                                <span>&#128203; All Upcoming Appointments</span>
                                <span class="hdr-right"><?php echo count($rest); ?> total</span>
                            </div>
                            <div class="section-body"><?php renderCards($rest, $statuses, true); ?></div>
                        </div>

                    </div><!-- /main-col -->
                </div><!-- /appt-wrap -->
            </main>
            <footer class="py-4 bg-light mt-auto"><div class="container-fluid"></div></footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>

    <?php
    $allDates = [];
    foreach (array_merge($today, $tomorrow, $dayafter, $rest) as $r) {
        $allDates[] = $r['appointment_date'];
    }
    $allDates = array_unique($allDates);
    ?>
    <script>
    var apptDates = <?php echo json_encode(array_values($allDates)); ?>;

    (function() {
        var today    = new Date();
        var curYear  = today.getFullYear();
        var curMonth = today.getMonth();
        var months   = ['January','February','March','April','May','June',
                        'July','August','September','October','November','December'];

        function pad(n) { return n < 10 ? '0' + n : '' + n; }
        function ds(y,m,d) { return y+'-'+pad(m+1)+'-'+pad(d); }

        function build(year, month) {
            document.getElementById('calMonthYear').textContent = months[month] + ' ' + year;
            var first   = new Date(year, month, 1).getDay();
            var days    = new Date(year, month+1, 0).getDate();
            var todayDs = ds(today.getFullYear(), today.getMonth(), today.getDate());
            var prevDays = new Date(year, month, 0).getDate();
            var html = '';

            var total = first + days;
            total = total <= 35 ? 35 : 42;

            for (var i = 0; i < total; i++) {
                var d, iso, cls = 'cal-day';
                if (i < first) {
                    d = prevDays - first + i + 1;
                    var pm = month === 0 ? 11 : month - 1;
                    var py = month === 0 ? year - 1 : year;
                    iso = ds(py, pm, d);
                    cls += ' other-month';
                } else if (i >= first + days) {
                    d = i - first - days + 1;
                    var nm = month === 11 ? 0 : month + 1;
                    var ny = month === 11 ? year + 1 : year;
                    iso = ds(ny, nm, d);
                    cls += ' other-month';
                } else {
                    d = i - first + 1;
                    iso = ds(year, month, d);
                }
                if (iso === todayDs) cls += ' today';
                if (apptDates.indexOf(iso) !== -1) cls += ' has-appt';
                html += '<div class="' + cls + '" data-date="' + iso + '" style="width:30px;height:30px;">' + d + '</div>';
            }

            document.getElementById('calDays').innerHTML = html;

            document.querySelectorAll('.cal-day[data-date]').forEach(function(el) {
                el.addEventListener('click', function() {
                    document.querySelectorAll('.cal-day.selected').forEach(function(s){ s.classList.remove('selected'); });
                    el.classList.add('selected');
                    var target = document.getElementById('section-' + el.getAttribute('data-date'));
                    if (!target) target = document.getElementById('section-rest');
                    if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                });
            });
        }

        build(curYear, curMonth);
        document.getElementById('calPrev').addEventListener('click', function() {
            if (--curMonth < 0) { curMonth = 11; curYear--; } build(curYear, curMonth);
        });
        document.getElementById('calNext').addEventListener('click', function() {
            if (++curMonth > 11) { curMonth = 0; curYear++; } build(curYear, curMonth);
        });
    })();
    </script>
</body>
</html>
