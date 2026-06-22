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



class Worker_spousal_open_wp_inland extends BaseController
{


public function edit_worker_spousal_open_wp_inland($category,$id,$sid){
if ($this->request->getMethod()=='post'){

  $voice_mm=$this->request->getPost('news_image1');

  if($voice_mm==""){
  $data = [
  
    'application_status'=>$this->request->getPost('application_status'),
    'exp_date_to_apply'=>$this->request->getPost('exp_date_to_apply'),
    'assign_to'=>$this->request->getPost('assign_to'),
    'application_status_update'=>date( 'Y-m-d' ),

  'date_of_creation'=>$this->request->getPost('date_of_creation'),
  'log_in_info_pnp'=>$this->request->getPost('log_in_info_pnp'),
  'application_number'=>$this->request->getPost('application_number'),
  'job_noc'=>$this->request->getPost('job_noc'),
  'reg_score'=>$this->request->getPost('reg_score'),
  'upload_doc'=>$this->request->getPost('upload_doc'),


  'update_on'=>date( 'Y-m-d H:i:s' )
];

$cam = new Client_application_model(); 
$updatee=$cam->update($id, $data);

}else{


$vom = new Voice_msg_model();



 $dd=date('Y-m-d H:i:s' );


$insert=$vom->insert([

'client_application_id'=>$id,
'voice_msg'=>$this->request->getPost('news_image1'),
'insert_on' => $dd
  
]);


$data = [
  'voice_msg'=>$this->request->getPost('news_image1'),
    'application_status'=>$this->request->getPost('application_status'),
    'exp_date_to_apply'=>$this->request->getPost('exp_date_to_apply'),
    'assign_to'=>$this->request->getPost('assign_to'),
    'application_status_update'=>date( 'Y-m-d' ), 
  'update_on'=>date( 'Y-m-d H:i:s' )
];

$cam = new Client_application_model(); 
$updatee=$cam->update($id, $data);


}




if($updatee){

$stt=$this->request->getPost('application_status');

if($stt=='2'){
  $From="siaimmigration";
         $ee = session()->get('email');
           $emaill=$ee;

          //$subject  = "Ready to Apply ,id-".$id.",Name-".$name."";
          $subject  = "Profile in Process"; 
          //$subject  = "Lended  Application Fee";            
          $headers  = "MIME-Version: 1.0\r\n";
          $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";          
          $headers.="From: \"".$From."\"<".$emaill."> \r\n";
          $message =' Hi client, <br>';
          $message .= 'Profile in Process <br>';
          $message .= 'Date : ' .date('d/m/Y').'<br>';
          //$message .= 'Name : ' .$name.'<br>';
          //$message .= 'Mobile Number : ' .$mobile_no.'<br>';
          //$message .= 'Email : ' .$Email.'<br>';
          //$message .= 'Category : ' .$cat.'<br>';
          //$message .= 'Type : ' .$type.'<br>';
        //  $message .= 'Date : ' .date('d/m/Y').'<br>';


          //$message .= '<h3 style="color:red;">Siaportal id no :-</h3><p style="color:#000080">'.$id.' Move into client</p><br>';
          
          
    
  
  @mail('Support@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);



//$message1="Your user name is ".$email." and password is ".$pass." .please click on https://canada.siaimmigration.com  to login";

$message1="Profile in Process";


$phone = array('17789887731','17782281017','17782575507','17782575508','7658844497');

 $pcount= count($phone);
//exit();
send_sms($message1,$phone);
 $cpm = new Client_application_model(); 
  //$data['team'] = $Team->getpost();
  $data['cpmm'] = $cpm->getclient11($id);


                 $aps=  $data['cpmm']['0']['application_mail_send'];
                 $sid=  $data['cpmm']['0']['siaportalid'];
                 $date_of_creation=  $data['cpmm']['0']['date_of_creation'];
                 $application_number=  $data['cpmm']['0']['application_number'];
                 $job_noc=  $data['cpmm']['0']['job_noc'];
                 $reg_score=  $data['cpmm']['0']['reg_score'];
                 $upload_doc=  $data['cpmm']['0']['upload_doc'];
                

if($aps !='yes'){

$Prospect = new Prospect_model(); 
  //$data['team'] = $Team->getpost();
  $data['sdata'] = $Prospect->where('id',$sid)
                   ->findAll();

                   $name= $data['sdata']['0']['heading'];

  $From="Sia Immigration";
          $ee = session()->get('email');
           $emaill=$ee;

          //$subject  = "Ready to Apply ,id-".$id.",Name-".$name."";
          $subject  = "BC PNP Profile Created Successfuly"; 
          //$subject  = "Lended  Application Fee";            
          $headers  = "MIME-Version: 1.0\r\n";
          $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";          
          $headers.="From: \"".$From."\"<".$emaill."> \r\n";
          $message =' Hi '.$name.', <br>';
          $message .= 'Your BC PNP profile Successfuly created <br>';
          $message .= 'Date : ' .date('d/m/Y').'<br>';
          $message .= 'Date of creation : ' .$date_of_creation.'<br>';
          $message .= 'Application number : ' .$application_number.'<br>';
          $message .= 'Registration score : ' .$reg_score.'<br>';
          $message .= 'Job noc : ' . $job_noc.'<br>';
          //$message .= 'Job noc : ' .date('d/m/Y').'<br>';
          
          
    
  
  @mail('Support@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);

$message1="Your BC PNP profile Successfuly created";


$phone = array('17789887731','17782281017','17782575507','17782575508');

 $pcount= count($phone);
//exit();
send_sms($message1,$phone);




}


}
$url = 'Siaportal/view_client';
          echo'
          <script>
          alert("Record update Successfuly")
          window.location.href = "'.base_url().'/'.$url.'";
          </script>
          ';  
}else{

$url = 'Siaportal/view_client';
          echo'
          <script>
          alert("Record Not update Successfuly")
          window.location.href = "'.base_url().'/'.$url.'";
          </script>
          ';  

}


}else{

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


    return view('admin/worker_spousal_open_wp_inland/edit_worker_spousal_open_wp_inland',$data);
}
}

///-------------------




public function full_worker_spousal_open_wp_inland($category,$id,$sid){


  

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


    return view('admin/worker_spousal_open_wp_inland/full_view_worker_spousal_open_wp_inland',$data);

}


}