<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Edit Appointment — Siaportal</title>
    <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        * { box-sizing: border-box; }
        .appt-form-wrap {
            max-width: 720px; margin: 30px auto; padding: 0 16px 60px;
        }
        .form-card {
            background: #fff; border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.09);
            overflow: hidden;
        }
        .form-card-head {
            background: linear-gradient(135deg, #6f42c1, #4a2d8a);
            padding: 22px 28px; color: #fff;
            display: flex; align-items: center; gap: 12px;
        }
        .form-card-head .head-icon {
            width: 44px; height: 44px; border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex; align-items: center; justify-content: center;
            font-size: 20px; flex-shrink: 0;
        }
        .form-card-head h2 { font-size: 18px; font-weight: 700; margin: 0; }
        .form-card-head p  { font-size: 12px; opacity: 0.8; margin: 2px 0 0; }
        .form-card-body { padding: 28px; }

        .form-section-title {
            font-size: 11px; font-weight: 700; color: #999;
            text-transform: uppercase; letter-spacing: 0.6px;
            margin: 22px 0 12px; padding-bottom: 6px;
            border-bottom: 1px solid #f0f0f0;
        }

        .frow { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

        .fgroup { margin-bottom: 16px; }
        .fgroup label {
            display: block; font-size: 12px; font-weight: 700;
            color: #555; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.4px;
        }
        .fgroup label .req { color: #e74c3c; margin-left: 2px; }
        .fgroup input, .fgroup textarea, .fgroup select {
            width: 100%; padding: 10px 14px;
            border: 2px solid #e8ecf0; border-radius: 8px;
            font-size: 13px; color: #333; background: #fafbfc;
            outline: none; transition: border-color 0.2s, box-shadow 0.2s;
        }
        .fgroup input:focus, .fgroup textarea:focus, .fgroup select:focus {
            border-color: #6f42c1; box-shadow: 0 0 0 3px rgba(111,66,193,0.10);
            background: #fff;
        }
        .fgroup input[readonly], .fgroup input.ro {
            background: #f0f2f6; color: #666; cursor: default;
        }
        .fgroup textarea { resize: vertical; min-height: 90px; }

        .info-badge {
            display: inline-block; padding: 6px 14px; border-radius: 8px;
            font-size: 13px; font-weight: 600; background: #f0f2f6; color: #555;
        }

        /* Select2 overrides */
        .select2-container--default .select2-selection--single {
            height: 42px; border: 2px solid #e8ecf0; border-radius: 8px;
            background: #fafbfc; display: flex; align-items: center;
        }
        .select2-container--default.select2-container--focus .select2-selection--single,
        .select2-container--default.select2-container--open .select2-selection--single {
            border-color: #6f42c1; box-shadow: 0 0 0 3px rgba(111,66,193,0.10); background: #fff;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 38px; padding-left: 14px; color: #333; font-size: 13px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow { height: 40px; }
        .select2-container { width: 100% !important; }
        .select2-dropdown { border: 2px solid #6f42c1; border-radius: 8px; box-shadow: 0 4px 20px rgba(0,0,0,0.12); }
        .select2-container--default .select2-results__option--highlighted[aria-selected] { background: #6f42c1; }

        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, #6f42c1, #4a2d8a);
            color: #fff; border: none; padding: 13px;
            border-radius: 10px; font-size: 15px; font-weight: 700;
            cursor: pointer; margin-top: 8px;
            transition: opacity 0.2s, transform 0.1s;
            box-shadow: 0 4px 14px rgba(111,66,193,0.3);
        }
        .btn-submit:hover  { opacity: 0.92; }
        .btn-submit:active { transform: scale(0.98); }
        .btn-back {
            display: inline-flex; align-items: center; gap: 6px;
            color: #6f42c1; text-decoration: none; font-size: 13px;
            font-weight: 600; margin-bottom: 20px;
        }
        .btn-back:hover { text-decoration: underline; color: #6f42c1; }

        .avail-badge {
            display: inline-block; padding: 4px 12px; border-radius: 20px;
            font-size: 12px; font-weight: 700; margin-top: 6px;
        }
        .avail-ok   { background: #d1e7dd; color: #0f5132; }
        .avail-no   { background: #f8d7da; color: #842029; }
        .avail-none { display: none; }
        .btn-check {
            background: #e9ecef; border: none; border-radius: 8px;
            padding: 8px 16px; font-size: 12px; font-weight: 700;
            color: #333; cursor: pointer; transition: background 0.2s;
        }
        .btn-check:hover { background: #dee2e6; }
        @keyframes spin { to { transform: rotate(360deg); } }

        @media(max-width: 560px) { .frow { grid-template-columns: 1fr; } }
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
                <div class="appt-form-wrap">

                    <?php
                    $from = $from ?? 'index';
                    $backUrl = ($from === 'dashboard')
                        ? base_url('appoint/AppointAdmin/dashboard')
                        : base_url('appoint/Appoint/index');
                    $backLabel = ($from === 'dashboard') ? 'Back to Dashboard' : 'Back to My Appointments';
                    ?>
                    <a href="<?php echo $backUrl; ?>" class="btn-back">&#8592; <?php echo $backLabel; ?></a>

                    <div class="form-card">
                        <div class="form-card-head">
                            <div class="head-icon">&#9998;</div>
                            <div>
                                <h2>Edit Appointment <span style="opacity:0.7;font-size:14px;">SIA-<?php echo $appointment['id']; ?></span></h2>
                                <p>Update the appointment details below</p>
                            </div>
                        </div>
                        <div class="form-card-body">

                            <form id="editForm" method="post"
                                action="<?php echo base_url('appoint/Appoint/edit/'.$appointment['id']); ?>?from=<?php echo urlencode($from); ?>">

                                <input type="hidden" name="_from" value="<?php echo htmlspecialchars($from); ?>">

                                <!-- Client Info (read-only — linked to Prospect record) -->
                                <div class="form-section-title">&#128100; Client Details</div>
                                <div class="frow">
                                    <div class="fgroup">
                                        <label>Client Name</label>
                                        <input type="text" value="<?php echo htmlspecialchars($appointment['client_name'] ?? ''); ?>" readonly class="ro"
                                            title="Name is linked to Prospect record and cannot be changed here." />
                                        <!-- send name through hidden field so it's accessible if needed but not editable -->
                                    </div>
                                    <div class="fgroup">
                                        <label>Client Phone</label>
                                        <input type="text" name="client_phone" value="<?php echo htmlspecialchars($appointment['client_phone'] ?? ''); ?>" placeholder="Include country code e.g. +1 604..." />
                                    </div>
                                </div>
                                <div class="fgroup">
                                    <label>Client Email</label>
                                    <input type="email" name="client_email" value="<?php echo htmlspecialchars($appointment['client_email'] ?? ''); ?>" />
                                </div>
                                <?php if (!empty($appointment['prospect_id'])): ?>
                                <div class="fgroup">
                                    <label>Prospect / Client ID</label>
                                    <div class="info-badge">&#128100; Prospect #<?php echo $appointment['prospect_id']; ?></div>
                                </div>
                                <?php endif; ?>

                                <!-- Appointment Details -->
                                <div class="form-section-title">&#128197; Appointment Details</div>
                                <div class="frow">
                                    <div class="fgroup">
                                        <label>Date <span class="req">*</span></label>
                                        <input type="date" id="appt_date" name="appointment_date" value="<?php echo htmlspecialchars($appointment['appointment_date'] ?? ''); ?>" required />
                                    </div>
                                    <div class="fgroup">
                                        <label>Time <span class="req">*</span></label>
                                        <input type="time" id="appt_time" name="appointment_time" value="<?php echo htmlspecialchars($appointment['appointment_time'] ?? ''); ?>" required />
                                    </div>
                                </div>
                                <div style="margin-top:-8px;margin-bottom:16px;display:flex;align-items:center;gap:12px;flex-wrap:wrap;">
                                    <button type="button" class="btn-check" onclick="checkAvailability()">&#10003; Check Availability of Team Member</button>
                                    <span class="avail-badge avail-none" id="availBadge"></span>
                                </div>

                                <div class="fgroup">
                                    <label>Service Type <span class="req">*</span></label>
                                    <select name="service_type" id="serviceTypeSelect" required>
                                        <option value="">-- Select Service Type --</option>
                                        <?php
                                        $serviceTypes = [
                                            'Permanent Residency',
                                            'Citizenship Application',
                                            'Spousal Sponsorship / Common-Law Sponsorship',
                                            'Parent / Grandparent Sponsorship',
                                            'Work Permit (New / Extension / LMIA)',
                                            'Spousal Open Work Permit (SOWP)',
                                            'Employers Hiring Foreign Workers',
                                            'Study Permit (New / Extension / Change of Status)',
                                            'College / University Admissions',
                                            'Post Graduate Work Permit (PGWP)',
                                            'Visitor Visa / TRV',
                                            'Super Visa',
                                            'PR Card Renewal',
                                            'Passport Renewal',
                                            'OCI Application',
                                            'CAIPS / GCMS Notes',
                                            'OTHER',
                                        ];
                                        $currentService = $appointment['service_type'] ?? '';
                                        foreach ($serviceTypes as $st):
                                        ?>
                                        <option value="<?php echo htmlspecialchars($st); ?>" <?php echo ($currentService === $st) ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars($st); ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="fgroup">
                                    <label>Appointment Type <span class="req">*</span></label>
                                    <select name="appointment_type" id="appointmentTypeSelect" required>
                                        <option value="">-- Select Appointment Type --</option>
                                        <?php
                                        $appointmentTypes = [
                                            'Rapid / Free Consultation (General Inquiry)',
                                            'Paid Telephonic Immigration Consultation',
                                            'Paid In-Person Immigration Consultation',
                                            'Free College / University Admissions Consultation',
                                            'Existing Client Appointment',
                                            'Prospective Client (Had Previous Appointment)',
                                            'Overseas PR Consultation (Outside Canada – Paid)',
                                            'LMIA / LMIA-Based Work Permit Consultation',
                                        ];
                                        $currentApptType = $appointment['appointment_type'] ?? '';
                                        foreach ($appointmentTypes as $at):
                                        ?>
                                        <option value="<?php echo htmlspecialchars($at); ?>" <?php echo ($currentApptType === $at) ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars($at); ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Consultation Type — display only (not editable) -->
                                <?php if (!empty($appointment['consultation_type'])): ?>
                                <div class="fgroup">
                                    <label>Consultation Type</label>
                                    <div class="info-badge">
                                        <?php if ($appointment['consultation_type'] === 'Telephonic'): ?>
                                            &#128222; Telephonic
                                            <?php if (!empty($appointment['contact_method'])): ?>
                                                &nbsp;—&nbsp;<?php echo htmlspecialchars($appointment['contact_method']); ?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            &#127970; In-Person
                                            <?php if (!empty($appointment['office_location'])): ?>
                                                &nbsp;—&nbsp;&#128205; <?php echo htmlspecialchars($appointment['office_location']); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <input type="hidden" name="consultation_type" value="<?php echo htmlspecialchars($appointment['consultation_type']); ?>" />
                                </div>
                                <?php endif; ?>

                                <!-- Additional Client Info -->
                                <div class="form-section-title">&#128203; Additional Info</div>
                                <div class="frow">
                                    <div class="fgroup">
                                        <label>Inside Canada</label>
                                        <div style="display:flex;gap:20px;padding:10px 0;">
                                            <?php $ic = $appointment['inside_canada'] ?? ''; ?>
                                            <label style="font-weight:600;font-size:13px;display:flex;align-items:center;gap:6px;cursor:pointer;">
                                                <input type="radio" name="inside_canada" value="Yes" <?php echo ($ic === 'Yes') ? 'checked' : ''; ?>> Yes
                                            </label>
                                            <label style="font-weight:600;font-size:13px;display:flex;align-items:center;gap:6px;cursor:pointer;">
                                                <input type="radio" name="inside_canada" value="No" <?php echo ($ic === 'No') ? 'checked' : ''; ?>> No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="fgroup">
                                        <label>Existing Client</label>
                                        <div style="display:flex;gap:20px;padding:10px 0;">
                                            <?php $ec = $appointment['existing_client'] ?? ''; ?>
                                            <label style="font-weight:600;font-size:13px;display:flex;align-items:center;gap:6px;cursor:pointer;">
                                                <input type="radio" name="existing_client" value="Yes" <?php echo ($ec === 'Yes') ? 'checked' : ''; ?>> Yes
                                            </label>
                                            <label style="font-weight:600;font-size:13px;display:flex;align-items:center;gap:6px;cursor:pointer;">
                                                <input type="radio" name="existing_client" value="No" <?php echo ($ec === 'No') ? 'checked' : ''; ?>> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="fgroup">
                                    <label>Immigration Status</label>
                                    <input type="text" name="immigration_status" value="<?php echo htmlspecialchars($appointment['immigration_status'] ?? ''); ?>" placeholder="e.g. Visitor, Study Permit, Work Permit...">
                                </div>

                                <div class="fgroup">
                                    <label>Notes</label>
                                    <textarea name="notes"><?php echo htmlspecialchars($appointment['notes'] ?? ''); ?></textarea>
                                </div>

                                <!-- Assign Team Member -->
                                <div class="form-section-title">&#128100; Assign Team Member</div>
                                <div class="fgroup">
                                    <label>Team Member</label>
                                    <select name="assigned_to" id="assignedToSelect">
                                        <option value="">— Unassigned —</option>
                                        <?php foreach ($team_members as $tm):
                                            $tmName = $tm['firstname'] . ' ' . $tm['lastname'];
                                        ?>
                                        <option value="<?php echo htmlspecialchars($tmName); ?>"
                                            <?php echo (($appointment['assigned_to'] ?? '') === $tmName) ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars($tmName); ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Status -->
                                <?php $currentStatus = (int)($appointment['status'] ?? 0); ?>
                                <div class="form-section-title">&#128204; Status</div>
                                <div class="fgroup">
                                    <label>Status</label>
                                    <?php if ($currentStatus === 2): ?>
                                        <div class="info-badge" style="background:#cfe2ff;color:#084298;">&#10003; Completed</div>
                                        <input type="hidden" name="status" value="2" />
                                        <p style="font-size:11px;color:#084298;margin-top:6px;">&#8505; Completed appointments cannot be changed via edit.</p>
                                    <?php elseif ($currentStatus === 3): ?>
                                        <div class="info-badge" style="background:#f8d7da;color:#842029;">&#10005; Cancelled</div>
                                        <input type="hidden" name="status" value="3" />
                                        <p style="font-size:11px;color:#842029;margin-top:6px;">&#8505; Cancelled appointments cannot be changed via edit.</p>
                                    <?php else: ?>
                                    <select name="status" id="statusSelect">
                                        <?php if ($currentStatus === 0): ?>
                                        <option value="0" selected>Pending</option>
                                        <?php endif; ?>
                                        <option value="1" <?php echo ($currentStatus === 1) ? 'selected' : ''; ?>>Confirmed</option>
                                        <option value="3" <?php echo ($currentStatus === 3) ? 'selected' : ''; ?>>Cancelled</option>
                                    </select>
                                    <?php endif; ?>
                                </div>

                                <button type="submit" class="btn-submit" id="submitBtn">&#9998; Update Appointment</button>

                            </form>

                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>

    <script>
    var BASE = '<?php echo rtrim(base_url(), '/') . '/'; ?>';

    $(document).ready(function() {
        $('#serviceTypeSelect').select2({ placeholder: '-- Select Service Type --', allowClear: true });
        $('#appointmentTypeSelect').select2({ placeholder: '-- Select Appointment Type --', allowClear: true });
        $('#assignedToSelect').select2({ placeholder: '— Unassigned —', allowClear: true });
        if ($('#statusSelect').length) {
            $('#statusSelect').select2({ minimumResultsForSearch: Infinity });
        }
    });

    document.getElementById('editForm').addEventListener('submit', function() {
        var btn = document.getElementById('submitBtn');
        btn.disabled = true;
        btn.innerHTML = '<span style="display:inline-block;width:16px;height:16px;border:3px solid rgba(255,255,255,0.4);border-top-color:#fff;border-radius:50%;animation:spin .7s linear infinite;vertical-align:middle;margin-right:8px;"></span> Saving...';
    });

    function checkAvailability() {
        var date  = document.getElementById('appt_date').value;
        var time  = document.getElementById('appt_time').value;
        var badge = document.getElementById('availBadge');
        if (!date || !time) { alert('Please select a date and time first.'); return; }
        badge.className = 'avail-badge';
        badge.textContent = 'Checking...';
        var form = new FormData();
        form.append('appointment_date', date);
        form.append('appointment_time', time);
        form.append('exclude_id', '<?php echo (int)$appointment['id']; ?>');
        fetch(BASE + 'appoint/Appoint/check_availability', { method: 'POST', body: form })
            .then(function(r) { return r.json(); })
            .then(function(res) {
                if (res.available) {
                    badge.className = 'avail-badge avail-ok';
                    badge.textContent = '✓ Slot available';
                } else {
                    badge.className = 'avail-badge avail-no';
                    badge.textContent = '✗ Slot already booked';
                }
            })
            .catch(function() {
                badge.className = 'avail-badge avail-no';
                badge.textContent = 'Check failed';
            });
    }
    </script>
</body>
</html>
