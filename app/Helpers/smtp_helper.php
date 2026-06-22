<?php


function get_smtp_settings(){
 $Lmia = new \App\Models\Setting_siaportal_model(); // Adjust namespace if necessary

        // Execute the query
        $smtp = $Lmia->where('id', '1')->findAll();

     
        
        $optionValue = $smtp[0]['option_value'];
  
    $smtpSettings = json_decode($optionValue, true);




$config = array(
    'protocol'       =>  'smtp',
    'SMTPHost'       =>  $smtpSettings['MAIL_HOST'],
    'SMTPPort'       =>  $smtpSettings['MAIL_PORT'],
    'SMTPUser'       =>  $smtpSettings['MAIL_USERNAME'],
    'SMTPPass'       =>  $smtpSettings['MAIL_PASSWORD'],//'dqghienvgifbkrmi',//'zbhbulunfpakfucg', 
    'SMTPCrypto'     =>  $smtpSettings['MAIL_ENCRYPTION'],  // 'ssl' or 'tls'
    'smtpfrom'       =>  $smtpSettings['MAIL_FROM_ADDRESS'],
    'smtpfromname'  =>   $smtpSettings['MAIL_FROM_NAME'],
    'mailsubject'    =>   'No subject - Sia Immigration',
    
    'mailType'       => 'html',
    'SMTPTimeout'    => '10', //in seconds
    'charset'        => 'utf-8',
    'newline'        => "\r\n",
    'validate'       => TRUE,
    'wordWrap'       => TRUE
);

return $config;
  


// Initialize email configuration

}

?>