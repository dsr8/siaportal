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


class Tourist_visa_canada extends BaseController
{


public function edit_toutist_visa_canada($category,$id,$sid){


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
    'app_recv'=>$this->request->getPost('app_recv'),
    'study_permit_exp'=>$this->request->getPost('study_permit_exp'),
    'application_status_update'=>date('Y-m-d' ),

   // info_doc_req_date
   'feerp'=>$this->request->getPost('feerp'),
   'doc_await_note'=>$this->request->getPost('doc_await_note'),



   'doc_req_date'=>$this->request->getPost('doc_req_date'),
   'doc_req_on_date'=>$this->request->getPost('doc_req_on_date'),
//
  

   'app_sub_date'=>$this->request->getPost('app_sub_date'),
   'fee'=>$this->request->getPost('fee'),	
	'mode_client_payment'=>$this->request->getPost('mode_client_payment'),	
	'confirm_with'=>$this->request->getPost('confirm_with'),	
	'date_of_payment_recive'=>$this->request->getPost('date_of_payment_recive'),	
	'amount'=>$this->request->getPost('amount'),	
	'client_card_note'=>$this->request->getPost('client_card_note'),

	'application_number'=>$this->request->getPost('app_number'),
	'add_imm_doc_rec'=>$this->request->getPost('add_imm_doc_rec'),

	'job_noc'=>$fee_receipt,	
	'sub_confim'=>$sub_confim,



	'date_bio_reciv'=>$this->request->getPost('date_bio_reciv'),	
	'date_bio_sent'=>$this->request->getPost('date_bio_sent'),	
	'date_bio_comp'=>$this->request->getPost('date_bio_comp'),
	'bio_com_note'=>$this->request->getPost('bio_com_note'),

	//lmia_rec_date
	//lmia_number
	'date_int_req_rec'=>$this->request->getPost('date_int_req_rec'),	
	'date_int_sent_client'=>$this->request->getPost('date_int_sent_client'),	
	'int_req_upload'=>$int_req_upload,
	'date_int_req_com'=>$this->request->getPost('date_int_req_com'),	
	'int_sub_to_ircc'=>$int_sub_to_ircc,	

	

	'refusal_date'=>$this->request->getPost('refusal_date'),	
	'refusal_letter'=>$refusal_letter,

	'date_work_permit'=>$this->request->getPost('date_work_permit'),	
	'approval_letter'=>$this->request->getPost('approval_letter'),	


	/////

	//'medical_note'=>$this->request->getPost('medical_note'),
	//'date_work_permit'=>$this->request->getPost('date_work_permit'),	
	//'approval_letter'=>$this->request->getPost('date_for_medical_ten'),	
   //'doc_req_date'=>$this->request->getPost('doc_req_date'),
	//'c_transfer'=>$this->request->getPost('c_transfer'),	
	//'log_in_info_pnp'=>$this->request->getPost('log_in_info'),	
	//'upload_doc'=>$newName,	
	//'date_bio_reciv'=>$this->request->getPost('date_bio_reciv'),	
	//'date_bio_sent'=>$this->request->getPost('date_bio_sent'),	
	//'date_bio_comp'=>$this->request->getPost('date_bio_comp'),
	//'bio_com_note'=>$this->request->getPost('bio_com_note'),
	//'date_for_medical'=>$this->request->getPost('date_for_medical'),	
	//'date_for_medical_ten'=>$this->request->getPost('date_for_medical_ten'),	
	//'medical_note'=>$this->request->getPost('medical_note'),

	'update_on'=>date( 'Y-m-d H:i:s' )
];

$cam = new Client_application_model(); 
$updatee=$cam->update($id, $data);
if($updatee){

$stt=$this->request->getPost('application_status');
if($stt=='326') {


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
//$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
    $assign_to = $this->request->getPost('assign_to');

                         $TM = new Team_model(); 
		//$data['team'] = $Team->getpost();
		$data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];

                         $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();
	

assign_team_member_to_team($iggd,$name,$fname);

$message1="Assign Team Member id-".$iggd." Name-".$name."";


//$phone = array('17789887731','17782281017','17782575507','17782575508');
$phone = array('919653364499');

 $pcount= count($phone);
//exit();
 send_sms($message1,$phone);
assign_team_member($name,$fname,$tmobile,$cmobile,$email);
//$this->profile_in_process($name,$fname,$tmobile,$cmobile,$email);

 }



