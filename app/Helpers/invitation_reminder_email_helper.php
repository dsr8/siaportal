<?php

// Invitation Received dashboard: shared display helpers (also used by the dashboard view) +
// the two automatic emails sent by Invitation::cron_daily():
//   1. sia_inv_reminder_html()  — 7 / 3 / 1-day reminder to the assigned team member
//   2. sia_inv_summary_html()   — one consolidated morning summary to management
// Both are built from the same live rows (Invitation_model::selectColumns() + attachAgreements()).

// Approved configuration for every Invitation Received team notification.
const SIA_INV_FROM_EMAIL = 'no-reply@siaimmigration.com';
const SIA_INV_FROM_NAME  = 'Invitation Reminders – Sia Immigration';
const SIA_INV_CC         = 'no-reply@siaimmigration.com';
const SIA_INV_REPLY_TO   = 'consult@siaimmigration.com';

// "To – All Team Members": recipients of the daily summary, and the fallback for a reminder
// whose application has no assigned team member (or no email on file). Kept separate from
// sia_team_emails() on purpose — this module has its own approved list.
function sia_inv_team_emails(): array
{
    return [
        'kam@siaimmigration.com',      // Ramandeep Kaur
        'info@siaimmigration.com',     // Jashandeep Singh
        'consult@siaimmigration.com',  // Rancy Mittal
        'support@siaimmigration.com',  // Jatin Kumar
        'office@siaimmigration.com',   // Deep Kaur
        'admin@siaimmigration.com',    // Robin Singh
        'reach@siaimmigration.com',    // Kamaljeet Kaur
        'mkj@siaimmigration.com',      // Manpreet Joshi
        'manpreetkjoshi1@gmail.com',
    ];
}

// ── Shared display helpers ────────────────────────────────────────────────────

function sia_inv_has_date($date): bool
{
    return !empty($date) && $date > '1000-01-01';
}

function sia_inv_date($date): string
{
    return sia_inv_has_date($date) ? date('M j, Y', strtotime($date)) : '—';
}

function sia_inv_category_type(array $row): string
{
    $parts = array_filter([trim((string) ($row['category_name'] ?? '')), trim((string) ($row['type_name'] ?? ''))], 'strlen');
    return $parts ? implode(' / ', $parts) : '—';
}

function sia_inv_money($amount): string
{
    return '$' . number_format((float) $amount, 2);
}

// Fee breakdown + status of a row's retainer agreement, or null when none exists yet.
// Government Fee goes through AgreementClauses::governmentFeeTotal() so it always matches
// the Agreement dashboard, form and PDF.
function sia_inv_agreement_summary(?array $agreement): ?array
{
    if (empty($agreement)) {
        return null;
    }

    $status = (string) ($agreement['status'] ?? '');
    $labels = ['signed' => 'Signed', 'declined' => 'Declined', 'cancelled' => 'Cancelled'];

    return [
        'service_fee'    => (float) $agreement['service_fee'],
        'gst_rate'       => rtrim(rtrim(number_format((float) ($agreement['gst_rate'] ?? 5), 2), '0'), '.'),
        'gst_amount'     => (float) $agreement['gst_amount'],
        'government_fee' => \App\Libraries\Agreement\AgreementClauses::governmentFeeTotal($agreement),
        'total'          => (float) $agreement['total_amount'],
        'status_key'     => $status === 'signed' ? 'signed' : (isset($labels[$status]) ? 'closed' : 'pending'),
        'status_label'   => $labels[$status] ?? 'Pending',
        'id'             => (int) $agreement['id'],
        'pdf_path'       => $agreement['pdf_path'] ?? null,
    ];
}

function sia_inv_days_left(string $date, string $today): int
{
    return (int) round((strtotime($date) - strtotime($today)) / 86400);
}

// ── Sending ──────────────────────────────────────────────────────────────────

// Returns true only if the SMTP send actually succeeded (the cron uses it to decide whether
// to keep or release its duplicate-guard log row).
function sia_inv_send($to, string $subject, string $html): bool
{
    helper('smtp_helper');

    try {
        $emailSvc = \Config\Services::email();
        $emailSvc->clear(true);
        $emailSvc->initialize(get_smtp_settings());        $emailSvc->setFrom(SIA_INV_FROM_EMAIL, SIA_INV_FROM_NAME);
        $emailSvc->setReplyTo(SIA_INV_REPLY_TO, 'SIA Immigration');
        $emailSvc->setTo($to);
        $emailSvc->setCC(SIA_INV_CC);
        $emailSvc->setSubject($subject);
        $emailSvc->setMessage($html);
        if ($emailSvc->send(false)) {
            return true;
        }
        log_message('error', '[InvitationEmail] Send failed: ' . $emailSvc->printDebugger(['headers']));
    } catch (\Throwable $e) {
        log_message('error', '[InvitationEmail] ' . $e->getMessage());
    }
    return false;
}

