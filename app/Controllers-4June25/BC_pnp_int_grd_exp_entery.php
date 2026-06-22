<?php 
namespace App\Controllers;
use App\Models\Siaportal_model;
use App\Models\Agent_model;
use App\Models\User_model;
use App\Models\Emp_model;
use App\Models\Lmia_job_model;
use App\Models\Imm_type_model;
use App\Models\Type_immg_model;
use App\Models\Team_model;
use App\Models\Prospect_model;
use App\Models\Category_model;
use App\Models\Type_client_model;
use App\Models\Status_model;
use App\Models\Voice_msg_model;
use App\Models\New_form_model;
use App\Models\Adv_model;
use App\Models\Refer_model;
use App\Models\Client_document_model;
use App\Models\Account_model;

use App\Models\Client_application_model;
use codeigniter\controller;
use CodeIgniter\I18n\Time;
use CodeIgniter\HTTP\Files\UploadedFile;



class BC_pnp_int_grd_exp_entery extends BaseController
{


 public function edit_bc_pnp_int_grd_exp_entery($category,$id,$sid){

if ($this->request->getMethod()=='post'){



   if($img = $this->request->getFile('upload_doc'))
        {
        
            if ($img->isValid() && ! $img->hasMoved())
            {
                $newName = $img->getRandomName();

                $img->move('./assets/resume', $newName);                
 $link='https://canada.siaimmigration.com/assets/resume/'.$newName;
}else{
$newName=$this->request->getPost('upload_doc_old');
$link='';

}

}

 if($img1 = $this->request->getFile('approval_doc'))
        {
        //  echo"hih";
          //exit();
            if ($img1->isValid() && ! $img1->hasMoved())
            {
                $approval_doc = $img1->getRandomName();

                $img1->move('./assets/resume', $approval_doc);                
 $approval_doc_link='https://canada.siaimmigration.com/assets/resume/'.$approval_doc;
//exit();
}else{
$approval_doc=$this->request->getPost('approval_doc_old');
$approval_doc_link='';

}

}

//courier_receipt_slip

 if($img2 = $this->request->getFile('courier_receipt_slip'))
        {
        //  echo"hih";
          //exit();
            if ($img2->isValid() && ! $img2->hasMoved())
            {
                $courier_receipt_slip = $img2->getRandomName();

                $img2->move('./assets/resume', $courier_receipt_slip);                
 $approval_doc_link='https://canada.siaimmigration.com/assets/resume/'.$courier_receipt_slip;
//exit();
}else{
$courier_receipt_slip=$this->request->getPost('courier_receipt_slip_old');
$courier_receipt_slip_link='';

}

}

//echo $newName;
//exit();

  $voice_mm=$this->request->getPost('news_image1');

  if($voice_mm==""){
    $voice=$this->request->getPost('news_image1_old');


  }
    else{
      $vom = new Voice_msg_model();
      $dd=date('Y-m-d H:i:s' );
      $insert=$vom->insert([
        'client_application_id'=>$id,
        'voice_msg'=>$this->request->getPost('news_image1'),
        'insert_on' => $dd  
        ]);
  $voice=$this->request->getPost('news_image1');

    }


  // echo $aa= $this->request->getPost('exp_date_to_apply_exp');
  // exit();
  $data = [
  
  'voice_msg'=>$voice,



'exp_date_to_apply_exp'=>$this->request->getPost('exp_date_to_apply_exp'),
 'assign_to_exp'=>$this->request->getPost('assign_to_exp'),
 'date_of_creation_exp'=>$this->request->getPost('date_of_creation_exp'),
 'job_noc_exp'=>$this->request->getPost('job_noc_exp'),
 'app_number_exp'=>$this->request->getPost('app_number_exp'),
 'reg_score_exp'=>$this->request->getPost('reg_score_exp'),
 'log_in_info_exp'=>$this->request->getPost('log_in_info_exp'),

 'app_recv_exp'=>$this->request->getPost('app_recv_exp'),
 'exp_date_to_apply_expp'=>$this->request->getPost('exp_date_to_apply_expp'),
 'fee_exp'=>$this->request->getPost('fee_exp'),
 'mode_client_payment_exp'=>$this->request->getPost('mode_client_payment_exp'),
 'confirm_with_exp'=>$this->request->getPost('confirm_with_exp'),
 'date_of_payment_recive_exp'=>$this->request->getPost('date_of_payment_recive_exp'),
 'amount_exp'=>$this->request->getPost('amount_exp'),
 'client_card_note_exp'=>$this->request->getPost('client_card_note_exp'),
 'adr_deadline_exp'=>$this->request->getPost('adr_deadline_exp'),
 'adr_note_exp'=>$this->request->getPost('adr_note_exp'),

  'assign_to_exp'=>$this->request->getPost('assign_to_exp'),




    'application_status'=>$this->request->getPost('application_status'),

    'exp_date_to_apply'=>$this->request->getPost('exp_date_to_apply'),
    'assign_to'=>$this->request->getPost('assign_to'),
    'application_status_update'=>date('Y-m-d' ),

  'date_of_creation'=>$this->request->getPost('date_of_creation'),
  'job_noc'=>$this->request->getPost('job_noc'),
  'application_number'=>$this->request->getPost('app_number'),
   'free_text'=>$this->request->getPost('free_text'),
  'reg_score'=>$this->request->getPost('reg_score'),
  'log_in_info_pnp'=>$this->request->getPost('log_in_info'),  
  'upload_doc'=>$newName,

  'invitation_date_final'=>$this->request->getPost('invitation_date_final'),  
  'invitation_date_tantative'=>$this->request->getPost('invitation_date_tantative'),  
  'invit_withdrawn_reason'=>$this->request->getPost('invit_withdrawn_reason'),

  'app_sub_date'=>$this->request->getPost('app_sub_date'),  
  'fee'=>$this->request->getPost('fee'),  
  'mode_client_payment'=>$this->request->getPost('mode_client_payment'),  
  'confirm_with'=>$this->request->getPost('confirm_with'),  
  'date_of_payment_recive'=>$this->request->getPost('date_of_payment_recive'),  
  'amount'=>$this->request->getPost('amount'),  
  'client_card_note'=>$this->request->getPost('client_card_note'),  
  'adr_deadline'=>$this->request->getPost('adr_deadline'),  
  'adr_note'=>$this->request->getPost('adr_note'),  
  'approval_doc'=>$approval_doc,  
  'nomination_refused_reason'=>$this->request->getPost('nomination_refused_reason'),  
  'app_sent_date'=>$this->request->getPost('app_sent_date'),  
  'courier_receipt_slip'=>$courier_receipt_slip,
  'aor_app_number'=>$this->request->getPost('aor_app_number'),  
  'aor_app_date'=>$this->request->getPost('aor_app_date'),  
  'link'=>$this->request->getPost('link'),    
  'aor_online_detail'=>$this->request->getPost('aor_online_detail'),  
  'aor_linkreason'=>$this->request->getPost('aor_linkreason'),  
  'adr_submission_date'=>$this->request->getPost('adr_submission_date'),  
  'date_for_medical'=>$this->request->getPost('date_for_medical'),  
  'date_for_medical_ten'=>$this->request->getPost('date_for_medical_ten'),  
  'medical_note'=>$this->request->getPost('medical_note'),  
  'medical_submit'=>$this->request->getPost('medical_submit'),
  'medical_sub_note'=>$this->request->getPost('medical_sub_note'),  
  'pp_deadline'=>$this->request->getPost('pp_deadline'),  
  'pp_tentative'=>$this->request->getPost('pp_tentative'),  
  'approve_note'=>$this->request->getPost('approve_note'),  
  'refused_note'=>$this->request->getPost('refused_note'),  

  

  'update_on'=>date( 'Y-m-d H:i:s' )
];

$cam = new Client_application_model(); 
$updatee=$cam->update($id, $data);
if($updatee){

    ///account start
  
$app_detail = new Client_application_model(); 
 $data['app_detail'] = $app_detail->get_detail($id);

$app_id= $data['app_detail'][0]['id'];
$app_sid= $data['app_detail'][0]['siaportalid'];
$app_ct= $data['app_detail'][0]['category'];
$app_ty= $data['app_detail'][0]['type'];
$app_st= $data['app_detail'][0]['application_status'];


  $ACC = new Account_model(); 
    //$data['team'] = $Team->getpost();
    $data['acc'] = $ACC->get_account($app_sid,$app_ct,$app_ty);

   // print_r($data['acc'] );
   // exit();

       


    if(!empty($data['acc'])){


$idd =$data['acc']['0']['id'];
     
  $data = [
  'app_id'=>$app_id,
   'siaportal_id'=>$app_sid,
  'category'=>$app_ct,
  'type'=>$app_ty,
  'application_status'=>$app_st,

  'retainer_app'=>$this->request->getPost('retainer_app'),
  'govt_fee'=>$this->request->getPost('govt_fee'),

  'pay_plan'=>$this->request->getPost('pay_plan'),
  'est_app'=>$this->request->getPost('est_app'),
  'est_num'=>$this->request->getPost('est_num'),
  'tolat_pay_plan'=>$this->request->getPost('tolat_pay_plan'),
  'tolat_pay_amount'=>$this->request->getPost('tolat_pay_amount'),
  'pay_one'=>$this->request->getPost('pay_one'),
  'pay_one_note'=>$this->request->getPost('pay_one_note'),
  'pay_one_amount'=>$this->request->getPost('pay_one_amount'),
  'pay_two'=>$this->request->getPost('pay_two'),
  'pay_two_note'=>$this->request->getPost('pay_two_note'),
  'pay_two_amount'=>$this->request->getPost('pay_two_amount'),
  'pay_three'=>$this->request->getPost('pay_three'),
  'pay_three_note'=>$this->request->getPost('pay_three_note'),
  'pay_three_amount'=>$this->request->getPost('pay_three_amount'),
  'pay_four'=>$this->request->getPost('pay_four'),
  'pay_four_note'=>$this->request->getPost('pay_four_note'),
  'pay_four_amount'=>$this->request->getPost('pay_four_amount'),
  'pay_five'=>$this->request->getPost('pay_five'),
  'pay_five_note'=>$this->request->getPost('pay_five_note'),
  'pay_five_amount'=>$this->request->getPost('pay_five_amount'),
  'pay_sex'=>$this->request->getPost('pay_sex'),
  'pay_sex_note'=>$this->request->getPost('pay_sex_note'),
  'pay_six_amount'=>$this->request->getPost('pay_six_amount'),



  
  'update_on'=>date( 'Y-m-d H:i:s' )
];

$ACO = new Account_model(); 
$updatee=$ACO->update($idd, $data);

     
    }else{
      $ACC = new Account_model(); 

$insert= $ACC->insert([

   'app_id'=>$app_id,

  'siaportal_id'=>$app_sid,
  'category'=>$app_ct,
  'type'=>$app_ty,
  'application_status'=>$app_st,

  'retainer_app'=>$this->request->getPost('retainer_app'),
  'govt_fee'=>$this->request->getPost('govt_fee'),


  'pay_plan'=>$this->request->getPost('pay_plan'),
  'est_app'=>$this->request->getPost('est_app'),
  'est_num'=>$this->request->getPost('est_num'),
  'tolat_pay_plan'=>$this->request->getPost('tolat_pay_plan'),
  'tolat_pay_amount'=>$this->request->getPost('tolat_pay_amount'),
  'pay_one'=>$this->request->getPost('pay_one'),
  'pay_one_note'=>$this->request->getPost('pay_one_note'),
  'pay_one_amount'=>$this->request->getPost('pay_one_amount'),
  'pay_two'=>$this->request->getPost('pay_two'),
  'pay_two_note'=>$this->request->getPost('pay_two_note'),
  'pay_two_amount'=>$this->request->getPost('pay_two_amount'),
  'pay_three'=>$this->request->getPost('pay_three'),
  'pay_three_note'=>$this->request->getPost('pay_three_note'),
  'pay_three_amount'=>$this->request->getPost('pay_three_amount'),
  'pay_four'=>$this->request->getPost('pay_four'),
  'pay_four_note'=>$this->request->getPost('pay_four_note'),
  'pay_four_amount'=>$this->request->getPost('pay_four_amount'),
  'pay_five'=>$this->request->getPost('pay_five'),
  'pay_five_note'=>$this->request->getPost('pay_five_note'),
  'pay_five_amount'=>$this->request->getPost('pay_five_amount'),
  'pay_six'=>$this->request->getPost('pay_six'),
  'pay_sex_note'=>$this->request->getPost('pay_sex_note'),
  'pay_six_amount'=>$this->request->getPost('pay_six_amount'),
  

  
  'insert_on' => date( 'Y-m-d H:i:s' )
  
]);

 $siaaa = $insert;

    }
  ///account end

$stt=$this->request->getPost('application_status');




if($stt=='523') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $cmobile= $data['pm']['0']['number'];
                          $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply_exp');
    $assign_to = $this->request->getPost('assign_to_exp');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];

                         $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  

$app_recv="";
profile_in_process_team_mail($iggd,$name,$app_recv,$exp_date_to_apply);
$message1="Profile in Process id-".$iggd." Name-".$name."";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 $pcount= count($phone);
//exit();

send_sms($message1,$phone);

//$this->profile_in_process($name,$fname,$tmobile,$cmobile,$email);
profile_in_process_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }

if($stt=='524') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];                       
            $cmobile= $data['pm']['0']['number'];
            $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply_exp');
    $assign_to = $this->request->getPost('assign_to_exp');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                          $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  $date_of_creation=$this->request->getPost('date_of_creation_exp');
  $job_noc=$this->request->getPost('job_noc_exp');
  $application_number=$this->request->getPost('app_number_exp');
  $reg_score= $this->request->getPost('reg_score_exp'); 
  $log_in_info_pnp = $this->request->getPost('log_in_info_exp');  
  $upload_doc =$newName;

