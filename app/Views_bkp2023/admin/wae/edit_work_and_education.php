<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>WORK AND EDUCATION</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>

<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<link rel="stylesheet" href="https://siaimmigration.com/admin/assets_form/css/form.css">
<link rel="stylesheet" href="https://siaimmigration.com/admin/assets_form/css/work_and_edu_style.css">


<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>



<SCRIPT type="text/javascript">

	window.history.forward();

	function noBack() { 
	//location.reload();
	window.history.forward(); }

</SCRIPT>

<style>
	.aa{


		font-weight: bold;
  color: #222;
  font-size: 18px;
  margin: 0px;
  margin-bottom: 10px;
	}
	</style>


</head>

<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">

<header>

<div  class="form-headertop">

  <div class="container">

    <div class="row">

      <div class="col-xs-6 col-sm-6 col-md-3 formlogo"> <a><img src="https://siaimmigration.com/admin/assets_form/images/form-logo.png"></a> </div>

      <div class="col-xs-6 col-sm-6 col-md-3 f-iccrc-logo"> <a>
	  <img src="https://siaimmigration.com/admin/assets_form/images/iccrclogonew.png" class="img-responsive"></a> </div>

      <div class="col-xs-12 col-sm-12 col-md-6 top-move ">

        <div class="fsocial"> <i class="fa fa-envelope f-face" aria-hidden="true"></i> <span> mkj@siaimmigration.com  </span>

    

          <i class="fa fa-mobile f-fac1"></i> <span> +1 &nbsp;778-257-5508 , +1 &nbsp;778-257-5709  </span>

          

          <a href="https://www.facebook.com/SiaImmigration/" target="_blank"><img src="https://siaimmigration.com/admin/assets_form/images/g.png" class="f-left-marg"> </a> <a href="https://www.youtube.com/channel/UCo1bnESxqcMM66zFHz3NaHA" target="_blank"><img src="https://siaimmigration.com/admin/assets_form/images/h.png"> </a> </div>

      </div>

    </div>

  </div>

</div>

