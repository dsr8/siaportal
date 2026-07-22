<?php

// All Declaration/Consent transactional emails. Uses the shared sia_appt_html() wrapper
// (from appointment_email_helper.php) for a consistent look with the rest of the app's
// transactional emails, rather than a bespoke HTML shell like the Agreement module's.

function sia_declaration_document_type(array $declaration): string
{
    return trim((string) ($declaration['consent_type'] ?: $declaration['title'] ?: 'Disclaimer / Consent'));
}

function sia_declaration_first_name(array $declaration): string
{
    $name = trim((string) ($declaration['client_name'] ?? 'Client'));
    $parts = preg_split('/\s+/', $name);
    return $parts[0] !== '' ? $parts[0] : $name;
}

// `{Event} | {Client Name} | {Document Type} | SiaID {SiaID}` — the pipe-separated subject
// pattern used across every Declaration/Consent notification.
function sia_declaration_subject(string $event, array $declaration): string
{
    return $event . ' | ' . ($declaration['client_name'] ?? 'Client') . ' | '
        . sia_declaration_document_type($declaration) . ' | SiaID ' . (int) $declaration['prospect_id'];
}

function sia_declaration_button(string $url, string $label): string
{
    return '<table cellpadding="0" cellspacing="0" style="margin:18px 0;"><tr><td style="background:#e23b3b;border-radius:6px;">'
        . '<a href="' . esc($url, 'attr') . '" target="_blank" style="display:inline-block;padding:12px 26px;font-family:Arial,sans-serif;font-size:14px;font-weight:700;color:#fff;text-decoration:none;">' . esc($label) . '</a>'
        . '</td></tr></table>'
        . '<p style="font-size:12px;color:#888;">If the button does not work, copy and paste this link into your browser:<br>'
        . '<a href="' . esc($url, 'attr') . '">' . esc($url) . '</a></p>';
}

// Sends the client "ready for review" email AND the internal team notification together —
// triggered once from Declaration::generate_link() for both the first send and every resend
// (the spec doesn't define separate copy for a resend, so both cases share this).
function sia_send_declaration_email(array $declaration, string $signUrl): void
{
    sia_send_declaration_client_sent_email($declaration, $signUrl);
    sia_send_declaration_team_sent_email($declaration);
}

// 1. CLIENT – DISCLAIMER SENT
function sia_send_declaration_client_sent_email(array $declaration, string $signUrl): void
{
    $toEmail = trim($declaration['client_email'] ?? '');
    if ($toEmail === '') {
        log_message('error', '[SiaDeclarationEmail] Skipped client-sent email: declaration id ' . ($declaration['id'] ?? '?') . ' has no client_email.');
        return;
    }

    helper('smtp_helper');
    helper('appointment_email_helper');

    $firstName = esc(sia_declaration_first_name($declaration));
    $body = '
      <h2 style="margin:0 0 14px;color:#1f2430;">Disclaimer / Consent Ready for Review</h2>
      <p>Hello ' . $firstName . ',</p>
      <p>Your Disclaimer / Consent document is ready for your review and electronic signature.</p>
      <p>Please review the document carefully before signing.</p>
      ' . sia_declaration_button($signUrl, 'Review & eSign Disclaimer') . '
      <p>Regards,<br>' . esc($declaration['consultant_name'] ?: 'Sia Immigration Solutions Inc.') . '<br>Sia Immigration Solutions Inc.</p>
    ';

    try {
        $emailSvc = \Config\Services::email();
        $config   = get_smtp_settings();
        $emailSvc->initialize($config);
        $emailSvc->setFrom('no-reply@siaimmigration.com', 'Sia Immigration Solutions Inc.');
        $emailSvc->setReplyTo('consult@siaimmigration.com', 'SIA Immigration');
        $emailSvc->setTo($toEmail);
        $emailSvc->setSubject(sia_declaration_subject('Action Required | Disclaimer / Consent', $declaration));
        $emailSvc->setMessage(sia_appt_html($body));
        $emailSvc->send();
    } catch (\Exception $e) {
        log_message('error', '[SiaDeclarationEmail] ' . $e->getMessage());
    }
}