  $From="Sia Immigration";
           $ee = session()->get('email');
           $emaill=$ee;

          $subject  = "Profile Created id-".$iggd." Name-".$name."";
          //$subject  = "Profile in Process"; 
          //$subject  = "Lended  Application Fee";            
          $headers  = "MIME-Version: 1.0\r\n";
          $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";          
         // $headers.="From: \"".$From."\"<".$emaill."> \r\n";
           $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
          $message =' Hi Team <br>';
          $message .= 'Profile Created<br>';
          $message .= 'Date : ' .date('d/m/Y').'<br>';
          $message .= 'Date of Creation : ' .$date_of_creation.'<br>';
          $message .= 'Application Number : ' .$application_number.'<br>';  
          $message .= 'Registration Score : ' .$reg_score.'<br>'; 
          $message .= 'Log In Info PNP : ' .$log_in_info_pnp.'<br>';  
          $message .= 'Job NOC : ' .$job_noc.'<br>';
          $message .= 'Document :-: https://canada.siaimmigration.com/assets/resume/'.$newName.'<br>';  

  
  @mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Profile Created id-".$iggd." -Name-".$name." - Date of Creation-".$date_of_creation." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 $pcount= count($phone);
//exit();

send_sms($message1,$phone);
//$this->profile_created($name,$fname,$tmobile,$cmobile,$email);
profile_created_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }
///////




if($stt=='521') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $cmobile= $data['pm']['0']['number'];
                          $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];

                         $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  

$app_recv="";
profile_in_process_team_mail($iggd,$name,$app_recv,$exp_date_to_apply);
$message1="Profile in Process id-".$iggd." Name-".$name."";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 $pcount= count($phone);
//exit();

send_sms($message1,$phone);

//$this->profile_in_process($name,$fname,$tmobile,$cmobile,$email);
profile_in_process_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }

if($stt=='522') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];                       
            $cmobile= $data['pm']['0']['number'];
            $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                          $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  $date_of_creation=$this->request->getPost('date_of_creation');
  $job_noc=$this->request->getPost('job_noc');
  $application_number=$this->request->getPost('app_number');
  $reg_score= $this->request->getPost('reg_score'); 
  $log_in_info_pnp = $this->request->getPost('log_in_info');  
  $upload_doc =$newName;

  $From="Sia Immigration";
           $ee = session()->get('email');
           $emaill=$ee;

          $subject  = "Profile Created id-".$iggd." Name-".$name."";
          //$subject  = "Profile in Process"; 
          //$subject  = "Lended  Application Fee";            
          $headers  = "MIME-Version: 1.0\r\n";
          $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";          
        //  $headers.="From: \"".$From."\"<".$emaill."> \r\n";

           $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
          $message =' Hi Team <br>';
          $message .= 'Profile Created<br>';
          $message .= 'Date : ' .date('d/m/Y').'<br>';
          $message .= 'Date of Creation : ' .$date_of_creation.'<br>';
          $message .= 'Application Number : ' .$application_number.'<br>';  
          $message .= 'Registration Score : ' .$reg_score.'<br>'; 
          $message .= 'Log In Info PNP : ' .$log_in_info_pnp.'<br>';  
          $message .= 'Job NOC : ' .$job_noc.'<br>';
          $message .= 'Document :-: https://canada.siaimmigration.com/assets/resume/'.$newName.'<br>';  

  
  @mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Profile Created id-".$iggd." -Name-".$name." - Date of Creation-".$date_of_creation." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');

$phone = array('12368661740');

 $pcount= count($phone);
//exit();