// ── Email building blocks ────────────────────────────────────────────────────

function sia_inv_pill(string $label, string $bg, string $color, bool $dot = false, string $dotColor = ''): string
{
    $dotHtml = $dot ? '<span style="display:inline-block;width:8px;height:8px;border-radius:50%;background:' . $dotColor . ';margin-right:5px;vertical-align:0;"></span>' : '';
    return '<span style="display:inline-block;padding:3px 10px;border-radius:12px;background:' . $bg . ';color:' . $color . ';font-size:12px;font-weight:700;white-space:nowrap;">' . $dotHtml . esc($label) . '</span>';
}

function sia_inv_client_status_pill(): string
{
    return sia_inv_pill('Invitation Received', '#e3efff', '#2563c9');
}

function sia_inv_status_pill(string $invStatus): string
{
    return $invStatus === 'overdue'
        ? sia_inv_pill('Overdue', '#fde4e5', '#c8323b', true, '#F15B62')
        : sia_inv_pill('Pending', '#fff3d6', '#b07a00', true, '#F5B51B');
}

function sia_inv_agreement_pill(?array $ag): string
{
    if ($ag === null) {
        return sia_inv_pill('Not created', '#eef0f3', '#6b7280');
    }
    if ($ag['status_key'] === 'signed') {
        return sia_inv_pill('Signed', '#79B63C', '#ffffff');
    }
    if ($ag['status_key'] === 'closed') {
        return sia_inv_pill($ag['status_label'], '#fde4e5', '#c8323b');
    }
    return sia_inv_pill('Pending', '#fff3d6', '#b07a00', true, '#F5B51B');
}

function sia_inv_shell(string $bodyHtml, int $width = 640): string
{
    $logo = 'https://www.siaimmigration.com/mailer-images/01/left-top.png';
    return '<!DOCTYPE html><html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<style>@media only screen and (max-width:620px){.inv-col{display:block!important;width:100%!important;padding:0 0 12px 0!important}.inv-hide-sm{display:none!important}}</style></head>
<body style="margin:0;padding:0;background:#f2f4f7;font-family:Arial,Helvetica,sans-serif;color:#1f2430;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f2f4f7;padding:20px 10px;"><tr><td align="center">
<table role="presentation" width="' . $width . '" cellpadding="0" cellspacing="0" style="max-width:' . $width . 'px;width:100%;background:#ffffff;border-radius:10px;overflow:hidden;">
  <tr><td style="padding:16px 24px;border-bottom:3px solid #F5B51B;"><img src="' . $logo . '" alt="SIA Immigration" height="42" style="display:block;border:0;"></td></tr>
  ' . $bodyHtml . '
  <tr><td style="background:#0f1b2d;color:#d7dce4;text-align:center;font-size:12.5px;padding:16px 24px;">This is an automated email from Siaportal.</td></tr>
</table>
</td></tr></table>
</body></html>';
}

// Two-column label/value table with a coloured title bar (the mockups' detail cards).
// $afterRows render below the highlight row (e.g. Agreement Status under Total Payable).
function sia_inv_detail_card(string $title, string $icon, string $headBg, string $headColor, array $rows, ?array $highlight = null, array $afterRows = []): string
{
    $html = '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #dfe5ee;border-radius:8px;overflow:hidden;font-size:13px;">
  <tr><td colspan="2" style="background:' . $headBg . ';padding:11px 12px;font-size:14.5px;font-weight:800;color:' . $headColor . ';">' . $icon . '&nbsp; ' . esc($title) . '</td></tr>';
    foreach ($rows as $label => $valueHtml) {
        $html .= '<tr><td style="padding:8px 12px;border-top:1px solid #eef1f5;color:#4b5563;width:46%;">' . esc($label) . '</td>'
            . '<td style="padding:8px 12px;border-top:1px solid #eef1f5;">' . $valueHtml . '</td></tr>';
    }
    if ($highlight !== null) {
        $html .= '<tr><td style="padding:10px 12px;background:#e9f6df;font-weight:800;">' . esc($highlight[0]) . '</td>'
            . '<td style="padding:10px 12px;background:#e9f6df;font-weight:800;font-size:16px;color:#3f7a17;">' . esc($highlight[1]) . '</td></tr>';
    }
    foreach ($afterRows as $label => $valueHtml) {
        $html .= '<tr><td style="padding:10px 12px;color:#4b5563;">' . esc($label) . '</td><td style="padding:10px 12px;">' . $valueHtml . '</td></tr>';
    }
    return $html . '</table>';
}

