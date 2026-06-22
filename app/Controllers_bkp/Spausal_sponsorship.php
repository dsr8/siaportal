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


class Spausal_sponsorship extends BaseController
{


public function edit_spausal_sponsorship_inland($category,$id,$sid){


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
     'exp_date_to_apply'=>$this->request->getPost('exp_date_to_apply'),
    'assign_to'=>$this->request->getPost('assign_to'),
    'app_recv'=>$this->request->getPost('app_recv'),
    'study_permit_exp'=>$this->request->getPost('study_permit_exp'),
    'application_status_update'=>date('Y-m-d' ),

   // info_doc_req_date
   'feerp'=>$this->request->getPost('feerp'),
   'doc_await_note'=>$this->request->getPost('doc_await_note'),


   'ad_job_start_date'=>$this->request->getPost('ad_job_start_date'),
   'ad_job_end_date'=>$this->request->getPost('ad_job_end_date'),
   'ad_il_start_date'=>$this->request->getPost('ad_il_start_date'),
   'ad_il_end_date'=>$this->request->getPost('ad_il_end_date'),
   'ad_ki_start_date'=>$this->request->getPost('ad_ki_start_date'),
   'ad_ki_end_date'=>$this->request->getPost('ad_ki_end_date'),
   'ad_ca_start_date'=>$this->request->getPost('ad_ca_start_date'),
   'ad_ca_end_date'=>$this->request->getPost('ad_ca_end_date'),
   'ad_oa_start_date'=>$this->request->getPost('ad_oa_start_date'),
   'ad_oa_end_date'=>$this->request->getPost('ad_oa_end_date'),

   'doc_req_date'=>$this->request->getPost('doc_req_date'),
//doc_req_on_date
   'st_job_start_date'=>$this->request->getPost('st_job_start_date'),
   'st_job_end_date'=>$this->request->getPost('st_job_end_date'),
   'st_il_start_date'=>$this->request->getPost('st_il_start_date'),
   'st_il_end_date'=>$this->request->getPost('st_il_end_date'),
   'st_ki_start_date'=>$this->request->getPost('st_ki_start_date'),
   'st_ki_end_date'=>$this->request->getPost('st_ki_end_date'),
   'st_ca_start_date'=>$this->request->getPost('st_ca_start_date'),
   'st_ca_end_date'=>$this->request->getPost('st_ca_end_date'),
   'st_oa_start_date'=>$this->request->getPost('st_oa_start_date'),
   'st_oa_end_date'=>$this->request->getPost('st_oa_end_date'),

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

	//lmia_rec_date
	//lmia_number
	'date_int_req_rec'=>$this->request->getPost('date_int_req_rec'),	
	'date_int_sent_client'=>$this->request->getPost('date_int_sent_client'),	
	'int_req_upload'=>$int_req_upload,
	'date_int_req_com'=>$this->request->getPost('date_int_req_com'),	
	'int_sub_to_ircc'=>$int_sub_to_ircc,	

	'stt_job_start_date'=>$this->request->getPost('stt_job_start_date'),
   'stt_job_end_date'=>$this->request->getPost('stt_job_end_date'),
   'stt_il_start_date'=>$this->request->getPost('stt_il_start_date'),
   'stt_il_end_date'=>$this->request->getPost('stt_il_end_date'),
   'stt_ki_start_date'=>$this->request->getPost('stt_ki_start_date'),
   'stt_ki_end_date'=>$this->request->getPost('stt_ki_end_date'),
   'stt_ca_start_date'=>$this->request->getPost('stt_ca_start_date'),
   'stt_ca_end_date'=>$this->request->getPost('stt_ca_end_date'),
   'stt_oa_start_date'=>$this->request->getPost('stt_oa_start_date'),
   'stt_oa_end_date'=>$this->request->getPost('stt_oa_end_date'),

	'refusal_date'=>$this->request->getPost('refusal_date'),	
	'refusal_letter'=>$refusal_letter,


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

 	

	$From="Sia Immigration";
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Assign Team Member id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Assign Team Member <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					//$message .= 'Expected Date To Apply : ' .$exp_date_to_apply.'<br>';
					$message .= 'Assign Team Member : ' .$fname.'<br>';	
	
	//@mail('ds@siaimmigration.com,mj@siaimmigration.com',$subject,$message,$headers);
@mail('ds@siaimmigration.com',$subject,$message,$headers);


$message1="Assign Team Member id-".$iggd." Name-".$name."";


//$phone = array('919653364499','17782575709');
$phone = array('919653364499');

 $pcount= count($phone);
//exit();

for($i='0';$i< $pcount;$i++){


	 $mobile_number=$phone[$i];
	//exit();
	
		$curl = curl_init();


curl_setopt_array($curl, array(
 CURLOPT_URL => "https://www.thetexting.com/rest/sms/json/message/send",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "api_secret=brx3ztor17j69we&api_key=brx3ztor17j69we&from=17809008874&to=".$mobile_number."&text=".urlencode($message1)."&type=text",
 CURLOPT_HTTPHEADER => array(
 "cache-control: no-cache",
 "content-type: application/x-www-form-urlencoded",
 ),
));


$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

}

//$this->profile_in_process($name,$fname,$tmobile,$cmobile,$email);

 }