send_sms($message1,$phone);
//$this->profile_created($name,$fname,$tmobile,$cmobile,$email);
profile_created_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }
 if($stt=='525') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                        $cmobile= $data['pm']['0']['number'];
                        $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                         $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  $invitation_date_final = $this->request->getPost('invitation_date_final');  
  $invitation_date_tantative = $this->request->getPost('invitation_date_tantative');  
invitation_received_team_mail($iggd,$name,$invitation_date_tantative,$invitation_date_final);

$message1="Hi Team Invitation received-".$iggd." -Name-".$name." - Final Submission Date-".$invitation_date_final." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');

$phone = array('12368661740');

send_sms($message1,$phone);
invitation_received_client_mail_msg($name,$fname,$tmobile,$cmobile,$email);

 }

  if($stt=='526') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                        $cmobile= $data['pm']['0']['number'];
                        $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                          $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  $invit_withdrawn_reason=$this->request->getPost('invit_withdrawn_reason');  

  
  
invitation_withdrawn_team_mail($iggd,$name,$invit_withdrawn_reason);

$message1="Hi Team Invitation withdrawn-".$iggd." -Name-".$name." - Reason-".$invit_withdrawn_reason." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');

$phone = array('12368661740');

send_sms($message1,$phone);

invitation_withdrawn_client_mail_msg($name,$fname,$tmobile,$cmobile,$invit_withdrawn_reason,$email);
 }
if($stt=='527') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $cmobile= $data['pm']['0']['number'];
                          $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
$app_recv = $this->request->getPost('app_recv');
//$study_permit_exp = $this->request->getPost('study_permit_exp');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];

                         $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  

  profile_in_process_team_mail($iggd,$name,$app_recv,$exp_date_to_apply);


$message1="Profile in Process id-".$iggd." Name-".$name."";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');

$phone = array('12368661740');

send_sms($message1,$phone);



profile_in_process_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }




  if($stt=='528') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];

$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  $app_sub_date=$this->request->getPost('app_sub_date');  
  $fee =$this->request->getPost('fee'); 
  $mode_client_payment= $this->request->getPost('mode_client_payment'); 
  $confirm_with =$this->request->getPost('confirm_with'); 
  $date_of_payment_recive= $this->request->getPost('date_of_payment_recive'); 
  $amount = $this->request->getPost('amount');  
  $client_card_note = $this->request->getPost('client_card_note');  

 $l1="";
 $l2="";

application_submitted_mail_team($iggd,$name,$fee,$app_sub_date,$mode_client_payment,$date_of_payment_recive,$confirm_with,$amount,$l1,$l2);
$message1="Hi Team Application submitted-".$iggd." -Name-".$name." - Date Of Application Submitted-".$app_sub_date." ";

//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
application_submitted_mail_to_client($name,$fname,$tmobile,$cmobile,$email);

 }

 if($stt=='529') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                       $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

 $adr_deadline = $this->request->getPost('adr_deadline'); 
  $adr_note = $this->request->getPost('adr_note');  


Adr_BCPNP_team_mail($iggd,$name,$adr_deadline,$adr_note);
$message1="Hi Team Adr BCPNP -".$iggd." -Name-".$name." - Adr Deadline-".$adr_deadline." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);


Adr_BCPNP($name,$fname,$tmobile,$cmobile,$email);
 }

 if($stt=='530') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                       $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();

                        $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];

 $adr_deadline = $this->request->getPost('adr_deadline'); 
  $adr_note = $this->request->getPost('adr_note');  

  nomination_approved_team_mail($iggd,$name);


$message1="Hi Team Nomination Approved -".$iggd." -Name-".$name."  ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');

$phone = array('12368661740');

 send_sms($message1,$phone);
nomination_approved($name,$fname,$tmobile,$cmobile,$email);


 }
  if($stt=='531') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $$name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                       $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

$nomination_refused_reason=$this->request->getPost('nomination_refused_reason');  

nomination_refused_team_mail($iggd,$name,$nomination_refused_reason);


$message1="Hi Team Nomination refused -".$iggd." -Name-".$name." Reason -".$nomination_refused_reason." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
nomination_refused($name,$fname,$tmobile,$cmobile,$email);

 }


  if($stt=='532') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                      
                         $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

$app_sent_date=$this->request->getPost('app_sent_date');  

federal_application_sent_team_mail($iggd,$name,$app_sent_date);

$message1="Hi Team Federal Application Sent -".$iggd." -Name-".$name." Application Sent Date -".$app_sent_date." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
federal_application_sent($name,$fname,$tmobile,$cmobile,$email);

 }

if($stt=='533') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $cmobile= $data['pm']['0']['number'];
                          $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply_expp');
$app_recv = $this->request->getPost('app_recv_exp');
//$study_permit_exp = $this->request->getPost('study_permit_exp');
    $assign_to = $this->request->getPost('assign_to_exp');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];

                         $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  

  profile_in_process_team_mail($iggd,$name,$app_recv,$exp_date_to_apply);


$message1="Profile in Process id-".$iggd." Name-".$name."";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');

$phone = array('12368661740');
send_sms($message1,$phone);



profile_in_process_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }




  if($stt=='534') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];

$exp_date_to_apply = $this->request->getPost('exp_date_to_apply_expp');
    $assign_to = $this->request->getPost('assign_to_exp');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  $app_sub_date=$this->request->getPost('app_sub_date_exp');  
  $fee =$this->request->getPost('fee_exp'); 
  $mode_client_payment= $this->request->getPost('mode_client_payment_exp'); 
  $confirm_with =$this->request->getPost('confirm_with_exp'); 
  $date_of_payment_recive= $this->request->getPost('date_of_payment_recive_exp'); 
  $amount = $this->request->getPost('amount_exp');  
  $client_card_note = $this->request->getPost('client_card_note_exp');  

 $l1="";
 $l2="";

application_submitted_mail_team($iggd,$name,$fee,$app_sub_date,$mode_client_payment,$date_of_payment_recive,$confirm_with,$amount,$l1,$l2);
$message1="Hi Team Application submitted-".$iggd." -Name-".$name." - Date Of Application Submitted-".$app_sub_date." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
application_submitted_mail_to_client($name,$fname,$tmobile,$cmobile,$email);

 }

 if($stt=='535') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                       $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

 $adr_deadline = $this->request->getPost('adr_deadline_exp'); 
  $adr_note = $this->request->getPost('adr_note_exp');  


Adr_BCPNP_team_mail($iggd,$name,$adr_deadline,$adr_note);
$message1="Hi Team Adr BCPNP -".$iggd." -Name-".$name." - Adr Deadline-".$adr_deadline." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);


Adr_BCPNP($name,$fname,$tmobile,$cmobile,$email);
 }



 if($stt=='536') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

    $approve_note=$this->request->getPost('approve_note');
  $date_work_permit="";
  $approval_letter="";

approve_mail_team($iggd,$name,$approve_note,$date_work_permit,$approval_letter);

$message1="Hi Team Approved -".$iggd." -Name-".$name." note  -".$approve_note." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

send_sms($message1,$phone);
approve_mail_client($name,$fname,$tmobile,$cmobile,$email);

 }
if($stt=='537') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

    $refused_note=$this->request->getPost('refused_note');
  $refusal_letter="";

refuse_mail_team($iggd,$name,$refused_note,$refusal_letter);
$message1="Hi Team Refused -".$iggd." -Name-".$name." note  -".$refused_note." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
refused_mail_client($name,$fname,$tmobile,$cmobile,$email);

 }













if($stt=='2') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $cmobile= $data['pm']['0']['number'];
                          $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];

                         $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  

$app_recv="";
profile_in_process_team_mail($iggd,$name,$app_recv,$exp_date_to_apply);
$message1="Profile in Process id-".$iggd." Name-".$name."";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 $pcount= count($phone);
//exit();

send_sms($message1,$phone);

//$this->profile_in_process($name,$fname,$tmobile,$cmobile,$email);
profile_in_process_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }

