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



class Intl_stu_spousal_open_wp_outland extends BaseController
{


public function edit_intl_stu_spousal_open_wp_outland($category,$id,$sid){
if ($this->request->getMethod()=='post'){
 if($img = $this->request->getFile('fee_receipt'))
        {
        //	echo"hih";
        	//exit();
            if ($img->isValid() && ! $img->hasMoved())
            {
                $fee_receipt = $img->getRandomName();

                $img->move('./assets/resume', $fee_receipt);                
 $link='https://canada.siaimmigration.com/assets/resume/'.$fee_receipt;
//exit();
}else{
$fee_receipt=$this->request->getPost('fee_receipt_old');
$link='';

}

}

 if($img1 = $this->request->getFile('sub_confim'))
        {
        //	echo"hih";
        	//exit();
            if ($img1->isValid() && ! $img1->hasMoved())
            {
                $sub_confim = $img1->getRandomName();

                $img1->move('./assets/resume', $sub_confim);                
 $approval_doc_link='https://canada.siaimmigration.com/assets/resume/'.$sub_confim;
//exit();
}else{
$sub_confim=$this->request->getPost('sub_confim_old');
$sub_confim_link='';

}

}

//int_req_upload
 if($img2 = $this->request->getFile('int_req_upload'))
        {
        //	echo"hih";
        	//exit();
            if ($img2->isValid() && ! $img2->hasMoved())
            {
                $int_req_upload = $img2->getRandomName();

                $img2->move('./assets/resume', $int_req_upload);                
 $approval_doc_link='https://canada.siaimmigration.com/assets/resume/'.$int_req_upload;
//exit();
}else{
$int_req_upload=$this->request->getPost('int_req_upload_old');
$int_req_upload_link='';

}

}
//int_sub_to_ircc
 if($img3 = $this->request->getFile('int_sub_to_ircc'))
        {
        //	echo"hih";
        	//exit();
            if ($img3->isValid() && ! $img3->hasMoved())
            {
                $int_sub_to_ircc = $img3->getRandomName();

                $img3->move('./assets/resume', $int_sub_to_ircc);                
 $int_sub_to_ircc_link='https://canada.siaimmigration.com/assets/resume/'.$int_sub_to_ircc;
//exit();
}else{
$int_sub_to_ircc=$this->request->getPost('int_sub_to_ircc_old');
$int_sub_to_ircc_link='';

}

}
//refusal_letter

 if($img4 = $this->request->getFile('refusal_letter'))
        {
        //	echo"hih";
        	//exit();
            if ($img4->isValid() && ! $img4->hasMoved())
            {
                $refusal_letter = $img4->getRandomName();

                $img4->move('./assets/resume', $refusal_letter);                
 $refusal_letter_link='https://canada.siaimmigration.com/assets/resume/'.$refusal_letter;
//exit();
}else{
$refusal_letter=$this->request->getPost('refusal_letter_old');
$refusal_letter_link='';

}

}
//approval_letter


 if($img5 = $this->request->getFile('approval_letter'))
        {
        //	echo"hih";
        	//exit();
            if ($img5->isValid() && ! $img5->hasMoved())
            {
                $approval_letter = $img5->getRandomName();

                $img5->move('./assets/resume', $approval_letter);                
 $approval_letter_link='https://canada.siaimmigration.com/assets/resume/'.$approval_letter;
//exit();
}else{
$approval_letter=$this->request->getPost('approval_letter_old');
$approval_letter_link='';

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
    'c_transfer'=>$this->request->getPost('c_transfer'),
    'study_permit_exp'=>$this->request->getPost('study_permit_exp'),
    'application_status_update'=>date('Y-m-d' ),


    'doc_req_date'=>$this->request->getPost('doc_req_date'),
    'feerp'=>$this->request->getPost('feerp'),
     'doc_await_note'=>$this->request->getPost('doc_await_note'),
   

   	'app_sub_date'=>$this->request->getPost('app_sub_date'),	
	'fee'=>$this->request->getPost('fee'),	
	'mode_client_payment'=>$this->request->getPost('mode_client_payment'),	
	'confirm_with'=>$this->request->getPost('confirm_with'),	
	'date_of_payment_recive'=>$this->request->getPost('date_of_payment_recive'),	
	'amount'=>$this->request->getPost('amount'),	
	'client_card_note'=>$this->request->getPost('client_card_note'),	
	'application_number'=>$this->request->getPost('app_number'),
   'free_text'=>$this->request->getPost('free_text'),

	'add_imm_doc_rec'=>$this->request->getPost('add_imm_doc_rec'),
	'job_noc'=>$fee_receipt,	
	'sub_confim'=>$sub_confim,
	//'log_in_info_pnp'=>$this->request->getPost('log_in_info'),	
	//'upload_doc'=>$newName,

	
	'date_bio_reciv'=>$this->request->getPost('date_bio_reciv'),	
	'date_bio_sent'=>$this->request->getPost('date_bio_sent'),	

	'date_bio_comp'=>$this->request->getPost('date_bio_comp'),
	'bio_com_note'=>$this->request->getPost('bio_com_note'),


	'date_int_req_rec'=>$this->request->getPost('date_int_req_rec'),	
	'date_int_sent_client'=>$this->request->getPost('date_int_sent_client'),	
	'int_req_upload'=>$int_req_upload,	
	
	'date_int_req_com'=>$this->request->getPost('date_int_req_com'),	
	'int_sub_to_ircc'=>$int_sub_to_ircc,

	'date_for_medical'=>$this->request->getPost('date_for_medical'),	
	'date_for_medical_ten'=>$this->request->getPost('date_for_medical_ten'),	
	'medical_note'=>$this->request->getPost('medical_note'),


	'refusal_date'=>$this->request->getPost('refusal_date'),	
	'refusal_letter'=>$refusal_letter,	
	//'medical_note'=>$this->request->getPost('medical_note'),


	'date_work_permit'=>$this->request->getPost('date_work_permit'),	
	'approval_letter'=>$this->request->getPost('date_for_medical_ten'),	

  'gc_username'=>$this->request->getPost('gc_username'),
    'gc_password'=>$this->request->getPost('gc_password'),

   'application_number'=>$this->request->getPost('app_number'),
  'add_imm_doc_rec'=>$this->request->getPost('add_imm_doc_rec'),
    
	



	

	

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

if($stt=='45') {


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
$app_recv=$this->request->getPost('app_recv');
    $c_transfer=$this->request->getPost('c_transfer');
    $study_permit_exp=$this->request->getPost('study_permit_exp');
    
 	

	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Application in Process id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
                    $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Application in Process <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Expected Date To Apply : ' .$exp_date_to_apply.'<br>';
					$message .= 'Assign Team Member : ' .$fname.'<br>';	
					$message .= 'Accepted Date Of Submission : ' .$app_recv.'<br>';	
					$message .= 'Study Permit Expiry Date : ' .$study_permit_exp.'<br>';	
					$message .= 'College Transfer Required : ' .$c_transfer.'<br>';	
	
	@mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com,care@siaimmigration.com',$subject,$message,$headers);


$message1="Application in Process  id-".$iggd." Name-".$name."  Assign Team Member-".$fname."";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');
send_sms($message1,$phone);
//$this->profile_in_process($name,$fname,$tmobile,$cmobile,$email);


profile_in_process_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }

if($stt=='56') {


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

 	$doc_req_date=$this->request->getPost('doc_req_date');
    $feerp=$this->request->getPost('feerp');
     $doc_await_note=$this->request->getPost('doc_await_note');
   

	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

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
					$message .= 'Document Awaiting for Submission<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Document Requested Date : ' .$doc_req_date.'<br>';
					$message .= 'Fee Received Or Pending : ' .$feerp.'<br>';	
					$message .= 'Note : ' .$doc_await_note.'<br>';	
					

	
	@mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com,care@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Document Awaiting for Submission id-".$iggd." -Name-".$name." - Document Requested Date-".$doc_req_date."Fee Received Or Pending-".$feerp."  ";

//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');
 send_sms($message1,$phone);
profile_created_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }

  if($stt=='57') {


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


application_submitted_mail_team($iggd,$name,$fee,$app_sub_date,$mode_client_payment,$date_of_payment_recive,$confirm_with,$amount,$fee_receipt,$sub_confim);

$message1="Hi Team Application submitted-".$iggd." -Name-".$name." - Date Of Application Submitted-".$app_sub_date." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');
 send_sms($message1,$phone);
//$this->application_submitted($name,$fname,$tmobile,$cmobile,$email);
application_submitted_mail_to_client($name,$fname,$tmobile,$cmobile,$email);
 }

 if($stt=='58') {


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

	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Biometric Requested id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
                    $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Biometric Requested<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
				$message .= 'Date Of Biometric received : ' .$date_bio_reciv.'<br>';
				$message .= 'Date of Biometric sent to client : ' .$date_bio_sent.'<br>';
				
					
	
	@mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com,care@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Biometric Requested -".$iggd." -Name-".$name." - Date Of Biometric received-".$date_bio_reciv."Date of Biometric sent to client ".$date_bio_sent."  ";


$phone = //17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');

$phone = array('12368661740');
send_sms($message1,$phone);
biometric_requested_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }

 if($stt=='59') {


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

	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Biometric Completed id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";

                    $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Biometric Completed<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date Of Biometric completed : ' .$date_bio_comp.'<br>';
					$message .= 'Note : ' .$bio_com_note.'<br>';
			
				
					
	
	@mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com,care@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Biometric Completed -".$iggd." -Name-".$name."  Date Of Biometric completed-".$date_bio_comp." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');
 send_sms($message1,$phone);
biometric_completed_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }
  if($stt=='60') {


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

	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Interview/ADR Requested id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
                    $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Interview/ADR Requested<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date Of Request Received : ' .$date_int_req_rec.'<br>';
					$message .= 'Date Of Request Sent To Client : ' .$date_int_sent_client.'<br>';

				
					
	
	@mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com,care@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Interview/ADR Requested -".$iggd." -Name-".$name." Date Of Request Received -".$date_int_req_rec." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');
 send_sms($message1,$phone);
interview_ADR_requested_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }


  if($stt=='61') {


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

	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Interview/ADR Completed id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";
                    $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Interview/ADR Completed<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Request Completed Date : ' .$date_int_req_com.'<br>';
			
				
					
	
	@mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com,care@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Interview/ADR Completed -".$iggd." -Name-".$name." Request Completed Date -".$date_int_req_com." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');
 send_sms($message1,$phone);
//biometric_completed_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);
interview_ADR_completed_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }


 
 
if($stt=='62') {


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
                      //exit();

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
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
                    $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Medical requested <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date For Medical : ' .$date_for_medical.'<br>';
					$message .= 'Date For Medical Tentative : ' .$date_for_medical_ten.'<br>';
					$message .= 'Notes : ' .$medical_note.'<br>';
				
	
	@mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com,care@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Medical requested -".$iggd." -Name-".$name." Date For Medical  -".$date_for_medical." Date For Medical Tentative".$date_for_medical_ten." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');

$phone = array('12368661740');
send_sms($message1,$phone);
medical_requested_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);


 }


 if($stt=='64') {


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

		$date_work_permit=$this->request->getPost('date_work_permit');
	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Approved id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
                    $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Approved <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date Of Work Permit Received Untill : ' .$date_work_permit.'<br>';
				//	$message .= 'Note : ' .$approve_note.'<br>';
					
					
				
	
	@mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com,care@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Approved -".$iggd." -Name-".$name." Date Of Work Permit Received Untill  -".$date_work_permit." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');
send_sms($message1,$phone);

approve_mail_client($name,$fname,$tmobile,$cmobile,$email);

 }
if($stt=='65') {


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

		$refusal_date=$this->request->getPost('refusal_date');
	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Refused id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
                    $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Refused <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date Of Refusal : ' .$refusal_date.'<br>';
					
					
				
	
	@mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com,care@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Refused -".$iggd." -Name-".$name." Date Of Refusal  -".$refusal_date." ";


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


		return view('admin/intl_stu_spousal_open_wp_outland/edit_intl_stu_spousal_open_wp_outland',$data);
}
}
///-------------------





//////////new start
public function edit_intl_stu_spousal_open_wp_outland_new($category,$id,$sid){
if ($this->request->getMethod()=='post'){
 if($img = $this->request->getFile('fee_receipt'))
        {
        //	echo"hih";
        	//exit();
            if ($img->isValid() && ! $img->hasMoved())
            {
                $fee_receipt = $img->getRandomName();

                $img->move('./assets/resume', $fee_receipt);                
 $link='https://canada.siaimmigration.com/assets/resume/'.$fee_receipt;
//exit();
}else{
$fee_receipt=$this->request->getPost('fee_receipt_old');
$link='';

}

}

 if($img1 = $this->request->getFile('sub_confim'))
        {
        //	echo"hih";
        	//exit();
            if ($img1->isValid() && ! $img1->hasMoved())
            {
                $sub_confim = $img1->getRandomName();

                $img1->move('./assets/resume', $sub_confim);                
 $approval_doc_link='https://canada.siaimmigration.com/assets/resume/'.$sub_confim;
//exit();
}else{
$sub_confim=$this->request->getPost('sub_confim_old');
$sub_confim_link='';

}

}

//int_req_upload
 if($img2 = $this->request->getFile('int_req_upload'))
        {
        //	echo"hih";
        	//exit();
            if ($img2->isValid() && ! $img2->hasMoved())
            {
                $int_req_upload = $img2->getRandomName();

                $img2->move('./assets/resume', $int_req_upload);                
 $approval_doc_link='https://canada.siaimmigration.com/assets/resume/'.$int_req_upload;
//exit();
}else{
$int_req_upload=$this->request->getPost('int_req_upload_old');
$int_req_upload_link='';

}

}
//int_sub_to_ircc
 if($img3 = $this->request->getFile('int_sub_to_ircc'))
        {
        //	echo"hih";
        	//exit();
            if ($img3->isValid() && ! $img3->hasMoved())
            {
                $int_sub_to_ircc = $img3->getRandomName();

                $img3->move('./assets/resume', $int_sub_to_ircc);                
 $int_sub_to_ircc_link='https://canada.siaimmigration.com/assets/resume/'.$int_sub_to_ircc;
//exit();
}else{
$int_sub_to_ircc=$this->request->getPost('int_sub_to_ircc_old');
$int_sub_to_ircc_link='';

}

}
//refusal_letter

 if($img4 = $this->request->getFile('refusal_letter'))
        {
        //	echo"hih";
        	//exit();
            if ($img4->isValid() && ! $img4->hasMoved())
            {
                $refusal_letter = $img4->getRandomName();

                $img4->move('./assets/resume', $refusal_letter);                
 $refusal_letter_link='https://canada.siaimmigration.com/assets/resume/'.$refusal_letter;
//exit();
}else{
$refusal_letter=$this->request->getPost('refusal_letter_old');
$refusal_letter_link='';

}

}
//approval_letter


 if($img5 = $this->request->getFile('approval_letter'))
        {
        //	echo"hih";
        	//exit();
            if ($img5->isValid() && ! $img5->hasMoved())
            {
                $approval_letter = $img5->getRandomName();

                $img5->move('./assets/resume', $approval_letter);                
 $approval_letter_link='https://canada.siaimmigration.com/assets/resume/'.$approval_letter;
//exit();
}else{
$approval_letter=$this->request->getPost('approval_letter_old');
$approval_letter_link='';

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
    'c_transfer'=>$this->request->getPost('c_transfer'),
    'study_permit_exp'=>$this->request->getPost('study_permit_exp'),
    'application_status_update'=>date('Y-m-d' ),


    'doc_req_date'=>$this->request->getPost('doc_req_date'),
    'feerp'=>$this->request->getPost('feerp'),
     'doc_await_note'=>$this->request->getPost('doc_await_note'),
   

   	'app_sub_date'=>$this->request->getPost('app_sub_date'),	
	'fee'=>$this->request->getPost('fee'),	
	'mode_client_payment'=>$this->request->getPost('mode_client_payment'),	
	'confirm_with'=>$this->request->getPost('confirm_with'),	
	'date_of_payment_recive'=>$this->request->getPost('date_of_payment_recive'),	
	'amount'=>$this->request->getPost('amount'),	
	'client_card_note'=>$this->request->getPost('client_card_note'),	
	'application_number'=>$this->request->getPost('app_number'),
   'free_text'=>$this->request->getPost('free_text'),

	'add_imm_doc_rec'=>$this->request->getPost('add_imm_doc_rec'),
	'job_noc'=>$fee_receipt,	
	'sub_confim'=>$sub_confim,
	//'log_in_info_pnp'=>$this->request->getPost('log_in_info'),	
	//'upload_doc'=>$newName,

	
	'date_bio_reciv'=>$this->request->getPost('date_bio_reciv'),	
	'date_bio_sent'=>$this->request->getPost('date_bio_sent'),	

	'date_bio_comp'=>$this->request->getPost('date_bio_comp'),
	'bio_com_note'=>$this->request->getPost('bio_com_note'),


	'date_int_req_rec'=>$this->request->getPost('date_int_req_rec'),	
	'date_int_sent_client'=>$this->request->getPost('date_int_sent_client'),	
	'int_req_upload'=>$int_req_upload,	
	
	'date_int_req_com'=>$this->request->getPost('date_int_req_com'),	
	'int_sub_to_ircc'=>$int_sub_to_ircc,

	'date_for_medical'=>$this->request->getPost('date_for_medical'),	
	'date_for_medical_ten'=>$this->request->getPost('date_for_medical_ten'),	
	'medical_note'=>$this->request->getPost('medical_note'),


	'refusal_date'=>$this->request->getPost('refusal_date'),	
	'refusal_letter'=>$refusal_letter,	
	//'medical_note'=>$this->request->getPost('medical_note'),


	'date_work_permit'=>$this->request->getPost('date_work_permit'),	
	'approval_letter'=>$this->request->getPost('date_for_medical_ten'),	

  'gc_username'=>$this->request->getPost('gc_username'),
    'gc_password'=>$this->request->getPost('gc_password'),

   'application_number'=>$this->request->getPost('app_number'),
  'add_imm_doc_rec'=>$this->request->getPost('add_imm_doc_rec'),
    
	



	

	

	'update_on'=>date( 'Y-m-d H:i:s' )
];

$cam = new Client_application_model(); 
$updatee=$cam->update($id, $data);


if($updatee){

	
$stt=$this->request->getPost('application_status');

if($stt=='45') {


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
$app_recv=$this->request->getPost('app_recv');
    $c_transfer=$this->request->getPost('c_transfer');
    $study_permit_exp=$this->request->getPost('study_permit_exp');
    
 	

	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Application in Process id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
                    $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Application in Process <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Expected Date To Apply : ' .$exp_date_to_apply.'<br>';
					$message .= 'Assign Team Member : ' .$fname.'<br>';	
					$message .= 'Accepted Date Of Submission : ' .$app_recv.'<br>';	
					$message .= 'Study Permit Expiry Date : ' .$study_permit_exp.'<br>';	
					$message .= 'College Transfer Required : ' .$c_transfer.'<br>';	
	
	@mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com,care@siaimmigration.com',$subject,$message,$headers);


$message1="Application in Process  id-".$iggd." Name-".$name."  Assign Team Member-".$fname."";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');
send_sms($message1,$phone);
//$this->profile_in_process($name,$fname,$tmobile,$cmobile,$email);


profile_in_process_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }

if($stt=='56') {


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

 	$doc_req_date=$this->request->getPost('doc_req_date');
    $feerp=$this->request->getPost('feerp');
     $doc_await_note=$this->request->getPost('doc_await_note');
   

	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

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
					$message .= 'Document Awaiting for Submission<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Document Requested Date : ' .$doc_req_date.'<br>';
					$message .= 'Fee Received Or Pending : ' .$feerp.'<br>';	
					$message .= 'Note : ' .$doc_await_note.'<br>';	
					

	
	@mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com,care@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Document Awaiting for Submission id-".$iggd." -Name-".$name." - Document Requested Date-".$doc_req_date."Fee Received Or Pending-".$feerp."  ";

//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');
 send_sms($message1,$phone);
profile_created_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }

  if($stt=='57') {


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


application_submitted_mail_team($iggd,$name,$fee,$app_sub_date,$mode_client_payment,$date_of_payment_recive,$confirm_with,$amount,$fee_receipt,$sub_confim);

$message1="Hi Team Application submitted-".$iggd." -Name-".$name." - Date Of Application Submitted-".$app_sub_date." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');
 send_sms($message1,$phone);
//$this->application_submitted($name,$fname,$tmobile,$cmobile,$email);
application_submitted_mail_to_client($name,$fname,$tmobile,$cmobile,$email);
 }

 if($stt=='58') {


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

	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Biometric Requested id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
                    $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Biometric Requested<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
				$message .= 'Date Of Biometric received : ' .$date_bio_reciv.'<br>';
				$message .= 'Date of Biometric sent to client : ' .$date_bio_sent.'<br>';
				
					
	
	@mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com,care@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Biometric Requested -".$iggd." -Name-".$name." - Date Of Biometric received-".$date_bio_reciv."Date of Biometric sent to client ".$date_bio_sent."  ";


$phone = //17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');

$phone = array('12368661740');
send_sms($message1,$phone);
biometric_requested_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }

 if($stt=='59') {


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

	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Biometric Completed id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";

                    $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Biometric Completed<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date Of Biometric completed : ' .$date_bio_comp.'<br>';
					$message .= 'Note : ' .$bio_com_note.'<br>';
			
				
					
	
	@mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com,care@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Biometric Completed -".$iggd." -Name-".$name."  Date Of Biometric completed-".$date_bio_comp." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');
 send_sms($message1,$phone);
biometric_completed_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }
  if($stt=='60') {


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

	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Interview/ADR Requested id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
                    $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Interview/ADR Requested<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date Of Request Received : ' .$date_int_req_rec.'<br>';
					$message .= 'Date Of Request Sent To Client : ' .$date_int_sent_client.'<br>';

				
					
	
	@mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com,care@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Interview/ADR Requested -".$iggd." -Name-".$name." Date Of Request Received -".$date_int_req_rec." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');
 send_sms($message1,$phone);
interview_ADR_requested_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }


  if($stt=='61') {


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

	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Interview/ADR Completed id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";
                    $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Interview/ADR Completed<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Request Completed Date : ' .$date_int_req_com.'<br>';
			
				
					
	
	@mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com,care@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Interview/ADR Completed -".$iggd." -Name-".$name." Request Completed Date -".$date_int_req_com." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');
 send_sms($message1,$phone);
//biometric_completed_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);
interview_ADR_completed_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }


 
 
if($stt=='62') {


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
                      //exit();

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
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
                    $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Medical requested <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date For Medical : ' .$date_for_medical.'<br>';
					$message .= 'Date For Medical Tentative : ' .$date_for_medical_ten.'<br>';
					$message .= 'Notes : ' .$medical_note.'<br>';
				
	
	@mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com,care@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Medical requested -".$iggd." -Name-".$name." Date For Medical  -".$date_for_medical." Date For Medical Tentative".$date_for_medical_ten." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');

$phone = array('12368661740');
send_sms($message1,$phone);
medical_requested_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);


 }


 if($stt=='64') {


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

		$date_work_permit=$this->request->getPost('date_work_permit');
	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Approved id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
                    $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Approved <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date Of Work Permit Received Untill : ' .$date_work_permit.'<br>';
				//	$message .= 'Note : ' .$approve_note.'<br>';
					
					
				
	
	@mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com,care@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Approved -".$iggd." -Name-".$name." Date Of Work Permit Received Untill  -".$date_work_permit." ";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');
send_sms($message1,$phone);

approve_mail_client($name,$fname,$tmobile,$cmobile,$email);

 }
if($stt=='65') {


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

		$refusal_date=$this->request->getPost('refusal_date');
	$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					$subject  = "Refused id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
                    $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Refused <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date Of Refusal : ' .$refusal_date.'<br>';
					
					
				
	
	@mail('office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com,care@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Refused -".$iggd." -Name-".$name." Date Of Refusal  -".$refusal_date." ";


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


		return view('admin/intl_stu_spousal_open_wp_outland/edit_intl_stu_spousal_open_wp_outland_new',$data);
}
}
///-------------------



//////////new end

public function full_intl_stu_spousal_open_wp_outland($category,$id,$sid){







 
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


		return view('admin/intl_stu_spousal_open_wp_outland/full_view_intl_stu_spousal_open_wp_outland',$data);
}

}