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


class Account extends BaseController
{

public function index(){

  return view('account/account_dashboard');
}


public function add_statusjj($id,$st){

//echo $aa=str_replace($st,'%','');
//exit();


  $data = [
    
  'account_status'=>$st
  
];
// print_r($data);
 //exit();


 $aa = new Account_model(); 
$updatee=$aa->update($id,$data);
}


public function add_pstatus($id,$st){

// echo $aa=str_replace($st,'%20',' ');
//exit();


  $data = [
    
  'payment_status'=>$st
  
];
// print_r($data);
 //exit();


 $aa = new Account_model(); 
$updatee=$aa->update($id,$data);
}

public function add_agent()
  {

     if (session()->get('isAccountIn') !=true) {

        return redirect()->to('index');
    
}

    if ($this->request->getMethod()=='post'){
$Agents = new Agent_model();

$insert=$Agents->insert([

  'name'=>$this->request->getPost('name'),
  'mobile_no'=>$this->request->getPost('mobile_no'),
  'email'=>$this->request->getPost('email'),
  'city'=>$this->request->getPost('city'),
  'country'=>$this->request->getPost('country'),
  'commision'=>$this->request->getPost('commision'),
  'reff'=>$this->request->getPost('reff'),
  'status'=>'1',
  'insert_on'=>date( 'Y-m-d H:i:s' )
  //'email'=>$this->request->getPost('email'),
]);
if($insert){

  $name = $this->request->getPost('name');
  $mobile_no = $this->request->getPost('mobile_no');
  $email = $this->request->getPost('email');
  $city= $this->request->getPost('city');
  $country= $this->request->getPost('country');
  $commision = $this->request->getPost('commision');
  $reff = $this->request->getPost('reff');

$From="SiaPortal New Agent Added";
        $ee = session()->get('email');
           $emaill=$ee;
          $subject  = "SiaPortal New Agent Added -".ucfirst($name).",-".$city.",Date-".date('d/m/Y')."";
          //$subject  = ""; 
          //$subject  = "Lended  Application Fee";            
          $headers  = "MIME-Version: 1.0\r\n";
          $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";          
          //$headers.="From: \"".$From."\"<".$emaill."> \r\n";
           $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
          $message =' Announcing new Agent to our company <br>';
          $message .=' Agent Deatail. <br>';
          $message .= 'Date : ' .date('d/m/Y').'<br>';
          $message .= 'Name : ' .$name.'<br>';
          $message .= 'Contact Number : ' .$mobile_no.'<br>';
          $message .= 'Email : ' .$email.'<br>';
          $message .= 'City : ' .$city.'<br>';
          $message .= 'Country : ' .$country.'<br>';
          //$message .= 'Company Name : ' .$company_name.'<br>';
          //$message .= 'Company Type : ' .$company_type.'<br>';
@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);



$message1="New Agent Added- ".$name."-".$mobile_no."-".$city."-".$country."";

//$message1="New Employer Addeds";


//$phone = array('17789887731','17782281017','17782575507','17782575508','17789527144','17786867870');
$phone = array('12368661740');

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



  $url = 'Account/add_agent';
          echo'
          <script>
          alert("Record Added Successfuly")
          window.location.href = "'.base_url().'/'.$url.'";
          </script>
          ';  
}else{
  $url = 'Account/add_agent';
          echo'
          <script>
          alert("Record not added Successfuly")
          window.location.href = "'.base_url().'/'.$url.'";
          </script>
          ';  
}
}
$Agents = new Agent_model(); 
  $data['agent'] = $Agents->getpost();
//$data['navv']='admininclude/admin_nav';
    return view('account/agent/add_agent',$data);
  }


  public function view_agent()
  {

     if (session()->get('isAccountIn') !=true) {

        return redirect()->to('index');
    
}

$Agent = new Agent_model(); 
  $data['agent'] = $Agent->getpost();

    return view('account/agent/view_agent',$data);
  }


  public function edit_agent($id)
  {

     if (session()->get('isAccountIn') !=true) {

        return redirect()->to('index');
    
}

if ($this->request->getMethod()=='post'){


  $data = [
    'name'=>$this->request->getPost('name'),
  'mobile_no'=>$this->request->getPost('mobile_no'),
  'email'=>$this->request->getPost('email'),
  'city'=>$this->request->getPost('city'),
  'country'=>$this->request->getPost('country'),
  'commision'=>$this->request->getPost('commision'),
  'reff'=>$this->request->getPost('reff'),
  //'status'=>$this->request->getPost('status'),
  
  'updated_at'=>date( 'Y-m-d H:i:s' )
];

$Agent = new Agent_model(); 
$updatee=$Agent->update($id, $data);
if($updatee){

$url = 'Account/view_agent';
          echo'
          <script>
          alert("Record update Successfuly")
          window.location.href = "'.base_url().'/'.$url.'";
          </script>
          ';  
}else{

$Agent = new Agent_model(); 
  $data['agent'] = $Agent->where('id', $id)
                   ->findAll();

    return view('account/agent/edit_agent',$data);

}


}else{
  //$Prospect = new Team_model(); 
  $Agent = new Agent_model(); 
  $data['agent'] = $Agent->where('id', $id)
                   ->findAll();

    return view('account/agent/edit_agent',$data);
  }
}

public function view_td_card()
  {

     if (session()->get('isAccountIn') !=true) {

        return redirect()->to('index');
    
}

$Siaportal = new Siaportal_model(); 
  $data['client'] = $Siaportal->getpost();



$card = new Client_application_model();

                  
  $data['card'] = $card->where('fee','td_credit_card')
                   ->findAll();



    return view('account/tdcard/view_td_card',$data);
  }
 public function view_account()
  {

     if (session()->get('isAccountIn') !=true) {

        return redirect()->to('index');
    
}

$Account = new Account_model(); 
  $data['account'] = $Account->getaccount();

    return view('account/accountt/view_account',$data);
  }





}