if($stt=='3') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];                       
            $cmobile= $data['pm']['0']['number'];
            $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                          $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  $date_of_creation=$this->request->getPost('date_of_creation');
  $job_noc=$this->request->getPost('job_noc');
  $application_number=$this->request->getPost('app_number');
  $reg_score= $this->request->getPost('reg_score'); 
  $log_in_info_pnp = $this->request->getPost('log_in_info');  
  $upload_doc =$newName;

  $From="Sia Immigration";
           $emaill="mkj@siaimmigration.com";
          $subject  = "Profile Created id-".$iggd." Name-".$name."";
          //$subject  = "Profile in Process"; 
          //$subject  = "Lended  Application Fee";            
          $headers  = "MIME-Version: 1.0\r\n";
          $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";          
          //$headers.="From: \"".$From."\"<".$emaill."> \r\n";
           $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
          $message =' Hi Team <br>';
          $message .= 'Profile Created<br>';
          $message .= 'Date : ' .date('d/m/Y').'<br>';
          $message .= 'Date of Creation : ' .$date_of_creation.'<br>';
          $message .= 'Application Number : ' .$application_number.'<br>';  
          $message .= 'Registration Score : ' .$reg_score.'<br>'; 
          $message .= 'Log In Info PNP : ' .$log_in_info_pnp.'<br>';  
          $message .= 'Job NOC : ' .$job_noc.'<br>';
          $message .= 'Document :-: https://canada.siaimmigration.com/assets/resume/'.$newName.'<br>';  

  
  @mail('ds@siaimmigration.com,mj@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Profile Created id-".$iggd." -Name-".$name." - Date of Creation-".$date_of_creation." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 $pcount= count($phone);
//exit();

send_sms($message1,$phone);
//$this->profile_created($name,$fname,$tmobile,$cmobile,$email);
profile_created_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }
 if($stt=='4') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                        $cmobile= $data['pm']['0']['number'];
                        $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                         $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  $invitation_date_final = $this->request->getPost('invitation_date_final');  
  $invitation_date_tantative = $this->request->getPost('invitation_date_tantative');  
invitation_received_team_mail($iggd,$name,$invitation_date_tantative,$invitation_date_final);

$message1="Hi Team Invitation received-".$iggd." -Name-".$name." - Final Submission Date-".$invitation_date_final." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

send_sms($message1,$phone);
invitation_received_client_mail_msg($name,$fname,$tmobile,$cmobile,$email);

 }

  if($stt=='310') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                        $cmobile= $data['pm']['0']['number'];
                        $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                          $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  $invit_withdrawn_reason=$this->request->getPost('invit_withdrawn_reason');  

  
invitation_withdrawn_team_mail($iggd,$name,$invit_withdrawn_reason);

$message1="Hi Team Invitation withdrawn-".$iggd." -Name-".$name." - Reason-".$invit_withdrawn_reason." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

send_sms($message1,$phone);

invitation_withdrawn_client_mail_msg($name,$fname,$tmobile,$cmobile,$invit_withdrawn_reason,$email);
 }
  if($stt=='5') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];

$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  $app_sub_date=$this->request->getPost('app_sub_date');  
  $fee =$this->request->getPost('fee'); 
  $mode_client_payment= $this->request->getPost('mode_client_payment'); 
  $confirm_with =$this->request->getPost('confirm_with'); 
  $date_of_payment_recive= $this->request->getPost('date_of_payment_recive'); 
  $amount = $this->request->getPost('amount');  
  $client_card_note = $this->request->getPost('client_card_note');  

 $l1="";
 $l2="";

application_submitted_mail_team($iggd,$name,$fee,$app_sub_date,$mode_client_payment,$date_of_payment_recive,$confirm_with,$amount,$l1,$l2);
$message1="Hi Team Application submitted-".$iggd." -Name-".$name." - Date Of Application Submitted-".$app_sub_date." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
application_submitted_mail_to_client($name,$fname,$tmobile,$cmobile,$email);

 }

 if($stt=='6') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                       $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

 $adr_deadline = $this->request->getPost('adr_deadline'); 
  $adr_note = $this->request->getPost('adr_note');  


Adr_BCPNP_team_mail($iggd,$name,$adr_deadline,$adr_note);
$message1="Hi Team Adr BCPNP -".$iggd." -Name-".$name." - Adr Deadline-".$adr_deadline." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);


Adr_BCPNP($name,$fname,$tmobile,$cmobile,$email);
 }

 if($stt=='7') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                       $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();

                        $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];

 $adr_deadline = $this->request->getPost('adr_deadline'); 
  $adr_note = $this->request->getPost('adr_note');  

  nomination_approved_team_mail($iggd,$name);


$message1="Hi Team Nomination Approved -".$iggd." -Name-".$name."  ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
nomination_approved($name,$fname,$tmobile,$cmobile,$email);


 }
  if($stt=='8') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $$name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                       $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

$nomination_refused_reason=$this->request->getPost('nomination_refused_reason');  

nomination_refused_team_mail($iggd,$name,$nomination_refused_reason);


$message1="Hi Team Nomination refused -".$iggd." -Name-".$name." Reason -".$nomination_refused_reason." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
nomination_refused($name,$fname,$tmobile,$cmobile,$email);

 }


  if($stt=='9') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                      
                         $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

$app_sent_date=$this->request->getPost('app_sent_date');  

federal_application_sent_team_mail($iggd,$name,$app_sent_date);

$message1="Hi Team Federal Application Sent -".$iggd." -Name-".$name." Application Sent Date -".$app_sent_date." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
federal_application_sent($name,$fname,$tmobile,$cmobile,$email);

 }


 if($stt=='311') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                       $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        
                         $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];

$aor_app_number=$this->request->getPost('aor_app_number');  
  $aor_app_date=$this->request->getPost('aor_app_date');  
  $link=$this->request->getPost('link');    
  $aor_online_detail=$this->request->getPost('aor_online_detail');  
  $aor_linkreason=$this->request->getPost('aor_linkreason');  
  
AOR_IRCC_team_mail($iggd,$name,$aor_app_number,$aor_app_date,$link,$aor_online_detail,$aor_linkreason);

$message1="Hi Team AOR IRCC -".$iggd." -Name-".$name." Application Number  -".$aor_app_number."Application Date=".$aor_app_date." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
AOR_IRCC($name,$fname,$tmobile,$cmobile,$email);

 }

 if($stt=='10') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                       
              $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];

$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                       
                         $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];

$adr_submission_date=$this->request->getPost('adr_submission_date');  
  

ADR_IRCC_team_mail($iggd,$name,$adr_submission_date);
$message1="Hi Team ADR IRCC -".$iggd." -Name-".$name." Submission Date  -".$adr_submission_date." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

send_sms($message1,$phone);
AOR_IRCC($name,$fname,$tmobile,$cmobile,$email);

 }

if($stt=='11') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        
                         $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];

$date_for_medical=$this->request->getPost('date_for_medical');  
  $date_for_medical_ten=$this->request->getPost('date_for_medical_ten');  
  $medical_note=$this->request->getPost('medical_note');    


medical_request_team_mail($iggd,$name,$date_for_medical,$date_for_medical_ten,$medical_note);
$message1="Hi Team Medical requested -".$iggd." -Name-".$name." Date For Medical  -".$date_for_medical." Date For Medical Tentative".$date_for_medical_ten." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

send_sms($message1,$phone);
medical_requested_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }
if($stt=='312') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                       
              $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                         $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];

$medical_submit=$this->request->getPost('medical_submit');
  $medical_sub_note=$this->request->getPost('medical_sub_note');  
 
medical_submit_team_mail($iggd,$name,$medical_submit,$medical_sub_note);

$message1="Hi Team Medical submited -".$iggd." -Name-".$name." Date Of Medical Submit   -".$medical_submit."- Notes".$medical_sub_note." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

send_sms($message1,$phone);
medical_submited($name,$fname,$tmobile,$cmobile,$email);

 }

  if($stt=='12') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                       $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];

    $pp_deadline=$this->request->getPost('pp_deadline');  
  $pp_tentative=$this->request->getPost('pp_tentative');
  

passport_requested_team_mail($iggd,$name,$pp_deadline,$pp_tentative);
$message1="Hi Team Passport requested -".$iggd." -Name-".$name." PP Submition Deadline  -".$pp_deadline." PP submition Tentative ".$pp_tentative."";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
passport_requested_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }
 if($stt=='13') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

    $approve_note=$this->request->getPost('approve_note');
  $date_work_permit="";
  $approval_letter="";

pprove_mail_team($iggd,$name,$approve_note,$date_work_permit,$approval_letter);

$message1="Hi Team Approved -".$iggd." -Name-".$name." note  -".$approve_note." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

send_sms($message1,$phone);
approve_mail_client($name,$fname,$tmobile,$cmobile,$email);

 }
if($stt=='14') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

    $refused_note=$this->request->getPost('refused_note');
  $refusal_letter="";

refuse_mail_team($iggd,$name,$refused_note,$refusal_letter);
$message1="Hi Team Refused -".$iggd." -Name-".$name." note  -".$refused_note." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
refused_mail_client($name,$fname,$tmobile,$cmobile,$email);

 }






$url = 'Siaportal/view_client';
          echo'
          <script>
          alert("Record update Successfuly")
          window.location.href = "'.base_url().'/'.$url.'";
          </script>
          ';  
}
else{

$url = 'Siaportal/view_client';
          echo'
          <script>
          alert("Record Not update Successfuly")
          window.location.href = "'.base_url().'/'.$url.'";
          </script>
          ';  

}
}





