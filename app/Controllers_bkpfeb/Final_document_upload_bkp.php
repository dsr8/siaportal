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


class Final_document_upload extends BaseController
{


public function final_document()
	{





$Category = new Category_model(); 
	$data['category'] = $Category->getpost();
	//$data['type_immg'] = $Type_immg->getpost();

	$Type_client = new Type_client_model(); 
	$data['type_client'] = $Type_client->getpost();

	$status = new Status_model(); 
	$data['status'] = $status->getpost();

$Prospect = new Prospect_model(); 
	$data['client'] = $Prospect->getentery_client();
		return view('admin/final_upload/document_upload',$data);
	




}



public function final_document_upload($id)
	{

if ($this->request->getMethod()=='post'){


 if($img = $this->request->getFile('resume'))
        {
            if ($img->isValid() && ! $img->hasMoved())
            {


                $newName = $img->getRandomName();

                $img->move('./assets/resume', $newName);

                // You can continue here to write a code to save the name to database
                // db_connect() or model format

                //echo $newName;
               // exit();

                $document = new Client_document_model();
$link='https://canada.siaimmigration.com/assets/resume/'.$newName;
	$insert=$document->insert([
	'client_document'=>$newName,
	'client_document_link'=>$link,
    'upload_by'=>'Sia',
    'application_id'=>$this->request->getPost('application_id'),
    'category'=>$this->request->getPost('category'),
    'type'=>$this->request->getPost('type'),
    'status'=>$this->request->getPost('status'),
	'siaportal_id'=>session()->get('siaprotal_id'),
	'doc_name'=>$this->request->getPost('doc_name'),
	
	'insert_on' => date( 'Y-m-d H:i:s' ),
	
]);



if($insert){

//$sid=session()->get('siaprotal_id');


//$nn=session()->get('firstname');
$sid=$this->request->getPost('siaprotal_id');

$nn=$this->request->getPost('name');
$ct=$this->request->getPost('ct');
$ty=$this->request->getPost('ty');
$st=$this->request->getPost('st');

$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;

					//$subject  = "".ucfirst($cs).",id-".$dell.",Name-".$name."";
					$subject  = "Document uploaded by Team :-SiaPortal Id:-".$sid." Name :-".$nn."";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Client Detail. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Name : ' .$nn.'<br>';
					$message .= 'Sia portal id : ' .$sid.'<br>';
					$message .= 'Category : ' .$ct.'<br>';
					$message .= 'Type : ' .$ty.'<br>';
					$message .= 'Status : ' .$st.'<br>';
					$message .= 'Document : ' .$link.'<br>';
					

					
@mail('Support@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);



//$message1="Your user name is ".$email." and password is ".$pass." .please click on https://canada.siaimmigration.com  to login";

$message1="Document  uploaded by Team Sia portal id ".$sid." Name ".$nn."";


$phone = array('17782281017','17782575507','17782575508');

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


	$url = 'Final_document_upload/final_document';
					echo'
					<script>
					alert("Record Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

}
}
}
}
else{

$ss = new Client_application_model(); 
	$data['sss'] = $ss->where('id', $id)
                   ->findAll();

$ssd = new Client_application_model();
$data['cat'] = $ssd->getclient11($id);

$sid=$data['cat']['0']['siaportalid'];

$Prospect = new Prospect_model(); 
$data['dd'] = $Prospect->getpost_id($sid);
                  






		return view('admin/final_upload/final_document_upload',$data);
	}
}




}