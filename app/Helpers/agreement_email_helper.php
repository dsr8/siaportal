<?php

// All Agreement/Retainer-Agreement transactional emails — client-facing and internal team
// notifications. Uses a bespoke "premium" HTML shell (sia_agreement_email_shell()) rather
// than the shared sia_appt_html() wrapper used by most of the app's other transactional
// emails, per the approved branded design for this module (logo header, gradient bar,
// coloured banner, optional summary-card grid, optional status box, optional CTA button).
//
// From/Reply-To/CC and the team distribution list are centralized here so every Agreement
// email stays consistent — see sia_agreement_send() and sia_team_emails() (appointment_email_helper.php).

const SIA_AGREEMENT_FROM_EMAIL = 'no-reply@siaimmigration.com';
const SIA_AGREEMENT_FROM_NAME  = 'eSign Retainer Agreement Sia Immigration';
const SIA_AGREEMENT_REPLY_TO   = 'consult@siaimmigration.com';
const SIA_AGREEMENT_ACCOUNTING_EMAIL = 'accounting@siaimmigration.com';

function sia_agreement_first_name(array $agreement): string
{
    $name = trim((string) ($agreement['client_name'] ?? 'Client'));
    $parts = preg_split('/\s+/', $name);
    return $parts[0] !== '' ? $parts[0] : $name;
}

function sia_agreement_type_label(array $agreement): string
{
    if (empty($agreement['type_id'])) {
        return 'Retainer Agreement';
    }
    $TypeClient = new \App\Models\Type_client_model();
    $type = $TypeClient->getpost_id((int) $agreement['type_id'])[0] ?? null;
    return $type ? trim(($type['ct'] ?? '') . ' — ' . $type['type']) : 'Retainer Agreement';
}

// `{Event} | {Client Name} | {Application Type} | SiaID {SiaID}` — the pipe-separated subject
// pattern used across every Agreement notification.
function sia_agreement_subject(string $event, array $agreement, string $typeLabel): string
{
    return $event . ' | ' . ($agreement['client_name'] ?? 'Client') . ' | '
        . $typeLabel . ' | SiaID ' . (int) $agreement['prospect_id'];
}

function sia_agreement_pdf_disk_path(array $agreement): ?string
{
    if (empty($agreement['pdf_path'])) {
        return null;
    }
    $path = './' . ltrim($agreement['pdf_path'], '/');
    return is_file($path) ? $path : null;
}

// Shared send plumbing (init/from/reply-to/cc/subject/message/optional attachment/send) so
// every one of the functions below is just "build the body, call this." $to may be a single
// address or an array (e.g. sia_team_emails()).
function sia_agreement_send($to, string $subject, string $html, ?string $attachPath = null): void
{
    helper('smtp_helper');

    try {
        $emailSvc = \Config\Services::email();
        $config   = get_smtp_settings();
        $emailSvc->initialize($config);
        $emailSvc->setFrom(SIA_AGREEMENT_FROM_EMAIL, SIA_AGREEMENT_FROM_NAME);
        $emailSvc->setReplyTo(SIA_AGREEMENT_REPLY_TO, 'SIA Immigration');
        $emailSvc->setTo($to);
        $emailSvc->setCC(SIA_AGREEMENT_FROM_EMAIL);
        $emailSvc->setSubject($subject);
        if ($attachPath !== null) {
            $emailSvc->attach($attachPath);
        }
        $emailSvc->setMessage($html);
        $emailSvc->send();
    } catch (\Exception $e) {
        log_message('error', '[SiaAgreementEmail] ' . $e->getMessage());
    }
}