// ── Email 1: 7 / 3 / 1-day reminder to the assigned team member ──────────────

function sia_inv_reminder_subject(array $row, int $days): string
{
    $prefix = $days <= 1 ? 'URGENT: 1 Day Left' : 'Reminder: ' . $days . ' Days Left';
    return $prefix . ' | Invitation Received | ' . trim((string) $row['client_name']) . ' | SiaID ' . (int) $row['siaportalid'];
}

function sia_inv_reminder_html(array $row, int $days, string $today): string
{
    $urgent   = $days <= 1;
    $theme    = $days >= 7 ? ['#fff6df', '#f3d79a', '#b7791f', '#F5B51B'] : ($urgent ? ['#fcdfe0', '#f2a9ad', '#c8323b', '#e0343f'] : ['#fdeced', '#f6c2c5', '#d23c45', '#F15B62']);
    [$bannerBg, $bannerBorder, $accent, $iconBg] = $theme;

    $tentative = sia_inv_date($row['invitation_date_tantative']);
    $daysLeft  = sia_inv_days_left($row['invitation_date_tantative'], $today);
    $dayWord   = $daysLeft === 1 ? 'day' : 'days';
    $firstName = trim(explode(' ', trim((string) $row['team_member_name']))[0] ?? '') ?: 'Team';
    $when      = $daysLeft === 1 ? 'tomorrow' : 'in ' . $daysLeft . ' days';

    $banner = '<tr><td style="padding:18px 20px 0;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:' . $bannerBg . ';border:1px solid ' . $bannerBorder . ';border-radius:8px;"><tr>
  <td class="inv-col" valign="middle" style="padding:16px 14px;">
    <table role="presentation" cellpadding="0" cellspacing="0"><tr>
      <td valign="middle"><div style="width:58px;height:58px;border-radius:50%;background:' . $iconBg . ';text-align:center;line-height:58px;font-size:28px;color:#fff;">' . ($urgent ? '&#9200;' : '&#128339;') . '</div></td>
      <td valign="middle" style="padding-left:14px;">
        <div style="font-size:13px;font-weight:800;color:' . $accent . ';letter-spacing:.03em;">' . ($urgent ? 'URGENT REMINDER' : 'REMINDER') . '</div>
        <div style="font-size:28px;font-weight:900;color:' . $accent . ';line-height:1.15;">' . $daysLeft . ' ' . strtoupper($dayWord) . ' LEFT</div>
        <div style="font-size:12.5px;color:#374151;margin-top:4px;line-height:1.45;">Client has an Invitation Received status and the tentative submission date is ' . $when . '.</div>
      </td>
    </tr></table>
  </td>
  <td class="inv-col" valign="middle" width="190" style="padding:16px 14px;border-left:1px solid ' . $bannerBorder . ';">
    <div style="font-size:12px;font-weight:700;color:#1f2430;">&#128197; Tentative Submission Date</div>
    <div style="font-size:21px;font-weight:900;color:' . $accent . ';margin-top:3px;">' . esc($tentative) . '</div>
    <div style="font-size:12.5px;color:' . $accent . ';margin-top:2px;">(' . $daysLeft . ' ' . $dayWord . ' remaining)</div>
  </td>
</tr></table>
</td></tr>';

    $intro = '<tr><td style="padding:18px 22px 4px;">
  <div style="font-size:19px;font-weight:800;color:#0f1b2d;">Hi ' . esc($firstName) . ',</div>
  <div style="font-size:14px;color:#374151;line-height:1.55;margin-top:4px;">This is ' . ($urgent ? 'an urgent' : 'a') . ' reminder for the below client. Please ensure all required documents are prepared and the application is submitted on or before the tentative submission date.</div>
</td></tr>';

    $clientCard = sia_inv_detail_card('Client & Application Details', '&#128100;', '#e8f0fb', '#0f1b2d', [
        'Client Name'               => esc($row['client_name'] ?: '—'),
        'Siaportal ID'              => esc((string) $row['siaportalid']),
        'Assigned Team Member'      => esc($row['team_member_name'] ?: '—'),
        'Category / Type'           => esc(sia_inv_category_type($row)),
        'Client Status'             => sia_inv_client_status_pill(),
        'Invitation Status'         => sia_inv_status_pill($row['invitation_status']),
        'Tentative Submission Date' => esc($tentative),
        'Final Submission Date'     => esc(sia_inv_date($row['invitation_date_final'])),
    ]);

    $ag = sia_inv_agreement_summary($row['agreement'] ?? null);
    $agreementCard = $ag === null
        ? sia_inv_detail_card('Retainer Agreement Details', '&#128196;', '#e9f6df', '#2f5d12', [
            'Agreement Status' => sia_inv_agreement_pill(null),
        ])
        : sia_inv_detail_card('Retainer Agreement Details', '&#128196;', '#e9f6df', '#2f5d12', [
            'Service / Program'           => esc(sia_inv_category_type($row)),
            'Service Fee (CAD)'           => esc(sia_inv_money($ag['service_fee'])),
            'GST (' . $ag['gst_rate'] . '%)' => esc(sia_inv_money($ag['gst_amount'])),
            'Government Fee (CAD)'        => esc(sia_inv_money($ag['government_fee'])),
        ], ['Total Payable (CAD)', sia_inv_money($ag['total'])], ['Agreement Status' => sia_inv_agreement_pill($ag)]);

    $cards = '<tr><td style="padding:14px 20px 0;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0"><tr>
  <td class="inv-col" width="50%" valign="top" style="padding-right:6px;">' . $clientCard . '</td>
  <td class="inv-col" width="50%" valign="top" style="padding-left:6px;">' . $agreementCard . '</td>
</tr></table>
</td></tr>';

    $actions = $urgent
        ? ['Submit the application <strong style="color:#c8323b;">tomorrow (' . esc($tentative) . ')</strong>.', 'Ensure all required documents are collected.', 'Coordinate with the client immediately.', 'Update the status in Siaportal once submitted.']
        : ['Review the client&rsquo;s file and ensure all documents are collected.', 'Coordinate with the client for any pending information.', 'Submit the application on or before <strong>' . esc($tentative) . '</strong>.'];
    $actionItems = '';
    foreach ($actions as $item) {
        $actionItems .= '<li style="margin:3px 0;">' . $item . '</li>';
    }

    $actionBox = '<tr><td style="padding:16px 20px 0;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#fdecec;border:1px solid #f6c7c9;border-radius:8px;"><tr>
  <td valign="top" width="52" style="padding:16px 0 16px 16px;"><div style="width:36px;height:36px;border-radius:50%;background:#d32f2f;color:#fff;text-align:center;line-height:36px;font-size:20px;font-weight:900;">!</div></td>
  <td style="padding:14px 16px 12px 12px;">
    <div style="font-size:17px;font-weight:800;color:#c62828;">' . ($urgent ? 'URGENT ACTION REQUIRED' : 'Action Required') . '</div>
    <ul style="margin:6px 0 0;padding-left:18px;font-size:13.5px;color:#1f2430;line-height:1.5;">' . $actionItems . '</ul>
  </td>
</tr></table>
</td></tr>';

    $next = $days >= 7
        ? 'You will receive additional reminders <strong>3 days before</strong> and <strong>1 day before</strong> the tentative submission date.'
        : ($days >= 3 ? 'You will receive another reminder <strong>1 day before</strong> the tentative submission date.' : 'This is your <strong>final reminder</strong> for this client.');
    $nextBox = '<tr><td style="padding:14px 20px 20px;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#eaf5fd;border:1px solid #cfe6f7;border-radius:8px;"><tr>
  <td width="52" style="padding:12px 0 12px 16px;"><div style="width:36px;height:36px;border-radius:50%;background:#4fc3f7;color:#0f1b2d;text-align:center;line-height:36px;font-size:18px;">&#9993;</div></td>
  <td style="padding:12px 16px 12px 12px;font-size:13.5px;color:#1f2430;">' . $next . '</td>
</tr></table>
</td></tr>';

    return sia_inv_shell($banner . $intro . $cards . $actionBox . $nextBox);
}

