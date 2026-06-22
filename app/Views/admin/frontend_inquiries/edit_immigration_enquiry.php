<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="data:image/x-icon;base64,AAABAAEAEBAQAAAAAAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAUlL6ANPK/ACAY/8Ae17/AJ+K/wAAAO0ALwD/AKWR/wDq5v8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABmgAAAAACGYGaAAAUAAIZgZoAABQAAhmBmgAZmZgCGYGaAVmZnUIZgZok2FhY5hmBmiUVmZUmGYGaAAEZAAIZgZoAAhoAAhmBmgAACAACGYGaAAAAAAIZgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD//wAAH/EAAB7xAAAe8QAAGDEAABARAAAAAQAAAAEAABxxAAAccQAAHvEAAB/xAAD//wAA//8AAP//AAD//wAA" rel="icon" type="image/x-icon" />
        <title>Siaportal</title>
        <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

         <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
         <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <style>
  label.error {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  padding:1px 20px 1px 20px;
}
  </style>
    </head>
    <body class="sb-nav-fixed">
           <?= view ('admininclude/header.php'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                

<?= view('admininclude/admin_nav'); ?>

                 
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Edit Frontend Inquiries</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>

                       <form id="contactForm" method="post" action="<?php echo base_url();?>/Siaportal/edit_immigration_enquiry/<?php echo $new_record['0']['id']; ?>" enctype="multipart/form-data"> 
                        <div class="row">
                            <div class="col-xl-3 col-md-3"></div>
                            <div class="col-xl-6 col-md-6 selectEntry">
                                


<div class="form-group"><label class="small mb-1" for="inputFirstName">Name

<?php

//print_r($data);

?>

</label>
    <input class="form-control py-4"name="heading" id="heading" value="<?php echo $new_record['0']['heading']; ?>" type="text" placeholder="Enter Team Member name" /></div>
    
    <?php /*  ?>
    <div class="form-group"><label class="small mb-1" for="inputFirstName">Officio id</label>
    <input class="form-control py-4"name="short_news" id="short_news" value="<?php echo $new_record['0']['short_news']; ?>" type="text" placeholder="Enter Officio id" /></div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">Source</label>
    
<select class="form-control " name="agent_name" id="agent_name">
    
     <option value="">Select Source</option>
          <option   value="">Select Source</option>
         <option <?php echo ($new_record['0']['agent_name'] == 'Facebook') ? 'selected' : ''; ?> value="Facebook">Facebook</option>

          <option <?php echo ($new_record['0']['agent_name'] == 'Webform') ? 'selected' : ''; ?> value="Webform">Webform</option>
          <option <?php echo ($new_record['0']['agent_name'] == 'Phone/WhatsApp') ? 'selected' : ''; ?> value="Phone/WhatsApp">Phone/WhatsApp</option>
          <option <?php echo ($new_record['0']['agent_name'] == 'Email') ? 'selected' : ''; ?> value="Email">Email</option>
          <option <?php echo ($new_record['0']['agent_name'] == 'LinkedIn') ? 'selected' : ''; ?> value="LinkedIn">LinkedIn</option>
          <option <?php echo ($new_record['0']['agent_name'] == 'Google my Bus') ? 'selected' : ''; ?> value="Google my Bus">Google my Bus</option>
          <option <?php echo ($new_record['0']['agent_name'] == 'Live Chat') ? 'selected' : ''; ?> value="Live Chat">Live Chat</option>
        <option <?php echo ($new_record['0']['agent_name'] == 'Instagram') ? 'selected' : ''; ?> value="Instagram">Instagram</option>
        <option <?php echo ($new_record['0']['agent_name'] == 'YouTube') ? 'selected' : ''; ?> value="YouTube">YouTube</option>
        <option <?php echo ($new_record['0']['agent_name'] == 'Reffrence/Agent') ? 'selected' : ''; ?> value="Reffrence/Agent">Reffrence/Agent</option>
        <option <?php echo ($new_record['0']['agent_name'] == 'Existing client') ? 'selected' : ''; ?> value="Existing client">Existing client</option>
        <option <?php echo ($new_record['0']['agent_name'] == 'Other') ? 'selected' : ''; ?> value="Other">Other</option>
        <option <?php echo ($new_record['0']['agent_name'] == 'online assessment form') ? 'selected' : ''; ?> value="online assessment form">Online assessment form</option>
</select>

</div>
<?php */ ?>
<div class="form-group"><label class="small mb-1" for="inputFirstName">Type</label>
    
<select class="form-control " name="typee" id="typee" onclick="tag()">
    
    	<option <?php echo ($new_record['0']['typee'] == 'Immigration') ? 'selected' : ''; ?> value="Immigration">Canada</option>
        <option <?php echo ($new_record['0']['typee'] == 'student_need_job') ? 'selected' : ''; ?> value="student_need_job">Student Need Job</option>
        <option<?php echo ($new_record['0']['typee'] == 'lmia_needed') ? 'selected' : ''; ?> value="lmia_needed">LMIA Needed</option>
		<!--option value="Agent">Agent</option-->
        <option <?php echo ($new_record['0']['typee'] == 'overseas') ? 'selected' : ''; ?> value="overseas">overseas</option>
		<option <?php echo ($new_record['0']['typee'] == 'other') ? 'selected' : ''; ?> value="other">Other</option>
</select>

</div>
<?php /* ?>
          <div class="form-group hide" id="teg">
                <label>Tag Search</label>
           
      

       <input type="text" class="form-control" name="tag_search" value="<?php echo $new_record['0']['tag_search']; ?>" id="tag_search" value="">
       
                  
              </div>
<?php */ ?>
              <div class="form-group hide" id="tegg">
                <label>Having Canada Visa </label>
           
      

       <input type="text" class="form-control" value="<?php echo $new_record['0']['having_canada_visa'] ?? ''; ?>" name="having_canada_visa" id="having_canada_visa" value="">
       
                  
              </div>


               <script>
  function tag(){
var fe =document.getElementById("typee").value;
//alert(fe);
    if((fe=='student_need_job') || (fe=='lmia_needed') ){
$("#teg" ).removeClass("hide").addClass("show" );
$("#tegg" ).removeClass("hide").addClass("show" );
 $('#tag_search').attr('required','required');
 $('#having_canada_visa').attr('required','required');

    }
    else{

$( "#teg" ).removeClass("show").addClass("hide" );
$( "#tegg" ).removeClass("show").addClass("hide" );
 $('#tag_search').removeAttr('required');
  $('#having_canada_visa').removeAttr('required');

    }
  }
 
</script>
    
    
    
    
    <?php /* ?>
     <div class="form-group"><label class="small mb-1" for="inputFirstName" >Team Member name</label>
    <input class="form-control py-4"name="team_member" value="<?php echo $new_record['0']['team_member']; ?>" id="team_member" type="text" placeholder="Enter Team Member name" /></div>
<?php */ ?>

    <input type="hidden" name="ccode" value="0">
   <div class="form-group">
        <label class="small mb-1">Phone Number</label>
        <div style="display:flex; gap:8px; align-items:center;">
            <select name="cc" id="cc" style="flex:0 0 48%;">
                <option value="">Country Code</option>
                <optgroup label="⭐ Suggested">
                    <option value="1" <?php echo (($new_record['0']['cc'] ?? '') == '1') ? 'selected' : ''; ?>>🇨🇦 Canada (+1)</option>
                </optgroup>
                <optgroup label="All Countries">
                    <option value="93" <?php echo (($new_record['0']['cc'] ?? '') == '93') ? 'selected' : ''; ?>>🇦🇫 Afghanistan (+93)</option>
                    <option value="355" <?php echo (($new_record['0']['cc'] ?? '') == '355') ? 'selected' : ''; ?>>🇦🇱 Albania (+355)</option>
                    <option value="213" <?php echo (($new_record['0']['cc'] ?? '') == '213') ? 'selected' : ''; ?>>🇩🇿 Algeria (+213)</option>
                    <option value="1684" <?php echo (($new_record['0']['cc'] ?? '') == '1684') ? 'selected' : ''; ?>>🇦🇸 American Samoa (+1684)</option>
                    <option value="376" <?php echo (($new_record['0']['cc'] ?? '') == '376') ? 'selected' : ''; ?>>🇦🇩 Andorra (+376)</option>
                    <option value="244" <?php echo (($new_record['0']['cc'] ?? '') == '244') ? 'selected' : ''; ?>>🇦🇴 Angola (+244)</option>
                    <option value="54" <?php echo (($new_record['0']['cc'] ?? '') == '54') ? 'selected' : ''; ?>>🇦🇷 Argentina (+54)</option>
                    <option value="374" <?php echo (($new_record['0']['cc'] ?? '') == '374') ? 'selected' : ''; ?>>🇦🇲 Armenia (+374)</option>
                    <option value="61" <?php echo (($new_record['0']['cc'] ?? '') == '61') ? 'selected' : ''; ?>>🇦🇺 Australia (+61)</option>
                    <option value="43" <?php echo (($new_record['0']['cc'] ?? '') == '43') ? 'selected' : ''; ?>>🇦🇹 Austria (+43)</option>
                    <option value="994" <?php echo (($new_record['0']['cc'] ?? '') == '994') ? 'selected' : ''; ?>>🇦🇿 Azerbaijan (+994)</option>
                    <option value="973" <?php echo (($new_record['0']['cc'] ?? '') == '973') ? 'selected' : ''; ?>>🇧🇭 Bahrain (+973)</option>
                    <option value="880" <?php echo (($new_record['0']['cc'] ?? '') == '880') ? 'selected' : ''; ?>>🇧🇩 Bangladesh (+880)</option>
                    <option value="32" <?php echo (($new_record['0']['cc'] ?? '') == '32') ? 'selected' : ''; ?>>🇧🇪 Belgium (+32)</option>
                    <option value="55" <?php echo (($new_record['0']['cc'] ?? '') == '55') ? 'selected' : ''; ?>>🇧🇷 Brazil (+55)</option>
                    <option value="1" <?php echo (($new_record['0']['cc'] ?? '') == '1') ? 'selected' : ''; ?>>🇨🇦 Canada (+1)</option>
                    <option value="56" <?php echo (($new_record['0']['cc'] ?? '') == '56') ? 'selected' : ''; ?>>🇨🇱 Chile (+56)</option>
                    <option value="86" <?php echo (($new_record['0']['cc'] ?? '') == '86') ? 'selected' : ''; ?>>🇨🇳 China (+86)</option>
                    <option value="57" <?php echo (($new_record['0']['cc'] ?? '') == '57') ? 'selected' : ''; ?>>🇨🇴 Colombia (+57)</option>
                    <option value="20" <?php echo (($new_record['0']['cc'] ?? '') == '20') ? 'selected' : ''; ?>>🇪🇬 Egypt (+20)</option>
                    <option value="33" <?php echo (($new_record['0']['cc'] ?? '') == '33') ? 'selected' : ''; ?>>🇫🇷 France (+33)</option>
                    <option value="49" <?php echo (($new_record['0']['cc'] ?? '') == '49') ? 'selected' : ''; ?>>🇩🇪 Germany (+49)</option>
                    <option value="233" <?php echo (($new_record['0']['cc'] ?? '') == '233') ? 'selected' : ''; ?>>🇬🇭 Ghana (+233)</option>
                    <option value="30" <?php echo (($new_record['0']['cc'] ?? '') == '30') ? 'selected' : ''; ?>>🇬🇷 Greece (+30)</option>
                    <option value="852" <?php echo (($new_record['0']['cc'] ?? '') == '852') ? 'selected' : ''; ?>>🇭🇰 Hong Kong (+852)</option>
                    <option value="91" <?php echo (($new_record['0']['cc'] ?? '') == '91') ? 'selected' : ''; ?>>🇮🇳 India (+91)</option>
                    <option value="62" <?php echo (($new_record['0']['cc'] ?? '') == '62') ? 'selected' : ''; ?>>🇮🇩 Indonesia (+62)</option>
                    <option value="98" <?php echo (($new_record['0']['cc'] ?? '') == '98') ? 'selected' : ''; ?>>🇮🇷 Iran (+98)</option>
                    <option value="964" <?php echo (($new_record['0']['cc'] ?? '') == '964') ? 'selected' : ''; ?>>🇮🇶 Iraq (+964)</option>
                    <option value="353" <?php echo (($new_record['0']['cc'] ?? '') == '353') ? 'selected' : ''; ?>>🇮🇪 Ireland (+353)</option>
                    <option value="972" <?php echo (($new_record['0']['cc'] ?? '') == '972') ? 'selected' : ''; ?>>🇮🇱 Israel (+972)</option>
                    <option value="39" <?php echo (($new_record['0']['cc'] ?? '') == '39') ? 'selected' : ''; ?>>🇮🇹 Italy (+39)</option>
                    <option value="81" <?php echo (($new_record['0']['cc'] ?? '') == '81') ? 'selected' : ''; ?>>🇯🇵 Japan (+81)</option>
                    <option value="962" <?php echo (($new_record['0']['cc'] ?? '') == '962') ? 'selected' : ''; ?>>🇯🇴 Jordan (+962)</option>
                    <option value="254" <?php echo (($new_record['0']['cc'] ?? '') == '254') ? 'selected' : ''; ?>>🇰🇪 Kenya (+254)</option>
                    <option value="965" <?php echo (($new_record['0']['cc'] ?? '') == '965') ? 'selected' : ''; ?>>🇰🇼 Kuwait (+965)</option>
                    <option value="961" <?php echo (($new_record['0']['cc'] ?? '') == '961') ? 'selected' : ''; ?>>🇱🇧 Lebanon (+961)</option>
                    <option value="60" <?php echo (($new_record['0']['cc'] ?? '') == '60') ? 'selected' : ''; ?>>🇲🇾 Malaysia (+60)</option>
                    <option value="52" <?php echo (($new_record['0']['cc'] ?? '') == '52') ? 'selected' : ''; ?>>🇲🇽 Mexico (+52)</option>
                    <option value="212" <?php echo (($new_record['0']['cc'] ?? '') == '212') ? 'selected' : ''; ?>>🇲🇦 Morocco (+212)</option>
                    <option value="95" <?php echo (($new_record['0']['cc'] ?? '') == '95') ? 'selected' : ''; ?>>🇲🇲 Myanmar (+95)</option>
                    <option value="977" <?php echo (($new_record['0']['cc'] ?? '') == '977') ? 'selected' : ''; ?>>🇳🇵 Nepal (+977)</option>
                    <option value="31" <?php echo (($new_record['0']['cc'] ?? '') == '31') ? 'selected' : ''; ?>>🇳🇱 Netherlands (+31)</option>
                    <option value="64" <?php echo (($new_record['0']['cc'] ?? '') == '64') ? 'selected' : ''; ?>>🇳🇿 New Zealand (+64)</option>
                    <option value="234" <?php echo (($new_record['0']['cc'] ?? '') == '234') ? 'selected' : ''; ?>>🇳🇬 Nigeria (+234)</option>
                    <option value="47" <?php echo (($new_record['0']['cc'] ?? '') == '47') ? 'selected' : ''; ?>>🇳🇴 Norway (+47)</option>
                    <option value="92" <?php echo (($new_record['0']['cc'] ?? '') == '92') ? 'selected' : ''; ?>>🇵🇰 Pakistan (+92)</option>
                    <option value="63" <?php echo (($new_record['0']['cc'] ?? '') == '63') ? 'selected' : ''; ?>>🇵🇭 Philippines (+63)</option>
                    <option value="48" <?php echo (($new_record['0']['cc'] ?? '') == '48') ? 'selected' : ''; ?>>🇵🇱 Poland (+48)</option>
                    <option value="351" <?php echo (($new_record['0']['cc'] ?? '') == '351') ? 'selected' : ''; ?>>🇵🇹 Portugal (+351)</option>
                    <option value="974" <?php echo (($new_record['0']['cc'] ?? '') == '974') ? 'selected' : ''; ?>>🇶🇦 Qatar (+974)</option>
                    <option value="7" <?php echo (($new_record['0']['cc'] ?? '') == '7') ? 'selected' : ''; ?>>🇷🇺 Russia (+7)</option>
                    <option value="966" <?php echo (($new_record['0']['cc'] ?? '') == '966') ? 'selected' : ''; ?>>🇸🇦 Saudi Arabia (+966)</option>
                    <option value="65" <?php echo (($new_record['0']['cc'] ?? '') == '65') ? 'selected' : ''; ?>>🇸🇬 Singapore (+65)</option>
                    <option value="27" <?php echo (($new_record['0']['cc'] ?? '') == '27') ? 'selected' : ''; ?>>🇿🇦 South Africa (+27)</option>
                    <option value="82" <?php echo (($new_record['0']['cc'] ?? '') == '82') ? 'selected' : ''; ?>>🇰🇷 South Korea (+82)</option>
                    <option value="34" <?php echo (($new_record['0']['cc'] ?? '') == '34') ? 'selected' : ''; ?>>🇪🇸 Spain (+34)</option>
                    <option value="94" <?php echo (($new_record['0']['cc'] ?? '') == '94') ? 'selected' : ''; ?>>🇱🇰 Sri Lanka (+94)</option>
                    <option value="46" <?php echo (($new_record['0']['cc'] ?? '') == '46') ? 'selected' : ''; ?>>🇸🇪 Sweden (+46)</option>
                    <option value="41" <?php echo (($new_record['0']['cc'] ?? '') == '41') ? 'selected' : ''; ?>>🇨🇭 Switzerland (+41)</option>
                    <option value="886" <?php echo (($new_record['0']['cc'] ?? '') == '886') ? 'selected' : ''; ?>>🇹🇼 Taiwan (+886)</option>
                    <option value="66" <?php echo (($new_record['0']['cc'] ?? '') == '66') ? 'selected' : ''; ?>>🇹🇭 Thailand (+66)</option>
                    <option value="971" <?php echo (($new_record['0']['cc'] ?? '') == '971') ? 'selected' : ''; ?>>🇦🇪 United Arab Emirates (+971)</option>
                    <option value="44" <?php echo (($new_record['0']['cc'] ?? '') == '44') ? 'selected' : ''; ?>>🇬🇧 United Kingdom (+44)</option>
                    <option value="1" <?php echo (($new_record['0']['cc'] ?? '') == '1') ? 'selected' : ''; ?>>🇺🇸 United States (+1)</option>
                    <option value="84" <?php echo (($new_record['0']['cc'] ?? '') == '84') ? 'selected' : ''; ?>>🇻🇳 Vietnam (+84)</option>
                    <option value="260" <?php echo (($new_record['0']['cc'] ?? '') == '260') ? 'selected' : ''; ?>>🇿🇲 Zambia (+260)</option>
                    <option value="263" <?php echo (($new_record['0']['cc'] ?? '') == '263') ? 'selected' : ''; ?>>🇿🇼 Zimbabwe (+263)</option>
                </optgroup>
            </select>
            <input class="form-control py-4" name="number" id="number" value="<?php echo $new_record['0']['number']; ?>" type="text" placeholder="Enter Phone Number" style="flex:1;" />
        </div>
   </div>


    <div class="form-group"><label class="small mb-1" for="inputFirstName">Email</label>
    <input class="form-control py-4" id="email" type="text" name="email" value="<?php echo $new_record['0']['email']; ?>" placeholder="Enter address" required="required" /></div>
<input class="form-control py-4" id="resume_old" type="hidden" name="resume_old" value="<?php echo $new_record['0']['resume']; ?>" placeholder="Enter address" required="required" />
<?php /* ?>
<div class="form-group"><label class="small mb-1" for="inputFirstName">Upload Resume</label>
<input class="form-control py-4" id="resume" type="file" name="resume" placeholder="Enter address" />
                                </div>
								<?php */ ?>


<div class="form-group">
 <input type="submit"id="siasubmit"  class="form-control py-4" style="background-color: green;text-align: center;color: white" name="submit" value="Submit">
</div>

    

                            </div>
                            <div class="col-xl-3 col-md-3">
 
<div class="form-group">

<div class="row">
   


 



</div>
</div>




                               
                            </div>
        

         </form>                   
                           
                        </div>
                        
                </main>
                 <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"></div>
                            <div>
                                <a href="#"></a>
                               
                                <a href="#"></a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
 
    


        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/public/dist/assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url();?>/public/dist/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/public/dist/assets/demo/datatables-demo.js"></script>


<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>$(document).ready(function(){ $('#cc').select2({ placeholder: 'Country Code', allowClear: false, dropdownParent: $('body') }); });</script>



    
        <script>

$(document).ready(function () {

    $('#contactForm').validate({ // initialize the plugin
        rules: {
            number: {
                required: true
               
            },
            
             typee: {
                required: true
               
            },
            
            agent_name: {
                required: true
               
            },
             team_member: {
                required: true
               
            }, email: {
                required: true
               
            },
            heading: {
                required: true
               
            },
            cc: {
                required: true
               
            },
            
           
        },
        messages: {
        number: "Number Is required",
        typee: "Type Is required",
        agent_name: "Source Is required",
        team_member: "Team Member Name Is required",
        email: "Email Is required",
        heading: "Name Is required",
         cc: "Country Code Is required",
           
              
       
         }
        
    });

});
</script>

 <script>
  $(function() {


    $( "#dob" ).datepicker({

dateFormat: 'yy-mm-dd',
autoclose: true

    });
      });
</script>



    </body>
</html>
