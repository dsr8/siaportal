<?php
function completed_mail_team($iggd,$name,$approve_note,$date_work_permit,$approval_letter){


	$From="Sia Immigration";
					 $ee = session()->get('email');
           $emaill=$ee;

					$subject  = "completed id-".$iggd." Name-".$name."";
					//$subject  = "Profile in Process";	
					//$subject  = "Lended  Application Fee";						
					$headers  = "MIME-Version: 1.0\r\n";
 					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 					
 					//$headers.="From: \"".$From."\"<".$emaill."> \r\n";
           $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
					$message =' Hi Team <br>';
					$message .= 'Application completed <br>';
					$message .= 'Date : ' .date('d/m/Y').'<br>';
					$message .= 'Date Of complet : ' .$date_work_permit.'<br>';
					$message .= ' Letter  : <a href="https://canada.siaimmigration.com/assets/resume/'.$approval_letter.'"> Letter </a><br>';
					
					$message .= 'Note : ' .$approve_note.'<br>';
					
					
				
	
//	@mail('info@siaimmigration.com,admin@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);

helper('smtp_helper');
  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com','consult@siaimmigration.com','care@siaimmigration.com'];

			
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();
    
    
    
}
//function approve_mail_client1($name,$fname,$cmobile,$email,$iggd){}

function approve_mail_client1($name,$fname,$cmobile,$email,$iggd){


					$From="Sia Immigration";
				$ee = session()->get('email');
           $emaill=$ee;

					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Approved";						
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
                            <tr>We would like to inform you that your Application has been  approved .
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
						$cc = array('no-reply@siaimmigration.com');
				$to = [$email];

			
				
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


  $From="Sia Immigration";
         $ee = session()->get('email');
           $emaill=$ee;

          $subject  = "write a Review id-".$iggd." Name-".$name."";
          //$subject  = "Profile in Process"; 
          //$subject  = "Lended  Application Fee";            
          $headers  = "MIME-Version: 1.0\r\n";
          $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";          
         // $headers.="From: \"".$From."\"<".$emaill."> \r\n";
           $headers .= 'From:  ' . $From . ' <' . $emaill .'>' . " \r\n" .
            'Reply-To: '.  $emaill . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
          $message =' Hi Team <br>';
          $message .= 'Review<br>';
          $message .= 'Date : ' .date('d/m/Y').'<br>';
          $message .= 'An email for review request has already been sent to above named person now please follow up and do the needful to get review <br>';
         
          
          
        
  
// @mail('info@siaimmigration.com,admin@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);

helper('smtp_helper');
  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message);
						$cc = array('no-reply@siaimmigration.com');
				$to = ['info@siaimmigration.com','admin@siaimmigration.com','ds@siaimmigration.com','office@siaimmigration.com','kam@siaimmigration.com','mkj@siaimmigration.com','Reach@siaimmigration.com','support@siaimmigration.com','consult@siaimmigration.com','care@siaimmigration.com'];

			
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();


$From1="Sia immigration";
          $ee = session()->get('email');
           $emaill1=$ee;

          //$subject  = "".ucfirst($cs).",id-".$dell.",Name-".$name."";
          //$subject  = "Name ".$name."-Id".$dell."";
          
              
            $subject1  = " ".$name." - Please write a Review "; 
                    
          $headers1  = "MIME-Version: 1.0\r\n";
          $headers1 .= "Content-type: text/html; charset=iso-8859-1\r\n";           
         // $headers1.="From: \"".$From1."\"<".$emaill1."> \r\n";
           $headers1 .= 'From:  ' . $From1 . ' <' . $emaill1 .'>' . " \r\n" .
            'Reply-To: '.  $emaill1 . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
          
      
          
          
          $message1 ='<body style="background-color:#f1f1f1;">
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
                              <td>We would love to hear your feedback, and I would be incredibly grateful if you could take a couple of minutes to write a quick review for us.</td>
                        </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td style="text-align:center"><a href="https://www.siaimmigration.com/Home/review_all_together" target="_blank" style="background:#333; padding:5px 0px; text-decoration:none; width:100%; display:block; color:#fff; font-weight:bold; font-size:18px;">Please click here</a></td>
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
                      <td align="center" valign="top">2019  <strong><a href="https://www.siaimmigration.com/" target="_blank" style="text-decoration:none;color:#4fa4db;">SiaImmigration</a></strong> | All Rights Reserved</td>
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
</html>';
          
          
        
       //   @mail($email.',no-reply@siaimmigration.com',$subject1,$message1,$headers1);
       
       helper('smtp_helper');
  $email1 = \Config\Services::email();
    $config = get_smtp_settings();
    $email1->initialize($config);
$message1 = preg_replace('/\\\\/', '', $message1);
						$cc = array('no-reply@siaimmigration.com');
				$to = [$email];

			
				
				$email1->setFrom($emaill, $From);
    $email1->setTo($to);
    $email1->setCC($cc);
    $email1->setReplyTo($emaill);
    $email1->setSubject($subject);
    $email1->setMessage($message1);
    $email1->send();
       
       
          //@mail('ds@siaimmigration.com',$subject1, $message1, $headers1);
          
    








}


?>