// Shared "premium" HTML shell — logo header, gradient bar, coloured banner, optional
// summary-card grid (wraps 3-per-row so an arbitrary card count still reads cleanly in a
// ~600px email column), optional plain field table, optional highlighted status box,
// optional CTA button + fallback link, need-help block, footer.
//
// $opts: bannerEmoji, bannerBg, bannerIconBg, bannerTitle, introHtml (raw html),
// metaRow (array of exactly 2 ['icon','label','value'] — the small side-by-side reference/date
// boxes from the original approved Client-Sent design), cards (array of
// ['emoji','color','label','value']), fields (array of ['label','value']),
// statusBox (['title'=>..,'lines'=>[..]] or null), button (['url'=>..,'label'=>..] or null),
// outroHtml (raw html rendered after cards/fields/status/button, before the footer —
// for a closing line the spec places after those sections rather than in the opening intro),
// consultant (footer signature name).
function sia_agreement_email_shell(array $opts): string
{
    helper('appointment_email_helper'); // for the SIA_PHONE constant, and sia_team_emails() used by callers

    $bannerEmoji  = $opts['bannerEmoji'] ?? '&#128221;';
    $bannerBg     = $opts['bannerBg'] ?? '#fdf3e3';
    $bannerIconBg = $opts['bannerIconBg'] ?? '#f5a623';
    $bannerTitle  = $opts['bannerTitle'];
    $introHtml    = $opts['introHtml'];
    $metaRow      = $opts['metaRow'] ?? [];
    $cards        = $opts['cards'] ?? [];
    $fields       = $opts['fields'] ?? [];
    $statusBox    = $opts['statusBox'] ?? null;
    $button       = $opts['button'] ?? null;
    $outroHtml    = $opts['outroHtml'] ?? '';
    $consultant   = esc($opts['consultant'] ?? 'Sia Immigration Solutions Inc.');
    $year         = date('Y');

    $siaLogo  = 'https://www.siaimmigration.com/mailer-images/01/left-top.png';
    $rcicLogo = 'https://www.siaimmigration.com/mailer-images/01/right-top.png';

    $detailCard = function ($card) {
        return '<td width="24%" align="center" valign="top" style="border:1px solid #eceef1;border-radius:8px;padding:14px 6px;">'
            . '<div style="font-size:20px;line-height:1;">' . $card['emoji'] . '</div>'
            . '<div style="font-size:10.5px;font-weight:700;color:' . $card['color'] . ';margin-top:8px;">' . esc($card['label']) . '</div>'
            . '<div style="font-size:12.5px;font-weight:700;color:#1f2430;margin-top:2px;">' . esc($card['value']) . '</div>'
            . '</td>';
    };

    $cardsHtml = '';
    foreach (array_chunk($cards, 4) as $row) {
        $cardsHtml .= '<tr>';
        foreach ($row as $i => $card) {
            if ($i > 0) {
                $cardsHtml .= '<td width="2%">&nbsp;</td>';
            }
            $cardsHtml .= $detailCard($card);
        }
        $cardsHtml .= '</tr><tr><td colspan="10" style="height:10px;line-height:10px;font-size:0;">&nbsp;</td></tr>';
    }

    $html = '<!DOCTYPE html><html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"></head>
<body style="margin:0;padding:0;background:#f4f5f7;font-family:Arial,Helvetica,sans-serif;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f4f5f7;padding:24px 12px;">
<tr><td align="center">
<table role="presentation" width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;background:#ffffff;border-radius:10px;overflow:hidden;">

  <tr><td style="padding:24px 30px 16px;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0"><tr>
      <td valign="middle"><img src="' . $siaLogo . '" alt="SIA Immigration" height="40" style="display:block;border:0;"></td>
      <td valign="middle" align="right"><img src="' . $rcicLogo . '" alt="RCIC" height="34" style="display:block;border:0;"></td>
    </tr></table>
  </td></tr>
  <tr><td style="height:4px;background:linear-gradient(90deg,#e23b3b,#f39c12,#2ecc71,#3498db,#8e44ad);font-size:0;line-height:0;">&nbsp;</td></tr>

  <tr><td style="background:' . $bannerBg . ';padding:28px 30px;">
    <table role="presentation" cellpadding="0" cellspacing="0"><tr>
      <td valign="top">
        <table role="presentation" width="48" cellpadding="0" cellspacing="0" style="background:' . $bannerIconBg . ';border-radius:50%;"><tr>
          <td align="center" valign="middle" style="width:48px;height:48px;font-size:22px;">' . $bannerEmoji . '</td>
        </tr></table>
      </td>
      <td valign="middle" style="padding-left:14px;font-size:21px;font-weight:800;color:#1f2430;line-height:1.25;">
        ' . esc($bannerTitle) . '
      </td>
    </tr></table>
    ' . $introHtml . '
  </td></tr>';

    if (!empty($metaRow)) {
        $metaHtml = '';
        foreach ($metaRow as $i => $meta) {
            if ($i > 0) {
                $metaHtml .= '<td width="2%">&nbsp;</td>';
            }
            $metaHtml .= '<td width="49%" style="border:1px solid #eceef1;border-radius:8px;padding:12px 14px;">
        <table role="presentation" cellpadding="0" cellspacing="0"><tr>
          <td style="font-size:15px;color:#e23b3b;padding-right:10px;">' . $meta['icon'] . '</td>
          <td>
            <div style="font-size:10.5px;color:#9aa0aa;">' . esc($meta['label']) . '</div>
            <div style="font-size:13px;font-weight:700;color:#1f2430;">' . esc($meta['value']) . '</div>
          </td>
        </tr></table>
      </td>';
        }
        $html .= '<tr><td style="padding:22px 30px 0;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0"><tr>' . $metaHtml . '</tr></table>
  </td></tr>';
    }

    if (!empty($cards)) {
        $html .= '<tr><td style="padding:22px 30px 0;">
    <div style="font-size:13.5px;font-weight:700;color:#1f2430;margin-bottom:10px;">' . esc($opts['cardsTitle'] ?? 'Agreement Details') . '</div>
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0">' . $cardsHtml . '</table>
  </td></tr>';
    }

    if (!empty($fields)) {
        $rows = '';
        foreach ($fields as $field) {
            $rows .= '<tr><td style="padding:8px 12px;font-weight:700;width:35%;border-bottom:1px solid #f0f1f3;">' . esc($field['label']) . '</td>'
                . '<td style="padding:8px 12px;border-bottom:1px solid #f0f1f3;">' . esc($field['value']) . '</td></tr>';
        }
        $html .= '<tr><td style="padding:22px 30px 0;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="font-size:13px;border:1px solid #eceef1;border-radius:8px;overflow:hidden;">' . $rows . '</table>
  </td></tr>';
    }

    if ($statusBox !== null) {
        $lines = '';
        foreach ($statusBox['lines'] as $line) {
            $lines .= '<div style="font-size:12px;color:#4c5a53;margin-top:3px;">' . esc($line) . '</div>';
        }
        $html .= '<tr><td style="padding:22px 30px 0;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#eefaf1;border-radius:8px;"><tr>
      <td style="padding:14px 16px;">
        <span style="font-size:14px;font-weight:700;color:#1e7e42;">' . esc($statusBox['title']) . '</span>
        ' . $lines . '
      </td>
    </tr></table>
  </td></tr>';
    }

    if ($button !== null) {
        $btnUrlAttr = esc($button['url'], 'attr');
        $btnUrlText = esc($button['url']);
        $html .= '<tr><td align="center" style="padding:26px 30px 4px;">
    <table role="presentation" cellpadding="0" cellspacing="0"><tr><td style="background:#4c3ff5;border-radius:8px;">
      <a href="' . $btnUrlAttr . '" target="_blank" style="display:inline-block;padding:13px 28px;font-size:14.5px;font-weight:700;color:#ffffff;text-decoration:none;">' . esc($button['label']) . '</a>
    </td></tr></table>
  </td></tr>
  <tr><td align="center" style="padding:12px 30px 0;font-size:11.5px;color:#9aa0aa;">
    If the button does not work, copy and paste this link into your browser:<br>
    <a href="' . $btnUrlAttr . '" style="color:#4c3ff5;word-break:break-all;">' . $btnUrlText . '</a>
  </td></tr>';
    }

    if ($outroHtml !== '') {
        $html .= '<tr><td style="padding:18px 30px 0;font-size:13.5px;color:#555;line-height:1.6;">' . $outroHtml . '</td></tr>';
    }

    $html .= '<tr><td style="padding:24px 30px 0;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-top:1px solid #eceef1;"><tr>
      <td style="padding-top:18px;" width="55%">
        <div style="font-size:12.5px;font-weight:700;color:#1f2430;">Need Help?</div>
        <div style="font-size:11.5px;color:#6b7280;margin-top:2px;">If you have any questions, we are here to help.</div>
      </td>
      <td style="padding-top:18px;" width="45%">
        <div style="font-size:12px;color:#1f2430;">&#128222; ' . esc(SIA_PHONE) . '</div>
        <div style="font-size:12px;color:#1f2430;margin-top:4px;">&#9993;&#65039; Consult@siaimmigration.com</div>
      </td>
    </tr></table>
  </td></tr>

  <tr><td style="padding:20px 30px 26px;">
    <div style="border-top:1px solid #eceef1;margin-bottom:16px;"></div>
    <div style="font-size:14px;font-weight:800;color:#e23b3b;">SIA IMMIGRATION</div>
    <div style="font-size:11.5px;color:#6b7280;margin-top:6px;line-height:1.6;">Regards,<br>' . $consultant . '<br>Sia Immigration Solutions Inc.</div>
    <div style="font-size:10.5px;color:#b3b8bf;margin-top:14px;">&copy; ' . $year . ' Sia Immigration Solutions Inc. All Rights Reserved.</div>
  </td></tr>

</table>
</td></tr>
</table>
</body></html>';

    return $html;
}

