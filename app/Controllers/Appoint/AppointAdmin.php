<?php
namespace App\Controllers\Appoint;

use App\Controllers\BaseController;
use App\Models\Appoint\Appointment_model;
use App\Models\Team_model;

class AppointAdmin extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set('America/Vancouver');
    }

    private $credentials = [
        ['user' => 'admin',   'pass' => 'sia@2024',    'name' => 'Super Admin'],
        ['user' => 'manager', 'pass' => 'manager@123', 'name' => 'Manager'],
    ];

    private function isAdmin()
    {
        return session()->get('appoint_admin_loggedin') === true
            || session()->get('isLoggedIn') === true;
    }

    public function login()
    {
        if ($this->isAdmin()) {
            return redirect()->to(base_url('appoint/AppointAdmin/dashboard'));
        }

        $data = ['error' => ''];

        if ($this->request->getMethod() == 'post') {
            $user  = trim($this->request->getPost('username'));
            $pass  = $this->request->getPost('password');
            $found = false;

            foreach ($this->credentials as $cred) {
                if ($cred['user'] === $user && $cred['pass'] === $pass) {
                    $found = true;
                    session()->set([
                        'appoint_admin_loggedin' => true,
                        'appoint_admin_name'     => $cred['name'],
                        'appoint_admin_user'     => $user,
                    ]);
                    break;
                }
            }

            if ($found) {
                return redirect()->to(base_url('appoint/AppointAdmin/dashboard'));
            }
            $data['error'] = 'Invalid username or password.';
        }

        return view('appoint/admin_login', $data);
    }

    public function logout()
    {
        session()->remove(['appoint_admin_loggedin', 'appoint_admin_name', 'appoint_admin_user']);
        return redirect()->to(base_url());
    }

    public function dashboard()
    {
        $model = new Appointment_model();
        $team  = new Team_model();
        $db    = \Config\Database::connect();

        $data['stat_today']     = (new Appointment_model())->where('appointment_date', date('Y-m-d'))->countAllResults();
        $data['stat_tomorrow']  = (new Appointment_model())->where('appointment_date', date('Y-m-d', strtotime('+1 day')))->countAllResults();
        $data['stat_inoffice']  = (new Appointment_model())->where('consultation_type', 'In-Person')->where('status !=', 3)->countAllResults();
        $data['stat_pending']   = (new Appointment_model())->where('status', 0)->countAllResults();
        $data['stat_confirmed'] = (new Appointment_model())->where('status', 1)->countAllResults();
        $data['stat_cancelled'] = (new Appointment_model())->where('status', 3)->countAllResults();

        // All appointment dates (unfiltered) for the sidebar calendar
        $data['all_appt_dates'] = array_column(
            $db->query("SELECT DISTINCT appointment_date FROM tbl_app_appointment WHERE status != 3")->getResultArray(),
            'appointment_date'
        );

        $fStatus           = $this->request->getGet('status');
        $fDate             = $this->request->getGet('date');
        $fSearch           = $this->request->getGet('search');
        $fMember           = $this->request->getGet('member');
        $fConsultationType = $this->request->getGet('consultation_type');

        // Reject date values that are not valid YYYY-MM-DD (e.g. 0000-00-00 from browser)
        if ($fDate && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $fDate)) {
            $fDate = '';
        }

        $builder = $model->orderBy('appointment_date', 'asc')->orderBy('appointment_time', 'asc');

        if ($fStatus !== null && $fStatus !== '') {
            $builder->where('status', $fStatus);
        }
        $hasOtherFilter = $fSearch || $fMember || ($fStatus !== null && $fStatus !== '') || $fConsultationType;

        if ($fDate) {
            $builder->where('appointment_date', $fDate);
        } elseif (!$hasOtherFilter) {
            $builder->where('appointment_date >=', date('Y-m-d', strtotime('-1 day')));
        }
        if ($fSearch) {
            $builder->groupStart()
                ->like('client_name', $fSearch)
                ->orLike('client_email', $fSearch)
                ->orLike('client_phone', $fSearch)
                ->orLike('service_type', $fSearch)
                ->groupEnd();
        }
        if ($fMember) {
            $builder->like('assigned_to', $fMember);
        }
        if ($fConsultationType) {
            $builder->where('consultation_type', $fConsultationType);
        }

        $data['appointments'] = $builder->findAll();
        $data['team_members'] = $team->select('id, firstname, lastname')->where('status', 1)->where('type', 'Employee')->findAll();
        $data['filters']      = compact('fStatus', 'fDate', 'fSearch', 'fMember', 'fConsultationType');
        $data['admin_name']   = session()->get('appoint_admin_name') ?? 'Guest';

        return view('appoint/admin_dashboard', $data);
    }

    // ── SCENARIO 2 & 8: Client + Team – Website Confirmation ─────────────────
    public function approve($id)
    {
        if (!$this->isAdmin()) return $this->response->setJSON(['error' => 'Unauthorized']);

        $model = new Appointment_model();
        $appt  = $model->find($id);
        $model->update($id, ['status' => 1, 'update_on' => date('Y-m-d H:i:s')]);

        if ($appt && ($appt['status'] ?? 0) != 1) {
            helper(['appointment_email']);
            $siaId      = 'SIA-' . ($appt['prospect_id'] ?: $id);
            $apptType   = $appt['appointment_type'] ?? '';
            $assignedTo = $appt['assigned_to'] ?? '';
            $dateLabel  = date('F j, Y', strtotime($appt['appointment_date']));
            $timeLabel  = date('g:i A', strtotime($appt['appointment_time'])) . ' (PST – Vancouver, Canada)';
            $dateTime   = $dateLabel . ' at ' . date('g:i A', strtotime($appt['appointment_time'])) . ' (PST)';

            // Scenario 2: Client – Website Confirmation
            if (!empty($appt['client_email'])) {
                $clientBody = '
<p>Dear ' . htmlspecialchars($appt['client_name']) . ',</p>
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>Your appointment for <strong>' . htmlspecialchars($apptType) . '</strong> has been confirmed.</p>
' . sia_details_table([
    'Date' => $dateLabel,
    'Time' => $timeLabel,
]) . '
<p>Our consultant will call you on your provided number at the scheduled time.</p>
' . sia_contact_block() . '
' . sia_manage_links($id, (int)($appt['prospect_id'] ?? 0), ['Reference' => $siaId, 'Client' => $appt['client_name'], 'Type' => $apptType, 'Service' => $appt['service_type'] ?? '', 'Date' => $dateLabel, 'Time' => $timeLabel]) . '
' . sia_calendar_buttons($id, $appt['appointment_date'], $appt['appointment_time']) . '
<br><p>Warm regards,<br><strong>Sia Immigration Solutions</strong></p>';

                sia_send_email(
                    $appt['client_email'],
                    'Appointment Confirmed – ' . $appt['client_name'] . ' – ' . $apptType . ' – ' . $siaId,
                    sia_appt_html($clientBody)
                );
            }

            // Scenario 8: Team – Website Appointment Confirmed & Team Member Assigned
            $teamBody = '
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>Website appointment inquiry has been confirmed' . (!empty($assignedTo) ? ' and team member assigned' : '') . '.</p>
' . sia_details_table(array_filter([
    'Client'               => $appt['client_name'],
    'Phone'                => $appt['client_phone'] ?? '',
    'Appointment Type'     => $apptType,
    'Service Type'         => $appt['service_type'] ?? '',
    'Date & Time'          => $dateTime,
    'Team Member Assigned' => $assignedTo ?: null,
], fn($v) => $v !== null && $v !== ''));
            sia_send_email(
                sia_team_emails(),
                (!empty($assignedTo) ? explode(' ', $assignedTo)[0] . ' Assigned For' : 'Appointment Confirmed') . ' – ' . $appt['client_name'] . ' – ' . $apptType . ' – ' . ($assignedTo ?: 'Unassigned') . ' – ' . $siaId,
                sia_appt_html($teamBody)
            );

            // WhatsApp: Client – Confirmed
            if (!empty($appt['client_phone'])) {
                sia_send_text($appt['client_phone'], sia_text_confirmed(
                    $appt['client_name'], $apptType, $siaId,
                    $appt['appointment_date'], $appt['appointment_time']
                ));
            }
        }

        return $this->response->setJSON(['success' => true]);
    }

    // ── SCENARIOS 8 & 9: Client + Team – Cancellation ────────────────────────
    public function reject($id)
    {
        if (!$this->isAdmin()) return $this->response->setJSON(['error' => 'Unauthorized']);

        $model = new Appointment_model();
        $appt  = $model->find($id);
        $model->update($id, ['status' => 3, 'update_on' => date('Y-m-d H:i:s')]);

        if ($appt) {
            $this->_sendCancellationEmails($id, $appt);
        }

        return $this->response->setJSON(['success' => true]);
    }

    public function set_status($id)
    {
        if (!$this->isAdmin()) return $this->response->setJSON(['error' => 'Unauthorized']);

        $status = (int) $this->request->getPost('status');
        $model  = new Appointment_model();
        $appt   = $model->find($id);
        $model->update($id, ['status' => $status, 'update_on' => date('Y-m-d H:i:s')]);

        if ($appt) {
            // Send notifications only when status actually changes (avoid duplicates)
            if ($status === 1 && ($appt['status'] ?? 0) != 1) {
                helper(['appointment_email']);
                $siaId      = 'SIA-' . ($appt['prospect_id'] ?: $id);
                $apptType   = $appt['appointment_type'] ?? '';
                $assignedTo = $appt['assigned_to'] ?? '';
                $dateLabel  = date('F j, Y', strtotime($appt['appointment_date']));
                $timeLabel  = date('g:i A', strtotime($appt['appointment_time'])) . ' (PST – Vancouver, Canada)';
                $dateTime   = $dateLabel . ' at ' . date('g:i A', strtotime($appt['appointment_time'])) . ' (PST)';

                if (!empty($appt['client_email'])) {
                    $clientBody = '
<p>Dear ' . htmlspecialchars($appt['client_name']) . ',</p>
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>Your appointment for <strong>' . htmlspecialchars($apptType) . '</strong> has been confirmed.</p>
' . sia_details_table([
    'Date'             => $dateLabel,
    'Time'             => $timeLabel,
    'Appointment Type' => $apptType,
    'Service Type'     => $appt['service_type'] ?? '',
]) . '
<p>Our consultant will call you on your provided number at the scheduled time.</p>
' . sia_contact_block() . '
' . sia_manage_links($id, (int)($appt['prospect_id'] ?? 0), ['Reference' => $siaId, 'Client' => $appt['client_name'], 'Type' => $apptType, 'Service' => $appt['service_type'] ?? '', 'Date' => $dateLabel, 'Time' => $timeLabel]) . '
' . sia_calendar_buttons($id, $appt['appointment_date'], $appt['appointment_time']) . '
<br>
<p>Warm regards,<br><strong>Sia Immigration Solutions</strong></p>';
                    sia_send_email(
                        $appt['client_email'],
                        'Appointment Confirmed – ' . $appt['client_name'] . ' – ' . $apptType . ' – ' . $siaId,
                        sia_appt_html($clientBody)
                    );
                }

                $teamBody = '
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>Appointment has been confirmed.</p>
' . sia_details_table(array_filter([
    'Client'               => $appt['client_name'],
    'Phone'                => $appt['client_phone'] ?? '',
    'Appointment Type'     => $apptType,
    'Service Type'         => $appt['service_type'] ?? '',
    'Date & Time'          => $dateTime,
    'Team Member Assigned' => $assignedTo ?: null,
], fn($v) => $v !== null && $v !== ''));
                sia_send_email(
                    sia_team_emails(),
                    (!empty($assignedTo) ? explode(' ', $assignedTo)[0] . ' Assigned For' : 'Appointment Confirmed') . ' – ' . $appt['client_name'] . ' – ' . $apptType . ' – ' . ($assignedTo ?: 'Unassigned') . ' – ' . $siaId,
                    sia_appt_html($teamBody)
                );

                if (!empty($appt['client_phone'])) {
                    sia_send_text($appt['client_phone'], sia_text_confirmed(
                        $appt['client_name'], $apptType, $siaId,
                        $appt['appointment_date'], $appt['appointment_time']
                    ));
                }
            } elseif ($status === 3 && ($appt['status'] ?? 0) != 3) {
                $this->_sendCancellationEmails($id, $appt);
            }
        }

        return $this->response->setJSON(['success' => true, 'status' => $status]);
    }

    // ── SCENARIO 4 (initial) / 12 (reassignment): Team – Assignment ──────────
    public function assign($id)
    {
        if (!$this->isAdmin()) return $this->response->setJSON(['error' => 'Unauthorized']);

        $model        = new Appointment_model();
        $appt         = $model->find($id);
        $prevAssigned = trim($appt['assigned_to'] ?? '');
        $newMember    = trim($this->request->getPost('assigned_to') ?? '');

        if (!$appt) {
            return $this->response->setJSON(['error' => 'Appointment not found.']);
        }
        if (empty($appt['appointment_type'])) {
            return $this->response->setJSON(['error' => 'Appointment Type must be selected before reassigning.']);
        }
        if (empty($appt['service_type'])) {
            return $this->response->setJSON(['error' => 'Service Type must be selected before reassigning.']);
        }

        $model->update($id, ['assigned_to' => $newMember, 'update_on' => date('Y-m-d H:i:s')]);

        if ($appt && !empty($newMember)) {
            helper(['appointment_email']);
            $siaId    = 'SIA-' . ($appt['prospect_id'] ?: $id);
            $apptType = $appt['appointment_type'] ?? '';
            $dateTime = date('F j, Y', strtotime($appt['appointment_date']))
                . ' at ' . date('g:i A', strtotime($appt['appointment_time'])) . ' (PST)';

            $prevMember = trim($appt['assigned_to'] ?? '');
            $isReassign = !empty($prevMember) && $prevMember !== $newMember;

            $teamBody = '
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>Appointment has been ' . ($isReassign ? 'reassigned internally' : 'assigned') . '.</p>
' . sia_details_table(array_filter([
    'Client'               => $appt['client_name'],
    'Phone'                => $appt['client_phone'] ?? '',
    'Appointment Type'     => $apptType,
    'Service Type'         => $appt['service_type'] ?? '',
    'Date & Time'          => $dateTime,
    'Previous Team Member' => $isReassign ? $prevMember : null,
    'New Team Member'      => $newMember,
]));
            sia_send_email(
                sia_team_emails(),
                $newMember . ' Assigned – ' . $appt['client_name'] . ' – ' . $apptType . ' – ' . $siaId,
                sia_appt_html($teamBody)
            );

            // WhatsApp: Team – Member Assigned (30s gap between each to avoid WhatsApp rate limits)
            set_time_limit(0);
            $teamPhones = sia_team_phones();
            foreach ($teamPhones as $i => $teamPhone) {
                if ($i > 0) sleep(30);
                sia_send_text($teamPhone, sia_text_team_assigned(
                    $newMember, $appt['client_name'], $siaId, $apptType,
                    $appt['service_type'] ?? '', $appt['appointment_date'], $appt['appointment_time']
                ));
            }
        }

        return $this->response->setJSON(['success' => true, 'assigned_to' => $newMember]);
    }

    // ── Dashboard Reschedule – Scenarios 10 & 11 ─────────────────────────────
    public function reschedule($id)
    {
        if (!$this->isAdmin()) return $this->response->setJSON(['error' => 'Unauthorized']);

        $model   = new Appointment_model();
        $appt    = $model->find($id);
        $newDate = trim($this->request->getPost('appointment_date') ?? '');
        $newTime = trim($this->request->getPost('appointment_time') ?? '');

        if (!$appt || !$newDate || !$newTime) {
            return $this->response->setJSON(['error' => 'Missing data']);
        }

        if (empty($appt['appointment_type'])) {
            return $this->response->setJSON(['error' => 'Appointment Type must be selected before rescheduling.']);
        }
        if (empty($appt['service_type'])) {
            return $this->response->setJSON(['error' => 'Service Type must be selected before rescheduling.']);
        }
        if (empty($appt['client_name'])) {
            return $this->response->setJSON(['error' => 'Client name is missing. Please update the appointment first.']);
        }

        $assignedTo = $appt['assigned_to'] ?? '';
        if (!empty($assignedTo)) {
            if ($model->isMemberSlotTaken($newDate, $newTime, $assignedTo, $id)) {
                return $this->response->setJSON(['error' => $assignedTo . ' already has an appointment at this date and time. Please choose a different slot.']);
            }
        }

        $model->update($id, [
            'appointment_date' => $newDate,
            'appointment_time' => $newTime,
            'update_on'        => date('Y-m-d H:i:s'),
        ]);

        helper(['appointment_email']);
        $siaId       = 'SIA-' . ($appt['prospect_id'] ?: $id);
        $apptType    = $appt['appointment_type'] ?? '';
        $assignedTo  = $appt['assigned_to'] ?? '';
        $newDateTime = date('F j, Y', strtotime($newDate)) . ' at ' . date('g:i A', strtotime($newTime)) . ' (PST)';

        // Scenario 10: Client – Reschedule
        if (!empty($appt['client_email'])) {
            $clientBody = '
<p>Dear ' . htmlspecialchars($appt['client_name']) . ',</p>
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>Your appointment has been rescheduled.</p>
<p><strong>New Details:</strong></p>
' . sia_details_table([
    'Date' => date('F j, Y', strtotime($newDate)),
    'Time' => date('g:i A', strtotime($newTime)) . ' (PST – Vancouver, Canada)',
]) . '
' . sia_manage_links($id, (int)($appt['prospect_id'] ?? 0), ['Reference' => $siaId, 'Client' => $appt['client_name'], 'Type' => $apptType, 'Date' => date('F j, Y', strtotime($newDate)), 'Time' => date('g:i A', strtotime($newTime)) . ' (PST)']) . '
' . sia_calendar_buttons($id, $newDate, $newTime) . '
<br><p>Warm regards,<br><strong>Sia Immigration Solutions</strong></p>';
            sia_send_email(
                $appt['client_email'],
                'Appointment Rescheduled – ' . $appt['client_name'] . ' – ' . $apptType . ' – ' . $siaId,
                sia_appt_html($clientBody)
            );
        }

        // Scenario 11: Team – Reschedule
        $teamBody = '
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>Appointment has been rescheduled.</p>
' . sia_details_table([
    'Client'               => $appt['client_name'],
    'Phone'                => $appt['client_phone'] ?? '',
    'Appointment Type'     => $apptType,
    'Service Type'         => $appt['service_type'] ?? '',
    'New Date & Time'      => $newDateTime,
    'Team Member Assigned' => $assignedTo,
]);
        sia_send_email(
            sia_team_emails(),
            'Appointment Rescheduled – ' . $appt['client_name'] . ' – ' . $apptType . ' – ' . $assignedTo . ' – ' . $siaId,
            sia_appt_html($teamBody)
        );

        // WhatsApp: Rescheduled (scenario 5)
        if (!empty($appt['client_phone'])) {
            sia_send_text($appt['client_phone'], sia_text_rescheduled(
                $appt['client_name'], $apptType, $siaId, $newDate, $newTime
            ));
        }

        return $this->response->setJSON(['success' => true, 'date' => $newDate, 'time' => $newTime]);
    }

    // ── Resend Confirmation Email to Client ──────────────────────────────────
    public function resend_confirmation($id)
    {
        if (!$this->isAdmin()) return $this->response->setJSON(['error' => 'Unauthorized']);

        $model = new Appointment_model();
        $appt  = $model->find($id);

        if (!$appt) {
            return $this->response->setJSON(['error' => 'Appointment not found.']);
        }
        if ((int)($appt['status'] ?? 0) !== 1) {
            return $this->response->setJSON(['error' => 'Confirmation email can only be resent for confirmed appointments.']);
        }
        if (empty($appt['client_email'])) {
            return $this->response->setJSON(['error' => 'No client email on record.']);
        }

        helper(['appointment_email']);
        $siaId     = 'SIA-' . ($appt['prospect_id'] ?: $id);
        $apptType  = $appt['appointment_type'] ?? '';
        $dateLabel = date('F j, Y', strtotime($appt['appointment_date']));
        $timeLabel = date('g:i A', strtotime($appt['appointment_time'])) . ' (PST – Vancouver, Canada)';

        $clientBody = '
<p>Dear ' . htmlspecialchars($appt['client_name']) . ',</p>
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>Your appointment for <strong>' . htmlspecialchars($apptType) . '</strong> has been confirmed.</p>
' . sia_details_table([
    'Date'             => $dateLabel,
    'Time'             => $timeLabel,
    'Appointment Type' => $apptType,
    'Service Type'     => $appt['service_type'] ?? '',
]) . '
<p>Our consultant will call you on your provided number at the scheduled time.</p>
' . sia_contact_block() . '
' . sia_manage_links($id, (int)($appt['prospect_id'] ?? 0), ['Reference' => $siaId, 'Client' => $appt['client_name'], 'Type' => $apptType, 'Service' => $appt['service_type'] ?? '', 'Date' => $dateLabel, 'Time' => $timeLabel]) . '
' . sia_calendar_buttons($id, $appt['appointment_date'], $appt['appointment_time']) . '
<br><p>Warm regards,<br><strong>Sia Immigration Solutions</strong></p>';

        sia_send_email(
            $appt['client_email'],
            'Appointment Confirmed – ' . $appt['client_name'] . ' – ' . $apptType . ' – ' . $siaId,
            sia_appt_html($clientBody)
        );

        return $this->response->setJSON(['success' => true]);
    }

    // ── SCENARIO 7: Client – Reminder ────────────────────────────────────────
    public function send_reminder($id)
    {
        if (!$this->isAdmin()) return $this->response->setJSON(['error' => 'Unauthorized']);

        $model = new Appointment_model();
        $appt  = $model->find($id);

        if (!$appt) {
            return $this->response->setJSON(['success' => false, 'msg' => 'Appointment not found.']);
        }

        helper(['appointment_email']);
        $siaId    = 'SIA-' . ($appt['prospect_id'] ?: $id);
        $apptType = $appt['appointment_type'] ?? '';

        $subject = 'Appointment Reminder – ' . $appt['client_name'] . ' – ' . $apptType . ' – ' . $siaId;

        if (!empty($appt['client_email'])) {
            $clientBody = '
<p>Dear ' . htmlspecialchars($appt['client_name']) . ',</p>
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>This is a reminder of your upcoming appointment.</p>
' . sia_details_table([
    'Date' => date('F j, Y', strtotime($appt['appointment_date'])),
    'Time' => date('g:i A', strtotime($appt['appointment_time'])) . ' (PST – Vancouver, Canada)',
]) . '
<p>Our consultant will contact you at the scheduled time.</p>
' . sia_manage_links((int)$id, (int)($appt['prospect_id'] ?? 0)) . '
<br><p>Warm regards,<br><strong>Sia Immigration Solutions</strong></p>';

            sia_send_email(
                $appt['client_email'],
                $subject,
                sia_appt_html($clientBody),
                sia_team_emails()
            );
        } else {
            // No client email — still notify team
            $teamBody = '
<p><strong>Appointment Reminder – Team Notification</strong></p>
<p><strong>Reference: ' . $siaId . '</strong></p>
' . sia_details_table([
    'Client'  => $appt['client_name'] ?? '',
    'Phone'   => $appt['client_phone'] ?? '',
    'Date'    => date('F j, Y', strtotime($appt['appointment_date'])),
    'Time'    => date('g:i A', strtotime($appt['appointment_time'])) . ' (PST)',
    'Type'    => $apptType,
]) . '
<p>Note: Client has no email address on file.</p>';
            sia_send_email(
                sia_team_emails(),
                $subject,
                sia_appt_html($teamBody)
            );
        }

        // WhatsApp: Reminder (scenario 3)
        if (!empty($appt['client_phone'])) {
            sia_send_text($appt['client_phone'], sia_text_reminder(
                $appt['client_name'], $apptType, $siaId,
                $appt['appointment_date'], $appt['appointment_time']
            ));
        }

        return $this->response->setJSON(['success' => true]);
    }

    // ── CRON: Auto Reminder (5 hrs before appointment) ───────────────────────
    public function auto_reminder()
    {
        if ($this->request->getGet('token') !== 'SIA_REMIND_CRON') {
            return $this->response->setStatusCode(403)->setBody('Forbidden');
        }

        helper(['appointment_email']);
        set_time_limit(0);
        $model = new Appointment_model();
        $appts = $model->getDueForReminder();
        $sent  = 0;

        foreach ($appts as $i => $appt) {
            if ($i > 0) sleep(30);
            $id       = $appt['id'];
            $siaId    = 'SIA-' . ($appt['prospect_id'] ?: $id);
            $apptType = $appt['appointment_type'] ?? '';

            $subject = 'Appointment Reminder – ' . $appt['client_name'] . ' – ' . $apptType . ' – ' . $siaId;

            if (!empty($appt['client_email'])) {
                $clientBody = '
<p>Dear ' . htmlspecialchars($appt['client_name']) . ',</p>
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>This is a reminder of your upcoming appointment.</p>
' . sia_details_table([
    'Date' => date('F j, Y', strtotime($appt['appointment_date'])),
    'Time' => date('g:i A', strtotime($appt['appointment_time'])) . ' (PST – Vancouver, Canada)',
]) . '
<p>Our consultant will contact you at the scheduled time.</p>
' . sia_manage_links((int)$id, (int)($appt['prospect_id'] ?? 0)) . '
<br><p>Warm regards,<br><strong>Sia Immigration Solutions</strong></p>';

                sia_send_email(
                    $appt['client_email'],
                    $subject,
                    sia_appt_html($clientBody),
                    sia_team_emails()
                );
            } else {
                $teamBody = '
<p><strong>Appointment Reminder – Team Notification</strong></p>
<p><strong>Reference: ' . $siaId . '</strong></p>
' . sia_details_table([
    'Client'  => $appt['client_name'] ?? '',
    'Phone'   => $appt['client_phone'] ?? '',
    'Date'    => date('F j, Y', strtotime($appt['appointment_date'])),
    'Time'    => date('g:i A', strtotime($appt['appointment_time'])) . ' (PST)',
    'Type'    => $apptType,
]) . '
<p>Note: Client has no email address on file.</p>';
                sia_send_email(
                    sia_team_emails(),
                    $subject,
                    sia_appt_html($teamBody)
                );
            }

            if (!empty($appt['client_phone'])) {
                sia_send_text($appt['client_phone'], sia_text_reminder(
                    $appt['client_name'], $apptType, $siaId,
                    $appt['appointment_date'], $appt['appointment_time']
                ));
            }

            $model->update($id, ['reminder_sent' => 1]);
            $sent++;
        }

        return $this->response->setJSON(['sent' => $sent]);
    }

    // ── SCENARIO 13: Team – Daily Summary (tomorrow's appointments) ──────────
    public function daily_summary()
    {
        $token = $this->request->getGet('token');
        if ($token !== 'SIA_SUMMARY_CRON' && !$this->isAdmin()) {
            return $this->response->setJSON(['error' => 'Unauthorized']);
        }

        // Use Vancouver/PST time for correct "tomorrow" calculation
        $tz = new \DateTimeZone('America/Vancouver');
        $now = new \DateTime('now', $tz);
        $tomorrowDt = (clone $now)->modify('+1 day');
        $tomorrow  = $tomorrowDt->format('Y-m-d');
        $dateLabel = $tomorrowDt->format('l, F j, Y');

        helper(['appointment_email']);
        $model     = new Appointment_model();
        $appts     = $model->getByDate($tomorrow);
        $count     = count($appts);

        $rows = '';
        foreach ($appts as $a) {
            $siaIdRow = 'SIA-' . ($a['prospect_id'] ?: $a['id']);
            $rows .= '
<tr>
  <td style="padding:12px 10px;font-family:Arial,sans-serif;font-size:14px;color:#333;border-bottom:1px solid #e8e8e8;vertical-align:top;">
    <strong>' . htmlspecialchars(date('g:i A', strtotime($a['appointment_time']))) . ' (PST)</strong><br>
    Client: ' . htmlspecialchars($a['client_name']) . '<br>
    Phone: ' . htmlspecialchars($a['client_phone'] ?? '') . '<br>
    Ref: ' . $siaIdRow . '<br>
    Appointment Type: ' . htmlspecialchars($a['appointment_type'] ?? '') . '<br>
    Service Type: ' . htmlspecialchars($a['service_type'] ?? '') . '<br>
    Consultant: ' . htmlspecialchars($a['assigned_to'] ?? 'Unassigned') . '
  </td>
</tr>';
        }

        $summaryBody = '
<p>Good evening,</p>
<p>Here is the summary of tomorrow\'s appointments.</p>
<p><strong>Total Appointments: ' . $count . '</strong></p>
' . ($count > 0
    ? '<table cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;border:1px solid #e8e8e8;margin-top:8px;"><tbody>' . $rows . '</tbody></table>'
    : '<p>No appointments scheduled for tomorrow.</p>');

        sia_send_email(
            sia_team_emails(),
            'Tomorrow\'s Appointments Summary – ' . $dateLabel,
            sia_appt_html($summaryBody)
        );

        // WhatsApp: Team Daily Summary (30s gap between each to avoid WhatsApp rate limits)
        set_time_limit(0);
        $teamSms = sia_text_team_summary($dateLabel, $appts);
        foreach (sia_team_phones() as $i => $teamPhone) {
            if ($i > 0) sleep(30);
            sia_send_text($teamPhone, $teamSms);
        }

        return $this->response->setJSON(['success' => true, 'count' => $count]);
    }

    public function check_slot()
    {
        $date      = $this->request->getPost('appointment_date');
        $time      = $this->request->getPost('appointment_time');
        $member    = trim($this->request->getPost('team_member') ?? '');
        $excludeId = $this->request->getPost('exclude_id');
        if (!$date || !$time) return $this->response->setJSON(['error' => 'Missing data']);
        $model = new Appointment_model();
        if (!empty($member)) {
            $taken = $model->isMemberSlotTaken($date, $time, $member, $excludeId ?: null);
        } else {
            $taken = false;
        }
        return $this->response->setJSON(['available' => !$taken]);
    }

    public function check_member_slot()
    {
        $date      = $this->request->getPost('appointment_date');
        $time      = $this->request->getPost('appointment_time');
        $member    = $this->request->getPost('team_member');
        $excludeId = $this->request->getPost('exclude_id');
        if (!$date || !$time || !$member) return $this->response->setJSON(['error' => 'Missing data']);
        $taken = (new Appointment_model())->isMemberSlotTaken($date, $time, $member, $excludeId ?: null);
        return $this->response->setJSON(['available' => !$taken]);
    }

    public function bulk_action()
    {
        $action = $this->request->getPost('action');
        $ids    = json_decode($this->request->getPost('ids'), true);

        if (empty($ids) || !$action) return $this->response->setJSON(['error' => 'No data']);

        $model = new Appointment_model();
        $map   = ['approve' => 1, 'confirm' => 1, 'complete' => 2, 'reject' => 3];

        foreach ($ids as $id) {
            if ($action === 'delete') {
                $model->delete($id);
            } elseif (isset($map[$action])) {
                $model->update($id, ['status' => $map[$action], 'update_on' => date('Y-m-d H:i:s')]);
            }
        }

        return $this->response->setJSON(['success' => true, 'count' => count($ids)]);
    }

    // ── Scenarios 8 & 9: Cancellation emails + WhatsApp ──────────────────────
    private function _sendCancellationEmails(int $id, array $appt): void
    {
        helper(['appointment_email']);
        $siaId    = 'SIA-' . ($appt['prospect_id'] ?: $id);
        $apptType = $appt['appointment_type'] ?? '';

        // Scenario 8: Client – Cancellation
        if (!empty($appt['client_email'])) {
            $clientBody = '
<p>Dear ' . htmlspecialchars($appt['client_name']) . ',</p>
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>Your appointment has been cancelled.</p>
<p>You may rebook at your convenience.</p>
<br><p>Warm regards,<br><strong>Sia Immigration Solutions</strong></p>';

            sia_send_email(
                $appt['client_email'],
                'Appointment Cancelled – ' . $appt['client_name'] . ' – ' . $apptType . ' – ' . $siaId,
                sia_appt_html($clientBody)
            );
        }

        // Scenario 9: Team – Cancellation
        $cancelDt = date('F j, Y', strtotime($appt['appointment_date']))
            . ' at ' . date('g:i A', strtotime($appt['appointment_time'])) . ' (PST)';

        $teamBody = '
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>Appointment has been cancelled.</p>
' . sia_details_table([
    'Client'                => $appt['client_name'],
    'Phone'                 => $appt['client_phone'] ?? '',
    'Appointment Type'      => $apptType,
    'Service Type'          => $appt['service_type'] ?? '',
    'Cancelled Date & Time' => $cancelDt,
    'Team Member Assigned'  => $appt['assigned_to'] ?? '',
]);

        sia_send_email(
            sia_team_emails(),
            'Appointment Cancelled – ' . $appt['client_name'] . ' – ' . $apptType . ' – ' . ($appt['assigned_to'] ?? '') . ' – ' . $siaId,
            sia_appt_html($teamBody)
        );

        // WhatsApp: Cancelled (scenario 4)
        if (!empty($appt['client_phone'])) {
            sia_send_text($appt['client_phone'], sia_text_cancelled(
                $appt['client_name'], $apptType, $siaId
            ));
        }
    }

    public function team_schedule()
    {
        if (!$this->isAdmin()) {
            return redirect()->to(base_url());
        }

        $db   = \Config\Database::connect();
        $team = new Team_model();

        $today     = date('Y-m-d');
        $weekStart = $this->request->getGet('week') ?: $today;
        if (!strtotime($weekStart)) $weekStart = $today;
        $weekEnd   = date('Y-m-d', strtotime($weekStart . ' +6 days'));

        $fMember  = trim($this->request->getGet('member')  ?? '');
        $fService = trim($this->request->getGet('service') ?? '');
        $fFrom    = trim($this->request->getGet('from')    ?? '') ?: $weekStart;
        $fTo      = trim($this->request->getGet('to')      ?? '') ?: $weekEnd;
        if (!strtotime($fFrom)) $fFrom = $weekStart;
        if (!strtotime($fTo))   $fTo   = $weekEnd;

        $model        = new Appointment_model();
        $appointments = $model->getByDateRange($fFrom, $fTo, $fMember, $fService);

        $schedule = [];
        foreach ($appointments as $appt) {
            $member = $appt['assigned_to'] ?: 'Unassigned';
            $schedule[$member][$appt['appointment_date']][] = $appt;
        }

        $dayCount = max(7, (int)((strtotime($fTo) - strtotime($fFrom)) / 86400) + 1);
        $weekDays = [];
        for ($i = 0; $i < $dayCount; $i++) {
            $weekDays[] = date('Y-m-d', strtotime($fFrom . ' +' . $i . ' days'));
        }

        $services = array_column(
            $db->query("SELECT DISTINCT service_type FROM tbl_app_appointment WHERE service_type != '' AND status != 3 ORDER BY service_type")->getResultArray(),
            'service_type'
        );

        $data = [
            'teamMembers' => $team->getpost(),
            'schedule'    => $schedule,
            'weekDays'    => $weekDays,
            'fFrom'       => $fFrom,
            'fTo'         => $fTo,
            'fMember'     => $fMember,
            'fService'    => $fService,
            'prevWeek'    => date('Y-m-d', strtotime($weekStart . ' -7 days')),
            'nextWeek'    => date('Y-m-d', strtotime($weekStart . ' +7 days')),
            'totalBusy'   => count($appointments),
            'services'    => $services,
        ];

        return view('appoint/team_schedule', $data);
    }

    public function team_schedule_export()
    {
        if (!$this->isAdmin()) {
            return redirect()->to(base_url());
        }

        $today = date('Y-m-d');
        $fFrom    = trim($this->request->getGet('from')    ?? '') ?: $today;
        $fTo      = trim($this->request->getGet('to')      ?? '') ?: date('Y-m-d', strtotime('+6 days'));
        $fMember  = trim($this->request->getGet('member')  ?? '');
        $fService = trim($this->request->getGet('service') ?? '');

        $rows = (new Appointment_model())->getByDateRange($fFrom, $fTo, $fMember, $fService);
        usort($rows, fn($a, $b) => strcmp($a['appointment_date'] . $a['appointment_time'], $b['appointment_date'] . $b['appointment_time']));

        $csv = "Date,Time,Client Name,Service,Type,Assigned To,Status\n";
        foreach ($rows as $r) {
            $status = $r['status'] == 1 ? 'Confirmed' : 'Pending';
            $csv .= implode(',', [
                $r['appointment_date'],
                $r['appointment_time'],
                '"' . str_replace('"', '""', $r['client_name']) . '"',
                '"' . str_replace('"', '""', $r['service_type']) . '"',
                '"' . str_replace('"', '""', $r['appointment_type']) . '"',
                '"' . str_replace('"', '""', ($r['assigned_to'] ?: 'Unassigned')) . '"',
                $status,
            ]) . "\n";
        }

        return $this->response
            ->setHeader('Content-Type', 'text/csv')
            ->setHeader('Content-Disposition', 'attachment; filename="team-schedule-' . $fFrom . '-to-' . $fTo . '.csv"')
            ->setBody($csv);
    }
}