// 2. TEAM – DISCLAIMER SENT
function sia_send_declaration_team_sent_email(array $declaration): void
{
    helper('smtp_helper');
    helper('appointment_email_helper');

    $body = '
      <h2 style="margin:0 0 14px;color:#1f2430;">Disclaimer Sent</h2>
      <p>The Disclaimer / Consent document has been successfully sent to the client.</p>
      <table cellpadding="6" cellspacing="0" style="width:100%;font-size:13.5px;border:1px solid #eee;">
        <tr><td style="font-weight:700;width:35%;">Client</td><td>' . esc($declaration['client_name'] ?? '—') . '</td></tr>
        <tr><td style="font-weight:700;">SiaID</td><td>' . (int) $declaration['prospect_id'] . '</td></tr>
        <tr><td style="font-weight:700;">Consultant</td><td>' . esc($declaration['consultant_name'] ?? '—') . '</td></tr>
        <tr><td style="font-weight:700;">Document Type</td><td>' . esc(sia_declaration_document_type($declaration)) . '</td></tr>
        <tr><td style="font-weight:700;">Date &amp; Time</td><td>' . esc(date('F j, Y g:i A')) . '</td></tr>
        <tr><td style="font-weight:700;">Status</td><td>Sent</td></tr>
      </table>
    ';

    try {
        $emailSvc = \Config\Services::email();
        $config   = get_smtp_settings();
        $emailSvc->initialize($config);
        $emailSvc->setFrom('no-reply@siaimmigration.com', 'Sia Immigration Solutions Inc.');
        $emailSvc->setTo(sia_team_emails());
        $emailSvc->setSubject(sia_declaration_subject('Disclaimer Sent', $declaration));
        $emailSvc->setMessage(sia_appt_html($body));
        $emailSvc->send();
    } catch (\Exception $e) {
        log_message('error', '[SiaDeclarationEmail] ' . $e->getMessage());
    }
}

// 3. TEAM – DISCLAIMER VIEWED
function sia_send_declaration_viewed_email(array $declaration): void
{
    helper('smtp_helper');
    helper('appointment_email_helper');

    $body = '
      <h2 style="margin:0 0 14px;color:#1f2430;">Disclaimer Viewed</h2>
      <p>The client has viewed the Disclaimer / Consent document.</p>
      <table cellpadding="6" cellspacing="0" style="width:100%;font-size:13.5px;border:1px solid #eee;">
        <tr><td style="font-weight:700;width:35%;">Client</td><td>' . esc($declaration['client_name'] ?? '—') . '</td></tr>
        <tr><td style="font-weight:700;">SiaID</td><td>' . (int) $declaration['prospect_id'] . '</td></tr>
        <tr><td style="font-weight:700;">Document Type</td><td>' . esc(sia_declaration_document_type($declaration)) . '</td></tr>
        <tr><td style="font-weight:700;">Viewed On</td><td>' . esc(date('F j, Y g:i A')) . '</td></tr>
      </table>
    ';

    try {
        $emailSvc = \Config\Services::email();
        $config   = get_smtp_settings();
        $emailSvc->initialize($config);
        $emailSvc->setFrom('no-reply@siaimmigration.com', 'Sia Immigration Solutions Inc.');
        $emailSvc->setTo(sia_team_emails());
        $emailSvc->setSubject(sia_declaration_subject('Disclaimer Viewed', $declaration));
        $emailSvc->setMessage(sia_appt_html($body));
        $emailSvc->send();
    } catch (\Exception $e) {
        log_message('error', '[SiaDeclarationEmail] ' . $e->getMessage());
    }
}