</header>  <!-- Full Width Column -->
  <div class="content-wrapper"style="background-color:#fff;">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header" >
	  
   <div class="container">

          <div class="row"> 

			  <div class="left">

					  <div class="col-sm-3 col-md-3">

					 

					  </div>

			   

					  <div class="col-sm-6 col-md-6">

					  <div class="epadd">

					      <h2 style="padding-left:1px; ">Work and Education</h2>
					      <p style="color:black">WORK and Education (Please fill two separate sheets for spouse and main applicant)</p><br>

                                    

											<form  method="post" class="form-horizontal" action="<?php echo base_url();?>/Siaportal/edit_wae/<?php echo $waem_id['0']['id'];?>" enctype='multipart/form-data'>
											




												  <div class="form-group">
												  	<h3 class="aa">First Name of applicant</h3>
                    <input type="text" name="fname" id="fname" placeholder="Enter First Name of applicant" required value="<?php echo $waem_id['0']['fname'];?>" value="<?php echo $waem_id['0']['fname'];?>" />
                    <h3 class="aa">Last name of the Applicant</h3>
                    <input type="text" name="lname" id="lname" placeholder="Your answer" required value="<?php echo $waem_id['0']['lname'];?>" value="<?php echo $waem_id['0']['fname'];?>" />
                    <h3 class="aa">DOB</h3>
                    <input type="text" name="dob" id="dob" placeholder="Your answer" required value="<?php echo $waem_id['0']['dob'];?>" />
                    <h3 class="aa">Contact No</h3>
                    <input type="text" name="phone_number" id="phone_number" placeholder="Your answer" required value="<?php echo $waem_id['0']['phone_number'];?>" />
                    <h3 class="aa">Email</h3>
                    <input type="email" name="email" id="email" placeholder="Your answer" required value="<?php echo $waem_id['0']['email'];?>" />

                   
                     <h3 class="aa"> Height in cms</h3>
                    <input type="text" name="height_in_cms" id="height_in_cms" placeholder="Your answer" required value="<?php echo $waem_id['0']['height_in_cms'];?>" />
                     <h3 class="aa">Eyes Colour</h3>
                    <input type="text" name="eyes_color" id="eyes_color" placeholder="Your answer" required value="<?php echo $waem_id['0']['eyes_color'];?>" />
                     <h3 class="aa">Marriage Date (If Applicable )</h3>
                    <input type="text" name="marriage_date" id="marriage_date" placeholder="Your answer" required value="<?php echo $waem_id['0']['marriage_date'];?>" />
                     <h3 class="aa">Spouse Name</h3>
                    <input type="text" name="spouse_name" id="spouse_name" placeholder="Your answer" required value="<?php echo $waem_id['0']['spouse_name'];?>" />
                     <h3 class="aa">Current address</h3>
                    <input type="text" name="current_address" id="current_address" placeholder="Your answer" required value="<?php echo $waem_id['0']['current_address'];?>" />
                     <h3 class="aa">In the past 10 years, have you given your fingerprints and photo (biometrics) for an application to come to Canada?</h3>
                    <input type="text" name="past_ten" id="past_ten" placeholder="Your answer" required value="<?php echo $waem_id['0']['past_ten'];?>" />
                     <h3 class="aa">Unique Client Identifier (UCI)</h3>
                    <input type="text" name="uci" id="uci" placeholder="Your answer" required value="<?php echo $waem_id['0']['uci'];?>" />
                     <h3 class="aa"> Country of Citizenship</h3>
                    <input type="text" name="citizenship" id="citizenship" placeholder="Your answer" required value="<?php echo $waem_id['0']['citizenship'];?>" />
                     <h3 class="aa">Do you have a relative who is a citizen or permanent resident of Canada? (The relative must be 18 or older and living in Canada.)</h3>
                    <input type="text" name="have_a_relative" id="have_a_relative" placeholder="Your answer" required value="<?php echo $waem_id['0']['have_a_relative'];?>" />
                     <h3 class="aa"> Language Test Details IELTS / CELPIP</h3>
                    <input type="text" name="language_test" id="language_test" placeholder="Your answer" required value="<?php echo $waem_id['0']['language_test'];?>" />
                     <h3 class="aa"> Date of Test taken</h3>
                    <input type="text" name="date_of_test_taken" id="date_of_test_taken" placeholder="Your answer" required value="<?php echo $waem_id['0']['date_of_test_taken'];?>" />
                     <h3 class="aa">Date of Administrative Sign</h3>
                    <input type="text" name="date_of_sign" id="date_of_sign" placeholder="Your answer" required value="<?php echo $waem_id['0']['date_of_sign'];?>" />
                     <h3 class="aa">Speaking</h3>
                    <input type="text" name="speaking" id="speaking" placeholder="Your answer" required value="<?php echo $waem_id['0']['speaking'];?>" />
                     <h3 class="aa"> Reading</h3>
                    <input type="text" name="reading" id="reading" placeholder="Your answer" required value="<?php echo $waem_id['0']['reading'];?>" />
                     <h3 class="aa">Listening</h3>
                    <input type="text" name="listening" id="listening" placeholder="Your answer" required value="<?php echo $waem_id['0']['listening'];?>" />
                     <h3 class="aa">Writing</h3>
                    <input type="text" name="writing" id="writing" placeholder="Your answer" required value="<?php echo $waem_id['0']['writing'];?>" />
                     <h3 class="aa">TRF No (In case if Ielts )</h3>
                    <input type="text" name="TRF_no" id="TRF_no" placeholder="Your answer" required value="<?php echo $waem_id['0']['TRF_no'];?>" />
                     <h3 class="aa"> In Case of CELPIP</h3>
                    <input type="text" name="CELPIP" id="CELPIP" placeholder="Your answer" required value="<?php echo $waem_id['0']['CELPIP'];?>" />
                     <h3 class="aa"> Language test PIN</h3>
                    <input type="text" name="test_PIN" id="test_PIN" placeholder="Your answer" required value="<?php echo $waem_id['0']['test_PIN'];?>" />
                     <h3 class="aa">Language Certificate No</h3>
                    <input type="text" name="l_certificate_no" id="l_certificate_no" placeholder="Your answer" required value="<?php echo $waem_id['0']['l_certificate_no'];?>" />
                    
                       <h3 class="aa"> Employer Details</h3>
                    <input type="text" name="employer_details" id="employer_details" placeholder="Your answer" required value="<?php echo $waem_id['0']['employer_details'];?>" />
                       <h3 class="aa">Name of the company</h3>
                    <input type="text" name="name_of_camp" id="name_of_camp" placeholder="Your answer" required value="<?php echo $waem_id['0']['name_of_camp'];?>" />
                       <h3 class="aa">Job Title</h3>
                    <input type="text" name="job_title" id="job_title" placeholder="Your answer" required value="<?php echo $waem_id['0']['job_title'];?>" />
                       <h3 class="aa">text of hours Worked</h3>
                    <input type="text" name="hours_worked" id="hours_worked" placeholder="Your answer" required value="<?php echo $waem_id['0']['hours_worked'];?>" />
                       <h3 class="aa">Employer name, Contact text , email and designation who will sign the letter</h3>
                    <input type="text" name="employer_detail" id="employer_detail" placeholder="Your answer" required value="<?php echo $waem_id['0']['employer_detail'];?>" />

                    <h2 class="aa">EDUCATIONAL HISTORY</h2>

                   
                    <?php  
                  $cc= $waem_id['0']['e_from'];

                  $cc1 = explode(',', $cc);
                 
                         $aa1=count($cc1);
                       //exit();

                         $eh1= $waem_id['0']['e_to'];
                          $eh1 = explode(',', $eh1);

                           $eh2= $waem_id['0']['e_institution'];
                          $eh2 = explode(',', $eh2);

                           $eh3= $waem_id['0']['e_city'];
                          $eh3 = explode(',', $eh3);

                           $eh4= $waem_id['0']['e_diploma'];
                          $eh4 = explode(',', $eh4);

                           $eh5= $waem_id['0']['e_study'];
                          $eh5 = explode(',', $eh5);

                           $eh6= $waem_id['0']['e_year_of_study'];
                          $eh6 = explode(',', $eh6);

                        for($i=0;$i<$aa1;$i++){

                    ?>
                     <h3 class="aa">From Year/Month <?php echo $i;?></h3>

                    <input type="text" name="e_from[]" id="e_from" placeholder="Your answer" required value="<?php echo $cc1[$i];?>" />
                     <h3 class="aa">To Year/Month </h3>
                    <input type="text" name="e_to[]" id="e_to" placeholder="Your answer" required value="<?php echo $eh1[$i];?>" />
                     <h3 class="aa">Name of institution </h3>
                    <input type="text" name="e_institution[]" id="e_institution" placeholder="Your answer" required value="<?php echo $eh2[$i];?>" />
                     <h3 class="aa">City and country </h3>
                    <input type="text" name="e_city[]" id="e_city" placeholder="Your answer" required value="<?php echo $eh3[$i];?>" />
                     <h3 class="aa">Diploma/ Degree </h3>
                    <input type="text" name="e_diploma[]" id="e_diploma" placeholder="Your answer" required value="<?php echo $eh4[$i];?>" />
                     <h3 class="aa">Field of study</h3>
                    <input type="text" name="e_study[]" id="e_study" placeholder="Your answer" required value="<?php echo $eh5[$i];?>" />
                     <h3 class="aa">Total text of years studied </h3>
                    <input type="text" name="e_year_of_study[]" id="e_year_of_study" placeholder="Your answer" required value="<?php echo $eh6[$i];?>" />
                  <?php  } ?>

                    <h2>WORK HISTORY</h2>
 <?php  
                  $wh1= $waem_id['0']['w_from'];

                  $wh1 = explode(',', $wh1);
                 
                         $aa2=count($wh1);
                       //exit();

                         $wh2= $waem_id['0']['w_to'];
                         $wh2 = explode(',', $wh2);

                           $wh3= $waem_id['0']['w_job_title'];
                         $wh3 = explode(',', $wh3);

                           $wh4= $waem_id['0']['w_time'];
                          $wh4 = explode(',', $wh4);

                           $wh5= $waem_id['0']['w_employer_name'];
                          $wh5 = explode(',', $wh5);

                           $wh6= $waem_id['0']['w_omplete_ddress'];
                          $wh6 = explode(',', $wh6);

                           $wh7= $waem_id['0']['w_country'];
                          $wh7 = explode(',', $wh7);

                          

                        for($i=0;$i<$aa2;$i++){

                    ?>


                     <h3 class="aa">From</h3>
                    <input type="text" name="w_from[]" id="w_from" placeholder="Your answer" required value="<?php echo $wh1[$i];?>" />
                     <h3 class="aa">To</h3>
                    <input type="text" name="w_to[]" id="w_to" placeholder="Your answer" required value="<?php echo $wh2[$i];?>" />
                     <h3 class="aa">Job Title</h3>
                    <input type="text" name="w_job_title[]" id="w_job_title" placeholder="Your answer" required value="<?php echo $wh3[$i];?>" />
                     <h3 class="aa">Part time / Full Time</h3>
                    <input type="text" name="w_time[]" id="w_time" placeholder="Your answer" required value="<?php echo $wh4[$i];?>" />
                     <h3 class="aa">Employer Name</h3>
                    <input type="text" name="w_employer_name[]" id="w_employer_name" placeholder="Your answer" required value="<?php echo $wh5[$i];?>" />
                     <h3 class="aa">Complete Address</h3>
                    <input type="text" name="w_omplete_ddress[]" id="w_omplete_ddress" placeholder="Your answer" required value="<?php echo $wh6[$i];?>" />
                     <h3 class="aa">Country </h3>
                    <input type="text" name="w_country[]" id="w_country" placeholder="Your answer" required value="<?php echo $wh7[$i];?>" />
                      <div class="input_fields_container2">
      <?php }?>
					<h2>Please fill your address history for past 10 years or up until the age of 18 if it is less than 10 years</h2>


          <?php  
                  $ah1= $waem_id['0']['h_from'];
                  $ah11 = explode(',', $ah1);
                         $ah1=count($ah11);

                          $ah2= $waem_id['0']['h_to'];
                          $ah2 = explode(',', $ah2);

                           $ah3= $waem_id['0']['w_occupation'];
                         $ah3 = explode(',', $ah3);

                        

                          

                           $ah4= $waem_id['0']['name_of_employer'];
                          $ah4 = explode(',', $ah4);

                           $ah5= $waem_id['0']['h_city'];
                          $ah5 = explode(',', $ah5);

                           $ah6= $waem_id['0']['h_country'];
                          $ah6 = explode(',', $ah6);
                        for($i=0;$i<$ah1;$i++){

                    ?>

                     <h3 class="aa">From</h3>
                    <input type="text" name="h_from[]" id="h_from" placeholder="Your answer" required value="<?php echo $ah11[$i];?>" />
                     <h3 class="aa">To</h3>
                    <input type="text" name="h_to[]" id="h_to" placeholder="Your answer" required value="<?php echo $ah2[$i];?>" />
                     <h3 class="aa">Name of the occupation or activity.( Like manager or student or vacation/ unemployed etc)</h3>
                    <input type="text" name="w_occupation[]" id="w_occupation" placeholder="Your answer" required value="<?php echo $ah3[$i];?>" />
                     <h3 class="aa">Name of employer or name of educational institute attended</h3>
                    <input type="text" name="name_of_employer[]" id="name_of_employer" placeholder="Your answer" required value="<?php echo $ah4[$i];?>" />

                      <h3 class="aa">City</h3>
                    <input type="text" name="h_city[]" id="h_city" placeholder="Your answer" required value="<?php echo $ah5[$i];?>" />

                       <h3 class="aa">country </h3>
                    <input type="text" name="h_country[]" id="h_country" placeholder="Your answer" required value="<?php echo $ah6[$i];?>" />
                   <?php } ?>

                    <h2>FAMILY INFORMATION</h2>

                    <?php  
                  $fi1= $waem_id['0']['relationship'];
                  $fi11 = explode(',', $fi1);
                         $fi1=count($fi11);

                          $fi2= $waem_id['0']['family_name'];
                          $fi2 = explode(',', $fi2);

                           $fi3= $waem_id['0']['f_dob'];
                         $fi3 = explode(',', $fi3);

                           $fi4= $waem_id['0']['f_date_of_death'];
                          $fi4 = explode(',', $fi4);

                           $fi5= $waem_id['0']['f_place_of_birth'];
                          $fi5 = explode(',', $fi5);

                           $fi6= $waem_id['0']['f_present_address'];
                          $fi6 = explode(',', $fi6);

                            $fi7= $waem_id['0']['f_marital_status'];
                          $fi7 = explode(',', $fi7);
                        for($i=0;$i<$fi1;$i++){

                    ?>


                    <h3 class="aa">Relationship (e.g=Mother,Father,brother,Sister )</h3>
                    <input type="text" name="relationship[]" id="relationship" placeholder="Your answer" required value="<?php echo $fi11[$i];?>" />
                       <h3 class="aa">Family name (Mother )</h3>
                    <input type="text" name="family_name[]" id="family_name" placeholder="Your answer" required value="<?php echo $fi2[$i];?>" />
                       <h3 class="aa">Date of birth</h3>
                    <input type="text" name="f_dob[]" id="phone_text" placeholder="Your answer" required value="<?php echo $fi3[$i];?>" />
                       <h3 class="aa">Date of death if deceased</h3>
                    <input type="text" name="f_date_of_death[]" id="f_date_of_death" placeholder="Your answer" required value="<?php echo $fi4[$i];?>" />
                       <h3 class="aa">Place of birth and/or death (City and country)</h3>
                    <input type="text" name="f_place_of_birth[]" id="f_place_of_birth" placeholder="Your answer" required value="<?php echo $fi5[$i];?>" />
                       <h3 class="aa">Present address</h3>
                    <input type="text" name="f_present_address[]" id="f_present_address" placeholder="Your answer" required value="<?php echo $fi6[$i];?>" />
                       <h3 class="aa">Marital Status</h3>
                    <input type="text" name="f_marital_status[]" id="f_marital_status" placeholder="Your answer" required value="<?php echo $fi7[$i];?>" />

                    <?php } ?>

      <h2>TRAVEL HISTORY</h2>
                    <p>Did you ever travel to or live in any other country? (Except from Canada and home country)</p>


                        <?php  
                  $th1= $waem_id['0']['t_destination'];
                  $th1a1 = explode(',', $th1);
                         $th22=count($th1a1);

                          $th2= $waem_id['0']['t_travel_from'];
                          $th2 = explode(',', $th2);

                           $th3= $waem_id['0']['t_travel_to'];
                         $th3 = explode(',', $th3);

                           $th4= $waem_id['0']['reason_for_travel'];
                          $th4 = explode(',', $th4);

                           $th5= $waem_id['0']['t_city_of_travel'];
                          $th5 = explode(',', $th5);

                          
                        for($i=0;$i<$th22;$i++){

                    ?>

                     <h3 class="aa">Destination /name of country </h3>
                    <input type="text" name="t_destination[]" id="t_destination" placeholder="Your answer" required value="<?php echo $th1a1[$i];?>" > 
                     <h3 class="aa">Date of Travel From </h3>
                    <input type="text" name="t_travel_from[]" id="t_travel_from" placeholder="Your answer" required value="<?php echo $th2[$i];?>" />
                     <h3 class="aa">Date of Travel To</h3>
                    <input type="text" name="t_travel_to[]" id="t_travel_to" placeholder="Your answer" required value="<?php echo $th3[$i];?>" />
                     <h3 class="aa">Reason For Travel</h3>
                    <input type="text" name="reason_for_travel[]" id="reason_for_travel" placeholder="Your answer" required value="<?php echo $th4[$i];?>" />
                     <h3 class="aa">City of travel</h3>
                    <input type="text" name="t_city_of_travel[]" id="t_city_of_travel" placeholder="Your answer" required value="<?php echo $th5[$i];?>" />
<?php } ?>


                       <h3 class="aa">Have you ever applied to Immigration Canada Before?</h3>
                    <input type="text" name="applied_before" id="applied_before" placeholder="Your answer" required value="<?php echo $waem_id['0']['applied_before'];?>" />
                       <h3 class="aa">If yes please provide details were it refused or approved and what kind of visa and when was it applied (Canada and other countries )
