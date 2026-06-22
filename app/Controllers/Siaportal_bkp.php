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
use App\Models\Invoice_model;
use App\Models\Status_model;
use App\Models\Voice_msg_model;
use App\Models\New_form_model;
use App\Models\Adv_model;
use App\Models\Adr_model;
use App\Models\Refer_model;
use App\Models\Client_document_model;
use App\Models\Immigration_enquiry_model;

use App\Models\Work_and_eduction_model;

use App\Models\Client_application_model;
use codeigniter\controller;
use CodeIgniter\I18n\Time;
use CodeIgniter\HTTP\Files\UploadedFile;



class Siaportal extends BaseController
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
	
	
	

function forget_pass(){



	if ($this->request->getMethod() == 'post') {

$email=$this->request->getPost('email');

$model = new User_model();

                $aa = $this->request->getVar('email');
               //exit();
				  $user['aa'] = $model->where('email',$aa)->findAll();
				  //echo '<pre>';
				  //print_r($user['aa']);
				  //echo '</pre>';
				  //exit();

				 $email=$user['aa']['0']['email'];
				   $pass=$user['aa']['0']['pass'];
				   $name=$user['aa']['0']['firstname'];



					$From="Sia Immigration";
					//$ee = session()->get('email');
					 $emaill="mkj@siaimmigration.com";
					 $emailll='no-reply@siaimmigration.com';

					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Forgot password";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";

 					$headers .= 'From:  ' . $From . ' <' . $emailll .'>' . " \r\n" .
            'Reply-To: '.  $emailll . "\r\n" .
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
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="200" height="100" alt="right-top.png">
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
                            <tr>Please keep this information secured, and ensure to logout from this portal after each visit.

</td>
                            </tr>
                           
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                             <tr>
                              <td>Your Password '.$pass.'</td>
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
                                        <th width="100" scope="row">
                                                                                  </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                           <th width="88" scope="row">
                                                                                  </th>
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

	$url = 'Siaportal/index';
					echo'
					<script>
					alert("Password sent on your register email Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	



	}else{
		
		

	return view('forget');

}
}


public function st_chang($id,$st){

	

//$aa=str_replace($st,'%','');

	$data = [
    
	'ppstatus'=>$st
	
];

	$client = new Prospect_model(); 
$updatee=$client->update($id, $data);
}

public function st_changem($id,$st){



	$data = [
    
	'pstatus'=>$st
	
];

	$client = new Prospect_model(); 
$updatee=$client->update($id, $data);

if($updatee){

if($st=='Done_Delete'){

$pdetail = new Prospect_model(); 
	$data['pd'] = $pdetail->where('id',$id)
                   ->findAll();
				$sid=   $data['pd']['0']['id'];
                 $nn=   $data['pd']['0']['heading'];
                 $b=  $data['pd']['0']['agent_name'];
                $c=   $data['pd']['0']['typee'];
                $d=   $data['pd']['0']['team_member'];
                $e=   $data['pd']['0']['number'];



$From="Sia Immigration";
					 $ee = session()->get('client_email');
					//exit();
$emaill=$ee;

					//$subject  = "".ucfirst($cs).",id-".$dell.",Name-".$name."";
			$subject  = "Prospect Deleted :-Reason Application Started:-".$sid." Name :-".$nn."";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";

 						$headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

					$message =' Prospect Deleted. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Name : ' .$nn.'<br>';
					$message .= 'Sia portal id : ' .$b.'<br>';
					$message .= 'Source : ' .$c.'<br>';
					$message .= 'Type : ' .$d.'<br>';
					$message .= 'Team member name  : ' .$e.'<br>';
					$message .= 'number : ' .$e.'<br>';
					

					
@mail('ds@siaimmigration.com,admin@siaimmigration.com, info@siaimmigration.com,mj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);

}


}


}

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
              // exit();
				  $user = $model->where('email',$aa)->findAll();
				
//echo $aaaa= $user['0']['type'];
//exit();

				//print_r($user);
			//exit();

				$this->setTypeSession($user);
				//$session->setFlashdata('success', 'Successful Registration');
			 $tt =session()->get('type');
			// exit();
			
					 if ($tt=='Admin' || $tt=='Employee') {

					 	$this->setUserSession($user);

				return redirect()->to('dashboard');
		
}

else if($tt=='client'){

	$this->setClientSession($user);

	return redirect()->to('client_dashboard3');
}

else if($tt=='Account'){
$this->setAccountSession($user);




	



	return redirect()->to('https://canada.siaimmigration.com/Account/index');



}

else {

	$this->setloginSession();

	return redirect()->to('index');
}



			//return view('dashboard');

			}
			$this->setloginSession();


			return redirect()->to('index');
		}
//echo view('templates/header',$data);
		//echo view('login');
	//	echo view('templates/footer');

}

private function setTypeSession($user){
		//print_r($user);
		//exit();

		//echo $aa=$user['0']['id'];
		//exit();
		$data = [
			//'id' => $user['0']['id'],
			//'firstname' => $user['0']['firstname'],
			//'lastname' => $user['0']['lastname'],
			//'email' => $user['0']['email'],
			'type' => $user['0']['type'],
			//'siaprotal_id' => $user['0']['siaprotal_id'],
			//'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
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


	private function setAccountSession($user){
		
		$data = [
			'id' => $user['0']['id'],
			'firstname' => $user['0']['firstname'],
			'lastname' => $user['0']['lastname'],
			'email' => $user['0']['email'],
			'type' => $user['0']['type'],
			'siaprotal_id' => $user['0']['siaprotal_id'],
			'isAccountIn' => true,
		];

		session()->set($data);
		return true;
	}


	


	private function setClientSession($user){
		//print_r($user);
		//exit();
//echo $aa=$user['0']['id'] ;
		//echo $aa=$user['0']['ref_hide'];
		//exit();
		$data = [
			'id' => $user['0']['id'],
			'firstname' => $user['0']['firstname'],
			'lastname' => $user['0']['lastname'],
			'email' => $user['0']['email'],
			'client_email' => $user['0']['email'],
			'type' => $user['0']['type'],
			'ref_hide' => $user['0']['ref_hide'],
			'siaprotal_id' => $user['0']['siaprotal_id'],
			'isClientLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}


private function setloginSession(){

	
		
		$data = [
			'login' => "user name or password is incorrect",
			'isIn' => true,
			
		];

		session()->set($data);
		return true;
	}


	


	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}



	

public function dashboard()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}
		
					 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}


$Prospect = new Prospect_model(); 
	$data['prospect'] = $Prospect->getentery();

 $aa=date("m/d");
//exit();

	$data['dob'] = $Prospect->dob($aa);

	$CDM = new Client_document_model(); 

 $datefilter=date("Y-m-d");

	$data['doc_upload'] = $CDM->document_upload($datefilter);

	//echo $Prospect->getCompiledSelect();
	//exit();

 
$Approve = new Client_application_model();  


$data['approve_count'] = $Approve->approve_count();
$data['ready_to_apply'] = $Approve->ready_to_apply();
$data['refused'] = $Approve->refused();
$data['refused'] = $Approve->refused();

   
                  






$New_form = new New_form_model(); 
	$data['new_form'] = $New_form->getpost();
		return view('dashboard',$data);
	}


	public function view_appointment_secduled()
	{

		
					 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}
 
	$Prospect = new Prospect_model(); 
	$data['prospect'] = $Prospect->getentery();

   		return view('view_appointment_secduled',$data);
	}

	public function view_work_and_eduction()
	{

		
					 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}
 
	$Waem = new Work_and_eduction_model(); 
	$data['waem'] = $Waem->getwork();

   		return view('admin/wae/view_work_and_eduction',$data);
	}


	public function edit_wae($id)
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