function sia_agreement_money(array $agreement, $amount): string
{
    $currency = esc($agreement['currency'] ?: 'CAD');
    return '$' . number_format((float) $amount, 2) . ' ' . $currency;
}

// Dispatcher: sends the client "ready for review" email AND the internal team notification
// together — triggered once from Agreement::generate_link() for both the first send and
// every resend (no separate copy is defined for a resend).
function sia_send_agreement_email(array $agreement, string $signUrl): void
{
    sia_send_agreement_client_sent_email($agreement, $signUrl);
    sia_send_agreement_team_sent_email($agreement);
}

// 1. CLIENT – RETAINER AGREEMENT SENT
function sia_send_agreement_client_sent_email(array $agreement, string $signUrl): void
{
    $toEmail = trim($agreement['client_email'] ?? '');
    if ($toEmail === '') {
        log_message('error', '[SiaAgreementEmail] Skipped client-sent email: agreement id ' . ($agreement['id'] ?? '?') . ' has no client_email.');
        return;
    }

    $clientName = esc($agreement['client_name'] ?? 'Client');
    $typeLabel  = sia_agreement_type_label($agreement);
    $refNumber  = esc($agreement['reference_number'] ?? '—');
    $dateSent   = esc(date('F j, Y'));

    $intro = '<div style="margin-top:18px;font-size:15px;font-weight:700;color:#1f2430;">Hello ' . $clientName . ',</div>
    <div style="margin-top:8px;font-size:13.5px;color:#555;line-height:1.6;">
      Your Retainer Agreement for immigration services has been prepared and is ready for your review and electronic signature.
    </div>';

    $metaRow = [
        ['icon' => '&#35;', 'label' => 'Reference No.', 'value' => $refNumber],
        ['icon' => '&#128197;', 'label' => 'Date Sent', 'value' => $dateSent],
    ];
    $cards = [
        ['emoji' => '&#128188;', 'color' => '#27ae60', 'label' => 'Application Type', 'value' => $typeLabel],
        ['emoji' => '&#128176;', 'color' => '#e08e2b', 'label' => 'Service Fee', 'value' => sia_agreement_money($agreement, $agreement['service_fee'] ?? 0)],
        ['emoji' => '&#127974;', 'color' => '#3498db', 'label' => 'Government Fee', 'value' => sia_agreement_money($agreement, \App\Libraries\Agreement\AgreementClauses::governmentFeeTotal($agreement))],
        ['emoji' => '&#128179;', 'color' => '#e23b3b', 'label' => 'Total Amount', 'value' => sia_agreement_money($agreement, $agreement['total_amount'] ?? 0)],
    ];

    $html = sia_agreement_email_shell([
        'bannerTitle' => 'Retainer Agreement Ready for Review',
        'introHtml'   => $intro,
        'metaRow'     => $metaRow,
        'cards'       => $cards,
        'statusBox'   => [
            'title' => 'Secure Electronic Signature',
            'lines' => ['Your eSignature is secure, legally valid and protected. Once you review and sign the agreement, you will receive a fully executed copy via email.'],
        ],
        'button'      => ['url' => $signUrl, 'label' => 'Review & eSign Agreement'],
        'consultant'  => $agreement['consultant_name'] ?? 'Sia Immigration',
    ]);

    sia_agreement_send(
        $toEmail,
        sia_agreement_subject('Action Required | Retainer Agreement', $agreement, $typeLabel),
        $html
    );
}