</h3>
                    <input type="text" name="provide_details" id="provide_details" placeholder="Your answer" required value="<?php echo $waem_id['0']['provide_details'];?>" />
                       <h3 class="aa">Have you ever applied for temporary or permanent visa to any other country except your country of citizenship and current Residency? </h3>
                    <input type="text" name="applied_visa" id="applied_visa" placeholder="Your answer" required value="<?php echo $waem_id['0']['applied_visa'];?>" />
                     <h3 class="aa"> If yes please provide details were it refused or approved and what kind of visa and when was it applied</h3>
                    <input type="text" name="visa_kind" id="visa_kind" placeholder="Your answer" required value="<?php echo $waem_id['0']['visa_kind'];?>" />
                    
                    



                    

                    


                    
                </div>



														
	


											<div class="form-group">

												<div class="col-md-6 col-md-offset-3">

													<input type="submit" name="submit"class="btns btn btn-info"  value="submit" style="font-size: 20px;">

												</div>

											</div>

										</form>

														  

										</div>				 

									

									

					  </div>

				  </div>

				  <div class="col-sm-1 col-md-1">

					  

					  </div>

			  </div>

          </div>
		  
		  
		
		  <!---row ends---->
      </section>

      <!-- Main content -->
     
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script>
    $(document).ready(function() {
    var max_fields_limit      = 10; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_container').append('<h3 class="aa" style="margin-top:10px;">From Year/Month </h3><input type="text" name="e_from[]" id="e_from" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">To Year/Month </h3><input type="text" name="e_to[]" id="e_to" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">Name of institution </h3><input type="text" name="e_institution[]" id="e_institution" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">City and country </h3><input type="text" name="e_city[]" id="e_city" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">Diploma/ Degree </h3<input type="text" name="e_diploma[]" id="e_diploma" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">Field of study</h3><input type="text" name="e_study[]" id="e_study" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">Total text of years studied </h3><input type="text" name="e_year_of_study[]" id="e_year_of_study" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><a href="#" class="remove_field btn btn-danger remove-me" style="margin-bottom:10px;">Remove</a></div>'); //add input field
        }
    });  
    $('.input_fields_container').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

