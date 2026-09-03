<?php

define('SIA_PHONE', '+1 (778) 228-1017');
define('SIA_EMAIL', 'info@siaimmigration.com');

// ── Team email list ───────────────────────────────────────────────────────────

function sia_team_emails(): array
{
    return [
        'kam@siaimmigration.com',
        'info@siaimmigration.com',
        'support@siaimmigration.com',
        'office@siaimmigration.com',
        'admin@siaimmigration.com',
        'reach@siaimmigration.com',
        'mkj@siaimmigration.com',
        'consult@siaimmigration.com',
        'care@siaimmigration.com',
    ];
}

// ── ICS / Calendar helpers ────────────────────────────────────────────────────

function sia_ics_token(int $id): string
{
    return substr(md5('sia-ics-' . $id . '-siaimmigration'), 0, 16);
}

function sia_ics_link(int $id): string
{
    return base_url('appoint/Appoint/ics/' . $id . '/' . sia_ics_token($id));
}

function sia_google_cal_link(string $title, string $date, string $time): string
{
    $parts = explode(':', $time);
    $h     = (int)($parts[0] ?? 9);
    $m     = (int)($parts[1] ?? 0);
    $start = str_replace('-', '', $date) . 'T' . sprintf('%02d%02d00', $h, $m);
    $end   = str_replace('-', '', $date) . 'T' . sprintf('%02d%02d00', ($h + 1) % 24, $m);
    return 'https://calendar.google.com/calendar/render?action=TEMPLATE'
        . '&text='     . urlencode($title)
        . '&dates='    . $start . '/' . $end
        . '&location=' . urlencode('Sia Immigration Solutions, Vancouver, BC');
}

// ── Reusable email content blocks ─────────────────────────────────────────────

function sia_contact_block(): string
{
    return '';
}

function sia_manage_links(int $id, int $prospectId = 0, array $details = []): string
{
    $token = sia_ics_token($id);
    $rLink = base_url('appoint/Appoint/reschedule_request/' . $id . '/' . $token);
    $cLink = base_url('appoint/Appoint/cancel_request/'    . $id . '/' . $token);
    $btn   = 'display:inline-block;padding:8px 18px;border-radius:4px;font-family:Arial,sans-serif;font-size:13px;text-decoration:none;font-weight:600;';
    return '
<table cellpadding="0" cellspacing="0" style="margin-top:16px;margin-bottom:4px;">
  <tr><td style="padding-bottom:8px;font-family:Arial,sans-serif;font-size:14px;color:#333;font-weight:700;">Manage Appointment:</td></tr>
  <tr><td>
    <a href="' . $rLink . '" style="' . $btn . 'background:#1a73e8;color:#fff;margin-right:8px;">&#8635; Reschedule</a>
    <a href="' . $cLink . '" style="' . $btn . 'background:#e74c3c;color:#fff;">&#10005; Cancel</a>
  </td></tr>
</table>';
}

function sia_calendar_buttons(int $id, string $date, string $time): string
{
    $googleLink = sia_google_cal_link('Appointment - Sia Immigration', $date, $time);
    $icsLink    = sia_ics_link($id);
    $btn = 'display:inline-block;padding:8px 18px;border-radius:4px;font-family:Arial,sans-serif;font-size:13px;text-decoration:none;font-weight:600;';
    return '
<table cellpadding="0" cellspacing="0" style="margin-top:16px;margin-bottom:4px;">
  <tr><td style="padding-bottom:8px;font-family:Arial,sans-serif;font-size:14px;color:#333;font-weight:700;">Add to Calendar:</td></tr>
  <tr><td>
    <a href="' . $googleLink . '" target="_blank" style="' . $btn . 'background:#4285f4;color:#fff;margin-right:8px;">&#128197; Google Calendar</a>
    <a href="' . $icsLink . '" style="' . $btn . 'background:#555555;color:#fff;">&#127822; Apple / Outlook Calendar</a>
  </td></tr>
</table>';
}

// ── Details table (matches website_sia book_an_appointment style) ─────────────

function sia_details_table(array $rows): string
{
    $html = '<table cellpadding="8" cellspacing="0" width="100%" style="border-collapse:collapse;font-family:Arial,sans-serif;font-size:14px;margin:10px 0;">';
    foreach ($rows as $label => $value) {
        $html .= '<tr style="background:#f8f8f8;">
          <td style="width:42%;color:#555;border-bottom:1px solid #e8e8e8;padding:7px 10px;vertical-align:top;"><strong>' . htmlspecialchars($label) . '</strong></td>
          <td style="color:#333;border-bottom:1px solid #e8e8e8;padding:7px 10px;">' . htmlspecialchars((string)$value) . '</td>
        </tr>';
    }
    $html .= '</table>';
    return $html;
}

