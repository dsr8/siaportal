
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="data:image/x-icon;base64,AAABAAEAEBAQAAAAAAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAUlL6ANPK/ACAY/8Ae17/AJ+K/wAAAO0ALwD/AKWR/wDq5v8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABmgAAAAACGYGaAAAUAAIZgZoAABQAAhmBmgAZmZgCGYGaAVmZnUIZgZok2FhY5hmBmiUVmZUmGYGaAAEZAAIZgZoAAhoAAhmBmgAACAACGYGaAAAAAAIZgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD//wAAH/EAAB7xAAAe8QAAGDEAABARAAAAAQAAAAEAABxxAAAccQAAHvEAAB/xAAD//wAA//8AAP//AAD//wAA" rel="icon" type="image/x-icon" />
        <title>Siaportal - Edit Team Member</title>
        <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            .et-wrap { padding: 4px 4px 30px; font-family: 'Segoe UI', Arial, sans-serif; max-width: 780px; margin: 0 auto; }

            .et-header { display: flex; align-items: center; gap: 14px; margin-bottom: 24px; }
            .et-avatar {
                width: 52px; height: 52px; border-radius: 15px; flex-shrink: 0; color: #fff; font-weight: 800; font-size: 17px;
                display: flex; align-items: center; justify-content: center; letter-spacing: .02em;
                background: linear-gradient(135deg, #7c4dd6, #5a2fa8); box-shadow: 0 6px 16px rgba(111,66,193,0.3);
            }
            .et-title h1 { font-size: 20px; font-weight: 800; color: #1f2430; margin: 0; }
            .et-title p { font-size: 13px; color: #8a8f98; margin: 3px 0 0; }

            .et-back { display: inline-flex; align-items: center; gap: 6px; font-size: 12.5px; font-weight: 700; color: #6f42c1; text-decoration: none; margin-bottom: 14px; }
            .et-back:hover { text-decoration: underline; }
            .et-back svg { width: 14px; height: 14px; }

            .et-card { background: #fff; border-radius: 18px; box-shadow: 0 4px 20px rgba(20,20,43,0.07); border: 1px solid #f0f1f4; overflow: hidden; }
            .et-section { padding: 24px 26px; }
            .et-section + .et-section { border-top: 1px solid #f0f1f4; }
            .et-section-title { font-size: 12px; font-weight: 800; color: #6f42c1; text-transform: uppercase; letter-spacing: .04em; margin: 0 0 16px; display: flex; align-items: center; gap: 7px; }
            .et-section-title svg { width: 14px; height: 14px; }

            .et-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
            @media (max-width: 620px) { .et-grid { grid-template-columns: 1fr; } }

            .et-field { margin-bottom: 16px; }
            .et-field:last-child { margin-bottom: 0; }
            .et-field label { font-weight: 700; margin-bottom: 6px; display: block; font-size: 11.5px; color: #6b7280; text-transform: uppercase; letter-spacing: .03em; }
            .et-field input, .et-field select {
                width: 100%; padding: 11px 13px; border: 1.5px solid #e0e3e8; border-radius: 10px; font-size: 13.5px;
                box-sizing: border-box; color: #1f2430; background: #fff; transition: border-color .15s ease, box-shadow .15s ease;
            }
            .et-field input:focus, .et-field select:focus { outline: none; border-color: #6f42c1; box-shadow: 0 0 0 3px rgba(111,66,193,0.1); }
            .et-field select { appearance: none; -webkit-appearance: none;
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%239aa0aa' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
                background-repeat: no-repeat; background-position: right 12px center; background-size: 15px; padding-right: 34px;
            }
            .et-hint { font-size: 11.5px; color: #9aa0aa; margin-top: 6px; }
            label.error { color: #a71d2a; font-size: 11.5px; font-weight: 600; display: block; margin-top: 5px; }

            .et-pass-field { position: relative; }
            .et-pass-field .et-eye { position: absolute; right: 10px; top: 34px; cursor: pointer; color: #9aa0aa; background: none; border: none; padding: 4px; }
            .et-pass-field .et-eye:hover { color: #6f42c1; }
            .et-pass-note { background: #f4f0fc; border: 1px solid #e2d6f7; border-radius: 10px; padding: 10px 14px; font-size: 12px; color: #6f42c1; margin-bottom: 16px; display: flex; align-items: center; gap: 8px; }
            .et-pass-note svg { width: 15px; height: 15px; flex-shrink: 0; }

            .et-footer { padding: 18px 26px; background: #fafbfc; border-top: 1px solid #f0f1f4; display: flex; gap: 10px; justify-content: flex-end; }
            .et-btn { display: inline-flex; align-items: center; gap: 7px; padding: 11px 22px; border-radius: 10px; font-size: 13.5px; font-weight: 700; border: none; cursor: pointer; text-decoration: none; transition: transform .12s ease, box-shadow .15s ease, background .15s ease; }
            .et-btn svg { width: 14px; height: 14px; }
            .et-btn-save { background: linear-gradient(135deg, #7c4dd6, #6f42c1); color: #fff; box-shadow: 0 4px 12px rgba(111,66,193,0.3); }
            .et-btn-save:hover { transform: translateY(-1px); box-shadow: 0 6px 16px rgba(111,66,193,0.4); }
            .et-btn-cancel { background: #f1f2f4; color: #1f2430; }
            .et-btn-cancel:hover { background: #e8e9ec; }
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
                        <div class="et-wrap">
                            <a class="et-back" href="<?php echo base_url();?>/Siaportal/view_team_login">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                                Back to Team Login
                            </a>

                            <?php
                                $fullName = trim(($team['0']['firstname'] ?? '') . ' ' . ($team['0']['lastname'] ?? ''));
                                $initials = strtoupper(substr($team['0']['firstname'] ?? '?', 0, 1) . substr($team['0']['lastname'] ?? '', 0, 1));
                            ?>
                            <div class="et-header">
                                <div class="et-avatar"><?php echo esc($initials); ?></div>
                                <div class="et-title">
                                    <h1>Edit Team Member</h1>
                                    <p><?php echo esc($fullName ?: 'Team member'); ?></p>
                                </div>
                            </div>

                            <?php if (isset($validation)): ?>
                            <div class="alert alert-danger" role="alert" style="border-radius:10px;margin-bottom:16px;">
                                <?php $validation->listErrors() ?>
                            </div>
                            <?php endif; ?>

                            <form id="myform" method="post" action="<?php echo base_url();?>/Siaportal/edit_team/<?php echo $team['0']['id'];?>">
                                <div class="et-card">
                                    <div class="et-section">
                                        <div class="et-section-title">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                            Profile
                                        </div>
                                        <div class="et-grid">
                                            <div class="et-field">
                                                <label>First Name</label>
                                                <input name="firstname" id="firstname" type="text" placeholder="Enter first name" value="<?php echo esc($team['0']['firstname'] ?? '', 'attr'); ?>">
                                            </div>
                                            <div class="et-field">
                                                <label>Last Name</label>
                                                <input name="lastname" id="lastname" type="text" placeholder="Enter last name" value="<?php echo esc($team['0']['lastname'] ?? '', 'attr'); ?>">
                                            </div>
                                            <div class="et-field">
                                                <label>Email</label>
                                                <input name="email" id="email" type="text" placeholder="Enter email" value="<?php echo esc($team['0']['email'] ?? '', 'attr'); ?>">
                                            </div>
                                            <div class="et-field">
                                                <label>Mobile Number</label>
                                                <input name="mobile_no" id="mobile_no" type="text" placeholder="Enter mobile number" value="<?php echo esc($team['0']['mobile_no'] ?? '', 'attr'); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="et-section">
                                        <div class="et-section-title">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                            Account
                                        </div>
                                        <div class="et-grid">
                                            <div class="et-field">
                                                <label>Type</label>
                                                <select name="type" id="type">
                                                    <option value="">Select Type</option>
                                                    <option value="Admin" <?php echo ($team['0']['type'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                                                    <option value="Employee" <?php echo ($team['0']['type'] == 'Employee') ? 'selected' : ''; ?>>Employee</option>
                                                </select>
                                            </div>
                                            <div class="et-field">
                                                <label>Status</label>
                                                <select name="status" id="status">
                                                    <option value="">Select Status</option>
                                                    <option value="1" <?php echo ($team['0']['status'] == '1') ? 'selected' : ''; ?>>Active</option>
                                                    <option value="0" <?php echo ($team['0']['status'] == '0') ? 'selected' : ''; ?>>Deactive</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="et-pass-note">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                                            Password changes now happen from <a href="<?php echo base_url();?>/Siaportal/view_team_login" style="color:#6f42c1;font-weight:700;">Team Login &rarr; Change Password</a>. Leave the field below blank to keep the current password.
                                        </div>
                                        <div class="et-field et-pass-field">
                                            <label>New Password (optional)</label>
                                            <input class="form-control" id="password" type="password" name="password" placeholder="Leave blank to keep current password" autocomplete="new-password">
                                            <button type="button" class="et-eye" onclick="etToggleEye()">&#128065;</button>
                                            <div class="et-hint">Only fill this in if you want to change the password from here too.</div>
                                        </div>
                                    </div>

                                    <div class="et-footer">
                                        <a class="et-btn et-btn-cancel" href="<?php echo base_url();?>/Siaportal/view_team_login">Cancel</a>
                                        <button type="submit" class="et-btn et-btn-save">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2Z"/><path d="M17 21v-8H7v8"/><path d="M7 3v5h8"/></svg>
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </form>
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
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
        <script>
            function etToggleEye() {
                var field = document.getElementById('password');
                field.type = field.type === 'password' ? 'text' : 'password';
            }

            $(document).ready(function () {
                $('#myform').validate({
                    rules: {
                        firstname: { required: true },
                        lastname: { required: true },
                        email: { required: true },
                        mobile_no: { required: true },
                        type: { required: true },
                        status: { required: true }
                        // password is intentionally NOT required — see the note above the field.
                    },
                    messages: {
                        firstname: "First name is required",
                        lastname: "Last name is required",
                        email: "Email is required",
                        mobile_no: "Mobile number is required",
                        type: "Type is required",
                        status: "Status is required"
                    }
                });
            });
        </script>
    </body>
</html>