</script>

<script>
    $(document).ready(function() {
    var max_fields_limit      = 10; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_container1').append(' <h3 class="aa" style="margin-top:10px;">Destination /name of country </h3><input type="text" name="t_destination[]" id="t_destination" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" ><h3 class="aa">Date of Travel From </h3><input type="text" name="t_travel_from[]" id="t_travel_from" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">Date of Travel To</h3><input type="text" name="t_travel_to[]" id="t_travel_to" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">Reason For Travel</h3><input type="text" name="reason_for_travel[]" id="reason_for_travel" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">City of travel</h3><input type="text" name="t_city_of_travel[]" id="t_city_of_travel" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><a href="#" class="remove_field btn btn-danger remove-me" style="margin-bottom:10px;">Remove</a></div>'); //add input field
        }
    });  
    $('.input_fields_container1').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

</script>

<script>
    $(document).ready(function() {
    var max_fields_limit      = 10; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_container2').append('  <h3 class="aa"style="margin-top:10px;">From</h3><input type="text" name="w_from[]" id="w_from" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">To</h3><input type="text" name="w_to[]" id="w_to" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">Job Title</h3><input type="text" name="w_job_title[]" id="w_job_title" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">Part time / Full Time</h3><input type="text" name="w_time[]" id="w_time" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">Employer Name</h3><input type="text" name="w_employer_name[]" id="w_employer_name" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">Complete Address</h3><input type="text" name="w_omplete_ddress[]" id="w_omplete_ddress" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">Country </h3><input type="text" name="w_country[]" id="w_country" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><a href="#" class="remove_field btn btn-danger remove-me" style="margin-bottom:10px;">Remove</a></div>'); //add input field
        }
    });  
    $('.input_fields_container2').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

