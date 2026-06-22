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


class All_mail_client extends BaseController
{

	
	public function index($page = 'login')
	{
		if ( ! is_file(APPPATH.'/Views/'.$page.'.php'))
    {
        // Whoops, we don't have a page for that!
        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    }
		return view('login');
	}


/////Start mail //////

	public function assign_team_member($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Assign Team Member";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$name.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Greetings From Sia immigration.
</td>
                        </tr>
                            <tr>
                              <td>I would  like to inform you that  your  assign a team member now,.
</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Assigned team member will be in contact with you for the further information if needed to complete the profile. We encourage you to inform us any changes to your immigration  or work status.

</td>
                            </tr>
                            <tr>
                              <td>Team member name:- '.$tname.'
</td>
                            </tr>
                            <tr>
                              <td>contact details:-'.$tmobile.' </td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."your  Profile in Process now";

//$message1="New Employer Addeds";


//$phone = array('919653364499','17782575709');

 //$pcount= count($phone);
//exit();

//for($i='0';$i< $pcount;$i++){


	 $mobile_number=$cmobile;
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

/////// end /////













public function  login()
	{

$data=[];

		if ($this->request->getMethod() == 'post') {


			//let's do the validation here
			$rules = [
				'email' => 'required|min_length[6]|max_length[50]',
				'password' => 'required|min_length[6]|max_length[255]|validateUser[email,password]',
			];

			$errors = [
				'password' => [
					'validateUser' => 'Email or Password dont match'
				]
			];

			if (! $this->validate($rules, $errors)) {

				$data['validation'] = $this->validator;

			}else{
				
				$model = new User_model();

                $aa = $this->request->getVar('email');
               //exit();
				 $user = $model->where('email',$aa)->findAll();
				//exit();
				//print_r($user);
			//	exit();

				$this->setUserSession($user);
				//$session->setFlashdata('success', 'Successful Registration');
			  $tt =session()->get('type');
			// exit();
			
					 if ($tt=='Admin') {

				return redirect()->to('dashboard');
		
}

else if($tt=='client'){

	return redirect()->to('client_dashboard3');
}

else {

	return redirect()->to('index');
}



			//return view('dashboard');

			}
		}
//echo view('templates/header',$data);
		//echo view('login');
	//	echo view('templates/footer');

}



	


	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}



	private function setUserSession($user){
		//print_r($user);
		//exit();

		//echo $aa=$user['0']['id'];
		//exit();
		$data = [
			'id' => $user['0']['id'],
			'firstname' => $user['0']['firstname'],
			'lastname' => $user['0']['lastname'],
			'email' => $user['0']['email'],
			'type' => $user['0']['type'],
			'siaprotal_id' => $user['0']['siaprotal_id'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}


public function dashboard()
	{

		
					 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}
 
$New_form = new New_form_model(); 
	$data['new_form'] = $New_form->getpost();
		return view('dashboard',$data);
	}



/////////----------


	public function download_email()
	{
	    if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');		
	}




				return view('admin/email/download_email');
	}
 
	/////////////--------
	public function view_aip()
	{
	    if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');		
	}
 

		return view('admin/client_category/application_in_progress');
	}

	public function view_anjs()
	{
	    if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');		
	}
 

		return view('admin/client_category/application_not_yet_start');
	}

	public function view_adm()
	{
	    if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');		
	}
 

		return view('admin/client_category/application_decision_made');
	}


public function view_sp()
	{
	    if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');		
	}
 

		return view('admin/client_category/submit_application');
	}




public function demo()
	{
	    if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');		
	}
 

		return view('demo');
	}


	public function client_dashboard()
	{
		return view('client_dashboard');
	}
	public function client_dashboard3()
	{

		 $sid =session()->get('siaprotal_id');
	
		$Refer = new Refer_model(); 
	$data['refer'] = $Refer->getpost_id($sid);

		return view('client/client_dashboard3',$data);
	}


	public function client_profile()
	{

	 $sid =session()->get('siaprotal_id');
	//exit();

		$Prospect = new Prospect_model(); 
	$data['prof'] = $Prospect->getpost_id($sid);
                   
		return view('client/client_profile',$data);
	}


	public function document_upload()
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
    'upload_by'=>'Client',
    'application_id'=>$this->request->getPost('application_id'),
    'category'=>$this->request->getPost('category'),
    'type'=>$this->request->getPost('type'),
    'status'=>$this->request->getPost('status'),
	'siaportal_id'=>session()->get('siaprotal_id'),
	'doc_name'=>$this->request->getPost('doc_name'),
	
	'insert_on' => date( 'Y-m-d H:i:s' ),
	
]);



if($insert){

$sid=session()->get('siaprotal_id');
$nn=session()->get('firstname');

$ct=$this->request->getPost('ct');
$ty=$this->request->getPost('ty');
$st=$this->request->getPost('st');

$From="Sia Immigration";
					 $emaill="mkj@siaimmigration.com";
					//$subject  = "".ucfirst($cs).",id-".$dell.",Name-".$name."";
					$subject  = "Document uploaded by client :-SiaPortal Id:-".$sid." Name :-".$nn."";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Client Detail. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Name : ' .$nn.'<br>';
					$message .= 'Sia portal id : ' .$sid.'<br>';
					$message .= 'Category : ' .$ct.'<br>';
					$message .= 'Type : ' .$ty.'<br>';
					$message .= 'Status : ' .$st.'<br>';
					//$message .= 'Name : ' .$heading.'<br>';
					

					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



//$message1="Your user name is ".$email." and password is ".$pass." .please click on https://canada.siaimmigration.com  to login";

$message1="Document  uploaded by client Sia portal id ".$sid." Name ".$nn."";


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


	$url = 'Siaportal/document_upload';
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


  $sid =session()->get('siaprotal_id');
 //exit();

$cp = new Client_application_model(); 
	$data['cp'] = $cp->getclient($sid);
		return view('client/document_upload',$data);
	}