if ($this->request->getMethod()=='post'){


	$data = [
   // 'refer_staus'=>$this->request->getPost('refer_staus')

    'fname'=>$this->request->getPost('fname'),
							'lname'=>$this->request->getPost('lname'),
							'dob'=>$this->request->getPost('dob'),
							'phone_number'=>$this->request->getPost('phone_number'),
							'email'=>$this->request->getPost('email'),
							'height_in_cms'=>$this->request->getPost('height_in_cms'),
							'eyes_color'=>$this->request->getPost('eyes_color'),
							'marriage_date'=>$this->request->getPost('marriage_date'),
							'spouse_name'=>$this->request->getPost('spouse_name'),
							'current_address'=>$this->request->getPost('current_address'),
							'past_ten'=>$this->request->getPost('past_ten'),
							'uci'=>$this->request->getPost('uci'),
							'citizenship'=>$this->request->getPost('citizenship'),
							'have_a_relative'=>$this->request->getPost('have_a_relative'),
							'language_test'=>$this->request->getPost('language_test'),
							'date_of_test_taken'=>$this->request->getPost('date_of_test_taken'),
							'date_of_sign'=>$this->request->getPost('date_of_sign'),
							'speaking'=>$this->request->getPost('speaking'),
							'reading'=>$this->request->getPost('reading'),
							'listening'=>$this->request->getPost('listening'),
							'writing'=>$this->request->getPost('writing'),
							'TRF_no'=>$this->request->getPost('TRF_no'),
							'CELPIP'=>$this->request->getPost('CELPIP'),
							'test_PIN'=>$this->request->getPost('test_PIN'),
							'l_certificate_no'=>$this->request->getPost('l_certificate_no'),
							'employer_details'=>$this->request->getPost('employer_details'),
							'name_of_camp'=>$this->request->getPost('name_of_camp'),
							'job_title'=>$this->request->getPost('job_title'),
							'hours_worked'=>$this->request->getPost('hours_worked'),
							'employer_detail'=>$this->request->getPost('employer_detail'),
							'e_to'=>implode(',',$this->request->getPost('e_to')),
							'e_institution'=>implode(',',$this->request->getPost('e_institution')),
							'e_city'=>implode(',',$this->request->getPost('e_city')),
							'e_diploma'=>implode(',',$this->request->getPost('e_diploma')),
							'e_study'=>implode(',',$this->request->getPost('e_study')),
							'e_year_of_study'=>implode(',',$this->request->getPost('e_year_of_study')),
							't_destination'=>implode(',',$this->request->getPost('t_destination')),
							't_travel_from'=>implode(',',$this->request->getPost('t_travel_from')),
							't_travel_to'=>implode(',',$this->request->getPost('t_travel_to')),
							'reason_for_travel'=>implode(',',$this->request->getPost('reason_for_travel')),
							't_city_of_travel'=>implode(',',$this->request->getPost('t_city_of_travel')),
							'w_from'=>implode(',',$this->request->getPost('w_from')),
							'w_to'=>implode(',',$this->request->getPost('w_to')),
							'w_job_title'=>implode(',',$this->request->getPost('w_job_title')),
							'w_time'=>implode(',',$this->request->getPost('w_time')),
							'w_employer_name'=>implode(',',$this->request->getPost('w_employer_name')),
							'w_omplete_ddress'=>implode(',',$this->request->getPost('w_omplete_ddress')),
							'w_country'=>implode(',',$this->request->getPost('w_country')),
							'h_from'=>implode(',',$this->request->getPost('h_from')),
							'h_to'=>implode(',',$this->request->getPost('h_to')),
							'w_occupation'=>implode(',',$this->request->getPost('w_occupation')),
							'name_of_employer'=>implode(',',$this->request->getPost('name_of_employer')),
							'h_city'=>implode(',',$this->request->getPost('h_city')),
							'h_country'=>implode(',',$this->request->getPost('h_country')),
							'relationship'=>implode(',',$this->request->getPost('relationship')),
							'family_name'=>implode(',',$this->request->getPost('family_name')),
							'f_dob'=>implode(',',$this->request->getPost('f_dob')),
							'f_date_of_death'=>implode(',',$this->request->getPost('f_date_of_death')),
							'f_place_of_birth'=>implode(',',$this->request->getPost('f_place_of_birth')),
							'f_present_address'=>implode(',',$this->request->getPost('f_present_address')),
							'f_marital_status'=>implode(',',$this->request->getPost('f_marital_status')),
							'applied_before'=>$this->request->getPost('applied_before'),
							'provide_details'=>$this->request->getPost('provide_details'),
							'applied_visa'=>$this->request->getPost('applied_visa'),
							'visa_kind'=>$this->request->getPost('visa_kind'),
							

							
							
							'insert_on' => date( 'Y-m-d H:i:s' )
	
];

$ww = new Work_and_eduction_model(); 
$updatee=$ww->update($id, $data);
if($updatee){

$url = 'Siaportal/view_work_and_eduction';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{

$ww = new Work_and_eduction_model(); 
	$data['waem_id'] = $ww->where('id', $id)
                   ->findAll();

		return view('admin/wae/edit_work_and_education',$data);

}


}else{
	//$Prospect = new Team_model(); 




$Waem = new Work_and_eduction_model(); 
	$data['waem_id'] = $Waem->getwork_id($id);
		return view('admin/wae/edit_work_and_education',$data);

	}
}


	public function wae($id)
	{

		
					
 
	$Waem = new Work_and_eduction_model(); 
	$data['waem_id'] = $Waem->getwork_id($id);

   		return view('admin/wae/work_and_education',$data);
	}



public function view_approved()
	{

		
					 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}
 
$Approve = new Client_application_model();  


$data['approve_count'] = $Approve->approve_join();

   		return view('view_approved',$data);
	}


	public function view_refused()
	{

		
					 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}
 
$Approve = new Client_application_model();  



$data['refused'] = $Approve->refused_join();
   		return view('view_refused',$data);
	}


public function view_ready_to_apply()
	{

		
					 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}
 
$Approve = new Client_application_model();  




$data['ready_to_apply'] = $Approve->ready_to_apply_join();

   		return view('view_ready_to_apply',$data);
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


if (session()->get('isClientLoggedIn') !=true) {

				return redirect()->to('index');
		
}

		 $sid =session()->get('siaprotal_id');
	
		$Refer = new Refer_model(); 
	$data['refer'] = $Refer->getpost_id($sid);


	$cpm = new Client_application_model(); 
	

	 $data['ccc'] = $cpm->where('siaportalid', $sid)
	 ->orderBy('id','asc')
      ->limit('1')
	 
                   ->findAll();

                $at=$data['ccc']['0']['assign_to'];