// 2. TEAM – AGREEMENT SENT (same premium layout/cards as Client Sent, no eSign button)
function sia_send_agreement_team_sent_email(array $agreement): void
{
    $typeLabel = sia_agreement_type_label($agreement);
    $govtFee   = \App\Libraries\Agreement\AgreementClauses::governmentFeeTotal($agreement);
    $otherFee  = (float) ($agreement['other_fee'] ?? 0);

    $intro = '<div style="margin-top:18px;font-size:13.5px;color:#555;line-height:1.6;">
      The Retainer Agreement has been successfully sent to the client.<br>
      Below is the agreement summary for your reference.
    </div>';

    $cards = [
        ['emoji' => '&#128100;', 'color' => '#3498db', 'label' => 'SiaID', 'value' => (string) (int) $agreement['prospect_id']],
        ['emoji' => '&#128197;', 'color' => '#3498db', 'label' => 'Date Sent', 'value' => esc(date('F j, Y'))],
        ['emoji' => '&#128100;', 'color' => '#27ae60', 'label' => 'Client Name', 'value' => (string) ($agreement['client_name'] ?? '—')],
        ['emoji' => '&#128737;&#65039;', 'color' => '#8e44ad', 'label' => 'Consultant', 'value' => (string) ($agreement['consultant_name'] ?? '—')],
        ['emoji' => '&#128188;', 'color' => '#27ae60', 'label' => 'Application Type', 'value' => $typeLabel],
        ['emoji' => '&#128176;', 'color' => '#e08e2b', 'label' => 'Professional Service Fee', 'value' => sia_agreement_money($agreement, $agreement['service_fee'] ?? 0)],
        ['emoji' => '&#128176;', 'color' => '#e08e2b', 'label' => 'GST (5%)', 'value' => sia_agreement_money($agreement, $agreement['gst_amount'] ?? 0)],
    ];
    if ($govtFee > 0) {
        $cards[] = ['emoji' => '&#127974;', 'color' => '#3498db', 'label' => 'Government Fee', 'value' => sia_agreement_money($agreement, $govtFee)];
    }
    if ($otherFee > 0) {
        $cards[] = ['emoji' => '&#128179;', 'color' => '#3498db', 'label' => 'Other Fee', 'value' => sia_agreement_money($agreement, $otherFee)];
    }
    $cards[] = ['emoji' => '&#128179;', 'color' => '#e23b3b', 'label' => 'Total Payable', 'value' => sia_agreement_money($agreement, $agreement['total_amount'] ?? 0)];

    $html = sia_agreement_email_shell([
        'bannerTitle' => 'Retainer Agreement Successfully Sent',
        'introHtml'   => $intro,
        'cards'       => $cards,
        'cardsTitle'  => 'Agreement Summary',
        'statusBox'   => [
            'title' => 'Agreement Status',
            'lines' => ['Status: Sent', 'Date & Time: ' . date('F j, Y g:i A')],
        ],
        'button'      => ['url' => base_url('agreement/Agreement/detail/' . $agreement['id']), 'label' => 'View Agreement'],
        'consultant'  => $agreement['consultant_name'] ?? 'Sia Immigration',
    ]);

    sia_agreement_send(
        sia_team_emails(),
        sia_agreement_subject('Agreement Sent', $agreement, $typeLabel),
        $html
    );
}