// ── Branded email shell (identical to website_sia book_an_appointment) ────────

function sia_appt_html(string $bodyHtml): string
{
    return '<!DOCTYPE html><html><head><meta charset="UTF-8"></head>
<body style="background-color:#f1f1f1;margin:0;padding:0;">
<div style="background-color:#f1f1f1;width:100%;min-width:100%;padding:0;margin:0;">
<table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1;width:100%;padding:15px;">
<tr><td>
  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px;margin:0 auto;background-color:#fff;">
    <tbody>
      <tr><td>
        <table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody>
          <tr>
            <td valign="top" style="padding:0 18px 9px;">
              <img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="Sia Immigration">
            </td>
            <td valign="top" style="padding:0 18px 9px;text-align:right;">
              <img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="200" height="100" alt="ICCRC">
            </td>
          </tr>
          <tr><td colspan="2"><div style="border-top:1px dashed #999;margin:5px 0;display:block;"></div></td></tr>
          <tr><td colspan="2" style="padding:15px 18px;font-family:Arial,sans-serif;font-size:14px;color:#333;line-height:1.7;">
            ' . $bodyHtml . '
          </td></tr>
          <tr><td colspan="2">&nbsp;</td></tr>
          <tr><td colspan="2">&nbsp;</td></tr>
          <tr><td colspan="2" style="border-top:2px solid #ccc;"></td></tr>
          <tr><td colspan="2" align="center" style="padding:10px 0;">
            <a href="https://siaimmigration.com/home/accreditations" target="_blank">
              <img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="Three Best Rated">
            </a>
          </td></tr>
        </tbody></table>
      </td></tr>
      <tr><td align="center" style="padding:10px 0;font-family:Arial,sans-serif;font-size:12px;color:#666;">
        <strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved
      </td></tr>
    </tbody>
  </table>
</td></tr>
</table>
</div>
</body></html>';
}

// ── SMTP email sender ─────────────────────────────────────────────────────────

function sia_send_email($toEmails, string $subject, string $html, array $ccExtra = []): void
{
    helper('smtp_helper');
    try {
        $emailSvc = \Config\Services::email();
        $config   = get_smtp_settings();
        $emailSvc->initialize($config);
        $emailSvc->setFrom('no-reply@siaimmigration.com', 'Appointment Sia Immigration');
        $emailSvc->setReplyTo('consult@siaimmigration.com', 'SIA Immigration');
        $toArray = (array)$toEmails;
        $emailSvc->setTo($toArray);
        $ccList = array_values(array_unique(array_diff(
            array_merge(['no-reply@siaimmigration.com'], $ccExtra),
            $toArray
        )));
        if (!empty($ccList)) {
            $emailSvc->setCC($ccList);
        }
        $emailSvc->setSubject($subject);
        $emailSvc->setMessage($html);
        $emailSvc->send();
    } catch (\Exception $e) {
        log_message('error', '[SiaApptEmail] ' . $e->getMessage());
    }
}

// ── Team phone numbers for WhatsApp notifications ────────────────────────────

function sia_team_phones(): array
{
    try {
        $rows = \Config\Database::connect()
            ->table('reg')
            ->select('mobile_no')
            ->where('type', 'Employee')
            ->where('status', 1)
            ->where('mobile_no IS NOT NULL')
            ->where('mobile_no !=', '')
            ->get()->getResultArray();

        return array_values(array_unique(array_filter(
            array_map(fn($r) => sia_normalise_phone((string)($r['mobile_no'] ?? '')), $rows),
            fn($p) => strlen(preg_replace('/\D/', '', $p)) >= 10
        )));
    } catch (\Exception $e) {
        log_message('error', '[SiaTeamPhones] ' . $e->getMessage());
        return [];
    }
}

// ── Phone normalisation ───────────────────────────────────────────────────────

function sia_normalise_phone(string $phone): string
{
    $hasPlus = strpos(trim($phone), '+') === 0;
    $digits  = preg_replace('/\D/', '', $phone);

    if ($hasPlus || strlen($digits) >= 11) {
        return $digits;
    }
    if (strlen($digits) === 10) {
        return '1' . $digits;
    }
    return $digits;
}

// ── WhatsApp sender (UltraMsg) ────────────────────────────────────────────────

function sia_send_whatsapp(string $to, string $message): void
{
    try {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL            => 'https://api.ultramsg.com/instance178883/messages/chat',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_POSTFIELDS     => http_build_query([
                'token' => 'qoi9rgd04eqau4ji',
                'to'    => $to,
                'body'  => $message,
            ]),
            CURLOPT_HTTPHEADER => ['content-type: application/x-www-form-urlencoded'],
        ]);
        $resp = curl_exec($ch);
        $err  = curl_error($ch);
        curl_close($ch);
        if ($err) {
            log_message('error', '[SiaWhatsApp] cURL error to ' . $to . ': ' . $err);
        } else {
            log_message('info', '[SiaWhatsApp] sent to ' . $to . ': ' . $resp);
        }
    } catch (\Exception $e) {
        log_message('error', '[SiaWhatsApp] ' . $e->getMessage());
    }
}

