<?php
namespace App\Controllers;
use App\Models\Siaportal_model;
use App\Models\Agent_model;
use App\Models\User_model;
use App\Models\Emp_model;
use App\Models\Service_model;
use App\Models\Lmia_job_model;
use App\Models\Imm_type_model;
use App\Models\Type_immg_model;
use App\Models\Team_model;
use App\Models\Prospect_model;
use App\Models\Category_model;
use App\Models\Type_client_model;
use App\Models\New_recod_model;
use App\Models\Invoice_model;
use App\Models\Status_model;
use App\Models\Voice_msg_model; 
use App\Models\New_form_model;
use App\Models\Adv_model;
use App\Models\Adr_model;
use App\Models\Setting_siaportal_model;
use App\Models\Refer_model;
use App\Models\Client_document_model;
use App\Models\Immigration_enquiry_model;

use App\Models\Work_and_eduction_model;

use App\Models\Client_application_model;
use App\Models\Agreement\Agreement_model;
use codeigniter\controller;
use CodeIgniter\I18n\Time;
use CodeIgniter\HTTP\Files\UploadedFile;
use CodeIgniter\Database\Query;
use CodeIgniter\Email\Email;



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
	public function emailtest($name='test name',$tname='jjjjj',$tmobile='7658844497',$cmobile='9653364499',$email='rana.naharsingh@gmail.com'){





					$From="Sia Immigration";
				$ee = session()->get('email');
           $emaill='no-reply@siaimmigration.com';

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
                                        <th width="100" scope="row">
                                                                               </th>
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
					
//@mail($email.',no-reply@siaimmigration.com',$subject,$message,$headers);

helper('smtp_helper');
  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$to = array('no-reply@siaimmigration.com');
				$cc = [$email];

			
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();




  }
	
	   public function custom404()
    {
      echo "gigigi";
      exit();
        header('Location: https://siaimmigration.com/');
        exit();
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
$emailll="no-reply@siaimmigration.com";
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
					
//@mail($email.',no-reply@siaimmigration.com',$subject,$message,$headers);


  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				$to = [$email];
			
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();



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



// Assuming this code is in a controller method
public function test_smtp_mail() {
    // Load the email service through dependency injection
    $email = \Config\Services::email();

    // Load the SMTP settings helper function
    $smtpSettings = get_smtp_settings();
    
    $email->initialize($config);

    // Prepare email content
    $message = 'This is smtp check bosy content';
    $emailAddress = "no-reply@siaimmigration.com";
    $from = "sia";
    $subject = "This is smtp check";

    // Remove unnecessary backslashes
    $message = preg_replace('/\\\\/', '', $message);

    //$to = array('no-reply@siaimmigration.com');
    //$cc = ['ds@siaimmigration.com'];
	
	$to = array('chandola.neeraj@gmail.com');

    $email->setFrom($emailAddress, $from);
    $email->setTo($to);
    //$email->setCC($cc);
    $email->setReplyTo($emailAddress);

    $email->setSubject($subject);
    $email->setMessage($message);

    // Send email
    if ($email->send()) {
        echo "Email sent successfully Updated.";
    } else {
        echo "Error: " . $email->printDebugger(['headers']);
    }
	
	
	$subject1 = "New SMT Code check";
	$message1 = "New SMT Code check";
	$From1 = "sia";
	$to = ['chandola.neeraj@gmail.com'];
	$email1 = \Config\Services::email();
	$config = get_smtp_settings();
	$email1->initialize($config);
	$email1->setFrom('no-reply@siaimmigration.com', $From1);
	$email1->setTo($to);
	$email1->setReplyTo('no-reply@siaimmigration.com');
	$email1->setSubject($subject1);
	$email1->setMessage($message1);
	//$email1->send();
	if ($email1->send()) {
        echo "Email sent successfully New Code.";
    } else {
        echo "Error: " . $email->printDebugger(['headers']);
    }
	
	
}


	
		public function view_smtp_setting($id=1)
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

if ($this->request->getMethod()=='post'){

	$postData = $this->request->getPost();
	$data = [
    'option_name'=>'smtp_settings',

		'option_value'=>json_encode($postData),
			
	

	
	'date_updated	'=>date( 'Y-m-d H:i:s' )
];

$Agent = new Setting_siaportal_model(); 
$updatee=$Agent->update($id, $data);
if($updatee){

$url = 'Siaportal/view_smtp_setting';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{

//$Prospect = new Team_model(); 
	$Lmia = new Setting_siaportal_model(); 
	$data['lmia'] = $Lmia->where('id', $id)
                   ->findAll();

		return view('admin/smtp/view_smtp_setting',$data);

}


}else{
    
  
	//$Prospect = new Team_model(); 
	$Smtp = new Setting_siaportal_model(); 
	$data['smtp'] = $Smtp->where('id', '1')
                   ->findAll();
                   
                  

		return view('admin/smtp/view_smtp_setting',$data);
	}
}

 public function move_to_OVERSE($id)
  {
    
   
			$data = [
				'typee' => 'overseas'
				
	];
		//	$AddData = $this->Backoffice_model2->updateData('immigration_enquiry',$data,$id);
	    $Imm = new Immigration_enquiry_model();	

$updatee=$Imm->update($id, $data);



  $url = '/Siaportal/view_canada_inquiries';
          echo'
          <script>
          alert("Record move Successfully");
          window.location.href = "'.base_url().$url.'";
          </script>
          ';
  
  
  

}

  public function move_to_new_record($id,$page=NULL)
  {
    
   

//$data['new_record']=$this->Backoffice_model1->getRecoId('immigration_enquiry',$id);


	$Imm = new Immigration_enquiry_model(); 
	$data['new_record'] = $Imm->where('id', $id)
                   ->findAll();

$New_reco = new New_recod_model();


  $insert=$New_reco->insert([
              
              'siaprotal_id'=>$data['new_record']['0']['siaprotal_id'],
              'heading'=>$data['new_record']['0']['heading'],
              'full_heading'=>$data['new_record']['0']['full_heading'],
              'image'=>$data['new_record']['0']['image'],
              'insert_on'=>$data['new_record']['0']['insert_on'],
              'update_on'=>$data['new_record']['0']['update_on'],
              'short_news'=>$data['new_record']['0']['short_news'],
              'agent_name'=>$data['new_record']['0']['agent_name'],
              'team_member'=>$data['new_record']['0']['team_member'],
              'number'=>$data['new_record']['0']['number'],
              'agent_status' =>$data['new_record']['0']['agent_status'],
              'admin_status'=>$data['new_record']['0']['admin_status'],
              'news_image1'=>$data['new_record']['0']['news_image1'],
              'status'=>$data['new_record']['0']['status'],
              'email'=>$data['new_record']['0']['email'],
              'walk_status'=>$data['new_record']['0']['walk_status'],
              'team_member_name'=>$data['new_record']['0']['team_member_name'],
              'typee'=>$data['new_record']['0']['typee'],
              'mail_send'=>$data['new_record']['0']['mail_send'],
              'mail_send_on'=>$data['new_record']['0']['mail_send_on'],
              'sms_send'=>$data['new_record']['0']['sms_send'],
              'sms_send_on'=>$data['new_record']['0']['sms_send_on'],
              'dob'=>$data['new_record']['0']['dob'],
              'h_qulifaction'=>$data['new_record']['0']['h_qulifaction'],
              'skilled'=>$data['new_record']['0']['skilled'],
              'country_of_citizen'=>$data['new_record']['0']['country_of_citizen'],
              'ccr'=>$data['new_record']['0']['ccr'],
              'fur_info'=>$data['new_record']['0']['fur_info'],
              'siblings'=>$data['new_record']['0']['siblings'],
              'taken_test'=>$data['new_record']['0']['taken_test'],
              'name_of_test'=>$data['new_record']['0']['name_of_test'],
              'resume'=>$data['new_record']['0']['resume'],
              'resume_link'=>$data['new_record']['0']['resume_link'],
               'move_from'=>'yes'
                                     
              
            ]);
 // $AddData = $this->Backoffice_model1->AddData('news_new',$data);

//$DelCategory = $this->Backoffice_model1->deleteInCond('immigration_enquiry',"id",$id);

    $del=$Imm->where('id', (int) $id)->delete();
      
 // $data['new_record']=$this->Backoffice_model3->getRecoId('immigration_enquiry',$id);

if($page==''){

  $url = '/Siaportal/view_canada_inquiries';
          echo'
          <script>
          alert("Record move Successfully");
          window.location.href = "'.base_url().$url.'";
          </script>
          ';
}else{
    $url = '/Siaportal/view_overseas';
          echo'
          <script>
          alert("Record move Successfully");
          window.location.href = "'.base_url().$url.'";
          </script>
          ';  
    
    
}



}


public function move_to_prospect($id)
{
    if (session()->get('isLoggedIn') != true) {
        return redirect()->to('index');
    }

    $Imm = new Immigration_enquiry_model();
    $data['new_record'] = $Imm->where('id', $id)->findAll();

    if (empty($data['new_record'])) {
        session()->setFlashdata('error', 'Record not found.');
        return redirect()->to(base_url('Siaportal/view_canada_inquiries'));
    }

    $record = $data['new_record'][0];

    $Prospect = new Prospect_model();
    $insert = $Prospect->insert([
        'heading'          => $record['heading'],
        'full_heading'     => $record['full_heading'],
        'image'            => $record['image'],
        'short_news'       => $record['short_news'],
        'number'           => $record['number'],
        'email'            => $record['email'],
        'agent_name'       => $record['agent_name'],
        'team_member'      => $record['team_member'],
        'team_member_name' => $record['team_member_name'],
        'agent_status'     => $record['agent_status'],
        'admin_status'     => $record['admin_status'],
        'news_image1'      => $record['news_image1'],
        'status'           => $record['status'],
        'walk_status'      => $record['walk_status'],
        'typee'            => $record['typee'],
        'from_web'         => $record['from_web'],
        'mail_send'        => $record['mail_send'],
        'mail_send_on'     => $record['mail_send_on'],
        'sms_send'         => $record['sms_send'],
        'sms_send_on'      => $record['sms_send_on'],
        'resume'           => $record['resume'],
        'entery_status'    => 'prospect',
        'insert_on'        => date('Y-m-d H:i:s'),
    ]);

    if ($insert) {
        $Imm->where('id', (int) $id)->delete();
    }

    $url = 'Siaportal/view_prospect';
    echo '
    <script>
    alert("Record Moved to Prospect Successfully")
    window.location.href = "'.base_url('Siaportal/view_prospect').'";
    </script>
    ';

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
					

					
//@mail('ds@siaimmigration.com,admin@siaimmigration.com, info@siaimmigration.com,mj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);
  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];
      $to = json_decode(EMP_EMAIL, true);
			
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();
}


}


}

public function  login()
	{

$data=[];

		if ($this->request->getMethod() == 'post') {

			if (trim($this->request->getPost('email')) === 'appointment') {
				$pass  = $this->request->getPost('password');
				$creds = [
					['user' => 'admin',   'pass' => 'sia@2024',    'name' => 'Super Admin'],
					['user' => 'manager', 'pass' => 'manager@123', 'name' => 'Manager'],
				];
				foreach ($creds as $c) {
					if ($c['pass'] === $pass) {
						session()->set([
							'appoint_admin_loggedin' => true,
							'appoint_admin_name'     => $c['name'],
							'appoint_admin_user'     => $c['user'],
						]);
						return redirect()->to(base_url('appoint/AppointAdmin/dashboard'));
					}
				}
				session()->setFlashdata('login_error', 'Invalid password for appointment admin.');
				return redirect()->to(base_url());
			}

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
		return redirect()->to(base_url());
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
		 $clientEmail = session()->get('email') ?? '';

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

	$db2 = \Config\Database::connect();
	$data['appointments'] = $db2->query("
		SELECT * FROM tbl_app_appointment
		WHERE (prospect_id = ? AND prospect_id > 0) OR (client_email = ? AND client_email != '')
		ORDER BY appointment_date DESC, appointment_time DESC
	", [(int)$sid, $clientEmail])->getResultArray();


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
					

					
//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);

  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			$to = json_decode(EMP_EMAIL, true);
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();


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

					
//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];
$to = json_decode(EMP_EMAIL, true);
			
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();

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

             $emailll="no-reply@siaimmigration.com";

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
					
//@mail($email.',no-reply@siaimmigration.com',$subject,$message,$headers);



  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				$to = [$email];
			
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();













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
	'client_status'=>'',//$this->request->getPost('client_status'),
	'spouse_name'=>$this->request->getPost('spouse_name'),
	'reff'=> '',//$this->request->getPost('reff'),
	'user_dob'=>$this->request->getPost('dob'),
	//'file_number'=>$this->request->getPost('file_number'),
	'address'=>$this->request->getPost('address'),
	'city'=>$this->request->getPost('city'),
	'source'=> '', //$this->request->getPost('source'),
	'family'=> '', //$this->request->getPost('family'),
	'master_sia_id'=> '', //$this->request->getPost('master_sia_id'),
	'agent_name'=> '', //$this->request->getPost('agent_name'),
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
					
//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			$to = json_decode(EMP_EMAIL, true);
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();

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
	'client_status'=> '', //$this->request->getPost('client_status'),
	'spouse_name'=>$this->request->getPost('spouse_name'),
	'reff'=> '', //$this->request->getPost('reff'),
	'user_dob'=>$this->request->getPost('dob'),
	//'file_number'=>$this->request->getPost('file_number'),
	'address'=>$this->request->getPost('address'),
	'city'=>$this->request->getPost('city'),
	'source'=> '',//$this->request->getPost('source'),
	'family'=> '',//$this->request->getPost('family'),
	'master_sia_id'=> '', //$this->request->getPost('master_sia_id'),
	'agent_name'=> '', //$this->request->getPost('agent_name'),
	'entery_status'=>'client',
	//'file_status'=>$this->request->getPost('file_status'),
	'team_member'=>$this->request->getPost('team_member'),




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


 $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);


	$From="Sia Immigration";
				//$ee = session()->get('email');
           $emaill=$this->request->getPost('email');

				$emailll="no-reply@siaimmigration.com";
					$subject  = "Welcome to our online SiaPortal ";						
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
					
//@mail($email.',no-reply@siaimmigration.com,ds@siaimmigration.com',$subject,$message,$headers);

//  $to = array('no-reply@siaimmigration.com');
//     $cc = [$email.',no-reply@siaimmigration.com','ds@siaimmigration.com'];

//     $email1->setFrom($emailll, $from);
//     $email1->setTo($to);
//     $email1->setCC($cc);
//     $email1->setReplyTo($emailll);
//     $email1->setSubject($subject);
//     $email1->setMessage($message);
//     $email1->send();

$emailService = \Config\Services::email(); // Changed variable name to avoid confusion with recipient email

// Load the SMTP settings helper function
$config = get_smtp_settings();

// Initialize the email configuration
$emailService->initialize($config);

// Set recipient email addresses
$to = [$email]; // Use actual email address(es) here
$cc = ['no-reply@siaimmigration.com', 'ds@siaimmigration.com']; // Keep as an array

// Set email fields
$emailService->setFrom('no-reply@siaimmigration.com', 'Sia Immigration');
$emailService->setTo($to);
$emailService->setCC($cc);
$emailService->setReplyTo('no-reply@siaimmigration.com');
$emailService->setSubject($subject);
$emailService->setMessage($message);

// Send the email
$emailService->send();


	////move mail
	$From="siaimmigration";
					$ee = session()->get('email');
					 $emaill=$ee;
					//$subject  = "".ucfirst($cs).",id-".$dell.",Name-".$name."";
					// Get assigned team member name
					$teamMemberData = $Team->where('id', $this->request->getPost('team_member'))->first();
					$assignedTo = $teamMemberData ? trim($teamMemberData['firstname'] . ' ' . $teamMemberData['lastname']) : 'N/A';
					$subject  = $assignedTo . ' Assigned (' . $na . ' – SIAPortal ID: ' . $id . ') – Team Member Assigned';
					//$subject  = "Lended  Application Fee";
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";

 					$headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

					$message  = 'Hi Team,<br><br>';
					$message .= '<strong>Team Member Assigned</strong><br><br>';
					$message .= 'A team member has been successfully assigned to the following application in the SIA Portal.<br><br>';
					$message .= '<strong>SIAPortal ID:</strong> ' . $id . '<br>';
					$message .= '<strong>Applicant Name:</strong> ' . $na . '<br>';
					$message .= '<strong>Assigned To:</strong> ' . $assignedTo . '<br>';
					$message .= '<strong>Team Member Email:</strong> ' . ($teamMemberData['email'] ?? 'N/A') . '<br>';
					$message .= '<strong>Team Member Phone:</strong> ' . ($teamMemberData['mobile_no'] ?? 'N/A') . '<br>';
					$message .= '<strong>Date:</strong> ' . date('d/m/Y') . '<br><br>';
					$message .= 'All further communication and actions for this application should now be handled by the assigned team member.<br><br>';
					$message .= 'For any updates or support, please coordinate directly with ' . $assignedTo . '.<br><br>';
					$message .= 'Thank you.';




//	@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,ds@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);





    $to = array('no-reply@siaimmigration.com','support@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','reach@siaimmigration.com','info@siaimmigration.com','Admin@siaimmigration.com','office@siaimmigration.com');
    //$cc = ['office@siaimmigration.com','admin@siaimmigration.com','info@siaimmigration.com','ds@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];
    $cc = json_decode(EMP_EMAIL, true);

    $email1->setFrom('no-reply@siaimmigration.com', 'Sia Immigration');
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo('no-reply@siaimmigration.com');

    $email1->setSubject($subject);
    $email1->setMessage($message);

    // Send email
    $email1->send();

	// Send assign team member mail to client
	helper('assign_team_member');
	assign_team_member(
		$na,
		$assignedTo,
		$teamMemberData['mobile_no'] ?? '',
		$co,
		$email
	);



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
					
//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,ds@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);

  
    $to = array('no-reply@siaimmigration.com');
    //$cc = ['office@siaimmigration.com','admin@siaimmigration.com','info@siaimmigration.com','kam@siaimmigration.com','ds@siaimmigration.com','mkj@siaimmigration.com','no-reply@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

    $cc = json_decode(EMP_EMAIL, true);

    $email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);

    $email1->setSubject($subject);
    $email1->setMessage($message);

    // Send email
    $email1->send();

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

	$Team = new Team_model();
	$data['team'] = $Team->where('type','Employee')->findAll();

	$Agent = new Agent_model();
	$data['agent'] = $Agent->where('id', $id)->findAll();

		return view('admin/client/edit_move_to_client',$data);

}


}else{
	$Client = new Prospect_model();
	$data['client'] = $Client->where('id', $id)
                   ->findAll();

    $Agent = new Agent_model();
	$data['agent'] = $Agent->getpost();

	$Team = new Team_model();
	$data['team'] = $Team->where('type', 'Employee')->findAll();

		return view('admin/client/edit_move_to_client',$data);
	}
}