$tm = new Team_model(); 
	

	 $data['asign'] = $tm->where('id', $at)
	 ->orderBy('id','asc')
      ->limit('1')
	 
                   ->findAll();




		return view('client/client_dashboard3',$data);
	}


	public function client_profile()
	{

		if (session()->get('isClientLoggedIn') !=true) {

				return redirect()->to('index');
		
}

	 $sid =session()->get('siaprotal_id');
	//exit();

		$Prospect = new Prospect_model(); 
	$data['prof'] = $Prospect->getpost_id($sid);
                   
		return view('client/client_profile',$data);
	}


	public function document_upload()
	{
		if (session()->get('isClientLoggedIn') !=true) {

				return redirect()->to('index');
		
}



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
					 $ee = session()->get('client_email');
					//exit();
$emaill=$ee;

					//$subject  = "".ucfirst($cs).",id-".$dell.",Name-".$name."";
					$subject  = "Document uploaded by client :-SiaPortal Id:-".$sid." Name :-".$nn."";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";

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
					

					
@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);



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
 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}



		if ($this->request->getMethod()=='post'){
$Prospect = new Prospect_model();

$cc=$this->request->getPost('cc');
$contact=$this->request->getPost('contact');
$ccc=$cc.$contact;

$acc=$this->request->getPost('acc');
$an=$this->request->getPost('alt_mobile_no');
$accc=$acc.$an;

$insert=$Prospect->insert([

    'news_image1'=>$this->request->getPost('news_image1'),
	'heading'=>$this->request->getPost('name'),
	'number'=>$ccc,
	'alt_mobile_no'=>$accc,

	'email'=>$this->request->getPost('email'),
	'client_status'=>$this->request->getPost('client_status'),
	'spouse_name'=>$this->request->getPost('spouse_name'),
	'reff'=>$this->request->getPost('reff'),
	'user_dob'=>$this->request->getPost('dob'),
	//'file_number'=>$this->request->getPost('file_number'),
	'address'=>$this->request->getPost('address'),
	'city'=>$this->request->getPost('city'),
	'source'=>$this->request->getPost('source'),
	//'family'=>$this->request->getPost('family'),
	//'master_sia_id'=>$this->request->getPost('master_sia_id'),
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
					$ee = session()->get('email');
					 $emaill=$ee;
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

					
@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);



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

//$mno=$this->request->getPost('mobile_no');
$mno=$ccc;


/*
$From="siaimmigration";
					$ee = session()->get('email');
					 $emaill=$ee;
					//$subject  = "".ucfirst($cs).",id-".$dell.",Name-".$name."";
					$subject  = "Password";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Login Detail. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= '<h3 style="color:red;">User name </h3><p style="color:#000080">'.$email.'</p><br>';
					$message .= '<h3 style="color:red;">Password </h3><p style="color:#000080">'.$pas.'</p><br>';
					
					$message .= '<a  href="https://canada.siaimmigration.com" target="_blank">Click to login</a><br>';
					
					
					
		
	
	@mail($email,$subject,$message,$headers);


*/

	$From="Sia Immigration";
				$ee = session()->get('email');
           $emaill=$ee;
            $emailll='no-reply@siaimmigration.com';

					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Welcome to our online SiaPortal";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";

 					$headers .= 'From:  ' . $From . ' <' . $emailll .'>' . " \r\n" .
            'Reply-To: '.  $emailll . "\r\n" .
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
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="200" height="100" alt="right-top.png">
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
                            <td>Welcome to our online SiaPortal</td>
                          </tr>
                          <tr>
                            <td valign="top">PRIVATE AND CONFIDENTIAL</td>
                            </tr>
                            <tr>
                              <td>Dear '.$heading.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Welcome to Sia immigration solutions incs SiaPortal.
</td>
                        </tr>
                            <tr>We have created an account on our Client Portal for you. This portal allows you to view your profile, upload your documents, fill out your forms and get the latest updates on your immigration file.</td>
                            </tr>
                           
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>You can access this portal by clicking on the following link:
</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td><a  href="https://canada.siaimmigration.com" target="_blank">Click to login</a><br></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Your login details are as follows:
</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                             <tr>
                              <td>User name   :'.$email.' </td>
                            </tr>
                            <tr>
                              <td>Password    :'.$pas.' </td>
                            </tr>
                             <tr>
                              <td>Please keep this information secured, and ensure to logout from this portal after each visit.</td>
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
                                        <th width="100" scope="row">
                                                                                </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                           <th width="88" scope="row">
                                                                                  </th>
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













$message1="Your user name is ".$email." and password is ".$pas." .please click on https://canada.siaimmigration.com  to login";

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


		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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
$ee = session()->get('email');
					 $emaill=$ee;
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
					
@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);



$message1="User Profile Edit Name- ".$heading."Id-".$id."";

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

/////////////////////////////
public function edit_move_to_client($id)
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

if ($this->request->getMethod()=='post'){

	//echo"hi";
	//echo $id;
	//exit();



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
	'entery_status'=>'client',
	//'file_status'=>$this->request->getPost('file_status'),
	
	
	
	
	'updated_at'=>date( 'Y-m-d H:i:s' )
];

$client = new Prospect_model(); 
$updatee=$client->update($id, $data);
//$updatee='1';
if($updatee){


	$Team = new Team_model();


 //$fn=$session()->get('firstname');
	$na=$this->request->getPost('name');
	$co=$this->request->getPost('contact');


$na=$this->request->getPost('name');
$na1 = substr($na, 0, 3);
$mo=$this->request->getPost('contact');
$mo1 = substr($mo, 0, 3);

//$pas=$na1.$mo1;




$pp=$na1.$mo1;
$email=$this->request->getPost('email');
//exit();
$insert=$Team->insert([

	'siaprotal_id'=>$id,
	'firstname'=>$this->request->getPost('name'),
	'lastname'=>'',
	'email'=>$this->request->getPost('email'),
	'mobile_no'=>$this->request->getPost('contact'),
	'password'=>$pp,
	'pass'=>$pp,
	'type'=>'client',
	'status'=>'1',
	'added_by'=>session()->get('firstname'),
	'added_by_id'=>session()->get('id'),	
	'created_at'=>date( 'Y-m-d H:i:s' ),
	'email'=>$this->request->getPost('email'),
]);


	$From="Sia Immigration";
				//$ee = session()->get('email');
           $emaill=$this->request->getPost('email');


					$emailll='no-reply@siaimmigration.com';
					$subject  = "Welcome to our online SiaPortal";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 	
 					$headers .= 'From:  ' . $From . ' <' . $emailll .'>' . " \r\n" .
            'Reply-To: '.  $emailll . "\r\n" .
            'X-Mailer: PHP/' . phpversion(); 					
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
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="200" height="100" alt="right-top.png">
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
                            <td>Welcome to our online SiaPortal</td>
                          </tr>
                          <tr>
                            <td valign="top">PRIVATE AND CONFIDENTIAL</td>
                            </tr>
                            <tr>
                              <td>Dear '.$na.'</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Welcome to Sia immigration solutions incs SiaPortal.
</td>
                        </tr>
                            <tr>We have created an account on our Client Portal for you. This portal allows you to view your profile, upload your documents, fill out your forms and get the latest updates on your immigration file.</td>
                            </tr>
                           
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>You can access this portal by clicking on the following link:
</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td><a  href="https://canada.siaimmigration.com" target="_blank">Click to login</a><br></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Your login details are as follows:
</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                             <tr>
                              <td>User name   :'.$email.' </td>
                            </tr>
                            <tr>
                              <td>Password    :'.$pp.' </td>
                            </tr>
                             <tr>
                              <td>Please keep this information secured, and ensure to logout from this portal after each visit.</td>
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
                                        <th width="100" scope="row">
                                                                                </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                           <th width="88" scope="row">
                                                                                  </th>
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
					
@mail($email.',no-reply@siaimmigration.com,ds@siaimmigration.com',$subject,$message,$headers);





	////move mail
	$From="siaimmigration";
					$ee = session()->get('email');
					 $emaill=$ee;
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
					
					
		
	
	@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,ds@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);






	$heading = $this->request->getPost('name');
	
$From="Sia Immigration";
$ee = session()->get('email');
					 $emaill=$ee;
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
					
@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,ds@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);



$message1="User Profile Edit Name- ".$heading."Id-".$id."";

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

		return view('admin/client/edit_move_to_client',$data);

}


}else{
	//$Prospect = new Team_model(); 
	$Client = new Prospect_model(); 
	$data['client'] = $Client->where('id', $id)
                   ->findAll();

    $Agent = new Agent_model(); 
	$data['agent'] = $Agent->getpost();

		return view('admin/client/edit_move_to_client',$data);
	}
}




public function edit_move_to_client_bkp($id)
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

if ($this->request->getMethod()=='post'){

	//echo"hi";
	//echo $id;
	//exit();



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
	'entery_status'=>'client',
	//'file_status'=>$this->request->getPost('file_status'),
	
	
	
	
	'updated_at'=>date( 'Y-m-d H:i:s' )
];

$client = new Prospect_model(); 
$updatee=$client->update($id, $data);
if($updatee){


	$Team = new Team_model();


 //$fn=$session()->get('firstname');
$pp='1234560';
$email=$this->request->getPost('email');
//exit();
$insert=$Team->insert([

	'siaprotal_id'=>$id,
	'firstname'=>$this->request->getPost('name'),
	'lastname'=>'',
	'email'=>$this->request->getPost('email'),
	'mobile_no'=>$this->request->getPost('contact'),
	'password'=>$pp,
	'pass'=>$pp,
	'type'=>'client',
	'status'=>'1',
	'added_by'=>session()->get('firstname'),
	'added_by_id'=>session()->get('id'),	
	'created_at'=>date( 'Y-m-d H:i:s' )
	//'email'=>$this->request->getPost('email'),
]);


$From="siaimmigration";
					$ee = session()->get('email');
					 $emaill=$ee;
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
					$message .= '<h3 style="color:red;">Password </h3><p style="color:#000080">'.$pp.
					//$message .= '<h3 style="color:red;">password : </h3><p style="color:#000080">' .$dataa.'</p><hr><br>';
					$message .= '<a  href="https://canada.siaimmigration.com" target="_blank">Click to login</a><br>';
					
					//$message .= '<h3 style="color:red;">Please dont share this link to anyone</h3><hr><br>';
					
					
		
	
	@mail($email.',no-reply@siaimmigration.com',$subject,$message,$headers);





	////move mail
	$From="siaimmigration";
					$ee = session()->get('email');
					 $emaill=$ee;
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
					
					
		
	
	@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);






	$heading = $this->request->getPost('name');
	
$From="Sia Immigration";
$ee = session()->get('email');
					 $emaill=$ee;
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
					
@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);



