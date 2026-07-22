<?php

// Sends the "please review and sign" email for an Agreement. Unlike the app's other
// transactional emails, this one builds its own full HTML shell (header/hero/footer)
// rather than the shared sia_appt_html() wrapper, since it needs a richer layout.
function sia_send_agreement_email(array $agreement, string $signUrl): void
{
    $toEmail = trim($agreement['client_email'] ?? '');
    if ($toEmail === '') {
        log_message('error', '[SiaAgreementEmail] Skipped: agreement id ' . ($agreement['id'] ?? '?') . ' has no client_email.');
        return;
    }

    helper('smtp_helper');
    helper('appointment_email_helper');

    try {
        $emailSvc = \Config\Services::email();
        $config   = get_smtp_settings();
        $emailSvc->initialize($config);
        $emailSvc->setFrom('no-reply@siaimmigration.com', 'Sia Immigration Solutions Inc.');
        $emailSvc->setReplyTo('consult@siaimmigration.com', 'SIA Immigration');
        $emailSvc->setTo($toEmail);
        $emailSvc->setSubject('Please Review & Sign Your Service Agreement - Sia Immigration');
        $emailSvc->setMessage(sia_agreement_email_html($agreement, $signUrl));
        $emailSvc->send();
    } catch (\Exception $e) {
        log_message('error', '[SiaAgreementEmail] ' . $e->getMessage());
    }
}

// Builds the "Retainer Agreement Ready for Review" email body — table-based layout
// with inline styles throughout (email clients don't reliably support <style> blocks
// or flex/grid), real hosted logos, and emoji in place of icon images so nothing here
// depends on external image loading being enabled in the recipient's client.
function sia_agreement_email_html(array $agreement, string $signUrl): string
{
    $clientName  = esc($agreement['client_name'] ?? 'Client');
    $consultant  = esc($agreement['consultant_name'] ?? 'Sia Immigration');
    $currency    = esc($agreement['currency'] ?: 'CAD');
    $refNumber   = esc($agreement['reference_number'] ?? '—');
    $dateSent    = esc(date('F j, Y'));
    $signUrlAttr = esc($signUrl, 'attr');
    $signUrlText = esc($signUrl);
    $year        = date('Y');

    $TypeClient = new \App\Models\Type_client_model();
    $type       = $agreement['type_id'] ? ($TypeClient->getpost_id((int) $agreement['type_id'])[0] ?? null) : null;
    $typeLabel  = esc($type ? trim(($type['ct'] ?? '') . ' — ' . $type['type']) : 'Retainer Agreement');

    $money = function ($amount) use ($currency) {
        return '$' . number_format((float) $amount, 2) . ' ' . $currency;
    };

    $siaLogo  = esc(base_url('public/assets_client/img/sia_logo.png'), 'attr');
    $rcicLogo = esc(base_url('public/assets_client/img/rcic_logo.png'), 'attr');

    $detailCard = function ($emoji, $labelColor, $label, $value) {
        return '<td width="25%" align="center" valign="top" style="border:1px solid #eceef1;border-radius:8px;padding:14px 6px;">'
            . '<div style="font-size:20px;line-height:1;">' . $emoji . '</div>'
            . '<div style="font-size:10.5px;font-weight:700;color:' . $labelColor . ';margin-top:8px;">' . $label . '</div>'
            . '<div style="font-size:12.5px;font-weight:700;color:#1f2430;margin-top:2px;">' . $value . '</div>'
            . '</td>';
    };

    return '<!DOCTYPE html><html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"></head>
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

  <tr><td style="background:#fdf3e3;padding:28px 30px;">
    <table role="presentation" cellpadding="0" cellspacing="0"><tr>
      <td valign="top">
        <table role="presentation" width="48" cellpadding="0" cellspacing="0" style="background:#f5a623;border-radius:50%;"><tr>
          <td align="center" valign="middle" style="width:48px;height:48px;font-size:22px;">&#128221;</td>
        </tr></table>
      </td>
      <td valign="middle" style="padding-left:14px;font-size:21px;font-weight:800;color:#1f2430;line-height:1.25;">
        Retainer Agreement Ready for Review
      </td>
    </tr></table>
    <div style="margin-top:18px;font-size:15px;font-weight:700;color:#1f2430;">Hello ' . $clientName . ',</div>
    <div style="margin-top:8px;font-size:13.5px;color:#555;line-height:1.6;">
      Your Retainer Agreement for immigration services has been prepared and is ready for your review and electronic signature.
    </div>
  </td></tr>

  <tr><td style="padding:22px 30px 0;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0"><tr>
      <td width="49%" style="border:1px solid #eceef1;border-radius:8px;padding:12px 14px;">
        <table role="presentation" cellpadding="0" cellspacing="0"><tr>
          <td style="font-size:15px;color:#e23b3b;padding-right:10px;">#</td>
          <td>
            <div style="font-size:10.5px;color:#9aa0aa;">Reference No.</div>
            <div style="font-size:13px;font-weight:700;color:#1f2430;">' . $refNumber . '</div>
          </td>
        </tr></table>
      </td>
      <td width="2%">&nbsp;</td>
      <td width="49%" style="border:1px solid #eceef1;border-radius:8px;padding:12px 14px;">
        <table role="presentation" cellpadding="0" cellspacing="0"><tr>
          <td style="font-size:15px;color:#e23b3b;padding-right:10px;">&#128197;</td>
          <td>
            <div style="font-size:10.5px;color:#9aa0aa;">Date Sent</div>
            <div style="font-size:13px;font-weight:700;color:#1f2430;">' . $dateSent . '</div>
          </td>
        </tr></table>
      </td>
    </tr></table>
  </td></tr>

  <tr><td style="padding:22px 30px 0;">
    <div style="font-size:13.5px;font-weight:700;color:#1f2430;margin-bottom:10px;">Agreement Details</div>
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0"><tr>
      ' . $detailCard('&#128188;', '#27ae60', 'Application Type', $typeLabel) . '
      <td width="2%">&nbsp;</td>
      ' . $detailCard('&#128176;', '#e08e2b', 'Service Fee', $money($agreement['service_fee'] ?? 0)) . '
      <td width="2%">&nbsp;</td>
      ' . $detailCard('&#127974;', '#3498db', 'Government Fee', $money($agreement['government_fee'] ?? 0)) . '
      <td width="2%">&nbsp;</td>
      ' . $detailCard('&#128179;', '#e23b3b', 'Total Amount', $money($agreement['total_amount'] ?? 0)) . '
    </tr></table>
  </td></tr>

  <tr><td style="padding:22px 30px 0;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#eefaf1;border-radius:8px;"><tr>
      <td style="padding:14px 16px;">
        <span style="font-size:14px;font-weight:700;color:#1e7e42;">&#128737;&#65039; Secure Electronic Signature</span>
        <div style="font-size:12px;color:#4c5a53;margin-top:5px;line-height:1.5;">
          Your eSignature is secure, legally valid and protected. Once you review and sign the agreement, you will receive a fully executed copy via email.
        </div>
      </td>
    </tr></table>
  </td></tr>

  <tr><td align="center" style="padding:26px 30px 4px;">
    <div style="font-size:13.5px;font-weight:700;color:#1f2430;margin-bottom:14px;">Please review and eSign your retainer agreement.</div>
    <table role="presentation" cellpadding="0" cellspacing="0"><tr><td style="background:#4c3ff5;border-radius:8px;">
      <a href="' . $signUrlAttr . '" target="_blank" style="display:inline-block;padding:13px 28px;font-size:14.5px;font-weight:700;color:#ffffff;text-decoration:none;">&#9999;&#65039; Review &amp; eSign Agreement</a>
    </td></tr></table>
  </td></tr>
  <tr><td align="center" style="padding:12px 30px 0;font-size:11.5px;color:#9aa0aa;">
    If the button does not work, copy and paste this link into your browser:<br>
    <a href="' . $signUrlAttr . '" style="color:#4c3ff5;word-break:break-all;">' . $signUrlText . '</a>
  </td></tr>

  <tr><td style="padding:24px 30px 0;">
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
}