// ── Email 2: daily overall summary to management ─────────────────────────────

function sia_inv_summary_subject(array $counts, string $today): string
{
    return 'Daily Summary - Invitation Received | ' . date('M j, Y', strtotime($today))
        . ' | ' . $counts['pending'] . ' Pending, ' . $counts['overdue'] . ' Overdue';
}

// $rows: Invitation_model::getAllActive() + attachAgreements().
function sia_inv_summary_html(array $rows, string $today): string
{
    $overdueTotal = count(array_filter($rows, static fn ($r) => $r['invitation_status'] === 'overdue'));
    $counts = ['total' => count($rows), 'pending' => count($rows) - $overdueTotal, 'overdue' => $overdueTotal];

    $statCard = static function (string $icon, string $iconBg, string $bg, string $border, string $color, int $value, string $label, string $sub) {
        return '<td class="inv-col" width="33%" valign="top" style="padding:0 5px;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:' . $bg . ';border:1px solid ' . $border . ';border-radius:8px;"><tr>
  <td width="54" style="padding:14px 0 14px 14px;"><div style="width:44px;height:44px;border-radius:50%;background:' . $iconBg . ';text-align:center;line-height:44px;font-size:21px;">' . $icon . '</div></td>
  <td style="padding:12px 12px 12px 10px;">
    <div style="font-size:26px;font-weight:900;color:' . $color . ';line-height:1;">' . $value . '</div>
    <div style="font-size:14px;font-weight:800;color:' . $color . ';margin-top:3px;">' . esc($label) . '</div>
    <div style="font-size:11.5px;color:#4b5563;margin-top:1px;">' . esc($sub) . '</div>
  </td>
</tr></table></td>';
    };

    $head = '<tr><td style="padding:20px 22px 6px;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0"><tr>
  <td valign="top">
    <div style="font-size:22px;font-weight:900;color:#0f1b2d;">Daily Summary &ndash; Invitation Received</div>
    <div style="font-size:13.5px;color:#4b5563;margin-top:3px;">Here is today&rsquo;s summary of clients with Invitation Received status.</div>
  </td>
  <td valign="top" align="right" class="inv-hide-sm" style="white-space:nowrap;">
    <div style="font-size:15px;font-weight:800;color:#0f1b2d;">&#128197; ' . esc(date('M j, Y', strtotime($today))) . '</div>
    <div style="font-size:12px;color:#4b5563;">As of ' . esc(date('g:i A')) . '</div>
  </td>
</tr></table>
</td></tr>
<tr><td style="padding:10px 17px 6px;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0"><tr>'
        . $statCard('&#9993;', '#cfe9b8', '#eef8e6', '#cfe9b8', '#3f7a17', $counts['total'], 'Total Invitation Received', 'Active, not archived')
        . $statCard('&#128339;', '#fde3a3', '#fff7e0', '#fbe1a0', '#b07a00', $counts['pending'], 'Pending', 'Tentative date not passed')
        . $statCard('&#9888;', '#fbc9cb', '#fdecec', '#f6c2c5', '#c8323b', $counts['overdue'], 'Overdue', 'Tentative date passed')
        . '</tr></table>
</td></tr>';

    // Group by assigned team member (rows already arrive sorted by member name, then date).
    $groups = [];
    foreach ($rows as $row) {
        $name = trim((string) $row['team_member_name']) ?: 'Unassigned';
        $groups[$name][] = $row;
    }
    if (isset($groups['Unassigned'])) { // keep it after the named team members
        $unassigned = $groups['Unassigned'];
        unset($groups['Unassigned']);
        $groups['Unassigned'] = $unassigned;
    }

    $th = 'style="padding:8px 7px;text-align:left;font-size:11.5px;color:#374151;background:#f6f8fb;border-bottom:1px solid #e5e9f0;"';
    $sections = '';
    foreach ($groups as $member => $memberRows) {
        $mOverdue = count(array_filter($memberRows, static fn ($r) => $r['invitation_status'] === 'overdue'));
        $mTotal   = count($memberRows);

        $bodyRows = '';
        foreach ($memberRows as $i => $row) {
            $isOverdue = $row['invitation_status'] === 'overdue';
            $td = 'style="padding:8px 7px;font-size:12px;border-bottom:1px solid #eef1f5;vertical-align:middle;' . ($isOverdue ? 'background:#fff5f5;' : '') . '"';
            $ag = sia_inv_agreement_summary($row['agreement'] ?? null);
            $agHtml = $ag === null
                ? sia_inv_agreement_pill(null)
                : '<div style="background:#eef8e6;border-radius:6px;padding:6px 8px;font-size:11px;line-height:1.5;white-space:nowrap;">'
                    . 'Service: ' . esc(sia_inv_money($ag['service_fee'])) . '<br>'
                    . 'GST (' . $ag['gst_rate'] . '%): ' . esc(sia_inv_money($ag['gst_amount'])) . '<br>'
                    . 'Govt: ' . esc(sia_inv_money($ag['government_fee'])) . '<br>'
                    . '<strong>Total: CAD ' . esc(sia_inv_money($ag['total'])) . '</strong><br>'
                    . sia_inv_agreement_pill($ag) . '</div>';

            $bodyRows .= '<tr>'
                . '<td ' . $td . '>' . ($i + 1) . '</td>'
                . '<td ' . $td . '><strong>' . esc($row['client_name'] ?: '—') . '</strong><br><span style="color:#6b7280;">(SiaID ' . (int) $row['siaportalid'] . ')</span></td>'
                . '<td ' . $td . '>' . esc(sia_inv_category_type($row)) . '</td>'
                . '<td ' . $td . '>' . sia_inv_client_status_pill() . '</td>'
                . '<td ' . $td . '>' . sia_inv_status_pill($row['invitation_status']) . '</td>'
                . '<td ' . $td . ' nowrap>' . ($isOverdue ? '<strong style="color:#c8323b;">' : '') . esc(sia_inv_date($row['invitation_date_tantative'])) . ($isOverdue ? '</strong>' : '') . '</td>'
                . '<td ' . $td . ' nowrap>' . esc(sia_inv_date($row['invitation_date_final'])) . '</td>'
                . '<td ' . $td . '>' . $agHtml . '</td>'
                . '</tr>';
        }

        $chip = static fn ($bg, $color, $text) => '<span style="display:inline-block;background:' . $bg . ';color:' . $color . ';border-radius:6px;padding:4px 10px;font-size:12.5px;font-weight:700;margin-left:6px;">' . $text . '</span>';

        $sections .= '<tr><td style="padding:14px 22px 0;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #d9e4f2;border-radius:8px;overflow:hidden;">
  <tr><td colspan="8" style="background:#e8f0fb;padding:10px 12px;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0"><tr>
      <td style="font-size:17px;font-weight:800;color:#0f1b2d;">' . esc($member) . '</td>
      <td align="right" style="white-space:nowrap;">' . $chip('#d6e6fa', '#1f3b63', 'Total: ' . $mTotal) . $chip('#fff1c9', '#b07a00', 'Pending: ' . ($mTotal - $mOverdue)) . $chip('#fde0e1', '#c8323b', 'Overdue: ' . $mOverdue) . '</td>
    </tr></table>
  </td></tr>
  <tr><th ' . $th . '>#</th><th ' . $th . '>Client Name / ID</th><th ' . $th . '>Category / Type</th><th ' . $th . '>Client Status</th><th ' . $th . '>Invitation Status</th><th ' . $th . '>Tentative Date</th><th ' . $th . '>Final Date</th><th ' . $th . '>Retainer Agreement</th></tr>
  ' . $bodyRows . '
</table>
</td></tr>';
    }

    if ($sections === '') {
        $sections = '<tr><td style="padding:16px 22px 0;font-size:14px;color:#4b5563;">There are no active Invitation Received applications today.</td></tr>';
    }

    $footer = '<tr><td style="padding:18px 22px 22px;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#eaf5fd;border:1px solid #cfe6f7;border-radius:8px;"><tr>
  <td width="52" style="padding:12px 0 12px 16px;"><div style="width:36px;height:36px;border-radius:50%;background:#4fc3f7;color:#0f1b2d;text-align:center;line-height:36px;font-size:18px;">&#128339;</div></td>
  <td style="padding:12px 16px 12px 12px;font-size:13.5px;color:#1f2430;"><strong style="color:#0f1b2d;">Please review the above pending and overdue applications and take necessary action.</strong><br>This is an automated daily summary from Siaportal.</td>
</tr></table>
</td></tr>';

    return sia_inv_shell($head . $sections . $footer, 960);
}