$message1="User Profile Edit Name- ".$heading."Id-".$id."";

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

		return view('admin/client/edit_move_to_client',$data);

}


}else{
	//$Prospect = new Team_model(); 
	$Client = new Prospect_model(); 
	$data['client'] = $Client->where('id', $id)
                   ->findAll();

    $Agent = new Agent_model(); 
	$data['agent'] = $Agent->getpost();

		return view('admin/client/edit_move_to_client',$data);
	}
}



/////////////////////////////





	public function view_client()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}
 $entries=$this->request->getPost('entries');
	 $Prospect = new Prospect_model(); 
	

$Category = new Category_model(); 
	$data['category'] = $Category->getpost();
	//$data['type_immg'] = $Type_immg->getpost();

	$Type_client = new Type_client_model(); 
	$data['type_client'] = $Type_client->getpost();

	$status = new Status_model(); 
	$data['status'] = $status->getpost();

$Prospect = new Prospect_model(); 
	//$data['client'] = $Prospect->getentery_client();

if($entries=='all'){

	$data = [
			//'prospect' => $paginateData,
			'client_all'=>$Prospect->select('*')->where('entery_status', 'client')

      ->orderBy('id', 'desc')
                    ->findAll(),
			'pager' => $Prospect->pager,
			
		];

		return view('admin/client/view_client_all',$data);

	}else{

	$data = [
			//'prospect' => $paginateData,
			'client'=>$Prospect->select('*')->where('entery_status', 'client')

      ->orderBy('id', 'desc')
                   ->paginate(50),
			'pager' => $Prospect->pager,
			
		];

	//	$data['entries']=$entries;


		return view('admin/client/view_client',$data);



	}




	}


			public function set_client_limit()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}



		return view('admin/client/set_client_limit');
	}



				public function send_whatsapp_msg()
	{
		 if (session()->get('isLoggedIn') !=true) {
				return redirect()->to('index');		
}
		 if (session()->get('isLoggedIn') !=true) {
				return redirect()->to('index');		
}
		if ($this->request->getMethod()=='post'){

 			$client_type=$this->request->getPost('client_type');
 			$start_id=$this->request->getPost('start_id');
 			$end_id=$this->request->getPost('end_id');
 		 	$msg=$this->request->getPost('msg');

 		 		$Prospect = new Prospect_model();

 		//$agent_ph=$this->Backoffice_model4->getRecop_by_id('agent',$start_id,$end_id);

 		$data = [		
			'client_all'=>$Prospect->select('number,heading')->where('entery_status', $client_type)
			->where('id >=', $start_id)
			->where('id  <=', $end_id)
      ->orderBy('id', 'desc')->findAll(),
		];

 
 //print_r($data['client_all']);
 //exit();




$i=0;
foreach($data['client_all'] as $ap){

	 $body=$msg.'--'.$ap['heading'].'-'.$ap['number'];




$params=array(
'token' => '9oluyxcx86q0fuum',
'to' => $ap['number'],
'body' => $msg
);
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ultramsg.com/instance42591/messages/chat",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => http_build_query($params),
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded"
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
}*/



// $ph='17782575709,919653364499';
// //$ph=$ap['number'];


// 	$namea=urlencode($body);

// 	$curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => "https://api.ultramsg.com/instance1974/messages/chat",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "POST",
//   CURLOPT_POSTFIELDS => "token=g1yw8pxgda8u8bc3&to=".$ph."&body=".$namea."&priority=1",
//   CURLOPT_HTTPHEADER => array(
//     "content-type: application/x-www-form-urlencoded"
//   ),
// ));

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);


// $person = json_decode($response);


$i++;


}


}
	




		return view('admin/whatsapp/send_whatsapp_msg');
	}





public function view_referred_client()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}


$Refer = new Refer_model(); 
	$data['refer'] = $Refer->where('siaprotal_id !=', '')
                   ->findAll();




		return view('admin/referred_client/view_referred_client',$data);
	}

public function edit_refer_client($id)
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

if ($this->request->getMethod()=='post'){


	$data = [
    'refer_staus'=>$this->request->getPost('refer_staus')
	
	//'status'=>$this->request->getPost('status'),
	
	//'updated_at'=>date( 'Y-m-d H:i:s' )
];

$Agent = new Refer_model(); 
$updatee=$Agent->update($id, $data);
if($updatee){

$url = 'Siaportal/view_referred_client';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{

$Refer = new Refer_model(); 
	$data['refer'] = $Refer->where('id', $id)
                   ->findAll();

		return view('admin/referred_client/edit_refer_client',$data);

}


}else{
	//$Prospect = new Team_model(); 




$Refer = new Refer_model(); 
	$data['refer'] = $Refer->where('id', $id)
                   ->findAll();




		return view('admin/referred_client/edit_refer_client',$data);

	}
}







public function full_view_client($id)
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}


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

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$Prospect = new Prospect_model(); 
	$data['client'] = $Prospect->getentery_client();

		return view('admin/client/add_view_client',$data);
	}
	//--------------------------------------------------------------------




	//-------------------------------------

public function add_emp()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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

					$ee = session()->get('email');
					 $emaill=$ee;
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
@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);



$message1="New Employer Added- ".$name."-".$contact."-".$city."-".$company_name."-".$company_type."";

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

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$Emp = new Emp_model(); 
	$data['emp'] = $Emp->getpost();

		return view('admin/employers/view_emp',$data);
	}


	public function edit_emp($id)
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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
					
					$ee = session()->get('email');
					 $emaill=$ee;
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
@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);



$message1="New Job Available- ".$emp_name."-".$type."-".$job_dec."-".$req."";

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

 date_default_timezone_set('Asia/Kolkata');

$Prospect = new Prospect_model(); 
	

 $aa=date("m/d");
//exit();

	$data['dob'] = $Prospect->dob($aa);


	foreach($data['dob'] as $db){

	$email=	$db['email'];
	$name=	$db['heading'];


					$From="Sia Immigration";
					
					$ee = session()->get('email');
					 $emaill="mkj@siaimmigration.com";
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Happy Birthday ".$name."";						
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
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="200" height="100" alt="right-top.png">
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
                              <td>Dear '.$db['heading'].'</td>
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
                                        <th width="100" scope="row">
                                         >                                        </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                           <th width="88" scope="row">
                                                                                  </th>
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
@mail($email.',no-reply@siaimmigration.com',$subject,$message,$headers);



$message1="Wishing you a fabulous birthday! As you celebrate this special day, do know that you are tremendously treasured. May there be an abundance of joy and happiness in your life and we wish all your dream come true";

//$message1="New Employer Addeds";
$p=$db['number'];
$c=$db['cc'];
$m=$c.$p;


$phone = array($m);

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


public function adr_mail(){

 date_default_timezone_set('Asia/Kolkata');

$Adr = new Adr_model(); 
	

 $aa=date('m-d', strtotime(' +5 day'));
//exit();

	$data['dob'] = $Adr->where('status', '1')->dob($aa);

	$data['lastQuery'] = $Adr->getLastQuery();
//echo "<pre>";
	//print_r($data['lastQuery']);
	//exit();


	foreach($data['dob'] as $db){




				$From="Sia Immigration";
					
					 $emaill='mkj@siaimmigration.com';
					
					$subject  = "ADR Document";	
											
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					

 					$headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

					$message =' Client Detail. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Sia id : ' .$db['sia_id'].'<br>';
					$message .= 'Client Name : ' .$db['client_name'].'<br>';
					
					$message .= 'Notes : ' .$db['notes'].'<br>';
					$message .= 'Start Date : ' .$db['adr_start_date'].'<br>';
					$message .= 'End Date : ' .$db['adr_end_date'].'<br>';
					$message .= 'Application Number : ' .$db['app_number'].'<br>';

					
@mail('ds@siaimmigration.com,Mkj@siaimmigration.com,Admin@siaimmigration.com,Consult@siaimmigration.com,Kam@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);

 
$msg='Adr Client Detail :-';

 $body=$msg.'  Sia id :- '.$db['sia_id'].',  Client name:- '.$db['client_name'].',  Notes:- '.$db['notes'].',  Start date:- '. $db['adr_start_date'].',  End Date:- '. $db['adr_end_date'].',  Application number:- '.$db['app_number'];

$ph='17786867870,17782575507,17782575508,17782281017,919653364499';



	$namea=urlencode($body);

	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ultramsg.com/instance1974/messages/chat",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "token=g1yw8pxgda8u8bc3&to=".$ph."&body=".$namea."&priority=1",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


$person = json_decode($response);









}

}


public function profile_in_process($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
					$ee = session()->get('email');
					 $emaill=$ee;
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
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="200" height="100" alt="right-top.png">
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
                                        <th width="100" scope="row">
                                                                                 </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                           <th width="88" scope="row">
                                                                                  </th>
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
					
@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name."your  Profile in Process now";

//$message1="New Employer Addeds";


//$phone = array('17789887731','17782281017','17782575507','17782575508');

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















public function application_submitted($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
				$ee = session()->get('email');
					 $emaill=$ee;
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
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="200" height="100" alt="right-top.png">
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
                                        <th width="100" scope="row">
                                                                                </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                           <th width="88" scope="row">
                                                                                  </th>
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
					
@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);



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



























public function approved($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
				$ee = session()->get('email');
					 $emaill=$ee;
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
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="200" height="100" alt="right-top.png">
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
                                        <th width="100" scope="row">
                                                                                </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                           <th width="88" scope="row">
                                                                                  </th>
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
					
@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);



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
					$ee = session()->get('email');
					 $emaill=$ee;	
					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Refused";						
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
                                  <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="200" height="100" alt="right-top.png">
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
                                        <th width="100" scope="row">
                                                                                  </th>
                                        <td width="133">
                                          <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                           <th width="88" scope="row">
                                                                                  </th>
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
					
@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);



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

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}


$Lmia_job = new Lmia_job_model(); 
	$data['lmia_job'] = $Lmia_job->getpost();

		return view('admin/employers/view_job_lmia',$data);
	}



	public function edit_job_lmia($id)
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$Siaportal = new Siaportal_model(); 
	$data['client'] = $Siaportal->getpost();

		return view('admin/employers/view_emp_own_lmia',$data);
	}


	//-------------------------------------

