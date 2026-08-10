
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="data:image/x-icon;base64,AAABAAEAEBAQAAAAAAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAUlL6ANPK/ACAY/8Ae17/AJ+K/wAAAO0ALwD/AKWR/wDq5v8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABmgAAAAACGYGaAAAUAAIZgZoAABQAAhmBmgAZmZgCGYGaAVmZnUIZgZok2FhY5hmBmiUVmZUmGYGaAAEZAAIZgZoAAhoAAhmBmgAACAACGYGaAAAAAAIZgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD//wAAH/EAAB7xAAAe8QAAGDEAABARAAAAAQAAAAEAABxxAAAccQAAHvEAAB/xAAD//wAA//8AAP//AAD//wAA" rel="icon" type="image/x-icon" />
        <title>Siaportal - Team Login</title>
        <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            .tl-wrap { padding: 4px 4px 30px; font-family: 'Segoe UI', Arial, sans-serif; }

            .tl-header { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; margin-bottom: 24px; }
            .tl-header-left { display: flex; align-items: center; gap: 14px; }
            .tl-header-icon {
                width: 46px; height: 46px; border-radius: 13px; flex-shrink: 0;
                background: linear-gradient(135deg, #7c4dd6, #5a2fa8);
                display: flex; align-items: center; justify-content: center;
                box-shadow: 0 6px 16px rgba(111,66,193,0.35);
            }
            .tl-header-icon svg { width: 22px; height: 22px; color: #fff; }
            .tl-title h1 { font-size: 21px; font-weight: 800; color: #1f2430; margin: 0; letter-spacing: -.01em; }
            .tl-title p { font-size: 13px; color: #8a8f98; margin: 3px 0 0; }

            .tl-stats { display: grid; grid-template-columns: repeat(3, minmax(150px, 1fr)); gap: 16px; margin-bottom: 24px; }
            .tl-stat {
                position: relative; overflow: hidden; background: #fff; border-radius: 16px; padding: 18px 20px;
                box-shadow: 0 2px 12px rgba(20,20,43,0.06); border: 1px solid #f0f1f4;
            }
            .tl-stat::after {
                content: ''; position: absolute; right: -18px; top: -18px; width: 70px; height: 70px; border-radius: 50%;
                background: rgba(111,66,193,0.07);
            }
            .tl-stat.active::after   { background: rgba(40,167,69,0.08); }
            .tl-stat.inactive::after { background: rgba(231,76,60,0.08); }
            .tl-stat-row { display: flex; align-items: center; justify-content: space-between; position: relative; z-index: 1; }
            .tl-stat .val { font-size: 26px; font-weight: 800; color: #1f2430; line-height: 1; }
            .tl-stat .lbl { font-size: 12px; color: #8a8f98; text-transform: uppercase; letter-spacing: .03em; margin-top: 6px; font-weight: 700; }
            .tl-stat-icon { width: 38px; height: 38px; border-radius: 11px; display: flex; align-items: center; justify-content: center; background: #ece4fb; color: #6f42c1; flex-shrink: 0; }
            .tl-stat-icon svg { width: 18px; height: 18px; }
            .tl-stat.active .tl-stat-icon   { background: #d9f3e2; color: #1e7e34; }
            .tl-stat.inactive .tl-stat-icon { background: #fbe2e2; color: #c0392b; }

            .tl-card { background: #fff; border-radius: 18px; box-shadow: 0 4px 20px rgba(20,20,43,0.07); overflow: hidden; border: 1px solid #f0f1f4; }
            .tl-card-head { padding: 18px 22px; border-bottom: 1px solid #eef0f2; display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; }
            .tl-card-head strong { font-size: 15px; color: #1f2430; }
            .tl-card-head .tl-count { font-size: 12px; color: #9aa0aa; font-weight: 600; margin-left: 6px; }
            .tl-search { position: relative; width: 300px; max-width: 100%; }
            .tl-search input { width: 100%; padding: 10px 14px 10px 36px; border: 1.5px solid #e0e3e8; border-radius: 10px; font-size: 13.5px; transition: border-color .15s ease, box-shadow .15s ease; }
            .tl-search input:focus { outline: none; border-color: #6f42c1; box-shadow: 0 0 0 3px rgba(111,66,193,0.1); }
            .tl-search svg { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 15px; height: 15px; color: #9aa0aa; pointer-events: none; }

            .tl-table { width: 100%; border-collapse: collapse; }
            .tl-table th { text-align: left; font-size: 11px; font-weight: 800; color: #6b7280; text-transform: uppercase; letter-spacing: .04em; background: #fafbfc; padding: 13px 22px; border-bottom: 1px solid #eef0f2; white-space: nowrap; }
            .tl-table td { padding: 14px 22px; border-bottom: 1px solid #f4f5f7; font-size: 13.5px; color: #1f2430; vertical-align: middle; }
            .tl-table tbody tr:last-child td { border-bottom: none; }
            .tl-table tbody tr { transition: background .12s ease; }
            .tl-table tbody tr:hover { background: #faf9fd; }

            .tl-person { display: flex; align-items: center; gap: 12px; }
            .tl-avatar {
                width: 38px; height: 38px; border-radius: 50%; flex-shrink: 0; color: #fff; font-weight: 700; font-size: 13px;
                display: flex; align-items: center; justify-content: center; letter-spacing: .02em;
                box-shadow: 0 2px 6px rgba(20,20,43,0.15);
            }
            .tl-name { font-weight: 700; color: #1f2430; line-height: 1.3; }
            .tl-email { color: #8a8f98; font-size: 12px; line-height: 1.3; }

            .tl-badge { display: inline-flex; align-items: center; gap: 5px; padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 700; }
            .tl-badge-type { background: #ece4fb; color: #6f42c1; }
            .tl-badge-active   { background: #d9f3e2; color: #1e7e34; }
            .tl-badge-inactive { background: #fbe2e2; color: #c0392b; }
            .tl-dot { width: 6px; height: 6px; border-radius: 50%; background: currentColor; display: inline-block; }

            .tl-actions { display: flex; gap: 8px; flex-wrap: wrap; }
            .tl-btn { display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px; border-radius: 9px; font-size: 12.5px; font-weight: 700; border: none; cursor: pointer; text-decoration: none; transition: transform .12s ease, box-shadow .15s ease, background .15s ease; }
            .tl-btn svg { width: 13px; height: 13px; }
            .tl-btn-pass { background: linear-gradient(135deg, #7c4dd6, #6f42c1); color: #fff; box-shadow: 0 3px 10px rgba(111,66,193,0.3); }
            .tl-btn-pass:hover { transform: translateY(-1px); box-shadow: 0 5px 14px rgba(111,66,193,0.4); }
            .tl-btn-edit { background: #f1f2f4; color: #4b5160; }
            .tl-btn-edit:hover { background: #e8e9ec; }

            .tl-empty { text-align: center; padding: 54px 20px; color: #9aa0aa; }
            .tl-empty svg { width: 42px; height: 42px; color: #d8dce1; margin-bottom: 10px; }
            .tl-empty div { font-size: 13.5px; }

            @media (max-width: 700px) {
                .tl-stats { grid-template-columns: 1fr; }
                .tl-table thead { display: none; }
                .tl-table, .tl-table tbody, .tl-table tr, .tl-table td { display: block; width: 100%; }
                .tl-table tr { padding: 14px 18px; border-bottom: 1px solid #f1f2f4; }
                .tl-table td { padding: 4px 0; border-bottom: none; }
                .tl-table td:last-child { margin-top: 10px; }
            }

            /* Change Password modal */
            #tpWrap { display: none; position: fixed; inset: 0; background: rgba(20,20,43,0.55); backdrop-filter: blur(3px); -webkit-backdrop-filter: blur(3px); z-index: 9999; overflow-y: auto; }
            #tpBox { background: #fff; border-radius: 18px; max-width: 420px; width: 92%; margin: 70px auto; box-shadow: 0 24px 60px rgba(20,20,43,0.35); opacity: 0; transform: translateY(8px); transition: opacity .18s ease, transform .18s ease; }
            #tpWrap.tp-show #tpBox { opacity: 1; transform: translateY(0); }
            #tpBox .tp-head { padding: 20px 24px; border-bottom: 1px solid #eef0f2; display: flex; align-items: center; gap: 12px; }
            #tpBox .tp-head-icon { width: 38px; height: 38px; border-radius: 10px; background: #ece4fb; color: #6f42c1; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
            #tpBox .tp-head-icon svg { width: 18px; height: 18px; }
            #tpBox .tp-head-text { flex: 1; }
            #tpBox .tp-head strong { font-size: 15.5px; color: #1f2430; display: block; }
            #tpBox .tp-head small { font-size: 12px; color: #9aa0aa; }
            #tpBox .tp-close { width: 28px; height: 28px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #9aa0aa; font-size: 18px; flex-shrink: 0; }
            #tpBox .tp-close:hover { background: #f4f4f6; color: #1f2430; }
            #tpBox .tp-body { padding: 22px 24px 24px; }
            #tpBox label { font-weight: 700; margin-bottom: 6px; display: block; font-size: 11.5px; color: #6b7280; text-transform: uppercase; letter-spacing: .03em; }
            #tpBox .tp-field { margin-bottom: 14px; position: relative; }
            #tpBox input[type=text], #tpBox input[type=password] { width: 100%; padding: 11px 38px 11px 13px; border: 1.5px solid #e0e3e8; border-radius: 10px; font-size: 13.5px; box-sizing: border-box; transition: border-color .15s ease, box-shadow .15s ease; }
            #tpBox input:focus { outline: none; border-color: #6f42c1; box-shadow: 0 0 0 3px rgba(111,66,193,0.1); }
            #tpBox .tp-eye { position: absolute; right: 10px; top: 34px; cursor: pointer; color: #9aa0aa; background: none; border: none; padding: 4px; }
            #tpBox .tp-eye:hover { color: #6f42c1; }
            #tpBox .tp-gen { font-size: 12px; color: #6f42c1; font-weight: 700; cursor: pointer; background: none; border: none; padding: 0; margin: -8px 0 16px; display: inline-flex; align-items: center; gap: 5px; }
            #tpBox .tp-gen:hover { text-decoration: underline; }
            #tp_msg { min-height: 18px; font-size: 12.5px; margin-bottom: 8px; font-weight: 600; }
            #tpBox .tp-btns { display: flex; gap: 10px; margin-top: 4px; }
            #tpBox .tp-btns button { flex: 1; padding: 12px 16px; border: none; border-radius: 10px; cursor: pointer; font-size: 13.5px; font-weight: 700; transition: transform .12s ease, box-shadow .15s ease, background .15s ease; }
            .tp-btn-save { background: linear-gradient(135deg, #7c4dd6, #6f42c1); color: #fff; box-shadow: 0 4px 12px rgba(111,66,193,0.3); }
            .tp-btn-save:hover:not(:disabled) { transform: translateY(-1px); box-shadow: 0 6px 16px rgba(111,66,193,0.4); }
            .tp-btn-save:disabled { background: #cbb9ea; box-shadow: none; cursor: not-allowed; }
            .tp-btn-cancel { background: #f1f2f4; color: #1f2430; }
            .tp-btn-cancel:hover { background: #e8e9ec; }

            .tp-strength { height: 4px; border-radius: 3px; background: #eef0f2; margin: -8px 0 14px; overflow: hidden; }
            .tp-strength-bar { height: 100%; width: 0%; border-radius: 3px; transition: width .2s ease, background .2s ease; }
        </style>
    </head>
    <body class="sb-nav-fixed">
         <?= view ('admininclude/header.php'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
<?= view('admininclude/admin_nav'); ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="tl-wrap">
                            <div class="tl-header">
                                <div class="tl-header-left">
                                    <div class="tl-header-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                    </div>
                                    <div class="tl-title">
                                        <h1>Team Login</h1>
                                        <p>Manage staff accounts and reset team member passwords.</p>
                                    </div>
                                </div>
                            </div>

                            <?php
                                $totalCount = count($team);
                                $activeCount = 0;
                                foreach ($team as $t) { if (($t['status'] ?? '') == '1') { $activeCount++; } }
                                $inactiveCount = $totalCount - $activeCount;

                                // Deterministic, pleasant palette for avatar initials — same person
                                // always gets the same color, purely cosmetic (hashed off id/name).
                                $avatarPalette = ['#7c4dd6','#e2703a','#2f9e6e','#3f7fe0','#d1467a','#0aa5a8','#c9962f'];
                            ?>
                            <div class="tl-stats">
                                <div class="tl-stat">
                                    <div class="tl-stat-row">
                                        <div>
                                            <div class="val"><?php echo $totalCount; ?></div>
                                            <div class="lbl">Total Team Members</div>
                                        </div>
                                        <div class="tl-stat-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="tl-stat active">
                                    <div class="tl-stat-row">
                                        <div>
                                            <div class="val"><?php echo $activeCount; ?></div>
                                            <div class="lbl">Active</div>
                                        </div>
                                        <div class="tl-stat-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m22 4-10 10-3-3"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="tl-stat inactive">
                                    <div class="tl-stat-row">
                                        <div>
                                            <div class="val"><?php echo $inactiveCount; ?></div>
                                            <div class="lbl">Inactive</div>
                                        </div>
                                        <div class="tl-stat-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tl-card">
                                <div class="tl-card-head">
                                    <div><strong>All Team Members</strong><span class="tl-count">(<?php echo $totalCount; ?>)</span></div>
                                    <div class="tl-search">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                                        <input type="text" id="tlSearch" placeholder="Search name or email...">
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="tl-table" id="tlTable">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($team)): ?>
                                            <tr><td colspan="4">
                                                <div class="tl-empty">
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                                                    <div>No team members found.</div>
                                                </div>
                                            </td></tr>
                                            <?php endif; ?>
                                            <?php foreach ($team as $ag):
                                                $isActive  = (($ag['status'] ?? '') == '1');
                                                $fullName  = trim(($ag['firstname'] ?? '') . ' ' . ($ag['lastname'] ?? ''));
                                                $initials  = strtoupper(substr($ag['firstname'] ?? '?', 0, 1) . substr($ag['lastname'] ?? '', 0, 1));
                                                $avatarClr = $avatarPalette[((int) $ag['id']) % count($avatarPalette)];
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="tl-person">
                                                        <div class="tl-avatar" style="background:<?php echo $avatarClr; ?>;"><?php echo esc($initials); ?></div>
                                                        <div>
                                                            <div class="tl-name"><?php echo esc($fullName); ?></div>
                                                            <div class="tl-email"><?php echo esc($ag['email'] ?? ''); ?></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="tl-badge tl-badge-type"><?php echo esc($ag['type'] ?? ''); ?></span></td>
                                                <td><span class="tl-badge <?php echo $isActive ? 'tl-badge-active' : 'tl-badge-inactive'; ?>"><span class="tl-dot"></span><?php echo $isActive ? 'Active' : 'Deactive'; ?></span></td>
                                                <td>
                                                    <div class="tl-actions">
                                                        <button type="button" class="tl-btn tl-btn-pass" onclick="tpOpen(<?php echo (int) $ag['id']; ?>, '<?php echo esc($fullName, 'js'); ?>')">
                                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                                            Change Password
                                                        </button>
                                                        <a class="tl-btn tl-btn-edit" href="<?php echo base_url();?>/Siaportal/edit_team/<?php echo (int) $ag['id']; ?>">
                                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                                                            Edit
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
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

        <!-- Change Password modal -->
        <div id="tpWrap" onclick="tpMaybeClose(event)">
            <div id="tpBox">
                <div class="tp-head">
                    <div class="tp-head-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </div>
                    <div class="tp-head-text">
                        <strong>Change Password</strong>
                        <small id="tp_name"></small>
                    </div>
                    <span class="tp-close" onclick="tpClose()">&times;</span>
                </div>
                <div class="tp-body">
                    <div id="tp_msg"></div>
                    <div class="tp-field">
                        <label>New Password</label>
                        <input type="password" id="tp_new" autocomplete="new-password" placeholder="At least 6 characters" oninput="tpUpdateStrength()">
                        <button type="button" class="tp-eye" onclick="tpToggleEye('tp_new')">&#128065;</button>
                    </div>
                    <div class="tp-strength"><div class="tp-strength-bar" id="tp_strength_bar"></div></div>
                    <button type="button" class="tp-gen" onclick="tpGenerate()">&#10024; Generate strong password</button>
                    <div class="tp-field">
                        <label>Confirm Password</label>
                        <input type="password" id="tp_confirm" autocomplete="new-password" placeholder="Re-enter password">
                        <button type="button" class="tp-eye" onclick="tpToggleEye('tp_confirm')">&#128065;</button>
                    </div>
                    <div class="tp-btns">
                        <button type="button" class="tp-btn-save" id="tp_save" onclick="tpSave()">Save Password</button>
                        <button type="button" class="tp-btn-cancel" onclick="tpClose()">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>
        <script>
            var TL_BASE = '<?php echo base_url(); ?>/';
            var tpCurrentId = null;

            // Simple client-side filter over the table rows — no server round-trip needed for a
            // list this size, and keeps this page free of the DataTables dependency the old
            // version pulled in just to get sorting/search.
            document.getElementById('tlSearch').addEventListener('input', function () {
                var q = this.value.toLowerCase();
                document.querySelectorAll('#tlTable tbody tr').forEach(function (row) {
                    var text = row.textContent.toLowerCase();
                    row.style.display = text.indexOf(q) === -1 ? 'none' : '';
                });
            });

            function tpOpen(id, name) {
                tpCurrentId = id;
                document.getElementById('tp_name').textContent = name || '';
                document.getElementById('tp_new').value = '';
                document.getElementById('tp_confirm').value = '';
                document.getElementById('tp_new').type = 'password';
                document.getElementById('tp_confirm').type = 'password';
                document.getElementById('tp_msg').innerHTML = '';
                document.getElementById('tp_save').disabled = false;
                document.getElementById('tp_save').textContent = 'Save Password';
                tpUpdateStrength();

                var wrap = document.getElementById('tpWrap');
                wrap.style.display = 'block';
                document.body.style.overflow = 'hidden';
                requestAnimationFrame(function () {
                    requestAnimationFrame(function () {
                        wrap.classList.add('tp-show');
                        document.getElementById('tp_new').focus();
                    });
                });
            }

            function tpClose() {
                var wrap = document.getElementById('tpWrap');
                wrap.classList.remove('tp-show');
                document.body.style.overflow = '';
                setTimeout(function () { wrap.style.display = 'none'; }, 180);
            }

            function tpMaybeClose(e) {
                if (e.target === document.getElementById('tpWrap')) tpClose();
            }

            function tpToggleEye(fieldId) {
                var field = document.getElementById(fieldId);
                field.type = field.type === 'password' ? 'text' : 'password';
            }

            function tpUpdateStrength() {
                var val = document.getElementById('tp_new').value;
                var bar = document.getElementById('tp_strength_bar');
                var score = 0;
                if (val.length >= 6)  score++;
                if (val.length >= 10) score++;
                if (/[A-Z]/.test(val) && /[a-z]/.test(val)) score++;
                if (/[0-9]/.test(val) && /[^A-Za-z0-9]/.test(val)) score++;

                var widths = [0, 25, 50, 75, 100];
                var colors = ['#eef0f2', '#e74c3c', '#f5a623', '#f1c40f', '#28a745'];
                bar.style.width = widths[score] + '%';
                bar.style.background = colors[score];
            }

            function tpGenerate() {
                var chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789!@#$%';
                var pass = '';
                for (var i = 0; i < 12; i++) { pass += chars.charAt(Math.floor(Math.random() * chars.length)); }
                document.getElementById('tp_new').type = 'text';
                document.getElementById('tp_confirm').type = 'text';
                document.getElementById('tp_new').value = pass;
                document.getElementById('tp_confirm').value = pass;
                tpUpdateStrength();
            }

            function tpSave() {
                var pass = document.getElementById('tp_new').value;
                var confirmPass = document.getElementById('tp_confirm').value;
                var msg = document.getElementById('tp_msg');

                if (pass.length < 6) {
                    msg.innerHTML = '<span style="color:#e74c3c;">Password must be at least 6 characters.</span>';
                    return;
                }
                if (pass !== confirmPass) {
                    msg.innerHTML = '<span style="color:#e74c3c;">Passwords do not match.</span>';
                    return;
                }

                var saveBtn = document.getElementById('tp_save');
                saveBtn.disabled = true;
                saveBtn.textContent = 'Saving…';
                msg.innerHTML = '';

                $.post(TL_BASE + 'Siaportal/change_team_password/' + tpCurrentId, { new_password: pass }, function (data) {
                    if (!data.success) {
                        msg.innerHTML = '<span style="color:#e74c3c;">' + (data.error || 'Could not update password.') + '</span>';
                        saveBtn.disabled = false;
                        saveBtn.textContent = 'Save Password';
                        return;
                    }
                    msg.innerHTML = '<span style="color:#1e7e34;">Password updated successfully.</span>';
                    saveBtn.textContent = 'Saved';
                    setTimeout(tpClose, 900);
                }, 'json').fail(function () {
                    msg.innerHTML = '<span style="color:#e74c3c;">Could not update password. Please try again.</span>';
                    saveBtn.disabled = false;
                    saveBtn.textContent = 'Save Password';
                });
            }
        </script>
    </body>
</html>