// ── WhatsApp send wrapper ─────────────────────────────────────────────────────

function sia_send_text(string $phone, string $message): void
{
    if (empty(trim($phone))) return;
    $to = sia_normalise_phone($phone);
    if (strlen(preg_replace('/\D/', '', $to)) < 10) return;

    sia_send_whatsapp($to, $message);
}

// ── Text / WhatsApp message builders ─────────────────────────────────────────

function sia_text_pending(string $name, string $service, string $ct, string $date, string $time): string
{
    return "Automated Message - No Reply Required\n\n"
        . "Pending Appointment Request\n\n"
        . "Hi {$name}, your request for {$service} is received and pending confirmation.\n\n"
        . "Consultation Type: {$ct}\n"
        . "Date: " . date('M j, Y', strtotime($date)) . " | Time: " . date('g:i A', strtotime($time)) . " (PST)\n\n"
        . "We will confirm shortly.\n\n"
        . "For any concerns, contact front desk.";
}

function sia_text_confirmed(string $name, string $apptType, string $siaId, string $date, string $time): string
{
    return "Automated Message - No Reply Required\n\n"
        . "Appointment Confirmed\n\n"
        . "Hi {$name}, your {$apptType} is confirmed.\n"
        . "Ref: {$siaId}\n"
        . "Date: " . date('M j, Y', strtotime($date)) . " | Time: " . date('g:i A', strtotime($time)) . " (PST)\n\n"
        . "Our consultant will call you at the scheduled time.";
}

function sia_text_reminder(string $name, string $apptType, string $siaId, string $date, string $time): string
{
    return "Automated Message - No Reply Required\n\n"
        . "Appointment Reminder\n\n"
        . "Hi {$name}, reminder for your {$apptType}.\n"
        . "Ref: {$siaId}\n"
        . "Date: " . date('M j, Y', strtotime($date)) . " | Time: " . date('g:i A', strtotime($time)) . " (PST)\n\n"
        . "Our consultant will call you shortly.";
}

function sia_text_cancelled(string $name, string $apptType, string $siaId): string
{
    return "Automated Message - No Reply Required\n\n"
        . "Appointment Cancelled\n\n"
        . "Hi {$name}, your {$apptType} has been cancelled.\n"
        . "Ref: {$siaId}\n\n"
        . "You can rebook anytime.";
}

function sia_text_rescheduled(string $name, string $apptType, string $siaId, string $date, string $time): string
{
    return "Automated Message - No Reply Required\n\n"
        . "Appointment Rescheduled\n\n"
        . "Hi {$name}, your {$apptType} is updated.\n"
        . "Ref: {$siaId}\n"
        . "New Date: " . date('M j, Y', strtotime($date)) . " | Time: " . date('g:i A', strtotime($time)) . " (PST)";
}

function sia_text_team_summary(string $dateLabel, array $appts): string
{
    $total = count($appts);
    $msg   = "Automated Message - No Reply Required\n\n"
        . "Today's Appointments Summary \xe2\x80\x93 {$dateLabel}\n\n"
        . "Total Appointments: {$total}\n\n";
    foreach ($appts as $a) {
        $msg .= date('g:i A', strtotime($a['appointment_time'])) . " (PST) \xe2\x80\x93 " . ($a['client_name'] ?? '') . "\n"
            . "\xF0\x9F\x93\x9E " . ($a['client_phone'] ?? '') . "\n"
            . "Ref: SIA-" . ($a['prospect_id'] ?: $a['id']) . "\n"
            . "Appointment Type: " . ($a['appointment_type'] ?? '') . "\n"
            . "Service Type: " . ($a['service_type'] ?? '') . "\n"
            . "Consultant: " . ($a['assigned_to'] ?? 'Unassigned') . "\n\n";
    }
    $msg .= "Please review CRM for updates or changes.";
    return $msg;
}

function sia_text_team_assigned(string $teamMember, string $clientName, string $siaId, string $apptType, string $service, string $date, string $time): string
{
    return "Automated Message - No Reply Required\n\n"
        . "{$teamMember} has been assigned for {$clientName}.\n\n"
        . "Ref: {$siaId}\n"
        . "Appointment Type: {$apptType}\n"
        . "Service Type: {$service}\n"
        . "Date & Time: " . date('M j, Y', strtotime($date)) . " at " . date('g:i A', strtotime($time)) . " (PST)";
}