public function view_stu_need_job()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$Siaportal = new Siaportal_model(); 
	$data['client'] = $Siaportal->getpost();

		return view('admin/student/view_stu_need_job',$data);
	}

//-------------------------------------


	public function add_lmia_needed()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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
	'tag_search'=>$this->request->getPost('tag_search'),
	'having_canada_visa'=>$this->request->getPost('having_canada_visa'),
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
					$ee = session()->get('email');
					 $emaill=$ee;
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

					
@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);



//$message1="Your user name is ".$email." and password is ".$pass." .please click on https://canada.siaimmigration.com  to login";

$message1=" LMIA needed added:- ".$heading."-".$number."-".$email."-".$source."-".$agent_name."";

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

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}



$Lmia = new Prospect_model(); 
	$data['lmia_needed'] = $Lmia->get_lmia('lmia_needed');

		return view('admin/lmia/view_lmia_needed',$data);
	}


	public function edit_lmia_needed($id)
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

if ($this->request->getMethod()=='post'){


	$data = [
    'tag_search'=>$this->request->getPost('tag_search'),
	'having_canada_visa'=>$this->request->getPost('having_canada_visa'),
	
	//'status'=>$this->request->getPost('status'),
	
	'updated_at'=>date( 'Y-m-d H:i:s' )
];

$Agent = new Prospect_model(); 
$updatee=$Agent->update($id, $data);
if($updatee){

$url = 'Siaportal/view_lmia_needed';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{

//$Prospect = new Team_model(); 
	$Lmia = new Prospect_model(); 
	$data['lmia'] = $Lmia->where('id', $id)
                   ->findAll();

		return view('admin/lmia/edit_lmia_needed',$data);

}


}else{
	//$Prospect = new Team_model(); 
	$Lmia = new Prospect_model(); 
	$data['lmia'] = $Lmia->where('id', $id)
                   ->findAll();

		return view('admin/lmia/edit_lmia_needed',$data);
	}
}


public function edit_student_need_job($id)
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

if ($this->request->getMethod()=='post'){


	$data = [
    'tag_search'=>$this->request->getPost('tag_search'),
	'having_canada_visa'=>$this->request->getPost('having_canada_visa'),
	
	//'status'=>$this->request->getPost('status'),
	
	'updated_at'=>date( 'Y-m-d H:i:s' )
];

$Agent = new Prospect_model(); 
$updatee=$Agent->update($id, $data);
if($updatee){

$url = 'Siaportal/view_employe_for_student';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{

//$Prospect = new Team_model(); 
	$Lmia = new Prospect_model(); 
	$data['lmia'] = $Lmia->where('id', $id)
                   ->findAll();

		return view('admin/lmia/edit_student_need_job',$data);

}


}else{
	//$Prospect = new Team_model(); 
	$Lmia = new Prospect_model(); 
	$data['lmia'] = $Lmia->where('id', $id)
                   ->findAll();

		return view('admin/lmia/edit_student_need_job',$data);
	}
}




/////////////////////////
public function add_student_need_job()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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
	'tag_search'=>$this->request->getPost('tag_search'),
	'having_canada_visa'=>$this->request->getPost('having_canada_visa'),
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
					$ee = session()->get('email');
					 $emaill=$ee;
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

					
@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);



//$message1="Your user name is ".$email." and password is ".$pass." .please click on https://canada.siaimmigration.com  to login";

$message1=" Student Need Job:- ".$heading."-".$number."-".$email."-".$source."-".$agent_name."";


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


		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$emp_stu = new Prospect_model(); 
	$data['emp_for_student'] =$emp_stu->get_lmia('student_need_job');

		return view('admin/lmia/view_employer_for_student',$data);
	}

///////////////-------------

public function view_family_tree()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$family = new Prospect_model(); 
//master_sia_id
$data['family'] = $family->where('family', 'yes')
->where('master_sia_id !=', '')
                   ->findAll();

//$data['family'] = $family->where('master_sia_id !=', '')
              //     ->findAll();

	//$data['emp_for_student'] =$emp_stu->get_lmia('student_need_job');

		return view('admin/family/view_family_tree',$data);
	}


	public function all_family_member($mid)
	{


		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}
$MIDD = new Prospect_model(); 
	

	$data['mm'] = $MIDD->where('id', $mid)
                   ->findAll();
 $aaid=$data['mm']['0']['master_sia_id'];



$data['mmid'] = $MIDD->where('id', $aaid)
                   ->findAll();

		return view('admin/family/all_family_member',$data);
	}


///-----------------------

public function add_td_card()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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

		 if (session()->get('isLoggedIn') !=true) {

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

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$Agent = new Agent_model(); 
	$data['agent'] = $Agent->getpost();

		return view('admin/agent/view_agent',$data);
	}


	public function edit_agent($id)
	{

		 if (session()->get('isLoggedIn') !=true) {

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

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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
					$ee = session()->get('email');
					 $emaill=$ee;
					$subject  = "SiaPortal New Form Added :-Date-".date('d/m/Y')."";
					//$subject  = "";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";

 					$headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					$message ='New Form Added<br>';
					$message .=' Agent Deatail. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Heading : ' .$heading.'<br>';
					$message .= 'Form Body: ' .$form_body.'<br>';
					
@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);



$message1="New Form Added- ".$heading."";

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

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$New_form = new New_form_model(); 
	$data['new_form'] = $New_form->getpost();

		return view('admin/new_form/view_new_form',$data);
	}


	public function edit_new_form($id)
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

if ($this->request->getMethod()=='post'){


	$data = [
    'heading'=>$this->request->getPost('heading'),
	'form_body'=>$this->request->getPost('form_body'),
	
	
	'update_on'=>date( 'Y-m-d H:i:s' )
];
$New_form = new New_form_model(); 


//$Agent = new Agent_model(); 

$updatee=$New_form->update($id, $data);
//$updatee=$New_form->New_form($id, $data);
if($updatee){

$url = 'Siaportal/view_new_form';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{

$New_form = new New_form_model(); 
	$data['new_form'] = $New_form->where('id', $id)
                   ->findAll();

		return view('admin/new_form/edit_new_form',$data);

}


}else{
	//$Prospect = new Team_model(); 
	$New_form = new New_form_model(); 
	$data['new_form'] = $New_form->where('id', $id)
                   ->findAll();

		return view('admin/new_form/edit_new_form',$data);
	}
}





	//--------------------------------------------------------------------

///////////end new form --------------