// 3. TEAM – AGREEMENT VIEWED
function sia_send_agreement_viewed_email(array $agreement): void
{
    $typeLabel = sia_agreement_type_label($agreement);

    $intro = '<div style="margin-top:18px;font-size:13.5px;color:#555;line-height:1.6;">
      The client has viewed the Retainer Agreement.
    </div>';

    $fields = [
        ['label' => 'Client', 'value' => $agreement['client_name'] ?? '—'],
        ['label' => 'Application', 'value' => $typeLabel],
        ['label' => 'Viewed On', 'value' => date('F j, Y g:i A')],
    ];

    $html = sia_agreement_email_shell([
        'bannerEmoji'  => '&#128065;&#65039;',
        'bannerBg'     => '#eaf1fb',
        'bannerIconBg' => '#3498db',
        'bannerTitle'  => 'Retainer Agreement Viewed',
        'introHtml'    => $intro,
        'fields'       => $fields,
        'consultant'   => $agreement['consultant_name'] ?? 'Sia Immigration',
    ]);

    sia_agreement_send(
        sia_team_emails(),
        sia_agreement_subject('Agreement Viewed', $agreement, $typeLabel),
        $html
    );
}

// 4. CLIENT – REMINDER (sent by the automatic reminder cron — see App\Commands\SendAgreementReminders)
function sia_send_agreement_reminder_email(array $agreement, string $signUrl): void
{
    $toEmail = trim($agreement['client_email'] ?? '');
    if ($toEmail === '') {
        log_message('error', '[SiaAgreementEmail] Skipped reminder email: agreement id ' . ($agreement['id'] ?? '?') . ' has no client_email.');
        return;
    }

    $firstName = esc(sia_agreement_first_name($agreement));
    $typeLabel = sia_agreement_type_label($agreement);

    $intro = '<div style="margin-top:18px;font-size:15px;font-weight:700;color:#1f2430;">Hello ' . $firstName . ',</div>
    <div style="margin-top:8px;font-size:13.5px;color:#555;line-height:1.6;">
      This is a friendly reminder that your Retainer Agreement is still awaiting your signature.<br>
      Please review and sign the agreement using the secure button below.
    </div>';

    $html = sia_agreement_email_shell([
        'bannerEmoji'  => '&#8987;',
        'bannerBg'     => '#fff8e6',
        'bannerIconBg' => '#f5a623',
        'bannerTitle'  => 'Retainer Agreement Pending',
        'introHtml'    => $intro,
        'button'       => ['url' => $signUrl, 'label' => 'Review & eSign Agreement'],
        'outroHtml'    => 'If you require any assistance, please contact us.',
        'consultant'   => $agreement['consultant_name'] ?? 'Sia Immigration',
    ]);

    sia_agreement_send(
        $toEmail,
        sia_agreement_subject('Reminder | Retainer Agreement Pending', $agreement, $typeLabel),
        $html
    );
}

