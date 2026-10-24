<?php

// Status-change emails for statuses that have no $stt=='id' block in their controller
// (new statuses, or controllers whose ids were copy-pasted from another type).
// Picks the mail by the status NAME, so the same status gets the same mail in every category.
// Call it after the application is saved: status_change_mail($id, $stt, $this->request);
function status_change_mail($app_id, $status_id, $request){
    $app = (new \App\Models\Client_application_model())->where('id',$app_id)->first();
    if(empty($app)) return;

    $pm = (new \App\Models\Prospect_model())->where('id',$app['siaportalid'])->first();
    if(empty($pm)) return;

    $st = (new \App\Models\Status_model())->where('id',$status_id)->first();
    if(empty($st)) return;

    $assign_to = $request->getPost('assign_to') ?: $app['assign_to'];
    $tm = $assign_to ? (new \App\Models\Team_model())->where('id',$assign_to)->first() : null;

    $iggd    = $pm['id'];
    $name    = $pm['heading'];
    $email   = $pm['email'];
    $cmobile = $pm['number'];
    $fname   = $tm['firstname'] ?? '';
    $tmobile = $tm['mobile_no'] ?? '';
    $status  = trim(preg_replace('/\s+/', ' ', $st['app_status']));
    $p = function($k) use ($request){ return $request->getPost($k); };

    switch(strtolower($status)){
        case 'assign team member':
            assign_team_member_to_team($iggd,$name,$fname);
            $sms = "Assigned Team Member  id-".$iggd." Name-".$fname."";
            assign_team_member($name,$fname,$tmobile,$cmobile,$email);
            break;

        case 'application in process':
        case 'profile in process':
            profile_in_process_team_mail($iggd,$name,$p('app_recv'),$p('exp_date_to_apply'));
            $sms = $status." id-".$iggd." Name-".$name."";
            profile_in_process_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);
            break;

        case 'profile created':
            status_update_team_mail($iggd,$name,$status);
            $sms = "Hi Team Profile Created id-".$iggd." -Name-".$name." ";
            profile_created_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);
            break;

        case 'invitation received':
            invitation_received_team_mail($iggd,$name,$p('invitation_date_tantative'),$p('invitation_date_final'));
            $sms = "Hi Team Invitation received-".$iggd." -Name-".$name." - Final Submission Date-".$p('invitation_date_final')." ";
            invitation_received_client_mail_msg($name,$fname,$tmobile,$cmobile,$email);
            break;

        case 'invitation withdrawn':
            invitation_withdrawn_team_mail($iggd,$name,$p('invit_withdrawn_reason'));
            $sms = "Hi Team Invitation withdrawn-".$iggd." -Name-".$name." - Reason-".$p('invit_withdrawn_reason')." ";
            invitation_withdrawn_client_mail_msg($name,$fname,$tmobile,$cmobile,$p('invit_withdrawn_reason'),$email);
            break;

        case 'documents awaiting for submission':
            documents_awaiting_for_submission_team_mail($iggd,$name,$p('doc_req_date'),$p('doc_req_on_date'));
            $sms = "Hi Team Documents Awaiting For Submission-".$iggd." -Name-".$name." ";
            documents_awaiting_for_submission_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);
            break;

        case 'application submitted':
            application_submitted_mail_team($iggd,$name,$p('fee'),$p('app_sub_date'),$p('mode_client_payment'),$p('date_of_payment_recive'),$p('confirm_with'),$p('amount'),$app['job_noc'] ?? '',$app['sub_confim'] ?? '');
            $sms = "Hi Team Application submitted-".$iggd." -Name-".$name." - Date Of Application Submitted-".$p('app_sub_date')." ";
            application_submitted_mail_to_client($name,$fname,$tmobile,$cmobile,$email);
            break;

        case 'adr bcpnp':
            Adr_BCPNP_team_mail($iggd,$name,$p('adr_deadline'),$p('adr_note'));
            $sms = "Hi Team ADR BCPNP-".$iggd." -Name-".$name." - Deadline-".$p('adr_deadline')." ";
            Adr_BCPNP($name,$fname,$tmobile,$cmobile,$email);
            break;

        case 'adr ircc':
            ADR_IRCC_team_mail($iggd,$name,$p('adr_submission_date'));
            $sms = "Hi Team ADR IRCC-".$iggd." -Name-".$name." ";
            ADR_IRCC($name,$fname,$tmobile,$cmobile,$email);
            break;

        case 'aor ircc':
            AOR_IRCC_team_mail($iggd,$name,$p('aor_app_number'),$p('aor_app_date'),$p('link'),$p('aor_online_detail'),$p('aor_linkreason'));
            $sms = "Hi Team AOR IRCC-".$iggd." -Name-".$name." ";
            AOR_IRCC($name,$fname,$tmobile,$cmobile,$email);
            break;

        case 'nomination approved':
            nomination_approved_team_mail($iggd,$name);
            $sms = "Hi Team Nomination Approved-".$iggd." -Name-".$name." ";
            nomination_approved($name,$fname,$tmobile,$cmobile,$email);
            break;

        case 'nomination refused':
            nomination_refused_team_mail($iggd,$name,$p('nomination_refused_reason'));
            $sms = "Hi Team Nomination refused-".$iggd." -Name-".$name." ";
            nomination_refused($name,$fname,$tmobile,$cmobile,$email);
            break;

        case 'federal application sent':
            federal_application_sent_team_mail($iggd,$name,$p('app_sent_date'));
            $sms = "Hi Team Federal Application Sent-".$iggd." -Name-".$name." ";
            federal_application_sent($name,$fname,$tmobile,$cmobile,$email);
            break;

        case 'biometric requested':
            biometric_requested_team_mail($iggd,$name,$p('date_bio_reciv'),$p('date_bio_sent'));
            $sms = "Hi Team Biometric Requested-".$iggd." -Name-".$name." ";
            biometric_requested_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);
            break;

        case 'biometric completed':
            biometric_completed_team_mail($iggd,$name,$p('date_bio_comp'),$p('bio_com_note'));
            $sms = "Hi Team Biometric Completed-".$iggd." -Name-".$name." ";
            biometric_completed_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);
            break;

        case 'interview/adr requested':
            interview_ADR_requested_team_mail($iggd,$name,$p('date_int_req_rec'),$p('date_int_sent_client'));
            $sms = "Hi Team Interview/ADR Requested-".$iggd." -Name-".$name." ";
            interview_ADR_requested_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);
            break;

        case 'interview/adr completed':
            interview_ADR_completed_team_mail($iggd,$name,$p('date_int_req_com'));
            $sms = "Hi Team Interview/ADR Completed-".$iggd." -Name-".$name." ";
            interview_ADR_completed_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);
            break;

        case 'passport requested':
        case 'passport request received':
            passport_requested_team_mail($iggd,$name,$p('pp_deadline'),$p('pp_tentative'));
            $sms = "Hi Team Passport Requested-".$iggd." -Name-".$name." ";
            passport_requested_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);
            break;

        case 'medical requested':
        case 'medical request received':
            medical_request_team_mail($iggd,$name,$p('date_for_medical'),$p('date_for_medical_ten'),$p('medical_note'));
            $sms = "Hi Team Medical Requested-".$iggd." -Name-".$name." ";
            medical_requested_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);
            break;

        case 'approved':
            approve_mail_team($iggd,$name,$p('approve_note'),$p('date_work_permit'),$app['approval_letter'] ?? '');
            $sms = "Hi Team Approved -".$iggd." -Name-".$name." note  -".$p('approve_note')." ";
            approve_mail_client($name,$fname,$cmobile,$email,$iggd);
            break;

        case 'refused':
            refuse_mail_team($iggd,$name,$p('refused_note'),$app['refusal_letter'] ?? '');
            $sms = "Hi Team Refused -".$iggd." -Name-".$name." note  -".$p('refused_note')." ";
            refused_mail_client($name,$fname,$cmobile,$email,$app['refusal_letter'] ?? '');
            break;

        default:
            // Ready to Apply, Profile submitted, Advertisement Renewed, ... : no dedicated template yet
            status_update_team_mail($iggd,$name,$status);
            $sms = "Hi Team ".$status." -".$iggd." -Name-".$name." ";
            status_update_client_mail($name,$email,$status);
            if($cmobile) send_sms("Dear ".$name." Your application status has been updated to: ".$status.". - Sia Immigration",array($cmobile));
    }

    send_sms($sms,array('12368661740'));
}