public function add_prospect()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

		if ($this->request->getMethod()=='post'){
$Prospect = new Prospect_model();


 $num=$this->request->getPost('number');
$coc=$this->request->getPost('cc');
 $ph=$coc.$num;


$insert=$Prospect->insert([

	'news_image1'=>$this->request->getPost('news_image1'),
	'heading'=>$this->request->getPost('heading'),
	'typee'=>$this->request->getPost('typee'),
	
	'number'=>$ph,
	'agent_name'=>$this->request->getPost('agent_name'),
	'team_member'=>$this->request->getPost('team_member'),
	'email'=>$this->request->getPost('email'),

	'address'=>$this->request->getPost('address'),
	'city'=>$this->request->getPost('city'),
	'reff'=>$this->request->getPost('reff'),
	'user_dob'=>$this->request->getPost('dob'),
	'client_status'=>$this->request->getPost('client_status'),
	'spouse_name'=>$this->request->getPost('spouse_name'),


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
	$agent = new Agent_model(); 
	$data['agent'] = $agent->getpost();
		return view('admin/prospect/add_prospect',$data);
	}


		public function set_prospect_limit()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}



		return view('admin/prospect/set_prospect_limit');
	}






	public function view_prospect()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

 $entries=$this->request->getPost('entries');
 $Prospect = new Prospect_model(); 
//if ($this->request->getMethod()=='post'){

	 $entries=$this->request->getPost('entries');
	 $Prospect = new Prospect_model(); 
	 if($entries=='all'){

$Prospect = new Prospect_model(); 
	 	$data = [
			//'prospect' => $paginateData,
	//->where('appo_book', 'Appointment booked')
			'prospect_all'=>$Prospect->select('id,news_image1,voice_added,from_web,heading,mail_send,mail_send_on,sms_send,sms_send_on,number,insert_on,pstatus,ppstatus,agent_name,team_member,number,admin_status')
			->where('entery_status', 'prospect')

      ->orderBy('id', 'desc')
                   ->findAll(),
			'pager' => $Prospect->pager,
			
		];

	return view('admin/prospect/view_prospect_all',$data);
	 }else{
$Prospect = new Prospect_model(); 

$data = [
			//'prospect' => $paginateData,
	//->where('appo_book', 'Appointment booked')
			'prospect'=>$Prospect->select('id,news_image1,voice_added,from_web,heading,mail_send,mail_send_on,sms_send,sms_send_on,number,insert_on,pstatus,ppstatus,agent_name,team_member,number,admin_status')
			->where('entery_status', 'prospect')

      ->orderBy('id', 'desc')
                   ->paginate(50),
			'pager' => $Prospect->pager,
			
		];

	return view('admin/prospect/view_prospect',$data);
	 }
	//exit();
	//}




//$paginateData = $Prospect->paginate(50,'group1');
//$page = 3;



	//$data['prospect'] = $Prospect->getentery();

	
	}



public function edit_prospect($id)
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

if ($this->request->getMethod()=='post'){

$num=$this->request->getPost('number');
$coc=$this->request->getPost('cc');
 $ph=$coc.$num;

	$data = [
    'agent_name'=>$this->request->getPost('agent_name'),
	'team_member'=>$this->request->getPost('team_member'),
	'email'=>$this->request->getPost('email'),
	'heading'=>$this->request->getPost('heading'),
	'typee'=>$this->request->getPost('typee'),
	'cc'=>$this->request->getPost('cc'),
	'num'=>$this->request->getPost('num'),
	'number'=>$ph,

	'address'=>$this->request->getPost('address'),
	'city'=>$this->request->getPost('city'),
	'reff'=>$this->request->getPost('reff'),
	'user_dob'=>$this->request->getPost('dob'),
	'client_status'=>$this->request->getPost('client_status'),
	'spouse_name'=>$this->request->getPost('spouse_name'),

	
	'voice_added'=>'siaportal',
	'news_image1'=>$this->request->getPost('news_image1'),
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

                   $agent = new Agent_model(); 
	$data['agent'] = $agent->getpost();

		return view('admin/prospect/edit_prospect',$data);
	}
}


public function immigration_enquiry_mail($id,$mail_send=NULL){


		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}
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
					$ee = session()->get('email');
					 $emaill=$ee;
					
						$subject1  = "imp: About your Immigration Enquiry";	
					
											
											
					$headers1  = "MIME-Version: 1.0\r\n";
 					$headers1 .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers1.="From: \"".$From1."\"<".$emaill1."> \r\n";		
 				$headers1 .= 'From:  ' . $From1 . ' <' . $emaill1 .'>' . " \r\n" .
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
                                          <td valign="top" style="padding:0px 18px 9px;line-height:100%;text-align:right;"><img src="https://www.siaimmigration.com/mailer-images/01/right-top.png" width="200" height="100" alt="right-top.png">
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
                                        <th width="100" scope="row">
                                                                              </th>
                                          <td width="133">
                                            <a href="https://siaimmigration.com/home/accreditations" target="_blank"><img src="https://www.siaimmigration.com/mailer-images/04/three-best.png" width="100" height="82" alt="three-best.png"></a>                                        </td>
                                             <th width="88" scope="row">
                                                                                  </th>
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
                                                      <a href="https://api.whatsapp.com/send?phone=917341113549" target="_blank" style="color:#40a840;text-decoration:none;font-weight:bold;">WhatsApp</a> </div>
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
					alert("please add Mobile number (e.g 917341113549)");
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
					$ee = session()->get('email');
					 $emaill=$ee;
					//$subject  = "".ucfirst($cs).",id-".$dell.",Name-".$name."";
					$subject  = "Move To client";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					$headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Entery Detail <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= '<h3 style="color:red;">Siaportal id no :-</h3><p style="color:#000080">'.$id.' Move into client</p><br>';
					
					
		
	
	@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);

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

public function add_client_login()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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

	'siaprotal_id'=>$this->request->getPost('siaprotal_id'),
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
					$ee = session()->get('email');
					 $emaill=$ee;
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
					$message .= '<h3 style="color:red;">Password </h3><p style="color:#000080">'.$pass.'</p><br>';
					//$message .= '<h3 style="color:red;">password : </h3><p style="color:#000080">' .$dataa.'</p><hr><br>';
					$message .= '<a  href="https://canada.siaimmigration.com" target="_blank">Click to login</a><br>';
					
					//$message .= '<h3 style="color:red;">Please dont share this link to anyone</h3><hr><br>';
					
					
		
	
	@mail($email.',no-reply@siaimmigration.com',$subject,$message,$headers);



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
		return view('admin/client_login/add_client',$data);
	}

public function check_mail_client($id)
	{

	$Client = new Team_model(); 
	 $data['email'] = $Client->where('email', $id)
	 
                   ->findAll();

$aa=count($data['email']);

$data['cc']=$aa;
                    
		
		 echo json_encode($data["cc"]);
	
}

	///-----------------------

public function add_team_login()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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


/*

$From="siaimmigration";
					
					$ee = session()->get('email');
					 $emaill=$ee;

					
					
					$subject  = "Password";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					$headers.="From: \"".$From."\"<".$emaill."> \r\n";
					$message =' Login Detail. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= '<h3 style="color:red;">User name </h3><p style="color:#000080">'.$email.'</p><br>';
					$message .= '<h3 style="color:red;">Password </h3><p style="color:#000080">'.$pass.'</p><br>';
					
					$message .= '<a  href="https://canada.siaimmigration.com" target="_blank">Click to login</a><br>';
					
					
					
					
		
	
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

*/

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

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

	//$Prospect = new Team_model(); 
	$Team = new Team_model(); 
		$data['team'] = $Team->where('type','Admin')
		->Orwhere('type','Employee')						
                   ->findAll();


	//$data['team'] = $Team->getpost();

		return view('admin/team/view_team',$data);
	}

public function view_client_login()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

	//$Prospect = new Team_model(); 
	$Team = new Team_model(); 
		$data['team'] = $Team->where('type','client')
		->Orwhere('type','Client')
						
                   ->findAll();
	//$data['team'] = $Team->getpost();

		return view('admin/client_login/view_client',$data);
	}


	public function view_app_finder()
	{


		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

	//$Prospect = new Team_model();


	$Approve = new Client_application_model();  

  
$data['app_finder'] = $Approve->app_finder(); 
//$data['lastQuery'] = $Approve->getLastQuery();

//print_r($Approve->getLastQuery() );
//exit();
	
	//$data['team'] = $Team->getpost();

		return view('admin/app_finder/view_app_finder',$data);
	}

public function edit_team($id)
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}


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



public function edit_client($id)
	{


		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}
