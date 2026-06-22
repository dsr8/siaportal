<?php 


function assign_team_member_to_team($iggd,$name,$fname){


$From="Sia Immigration";
					$ee = session()->get('email');
       // exit();
           $emaill=$ee;

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
	
	@mail('Support@siaimmigration.com,office@siaimmigration.com,kam@siaimmigration.com,mkj@siaimmigration.com,no-reply@siaimmigration.com',$subject,$message,$headers);
//@mail('ds@siaimmigration.com',$subject,$message,$headers);

}



 function assign_team_member($name,$tname,$tmobile,$cmobile,$email){



					$From="Sia Immigration";
				$ee = session()->get('email');
           $emaill=$ee;

					//$subject  = "New Job Available -".ucfirst($type).",Date-".date('d/m/Y')."";
					//$subject  = "";	
					$subject  = "Assign Team Member";						
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
                              <td>We wish to inform you that a team member is now assigned to work on your application.
</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Assigned team member will be in contact with you for the further information as needed to complete the profile. We encourage you to inform us right away about any changes in your in your legal status in Canada.

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
					
@mail($email.',no-reply@siaimmigration.com',$subject,$message,$headers);



$message1="Dear  ".$name." Assign Team Member now";

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
?>