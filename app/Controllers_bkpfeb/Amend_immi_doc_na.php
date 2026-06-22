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


class Amend_immi_doc_na extends BaseController
{


public function edit_amend_immi_doc_na($category,$id,$sid){


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

 if($img3 = $this->request->getFile('fee_receipt'))
        {
        //	echo"hih";
        	//exit();
            if ($img3->isValid() && ! $img3->hasMoved())
            {
                $fee_receipt = $img3->getRandomName();

                $img3->move('./assets/resume', $fee_receipt);                
 $fee_receipt_link='https://canada.siaimmigration.com/assets/resume/'.$fee_receipt;
//exit();
}else{
$fee_receipt=$this->request->getPost('fee_receipt_old');
$fee_receipt_link='';

}

}

if($sub_confim1 = $this->request->getFile('sub_confim'))
        {
        //	echo"hih";
        	//exit();
            if ($sub_confim1->isValid() && ! $sub_confim1->hasMoved())
            {
                $sub_confim = $sub_confim1->getRandomName();

                $sub_confim1->move('./assets/resume', $sub_confim);                
 $sub_confim_link='https://canada.siaimmigration.com/assets/resume/'.$sub_confim;
//exit();
}else{
$sub_confim=$this->request->getPost('sub_confim_old');
$sub_confim_link='';

}

}



if($refusal_letter1 = $this->request->getFile('refusal_letter'))
        {
        //	echo"hih";
        	//exit();
            if ($refusal_letter1->isValid() && ! $refusal_letter1->hasMoved())
            {
                $refusal_letter = $refusal_letter1->getRandomName();

                $refusal_letter1->move('./assets/resume', $refusal_letter);                
 $refusal_letter_link='https://canada.siaimmigration.com/assets/resume/'.$refusal_letter;
//exit();
}else{
$refusal_letter=$this->request->getPost('sub_confim_old');
$refusal_letter_link='';

}

}


if($approval_letter1 = $this->request->getFile('refusal_letter'))
        {
        //	echo"hih";
        	//exit();
            if ($approval_letter1->isValid() && ! $approval_letter1->hasMoved())
            {
                $approval_letter = $approval_letter1->getRandomName();

                $approval_letter1->move('./assets/resume', $approval_letter);                
 $refusal_letter_link='https://canada.siaimmigration.com/assets/resume/'.$approval_letter;
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
    
    'assign_to'=>$this->request->getPost('assign_to'),
     'application_status'=>$this->request->getPost('application_status'),


    'app_recv'=>$this->request->getPost('app_recv'),
     'exp_date_to_apply'=>$this->request->getPost('exp_date_to_apply'),
    //'study_permit_exp'=>$this->request->getPost('study_permit_exp'),
    'application_status_update'=>date('Y-m-d' ),  


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

	
	'refusal_date'=>$this->request->getPost('refusal_date'),	
	'refusal_letter'=>$refusal_letter,


	'date_work_permit'=>$this->request->getPost('date_work_permit'),	
	'approval_letter'=>$approval_letter,
	'approve_note'=>$this->request->getPost('approve_note'),

  'gc_username'=>$this->request->getPost('gc_username'),
    'gc_password'=>$this->request->getPost('gc_password'),


	
	'update_on'=>date( 'Y-m-d H:i:s' )
];

$cam = new Client_application_model(); 
$updatee=$cam->update($id, $data);
if($updatee){

$stt=$this->request->getPost('application_status');
if($stt=='340') {


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


$message1="Assigned Team Member  id-".$iggd." Name-".$fname."";


$phone = array('17782281017','17782575507','17782575508');
//$phone = array('919653364499');

send_sms($message1,$phone);
assign_team_member($name,$fname,$tmobile,$cmobile,$email);

 }



 else if($stt=='341') {


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


$phone = array('17782281017','17782575507','17782575508');

send_sms($message1,$phone);



profile_in_process_client_mail_sms($name,$fname,$tmobile,$cmobile,$email);

 }






 

 
  if($stt=='342') {


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


$phone = array('17782281017','17782575507','17782575508');

 $pcount= count($phone);
send_sms($message1,$phone);//exit();



application_submitted_mail_to_client($name,$fname,$tmobile,$cmobile,$email);

 }

 
 
 if($stt=='343') {


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
                          $cmobile= $data['pm']['0']['number'];
                           $email= $data['pm']['0']['email'];
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
		$date_work_permit=$this->request->getPost('date_work_permit');
		

		approve_mail_team($iggd,$name,$approve_note,$date_work_permit,$approval_letter,$approve_note);
	

$message1="Hi Team Approved -".$iggd." -Name-".$name." note  -".$approve_note." ";


$phone = array('17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();

send_sms($message1,$phone);


approve_mail_client($name,$fname,$cmobile,$email,$iggd);

 }
if($stt=='344') {


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
                          $cmobile= $data['pm']['0']['number'];
                           $email= $data['pm']['0']['email'];
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
	
	refuse_mail_team($iggd,$name,$refused_note,$refusal_letter);


$message1="Hi Team Refused -".$iggd." -Name-".$name." note  -".$refused_note." ";


$phone = array('17782281017','17782575507','17782575508');

 send_sms($message1,$phone);

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

                     $acc = new Account_model(); 
                   $data['acc'] = $acc->where('app_id',$id)
                   ->findAll();


		return view('admin/amend_immi_doc_na/edit_amend_immi_doc_na',$data);
}
}
///-------------------

public function full_amend_immi_doc_na($category,$id,$sid){




  

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


    return view('admin/amend_immi_doc_na/full_view_amend_immi_doc_na',$data);
}


}