if ($this->request->getMethod()=='post'){


	$data = [
    'firstname'=>$this->request->getPost('firstname'),
	'lastname'=>$this->request->getPost('lastname'),
	'email'=>$this->request->getPost('email'),
	'mobile_no'=>$this->request->getPost('mobile_no'),
	'password'=>$this->request->getPost('password'),
	'siaprotal_id'=>$this->request->getPost('siaprotal_id'),
	
	'pass'=>$this->request->getPost('password'),
	'type'=>$this->request->getPost('type'),
	'status'=>$this->request->getPost('status'),
	'ref_hide'=>$this->request->getPost('ref_hide'),
	
	'updated_at'=>date( 'Y-m-d H:i:s' )
];

$Team = new Team_model(); 
$updatee=$Team->update($id, $data);
if($updatee){

$url = 'Siaportal/view_client_login';
					echo'
					<script>
					alert("Record update Successfuly. to see change in Refer Cases need logout and login in client account ")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{


$Team = new Team_model(); 
	$data['team'] = $Team->where('id', $id)
                   ->findAll();

		return view('admin/client_login/edit_client',$data);

}


}else{
	//$Prospect = new Team_model(); 
	$Team = new Team_model(); 
	$data['team'] = $Team->where('id', $id)
                   ->findAll();

		return view('admin/client_login/edit_client',$data);
	}
}

	//--------------------------------------------------------------------



///-----------------------

public function add_category()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$Category = new Category_model(); 
	$data['category'] = $Category->getpost();

		return view('admin/category/view_category',$data);
	}


	public function edit_category($id)
	{


		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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


		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}
$Type = new Type_client_model(); 
	$data['type'] = $Type->getpost();

		return view('admin/type/view_type',$data);
	}


	public function edit_type($id)
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$status = new Status_model(); 
	$data['status'] = $status->getpost();

		return view('admin/status/view_status',$data);
	}


	public function edit_status($id)
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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
	$Status1 = new Status_model(); 
	$data['status1'] = $Status1->where('id', $id)
                   ->findAll();

      $Category = new Category_model(); 
	$data['category'] = $Category->getpost();
	$Type = new Type_client_model(); 
	$data['type'] = $Type->getpost();   


	$status = new Status_model(); 
	$data['status'] = $status->getpost1($id);              

		return view('admin/status/edit_status',$data);
	}
}
///-----------------------------------------


public function add_client_application($id)
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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
					->orderBy('category', 'asc')
                   ->findAll();

                    $tc = new Type_client_model(); 
	$data['type'] = $tc->where('id', $tid)
                   ->findAll();
                    $id=$data['client']['0']['id'];
                   $name=$data['client']['0']['heading'];
                   $mobile_no=$data['client']['0']['number'];
                   $Email=$data['client']['0']['email'];
                   $cat=$data['cat']['0']['category'];
                   $type=$data['type']['0']['type'];
                  


					$From="siaimmigration";
					$ee = session()->get('email');
					$emaill=$ee;

					$subject  = "Ready to Apply id-".$id."-Name-".$name."";
					//$subject  = "Ready to Apply";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
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
					
					
		
	
	@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com,Reach@siaimmigration.com,support@siaimmigration.com',$subject,$message,$headers);



//$message1="Your user name is ".$email." and password is ".$pass." .please click on https://canada.siaimmigration.com  to login";