 else if($stt=='314') {


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

 	

	$From="Sia Immigration";
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Profile in Process id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Profile in Process <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date Of Application Received : ' .$app_recv.'<br>';
					$message .= 'Information Request Sent On : ' .$exp_date_to_apply.'<br>';
					$message .= 'Advertisement Cost Invoice Sent On : ' .$study_permit_exp.'<br>';	
	
	@mail('ds@siaimmigration.com',$subject,$message,$headers);


$message1="Profile in Process id-".$iggd." Name-".$name."";


$phone = array('919653364499');

 $pcount= count($phone);
//exit();

for($i='0';$i< $pcount;$i++){


	 $mobile_number=$phone[$i];
	//exit();
	
		$curl = curl_init();


curl_setopt_array($curl, array(
 CURLOPT_URL => "https://www.thetexting.com/rest/sms/json/message/send",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "api_secret=brx3ztor17j69we&api_key=brx3ztor17j69we&from=17809008874&to=".$mobile_number."&text=".urlencode($message1)."&type=text",
 CURLOPT_HTTPHEADER => array(
 "cache-control: no-cache",
 "content-type: application/x-www-form-urlencoded",
 ),
));


$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

}

$this->profile_in_process($name,$fname,$tmobile,$cmobile,$email);

 }



else if($stt=='315') {


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
$info_doc_req_date = $this->request->getPost('info_doc_req_date');
    $feerp = $this->request->getPost('feerp');
     $doc_await_note = $this->request->getPost('doc_await_note');

                         $TM = new Team_model(); 
		//$data['team'] = $Team->getpost();
		$data['tm'] = $TM->where('id',$assign_to)
                   ->findAll();
                        $fname= $data['tm']['0']['firstname'];

                         $tmobile= $data['tm']['0']['mobile_no'];
                         //$iggd= $data['pm']['0']['id'];
                      //exit();

 	

	$From="Sia Immigration";
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Information Requested For Advertisement id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Information Requested For Advertisement <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Information Received On : ' .$info_doc_req_date.'<br>';
					$message .= 'Fee Received Or Pending : ' .$feerp.'<br>';	
					$message .= 'Advertisement Fees Paid Invoice Number : ' .$doc_await_note.'<br>';	
	
	@mail('ds@siaimmigration.com',$subject,$message,$headers);


$message1="Information Requested For Advertisement id-".$iggd." Name-".$name."";


$phone = array('919653364499');

 $pcount= count($phone);
//exit();

for($i='0';$i< $pcount;$i++){


	 $mobile_number=$phone[$i];
	//exit();
	
		$curl = curl_init();


curl_setopt_array($curl, array(
 CURLOPT_URL => "https://www.thetexting.com/rest/sms/json/message/send",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "api_secret=brx3ztor17j69we&api_key=brx3ztor17j69we&from=17809008874&to=".$mobile_number."&text=".urlencode($message1)."&type=text",
 CURLOPT_HTTPHEADER => array(
 "cache-control: no-cache",
 "content-type: application/x-www-form-urlencoded",
 ),
));


$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

}

//$this->profile_in_process($name,$fname,$tmobile,$cmobile,$email);

 }

if($stt=='316') {


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

 	$ad_job_start_date=$this->request->getPost('ad_job_start_date');
	$ad_job_end_date=$this->request->getPost('ad_job_end_date');
	$ad_il_start_date=$this->request->getPost('ad_il_start_date');
	$ad_il_end_date= $this->request->getPost('ad_il_end_date');	
	$ad_ki_start_date = $this->request->getPost('ad_ki_start_date');
	$ad_ki_end_date = $this->request->getPost('ad_ki_end_date');

	$ad_ca_start_date = $this->request->getPost('ad_ca_start_date');
	$ad_ca_end_date = $this->request->getPost('ad_ca_end_date');
	$ad_oa_start_date = $this->request->getPost('ad_oa_start_date');
	$ad_oa_end_date = $this->request->getPost('ad_oa_end_date');

	
	$From="Sia Immigration";
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Advertisement Started id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Advertisement Started<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Job Bank Advertisement : <br>';
					$message .= 'Start Date : ' .$ad_job_start_date.'<br>';
					$message .= 'End Date : ' .$ad_job_end_date.'<br>';	
					$message .= 'Ingenious Link Advertisement : <br>';
					$message .= 'Start Date : ' .$ad_il_start_date.'<br>';
					$message .= 'End Date : ' .$ad_il_end_date.'<br>';	
					$message .= 'Kijiji Advertisement : <br>';
					$message .= 'Start Date : ' .$ad_ki_start_date.'<br>';
					$message .= 'End Date : ' .$ad_ki_end_date.'<br>';	
					$message .= 'Craigslist Advertisement : <br>';
					$message .= 'Start Date : ' .$ad_ca_start_date.'<br>';
					$message .= 'End Date : ' .$ad_ca_end_date.'<br>';	
					$message .= 'Other Advertisement : <br>';
					$message .= 'Start Date : ' .$ad_oa_start_date.'<br>';
					$message .= 'End Date : ' .$ad_oa_end_date.'<br>';	

					

	
	@mail('ds@siaimmigration.com',$subject,$message,$headers);
//@mail('ds@siaimmigration.com,mj@siaimmigration.com',$subject,$message,$headers);

$message1="Hi Team Advertisement Started id-".$iggd." -Name-".$name." ";


$phone = array('919653364499');
//$phone = array('919653364499','17782575709');

 $pcount= count($phone);
//exit();

for($i='0';$i< $pcount;$i++){


	 $mobile_number=$phone[$i];
	//exit();
	
		$curl = curl_init();


curl_setopt_array($curl, array(
 CURLOPT_URL => "https://www.thetexting.com/rest/sms/json/message/send",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "api_secret=brx3ztor17j69we&api_key=brx3ztor17j69we&from=17809008874&to=".$mobile_number."&text=".urlencode($message1)."&type=text",
 CURLOPT_HTTPHEADER => array(
 "cache-control: no-cache",
 "content-type: application/x-www-form-urlencoded",
 ),
));


$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

}
//$this->profile_created($name,$fname,$tmobile,$cmobile,$email);

 }
 if($stt=='31711') {


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

	$From="Sia Immigration";
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Documents Awaiting For Submission id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Documents Awaiting For Submission<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Tentative Submission Date : ' .$invitation_date_tantative.'<br>';
					$message .= 'Final Submission Date : ' .$invitation_date_final.'<br>';	
					

	@mail('ds@siaimmigration.com',$subject,$message,$headers);
	//@mail('ds@siaimmigration.com,mj@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Documents Awaiting For Submission-".$iggd." -Name-".$name." - Final Submission Date-".$invitation_date_final." ";


$phone = array('919653364499','17782575709');

 $pcount= count($phone);
//exit();

for($i='0';$i< $pcount;$i++){


	 $mobile_number=$phone[$i];
	//exit();
	
		$curl = curl_init();


curl_setopt_array($curl, array(
 CURLOPT_URL => "https://www.thetexting.com/rest/sms/json/message/send",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "api_secret=brx3ztor17j69we&api_key=brx3ztor17j69we&from=17809008874&to=".$mobile_number."&text=".urlencode($message1)."&type=text",
 CURLOPT_HTTPHEADER => array(
 "cache-control: no-cache",
 "content-type: application/x-www-form-urlencoded",
 ),
));


$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

}
$this->invitation_received($name,$fname,$tmobile,$cmobile,$email);

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
					 $emaill="mkj@siaimmigration.com";
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
					
	
	@mail('ds@siaimmigration.com,mj@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Invitation withdrawn-".$iggd." -Name-".$name." - Reason-".$invit_withdrawn_reason." ";


$phone = array('919653364499','17782575709');

 $pcount= count($phone);
//exit();

for($i='0';$i< $pcount;$i++){


	 $mobile_number=$phone[$i];
	//exit();
	
		$curl = curl_init();


curl_setopt_array($curl, array(
 CURLOPT_URL => "https://www.thetexting.com/rest/sms/json/message/send",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "api_secret=brx3ztor17j69we&api_key=brx3ztor17j69we&from=17809008874&to=".$mobile_number."&text=".urlencode($message1)."&type=text",
 CURLOPT_HTTPHEADER => array(
 "cache-control: no-cache",
 "content-type: application/x-www-form-urlencoded",
 ),
));


$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

}

$this->invitation_withdrawn($name,$fname,$tmobile,$cmobile,$invit_withdrawn_reason,$email);
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
					 $emaill="mkj@siaimmigration.com";
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

					
	
	@mail('ds@siaimmigration.com,mj@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Application submitted-".$iggd." -Name-".$name." - Date Of Application Submitted-".$app_sub_date." ";


$phone = array('919653364499','17782575709');

 $pcount= count($phone);
//exit();

for($i='0';$i< $pcount;$i++){


	 $mobile_number=$phone[$i];
	//exit();
	
		$curl = curl_init();


curl_setopt_array($curl, array(
 CURLOPT_URL => "https://www.thetexting.com/rest/sms/json/message/send",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "api_secret=brx3ztor17j69we&api_key=brx3ztor17j69we&from=17809008874&to=".$mobile_number."&text=".urlencode($message1)."&type=text",
 CURLOPT_HTTPHEADER => array(
 "cache-control: no-cache",
 "content-type: application/x-www-form-urlencoded",
 ),
));


$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

}
$this->application_submitted($name,$fname,$tmobile,$cmobile,$email);

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
					 $emaill="mkj@siaimmigration.com";
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
				
					
	
	@mail('ds@siaimmigration.com,mj@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Adr BCPNP -".$iggd." -Name-".$name." - Adr Deadline-".$adr_deadline." ";


$phone = array('919653364499','17782575709');

 $pcount= count($phone);
//exit();

for($i='0';$i< $pcount;$i++){


	 $mobile_number=$phone[$i];
	//exit();
	
		$curl = curl_init();


curl_setopt_array($curl, array(
 CURLOPT_URL => "https://www.thetexting.com/rest/sms/json/message/send",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "api_secret=brx3ztor17j69we&api_key=brx3ztor17j69we&from=17809008874&to=".$mobile_number."&text=".urlencode($message1)."&type=text",
 CURLOPT_HTTPHEADER => array(
 "cache-control: no-cache",
 "content-type: application/x-www-form-urlencoded",
 ),
));


$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

}

$this->Adr_BCPNP($name,$fname,$tmobile,$cmobile,$email);
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
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Nomination Approved id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Nomination Approved<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
			
				
					
	
	@mail('ds@siaimmigration.com,mj@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Nomination Approved -".$iggd." -Name-".$name."  ";


$phone = array('919653364499','17782575709');

 $pcount= count($phone);
//exit();

for($i='0';$i< $pcount;$i++){


	 $mobile_number=$phone[$i];
	//exit();
	
		$curl = curl_init();


curl_setopt_array($curl, array(
 CURLOPT_URL => "https://www.thetexting.com/rest/sms/json/message/send",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "api_secret=brx3ztor17j69we&api_key=brx3ztor17j69we&from=17809008874&to=".$mobile_number."&text=".urlencode($message1)."&type=text",
 CURLOPT_HTTPHEADER => array(
 "cache-control: no-cache",
 "content-type: application/x-www-form-urlencoded",
 ),
));


$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

}
$this->nomination_approved($name,$fname,$tmobile,$cmobile,$email);

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
					 $emaill="mkj@siaimmigration.com";
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
			
				
					
	
	@mail('ds@siaimmigration.com,mj@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Nomination refused -".$iggd." -Name-".$name." Reason -".$nomination_refused_reason." ";


$phone = array('919653364499','17782575709');

 $pcount= count($phone);
//exit();

for($i='0';$i< $pcount;$i++){


	 $mobile_number=$phone[$i];
	//exit();
	
		$curl = curl_init();


curl_setopt_array($curl, array(
 CURLOPT_URL => "https://www.thetexting.com/rest/sms/json/message/send",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "api_secret=brx3ztor17j69we&api_key=brx3ztor17j69we&from=17809008874&to=".$mobile_number."&text=".urlencode($message1)."&type=text",
 CURLOPT_HTTPHEADER => array(
 "cache-control: no-cache",
 "content-type: application/x-www-form-urlencoded",
 ),
));


$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

}
$this->nomination_refused($name,$fname,$tmobile,$cmobile,$email);

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
					 $emaill="mkj@siaimmigration.com";
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
			
				
					
	
	@mail('ds@siaimmigration.com,mj@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Federal Application Sent -".$iggd." -Name-".$name." Application Sent Date -".$app_sent_date." ";


$phone = array('919653364499','17782575709');

 $pcount= count($phone);
//exit();

for($i='0';$i< $pcount;$i++){


	 $mobile_number=$phone[$i];
	//exit();
	
		$curl = curl_init();


curl_setopt_array($curl, array(
 CURLOPT_URL => "https://www.thetexting.com/rest/sms/json/message/send",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "api_secret=brx3ztor17j69we&api_key=brx3ztor17j69we&from=17809008874&to=".$mobile_number."&text=".urlencode($message1)."&type=text",
 CURLOPT_HTTPHEADER => array(
 "cache-control: no-cache",
 "content-type: application/x-www-form-urlencoded",
 ),
));


$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

}
$this->federal_application_sent($name,$fname,$tmobile,$cmobile,$email);

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
					 $emaill="mkj@siaimmigration.com";
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
				
					
	
	@mail('ds@siaimmigration.com,mj@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team AOR IRCC -".$iggd." -Name-".$name." Application Number  -".$aor_app_number."Application Date=".$aor_app_date." ";


$phone = array('919653364499','17782575709');

 $pcount= count($phone);
//exit();

for($i='0';$i< $pcount;$i++){


	 $mobile_number=$phone[$i];
	//exit();
	
		$curl = curl_init();


curl_setopt_array($curl, array(
 CURLOPT_URL => "https://www.thetexting.com/rest/sms/json/message/send",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "api_secret=brx3ztor17j69we&api_key=brx3ztor17j69we&from=17809008874&to=".$mobile_number."&text=".urlencode($message1)."&type=text",
 CURLOPT_HTTPHEADER => array(
 "cache-control: no-cache",
 "content-type: application/x-www-form-urlencoded",
 ),
));


$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

}
$this->AOR_IRCC($name,$fname,$tmobile,$cmobile,$email);

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
					 $emaill="mkj@siaimmigration.com";
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
				
	
	@mail('ds@siaimmigration.com,mj@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team ADR IRCC -".$iggd." -Name-".$name." Submission Date  -".$adr_submission_date." ";


$phone = array('919653364499','17782575709');

 $pcount= count($phone);
//exit();

for($i='0';$i< $pcount;$i++){


	 $mobile_number=$phone[$i];
	//exit();
	
		$curl = curl_init();


curl_setopt_array($curl, array(
 CURLOPT_URL => "https://www.thetexting.com/rest/sms/json/message/send",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "api_secret=brx3ztor17j69we&api_key=brx3ztor17j69we&from=17809008874&to=".$mobile_number."&text=".urlencode($message1)."&type=text",
 CURLOPT_HTTPHEADER => array(
 "cache-control: no-cache",
 "content-type: application/x-www-form-urlencoded",
 ),
));


$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

}
$this->AOR_IRCC($name,$fname,$tmobile,$cmobile,$email);

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
					 $emaill="mkj@siaimmigration.com";
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
				
	
	@mail('ds@siaimmigration.com,mj@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Medical requested -".$iggd." -Name-".$name." Date For Medical  -".$date_for_medical." Date For Medical Tentative".$date_for_medical_ten." ";


$phone = array('919653364499','17782575709');

 $pcount= count($phone);
//exit();

for($i='0';$i< $pcount;$i++){


	 $mobile_number=$phone[$i];
	//exit();
	
		$curl = curl_init();


curl_setopt_array($curl, array(
 CURLOPT_URL => "https://www.thetexting.com/rest/sms/json/message/send",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "api_secret=brx3ztor17j69we&api_key=brx3ztor17j69we&from=17809008874&to=".$mobile_number."&text=".urlencode($message1)."&type=text",
 CURLOPT_HTTPHEADER => array(
 "cache-control: no-cache",
 "content-type: application/x-www-form-urlencoded",
 ),
));


$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

}
$this->medical_requested($name,$fname,$tmobile,$cmobile,$email);

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
					 $emaill="mkj@siaimmigration.com";
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
					
				
	
	@mail('ds@siaimmigration.com,mj@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Medical submited -".$iggd." -Name-".$name." Date Of Medical Submit   -".$medical_submit."- Notes".$medical_sub_note." ";


$phone = array('919653364499','17782575709');

 $pcount= count($phone);
//exit();

for($i='0';$i< $pcount;$i++){


	 $mobile_number=$phone[$i];
	//exit();
	
		$curl = curl_init();


curl_setopt_array($curl, array(
 CURLOPT_URL => "https://www.thetexting.com/rest/sms/json/message/send",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "api_secret=brx3ztor17j69we&api_key=brx3ztor17j69we&from=17809008874&to=".$mobile_number."&text=".urlencode($message1)."&type=text",
 CURLOPT_HTTPHEADER => array(
 "cache-control: no-cache",
 "content-type: application/x-www-form-urlencoded",
 ),
));


$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

}
$this->medical_submited($name,$fname,$tmobile,$cmobile,$email);

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
					 $emaill="mkj@siaimmigration.com";
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
					
					
				
	
	@mail('ds@siaimmigration.com,mj@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Passport requested -".$iggd." -Name-".$name." PP Submition Deadline  -".$pp_deadline." PP submition Tentative ".$pp_tentative."";


$phone = array('919653364499','17782575709');

 $pcount= count($phone);
//exit();

for($i='0';$i< $pcount;$i++){


	 $mobile_number=$phone[$i];
	//exit();
	
		$curl = curl_init();


curl_setopt_array($curl, array(
 CURLOPT_URL => "https://www.thetexting.com/rest/sms/json/message/send",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "api_secret=brx3ztor17j69we&api_key=brx3ztor17j69we&from=17809008874&to=".$mobile_number."&text=".urlencode($message1)."&type=text",
 CURLOPT_HTTPHEADER => array(
 "cache-control: no-cache",
 "content-type: application/x-www-form-urlencoded",
 ),
));


$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

}
$this->passport_requested($name,$fname,$tmobile,$cmobile,$email);

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
					 $emaill="mkj@siaimmigration.com";
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
					
					
				
	
	@mail('ds@siaimmigration.com,mj@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Approved -".$iggd." -Name-".$name." note  -".$approve_note." ";


$phone = array('919653364499','17782575709');

 $pcount= count($phone);
//exit();

for($i='0';$i< $pcount;$i++){


	 $mobile_number=$phone[$i];
	//exit();
	
		$curl = curl_init();


curl_setopt_array($curl, array(
 CURLOPT_URL => "https://www.thetexting.com/rest/sms/json/message/send",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "api_secret=brx3ztor17j69we&api_key=brx3ztor17j69we&from=17809008874&to=".$mobile_number."&text=".urlencode($message1)."&type=text",
 CURLOPT_HTTPHEADER => array(
 "cache-control: no-cache",
 "content-type: application/x-www-form-urlencoded",
 ),
));


$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

}
$this->approved($name,$fname,$tmobile,$cmobile,$email);

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
					 $emaill="mkj@siaimmigration.com";
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
					
					
				
	
	@mail('ds@siaimmigration.com,mj@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Refused -".$iggd." -Name-".$name." note  -".$refused_note." ";


$phone = array('919653364499','17782575709');

 $pcount= count($phone);
//exit();

for($i='0';$i< $pcount;$i++){


	 $mobile_number=$phone[$i];
	//exit();
	
		$curl = curl_init();


curl_setopt_array($curl, array(
 CURLOPT_URL => "https://www.thetexting.com/rest/sms/json/message/send",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "api_secret=brx3ztor17j69we&api_key=brx3ztor17j69we&from=17809008874&to=".$mobile_number."&text=".urlencode($message1)."&type=text",
 CURLOPT_HTTPHEADER => array(
 "cache-control: no-cache",
 "content-type: application/x-www-form-urlencoded",
 ),
));


$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

}
$this->refused($name,$fname,$tmobile,$cmobile,$email);

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


		return view('admin/spausal_sponsorship/edit_spausal_sponsorship_inland',$data);
}
}
///-------------------






}