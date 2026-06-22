<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Team Schedule – Busy Slots</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
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
        .btn-nav {
            background: rgba(255,255,255,0.18); color: #fff; border: 1px solid rgba(255,255,255,0.3);
            padding: 5px 14px; border-radius: 20px; font-size: 12px; cursor: pointer;
            text-decoration: none; transition: background 0.2s;
        }
        .btn-nav:hover { background: rgba(255,255,255,0.3); }

        /* ── Wrap ── */
        .wrap { padding: 20px 24px; }

        /* ── Page header ── */
        .page-header {
            display: flex; align-items: flex-start; justify-content: space-between;
            margin-bottom: 16px; gap: 12px; flex-wrap: wrap;
        }
        .page-header-left h2 {
            font-size: 20px; font-weight: 700; color: #1a1a2e;
            display: flex; align-items: center; gap: 8px;
        }
        .page-header-left p { font-size: 12px; color: #666; margin-top: 3px; }
        .page-header-right { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }

        .btn-export {
            background: #fff; border: 1px solid #d0d7de; color: #333;
            padding: 7px 16px; border-radius: 8px; font-size: 12px; font-weight: 600;
            cursor: pointer; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;
            transition: background 0.2s; white-space: nowrap;
        }
        .btn-export:hover { background: #f6f8fa; }

        /* ── Week navigation ── */
        .week-nav {
            display: flex; align-items: center; gap: 8px;
            background: #fff; border: 1px solid #d0d7de; border-radius: 8px; padding: 5px 10px;
        }
        .week-nav .week-label { font-size: 13px; font-weight: 600; white-space: nowrap; padding: 0 6px; }
        .week-nav a {
            background: none; border: none; color: #1a73e8; cursor: pointer;
            font-size: 16px; text-decoration: none; padding: 2px 6px; border-radius: 4px;
            line-height: 1; transition: background 0.15s;
        }
        .week-nav a:hover { background: #e8f0fe; }

        /* ── Filter bar ── */
        .filter-bar {
            background: #fff; border: 1px solid #d0d7de; border-radius: 10px;
            padding: 12px 16px; margin-bottom: 16px;
            display: flex; align-items: center; gap: 10px; flex-wrap: wrap;
        }
        .filter-bar select,
        .filter-bar input[type="date"] {
            border: 1px solid #d0d7de; border-radius: 6px; padding: 6px 10px;
            font-size: 12px; color: #333; background: #fff; height: 34px;
        }
        .filter-bar select { min-width: 150px; }
        .filter-bar .sep { color: #aaa; font-size: 14px; }
        .btn-filter {
            background: #1a73e8; color: #fff; border: none;
            padding: 7px 18px; border-radius: 6px; font-size: 12px; font-weight: 600;
            cursor: pointer; height: 34px;
        }
        .btn-filter:hover { background: #1558b0; }
        .btn-reset {
            background: #f0f4f8; color: #555; border: 1px solid #d0d7de;
            padding: 7px 14px; border-radius: 6px; font-size: 12px; font-weight: 600;
            cursor: pointer; text-decoration: none; height: 34px; display: inline-flex; align-items: center;
        }
        .btn-reset:hover { background: #e2e8f0; }

        /* ── Schedule table container ── */
        .schedule-wrap {
            background: #fff; border: 1px solid #d0d7de; border-radius: 10px;
            overflow: auto; box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        /* ── Schedule table ── */
        .sched-table { border-collapse: collapse; width: 100%; min-width: 900px; }

        .sched-table th {
            background: #f8fafc; border-bottom: 2px solid #e2e8f0;
            padding: 10px 12px; font-size: 11px; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.5px; color: #555;
            white-space: nowrap; text-align: center;
        }
        .sched-table th.col-member { text-align: left; min-width: 180px; position: sticky; left: 0; background: #f8fafc; z-index: 2; }
        .sched-table th .day-name { font-size: 11px; color: #888; }
        .sched-table th .day-num  { font-size: 15px; font-weight: 700; color: #222; line-height: 1.2; }
        .sched-table th.today-col .day-num { color: #1a73e8; }
        .sched-table th.today-col { border-top: 2px solid #1a73e8; }

        .sched-table td {
            border: 1px solid #f0f0f0; padding: 8px; vertical-align: top;
            min-width: 130px; min-height: 60px;
        }
        .sched-table td.col-member {
            position: sticky; left: 0; background: #fff; z-index: 1;
            border-right: 2px solid #e2e8f0; min-width: 180px;
        }
        .sched-table tr:hover td { background: #fafcff; }
        .sched-table tr:hover td.col-member { background: #f0f7ff; }

        /* ── Member cell ── */
        .member-cell { display: flex; align-items: center; gap: 10px; padding: 4px 0; }
        .member-avatar {
            width: 36px; height: 36px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 13px; font-weight: 700; color: #fff; flex-shrink: 0;
        }
        .member-info .member-name { font-weight: 600; font-size: 13px; color: #222; }
        .member-info .member-role { font-size: 11px; color: #888; margin-top: 1px; }

        /* ── Appointment chips ── */
        .appt-list { display: flex; flex-direction: column; gap: 5px; }
        .appt-chip {
            background: #f0f7ff; border-left: 3px solid #1a73e8;
            border-radius: 4px; padding: 5px 7px; font-size: 11px;
            cursor: default; transition: transform 0.1s;
        }
        .appt-chip:hover { transform: translateY(-1px); }
        .appt-chip .chip-time { font-weight: 700; font-size: 11px; margin-bottom: 2px; }
        .appt-chip .chip-client { color: #222; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 130px; }
        .appt-chip .chip-service { color: #666; font-size: 10px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 130px; }

        .no-appt { color: #bbb; font-size: 11px; text-align: center; padding: 10px 0; }

        .more-link {
            font-size: 11px; color: #1a73e8; font-weight: 600;
            cursor: pointer; margin-top: 3px; display: inline-block; text-decoration: none;
        }
        .more-link:hover { text-decoration: underline; }
        .hidden-chips { display: none; }
        .hidden-chips.show { display: flex; flex-direction: column; gap: 5px; margin-top: 3px; }

        /* ── Chip color palette (by index) ── */
        .c0 { border-left-color: #1a73e8; background: #e8f0fe; } .c0 .chip-time { color: #1a73e8; }
        .c1 { border-left-color: #27ae60; background: #e8f5e9; } .c1 .chip-time { color: #27ae60; }
        .c2 { border-left-color: #f39c12; background: #fff8e1; } .c2 .chip-time { color: #e67e00; }
        .c3 { border-left-color: #6f42c1; background: #f3e5f5; } .c3 .chip-time { color: #6f42c1; }
        .c4 { border-left-color: #17a2b8; background: #e0f7fa; } .c4 .chip-time { color: #17a2b8; }
        .c5 { border-left-color: #e91e63; background: #fce4ec; } .c5 .chip-time { color: #e91e63; }
        .c6 { border-left-color: #795548; background: #efebe9; } .c6 .chip-time { color: #795548; }
        .c7 { border-left-color: #009688; background: #e0f2f1; } .c7 .chip-time { color: #009688; }

        /* ── Avatar colors ── */
        .av0 { background: #1a73e8; } .av1 { background: #27ae60; }
        .av2 { background: #f39c12; } .av3 { background: #6f42c1; }
        .av4 { background: #17a2b8; } .av5 { background: #e91e63; }
        .av6 { background: #795548; } .av7 { background: #009688; }

        /* ── Footer bar ── */
        .footer-bar {
            margin-top: 12px; display: flex; justify-content: space-between;
            align-items: center; font-size: 11px; color: #888; flex-wrap: wrap; gap: 8px;
        }
        .total-badge {
            background: #1a73e8; color: #fff;
            padding: 4px 14px; border-radius: 20px; font-size: 12px; font-weight: 700;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="brand">
        &#128197; Team Schedule
    </div>
    <div class="nav-right">
        <span style="font-size:12px;opacity:.8;"><?= session()->get('appoint_admin_name') ?: session()->get('firstname') . ' ' . session()->get('lastname') ?></span>
        <a href="<?= base_url('appoint/AppointAdmin/dashboard') ?>" class="btn-nav">&#8592; Dashboard</a>
        <a href="<?= base_url('appoint/AppointAdmin/logout') ?>" class="btn-nav">Logout</a>
    </div>
</nav>

<div class="wrap">

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-left">
            <h2>&#128197; Team Schedule <span style="font-size:14px;font-weight:400;color:#666;">(Busy Slots)</span></h2>
            <p>View all scheduled (busy) appointment slots for team members.</p>
        </div>
        <div class="page-header-right">
            <!-- Export CSV -->
            <a class="btn-export" href="<?= base_url('appoint/AppointAdmin/team_schedule_export') ?>?from=<?= esc($fFrom) ?>&to=<?= esc($fTo) ?>&member=<?= urlencode($fMember) ?>&service=<?= urlencode($fService) ?>">
                &#8681; Export CSV
            </a>
            <!-- Week navigation -->
            <div class="week-nav">
                <a href="<?= base_url('appoint/AppointAdmin/team_schedule') ?>?week=<?= esc($prevWeek) ?>&member=<?= urlencode($fMember) ?>&service=<?= urlencode($fService) ?>">&#8592;</a>
                <span class="week-label">
                    <?= date('M j', strtotime($fFrom)) ?> &ndash; <?= date('M j, Y', strtotime($fTo)) ?>
                </span>
                <a href="<?= base_url('appoint/AppointAdmin/team_schedule') ?>?week=<?= esc($nextWeek) ?>&member=<?= urlencode($fMember) ?>&service=<?= urlencode($fService) ?>">&#8594;</a>
            </div>
            <!-- Calendar icon date range -->
            <span style="font-size:12px;color:#555;background:#fff;border:1px solid #d0d7de;border-radius:6px;padding:6px 12px;">
                &#128197; <?= date('M j', strtotime($fFrom)) ?> &ndash; <?= date('M j, Y', strtotime($fTo)) ?>
            </span>
        </div>
    </div>

    <!-- Filter bar -->
    <form method="get" action="<?= base_url('appoint/AppointAdmin/team_schedule') ?>">
        <div class="filter-bar">
            <!-- Member filter -->
            <select name="member">
                <option value="">All Members</option>
                <?php foreach ($teamMembers as $tm):
                    $tmName = $tm['firstname'] . ' ' . $tm['lastname'];
                ?>
                <option value="<?= esc($tmName) ?>" <?= $fMember === $tmName ? 'selected' : '' ?>><?= esc($tmName) ?></option>
                <?php endforeach; ?>
            </select>

            <!-- Service filter -->
            <select name="service">
                <option value="">All Services</option>
                <?php foreach ($services as $svc): ?>
                <option value="<?= esc($svc) ?>" <?= $fService === $svc ? 'selected' : '' ?>><?= esc($svc) ?></option>
                <?php endforeach; ?>
            </select>

            <!-- Date range -->
            <input type="date" name="from" value="<?= esc($fFrom) ?>">
            <span class="sep">—</span>
            <input type="date" name="to" value="<?= esc($fTo) ?>">

            <button type="submit" class="btn-filter">Filter</button>
            <a href="<?= base_url('appoint/AppointAdmin/team_schedule') ?>" class="btn-reset">Reset</a>
        </div>
    </form>

    <!-- Schedule table -->
    <div class="schedule-wrap">
        <table class="sched-table">
            <thead>
                <tr>
                    <th class="col-member">TEAM MEMBER</th>
                    <?php foreach ($weekDays as $day):
                        $isToday = ($day === date('Y-m-d'));
                    ?>
                    <th class="<?= $isToday ? 'today-col' : '' ?>">
                        <div class="day-name"><?= strtoupper(date('D', strtotime($day))) ?></div>
                        <div class="day-num"><?= date('M j', strtotime($day)) ?></div>
                    </th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $avatarColors = ['av0','av1','av2','av3','av4','av5','av6','av7'];
                $chipColors   = ['c0','c1','c2','c3','c4','c5','c6','c7'];
                $memberIdx    = 0;

                foreach ($teamMembers as $tm):
                    $tmName  = $tm['firstname'] . ' ' . $tm['lastname'];
                    $initials = strtoupper(substr($tm['firstname'], 0, 1) . substr($tm['lastname'], 0, 1));
                    $avClass  = $avatarColors[$memberIdx % 8];
                    $chipCls  = $chipColors[$memberIdx % 8];
                    $role     = ($tm['type'] === 'Admin') ? 'Senior Consultant' : 'Consultant';

                    // Skip row if member filter is active and doesn't match
                    if (!empty($fMember) && stripos($tmName, $fMember) === false) {
                        $memberIdx++;
                        continue;
                    }
                ?>
                <tr>
                    <td class="col-member">
                        <div class="member-cell">
                            <div class="member-avatar <?= $avClass ?>"><?= $initials ?></div>
                            <div class="member-info">
                                <div class="member-name"><?= esc($tmName) ?></div>
                                <div class="member-role"><?= $role ?></div>
                            </div>
                        </div>
                    </td>

                    <?php foreach ($weekDays as $day):
                        $dayAppts = $schedule[$tmName][$day] ?? [];
                        $shown    = array_slice($dayAppts, 0, 2);
                        $hidden   = array_slice($dayAppts, 2);
                        $cellId   = 'cell_' . preg_replace('/\W/', '_', $tmName) . '_' . str_replace('-', '', $day);
                    ?>
                    <td>
                        <?php if (empty($dayAppts)): ?>
                            <div class="no-appt">No Appointments</div>
                        <?php else: ?>
                            <div class="appt-list">
                                <?php foreach ($shown as $appt): ?>
                                <div class="appt-chip <?= $chipCls ?>">
                                    <div class="chip-time"><?= date('g:i A', strtotime($appt['appointment_time'])) ?></div>
                                    <div class="chip-client"><?= esc($appt['client_name']) ?></div>
                                    <div class="chip-service"><?= esc($appt['service_type']) ?></div>
                                </div>
                                <?php endforeach; ?>

                                <?php if (!empty($hidden)): ?>
                                <div class="hidden-chips" id="<?= $cellId ?>">
                                    <?php foreach ($hidden as $appt): ?>
                                    <div class="appt-chip <?= $chipCls ?>">
                                        <div class="chip-time"><?= date('g:i A', strtotime($appt['appointment_time'])) ?></div>
                                        <div class="chip-client"><?= esc($appt['client_name']) ?></div>
                                        <div class="chip-service"><?= esc($appt['service_type']) ?></div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <a class="more-link" onclick="toggleMore('<?= $cellId ?>', this)">+ <?= count($hidden) ?> more</a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </td>
                    <?php endforeach; ?>
                </tr>
                <?php
                    $memberIdx++;
                endforeach;
                ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="footer-bar">
        <span>&#8505; Showing busy (scheduled) slots for all team members in PST timezone.</span>
        <span>Total Busy Slots: <strong class="total-badge"><?= $totalBusy ?></strong></span>
    </div>

</div>

<script>
function toggleMore(cellId, link) {
    var el = document.getElementById(cellId);
    if (el.classList.contains('show')) {
        el.classList.remove('show');
        var count = el.querySelectorAll('.appt-chip').length;
        link.textContent = '+ ' + count + ' more';
    } else {
        el.classList.add('show');
        link.textContent = '▲ less';
    }
}
</script>

</body>
</html>