else{

  $Team = new Team_model(); 
  //$data['team'] = $Team->getpost();
  $data['team'] = $Team->where('type','Employee')
                   ->findAll();

                   $cpm = new Client_application_model(); 
  //$data['team'] = $Team->getpost();
  $data['cpm'] = $cpm->getclient11($id);

                  $type_id = $data['cpm']['0']['type'];

               $app_status = $data['cpm']['0']['application_status'];



$vmm = new Voice_msg_model(); 
  //$data['team'] = $Team->getpost();
  $data['voice_msg'] = $vmm->where('client_application_id',$id)
                   ->findAll();

                  $Prospect = new Prospect_model(); 
  
  $data['profile'] = $Prospect->where('id',$sid)
                   ->findAll();



                   $cdm = new Client_document_model(); 
  //$data['team'] = $Team->getpost();
  $data['doc'] = $cdm->where('application_id',$id)
            ->where('upload_by','Client')
                   ->findAll();

$data['doc1'] = $cdm->where('application_id',$id)
            ->where('upload_by','Sia')
                   ->findAll();

//echo "hi";
//exit();
               if($app_status=='35'){

$sm = new Status_model(); 
  //$data['team'] = $Team->getpost();

  $data['status'] = $sm->getpost_status($type_id);
  
  
}else{

$sm = new Status_model(); 
  //$data['team'] = $Team->getpost();

  $data['status'] = $sm->getpost_status35($type_id,$app_status);

} 
  
$data['cpml'] = $cpm->where('id',$id)
                   ->findAll();

                     $acc = new Account_model(); 
                   $data['acc'] = $acc->where('app_id',$id)
                   ->findAll();


    return view('admin/bc_pnp_int_grd_exp_entery/edit_bc_pnp_int_grd_exp_entery',$data);
}
}
///-------------------

////////////////new start/////////
 public function edit_bc_pnp_int_grd_exp_entery_new($category,$id,$sid){

if ($this->request->getMethod()=='post'){



   if($img = $this->request->getFile('upload_doc'))
        {
        
            if ($img->isValid() && ! $img->hasMoved())
            {
                $newName = $img->getRandomName();

                $img->move('./assets/resume', $newName);                
 $link='https://canada.siaimmigration.com/assets/resume/'.$newName;
}else{
$newName=$this->request->getPost('upload_doc_old');
$link='';

}

}

 if($img1 = $this->request->getFile('approval_doc'))
        {
        //  echo"hih";
          //exit();
            if ($img1->isValid() && ! $img1->hasMoved())
            {
                $approval_doc = $img1->getRandomName();

                $img1->move('./assets/resume', $approval_doc);                
 $approval_doc_link='https://canada.siaimmigration.com/assets/resume/'.$approval_doc;
//exit();
}else{
$approval_doc=$this->request->getPost('approval_doc_old');
$approval_doc_link='';

}

}

//courier_receipt_slip

 if($img2 = $this->request->getFile('courier_receipt_slip'))
        {
        //  echo"hih";
          //exit();
            if ($img2->isValid() && ! $img2->hasMoved())
            {
                $courier_receipt_slip = $img2->getRandomName();

                $img2->move('./assets/resume', $courier_receipt_slip);                
 $approval_doc_link='https://canada.siaimmigration.com/assets/resume/'.$courier_receipt_slip;
//exit();
}else{
$courier_receipt_slip=$this->request->getPost('courier_receipt_slip_old');
$courier_receipt_slip_link='';

}

}

//echo $newName;
//exit();

  $voice_mm=$this->request->getPost('news_image1');

  if($voice_mm==""){
    $voice=$this->request->getPost('news_image1_old');


  }
    else{
      $vom = new Voice_msg_model();
      $dd=date('Y-m-d H:i:s' );
      $insert=$vom->insert([
        'client_application_id'=>$id,
        'voice_msg'=>$this->request->getPost('news_image1'),
        'insert_on' => $dd  
        ]);
  $voice=$this->request->getPost('news_image1');

    }


  // echo $aa= $this->request->getPost('exp_date_to_apply_exp');
  // exit();
  $data = [
  
  'voice_msg'=>$voice,



'exp_date_to_apply_exp'=>$this->request->getPost('exp_date_to_apply_exp'),
 'assign_to_exp'=>$this->request->getPost('assign_to_exp'),
 'date_of_creation_exp'=>$this->request->getPost('date_of_creation_exp'),
 'job_noc_exp'=>$this->request->getPost('job_noc_exp'),
 'app_number_exp'=>$this->request->getPost('app_number_exp'),
 'reg_score_exp'=>$this->request->getPost('reg_score_exp'),
 'log_in_info_exp'=>$this->request->getPost('log_in_info_exp'),

 'app_recv_exp'=>$this->request->getPost('app_recv_exp'),
 'exp_date_to_apply_expp'=>$this->request->getPost('exp_date_to_apply_expp'),
 'fee_exp'=>$this->request->getPost('fee_exp'),
 'mode_client_payment_exp'=>$this->request->getPost('mode_client_payment_exp'),
 'confirm_with_exp'=>$this->request->getPost('confirm_with_exp'),
 'date_of_payment_recive_exp'=>$this->request->getPost('date_of_payment_recive_exp'),
 'amount_exp'=>$this->request->getPost('amount_exp'),
 'client_card_note_exp'=>$this->request->getPost('client_card_note_exp'),
 'adr_deadline_exp'=>$this->request->getPost('adr_deadline_exp'),
 'adr_note_exp'=>$this->request->getPost('adr_note_exp'),

  'assign_to_exp'=>$this->request->getPost('assign_to_exp'),




    'application_status'=>$this->request->getPost('application_status'),

    'exp_date_to_apply'=>$this->request->getPost('exp_date_to_apply'),
    'assign_to'=>$this->request->getPost('assign_to'),
    'application_status_update'=>date('Y-m-d' ),

  'date_of_creation'=>$this->request->getPost('date_of_creation'),
  'job_noc'=>$this->request->getPost('job_noc'),
  'application_number'=>$this->request->getPost('app_number'),
   'free_text'=>$this->request->getPost('free_text'),
  'reg_score'=>$this->request->getPost('reg_score'),
  'log_in_info_pnp'=>$this->request->getPost('log_in_info'),  
  'upload_doc'=>$newName,

  'invitation_date_final'=>$this->request->getPost('invitation_date_final'),  
  'invitation_date_tantative'=>$this->request->getPost('invitation_date_tantative'),  
  'invit_withdrawn_reason'=>$this->request->getPost('invit_withdrawn_reason'),

  'app_sub_date'=>$this->request->getPost('app_sub_date'),  
  'fee'=>$this->request->getPost('fee'),  
  'mode_client_payment'=>$this->request->getPost('mode_client_payment'),  
  'confirm_with'=>$this->request->getPost('confirm_with'),  
  'date_of_payment_recive'=>$this->request->getPost('date_of_payment_recive'),  
  'amount'=>$this->request->getPost('amount'),  
  'client_card_note'=>$this->request->getPost('client_card_note'),  
  'adr_deadline'=>$this->request->getPost('adr_deadline'),  
  'adr_note'=>$this->request->getPost('adr_note'),  
  'approval_doc'=>$approval_doc,  
  'nomination_refused_reason'=>$this->request->getPost('nomination_refused_reason'),  
  'app_sent_date'=>$this->request->getPost('app_sent_date'),  
  'courier_receipt_slip'=>$courier_receipt_slip,
  'aor_app_number'=>$this->request->getPost('aor_app_number'),  
  'aor_app_date'=>$this->request->getPost('aor_app_date'),  
  'link'=>$this->request->getPost('link'),    
  'aor_online_detail'=>$this->request->getPost('aor_online_detail'),  
  'aor_linkreason'=>$this->request->getPost('aor_linkreason'),  
  'adr_submission_date'=>$this->request->getPost('adr_submission_date'),  
  'date_for_medical'=>$this->request->getPost('date_for_medical'),  
  'date_for_medical_ten'=>$this->request->getPost('date_for_medical_ten'),  
  'medical_note'=>$this->request->getPost('medical_note'),  
  'medical_submit'=>$this->request->getPost('medical_submit'),
  'medical_sub_note'=>$this->request->getPost('medical_sub_note'),  
  'pp_deadline'=>$this->request->getPost('pp_deadline'),  
  'pp_tentative'=>$this->request->getPost('pp_tentative'),  
  'approve_note'=>$this->request->getPost('approve_note'),  
  'refused_note'=>$this->request->getPost('refused_note'),  

  

  'update_on'=>date( 'Y-m-d H:i:s' )
];

$cam = new Client_application_model(); 
$updatee=$cam->update($id, $data);
if($updatee){

   
$stt=$this->request->getPost('application_status');




if($stt=='523') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $cmobile= $data['pm']['0']['number'];
                          $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply_exp');
    $assign_to = $this->request->getPost('assign_to_exp');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];

                         $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  

$app_recv="";
profile_in_process_team_mail($iggd,$name,$app_recv,$exp_date_to_apply);
$message1="Profile in Process id-".$iggd." Name-".$name."";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 $pcount= count($phone);
//exit();

send_sms($message1,$phone);

//$this->profile_in_process($name,$fname,$tmobile,$cmobile,$email);
profile_in_process_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }

if($stt=='524') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];                       
            $cmobile= $data['pm']['0']['number'];
            $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply_exp');
    $assign_to = $this->request->getPost('assign_to_exp');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                          $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  $date_of_creation=$this->request->getPost('date_of_creation_exp');
  $job_noc=$this->request->getPost('job_noc_exp');
  $application_number=$this->request->getPost('app_number_exp');
  $reg_score= $this->request->getPost('reg_score_exp'); 
  $log_in_info_pnp = $this->request->getPost('log_in_info_exp');  
  $upload_doc =$newName;

  $From="Sia Immigration";
           $ee = session()->get('email');
           $emaill=$ee;

          $subject  = "Profile Created id-".$iggd." Name-".$name."";
          //$subject  = "Profile in Process"; 
          //$subject  = "Lended  Application Fee";            
          $headers  = "MIME-Version: 1.0\r\n";
          $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";          
         // $headers.="From: \"".$From."\"<".$emaill."> \r\n";
           $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
          $message =' Hi Team <br>';
          $message .= 'Profile Created<br>';
          $message .= 'Date : ' .date('d/m/Y').'<br>';
          $message .= 'Date of Creation : ' .$date_of_creation.'<br>';
          $message .= 'Application Number : ' .$application_number.'<br>';  
          $message .= 'Registration Score : ' .$reg_score.'<br>'; 
          $message .= 'Log In Info PNP : ' .$log_in_info_pnp.'<br>';  
          $message .= 'Job NOC : ' .$job_noc.'<br>';
          $message .= 'Document :-: https://canada.siaimmigration.com/assets/resume/'.$newName.'<br>';  

  
  @mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Profile Created id-".$iggd." -Name-".$name." - Date of Creation-".$date_of_creation." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 $pcount= count($phone);
