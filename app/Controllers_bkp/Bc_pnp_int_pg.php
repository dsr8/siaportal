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

use App\Models\Client_application_model;
use codeigniter\controller;
use CodeIgniter\I18n\Time;
use CodeIgniter\HTTP\Files\UploadedFile;


class Bc_pnp_int_pg extends BaseController
{


 public function edit_bc_pnp_int_pg($category,$id,$sid){

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
        //	echo"hih";
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
        //	echo"hih";
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
	$data = [
	
	'voice_msg'=>$voice,
    'application_status'=>$this->request->getPost('application_status'),

    'exp_date_to_apply'=>$this->request->getPost('exp_date_to_apply'),
    'assign_to'=>$this->request->getPost('assign_to'),
    'application_status_update'=>date('Y-m-d' ),

	'date_of_creation'=>$this->request->getPost('date_of_creation'),
	'job_noc'=>$this->request->getPost('job_noc'),
	'application_number'=>$this->request->getPost('app_number'),
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

 	

	$From="Sia Immigration";$ee = session()->get('email');
					 $emaill=$ee;
$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Profile in Process id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Profile in Process <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Expected Date To Apply : ' .$exp_date_to_apply.'<br>';
					$message .= 'Assign Team Member : ' .$fname.'<br>';	
	
	@mail('Support@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


$message1="Profile in Process id-".$iggd." Name-".$name."";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();

send_sms($message1,$phone);

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
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Profile Created id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Profile Created<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date of Creation : ' .$date_of_creation.'<br>';
					$message .= 'Application Number : ' .$application_number.'<br>';	
					$message .= 'Registration Score : ' .$reg_score.'<br>';	
					$message .= 'Log In Info PNP : ' .$log_in_info_pnp.'<br>';	
					$message .= 'Job NOC : ' .$job_noc.'<br>';
					$message .= 'Document :-: https://canada.siaimmigration.com/assets/resume/'.$newName.'<br>';	

	
	@mail('Support@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Profile Created id-".$iggd." -Name-".$name." - Date of Creation-".$date_of_creation." ";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();

send_sms($message1,$phone);
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

	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Invitation received id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Invitation received<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Tentative Submission Date : ' .$invitation_date_tantative.'<br>';
					$message .= 'Final Submission Date : ' .$invitation_date_final.'<br>';	
					

	
	@mail('Support@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Invitation received-".$iggd." -Name-".$name." - Final Submission Date-".$invitation_date_final." ";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();
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

	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Invitation withdrawn id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Invitation withdrawn<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Reason : ' .$invit_withdrawn_reason.'<br>';
					
	
	@mail('Support@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Invitation withdrawn-".$iggd." -Name-".$name." - Reason-".$invit_withdrawn_reason." ";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();
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

	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Application submitted id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Application submitted<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
				$message .= 'Date Of Application Submitted : ' .$app_sub_date.'<br>';
				$message .= 'Application Fee Payment Mode : ' .$fee.'<br>';
				$message .= 'Mode Of Payment By Client : ' .$mode_client_payment.'<br>';
				$message .= 'Date of Payment Received : ' .$date_of_payment_recive.'<br>';
				$message .= 'Confirm With: ' .$confirm_with.'<br>';
				$message .= 'Amount : ' .$amount.'<br>';

					
	
	@mail('Support@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Application submitted-".$iggd." -Name-".$name." - Date Of Application Submitted-".$app_sub_date." ";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();
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

	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Adr BCPNP id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Application submitted<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
				$message .= 'Adr Deadline : ' .$adr_deadline.'<br>';
				$message .= 'Adr Notes : ' .$adr_note.'<br>';
				
					
	
	@mail('Support@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Adr BCPNP -".$iggd." -Name-".$name." - Adr Deadline-".$adr_deadline." ";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();
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

	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Nomination Approved id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Nomination Approved<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
			
				
					
	
	@mail('Support@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Nomination Approved -".$iggd." -Name-".$name."  ";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();

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

	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Nomination refused id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Nomination refused<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Reason : ' .$nomination_refused_reason.'<br>';
			
				
					
	
	@mail('Support@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Nomination refused -".$iggd." -Name-".$name." Reason -".$nomination_refused_reason." ";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();
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

	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Federal Application Sent id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Federal Application Sent<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Application Sent Date : ' .$app_sent_date.'<br>';
			
				
					
	
	@mail('Support@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Federal Application Sent -".$iggd." -Name-".$name." Application Sent Date -".$app_sent_date." ";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();
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
	$From="Sia Immigration";
					 $ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "AOR IRCC id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'AOR IRCC<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Application Number : ' .$aor_app_number.'<br>';
					$message .= 'Application Date : ' .$aor_app_date.'<br>';
					$message .= 'Have You Link This Application Online : ' .$link.'<br>';
					$message .= 'Online Detail : ' .$aor_online_detail.'<br>';
					$message .= 'Reason: ' .$aor_linkreason.'<br>';
				
					
	
	@mail('Support@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team AOR IRCC -".$iggd." -Name-".$name." Application Number  -".$aor_app_number."Application Date=".$aor_app_date." ";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();
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
	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "ADR IRCC id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'ADR IRCC <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Submission Date : ' .$adr_submission_date.'<br>';
				
	
	@mail('Support@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team ADR IRCC -".$iggd." -Name-".$name." Submission Date  -".$adr_submission_date." ";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();
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
	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Medical requested id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Medical requested <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date For Medical : ' .$date_for_medical.'<br>';
					$message .= 'Date For Medical Tentative : ' .$date_for_medical_ten.'<br>';
					$message .= 'Notes : ' .$medical_note.'<br>';
				
	
	@mail('Support@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Medical requested -".$iggd." -Name-".$name." Date For Medical  -".$date_for_medical." Date For Medical Tentative".$date_for_medical_ten." ";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();

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
	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Medical submited id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Medical submited <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date Of Medical Submit : ' .$medical_submit.'<br>';
					$message .= 'Notes : ' .$medical_sub_note.'<br>';
					
				
	
	@mail('Support@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Medical submited -".$iggd." -Name-".$name." Date Of Medical Submit   -".$medical_submit."- Notes".$medical_sub_note." ";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();

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
	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Passport requested id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Passport requested <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'PP Submition Deadline : ' .$pp_deadline.'<br>';
					$message .= 'PP submition Tentative : ' .$pp_tentative.'<br>';
					
					
				
	
	@mail('Support@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Passport requested -".$iggd." -Name-".$name." PP Submition Deadline  -".$pp_deadline." PP submition Tentative ".$pp_tentative."";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();
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
	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Approved id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Approved <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Note : ' .$approve_note.'<br>';
					
					
				
	
	@mail('Support@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Approved -".$iggd." -Name-".$name." note  -".$approve_note." ";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();
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
	$From="Sia Immigration";
					 $ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Refused id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Refused <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Note : ' .$refused_note.'<br>';
					
					
				
	
	@mail('Support@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Refused -".$iggd." -Name-".$name." note  -".$refused_note." ";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();
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
	$data['cpm'] = $cpm->where('id',$id)
                   ->findAll();

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


		return view('admin/bc_pnp_int_pg/edit_bc_pnp_int_pg',$data);
}
}
///-------------------

 public function full_bc_pnp_int_pg($category,$id,$sid){
 	
 	
                   $cpm = new Client_application_model(); 
	//$data['team'] = $Team->getpost();
	$data['cpm'] = $cpm->getclient11($id);

                  $type_id = $data['cpm']['0']['type'];

               $app_status = $data['cpm']['0']['application_status'];
  $assign_to = $data['cpm']['0']['assign_to'];

  $Team = new Team_model(); 
  //$data['team'] = $Team->getpost();
  $data['team'] = $Team->where('id',$assign_to)
                   ->findAll();


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


		return view('admin/bc_pnp_int_pg/full_view_bc_pnp_int_pg',$data);
}

}