// 4. CLIENT – REMINDER (available for a manual "Send Reminder" action / future cron; not
// auto-scheduled since no reminder cron exists in this app yet).
function sia_send_declaration_reminder_email(array $declaration, string $signUrl): void
{
    $toEmail = trim($declaration['client_email'] ?? '');
    if ($toEmail === '') {
        return;
    }

    helper('smtp_helper');
    helper('appointment_email_helper');

    $firstName = esc(sia_declaration_first_name($declaration));
    $body = '
      <h2 style="margin:0 0 14px;color:#1f2430;">Reminder: Disclaimer / Consent Pending</h2>
      <p>Hello ' . $firstName . ',</p>
      <p>This is a friendly reminder that your Disclaimer / Consent document is awaiting your signature.</p>
      ' . sia_declaration_button($signUrl, 'Review & eSign Disclaimer') . '
      <p>Regards,<br>' . esc($declaration['consultant_name'] ?: 'Sia Immigration Solutions Inc.') . '<br>Sia Immigration Solutions Inc.</p>
    ';

    try {
        $emailSvc = \Config\Services::email();
        $config   = get_smtp_settings();
        $emailSvc->initialize($config);
        $emailSvc->setFrom('no-reply@siaimmigration.com', 'Sia Immigration Solutions Inc.');
        $emailSvc->setReplyTo('consult@siaimmigration.com', 'SIA Immigration');
        $emailSvc->setTo($toEmail);
        $emailSvc->setSubject(sia_declaration_subject('Reminder | Disclaimer / Consent Pending', $declaration));
        $emailSvc->setMessage(sia_appt_html($body));
        $emailSvc->send();
    } catch (\Exception $e) {
        log_message('error', '[SiaDeclarationEmail] ' . $e->getMessage());
    }
}

// 5 + 6. CLIENT – DISCLAIMER SIGNED and TEAM – DISCLAIMER SIGNED, both with the signed PDF
// attached (per spec) rather than just linked. $declaration must already carry the final
// pdf_path (see sia_declaration_pdf_disk_path()) — the attachment is silently skipped if it's
// missing or the file isn't on disk, since signing itself must never be lost over a PDF
// generation failure.
function sia_send_declaration_signed_email(array $declaration): void
{
    sia_send_declaration_client_signed_email($declaration);
    sia_send_declaration_team_signed_email($declaration);
}

function sia_declaration_pdf_disk_path(array $declaration): ?string
{
    if (empty($declaration['pdf_path'])) {
        return null;
    }
    $path = './' . ltrim($declaration['pdf_path'], '/');
    return is_file($path) ? $path : null;
}

function sia_send_declaration_client_signed_email(array $declaration): void
{
    $toEmail = trim($declaration['client_email'] ?? '');
    if ($toEmail === '') {
        log_message('error', '[SiaDeclarationEmail] Skipped client-signed email: declaration id ' . ($declaration['id'] ?? '?') . ' has no client_email.');
        return;
    }

    helper('smtp_helper');
    helper('appointment_email_helper');

    $firstName = esc(sia_declaration_first_name($declaration));
    $body = '
      <h2 style="margin:0 0 14px;color:#1e7e42;">Disclaimer / Consent Successfully Signed</h2>
      <p>Hello ' . $firstName . ',</p>
      <p>Thank you.</p>
      <p>Your Disclaimer / Consent has been successfully signed.</p>
      <p>A copy of the signed document is attached for your records.</p>
      <p>Regards,<br>' . esc($declaration['consultant_name'] ?: 'Sia Immigration Solutions Inc.') . '<br>Sia Immigration Solutions Inc.</p>
    ';

    try {
        $emailSvc = \Config\Services::email();
        $config   = get_smtp_settings();
        $emailSvc->initialize($config);
        $emailSvc->setFrom('no-reply@siaimmigration.com', 'Sia Immigration Solutions Inc.');
        $emailSvc->setReplyTo('consult@siaimmigration.com', 'SIA Immigration');
        $emailSvc->setTo($toEmail);
        $emailSvc->setSubject(sia_declaration_subject('Disclaimer / Consent Successfully Signed', $declaration));
        $pdfPath = sia_declaration_pdf_disk_path($declaration);
        if ($pdfPath !== null) {
            $emailSvc->attach($pdfPath);
        }
        $emailSvc->setMessage(sia_appt_html($body));
        $emailSvc->send();
    } catch (\Exception $e) {
        log_message('error', '[SiaDeclarationEmail] ' . $e->getMessage());
    }
}