// Dispatcher: client-signed + team-signed + accounting (accounting only fires here, since it's
// only relevant once the agreement is actually signed) — triggered once from Sign::submit().
function sia_send_signed_agreement_email(array $agreement, string $pdfUrl): void
{
    sia_send_agreement_client_signed_email($agreement, $pdfUrl);
    sia_send_agreement_team_signed_email($agreement);
    sia_send_agreement_accounting_signed_email($agreement);
}

// 5. CLIENT – AGREEMENT SIGNED
function sia_send_agreement_client_signed_email(array $agreement, string $pdfUrl): void
{
    $toEmail = trim($agreement['client_email'] ?? '');
    if ($toEmail === '') {
        log_message('error', '[SiaAgreementEmail] Skipped client-signed email: agreement id ' . ($agreement['id'] ?? '?') . ' has no client_email.');
        return;
    }

    $typeLabel = sia_agreement_type_label($agreement);
    $html = sia_agreement_client_signed_html($agreement, $pdfUrl);

    sia_agreement_send(
        $toEmail,
        sia_agreement_subject('Retainer Agreement Successfully Signed', $agreement, $typeLabel),
        $html,
        sia_agreement_pdf_disk_path($agreement)
    );
}

// Shared by the client-signed email and the accounting copy (same content, per spec).
function sia_agreement_client_signed_html(array $agreement, string $pdfUrl): string
{
    $firstName = esc(sia_agreement_first_name($agreement));

    $intro = '<div style="margin-top:18px;font-size:15px;font-weight:700;color:#1f2430;">Hello ' . $firstName . ',</div>
    <div style="margin-top:8px;font-size:13.5px;color:#555;line-height:1.6;">
      Thank you.<br>
      Your Retainer Agreement has been successfully signed.<br>
      A copy of the signed agreement is attached for your records.<br><br>
      Our team will now continue with the next steps of your application and will contact you if anything further is required.<br><br>
      Thank you for choosing Sia Immigration Solutions Inc.
    </div>';

    return sia_agreement_email_shell([
        'bannerEmoji'  => '&#9989;',
        'bannerBg'     => '#eafaf0',
        'bannerIconBg' => '#27ae60',
        'bannerTitle'  => 'Retainer Agreement Successfully Signed',
        'introHtml'    => $intro,
        'button'       => ['url' => $pdfUrl, 'label' => 'View / Download Signed PDF'],
        'consultant'   => $agreement['consultant_name'] ?? 'Sia Immigration',
    ]);
}