// Plain team notification, same recipients as the other status mails.
function status_update_team_mail($iggd,$name,$status){
    $From = "Sia Immigration";
    $emaill = session()->get('email');

    $message  = ' Hi Team <br>';
    $message .= esc($status).'<br>';
    $message .= 'ID : '.$iggd.'<br>';
    $message .= 'Name : '.esc($name).'<br>';
    $message .= 'Date : '.date('d/m/Y').'<br>';

    $email1 = \Config\Services::email();
    $email1->initialize(get_smtp_settings());
    $email1->setFrom($emaill, $From);
    $email1->setTo(['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com','consult@siaimmigration.com','care@siaimmigration.com']);
    $email1->setCC(['no-reply@siaimmigration.com']);
    $email1->setReplyTo($emaill);
    $email1->setSubject($status." id-".$iggd." Name-".$name);
    $email1->setMessage($message);
    $email1->send();
}

// Client notification with the same header/footer images as the other client mails.
function status_update_client_mail($name,$email,$status){
    if(empty($email)) return;
    $From = "Sia Immigration";
    $emaill = session()->get('email');

    $message = '<body style="background-color:#f1f1f1;">
  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1;padding:15px;">
  <tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px;margin:0px auto;background-color:#fff;color:#006495;">
      <tr>
        <td style="padding:0px 18px 9px;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png"></td>
        <td style="padding:0px 18px 9px;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="200" height="100" alt="right-top.png"></td>
      </tr>
      <tr><td colspan="2"><div style="border-top:1px dashed #999;margin:5px 0px;"></div></td></tr>
      <tr><td colspan="2" style="padding:18px 18px 0;">Dear '.esc($name).'</td></tr>
      <tr><td colspan="2" style="padding:12px 18px 0;">Greetings From Sia immigration.</td></tr>
      <tr><td colspan="2" style="padding:12px 18px 0;">We would like to inform you that your application status has been updated to: <strong>'.esc($status).'</strong>.</td></tr>
      <tr><td colspan="2" style="padding:40px 18px 0;">Best Regards,<br>Sia immigration Solutions Team</td></tr>
      <tr><td colspan="2" style="padding-top:30px;border-bottom:2px solid #ccc;"></td></tr>
      <tr><td colspan="2" align="center" style="padding-top:10px;"><a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a></td></tr>
      <tr><td colspan="2" align="center"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td></tr>
    </table>
  </td></tr>
  </table>
</body>';

    $email1 = \Config\Services::email();
    $email1->initialize(get_smtp_settings());
    $email1->setFrom($emaill, $From);
    $email1->setTo([$email]);
    $email1->setCC(['no-reply@siaimmigration.com']);
    $email1->setReplyTo($emaill);
    $email1->setSubject($status);
    $email1->setMessage($message);
    $email1->send();
}