function sia_send_declaration_team_signed_email(array $declaration): void
{
    helper('smtp_helper');
    helper('appointment_email_helper');

    $body = '
      <h2 style="margin:0 0 14px;color:#1e7e42;">Disclaimer Signed</h2>
      <p>The client has successfully signed the Disclaimer / Consent document.</p>
      <p>The signed PDF is attached.</p>
      <table cellpadding="6" cellspacing="0" style="width:100%;font-size:13.5px;border:1px solid #eee;">
        <tr><td style="font-weight:700;width:35%;">Client</td><td>' . esc($declaration['client_name'] ?? '—') . '</td></tr>
        <tr><td style="font-weight:700;">SiaID</td><td>' . (int) $declaration['prospect_id'] . '</td></tr>
        <tr><td style="font-weight:700;">Document Type</td><td>' . esc(sia_declaration_document_type($declaration)) . '</td></tr>
        <tr><td style="font-weight:700;">Signed On</td><td>' . esc(!empty($declaration['client_signed_at']) ? date('F j, Y g:i A', strtotime($declaration['client_signed_at'])) : '—') . '</td></tr>
      </table>
    ';

    try {
        $emailSvc = \Config\Services::email();
        $config   = get_smtp_settings();
        $emailSvc->initialize($config);
        $emailSvc->setFrom('no-reply@siaimmigration.com', 'Sia Immigration Solutions Inc.');
        $emailSvc->setTo(sia_team_emails());
        $emailSvc->setSubject(sia_declaration_subject('Disclaimer Signed', $declaration));
        $pdfPath = sia_declaration_pdf_disk_path($declaration);
        if ($pdfPath !== null) {
            $emailSvc->attach($pdfPath);
        }
        $emailSvc->setMessage(sia_appt_html($body));
        $emailSvc->send();
    } catch (\Exception $e) {
        log_message('error', '[SiaDeclarationEmail] ' . $e->getMessage());
    }
}

// 7. ACCOUNTING — no email required, per spec. No function.

// 8. TEAM – DISCLAIMER DECLINED
function sia_send_declaration_declined_email(array $declaration): void
{
    helper('smtp_helper');
    helper('appointment_email_helper');

    $reason = trim((string) ($declaration['decline_reason'] ?? ''));
    $body = '
      <h2 style="margin:0 0 14px;color:#c0392b;">Disclaimer Declined</h2>
      <p>The client has declined the Disclaimer / Consent document.</p>
      <p>Please follow up with the client if required.</p>
      <table cellpadding="6" cellspacing="0" style="width:100%;font-size:13.5px;border:1px solid #eee;">
        <tr><td style="font-weight:700;width:35%;">Client</td><td>' . esc($declaration['client_name'] ?? '—') . '</td></tr>
        <tr><td style="font-weight:700;">SiaID</td><td>' . (int) $declaration['prospect_id'] . '</td></tr>
        <tr><td style="font-weight:700;">Document Type</td><td>' . esc(sia_declaration_document_type($declaration)) . '</td></tr>
        <tr><td style="font-weight:700;">Declined On</td><td>' . esc(date('F j, Y g:i A')) . '</td></tr>
        ' . ($reason !== '' ? '<tr><td style="font-weight:700;">Reason</td><td>' . esc($reason) . '</td></tr>' : '') . '
      </table>
    ';

    try {
        $emailSvc = \Config\Services::email();
        $config   = get_smtp_settings();
        $emailSvc->initialize($config);
        $emailSvc->setFrom('no-reply@siaimmigration.com', 'Sia Immigration Solutions Inc.');
        $emailSvc->setTo(sia_team_emails());
        $emailSvc->setSubject(sia_declaration_subject('Disclaimer Declined', $declaration));
        $emailSvc->setMessage(sia_appt_html($body));
        $emailSvc->send();
    } catch (\Exception $e) {
        log_message('error', '[SiaDeclarationEmail] ' . $e->getMessage());
    }
}
