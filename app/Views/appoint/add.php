<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Add Appointment — Siaportal</title>
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

        .prospect-info-bar {
            display: none;
            background: #e8f5e9; border: 1px solid #c8e6c9;
            border-radius: 10px; padding: 12px 16px;
            margin-bottom: 20px; font-size: 13px; color: #2e7d32;
            align-items: center; gap: 10px;
        }
        .prospect-info-bar.show { display: flex; }
        .prospect-info-bar .pi-avatar {
            width: 38px; height: 38px; border-radius: 50%;
            background: #27ae60; color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-size: 14px; font-weight: 700; flex-shrink: 0;
        }
        .prospect-info-bar .pi-text strong { display: block; font-size: 13px; }
        .prospect-info-bar .pi-text span   { font-size: 11px; color: #555; }

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
        .fgroup input[readonly] {
            background: #f0f2f6; color: #666; cursor: default;
        }
        .fgroup textarea { resize: vertical; min-height: 90px; }

        /* Select2 overrides */
        .select2-container--default .select2-selection--single {
            height: 42px; border: 2px solid #e8ecf0; border-radius: 8px;
            background: #fafbfc; display: flex; align-items: center;
            transition: border-color 0.2s;
        }
        .select2-container--default.select2-container--focus .select2-selection--single,
        .select2-container--default.select2-container--open .select2-selection--single {
            border-color: #6f42c1; box-shadow: 0 0 0 3px rgba(111,66,193,0.10);
            background: #fff;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 38px; padding-left: 14px; color: #333; font-size: 13px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow { height: 40px; }
        .select2-container { width: 100% !important; }
        .select2-dropdown { border: 2px solid #6f42c1; border-radius: 8px; box-shadow: 0 4px 20px rgba(0,0,0,0.12); }
        .select2-search--dropdown .select2-search__field {
            border: 1px solid #ddd; border-radius: 6px; padding: 7px 10px; font-size: 13px;
        }
        .select2-container--default .select2-results__option--highlighted[aria-selected] { background: #6f42c1; }
        .select2-result-prospect { padding: 6px 0; }
        .select2-result-prospect .rp-name { font-weight: 600; font-size: 13px; color: #1a1a2e; }
        .select2-result-prospect .rp-meta { font-size: 11px; color: #888; margin-top: 1px; }

        /* Availability badge */
        .avail-badge {
            display: inline-block; padding: 4px 12px; border-radius: 20px;
            font-size: 12px; font-weight: 700; margin-top: 6px;
        }
        .avail-ok   { background: #d1e7dd; color: #0f5132; }
        .avail-no   { background: #f8d7da; color: #842029; }
        .avail-none { display: none; }

        .btn-check {
            background: #0d6efd; color: #fff; border: none;
            padding: 9px 16px; border-radius: 8px; font-size: 12px;
            font-weight: 700; cursor: pointer; margin-top: 4px;
            transition: opacity 0.2s;
        }
        .btn-check:hover { opacity: 0.85; }

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
                    $backLabel = ($from === 'dashboard') ? 'Back to Dashboard' : 'Back to Appointments';
                    ?>
                    <a href="<?php echo $backUrl; ?>" class="btn-back">&#8592; <?php echo $backLabel; ?></a>

                    <div class="form-card">
                        <div class="form-card-head">
                            <div class="head-icon">&#128197;</div>
                            <div>
                                <h2>Book Appointment</h2>
                                <p>Search a prospect and fill in the appointment details</p>
                            </div>
                        </div>
                        <div class="form-card-body">

                            <?php if (session()->getFlashdata('slot_error')): ?>
                                <div style="background:#fde8e8;border:1px solid #f5c6c6;color:#a00;padding:10px 14px;border-radius:6px;margin-bottom:14px;">
                                    &#9888; <?php echo session()->getFlashdata('slot_error'); ?>
                                </div>
                            <?php endif; ?>

                            <form id="apptForm" method="post"
                                action="<?php echo base_url('appoint/Appoint/add'); ?>?from=<?php echo urlencode($from); ?>">

                                <input type="hidden" name="_from" value="<?php echo htmlspecialchars($from); ?>">

                                <!-- Prospect selector -->
                                <div class="form-section-title">&#128269; Select Prospect</div>

                                <div class="fgroup">
                                    <label>Prospect / Client <span class="req">*</span></label>
                                    <select id="prospectSelect" name="_prospect_select" style="width:100%;">
                                        <option value="">Type name, ID or phone to search...</option>
                                    </select>
                                </div>

                                <!-- Auto-filled info bar -->
                                <div class="prospect-info-bar" id="prospecInfoBar">
                                    <div class="pi-avatar" id="piAvatar"></div>
                                    <div class="pi-text">
                                        <strong id="piName"></strong>
                                        <span id="piContact"></span>
                                    </div>
                                </div>

                                <!-- Hidden real fields -->
                                <input type="hidden" name="prospect_id"  id="f_pid">
                                <input type="hidden" name="client_name"  id="f_name">
                                <input type="hidden" name="client_email" id="f_email">
                                <input type="hidden" name="client_phone" id="f_phone">

                                <!-- Client details (read-only preview) -->
                                <div class="form-section-title">&#128100; Client Details</div>
                                <div class="frow">
                                    <div class="fgroup">
                                        <label>Name</label>
                                        <input type="text" id="d_name"  readonly placeholder="Auto-filled from prospect">
                                    </div>
                                    <div class="fgroup">
                                        <label>Phone</label>
                                        <input type="text" id="d_phone" readonly placeholder="Auto-filled from prospect">
                                    </div>
                                </div>
                                <div class="fgroup">
                                    <label>Email</label>
                                    <input type="email" id="d_email" readonly placeholder="Auto-filled from prospect">
                                </div>

                                <!-- Appointment details -->
                                <div class="form-section-title">&#128197; Appointment Details</div>
                                <div class="frow">
                                    <div class="fgroup">
                                        <label>Date <span class="req">*</span></label>
                                        <input type="date" name="appointment_date" id="appt_date" required>
                                    </div>
                                    <div class="fgroup">
                                        <label>Time <span class="req">*</span></label>
                                        <input type="time" name="appointment_time" id="appt_time" required>
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
                                        <option value="Permanent Residency">Permanent Residency</option>
                                        <option value="Citizenship Application">Citizenship Application</option>
                                        <option value="Spousal Sponsorship / Common-Law Sponsorship">Spousal Sponsorship / Common-Law Sponsorship</option>
                                        <option value="Parent / Grandparent Sponsorship">Parent / Grandparent Sponsorship</option>
                                        <option value="Work Permit (New / Extension / LMIA)">Work Permit (New / Extension / LMIA)</option>
                                        <option value="Spousal Open Work Permit (SOWP)">Spousal Open Work Permit (SOWP)</option>
                                        <option value="Employers Hiring Foreign Workers">Employers Hiring Foreign Workers</option>
                                        <option value="Study Permit (New / Extension / Change of Status)">Study Permit (New / Extension / Change of Status)</option>
                                        <option value="College / University Admissions">College / University Admissions</option>
                                        <option value="Post Graduate Work Permit (PGWP)">Post Graduate Work Permit (PGWP)</option>
                                        <option value="Visitor Visa / TRV">Visitor Visa / TRV</option>
                                        <option value="Super Visa">Super Visa</option>
                                        <option value="PR Card Renewal">PR Card Renewal</option>
                                        <option value="Passport Renewal">Passport Renewal</option>
                                        <option value="OCI Application">OCI Application</option>
                                        <option value="CAIPS / GCMS Notes">CAIPS / GCMS Notes</option>
                                        <option value="OTHER">OTHER</option>
                                    </select>
                                </div>
                                <div class="fgroup">
                                    <label>Appointment Type <span class="req">*</span></label>
                                    <select name="appointment_type" id="appointmentTypeSelect" required>
                                        <option value="">-- Select Appointment Type --</option>
                                        <option value="Rapid / Free Consultation (General Inquiry)">Rapid / Free Consultation (General Inquiry)</option>
                                        <option value="Paid Telephonic Immigration Consultation">Paid Telephonic Immigration Consultation</option>
                                        <option value="Paid In-Person Immigration Consultation">Paid In-Person Immigration Consultation</option>
                                        <option value="Free College / University Admissions Consultation">Free College / University Admissions Consultation</option>
                                        <option value="Existing Client Appointment">Existing Client Appointment</option>
                                        <option value="Prospective Client (Had Previous Appointment)">Prospective Client (Had Previous Appointment)</option>
                                        <option value="Overseas PR Consultation (Outside Canada – Paid)">Overseas PR Consultation (Outside Canada – Paid)</option>
                                        <option value="LMIA / LMIA-Based Work Permit Consultation">LMIA / LMIA-Based Work Permit Consultation</option>
                                    </select>
                                </div>
                                <div class="fgroup">
                                    <label>Consultation Type <span class="req">*</span></label>
                                    <div style="display:flex;gap:24px;padding:10px 0;">
                                        <label style="font-weight:600;font-size:13px;display:flex;align-items:center;gap:6px;cursor:pointer;">
                                            <input type="radio" name="consultation_type" value="Telephonic" onchange="toggleConsultType(this.value)" required> &#128222; Telephonic
                                        </label>
                                        <label style="font-weight:600;font-size:13px;display:flex;align-items:center;gap:6px;cursor:pointer;">
                                            <input type="radio" name="consultation_type" value="In-Person" onchange="toggleConsultType(this.value)"> &#127970; In-Person
                                        </label>
                                    </div>
                                </div>
                                <div class="fgroup" id="contactMethodWrap" style="display:none;">
                                    <label>Preferred Contact Method <span class="req">*</span></label>
                                    <select name="contact_method" id="contactMethodSelect">
                                        <option value="">-- Select Contact Method --</option>
                                        <option value="Phone Call">Phone Call</option>
                                        <option value="WhatsApp">WhatsApp</option>
                                    </select>
                                </div>
                                <div class="fgroup" id="officeLocationWrap" style="display:none;">
                                    <label>Office Location <span class="req">*</span></label>
                                    <select name="office_location" id="officeLocationSelect">
                                        <option value="">-- Select Office Location --</option>
                                        <option value="Surrey">Surrey Office</option>
                                        <option value="Kamloops">Kamloops Office</option>
                                    </select>
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
                                        <option value="<?php echo htmlspecialchars($tmName); ?>">
                                            <?php echo htmlspecialchars($tmName); ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Additional Client Info -->
                                <div class="form-section-title">&#128203; Additional Info</div>
                                <div class="frow">
                                    <div class="fgroup">
                                        <label>Inside Canada</label>
                                        <div style="display:flex;gap:20px;padding:10px 0;">
                                            <label style="font-weight:600;font-size:13px;display:flex;align-items:center;gap:6px;cursor:pointer;">
                                                <input type="radio" name="inside_canada" value="Yes"> Yes
                                            </label>
                                            <label style="font-weight:600;font-size:13px;display:flex;align-items:center;gap:6px;cursor:pointer;">
                                                <input type="radio" name="inside_canada" value="No"> No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="fgroup">
                                        <label>Existing Client</label>
                                        <div style="display:flex;gap:20px;padding:10px 0;">
                                            <label style="font-weight:600;font-size:13px;display:flex;align-items:center;gap:6px;cursor:pointer;">
                                                <input type="radio" name="existing_client" value="Yes"> Yes
                                            </label>
                                            <label style="font-weight:600;font-size:13px;display:flex;align-items:center;gap:6px;cursor:pointer;">
                                                <input type="radio" name="existing_client" value="No"> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="fgroup">
                                    <label>Immigration Status</label>
                                    <input type="text" name="immigration_status" placeholder="e.g. Visitor, Study Permit, Work Permit...">
                                </div>

                                <div class="fgroup">
                                    <label>Notes</label>
                                    <textarea name="notes" placeholder="Any notes or instructions..."></textarea>
                                </div>

                                <button type="submit" class="btn-submit" id="btnSubmit">&#128197; Book Appointment</button>
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
        $('#prospectSelect').select2({
            placeholder: 'Type name, ID or phone to search...',
            allowClear: true,
            minimumInputLength: 1,
            ajax: {
                url: BASE + 'appoint/Appoint/get_prospects_json',
                dataType: 'json',
                delay: 250,
                data: function(params) { return { q: params.term }; },
                processResults: function(data) { return { results: data.results }; },
                cache: true
            },
            templateResult: function(r) {
                if (r.loading) return r.text;
                if (!r.email && !r.phone) return $('<span>' + r.text + '</span>');
                return $(
                    '<div class="select2-result-prospect">' +
                        '<div class="rp-name">' + r.text + '</div>' +
                        '<div class="rp-meta">' +
                            (r.email ? '&#9993; ' + r.email + '&nbsp;&nbsp;' : '') +
                            (r.phone ? '&#128222; ' + r.phone : '') +
                        '</div>' +
                    '</div>'
                );
            },
            templateSelection: function(r) { return r.text || r.id; }
        });

        $('#prospectSelect').on('select2:select', function(e) {
            var d = e.params.data;
            $('#f_pid').val(d.id);
            $('#f_name').val(d.name);
            $('#f_email').val(d.email);
            $('#f_phone').val(d.phone);
            $('#d_name').val(d.name);
            $('#d_email').val(d.email);
            $('#d_phone').val(d.phone);
            var initials = d.name.trim().split(' ').map(function(w){ return w[0]||''; }).slice(0,2).join('').toUpperCase();
            $('#piAvatar').text(initials);
            $('#piName').text(d.name + ' (ID: ' + d.id + ')');
            $('#piContact').text((d.email || '') + (d.email && d.phone ? '  |  ' : '') + (d.phone || ''));
            $('#prospecInfoBar').addClass('show');
        });

        $('#prospectSelect').on('select2:clear', function() {
            $('#f_pid, #f_name, #f_email, #f_phone').val('');
            $('#d_name, #d_email, #d_phone').val('');
            $('#prospecInfoBar').removeClass('show');
        });

        $('#serviceTypeSelect').select2({ placeholder: '-- Select Service Type --', allowClear: true });
        $('#appointmentTypeSelect').select2({ placeholder: '-- Select Appointment Type --', allowClear: true });
        $('#assignedToSelect').select2({ placeholder: '— Unassigned —', allowClear: true });
    });

    function toggleConsultType(val) {
        document.getElementById('contactMethodWrap').style.display  = (val === 'Telephonic') ? 'block' : 'none';
        document.getElementById('officeLocationWrap').style.display = (val === 'In-Person')  ? 'block' : 'none';
        document.getElementById('contactMethodSelect').value  = '';
        document.getElementById('officeLocationSelect').value = '';
    }

    function checkAvailability() {
        var date   = document.getElementById('appt_date').value;
        var time   = document.getElementById('appt_time').value;
        var member = ($('#assignedToSelect').val() || '').trim();
        var badge  = document.getElementById('availBadge');
        if (!date || !time) {
            alert('Please select a date and time first.');
            return;
        }
        if (!member) {
            badge.className = 'avail-badge avail-no';
            badge.textContent = '⚠ Please select a team member first';
            return;
        }
        badge.className = 'avail-badge';
        badge.textContent = 'Checking...';
        var form = new FormData();
        form.append('appointment_date', date);
        form.append('appointment_time', time);
        form.append('team_member', member);
        fetch(BASE + 'appoint/Appoint/check_availability', { method: 'POST', body: form })
            .then(function(r){ return r.json(); })
            .then(function(res) {
                if (res.available) {
                    badge.className = 'avail-badge avail-ok';
                    badge.textContent = '✓ ' + member + ' is free at this time';
                } else {
                    badge.className = 'avail-badge avail-no';
                    badge.textContent = '✗ ' + member + ' already has an appointment at this time';
                }
            })
            .catch(function() {
                badge.className = 'avail-badge avail-no';
                badge.textContent = 'Check failed';
            });
    }

    var _slotVerified = false;
    $('#apptForm').on('submit', function(e) {
        if (!$('#f_name').val()) {
            e.preventDefault();
            alert('Please select a prospect from the search dropdown.');
            $('#prospectSelect').select2('focus');
            return;
        }
        var ct = $('input[name="consultation_type"]:checked').val();
        if (!ct) {
            e.preventDefault();
            alert('Please select a Consultation Type.');
            return;
        }
        if (ct === 'Telephonic' && !$('#contactMethodSelect').val()) {
            e.preventDefault();
            alert('Please select a Preferred Contact Method.');
            return;
        }
        if (ct === 'In-Person' && !$('#officeLocationSelect').val()) {
            e.preventDefault();
            alert('Please select an Office Location.');
            return;
        }

        var date   = document.getElementById('appt_date').value;
        var time   = document.getElementById('appt_time').value;
        var member = ($('#assignedToSelect').val() || '').trim();

        if (date && time && member && !_slotVerified) {
            e.preventDefault();
            var btn = document.getElementById('btnSubmit');
            btn.disabled = true;
            btn.textContent = 'Checking slot...';
            var fd = new FormData();
            fd.append('appointment_date', date);
            fd.append('appointment_time', time);
            fd.append('team_member', member);
            fetch(BASE + 'appoint/Appoint/check_availability', { method: 'POST', body: fd })
                .then(function(r){ return r.json(); })
                .then(function(res) {
                    if (res.available) {
                        _slotVerified = true;
                        btn.textContent = 'Booking... Please wait';
                        document.getElementById('apptForm').submit();
                    } else {
                        alert(member + ' already has an appointment at this date and time.\nPlease choose a different slot or team member.');
                        btn.disabled = false;
                        btn.textContent = '📅 Book Appointment';
                    }
                })
                .catch(function() {
                    _slotVerified = true;
                    btn.textContent = 'Booking... Please wait';
                    document.getElementById('apptForm').submit();
                });
            return;
        }

        var btn = document.getElementById('btnSubmit');
        btn.disabled = true;
        btn.textContent = 'Booking... Please wait';
    });
    </script>
</body>
</html>