//exit();

send_sms($message1,$phone);
//$this->profile_created($name,$fname,$tmobile,$cmobile,$email);
profile_created_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }
///////




if($stt=='521') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $cmobile= $data['pm']['0']['number'];
                          $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];

                         $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  

$app_recv="";
profile_in_process_team_mail($iggd,$name,$app_recv,$exp_date_to_apply);
$message1="Profile in Process id-".$iggd." Name-".$name."";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 $pcount= count($phone);
//exit();

send_sms($message1,$phone);

//$this->profile_in_process($name,$fname,$tmobile,$cmobile,$email);
profile_in_process_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }

if($stt=='522') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];                       
            $cmobile= $data['pm']['0']['number'];
            $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                          $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  $date_of_creation=$this->request->getPost('date_of_creation');
  $job_noc=$this->request->getPost('job_noc');
  $application_number=$this->request->getPost('app_number');
  $reg_score= $this->request->getPost('reg_score'); 
  $log_in_info_pnp = $this->request->getPost('log_in_info');  
  $upload_doc =$newName;

  $From="Sia Immigration";
           $ee = session()->get('email');
           $emaill=$ee;

          $subject  = "Profile Created id-".$iggd." Name-".$name."";
          //$subject  = "Profile in Process"; 
          //$subject  = "Lended  Application Fee";            
          $headers  = "MIME-Version: 1.0\r\n";
          $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";          
        //  $headers.="From: \"".$From."\"<".$emaill."> \r\n";

           $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
          $message =' Hi Team <br>';
          $message .= 'Profile Created<br>';
          $message .= 'Date : ' .date('d/m/Y').'<br>';
          $message .= 'Date of Creation : ' .$date_of_creation.'<br>';
          $message .= 'Application Number : ' .$application_number.'<br>';  
          $message .= 'Registration Score : ' .$reg_score.'<br>'; 
          $message .= 'Log In Info PNP : ' .$log_in_info_pnp.'<br>';  
          $message .= 'Job NOC : ' .$job_noc.'<br>';
          $message .= 'Document :-: https://canada.siaimmigration.com/assets/resume/'.$newName.'<br>';  

  
  @mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Profile Created id-".$iggd." -Name-".$name." - Date of Creation-".$date_of_creation." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');

$phone = array('12368661740');

 $pcount= count($phone);
//exit();

send_sms($message1,$phone);
//$this->profile_created($name,$fname,$tmobile,$cmobile,$email);
profile_created_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }
 if($stt=='525') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                        $cmobile= $data['pm']['0']['number'];
                        $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                         $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  $invitation_date_final = $this->request->getPost('invitation_date_final');  
  $invitation_date_tantative = $this->request->getPost('invitation_date_tantative');  
invitation_received_team_mail($iggd,$name,$invitation_date_tantative,$invitation_date_final);

$message1="Hi Team Invitation received-".$iggd." -Name-".$name." - Final Submission Date-".$invitation_date_final." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');

$phone = array('12368661740');

send_sms($message1,$phone);
invitation_received_client_mail_msg($name,$fname,$tmobile,$cmobile,$email);

 }

  if($stt=='526') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                        $cmobile= $data['pm']['0']['number'];
                        $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                          $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  $invit_withdrawn_reason=$this->request->getPost('invit_withdrawn_reason');  

  
  
invitation_withdrawn_team_mail($iggd,$name,$invit_withdrawn_reason);

$message1="Hi Team Invitation withdrawn-".$iggd." -Name-".$name." - Reason-".$invit_withdrawn_reason." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');

$phone = array('12368661740');

send_sms($message1,$phone);

invitation_withdrawn_client_mail_msg($name,$fname,$tmobile,$cmobile,$invit_withdrawn_reason,$email);
 }
if($stt=='527') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $cmobile= $data['pm']['0']['number'];
                          $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
$app_recv = $this->request->getPost('app_recv');
//$study_permit_exp = $this->request->getPost('study_permit_exp');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];

                         $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  

  profile_in_process_team_mail($iggd,$name,$app_recv,$exp_date_to_apply);


$message1="Profile in Process id-".$iggd." Name-".$name."";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');

$phone = array('12368661740');

send_sms($message1,$phone);



profile_in_process_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }




  if($stt=='528') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];

$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  $app_sub_date=$this->request->getPost('app_sub_date');  
  $fee =$this->request->getPost('fee'); 
  $mode_client_payment= $this->request->getPost('mode_client_payment'); 
  $confirm_with =$this->request->getPost('confirm_with'); 
  $date_of_payment_recive= $this->request->getPost('date_of_payment_recive'); 
  $amount = $this->request->getPost('amount');  
  $client_card_note = $this->request->getPost('client_card_note');  

 $l1="";
 $l2="";

application_submitted_mail_team($iggd,$name,$fee,$app_sub_date,$mode_client_payment,$date_of_payment_recive,$confirm_with,$amount,$l1,$l2);
$message1="Hi Team Application submitted-".$iggd." -Name-".$name." - Date Of Application Submitted-".$app_sub_date." ";

//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
application_submitted_mail_to_client($name,$fname,$tmobile,$cmobile,$email);

 }

 if($stt=='529') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                       $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

 $adr_deadline = $this->request->getPost('adr_deadline'); 
  $adr_note = $this->request->getPost('adr_note');  


Adr_BCPNP_team_mail($iggd,$name,$adr_deadline,$adr_note);
$message1="Hi Team Adr BCPNP -".$iggd." -Name-".$name." - Adr Deadline-".$adr_deadline." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);


Adr_BCPNP($name,$fname,$tmobile,$cmobile,$email);
 }

 if($stt=='530') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                       $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();

                        $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];

 $adr_deadline = $this->request->getPost('adr_deadline'); 
  $adr_note = $this->request->getPost('adr_note');  

  nomination_approved_team_mail($iggd,$name);


$message1="Hi Team Nomination Approved -".$iggd." -Name-".$name."  ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');

$phone = array('12368661740');

 send_sms($message1,$phone);
nomination_approved($name,$fname,$tmobile,$cmobile,$email);


 }
  if($stt=='531') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $$name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                       $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

$nomination_refused_reason=$this->request->getPost('nomination_refused_reason');  

nomination_refused_team_mail($iggd,$name,$nomination_refused_reason);


$message1="Hi Team Nomination refused -".$iggd." -Name-".$name." Reason -".$nomination_refused_reason." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
nomination_refused($name,$fname,$tmobile,$cmobile,$email);

 }


  if($stt=='532') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                      
                         $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

$app_sent_date=$this->request->getPost('app_sent_date');  

federal_application_sent_team_mail($iggd,$name,$app_sent_date);

