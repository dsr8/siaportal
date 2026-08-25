<?php
namespace App\Controllers\Appoint;

use App\Controllers\BaseController;
use App\Models\Appoint\Appointment_model;
use App\Models\Team_model;

class Appoint extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set('America/Vancouver');
    }

    private function isAuthorized(): bool
    {
        return session()->get('isLoggedIn') == true
            || session()->get('appoint_admin_loggedin') === true;
    }



    public function index()
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }

        $assignedTo = trim(session()->get('firstname') . ' ' . session()->get('lastname'));

        $Appoint = new Appointment_model();
        $today    = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('+1 day'));
        $dayafter = date('Y-m-d', strtotime('+2 days'));

        $data['today']    = $Appoint->getByDate($today,    $assignedTo ?: null);
        $data['tomorrow'] = $Appoint->getByDate($tomorrow, $assignedTo ?: null);
        $data['dayafter'] = $Appoint->getByDate($dayafter, $assignedTo ?: null);
        $data['rest']     = $Appoint->getAfter($dayafter,  $assignedTo ?: null);
        return view('appoint/index', $data);
    }

    public function add()
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }

        $from = $this->request->getGet('from') ?? 'index';

        if ($this->request->getMethod() == 'post') {
            $Appoint    = new Appointment_model();
            $ct         = $this->request->getPost('consultation_type') ?? '';
            $assignedTo = trim($this->request->getPost('assigned_to') ?? '');
            $apptDate   = $this->request->getPost('appointment_date');
            $apptTime   = $this->request->getPost('appointment_time');

            if (!empty($assignedTo) && !empty($apptDate) && !empty($apptTime)) {
                if ($Appoint->isMemberSlotTaken($apptDate, $apptTime, $assignedTo)) {
                    return redirect()->back()->withInput()
                        ->with('slot_error', $assignedTo . ' already has an appointment on this date and time. Please choose a different slot or team member.');
                }
            }

            $newId    = $Appoint->insert([
                'prospect_id'        => $this->request->getPost('prospect_id') ?: null,
                'client_name'        => $this->request->getPost('client_name'),
                'client_email'       => $this->request->getPost('client_email'),
                'client_phone'       => $this->request->getPost('client_phone'),
                'appointment_date'   => $this->request->getPost('appointment_date'),
                'appointment_time'   => $this->request->getPost('appointment_time'),
                'service_type'       => $this->request->getPost('service_type'),
                'appointment_type'   => $this->request->getPost('appointment_type'),
                'consultation_type'  => $ct,
                'contact_method'     => ($ct === 'Telephonic') ? $this->request->getPost('contact_method') : '',
                'office_location'    => ($ct === 'In-Person')  ? $this->request->getPost('office_location') : '',
                'inside_canada'      => $this->request->getPost('inside_canada') ?? '',
                'existing_client'    => $this->request->getPost('existing_client') ?? '',
                'immigration_status' => $this->request->getPost('immigration_status') ?? '',
                'assigned_to'        => $assignedTo,
                'notes'              => $this->request->getPost('notes'),
                'status'             => 1,
                'insert_on'          => date('Y-m-d H:i:s'),
            ]);

            // Scenarios 5 & 6: CRM booking emails + WhatsApp confirmed
            helper(['appointment_email']);
            $siaId      = 'SIA-' . ((int)$this->request->getPost('prospect_id') ?: $newId);
            $apptType   = $this->request->getPost('appointment_type') ?? '';
            $date       = $apptDate;
            $time       = $apptTime;
            $clientName = $this->request->getPost('client_name');
            $clientEmail= $this->request->getPost('client_email');
            $clientPhone= $this->request->getPost('client_phone');
            $service    = $this->request->getPost('service_type') ?? '';
            $ctType     = $ct;
            $dateLabel  = date('F j, Y', strtotime($date));
            $timeLabel  = date('g:i A', strtotime($time)) . ' (PST – Vancouver, Canada)';
            $dateTime   = date('F j, Y', strtotime($date)) . ' at ' . date('g:i A', strtotime($time)) . ' (PST)';

            // Scenario 5: Client – CRM Direct Booking
            if (!empty($clientEmail)) {
                $clientBody = '
<p>Dear ' . htmlspecialchars($clientName) . ',</p>
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>Your appointment for <strong>' . htmlspecialchars($apptType) . '</strong> has been scheduled.</p>
' . sia_details_table([
    'Date' => $dateLabel,
    'Time' => $timeLabel,
]) . '
<p>Our consultant will call you at the scheduled time.</p>
' . sia_contact_block() . '
' . sia_manage_links($newId, (int)$this->request->getPost('prospect_id'), ['Reference' => $siaId, 'Client' => $clientName, 'Type' => $apptType, 'Service' => $service, 'Date' => $dateLabel, 'Time' => $timeLabel]) . '
' . sia_calendar_buttons($newId, $date, $time) . '
<br><p>Warm regards,<br><strong>Sia Immigration Solutions</strong></p>';
                sia_send_email(
                    $clientEmail,
                    'Appointment Confirmed – ' . $clientName . ' – ' . $apptType . ' – ' . $siaId,
                    sia_appt_html($clientBody)
                );
            }

            // Scenario 6: Team – CRM Booking
            $teamBody = '
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>New appointment booked from CRM (Add Appointment page).</p>
' . sia_details_table([
    'Client'           => $clientName,
    'Phone'            => $clientPhone ?? '',
    'Appointment Type' => $apptType,
    'Service'          => $service,
    'Date & Time'      => $dateTime,
    'Assigned To'      => $assignedTo ?: 'Unassigned',
]);
            sia_send_email(
                sia_team_emails(),
                'Appointment Booked – ' . $clientName . ' – ' . $apptType . ' – ' . $assignedTo . ' – ' . $siaId,
                sia_appt_html($teamBody)
            );

            // Separate assignment email when a team member is set
            if (!empty($assignedTo)) {
                $assignBody = '
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>New appointment has been assigned to a team member.</p>
' . sia_details_table([
    'Client'           => $clientName,
    'Phone'            => $clientPhone ?? '',
    'Appointment Type' => $apptType,
    'Service'          => $service,
    'Date & Time'      => $dateTime,
    'Assigned To'      => $assignedTo,
]);
                sia_send_email(
                    sia_team_emails(),
                    explode(' ', $assignedTo)[0] . ' Assigned For – ' . $clientName . ' – ' . $apptType . ' – ' . $assignedTo . ' – ' . $siaId,
                    sia_appt_html($assignBody)
                );
            }

            // WhatsApp: Client – Confirmed
            if (!empty($clientPhone)) {
                sia_send_text($clientPhone, sia_text_confirmed(
                    $clientName, $apptType, $siaId, $date, $time
                ));
            }

            $postFrom = $this->request->getPost('_from') ?? $from;
            if ($postFrom === 'dashboard') {
                return redirect()->to(base_url('appoint/AppointAdmin/dashboard'));
            }
            return redirect()->to(base_url('appoint/Appoint/index'));
        }

        $team = new Team_model();
        $data['team_members'] = $team->select('id, firstname, lastname')->where('status', 1)->where('type', 'Employee')->findAll();
        $data['from'] = $from;
        return view('appoint/add', $data);
    }

    public function edit($id = null)
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }

        $Appoint  = new Appointment_model();
        $existing = $Appoint->find($id);

        if (!$existing) {
            return redirect()->to(base_url('appoint/AppointAdmin/dashboard'));
        }

        $from = $this->request->getGet('from') ?? 'index';

        if ($this->request->getMethod() == 'post') {
            $newDate     = $this->request->getPost('appointment_date');
            $newTime     = $this->request->getPost('appointment_time');
            $newAssigned = trim($this->request->getPost('assigned_to') ?? '');
            $prevAssigned = trim($existing['assigned_to'] ?? '');
            $prevStatus  = (int)($existing['status'] ?? 0);
            $newStatus   = (int)($this->request->getPost('status') ?? 0);

            $isRescheduled = ($existing['appointment_date'] !== $newDate || $existing['appointment_time'] !== $newTime);

            $Appoint->update($id, [
                'client_email'       => $this->request->getPost('client_email'),
                'client_phone'       => $this->request->getPost('client_phone'),
                'appointment_date'   => $newDate,
                'appointment_time'   => $newTime,
                'service_type'       => $this->request->getPost('service_type'),
                'appointment_type'   => $this->request->getPost('appointment_type'),
                'inside_canada'      => $this->request->getPost('inside_canada') ?? '',
                'existing_client'    => $this->request->getPost('existing_client') ?? '',
                'immigration_status' => $this->request->getPost('immigration_status') ?? '',
                'notes'              => $this->request->getPost('notes'),
                'status'             => $this->request->getPost('status'),
                'assigned_to'        => $newAssigned,
                'update_on'          => date('Y-m-d H:i:s'),
            ]);

            helper(['appointment_email']);

            // Scenarios 8 & 9: Cancellation emails when status changes to Cancelled
            if ($prevStatus !== 3 && $newStatus === 3) {
                $siaId    = 'SIA-' . ($existing['prospect_id'] ?: $id);
                $apptType = $existing['appointment_type'] ?? '';

                if (!empty($existing['client_email'])) {
                    $cancelClientBody = '
<p>Dear ' . htmlspecialchars($existing['client_name']) . ',</p>
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>Your appointment has been cancelled.</p>
<p>You may rebook at your convenience.</p>
<br><p>Warm regards,<br><strong>Sia Immigration Solutions</strong></p>';
                    sia_send_email(
                        $existing['client_email'],
                        'Appointment Cancelled – ' . $existing['client_name'] . ' – ' . $apptType . ' – ' . $siaId,
                        sia_appt_html($cancelClientBody)
                    );
                }

                $cancelDt = date('F j, Y', strtotime($newDate)) . ' at ' . date('g:i A', strtotime($newTime)) . ' (PST)';
                $cancelTeamBody = '
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>Appointment has been cancelled.</p>
' . sia_details_table([
    'Client'                => $existing['client_name'],
    'Phone'                 => $existing['client_phone'] ?? '',
    'Appointment Type'      => $apptType,
    'Service Type'          => $existing['service_type'] ?? '',
    'Cancelled Date & Time' => $cancelDt,
    'Team Member Assigned'  => $newAssigned ?: ($existing['assigned_to'] ?? ''),
]);
                sia_send_email(
                    sia_team_emails(),
                    'Appointment Cancelled – ' . $existing['client_name'] . ' – ' . $apptType . ' – ' . $newAssigned . ' – ' . $siaId,
                    sia_appt_html($cancelTeamBody)
                );

                if (!empty($existing['client_phone'])) {
                    sia_send_text($existing['client_phone'], sia_text_cancelled(
                        $existing['client_name'], $apptType, $siaId
                    ));
                }
            }

            // When status changes to Confirmed (1) — send 3 confirmation emails
            if ($prevStatus !== 1 && $newStatus === 1) {
                $siaId       = 'SIA-' . ($existing['prospect_id'] ?: $id);
                $clientName  = $existing['client_name'];
                $apptType    = $this->request->getPost('appointment_type') ?: ($existing['appointment_type'] ?? '');
                $svcType     = $this->request->getPost('service_type')     ?: ($existing['service_type']     ?? '');
                $dateLabel   = date('F j, Y', strtotime($newDate));
                $timeLabel   = date('g:i A', strtotime($newTime)) . ' (PST – Vancouver, Canada)';

                // 1. Client confirmation email
                $clientEmail = $this->request->getPost('client_email') ?: ($existing['client_email'] ?? '');
                if (!empty($clientEmail)) {
                    $clientBody = '
<p>Dear ' . htmlspecialchars($clientName) . ',</p>
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>Your appointment for <strong>' . htmlspecialchars($apptType) . '</strong> has been scheduled.</p>
' . sia_details_table([
    'Date'             => $dateLabel,
    'Time'             => $timeLabel,
    'Appointment Type' => $apptType,
    'Service Type'     => $svcType,
]) . '
<p>Our consultant will call you on your provided number at the scheduled time.</p>
' . sia_manage_links($id, (int)($existing['prospect_id'] ?? 0), ['Reference' => $siaId, 'Client' => $clientName, 'Type' => $apptType, 'Service' => $svcType, 'Date' => $dateLabel, 'Time' => $timeLabel]) . '
' . sia_calendar_buttons($id, $newDate, $newTime) . '
<br>
<p>Warm regards,<br><strong>Sia Immigration Solutions</strong></p>';
                    sia_send_email(
                        $clientEmail,
                        'Appointment Confirmed – ' . $clientName . ' – ' . $apptType . ' – ' . $siaId,
                        sia_appt_html($clientBody)
                    );
                }

                // 2. Team booking email
                $teamBody = '
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>Appointment confirmed from CRM.</p>
' . sia_details_table([
    'Client'               => $clientName,
    'Phone'                => $this->request->getPost('client_phone') ?: ($existing['client_phone'] ?? ''),
    'Appointment Type'     => $apptType,
    'Service Type'         => $svcType,
    'Date & Time'          => $dateLabel . ' at ' . date('g:i A', strtotime($newTime)) . ' (PST)',
    'Team Member Assigned' => $newAssigned ?: 'Unassigned',
]) . '
<p style="margin-top:14px;">
  <a href="https://canada.siaimmigration.com/Siaportal/view_prospect" style="color:#1a73e8;font-weight:600;">View Prospect in CRM</a>