public function add_client()
	{

		if ($this->request->getMethod()=='post'){
$Prospect = new Prospect_model();




$insert=$Prospect->insert([

    'news_image1'=>$this->request->getPost('news_image1'),
	'heading'=>$this->request->getPost('name'),
	'number'=>$this->request->getPost('contact'),
	'alt_mobile_no'=>$this->request->getPost('alt_mobile_no'),

	'email'=>$this->request->getPost('email'),
	'client_status'=>$this->request->getPost('client_status'),
	'spouse_name'=>$this->request->getPost('spouse_name'),
	'reff'=>$this->request->getPost('reff'),
	'user_dob'=>$this->request->getPost('dob'),
	//'file_number'=>$this->request->getPost('file_number'),
	'address'=>$this->request->getPost('address'),
	'city'=>$this->request->getPost('city'),
	'source'=>$this->request->getPost('source'),
	'family'=>$this->request->getPost('family'),
	'master_sia_id'=>$this->request->getPost('master_sia_id'),
	'agent_name'=>$this->request->getPost('agent_name'),
	//'file_status'=>$this->request->getPost('file_status'),
	'typee'=>'Immigration',
	//'category'=>$this->request->getPost('category'),
	'voice_added'=>'siaportal',
	'entery_status'=>'client',
	'insert_on' => date( 'Y-m-d H:i:s' )
	
]);

 $siaaa = $insert;
//exit();

if($insert){
	
	$voice= $this->request->getPost('news_image1');
	$vv="https://canada.siaimmigration.com/form/".$voice."";
	$heading = $this->request->getPost('name');
	$number = $this->request->getPost('contact');
	$alt_mobile_no = $this->request->getPost('alt_mobile_no');

	$email = $this->request->getPost('email');
	$client_status = $this->request->getPost('client_status');
	$spouse_name = $this->request->getPost('spouse_name');
	$reff = $this->request->getPost('reff');
	$user_dob = $this->request->getPost('dob');
	
	$address = $this->request->getPost('address');
	$city = $this->request->getPost('city');
	$source = $this->request->getPost('source');
	$family = $this->request->getPost('family');
	$master_sia_id = $this->request->getPost('master_sia_id');
	$agent_name = $this->request->getPost('agent_name');

$From="Sia Immigration";
					 $emaill="mkj@siaimmigration.com";
					//$subject  = "".ucfirst($cs).",id-".$dell.",Name-".$name."";
					$subject  = "Client Added";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Client Detail. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Name : ' .$heading.'<br>';
					$message .= 'Number : ' .$number.'<br>';
					$message .= 'Alt. mobile number : ' .$alt_mobile_no.'<br>';
					$message .= 'Email : ' .$email.'<br>';
					$message .= 'Client Status : ' .$client_status.'<br>';
					$message .= 'Spouse name : ' .$spouse_name.'<br>';
					$message .= 'Reference : ' .$reff.'<br>';
					$message .= 'Date of birth : ' .$user_dob.'<br>';
					$message .= 'Address : ' .$address.'<br>';
					$message .= 'City : ' .$city.'<br>';
					$message .= 'Source : ' .$source.'<br>';
					$message .= 'Agent name : ' .$agent_name.'<br>';
					$message .= 'voice : ' .$vv.'<br>';

					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



//$message1="Your user name is ".$email." and password is ".$pass." .please click on https://canada.siaimmigration.com  to login";

$message1="New cient added :- ".$heading."-".$number."-".$email."-".$city."-".$agent_name."";


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


$Team = new Team_model();


//echo $fn=$session()->get('firstname');
//exit();

$na=$this->request->getPost('name');
$na1 = substr($na, 0, 3);
$mo=$this->request->getPost('contact');
$mo1 = substr($mo, 0, 3);
 $siaaa;
//exit();
$pas=$na1.$mo1;
$insert1=$Team->insert([

	'firstname'=>$this->request->getPost('name'),
	//'lastname'=>$this->request->getPost('lastname'),
	'email'=>$this->request->getPost('email'),
	'mobile_no'=>$this->request->getPost('contact'),
	'password'=>$pas,
	'siaprotal_id'=>$siaaa,
	'pass'=>$pas,
	'type'=>'client',
	'status'=>'1',
	'added_by'=>session()->get('firstname'),
	'added_by_id'=>session()->get('id'),	
	'created_at'=>date( 'Y-m-d H:i:s' )
	//'email'=>$this->request->getPost('email'),
]);
if($insert1){
	
$pass=$this->request->getPost('password');
$email=$this->request->getPost('email');

$mno=$this->request->getPost('mobile_no');




$From="siaimmigration";
					 $emaill="mkj@siaimmigration.com";
					//$subject  = "".ucfirst($cs).",id-".$dell.",Name-".$name."";
					$subject  = "Password";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Login Detail. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= '<h3 style="color:red;">User name </h3><p style="color:#000080">'.$email.'</p><br>';
					$message .= '<h3 style="color:red;">Password </h3><p style="color:#000080">'.$pas.'</p><br>';
					//$message .= '<h3 style="color:red;">password : </h3><p style="color:#000080">' .$dataa.'</p><hr><br>';
					$message .= '<a  href="https://canada.siaimmigration.com" target="_blank">Click to login</a><br>';
					
					//$message .= '<h3 style="color:red;">Please dont share this link to anyone</h3><hr><br>';
					
					
		
	
	@mail($email,$subject,$message,$headers);



$message1="Your user name is ".$email." and password is ".$pass." .please click on https://canada.siaimmigration.com  to login";

	$mobile_number=$mno;
	
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


$url = 'Siaportal/add_client';
					echo'
					<script>
					alert("Record Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	


}else{
	$url = 'Siaportal/add_client';
					echo'
					<script>
					alert("Record  Not Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}


}
$agent = new Agent_model(); 
	$data['agent'] = $agent->getpost();

		return view('admin/client/add_client',$data);
	}

public function check_mail($id)
	{

	$Client = new Prospect_model(); 
	 $data['email'] = $Client->where('email', $id)
	 ->where('entery_status','client')
                   ->findAll();

$aa=count($data['email']);

$data['cc']=$aa;
                    
		
		 echo json_encode($data["cc"]);
	
}




public function edit_client_prospect($id)
	{

if ($this->request->getMethod()=='post'){


	$data = [
    
	'heading'=>$this->request->getPost('name'),
	'number'=>$this->request->getPost('contact'),
	'alt_mobile_no'=>$this->request->getPost('alt_mobile_no'),

	'email'=>$this->request->getPost('email'),
	'client_status'=>$this->request->getPost('client_status'),
	'spouse_name'=>$this->request->getPost('spouse_name'),
	'reff'=>$this->request->getPost('reff'),
	'user_dob'=>$this->request->getPost('dob'),
	//'file_number'=>$this->request->getPost('file_number'),
	'address'=>$this->request->getPost('address'),
	'city'=>$this->request->getPost('city'),
	'source'=>$this->request->getPost('source'),
	'family'=>$this->request->getPost('family'),
	'master_sia_id'=>$this->request->getPost('master_sia_id'),
	'agent_name'=>$this->request->getPost('agent_name'),
	//'file_status'=>$this->request->getPost('file_status'),
	
	
	
	
	'updated_at'=>date( 'Y-m-d H:i:s' )
];

$client = new Prospect_model(); 
$updatee=$client->update($id, $data);
if($updatee){


	$heading = $this->request->getPost('name');
	
$From="Sia Immigration";
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Client Profile Info Edit -".ucfirst($heading).",Id-".$id.",Date-".date('d/m/Y')."";
					//$subject  = "";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					$message =' Dear Team  User Profile info of Siaportal Id- '.$id.'  Name:-'.$heading.' <br>';
					
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="User Profile Edit Name- ".$heading."Id-".$id."";

//$message1="New Employer Addeds";


//$phone = array('919653364499','17782575709');

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





$url = 'Siaportal/view_client';
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

		return view('admin/client/edit_client_prospect',$data);

}


}else{
	//$Prospect = new Team_model(); 
	$Client = new Prospect_model(); 
	$data['client'] = $Client->where('id', $id)
                   ->findAll();

    $Agent = new Agent_model(); 
	$data['agent'] = $Agent->getpost();

		return view('admin/client/edit_client_prospect',$data);
	}
}






	public function view_client()
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



		return view('admin/client/view_client',$data);
	}


public function full_view_client($id)
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


	 $data['fview'] = $Prospect->where('id', $id)
	
                   ->findAll();



		return view('admin/client/full_view_client',$data);
	}





	public function add_view_client()
	{

$Prospect = new Prospect_model(); 
	$data['client'] = $Prospect->getentery_client();

		return view('admin/client/add_view_client',$data);
	}
	//--------------------------------------------------------------------




	//-------------------------------------

public function add_emp()
	{

		if ($this->request->getMethod()=='post'){
$Emp = new Emp_model();

$insert=$Emp->insert([

	'name'=>$this->request->getPost('name'),
	'contact'=>$this->request->getPost('contact'),
	'email'=>$this->request->getPost('email'),
	'city'=>$this->request->getPost('city'),
	'country'=>$this->request->getPost('country'),
	'company_name'=>$this->request->getPost('company_name'),
	'company_type'=>$this->request->getPost('company_type'),
	'status'=>'1',
	'insert_on'=>date( 'Y-m-d H:i:s' )
	//'email'=>$this->request->getPost('email'),
]);
if($insert){
	$name = $this->request->getPost('name');
	$contact = $this->request->getPost('contact');
	$email= $this->request->getPost('email');
	$city = $this->request->getPost('city');
	$country = $this->request->getPost('country');
	$company_name = $this->request->getPost('company_name');
	$company_type = $this->request->getPost('company_type');

$From="New Employer Added";
					 $emaill="mkj@siaimmigration.com";
					$subject  = "New Employer Added -".ucfirst($name).",Company Name-".$company_name.",Date-".date('d/m/Y')."";
					//$subject  = "";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					$message =' we are pleased to announce that we have one more Employer in our list now <br>';
					$message .=' Employer Detail. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Name : ' .$name.'<br>';
					$message .= 'Contact Number : ' .$contact.'<br>';
					$message .= 'Email : ' .$email.'<br>';
					$message .= 'City : ' .$city.'<br>';
					$message .= 'Province : ' .$country.'<br>';
					$message .= 'Company Name : ' .$company_name.'<br>';
					$message .= 'Company Type : ' .$company_type.'<br>';
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="New Employer Added- ".$name."-".$contact."-".$city."-".$company_name."-".$company_type."";

//$message1="New Employer Addeds";


//$phone = array('919653364499','17782575709');

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




	$url = 'Siaportal/add_emp';
					echo'
					<script>
					alert("Record Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{
	$url = 'Siaportal/add_emp';
					echo'
					<script>
					alert("Record not added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}
}

		return view('admin/employers/add_emp');
	}

	public function view_emp()
	{

$Emp = new Emp_model(); 
	$data['emp'] = $Emp->getpost();

		return view('admin/employers/view_emp',$data);
	}


	public function edit_emp($id)
	{

if ($this->request->getMethod()=='post'){


	$data = [
    'name'=>$this->request->getPost('name'),
	'contact'=>$this->request->getPost('contact'),
	'email'=>$this->request->getPost('email'),
	'city'=>$this->request->getPost('city'),
	'country'=>$this->request->getPost('country'),
	'company_name'=>$this->request->getPost('company_name'),
	'company_type'=>$this->request->getPost('company_type'),
	//'status'=>$this->request->getPost('status'),
	
	'updated_at'=>date( 'Y-m-d H:i:s' )
];

$Emp = new Emp_model(); 
$updatee=$Emp->update($id, $data);
if($updatee){

$url = 'Siaportal/view_emp';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{

$Emp = new Emp_model(); 
	$data['team'] = $Emp->where('id', $id)
                   ->findAll();

		return view('admin/employers/edit_emp',$data);

}


}else{
	//$Prospect = new Team_model(); 
	$Emp = new Emp_model(); 
	$data['emp'] = $Emp->where('id', $id)
                   ->findAll();

		return view('admin/employers/edit_emp',$data);
	}
}


///---------------------------------------

public function add_job_lmia()
	{

		if ($this->request->getMethod()=='post'){
$Lmia_job = new Lmia_job_model();

$insert=$Lmia_job->insert([

	'emp_name'=>$this->request->getPost('emp_name'),
	'req'=>$this->request->getPost('req'),
	'job_dec'=>$this->request->getPost('job_dec'),
	'type'=>$this->request->getPost('type'),
	'status'=>'1',

	//'email'=>$this->request->getPost('email'),
'insert_on'=>date( 'Y-m-d H:i:s' )
	//'email'=>$this->request->getPost('email'),
]);
if($insert){




	$emp_name = $this->request->getPost('emp_name');
	$req = $this->request->getPost('req');
	$job_dec = $this->request->getPost('job_dec');
	$type = $this->request->getPost('type');

$From="Sia Immigration";
					 $emaill="mkj@siaimmigration.com";
					$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					$message =' We have one more job available, check if we can find eligible candidate <br>';
					$message .='Job Deatail. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Employer : ' .$emp_name.'<br>';
					$message .= 'Job Descrption : ' .$job_dec.'<br>';
					$message .= 'Requriment : ' .$req.'<br>';
					$message .= 'Type : ' .$type.'<br>';
					//$message .= 'Country : ' .$country.'<br>';
					//$message .= 'Company Name : ' .$company_name.'<br>';
					//$message .= 'Company Type : ' .$company_type.'<br>';
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="New Job Available- ".$emp_name."-".$type."-".$job_dec."-".$req."";

//$message1="New Employer Addeds";


//$phone = array('919653364499','17782575709');

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



	$url = 'Siaportal/add_job_lmia';
					echo'
					<script>
					alert("Record Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{
	$url = 'Siaportal/add_job_lmia';
					echo'
					<script>
					alert("Record not added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}
}
$Emp = new Emp_model(); 
	$data['emp'] = $Emp->getpost();

		return view('admin/employers/add_job_lmia',$data);
	}


public function birthday_mail(){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Happy Birthday Name";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear ......,</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.
</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>It has been our great pleasure to support you with our services. Please feel free to contact us, if you need any further help.
</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					//$message .= 'Date : ' .date('d/m/Y').'<br>';
					//$message .= 'Employer : ' .$emp_name.'<br>';
					//$message .= 'Job Descrption : ' .$job_dec.'<br>';
					//$message .= 'Requriment : ' .$req.'<br>';
					//$message .= 'Type : ' .$type.'<br>';
					//$message .= 'Country : ' .$country.'<br>';
					//$message .= 'Company Name : ' .$company_name.'<br>';
					//$message .= 'Company Type : ' .$company_type.'<br>';
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true";

//$message1="New Employer Addeds";


//$phone = array('919653364499','17782575709');
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



}


public function profile_in_process($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Profile in Process";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$name.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Greetings From Sia immigration.
</td>
                        </tr>
                            <tr>
                              <td>I would  like to inform you that  your  Profile in Process now,.
</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Assigned team member will be in contact with you for the further information if needed to complete the profile. We encourage you to inform us any changes to your immigration  or work status.

</td>
                            </tr>
                            <tr>
                              <td>Team member name:- '.$tname.'
</td>
                            </tr>
                            <tr>
                              <td>contact details:-'.$tmobile.' </td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."your  Profile in Process now";

//$message1="New Employer Addeds";


//$phone = array('919653364499','17782575709');

 //$pcount= count($phone);
//exit();

//for($i='0';$i< $pcount;$i++){


	 $mobile_number=$cmobile;
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





public function profile_created($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Profile in Process";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$name.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Greetings From Sia immigration.
</td>
                        </tr>
                            <tr>
                              <td>We would like to inform you that your profile has been created and successfully submitted based on the provided information. We will now wait for the invitation based on the next draw. We will update you once we receive an invitation.

</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."   We would like to inform you that your profile has been created and successfully submitted based on the provided information. We will now wait for the invitation based on the next draw. We will update you once we receive an invitation.
";



	 $mobile_number=$cmobile;
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



public function invitation_received($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Invitation received";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$name.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Greetings From Sia immigration.
</td>
                        </tr>
                            <tr>
                              <td>We would like to inform you that your Invitation received successfully .

</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."   We would like to inform you that your Invitation received successfully .
";



	 $mobile_number=$cmobile;
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



public function invitation_withdrawn($name,$tname,$tmobile,$cmobile,$reason,$email){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Invitation Withdrawn";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";

 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$name.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Greetings From Sia immigration.
</td>
                        </tr>
                            <tr>
                              <td>We would like to inform you that your Invitation withdrawn successfully .

</td>
                            </tr>
                            <tr>
                              <td>Reason :- '.$reason.'</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."   We would like to inform you that your Invitation withdrawn successfully";



	 $mobile_number=$cmobile;
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


public function application_submitted($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Application submitted";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$name.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Greetings From Sia immigration.
</td>
                        </tr>
                            <tr>Your application has  been submitted successfully . We will keep you updated if any further information or documentation will be requested by the processing officer.</td>
                            </tr>
                           
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."   Your application has  been submitted successfully . We will keep you updated if any further information or documentation will be requested by the processing officer.";



	 $mobile_number=$cmobile;
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


public function Adr_BCPNP($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Application submitted";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$name.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Greetings From Sia immigration.
</td>
                        </tr>
                            <tr>Your Adr BCPNP successfully received . We will keep you updated if any further information or documentation will be requested by the processing officer.</td>
                            </tr>
                           
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."  Your Adr BCPNP successfully received . We will keep you updated if any further information or documentation will be requested by the processing officer.";



	 $mobile_number=$cmobile;
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



public function nomination_approved($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Nomination Approved";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";

 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$name.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Greetings From Sia immigration.
</td>
                        </tr>
                            <tr>Your nomination approved successfully  . We will keep you updated if any further information or documentation will be requested by the processing officer.</td>
                            </tr>
                           
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."   Your nomination approved successfully  . We will keep you updated if any further information or documentation will be requested by the processing officer";



	 $mobile_number=$cmobile;
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



public function nomination_refused($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Nomination Refused";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$name.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Greetings From Sia immigration.
</td>
                        </tr>
                            <tr>Your Nomination Refused . We will keep you updated if any further information or documentation will be requested by the processing officer.</td>
                            </tr>
                           
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."   Your nomination refused  . We will keep you updated if any further information or documentation will be requested by the processing officer";



	 $mobile_number=$cmobile;
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




public function federal_application_sent($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Federal Application Sent";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$name.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Greetings From Sia immigration.
</td>
                        </tr>
                            <tr>Your Federal Application Sent Successfuly . We will keep you updated if any further information or documentation will be requested by the processing officer.</td>
                            </tr>
                           
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."   Your Federal Application Sent Successfuly  . We will keep you updated if any further information or documentation will be requested by the processing officer";



	 $mobile_number=$cmobile;
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



public function AOR_IRCC($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Federal Application Sent";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$name.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Greetings From Sia immigration.
</td>
                        </tr>
                            <tr>Your AOR IRCC done Successfuly . We will keep you updated if any further information or documentation will be requested by the processing officer.</td>
                            </tr>
                           
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."   Your  AOR IRCC done Successfuly  . We will keep you updated if any further information or documentation will be requested by the processing officer";



	 $mobile_number=$cmobile;
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



public function ADR_IRCC($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "ADR IRCC";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$name.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Greetings From Sia immigration.
</td>
                        </tr>
                            <tr>Your ADR IRCC done Successfuly . We will keep you updated if any further information or documentation will be requested by the processing officer.</td>
                            </tr>
                           
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."   Your ADR IRCC done Successfuly  . We will keep you updated if any further information or documentation will be requested by the processing officer";



	 $mobile_number=$cmobile;
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



public function medical_requested($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Medical Requested";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$name.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Greetings From Sia immigration.
</td>
                        </tr>
                            <tr>IRCC has requested a medical exam to process your application further. Please click the link below to search IRCC panel physicians in your area. Please in sure to bring all the necessary documents along with this request letter for your medical exam.</td>
                            </tr>
                           
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Following documents may be required by a panel physician to conduct your medical exam. However, the requirements can be different based on each doctor’s office so please cross check with the doctor’s office before you go for your medical exam.</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."   IRCC has requested a medical exam to process your application further. Please click the link below to search IRCC panel physicians in your area. Please in sure to bring all the necessary documents along with this request letter for your medical exam.";



	 $mobile_number=$cmobile;
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



public function biometric_requested($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Medical Requested";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";

 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$name.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Greetings From Sia immigration.
</td>
                        </tr>
                            <tr> Your Biometric Requested received Successfuly  . We will keep you updated if any further information or documentation will be requested by the processing officer</td>
                            </tr>
                           
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."   Your Biometric Requested received Successfuly  . We will keep you updated if any further information or documentation will be requested by the processing officer";



	 $mobile_number=$cmobile;
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


public function biometric_completed($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Biometric Completed";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$name.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Greetings From Sia immigration.
</td>
                        </tr>
                            <tr> Your Biometric Requested Completed Successfuly  . We will keep you updated if any further information or documentation will be requested by the processing officer</td>
                            </tr>
                           
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."   Your Biometric Requested received Successfuly  . We will keep you updated if any further information or documentation will be requested by the processing officer";



	 $mobile_number=$cmobile;
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




public function interview_ADR_requested($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Interview/ADR Requested";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$name.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Greetings From Sia immigration.
</td>
                        </tr>
                            <tr> Your Interview/ADR Requested . We will keep you updated if any further information or documentation will be requested by the processing officer</td>
                            </tr>
                           
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."   Your Interview/ADR Requested  . We will keep you updated if any further information or documentation will be requested by the processing officer";



	 $mobile_number=$cmobile;
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



public function interview_ADR_completed($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Interview/ADR Completed";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$name.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Greetings From Sia immigration.
</td>
                        </tr>
                            <tr> Your Interview/ADR Completed. We will keep you updated if any further information or documentation will be requested by the processing officer</td>
                            </tr>
                           
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."   Your Interview/ADR Completed  . We will keep you updated if any further information or documentation will be requested by the processing officer";



	 $mobile_number=$cmobile;
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


public function passport_requested($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Passport Requested";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$name.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Greetings From Sia immigration.
</td>
                        </tr>
                            <tr>IRCC has made a decision on your application and has requested your passport to complete the application process.Kindly submit your passport as per provided guidelines in the attached letter. You may contact our staff if you’re unsure how to send your passport to IRCC.</td>
                            </tr>
                           
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."   IRCC has made a decision on your application and has requested your passport to complete the application process.Kindly submit your passport as per provided guidelines in the attached letter. You may contact our staff if you’re unsure how to send your passport to IRCC.
";



	 $mobile_number=$cmobile;
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


public function approved($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Approved";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$name.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Greetings From Sia immigration.
</td>
                        </tr>
                            <tr>We would like to inform you that your Request approved successfully .
</td>
                            </tr>
                           
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."   We would like to inform you that your Request approved successfully 
";



	 $mobile_number=$cmobile;
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


public function refused($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Refused";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$name.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Greetings From Sia immigration.
</td>
                        </tr>
                            <tr>Sorry your Request Refused .
</td>
                            </tr>
                           
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."  Sorry your Request Refused";



	 $mobile_number=$cmobile;
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




public function view_job_lmia()
	{

$Lmia_job = new Lmia_job_model(); 
	$data['lmia_job'] = $Lmia_job->getpost();

		return view('admin/employers/view_job_lmia',$data);
	}



	public function edit_job_lmia($id)
	{

if ($this->request->getMethod()=='post'){


	$data = [
    'emp_name'=>$this->request->getPost('emp_name'),
	'req'=>$this->request->getPost('req'),
	'job_dec'=>$this->request->getPost('job_dec'),
	'type'=>$this->request->getPost('type'),
	
	
	'updated_at'=>date( 'Y-m-d H:i:s' )
];

$Lmia_job = new Lmia_job_model(); 
$updatee=$Lmia_job->update($id, $data);
if($updatee){

$url = 'Siaportal/view_job_lmia';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{


$Emp = new Emp_model(); 
	$data['emp'] = $Emp->getpost();

		return view('admin/employers/edit_job_lmia',$data);

}


}else{

	$Lmia_job = new Lmia_job_model(); 
	
	//$Prospect = new Team_model(); 
	$lmia_job = new Lmia_job_model(); 
	$data['lmia_job'] = $lmia_job->where('id', $id)
                   ->findAll();


                   $Emp = new Emp_model(); 
	$data['emp'] = $Emp->getpost();

		return view('admin/employers/edit_job_lmia',$data);
	}
}




	///-----------------------------------------

	public function view_emp_own_lmia()
	{

$Siaportal = new Siaportal_model(); 
	$data['client'] = $Siaportal->getpost();

		return view('admin/employers/view_emp_own_lmia',$data);
	}


	//-------------------------------------

public function view_stu_need_job()
	{

$Siaportal = new Siaportal_model(); 
	$data['client'] = $Siaportal->getpost();

		return view('admin/student/view_stu_need_job',$data);
	}

//-------------------------------------


	public function add_lmia_needed()
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

                $Prospect = new Prospect_model();

	$insert=$Prospect->insert([
	'resume'=>$newName,
    'news_image1'=>$this->request->getPost('news_image1'),
	'heading'=>$this->request->getPost('name'),
	'number'=>$this->request->getPost('contact'),
	//'alt_mobile_no'=>$this->request->getPost('alt_mobile_no'),

	'email'=>$this->request->getPost('email'),
	//'client_status'=>$this->request->getPost('client_status'),
	//'spouse_name'=>$this->request->getPost('spouse_name'),
	//'reff'=>$this->request->getPost('reff'),
	//'user_dob'=>$this->request->getPost('dob'),
	//'file_number'=>$this->request->getPost('file_number'),
	//'address'=>$this->request->getPost('address'),
	//'city'=>$this->request->getPost('city'),
	'source'=>$this->request->getPost('source'),
	//'family'=>$this->request->getPost('family'),
	//'master_sia_id'=>$this->request->getPost('master_sia_id'),
	'team_member'=>$this->request->getPost('team_member'),
	//'file_status'=>$this->request->getPost('file_status'),
	'typee'=>'lmia_needed',
	//'category'=>$this->request->getPost('category'),
	'voice_added'=>'siaportal',
	'entery_status'=>'prospect',
	'insert_on' => date( 'Y-m-d H:i:s' )
	
]);
if($insert){
	
	$voice= $this->request->getPost('news_image1');
	$vv="https://canada.siaimmigration.com/form/".$voice."";
	$heading = $this->request->getPost('name');
	$number = $this->request->getPost('contact');
	//$alt_mobile_no = $this->request->getPost('alt_mobile_no');

	$email = $this->request->getPost('email');
	//$client_status = $this->request->getPost('client_status');
	//$spouse_name = $this->request->getPost('spouse_name');
	//$reff = $this->request->getPost('reff');
	//$user_dob = $this->request->getPost('dob');
	
	//$address = $this->request->getPost('address');
	//$city = $this->request->getPost('city');
	$source = $this->request->getPost('source');
	//$family = $this->request->getPost('family');
	//$master_sia_id = $this->request->getPost('master_sia_id');
	$agent_name = $this->request->getPost('agent_name');

$From="Sia Immigration";
					 $emaill="mkj@siaimmigration.com";
					//$subject  = "".ucfirst($cs).",id-".$dell.",Name-".$name."";
					$subject  = "LMIA Needed Added";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Client Detail. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Name : ' .$heading.'<br>';
					$message .= 'Number : ' .$number.'<br>';
					//$message .= 'Alt. mobile number : ' .$alt_mobile_no.'<br>';
					$message .= 'Email : ' .$email.'<br>';
					//$message .= 'Client Status : ' .$client_status.'<br>';
					//$message .= 'Spouse name : ' .$spouse_name.'<br>';
					//$message .= 'Reference : ' .$reff.'<br>';
					//$message .= 'Date of birth : ' .$user_dob.'<br>';
					//$message .= 'Address : ' .$address.'<br>';
					//$message .= 'City : ' .$city.'<br>';
					$message .= 'Source : ' .$source.'<br>';
					$message .= 'Agent name : ' .$agent_name.'<br>';
					$message .= 'voice : ' .$vv.'<br>';

					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



//$message1="Your user name is ".$email." and password is ".$pass." .please click on https://canada.siaimmigration.com  to login";

$message1=" LMIA needed added:- ".$heading."-".$number."-".$email."-".$source."-".$agent_name."";


//$phone = array('919653364499','17782575709','7658844497');
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

$url = 'Siaportal/add_lmia_needed';
					echo'
					<script>
					alert("Record Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	


}else{
	$url = 'Siaportal/add_lmia_needed';
					echo'
					<script>
					alert("Record  Not Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}
}




                ////////////////////////////////////////////

            }
        }



		
     	

$Team = new Team_model(); 
	$data['team'] = $Team->getpost();
//$data['navv']='admininclude/admin_nav';
		return view('admin/lmia/add_lmia_needed',$data);
	}


public function view_lmia_needed()
	{

$Lmia = new Prospect_model(); 
	$data['lmia_needed'] = $Lmia->get_lmia('lmia_needed');

		return view('admin/lmia/view_lmia_needed',$data);
	}





/////////////////////////
public function add_student_need_job()
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

                $Prospect = new Prospect_model();

	$insert=$Prospect->insert([
	'resume'=>$newName,
    'news_image1'=>$this->request->getPost('news_image1'),
	'heading'=>$this->request->getPost('name'),
	'number'=>$this->request->getPost('contact'),
	//'alt_mobile_no'=>$this->request->getPost('alt_mobile_no'),

	'email'=>$this->request->getPost('email'),
	//'client_status'=>$this->request->getPost('client_status'),
	//'spouse_name'=>$this->request->getPost('spouse_name'),
	//'reff'=>$this->request->getPost('reff'),
	//'user_dob'=>$this->request->getPost('dob'),
	//'file_number'=>$this->request->getPost('file_number'),
	//'address'=>$this->request->getPost('address'),
	//'city'=>$this->request->getPost('city'),
	'source'=>$this->request->getPost('source'),
	//'family'=>$this->request->getPost('family'),
	//'master_sia_id'=>$this->request->getPost('master_sia_id'),
	'team_member'=>$this->request->getPost('team_member'),
	//'file_status'=>$this->request->getPost('file_status'),
	'typee'=>'student_need_job',
	//'category'=>$this->request->getPost('category'),
	'voice_added'=>'siaportal',
	'entery_status'=>'prospect',
	'insert_on' => date( 'Y-m-d H:i:s' )
	
]);
if($insert){
	
	$voice= $this->request->getPost('news_image1');
	$vv="https://canada.siaimmigration.com/form/".$voice."";
	$heading = $this->request->getPost('name');
	$number = $this->request->getPost('contact');
	//$alt_mobile_no = $this->request->getPost('alt_mobile_no');

	$email = $this->request->getPost('email');
	//$client_status = $this->request->getPost('client_status');
	//$spouse_name = $this->request->getPost('spouse_name');
	//$reff = $this->request->getPost('reff');
	//$user_dob = $this->request->getPost('dob');
	
	//$address = $this->request->getPost('address');
	//$city = $this->request->getPost('city');
	$source = $this->request->getPost('source');
	//$family = $this->request->getPost('family');
	//$master_sia_id = $this->request->getPost('master_sia_id');
	$agent_name = $this->request->getPost('agent_name');

$From="Sia Immigration";
					 $emaill="mkj@siaimmigration.com";
					//$subject  = "".ucfirst($cs).",id-".$dell.",Name-".$name."";
					$subject  = "Student Need Job";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Client Detail. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Name : ' .$heading.'<br>';
					$message .= 'Number : ' .$number.'<br>';
					//$message .= 'Alt. mobile number : ' .$alt_mobile_no.'<br>';
					$message .= 'Email : ' .$email.'<br>';
					//$message .= 'Client Status : ' .$client_status.'<br>';
					//$message .= 'Spouse name : ' .$spouse_name.'<br>';
					//$message .= 'Reference : ' .$reff.'<br>';
					//$message .= 'Date of birth : ' .$user_dob.'<br>';
					//$message .= 'Address : ' .$address.'<br>';
					//$message .= 'City : ' .$city.'<br>';
					$message .= 'Source : ' .$source.'<br>';
					$message .= 'Agent name : ' .$agent_name.'<br>';
					$message .= 'voice : ' .$vv.'<br>';

					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



//$message1="Your user name is ".$email." and password is ".$pass." .please click on https://canada.siaimmigration.com  to login";

$message1=" Student Need Job:- ".$heading."-".$number."-".$email."-".$source."-".$agent_name."";


//$phone = array('919653364499','17782575709');
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

$url = 'Siaportal/add_student_need_job';
					echo'
					<script>
					alert("Record Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	


}else{
	$url = 'Siaportal/add_student_need_job';
					echo'
					<script>
					alert("Record  Not Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}
}




                ////////////////////////////////////////////

            }
        }



		
     	

$Team = new Team_model(); 
	$data['team'] = $Team->getpost();
//$data['navv']='admininclude/admin_nav';
		return view('admin/lmia/add_student_need_job',$data);
	}


	///////////////////////////

	public function view_employe_for_student()
	{

$emp_stu = new Prospect_model(); 
	$data['emp_for_student'] =$emp_stu->get_lmia('student_need_job');

		return view('admin/lmia/view_employer_for_student',$data);
	}

///////////////-------------

public function view_family_tree()
	{

$family = new Prospect_model(); 

$data['family'] = $family->where('family', 'yes')
                   ->findAll();

	//$data['emp_for_student'] =$emp_stu->get_lmia('student_need_job');

		return view('admin/family/view_family_tree',$data);
	}


	public function all_family_member($mid)
	{

$MIDD = new Prospect_model(); 
	

$data['mmid'] = $MIDD->where('master_sia_id', $mid)
                   ->findAll();

		return view('admin/family/all_family_member',$data);
	}


///-----------------------

public function add_td_card()
	{

		if ($this->request->getMethod()=='post'){
$Siaportal = new Siaportal_model();

$insert=$Siaportal->insert([

	'name'=>$this->request->getPost('name'),
	//'email'=>$this->request->getPost('email'),
]);
if($insert){
	echo"hi";
}else{
	echo 'hello';
}
}
$agent = new Agent_model(); 
	$data['agent'] = $agent->getpost();
//$data['navv']='admininclude/admin_nav';
		return view('admin/tdcard/add_td_card',$data);
	}

	public function view_td_card()
	{

$Siaportal = new Siaportal_model(); 
	$data['client'] = $Siaportal->getpost();



$card = new Client_application_model();

                  
	$data['card'] = $card->where('fee','td_credit_card')
                   ->findAll();



		return view('admin/tdcard/view_td_card',$data);
	}
	//--------------------------------------------------------------------



///-----------------------

public function add_agent()
	{

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
					 $emaill="mkj@siaimmigration.com";
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
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="New Agent Added- ".$name."-".$mobile_no."-".$city."-".$country."";

//$message1="New Employer Addeds";


//$phone = array('919653364499','17782575709');
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



	$url = 'Siaportal/add_agent';
					echo'
					<script>
					alert("Record Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{
	$url = 'Siaportal/add_agent';
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
		return view('admin/agent/add_agent',$data);
	}

	public function view_agent()
	{

$Agent = new Agent_model(); 
	$data['agent'] = $Agent->getpost();

		return view('admin/agent/view_agent',$data);
	}


	public function edit_agent($id)
	{

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

$url = 'Siaportal/view_agent';
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

		return view('admin/agent/edit_agent',$data);

}


}else{
	//$Prospect = new Team_model(); 
	$Agent = new Agent_model(); 
	$data['agent'] = $Agent->where('id', $id)
                   ->findAll();

		return view('admin/agent/edit_agent',$data);
	}
}





	//--------------------------------------------------------------------

///------new form start--------------


///-----------------------

public function add_new_form()
	{

		if ($this->request->getMethod()=='post'){
$New_form = new New_form_model();

$insert=$New_form->insert([

	'heading'=>$this->request->getPost('heading'),
	'form_body'=>$this->request->getPost('form_body'),	
	'status'=>'1',
	'insert_on'=>date( 'Y-m-d H:i:s' )
	
]);
if($insert){

	$heading = $this->request->getPost('heading');
	$form_body = $this->request->getPost('form_body');
	

$From="Sia Immigration";
					 $emaill="mkj@siaimmigration.com";
					$subject  = "SiaPortal New Form Added :-Date-".date('d/m/Y')."";
					//$subject  = "";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					$message ='New Form Added<br>';
					$message .=' Agent Deatail. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Heading : ' .$heading.'<br>';
					$message .= 'Form Body: ' .$form_body.'<br>';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="New Form Added- ".$heading."";

//$message1="New Employer Addeds";


//$phone = array('919653364499','17782575709');

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



	$url = 'Siaportal/add_new_form';
					echo'
					<script>
					alert("Record Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{
	$url = 'Siaportal/add_new_form';
					echo'
					<script>
					alert("Record not added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}
}

		return view('admin/new_form/add_new_form');
	}

	public function view_new_form()
	{

$New_form = new New_form_model(); 
	$data['new_form'] = $New_form->getpost();

		return view('admin/new_form/view_new_form',$data);
	}


	public function edit_new_form($id)
	{

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

$url = 'Siaportal/view_new_form';
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

		return view('admin/new_form/edit_new_form',$data);

}


}else{
	//$Prospect = new Team_model(); 
	$Agent = new Agent_model(); 
	$data['agent'] = $Agent->where('id', $id)
                   ->findAll();

		return view('admin/new_form/edit_new_form',$data);
	}
}





	//--------------------------------------------------------------------

///////////end new form --------------



public function add_prospect()
	{

		if ($this->request->getMethod()=='post'){
$Prospect = new Prospect_model();

$insert=$Prospect->insert([

	'news_image1'=>$this->request->getPost('news_image1'),
	'heading'=>$this->request->getPost('heading'),
	'typee'=>$this->request->getPost('typee'),
	
	'agent_name'=>$this->request->getPost('agent_name'),
	'team_member'=>$this->request->getPost('team_member'),
	'email'=>$this->request->getPost('email'),
	'voice_added'=>'siaportal',
	'entery_status'=>'prospect',
	'insert_on' => date( 'Y-m-d H:i:s' )
]);
if($insert){
	$url = 'Siaportal/add_prospect';
					echo'
					<script>
					alert("Record  added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{
	$url = 'Siaportal/add_prospect';
					echo'
					<script>
					alert("Record not  added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}
}
$Prospect = new Prospect_model();

	$data['prospect'] = $Prospect->getpost();
//$data['navv']='admininclude/admin_nav';
		return view('admin/prospect/add_prospect',$data);
	}

	public function view_prospect()
	{

$Prospect = new Prospect_model(); 
	$data['prospect'] = $Prospect->getentery();

		return view('admin/prospect/view_prospect',$data);
	}



public function edit_prospect($id)
	{

if ($this->request->getMethod()=='post'){


	$data = [
    'agent_name'=>$this->request->getPost('agent_name'),
	'team_member'=>$this->request->getPost('team_member'),
	'email'=>$this->request->getPost('email'),
	'heading'=>$this->request->getPost('heading'),
	'typee'=>$this->request->getPost('typee'),
	'number'=>$this->request->getPost('number'),
	//'reff'=>$this->request->getPost('reff'),
	//'status'=>$this->request->getPost('status'),
	
	'updated_at'=>date( 'Y-m-d H:i:s' )
];

$Prospect = new Prospect_model(); 
$updatee=$Prospect->update($id, $data);
if($updatee){

$url = 'Siaportal/edit_prospect/'.$id;
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{

$Prospect = new Prospect_model(); 
	$data['agent'] = $Prospect->where('id', $id)
                   ->findAll();

		return view('admin/prospect/edit_prospect',$data);

}


}else{
	//$Prospect = new Team_model(); 
		$Prospect = new Prospect_model(); 
	$data['prospect'] = $Prospect->where('id', $id)
                   ->findAll();

		return view('admin/prospect/edit_prospect',$data);
	}
}


public function immigration_enquiry_mail($id,$mail_send=NULL){


$Prospect = new Prospect_model(); 
	$data['new_record'] = $Prospect->where('id', $id)
                   ->findAll();

	//$data['new_record']=$this->Backoffice_model_kamloops->getRecoId('immigration_enquiry',$id);

$email11=$data['new_record']['0']['email'];
$na=$data['new_record']['0']['heading'];
if(!empty($email11)){

			
	 $mail_send=$mail_send+1;
	//exit();
			$data = array(
							
							
							'mail_send'=>$mail_send,
							'mail_send_on' =>date( 'Y-m-d H:i:s')
							
						 );


			$Prospect = new Prospect_model(); 
$updatee=$Prospect->update($id, $data);
	//$AddData = $this->Backoffice_model_kamloops->updateData('immigration_enquiry',$data,$id);




		$From1=" Sia immigration solutions";
					 $emaill1="mkj@siaimmigration.com";
					
						$subject1  = "imp: About your Immigration Enquiry";	
					
											
											
					$headers1  = "MIME-Version: 1.0\r\n";
 					$headers1 .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers1.="From: \"".$From1."\"<".$emaill1."> \r\n";			

 					 $headers .= 'From:  ' . $From1 . ' <' . $emaill1 .'>' . " \r\n" .
            'Reply-To: '.  $emaill1 . "\r\n" .
            'X-Mailer: PHP/' . phpversion();		
					
					$message1 ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <body style="background:#f1f1f1;">
    <div style="background-color:#f1f1f1;color:#006495;width:100%;min-width:100%;padding:0px;margin:0px;">
      <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1;width:100%;padding:15px;">
        <tr>
          <td>
            <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:1100px;margin:0px auto;background-color:#fff;color:#333;">
              <tbody>
                <tr>
                  <td align="center" valign="top">
                    
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                      <tbody>
                        <tr>
                          <td valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                              <tbody>
                                <tr>
                                  <td valign="top">
                                    
                                    <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                                      <tbody>
                                        <tr>
                                          <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                          </td>
                                          <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                          </td>
                                        </tr>
                                        <tr>
                                          <td colspan="2">
                                            <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding-top:9px;">
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                              <tbody>
                                <tr>
                                  <td valign="top">                            </td>
                                </tr>
                                <tr>
                                  <td> </td>
                                </tr>
                                <tr>
                                  <td valign="top">                              </td>
                                </tr>
                                <tr>
                                  <td> </td>
                                </tr>
                                <tr>
                                  <td>
                                    <p>Hi Dear,</p>
                                    
                                  </td>
                                </tr>
                                <tr>
                                  <td>Greetings from Sia immigration</td>
                                </tr>
                                <tr>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td>Hope you are doing well</td>
                                </tr>

                                <tr>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td>I am writing to follow up on our last conversation.</td>
                                </tr>
                                <tr>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td> </td>
                                </tr>
                                <tr>
                                  <td>Let us know if you are still interested and looking for any service related to your immigration process</td>
                                </tr>
                                <tr>
                                  <td> </td>
                                </tr>
                                <tr>
                                  <td>We would be more than happy to assist you</td>
                                </tr>

                                <tr>
                                  <td></td>
                                </tr>

                                <tr>
                                  <td>Wish you good luck</td>
                                </tr>
                                <tr>
                                  <td>Hope to hear from you soon</td>
                                </tr>
                                <tr>
                                  <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:1px solid #ccc;"> </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                          <td width="133">
                                            <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                          </tr>
                                          <tr>
                                            <td> </td>
                                          </tr>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td valign="top" align="center">
                                        
                                        <table width="200" border="0" style="background:#d1d5d8;width:100%;padding:1px;text-align:center;">
                                          <tr>
                                            <td height="31" colspan="7" scope="row" style="border-bottom:1px solid #fff;" align="center">
                                              <span style="color:#e31e24; font-weight:bold; font-size:18px;">Get in Touch</span>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td height="9" colspan="7" scope="row" style="padding-top:15px;" align="center">
                                              <strong>Sia Immigration Solutions Inc</strong>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td height="9" colspan="7" scope="row" align="center">
                                              <strong>122 8028 128 St, Surrey, BC V3W 4E9</strong>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td height="20" colspan="7" scope="row" align="center">
                                              <strong>246 2 Ave #301, Kamloops, BC V2C 2C9</strong>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td height="3" colspan="7" scope="row">
                                              <table width="262" border="0" style="width:100%;">
                                                <tr>
                                                  <th height="43" colspan="2" scope="row" align="center">For Admission applications:
                                                    <br>
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <td width="59" scope="row" valign="top">
                                                    <div style="padding-bottom:5px;">Munish Joshi</div>
                                                    <div style="padding-bottom:5px;">Cell +1 (778) 257-5709</div>
                                                    <div style="padding-bottom:5px;">
                                                      <a href="mailto:mj@siaimmigration.com" target="_blank" style="text-decoration:none;color:#076ea9;">mj@siaimmigration.com</a>
                                                    </div>
                                                    <div style="padding-bottom:5px;">
                                                      <a href="https://api.whatsapp.com/send?phone=17782575709" target="_blank" style="color:#40a840;text-decoration:none;font-weight:bold;">WhatsApp</a> </div>
                                                    </td>
                                                    <td width="122" valign="top">
                                                      <div style="padding-bottom:5px;">Keerti Kumar</div>
                                                      <div style="padding-bottom:5px;">Cell +1 (778) 228-1017</div>
                                                      <div style="padding-bottom:5px;">
                                                        <a href="mailto:office@siaimmigration.com" target="_blank" style="text-decoration:none;color:#076ea9;">office@siaimmigration.com</a>
                                                      </div>
                                                      <div style="padding-bottom:5px;">
                                                        <a href="https://api.whatsapp.com/send?phone=17782281017" target="_blank" style="color:#40a840;text-decoration:none;font-weight:bold;">WhatsApp</a>
                                                      </div>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td height="41" colspan="2">
                                                      <strong>Immigration process applications:
                                                        <br></strong>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td valign="top">
                                                        <div style="padding-bottom:5px;">Ramandeep Kaur</div>
                                                        <div style="padding-bottom:5px;">Cell +1 (778) 257-5508</div>
                                                        <div style="padding-bottom:5px;">
                                                          <a href="mailto:kam@siaimmigration.com" target="_blank" style="text-decoration:none;color:#076ea9;">kam@siaimmigration.com</a>
                                                        </div>
                                                        <div style="padding-bottom:5px;">
                                                          <a href="https://api.whatsapp.com/send?phone=+17782575507" target="_blank" style="color:#40a840;text-decoration:none;font-weight:bold;">WhatsApp</a>
                                                        </div>
                                                      </td>
                                                      <td valign="top">
                                                        <div style="padding-bottom:5px;">Manpreet Joshi</div>
                                                        <div style="padding-bottom:5px;">Cell +1 (778) 257-5508</div>
                                                        <div style="padding-bottom:5px;">
                                                          <a href="mailto:mkj@siaimmigration.com" target="_blank" style="text-decoration:none;color:#076ea9;">mkj@siaimmigration.com</a>
                                                        </div>
                                                        <div style="padding-bottom:5px;">
                                                          <a href="https://api.whatsapp.com/send?phone=17782575508" target="_blank" style="color:#40a840;text-decoration:none;font-weight:bold;">WhatsApp</a>
                                                        </div>
                                                      </td>
                                                    </tr>
                                                  </table>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th colspan="7" scope="row"> </th>
                                              </tr>
                                              <tr>
                                                <th width="33%" scope="row"> </th>
                                                <td width="10%" style="border-right:1px solid #fff;" align="center">
                                                  <a href="https://www.facebook.com/SiaImmigration/" target="_blank" style="color:#2f4261;text-decoration:none;font-weight:bold;">Facebook</a>                                                </td>
                                                  <td width="13%" style="border-right:1px solid #fff;" align="center">
                                                    <a href="https://www.instagram.com/siaimmigration/" target="_blank" style="color:#bd0015;text-decoration:none;font-weight:bold;">Instagram</a>                                                </td>
                                                    <td width="8%" align="center">
                                                      <a href="https://www.youtube.com/channel/UCo1bnESxqcMM66zFHz3NaHA" target="_blank" style="color:#ed1c27;text-decoration:none;font-weight:bold;">Youtube</a>                                                </td>
                                                      <th width="36%" scope="row"> </th>
                                                    </tr>
                                                    <tr>
                                                      <th height="0" colspan="7" scope="row"> </th>
                                                    </tr>
                                                    <tr>
                                                      <th height="1" colspan="7" scope="row" align="center">
                                                        <a href="https://www.siaimmigration.com" target="_blank" style="color:#076ea9;text-decoration:none;">www.siaimmigration.com</a>
                                                      </th>
                                                    </tr>
                                                    <tr>
                                                      <th height="3" colspan="7" scope="row"> </th>
                                                    </tr>
                                                    <tr>
                                                      <th height="4" colspan="7" scope="row" align="center">
                                                        <table width="321" border="0" align="center">
                                                          <tr>
                                                            <td width="153" align="center" style="border-right:1px solid #fff;">
                                                              
                                                            </td>
                                                            <td width="158" align="center">
                                                              
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </th>
                                                    </tr>
                                                    <tr>
                                                      <th height="10" colspan="7" scope="row"> </th>
                                                    </tr>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                              <tr>
                                <td align="center" valign="top"> </td>
                              </tr>
                              <tr>
                                <td align="center" valign="top"> <strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                              </tr>
                              <tr>
                                <td align="center" valign="top"> </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </div>
                </body>
</html>';

					@mail($email11.',noreply@siaimmigration.com', $subject1, $message1, $headers1);
					



		$Team = new Prospect_model(); 
	$data['new_record'] = $Team->where('id', $id)
                   ->findAll();	
			
//	$data['new_record']=$this->Backoffice_model_kamloops->getRecoId('immigration_enquiry',$id);



	$url = '/Siaportal/view_prospect';
					echo'
					<script>
					alert("Email send Successfully");
					window.location.href = "'.base_url().$url.'";
					</script>
					';
	
	
	}else{

$url = '/Siaportal/edit_prospect/'.$id;
					echo'
					<script>
					alert("please add email");
					window.location.href = "'.base_url().$url.'";
					</script>
					';

	}





}


public function immigration_enquiry_sms($id){


	//$data['new_record']=$this->Backoffice_model_kamloops->getRecoId('immigration_enquiry',$id);

	$Prospect = new Prospect_model(); 
	$data['new_record'] = $Prospect->where('id', $id)
                   ->findAll();

$email11=$data['new_record']['0']['number'];
$na=$data['new_record']['0']['heading'];
$mail_send1=$data['new_record']['0']['sms_send'];
if(!empty($email11)){



			
	 $mail_send=$mail_send1+1;
	//exit();
			$data = array(
							
							
							'sms_send'=>$mail_send,
							'sms_send_on' =>date( 'Y-m-d H:i:s')
							
						 );

			$Prospect = new Prospect_model(); 
$updatee=$Prospect->update($id, $data);
	//$AddData = $this->Backoffice_model_kamloops->updateData('immigration_enquiry',$data,$id);

$message1="Hi,Further to your immigration Inquiry, Let us know if you are still interested for any service related to your immigration process Please Call +17782575508";

	$mobile_number=$email11;
	

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

/*
if ($err) {
 echo "cURL Error #:" . $err;
} else {
 echo $response;
}
*/

			
			
	//$data['new_record']=$this->Backoffice_model_kamloops->getRecoId('immigration_enquiry',$id);
$Team = new Prospect_model(); 
	$data['new_record'] = $Team->where('id', $id)
                   ->findAll();	


	$url = '/Siaportal/view_prospect';
					echo'
					<script>
					alert("Sms send Successfully");
					window.location.href = "'.base_url().$url.'";
					</script>
					';
	
	
	}else{

$url = '/Siaportal/edit_prospect/'.$id;
					echo'
					<script>
					alert("please add Mobile number (e.g 17782575709)");
					window.location.href = "'.base_url().$url.'";
					</script>
					';

	}


}


public function move_to_client($id){

	$data = array(
							
							
							'entery_status'=>'client',
							//'sms_send_on' =>date( 'Y-m-d H:i:s')
							
						 );




				$From="siaimmigration";
					 $emaill="mkj@siaimmigration.com";
					//$subject  = "".ucfirst($cs).",id-".$dell.",Name-".$name."";
					$subject  = "Move To client";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Entery Detail <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= '<h3 style="color:red;">Siaportal id no :-</h3><p style="color:#000080">'.$id.' Move into client</p><br>';
					
					
		
	
	@mail('ds@siaimmigration.com,mkj@siaimmigration.com',$subject,$message,$headers);

			$Prospect = new Prospect_model(); 
$updatee=$Prospect->update($id, $data);

	$url = '/Siaportal/view_prospect';
					echo'
					<script>
					alert("Record Move Successfully");
					window.location.href = "'.base_url().$url.'";
					</script>
					';

}

///---------------------------------------------



	///-----------------------

public function add_team_login()
	{

		if ($this->request->getMethod()=='post'){

$rules = [
'firstname' =>'required|min_length[3]',
'lastname' =>'required|min_length[3]',
'email' =>'required|min_length[6]|valid_email|is_unique[reg.email]',
'mobile_no' =>'required|min_length[10]',
'password' =>'required|min_length[3]',

];

if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}
	else{

$Team = new Team_model();


//echo $fn=$session()->get('firstname');
//exit();
$insert=$Team->insert([

	'firstname'=>$this->request->getPost('firstname'),
	'lastname'=>$this->request->getPost('lastname'),
	'email'=>$this->request->getPost('email'),
	'mobile_no'=>$this->request->getPost('mobile_no'),
	'password'=>$this->request->getPost('password'),
	'pass'=>$this->request->getPost('password'),
	'type'=>$this->request->getPost('type'),
	'status'=>$this->request->getPost('status'),
	'added_by'=>session()->get('firstname'),
	'added_by_id'=>session()->get('id'),	
	'created_at'=>date( 'Y-m-d H:i:s' )
	//'email'=>$this->request->getPost('email'),
]);
if($insert){
	
$pass=$this->request->getPost('password');
$email=$this->request->getPost('email');

$mno=$this->request->getPost('mobile_no');




$From="siaimmigration";
					 $emaill="mkj@siaimmigration.com";
					//$subject  = "".ucfirst($cs).",id-".$dell.",Name-".$name."";
					$subject  = "Password";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Login Detail. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= '<h3 style="color:red;">User name </h3><p style="color:#000080">'.$email.'</p><br>';
					$message .= '<h3 style="color:red;">Password </h3><p style="color:#000080">'.$pass.'</p><br>';
					//$message .= '<h3 style="color:red;">password : </h3><p style="color:#000080">' .$dataa.'</p><hr><br>';
					$message .= '<a  href="https://canada.siaimmigration.com" target="_blank">Click to login</a><br>';
					
					//$message .= '<h3 style="color:red;">Please dont share this link to anyone</h3><hr><br>';
					
					
		
	
	@mail($email,$subject,$message,$headers);



$message1="Your user name is ".$email." and password is ".$pass." .please click on https://canada.siaimmigration.com  to login";

	$mobile_number=$mno;
	
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



}else{
	echo 'hello';
}
}
}

//echo view('templates/header', $data);
$data['navv']='admininclude/admin_nav';
		return view('admin/team/add_team',$data);
	}

	public function view_team_login()
	{


	//$Prospect = new Team_model(); 
	$Team = new Team_model(); 
	$data['team'] = $Team->getpost();

		return view('admin/team/view_team',$data);
	}


public function edit_team($id)
	{

if ($this->request->getMethod()=='post'){


	$data = [
    'firstname'=>$this->request->getPost('firstname'),
	'lastname'=>$this->request->getPost('lastname'),
	'email'=>$this->request->getPost('email'),
	'mobile_no'=>$this->request->getPost('mobile_no'),
	'password'=>$this->request->getPost('password'),
	'pass'=>$this->request->getPost('password'),
	'type'=>$this->request->getPost('type'),
	'status'=>$this->request->getPost('status'),
	
	'updated_at'=>date( 'Y-m-d H:i:s' )
];

$Team = new Team_model(); 
$updatee=$Team->update($id, $data);
if($updatee){

$url = 'Siaportal/view_team_login';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{

$Team = new Team_model(); 
	$data['team'] = $Team->where('id', $id)
                   ->findAll();

		return view('admin/team/edit_team',$data);

}


}else{
	//$Prospect = new Team_model(); 
	$Team = new Team_model(); 
	$data['team'] = $Team->where('id', $id)
                   ->findAll();

		return view('admin/team/edit_team',$data);
	}
}

	//--------------------------------------------------------------------



///-----------------------

public function add_category()
	{

		if ($this->request->getMethod()=='post'){
$Category = new Category_model();

$insert=$Category->insert([

	'category'=>$this->request->getPost('category'),
	
	'status'=>'1',
	'insert_on'=>date( 'Y-m-d H:i:s' )
	//'email'=>$this->request->getPost('email'),
]);
if($insert){
	$url = 'Siaportal/add_category';
					echo'
					<script>
					alert("Record Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{
	$url = 'Siaportal/add_category';
					echo'
					<script>
					alert("Record not added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}
}

		return view('admin/category/add_category');
	}

	public function view_category()
	{

$Category = new Category_model(); 
	$data['category'] = $Category->getpost();

		return view('admin/category/view_category',$data);
	}


	public function edit_category($id)
	{

if ($this->request->getMethod()=='post'){


	$data = [
    'category'=>$this->request->getPost('category'),
	
	//'status'=>$this->request->getPost('status'),
	
	'updated_at'=>date( 'Y-m-d H:i:s' )
];

$category = new Category_model(); 
$updatee=$category->update($id, $data);
if($updatee){

$url = 'Siaportal/view_category';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{

$Category = new Category_model(); 
	$data['category'] = $Category->where('id', $id)
                   ->findAll();

		return view('admin/category/edit_category',$data);

}


}else{
	//$Prospect = new Team_model(); 
	$Category = new Category_model(); 
	$data['category'] = $Category->where('id', $id)
                   ->findAll();

		return view('admin/category/edit_category',$data);
	}
}
///-------------------------------


///-----------------------

public function add_type()
	{

		if ($this->request->getMethod()=='post'){
$Type = new Type_client_model();

$insert=$Type->insert([

	'category_id'=>$this->request->getPost('category_id'),
	'type'=>$this->request->getPost('type'),
	
	'status'=>'1',
	'insert_on'=>date( 'Y-m-d H:i:s' )
	//'email'=>$this->request->getPost('email'),
]);
if($insert){
	$url = 'Siaportal/add_type';
					echo'
					<script>
					alert("Record Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{
	$url = 'Siaportal/add_type';
					echo'
					<script>
					alert("Record not added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}
}
$Category = new Category_model(); 
	$data['category'] = $Category->getpost();
		return view('admin/type/add_type',$data);
	}

	public function view_type()
	{

$Type = new Type_client_model(); 
	$data['type'] = $Type->getpost();

		return view('admin/type/view_type',$data);
	}


	public function edit_type($id)
	{

if ($this->request->getMethod()=='post'){


	$data = [
    'category_id'=>$this->request->getPost('category_id'),
	'type'=>$this->request->getPost('type'),
	
	
	
	'updated_at'=>date( 'Y-m-d H:i:s' )
];

$TCM = new Type_client_model(); 
$updatee=$TCM->update($id, $data);
if($updatee){

$url = 'Siaportal/view_type';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{

$Type = new Type_client_model(); 
	$data['type'] = $Type->where('id', $id)
                   ->findAll();

                   $Category = new Category_model(); 
	$data['category'] = $Category->getpost();

	 $typedata = new Type_client_model(); 
	$data['typedata'] = $typedata->getpost_id($id);

		return view('admin/type/edit_type',$data);

}


}else{
	//$Prospect = new Team_model(); 
	$Type = new Type_client_model(); 
	$data['type'] = $Type->where('id', $id)
                   ->findAll();

                   $Category = new Category_model(); 
	$data['category'] = $Category->getpost();

	 $typedata = new Type_client_model(); 
	$data['typedata'] = $typedata->getpost_id($id);

		return view('admin/type/edit_type',$data);
	}
}
///-------------------------------


///-----------------------

public function add_status()
	{

		if ($this->request->getMethod()=='post'){
$Status = new Status_model();

$insert=$Status->insert([

	'category_id'=>$this->request->getPost('category_id'),
	'type_id'=>$this->request->getPost('type_id'),
	'app_status'=>$this->request->getPost('app_status'),
	
	'status'=>'1',
	'insert_on'=>date( 'Y-m-d H:i:s' )
	//'email'=>$this->request->getPost('email'),
]);
if($insert){
	$url = 'Siaportal/add_status';
					echo'
					<script>
					alert("Record Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{
	$url = 'Siaportal/add_status';
					echo'
					<script>
					alert("Record not added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}
}
$Category = new Category_model(); 
	$data['category'] = $Category->getpost();

	$type = new Type_client_model(); 
	$data['type'] = $type->getpost();



		return view('admin/status/add_status',$data);
	}

	public function view_status()
	{

$status = new Status_model(); 
	$data['status'] = $status->getpost();

		return view('admin/status/view_status',$data);
	}


	public function edit_status($id)
	{

if ($this->request->getMethod()=='post'){


	$data = [
    'category_id'=>$this->request->getPost('category_id'),
	'type_id'=>$this->request->getPost('type_id'),
	'app_status'=>$this->request->getPost('app_status'),
	
	
	'updated_at'=>date( 'Y-m-d H:i:s' )
];

$Status = new Status_model(); 
$updatee=$Status->update($id, $data);
if($updatee){

$url = 'Siaportal/view_status';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{

$Status = new Status_model(); 
	$data['status'] = $Status->where('id', $id)
                   ->findAll();

		return view('admin/status/edit_status',$data);

}


}else{
	//$Prospect = new Team_model(); 
	$Status = new Status_model(); 
	$data['status'] = $Status->where('id', $id)
                   ->findAll();

      $Category = new Category_model(); 
	$data['category'] = $Category->getpost();
	$Type = new Type_client_model(); 
	$data['type'] = $Type->getpost();   


	$status = new Status_model(); 
	$data['status'] = $status->getpost();              

		return view('admin/status/edit_status',$data);
	}
}
///-----------------------------------------


public function add_client_application($id)
	{

		if ($this->request->getMethod()=='post'){
$client_application = new Client_application_model();

$insert=$client_application->insert([
	'voice_msg'=>$this->request->getPost('news_image1'),
	'siaportalid'=>$this->request->getPost('Siaportal_id'),
	'category'=>$this->request->getPost('category'),
	'type'=>$this->request->getPost('type'),
	'application_status'=>$this->request->getPost('file_status'),
	
	'status'=>'1',
	'insert_on'=>date( 'Y-m-d H:i:s' )
	//'email'=>$this->request->getPost('email'),
]);
if($insert){



$id=$this->request->getPost('Siaportal_id');
$cid=$this->request->getPost('category');
$tid=$this->request->getPost('type');



                   $Client = new Prospect_model(); 
	$data['client'] = $Client->where('id', $id)
                   ->findAll();

                    $Category = new Category_model(); 
	$data['cat'] = $Category->where('id', $cid)
                   ->findAll();

                    $tc = new Type_client_model(); 
	$data['type'] = $tc->where('id', $tid)
                   ->findAll();

                   $name=$data['client']['0']['heading'];
                   $mobile_no=$data['client']['0']['number'];
                   $Email=$data['client']['0']['email'];
                   $cat=$data['cat']['0']['category'];
                   $type=$data['type']['0']['type'];
                  


				$From="siaimmigration";
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Ready to Apply ,id-".$id.",Name-".$name."";
					//$subject  = "Ready to Apply";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team, <br>';
					$message .= 'Application Is ready to Ready to Apply Now <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Name : ' .$name.'<br>';
					$message .= 'Mobile Number : ' .$mobile_no.'<br>';
					$message .= 'Email : ' .$Email.'<br>';
					$message .= 'Category : ' .$cat.'<br>';
					$message .= 'Type : ' .$type.'<br>';
				//	$message .= 'Date : ' .date('d/m/Y').'<br>';


					//$message .= '<h3 style="color:red;">Siaportal id no :-</h3><p style="color:#000080">'.$id.' Move into client</p><br>';
					
					
		
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



//$message1="Your user name is ".$email." and password is ".$pass." .please click on https://canada.siaimmigration.com  to login";

$message1="Application Is ready to Ready to Apply Now";


//$phone = array('919653364499','17782575709','7658844497');

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

	$url = 'Siaportal/view_client';
					echo'
					<script>
					alert("Record Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{
	$url = 'Siaportal/view_client';
					echo'
					<script>
					alert("Record not added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}
}


$Category = new Category_model(); 
	$data['category'] = $Category->getpost();

	$type = new Type_client_model(); 
	$data['type'] = $type->getpost();

   $data['id']=$id;

		return view('admin/client/add_client_application',$data);
		
	}


public function edit_client_application($category,$id,$sid,$type)
	{

if ($this->request->getMethod()=='post'){


	$data = [
    'name'=>$this->request->getPost('name'),
	'contact'=>$this->request->getPost('contact'),
	'email'=>$this->request->getPost('email'),
	'city'=>$this->request->getPost('city'),
	'country'=>$this->request->getPost('country'),
	'company_name'=>$this->request->getPost('company_name'),
	'company_type'=>$this->request->getPost('company_type'),
	//'status'=>$this->request->getPost('status'),
	
	'updated_at'=>date( 'Y-m-d H:i:s' )
];

$Emp = new Emp_model(); 
$updatee=$Emp->update($id, $data);
if($updatee){

$url = 'Siaportal/view_emp';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{

$Emp = new Emp_model(); 
	$data['team'] = $Emp->where('id', $id)
                   ->findAll();

		return view('admin/employers/edit_emp',$data);

}


}else{
//echo $category; echo '<br>';	
//echo $type;
//exit();

	if($category=='2' && $type=='2' ){
		
		$url = 'Siaportal/edit_bc_pnp_int_grd/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

//$this->edit_bc_pnp_int_grd($category,$id);
		//return view('admin/client_application/edit_bc_pnp_int_grd');
	}else if($category=='3'){
		return view('admin/client_application/edit_canadian_exp_class');

	}

	else if($category=='26' && $type=='100'){

		$url = 'Ainp_na/edit_ainp_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
		

	else if($category=='25' && $type=='101'){

		$url = 'Aipp_na/edit_aipp_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='47' && $type=='102'){

		$url = 'Amend_immi_doc_na/edit_amend_immi_doc_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='17' && $type=='103'){

		$url = 'BC_PNP_heathcare_prof_na/edit_bc_pnp_heathcare_prof_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}

	else if($category=='14' && $type=='104'){

		$url = 'BC_pnp_sw_in_can_na/edit_bc_pnp_sw_in_can_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}

	else if($category=='15' && $type=='105'){

		$url = 'Bc_pnp_sw_overseas_na/edit_bc_pnp_sw_overseas_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='29' && $type=='106'){

		$url = 'Caregivers_na/edit_caregivers_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}

	else if($category=='34' && $type=='107'){

		$url = 'Citizenship_application_na/edit_citizenship_application_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='20' && $type=='108'){

		$url = 'Family_sponsorship_na/edit_family_sponsorship_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='12' && $type=='109'){

		$url = 'FSTW_na/edit_fstw_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='11' && $type=='110'){

		$url = 'FSW_na/edit_fsw_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
	}
		else if($category=='45' && $type=='87'){

		$url = 'Indian_visa_na/edit_indian_visa_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
	}
	else if($category=='27' && $type=='112'){

		$url = 'International_exp_class_na/edit_international_exp_class_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='28' && $type=='75'){

		$url = 'Minp_na/edit_minp_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}


	else if($category=='35' && $type=='116'){

		$url = 'Pr_card_na/edit_pr_card_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='41' && $type=='117'){

		$url = 'RNIP_sault_na/edit_rnip_sault_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}

	else if($category=='40' && $type=='64'){

		$url = 'RNIP_vernon_na/edit_rnip_vernon_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='18' && $type=='119'){

		$url = 'RNIP_west_kootenay_na/edit_rnip_west_kootenay_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='30' && $type=='120'){

		$url = 'SINP_na/edit_sinp_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='38' && $type=='84'){

		$url = 'Travel_doc_application_na/edit_travel_doc_application_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}


	else if($category=='4' && $type=='4'){

		$url = 'Spausal_sponsorship_inland/edit_spausal_sponsorship_inland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='4' && $type=='5'){

		$url = 'Spausal_sponsorship_outland/edit_spausal_sponsorship_outland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

		//return view('admin/client_application/edit_spausal_sponsorship');

	}
	else if($category=='5' && $type=='26'){

			$url = 'Siaportal/edit_intl_stu_spousal_open_wp_inland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_intl_stu_spousal_open_wp');

	}

	else if($category=='5' && $type=='27'){

			$url = 'Siaportal/edit_intl_stu_spousal_open_wp_outland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_intl_stu_spousal_open_wp');

	}
	else if($category=='6' && $type=='24'){

		$url = 'Siaportal/edit_worker_spousal_open_wp_inland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}

else if($category=='44' && $type=='73'){

		$url = 'Lmia_global/edit_lmia_global_tlnt_high_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}

	else if($category=='32' && $type=='68'){

		$url = 'Lmia_wp_hg/edit_lmia_wp_high_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}

	else if($category=='32' && $type=='56'){

		$url = 'Lmia_wp_lg/edit_lmia_wp_low_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}

	else if($category=='42' && $type=='69'){

		$url = 'Lmia_pr_lg/edit_lmia_pr_low_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}
		else if($category=='42' && $type=='70'){

		$url = 'Lmia_pr_hg/edit_lmia_pr_high_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}

	else if($category=='43' && $type=='71'){

		$url = 'Lmia_dual_int_hg/edit_lmia_dual_int_high_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}

	else if($category=='43' && $type=='72'){

		$url = 'Lmia_dual_int_lg/edit_lmia_dual_int_low_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}
	else if($category=='22' && $type=='78'){

		$url = 'Tourist_visa_canada/edit_toutist_visa_canada/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}

	else if($category=='21' && $type=='93'){

		$url = 'Visitor_visa_canada/edit_visitor_visa_canada/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}


else if($category=='21' && $type=='94'){

		$url = 'Visitor_visa_usa/edit_visitor_visa_usa/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}


	else if($category=='13' && $type=='17'){

		$url = 'Bc_pnp_int_pg/edit_bc_pnp_int_pg/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}




	else if($category=='7'){
		return view('admin/client_application/edit_study_permit_extension');

	}
	else if($category=='8'){
		return view('admin/client_application/edit_study_permit_application');

	}
	else if($category=='9'){
		return view('admin/client_application/edit_pgwp_application');

	}
	else if($category=='10'){
		return view('admin/client_application/edit_PGWP_extension');

	}
	else if($category=='11'){
		return view('admin/client_application/edit_FSW');

	}
	else if($category=='12'){
		return view('admin/client_application/edit_FSTW');

	}
	else if($category=='13'){
		return view('admin/client_application/edit_BC_PNP_INTL_PG');

	}
	else if($category=='14'){
		return view('admin/client_application/edit_BC_PNP_SW_In_Can');

	}
	else if($category=='15'){
		return view('admin/client_application/edit_BC_PNP_SW_Overseas');

	}
	else if($category=='16'){
		return view('admin/client_application/edit_BC_PNP_Semi_Skilled');

	}
	else if($category=='17'){
		return view('admin/client_application/edit_BC_PNP_Heathcare_Prof');

	}
	else if($category=='18'){
		return view('admin/client_application/edit_RNIP');

	}
	else if($category=='19'){
		return view('admin/client_application/edit_Super_Visa');

	}
	else if($category=='20'){
		return view('admin/client_application/edit_Family_Sponsorship');

	}
	else if($category=='21'){
		return view('admin/client_application/edit_Visitor_Visa');

	}
	else if($category=='22'){
		return view('admin/client_application/edit_Tourist_Visa');

	}
	else if($category=='23'){
		return view('admin/client_application/edit_Visitor_Extension');

	}
	else if($category=='24'){
		return view('admin/client_application/edit_Restoration_Of_Status');

	}else{
return view('admin/client_application/edit_Restoration_Of_Status');

		
	}

		
	}
}



///------------

 public function edit_bc_pnp_int_grd($category,$id,$sid){

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

 	

	$From="Sia Immigration";
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Profile in Process id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Profile in Process <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Expected Date To Apply : ' .$exp_date_to_apply.'<br>';
					$message .= 'Assign Team Member : ' .$fname.'<br>';	
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Profile in Process id-".$iggd." Name-".$name."";


//$phone = array('919653364499','17782575709');

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

$this->profile_in_process($name,$fname,$tmobile,$cmobile,$email);

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
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";
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

	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Profile Created id-".$iggd." -Name-".$name." - Date of Creation-".$date_of_creation." ";


//$phone = array('919653364499','17782575709');
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
$this->profile_created($name,$fname,$tmobile,$cmobile,$email);

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
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Invitation received id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Invitation received<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Tentative Submission Date : ' .$invitation_date_tantative.'<br>';
					$message .= 'Final Submission Date : ' .$invitation_date_final.'<br>';	
					

	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Invitation received-".$iggd." -Name-".$name." - Final Submission Date-".$invitation_date_final." ";


//$phone = array('919653364499','17782575709');
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
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Invitation withdrawn<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Reason : ' .$invit_withdrawn_reason.'<br>';
					
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Invitation withdrawn-".$iggd." -Name-".$name." - Reason-".$invit_withdrawn_reason." ";


//$phone = array('919653364499','17782575709');
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
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Application submitted<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
				$message .= 'Date Of Application Submitted : ' .$app_sub_date.'<br>';
				$message .= 'Application Fee Payment Mode : ' .$fee.'<br>';
				$message .= 'Mode Of Payment By Client : ' .$mode_client_payment.'<br>';
				$message .= 'Date of Payment Received : ' .$date_of_payment_recive.'<br>';
				$message .= 'Confirm With: ' .$confirm_with.'<br>';
				$message .= 'Amount : ' .$amount.'<br>';

					
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Application submitted-".$iggd." -Name-".$name." - Date Of Application Submitted-".$app_sub_date." ";


//$phone = array('919653364499','17782575709');

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
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Application submitted<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
				$message .= 'Adr Deadline : ' .$adr_deadline.'<br>';
				$message .= 'Adr Notes : ' .$adr_note.'<br>';
				
					
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Adr BCPNP -".$iggd." -Name-".$name." - Adr Deadline-".$adr_deadline." ";


//$phone = array('919653364499','17782575709');

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
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";

 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Nomination Approved<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
			
				
					
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Nomination Approved -".$iggd." -Name-".$name."  ";


//$phone = array('919653364499','17782575709');
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
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Nomination refused<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Reason : ' .$nomination_refused_reason.'<br>';
			
				
					
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Nomination refused -".$iggd." -Name-".$name." Reason -".$nomination_refused_reason." ";


//$phone = array('919653364499','17782575709');
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
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";

 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Federal Application Sent<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Application Sent Date : ' .$app_sent_date.'<br>';
			
				
					
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Federal Application Sent -".$iggd." -Name-".$name." Application Sent Date -".$app_sent_date." ";


//$phone = array('919653364499','17782575709');

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
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'AOR IRCC<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Application Number : ' .$aor_app_number.'<br>';
					$message .= 'Application Date : ' .$aor_app_date.'<br>';
					$message .= 'Have You Link This Application Online : ' .$link.'<br>';
					$message .= 'Online Detail : ' .$aor_online_detail.'<br>';
					$message .= 'Reason: ' .$aor_linkreason.'<br>';
				
					
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team AOR IRCC -".$iggd." -Name-".$name." Application Number  -".$aor_app_number."Application Date=".$aor_app_date." ";


//$phone = array('919653364499','17782575709');

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
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";

 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'ADR IRCC <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Submission Date : ' .$adr_submission_date.'<br>';
				
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team ADR IRCC -".$iggd." -Name-".$name." Submission Date  -".$adr_submission_date." ";


//$phone = array('919653364499','17782575709');
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
				
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Medical requested -".$iggd." -Name-".$name." Date For Medical  -".$date_for_medical." Date For Medical Tentative".$date_for_medical_ten." ";


//$phone = array('919653364499','17782575709');
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
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";

 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Medical submited <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date Of Medical Submit : ' .$medical_submit.'<br>';
					$message .= 'Notes : ' .$medical_sub_note.'<br>';
					
				
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Medical submited -".$iggd." -Name-".$name." Date Of Medical Submit   -".$medical_submit."- Notes".$medical_sub_note." ";


//$phone = array('919653364499','17782575709');
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
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Passport requested <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'PP Submition Deadline : ' .$pp_deadline.'<br>';
					$message .= 'PP submition Tentative : ' .$pp_tentative.'<br>';
					
					
				
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Passport requested -".$iggd." -Name-".$name." PP Submition Deadline  -".$pp_deadline." PP submition Tentative ".$pp_tentative."";


//$phone = array('919653364499','17782575709');
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
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Approved <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Note : ' .$approve_note.'<br>';
					
					
				
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Approved -".$iggd." -Name-".$name." note  -".$approve_note." ";


//$phone = array('919653364499','17782575709');
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
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Refused <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Note : ' .$refused_note.'<br>';
					
					
				
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Refused -".$iggd." -Name-".$name." note  -".$refused_note." ";


//$phone = array('919653364499','17782575709');

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


		return view('admin/client_application/edit_bc_pnp_int_grd',$data);
}
}
///-------------------

public function status_not_change_emp_msg($id){

$From="Sia Immigration";
					 $emaill="mkj@siaimmigration.com";
					//$subject  = "Ready to Apply ,id-".$id.",Name-".$name."";
					$subject  = "Status not change";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi team, <br>';
					$message .= 'Status not change<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					//$message .= 'Name : ' .$name.'<br>';
					//$message .= 'Mobile Number : ' .$mobile_no.'<br>';
					//$message .= 'Email : ' .$Email.'<br>';
					//$message .= 'Category : ' .$cat.'<br>';
					//$message .= 'Type : ' .$type.'<br>';
				//	$message .= 'Date : ' .date('d/m/Y').'<br>';


					//$message .= '<h3 style="color:red;">Siaportal id no :-</h3><p style="color:#000080">'.$id.' Move into client</p><br>';
					
					
		
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



//$message1="Your user name is ".$email." and password is ".$pass." .please click on https://canada.siaimmigration.com  to login";

$message1="status not change";


//$phone = array('919653364499','17782575709','7658844497');
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


}

////--------------------

	public function gettype($id) {  
 

 
     // $categoryid=$this->uri->segment(3);
   
  //$getsubcat = $this->Backoffice_model->getstate('state', $categoryid);

	//	$Type_client = new Type_client_model(); 
	//$getsubcat = $Type_client->getpost();


$Type_client = new Type_client_model(); 
	$getsubcat = $Type_client->where('category_id', $id)
                   ->findAll();
//print_r($getsubcat);
//exit();

  $subcat="";
  
  $subcat=':<select name="type" id="subcat" class="form-control"  onChange="status()" >';
  $subcat.='<option value="">Select Type </option>';
  foreach($getsubcat as $sub1 ){  
  $subcat.='<option value="'.$sub1['id'].'">'.$sub1['type'].'</option>';
  }  
  $subcat.='</select>';
   echo $subcat;
  // echo 1;

 }

 

	public function gettypee($id) {  
 

 
     // $categoryid=$this->uri->segment(3);
   
  //$getsubcat = $this->Backoffice_model->getstate('state', $categoryid);

	//	$Type_client = new Type_client_model(); 
	//$getsubcat = $Type_client->getpost();


$Type_client = new Type_client_model(); 
	$getsubcat = $Type_client->where('category_id', $id)
                   ->findAll();
//print_r($getsubcat);
//exit();

  $subcat="";
  
  $subcat=':<select name="type_id" id="subcat" class="form-control"   >';
  $subcat.='<option value="">Select Type </option>';
  foreach($getsubcat as $sub1 ){  
  $subcat.='<option value="'.$sub1['id'].'">'.$sub1['type'].'</option>';
  }  
  $subcat.='</select>';
   echo $subcat;
  // echo 1;

 }






 public function gettype_status($id) {  
 

 
    

$Type_client = new Status_model(); 
	$getsubcat = $Type_client->where('type_id', $id)
                   ->findAll();
                   //echo $this->db->last_query(); die;
//print_r($getsubcat);
//exit();

  $subcat="";
  
  $subcat=':<select name="file_status" id="file_status" class="form-control"  >';
  $subcat.='<option value="">Select Status</option>';
 // foreach($getsubcat as $sub1 ){  
 // $subcat.='<option value="'.$sub1['id'].'">'.$sub1['app_status'].'</option>';
  //}  
  $subcat.='<option value="35">Ready to Apply</option>';
  $subcat.='</select>';
   echo $subcat;
  // echo 1;

 }


///-----------------------

public function add_adv()
	{

		if ($this->request->getMethod()=='post'){
$Adv = new Adv_model();

$insert=$Adv->insert([

	'add_head'=>$this->request->getPost('add_head'),
	'add_type'=>$this->request->getPost('add_type'),	
	'status'=>'1',
	'insert_on'=>date( 'Y-m-d H:i:s' )
	
]);
if($insert){

	$add_head = $this->request->getPost('add_head');
	$add_type = $this->request->getPost('add_type');
	

$From="Sia Immigration";
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Advertisement Added :-Date-".date('d/m/Y')."";
					//$subject  = "";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					$message ='Advertisement Added<br>';
					$message .=' Agent Deatail. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Advertisement Heading : ' .$add_head.'<br>';
					$message .= 'Advertisement Type: ' .$add_type.'<br>';
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



$message1="Advertisement Added- ".$add_head."";

//$message1="New Employer Addeds";


//$phone = array('919653364499','17782575709');
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



	$url = 'Siaportal/add_adv';
					echo'
					<script>
					alert("Record Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{
	$url = 'Siaportal/add_adv';
					echo'
					<script>
					alert("Record not added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}
}

		return view('admin/adv/add_adv');
	}

	public function view_adv()
	{

$Adv = new Adv_model(); 
	$data['adv'] = $Adv->getpost();

		return view('admin/adv/view_adv',$data);
	}


	public function edit_adv($id)
	{

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

$url = 'Siaportal/view_adv';
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

		return view('admin/adv/edit_adv',$data);

}


}else{
	//$Prospect = new Team_model(); 
	$Agent = new Agent_model(); 
	$data['agent'] = $Agent->where('id', $id)
                   ->findAll();

		return view('admin/adv/edit_adv',$data);
	}
}





	//--------------------------------------------------------------------
/////////////--------
	public function term_and_condition()
	{
	    
 

		return view('client/term_and_condition');
	}

	public function privacy_policy()
	{
	    
 

		return view('client/privacy_policy');
	}


	public function refund_policy()
	{
	   

		return view('client/refund_policy');
	}

/////----- category application start 



	///------------

 public function edit_intl_stu_spousal_open_wp_inland($category,$id,$sid){
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
	



	

	

	'update_on'=>date( 'Y-m-d H:i:s' )
];

$cam = new Client_application_model(); 
$updatee=$cam->update($id, $data);


if($updatee){
$stt=$this->request->getPost('application_status');

if($stt=='36') {


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
    
 	

	$from = "Sia Immigration";
					$subject  = "Application in Process id-".$iggd." Name-".$name."";
					$message =' Hi Team <br>';
					$message .= 'Application in Process <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Expected Date To Apply : ' .$exp_date_to_apply.'<br>';
					$message .= 'Assign Team Member : ' .$fname.'<br>';
					$message .= 'Accepted Date Of Submission : ' .$app_recv.'<br>';
					$message .= 'Study Permit Expiry Date : ' .$study_permit_exp.'<br>';
					$message .= 'College Transfer Required : ' .$c_transfer.'<br>';

					$to = array('ds@siaimmigration.com', 'no-reply@siaimmigration.com', 'office@siaimmigration.com', 'kam@siaimmigration.com', 'mkj@siaimmigration.com', 'Reach@siaimmigration.com', 'support@siaimmigration.com');
					$cc = json_decode(EMP_EMAIL, true);

					$email1 = \Config\Services::email();
					$config = get_smtp_settings();
					$email1->initialize($config);

					$email1->setFrom('no-reply@siaimmigration.com', $from);
					$email1->setTo($to);
					$email1->setCC($cc);
					$email1->setReplyTo('no-reply@siaimmigration.com');
					$email1->setSubject($subject);
					$email1->setMessage($message);

					// Send email
					$email1->send();


$message1="Application in Process  id-".$iggd." Name-".$name."  Assign Team Member-".$fname."";


//$phone = array('919653364499','17782575709');
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
$this->profile_in_process($name,$fname,$tmobile,$cmobile,$email);

 }

if($stt=='313') {


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
					$message .= 'Document Awaiting for Submission<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Document Requested Date : ' .$doc_req_date.'<br>';
					$message .= 'Fee Received Or Pending : ' .$feerp.'<br>';	
					$message .= 'Note : ' .$doc_await_note.'<br>';	
					

	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Document Awaiting for Submission id-".$iggd." -Name-".$name." - Document Requested Date-".$doc_req_date."Fee Received Or Pending-".$feerp."  ";


//$phone = array('919653364499','17782575709');
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
$this->profile_created($name,$fname,$tmobile,$cmobile,$email);

 }

  if($stt=='37') {


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
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";

 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Application submitted<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
				$message .= 'Date Of Application Submitted : ' .$app_sub_date.'<br>';
				$message .= 'Application Fee Payment Mode : ' .$fee.'<br>';
				$message .= 'Mode Of Payment By Client : ' .$mode_client_payment.'<br>';
				$message .= 'Date of Payment Received : ' .$date_of_payment_recive.'<br>';
				$message .= 'Confirm With: ' .$confirm_with.'<br>';
				$message .= 'Amount : ' .$amount.'<br>';

					
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Application submitted-".$iggd." -Name-".$name." - Date Of Application Submitted-".$app_sub_date." ";


//$phone = array('919653364499','17782575709');
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
$this->application_submitted($name,$fname,$tmobile,$cmobile,$email);

 }

 if($stt=='38') {


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
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Biometric Requested id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Biometric Requested<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
				$message .= 'Date Of Biometric received : ' .$date_bio_reciv.'<br>';
				$message .= 'Date of Biometric sent to client : ' .$date_bio_sent.'<br>';
				
					
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Biometric Requested -".$iggd." -Name-".$name." - Date Of Biometric received-".$date_bio_reciv."Date of Biometric sent to client ".$date_bio_sent."  ";


//$phone = array('919653364499','17782575709');
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
$this->biometric_requested($name,$fname,$tmobile,$cmobile,$email);

 }

 if($stt=='39') {


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
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Biometric Completed id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";

 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Biometric Completed<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date Of Biometric completed : ' .$date_bio_comp.'<br>';
					$message .= 'Note : ' .$bio_com_note.'<br>';
			
				
					
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Biometric Completed -".$iggd." -Name-".$name."  Date Of Biometric completed-".$date_bio_comp." ";


//$phone = array('919653364499','17782575709');
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
$this->biometric_completed($name,$fname,$tmobile,$cmobile,$email);

 }
  if($stt=='40') {


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
					 $emaill="mkj@siaimmigration.com";
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

				
					
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Interview/ADR Requested -".$iggd." -Name-".$name." Date Of Request Received -".$date_int_req_rec." ";


//$phone = array('919653364499','17782575709');
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
$this->interview_ADR_requested($name,$fname,$tmobile,$cmobile,$email);

 }


  if($stt=='41') {


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
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Interview/ADR Completed id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Interview/ADR Completed<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Request Completed Date : ' .$date_int_req_com.'<br>';
			
				
					
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Interview/ADR Completed -".$iggd." -Name-".$name." Request Completed Date -".$date_int_req_com." ";


//$phone = array('919653364499','17782575709');
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
$this->interview_ADR_completed($name,$fname,$tmobile,$cmobile,$email);

 }


 
 
if($stt=='42') {


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
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Medical requested id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Medical requested <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date For Medical : ' .$date_for_medical.'<br>';
					$message .= 'Date For Medical Tentative : ' .$date_for_medical_ten.'<br>';
					$message .= 'Notes : ' .$medical_note.'<br>';
				
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Medical requested -".$iggd." -Name-".$name." Date For Medical  -".$date_for_medical." Date For Medical Tentative".$date_for_medical_ten." ";


//$phone = array('919653364499','17782575709');
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
$this->medical_requested($name,$fname,$tmobile,$cmobile,$email);

 }


 if($stt=='44') {


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
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Approved id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					 $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Approved <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date Of Work Permit Received Untill : ' .$date_work_permit.'<br>';
				//	$message .= 'Note : ' .$approve_note.'<br>';
					
					
				
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Approved -".$iggd." -Name-".$name." Date Of Work Permit Received Untill  -".$date_work_permit." ";


//$phone = array('919653364499','17782575709');
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
$this->approved($name,$fname,$tmobile,$cmobile,$email);

 }
if($stt=='43') {


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
					$message .= 'Date Of Refusal : ' .$refusal_date.'<br>';
					
					
				
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Refused -".$iggd." -Name-".$name." Date Of Refusal  -".$refusal_date." ";


//$phone = array('919653364499','17782575709');
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


		return view('admin/client_application/edit_intl_stu_spousal_open_wp_inland',$data);
}
}
///-------------------


///------------

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
     'doc_rec'=>$this->request->getPost('doc_rec'),
     'team_college_transfer'=>$this->request->getPost('team_college_transfer'),
       'date_doc_to_team'=>$this->request->getPost('date_doc_to_team'),


    'application_status_update'=>date('Y-m-d' ),


    'doc_req_date'=>$this->request->getPost('doc_req_date'),
    'feerp'=>$this->request->getPost('feerp'),
    'fee_amount'=>$this->request->getPost('fee_amount'),
    'fee_inv_no'=>$this->request->getPost('fee_inv_no'),
   

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
    
 	

	$from = "Sia Immigration";
					$subject  = "Application in Process id-".$iggd." Name-".$name."";
					$message =' Hi Team <br>';
					$message .= 'Application in Process <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Expected Date To Apply : ' .$exp_date_to_apply.'<br>';
					$message .= 'Assign Team Member : ' .$fname.'<br>';
					$message .= 'Accepted Date Of Submission : ' .$app_recv.'<br>';
					$message .= 'Study Permit Expiry Date : ' .$study_permit_exp.'<br>';
					$message .= 'College Transfer Required : ' .$c_transfer.'<br>';

					$to = array('ds@siaimmigration.com', 'no-reply@siaimmigration.com', 'office@siaimmigration.com', 'kam@siaimmigration.com', 'mkj@siaimmigration.com', 'Reach@siaimmigration.com', 'support@siaimmigration.com');
					$cc = json_decode(EMP_EMAIL, true);

					$email1 = \Config\Services::email();
					$config = get_smtp_settings();
					$email1->initialize($config);

					$email1->setFrom('no-reply@siaimmigration.com', $from);
					$email1->setTo($to);
					$email1->setCC($cc);
					$email1->setReplyTo('no-reply@siaimmigration.com');
					$email1->setSubject($subject);
					$email1->setMessage($message);

					// Send email
					$email1->send();


$message1="Application in Process  id-".$iggd." Name-".$name."  Assign Team Member-".$fname."";


//$phone = array('919653364499','17782575709');
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
$this->profile_in_process($name,$fname,$tmobile,$cmobile,$email);

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
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Document Awaiting for Submission id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Document Awaiting for Submission<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Document Requested Date : ' .$doc_req_date.'<br>';
					$message .= 'Fee Received Or Pending : ' .$feerp.'<br>';	
					$message .= 'Note : ' .$doc_await_note.'<br>';	
					

	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Document Awaiting for Submission id-".$iggd." -Name-".$name." - Document Requested Date-".$doc_req_date."Fee Received Or Pending-".$feerp."  ";


//$phone = array('919653364499','17782575709');
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
$this->profile_created($name,$fname,$tmobile,$cmobile,$email);

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

					
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Application submitted-".$iggd." -Name-".$name." - Date Of Application Submitted-".$app_sub_date." ";


//$phone = array('919653364499','17782575709');
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
$this->application_submitted($name,$fname,$tmobile,$cmobile,$email);

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
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Biometric Requested id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Biometric Requested<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
				$message .= 'Date Of Biometric received : ' .$date_bio_reciv.'<br>';
				$message .= 'Date of Biometric sent to client : ' .$date_bio_sent.'<br>';
				
					
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Biometric Requested -".$iggd." -Name-".$name." - Date Of Biometric received-".$date_bio_reciv."Date of Biometric sent to client ".$date_bio_sent."  ";


//$phone = array('919653364499','17782575709');
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
$this->biometric_requested($name,$fname,$tmobile,$cmobile,$email);

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
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Biometric Completed id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Biometric Completed<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date Of Biometric completed : ' .$date_bio_comp.'<br>';
					$message .= 'Note : ' .$bio_com_note.'<br>';
			
				
					
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Biometric Completed -".$iggd." -Name-".$name."  Date Of Biometric completed-".$date_bio_comp." ";


//$phone = array('919653364499','17782575709');
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
$this->biometric_completed($name,$fname,$tmobile,$cmobile,$email);

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
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Interview/ADR Requested id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Interview/ADR Requested<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date Of Request Received : ' .$date_int_req_rec.'<br>';
					$message .= 'Date Of Request Sent To Client : ' .$date_int_sent_client.'<br>';

				
					
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Interview/ADR Requested -".$iggd." -Name-".$name." Date Of Request Received -".$date_int_req_rec." ";


//$phone = array('919653364499','17782575709');
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
$this->interview_ADR_requested($name,$fname,$tmobile,$cmobile,$email);

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
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Interview/ADR Completed id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Hi Team <br>';
					$message .= 'Interview/ADR Completed<br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Request Completed Date : ' .$date_int_req_com.'<br>';
			
				
					
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Interview/ADR Completed -".$iggd." -Name-".$name." Request Completed Date -".$date_int_req_com." ";


//$phone = array('919653364499','17782575709');
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
$this->interview_ADR_completed($name,$fname,$tmobile,$cmobile,$email);

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
				
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Medical requested -".$iggd." -Name-".$name." Date For Medical  -".$date_for_medical." Date For Medical Tentative".$date_for_medical_ten." ";


//$phone = array('919653364499','17782575709');
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
$this->medical_requested($name,$fname,$tmobile,$cmobile,$email);

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
					$message .= 'Date Of Work Permit Received Untill : ' .$date_work_permit.'<br>';
				//	$message .= 'Note : ' .$approve_note.'<br>';
					
					
				
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Approved -".$iggd." -Name-".$name." Date Of Work Permit Received Untill  -".$date_work_permit." ";


//$phone = array('919653364499','17782575709');
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
$this->approved($name,$fname,$tmobile,$cmobile,$email);

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
					$message .= 'Date Of Refusal : ' .$refusal_date.'<br>';
					
					
				
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);


$message1="Hi Team Refused -".$iggd." -Name-".$name." Date Of Refusal  -".$refusal_date." ";


//$phone = array('919653364499','17782575709');
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


		return view('admin/client_application/edit_intl_stu_spousal_open_wp_outland',$data);
}
}
///-------------------


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
					 $emaill="mkj@siaimmigration.com";
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
				//	$message .= 'Date : ' .date('d/m/Y').'<br>';


					//$message .= '<h3 style="color:red;">Siaportal id no :-</h3><p style="color:#000080">'.$id.' Move into client</p><br>';
					
					
		
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);



//$message1="Your user name is ".$email." and password is ".$pass." .please click on https://canada.siaimmigration.com  to login";

$message1="Profile in Process";


//$phone = array('919653364499','17782575709','7658844497');
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

 $cpm = new Client_application_model(); 
	//$data['team'] = $Team->getpost();
	$data['cpmm'] = $cpm->where('id',$id)
                   ->findAll();


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
					 $emaill="mkj@siaimmigration.com";
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
					
					
		
	
	@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);

$message1="Your BC PNP profile Successfuly created";


//$phone = array('919653364499','17782575709');
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


		return view('admin/client_application/edit_worker_spousal_open_wp_inland',$data);
}
}

	///////////////----------- category application endd 







	public function refer()
	{
	    
 		if ($this->request->getMethod()=='post'){
$Refer = new Refer_model();

$sid =session()->get('siaprotal_id');
$fn =session()->get('firstname');
$insert=$Refer->insert([

	'heading'=>$this->request->getPost('name'),
	'number'=>$this->request->getPost('mobile_no'),
	'email'=>$this->request->getPost('email'),
	'detail'=>$this->request->getPost('detail'),
	'siaprotal_id'=>$sid,
	'typee'=>'Immigration',

	
	'status'=>'0',
	'insert_on'=>date( 'Y-m-d H:i:s' )
	//'email'=>$this->request->getPost('email'),
]);
if($insert){
	$heading = $this->request->getPost('name');
	$number = $this->request->getPost('mobile_no');
	$email = $this->request->getPost('email');
	$detail = $this->request->getPost('detail');

$From="Sia Immigration";
					$emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Thank You for Business Referral";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					//$message =' Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true.<br>';
					$message ='<body style="background-color:#f1f1f1;">
  <div style="background-color:#f1f1f1; color:#006495; width: 100%; min-width: 100%; padding:0px; margin:0px;">
  <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f1f1; width:100%; padding:15px;">
  <tr>
  <td>
    <table border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;padding:15px;max-width:600px; margin:0px auto; background-color:#fff; color:#006495;">
      <tbody>
        <tr>
          <td align="center" valign="top">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;"><img src="https://www.siaimmigration.com/mailer-images/01/left-top.png" width="190" height="80" alt="left-top.png">
                                  </td>
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="80" height="80" alt="right-top.png">
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <div style="border-top:1px dashed #999;margin:5px 0px;display:block;"></div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top" style="padding-top:9px;">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;">
                      <tbody>
                        <tr>
                          <td valign="top">                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">                              </td>
                            </tr>
                            <tr>
                              <td>Dear '.$fn.',</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>We look forward to helping this new client to achieve their dreams.  
</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Please note we will evaluate and if Client Enrol with us we will add token of our gratitude (Referring fee) to your account, All the given references will show in your user Account Dashboard
</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Name :-'.$heading.'</td>
                            </tr>
                            <tr>
                              <td>Email :-'.$email.'</td>
                            </tr>
                            <tr>
                              <td>Number :-'.$number.'</td>
                            </tr>
                            <tr>
                              <td>Detail :-'.$detail.'</td>
                            </tr>
                            <tr>
                              <td>Best Regards,</td>
                            </tr>
                            <tr>
                              <td>Sia immigration Solutions Team</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            
                            <tr>
                              <td>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" style="border-top:2px solid #ccc;"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    <table width="331" border="0">
                                      <tr>
                                        <th width="188" scope="row">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/01/accredited-business.png" width="120" height="61" alt="accredited-business.png"></a>                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" align="center">
                                    
                                                                          </td>
                                    </tr>
                                  </tbody>
                                </table>
                  </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"></td>
                    </tr>
                  </tbody>
                </table>
				  </td>
  </tr>
  </table>
                </div>
              </body>
';
					
@mail($email.',no-reply@siaimmigration.com',$subject,$message,$headers);


$From="Sia Immigration";
					 $emaill="mkj@siaimmigration.com";
					$subject  = "Business Referral  Added by:--".$fn."";
					//$subject  = "";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					$message ='Business Referral<br>';
					$message .=' Deatail. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Name: ' .$heading.'<br>';
					$message .= 'Email: ' .$email.'<br>';
					$message .= 'Number: ' .$number.'<br>';
					$message .= 'Detail: ' .$detail.'<br>';


					
					
@mail('ds@siaimmigration.com,no-reply@siaimmigration.com,consult@siaimmigration.com',$subject,$message,$headers);
//$message1="Thank You for Business Referral - ".$heading."-".$number."-".$email."";
$message1="Thank You for Business Referral ";

//$message1="New Employer Addeds";


//$phone = array('919653364499','17782575709');
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



	$url = 'Siaportal/client_dashboard3';
					echo'
					<script>
					alert("Record Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{
	$url = 'Siaportal/client_dashboard3';
					echo'
					<script>
					alert("Record not added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}
}

		return view('client/refer');
	}




 
}