$message1="Hi Team Federal Application Sent -".$iggd." -Name-".$name." Application Sent Date -".$app_sent_date." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
federal_application_sent($name,$fname,$tmobile,$cmobile,$email);

 }

if($stt=='533') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $cmobile= $data['pm']['0']['number'];
                          $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply_expp');
$app_recv = $this->request->getPost('app_recv_exp');
//$study_permit_exp = $this->request->getPost('study_permit_exp');
    $assign_to = $this->request->getPost('assign_to_exp');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];

                         $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  

  profile_in_process_team_mail($iggd,$name,$app_recv,$exp_date_to_apply);


$message1="Profile in Process id-".$iggd." Name-".$name."";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');

$phone = array('12368661740');
send_sms($message1,$phone);



profile_in_process_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }




  if($stt=='534') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];

$exp_date_to_apply = $this->request->getPost('exp_date_to_apply_expp');
    $assign_to = $this->request->getPost('assign_to_exp');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  $app_sub_date=$this->request->getPost('app_sub_date_exp');  
  $fee =$this->request->getPost('fee_exp'); 
  $mode_client_payment= $this->request->getPost('mode_client_payment_exp'); 
  $confirm_with =$this->request->getPost('confirm_with_exp'); 
  $date_of_payment_recive= $this->request->getPost('date_of_payment_recive_exp'); 
  $amount = $this->request->getPost('amount_exp');  
  $client_card_note = $this->request->getPost('client_card_note_exp');  

 $l1="";
 $l2="";

application_submitted_mail_team($iggd,$name,$fee,$app_sub_date,$mode_client_payment,$date_of_payment_recive,$confirm_with,$amount,$l1,$l2);
$message1="Hi Team Application submitted-".$iggd." -Name-".$name." - Date Of Application Submitted-".$app_sub_date." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
application_submitted_mail_to_client($name,$fname,$tmobile,$cmobile,$email);

 }

 if($stt=='535') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                       $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

 $adr_deadline = $this->request->getPost('adr_deadline_exp'); 
  $adr_note = $this->request->getPost('adr_note_exp');  


Adr_BCPNP_team_mail($iggd,$name,$adr_deadline,$adr_note);
$message1="Hi Team Adr BCPNP -".$iggd." -Name-".$name." - Adr Deadline-".$adr_deadline." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);


Adr_BCPNP($name,$fname,$tmobile,$cmobile,$email);
 }



 if($stt=='536') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

    $approve_note=$this->request->getPost('approve_note');
  $date_work_permit="";
  $approval_letter="";

approve_mail_team($iggd,$name,$approve_note,$date_work_permit,$approval_letter);

$message1="Hi Team Approved -".$iggd." -Name-".$name." note  -".$approve_note." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

send_sms($message1,$phone);
approve_mail_client($name,$fname,$tmobile,$cmobile,$email);

 }
if($stt=='537') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

    $refused_note=$this->request->getPost('refused_note');
  $refusal_letter="";

refuse_mail_team($iggd,$name,$refused_note,$refusal_letter);
$message1="Hi Team Refused -".$iggd." -Name-".$name." note  -".$refused_note." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
refused_mail_client($name,$fname,$tmobile,$cmobile,$email);

 }













if($stt=='2') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $cmobile= $data['pm']['0']['number'];
                          $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];

                         $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  

$app_recv="";
profile_in_process_team_mail($iggd,$name,$app_recv,$exp_date_to_apply);
$message1="Profile in Process id-".$iggd." Name-".$name."";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 $pcount= count($phone);
//exit();

send_sms($message1,$phone);

//$this->profile_in_process($name,$fname,$tmobile,$cmobile,$email);
profile_in_process_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }

if($stt=='3') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];                       
            $cmobile= $data['pm']['0']['number'];
            $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                          $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  $date_of_creation=$this->request->getPost('date_of_creation');
  $job_noc=$this->request->getPost('job_noc');
  $application_number=$this->request->getPost('app_number');
  $reg_score= $this->request->getPost('reg_score'); 
  $log_in_info_pnp = $this->request->getPost('log_in_info');  
  $upload_doc =$newName;

  $From="Sia Immigration";
           $emaill="mkj@siaimmigration.com";
          $subject  = "Profile Created id-".$iggd." Name-".$name."";
          //$subject  = "Profile in Process"; 
          //$subject  = "Lended  Application Fee";            
          $headers  = "MIME-Version: 1.0\r\n";
          $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";          
          //$headers.="From: \"".$From."\"<".$emaill."> \r\n";
           $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
          $message =' Hi Team <br>';
          $message .= 'Profile Created<br>';
          $message .= 'Date : ' .date('d/m/Y').'<br>';
          $message .= 'Date of Creation : ' .$date_of_creation.'<br>';
          $message .= 'Application Number : ' .$application_number.'<br>';  
          $message .= 'Registration Score : ' .$reg_score.'<br>'; 
          $message .= 'Log In Info PNP : ' .$log_in_info_pnp.'<br>';  
          $message .= 'Job NOC : ' .$job_noc.'<br>';
          $message .= 'Document :-: https://canada.siaimmigration.com/assets/resume/'.$newName.'<br>';  

  
  @mail('ds@siaimmigration.com,mj@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Profile Created id-".$iggd." -Name-".$name." - Date of Creation-".$date_of_creation." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 $pcount= count($phone);
//exit();

send_sms($message1,$phone);
//$this->profile_created($name,$fname,$tmobile,$cmobile,$email);
profile_created_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }
 if($stt=='4') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                        $cmobile= $data['pm']['0']['number'];
                        $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                         $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  $invitation_date_final = $this->request->getPost('invitation_date_final');  
  $invitation_date_tantative = $this->request->getPost('invitation_date_tantative');  
invitation_received_team_mail($iggd,$name,$invitation_date_tantative,$invitation_date_final);

$message1="Hi Team Invitation received-".$iggd." -Name-".$name." - Final Submission Date-".$invitation_date_final." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

send_sms($message1,$phone);
invitation_received_client_mail_msg($name,$fname,$tmobile,$cmobile,$email);

 }

  if($stt=='310') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                        $cmobile= $data['pm']['0']['number'];
                        $email= $data['pm']['0']['email'];

                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                          $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  $invit_withdrawn_reason=$this->request->getPost('invit_withdrawn_reason');  

  
invitation_withdrawn_team_mail($iggd,$name,$invit_withdrawn_reason);

$message1="Hi Team Invitation withdrawn-".$iggd." -Name-".$name." - Reason-".$invit_withdrawn_reason." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

send_sms($message1,$phone);

invitation_withdrawn_client_mail_msg($name,$fname,$tmobile,$cmobile,$invit_withdrawn_reason,$email);
 }
  if($stt=='5') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];

$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

  $app_sub_date=$this->request->getPost('app_sub_date');  
  $fee =$this->request->getPost('fee'); 
  $mode_client_payment= $this->request->getPost('mode_client_payment'); 
  $confirm_with =$this->request->getPost('confirm_with'); 
  $date_of_payment_recive= $this->request->getPost('date_of_payment_recive'); 
  $amount = $this->request->getPost('amount');  
  $client_card_note = $this->request->getPost('client_card_note');  

 $l1="";
 $l2="";

application_submitted_mail_team($iggd,$name,$fee,$app_sub_date,$mode_client_payment,$date_of_payment_recive,$confirm_with,$amount,$l1,$l2);
$message1="Hi Team Application submitted-".$iggd." -Name-".$name." - Date Of Application Submitted-".$app_sub_date." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
application_submitted_mail_to_client($name,$fname,$tmobile,$cmobile,$email);

 }

 if($stt=='6') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                       $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

 $adr_deadline = $this->request->getPost('adr_deadline'); 
  $adr_note = $this->request->getPost('adr_note');  


Adr_BCPNP_team_mail($iggd,$name,$adr_deadline,$adr_note);
$message1="Hi Team Adr BCPNP -".$iggd." -Name-".$name." - Adr Deadline-".$adr_deadline." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);


Adr_BCPNP($name,$fname,$tmobile,$cmobile,$email);
 }

 if($stt=='7') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                       $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();

                        $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];

 $adr_deadline = $this->request->getPost('adr_deadline'); 
  $adr_note = $this->request->getPost('adr_note');  

  nomination_approved_team_mail($iggd,$name);


$message1="Hi Team Nomination Approved -".$iggd." -Name-".$name."  ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
nomination_approved($name,$fname,$tmobile,$cmobile,$email);


 }
  if($stt=='8') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $$name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                       $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

$nomination_refused_reason=$this->request->getPost('nomination_refused_reason');  

nomination_refused_team_mail($iggd,$name,$nomination_refused_reason);