// 6. TEAM – AGREEMENT SIGNED (signed PDF attached)
function sia_send_agreement_team_signed_email(array $agreement): void
{
    $typeLabel = sia_agreement_type_label($agreement);

    $intro = '<div style="margin-top:18px;font-size:13.5px;color:#555;line-height:1.6;">
      The client has successfully signed the Retainer Agreement.
    </div>';

    $fields = [
        ['label' => 'Client', 'value' => $agreement['client_name'] ?? '—'],
        ['label' => 'Application', 'value' => $typeLabel],
        ['label' => 'SiaID', 'value' => (string) (int) $agreement['prospect_id']],
        ['label' => 'Signed On', 'value' => !empty($agreement['client_signed_at']) ? date('F j, Y g:i A', strtotime($agreement['client_signed_at'])) : '—'],
    ];

    $html = sia_agreement_email_shell([
        'bannerEmoji'  => '&#9989;',
        'bannerBg'     => '#eafaf0',
        'bannerIconBg' => '#27ae60',
        'bannerTitle'  => 'Retainer Agreement Signed',
        'introHtml'    => $intro,
        'fields'       => $fields,
        'outroHtml'    => 'The signed agreement is attached.',
        'consultant'   => $agreement['consultant_name'] ?? 'Sia Immigration',
    ]);

    sia_agreement_send(
        sia_team_emails(),
        sia_agreement_subject('Agreement Signed', $agreement, $typeLabel),
        $html,
        sia_agreement_pdf_disk_path($agreement)
    );
}

// Accounting notification — only after the agreement is successfully signed, the same
// Client – Agreement Signed email (identical content) with the signed PDF attached.
function sia_send_agreement_accounting_signed_email(array $agreement): void
{
    $typeLabel = sia_agreement_type_label($agreement);
    $pdfUrl = !empty($agreement['sign_token'])
        ? base_url('agreement/sign/' . $agreement['sign_token'] . '/pdf')
        : base_url();
    $html = sia_agreement_client_signed_html($agreement, $pdfUrl);

    sia_agreement_send(
        SIA_AGREEMENT_ACCOUNTING_EMAIL,
        sia_agreement_subject('Retainer Agreement Successfully Signed', $agreement, $typeLabel),
        $html,
        sia_agreement_pdf_disk_path($agreement)
    );
}

// 7. TEAM – AGREEMENT DECLINED
function sia_send_agreement_declined_email(array $agreement): void
{
    $typeLabel = sia_agreement_type_label($agreement);

    $intro = '<div style="margin-top:18px;font-size:13.5px;color:#555;line-height:1.6;">
      The client has declined the Retainer Agreement.
    </div>';

    $fields = [
        ['label' => 'Client', 'value' => $agreement['client_name'] ?? '—'],
        ['label' => 'Application', 'value' => $typeLabel],
        ['label' => 'SiaID', 'value' => (string) (int) $agreement['prospect_id']],
    ];
    $reason = trim((string) ($agreement['decline_reason'] ?? ''));
    if ($reason !== '') {
        $fields[] = ['label' => 'Reason', 'value' => $reason];
    }

    $html = sia_agreement_email_shell([
        'bannerEmoji'  => '&#10060;',
        'bannerBg'     => '#fdecec',
        'bannerIconBg' => '#e23b3b',
        'bannerTitle'  => 'Retainer Agreement Declined',
        'introHtml'    => $intro,
        'fields'       => $fields,
        'outroHtml'    => 'Please follow up with the client if required.',
        'consultant'   => $agreement['consultant_name'] ?? 'Sia Immigration',
    ]);

    sia_agreement_send(
        sia_team_emails(),
        sia_agreement_subject('Agreement Declined', $agreement, $typeLabel),
        $html
    );
}