$message1=" Application Ready to Apply -id-".$id.",Name-".$name."  category- ".$cat." type- ".$type."";


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

	$url = 'Siaportal/view_client';
					echo'
					<script>
					alert("Record Added Successfuly");
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{
	$url = 'Siaportal/view_client';
					echo'
					<script>
					alert("Record not added Successfuly");
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


///////////full view 


public function full_view_client_application($category,$id,$sid,$type)
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}
//echo $category; echo '<br>';	
//echo $type;
//exit();

	if($category=='2' && $type=='2' ){
		
		$url = 'BC_pnp_int_grd/full_bc_pnp_int_grd/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

//$this->edit_bc_pnp_int_grd($category,$id);
		//return view('admin/client_application/full_bc_pnp_int_grd');
	}
	else if($category=='2' && $type=='123'){
		$url = 'BC_pnp_int_grd_exp_entery/full_bc_pnp_int_grd_exp_entery/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}


	else if($category=='54' && $type=='128'){
		$url = 'Temporary_resident_visa_na/full_temporary_resident_visa_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

	else if($category=='55' && $type=='129'){
		$url = 'Immigration_application_na/full_immigration_application_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

	else if($category=='23' && $type=='85'){
		$url = 'Visitor_extension_inland/full_visitor_extension_inland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}



	////////////

	else if($category=='56' && $type=='130'){
		$url = 'Work_permit_LMIA_inland/full_Work_permit_LMIA_inland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
	}

else if($category=='56' && $type=='131'){
		$url = 'Work_permit_LMIA_outland/full_Work_permit_LMIA_outland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
	}

else if($category=='58' && $type=='134'){
		$url = 'LMIA_exempt_na/full_LMIA_exempt_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
	}



else if($category=='57' && $type=='132'){
		$url = 'Other_open_work_permit_new_application/full_other_open_work_permit_new_application/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
	}


else if($category=='57' && $type=='133'){
		$url = 'Other_open_work_permit_extention/full_other_open_work_permit_extention/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
	}


	////////////


else if($category=='9' && $type=='32'){
		$url = 'PGWP_application_inland/full_PGWP_application_inland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}
	else if($category=='10' && $type=='33'){
		$url = 'PGWP_extension_inland/full_PGWP_extension_inland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

else if($category=='19' && $type=='77'){
		$url = 'Super_visa_outland/full_super_visa_outland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

	else if($category=='39' && $type=='64'){
		$url = 'Citizenship_certi_application_adult/full_citizenship_certi_application_adult/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

else if($category=='39' && $type=='65'){
		$url = 'Citizenship_certi_application_minor/full_citizenship_certi_application_minor/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

	else if($category=='33' && $type=='115'){
		$url = 'Passport_na/full_passport_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

	else if($category=='52' && $type=='125'){
		$url = 'CAIPS_NOTES_CAIPS/full_caips_notes_caips/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}
	else if($category=='52' && $type=='126'){
		$url = 'CAIPS_NOTES_GCMS/full_caips_notes_gcms/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}
	else if($category=='53' && $type=='127'){
		$url = 'DLI_NUMBER_CHANGE/full_dli_number_change/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}


	else if($category=='50' && $type=='124'){
		$url = 'BC_PNP_tech_pilot_skill_worker/full_bc_pnp_tech_pilot_skill_worker/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}


	else if($category=='16' && $type=='11'){
		$url = 'BC_PNP_semi_skilled_long_haul_truck/full_bc_pnp_semi_skilled_long_haul_truck/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

	else if($category=='36' && $type=='39'){
		$url = 'Bridging_open_wp_na/full_bridging_open_wp_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

else if($category=='13' && $type=='16'){
		$url = 'BC_pnp_int_pg_exp_entery/full_bc_pnp_int_pg_exp_entery/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}


	else if($category=='3' && $type=='3'){
		$url = 'Canadian_exp_class/full_canadian_exp_class/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

	else if($category=='26' && $type=='100'){

		$url = 'Ainp_na/full_ainp_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
		

	else if($category=='25' && $type=='101'){

		$url = 'Aipp_na/full_aipp_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='47' && $type=='102'){

		$url = 'Amend_immi_doc_na/full_amend_immi_doc_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
		else if($category=='46' && $type=='88'){

		$url = 'Oci/full_oci_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='17' && $type=='103'){

		$url = 'BC_PNP_heathcare_prof_na/full_bc_pnp_heathcare_prof_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}

	else if($category=='14' && $type=='104'){

		$url = 'BC_pnp_sw_in_can_na/full_bc_pnp_sw_in_can_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}

	else if($category=='7' && $type=='29'){

		$url = 'Study_permit_extension_inland/full_study_permit_extension_inland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}

	else if($category=='15' && $type=='105'){

		$url = 'Bc_pnp_sw_overseas_na/full_bc_pnp_sw_overseas_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='29' && $type=='106' || $type=='63'){

		$url = 'Caregivers_na/full_caregivers_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}

	else if($category=='34' && $type=='107'){

		$url = 'Citizenship_application_na/full_citizenship_application_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='20' && $type=='108'){

		$url = 'Family_sponsorship_na/full_family_sponsorship_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='12' && $type=='109'){

		$url = 'FSTW_na/full_fstw_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='11' && $type=='110'){

		$url = 'FSW_na/full_fsw_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
	}
		else if($category=='45' && $type=='87'){

		$url = 'Indian_visa_na/full_indian_visa_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
	}
	else if($category=='27' && $type=='112'){

		$url = 'International_exp_class_na/full_international_exp_class_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='28' && $type=='75'){

		$url = 'Minp_na/full_minp_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}


	else if($category=='35' && $type=='116'){

		$url = 'Pr_card_na/full_pr_card_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='41' && $type=='117'){

		$url = 'RNIP_sault_na/full_rnip_sault_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}

	else if($category=='40' && $type=='64'){

		$url = 'RNIP_vernon_na/full_rnip_vernon_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='18' && $type=='119'){

		$url = 'RNIP_west_kootenay_na/full_rnip_west_kootenay_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='30' && $type=='120'){

		$url = 'SINP_na/full_sinp_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='38' && $type=='84'){

		$url = 'Travel_doc_application_na/full_travel_doc_application_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}


	else if($category=='4' && $type=='4'){

		$url = 'Spausal_sponsorship_inland/full_spausal_sponsorship_inland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='4' && $type=='5'){

		$url = 'Spausal_sponsorship_outland/full_spausal_sponsorship_outland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

		//return view('admin/client_application/full_spausal_sponsorship');

	}
	else if($category=='5' && $type=='26'){

			$url = 'Intl_stu_spousal_open_wp_inland/full_intl_stu_spousal_open_wp_inland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/full_intl_stu_spousal_open_wp');

	}

	else if($category=='5' && $type=='27'){

			$url = 'Intl_stu_spousal_open_wp_outland/full_intl_stu_spousal_open_wp_outland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/full_intl_stu_spousal_open_wp');

	}
	else if($category=='6' && $type=='24'){

		$url = 'Worker_spousal_open_wp_inland/full_worker_spousal_open_wp_inland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/full_worker_spousal_open_wp_inland');

	}

		else if($category=='6' && $type=='25'){

		$url = 'Worker_spousal_open_wp_outland/full_worker_spousal_open_wp_outland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/full_worker_spousal_open_wp_inland');

	}

else if($category=='44' && $type=='73'){

		$url = 'Lmia_global/full_lmia_global_tlnt_high_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/full_worker_spousal_open_wp_inland');

	}

	else if($category=='32' && $type=='68'){

		$url = 'Lmia_wp_hg/full_lmia_wp_high_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/full_worker_spousal_open_wp_inland');

	}

	else if($category=='32' && $type=='56'){

		$url = 'Lmia_wp_lg/full_lmia_wp_low_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/full_worker_spousal_open_wp_inland');

	}

	else if($category=='42' && $type=='69'){

		$url = 'Lmia_pr_lg/full_lmia_pr_low_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/full_worker_spousal_open_wp_inland');

	}
		else if($category=='42' && $type=='70'){

		$url = 'Lmia_pr_hg/full_lmia_pr_high_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/full_worker_spousal_open_wp_inland');

	}

	else if($category=='43' && $type=='71'){

		$url = 'Lmia_dual_int_hg/full_lmia_dual_int_high_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/full_worker_spousal_open_wp_inland');

	}

	else if($category=='43' && $type=='72'){

		$url = 'Lmia_dual_int_lg/full_lmia_dual_int_low_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/full_worker_spousal_open_wp_inland');

	}
	else if($category=='22' && $type=='78'){

		$url = 'Tourist_visa_canada/full_toutist_visa_canada/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}

	else if($category=='21' && $type=='93'){

		$url = 'Visitor_visa_canada/full_visitor_visa_canada/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}


else if($category=='21' && $type=='94'){

		$url = 'Visitor_visa_usa/full_visitor_visa_usa/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}

	else if($category=='37' && $type=='38'){

		$url = 'Co_op_wp/full_co_op_wp/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}


	else if($category=='13' && $type=='17'){

		$url = 'Bc_pnp_int_pg/full_bc_pnp_int_pg/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}

		else{

$url = 'Siaportal/view_client/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>
					alert("this condition under development");					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>';

	}








		
	
}




public function full_view_client_application_olddd($category,$id,$sid,$type)
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}
//echo $category; echo '<br>';	
//echo $type;
//exit();

	if($category=='2' && $type=='2' ){
		
		$url = 'BC_pnp_int_grd/full_bc_pnp_int_grd/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	


	}else if($category=='3' && $type=='3'){
		$url = 'Canadian_exp_class/edit_canadian_exp_class/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	


	}

	else if($category=='26' && $type=='100'){

		$url = 'Ainp_na/full_view_ainp_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
		

	else if($category=='25' && $type=='101'){

		$url = 'Aipp_na/full_aipp_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='47' && $type=='102'){

		$url = 'Amend_immi_doc_na/full_amend_immi_doc_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
		else if($category=='46' && $type=='88'){

		$url = 'Oci/full_oci_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='17' && $type=='103'){

		$url = 'BC_PNP_heathcare_prof_na/full_bc_pnp_heathcare_prof_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}

	else if($category=='14' && $type=='104'){

		$url = 'BC_pnp_sw_in_can_na/full_bc_pnp_sw_in_can_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}

/////////////////

	else if($category=='19' && $type=='77'){
		$url = 'Super_visa_outland/full_super_visa_outland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}


else if($category=='50' && $type=='124'){
		$url = 'BC_PNP_tech_pilot_skill_worker/full_bc_pnp_tech_pilot_skill_worker/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

	else if($category=='36' && $type=='39'){
		$url = 'Bridging_open_wp_na/full_bridging_open_wp_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

	else if($category=='16' && $type=='11'){
		$url = 'BC_PNP_semi_skilled_long_haul_truck/full_bc_pnp_semi_skilled_long_haul_truck/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}






	else if($category=='52' && $type=='125'){
		$url = 'CAIPS_NOTES_CAIPS/full_caips_notes_caips/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}
	else if($category=='52' && $type=='126'){
		$url = 'CAIPS_NOTES_GCMS/full_caips_notes_gcms/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}
	else if($category=='53' && $type=='127'){
		$url = 'DLI_NUMBER_CHANGE/full_dli_number_change/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}
////////////////






	else if($category=='15' && $type=='105'){

		$url = 'Bc_pnp_sw_overseas_na/full_bc_pnp_sw_overseas_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='29' && $type=='106' || $type=='63'){

		$url = 'Caregivers_na/full_caregivers_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}

	else if($category=='34' && $type=='107'){

		$url = 'Citizenship_application_na/full_citizenship_application_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='20' && $type=='108'){

		$url = 'Family_sponsorship_na/full_family_sponsorship_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='12' && $type=='109'){

		$url = 'FSTW_na/full_fstw_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='11' && $type=='110'){

		$url = 'FSW_na/full_fsw_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
	}
	else if($category=='37' && $type=='38'){

		$url = 'Co_op_wp/full_view_co_op_wp/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}


		else if($category=='45' && $type=='87'){

		$url = 'Indian_visa_na/full_indian_visa_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
	}
	else if($category=='27' && $type=='112'){

		$url = 'International_exp_class_na/full_international_exp_class_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='28' && $type=='75'){

		$url = 'Minp_na/full_minp_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}


	else if($category=='35' && $type=='116'){

		$url = 'Pr_card_na/full_pr_card_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='41' && $type=='117'){

		$url = 'RNIP_sault_na/full_rnip_sault_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}

	else if($category=='40' && $type=='118'){

		$url = 'RNIP_vernon_na/full_rnip_vernon_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='18' && $type=='119'){

		$url = 'RNIP_west_kootenay_na/full_rnip_west_kootenay_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='30' && $type=='120'){

		$url = 'SINP_na/full_sinp_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='38' && $type=='84'){

		$url = 'Travel_doc_application_na/full_travel_doc_application_na/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}


	else if($category=='4' && $type=='4'){

		$url = 'Spausal_sponsorship_inland/full_spausal_sponsorship_inland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='4' && $type=='5'){

		$url = 'Spausal_sponsorship_outland/full_spausal_sponsorship_outland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

		//return view('admin/client_application/edit_spausal_sponsorship');

	}
	else if($category=='5' && $type=='26'){

			$url = 'Intl_stu_spousal_open_wp_inland/full_intl_stu_spousal_open_wp_inland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_intl_stu_spousal_open_wp');

	}

	else if($category=='5' && $type=='27'){

			$url = 'Intl_stu_spousal_open_wp_outland/full_intl_stu_spousal_open_wp_outland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					