</p>';
                sia_send_email(
                    sia_team_emails(),
                    'Appointment Booked – ' . $clientName . ' – ' . $apptType . ' – ' . ($newAssigned ?: 'Unassigned') . ' – ' . $siaId,
                    sia_appt_html($teamBody)
                );

                // 3. Assignment email (only if a team member is assigned)
                if (!empty($newAssigned)) {
                    $assignBody = '
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>Appointment confirmed and assigned to team member.</p>
' . sia_details_table([
    'Client'               => $clientName,
    'Phone'                => $this->request->getPost('client_phone') ?: ($existing['client_phone'] ?? ''),
    'Appointment Type'     => $apptType,
    'Service Type'         => $svcType,
    'Date & Time'          => $dateLabel . ' at ' . date('g:i A', strtotime($newTime)) . ' (PST)',
    'Team Member Assigned' => $newAssigned,
]);
                    sia_send_email(
                        sia_team_emails(),
                        explode(' ', $newAssigned)[0] . ' Assigned For – ' . $clientName . ' – ' . $apptType . ' – ' . $newAssigned . ' – ' . $siaId,
                        sia_appt_html($assignBody)
                    );
                }

                // WhatsApp: Client – Confirmed
                $clientPhone = $this->request->getPost('client_phone') ?: ($existing['client_phone'] ?? '');
                if (!empty($clientPhone)) {
                    sia_send_text($clientPhone, sia_text_confirmed($clientName, $apptType, $siaId, $newDate, $newTime));
                }
            }

            $postFrom = $this->request->getPost('_from') ?? $from;
            if ($postFrom === 'dashboard') {
                return redirect()->to(base_url('appoint/AppointAdmin/dashboard'));
            }
            return redirect()->to(base_url('appoint/Appoint/index'));
        }

        $team = new Team_model();
        $data['appointment']  = $existing;
        $data['from']         = $from;
        $data['team_members'] = $team->select('id, firstname, lastname')->where('status', 1)->where('type', 'Employee')->findAll();
        return view('appoint/edit', $data);
    }

    public function ics(int $id, string $token)
    {
        helper('appointment_email');
        if ($token !== sia_ics_token($id)) {
            return $this->response->setStatusCode(404);
        }
        $appt = (new Appointment_model())->find($id);
        if (!$appt) return $this->response->setStatusCode(404);

        $parts  = explode(':', $appt['appointment_time']);
        $h      = (int)($parts[0] ?? 9);
        $m      = (int)($parts[1] ?? 0);
        $dtStart = str_replace('-', '', $appt['appointment_date']) . 'T' . sprintf('%02d%02d00', $h, $m);
        $dtEnd   = str_replace('-', '', $appt['appointment_date']) . 'T' . sprintf('%02d%02d00', ($h + 1) % 24, $m);

        $ics = "BEGIN:VCALENDAR\r\nVERSION:2.0\r\nPRODID:-//Sia Immigration Solutions//Appointment//EN\r\n"
             . "BEGIN:VEVENT\r\n"
             . "DTSTART:" . $dtStart . "\r\n"
             . "DTEND:" . $dtEnd . "\r\n"
             . "SUMMARY:Appointment - Sia Immigration\r\n"
             . "LOCATION:Sia Immigration Solutions\\, Vancouver\\, BC\r\n"
             . "DESCRIPTION:Reference: SIA-" . $id . "\\n" . addslashes($appt['appointment_type'] ?? '') . "\r\n"
             . "END:VEVENT\r\nEND:VCALENDAR";

        return $this->response
            ->setHeader('Content-Type', 'text/calendar; charset=UTF-8')
            ->setHeader('Content-Disposition', 'attachment; filename="appointment-SIA-' . $id . '.ics"')
            ->setBody($ics);
    }

    public function delete($id = null)
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }

        $Appoint = new Appointment_model();
        $Appoint->delete($id);
        return redirect()->to(base_url('appoint/Appoint/index'));
    }

    // ── Client: Reschedule Request ────────────────────────────────────────────
    public function reschedule_request(int $id, string $token)
    {
        helper(['appointment_email']);
        if ($token !== sia_ics_token($id)) {
            return $this->response->setBody('<h2 style="font-family:Arial;color:#c0392b;text-align:center;margin-top:60px;">Invalid or expired link.</h2>');
        }
        $model = new Appointment_model();
        $appt  = $model->find($id);
        if (!$appt) {
            return $this->response->setBody('<h2 style="font-family:Arial;color:#c0392b;text-align:center;margin-top:60px;">Appointment not found.</h2>');
        }

        if ($this->request->getMethod() === 'post') {
            $preferred = $this->request->getPost('preferred_date') . ' ' . $this->request->getPost('preferred_time');
            $notes     = $this->request->getPost('notes');
            $siaId     = 'SIA-' . ($appt['prospect_id'] ?: $id);

            $dedupeKey = "resched_req_{$id}";
            if (! cache($dedupeKey)) {
                $subject = 'Reschedule Request – ' . $appt['client_name'] . ' – ' . $siaId;
                $body    = '
<p><strong>Reschedule Request received from client</strong></p>
<p><strong>Reference: ' . $siaId . '</strong></p>
' . sia_details_table([
    'Client'           => $appt['client_name'],
    'Phone'            => $appt['client_phone'] ?? '',
    'Current Date'     => date('F j, Y', strtotime($appt['appointment_date'])),
    'Current Time'     => date('g:i A', strtotime($appt['appointment_time'])) . ' (PST)',
    'Preferred Date/Time' => $preferred,
    'Client Notes'     => $notes ?: '—',
]) . '
<p>Please update the appointment in CRM accordingly.</p>';
                sia_send_email(sia_team_emails(), $subject, sia_appt_html($body));
                cache()->save($dedupeKey, 1, 300);
            }

            return $this->response->setBody('<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Request Sent</title></head><body style="font-family:Arial,sans-serif;text-align:center;padding:60px;background:#f5f5f5;">
<div style="background:#fff;border-radius:12px;padding:40px;max-width:480px;margin:0 auto;box-shadow:0 4px 20px rgba(0,0,0,.1);">
<div style="font-size:48px;margin-bottom:16px;">&#10003;</div>
<h2 style="color:#27ae60;">Reschedule Request Sent</h2>
<p style="color:#666;">Our team will contact you shortly to confirm your new appointment time.</p>
<p style="color:#aaa;font-size:13px;">Reference: ' . $siaId . '</p>
</div></body></html>');
        }

        $siaId = 'SIA-' . ($appt['prospect_id'] ?: $id);
        return $this->response->setBody('<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Reschedule Appointment</title>
<style>body{font-family:Arial,sans-serif;background:#f5f5f5;margin:0;padding:30px;}
.card{background:#fff;border-radius:12px;padding:32px;max-width:500px;margin:0 auto;box-shadow:0 4px 20px rgba(0,0,0,.1);}
h2{color:#1a73e8;margin-top:0;}label{display:block;font-size:13px;font-weight:700;color:#555;margin:14px 0 5px;}
input,textarea{width:100%;padding:10px;border:1px solid #ddd;border-radius:6px;font-size:14px;box-sizing:border-box;}
.btn{background:#1a73e8;color:#fff;border:none;padding:12px 28px;border-radius:6px;font-size:15px;cursor:pointer;margin-top:16px;width:100%;}
.appt-info{background:#f0f7ff;border-radius:8px;padding:12px 16px;margin-bottom:20px;font-size:14px;color:#333;}
</style></head><body>
<div class="card">
  <h2>&#8635; Request Reschedule</h2>
  <p style="color:#666;font-size:14px;">Reference: <strong>' . $siaId . '</strong></p>
  <div class="appt-info">
    <strong>Current Appointment:</strong><br>
    ' . date('F j, Y', strtotime($appt['appointment_date'])) . ' at ' . date('g:i A', strtotime($appt['appointment_time'])) . ' (PST)
  </div>
  <form method="post" onsubmit="this.querySelector(\'button\').disabled=true;">
    <label>Preferred Date</label>
    <input type="date" name="preferred_date" required min="' . date('Y-m-d') . '">
    <label>Preferred Time</label>
    <input type="time" name="preferred_time" required>
    <label>Additional Notes (optional)</label>
    <textarea name="notes" rows="3" placeholder="Any preferences or notes..."></textarea>
    <button type="submit" class="btn">Send Reschedule Request</button>
  </form>
</div></body></html>');
    }

    // ── Client: Cancel Request ────────────────────────────────────────────────
    public function cancel_request(int $id, string $token)
    {
        helper(['appointment_email']);
        if ($token !== sia_ics_token($id)) {
            return $this->response->setBody('<h2 style="font-family:Arial;color:#c0392b;text-align:center;margin-top:60px;">Invalid or expired link.</h2>');
        }
        $model = new Appointment_model();
        $appt  = $model->find($id);
        if (!$appt) {
            return $this->response->setBody('<h2 style="font-family:Arial;color:#c0392b;text-align:center;margin-top:60px;">Appointment not found.</h2>');
        }

        if ($this->request->getMethod() === 'post') {
            $reason = $this->request->getPost('reason');
            $siaId  = 'SIA-' . ($appt['prospect_id'] ?: $id);

            $dedupeKey = "cancel_req_{$id}";
            if (! cache($dedupeKey)) {
                $subject = 'Cancellation Request – ' . $appt['client_name'] . ' – ' . $siaId;
                $body    = '
<p><strong>Cancellation Request received from client</strong></p>
<p><strong>Reference: ' . $siaId . '</strong></p>
' . sia_details_table([
    'Client'     => $appt['client_name'],
    'Phone'      => $appt['client_phone'] ?? '',
    'Date'       => date('F j, Y', strtotime($appt['appointment_date'])),
    'Time'       => date('g:i A', strtotime($appt['appointment_time'])) . ' (PST)',
    'Reason'     => $reason ?: '—',
]) . '
<p>Please update the appointment status in CRM accordingly.</p>';
                sia_send_email(sia_team_emails(), $subject, sia_appt_html($body));
                cache()->save($dedupeKey, 1, 300);
            }

            return $this->response->setBody('<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Cancelled</title></head><body style="font-family:Arial,sans-serif;text-align:center;padding:60px;background:#f5f5f5;">
<div style="background:#fff;border-radius:12px;padding:40px;max-width:480px;margin:0 auto;box-shadow:0 4px 20px rgba(0,0,0,.1);">
<div style="font-size:48px;margin-bottom:16px;">&#10007;</div>
<h2 style="color:#e74c3c;">Cancellation Request Sent</h2>
<p style="color:#666;">Our team has been notified. We will confirm your cancellation shortly.</p>
<p style="color:#aaa;font-size:13px;">Reference: ' . $siaId . '</p>
</div></body></html>');
        }

        $siaId = 'SIA-' . ($appt['prospect_id'] ?: $id);
        return $this->response->setBody('<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Cancel Appointment</title>
<style>body{font-family:Arial,sans-serif;background:#f5f5f5;margin:0;padding:30px;}
.card{background:#fff;border-radius:12px;padding:32px;max-width:500px;margin:0 auto;box-shadow:0 4px 20px rgba(0,0,0,.1);}
h2{color:#e74c3c;margin-top:0;}label{display:block;font-size:13px;font-weight:700;color:#555;margin:14px 0 5px;}
textarea{width:100%;padding:10px;border:1px solid #ddd;border-radius:6px;font-size:14px;box-sizing:border-box;}
.btn{background:#e74c3c;color:#fff;border:none;padding:12px 28px;border-radius:6px;font-size:15px;cursor:pointer;margin-top:16px;width:100%;}
.appt-info{background:#fff5f5;border-radius:8px;padding:12px 16px;margin-bottom:20px;font-size:14px;color:#333;}
</style></head><body>
<div class="card">
  <h2>&#10005; Cancel Appointment</h2>
  <p style="color:#666;font-size:14px;">Reference: <strong>' . $siaId . '</strong></p>
  <div class="appt-info">
    <strong>Appointment to Cancel:</strong><br>
    ' . date('F j, Y', strtotime($appt['appointment_date'])) . ' at ' . date('g:i A', strtotime($appt['appointment_time'])) . ' (PST)
  </div>
  <form method="post" onsubmit="this.querySelector(\'button\').disabled=true;">
    <label>Reason for Cancellation (optional)</label>
    <textarea name="reason" rows="3" placeholder="Please let us know why..."></textarea>
    <button type="submit" class="btn">Confirm Cancellation Request</button>
  </form>
</div></body></html>');
    }

    public function check_availability()
    {
        if (!$this->isAuthorized()) {
            return $this->response->setJSON(['error' => 'Unauthorized']);
        }

        $date      = $this->request->getPost('appointment_date');
        $time      = $this->request->getPost('appointment_time');
        $member    = trim($this->request->getPost('team_member') ?? '');
        $excludeId = (int)($this->request->getPost('exclude_id') ?? 0);

        $Appoint = new Appointment_model();

        if (!empty($member)) {
            $taken = $Appoint->isMemberSlotTaken($date, $time, $member, $excludeId ?: null);
        } else {
            $taken = false;
        }

        return $this->response->setJSON(['available' => !$taken]);
    }

    public function get_prospects_json()
    {
        if (!$this->isAuthorized()) {
            return $this->response->setJSON(['results' => []]);
        }

        $q  = trim($this->request->getGet('q') ?? '');
        $db = \Config\Database::connect();

        $builder = $db->table('client_prospect')
            ->select('id, heading, email, number, cc')
            ->groupStart()->where('entery_status', 'prospect')->orWhere('entery_status', 'client')->groupEnd()
            ->groupStart()->where('hide_prospect', null)->orWhere('hide_prospect !=', 1)->groupEnd()
            ->orderBy('id', 'desc')
            ->limit(50);

        if ($q !== '') {
            $builder->groupStart()
                ->like('heading', $q)
                ->orLike('id', $q)
                ->orLike('number', $q)
                ->orLike('email', $q)
                ->groupEnd();
        }

        $rows    = $builder->get()->getResultArray();
        $results = [];
        foreach ($rows as $r) {
            $phone = (!empty($r['cc']) ? '+' . ltrim($r['cc'], '+') . ' ' : '') . ($r['number'] ?? '');
            $results[] = [
                'id'    => $r['id'],
                'text'  => $r['heading'] . ' (' . $r['id'] . ')',
                'email' => $r['email'] ?? '',
                'phone' => trim($phone),
                'name'  => $r['heading'],
            ];
        }

        return $this->response->setJSON(['results' => $results]);
    }

    public function book_from_prospect()
    {
        if (!$this->isAuthorized()) {
            return $this->response->setJSON(['error' => 'Unauthorized']);
        }

        $Appoint = new Appointment_model();

        $date       = $this->request->getPost('appointment_date');
        $time       = $this->request->getPost('appointment_time');
        $assignedTo = trim($this->request->getPost('assigned_to') ?? '');

        if (!empty($assignedTo) && $Appoint->isMemberSlotTaken($date, $time, $assignedTo)) {
            return $this->response->setJSON(['success' => false, 'msg' => $assignedTo . ' already has an appointment on this date and time. Please choose a different slot or team member.']);
        }

        $clientName       = $this->request->getPost('client_name');
        $clientEmail      = $this->request->getPost('client_email');
        $clientPhone      = $this->request->getPost('client_phone');
        $serviceType      = $this->request->getPost('service_type');
        $appointmentType  = $this->request->getPost('appointment_type') ?? '';
        $consultationType = $this->request->getPost('consultation_type') ?? '';
        $contactMethod    = $this->request->getPost('contact_method') ?? '';
        $officeLocation   = $this->request->getPost('office_location') ?? '';
        $notes            = $this->request->getPost('notes');
        $prospectId       = $this->request->getPost('prospect_id');

        $insideCanada      = $this->request->getPost('inside_canada') ?? '';
        $existingClient    = $this->request->getPost('existing_client') ?? '';
        $immigrationStatus = $this->request->getPost('immigration_status') ?? '';

        $apptId = $Appoint->insert([
            'prospect_id'        => $prospectId,
            'client_name'        => $clientName,
            'client_email'       => $clientEmail,
            'client_phone'       => $clientPhone,
            'appointment_date'   => $date,
            'appointment_time'   => $time,
            'service_type'       => $serviceType,
            'appointment_type'   => $appointmentType,
            'consultation_type'  => $consultationType,
            'contact_method'     => ($consultationType === 'Telephonic') ? $contactMethod : '',
            'office_location'    => ($consultationType === 'In-Person')  ? $officeLocation : '',
            'inside_canada'      => $insideCanada,
            'existing_client'    => $existingClient,
            'immigration_status' => $immigrationStatus,
            'notes'              => $notes,
            'assigned_to'        => $assignedTo,
            'status'             => 1,
            'insert_on'          => date('Y-m-d H:i:s'),
        ]);

        helper(['appointment_email']);
        $siaId     = 'SIA-' . $prospectId;
        $calLink   = sia_google_cal_link('Appointment – Sia Immigration', $date, $time);
        $dateLabel = date('F j, Y', strtotime($date));
        $timeLabel = date('g:i A', strtotime($time)) . ' (PST – Vancouver, Canada)';

        if (!empty($clientEmail)) {
            $clientBody = '
<p>Dear ' . htmlspecialchars($clientName) . ',</p>
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>Your appointment for <strong>' . htmlspecialchars($appointmentType) . '</strong> has been scheduled.</p>
' . sia_details_table([
    'Date'             => $dateLabel,
    'Time'             => $timeLabel,
    'Appointment Type' => $appointmentType,
    'Service'          => $serviceType,
]) . '
<p>Our consultant will call you on your provided number at the scheduled time.</p>
' . sia_manage_links($apptId, (int)$prospectId, ['Reference' => $siaId, 'Client' => $clientName, 'Type' => $appointmentType, 'Service' => $serviceType, 'Date' => $dateLabel, 'Time' => $timeLabel]) . '
' . sia_calendar_buttons($apptId, $date, $time) . '
<br>
<p>Warm regards,<br><strong>Sia Immigration Solutions</strong></p>';

            sia_send_email(
                $clientEmail,
                'Appointment Confirmed – ' . $clientName . ' – ' . $appointmentType . ' – ' . $siaId,
                sia_appt_html($clientBody)
            );
        }

        $teamBody = '
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>New appointment booked from CRM.</p>
' . sia_details_table([
    'Client'               => $clientName,
    'Phone'                => $clientPhone,
    'Appointment Type'     => $appointmentType,
    'Service Type'         => $serviceType,
    'Date & Time'          => $dateLabel . ' at ' . date('g:i A', strtotime($time)) . ' (PST)',
    'Team Member Assigned' => $assignedTo ?: 'Unassigned',
]) . '
<p style="margin-top:14px;">
  <a href="https://canada.siaimmigration.com/Siaportal/view_prospect" style="color:#1a73e8;font-weight:600;">View Prospect in CRM</a>
</p>';

        sia_send_email(
            sia_team_emails(),
            'Appointment Booked – ' . $clientName . ' – ' . $appointmentType . ' – ' . ($assignedTo ?: 'Unassigned') . ' – ' . $siaId,
            sia_appt_html($teamBody)
        );

        // Separate assignment email when a team member is assigned
        if (!empty($assignedTo)) {
            $assignBody = '
<p><strong>Reference: ' . $siaId . '</strong></p>
<p>Appointment booked from Prospect page and assigned to team member.</p>
' . sia_details_table([
    'Client'           => $clientName,
    'Phone'            => $clientPhone,
    'Appointment Type' => $appointmentType,
    'Service'          => $serviceType,
    'Date & Time'      => $dateLabel . ' at ' . date('g:i A', strtotime($time)) . ' (PST)',
    'Assigned To'      => $assignedTo,
]);
            sia_send_email(
                sia_team_emails(),
                explode(' ', $assignedTo)[0] . ' Assigned For – ' . $clientName . ' – ' . $appointmentType . ' – ' . $assignedTo . ' – ' . $siaId,
                sia_appt_html($assignBody)
            );
        }

        // WhatsApp: Client – Confirmed
        if (!empty($clientPhone)) {
            sia_send_text($clientPhone, sia_text_confirmed(
                $clientName, $appointmentType, $siaId, $date, $time
            ));
        }

        return $this->response->setJSON(['success' => true]);
    }
}