// Sends the "you've signed, here's your PDF" confirmation email, once submit() finalizes an agreement.
function sia_send_signed_agreement_email(array $agreement, string $pdfUrl): void
{
    $toEmail = trim($agreement['client_email'] ?? '');
    if ($toEmail === '') {
        log_message('error', '[SiaAgreementEmail] Skipped signed-copy email: agreement id ' . ($agreement['id'] ?? '?') . ' has no client_email.');
        return;
    }

    helper('smtp_helper');
    helper('appointment_email_helper');

    $clientName = esc($agreement['client_name'] ?? 'Client');
    $consultant = esc($agreement['consultant_name'] ?? 'Sia Immigration');

    $btn = 'display:inline-block;padding:12px 26px;border-radius:4px;font-family:Arial,sans-serif;font-size:14px;text-decoration:none;font-weight:700;background:#27ae60;color:#fff;';
    $body = '
      <p>Dear ' . $clientName . ',</p>
      <p>Thank you — your service agreement with Sia Immigration Solutions Inc. has been signed successfully. You can view or download your signed copy below.</p>
      <table cellpadding="0" cellspacing="0" style="margin:18px 0;"><tr><td>
        <a href="' . esc($pdfUrl, 'attr') . '" target="_blank" style="' . $btn . '">View / Download Signed PDF</a>
      </td></tr></table>
      <p>If the button does not work, copy and paste this link into your browser:<br>
      <a href="' . esc($pdfUrl, 'attr') . '">' . esc($pdfUrl) . '</a></p>
      <p>Regards,<br>' . $consultant . '<br>Sia Immigration Solutions Inc.</p>
    ';

    try {
        $emailSvc = \Config\Services::email();
        $config   = get_smtp_settings();
        $emailSvc->initialize($config);
        $emailSvc->setFrom('no-reply@siaimmigration.com', 'Sia Immigration Solutions Inc.');
        $emailSvc->setReplyTo('consult@siaimmigration.com', 'SIA Immigration');
        $emailSvc->setTo($toEmail);
        $emailSvc->setSubject('Your Signed Service Agreement - Sia Immigration');
        $emailSvc->setMessage(sia_appt_html($body));
        $emailSvc->send();
    } catch (\Exception $e) {
        log_message('error', '[SiaAgreementEmail] ' . $e->getMessage());
    }
}
