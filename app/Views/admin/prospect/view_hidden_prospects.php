<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Hidden Prospects — Siaportal</title>
    <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        * { box-sizing: border-box; }
        .hp-wrap { max-width: 1100px; margin: 30px auto; padding: 0 16px 60px; }
        .btn-back {
            display: inline-flex; align-items: center; gap: 6px;
            color: #2E7D32; text-decoration: none; font-size: 13px; font-weight: 600; margin-bottom: 16px;
        }
        .btn-back:hover { text-decoration: underline; color: #2E7D32; }

        /* Page banner */
        .hp-banner {
            background: linear-gradient(135deg, #2E7D32, #4CAF50);
            border-radius: 16px; padding: 26px 28px; color: #fff;
            display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px;
            margin-bottom: 20px; box-shadow: 0 6px 20px rgba(76,175,80,0.3);
        }
        .hp-banner-left { display: flex; align-items: center; gap: 14px; }
        .hp-banner-icon {
            width: 48px; height: 48px; border-radius: 50%;
            background: rgba(255,255,255,0.18);
            display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0;
        }
        .hp-banner h1 { font-size: 19px; font-weight: 700; margin: 0; }
        .hp-banner p { font-size: 12.5px; opacity: 0.85; margin: 2px 0 0; }
        .hp-banner-count { text-align: right; }
        .hp-banner-count .n { font-size: 30px; font-weight: 800; line-height: 1; }
        .hp-banner-count .l { font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; opacity: 0.85; margin-top: 2px; }

        /* Search bar */
        .hp-search-bar {
            display: flex; gap: 10px; background: #fff; border-radius: 14px; padding: 14px 16px;
            box-shadow: 0 2px 10px rgba(20,20,43,0.06); margin-bottom: 18px; flex-wrap: wrap;
        }
        .hp-search-bar input {
            flex: 1 1 240px; padding: 9px 14px; border: 2px solid #e8ecf0; border-radius: 8px;
            font-size: 13px; color: #333; background: #fafbfc; outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .hp-search-bar input:focus { border-color: #2E7D32; box-shadow: 0 0 0 3px rgba(76,175,80,0.12); background: #fff; }
        .hp-btn-search {
            background: linear-gradient(135deg, #2E7D32, #4CAF50); color: #fff; border: none;
            padding: 9px 20px; border-radius: 8px; font-size: 13px; font-weight: 700; cursor: pointer;
        }
        .hp-btn-search:hover { opacity: 0.92; }
        .hp-btn-reset {
            display: inline-flex; align-items: center; padding: 9px 16px; border-radius: 8px;
            font-size: 13px; font-weight: 700; color: #6b7280; background: #f1f2f4;
            text-decoration: none;
        }
        .hp-btn-reset:hover { background: #e6e7ea; color: #6b7280; text-decoration: none; }

        .hp-table-card { background: #fff; border-radius: 14px; box-shadow: 0 2px 10px rgba(20,20,43,0.06); overflow: hidden; }
        .hp-table-scroll { overflow-x: auto; }
        table.hp-table { width: 100%; border-collapse: collapse; margin: 0; }
        .hp-table thead th {
            background: #f8f9fb; text-align: left; font-size: 12px; font-weight: 700; color: #6b7280;
            text-transform: uppercase; letter-spacing: 0.4px;
            padding: 16px 18px; border-bottom: 1px solid #eef0f2; white-space: nowrap;
        }
        .hp-table tbody td { padding: 16px 18px; border-bottom: 1px solid #f1f2f4; font-size: 13.5px; color: #1f2430; vertical-align: middle; }
        .hp-table tbody tr:last-child td { border-bottom: none; }
        .hp-table tbody tr:hover { background: #faf9fc; }

        .hp-client-cell { display: flex; align-items: center; gap: 10px; }
        .hp-avatar {
            width: 34px; height: 34px; border-radius: 50%; flex-shrink: 0;
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-weight: 700; font-size: 13px;
        }
        .hp-name { font-weight: 700; color: #1f2430; }
        .hp-id { font-size: 11.5px; color: #9aa0aa; margin-top: 2px; }

        .hp-act-unhide {
            display: inline-flex; align-items: center; gap: 6px;
            color: #2E7D32; border: 1px solid #bfe3c2; background: #eef8ef;
            border-radius: 6px; padding: 6px 12px; font-size: 12px; font-weight: 600;
            text-decoration: none; white-space: nowrap;
        }
        .hp-act-unhide:hover { background: #e2f3e3; color: #2E7D32; text-decoration: none; }

        .hp-empty-state { text-align: center; padding: 60px 20px; color: #9aa0aa; }
        .hp-empty-state svg { width: 44px; height: 44px; margin-bottom: 12px; opacity: 0.5; }
        .hp-empty-state .t { font-size: 15px; font-weight: 700; color: #6b7280; }
        .hp-empty-state .s { font-size: 12.5px; color: #b0b4bd; margin-top: 4px; }

        @media (max-width: 780px) {
            .hp-banner { flex-direction: column; align-items: flex-start; }
            .hp-banner-count { text-align: left; }
            .hp-table thead { display: none; }
            .hp-table, .hp-table tbody, .hp-table tr { display: block; width: 100%; }
            .hp-table-scroll { overflow-x: visible; }
            .hp-table tr {
                margin-bottom: 14px; border: 1px solid #eef0f2; border-radius: 12px;
                box-shadow: 0 2px 8px rgba(20,20,43,0.05); overflow: hidden;
            }
            .hp-table td {
                display: block; width: 100%; box-sizing: border-box;
                border-bottom: 1px solid #f4f5f7 !important; padding: 10px 16px !important;
            }
            .hp-table tr td:last-child { border-bottom: none !important; }
            .hp-table td[data-label]::before {
                content: attr(data-label);
                display: block; font-size: 10.5px; font-weight: 800; color: #2E7D32;
                text-transform: uppercase; letter-spacing: 0.4px; margin-bottom: 4px;
            }
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
                <div class="hp-wrap">

                    <a href="<?php echo base_url('Siaportal/view_prospect'); ?>" class="btn-back">&#8592; Back to Prospects</a>

                    <div class="hp-banner">
                        <div class="hp-banner-left">
                            <div class="hp-banner-icon"><i class="fas fa-eye-slash"></i></div>
                            <div>
                                <h1>Hidden Prospects</h1>
                                <p>Prospects that were hidden from the main list</p>
                            </div>
                        </div>
                        <div class="hp-banner-count">
                            <div class="n"><?php echo (int) ($totalHidden ?? 0); ?></div>
                            <div class="l">Hidden Total</div>
                        </div>
                    </div>

                    <form method="get" action="<?php echo base_url('Siaportal/view_hidden_prospects'); ?>" class="hp-search-bar">
                        <input type="text" name="q" value="<?php echo htmlspecialchars($q ?? ''); ?>" placeholder="Search by name, email, or phone">
                        <button type="submit" class="hp-btn-search"><i class="fas fa-search"></i> Search</button>
                        <a href="<?php echo base_url('Siaportal/view_hidden_prospects'); ?>" class="hp-btn-reset">Reset</a>
                    </form>

                    <div class="hp-table-card">
                        <div class="hp-table-scroll">
                        <table class="hp-table">
                            <thead>
                                <tr>
                                    <th>Prospect</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Team Member</th>
                                    <th>Hidden On</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($prospect)): ?>
                                <tr><td colspan="6">
                                    <div class="hp-empty-state">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.94 10.94 0 0 1 12 20c-7 0-11-8-11-8a21.8 21.8 0 0 1 5.06-6.06M9.9 4.24A10.94 10.94 0 0 1 12 4c7 0 11 8 11 8a21.7 21.7 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><path d="M1 1l22 22"/></svg>
                                        <div class="t">No hidden prospects found</div>
                                        <div class="s">Everything you hide from the main list will show up here.</div>
                                    </div>
                                </td></tr>
                                <?php endif; ?>
                                <?php
                                $hpAvatarColors = ['#e23b3b', '#f5a623', '#2ecc71', '#3498db', '#8e44ad', '#e67e22', '#16a085'];
                                ?>
                                <?php foreach ($prospect as $p): ?>
                                <?php
                                    $hpInitial = strtoupper(substr(trim((string) $p['heading']), 0, 1)) ?: '?';
                                    $hpColor   = $hpAvatarColors[(int) $p['id'] % count($hpAvatarColors)];
                                ?>
                                <tr>
                                    <td data-label="Prospect">
                                        <div class="hp-client-cell">
                                            <div class="hp-avatar" style="background:<?php echo $hpColor; ?>;"><?php echo esc($hpInitial); ?></div>
                                            <div>
                                                <div class="hp-name"><?php echo htmlspecialchars($p['heading']); ?></div>
                                                <div class="hp-id">ID: <?php echo (int) $p['id']; ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Email"><?php echo htmlspecialchars($p['email'] ?? '') ?: '&ndash;'; ?></td>
                                    <td data-label="Phone"><?php echo htmlspecialchars($p['number'] ?? '') ?: '&ndash;'; ?></td>
                                    <td data-label="Team Member"><?php echo htmlspecialchars($p['team_member'] ?? '') ?: '&ndash;'; ?></td>
                                    <td data-label="Hidden On"><?php echo !empty($p['hide_prospect_on']) ? esc(date('d M Y', strtotime($p['hide_prospect_on']))) : '&ndash;'; ?></td>
                                    <td data-label="Actions">
                                        <a class="hp-act-unhide" href="<?php echo base_url('Siaportal/unhide_prospect/' . $p['id']); ?>" onclick="return hpConfirmUnhide(event, this);">
                                            <i class="fas fa-eye"></i> Unhide
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        </div>
                    </div>

                    <?php if (!empty($pager)): ?>
                    <div style="margin-top:16px;">
                        <?= $pager->links() ?>
                    </div>
                    <?php endif; ?>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function hpConfirmUnhide(e, el) {
        e.preventDefault();
        Swal.fire({
            icon: 'question',
            title: 'Unhide this prospect?',
            text: 'It will reappear in the main Prospects list.',
            showCancelButton: true,
            confirmButtonText: 'Yes, unhide',
            confirmButtonColor: '#2E7D32',
            cancelButtonColor: '#6b7280'
        }).then(function (result) {
            if (result.isConfirmed) {
                window.location.href = el.href;
            }
        });
        return false;
    }
    </script>
</body>
</html>