</script>


<script>
    $(document).ready(function() {
    var max_fields_limit      = 10; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_container3').append('<h3 class="aa"style="margin-top:10px;">From</h3><input type="text" name="h_from"[] id="h_from" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">To</h3><input type="text" name="h_to[]" id="h_to" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">Name of the occupation or activity.( Like manager or student or vacation/ unemployed etc)</h3><input type="text" name="w_occupation[]" id="w_occupation" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">Name of employer or name of educational institute attended</h3><input type="text" name="name_of_employer[]" id="name_of_employer" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">City</h3><input type="text" name="h_city[]" id="h_city" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">country </h3><input type="text" name="h_country[]" id="h_country" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><a href="#" class="remove_field btn btn-danger remove-me" style="margin-bottom:10px;">Remove</a></div>'); //add input field
        }
    });  
    $('.input_fields_container3').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

</script>

<script>
    $(document).ready(function() {
    var max_fields_limit      = 10; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_container4').append('<h3 class="aa"style="margin-top:10px;">Relationship (e.g=Mother,Father,brother,Sister )</h3><input type="text" name="relationship[]" id="relationship" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">Family name (Mother )</h3><input type="text" name="family_name[]" id="family_name" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">Date of birth</h3><input type="text" name="f_dob[]" id="phone_text" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">Date of death if deceased</h3><input type="text" name="f_date_of_death[]" id="f_date_of_death" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">Place of birth and/or death (City and country)</h3><input type="text" name="f_place_of_birth[]" id="f_place_of_birth" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">Present address</h3><input type="text" name="f_present_address[]" id="f_present_address" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><h3 class="aa">Marital Status</h3><input type="text" name="f_marital_status[]" id="f_marital_status" placeholder="Your answer" required value="<?php echo $waem_id['0']['fname'];?>" /><a href="#" class="remove_field btn btn-danger remove-me" style="margin-bottom:10px;">Remove</a></div>'); //add input field
        }
    });  
    $('.input_fields_container4').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

</script>

</html>