$message1="Hi Team Nomination refused -".$iggd." -Name-".$name." Reason -".$nomination_refused_reason." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
nomination_refused($name,$fname,$tmobile,$cmobile,$email);

 }


  if($stt=='9') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                      
                         $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

$app_sent_date=$this->request->getPost('app_sent_date');  

federal_application_sent_team_mail($iggd,$name,$app_sent_date);

$message1="Hi Team Federal Application Sent -".$iggd." -Name-".$name." Application Sent Date -".$app_sent_date." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
federal_application_sent($name,$fname,$tmobile,$cmobile,$email);

 }


 if($stt=='311') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                       $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        
                         $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];

$aor_app_number=$this->request->getPost('aor_app_number');  
  $aor_app_date=$this->request->getPost('aor_app_date');  
  $link=$this->request->getPost('link');    
  $aor_online_detail=$this->request->getPost('aor_online_detail');  
  $aor_linkreason=$this->request->getPost('aor_linkreason');  
  
AOR_IRCC_team_mail($iggd,$name,$aor_app_number,$aor_app_date,$link,$aor_online_detail,$aor_linkreason);

$message1="Hi Team AOR IRCC -".$iggd." -Name-".$name." Application Number  -".$aor_app_number."Application Date=".$aor_app_date." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
AOR_IRCC($name,$fname,$tmobile,$cmobile,$email);

 }

 if($stt=='10') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                       
              $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];

$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                       
                         $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];

$adr_submission_date=$this->request->getPost('adr_submission_date');  
  

ADR_IRCC_team_mail($iggd,$name,$adr_submission_date);
$message1="Hi Team ADR IRCC -".$iggd." -Name-".$name." Submission Date  -".$adr_submission_date." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

send_sms($message1,$phone);
AOR_IRCC($name,$fname,$tmobile,$cmobile,$email);

 }

if($stt=='11') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        
                         $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];

$date_for_medical=$this->request->getPost('date_for_medical');  
  $date_for_medical_ten=$this->request->getPost('date_for_medical_ten');  
  $medical_note=$this->request->getPost('medical_note');    


medical_request_team_mail($iggd,$name,$date_for_medical,$date_for_medical_ten,$medical_note);
$message1="Hi Team Medical requested -".$iggd." -Name-".$name." Date For Medical  -".$date_for_medical." Date For Medical Tentative".$date_for_medical_ten." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

send_sms($message1,$phone);
medical_requested_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }
if($stt=='312') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                       
              $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                         $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];

$medical_submit=$this->request->getPost('medical_submit');
  $medical_sub_note=$this->request->getPost('medical_sub_note');  
 
medical_submit_team_mail($iggd,$name,$medical_submit,$medical_sub_note);

$message1="Hi Team Medical submited -".$iggd." -Name-".$name." Date Of Medical Submit   -".$medical_submit."- Notes".$medical_sub_note." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

send_sms($message1,$phone);
medical_submited($name,$fname,$tmobile,$cmobile,$email);

 }

  if($stt=='12') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                       $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
                         $email= $data['pm']['0']['email'];
                         $cmobile=$data['pm']['0']['number'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                        $tmobile= $data['tm']['0']['mobile_no'];

    $pp_deadline=$this->request->getPost('pp_deadline');  
  $pp_tentative=$this->request->getPost('pp_tentative');
  

passport_requested_team_mail($iggd,$name,$pp_deadline,$pp_tentative);
$message1="Hi Team Passport requested -".$iggd." -Name-".$name." PP Submition Deadline  -".$pp_deadline." PP submition Tentative ".$pp_tentative."";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
passport_requested_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }
 if($stt=='13') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

    $approve_note=$this->request->getPost('approve_note');
  $date_work_permit="";
  $approval_letter="";

pprove_mail_team($iggd,$name,$approve_note,$date_work_permit,$approval_letter);

$message1="Hi Team Approved -".$iggd." -Name-".$name." note  -".$approve_note." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

send_sms($message1,$phone);
approve_mail_client($name,$fname,$tmobile,$cmobile,$email);

 }
if($stt=='14') {


    $CC = new Client_application_model(); 
    //$data['team'] = $Team->getpost();
    $data['sia_app'] = $CC->where('id',$id)
                   ->findAll();
$ssid= $data['sia_app']['0']['siaportalid'];

  $PM = new Prospect_model(); 
    //$data['team'] = $Team->getpost();
    $data['pm'] = $PM->where('id',$ssid)
                   ->findAll();
                        $name= $data['pm']['0']['heading'];
                         $iggd= $data['pm']['0']['id'];
$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
    //$data['team'] = $Team->getpost();
    $data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

    $refused_note=$this->request->getPost('refused_note');
  $refusal_letter="";

refuse_mail_team($iggd,$name,$refused_note,$refusal_letter);
$message1="Hi Team Refused -".$iggd." -Name-".$name." note  -".$refused_note." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

 send_sms($message1,$phone);
refused_mail_client($name,$fname,$tmobile,$cmobile,$email);

 }






$url = 'Siaportal/view_client';
          echo'
          <script>
          alert("Record update Successfuly")
          window.location.href = "'.base_url().'/'.$url.'";
          </script>
          ';  
}
else{

$url = 'Siaportal/view_client';
          echo'
          <script>
          alert("Record Not update Successfuly")
          window.location.href = "'.base_url().'/'.$url.'";
          </script>
          ';  

}
}





else{

  $Team = new Team_model(); 
  //$data['team'] = $Team->getpost();
  $data['team'] = $Team->where('type','Employee')
                   ->findAll();

                   $cpm = new Client_application_model(); 
  //$data['team'] = $Team->getpost();
  $data['cpm'] = $cpm->getclient11($id);

                  $type_id = $data['cpm']['0']['type'];

               $app_status = $data['cpm']['0']['application_status'];



$vmm = new Voice_msg_model(); 
  //$data['team'] = $Team->getpost();
  $data['voice_msg'] = $vmm->where('client_application_id',$id)
                   ->findAll();

                  $Prospect = new Prospect_model(); 
  
  $data['profile'] = $Prospect->where('id',$sid)
                   ->findAll();



                   $cdm = new Client_document_model(); 
  //$data['team'] = $Team->getpost();
  $data['doc'] = $cdm->where('application_id',$id)
            ->where('upload_by','Client')
                   ->findAll();

$data['doc1'] = $cdm->where('application_id',$id)
            ->where('upload_by','Sia')
                   ->findAll();

//echo "hi";
//exit();
               if($app_status=='35'){

$sm = new Status_model(); 
  //$data['team'] = $Team->getpost();

  $data['status'] = $sm->getpost_status($type_id);
  
  
}else{

$sm = new Status_model(); 
  //$data['team'] = $Team->getpost();

  $data['status'] = $sm->getpost_status35($type_id,$app_status);

} 
  
$data['cpml'] = $cpm->where('id',$id)
                   ->findAll();

                     $acc = new Account_model(); 
                   $data['acc'] = $acc->where('app_id',$id)
                   ->findAll();


    return view('admin/bc_pnp_int_grd_exp_entery/edit_bc_pnp_int_grd_exp_entery_new',$data);
}
}
///-------------------


///////////////new end//////////////


public function full_bc_pnp_int_grd_exp_entery($category,$id,$sid){


  $Team = new Team_model(); 
  //$data['team'] = $Team->getpost();
  $data['team'] = $Team->where('type','Employee')
                   ->findAll();

                   $cpm = new Client_application_model(); 
  //$data['team'] = $Team->getpost();
  $data['cpm'] = $cpm->getclient11($id);

                  $type_id = $data['cpm']['0']['type'];

               $app_status = $data['cpm']['0']['application_status'];



$vmm = new Voice_msg_model(); 
  //$data['team'] = $Team->getpost();
  $data['voice_msg'] = $vmm->where('client_application_id',$id)
                   ->findAll();

                  $Prospect = new Prospect_model(); 
  
  $data['profile'] = $Prospect->where('id',$sid)
                   ->findAll();



                   $cdm = new Client_document_model(); 
  //$data['team'] = $Team->getpost();
  $data['doc'] = $cdm->where('application_id',$id)
            ->where('upload_by','Client')
                   ->findAll();

$data['doc1'] = $cdm->where('application_id',$id)
            ->where('upload_by','Sia')
                   ->findAll();

//echo "hi";
//exit();
               if($app_status=='35'){

$sm = new Status_model(); 
  //$data['team'] = $Team->getpost();

  $data['status'] = $sm->getpost_status($type_id);
  
  
}else{

$sm = new Status_model(); 
  //$data['team'] = $Team->getpost();

  $data['status'] = $sm->getpost_status35($type_id,$app_status);

} 
  
$data['cpml'] = $cpm->where('id',$id)
                   ->findAll();


    return view('admin/bc_pnp_int_grd_exp_entery/full_view_bc_pnp_int_grd_exp_entery',$data);

}


}