public function sttt(){
    $id="gigiig";
    	////move mail
	$From="siaimmigration";
					$ee = 'no-reply@siaimmigration.com';
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

					$message =' Entery Detail smtp  <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= '<h3 style="color:red;">Siaportal id no :-</h3><p style="color:#000080">'.$id.' Move into client</p><br>';
					
					
		
	
//	@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,ds@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);

 $email = \Config\Services::email();

    // Load the SMTP settings helper function
   $config = get_smtp_settings();
   


$email->initialize($config);
    
    $to = array('no-reply@siaimmigration.com');
    //$cc = ['office@siaimmigration.com','admin@siaimmigration.com','info@siaimmigration.com','ds@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

    $cc = json_decode(EMP_EMAIL, true);

    $email->setFrom('no-reply@siaimmigration.com', $from);
    $email->setTo($to);
    $email->setCC($cc);
    $email->setReplyTo('no-reply@siaimmigration.com');

    $email->setSubject($subject);
    $email->setMessage($message);

    // Send email
     if ($email->send()) {
        echo "Email sent successfully.";
    } else {
        echo "Error: " . $email->printDebugger(['headers']);
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
					
					
		
	
	//@mail($email.',no-reply@siaimmigration.com',$subject,$message,$headers);
	
	
  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				$to = [$email];
			
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();





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
					
					
		
	
//	@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);



  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			  $to = json_decode(EMP_EMAIL, true);
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();



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
					
//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			  $to = json_decode(EMP_EMAIL, true);
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();

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

	// Fetch ALL entries (prospect + client) for cross-type duplicate detection
	$db = \Config\Database::connect();
	$allForDup = $db->query("SELECT id, heading, email, user_dob, entery_status FROM tbl_client_prospect WHERE entery_status IN ('client','prospect')")->getResultArray();
	$nameEmailMap = [];
	$nameDobMap   = [];
	foreach ($allForDup as $r) {
		$name  = strtolower(trim($r['heading']));
		$entry = ['id' => (int)$r['id'], 'status' => $r['entery_status']];
		if (!empty(trim($r['email']))) {
			$nameEmailMap[$name . '|' . strtolower(trim($r['email']))][] = $entry;
		}
		if (!empty(trim($r['user_dob'])) && $r['user_dob'] !== '0000-00-00') {
			$nameDobMap[$name . '|' . $r['user_dob']][] = $entry;
		}
	}
	$dupProspectIds = [];
	$dupClientIds   = [];
	foreach (array_merge(array_values($nameEmailMap), array_values($nameDobMap)) as $group) {
		if (count($group) < 2) continue;
		foreach ($group as $item) {
			$id = $item['id'];
			foreach ($group as $other) {
				if ($other['id'] === $id) continue;
				if ($other['status'] === 'prospect') {
					$dupProspectIds[$id][] = $other['id'];
				} else {
					$dupClientIds[$id][] = $other['id'];
				}
			}
		}
	}
	foreach ($dupProspectIds as &$arr) { $arr = array_values(array_unique($arr)); sort($arr); }
	foreach ($dupClientIds   as &$arr) { $arr = array_values(array_unique($arr)); sort($arr); }
	unset($arr);

	// Search filters
	$search_id    = trim($this->request->getGet('search_id') ?? '');
	$search_name  = trim($this->request->getGet('search_name') ?? '');
	$search_phone = trim($this->request->getGet('search_phone') ?? '');

	$query = $Prospect->select('*')->where('entery_status', 'client');
	if ($search_id !== '') {
		$query = $query->where('id', (int)$search_id);
	}
	if ($search_name !== '') {
		$query = $query->like('heading', $search_name);
	}
	if ($search_phone !== '') {
		$phone_digits = preg_replace('/\D/', '', $search_phone);
		if (!empty($phone_digits)) {
			$query = $query->where("REGEXP_REPLACE(`number`, '[^0-9]', '') LIKE '%" . $phone_digits . "%'");
		} else {
			$query = $query->like('number', $search_phone);
		}
	}

	// Booked appointments keyed by prospect_id
	$bookedIds = [];
	$bookedRows = $db->query("
		SELECT prospect_id, appointment_date, appointment_time, status, assigned_to, service_type, appointment_type, consultation_type, contact_method, office_location
		FROM tbl_app_appointment
		WHERE prospect_id IS NOT NULL AND prospect_id > 0
		ORDER BY appointment_date DESC, appointment_time DESC
	")->getResultArray();
	foreach ($bookedRows as $br) {
		$pid = (int)$br['prospect_id'];
		if (!isset($bookedIds[$pid])) {
			$bookedIds[$pid] = [
				'date'              => $br['appointment_date'],
				'time'              => $br['appointment_time'],
				'status'            => (int)$br['status'],
				'assigned_to'       => $br['assigned_to'] ?? '',
				'service_type'      => $br['service_type'] ?? '',
				'appointment_type'  => $br['appointment_type'] ?? '',
				'consultation_type' => $br['consultation_type'] ?? '',
				'contact_method'    => $br['contact_method'] ?? '',
				'office_location'   => $br['office_location'] ?? '',
			];
		}
	}

	$teamMembers = $db->query("SELECT id, firstname, lastname FROM tbl_reg WHERE status=1 AND type='Employee' ORDER BY firstname ASC")->getResultArray();

	$clientRows = $query->orderBy('id', 'desc')->paginate(50);

	// Agreement status keyed by application_id, for the applications belonging to clients on this page
	$ApplicationModel = new Client_application_model();
	$applicationIdsOnPage = array_column(
		$ApplicationModel->getApplicationIdsByProspectIds(array_column($clientRows, 'id')),
		'id'
	);
	$AgreementModel = new Agreement_model();
	$agreementStatus = $AgreementModel->getStatusByApplicationIds($applicationIdsOnPage);

	$data = [
			'client'          => $clientRows,
			'pager'           => $Prospect->pager,
			'dupProspectIds'  => $dupProspectIds,
			'dupClientIds'    => $dupClientIds,
			'search_id'       => $search_id,
			'search_name'  => $search_name,
			'search_phone' => $search_phone,
			'bookedIds'    => $bookedIds,
			'teamMembers'  => $teamMembers,
			'agreementStatus' => $agreementStatus,
		];
// $data = [
//     'client' => $Prospect
//         ->select("tbl_client_prospect.*, 
//             (
//                 SELECT GROUP_CONCAT(t2.id ORDER BY t2.id DESC SEPARATOR ',')
//                 FROM tbl_client_prospect t2
//                 WHERE t2.heading = tbl_client_prospect.heading
//                 AND t2.user_dob = tbl_client_prospect.user_dob
//                 AND t2.entery_status = 'client'
//             ) as ids
//         ")
//         ->where('entery_status', 'client')
//         ->where("(heading, user_dob) IN (
//             SELECT heading, user_dob
//             FROM tbl_client_prospect
//             WHERE entery_status = 'client'
//             GROUP BY heading, user_dob
//             HAVING COUNT(*) > 1
//         )", null, false)
//         ->orderBy('id', 'desc')
//         ->paginate(50),

//     'pager' => $Prospect->pager,
// ];





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
//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);

  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			$to = json_decode(EMP_EMAIL, true);
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();


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
//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			$to = json_decode(EMP_EMAIL, true);
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();

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
 die('CRON JOB is Stopped');
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
                              <td>Happy Birthday to You!</td>
                            </tr>
							<tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>On this wonderful day, we pray for endless blessings in your life. May you be surrounded by peace, joy, and love, and may every step you take lead you closer to your dreams. You are truly cherished, and we wish you all the happiness and success that life has to offer.</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Its been a privilege to support you, and we are here for you whenever you need us.</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Warm blessings,</td>
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
//@mail($email.',no-reply@siaimmigration.com',$subject,$message,$headers);
//'mkj@siaimmigration.com','Consult@siaimmigration.com','Admin@siaimmigration.com','Office@siaimmigration.com','Kam@siaimmigration.com'
$From1 = "Sia Immigration";
//$cc = ['mkj@siaimmigration.com','Consult@siaimmigration.com','Admin@siaimmigration.com','Office@siaimmigration.com','Kam@siaimmigration.com'];
$cc = json_decode(EMP_EMAIL, true);
$email1 = \Config\Services::email();
$config = get_smtp_settings();
$email1->initialize($config);
$email1->setFrom('no-reply@siaimmigration.com', $From1);
$email1->setTo($email);
$email1->setCC($cc);
$email1->setReplyTo('no-reply@siaimmigration.com');
$email1->setSubject($subject);
$email1->setMessage($message);
$email1->send();
/*if ($email1->send()) {
	echo "Email sent successfully New Code.";
} else {
	echo "Error: " . $email->printDebugger(['headers']);
}*/



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
    $current_date = date('Y-m-d');
    
    // Fetch records where adr_start_date is today or within 3 days of adr_end_date, excluding completed (status=1)
    $data['dob'] = $Adr->where('status !=', '1')
                       ->groupStart()
                           ->where('adr_start_date', $current_date)
                           ->orWhere('DATE_SUB(adr_end_date, INTERVAL 3 DAY) <=', $current_date)
                       ->groupEnd()
                       ->where('adr_end_date >=', $current_date)
                       ->findAll();
                       
                   

    foreach($data['dob'] as $db) {
        $From = "Sia Immigration";
        $emaill = 'mkj@siaimmigration.com';
        $subject = "ADR Document Notification " . $db['client_name'];

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";                    
        $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
                    'Reply-To: '.  $emaill . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

        $message = 'Client Detail.<br>';
        $message .= 'Date: ' . date('d/m/Y') . '<br>';
        $message .= 'Sia ID: ' . $db['sia_id'] . '<br>';
        $message .= 'Client Name: ' . $db['client_name'] . '<br>';
        $message .= 'Notes: ' . $db['notes'] . '<br>';
        $message .= 'Start Date: ' . $db['adr_start_date'] . '<br>';
        $message .= 'End Date: ' . $db['adr_end_date'] . '<br>';
        $message .= 'Application Number: ' . $db['app_number'] . '<br>';

        $email1 = \Config\Services::email();
        $config = get_smtp_settings();
        $email1->initialize($config);
        $message1 = preg_replace('/\\\\/', '', $message);
        $cc = array('no-reply@siaimmigration.com');
        //$to = ['admin@siaimmigration.com','mkj@siaimmigration.com','office@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','info@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

        $to = json_decode(EMP_EMAIL, true);

        // Send the mail
        $email1->setFrom($emaill, $From);
        $email1->setTo($to);
        $email1->setCC($cc);
        $email1->setReplyTo($emaill);
        $email1->setSubject($subject);
        $email1->setMessage($message1);
        $email1->send();
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
					
//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			$to = json_decode(EMP_EMAIL, true);
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();

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
					
//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);

  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			$to = json_decode(EMP_EMAIL, true);
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();


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
					
//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);

  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			$to = json_decode(EMP_EMAIL, true);
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();


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
					
//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);

  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			$to = json_decode(EMP_EMAIL, true);
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();


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

					
//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			$to = json_decode(EMP_EMAIL, true);
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();

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

					
//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			$to = json_decode(EMP_EMAIL, true);
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();

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
//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			$to = json_decode(EMP_EMAIL, true);
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();

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
					
//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);

  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			$to = json_decode(EMP_EMAIL, true);
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();


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



public function search_by_email()
{
    $email = $this->request->getGet('email');
    if (empty(trim($email))) {
        return $this->response->setJSON([]);
    }
    $db = \Config\Database::connect();
    $like = '%' . $email . '%';
    $results = $db->query(
        "SELECT id, heading, entery_status, email
         FROM tbl_client_prospect
         WHERE email LIKE ?
           AND entery_status IN ('prospect','client')
         ORDER BY heading LIMIT 10",
        [$like]
    )->getResultArray();
    return $this->response->setJSON($results);
}

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

	'news_image1'  => $this->request->getPost('news_image1')   ?? '',
	'heading'      => $this->request->getPost('heading')       ?? '',
	'typee'        => $this->request->getPost('typee')         ?? '',
	'number'       => $ph,
	'agent_name'   => $this->request->getPost('agent_name')    ?? '',
	'team_member'  => $this->request->getPost('team_member')   ?? '',
	'email'        => $this->request->getPost('email')         ?? '',
	'address'      => $this->request->getPost('address')       ?? '',
	'city'         => $this->request->getPost('city')          ?? '',
	'reff'         => $this->request->getPost('reff')          ?? '',
	'user_dob'     => $this->request->getPost('dob')           ?? '',
	'client_status'=> $this->request->getPost('client_status') ?? '',
	'spouse_name'  => $this->request->getPost('spouse_name')   ?? '',
	'voice_added'  => 'siaportal',
	'entery_status'=> 'prospect',
	'insert_on'    => date('Y-m-d H:i:s')
]);
if($insert){
	$url = 'Siaportal/view_prospect';
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

	// Build cross-type duplicate map (prospect + client)
	$db = \Config\Database::connect();
	$allForDup = $db->query("SELECT id, heading, email, user_dob, entery_status FROM tbl_client_prospect WHERE entery_status IN ('prospect','client')")->getResultArray() ?? [];
	$nameEmailMap = [];
	$nameDobMap   = [];
	foreach ($allForDup as $r) {
		$name  = strtolower(trim($r['heading']));
		$entry = ['id' => (int)$r['id'], 'status' => $r['entery_status']];
		if (!empty(trim($r['email']))) {
			$nameEmailMap[$name . '|' . strtolower(trim($r['email']))][] = $entry;
		}
		if (!empty(trim($r['user_dob'])) && $r['user_dob'] !== '0000-00-00') {
			$nameDobMap[$name . '|' . $r['user_dob']][] = $entry;
		}
	}
	$dupProspectIds = [];
	$dupClientIds   = [];
	foreach (array_merge(array_values($nameEmailMap), array_values($nameDobMap)) as $group) {
		if (count($group) < 2) continue;
		foreach ($group as $item) {
			$id = $item['id'];
			foreach ($group as $other) {
				if ($other['id'] === $id) continue;
				if ($other['status'] === 'prospect') {
					$dupProspectIds[$id][] = $other['id'];
				} else {
					$dupClientIds[$id][] = $other['id'];
				}
			}
		}
	}
	foreach ($dupProspectIds as &$arr) { $arr = array_values(array_unique($arr)); sort($arr); }
	foreach ($dupClientIds   as &$arr) { $arr = array_values(array_unique($arr)); sort($arr); }
	unset($arr);

	// Prospect IDs that have at least one appointment booked (latest one per prospect)
	$bookedIds = [];
	$bookedRows = $db->query("
		SELECT prospect_id, appointment_date, appointment_time, status, assigned_to, service_type, appointment_type, consultation_type, contact_method, office_location
		FROM tbl_app_appointment
		WHERE prospect_id IS NOT NULL AND prospect_id > 0
		ORDER BY appointment_date DESC, appointment_time DESC
	")->getResultArray();
	foreach ($bookedRows as $br) {
		$pid = (int)$br['prospect_id'];
		if (!isset($bookedIds[$pid])) {
			$bookedIds[$pid] = [
				'date'              => $br['appointment_date'],
				'time'              => $br['appointment_time'],
				'status'            => (int)$br['status'],
				'assigned_to'       => $br['assigned_to'] ?? '',
				'service_type'      => $br['service_type'] ?? '',
				'appointment_type'  => $br['appointment_type'] ?? '',
				'consultation_type' => $br['consultation_type'] ?? '',
				'contact_method'    => $br['contact_method'] ?? '',
				'office_location'   => $br['office_location'] ?? '',
			];
		}
	}

	// Team members for Book Appointment modal
	$teamMembers = $db->query("SELECT id, firstname, lastname FROM tbl_reg WHERE status=1 AND type='Employee' ORDER BY firstname ASC")->getResultArray();

	 $entries=$this->request->getPost('entries');
	 $search_id     = $this->request->getPost('search_id');
	 $search_name   = $this->request->getPost('search_name');
	 $search_status = $this->request->getPost('search_status');
	 $search_phone  = $this->request->getPost('search_phone');
	 $Prospect = new Prospect_model();

	 if(!empty($search_id) || !empty($search_name) || !empty($search_status) || !empty($search_phone)){
		$Prospect2 = new Prospect_model();
		$Prospect2->select('id,news_image1,voice_added,from_web,heading,email,mail_send,mail_send_on,sms_send,sms_send_on,number,insert_on,pstatus,ppstatus,agent_name,typee,team_member,number,agent_status,admin_status,address')
			->where('entery_status','prospect')
			->groupStart()->where('hide_prospect', null)->orWhere('hide_prospect !=', 1)->groupEnd();
		if(!empty($search_id))     $Prospect2->where('id',(int)$search_id);
		if(!empty($search_name))   $Prospect2->like('heading',$search_name);
		if(!empty($search_status)) $Prospect2->where('pstatus',$search_status);
		if(!empty($search_phone)) {
			$phone_digits = preg_replace('/\D/', '', $search_phone);
			if (!empty($phone_digits)) {
				$Prospect2->where("REGEXP_REPLACE(`number`, '[^0-9]', '') LIKE '%" . $phone_digits . "%'");
			} else {
				$Prospect2->like('number', $search_phone);
			}
		}
		$data = [
			'prospect'      => $Prospect2->orderBy('id','desc')->paginate(50),
			'pager'         => $Prospect2->pager,
			'search_id'     => $search_id,
			'search_name'   => $search_name,
			'search_status' => $search_status,
			'search_phone'  => $search_phone,
			'dupProspectIds' => $dupProspectIds,
			'dupClientIds'   => $dupClientIds,
			'bookedIds'      => $bookedIds,
			'teamMembers'    => $teamMembers,
		];
		return view('admin/prospect/view_prospect',$data);
	 }

	 if($entries=='all'){

$Prospect = new Prospect_model();
	 	$data = [
			//'prospect' => $paginateData,
	//->where('appo_book', 'Appointment booked')
			'prospect_all'=>$Prospect->select('id,news_image1,voice_added,from_web,heading,email,mail_send,mail_send_on,sms_send,sms_send_on,number,insert_on,pstatus,ppstatus,agent_name,typee,team_member,number,agent_status,admin_status,address')
			->where('entery_status', 'prospect')
			->groupStart()->where('hide_prospect', null)->orWhere('hide_prospect !=', 1)->groupEnd()
      ->orderBy('id', 'desc')
                   ->findAll(),
			'pager'       => $Prospect->pager,
			'dupProspectIds' => $dupProspectIds,
			'dupClientIds'   => $dupClientIds,
			'bookedIds'      => $bookedIds,
			'teamMembers'    => $teamMembers,

		];

	return view('admin/prospect/view_prospect_all',$data);
	 }else{
$Prospect = new Prospect_model();

$data = [
			//'prospect' => $paginateData,
	//->where('appo_book', 'Appointment booked')
			'prospect'=>$Prospect->select('id,news_image1,voice_added,from_web,heading,email,mail_send,mail_send_on,sms_send,sms_send_on,number,insert_on,pstatus,ppstatus,agent_name,typee,team_member,number,agent_status,admin_status,address')
			->where('entery_status', 'prospect')
			->groupStart()->where('hide_prospect', null)->orWhere('hide_prospect !=', 1)->groupEnd()
      ->orderBy('id', 'desc')
                   ->paginate(50),
			'pager'       => $Prospect->pager,
			'dupProspectIds' => $dupProspectIds,
			'dupClientIds'   => $dupClientIds,
			'bookedIds'      => $bookedIds,
			'teamMembers'    => $teamMembers,

		];

	return view('admin/prospect/view_prospect',$data);
	 }
	//exit();
	}

	public function hide_prospect($id)
	{
		if (session()->get('isLoggedIn') != true) return redirect()->to('index');
		$Prospect = new Prospect_model();
		$Prospect->where('id', (int)$id)->set(['hide_prospect' => 1, 'hide_prospect_on' => date('Y-m-d H:i:s')])->update();
		return redirect()->to(base_url('Siaportal/view_prospect'));
	}

	public function send_duplicate_alert($id)
	{
		if (session()->get('isLoggedIn') != true) return redirect()->to('index');

		$db = \Config\Database::connect();

		// Get current record
		$record = $db->query("SELECT * FROM tbl_client_prospect WHERE id = ?", [(int)$id])->getRowArray();
		if (!$record) {
			echo json_encode(['status' => 'error', 'msg' => 'Record not found']);
			return;
		}

		$name  = trim($record['heading']);
		$email = trim($record['email']);

		// Find all records with same name + email
		$allDups = $db->query(
			"SELECT id, entery_status FROM tbl_client_prospect WHERE LOWER(TRIM(heading)) = ? AND TRIM(email) != '' AND LOWER(TRIM(email)) = ? ORDER BY id ASC",
			[strtolower($name), strtolower($email)]
		)->getResultArray();

		if (count($allDups) < 2) {
			echo json_encode(['status' => 'error', 'msg' => 'No duplicates found']);
			return;
		}

		$allIds     = array_column($allDups, 'id');
		$mainId     = $allIds[0];
		$dupIds     = array_slice($allIds, 1);
		$prospects  = [];
		$clients    = [];
		foreach ($allDups as $r) {
			if ($r['entery_status'] === 'prospect') $prospects[] = $r['id'];
			else                                     $clients[]   = $r['id'];
		}

		$existingIn = [];
		if (!empty($prospects)) $existingIn[] = 'Prospect';
		if (!empty($clients))    $existingIn[] = 'Client';
		$existingStr = implode(' / ', $existingIn);

		$subject = '⚠️ Existing Client Found | ' . $name;

		$message  = '<p>Hi Team,</p>';
		$message .= '<p>A Client Onboarding form has been submitted, but this client already exists in the system.</p>';
		$message .= '<p>Please use only the <strong>Main SiaPortal ID</strong> for further processing and ignore duplicate IDs.</p>';
		$message .= '<hr>';
		$message .= '<p><strong>Client Details:</strong><br>';
		$message .= 'Name: ' . htmlspecialchars($name) . '<br>';
		$message .= 'Email: ' . htmlspecialchars($email) . '<br>';
		$message .= 'Contact: ' . htmlspecialchars($record['number']) . '</p>';
		$message .= '<p><strong>Existing Records:</strong> ' . $existingStr . '</p>';
		$message .= '<p><strong>Main ID:</strong> ' . $mainId . '<br>';
		$message .= '<strong>Duplicate IDs:</strong> ' . implode(', ', $dupIds) . '</p>';
		$message .= '<p style="color:red;"><strong>Kindly proceed using the Main ID only and avoid creating or working on duplicate profiles.</strong></p>';

		$emaill = 'noreply@siaimmigration.com';
		$From   = 'SiaPortal Duplicate Alert';

		$email1 = \Config\Services::email();
		$config = get_smtp_settings();
		$email1->initialize($config);
		$to = ['no-reply@siaimmigration.com', 'Mail@siaimmigration.com', 'kr@siaimmigration.com', 'shivkiran814@gmail.com', 'Info@siaimmigration.com', 'Mj@siaimmigration.com', 'consult@siaimmigration.com'];
		$cc = json_decode(EMP_EMAIL, true);
		$email1->setFrom($emaill, $From);
		$email1->setTo($to);
		$email1->setCC($cc);
		$email1->setReplyTo($emaill);
		$email1->setSubject($subject);
		$email1->setMessage($message);
		$sent = $email1->send();

		echo json_encode(['status' => $sent ? 'ok' : 'error', 'msg' => $sent ? 'Email sent!' : $email1->printDebugger()]);
	}



//$paginateData = $Prospect->paginate(50,'group1');
//$page = 3;



	//$data['prospect'] = $Prospect->getentery();



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
    'agent_name'=> '', //$this->request->getPost('agent_name'),
	'team_member'=> '',//$this->request->getPost('team_member'),
	'email'=>$this->request->getPost('email'),
	'heading'=>$this->request->getPost('heading'),
	'typee'=> '',//$this->request->getPost('typee'),
	'cc'=>$this->request->getPost('cc'),
	'num'=>$this->request->getPost('num'),
	'number'=>$ph,

	'address'=>$this->request->getPost('address'),
	'city'=>$this->request->getPost('city'),
	'reff'=> '',//$this->request->getPost('reff'),
	'user_dob'=>$this->request->getPost('dob'),
	'client_status'=> '',//$this->request->getPost('client_status'),
	'spouse_name'=>$this->request->getPost('spouse_name'),

	
	'voice_added'=>'siaportal',
	'news_image1'=>$this->request->getPost('news_image1'),
	//'status'=>$this->request->getPost('status'),
	
	'updated_at'=>date( 'Y-m-d H:i:s' )
];

$Prospect = new Prospect_model(); 
$updatee=$Prospect->update($id, $data);
if($updatee){

return redirect()->to(base_url('Siaportal/view_prospect?edit_success=1'));
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


public function immigration_enquiry_maila($id,$mail_send=NULL,$page=NULL)
  {
    
 

//$data['new_record']=$this->Backoffice_model1->getRecoId('immigration_enquiry',$id);

$Prospect = new Immigration_enquiry_model(); 
	$data['new_record'] = $Prospect->where('id', $id)
                   ->findAll();

$email11=$data['new_record']['0']['email'];
$na=$data['new_record']['0']['heading'];
if(!empty($email11)){

      
   $mail_send=$mail_send+1;
  //exit();
      $data = array(
              
              
              'mail_send'=>$mail_send,
              'mail_send_on' =>date( 'Y-m-d H:i:s')
              
             );
 // $AddData = $this->Backoffice_model1->updateData('immigration_enquiry',$data,$id);
 
 
 	$Prospect = new Immigration_enquiry_model(); 
$updatee=$Prospect->update($id, $data);




    $From1=" Sia immigration solutions";
           $emaill1="noreply@siaimmigration.com";
          
            $subject1  = "imp: About your Immigration Enquiry"; 
          
                      
                      
          $headers1  = "MIME-Version: 1.0\r\n";
          $headers1 .= "Content-type: text/html; charset=iso-8859-1\r\n";           
        //  $headers1.="From: \"".$From1."\"<".$emaill1."> \r\n";  

        $headers1 .= 'From:  ' . $From1. ' <' . $emaill1 .'>' . " \r\n" .
            'Reply-To: '.  $emaill1 . "\r\n" .
            'X-Mailer: PHP/' . phpversion();     



$message1 ='<body>
      <table width="100%" border="0" cellpadding="8" cellspacing="0" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; width:600px; margin:0px auto; border: 1px solid #262626;">
         <tr>
            <td width="50%" style="background: #262626; height: 2px;"></td>
            <td width="50%" style="background: #262626; height: 2px;"></td>
         </tr>
         <tr>
            <td style="padding:10px 0px;"><img src="https://www.siaimmigration.com/assets/images/logo.png" alt=""
               width="120" /></td>
            <td style="padding:10px 0px;">
               <div align="right"><img src="https://www.siaimmigration.com/assets/images/iccrclogo.png" alt="" width="120" />
               </div>
            </td>
         </tr>
		 <tr>
		  <td colspan="2" style="padding-top: 15px;">
			<p>Hi Dear,</p>
		  </td>
		</tr>
		<tr colspan="2">
		  <td>Greetings from Sia immigration</td>
		</tr>
		<tr colspan="2">
		  <td>Hope you are doing well</td>
		</tr>
		<tr colspan="2">
		  <td>I am writing to follow up on our last conversation.</td>
		</tr>
		<tr>
		  <td colspan="2">Let us know if you are still interested and looking for any service related to your immigration process</td>
		</tr>
		<tr>
		  <td colspan="2">We would be more than happy to assist you</td>
		</tr>
		<tr>
		  <td colspan="2">Wish you good luck</td>
		</tr>
		<tr>
		  <td colspan="2" style="padding-bottom: 15px;">Hope to hear from you soon</td>
		</tr>
         <tr>
          <td colspan="2" style="font-size: 18px; font-weight: bold; color: #5A891F; text-align: center;"><u style="padding-top: 10px; display: block;">For Canadian Immigration Inquiries</u></td>
         </tr>
         <tr>
            
            <td style="width: 50%; padding: 0px;">
               <table width="100%" border="0" cellpadding="8" cellspacing="0">
                  <tr>
                     <td width="5%">
                      <a href="https://api.whatsapp.com/send?phone=17782281017" target="_blank" style="color: #fff; text-decoration: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                           width="24px" height="24px" viewBox="0 0 1024 1024">
                           <defs>
                              <path id="a"
                                 d="M1023.941 765.153c0 5.606-.171 17.766-.508 27.159-.824 22.982-2.646 52.639-5.401 66.151-4.141 20.306-10.392 39.472-18.542 55.425-9.643 18.871-21.943 35.775-36.559 50.364-14.584 14.56-31.472 26.812-50.315 36.416-16.036 8.172-35.322 14.426-55.744 18.549-13.378 2.701-42.812 4.488-65.648 5.3-9.402.336-21.564.505-27.15.505l-504.226-.081c-5.607 0-17.765-.172-27.158-.509-22.983-.824-52.639-2.646-66.152-5.4-20.306-4.142-39.473-10.392-55.425-18.542-18.872-9.644-35.775-21.944-50.364-36.56-14.56-14.584-26.812-31.471-36.415-50.314-8.174-16.037-14.428-35.323-18.551-55.744-2.7-13.378-4.487-42.812-5.3-65.649-.334-9.401-.503-21.563-.503-27.148l.08-504.228c0-5.607.171-17.766.508-27.159.825-22.983 2.646-52.639 5.401-66.151 4.141-20.306 10.391-39.473 18.542-55.426C34.154 93.24 46.455 76.336 61.07 61.747c14.584-14.559 31.472-26.812 50.315-36.416 16.037-8.172 35.324-14.426 55.745-18.549 13.377-2.701 42.812-4.488 65.648-5.3 9.402-.335 21.565-.504 27.149-.504l504.227.081c5.608 0 17.766.171 27.159.508 22.983.825 52.638 2.646 66.152 5.401 20.305 4.141 39.472 10.391 55.425 18.542 18.871 9.643 35.774 21.944 50.363 36.559 14.559 14.584 26.812 31.471 36.415 50.315 8.174 16.037 14.428 35.323 18.551 55.744 2.7 13.378 4.486 42.812 5.3 65.649.335 9.402.504 21.564.504 27.15l-.082 504.226z" />
                           </defs>
                           <linearGradient id="b" gradientUnits="userSpaceOnUse" x1="512.001" y1=".978" x2="512.001" y2="1025.023">
                              <stop offset="0" stop-color="#61fd7d" />
                              <stop offset="1" stop-color="#2bb826" />
                           </linearGradient>
                           <use xlink:href="#a" overflow="visible" fill="url(#b)" />
                           <g>
                              <path fill="#FFF"
                                 d="M783.302 243.246c-69.329-69.387-161.529-107.619-259.763-107.658-202.402 0-367.133 164.668-367.214 367.072-.026 64.699 16.883 127.854 49.017 183.522l-52.096 190.229 194.665-51.047c53.636 29.244 114.022 44.656 175.482 44.682h.151c202.382 0 367.128-164.688 367.21-367.094.039-98.087-38.121-190.319-107.452-259.706zM523.544 808.047h-.125c-54.767-.021-108.483-14.729-155.344-42.529l-11.146-6.612-115.517 30.293 30.834-112.592-7.259-11.544c-30.552-48.579-46.688-104.729-46.664-162.379.066-168.229 136.985-305.096 305.339-305.096 81.521.031 158.154 31.811 215.779 89.482s89.342 134.332 89.312 215.859c-.066 168.243-136.984 305.118-305.209 305.118zm167.415-228.515c-9.177-4.591-54.286-26.782-62.697-29.843-8.41-3.062-14.526-4.592-20.645 4.592-6.115 9.182-23.699 29.843-29.053 35.964-5.352 6.122-10.704 6.888-19.879 2.296-9.176-4.591-38.74-14.277-73.786-45.526-27.275-24.319-45.691-54.359-51.043-63.543-5.352-9.183-.569-14.146 4.024-18.72 4.127-4.109 9.175-10.713 13.763-16.069 4.587-5.355 6.117-9.183 9.175-15.304 3.059-6.122 1.529-11.479-.765-16.07-2.293-4.591-20.644-49.739-28.29-68.104-7.447-17.886-15.013-15.466-20.645-15.747-5.346-.266-11.469-.322-17.585-.322s-16.057 2.295-24.467 11.478-32.113 31.374-32.113 76.521c0 45.147 32.877 88.764 37.465 94.885 4.588 6.122 64.699 98.771 156.741 138.502 21.892 9.45 38.982 15.094 52.308 19.322 21.98 6.979 41.982 5.995 57.793 3.634 17.628-2.633 54.284-22.189 61.932-43.615 7.646-21.427 7.646-39.791 5.352-43.617-2.294-3.826-8.41-6.122-17.585-10.714z" />
                           </g>
                        </svg>
                      </a>
                     </td>
                     <td width="95%"><span style="color: #000;">+1 (778) 228-1017</span><br />
                        <a href="https://api.whatsapp.com/send?phone=17782281017" target="_blank"  style="color: #437a01; text-decoration: none;">(Whatsapp Click)</a>
                     </td>
                  </tr>
                  <tr>
                     <td>
                      <a href="mailto:info@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                           id="_x36_" width="24px" height="24px" viewBox="0 0 512 512" xml:space="preserve">
                           <g>
                              <polygon style="fill:#C0874A;"
                                 points="511.401,173.663 502.513,179.269 458.244,207.066 268.606,326.073 266.213,327.652    265.699,327.968 256.043,334.048 255.701,334.207 247.753,329.232 246.299,328.284 66.659,215.516 54.439,207.856 0.598,174.057    0,173.663 54.439,139.469 249.548,16.988 261.854,16.988 458.244,140.258 464.74,144.365  " />
                              <path style="fill:#69B25F;"
                                 d="M467.859,16.065v383.862c0,8.807-7.88,15.985-17.641,15.985H62.29   c-9.671,0-17.551-7.178-17.551-15.985V16.065C44.739,7.176,52.619,0,62.29,0h387.928C459.978,0,467.859,7.176,467.859,16.065z" />
                              <g>
                                 <g>
                                    <rect x="110.787" y="75.101" style="fill:#A2CC86;" width="190.508" height="25.378" />
                                    <rect x="110.787" y="71.093" style="fill:#53A654;" width="190.508" height="25.378" />
                                 </g>
                                 <g>
                                    <rect x="110.787" y="214.682" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                    <rect x="110.787" y="210.675" style="fill:#53A654;" width="289.501" height="25.378" />
                                 </g>
                                 <g>
                                    <rect x="110.787" y="284.473" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                    <rect x="110.787" y="280.466" style="fill:#53A654;" width="289.501" height="25.378" />
                                 </g>
                                 <g>
                                    <rect x="110.787" y="144.891" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                    <rect x="110.787" y="140.884" style="fill:#53A654;" width="289.501" height="25.378" />
                                 </g>
                              </g>
                              <polygon style="fill:#F0BA7D;"
                                 points="256.299,322.118 253.308,323.881 195.45,357.662 188.356,361.847 12.392,464.583    0.598,471.413 0.598,172.824 71.446,214.169 246.642,316.464 248.009,317.272 256.043,321.971  " />
                              <g>
                                 <path style="fill:#E5A864;"
                                    d="M510.236,167.293c0.97-0.567,1.764-0.111,1.764,1.013v294.576c0,1.124-0.019,2.027-0.043,2.006    s-0.139-0.103-0.257-0.184c-0.118-0.081-0.291-0.197-0.385-0.257c-0.094-0.061-0.19-0.11-0.214-0.11    c-0.024,0-0.837-0.464-1.807-1.03L265.498,320.993c-0.97-0.566-2.556-1.497-3.524-2.068l-0.839-0.495    c-0.968-0.571-2.452-1.451-3.298-1.956c-0.846-0.505-0.743-1.379,0.229-1.944l6.209-3.604c0.972-0.564,1.825-1.059,1.895-1.099    c0.071-0.04,0.186-0.107,0.257-0.147c0.071-0.04,0.923-0.535,1.895-1.1l5.44-3.161c0.972-0.564,2.56-1.49,3.531-2.057    L510.236,167.293z" />
                              </g>
                              <circle style="opacity:0.68;fill:#EEF3CA;" cx="377.142" cy="75.101" r="38.186" />
                              <path style="fill:#C0874A;"
                                 d="M512,425.251v45.808h-0.513l-7.35,0.342H27.689l-0.341-7.094   c8.632-5.896,20.082-13.845,27.518-18.887l1.025-0.684l24.956-17.178l38.97-26.92l11.28-7.777l118.365-81.615l7.947-5.556   c1.88-1.195,4.017-2.222,6.324-2.904c2.735-0.941,5.726-1.539,8.717-1.795c1.025-0.086,1.965-0.171,2.991-0.086   c1.025-0.171,2.052-0.171,3.077-0.171c2.735-0.085,5.385,0.171,7.948,0.683c2.734,0.513,5.213,1.369,7.435,2.564l89.735,49.91   l44.354,24.697l11.538,6.41l41.79,23.245l27.518,15.298c0.77,0.428,1.624,0.855,2.479,1.368   C511.487,424.995,511.743,425.166,512,425.251z" />
                              <path style="fill:#ECB168;"
                                 d="M512,441.404v29.997H0.598v-29.997c8.974-5.471,20.768-12.905,28.459-17.52l1.025-0.684   l25.724-15.98l40.252-24.955l11.623-7.264l122.125-75.805l8.204-5.127c4.273-2.564,9.828-3.846,15.298-3.932   c1.025-0.086,1.965-0.086,2.991,0c1.026-0.086,2.051-0.086,3.077,0c2.393,0,4.701,0.257,6.923,0.769   c3.077,0.599,5.896,1.71,8.29,3.163l11.879,7.349l75.377,46.834l43.073,26.75l11.196,7.007l40.68,25.212l26.748,16.665   c0.77,0.428,1.539,0.854,2.393,1.367c5.47,3.505,12.477,7.864,19.058,11.88C507.385,438.669,509.778,440.122,512,441.404z" />
                              <path style="opacity:0.2;fill:#BADB9E;"
                                 d="M467.816,16.066v4.273c0-8.887-7.863-16.066-17.605-16.066H62.301   c-9.656,0-17.604,7.178-17.604,16.066v-4.273C44.696,7.178,52.645,0,62.301,0h387.911C459.953,0,467.816,7.178,467.816,16.066z" />
                           </g>
                        </svg>
                      </a>
                     </td>
                     <td><a href="mailto:info@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">info@siaimmigration.com</a></td>
                  </tr>
               </table>
            </td>
          <td style="width: 50%; padding: 0px;">
            <table width="100%" border="0" cellpadding="8" cellspacing="0">
              <tr>
                <td style="padding: 0px; width: 50%;">
                  <table width="100%" border="0" cellpadding="8" cellspacing="0">
                    <tr>
                       <td width="5%">
                        <a href="https://api.whatsapp.com/send?phone=16047861214" target="_blank" style="color: #000; text-decoration: none;">
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             width="24px" height="24px" viewBox="0 0 1024 1024">
                             <defs>
                                <path id="a"
                                   d="M1023.941 765.153c0 5.606-.171 17.766-.508 27.159-.824 22.982-2.646 52.639-5.401 66.151-4.141 20.306-10.392 39.472-18.542 55.425-9.643 18.871-21.943 35.775-36.559 50.364-14.584 14.56-31.472 26.812-50.315 36.416-16.036 8.172-35.322 14.426-55.744 18.549-13.378 2.701-42.812 4.488-65.648 5.3-9.402.336-21.564.505-27.15.505l-504.226-.081c-5.607 0-17.765-.172-27.158-.509-22.983-.824-52.639-2.646-66.152-5.4-20.306-4.142-39.473-10.392-55.425-18.542-18.872-9.644-35.775-21.944-50.364-36.56-14.56-14.584-26.812-31.471-36.415-50.314-8.174-16.037-14.428-35.323-18.551-55.744-2.7-13.378-4.487-42.812-5.3-65.649-.334-9.401-.503-21.563-.503-27.148l.08-504.228c0-5.607.171-17.766.508-27.159.825-22.983 2.646-52.639 5.401-66.151 4.141-20.306 10.391-39.473 18.542-55.426C34.154 93.24 46.455 76.336 61.07 61.747c14.584-14.559 31.472-26.812 50.315-36.416 16.037-8.172 35.324-14.426 55.745-18.549 13.377-2.701 42.812-4.488 65.648-5.3 9.402-.335 21.565-.504 27.149-.504l504.227.081c5.608 0 17.766.171 27.159.508 22.983.825 52.638 2.646 66.152 5.401 20.305 4.141 39.472 10.391 55.425 18.542 18.871 9.643 35.774 21.944 50.363 36.559 14.559 14.584 26.812 31.471 36.415 50.315 8.174 16.037 14.428 35.323 18.551 55.744 2.7 13.378 4.486 42.812 5.3 65.649.335 9.402.504 21.564.504 27.15l-.082 504.226z" />
                             </defs>
                             <linearGradient id="b" gradientUnits="userSpaceOnUse" x1="512.001" y1=".978" x2="512.001" y2="1025.023">
                                <stop offset="0" stop-color="#61fd7d" />
                                <stop offset="1" stop-color="#2bb826" />
                             </linearGradient>
                             <use xlink:href="#a" overflow="visible" fill="url(#b)" />
                             <g>
                                <path fill="#FFF"
                                   d="M783.302 243.246c-69.329-69.387-161.529-107.619-259.763-107.658-202.402 0-367.133 164.668-367.214 367.072-.026 64.699 16.883 127.854 49.017 183.522l-52.096 190.229 194.665-51.047c53.636 29.244 114.022 44.656 175.482 44.682h.151c202.382 0 367.128-164.688 367.21-367.094.039-98.087-38.121-190.319-107.452-259.706zM523.544 808.047h-.125c-54.767-.021-108.483-14.729-155.344-42.529l-11.146-6.612-115.517 30.293 30.834-112.592-7.259-11.544c-30.552-48.579-46.688-104.729-46.664-162.379.066-168.229 136.985-305.096 305.339-305.096 81.521.031 158.154 31.811 215.779 89.482s89.342 134.332 89.312 215.859c-.066 168.243-136.984 305.118-305.209 305.118zm167.415-228.515c-9.177-4.591-54.286-26.782-62.697-29.843-8.41-3.062-14.526-4.592-20.645 4.592-6.115 9.182-23.699 29.843-29.053 35.964-5.352 6.122-10.704 6.888-19.879 2.296-9.176-4.591-38.74-14.277-73.786-45.526-27.275-24.319-45.691-54.359-51.043-63.543-5.352-9.183-.569-14.146 4.024-18.72 4.127-4.109 9.175-10.713 13.763-16.069 4.587-5.355 6.117-9.183 9.175-15.304 3.059-6.122 1.529-11.479-.765-16.07-2.293-4.591-20.644-49.739-28.29-68.104-7.447-17.886-15.013-15.466-20.645-15.747-5.346-.266-11.469-.322-17.585-.322s-16.057 2.295-24.467 11.478-32.113 31.374-32.113 76.521c0 45.147 32.877 88.764 37.465 94.885 4.588 6.122 64.699 98.771 156.741 138.502 21.892 9.45 38.982 15.094 52.308 19.322 21.98 6.979 41.982 5.995 57.793 3.634 17.628-2.633 54.284-22.189 61.932-43.615 7.646-21.427 7.646-39.791 5.352-43.617-2.294-3.826-8.41-6.122-17.585-10.714z" />
                             </g>
                          </svg>
                        </a>
                       </td>
                       <td width="95%"><span style="color: #000;">+1 (604) 786-1214</span><br />
                        <a href="https://api.whatsapp.com/send?phone=16047861214" target="_blank"  style="color: #437a01; text-decoration: none;">(Whatsapp Click)</a>
                     </td>
                     </tr>
                     </table>
                </td>
                </tr>
                <tr>
                <td style="padding: 0px; width: 50%;">
                  <table width="100%" border="0" cellpadding="8" cellspacing="0">
                    <tr>
                       <td width="5%">
                        <a href="mailto:mkj@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                             id="_x36_" width="24px" height="24px" viewBox="0 0 512 512" xml:space="preserve">
                             <g>
                                <polygon style="fill:#C0874A;"
                                   points="511.401,173.663 502.513,179.269 458.244,207.066 268.606,326.073 266.213,327.652    265.699,327.968 256.043,334.048 255.701,334.207 247.753,329.232 246.299,328.284 66.659,215.516 54.439,207.856 0.598,174.057    0,173.663 54.439,139.469 249.548,16.988 261.854,16.988 458.244,140.258 464.74,144.365  " />
                                <path style="fill:#69B25F;"
                                   d="M467.859,16.065v383.862c0,8.807-7.88,15.985-17.641,15.985H62.29   c-9.671,0-17.551-7.178-17.551-15.985V16.065C44.739,7.176,52.619,0,62.29,0h387.928C459.978,0,467.859,7.176,467.859,16.065z" />
                                <g>
                                   <g>
                                      <rect x="110.787" y="75.101" style="fill:#A2CC86;" width="190.508" height="25.378" />
                                      <rect x="110.787" y="71.093" style="fill:#53A654;" width="190.508" height="25.378" />
                                   </g>
                                   <g>
                                      <rect x="110.787" y="214.682" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                      <rect x="110.787" y="210.675" style="fill:#53A654;" width="289.501" height="25.378" />
                                   </g>
                                   <g>
                                      <rect x="110.787" y="284.473" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                      <rect x="110.787" y="280.466" style="fill:#53A654;" width="289.501" height="25.378" />
                                   </g>
                                   <g>
                                      <rect x="110.787" y="144.891" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                      <rect x="110.787" y="140.884" style="fill:#53A654;" width="289.501" height="25.378" />
                                   </g>
                                </g>
                                <polygon style="fill:#F0BA7D;"
                                   points="256.299,322.118 253.308,323.881 195.45,357.662 188.356,361.847 12.392,464.583    0.598,471.413 0.598,172.824 71.446,214.169 246.642,316.464 248.009,317.272 256.043,321.971  " />
                                <g>
                                   <path style="fill:#E5A864;"
                                      d="M510.236,167.293c0.97-0.567,1.764-0.111,1.764,1.013v294.576c0,1.124-0.019,2.027-0.043,2.006    s-0.139-0.103-0.257-0.184c-0.118-0.081-0.291-0.197-0.385-0.257c-0.094-0.061-0.19-0.11-0.214-0.11    c-0.024,0-0.837-0.464-1.807-1.03L265.498,320.993c-0.97-0.566-2.556-1.497-3.524-2.068l-0.839-0.495    c-0.968-0.571-2.452-1.451-3.298-1.956c-0.846-0.505-0.743-1.379,0.229-1.944l6.209-3.604c0.972-0.564,1.825-1.059,1.895-1.099    c0.071-0.04,0.186-0.107,0.257-0.147c0.071-0.04,0.923-0.535,1.895-1.1l5.44-3.161c0.972-0.564,2.56-1.49,3.531-2.057    L510.236,167.293z" />
                                </g>
                                <circle style="opacity:0.68;fill:#EEF3CA;" cx="377.142" cy="75.101" r="38.186" />
                                <path style="fill:#C0874A;"
                                   d="M512,425.251v45.808h-0.513l-7.35,0.342H27.689l-0.341-7.094   c8.632-5.896,20.082-13.845,27.518-18.887l1.025-0.684l24.956-17.178l38.97-26.92l11.28-7.777l118.365-81.615l7.947-5.556   c1.88-1.195,4.017-2.222,6.324-2.904c2.735-0.941,5.726-1.539,8.717-1.795c1.025-0.086,1.965-0.171,2.991-0.086   c1.025-0.171,2.052-0.171,3.077-0.171c2.735-0.085,5.385,0.171,7.948,0.683c2.734,0.513,5.213,1.369,7.435,2.564l89.735,49.91   l44.354,24.697l11.538,6.41l41.79,23.245l27.518,15.298c0.77,0.428,1.624,0.855,2.479,1.368   C511.487,424.995,511.743,425.166,512,425.251z" />
                                <path style="fill:#ECB168;"
                                   d="M512,441.404v29.997H0.598v-29.997c8.974-5.471,20.768-12.905,28.459-17.52l1.025-0.684   l25.724-15.98l40.252-24.955l11.623-7.264l122.125-75.805l8.204-5.127c4.273-2.564,9.828-3.846,15.298-3.932   c1.025-0.086,1.965-0.086,2.991,0c1.026-0.086,2.051-0.086,3.077,0c2.393,0,4.701,0.257,6.923,0.769   c3.077,0.599,5.896,1.71,8.29,3.163l11.879,7.349l75.377,46.834l43.073,26.75l11.196,7.007l40.68,25.212l26.748,16.665   c0.77,0.428,1.539,0.854,2.393,1.367c5.47,3.505,12.477,7.864,19.058,11.88C507.385,438.669,509.778,440.122,512,441.404z" />
                                <path style="opacity:0.2;fill:#BADB9E;"
                                   d="M467.816,16.066v4.273c0-8.887-7.863-16.066-17.605-16.066H62.301   c-9.656,0-17.604,7.178-17.604,16.066v-4.273C44.696,7.178,52.645,0,62.301,0h387.911C459.953,0,467.816,7.178,467.816,16.066z" />
                             </g>
                          </svg>
                        </a>
                       </td>
                       <td width="95%"><a href="mailto:mkj@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">mkj@siaimmigration.com</a></td>
                    </tr>
                 </table>
                </td>
              </tr>
            </table>
          </td>
         </tr>
         <tr>
            <td colspan="2" style="padding: 0px;"><div style="border-bottom: 5px solid #ffbe12; padding:10px 0px;"></div></td>
         </tr>
         <tr>
            <td colspan="2" style="font-size: 18px; font-weight: bold; color: #5A891F; text-align: center; padding-top: 20px;"><u>Student Admissions (Onshore/Offshore)</u></td>
         </tr>
		 
		  <tr>
          <td style="padding: 0px;">
            <table width="100%" border="0" cellpadding="8" cellspacing="0">
                  <tr>
                     <td width="5%">
                      <a href="https://api.whatsapp.com/send?phone=16049163289" target="_blank" style="color: #000; text-decoration: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                           width="24px" height="24px" viewBox="0 0 1024 1024">
                           <defs>
                              <path id="a2"
                                 d="M1023.941 765.153c0 5.606-.171 17.766-.508 27.159-.824 22.982-2.646 52.639-5.401 66.151-4.141 20.306-10.392 39.472-18.542 55.425-9.643 18.871-21.943 35.775-36.559 50.364-14.584 14.56-31.472 26.812-50.315 36.416-16.036 8.172-35.322 14.426-55.744 18.549-13.378 2.701-42.812 4.488-65.648 5.3-9.402.336-21.564.505-27.15.505l-504.226-.081c-5.607 0-17.765-.172-27.158-.509-22.983-.824-52.639-2.646-66.152-5.4-20.306-4.142-39.473-10.392-55.425-18.542-18.872-9.644-35.775-21.944-50.364-36.56-14.56-14.584-26.812-31.471-36.415-50.314-8.174-16.037-14.428-35.323-18.551-55.744-2.7-13.378-4.487-42.812-5.3-65.649-.334-9.401-.503-21.563-.503-27.148l.08-504.228c0-5.607.171-17.766.508-27.159.825-22.983 2.646-52.639 5.401-66.151 4.141-20.306 10.391-39.473 18.542-55.426C34.154 93.24 46.455 76.336 61.07 61.747c14.584-14.559 31.472-26.812 50.315-36.416 16.037-8.172 35.324-14.426 55.745-18.549 13.377-2.701 42.812-4.488 65.648-5.3 9.402-.335 21.565-.504 27.149-.504l504.227.081c5.608 0 17.766.171 27.159.508 22.983.825 52.638 2.646 66.152 5.401 20.305 4.141 39.472 10.391 55.425 18.542 18.871 9.643 35.774 21.944 50.363 36.559 14.559 14.584 26.812 31.471 36.415 50.315 8.174 16.037 14.428 35.323 18.551 55.744 2.7 13.378 4.486 42.812 5.3 65.649.335 9.402.504 21.564.504 27.15l-.082 504.226z" />
                           </defs>
                           <linearGradient id="b2" gradientUnits="userSpaceOnUse" x1="512.001" y1=".978" x2="512.001"
                              y2="1025.023">
                              <stop offset="0" stop-color="#61fd7d" />
                              <stop offset="1" stop-color="#2bb826" />
                           </linearGradient>
                           <use xlink:href="#a" overflow="visible" fill="url(#b)" />
                           <g>
                              <path fill="#FFF"
                                 d="M783.302 243.246c-69.329-69.387-161.529-107.619-259.763-107.658-202.402 0-367.133 164.668-367.214 367.072-.026 64.699 16.883 127.854 49.017 183.522l-52.096 190.229 194.665-51.047c53.636 29.244 114.022 44.656 175.482 44.682h.151c202.382 0 367.128-164.688 367.21-367.094.039-98.087-38.121-190.319-107.452-259.706zM523.544 808.047h-.125c-54.767-.021-108.483-14.729-155.344-42.529l-11.146-6.612-115.517 30.293 30.834-112.592-7.259-11.544c-30.552-48.579-46.688-104.729-46.664-162.379.066-168.229 136.985-305.096 305.339-305.096 81.521.031 158.154 31.811 215.779 89.482s89.342 134.332 89.312 215.859c-.066 168.243-136.984 305.118-305.209 305.118zm167.415-228.515c-9.177-4.591-54.286-26.782-62.697-29.843-8.41-3.062-14.526-4.592-20.645 4.592-6.115 9.182-23.699 29.843-29.053 35.964-5.352 6.122-10.704 6.888-19.879 2.296-9.176-4.591-38.74-14.277-73.786-45.526-27.275-24.319-45.691-54.359-51.043-63.543-5.352-9.183-.569-14.146 4.024-18.72 4.127-4.109 9.175-10.713 13.763-16.069 4.587-5.355 6.117-9.183 9.175-15.304 3.059-6.122 1.529-11.479-.765-16.07-2.293-4.591-20.644-49.739-28.29-68.104-7.447-17.886-15.013-15.466-20.645-15.747-5.346-.266-11.469-.322-17.585-.322s-16.057 2.295-24.467 11.478-32.113 31.374-32.113 76.521c0 45.147 32.877 88.764 37.465 94.885 4.588 6.122 64.699 98.771 156.741 138.502 21.892 9.45 38.982 15.094 52.308 19.322 21.98 6.979 41.982 5.995 57.793 3.634 17.628-2.633 54.284-22.189 61.932-43.615 7.646-21.427 7.646-39.791 5.352-43.617-2.294-3.826-8.41-6.122-17.585-10.714z" />
                           </g>
                        </svg>
                      </a>
                     </td>
                     <td width="95%"><span style="color: #000;">+1 (604) 916-3289</span><br />
                        <a href="https://api.whatsapp.com/send?phone=16049163289" target="_blank" style="color: #437a01; text-decoration: none;">(Whatsapp Click)</a>
                     <td>
                     </td>
                  </tr>
               </table>
            </td>
            <td style="padding: 0px;">
            <table width="100%" border="0" cellpadding="8" cellspacing="0">
                  <tr>
                     <td width="5%">
                      <a href="https://api.whatsapp.com/send?phone=17782228561" target="_blank" style="color: #000; text-decoration: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                           width="24px" height="24px" viewBox="0 0 1024 1024">
                           <defs>
                              <path id="a2"
                                 d="M1023.941 765.153c0 5.606-.171 17.766-.508 27.159-.824 22.982-2.646 52.639-5.401 66.151-4.141 20.306-10.392 39.472-18.542 55.425-9.643 18.871-21.943 35.775-36.559 50.364-14.584 14.56-31.472 26.812-50.315 36.416-16.036 8.172-35.322 14.426-55.744 18.549-13.378 2.701-42.812 4.488-65.648 5.3-9.402.336-21.564.505-27.15.505l-504.226-.081c-5.607 0-17.765-.172-27.158-.509-22.983-.824-52.639-2.646-66.152-5.4-20.306-4.142-39.473-10.392-55.425-18.542-18.872-9.644-35.775-21.944-50.364-36.56-14.56-14.584-26.812-31.471-36.415-50.314-8.174-16.037-14.428-35.323-18.551-55.744-2.7-13.378-4.487-42.812-5.3-65.649-.334-9.401-.503-21.563-.503-27.148l.08-504.228c0-5.607.171-17.766.508-27.159.825-22.983 2.646-52.639 5.401-66.151 4.141-20.306 10.391-39.473 18.542-55.426C34.154 93.24 46.455 76.336 61.07 61.747c14.584-14.559 31.472-26.812 50.315-36.416 16.037-8.172 35.324-14.426 55.745-18.549 13.377-2.701 42.812-4.488 65.648-5.3 9.402-.335 21.565-.504 27.149-.504l504.227.081c5.608 0 17.766.171 27.159.508 22.983.825 52.638 2.646 66.152 5.401 20.305 4.141 39.472 10.391 55.425 18.542 18.871 9.643 35.774 21.944 50.363 36.559 14.559 14.584 26.812 31.471 36.415 50.315 8.174 16.037 14.428 35.323 18.551 55.744 2.7 13.378 4.486 42.812 5.3 65.649.335 9.402.504 21.564.504 27.15l-.082 504.226z" />
                           </defs>
                           <linearGradient id="b2" gradientUnits="userSpaceOnUse" x1="512.001" y1=".978" x2="512.001"
                              y2="1025.023">
                              <stop offset="0" stop-color="#61fd7d" />
                              <stop offset="1" stop-color="#2bb826" />
                           </linearGradient>
                           <use xlink:href="#a" overflow="visible" fill="url(#b)" />
                           <g>
                              <path fill="#FFF"
                                 d="M783.302 243.246c-69.329-69.387-161.529-107.619-259.763-107.658-202.402 0-367.133 164.668-367.214 367.072-.026 64.699 16.883 127.854 49.017 183.522l-52.096 190.229 194.665-51.047c53.636 29.244 114.022 44.656 175.482 44.682h.151c202.382 0 367.128-164.688 367.21-367.094.039-98.087-38.121-190.319-107.452-259.706zM523.544 808.047h-.125c-54.767-.021-108.483-14.729-155.344-42.529l-11.146-6.612-115.517 30.293 30.834-112.592-7.259-11.544c-30.552-48.579-46.688-104.729-46.664-162.379.066-168.229 136.985-305.096 305.339-305.096 81.521.031 158.154 31.811 215.779 89.482s89.342 134.332 89.312 215.859c-.066 168.243-136.984 305.118-305.209 305.118zm167.415-228.515c-9.177-4.591-54.286-26.782-62.697-29.843-8.41-3.062-14.526-4.592-20.645 4.592-6.115 9.182-23.699 29.843-29.053 35.964-5.352 6.122-10.704 6.888-19.879 2.296-9.176-4.591-38.74-14.277-73.786-45.526-27.275-24.319-45.691-54.359-51.043-63.543-5.352-9.183-.569-14.146 4.024-18.72 4.127-4.109 9.175-10.713 13.763-16.069 4.587-5.355 6.117-9.183 9.175-15.304 3.059-6.122 1.529-11.479-.765-16.07-2.293-4.591-20.644-49.739-28.29-68.104-7.447-17.886-15.013-15.466-20.645-15.747-5.346-.266-11.469-.322-17.585-.322s-16.057 2.295-24.467 11.478-32.113 31.374-32.113 76.521c0 45.147 32.877 88.764 37.465 94.885 4.588 6.122 64.699 98.771 156.741 138.502 21.892 9.45 38.982 15.094 52.308 19.322 21.98 6.979 41.982 5.995 57.793 3.634 17.628-2.633 54.284-22.189 61.932-43.615 7.646-21.427 7.646-39.791 5.352-43.617-2.294-3.826-8.41-6.122-17.585-10.714z" />
                           </g>
                        </svg>
                      </a>
                     </td>
                     <td width="95%"><span style="color: #000;">+1 (778) 222-8561</span><br />
                        <a href="https://api.whatsapp.com/send?phone=17782228561" target="_blank" style="color: #437a01; text-decoration: none;">(Whatsapp Click)</a>
                     <td>
                     </td>
                  </tr>
               </table>
            </td>
            
         </tr>
         <tr>
          	<td style="padding: 0px;">
               <table width="100%" border="0" cellpadding="8" cellspacing="0">
                     <tr>
                        <td>
                         <a href="mailto:info@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                              id="_x36_2" width="24px" height="24px" viewBox="0 0 512 512" xml:space="preserve">
                              <g>
                                 <polygon style="fill:#C0874A;"
                                    points="511.401,173.663 502.513,179.269 458.244,207.066 268.606,326.073 266.213,327.652    265.699,327.968 256.043,334.048 255.701,334.207 247.753,329.232 246.299,328.284 66.659,215.516 54.439,207.856 0.598,174.057    0,173.663 54.439,139.469 249.548,16.988 261.854,16.988 458.244,140.258 464.74,144.365  " />
                                 <path style="fill:#69B25F;"
                                    d="M467.859,16.065v383.862c0,8.807-7.88,15.985-17.641,15.985H62.29   c-9.671,0-17.551-7.178-17.551-15.985V16.065C44.739,7.176,52.619,0,62.29,0h387.928C459.978,0,467.859,7.176,467.859,16.065z" />
                                 <g>
                                    <g>
                                       <rect x="110.787" y="75.101" style="fill:#A2CC86;" width="190.508" height="25.378" />
                                       <rect x="110.787" y="71.093" style="fill:#53A654;" width="190.508" height="25.378" />
                                    </g>
                                    <g>
                                       <rect x="110.787" y="214.682" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                       <rect x="110.787" y="210.675" style="fill:#53A654;" width="289.501" height="25.378" />
                                    </g>
                                    <g>
                                       <rect x="110.787" y="284.473" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                       <rect x="110.787" y="280.466" style="fill:#53A654;" width="289.501" height="25.378" />
                                    </g>
                                    <g>
                                       <rect x="110.787" y="144.891" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                       <rect x="110.787" y="140.884" style="fill:#53A654;" width="289.501" height="25.378" />
                                    </g>
                                 </g>
                                 <polygon style="fill:#F0BA7D;"
                                    points="256.299,322.118 253.308,323.881 195.45,357.662 188.356,361.847 12.392,464.583    0.598,471.413 0.598,172.824 71.446,214.169 246.642,316.464 248.009,317.272 256.043,321.971  " />
                                 <g>
                                    <path style="fill:#E5A864;"
                                       d="M510.236,167.293c0.97-0.567,1.764-0.111,1.764,1.013v294.576c0,1.124-0.019,2.027-0.043,2.006    s-0.139-0.103-0.257-0.184c-0.118-0.081-0.291-0.197-0.385-0.257c-0.094-0.061-0.19-0.11-0.214-0.11    c-0.024,0-0.837-0.464-1.807-1.03L265.498,320.993c-0.97-0.566-2.556-1.497-3.524-2.068l-0.839-0.495    c-0.968-0.571-2.452-1.451-3.298-1.956c-0.846-0.505-0.743-1.379,0.229-1.944l6.209-3.604c0.972-0.564,1.825-1.059,1.895-1.099    c0.071-0.04,0.186-0.107,0.257-0.147c0.071-0.04,0.923-0.535,1.895-1.1l5.44-3.161c0.972-0.564,2.56-1.49,3.531-2.057    L510.236,167.293z" />
                                 </g>
                                 <circle style="opacity:0.68;fill:#EEF3CA;" cx="377.142" cy="75.101" r="38.186" />
                                 <path style="fill:#C0874A;"
                                    d="M512,425.251v45.808h-0.513l-7.35,0.342H27.689l-0.341-7.094   c8.632-5.896,20.082-13.845,27.518-18.887l1.025-0.684l24.956-17.178l38.97-26.92l11.28-7.777l118.365-81.615l7.947-5.556   c1.88-1.195,4.017-2.222,6.324-2.904c2.735-0.941,5.726-1.539,8.717-1.795c1.025-0.086,1.965-0.171,2.991-0.086   c1.025-0.171,2.052-0.171,3.077-0.171c2.735-0.085,5.385,0.171,7.948,0.683c2.734,0.513,5.213,1.369,7.435,2.564l89.735,49.91   l44.354,24.697l11.538,6.41l41.79,23.245l27.518,15.298c0.77,0.428,1.624,0.855,2.479,1.368   C511.487,424.995,511.743,425.166,512,425.251z" />
                                 <path style="fill:#ECB168;"
                                    d="M512,441.404v29.997H0.598v-29.997c8.974-5.471,20.768-12.905,28.459-17.52l1.025-0.684   l25.724-15.98l40.252-24.955l11.623-7.264l122.125-75.805l8.204-5.127c4.273-2.564,9.828-3.846,15.298-3.932   c1.025-0.086,1.965-0.086,2.991,0c1.026-0.086,2.051-0.086,3.077,0c2.393,0,4.701,0.257,6.923,0.769   c3.077,0.599,5.896,1.71,8.29,3.163l11.879,7.349l75.377,46.834l43.073,26.75l11.196,7.007l40.68,25.212l26.748,16.665   c0.77,0.428,1.539,0.854,2.393,1.367c5.47,3.505,12.477,7.864,19.058,11.88C507.385,438.669,509.778,440.122,512,441.404z" />
                                 <path style="opacity:0.2;fill:#BADB9E;"
                                    d="M467.816,16.066v4.273c0-8.887-7.863-16.066-17.605-16.066H62.301   c-9.656,0-17.604,7.178-17.604,16.066v-4.273C44.696,7.178,52.645,0,62.301,0h387.911C459.953,0,467.816,7.178,467.816,16.066z" />
                              </g>
                           </svg>
                         </a>
                        </td>
                        <td><a href="mailto:info@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">info@siaimmigration.com</a></td>
                     </tr>
                  </table>
               </td>
            <td style="padding: 0px;">
               <table width="100%" border="0" cellpadding="8" cellspacing="0">
                     <tr>
                        <td>
                         <a href="mailto:info@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                              id="_x36_2" width="24px" height="24px" viewBox="0 0 512 512" xml:space="preserve">
                              <g>
                                 <polygon style="fill:#C0874A;"
                                    points="511.401,173.663 502.513,179.269 458.244,207.066 268.606,326.073 266.213,327.652    265.699,327.968 256.043,334.048 255.701,334.207 247.753,329.232 246.299,328.284 66.659,215.516 54.439,207.856 0.598,174.057    0,173.663 54.439,139.469 249.548,16.988 261.854,16.988 458.244,140.258 464.74,144.365  " />
                                 <path style="fill:#69B25F;"
                                    d="M467.859,16.065v383.862c0,8.807-7.88,15.985-17.641,15.985H62.29   c-9.671,0-17.551-7.178-17.551-15.985V16.065C44.739,7.176,52.619,0,62.29,0h387.928C459.978,0,467.859,7.176,467.859,16.065z" />
                                 <g>
                                    <g>
                                       <rect x="110.787" y="75.101" style="fill:#A2CC86;" width="190.508" height="25.378" />
                                       <rect x="110.787" y="71.093" style="fill:#53A654;" width="190.508" height="25.378" />
                                    </g>
                                    <g>
                                       <rect x="110.787" y="214.682" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                       <rect x="110.787" y="210.675" style="fill:#53A654;" width="289.501" height="25.378" />
                                    </g>
                                    <g>
                                       <rect x="110.787" y="284.473" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                       <rect x="110.787" y="280.466" style="fill:#53A654;" width="289.501" height="25.378" />
                                    </g>
                                    <g>
                                       <rect x="110.787" y="144.891" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                       <rect x="110.787" y="140.884" style="fill:#53A654;" width="289.501" height="25.378" />
                                    </g>
                                 </g>
                                 <polygon style="fill:#F0BA7D;"
                                    points="256.299,322.118 253.308,323.881 195.45,357.662 188.356,361.847 12.392,464.583    0.598,471.413 0.598,172.824 71.446,214.169 246.642,316.464 248.009,317.272 256.043,321.971  " />
                                 <g>
                                    <path style="fill:#E5A864;"
                                       d="M510.236,167.293c0.97-0.567,1.764-0.111,1.764,1.013v294.576c0,1.124-0.019,2.027-0.043,2.006    s-0.139-0.103-0.257-0.184c-0.118-0.081-0.291-0.197-0.385-0.257c-0.094-0.061-0.19-0.11-0.214-0.11    c-0.024,0-0.837-0.464-1.807-1.03L265.498,320.993c-0.97-0.566-2.556-1.497-3.524-2.068l-0.839-0.495    c-0.968-0.571-2.452-1.451-3.298-1.956c-0.846-0.505-0.743-1.379,0.229-1.944l6.209-3.604c0.972-0.564,1.825-1.059,1.895-1.099    c0.071-0.04,0.186-0.107,0.257-0.147c0.071-0.04,0.923-0.535,1.895-1.1l5.44-3.161c0.972-0.564,2.56-1.49,3.531-2.057    L510.236,167.293z" />
                                 </g>
                                 <circle style="opacity:0.68;fill:#EEF3CA;" cx="377.142" cy="75.101" r="38.186" />
                                 <path style="fill:#C0874A;"
                                    d="M512,425.251v45.808h-0.513l-7.35,0.342H27.689l-0.341-7.094   c8.632-5.896,20.082-13.845,27.518-18.887l1.025-0.684l24.956-17.178l38.97-26.92l11.28-7.777l118.365-81.615l7.947-5.556   c1.88-1.195,4.017-2.222,6.324-2.904c2.735-0.941,5.726-1.539,8.717-1.795c1.025-0.086,1.965-0.171,2.991-0.086   c1.025-0.171,2.052-0.171,3.077-0.171c2.735-0.085,5.385,0.171,7.948,0.683c2.734,0.513,5.213,1.369,7.435,2.564l89.735,49.91   l44.354,24.697l11.538,6.41l41.79,23.245l27.518,15.298c0.77,0.428,1.624,0.855,2.479,1.368   C511.487,424.995,511.743,425.166,512,425.251z" />
                                 <path style="fill:#ECB168;"
                                    d="M512,441.404v29.997H0.598v-29.997c8.974-5.471,20.768-12.905,28.459-17.52l1.025-0.684   l25.724-15.98l40.252-24.955l11.623-7.264l122.125-75.805l8.204-5.127c4.273-2.564,9.828-3.846,15.298-3.932   c1.025-0.086,1.965-0.086,2.991,0c1.026-0.086,2.051-0.086,3.077,0c2.393,0,4.701,0.257,6.923,0.769   c3.077,0.599,5.896,1.71,8.29,3.163l11.879,7.349l75.377,46.834l43.073,26.75l11.196,7.007l40.68,25.212l26.748,16.665   c0.77,0.428,1.539,0.854,2.393,1.367c5.47,3.505,12.477,7.864,19.058,11.88C507.385,438.669,509.778,440.122,512,441.404z" />
                                 <path style="opacity:0.2;fill:#BADB9E;"
                                    d="M467.816,16.066v4.273c0-8.887-7.863-16.066-17.605-16.066H62.301   c-9.656,0-17.604,7.178-17.604,16.066v-4.273C44.696,7.178,52.645,0,62.301,0h387.911C459.953,0,467.816,7.178,467.816,16.066z" />
                              </g>
                           </svg>
                         </a>
                        </td>
                        <td><a href="mailto:help@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">help@siaimmigration.com</a></td>
                     </tr>
                  </table>
               </td>
         </tr>
		 
         
         <tr>
            <td colspan="2"></td>
         </tr>
         <tr>
            <td colspan="2" style="background: #79B52F; color: #fff; font-weight: bold; text-align: center; padding: 10px 0px;">We look forward to assisting you!</td>
         </tr>
         <tr>
            <td colspan="2" style="background: #262626; text-align: center;">
              <table width="100%" border="0" cellpadding="8" cellspacing="0" align="center">
                <tr>
                  <td style="text-align: center;"><img src="https://www.siaimmigration.com/assets/images/accredited/3bestlogsmall.png" width="150" alt="" /></td>
               </tr>
               <tr>
                <td style="color: #fff; align-items: center;"><span style="color: #79B52F;">Siaimmigration</span> | All rights reserved.</td>
             </tr>
             </table>
            </td>
         </tr>
      </table>
   </body>';	

   
          



$email1 = \Config\Services::email();
$config = get_smtp_settings();
$email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message1);
$to = array('no-reply@siaimmigration.com');
//$cc = [$email11,'no-reply@siaimmigration.com','ds@addminwebworld.com'];

//$cc = json_decode(EMP_EMAIL, true);
$cc = [$email11];

// //$email1->set_newline("\r\n");
// $email1->from($emaill1, $From1);
// $email1->to($to);
// $email1->cc($cc);
// $email1->reply_to($emaill1);

// $email1->subject($subject1);
// $email1->message($message1);

// $email1->send();


//$email1->setFrom($emaill1, $From1);
$email1->setFrom('no-reply@siaimmigration.com', $From1);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill1);
    $email1->setSubject($subject1);
    $email1->setMessage($message1);
    $email1->send();


          



      
      
 // $data['new_record']=$this->Backoffice_model1->getRecoId('immigration_enquiry',$id);



  if($page==''){
        
       
        $url = '/Siaportal/view_canada_inquiries';
         echo'
          <script>
          alert("Email send Successfully");
          window.location.href = "'.base_url().$url.'";
          </script>
          ';
      }else{
          
          
        $url = '/Siaportal/view_overseas';
         echo'
          <script>
          alert("Email send Successfully");
          window.location.href = "'.base_url().$url.'";
          </script>
          ';

      }
  
  
  }else{

$url = 'backoffice1/edit_immigration_enquiry/'.$id;
          echo'
          <script>
          alert("please add email");
          window.location.href = "'.base_url().$url.'";
          </script>
          ';

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

		$From1=" Sia immigration solutions";
					$ee = session()->get('email');
				 $emaill=$ee;
		
					
					$subject1  = "imp: About your Immigration Enquiry";	
					$headers1  = "MIME-Version: 1.0\r\n";
 					$headers1 .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 		
					
$message1 ='<body>
      <table width="100%" border="0" cellpadding="8" cellspacing="0" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; width:600px; margin:0px auto; border: 1px solid #262626;">
         <tr>
            <td width="50%" style="background: #262626; height: 2px;"></td>
            <td width="50%" style="background: #262626; height: 2px;"></td>
         </tr>
         <tr>
            <td style="padding:10px 0px;"><img src="https://www.siaimmigration.com/assets/images/logo.png" alt=""
               width="120" /></td>
            <td style="padding:10px 0px;">
               <div align="right"><img src="https://www.siaimmigration.com/assets/images/iccrclogo.png" alt="" width="120" />
               </div>
            </td>
         </tr>
		 <tr>
		  <td colspan="2" style="padding-top: 15px;">
			<p>Hi Dear</p>
		  </td>
		</tr>
		<tr colspan="2">
		  <td>Greetings from Sia immigration</td>
		</tr>
		<tr colspan="2">
		  <td>Hope you are doing well</td>
		</tr>
		<tr colspan="2">
		  <td>I am writing to follow up on our last conversation.</td>
		</tr>
		<tr>
		  <td colspan="2">Let us know if you are still interested and looking for any service related to your immigration process</td>
		</tr>
		<tr>
		  <td colspan="2">We would be more than happy to assist you</td>
		</tr>
		<tr>
		  <td colspan="2">Wish you good luck</td>
		</tr>
		<tr>
		  <td colspan="2" style="padding-bottom: 15px;">Hope to hear from you soon</td>
		</tr>
         <tr>
          <td colspan="2" style="font-size: 18px; font-weight: bold; color: #5A891F; text-align: center;"><u style="padding-top: 10px; display: block;">For Canadian Immigration Inquiries</u></td>
         </tr>
         <tr>
            
            <td style="width: 50%; padding: 0px;">
               <table width="100%" border="0" cellpadding="8" cellspacing="0">
                  <tr>
                     <td width="5%">
                      <a href="https://api.whatsapp.com/send?phone=17782281017" target="_blank" style="color: #fff; text-decoration: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                           width="24px" height="24px" viewBox="0 0 1024 1024">
                           <defs>
                              <path id="a"
                                 d="M1023.941 765.153c0 5.606-.171 17.766-.508 27.159-.824 22.982-2.646 52.639-5.401 66.151-4.141 20.306-10.392 39.472-18.542 55.425-9.643 18.871-21.943 35.775-36.559 50.364-14.584 14.56-31.472 26.812-50.315 36.416-16.036 8.172-35.322 14.426-55.744 18.549-13.378 2.701-42.812 4.488-65.648 5.3-9.402.336-21.564.505-27.15.505l-504.226-.081c-5.607 0-17.765-.172-27.158-.509-22.983-.824-52.639-2.646-66.152-5.4-20.306-4.142-39.473-10.392-55.425-18.542-18.872-9.644-35.775-21.944-50.364-36.56-14.56-14.584-26.812-31.471-36.415-50.314-8.174-16.037-14.428-35.323-18.551-55.744-2.7-13.378-4.487-42.812-5.3-65.649-.334-9.401-.503-21.563-.503-27.148l.08-504.228c0-5.607.171-17.766.508-27.159.825-22.983 2.646-52.639 5.401-66.151 4.141-20.306 10.391-39.473 18.542-55.426C34.154 93.24 46.455 76.336 61.07 61.747c14.584-14.559 31.472-26.812 50.315-36.416 16.037-8.172 35.324-14.426 55.745-18.549 13.377-2.701 42.812-4.488 65.648-5.3 9.402-.335 21.565-.504 27.149-.504l504.227.081c5.608 0 17.766.171 27.159.508 22.983.825 52.638 2.646 66.152 5.401 20.305 4.141 39.472 10.391 55.425 18.542 18.871 9.643 35.774 21.944 50.363 36.559 14.559 14.584 26.812 31.471 36.415 50.315 8.174 16.037 14.428 35.323 18.551 55.744 2.7 13.378 4.486 42.812 5.3 65.649.335 9.402.504 21.564.504 27.15l-.082 504.226z" />
                           </defs>
                           <linearGradient id="b" gradientUnits="userSpaceOnUse" x1="512.001" y1=".978" x2="512.001" y2="1025.023">
                              <stop offset="0" stop-color="#61fd7d" />
                              <stop offset="1" stop-color="#2bb826" />
                           </linearGradient>
                           <use xlink:href="#a" overflow="visible" fill="url(#b)" />
                           <g>
                              <path fill="#FFF"
                                 d="M783.302 243.246c-69.329-69.387-161.529-107.619-259.763-107.658-202.402 0-367.133 164.668-367.214 367.072-.026 64.699 16.883 127.854 49.017 183.522l-52.096 190.229 194.665-51.047c53.636 29.244 114.022 44.656 175.482 44.682h.151c202.382 0 367.128-164.688 367.21-367.094.039-98.087-38.121-190.319-107.452-259.706zM523.544 808.047h-.125c-54.767-.021-108.483-14.729-155.344-42.529l-11.146-6.612-115.517 30.293 30.834-112.592-7.259-11.544c-30.552-48.579-46.688-104.729-46.664-162.379.066-168.229 136.985-305.096 305.339-305.096 81.521.031 158.154 31.811 215.779 89.482s89.342 134.332 89.312 215.859c-.066 168.243-136.984 305.118-305.209 305.118zm167.415-228.515c-9.177-4.591-54.286-26.782-62.697-29.843-8.41-3.062-14.526-4.592-20.645 4.592-6.115 9.182-23.699 29.843-29.053 35.964-5.352 6.122-10.704 6.888-19.879 2.296-9.176-4.591-38.74-14.277-73.786-45.526-27.275-24.319-45.691-54.359-51.043-63.543-5.352-9.183-.569-14.146 4.024-18.72 4.127-4.109 9.175-10.713 13.763-16.069 4.587-5.355 6.117-9.183 9.175-15.304 3.059-6.122 1.529-11.479-.765-16.07-2.293-4.591-20.644-49.739-28.29-68.104-7.447-17.886-15.013-15.466-20.645-15.747-5.346-.266-11.469-.322-17.585-.322s-16.057 2.295-24.467 11.478-32.113 31.374-32.113 76.521c0 45.147 32.877 88.764 37.465 94.885 4.588 6.122 64.699 98.771 156.741 138.502 21.892 9.45 38.982 15.094 52.308 19.322 21.98 6.979 41.982 5.995 57.793 3.634 17.628-2.633 54.284-22.189 61.932-43.615 7.646-21.427 7.646-39.791 5.352-43.617-2.294-3.826-8.41-6.122-17.585-10.714z" />
                           </g>
                        </svg>
                      </a>
                     </td>
                     <td width="95%"><span style="color: #000;">+1 (778) 228-1017</span><br />
                        <a href="https://api.whatsapp.com/send?phone=17782281017" target="_blank"  style="color: #437a01; text-decoration: none;">(Whatsapp Click)</a>
                     </td>
                  </tr>
                  <tr>
                     <td>
                      <a href="mailto:info@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                           id="_x36_" width="24px" height="24px" viewBox="0 0 512 512" xml:space="preserve">
                           <g>
                              <polygon style="fill:#C0874A;"
                                 points="511.401,173.663 502.513,179.269 458.244,207.066 268.606,326.073 266.213,327.652    265.699,327.968 256.043,334.048 255.701,334.207 247.753,329.232 246.299,328.284 66.659,215.516 54.439,207.856 0.598,174.057    0,173.663 54.439,139.469 249.548,16.988 261.854,16.988 458.244,140.258 464.74,144.365  " />
                              <path style="fill:#69B25F;"
                                 d="M467.859,16.065v383.862c0,8.807-7.88,15.985-17.641,15.985H62.29   c-9.671,0-17.551-7.178-17.551-15.985V16.065C44.739,7.176,52.619,0,62.29,0h387.928C459.978,0,467.859,7.176,467.859,16.065z" />
                              <g>
                                 <g>
                                    <rect x="110.787" y="75.101" style="fill:#A2CC86;" width="190.508" height="25.378" />
                                    <rect x="110.787" y="71.093" style="fill:#53A654;" width="190.508" height="25.378" />
                                 </g>
                                 <g>
                                    <rect x="110.787" y="214.682" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                    <rect x="110.787" y="210.675" style="fill:#53A654;" width="289.501" height="25.378" />
                                 </g>
                                 <g>
                                    <rect x="110.787" y="284.473" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                    <rect x="110.787" y="280.466" style="fill:#53A654;" width="289.501" height="25.378" />
                                 </g>
                                 <g>
                                    <rect x="110.787" y="144.891" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                    <rect x="110.787" y="140.884" style="fill:#53A654;" width="289.501" height="25.378" />
                                 </g>
                              </g>
                              <polygon style="fill:#F0BA7D;"
                                 points="256.299,322.118 253.308,323.881 195.45,357.662 188.356,361.847 12.392,464.583    0.598,471.413 0.598,172.824 71.446,214.169 246.642,316.464 248.009,317.272 256.043,321.971  " />
                              <g>
                                 <path style="fill:#E5A864;"
                                    d="M510.236,167.293c0.97-0.567,1.764-0.111,1.764,1.013v294.576c0,1.124-0.019,2.027-0.043,2.006    s-0.139-0.103-0.257-0.184c-0.118-0.081-0.291-0.197-0.385-0.257c-0.094-0.061-0.19-0.11-0.214-0.11    c-0.024,0-0.837-0.464-1.807-1.03L265.498,320.993c-0.97-0.566-2.556-1.497-3.524-2.068l-0.839-0.495    c-0.968-0.571-2.452-1.451-3.298-1.956c-0.846-0.505-0.743-1.379,0.229-1.944l6.209-3.604c0.972-0.564,1.825-1.059,1.895-1.099    c0.071-0.04,0.186-0.107,0.257-0.147c0.071-0.04,0.923-0.535,1.895-1.1l5.44-3.161c0.972-0.564,2.56-1.49,3.531-2.057    L510.236,167.293z" />
                              </g>
                              <circle style="opacity:0.68;fill:#EEF3CA;" cx="377.142" cy="75.101" r="38.186" />
                              <path style="fill:#C0874A;"
                                 d="M512,425.251v45.808h-0.513l-7.35,0.342H27.689l-0.341-7.094   c8.632-5.896,20.082-13.845,27.518-18.887l1.025-0.684l24.956-17.178l38.97-26.92l11.28-7.777l118.365-81.615l7.947-5.556   c1.88-1.195,4.017-2.222,6.324-2.904c2.735-0.941,5.726-1.539,8.717-1.795c1.025-0.086,1.965-0.171,2.991-0.086   c1.025-0.171,2.052-0.171,3.077-0.171c2.735-0.085,5.385,0.171,7.948,0.683c2.734,0.513,5.213,1.369,7.435,2.564l89.735,49.91   l44.354,24.697l11.538,6.41l41.79,23.245l27.518,15.298c0.77,0.428,1.624,0.855,2.479,1.368   C511.487,424.995,511.743,425.166,512,425.251z" />
                              <path style="fill:#ECB168;"
                                 d="M512,441.404v29.997H0.598v-29.997c8.974-5.471,20.768-12.905,28.459-17.52l1.025-0.684   l25.724-15.98l40.252-24.955l11.623-7.264l122.125-75.805l8.204-5.127c4.273-2.564,9.828-3.846,15.298-3.932   c1.025-0.086,1.965-0.086,2.991,0c1.026-0.086,2.051-0.086,3.077,0c2.393,0,4.701,0.257,6.923,0.769   c3.077,0.599,5.896,1.71,8.29,3.163l11.879,7.349l75.377,46.834l43.073,26.75l11.196,7.007l40.68,25.212l26.748,16.665   c0.77,0.428,1.539,0.854,2.393,1.367c5.47,3.505,12.477,7.864,19.058,11.88C507.385,438.669,509.778,440.122,512,441.404z" />
                              <path style="opacity:0.2;fill:#BADB9E;"
                                 d="M467.816,16.066v4.273c0-8.887-7.863-16.066-17.605-16.066H62.301   c-9.656,0-17.604,7.178-17.604,16.066v-4.273C44.696,7.178,52.645,0,62.301,0h387.911C459.953,0,467.816,7.178,467.816,16.066z" />
                           </g>
                        </svg>
                      </a>
                     </td>
                     <td><a href="mailto:info@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">info@siaimmigration.com</a></td>
                  </tr>
               </table>
            </td>
          <td style="width: 50%; padding: 0px;">
            <table width="100%" border="0" cellpadding="8" cellspacing="0">
              <tr>
                <td style="padding: 0px; width: 50%;">
                  <table width="100%" border="0" cellpadding="8" cellspacing="0">
                    <tr>
                       <td width="5%">
                        <a href="https://api.whatsapp.com/send?phone=16047861214" target="_blank" style="color: #000; text-decoration: none;">
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             width="24px" height="24px" viewBox="0 0 1024 1024">
                             <defs>
                                <path id="a"
                                   d="M1023.941 765.153c0 5.606-.171 17.766-.508 27.159-.824 22.982-2.646 52.639-5.401 66.151-4.141 20.306-10.392 39.472-18.542 55.425-9.643 18.871-21.943 35.775-36.559 50.364-14.584 14.56-31.472 26.812-50.315 36.416-16.036 8.172-35.322 14.426-55.744 18.549-13.378 2.701-42.812 4.488-65.648 5.3-9.402.336-21.564.505-27.15.505l-504.226-.081c-5.607 0-17.765-.172-27.158-.509-22.983-.824-52.639-2.646-66.152-5.4-20.306-4.142-39.473-10.392-55.425-18.542-18.872-9.644-35.775-21.944-50.364-36.56-14.56-14.584-26.812-31.471-36.415-50.314-8.174-16.037-14.428-35.323-18.551-55.744-2.7-13.378-4.487-42.812-5.3-65.649-.334-9.401-.503-21.563-.503-27.148l.08-504.228c0-5.607.171-17.766.508-27.159.825-22.983 2.646-52.639 5.401-66.151 4.141-20.306 10.391-39.473 18.542-55.426C34.154 93.24 46.455 76.336 61.07 61.747c14.584-14.559 31.472-26.812 50.315-36.416 16.037-8.172 35.324-14.426 55.745-18.549 13.377-2.701 42.812-4.488 65.648-5.3 9.402-.335 21.565-.504 27.149-.504l504.227.081c5.608 0 17.766.171 27.159.508 22.983.825 52.638 2.646 66.152 5.401 20.305 4.141 39.472 10.391 55.425 18.542 18.871 9.643 35.774 21.944 50.363 36.559 14.559 14.584 26.812 31.471 36.415 50.315 8.174 16.037 14.428 35.323 18.551 55.744 2.7 13.378 4.486 42.812 5.3 65.649.335 9.402.504 21.564.504 27.15l-.082 504.226z" />
                             </defs>
                             <linearGradient id="b" gradientUnits="userSpaceOnUse" x1="512.001" y1=".978" x2="512.001" y2="1025.023">
                                <stop offset="0" stop-color="#61fd7d" />
                                <stop offset="1" stop-color="#2bb826" />
                             </linearGradient>
                             <use xlink:href="#a" overflow="visible" fill="url(#b)" />
                             <g>
                                <path fill="#FFF"
                                   d="M783.302 243.246c-69.329-69.387-161.529-107.619-259.763-107.658-202.402 0-367.133 164.668-367.214 367.072-.026 64.699 16.883 127.854 49.017 183.522l-52.096 190.229 194.665-51.047c53.636 29.244 114.022 44.656 175.482 44.682h.151c202.382 0 367.128-164.688 367.21-367.094.039-98.087-38.121-190.319-107.452-259.706zM523.544 808.047h-.125c-54.767-.021-108.483-14.729-155.344-42.529l-11.146-6.612-115.517 30.293 30.834-112.592-7.259-11.544c-30.552-48.579-46.688-104.729-46.664-162.379.066-168.229 136.985-305.096 305.339-305.096 81.521.031 158.154 31.811 215.779 89.482s89.342 134.332 89.312 215.859c-.066 168.243-136.984 305.118-305.209 305.118zm167.415-228.515c-9.177-4.591-54.286-26.782-62.697-29.843-8.41-3.062-14.526-4.592-20.645 4.592-6.115 9.182-23.699 29.843-29.053 35.964-5.352 6.122-10.704 6.888-19.879 2.296-9.176-4.591-38.74-14.277-73.786-45.526-27.275-24.319-45.691-54.359-51.043-63.543-5.352-9.183-.569-14.146 4.024-18.72 4.127-4.109 9.175-10.713 13.763-16.069 4.587-5.355 6.117-9.183 9.175-15.304 3.059-6.122 1.529-11.479-.765-16.07-2.293-4.591-20.644-49.739-28.29-68.104-7.447-17.886-15.013-15.466-20.645-15.747-5.346-.266-11.469-.322-17.585-.322s-16.057 2.295-24.467 11.478-32.113 31.374-32.113 76.521c0 45.147 32.877 88.764 37.465 94.885 4.588 6.122 64.699 98.771 156.741 138.502 21.892 9.45 38.982 15.094 52.308 19.322 21.98 6.979 41.982 5.995 57.793 3.634 17.628-2.633 54.284-22.189 61.932-43.615 7.646-21.427 7.646-39.791 5.352-43.617-2.294-3.826-8.41-6.122-17.585-10.714z" />
                             </g>
                          </svg>
                        </a>
                       </td>
                       <td width="95%"><span style="color: #000;">+1 (604) 786-1214</span><br />
                        <a href="https://api.whatsapp.com/send?phone=16047861214" target="_blank"  style="color: #437a01; text-decoration: none;">(Whatsapp Click)</a>
                     </td>
                     </tr>
                     </table>
                </td>
                </tr>
                <tr>
                <td style="padding: 0px; width: 50%;">
                  <table width="100%" border="0" cellpadding="8" cellspacing="0">
                    <tr>
                       <td width="5%">
                        <a href="mailto:mkj@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                             id="_x36_" width="24px" height="24px" viewBox="0 0 512 512" xml:space="preserve">
                             <g>
                                <polygon style="fill:#C0874A;"
                                   points="511.401,173.663 502.513,179.269 458.244,207.066 268.606,326.073 266.213,327.652    265.699,327.968 256.043,334.048 255.701,334.207 247.753,329.232 246.299,328.284 66.659,215.516 54.439,207.856 0.598,174.057    0,173.663 54.439,139.469 249.548,16.988 261.854,16.988 458.244,140.258 464.74,144.365  " />
                                <path style="fill:#69B25F;"
                                   d="M467.859,16.065v383.862c0,8.807-7.88,15.985-17.641,15.985H62.29   c-9.671,0-17.551-7.178-17.551-15.985V16.065C44.739,7.176,52.619,0,62.29,0h387.928C459.978,0,467.859,7.176,467.859,16.065z" />
                                <g>
                                   <g>
                                      <rect x="110.787" y="75.101" style="fill:#A2CC86;" width="190.508" height="25.378" />
                                      <rect x="110.787" y="71.093" style="fill:#53A654;" width="190.508" height="25.378" />
                                   </g>
                                   <g>
                                      <rect x="110.787" y="214.682" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                      <rect x="110.787" y="210.675" style="fill:#53A654;" width="289.501" height="25.378" />
                                   </g>
                                   <g>
                                      <rect x="110.787" y="284.473" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                      <rect x="110.787" y="280.466" style="fill:#53A654;" width="289.501" height="25.378" />
                                   </g>
                                   <g>
                                      <rect x="110.787" y="144.891" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                      <rect x="110.787" y="140.884" style="fill:#53A654;" width="289.501" height="25.378" />
                                   </g>
                                </g>
                                <polygon style="fill:#F0BA7D;"
                                   points="256.299,322.118 253.308,323.881 195.45,357.662 188.356,361.847 12.392,464.583    0.598,471.413 0.598,172.824 71.446,214.169 246.642,316.464 248.009,317.272 256.043,321.971  " />
                                <g>
                                   <path style="fill:#E5A864;"
                                      d="M510.236,167.293c0.97-0.567,1.764-0.111,1.764,1.013v294.576c0,1.124-0.019,2.027-0.043,2.006    s-0.139-0.103-0.257-0.184c-0.118-0.081-0.291-0.197-0.385-0.257c-0.094-0.061-0.19-0.11-0.214-0.11    c-0.024,0-0.837-0.464-1.807-1.03L265.498,320.993c-0.97-0.566-2.556-1.497-3.524-2.068l-0.839-0.495    c-0.968-0.571-2.452-1.451-3.298-1.956c-0.846-0.505-0.743-1.379,0.229-1.944l6.209-3.604c0.972-0.564,1.825-1.059,1.895-1.099    c0.071-0.04,0.186-0.107,0.257-0.147c0.071-0.04,0.923-0.535,1.895-1.1l5.44-3.161c0.972-0.564,2.56-1.49,3.531-2.057    L510.236,167.293z" />
                                </g>
                                <circle style="opacity:0.68;fill:#EEF3CA;" cx="377.142" cy="75.101" r="38.186" />
                                <path style="fill:#C0874A;"
                                   d="M512,425.251v45.808h-0.513l-7.35,0.342H27.689l-0.341-7.094   c8.632-5.896,20.082-13.845,27.518-18.887l1.025-0.684l24.956-17.178l38.97-26.92l11.28-7.777l118.365-81.615l7.947-5.556   c1.88-1.195,4.017-2.222,6.324-2.904c2.735-0.941,5.726-1.539,8.717-1.795c1.025-0.086,1.965-0.171,2.991-0.086   c1.025-0.171,2.052-0.171,3.077-0.171c2.735-0.085,5.385,0.171,7.948,0.683c2.734,0.513,5.213,1.369,7.435,2.564l89.735,49.91   l44.354,24.697l11.538,6.41l41.79,23.245l27.518,15.298c0.77,0.428,1.624,0.855,2.479,1.368   C511.487,424.995,511.743,425.166,512,425.251z" />
                                <path style="fill:#ECB168;"
                                   d="M512,441.404v29.997H0.598v-29.997c8.974-5.471,20.768-12.905,28.459-17.52l1.025-0.684   l25.724-15.98l40.252-24.955l11.623-7.264l122.125-75.805l8.204-5.127c4.273-2.564,9.828-3.846,15.298-3.932   c1.025-0.086,1.965-0.086,2.991,0c1.026-0.086,2.051-0.086,3.077,0c2.393,0,4.701,0.257,6.923,0.769   c3.077,0.599,5.896,1.71,8.29,3.163l11.879,7.349l75.377,46.834l43.073,26.75l11.196,7.007l40.68,25.212l26.748,16.665   c0.77,0.428,1.539,0.854,2.393,1.367c5.47,3.505,12.477,7.864,19.058,11.88C507.385,438.669,509.778,440.122,512,441.404z" />
                                <path style="opacity:0.2;fill:#BADB9E;"
                                   d="M467.816,16.066v4.273c0-8.887-7.863-16.066-17.605-16.066H62.301   c-9.656,0-17.604,7.178-17.604,16.066v-4.273C44.696,7.178,52.645,0,62.301,0h387.911C459.953,0,467.816,7.178,467.816,16.066z" />
                             </g>
                          </svg>
                        </a>
                       </td>
                       <td width="95%"><a href="mailto:mkj@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">mkj@siaimmigration.com</a></td>
                    </tr>
                 </table>
                </td>
              </tr>
            </table>
          </td>
         </tr>
         <tr>
            <td colspan="2" style="padding: 0px;"><div style="border-bottom: 5px solid #ffbe12; padding:10px 0px;"></div></td>
         </tr>
         <tr>
            <td colspan="2" style="font-size: 18px; font-weight: bold; color: #5A891F; text-align: center; padding-top: 20px;"><u>Student Admissions (Onshore/Offshore)</u></td>
         </tr>
		 
		  <tr>
          <td style="padding: 0px;">
            <table width="100%" border="0" cellpadding="8" cellspacing="0">
                  <tr>
                     <td width="5%">
                      <a href="https://api.whatsapp.com/send?phone=16049163289" target="_blank" style="color: #000; text-decoration: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                           width="24px" height="24px" viewBox="0 0 1024 1024">
                           <defs>
                              <path id="a2"
                                 d="M1023.941 765.153c0 5.606-.171 17.766-.508 27.159-.824 22.982-2.646 52.639-5.401 66.151-4.141 20.306-10.392 39.472-18.542 55.425-9.643 18.871-21.943 35.775-36.559 50.364-14.584 14.56-31.472 26.812-50.315 36.416-16.036 8.172-35.322 14.426-55.744 18.549-13.378 2.701-42.812 4.488-65.648 5.3-9.402.336-21.564.505-27.15.505l-504.226-.081c-5.607 0-17.765-.172-27.158-.509-22.983-.824-52.639-2.646-66.152-5.4-20.306-4.142-39.473-10.392-55.425-18.542-18.872-9.644-35.775-21.944-50.364-36.56-14.56-14.584-26.812-31.471-36.415-50.314-8.174-16.037-14.428-35.323-18.551-55.744-2.7-13.378-4.487-42.812-5.3-65.649-.334-9.401-.503-21.563-.503-27.148l.08-504.228c0-5.607.171-17.766.508-27.159.825-22.983 2.646-52.639 5.401-66.151 4.141-20.306 10.391-39.473 18.542-55.426C34.154 93.24 46.455 76.336 61.07 61.747c14.584-14.559 31.472-26.812 50.315-36.416 16.037-8.172 35.324-14.426 55.745-18.549 13.377-2.701 42.812-4.488 65.648-5.3 9.402-.335 21.565-.504 27.149-.504l504.227.081c5.608 0 17.766.171 27.159.508 22.983.825 52.638 2.646 66.152 5.401 20.305 4.141 39.472 10.391 55.425 18.542 18.871 9.643 35.774 21.944 50.363 36.559 14.559 14.584 26.812 31.471 36.415 50.315 8.174 16.037 14.428 35.323 18.551 55.744 2.7 13.378 4.486 42.812 5.3 65.649.335 9.402.504 21.564.504 27.15l-.082 504.226z" />
                           </defs>
                           <linearGradient id="b2" gradientUnits="userSpaceOnUse" x1="512.001" y1=".978" x2="512.001"
                              y2="1025.023">
                              <stop offset="0" stop-color="#61fd7d" />
                              <stop offset="1" stop-color="#2bb826" />
                           </linearGradient>
                           <use xlink:href="#a" overflow="visible" fill="url(#b)" />
                           <g>
                              <path fill="#FFF"
                                 d="M783.302 243.246c-69.329-69.387-161.529-107.619-259.763-107.658-202.402 0-367.133 164.668-367.214 367.072-.026 64.699 16.883 127.854 49.017 183.522l-52.096 190.229 194.665-51.047c53.636 29.244 114.022 44.656 175.482 44.682h.151c202.382 0 367.128-164.688 367.21-367.094.039-98.087-38.121-190.319-107.452-259.706zM523.544 808.047h-.125c-54.767-.021-108.483-14.729-155.344-42.529l-11.146-6.612-115.517 30.293 30.834-112.592-7.259-11.544c-30.552-48.579-46.688-104.729-46.664-162.379.066-168.229 136.985-305.096 305.339-305.096 81.521.031 158.154 31.811 215.779 89.482s89.342 134.332 89.312 215.859c-.066 168.243-136.984 305.118-305.209 305.118zm167.415-228.515c-9.177-4.591-54.286-26.782-62.697-29.843-8.41-3.062-14.526-4.592-20.645 4.592-6.115 9.182-23.699 29.843-29.053 35.964-5.352 6.122-10.704 6.888-19.879 2.296-9.176-4.591-38.74-14.277-73.786-45.526-27.275-24.319-45.691-54.359-51.043-63.543-5.352-9.183-.569-14.146 4.024-18.72 4.127-4.109 9.175-10.713 13.763-16.069 4.587-5.355 6.117-9.183 9.175-15.304 3.059-6.122 1.529-11.479-.765-16.07-2.293-4.591-20.644-49.739-28.29-68.104-7.447-17.886-15.013-15.466-20.645-15.747-5.346-.266-11.469-.322-17.585-.322s-16.057 2.295-24.467 11.478-32.113 31.374-32.113 76.521c0 45.147 32.877 88.764 37.465 94.885 4.588 6.122 64.699 98.771 156.741 138.502 21.892 9.45 38.982 15.094 52.308 19.322 21.98 6.979 41.982 5.995 57.793 3.634 17.628-2.633 54.284-22.189 61.932-43.615 7.646-21.427 7.646-39.791 5.352-43.617-2.294-3.826-8.41-6.122-17.585-10.714z" />
                           </g>
                        </svg>
                      </a>
                     </td>
                     <td width="95%"><span style="color: #000;">+1 (604) 916-3289</span><br />
                        <a href="https://api.whatsapp.com/send?phone=16049163289" target="_blank" style="color: #437a01; text-decoration: none;">(Whatsapp Click)</a>
                     <td>
                     </td>
                  </tr>
               </table>
            </td>
            <td style="padding: 0px;">
            <table width="100%" border="0" cellpadding="8" cellspacing="0">
                  <tr>
                     <td width="5%">
                      <a href="https://api.whatsapp.com/send?phone=17782228561" target="_blank" style="color: #000; text-decoration: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                           width="24px" height="24px" viewBox="0 0 1024 1024">
                           <defs>
                              <path id="a2"
                                 d="M1023.941 765.153c0 5.606-.171 17.766-.508 27.159-.824 22.982-2.646 52.639-5.401 66.151-4.141 20.306-10.392 39.472-18.542 55.425-9.643 18.871-21.943 35.775-36.559 50.364-14.584 14.56-31.472 26.812-50.315 36.416-16.036 8.172-35.322 14.426-55.744 18.549-13.378 2.701-42.812 4.488-65.648 5.3-9.402.336-21.564.505-27.15.505l-504.226-.081c-5.607 0-17.765-.172-27.158-.509-22.983-.824-52.639-2.646-66.152-5.4-20.306-4.142-39.473-10.392-55.425-18.542-18.872-9.644-35.775-21.944-50.364-36.56-14.56-14.584-26.812-31.471-36.415-50.314-8.174-16.037-14.428-35.323-18.551-55.744-2.7-13.378-4.487-42.812-5.3-65.649-.334-9.401-.503-21.563-.503-27.148l.08-504.228c0-5.607.171-17.766.508-27.159.825-22.983 2.646-52.639 5.401-66.151 4.141-20.306 10.391-39.473 18.542-55.426C34.154 93.24 46.455 76.336 61.07 61.747c14.584-14.559 31.472-26.812 50.315-36.416 16.037-8.172 35.324-14.426 55.745-18.549 13.377-2.701 42.812-4.488 65.648-5.3 9.402-.335 21.565-.504 27.149-.504l504.227.081c5.608 0 17.766.171 27.159.508 22.983.825 52.638 2.646 66.152 5.401 20.305 4.141 39.472 10.391 55.425 18.542 18.871 9.643 35.774 21.944 50.363 36.559 14.559 14.584 26.812 31.471 36.415 50.315 8.174 16.037 14.428 35.323 18.551 55.744 2.7 13.378 4.486 42.812 5.3 65.649.335 9.402.504 21.564.504 27.15l-.082 504.226z" />
                           </defs>
                           <linearGradient id="b2" gradientUnits="userSpaceOnUse" x1="512.001" y1=".978" x2="512.001"
                              y2="1025.023">
                              <stop offset="0" stop-color="#61fd7d" />
                              <stop offset="1" stop-color="#2bb826" />
                           </linearGradient>
                           <use xlink:href="#a" overflow="visible" fill="url(#b)" />
                           <g>
                              <path fill="#FFF"
                                 d="M783.302 243.246c-69.329-69.387-161.529-107.619-259.763-107.658-202.402 0-367.133 164.668-367.214 367.072-.026 64.699 16.883 127.854 49.017 183.522l-52.096 190.229 194.665-51.047c53.636 29.244 114.022 44.656 175.482 44.682h.151c202.382 0 367.128-164.688 367.21-367.094.039-98.087-38.121-190.319-107.452-259.706zM523.544 808.047h-.125c-54.767-.021-108.483-14.729-155.344-42.529l-11.146-6.612-115.517 30.293 30.834-112.592-7.259-11.544c-30.552-48.579-46.688-104.729-46.664-162.379.066-168.229 136.985-305.096 305.339-305.096 81.521.031 158.154 31.811 215.779 89.482s89.342 134.332 89.312 215.859c-.066 168.243-136.984 305.118-305.209 305.118zm167.415-228.515c-9.177-4.591-54.286-26.782-62.697-29.843-8.41-3.062-14.526-4.592-20.645 4.592-6.115 9.182-23.699 29.843-29.053 35.964-5.352 6.122-10.704 6.888-19.879 2.296-9.176-4.591-38.74-14.277-73.786-45.526-27.275-24.319-45.691-54.359-51.043-63.543-5.352-9.183-.569-14.146 4.024-18.72 4.127-4.109 9.175-10.713 13.763-16.069 4.587-5.355 6.117-9.183 9.175-15.304 3.059-6.122 1.529-11.479-.765-16.07-2.293-4.591-20.644-49.739-28.29-68.104-7.447-17.886-15.013-15.466-20.645-15.747-5.346-.266-11.469-.322-17.585-.322s-16.057 2.295-24.467 11.478-32.113 31.374-32.113 76.521c0 45.147 32.877 88.764 37.465 94.885 4.588 6.122 64.699 98.771 156.741 138.502 21.892 9.45 38.982 15.094 52.308 19.322 21.98 6.979 41.982 5.995 57.793 3.634 17.628-2.633 54.284-22.189 61.932-43.615 7.646-21.427 7.646-39.791 5.352-43.617-2.294-3.826-8.41-6.122-17.585-10.714z" />
                           </g>
                        </svg>
                      </a>
                     </td>
                     <td width="95%"><span style="color: #000;">+1 (778) 222-8561</span><br />
                        <a href="https://api.whatsapp.com/send?phone=17782228561" target="_blank" style="color: #437a01; text-decoration: none;">(Whatsapp Click)</a>
                     <td>
                     </td>
                  </tr>
               </table>
            </td>
            
         </tr>
         <tr>
          	<td style="padding: 0px;">
               <table width="100%" border="0" cellpadding="8" cellspacing="0">
                     <tr>
                        <td>
                         <a href="mailto:info@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                              id="_x36_2" width="24px" height="24px" viewBox="0 0 512 512" xml:space="preserve">
                              <g>
                                 <polygon style="fill:#C0874A;"
                                    points="511.401,173.663 502.513,179.269 458.244,207.066 268.606,326.073 266.213,327.652    265.699,327.968 256.043,334.048 255.701,334.207 247.753,329.232 246.299,328.284 66.659,215.516 54.439,207.856 0.598,174.057    0,173.663 54.439,139.469 249.548,16.988 261.854,16.988 458.244,140.258 464.74,144.365  " />
                                 <path style="fill:#69B25F;"
                                    d="M467.859,16.065v383.862c0,8.807-7.88,15.985-17.641,15.985H62.29   c-9.671,0-17.551-7.178-17.551-15.985V16.065C44.739,7.176,52.619,0,62.29,0h387.928C459.978,0,467.859,7.176,467.859,16.065z" />
                                 <g>
                                    <g>
                                       <rect x="110.787" y="75.101" style="fill:#A2CC86;" width="190.508" height="25.378" />
                                       <rect x="110.787" y="71.093" style="fill:#53A654;" width="190.508" height="25.378" />
                                    </g>
                                    <g>
                                       <rect x="110.787" y="214.682" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                       <rect x="110.787" y="210.675" style="fill:#53A654;" width="289.501" height="25.378" />
                                    </g>
                                    <g>
                                       <rect x="110.787" y="284.473" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                       <rect x="110.787" y="280.466" style="fill:#53A654;" width="289.501" height="25.378" />
                                    </g>
                                    <g>
                                       <rect x="110.787" y="144.891" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                       <rect x="110.787" y="140.884" style="fill:#53A654;" width="289.501" height="25.378" />
                                    </g>
                                 </g>
                                 <polygon style="fill:#F0BA7D;"
                                    points="256.299,322.118 253.308,323.881 195.45,357.662 188.356,361.847 12.392,464.583    0.598,471.413 0.598,172.824 71.446,214.169 246.642,316.464 248.009,317.272 256.043,321.971  " />
                                 <g>
                                    <path style="fill:#E5A864;"
                                       d="M510.236,167.293c0.97-0.567,1.764-0.111,1.764,1.013v294.576c0,1.124-0.019,2.027-0.043,2.006    s-0.139-0.103-0.257-0.184c-0.118-0.081-0.291-0.197-0.385-0.257c-0.094-0.061-0.19-0.11-0.214-0.11    c-0.024,0-0.837-0.464-1.807-1.03L265.498,320.993c-0.97-0.566-2.556-1.497-3.524-2.068l-0.839-0.495    c-0.968-0.571-2.452-1.451-3.298-1.956c-0.846-0.505-0.743-1.379,0.229-1.944l6.209-3.604c0.972-0.564,1.825-1.059,1.895-1.099    c0.071-0.04,0.186-0.107,0.257-0.147c0.071-0.04,0.923-0.535,1.895-1.1l5.44-3.161c0.972-0.564,2.56-1.49,3.531-2.057    L510.236,167.293z" />
                                 </g>
                                 <circle style="opacity:0.68;fill:#EEF3CA;" cx="377.142" cy="75.101" r="38.186" />
                                 <path style="fill:#C0874A;"
                                    d="M512,425.251v45.808h-0.513l-7.35,0.342H27.689l-0.341-7.094   c8.632-5.896,20.082-13.845,27.518-18.887l1.025-0.684l24.956-17.178l38.97-26.92l11.28-7.777l118.365-81.615l7.947-5.556   c1.88-1.195,4.017-2.222,6.324-2.904c2.735-0.941,5.726-1.539,8.717-1.795c1.025-0.086,1.965-0.171,2.991-0.086   c1.025-0.171,2.052-0.171,3.077-0.171c2.735-0.085,5.385,0.171,7.948,0.683c2.734,0.513,5.213,1.369,7.435,2.564l89.735,49.91   l44.354,24.697l11.538,6.41l41.79,23.245l27.518,15.298c0.77,0.428,1.624,0.855,2.479,1.368   C511.487,424.995,511.743,425.166,512,425.251z" />
                                 <path style="fill:#ECB168;"
                                    d="M512,441.404v29.997H0.598v-29.997c8.974-5.471,20.768-12.905,28.459-17.52l1.025-0.684   l25.724-15.98l40.252-24.955l11.623-7.264l122.125-75.805l8.204-5.127c4.273-2.564,9.828-3.846,15.298-3.932   c1.025-0.086,1.965-0.086,2.991,0c1.026-0.086,2.051-0.086,3.077,0c2.393,0,4.701,0.257,6.923,0.769   c3.077,0.599,5.896,1.71,8.29,3.163l11.879,7.349l75.377,46.834l43.073,26.75l11.196,7.007l40.68,25.212l26.748,16.665   c0.77,0.428,1.539,0.854,2.393,1.367c5.47,3.505,12.477,7.864,19.058,11.88C507.385,438.669,509.778,440.122,512,441.404z" />
                                 <path style="opacity:0.2;fill:#BADB9E;"
                                    d="M467.816,16.066v4.273c0-8.887-7.863-16.066-17.605-16.066H62.301   c-9.656,0-17.604,7.178-17.604,16.066v-4.273C44.696,7.178,52.645,0,62.301,0h387.911C459.953,0,467.816,7.178,467.816,16.066z" />
                              </g>
                           </svg>
                         </a>
                        </td>
                        <td><a href="mailto:info@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">info@siaimmigration.com</a></td>
                     </tr>
                  </table>
               </td>
            <td style="padding: 0px;">
               <table width="100%" border="0" cellpadding="8" cellspacing="0">
                     <tr>
                        <td>
                         <a href="mailto:info@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                              id="_x36_2" width="24px" height="24px" viewBox="0 0 512 512" xml:space="preserve">
                              <g>
                                 <polygon style="fill:#C0874A;"
                                    points="511.401,173.663 502.513,179.269 458.244,207.066 268.606,326.073 266.213,327.652    265.699,327.968 256.043,334.048 255.701,334.207 247.753,329.232 246.299,328.284 66.659,215.516 54.439,207.856 0.598,174.057    0,173.663 54.439,139.469 249.548,16.988 261.854,16.988 458.244,140.258 464.74,144.365  " />
                                 <path style="fill:#69B25F;"
                                    d="M467.859,16.065v383.862c0,8.807-7.88,15.985-17.641,15.985H62.29   c-9.671,0-17.551-7.178-17.551-15.985V16.065C44.739,7.176,52.619,0,62.29,0h387.928C459.978,0,467.859,7.176,467.859,16.065z" />
                                 <g>
                                    <g>
                                       <rect x="110.787" y="75.101" style="fill:#A2CC86;" width="190.508" height="25.378" />
                                       <rect x="110.787" y="71.093" style="fill:#53A654;" width="190.508" height="25.378" />
                                    </g>
                                    <g>
                                       <rect x="110.787" y="214.682" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                       <rect x="110.787" y="210.675" style="fill:#53A654;" width="289.501" height="25.378" />
                                    </g>
                                    <g>
                                       <rect x="110.787" y="284.473" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                       <rect x="110.787" y="280.466" style="fill:#53A654;" width="289.501" height="25.378" />
                                    </g>
                                    <g>
                                       <rect x="110.787" y="144.891" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                       <rect x="110.787" y="140.884" style="fill:#53A654;" width="289.501" height="25.378" />
                                    </g>
                                 </g>
                                 <polygon style="fill:#F0BA7D;"
                                    points="256.299,322.118 253.308,323.881 195.45,357.662 188.356,361.847 12.392,464.583    0.598,471.413 0.598,172.824 71.446,214.169 246.642,316.464 248.009,317.272 256.043,321.971  " />
                                 <g>
                                    <path style="fill:#E5A864;"
                                       d="M510.236,167.293c0.97-0.567,1.764-0.111,1.764,1.013v294.576c0,1.124-0.019,2.027-0.043,2.006    s-0.139-0.103-0.257-0.184c-0.118-0.081-0.291-0.197-0.385-0.257c-0.094-0.061-0.19-0.11-0.214-0.11    c-0.024,0-0.837-0.464-1.807-1.03L265.498,320.993c-0.97-0.566-2.556-1.497-3.524-2.068l-0.839-0.495    c-0.968-0.571-2.452-1.451-3.298-1.956c-0.846-0.505-0.743-1.379,0.229-1.944l6.209-3.604c0.972-0.564,1.825-1.059,1.895-1.099    c0.071-0.04,0.186-0.107,0.257-0.147c0.071-0.04,0.923-0.535,1.895-1.1l5.44-3.161c0.972-0.564,2.56-1.49,3.531-2.057    L510.236,167.293z" />
                                 </g>
                                 <circle style="opacity:0.68;fill:#EEF3CA;" cx="377.142" cy="75.101" r="38.186" />
                                 <path style="fill:#C0874A;"
                                    d="M512,425.251v45.808h-0.513l-7.35,0.342H27.689l-0.341-7.094   c8.632-5.896,20.082-13.845,27.518-18.887l1.025-0.684l24.956-17.178l38.97-26.92l11.28-7.777l118.365-81.615l7.947-5.556   c1.88-1.195,4.017-2.222,6.324-2.904c2.735-0.941,5.726-1.539,8.717-1.795c1.025-0.086,1.965-0.171,2.991-0.086   c1.025-0.171,2.052-0.171,3.077-0.171c2.735-0.085,5.385,0.171,7.948,0.683c2.734,0.513,5.213,1.369,7.435,2.564l89.735,49.91   l44.354,24.697l11.538,6.41l41.79,23.245l27.518,15.298c0.77,0.428,1.624,0.855,2.479,1.368   C511.487,424.995,511.743,425.166,512,425.251z" />
                                 <path style="fill:#ECB168;"
                                    d="M512,441.404v29.997H0.598v-29.997c8.974-5.471,20.768-12.905,28.459-17.52l1.025-0.684   l25.724-15.98l40.252-24.955l11.623-7.264l122.125-75.805l8.204-5.127c4.273-2.564,9.828-3.846,15.298-3.932   c1.025-0.086,1.965-0.086,2.991,0c1.026-0.086,2.051-0.086,3.077,0c2.393,0,4.701,0.257,6.923,0.769   c3.077,0.599,5.896,1.71,8.29,3.163l11.879,7.349l75.377,46.834l43.073,26.75l11.196,7.007l40.68,25.212l26.748,16.665   c0.77,0.428,1.539,0.854,2.393,1.367c5.47,3.505,12.477,7.864,19.058,11.88C507.385,438.669,509.778,440.122,512,441.404z" />
                                 <path style="opacity:0.2;fill:#BADB9E;"
                                    d="M467.816,16.066v4.273c0-8.887-7.863-16.066-17.605-16.066H62.301   c-9.656,0-17.604,7.178-17.604,16.066v-4.273C44.696,7.178,52.645,0,62.301,0h387.911C459.953,0,467.816,7.178,467.816,16.066z" />
                              </g>
                           </svg>
                         </a>
                        </td>
                        <td><a href="mailto:help@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">help@siaimmigration.com</a></td>
                     </tr>
                  </table>
               </td>
         </tr>
		 
         
         <tr>
            <td colspan="2"></td>
         </tr>
         <tr>
            <td colspan="2" style="background: #79B52F; color: #fff; font-weight: bold; text-align: center; padding: 10px 0px;">We look forward to assisting you!</td>
         </tr>
         <tr>
            <td colspan="2" style="background: #262626; text-align: center;">
              <table width="100%" border="0" cellpadding="8" cellspacing="0" align="center">
                <tr>
                  <td style="text-align: center;"><img src="https://www.siaimmigration.com/assets/images/accredited/3bestlogsmall.png" width="150" alt="" /></td>
               </tr>
               <tr>
                <td style="color: #fff;text-align: center;"><span style="color: #79B52F;">Siaimmigration</span> | All rights reserved.</td>
             </tr>
             </table>
            </td>
         </tr>
      </table>
   </body>';
   
   $to = ['no-reply@siaimmigration.com'];
$cc = [$email11]; // Ensure $email11 contains a valid email address
 $email1 = \Config\Services::email();
                    $config = get_smtp_settings();
                    $email1->initialize($config);
                    
                    
                    
                    
                    	  $email1->setFrom('no-reply@siaimmigration.com', $From1);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo('no-reply@siaimmigration.com');
    $email1->setSubject($subject1);
    $email1->setMessage($message1);
    $email1->send();
   

// $email1->setMailType('html');
// $email1->setFrom('no-reply@siaimmigration.com', $From1);
// $email1->setTo($to);
// $email1->setCC($cc);
// $email1->setReplyTo('no-reply@siaimmigration.com');
// $email1->setSubject($subject1);
// $email1->setMessage($message1);
// $email1->send();

  
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



public function tttm(){
    
    
      
   $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
    
    
    $message1 ='<body>
      <table width="100%" border="0" cellpadding="8" cellspacing="0" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; width:600px; margin:0px auto; border: 1px solid #262626;">
         <tr>
            <td width="50%" style="background: #262626; height: 2px;"></td>
            <td width="50%" style="background: #262626; height: 2px;"></td>
         </tr>
         <tr>
            <td style="padding:10px 0px;"><img src="https://www.siaimmigration.com/assets/images/logo.png" alt=""
               width="120" /></td>
            <td style="padding:10px 0px;">
               <div align="right"><img src="https://www.siaimmigration.com/assets/images/iccrclogo.png" alt="" width="120" />
               </div>
            </td>
         </tr>
		 <tr>
		  <td colspan="2" style="padding-top: 15px;">
			<p>Hi Dear,</p>
		  </td>
		</tr>
		<tr colspan="2">
		  <td>Greetings from Sia immigration</td>
		</tr>
		<tr colspan="2">
		  <td>Hope you are doing well</td>
		</tr>
		<tr colspan="2">
		  <td>I am writing to follow up on our last conversation.</td>
		</tr>
		<tr>
		  <td colspan="2">Let us know if you are still interested and looking for any service related to your immigration process</td>
		</tr>
		<tr>
		  <td colspan="2">We would be more than happy to assist you</td>
		</tr>
		<tr>
		  <td colspan="2">Wish you good luck</td>
		</tr>
		<tr>
		  <td colspan="2" style="padding-bottom: 15px;">Hope to hear from you soon</td>
		</tr>
         <tr>
          <td colspan="2" style="font-size: 18px; font-weight: bold; color: #5A891F; text-align: center;"><u style="padding-top: 10px; display: block;">For Canadian Immigration Inquiries</u></td>
         </tr>
         <tr>
            
            <td style="width: 50%; padding: 0px;">
               <table width="100%" border="0" cellpadding="8" cellspacing="0">
                  <tr>
                     <td width="5%">
                      <a href="https://api.whatsapp.com/send?phone=17782281017" target="_blank" style="color: #fff; text-decoration: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                           width="24px" height="24px" viewBox="0 0 1024 1024">
                           <defs>
                              <path id="a"
                                 d="M1023.941 765.153c0 5.606-.171 17.766-.508 27.159-.824 22.982-2.646 52.639-5.401 66.151-4.141 20.306-10.392 39.472-18.542 55.425-9.643 18.871-21.943 35.775-36.559 50.364-14.584 14.56-31.472 26.812-50.315 36.416-16.036 8.172-35.322 14.426-55.744 18.549-13.378 2.701-42.812 4.488-65.648 5.3-9.402.336-21.564.505-27.15.505l-504.226-.081c-5.607 0-17.765-.172-27.158-.509-22.983-.824-52.639-2.646-66.152-5.4-20.306-4.142-39.473-10.392-55.425-18.542-18.872-9.644-35.775-21.944-50.364-36.56-14.56-14.584-26.812-31.471-36.415-50.314-8.174-16.037-14.428-35.323-18.551-55.744-2.7-13.378-4.487-42.812-5.3-65.649-.334-9.401-.503-21.563-.503-27.148l.08-504.228c0-5.607.171-17.766.508-27.159.825-22.983 2.646-52.639 5.401-66.151 4.141-20.306 10.391-39.473 18.542-55.426C34.154 93.24 46.455 76.336 61.07 61.747c14.584-14.559 31.472-26.812 50.315-36.416 16.037-8.172 35.324-14.426 55.745-18.549 13.377-2.701 42.812-4.488 65.648-5.3 9.402-.335 21.565-.504 27.149-.504l504.227.081c5.608 0 17.766.171 27.159.508 22.983.825 52.638 2.646 66.152 5.401 20.305 4.141 39.472 10.391 55.425 18.542 18.871 9.643 35.774 21.944 50.363 36.559 14.559 14.584 26.812 31.471 36.415 50.315 8.174 16.037 14.428 35.323 18.551 55.744 2.7 13.378 4.486 42.812 5.3 65.649.335 9.402.504 21.564.504 27.15l-.082 504.226z" />
                           </defs>
                           <linearGradient id="b" gradientUnits="userSpaceOnUse" x1="512.001" y1=".978" x2="512.001" y2="1025.023">
                              <stop offset="0" stop-color="#61fd7d" />
                              <stop offset="1" stop-color="#2bb826" />
                           </linearGradient>
                           <use xlink:href="#a" overflow="visible" fill="url(#b)" />
                           <g>
                              <path fill="#FFF"
                                 d="M783.302 243.246c-69.329-69.387-161.529-107.619-259.763-107.658-202.402 0-367.133 164.668-367.214 367.072-.026 64.699 16.883 127.854 49.017 183.522l-52.096 190.229 194.665-51.047c53.636 29.244 114.022 44.656 175.482 44.682h.151c202.382 0 367.128-164.688 367.21-367.094.039-98.087-38.121-190.319-107.452-259.706zM523.544 808.047h-.125c-54.767-.021-108.483-14.729-155.344-42.529l-11.146-6.612-115.517 30.293 30.834-112.592-7.259-11.544c-30.552-48.579-46.688-104.729-46.664-162.379.066-168.229 136.985-305.096 305.339-305.096 81.521.031 158.154 31.811 215.779 89.482s89.342 134.332 89.312 215.859c-.066 168.243-136.984 305.118-305.209 305.118zm167.415-228.515c-9.177-4.591-54.286-26.782-62.697-29.843-8.41-3.062-14.526-4.592-20.645 4.592-6.115 9.182-23.699 29.843-29.053 35.964-5.352 6.122-10.704 6.888-19.879 2.296-9.176-4.591-38.74-14.277-73.786-45.526-27.275-24.319-45.691-54.359-51.043-63.543-5.352-9.183-.569-14.146 4.024-18.72 4.127-4.109 9.175-10.713 13.763-16.069 4.587-5.355 6.117-9.183 9.175-15.304 3.059-6.122 1.529-11.479-.765-16.07-2.293-4.591-20.644-49.739-28.29-68.104-7.447-17.886-15.013-15.466-20.645-15.747-5.346-.266-11.469-.322-17.585-.322s-16.057 2.295-24.467 11.478-32.113 31.374-32.113 76.521c0 45.147 32.877 88.764 37.465 94.885 4.588 6.122 64.699 98.771 156.741 138.502 21.892 9.45 38.982 15.094 52.308 19.322 21.98 6.979 41.982 5.995 57.793 3.634 17.628-2.633 54.284-22.189 61.932-43.615 7.646-21.427 7.646-39.791 5.352-43.617-2.294-3.826-8.41-6.122-17.585-10.714z" />
                           </g>
                        </svg>
                      </a>
                     </td>
                     <td width="95%"><span style="color: #000;">+1 (778) 228-1017</span><br />
                        <a href="https://api.whatsapp.com/send?phone=17782281017" target="_blank"  style="color: #437a01; text-decoration: none;">(Whatsapp Click)</a>
                     </td>
                  </tr>
                  <tr>
                     <td>
                      <a href="mailto:info@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                           id="_x36_" width="24px" height="24px" viewBox="0 0 512 512" xml:space="preserve">
                           <g>
                              <polygon style="fill:#C0874A;"
                                 points="511.401,173.663 502.513,179.269 458.244,207.066 268.606,326.073 266.213,327.652    265.699,327.968 256.043,334.048 255.701,334.207 247.753,329.232 246.299,328.284 66.659,215.516 54.439,207.856 0.598,174.057    0,173.663 54.439,139.469 249.548,16.988 261.854,16.988 458.244,140.258 464.74,144.365  " />
                              <path style="fill:#69B25F;"
                                 d="M467.859,16.065v383.862c0,8.807-7.88,15.985-17.641,15.985H62.29   c-9.671,0-17.551-7.178-17.551-15.985V16.065C44.739,7.176,52.619,0,62.29,0h387.928C459.978,0,467.859,7.176,467.859,16.065z" />
                              <g>
                                 <g>
                                    <rect x="110.787" y="75.101" style="fill:#A2CC86;" width="190.508" height="25.378" />
                                    <rect x="110.787" y="71.093" style="fill:#53A654;" width="190.508" height="25.378" />
                                 </g>
                                 <g>
                                    <rect x="110.787" y="214.682" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                    <rect x="110.787" y="210.675" style="fill:#53A654;" width="289.501" height="25.378" />
                                 </g>
                                 <g>
                                    <rect x="110.787" y="284.473" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                    <rect x="110.787" y="280.466" style="fill:#53A654;" width="289.501" height="25.378" />
                                 </g>
                                 <g>
                                    <rect x="110.787" y="144.891" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                    <rect x="110.787" y="140.884" style="fill:#53A654;" width="289.501" height="25.378" />
                                 </g>
                              </g>
                              <polygon style="fill:#F0BA7D;"
                                 points="256.299,322.118 253.308,323.881 195.45,357.662 188.356,361.847 12.392,464.583    0.598,471.413 0.598,172.824 71.446,214.169 246.642,316.464 248.009,317.272 256.043,321.971  " />
                              <g>
                                 <path style="fill:#E5A864;"
                                    d="M510.236,167.293c0.97-0.567,1.764-0.111,1.764,1.013v294.576c0,1.124-0.019,2.027-0.043,2.006    s-0.139-0.103-0.257-0.184c-0.118-0.081-0.291-0.197-0.385-0.257c-0.094-0.061-0.19-0.11-0.214-0.11    c-0.024,0-0.837-0.464-1.807-1.03L265.498,320.993c-0.97-0.566-2.556-1.497-3.524-2.068l-0.839-0.495    c-0.968-0.571-2.452-1.451-3.298-1.956c-0.846-0.505-0.743-1.379,0.229-1.944l6.209-3.604c0.972-0.564,1.825-1.059,1.895-1.099    c0.071-0.04,0.186-0.107,0.257-0.147c0.071-0.04,0.923-0.535,1.895-1.1l5.44-3.161c0.972-0.564,2.56-1.49,3.531-2.057    L510.236,167.293z" />
                              </g>
                              <circle style="opacity:0.68;fill:#EEF3CA;" cx="377.142" cy="75.101" r="38.186" />
                              <path style="fill:#C0874A;"
                                 d="M512,425.251v45.808h-0.513l-7.35,0.342H27.689l-0.341-7.094   c8.632-5.896,20.082-13.845,27.518-18.887l1.025-0.684l24.956-17.178l38.97-26.92l11.28-7.777l118.365-81.615l7.947-5.556   c1.88-1.195,4.017-2.222,6.324-2.904c2.735-0.941,5.726-1.539,8.717-1.795c1.025-0.086,1.965-0.171,2.991-0.086   c1.025-0.171,2.052-0.171,3.077-0.171c2.735-0.085,5.385,0.171,7.948,0.683c2.734,0.513,5.213,1.369,7.435,2.564l89.735,49.91   l44.354,24.697l11.538,6.41l41.79,23.245l27.518,15.298c0.77,0.428,1.624,0.855,2.479,1.368   C511.487,424.995,511.743,425.166,512,425.251z" />
                              <path style="fill:#ECB168;"
                                 d="M512,441.404v29.997H0.598v-29.997c8.974-5.471,20.768-12.905,28.459-17.52l1.025-0.684   l25.724-15.98l40.252-24.955l11.623-7.264l122.125-75.805l8.204-5.127c4.273-2.564,9.828-3.846,15.298-3.932   c1.025-0.086,1.965-0.086,2.991,0c1.026-0.086,2.051-0.086,3.077,0c2.393,0,4.701,0.257,6.923,0.769   c3.077,0.599,5.896,1.71,8.29,3.163l11.879,7.349l75.377,46.834l43.073,26.75l11.196,7.007l40.68,25.212l26.748,16.665   c0.77,0.428,1.539,0.854,2.393,1.367c5.47,3.505,12.477,7.864,19.058,11.88C507.385,438.669,509.778,440.122,512,441.404z" />
                              <path style="opacity:0.2;fill:#BADB9E;"
                                 d="M467.816,16.066v4.273c0-8.887-7.863-16.066-17.605-16.066H62.301   c-9.656,0-17.604,7.178-17.604,16.066v-4.273C44.696,7.178,52.645,0,62.301,0h387.911C459.953,0,467.816,7.178,467.816,16.066z" />
                           </g>
                        </svg>
                      </a>
                     </td>
                     <td><a href="mailto:info@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">info@siaimmigration.com</a></td>
                  </tr>
               </table>
            </td>
          <td style="width: 50%; padding: 0px;">
            <table width="100%" border="0" cellpadding="8" cellspacing="0">
              <tr>
                <td style="padding: 0px; width: 50%;">
                  <table width="100%" border="0" cellpadding="8" cellspacing="0">
                    <tr>
                       <td width="5%">
                        <a href="https://api.whatsapp.com/send?phone=16047861214" target="_blank" style="color: #000; text-decoration: none;">
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             width="24px" height="24px" viewBox="0 0 1024 1024">
                             <defs>
                                <path id="a"
                                   d="M1023.941 765.153c0 5.606-.171 17.766-.508 27.159-.824 22.982-2.646 52.639-5.401 66.151-4.141 20.306-10.392 39.472-18.542 55.425-9.643 18.871-21.943 35.775-36.559 50.364-14.584 14.56-31.472 26.812-50.315 36.416-16.036 8.172-35.322 14.426-55.744 18.549-13.378 2.701-42.812 4.488-65.648 5.3-9.402.336-21.564.505-27.15.505l-504.226-.081c-5.607 0-17.765-.172-27.158-.509-22.983-.824-52.639-2.646-66.152-5.4-20.306-4.142-39.473-10.392-55.425-18.542-18.872-9.644-35.775-21.944-50.364-36.56-14.56-14.584-26.812-31.471-36.415-50.314-8.174-16.037-14.428-35.323-18.551-55.744-2.7-13.378-4.487-42.812-5.3-65.649-.334-9.401-.503-21.563-.503-27.148l.08-504.228c0-5.607.171-17.766.508-27.159.825-22.983 2.646-52.639 5.401-66.151 4.141-20.306 10.391-39.473 18.542-55.426C34.154 93.24 46.455 76.336 61.07 61.747c14.584-14.559 31.472-26.812 50.315-36.416 16.037-8.172 35.324-14.426 55.745-18.549 13.377-2.701 42.812-4.488 65.648-5.3 9.402-.335 21.565-.504 27.149-.504l504.227.081c5.608 0 17.766.171 27.159.508 22.983.825 52.638 2.646 66.152 5.401 20.305 4.141 39.472 10.391 55.425 18.542 18.871 9.643 35.774 21.944 50.363 36.559 14.559 14.584 26.812 31.471 36.415 50.315 8.174 16.037 14.428 35.323 18.551 55.744 2.7 13.378 4.486 42.812 5.3 65.649.335 9.402.504 21.564.504 27.15l-.082 504.226z" />
                             </defs>
                             <linearGradient id="b" gradientUnits="userSpaceOnUse" x1="512.001" y1=".978" x2="512.001" y2="1025.023">
                                <stop offset="0" stop-color="#61fd7d" />
                                <stop offset="1" stop-color="#2bb826" />
                             </linearGradient>
                             <use xlink:href="#a" overflow="visible" fill="url(#b)" />
                             <g>
                                <path fill="#FFF"
                                   d="M783.302 243.246c-69.329-69.387-161.529-107.619-259.763-107.658-202.402 0-367.133 164.668-367.214 367.072-.026 64.699 16.883 127.854 49.017 183.522l-52.096 190.229 194.665-51.047c53.636 29.244 114.022 44.656 175.482 44.682h.151c202.382 0 367.128-164.688 367.21-367.094.039-98.087-38.121-190.319-107.452-259.706zM523.544 808.047h-.125c-54.767-.021-108.483-14.729-155.344-42.529l-11.146-6.612-115.517 30.293 30.834-112.592-7.259-11.544c-30.552-48.579-46.688-104.729-46.664-162.379.066-168.229 136.985-305.096 305.339-305.096 81.521.031 158.154 31.811 215.779 89.482s89.342 134.332 89.312 215.859c-.066 168.243-136.984 305.118-305.209 305.118zm167.415-228.515c-9.177-4.591-54.286-26.782-62.697-29.843-8.41-3.062-14.526-4.592-20.645 4.592-6.115 9.182-23.699 29.843-29.053 35.964-5.352 6.122-10.704 6.888-19.879 2.296-9.176-4.591-38.74-14.277-73.786-45.526-27.275-24.319-45.691-54.359-51.043-63.543-5.352-9.183-.569-14.146 4.024-18.72 4.127-4.109 9.175-10.713 13.763-16.069 4.587-5.355 6.117-9.183 9.175-15.304 3.059-6.122 1.529-11.479-.765-16.07-2.293-4.591-20.644-49.739-28.29-68.104-7.447-17.886-15.013-15.466-20.645-15.747-5.346-.266-11.469-.322-17.585-.322s-16.057 2.295-24.467 11.478-32.113 31.374-32.113 76.521c0 45.147 32.877 88.764 37.465 94.885 4.588 6.122 64.699 98.771 156.741 138.502 21.892 9.45 38.982 15.094 52.308 19.322 21.98 6.979 41.982 5.995 57.793 3.634 17.628-2.633 54.284-22.189 61.932-43.615 7.646-21.427 7.646-39.791 5.352-43.617-2.294-3.826-8.41-6.122-17.585-10.714z" />
                             </g>
                          </svg>
                        </a>
                       </td>
                       <td width="95%"><span style="color: #000;">+1 (604) 786-1214</span><br />
                        <a href="https://api.whatsapp.com/send?phone=16047861214" target="_blank"  style="color: #437a01; text-decoration: none;">(Whatsapp Click)</a>
                     </td>
                     </tr>
                     </table>
                </td>
                </tr>
                <tr>
                <td style="padding: 0px; width: 50%;">
                  <table width="100%" border="0" cellpadding="8" cellspacing="0">
                    <tr>
                       <td width="5%">
                        <a href="mailto:mkj@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                             id="_x36_" width="24px" height="24px" viewBox="0 0 512 512" xml:space="preserve">
                             <g>
                                <polygon style="fill:#C0874A;"
                                   points="511.401,173.663 502.513,179.269 458.244,207.066 268.606,326.073 266.213,327.652    265.699,327.968 256.043,334.048 255.701,334.207 247.753,329.232 246.299,328.284 66.659,215.516 54.439,207.856 0.598,174.057    0,173.663 54.439,139.469 249.548,16.988 261.854,16.988 458.244,140.258 464.74,144.365  " />
                                <path style="fill:#69B25F;"
                                   d="M467.859,16.065v383.862c0,8.807-7.88,15.985-17.641,15.985H62.29   c-9.671,0-17.551-7.178-17.551-15.985V16.065C44.739,7.176,52.619,0,62.29,0h387.928C459.978,0,467.859,7.176,467.859,16.065z" />
                                <g>
                                   <g>
                                      <rect x="110.787" y="75.101" style="fill:#A2CC86;" width="190.508" height="25.378" />
                                      <rect x="110.787" y="71.093" style="fill:#53A654;" width="190.508" height="25.378" />
                                   </g>
                                   <g>
                                      <rect x="110.787" y="214.682" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                      <rect x="110.787" y="210.675" style="fill:#53A654;" width="289.501" height="25.378" />
                                   </g>
                                   <g>
                                      <rect x="110.787" y="284.473" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                      <rect x="110.787" y="280.466" style="fill:#53A654;" width="289.501" height="25.378" />
                                   </g>
                                   <g>
                                      <rect x="110.787" y="144.891" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                      <rect x="110.787" y="140.884" style="fill:#53A654;" width="289.501" height="25.378" />
                                   </g>
                                </g>
                                <polygon style="fill:#F0BA7D;"
                                   points="256.299,322.118 253.308,323.881 195.45,357.662 188.356,361.847 12.392,464.583    0.598,471.413 0.598,172.824 71.446,214.169 246.642,316.464 248.009,317.272 256.043,321.971  " />
                                <g>
                                   <path style="fill:#E5A864;"
                                      d="M510.236,167.293c0.97-0.567,1.764-0.111,1.764,1.013v294.576c0,1.124-0.019,2.027-0.043,2.006    s-0.139-0.103-0.257-0.184c-0.118-0.081-0.291-0.197-0.385-0.257c-0.094-0.061-0.19-0.11-0.214-0.11    c-0.024,0-0.837-0.464-1.807-1.03L265.498,320.993c-0.97-0.566-2.556-1.497-3.524-2.068l-0.839-0.495    c-0.968-0.571-2.452-1.451-3.298-1.956c-0.846-0.505-0.743-1.379,0.229-1.944l6.209-3.604c0.972-0.564,1.825-1.059,1.895-1.099    c0.071-0.04,0.186-0.107,0.257-0.147c0.071-0.04,0.923-0.535,1.895-1.1l5.44-3.161c0.972-0.564,2.56-1.49,3.531-2.057    L510.236,167.293z" />
                                </g>
                                <circle style="opacity:0.68;fill:#EEF3CA;" cx="377.142" cy="75.101" r="38.186" />
                                <path style="fill:#C0874A;"
                                   d="M512,425.251v45.808h-0.513l-7.35,0.342H27.689l-0.341-7.094   c8.632-5.896,20.082-13.845,27.518-18.887l1.025-0.684l24.956-17.178l38.97-26.92l11.28-7.777l118.365-81.615l7.947-5.556   c1.88-1.195,4.017-2.222,6.324-2.904c2.735-0.941,5.726-1.539,8.717-1.795c1.025-0.086,1.965-0.171,2.991-0.086   c1.025-0.171,2.052-0.171,3.077-0.171c2.735-0.085,5.385,0.171,7.948,0.683c2.734,0.513,5.213,1.369,7.435,2.564l89.735,49.91   l44.354,24.697l11.538,6.41l41.79,23.245l27.518,15.298c0.77,0.428,1.624,0.855,2.479,1.368   C511.487,424.995,511.743,425.166,512,425.251z" />
                                <path style="fill:#ECB168;"
                                   d="M512,441.404v29.997H0.598v-29.997c8.974-5.471,20.768-12.905,28.459-17.52l1.025-0.684   l25.724-15.98l40.252-24.955l11.623-7.264l122.125-75.805l8.204-5.127c4.273-2.564,9.828-3.846,15.298-3.932   c1.025-0.086,1.965-0.086,2.991,0c1.026-0.086,2.051-0.086,3.077,0c2.393,0,4.701,0.257,6.923,0.769   c3.077,0.599,5.896,1.71,8.29,3.163l11.879,7.349l75.377,46.834l43.073,26.75l11.196,7.007l40.68,25.212l26.748,16.665   c0.77,0.428,1.539,0.854,2.393,1.367c5.47,3.505,12.477,7.864,19.058,11.88C507.385,438.669,509.778,440.122,512,441.404z" />
                                <path style="opacity:0.2;fill:#BADB9E;"
                                   d="M467.816,16.066v4.273c0-8.887-7.863-16.066-17.605-16.066H62.301   c-9.656,0-17.604,7.178-17.604,16.066v-4.273C44.696,7.178,52.645,0,62.301,0h387.911C459.953,0,467.816,7.178,467.816,16.066z" />
                             </g>
                          </svg>
                        </a>
                       </td>
                       <td width="95%"><a href="mailto:mkj@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">mkj@siaimmigration.com</a></td>
                    </tr>
                 </table>
                </td>
              </tr>
            </table>
          </td>
         </tr>
         <tr>
            <td colspan="2" style="padding: 0px;"><div style="border-bottom: 5px solid #ffbe12; padding:10px 0px;"></div></td>
         </tr>
         <tr>
            <td colspan="2" style="font-size: 18px; font-weight: bold; color: #5A891F; text-align: center; padding-top: 20px;"><u>Student Admissions (Onshore/Offshore)</u></td>
         </tr>
		 
		  <tr>
          <td style="padding: 0px;">
            <table width="100%" border="0" cellpadding="8" cellspacing="0">
                  <tr>
                     <td width="5%">
                      <a href="https://api.whatsapp.com/send?phone=16049163289" target="_blank" style="color: #000; text-decoration: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                           width="24px" height="24px" viewBox="0 0 1024 1024">
                           <defs>
                              <path id="a2"
                                 d="M1023.941 765.153c0 5.606-.171 17.766-.508 27.159-.824 22.982-2.646 52.639-5.401 66.151-4.141 20.306-10.392 39.472-18.542 55.425-9.643 18.871-21.943 35.775-36.559 50.364-14.584 14.56-31.472 26.812-50.315 36.416-16.036 8.172-35.322 14.426-55.744 18.549-13.378 2.701-42.812 4.488-65.648 5.3-9.402.336-21.564.505-27.15.505l-504.226-.081c-5.607 0-17.765-.172-27.158-.509-22.983-.824-52.639-2.646-66.152-5.4-20.306-4.142-39.473-10.392-55.425-18.542-18.872-9.644-35.775-21.944-50.364-36.56-14.56-14.584-26.812-31.471-36.415-50.314-8.174-16.037-14.428-35.323-18.551-55.744-2.7-13.378-4.487-42.812-5.3-65.649-.334-9.401-.503-21.563-.503-27.148l.08-504.228c0-5.607.171-17.766.508-27.159.825-22.983 2.646-52.639 5.401-66.151 4.141-20.306 10.391-39.473 18.542-55.426C34.154 93.24 46.455 76.336 61.07 61.747c14.584-14.559 31.472-26.812 50.315-36.416 16.037-8.172 35.324-14.426 55.745-18.549 13.377-2.701 42.812-4.488 65.648-5.3 9.402-.335 21.565-.504 27.149-.504l504.227.081c5.608 0 17.766.171 27.159.508 22.983.825 52.638 2.646 66.152 5.401 20.305 4.141 39.472 10.391 55.425 18.542 18.871 9.643 35.774 21.944 50.363 36.559 14.559 14.584 26.812 31.471 36.415 50.315 8.174 16.037 14.428 35.323 18.551 55.744 2.7 13.378 4.486 42.812 5.3 65.649.335 9.402.504 21.564.504 27.15l-.082 504.226z" />
                           </defs>
                           <linearGradient id="b2" gradientUnits="userSpaceOnUse" x1="512.001" y1=".978" x2="512.001"
                              y2="1025.023">
                              <stop offset="0" stop-color="#61fd7d" />
                              <stop offset="1" stop-color="#2bb826" />
                           </linearGradient>
                           <use xlink:href="#a" overflow="visible" fill="url(#b)" />
                           <g>
                              <path fill="#FFF"
                                 d="M783.302 243.246c-69.329-69.387-161.529-107.619-259.763-107.658-202.402 0-367.133 164.668-367.214 367.072-.026 64.699 16.883 127.854 49.017 183.522l-52.096 190.229 194.665-51.047c53.636 29.244 114.022 44.656 175.482 44.682h.151c202.382 0 367.128-164.688 367.21-367.094.039-98.087-38.121-190.319-107.452-259.706zM523.544 808.047h-.125c-54.767-.021-108.483-14.729-155.344-42.529l-11.146-6.612-115.517 30.293 30.834-112.592-7.259-11.544c-30.552-48.579-46.688-104.729-46.664-162.379.066-168.229 136.985-305.096 305.339-305.096 81.521.031 158.154 31.811 215.779 89.482s89.342 134.332 89.312 215.859c-.066 168.243-136.984 305.118-305.209 305.118zm167.415-228.515c-9.177-4.591-54.286-26.782-62.697-29.843-8.41-3.062-14.526-4.592-20.645 4.592-6.115 9.182-23.699 29.843-29.053 35.964-5.352 6.122-10.704 6.888-19.879 2.296-9.176-4.591-38.74-14.277-73.786-45.526-27.275-24.319-45.691-54.359-51.043-63.543-5.352-9.183-.569-14.146 4.024-18.72 4.127-4.109 9.175-10.713 13.763-16.069 4.587-5.355 6.117-9.183 9.175-15.304 3.059-6.122 1.529-11.479-.765-16.07-2.293-4.591-20.644-49.739-28.29-68.104-7.447-17.886-15.013-15.466-20.645-15.747-5.346-.266-11.469-.322-17.585-.322s-16.057 2.295-24.467 11.478-32.113 31.374-32.113 76.521c0 45.147 32.877 88.764 37.465 94.885 4.588 6.122 64.699 98.771 156.741 138.502 21.892 9.45 38.982 15.094 52.308 19.322 21.98 6.979 41.982 5.995 57.793 3.634 17.628-2.633 54.284-22.189 61.932-43.615 7.646-21.427 7.646-39.791 5.352-43.617-2.294-3.826-8.41-6.122-17.585-10.714z" />
                           </g>
                        </svg>
                      </a>
                     </td>
                     <td width="95%"><span style="color: #000;">+1 (604) 916-3289</span><br />
                        <a href="https://api.whatsapp.com/send?phone=16049163289" target="_blank" style="color: #437a01; text-decoration: none;">(Whatsapp Click)</a>
                     <td>
                     </td>
                  </tr>
               </table>
            </td>
            <td style="padding: 0px;">
            <table width="100%" border="0" cellpadding="8" cellspacing="0">
                  <tr>
                     <td width="5%">
                      <a href="https://api.whatsapp.com/send?phone=17782228561" target="_blank" style="color: #000; text-decoration: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                           width="24px" height="24px" viewBox="0 0 1024 1024">
                           <defs>
                              <path id="a2"
                                 d="M1023.941 765.153c0 5.606-.171 17.766-.508 27.159-.824 22.982-2.646 52.639-5.401 66.151-4.141 20.306-10.392 39.472-18.542 55.425-9.643 18.871-21.943 35.775-36.559 50.364-14.584 14.56-31.472 26.812-50.315 36.416-16.036 8.172-35.322 14.426-55.744 18.549-13.378 2.701-42.812 4.488-65.648 5.3-9.402.336-21.564.505-27.15.505l-504.226-.081c-5.607 0-17.765-.172-27.158-.509-22.983-.824-52.639-2.646-66.152-5.4-20.306-4.142-39.473-10.392-55.425-18.542-18.872-9.644-35.775-21.944-50.364-36.56-14.56-14.584-26.812-31.471-36.415-50.314-8.174-16.037-14.428-35.323-18.551-55.744-2.7-13.378-4.487-42.812-5.3-65.649-.334-9.401-.503-21.563-.503-27.148l.08-504.228c0-5.607.171-17.766.508-27.159.825-22.983 2.646-52.639 5.401-66.151 4.141-20.306 10.391-39.473 18.542-55.426C34.154 93.24 46.455 76.336 61.07 61.747c14.584-14.559 31.472-26.812 50.315-36.416 16.037-8.172 35.324-14.426 55.745-18.549 13.377-2.701 42.812-4.488 65.648-5.3 9.402-.335 21.565-.504 27.149-.504l504.227.081c5.608 0 17.766.171 27.159.508 22.983.825 52.638 2.646 66.152 5.401 20.305 4.141 39.472 10.391 55.425 18.542 18.871 9.643 35.774 21.944 50.363 36.559 14.559 14.584 26.812 31.471 36.415 50.315 8.174 16.037 14.428 35.323 18.551 55.744 2.7 13.378 4.486 42.812 5.3 65.649.335 9.402.504 21.564.504 27.15l-.082 504.226z" />
                           </defs>
                           <linearGradient id="b2" gradientUnits="userSpaceOnUse" x1="512.001" y1=".978" x2="512.001"
                              y2="1025.023">
                              <stop offset="0" stop-color="#61fd7d" />
                              <stop offset="1" stop-color="#2bb826" />
                           </linearGradient>
                           <use xlink:href="#a" overflow="visible" fill="url(#b)" />
                           <g>
                              <path fill="#FFF"
                                 d="M783.302 243.246c-69.329-69.387-161.529-107.619-259.763-107.658-202.402 0-367.133 164.668-367.214 367.072-.026 64.699 16.883 127.854 49.017 183.522l-52.096 190.229 194.665-51.047c53.636 29.244 114.022 44.656 175.482 44.682h.151c202.382 0 367.128-164.688 367.21-367.094.039-98.087-38.121-190.319-107.452-259.706zM523.544 808.047h-.125c-54.767-.021-108.483-14.729-155.344-42.529l-11.146-6.612-115.517 30.293 30.834-112.592-7.259-11.544c-30.552-48.579-46.688-104.729-46.664-162.379.066-168.229 136.985-305.096 305.339-305.096 81.521.031 158.154 31.811 215.779 89.482s89.342 134.332 89.312 215.859c-.066 168.243-136.984 305.118-305.209 305.118zm167.415-228.515c-9.177-4.591-54.286-26.782-62.697-29.843-8.41-3.062-14.526-4.592-20.645 4.592-6.115 9.182-23.699 29.843-29.053 35.964-5.352 6.122-10.704 6.888-19.879 2.296-9.176-4.591-38.74-14.277-73.786-45.526-27.275-24.319-45.691-54.359-51.043-63.543-5.352-9.183-.569-14.146 4.024-18.72 4.127-4.109 9.175-10.713 13.763-16.069 4.587-5.355 6.117-9.183 9.175-15.304 3.059-6.122 1.529-11.479-.765-16.07-2.293-4.591-20.644-49.739-28.29-68.104-7.447-17.886-15.013-15.466-20.645-15.747-5.346-.266-11.469-.322-17.585-.322s-16.057 2.295-24.467 11.478-32.113 31.374-32.113 76.521c0 45.147 32.877 88.764 37.465 94.885 4.588 6.122 64.699 98.771 156.741 138.502 21.892 9.45 38.982 15.094 52.308 19.322 21.98 6.979 41.982 5.995 57.793 3.634 17.628-2.633 54.284-22.189 61.932-43.615 7.646-21.427 7.646-39.791 5.352-43.617-2.294-3.826-8.41-6.122-17.585-10.714z" />
                           </g>
                        </svg>
                      </a>
                     </td>
                     <td width="95%"><span style="color: #000;">+1 (778) 222-8561</span><br />
                        <a href="https://api.whatsapp.com/send?phone=17782228561" target="_blank" style="color: #437a01; text-decoration: none;">(Whatsapp Click)</a>
                     <td>
                     </td>
                  </tr>
               </table>
            </td>
            
         </tr>
         <tr>
          	<td style="padding: 0px;">
               <table width="100%" border="0" cellpadding="8" cellspacing="0">
                     <tr>
                        <td>
                         <a href="mailto:info@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                              id="_x36_2" width="24px" height="24px" viewBox="0 0 512 512" xml:space="preserve">
                              <g>
                                 <polygon style="fill:#C0874A;"
                                    points="511.401,173.663 502.513,179.269 458.244,207.066 268.606,326.073 266.213,327.652    265.699,327.968 256.043,334.048 255.701,334.207 247.753,329.232 246.299,328.284 66.659,215.516 54.439,207.856 0.598,174.057    0,173.663 54.439,139.469 249.548,16.988 261.854,16.988 458.244,140.258 464.74,144.365  " />
                                 <path style="fill:#69B25F;"
                                    d="M467.859,16.065v383.862c0,8.807-7.88,15.985-17.641,15.985H62.29   c-9.671,0-17.551-7.178-17.551-15.985V16.065C44.739,7.176,52.619,0,62.29,0h387.928C459.978,0,467.859,7.176,467.859,16.065z" />
                                 <g>
                                    <g>
                                       <rect x="110.787" y="75.101" style="fill:#A2CC86;" width="190.508" height="25.378" />
                                       <rect x="110.787" y="71.093" style="fill:#53A654;" width="190.508" height="25.378" />
                                    </g>
                                    <g>
                                       <rect x="110.787" y="214.682" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                       <rect x="110.787" y="210.675" style="fill:#53A654;" width="289.501" height="25.378" />
                                    </g>
                                    <g>
                                       <rect x="110.787" y="284.473" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                       <rect x="110.787" y="280.466" style="fill:#53A654;" width="289.501" height="25.378" />
                                    </g>
                                    <g>
                                       <rect x="110.787" y="144.891" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                       <rect x="110.787" y="140.884" style="fill:#53A654;" width="289.501" height="25.378" />
                                    </g>
                                 </g>
                                 <polygon style="fill:#F0BA7D;"
                                    points="256.299,322.118 253.308,323.881 195.45,357.662 188.356,361.847 12.392,464.583    0.598,471.413 0.598,172.824 71.446,214.169 246.642,316.464 248.009,317.272 256.043,321.971  " />
                                 <g>
                                    <path style="fill:#E5A864;"
                                       d="M510.236,167.293c0.97-0.567,1.764-0.111,1.764,1.013v294.576c0,1.124-0.019,2.027-0.043,2.006    s-0.139-0.103-0.257-0.184c-0.118-0.081-0.291-0.197-0.385-0.257c-0.094-0.061-0.19-0.11-0.214-0.11    c-0.024,0-0.837-0.464-1.807-1.03L265.498,320.993c-0.97-0.566-2.556-1.497-3.524-2.068l-0.839-0.495    c-0.968-0.571-2.452-1.451-3.298-1.956c-0.846-0.505-0.743-1.379,0.229-1.944l6.209-3.604c0.972-0.564,1.825-1.059,1.895-1.099    c0.071-0.04,0.186-0.107,0.257-0.147c0.071-0.04,0.923-0.535,1.895-1.1l5.44-3.161c0.972-0.564,2.56-1.49,3.531-2.057    L510.236,167.293z" />
                                 </g>
                                 <circle style="opacity:0.68;fill:#EEF3CA;" cx="377.142" cy="75.101" r="38.186" />
                                 <path style="fill:#C0874A;"
                                    d="M512,425.251v45.808h-0.513l-7.35,0.342H27.689l-0.341-7.094   c8.632-5.896,20.082-13.845,27.518-18.887l1.025-0.684l24.956-17.178l38.97-26.92l11.28-7.777l118.365-81.615l7.947-5.556   c1.88-1.195,4.017-2.222,6.324-2.904c2.735-0.941,5.726-1.539,8.717-1.795c1.025-0.086,1.965-0.171,2.991-0.086   c1.025-0.171,2.052-0.171,3.077-0.171c2.735-0.085,5.385,0.171,7.948,0.683c2.734,0.513,5.213,1.369,7.435,2.564l89.735,49.91   l44.354,24.697l11.538,6.41l41.79,23.245l27.518,15.298c0.77,0.428,1.624,0.855,2.479,1.368   C511.487,424.995,511.743,425.166,512,425.251z" />
                                 <path style="fill:#ECB168;"
                                    d="M512,441.404v29.997H0.598v-29.997c8.974-5.471,20.768-12.905,28.459-17.52l1.025-0.684   l25.724-15.98l40.252-24.955l11.623-7.264l122.125-75.805l8.204-5.127c4.273-2.564,9.828-3.846,15.298-3.932   c1.025-0.086,1.965-0.086,2.991,0c1.026-0.086,2.051-0.086,3.077,0c2.393,0,4.701,0.257,6.923,0.769   c3.077,0.599,5.896,1.71,8.29,3.163l11.879,7.349l75.377,46.834l43.073,26.75l11.196,7.007l40.68,25.212l26.748,16.665   c0.77,0.428,1.539,0.854,2.393,1.367c5.47,3.505,12.477,7.864,19.058,11.88C507.385,438.669,509.778,440.122,512,441.404z" />
                                 <path style="opacity:0.2;fill:#BADB9E;"
                                    d="M467.816,16.066v4.273c0-8.887-7.863-16.066-17.605-16.066H62.301   c-9.656,0-17.604,7.178-17.604,16.066v-4.273C44.696,7.178,52.645,0,62.301,0h387.911C459.953,0,467.816,7.178,467.816,16.066z" />
                              </g>
                           </svg>
                         </a>
                        </td>
                        <td><a href="mailto:info@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">info@siaimmigration.com</a></td>
                     </tr>
                  </table>
               </td>
            <td style="padding: 0px;">
               <table width="100%" border="0" cellpadding="8" cellspacing="0">
                     <tr>
                        <td>
                         <a href="mailto:info@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                              id="_x36_2" width="24px" height="24px" viewBox="0 0 512 512" xml:space="preserve">
                              <g>
                                 <polygon style="fill:#C0874A;"
                                    points="511.401,173.663 502.513,179.269 458.244,207.066 268.606,326.073 266.213,327.652    265.699,327.968 256.043,334.048 255.701,334.207 247.753,329.232 246.299,328.284 66.659,215.516 54.439,207.856 0.598,174.057    0,173.663 54.439,139.469 249.548,16.988 261.854,16.988 458.244,140.258 464.74,144.365  " />
                                 <path style="fill:#69B25F;"
                                    d="M467.859,16.065v383.862c0,8.807-7.88,15.985-17.641,15.985H62.29   c-9.671,0-17.551-7.178-17.551-15.985V16.065C44.739,7.176,52.619,0,62.29,0h387.928C459.978,0,467.859,7.176,467.859,16.065z" />
                                 <g>
                                    <g>
                                       <rect x="110.787" y="75.101" style="fill:#A2CC86;" width="190.508" height="25.378" />
                                       <rect x="110.787" y="71.093" style="fill:#53A654;" width="190.508" height="25.378" />
                                    </g>
                                    <g>
                                       <rect x="110.787" y="214.682" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                       <rect x="110.787" y="210.675" style="fill:#53A654;" width="289.501" height="25.378" />
                                    </g>
                                    <g>
                                       <rect x="110.787" y="284.473" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                       <rect x="110.787" y="280.466" style="fill:#53A654;" width="289.501" height="25.378" />
                                    </g>
                                    <g>
                                       <rect x="110.787" y="144.891" style="fill:#A2CC86;" width="289.501" height="25.378" />
                                       <rect x="110.787" y="140.884" style="fill:#53A654;" width="289.501" height="25.378" />
                                    </g>
                                 </g>
                                 <polygon style="fill:#F0BA7D;"
                                    points="256.299,322.118 253.308,323.881 195.45,357.662 188.356,361.847 12.392,464.583    0.598,471.413 0.598,172.824 71.446,214.169 246.642,316.464 248.009,317.272 256.043,321.971  " />
                                 <g>
                                    <path style="fill:#E5A864;"
                                       d="M510.236,167.293c0.97-0.567,1.764-0.111,1.764,1.013v294.576c0,1.124-0.019,2.027-0.043,2.006    s-0.139-0.103-0.257-0.184c-0.118-0.081-0.291-0.197-0.385-0.257c-0.094-0.061-0.19-0.11-0.214-0.11    c-0.024,0-0.837-0.464-1.807-1.03L265.498,320.993c-0.97-0.566-2.556-1.497-3.524-2.068l-0.839-0.495    c-0.968-0.571-2.452-1.451-3.298-1.956c-0.846-0.505-0.743-1.379,0.229-1.944l6.209-3.604c0.972-0.564,1.825-1.059,1.895-1.099    c0.071-0.04,0.186-0.107,0.257-0.147c0.071-0.04,0.923-0.535,1.895-1.1l5.44-3.161c0.972-0.564,2.56-1.49,3.531-2.057    L510.236,167.293z" />
                                 </g>
                                 <circle style="opacity:0.68;fill:#EEF3CA;" cx="377.142" cy="75.101" r="38.186" />
                                 <path style="fill:#C0874A;"
                                    d="M512,425.251v45.808h-0.513l-7.35,0.342H27.689l-0.341-7.094   c8.632-5.896,20.082-13.845,27.518-18.887l1.025-0.684l24.956-17.178l38.97-26.92l11.28-7.777l118.365-81.615l7.947-5.556   c1.88-1.195,4.017-2.222,6.324-2.904c2.735-0.941,5.726-1.539,8.717-1.795c1.025-0.086,1.965-0.171,2.991-0.086   c1.025-0.171,2.052-0.171,3.077-0.171c2.735-0.085,5.385,0.171,7.948,0.683c2.734,0.513,5.213,1.369,7.435,2.564l89.735,49.91   l44.354,24.697l11.538,6.41l41.79,23.245l27.518,15.298c0.77,0.428,1.624,0.855,2.479,1.368   C511.487,424.995,511.743,425.166,512,425.251z" />
                                 <path style="fill:#ECB168;"
                                    d="M512,441.404v29.997H0.598v-29.997c8.974-5.471,20.768-12.905,28.459-17.52l1.025-0.684   l25.724-15.98l40.252-24.955l11.623-7.264l122.125-75.805l8.204-5.127c4.273-2.564,9.828-3.846,15.298-3.932   c1.025-0.086,1.965-0.086,2.991,0c1.026-0.086,2.051-0.086,3.077,0c2.393,0,4.701,0.257,6.923,0.769   c3.077,0.599,5.896,1.71,8.29,3.163l11.879,7.349l75.377,46.834l43.073,26.75l11.196,7.007l40.68,25.212l26.748,16.665   c0.77,0.428,1.539,0.854,2.393,1.367c5.47,3.505,12.477,7.864,19.058,11.88C507.385,438.669,509.778,440.122,512,441.404z" />
                                 <path style="opacity:0.2;fill:#BADB9E;"
                                    d="M467.816,16.066v4.273c0-8.887-7.863-16.066-17.605-16.066H62.301   c-9.656,0-17.604,7.178-17.604,16.066v-4.273C44.696,7.178,52.645,0,62.301,0h387.911C459.953,0,467.816,7.178,467.816,16.066z" />
                              </g>
                           </svg>
                         </a>
                        </td>
                        <td><a href="mailto:help@siaimmigration.com" target="_blank" style="color: #000; text-decoration: none;">help@siaimmigration.com</a></td>
                     </tr>
                  </table>
               </td>
         </tr>
		 
         
         <tr>
            <td colspan="2"></td>
         </tr>
         <tr>
            <td colspan="2" style="background: #79B52F; color: #fff; font-weight: bold; text-align: center; padding: 10px 0px;">We look forward to assisting you!</td>
         </tr>
         <tr>
            <td colspan="2" style="background: #262626; text-align: center;">
              <table width="100%" border="0" cellpadding="8" cellspacing="0" align="center">
                <tr>
                  <td style="text-align: center;"><img src="https://www.siaimmigration.com/assets/images/accredited/3bestlogsmall.png" width="150" alt="" /></td>
               </tr>
               <tr>
                <td style="color: #fff;text-align: center;"><span style="color: #79B52F;">Siaimmigration</span> | All rights reserved.</td>
             </tr>
             </table>
            </td>
         </tr>
      </table>
   </body>';
   
   $to = array('no-reply@siaimmigration.com');
    $cc = [$email11.'ds@siaimmigration.com'];
    $email1->setMailType('html');
    $email1->setFrom('no-reply@siaimmigration.com', $From1);
    $email1->setTo('mj@siaimmigration.com,ds@siaimmigration.com');
    $email1->setCC($cc);
    $email1->setReplyTo('no-reply@siaimmigration.com');
    $email1->setSubject($subject1);
    $email1->setMessage($message1);
    $email1->send();
   
    
    
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
					
					
		
	
	//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);

  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			$to = json_decode(EMP_EMAIL, true);
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();
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
					
					
		
	
	//@mail($email.',no-reply@siaimmigration.com',$subject,$message,$headers);
	
	
  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				$to = [$email];
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();



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

  public function view_app_finder_new()
	{
    if (session()->get('isLoggedIn') !=true) {
    return redirect()->to('index');
    }
    $data = [];
    //$Approve = new Client_application_model();  
    //$data['app_finder'] = $Approve->app_finder(); 
    return view('admin/app_finder/view_app_finder_new',$data);
	}


  public function get_app_finder_data()
  {
      $request = service('request');
      $postData = $request->getPost();

      $draw = intval($postData['draw']);
      $start = intval($postData['start']);
      $length = intval($postData['length']);
      $searchValue = $postData['search']['value'];

      $model = new \App\Models\Client_application_model();

      // Get total records
      $totalRecords = $model->getTotalAppFinder();

      // Get filtered records
      $filteredRecords = $model->getFilteredAppFinder($searchValue);

      // Get paginated data
      $data = $model->getPaginatedAppFinder($start, $length, $searchValue);

      $output = [
          "draw" => $draw,
          "recordsTotal" => $totalRecords,
          "recordsFiltered" => $filteredRecords,
          "data" => $data
      ];

      return $this->response->setJSON($output);
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
	'voice_msg'=>$this->request->getPost('news_image1') ?? '',
	'siaportalid'=>$this->request->getPost('Siaportal_id'),
	'category'=>$this->request->getPost('category'),
	'type'=>$this->request->getPost('type'),
	'application_status'=>$this->request->getPost('file_status'),
	'assign_to'=>$this->request->getPost('team_member'),
	'status'=>'1',
	'insert_on'=>date( 'Y-m-d H:i:s' )
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
                  


					$From="Sia Immigration";

					$subject  = "Ready to Apply id-".$id."-Name-".$name."";
					$message =' Hi Team, <br>';
					$message .= 'Application Is Ready to Apply Now <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Name : ' .$name.'<br>';
					$message .= 'Mobile Number : ' .$mobile_no.'<br>';
					$message .= 'Email : ' .$Email.'<br>';
					$message .= 'Category : ' .$cat.'<br>';
					$message .= 'Type : ' .$type.'<br>';

$email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$to = array('no-reply@siaimmigration.com', 'office@siaimmigration.com', 'kam@siaimmigration.com', 'mkj@siaimmigration.com', 'ds@siaimmigration.com', 'Reach@siaimmigration.com', 'support@siaimmigration.com', 'info@siaimmigration.com');
			$cc = json_decode(EMP_EMAIL, true);
				$email1->setFrom('no-reply@siaimmigration.com', $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo('no-reply@siaimmigration.com');
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();
	





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

	// Send assign team member emails (internal team + client)
	$TeamModel = new Team_model();
	$teamMemberData = $TeamModel->where('id', $this->request->getPost('team_member'))->first();
	if ($teamMemberData) {
		$assignedTo = trim($teamMemberData['firstname'] . ' ' . $teamMemberData['lastname']);

		// Internal team notification email
		$emailInt = \Config\Services::email();
		$emailInt->initialize(get_smtp_settings());
		$subjectInt = $assignedTo . ' Assigned (' . $name . ' – SIAPortal ID: ' . $id . ') – Team Member Assigned';
		$msgInt  = 'Hi Team,<br><br>';
		$msgInt .= '<strong>Team Member Assigned</strong><br><br>';
		$msgInt .= 'A team member has been successfully assigned to the following application in the SIA Portal.<br><br>';
		$msgInt .= '<strong>SIAPortal ID:</strong> ' . $id . '<br>';
		$msgInt .= '<strong>Applicant Name:</strong> ' . $name . '<br>';
		$msgInt .= '<strong>Assigned To:</strong> ' . $assignedTo . '<br>';
		$msgInt .= '<strong>Team Member Email:</strong> ' . ($teamMemberData['email'] ?? 'N/A') . '<br>';
		$msgInt .= '<strong>Team Member Phone:</strong> ' . ($teamMemberData['mobile_no'] ?? 'N/A') . '<br>';
		$msgInt .= '<strong>Date:</strong> ' . date('d/m/Y') . '<br><br>';
		$msgInt .= 'All further communication and actions for this application should now be handled by the assigned team member.<br><br>';
		$msgInt .= 'For any updates or support, please coordinate directly with ' . $assignedTo . '.<br><br>';
		$msgInt .= 'Thank you.';
		$toInt = array('no-reply@siaimmigration.com','support@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','reach@siaimmigration.com','info@siaimmigration.com','Admin@siaimmigration.com','office@siaimmigration.com');
		$ccInt = json_decode(EMP_EMAIL, true);
		$emailInt->setFrom('Sia Immigration');
		$emailInt->setTo($toInt);
		$emailInt->setCC($ccInt);
		$emailInt->setReplyTo('no-reply@siaimmigration.com');
		$emailInt->setSubject($subjectInt);
		$emailInt->setMessage($msgInt);
		$emailInt->send();

		// Client notification email via helper
		helper('assign_team_member');
		assign_team_member(
			$name,
			$assignedTo,
			$teamMemberData['mobile_no'] ?? '',
			$mobile_no,
			$Email
		);
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

	$Team = new Team_model();
	$data['team'] = $Team->where('type', 'Employee')->findAll();

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
	
	///////////////
	
		else if($category=='24' && $type=='50'){

		$url = 'Restoration_Of_Status_worker/full_worker_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}
	
		else if($category=='24' && $type=='51'){

		$url = 'Restoration_Of_Status_students/full_student_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}
		else if($category=='24' && $type=='52'){

		$url = 'Restoration_Of_Status_visitors/full_visitors_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}
	///////////////
	

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
					';
		//return view('admin/client_application/edit_intl_stu_spousal_open_wp');

	}
	else if($category=='6' && $type=='24'){

		$url = 'Worker_spousal_open_wp_inland/full_worker_spousal_open_wp_inland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}

else if($category=='44' && $type=='73'){

		$url = 'Lmia_global/full_lmia_global_tlnt_high_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}

	else if($category=='32' && $type=='68'){

		$url = 'Lmia_wp_hg/full_lmia_wp_high_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}

	else if($category=='32' && $type=='56'){

		$url = 'Lmia_wp_lg/full_lmia_wp_low_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}

	else if($category=='42' && $type=='69'){

		$url = 'Lmia_pr_lg/full_lmia_pr_low_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}
		else if($category=='42' && $type=='70'){

		$url = 'Lmia_pr_hg/full_lmia_pr_high_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}

	else if($category=='43' && $type=='71'){

		$url = 'Lmia_dual_int_hg/full_lmia_dual_int_high_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}

	else if($category=='43' && $type=='72'){

		$url = 'Lmia_dual_int_lg/full_lmia_dual_int_low_wage/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

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




///////////	




public function edit_client_application($category,$id,$sid,$type)
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
//echo $category; echo '<br>';	
//echo $type;
//exit();

	if($category=='2' && $type=='2' ){
		
		$url = 'BC_pnp_int_grd/edit_bc_pnp_int_grd_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

//$this->edit_bc_pnp_int_grd($category,$id);
		//return view('admin/client_application/edit_bc_pnp_int_grd');
	}
	else if($category=='2' && $type=='123'){
		$url = 'BC_pnp_int_grd_exp_entery/edit_bc_pnp_int_grd_exp_entery_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}


else if($category=='9' && $type=='32'){
		$url = 'PGWP_application_inland/edit_PGWP_application_inland_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
	}
	else if($category=='8' && $type=='22'){
		$url = 'Study_permit_application_inland/edit_study_permit_application_inland_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
	}

	else if($category=='8' && $type=='22'){
		$url = 'Study_permit_application_inland/edit_study_permit_application_inland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
	}


		else if($category=='59' && $type=='136'){
		$url = 'New_public_policy_for_PR/edit_new_public_policy_for_PR_inland_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
	}

else if($category=='54' && $type=='128'){
		$url = 'Temporary_resident_visa_na/edit_temporary_resident_visa_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
	}

	else if($category=='55' && $type=='129'){
		$url = 'Immigration_application_na/edit_immigration_application_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
	}

	else if($category=='56' && $type=='130'){
		$url = 'Work_permit_LMIA_inland/edit_Work_permit_LMIA_inland_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
	}

else if($category=='56' && $type=='131'){
		$url = 'Work_permit_LMIA_outland/edit_Work_permit_LMIA_outland_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
	}


	else if($category=='16' && $type=='135'){
		$url = 'BC_PNP_Semi_Skilled_na/edit_BC_PNP_Semi_Skilled_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
	}

else if($category=='58' && $type=='134'){
		$url = 'LMIA_exempt_na/edit_LMIA_exempt_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
	}



else if($category=='57' && $type=='132'){
		$url = 'Other_open_work_permit_new_application/edit_other_open_work_permit_new_application_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
	}


else if($category=='57' && $type=='133'){
		$url = 'Other_open_work_permit_extention/edit_other_open_work_permit_extention_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
	}


	else if($category=='7' && $type=='29'){
		$url = 'Study_permit_extension_inland/edit_study_permit_extension_inland_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

	else if($category=='10' && $type=='33'){
		$url = 'PGWP_extension_inland/edit_PGWP_extension_inland_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

else if($category=='19' && $type=='77'){
		$url = 'Super_visa_outland/edit_super_visa_outland_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

	else if($category=='39' && $type=='64'){
		$url = 'Citizenship_certi_application_adult/edit_citizenship_certi_application_adult_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

else if($category=='39' && $type=='65'){
		$url = 'Citizenship_certi_application_minor/edit_citizenship_certi_application_minor_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

	else if($category=='33' && $type=='115'){
		$url = 'Passport_na/edit_passport_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}



	else if($category=='33' && $type=='115'){
		$url = 'Passport_na/edit_passport_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

		else if($category=='23' && $type=='85'){
		$url = 'Visitor_extension_inland/edit_visitor_extension_inland_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}



	else if($category=='31' && $type=='46'){
		$url = 'Common_law_part_sps_inland/edit_common_law_part_sps_inland_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}


	else if($category=='31' && $type=='47'){
		$url = 'Common_law_part_sps_outland/edit_common_law_part_sps_outland/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}


	else if($category=='52' && $type=='125'){
		$url = 'CAIPS_NOTES_CAIPS/edit_caips_notes_caips_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}
	else if($category=='52' && $type=='126'){
		$url = 'CAIPS_NOTES_GCMS/edit_caips_notes_gcms_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}
	else if($category=='53' && $type=='127'){
		$url = 'DLI_NUMBER_CHANGE/edit_dli_number_change_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}


	else if($category=='50' && $type=='124'){
		$url = 'BC_PNP_tech_pilot_skill_worker/edit_bc_pnp_tech_pilot_skill_worker_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}


	else if($category=='16' && $type=='11'){
		$url = 'BC_PNP_semi_skilled_long_haul_truck/edit_bc_pnp_semi_skilled_long_haul_truck_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

	else if($category=='36' && $type=='39'){
		$url = 'Bridging_open_wp_na/edit_bridging_open_wp_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

else if($category=='13' && $type=='16'){
		$url = 'BC_pnp_int_pg_exp_entery/edit_bc_pnp_int_pg_exp_entery_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}


	else if($category=='3' && $type=='3'){
		$url = 'Canadian_exp_class/edit_canadian_exp_class_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

	}

	else if($category=='26' && $type=='100'){

		$url = 'Ainp_na/edit_ainp_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
		

	else if($category=='25' && $type=='101'){

		$url = 'Aipp_na/edit_aipp_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='47' && $type=='102'){

		$url = 'Amend_immi_doc_na/edit_amend_immi_doc_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
		else if($category=='46' && $type=='88'){

		$url = 'Oci/edit_oci_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='17' && $type=='103'){

		$url = 'BC_PNP_heathcare_prof_na/edit_bc_pnp_heathcare_prof_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}

	else if($category=='14' && $type=='104'){

		$url = 'BC_pnp_sw_in_can_na/edit_bc_pnp_sw_in_can_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}

	else if($category=='15' && $type=='105'){

		$url = 'Bc_pnp_sw_overseas_na/edit_bc_pnp_sw_overseas_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='29' && $type=='106' || $type=='63'){

		$url = 'Caregivers_na/edit_caregivers_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}

	else if($category=='34' && $type=='107'){

		$url = 'Citizenship_application_na/edit_citizenship_application_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='20' && $type=='108'){

		$url = 'Family_sponsorship_na/edit_family_sponsorship_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='12' && $type=='109'){

		$url = 'FSTW_na/edit_fstw_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='11' && $type=='110'){

		$url = 'FSW_na/edit_fsw_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
	}
		else if($category=='45' && $type=='87'){

		$url = 'Indian_visa_na/edit_indian_visa_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
	}
	else if($category=='27' && $type=='112'){

		$url = 'International_exp_class_na/edit_international_exp_class_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='28' && $type=='75'){

		$url = 'Minp_na/edit_minp_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}


	else if($category=='35' && $type=='116'){

		$url = 'Pr_card_na/edit_pr_card_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='41' && $type=='117'){

		$url = 'RNIP_sault_na/edit_rnip_sault_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}

	else if($category=='40' && $type=='118'){

		$url = 'RNIP_vernon_na/edit_rnip_vernon_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='18' && $type=='119'){

		$url = 'RNIP_west_kootenay_na/edit_rnip_west_kootenay_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='30' && $type=='120'){

		$url = 'SINP_na/edit_sinp_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='38' && $type=='84'){

		$url = 'Travel_doc_application_na/edit_travel_doc_application_na_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}


	else if($category=='4' && $type=='4'){

		$url = 'Spausal_sponsorship_inland/edit_spausal_sponsorship_inland_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

	}
	else if($category=='4' && $type=='5'){

		$url = 'Spausal_sponsorship_outland/edit_spausal_sponsorship_outland_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';

		//return view('admin/client_application/edit_spausal_sponsorship');

	}
	else if($category=='5' && $type=='26'){

			$url = 'Intl_stu_spousal_open_wp_inland/edit_intl_stu_spousal_open_wp_inland_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_intl_stu_spousal_open_wp');

	}

	else if($category=='5' && $type=='27'){

			$url = 'Intl_stu_spousal_open_wp_outland/edit_intl_stu_spousal_open_wp_outland_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_intl_stu_spousal_open_wp');

	}
	else if($category=='6' && $type=='24'){

		$url = 'Worker_spousal_open_wp_inland/edit_worker_spousal_open_wp_inland_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}

	else if($category=='6' && $type=='25'){

		$url = 'Worker_spousal_open_wp_outland/edit_worker_spousal_open_wp_outland_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}

else if($category=='44' && $type=='73'){

		$url = 'Lmia_global/edit_lmia_global_tlnt_high_wage_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}

	else if($category=='32' && $type=='68'){

		$url = 'Lmia_wp_hg/edit_lmia_wp_high_wage_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}

	else if($category=='32' && $type=='56'){

		$url = 'Lmia_wp_lg/edit_lmia_wp_low_wage_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}

	else if($category=='42' && $type=='69'){

		$url = 'Lmia_pr_lg/edit_lmia_pr_low_wage_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}
		else if($category=='42' && $type=='70'){

		$url = 'Lmia_pr_hg/edit_lmia_pr_high_wage_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}

	else if($category=='43' && $type=='71'){

		$url = 'Lmia_dual_int_hg/edit_lmia_dual_int_high_wage_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}

	else if($category=='43' && $type=='72'){

		$url = 'Lmia_dual_int_lg/edit_lmia_dual_int_low_wage_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		//return view('admin/client_application/edit_worker_spousal_open_wp_inland');

	}
	else if($category=='22' && $type=='78'){

		$url = 'Tourist_visa_canada/edit_toutist_visa_canada_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}

	else if($category=='21' && $type=='93'){

		$url = 'Visitor_visa_canada/edit_visitor_visa_canada_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}


else if($category=='21' && $type=='94'){

		$url = 'Visitor_visa_usa/edit_visitor_visa_usa_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}

	else if($category=='37' && $type=='38'){

		$url = 'Co_op_wp/edit_co_op_wp_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}


	else if($category=='13' && $type=='17'){

		$url = 'Bc_pnp_int_pg/edit_bc_pnp_int_pg_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}
	else if($category=='13' && $type=='17'){

		$url = 'Bc_pnp_int_pg/edit_bc_pnp_int_pg_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}
	
	
		else if($category=='24' && $type=='50'){
		    
		  

		$url = 'Restoration_Of_Status_worker/edit_worker_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}
	
			else if($category=='24' && $type=='51'){
			   

		$url = 'Restoration_Of_Status_students/edit_students_new/'.$category.'/'.$id.'/'.$sid.'';
					echo'
					<script>					
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
		
	}
	
		else if($category=='24' && $type=='52'){
		    
		   

		$url = 'Restoration_Of_Status_visitors/edit_visitors_new/'.$category.'/'.$id.'/'.$sid.'';
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
}



///------------


///-------------------

public function status_not_change_emp_msg($id){

$From="Sia Immigration";
					$ee = session()->get('email');
$emaill=$ee;

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
					
					
		
	
	//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			$to = json_decode(EMP_EMAIL, true);
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();

//$message1="Your user name is ".$email." and password is ".$pass." .please click on https://canada.siaimmigration.com  to login";

$message1="status not change";


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

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

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
					$ee = session()->get('email');
$emaill=$ee;

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
					
//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			$to = json_decode(EMP_EMAIL, true);
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();

$message1="Advertisement Added- ".$add_head."";

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
	public function updatestatus_invoice(){

	//	print_r($_POST);
		//exit();

	//	$data=array('agent_status'=>trim($this->request->getPost('st')));

		$data=array('agent_status'=>trim($_POST['st']));

  $id=$_POST['id'];


	$Agent = new invoice_model(); 
$updatee=$Agent->update($id, $data);

}
public function del_invoice($id)
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$data=array('status'=>'0');



	$Agent = new invoice_model(); 
$updatee=$Agent->update($id, $data);


$invoice = new Invoice_model(); 
		$data['invoice'] = $invoice->where('status =', '1')->findAll();

		//print_r($data);
		//exit();

		return view('admin/invoice/view_invoice',$data);
	}




		public function view_invoice()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$invoice = new Invoice_model(); 
		$data['invoice'] = $invoice->where('status =', '1')->findAll();

		//print_r($data);
		//exit();

		return view('admin/invoice/view_invoice',$data);
	}





	public function full_invoice($id)
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$invoice = new Invoice_model(); 
		$data['invoice'] = $invoice->where('id =', $id)->find();

		//print_r($data);
		//exit();

		return view('admin/invoice/view_full_invoice',$data);
	}

	public function view_adv()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$Adv = new Client_application_model(); 
		$data['adv'] = $Adv->where('ad_job_start_date !=', '0000-00-00')
                   ->findAll();

		return view('admin/adv/view_adv',$data);
	}

		public function view_adv1()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$Adv1 = new Client_application_model(); 
		$data['adv1'] = $Adv1->where('st_job_start_date !=', '0000-00-00')
                   ->findAll();

		return view('admin/adv/view_adv1',$data);
	}

		public function view_adv2()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$Adv2 = new Client_application_model(); 
		$data['adv2'] = $Adv2->where('stt_job_start_date !=', '0000-00-00')
                   ->findAll();

		return view('admin/adv/view_adv2',$data);
	}


	public function edit_adv($id)
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
	   
		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
} 
 

		return view('client/term_and_condition');
	}

	public function privacy_policy()
	{

	    
		 if (session()->get('isClientLoggedIn') !=true) {

				return redirect()->to('index');
		
}
 

		return view('client/privacy_policy');
	}


	public function refund_policy()
	{

		 if (session()->get('isClientLoggedIn') !=true) {

				return redirect()->to('index');
		
}
	   

		return view('client/refund_policy');
	}

/////----- category application start 



	///------------

 

///------------

 
///-------------------



	///////////////----------- category application endd 



	/////adr
	
	public function adr_reminder(){
	    
	     if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

    $Adr = new Adr_model(); 
		$data['adr'] = $Adr->findAll();
		
		
		
$From="Sia Immigration";
$emaill="ARD Reminder";
				
					$subject  = "Adr Reminder :-Date-".date('d/m/Y')."";
											
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				
 					$headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					$message ='ADR Added<br>';
					$message .='Deatail. <br>';
				// 	$message .= 'Date : ' .date('d/m/Y').'<br>';
				// 	$message .= 'Sia id : ' .$sia_id.'<br>';
				// 	$message .= 'Client Name: ' .$client_name.'<br>';
				// 	$message .= 'Notes: ' .$notes.'<br>';
				// 	$message .= 'Start Date: ' .$adr_start_date.'<br>';
				// 	$message .= 'End Date: ' .$adr_end_date.'<br>';
				// 	$message .= 'Application Number: ' .$app_number.'<br>';
				// 	$message .= 'Document: ' .$link.'<br>';
					



  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
			//	$to = [$client_email,'info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com'];
				
				//$to = ['ds@siaimmigration.com'];

        $to = json_decode(EMP_EMAIL, true);

			
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();

    

	    
	}

	public function add_adr()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

		if ($this->request->getMethod()=='post'){
$Adr = new Adr_model();

if($this->request->getFile('adr_doc') !=''){

 $img = $this->request->getFile('adr_doc');


        
         


                $newName = $img->getRandomName();

                $img->move('./assets/resume', $newName);
              


 $link='https://canada.siaimmigration.com/assets/resume/'.$newName;
}else{
$link="";

}

$insert=$Adr->insert([

	 'sia_id'=>$this->request->getPost('sia_id'),
	'client_name'=>$this->request->getPost('client_name'),
	'notes'=>$this->request->getPost('notes'),
	'adr_start_date'=>$this->request->getPost('adr_start_date'),
	'adr_end_date'=>$this->request->getPost('adr_end_date'),
	'app_number'=>$this->request->getPost('app_number'),
	'link'=>$link,
	'name'=>$newName,
	
	'insert_on'=>date( 'Y-m-d H:i:s' )
]);
if($insert){
   echo $sia_id = $this->request->getPost('sia_id');
	$client_name = $this->request->getPost('client_name');
	$notes = $this->request->getPost('notes');
	$adr_start_date = $this->request->getPost('adr_start_date');
	$adr_end_date = $this->request->getPost('adr_end_date');
	$app_number = $this->request->getPost('app_number');
	$link = $link;
	$name = $newName;
	
	
	
$Approve = new Prospect_model();  
	$email = $Approve->where('id', $sia_id)->findAll();
	
	//print_r($email);
	$client_email= $email[0]['email'];
	//exit();
	
    
    
$From="Sia Immigration";
$emaill="ARD";
				
					$subject  = "Adr Added :-Date-".date('d/m/Y')."";
											
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				
 					$headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					$message ='ADR Added<br>';
					$message .='Deatail. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Sia id : ' .$sia_id.'<br>';
					$message .= 'Client Name: ' .$client_name.'<br>';
					$message .= 'Notes: ' .$notes.'<br>';
					$message .= 'Start Date: ' .$adr_start_date.'<br>';
					$message .= 'End Date: ' .$adr_end_date.'<br>';
					$message .= 'Application Number: ' .$app_number.'<br>';
					$message .= 'Document: ' .$link.'<br>';
					
//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = [$client_email,'info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			$to = json_decode(EMP_EMAIL, true);
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();

    
    

	$url = 'Siaportal/add_adr';
					echo'
					<script>
					alert("Record Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{
	$url = 'Siaportal/add_adr';
					echo'
					<script>
					alert("Record not added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}
}

		return view('admin/adr/add_adr');
	}

		public function view_adr()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$Adr = new Adr_model();
		$data['adr'] = $Adr->getAllWithTeamMember();

		return view('admin/adr/view_adr',$data);
	}


		public function edit_adr($id)
	{


		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

if ($this->request->getMethod()=='post'){


if($this->request->getFile('adr_doc') !=''){
        
         
$img = $this->request->getFile('adr_doc');

                $newName = $img->getRandomName();

                $img->move('./assets/resume', $newName);
              


 $link='https://canada.siaimmigration.com/assets/resume/'.$newName;


	$data = [
    'sia_id'=>$this->request->getPost('sia_id'),
	'client_name'=>$this->request->getPost('client_name'),
	'notes'=>$this->request->getPost('notes'),
	'adr_start_date'=>$this->request->getPost('adr_start_date'),
	'adr_end_date'=>$this->request->getPost('adr_end_date'),
	'app_number'=>$this->request->getPost('app_number'),	
	'link'=>$link,
	'name'=>$newName,
	'insert_on'=>date( 'Y-m-d H:i:s' )
];

$Adr = new Adr_model(); 
$updatee = $Adr->update($id, $data);

}else{



	$data = [
    'sia_id'=>$this->request->getPost('sia_id'),
	'client_name'=>$this->request->getPost('client_name'),
	'notes'=>$this->request->getPost('notes'),
	'adr_start_date'=>$this->request->getPost('adr_start_date'),
	'adr_end_date'=>$this->request->getPost('adr_end_date'),
	'app_number'=>$this->request->getPost('app_number'),	
	//'link'=>$link,
	//'name'=>$newName,
	'insert_on'=>date( 'Y-m-d H:i:s' )
];

$Adr = new Adr_model(); 
$updatee = $Adr->update($id, $data);



}




if($updatee){

$url = 'Siaportal/view_adr';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{

$Adr = new Adr_model(); 
	$data['adr'] = $Adr->where('id', $id)->findAll();

		return view('admin/adr/edit_adr',$data);

}


}else{
	$Adr = new Adr_model(); 
	$data['adr'] = $Adr->where('id', $id)->findAll();

		return view('admin/adr/edit_adr',$data);
	}
}

/////////////////////

	public function add_frontend_inquiries()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

		if ($this->request->getMethod()=='post'){

	$tt=$this->request->getPost('typee');
			if($tt=='student_need_job' ||$tt=='lmia_needed' ){

      
$Pro = new Prospect_model();
$insert=$Pro->insert([
	 'news_image1'=>$this->request->getPost('news_image1') ?? '',
	'heading'=>$this->request->getPost('heading') ?? '',
	'typee'=>$this->request->getPost('typee') ?? '',
	'short_news'=>$this->request->getPost('short_news') ?? '',
	'agent_name'=>$this->request->getPost('agent_name') ?? '',
	'team_member'=>$this->request->getPost('team_member') ?? '',
	'tag_search'=>$this->request->getPost('tag_search') ?? '',
	'having_canada_visa'=>$this->request->getPost('having_canada_visa') ?? '',
	'number'=>$this->request->getPost('number') ?? '',
	'email'=>$this->request->getPost('email') ?? '',
	'entery_status'=>'prospect',
	'insert_on' => date( 'Y-m-d H:i:s' )
]);
}else{


    $Imm = new Immigration_enquiry_model();
$insert=$Imm->insert([
	 //'heading'=>$this->request->getPost('heading'),
	'news_image1'=>$this->request->getPost('news_image1') ?? '',
							'heading'=>$this->request->getPost('heading') ?? '',
							'typee'=>$this->request->getPost('typee') ?? '',
							'short_news'=>$this->request->getPost('short_news') ?? '',
							'agent_name'=>$this->request->getPost('agent_name') ?? '',
							'team_member'=>$this->request->getPost('team_member') ?? '',
							//'tag_search'=>$this->input->post('tag_search'),
							'number'=>$this->request->getPost('number') ?? '',
							'email'=>$this->request->getPost('email') ?? '',
							'ccode'=>$this->request->getPost('ccode') ?? '',

							'insert_on' => date( 'Y-m-d H:i:s' )
]);
    
    
}

if($insert){

	$url = 'Siaportal/view_canada_inquiries';
					echo'
					<script>
					alert("Record Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
}else{
	$url = 'Siaportal/add_frontend_inquiries';
					echo'
					<script>
					alert("Record not added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';
}
}
	//$data['prospect'] = $Prospect->getpost();

	$agent = new Agent_model(); 
	$data['agent'] = $agent->getpost();

		return view('admin/frontend_inquiries/add_frontend_inquiries',$data);
	}
	
	
	/////////////

public function edit_team_immigration_enquiry($id,$page=NULL)
{
    if (session()->get('isLoggedIn') != true) {
        return redirect()->to('index');
    }


   
  if ($this->request->getMethod()=='post'){


	$data = [
  

    'agent_status'=>$this->request->getPost('status')
	
	
];





$Imm = new Immigration_enquiry_model(); 
$updatee = $Imm->update($id, $data);

// Get the database connection
//$db = db_connect();

// Get the last executed query
//$query = $db->getLastQuery();

// Print the query

if($updatee){

	if($page==''){
			$url = 'Siaportal/view_canada_inquiries';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
			}else{

			$url = 'Siaportal/view_overseas';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
			}
}
}
}



public function edit_admin_immigration_enquiry($id,$page=NULL)
{
    if (session()->get('isLoggedIn') != true) {
        return redirect()->to('index');
    }


   
  if ($this->request->getMethod()=='post'){


	$data = [
  

    'admin_status'=>$this->request->getPost('status')
	
	
];





$Imm = new Immigration_enquiry_model(); 
$updatee = $Imm->update($id, $data);

// Get the database connection
//$db = db_connect();

// Get the last executed query
//$query = $db->getLastQuery();

// Print the query

if($updatee){

	if($page==''){
			$url = 'Siaportal/view_canada_inquiries';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
			}else{

			$url = 'Siaportal/view_overseas';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
			}	
}
}
}


public function mail_immigration_enquiry($id,$page=NULL){
     if ($this->request->getMethod()=='post'){
         
        	$ss=$this->request->getPost('status');
        	
        	if($ss=='1'){
        	    
        	    
        	    //	$data['daily_mail_send']=$this->Backoffice_model_kamloops->getRecoId('immigration_enquiry',$id);
        	    
        	    
        	    $Imm = new Immigration_enquiry_model(); 

		$data['daily_mail_send'] = $Imm->select('id,news_image1,from_web,ccode,heading,short_news,agent_name,typee,team_member,number,agent_status,admin_status,mail_send,mail_send_on,sms_send,sms_send_on,insert_on')
		
		->where('id',$id)
		
		->orderBy('id', 'desc')->findAll();
			
			
				
			  $name=$data['daily_mail_send']['0']['heading'];
			  $id=$data['daily_mail_send']['0']['id'];
			
			 $sia_id=$data['daily_mail_send']['0']['short_news'];
			 $agent_name=$data['daily_mail_send']['0']['agent_name'];
			 $team_member=$data['daily_mail_send']['0']['team_member'];
			 $number=$data['daily_mail_send']['0']['number'];
			 $agent_status=$data['daily_mail_send']['0']['agent_status'];
			 $admin_status=$data['daily_mail_send']['0']['admin_status'];
			$voice=$data['daily_mail_send']['0']['news_image1'];
		
				
				$From="Immigration Enquiry-".$name." ";
					 $emaill="apps@siaimmigration.com";
					
					$subject  = "Name ".$name."-Id".$id."-Immigration Enquiry:-".$dd."Processed/Delete";	
											
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				

 						$headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

					$message ='Immigration Enquiry. Processed/Delete <br>';
					$message .= 'name:- ' .$name.'<br>';
					$message .= 'Officio id:-' .$sia_id.'<br>';
					$message .= 'Team Member :- ' .$team_member.'<br>';
					$message .= 'Number :- ' .$number.'<br>';
					$message .= 'Team Status :- ' .$agent_status.'<br>';
					$message .= 'Admin status :-' .$admin_status.'<br>';
					$message .= 'source :-' .$agent_name.'<br>';
				$message .= '<lable style="color:red; size:30px">voice :- <a href="'. base_url().'form/'.$voice.'"> voice</a></lable><br>';
					
										
					$message .= 'Thank you,. <br>';
					$message .= 'This Email Send By Backoffice Kamloops. <br>';
	

$email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$to = array('no-reply@siaimmigration.com');
				//$cc = ['mkj@siaimmigration.com','help@siaimmigration.com','ds@siaimmigration.com','kam@siaimmigration.com','office@siaimmigration.com','info@siaimmigration.com','ns@siaimmigration.com','mail@siaimmigration.com','admin@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			$cc = json_decode(EMP_EMAIL, true);

				$email1->setFrom($emaill, $From);
    $to = array('no-reply@siaimmigration.com','Mail@siaimmigration.com','kr@siaimmigration.com','shivkiran814@gmail.com','Info@siaimmigration.com','Mj@siaimmigration.com');
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();
	
   
    $del=$Imm->where('id', (int) $id)->delete();

				//	$DelCategory = $this->Backoffice_model_kamloops->deleteInCond("immigration_enquiry","id",$id);
					if($page==''){
			$url = 'Siaportal/view_canada_inquiries';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
			}else{

			$url = 'Siaportal/view_overseas';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
			}
        	    
        	    
        	    
        	    
        	    
        	    
        	}else if ($ss=='2'){
        	    
        	     $Imm = new Immigration_enquiry_model(); 

		$data['daily_mail_send'] = $Imm->select('*')
		
		->where('id',$id)
		
		->orderBy('id', 'desc')->findAll();
			
			
				
			  $name=$data['daily_mail_send']['0']['heading'];
			  $id=$data['daily_mail_send']['0']['id'];
			
			 $sia_id=$data['daily_mail_send']['0']['short_news'];
			 $agent_name=$data['daily_mail_send']['0']['agent_name'];
			 $team_member=$data['daily_mail_send']['0']['team_member'];
			 $number=$data['daily_mail_send']['0']['number'];
			 $agent_status=$data['daily_mail_send']['0']['agent_status'];
			 $admin_status=$data['daily_mail_send']['0']['admin_status'];
			 $voice=$data['daily_mail_send']['0']['news_image1'];
			 $image=$data['daily_mail_send']['0']['news_image'];
				
				$From="Immigration Enquiry records-".$name." ";
					 $emaill="apps@siaimmigration.com";
					//$subject  = "".ucfirst($cs).",id-".$dell.",Name-".$name."";
					$subject  = "Name ".$name."-Id".$id."-New Admission:-".$dd."Dropped/Delete";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				//	$headers.="From: \"".$From."\"<".$emaill."> \r\n";

 						$headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

					$message ='Immigration Enquiry records. Dropped/Delete <br>';
					$message .= 'name:- ' .$name.'<br>';
					$message .= 'Officio id:-' .$sia_id.'<br>';
					$message .= 'Team Member :- ' .$team_member.'<br>';
					$message .= 'Number :- ' .$number.'<br>';
					$message .= 'Agent Status :- ' .$agent_status.'<br>';
					$message .= 'Admin status :-' .$admin_status.'<br>';
					$message .= 'source :-' .$agent_name.'<br>';
					$message .= '<lable style="color:red; size:30px">voice :- <a href="'. base_url().'form/'.$voice.'"> voice</a></lable><br>';
					
										
					$message .= 'Thank you,. <br>';
					$message .= 'This Email Send By Backoffice kamloops. <br>';
				//	@mail('mkj@siaimmigration.com,help@siaimmigration.com,info@siaimmigration.com,kr@siaimmigration.com,ds@siaimmigration.com,kam@siaimmigration.com,office@siaimmigration.com,info@siaimmigration.com,ns@siaimmigration.com,mail@siaimmigration.com,admin@siaimmigration.com', $subject, $message, $headers);

			$email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
						$to = array('no-reply@siaimmigration.com');
				//$cc = ['mkj@siaimmigration.com','help@siaimmigration.com','info@siaimmigration.com','kr@siaimmigration.com','ds@siaimmigration.com','kam@siaimmigration.com','office@siaimmigration.com','info@siaimmigration.com','ns@siaimmigration.com','mail@siaimmigration.com','admin@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			$cc = json_decode(EMP_EMAIL, true);
				
							$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();
	
				
				
				
			    $del=$Imm->where('id', (int) $id)->delete();
		if($page==''){
			$url = 'Siaportal/view_canada_inquiries';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
			}else{

			$url = 'Siaportal/view_overseas';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
			}
        	    
        	    
        	    
        	}else if ($ss=='3'){
        	    
        	    
        	    
        	      $Imm = new Immigration_enquiry_model(); 

		$data['daily_mail_send'] = $Imm->select('*')
		
		->where('id',$id)
		
		->orderBy('id', 'desc')->findAll();
			
			
				
			  $name=$data['daily_mail_send']['0']['heading'];
			  $id=$data['daily_mail_send']['0']['id'];
			
			 $sia_id=$data['daily_mail_send']['0']['short_news'];
			 $agent_name=$data['daily_mail_send']['0']['agent_name'];
			 $team_member=$data['daily_mail_send']['0']['team_member'];
			 $number=$data['daily_mail_send']['0']['number'];
			 $agent_status=$data['daily_mail_send']['0']['agent_status'];
			 $admin_status=$data['daily_mail_send']['0']['admin_status'];
			 $voice=$data['daily_mail_send']['0']['news_image1'];
			 $image=$data['daily_mail_send']['0']['news_image'];
				
				$From="Immigration Enquiry records-".$name." ";
					 $emaill="apps@siaimmigration.com";
				
					$subject  = "Name ".$name."-Id".$id."-New Admission:-".$dd."Appointment Scheduled/ Delete";	
										
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 			

 					$headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message ='Immigration Enquiry records. Appointment Scheduled/ Delete <br>';
					$message .= 'name:- ' .$name.'<br>';
					$message .= 'Officio id:-' .$sia_id.'<br>';
					$message .= 'Team Member :- ' .$team_member.'<br>';
					$message .= 'Number :- ' .$number.'<br>';
					$message .= 'Agent Status :- ' .$agent_status.'<br>';
					$message .= 'Admin status :-' .$admin_status.'<br>';
					$message .= 'source :-' .$agent_name.'<br>';
					$message .= '<lable style="color:red; size:30px">voice :- <a href="'. base_url().'form/'.$voice.'"> voice</a></lable><br>';
					
										
					$message .= 'Thank you,. <br>';
					$message .= 'This Email Send By Backoffice kamloops. <br>';
			

                    $email1 = \Config\Services::email();
                    $config = get_smtp_settings();
                    $email1->initialize($config);
                    
						$to = array('no-reply@siaimmigration.com');
				//$cc = ['mkj@siaimmigration.com','help@siaimmigration.com','info@siaimmigration.com','kr@siaimmigration.com','ds@siaimmigration.com','kam@siaimmigration.com','office@siaimmigration.com','info@siaimmigration.com','ns@siaimmigration.com','mail@siaimmigration.com','admin@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

        $cc = json_decode(EMP_EMAIL, true);

				// $this->email->set_newline("\r\n");
				// $this->email->from($emaill, $From);
				// $this->email->to($to);
				// $this->email->cc($cc);
				// $this->email->reply_to($emaill);

				// $this->email->subject($subject);
				// $this->email->message($message1);

				// $this->email->send();
				
				$email1->setFrom($emaill, $From);
                $email1->setTo($to);
                $email1->setCC($cc);
                $email1->setReplyTo($emaill);
                $email1->setSubject($subject);
                $email1->setMessage($message);
                $email1->send();

	

				 $Prospect = new Prospect_model();

    $insert=$Prospect->insert([
							'heading'=>$data['daily_mail_send']['0']['heading'],
							'full_heading'=>$data['daily_mail_send']['0']['full_heading'],
							'image'=>$data['daily_mail_send']['0']['image'],
							'insert_on'=>$data['daily_mail_send']['0']['insert_on'],
							'update_on'=>$data['daily_mail_send']['0']['update_on'],
							'short_news'=>$data['daily_mail_send']['0']['short_news'],
							'agent_name'=>$data['daily_mail_send']['0']['agent_name'],
							'team_member'=>$data['daily_mail_send']['0']['team_member'],
							'number'=>$data['daily_mail_send']['0']['ccode'].$data['daily_mail_send']['0']['number'],
							'agent_status'=>$data['daily_mail_send']['0']['agent_status'],
							'admin_status'=>$data['daily_mail_send']['0']['admin_status'],
							'news_image1'=>$data['daily_mail_send']['0']['news_image1'],
							'status'=>$data['daily_mail_send']['0']['status'],
							'email'=>$data['daily_mail_send']['0']['email'],
							'walk_status'=>$data['daily_mail_send']['0']['walk_status'],
							'team_member_name'=>$data['daily_mail_send']['0']['team_member_name'],
							'typee'=>$data['daily_mail_send']['0']['typee'],
							'mail_send'=>$data['daily_mail_send']['0']['mail_send'],
							'mail_send_on'=>$data['daily_mail_send']['0']['mail_send_on'],
							'sms_send'=>$data['daily_mail_send']['0']['sms_send'],
							'sms_send_on'=>$data['daily_mail_send']['0']['sms_send_on'],
							'from_web'=>$data['daily_mail_send']['0']['from_web'],
							'appo_book'=>'Appointment booked',
							'entery_status'=>'prospect',
							
					]);
					//	 $AddData = $this->Backoffice_model_kamloops->AddData('client_prospect',$data);
				
				
				 $Imm = new Immigration_enquiry_model(); 
						    $del=$Imm->where('id', (int) $id)->delete();
		if($page==''){
			$url = 'Siaportal/view_canada_inquiries';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
			}else{

			$url = 'Siaportal/view_overseas';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
			}

        	    
        	    
        	}
         
     }
    
    
}

/////////////
	

		public function view_canada_inquiries()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');

}

$Imm = new Immigration_enquiry_model();

		$records = $Imm->select('*')
		->where('typee !=', 'overseas')
		->where('entery_type !=', 'Diclined')
		->orderBy('id', 'desc')->findAll();

		$emails = array_filter(array_unique(array_column($records, 'email')));
		$emailMap = [];
		if (!empty($emails)) {
			$db = \Config\Database::connect();
			$placeholders = implode(',', array_fill(0, count($emails), '?'));
			$matches = $db->query(
				"SELECT id, email, entery_status FROM tbl_client_prospect
				 WHERE email IN ($placeholders) AND entery_status IN ('prospect','client')",
				array_values($emails)
			)->getResultArray();
			foreach ($matches as $m) {
				$emailMap[strtolower(trim($m['email']))][] = $m;
			}
		}

		$data['new_record'] = $records;
		$data['emailMap']   = $emailMap;

		return view('admin/frontend_inquiries/view_canada_inquiries',$data);
	}
	
	public function edit_immigration_enquiry($id,$page=NULL){
	    
	   	 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

		if ($this->request->getMethod()=='post'){

	$tt=$this->request->getPost('typee');
			if($tt=='student_need_job' ||$tt=='lmia_needed' ){

$Pro = new Prospect_model();
$data = [
	 //'heading'=>$this->request->getPost('heading'),
	'heading'=>$this->request->getPost('heading'),
	'typee'=>$this->request->getPost('typee'),
	'short_news'=>$this->request->getPost('short_news'),
	'agent_name'=>$this->request->getPost('agent_name'),
	'team_member'=>$this->request->getPost('team_member'),
	'tag_search'=>$this->request->getPost('tag_search'),
	'having_canada_visa'=>$this->request->getPost('having_canada_visa'),
	'number'=>$this->request->getPost('number'),
	'email'=>$this->request->getPost('email'),
	'entery_status'=>'prospect',
	'insert_on' => date( 'Y-m-d H:i:s' )
];
}else{
    
    
    $Imm = new Immigration_enquiry_model();
$data = [
	 //'heading'=>$this->request->getPost('heading'),
	'news_image1'=>$this->request->getPost('news_image1'),
	'heading'=>$this->request->getPost('heading'),
	'typee'=>$this->request->getPost('typee'),
	'short_news'=>$this->request->getPost('short_news'),
	'agent_name'=>$this->request->getPost('agent_name'),
	'team_member'=>$this->request->getPost('team_member'),
	//'tag_search'=>$this->input->post('tag_search'),
	'number'=>$this->request->getPost('number'),
	'email'=>$this->request->getPost('email'),
	'ccode'=>$this->request->getPost('ccode'),
	'insert_on' => date( 'Y-m-d H:i:s' )
];
   
   
   $Imm = new Immigration_enquiry_model(); 
$updatee = $Imm->update($id, $data); 
    
}

if($updatee){

    if($page==''){
	$url = 'Siaportal/view_canada_inquiries';
					echo'
					<script>
					alert("Record Update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{
    	$url = 'Siaportal/view_overseas';
					echo'
					<script>
					alert("Record Update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	

    
}
}else{
	$url = 'Siaportal/view_canada_inquiries';
					echo'
					<script>
					alert("Record not Update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}
}
	
$Imm = new Immigration_enquiry_model(); 

		$data['new_record'] = $Imm->select('*')
		
		->where('id',$id)
			
		->orderBy('id', 'desc')->findAll();

		return view('admin/frontend_inquiries/edit_immigration_enquiry',$data); 
	    
	    
	    
	}
	

	public function view_overseas()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$Imm = new Immigration_enquiry_model(); 

		$data['new_record'] = $Imm->select('id,news_image1,from_web,ccode,heading,short_news,agent_name,typee,team_member,number,agent_status,admin_status,mail_send,mail_send_on,sms_send,sms_send_on,insert_on')
		
		->where('typee', 'overseas')
			->where('entery_type !=', 'Diclined')
		->orderBy('id', 'desc')->findAll();

		return view('admin/frontend_inquiries/view_overseas',$data);
	}
	
	
		public function view_decline()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$Imm = new Immigration_enquiry_model(); 

		$data['new_record'] = $Imm->select('id,news_image1,email,from_web,ccode,heading,short_news,agent_name,typee,team_member,number,agent_status,admin_status,mail_send,mail_send_on,sms_send,sms_send_on,insert_on')
		
	
			->where('entery_type', 'Diclined')
		->orderBy('id', 'desc')->findAll();

		return view('admin/frontend_inquiries/view_decline',$data);
	}

	/////adr
	
	
	////////////new record
	
		public function add_new_record()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

		if ($this->request->getMethod()=='post'){
$New = new New_recod_model();

if($this->request->getFile('news_image') !=''){
 $img = $this->request->getFile('news_image');
                $newName = $img->getRandomName();
                $img->move('./assets/resume', $newName);
 //$link='https://canada.siaimmigration.com/assets/resume/'.$newName;
}else{
$link="";
}

$insert=$New->insert([

	// 'heading'=>$this->request->getPost('heading'),
	 	                    'image'=>$newName,
							'news_image1'=>$this->request->getPost('news_image1'),
							'heading'=>$this->request->getPost('heading'),
							'short_news'=>$this->request->getPost('short_news'),
							'typee'=>$this->request->getPost('typee'),
                            'req_pending'=>$this->request->getPost('req_pending'),
							
							'agent_name'=>$this->request->getPost('agent_name'),
							'team_member'=>$this->request->getPost('team_member'),
							'number'=>$this->request->getPost('number'),
                            'email'=>$this->request->getPost('email'),
							'insert_on' => date( 'Y-m-d H:i:s' )
]);
if($insert){

	$url = 'Siaportal/add_new_record';
					echo'
					<script>
					alert("Record Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{
	$url = 'Siaportal/add_new_record';
					echo'
					<script>
					alert("Record not added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}
}

		return view('admin/new_record/add_new_record');
	}

		public function view_new_record()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$New_reco = new New_recod_model(); 

		$data['new_record'] = $New_reco->select('*')
		->where('req_pending !=', 'yes')
		->where('email_data ', '')
		
		
		
		->orderBy('id', 'desc')->findAll();

		return view('admin/new_record/view_new_record',$data);
	}
	
	
		public function view_new_record_req_pending()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$New_reco = new New_recod_model(); 

		$data['new_record'] = $New_reco->select('*')
		->where('req_pending','yes')
		->where('status','0')
		->orWhere('status','1')
		->orderBy('id', 'desc')->findAll();

		return view('admin/new_record/view_new_record_req_pending',$data);
	}
	
	
	///////////////

	public function add_service()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

		if ($this->request->getMethod()=='post'){
$Adr = new Service_model();



$insert=$Adr->insert([

	 'heading'=>$this->request->getPost('heading'),
	'dataa'=>$this->request->getPost('dataa'),
	
	
	'insert_on'=>date( 'Y-m-d H:i:s' )
]);
if($insert){





//////////////////
	$heading=$this->request->getPost('heading');
	  $dataa=$this->request->getPost('dataa');
	  
	  $From="Service list";
					 $emaill="app@siaimmigration.com";
				
					$subject  = "Service list updated-please check:-".date('d/m/Y')."";	
										
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				

 						$headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

					$message =' Detail of Service list. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= '<h3 style="color:red;">Heading : </h3><p style="color:#000080">' .$heading.'</p><hr><br>';
					$message .= '<h3 style="color:red;">Data : </h3><p style="color:#000080">' .$dataa.'</p><hr><br>';
					$message .= '<h3 style="color:red;">https://siaimmigration.com/home/service_list</p><hr><br>';
					$message .= '<h3 style="color:red;">Please note </h3><hr><br>';
					$message .= '<h3 style="color:red;">Inform Ramandeep Amandeep Keerti. If any information need to update or Add </h3><hr><br>';
				
	

    
					$to = array('no-reply@siaimmigration.com');
				    //$cc = ['mj@siaimmigration.com','ds@siaimmigration.com','mkj@siaimmigration.com','office@siaimmigration.com','admin@siaimmigration.com','kam@siaimmigration.com','info@siaimmigration.com','info@siaimmigration.com','kr@siaimmigration.com','mail@siaimmigration.com','help@siaimmigration.com','ns@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

            $cc = json_decode(EMP_EMAIL, true);

                    $email1 = \Config\Services::email();
                    $config = get_smtp_settings();
                    $email1->initialize($config);
			    	
				    // $this->email1->from($emaill,$From);
				    // $this->email1->to($to);
				    // $this->email1->cc($cc);
				    // $this->email1->reply_to($emaill);
			     //   $this->email1->subject($subject);
				    // $this->email1->message($message1);
				    // $this->email1->send();
				    
				      $email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emailll);
    $email1->setSubject($subject);
    $email1->setMessage($message);
    $email1->send();
 
	
	
	
	
	
/////////////////





	$url = 'Siaportal/add_service';
					echo'
					<script>
					alert("Record Added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{
	$url = 'Siaportal/add_service';
					echo'
					<script>
					alert("Record not added Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}
}

		return view('admin/service/add_service');
	}

		public function view_service()
	{

		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

$Service = new Service_model(); 

		$data['service'] = $Service->select('*')->orderBy('id', 'desc')->findAll();

		return view('admin/service/view_service',$data);
	}
	
	
	
		public function edit_service_status($id)
	{

	 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

if ($this->request->getMethod()=='post'){


	$data = [
  

    'status'=>$this->request->getPost('status')
	
	
];



$ww = new Service_model(); 
$updatee=$ww->update($id, $data);
if($updatee){

$url = 'Siaportal/view_service';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}


}
	
	
	}


		public function edit_service($id)
	{


		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}

	if ($this->request->getMethod()=='post') 
		{			
				
	
		
	
			$data = array(
							
							
							'heading'=>$this->request->getPost('heading'),
							'dataa'=>$this->request->getPost('dataa'),
							
							'update_on' => date( 'Y-m-d H:i:s' )
							
						 );
$ww = new Service_model(); 
$updatee=$ww->update($id, $data);
	
	
	 $heading=$this->request->getPost('heading');
	  $dataa=$this->request->getPost('dataa');
	  
	

	  
	                $From="Service list";
					$emaill="app@siaimmigration.com";
					$subject  = "Service list updated-please check:-".date('d/m/Y')."";	
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
 					$headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
                    'Reply-To: '.  $emaill . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
					$message =' Detail of Service list. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= '<h3 style="color:red;">Heading : </h3><p style="color:#000080">' .$heading.'</p><hr><br>';
					$message .= '<h3 style="color:red;">Data : </h3><p style="color:#000080">' .$dataa.'</p><hr><br>';
					$message .= '<h3 style="color:red;">https://siaimmigration.com/home/service_list</p><hr><br>';
					$message .= '<h3 style="color:red;">Please note </h3><hr><br>';
					$message .= '<h3 style="color:red;">Inform Ramandeep Amandeep Keerti. If any information need to update or Add </h3><hr><br>';
				

					$to = array('no-reply@siaimmigration.com');
				    //$cc = ['mj@siaimmigration.com','ds@siaimmigration.com','mkj@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','info@siaimmigration.com','info@siaimmigration.com','kr@siaimmigration.com','mail@siaimmigration.com','help@siaimmigration.com','ns@siaimmigration.com','admin@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

            $cc = json_decode(EMP_EMAIL, true);

                        
                    $email1 = \Config\Services::email();
                    $config = get_smtp_settings();
                    $email1->initialize($config);

			
    				// $this->email1->from($emaill,$From);
    				// $this->email1->to($to);
    				// $this->email1->cc($cc);
    				// $this->email1->reply_to($emaill);
    				// $this->email1->subject($subject);
    				// $this->email1->message($message);
    				// $this->email1->send();
    				
    				
    				  $email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emailll);
    $email1->setSubject($subject);
    $email1->setMessage($message);
    $email1->send();
 
	
                    $url = 'Siaportal/edit_service/'.$id;
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
	        	}
        $Service = new Service_model(); 
		$data['service'] = $Service->select('*')->where('id',$id)->orderBy('id', 'desc')->findAll();
		return view('admin/service/edit_service',$data);
	
	}
	
	public function edit_service_statusaaa($id)
	{
		if($this->session->userdata('type') != '88' ) {
		//	redirect('backoffice/dashboard');
			$url = 'Backoffice_kamloops/index';
					echo'
					<script>
					window.location.href = "'.base_url().'/'.$url.'";	
					</script>
					';	
			
		}
		if ($this->input->server('REQUEST_METHOD') === 'POST') 
		{			
			$data = array('status' => $this->input->post('status'),
			'update_on' => date( 'Y-m-d H:i:s' )	);
			$AddData = $this->Backoffice_model_kamloops->updateData('service',$data,$id);
			if($AddData) 
			{
				$data['message_success'] = TRUE;
				$this->session->set_flashdata('message_success', 'Data Edit successfully..!!');
				//redirect('Backoffice/view_daily_inq');
				if($this->session->userdata('type') == '88') {
				//redirect('Backoffice/view_daily_inq');
				$url = 'backoffice_kamloops/view_service';
					echo'
					<script>
					window.location.href = "'.base_url().$url.'";
					</script>
					';
				}
				
			}
			else 
			{					
				$data['message_error'] = TRUE;
				$this->session->set_flashdata('message_error', 'error occured, please try again..!!');
			}
		}		
	
}


////////////////////

///////////////////////

	public function del_adr($id)
	{


		 if (session()->get('isLoggedIn') !=true) {

				return redirect()->to('index');
		
}






	$data = [
    'status'=>'1',
	
	'update_on'=>date( 'Y-m-d H:i:s' )
];

$Adr = new Adr_model(); 
$updatee = $Adr->update($id, $data);




if($updatee){
    
    $Adr = new Adr_model(); 
		$data['adr'] = $Adr->where('id', $id)->findAll();
		
	$sia_id=	$data['adr']['0']['sia_id'];
		
$Approve = new Prospect_model();  
	$email = $Approve->where('id', $sia_id)->findAll();
	
	//print_r($email);
	$client_email= $email[0]['email'];
	
$From="Sia Immigration";
$emaill="ARD";
				
					$subject  = "Adr Mark completed :-Date-".date('d/m/Y')."";
											
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 				
 					$headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					$message ='ADR Mark completed<br>';
					$message .='Deatail. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Sia id : ' .$data['adr']['0']['sia_id'].'<br>';
					$message .= 'Client Name: ' .$data['adr']['0']['client_name'].'<br>';
					$message .= 'Notes: ' .$data['adr']['0']['notes'].'<br>';
					$message .= 'Start Date: ' .$data['adr']['0']['adr_start_date'].'<br>';
					$message .= 'End Date: ' .$data['adr']['0']['adr_end_date'].'<br>';
					$message .= 'Application Number: ' .$data['adr']['0']['app_number'].'<br>';
					$message .= 'Document: ' .$data['adr']['0']['link'].'<br>';
					
//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = [$client_email,'info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			$to = [$client_email,EMP_EMAIL];
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();


$url = 'Siaportal/view_adr';
					echo'
					<script>
					alert("Record update Successfuly")
					window.location.href = "'.base_url().'/'.$url.'";
					</script>
					';	
}else{
	$Adr = new Adr_model(); 
	$data['adr'] = $Adr->where('id', $id)->findAll();

		return view('admin/adr/edit_adr',$data);
	}
}


	///////







	public function refer()
	{
		if (session()->get('isClientLoggedIn') !=true) {

				return redirect()->to('index');
		
}
	    
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
				$ee = session()->get('email');
					 $emaill="mkj@siaimmigration.com";

					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Thank You for Business Referral";						
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
					
//@mail($email.',no-reply@siaimmigration.com',$subject,$message,$headers);


  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				$to = [$email];
			
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();


$From="Sia Immigration";
					//$ee = session()->get('email');
$emaill="mkj@siaimmigration.com";

					$subject  = "Business Referral  Added by:--".$fn."";
					//$subject  = "";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
 					$headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
 					$message ='Business Referral<br>';
					$message .=' Deatail. <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Name: ' .$heading.'<br>';
					$message .= 'Email: ' .$email.'<br>';
					$message .= 'Number: ' .$number.'<br>';
					$message .= 'Detail: ' .$detail.'<br>';


					
					
//@mail('office@siaimmigration.com,admin@siaimmigration.com,info@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);


  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				//$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com'];

			$to = json_decode(EMP_EMAIL, true);
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();

//$message1="Thank You for Business Referral - ".$heading."-".$number."-".$email."";
$message1="Thank You for Business Referral ";

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