 else if($stt=='119') {


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
$study_permit_exp = $this->request->getPost('study_permit_exp');
    //$assign_to = $this->request->getPost('assign_to');

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


$phone = array('919653364499');

 $pcount= count($phone);
//exit();
 send_sms($message1,$phone);

profile_in_process_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }



 if($stt=='120') {


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
//$exp_date_to_apply = $this->request->getPost('exp_date_to_apply');
  //  $assign_to = $this->request->getPost('assign_to');

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

	
documents_awaiting_for_submission_team_mail($iggd,$name,$invitation_date_tantative,$invitation_date_final);

$message1="Hi Team Documents Awaiting For Submission-".$iggd." -Name-".$name." - Final Submission Date-".$invitation_date_final." ";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();
 send_sms($message1,$phone);
documents_awaiting_for_submission_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

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


$phone = array('17789887731','17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();
 send_sms($message1,$phone);

application_submitted_mail_to_client($name,$fname,$tmobile,$cmobile,$email);

 }

if($stt=='123') {


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

$date_bio_reciv=$this->request->getPost('date_bio_reciv');	
	$date_bio_sent=$this->request->getPost('date_bio_sent');	

	

biometric_requested_team_mail($iggd,$name,$date_bio_reciv,$date_bio_sen);
$message1="Hi Team Biometric Requested -".$iggd." -Name-".$name." - Date Of Biometric received-".$date_bio_reciv."Date of Biometric sent to client ".$date_bio_sent."  ";


$phone = array('17789887731','17782281017','17782575507','17782575508');
send_sms($message1,$phone);
biometric_requested_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }

 if($stt=='124') {


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

$date_bio_comp=$this->request->getPost('date_bio_comp');
	$bio_com_note=$this->request->getPost('bio_com_note');

	
biometric_completed_team_mail($iggd,$name,$date_bio_comp,$bio_com_note);

$message1="Hi Team Biometric Completed -".$iggd." -Name-".$name."  Date Of Biometric completed-".$date_bio_comp." ";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 send_sms($message1,$phone);
biometric_completed_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }
if($stt=='125') {


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

 $date_int_req_rec=$this->request->getPost('date_int_req_rec');
 $date_int_sent_client=$this->request->getPost('date_int_sent_client');


	
	

interview_ADR_requested_team_mail($iggd,$name,$date_int_req_rec,$date_int_sent_client);


$message1="Hi Team Interview/ADR Requested-".$iggd." -Name-".$name." - Date Of Request Received-".$date_int_sent_client." ";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 send_sms($message1,$phone);
interview_ADR_requested_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }


 if($stt=='126') {


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

 $date_int_req_com=$this->request->getPost('date_int_req_com');
 

	

interview_ADR_completed_team_mail($iggd,$name,$date_int_req_com);


$message1="Hi Team Interview/ADR Completed-".$iggd." -Name-".$name." - Request Completed Date-".$date_int_req_com." ";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 send_sms($message1,$phone);
interview_ADR_completed_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }





 


 if($stt=='127') {


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

$phone = array('17789887731','17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();
 send_sms($message1,$phone);
//$this->approved($name,$fname,$tmobile,$cmobile,$email);
approve_mail_client($name,$fname,$cmobile,$email,$iggd);

 }
if($stt=='128') {


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
//refused($name,$fname,$tmobile,$cmobile,$email);
 $refusal_letter="";
 refused_mail_client($name,$fname,$cmobile,$email,$refusal_letter);


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


		return view('admin/tourist_visa_canada/edit_tourist_visa_canada',$data);
}
}
///-------------------

public function full_toutist_visa_canada($category,$id,$sid){



 	
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


		return view('admin/tourist_visa_canada/full_view_tourist_visa_canada',$data);
}





}