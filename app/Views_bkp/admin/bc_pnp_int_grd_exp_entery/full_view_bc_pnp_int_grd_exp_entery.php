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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
         <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

 <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
                        <h1 class="mt-4">Edit Bc Pnp Int Grd  Express Entry</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                              <!--ul>
                                 <li>Sia Portal Id:-<?php echo $profile['0']['id'];?></li>
                                <li>Name:-<?php echo $profile['0']['heading'];?></li>
                                 <li>Email:-<?php echo $profile['0']['email'];?></li>
                                  <li>Mobile :-<?php echo $profile['0']['number'];?></li>
                                   <li>File number :-<?php echo $profile['0']['id'];?></li>
                              </ul-->
                            </li>
                        </ol>


                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Profile info </h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;  float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">


                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">SiaPortal Id</label>
 <input style="border-top: none;border-right: none;border-left: none;" class="form-control"  value="<?php  echo  $profile['0']['id']; ?>"   />
</div>
     
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName"> Name</label>
 <input style="border-top: none;border-right: none;border-left: none;" class="form-control"  value="<?php  echo  $profile['0']['heading']; ?>"   />
</div>
     
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Email</label>
 <input style="border-top: none;border-right: none;border-left: none;" class="form-control"  value="<?php  echo  $profile['0']['email']; ?>"   />
</div>
     
                  </div>
                   <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Mobile</label>
 <input style="border-top: none;border-right: none;border-left: none;" class="form-control"  value="<?php  echo  $profile['0']['number']; ?>"   />
</div>
     
                  </div>

                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


 <form id="myform" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>/BC_pnp_int_grd_exp_entery/edit_bc_pnp_int_grd_exp_entery/<?php echo $cpm['0']['category'];?>/<?php echo $cpm['0']['id'];?>/<?php echo $cpm['0']['type'];?>"> 

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Edit Application</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;    float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
<div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                               
                                 <div class="form-group"><label class="small mb-1" for="inputFirstName"> Voice Note's</label>
    
       <div id="controls">
    <button id="recordButton" style="background-color:#6b5b95;color: white; ">Record</button>
     <button id="pauseButton" disabled style="background-color:blue;color: white; ">Pause</button>
     <button id="stopButton" disabled style="background-color:red;color: white; ">Stop</button>
    </div>
    <div id="formats"></div>
    <p><strong></strong></p>
    <ol id="recordingsList"></ol> 
    <input type="hidden" id="audio" name="news_image1">
                
  <video controls="" style="height:50px;width: 150px;color:red;" name="media"><source src="https://canada.siaimmigration.com/form/<?php echo $cpm['0']['voice_msg'];?>" type="audio/x-wav"></video>

<input type="hidden"  name="news_image1_old" value="<?php echo $cpm['0']['voice_msg'];?>">
</label>
<progress id="progress" value="0"></progress>



</div>
</div>


 <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputFirstName"> Status</label>
    <select class="form-control" id="application_status"  name="application_status" onchange="show_hide_div()" >

      
    
       
        <option value="523">Profile in Process(exp entery)</option>
        
        <option value="524">Profile Created (exp entery)</option>   
         

 <option value="521">Profile in Process(Bcpnp)</option>  
  
  <option value="522">Profile Created(Bcpnp)</option>    



        <option value="525">Invitation received(Bcpnp)</option>  
        
        <option value="526">Invitation withdrawn (Bcpnp)</option> 
          <option value="527">Application In Process (Bcpnp)</option>       
        
        <option value="528">Application submitted (Bcpnp)</option>    
               
        <option value="529">Adr BCPNP </option> 
               
        <option value="530">Nomination Approved </option> 
                  
        <option value="531">Nomination refused</option> 
                  
        <!--option value="9">Federal Application Sent</option!--> 
         <option value="532">Express entry invitation received</option> 

           <option value="533">Application In Process(Exp entery)</option> 

             <option value="534">Application Submitted (Exp entery)</option> 
              <option value="535">Adr Exp entery </option> 
        
        <!--option value="311">AOR IRCC</option>   
                   
        <option value="10">ADR IRCC</option> 
              
        <option value="11">Medical requested</option> 
        
        <option value="312">Medical submited</option>
               
        <option value="12">Passport requested</option--> 
                 
        <option value="536">Approved</option>            
        <option value="537">Refused</option>
 

    

</select>



</div>
</div>
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>

                      
                        <div class="row">


                           <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="523" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Profile in Process(Exp entery)</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;    float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Expected Date To Apply</label>
 <input  class="form-control"  name="exp_date_to_apply_exp" id="datepicker"  type="text" placeholder="Enter expected date to apply" value="<?php echo $cpm['0']['exp_date_to_apply_exp'];?>"   readonly="readonly"  />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Assign Team Member</label>
<select class="form-control" id="assign_to_exp"  name="assign_to_exp">
 
 <?php if($cpm['0']['assign_to']=="") { ?> 

    <option value="">Select Team Member</option>
<?php } ?>
    <?php foreach($team as $tm){ ?>

        
<?PHP $val = $tm['id'];?>

        <option <?php if(isset($val) && $val==$cpm['0']['assign_to_exp']) {?> selected="selected"<?php } ?> value="<?php echo $tm['id'];?>"><?php echo $tm['firstname'];?>&nbsp;<?php echo $tm['lastname'];?></option>
    <?php } ?>

    

</select>

</div>
     
                  </div>

                  
                   
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->

  <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " id="524" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Profile Created (Exp entery)</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;    float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date of Creation</label>
 <input type="text" id="date_of_creation_exp" name="date_of_creation_exp" class="form-control"   readonly="" placeholder="Enter date Of Creation" value="<?php echo $cpm['0']['date_of_creation_exp'];?>" />
</div>

<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Job NOC</label>
 <input type="text" class="form-control" value="<?php echo $cpm['0']['job_noc_exp'];?>" name="job_noc_exp" id="job_noc_exp" placeholder="Enter job noc"    />
</div>
     
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Application Number </label>
 <input type="text" name="app_number_exp" id="app_number_exp" value="<?php echo $cpm['0']['app_number_exp'];?>" placeholder="Enter application number" class="form-control"    />
</div>
<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Upload Document </label>
 <input  name="upload_doc_exp" id="upload_doc_exp" type="file"   />

 <input  name="upload_doc_exp_old" id="upload_doc_exp_old" type="hidden" value="<?php echo $cpm['0']['upload_doc_exp'];?>"   />
</div>
</div>
     
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Registration Score</label>
 <input type="text" name="reg_score_exp" id="reg_score_exp" value="<?php echo $cpm['0']['reg_score_exp'];?>"  placeholder="Enter registration score" class="form-control" />
</div>
     
                  </div>
                   <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Log In Info PNP</label>
 <input type="text" name="log_in_info_exp" id="log_in_info_exp"  value="<?php echo $cpm['0']['log_in_info_exp'];?>" placeholder="Enter log in info PNP" class="form-control"    />
</div>
     
                  </div>
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->



                   <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " id="521" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Profile in Process (Bcpnp)</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;    float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Expected Date To Apply</label>
 <input  class="form-control"  name="exp_date_to_apply" id="exp_date_to_apply"  type="text" placeholder="Enter expected date to apply" value="<?php echo $cpm['0']['exp_date_to_apply'];?>"   readonly="readonly"  />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Assign Team Member</label>
<select class="form-control" id="assign_to"  name="assign_to">
 
 <?php if($cpm['0']['assign_to']=="") { ?> 

    <option value="">Select Team Member</option>
<?php } ?>
    <?php foreach($team as $tm){ ?>

        
<?PHP $val = $tm['id'];?>

        <option <?php if(isset($val) && $val==$cpm['0']['assign_to']) {?> selected="selected"<?php } ?> value="<?php echo $tm['id'];?>"><?php echo $tm['firstname'];?>&nbsp;<?php echo $tm['lastname'];?></option>
    <?php } ?>

    

</select>

</div>
     
                  </div>

                  
                   
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->


   <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="522" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Profile Created (Bcpnp)</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;    float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date of Creation</label>
 <input type="text" id="date_of_creation" name="date_of_creation" class="form-control"   readonly="" placeholder="Enter date Of Creation" value="<?php echo $cpm['0']['date_of_creation'];?>" />
</div>

<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Job NOC</label>
 <input type="text" class="form-control" value="<?php echo $cpm['0']['job_noc'];?>" name="job_noc" id="job_noc" placeholder="Enter job noc"    />
</div>
     
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Application Number </label>
 <input type="text" name="app_number" id="app_number" value="<?php echo $cpm['0']['application_number'];?>" placeholder="Enter application number" class="form-control"    />
</div>
<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Upload Document </label>
 <input  name="upload_doc" id="upload_doc" type="file"   />

 <input  name="upload_doc_old" id="upload_doc_old" type="hidden" value="<?php echo $cpm['0']['upload_doc'];?>"   />
</div>
</div>
     
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Registration Score</label>
 <input type="text" name="reg_score" id="reg_score" value="<?php echo $cpm['0']['reg_score'];?>"  placeholder="Enter registration score" class="form-control" />
</div>
     
                  </div>
                   <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Log In Info PNP</label>
 <input type="text" name="log_in_info" id="log_in_info"  value="<?php echo $cpm['0']['log_in_info_pnp'];?>" placeholder="Enter log in info PNP" class="form-control"    />
</div>
     
                  </div>
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                   
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  





   <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="525" style="margin-top:1px;">
            <div class="right-side">
              <div class="content">
                <h2 >Invitation Received (Bcpnp)</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;   float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Tentative Submission Date </label>
 <input type="text" name="invitation_date_tantative" id="invitation_date_tantative" class="form-control" placeholder="Enter tentative submission date" value="<?php echo $cpm['0']['invitation_date_tantative'];?>" readonly=""    />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName"> Final Submission Date  </label>
 <input type="text" name="invitation_date_final" id="invitation_date_final" value="<?php echo $cpm['0']['invitation_date_final'];?>" class="form-control" readonly=""   placeholder="Enter final submission date "  />
</div>
     
                  </div>

                  
                   
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->

  <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " id="526" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Invitation Withdrawn (Bcpnp)</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;   float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Reason</label>
 <textarea name="invit_withdrawn_reason" id="invit_withdrawn_reason"   placeholder="Enter reason" class="form-control"><?php echo $cpm['0']['invit_withdrawn_reason'];?> </textarea>  
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                    
     
                  </div>
                   
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->


                               <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " id="527" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Application In Process (Bcpnp)</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;    float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date Of Application Received </label>
 <input  class="form-control"  name="app_recv" id="app_recv"  type="text" placeholder="Enter date of application received" value="<?php echo $cpm['0']['app_recv'];?>"  readonly="readonly"  />
</div>
     
            
                  </div>
                  
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Information Request Sent On</label>
 <input  class="form-control"  name="date_to_apply" id="date_to_apply"  type="text" placeholder="Enter information request sent on" value="<?php echo $cpm['0']['exp_date_to_apply'];?>"  readonly="readonly"  />
</div>
     
                  </div>
                 

                  
                   
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->

  <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " id="528" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Application Submitted (Bcpnp)</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;   float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date Of Application Submitted </label>
 <input type="text" id="app_sub_date" name="app_sub_date" value="<?php echo $cpm['0']['app_sub_date'];?>" class="form-control" placeholder="Enter date of application submitted"  readonly=""    />
</div>
     
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                      <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Application Fee Payment Mode</label><br>
 <input type="radio" name="fee" id="fee" <?php if($cpm['0']['fee']=='td_credit_card'){ echo "checked=checked";}  ?> value="td_credit_card" onclick="own_card()" />Td Credit Card<br>
 <input type="radio" name="fee" id="fee1" <?php if($cpm['0']['fee']=='client'){ echo "checked=checked";}  ?> value="client" onclick="client_card()" />Client card
</div>
     
                  </div>

                   <div class="col-lg-6 col-md-6 col-sm-3 mb-6 hide" id="own">
                    <div class="col-lg-6 col-md-6 col-sm-3 mb-6 ">
                      <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Mode Of Payment By Client</label><br>
 <select class="form-control" name="mode_client_payment">
   <option <?php echo ($cpm['0']['mode_client_payment'] == '')?"selected":"" ?> value="">Select Mode of Payment</option>
   <option  <?php echo ($cpm['0']['mode_client_payment'] == 'Email_Transfer')?"selected":"" ?> value="Email_Transfer">Email Rransfer</option>
   <option <?php echo ($cpm['0']['mode_client_payment'] == 'Quickbooks')?"selected":"" ?> value="Quickbooks">Quickbooks</option>
   <option <?php echo ($cpm['0']['mode_client_payment'] == 'Cash')?"selected":"" ?> value="Cash">Cash</option>
   <option <?php echo ($cpm['0']['mode_client_payment'] == 'POS_Surrey')?"selected":"" ?> value="POS_Surrey">POS Surrey</option>
   <option <?php echo ($cpm['0']['mode_client_payment'] == 'POS_kamloops')?"selected":"" ?> value="POS_kamloops">POS Kamloops</option>
   <option <?php echo ($cpm['0']['mode_client_payment'] == 'Bambora')?"selected":"" ?> value="Bambora">Bambora</option>

 </select>
</div>
     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Confirm With</label><br>
 <input type="text" name="confirm_with" id="confirm_with" value="<?php echo $cpm['0']['confirm_with'];?>"  placeholder="Enter confirm with" class="form-control">
  
</div>
  </div>


      <div class="col-lg-6 col-md-6 col-sm-3 mb-6">
                      <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date of Payment Received</label><br>
 <input type="text" name="date_of_payment_recive" value="<?php echo $cpm['0']['date_of_payment_recive'];?>" id="date_of_payment_recive" class="form-control" readonly="" placeholder="Enter date of payment received">
  
</div>
<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Amount</label><br>
 <input type="text" name="amount" id="amount" value="<?php echo $cpm['0']['amount'];?>" placeholder="Enter amount" class="form-control">
  
</div>
  </div>   
                  </div>


                  <div class="col-lg-6 col-md-6 col-sm-3 mb-6 hide" id="client">
       

<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's</label>
 <textarea name="client_card_note" id="client_card_note"   placeholder="Enter reason" class="form-control"><?php echo $cpm['0']['client_card_note'];?></textarea>  
</div>
     
                  </div>

                  
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->

  <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " id="529"style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Adr BCPNP</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;   float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Adr Deadline</label><!--date line-->
 <input type="text" name="adr_deadline" id="adr_deadline" class="form-control" readonly=""   placeholder="Enter adr deadline"  value="<?php echo $cpm['0']['adr_deadline'];?>" />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName"> Adr Note's</label>
 <textarea name="adr_note" id="adr_note" placeholder="Enter adr notes" value="<?php echo $cpm['0']['adr_note'];?>" class="form-control"></textarea>  
</div>
     
                  </div>

                  
                 
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->
  <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="530" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Nomination Approved</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;   float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Approvel Document</label>
 <input type="file" name="approval_doc"  id="approval_doc"      />
 <input  name="approval_doc_old" id="approval_doc_old" type="hidden" value="<?php echo $cpm['0']['approval_doc'];?>"   />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                    
     
                  </div>

                 
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->
    <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="531" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Nomination Refused</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;   float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Reason</label>
 <TEXTAREA   name="nomination_refused_reason" id="nomination_refused_reason" value="<?php echo $cpm['0']['nomination_refused_reason'];?>"  placeholder="Enter reason" class="form-control" ></TEXTAREA>
</div>
     
                  </div>
                  

               
                   <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     
     
                  </div>
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->
  <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="532" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Express entry invitation received</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;   float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Application Sent Date</label>
 <input type="text" name="app_sent_date"  id="app_sent_date" value="<?php echo $cpm['0']['app_sent_date'];?>"   class="form-control" placeholder="Enter application sent date" readonly=""   />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Courier Receipt Slip </label>
 <input type="file" name="courier_receipt_slip" id=""   value=""   />
  <input type="hidden" name="courier_receipt_slip_old" id="courier_receipt_slip_old"   value="<?php echo $cpm['0']['courier_receipt_slip'];?>"   />


</div>
     
                  </div>

                
                
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->
                       <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " id="533" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Application In Process (Exp entery)</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;    float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date Of Application Received</label>
 <input  class="form-control"  name="app_recv_exp" id="app_recv_exp"  type="text" placeholder="Enter date of application received" value="<?php echo $cpm['0']['app_recv_exp'];?>"  readonly="readonly"  />
</div>
     
            
                  </div>
                  
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Information Request Sent On</label>
 <input  class="form-control"  name="exp_date_to_apply_expp" id="exp_date_to_apply_expp"  type="text" placeholder="Enter information request sent on" value="<?php echo $cpm['0']['exp_date_to_apply_expp'];?>"  readonly="readonly"  />
</div>
     
                  </div>
                 

                  
                   
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->




   <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " id="534" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Application Submitted (Exp entery)</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;   float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date Of Application Submitted </label>
 <input type="text" id="app_sub_date_exp" name="app_sub_date_exp" value="<?php echo $cpm['0']['app_sub_date_exp'];?>" class="form-control" placeholder="Enter date of application submitted"  readonly=""    />
</div>
     
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                      <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Application Fee Payment Mode</label><br>
 <input type="radio" name="fee_exp" id="fee1_exp" <?php if($cpm['0']['fee_exp']=='client'){ echo "checked=checked";}  ?> value="client" onclick="client_card()" />Client card
</div>
     
                  </div>

                   <div class="col-lg-6 col-md-6 col-sm-3 mb-6 hide" id="own">
                    <div class="col-lg-6 col-md-6 col-sm-3 mb-6 ">
                      <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Mode Of Payment By Client</label><br>
 <select class="form-control" name="mode_client_payment_exp">
   <option <?php echo ($cpm['0']['mode_client_payment'] == '')?"selected":"" ?> value="">Select Mode of Payment</option>
   <option  <?php echo ($cpm['0']['mode_client_payment'] == 'Email_Transfer')?"selected":"" ?> value="Email_Transfer">Email Rransfer</option>
   <option <?php echo ($cpm['0']['mode_client_payment'] == 'Quickbooks')?"selected":"" ?> value="Quickbooks">Quickbooks</option>
   <option <?php echo ($cpm['0']['mode_client_payment'] == 'Cash')?"selected":"" ?> value="Cash">Cash</option>
   <option <?php echo ($cpm['0']['mode_client_payment'] == 'POS_Surrey')?"selected":"" ?> value="POS_Surrey">POS Surrey</option>
   <option <?php echo ($cpm['0']['mode_client_payment'] == 'POS_kamloops')?"selected":"" ?> value="POS_kamloops">POS Kamloops</option>
   <option <?php echo ($cpm['0']['mode_client_payment'] == 'Bambora')?"selected":"" ?> value="Bambora">Bambora</option>

 </select>
</div>
     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Confirm With</label><br>
 <input type="text" name="confirm_with_exp" id="confirm_with_exp" value="<?php echo $cpm['0']['confirm_with_exp'];?>"  placeholder="Enter confirm with" class="form-control">
  
</div>
  </div>


      <div class="col-lg-6 col-md-6 col-sm-3 mb-6">
                      <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date of Payment Received</label><br>
 <input type="text" name="date_of_payment_recive_exp" value="<?php echo $cpm['0']['date_of_payment_recive_exp'];?>" id="date_of_payment_recive_exp" class="form-control" readonly="" placeholder="Enter date of payment received">
  
</div>
<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Amount</label><br>
 <input type="text" name="amount_exp" id="amount_exp" value="<?php echo $cpm['0']['amount_exp'];?>" placeholder="Enter amount" class="form-control">
  
</div>
  </div>   
                  </div>


                  <div class="col-lg-6 col-md-6 col-sm-3 mb-6 hide" id="client">
       

<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's</label>
 <textarea name="client_card_note_exp" id="client_card_note_exp"   placeholder="Enter reason" class="form-control"><?php echo $cpm['0']['client_card_note_exp'];?></textarea>  
</div>
     
                  </div>

                  
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->


  <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " id="535"style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Adr Exp entery</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;   float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Adr Deadline</label><!--date line-->
 <input type="text" name="adr_deadline_exp" id="adr_deadline_exp" class="form-control" readonly=""   placeholder="Enter adr deadline"  value="<?php echo $cpm['0']['adr_deadline_exp'];?>" />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName"> Adr Note's</label>
 <textarea name="adr_note_exp" id="adr_note_exp" placeholder="Enter adr notes" value="<?php echo $cpm['0']['adr_note_exp'];?>" class="form-control"></textarea>  
</div>
     
                  </div>

                  
                 
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->


  <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="311" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >AOR IRCC</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;   float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
 
                          <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Application Number</label>
 <input type="text" name="aor_app_number" id="aor_app_number"  value="<?php echo $cpm['0']['aor_app_number'];?>"class="form-control"  placeholder="Enter application number"   />
</div>
     
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName"> Application Date</label>
 <input type="text" name="aor_app_date"  id="aor_app_date" value="<?php echo $cpm['0']['aor_app_date'];?>" placeholder="Enter application date" class="form-control"   readonly=""  />
</div>
     
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Have You Link This Application Online</label><br>
 <input type="radio" name="link" id="link"  value="yes" onclick="MyFunction()"  />Yes
 <input type="radio" name="link" id="link"  value="no" onclick="MyFunction1()"  />No
</div>
     
                  </div>
                   <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group hide" id="online" >
 <label class="small mb-1" for="inputFirstName">Online Detail</label>
 <textarea class="form-control"  name="aor_online_detail" id="aor_online_detail" placeholder="Enter online detail" ><?php echo $cpm['0']['aor_online_detail'];?></textarea>
</div>
     
     <div class="form-group hide" id="reason" >
 <label class="small mb-1" for="inputFirstName">Reason</label>
 <textarea class="form-control"  name="aor_linkreason" id="aor_linkreason"   placeholder="Enter why not done online link" > <?php echo $cpm['0']['aor_linkreason'];?></textarea>
</div>
     
                  </div>
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->
   <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="10" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >ADR IRCC</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;   float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
 
                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Submission Date</label>
 <input  class="form-control" name="adr_submission_date"  id="adr_submission_date" class="form-control"  placeholder="Enter submission date" readonly="" value="<?php echo $cpm['0']['adr_submission_date'];?>"   />
</div>
     
                  </div>
                

                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     
     
                  </div>
                  
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->
   <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="11" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Medical Requested</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;   float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date For Medical</label>
 <input type="text" name="date_for_medical" id="date_for_medical"  value="<?php echo $cpm['0']['date_for_medical'];?>" placeholder="Enter date for medical"  class="form-control"  readonly=""  />
</div>
     
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date For Medical Tentative </label>
 <input type="text" name="date_for_medical_ten" id="date_for_medical_ten" placeholder="Enter date for medical tentative" class="form-control" value="<?php echo $cpm['0']['date_for_medical_ten'];?>" readonly=""  />
</div> 
     
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">

                    <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's</label>
 <textarea name="medical_note" id="medical_note"  placeholder="Enter note's" class="form-control" ><?php echo $cpm['0']['medical_note'];?></textarea>
</div> 
     
                     
                  </div>
                    

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->


 <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="312" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Medical Submit</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;   float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date Of Medical Submit</label>
 <input type="text" name="medical_submit" id="medical_submit" value="<?php echo $cpm['0']['medical_submit'];?>" placeholder="Enter date for medical submit" class="form-control" readonly="" value=""   />
</div>
     
                  </div>
                  

                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">

                    <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's</label>
 <textarea name="medical_sub_note" id="medical_sub_note" class="form-control"  placeholder="Enter note's"  ><?php echo $cpm['0']['medical_sub_note'];?></textarea>
</div> 
     
                     
                  </div>
                    

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->
  


   <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="12" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Passport Requested</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;   float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">PP Submition Deadline</label>
 <input type="text" name="pp_deadline" id="pp_deadline" value="<?php echo $cpm['0']['pp_deadline'];?>" placeholder="PP submition deadline" class="form-control"  readonly=""     />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">PP submition Tentative</label>
 <input type="text" name="pp_tentative" id="pp_tentative" value="<?php echo $cpm['0']['pp_tentative'];?>" class="form-control" placeholder="Enter PP submition tentative"   readonly=""  />
</div>
     
                  </div>

                  
                  
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->

 <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="536" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Approved</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;   float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's</label>
 <textarea name="approve_note" id="approve_note" class="form-control"  placeholder="Enter note" ><?php echo $cpm['0']['approve_note'];?></textarea>
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     
     
                  </div>

                  
                   

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->
   <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="537" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Refused</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;   float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's</label>
 <textarea name="refused_note" id="refused_note" class="form-control" placeholder="Enter Refused Note's" ><?php echo $cpm['0']['refused_note'];?></textarea>
</div>
     
                  </div>
                 

                  
                   <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     
     
                  </div>
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->

  <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;   float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                     
     
                  </div>
                 

                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                   
     <div class="form-group">

</div>



                            </div>
                  </div>
                   <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                    
     
                  </div>
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->

</form>


   <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Voice Note</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;   float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                   <?php
                    if($voice_msg !=""){ 

                      echo' <label class="small mb-1" for="inputFirstName">Voice note</label>';
 

                        foreach($voice_msg as $vm ){ 


                        ?>

                        <div class="form-group">
 

                        <video controls="" style="height:50px;width: 350px;color:red;" name="media"><source src="https://canada.siaimmigration.com/form/<?php echo $vm['voice_msg'];?>" type="audio/x-wav"></video><br><?php echo $vm['insert_on'];?>
</div>
                        


                  <?php  } }

                     ?> 

     
                  </div>
                 

              

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->
   <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Document Upload By client</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;   float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <?php
                    if($doc !=""){ 

                      echo' <label class="small mb-1" for="inputFirstName">Document</label>';
 

                        foreach($doc as $do ){ 


                        ?>
 <div class="form-group">
                        <a  data-toggle="tooltip" title="<?php echo $do['doc_name'];?>" target="_blank" href="<?php echo $do['client_document_link'];?>">    <i class="fa fa-file" aria-hidden="true"></i></a>
                  <?php echo $do['doc_name'];?>
                </div>

                  <?php  } }

                     ?> 


                  </div>
                 
                 
                
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->

  <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Document Upload By Sia Immigration</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;   float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                     
                

                
                   <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <?php
                    if($doc !=""){ 

                      echo' <label class="small mb-1" for="inputFirstName">Document</label>';
 

                        foreach($doc1 as $do ){ 


                        ?>
 <div class="form-group">
                        <a  data-toggle="tooltip" title="<?php echo $do['doc_name'];?>" target="_blank" href="<?php echo $do['client_document_link'];?>">    <i class="fa fa-file" aria-hidden="true"></i></a>
                  <?php echo $do['doc_name'];?>
                </div>

                  <?php  } }

                     ?> 
     
                  </div>
                            

                             </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </section>
                  <!--/Table Style-->
                </div>
              </div>
            </div>
          </div>


  <!--section End -->






                        </div>
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

<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
    <script src="https://canada.siaimmigration.com/assets/app.js"></script>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/public/dist/assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url();?>/public/dist/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/public/dist/assets/demo/datatables-demo.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


   
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

 <script>

$(document).ready(function () {

    $('#myform').validate({ // initialize the plugin
        rules: {
            exp_date_to_apply: {
                required: true               
            },
            assign_to: {
                required: true               
            },
             date_of_creation: {
                required: true               
            },
             job_noc: {
                required: true               
            },
             app_number: {
                required: true               
            },
             reg_score: {
                required: true               
            },
             log_in_info: {
                required: true               
            },
             invitation_date_tantative: {
                required: true               
            },
             invitation_date_final: {
                required: true               
            },
            invit_withdrawn_reason: {
                required: true               
            },
            app_sub_date: {
                required: true               
            },
             fee: {
                required: true               
            },
            mode_client_payment: {
                required: true               
            },
             confirm_with: {
                required: true               
            },
             date_of_payment_recive: {
                required: true               
            },
             date_of_payment_recive: {
                required: true               
            },
            amount: {
                required: true               
            },
            client_card_note:{
                required:true
            },
            adr_deadline:{
                required:true
            },
            adr_note:{
                required:true
            },
            approval_doc:{
                required:true
            },
            nomination_refused_reason:{
                required:true
            },
            app_sent_date:{
                required:true
            },
            courier_receipt_slip:{
                required:true
            },
            aor_app_number:{
                required:true
            },
            aor_app_date:{
                required:true
            },
            link:{
                required:true
            },
            online_detail:{
                required:true
            },
            linkreason:{
                required:true
            },
            adr_submission_date:{
                required:true
            },
            date_for_medical:{
                required:true
            },
            date_for_medical_ten:{
                required:true
            },
            medical_note:{
                required:true
            },
            medical_sub_note:{
                required:true
            },



            medical_submit:{
                required:true
            },
            medical_sub_note:{
                required:true
            },
            pp_deadline:{
                required:true
            },
            pp_tentative:{
                required:true
            },
             approve_note:{
                required:true
            },
            refused_note:{
                required:true
            },




            
        },
        messages: {
        exp_date_to_apply: "Expected Date To Apply IS Required",
        assign_to: "Assign Team Member IS Required",
        date_of_creation: "Date of Creation IS Required",
        job_noc: "Job NOC IS Required",
        app_number: "Application Number IS Required",
        log_in_info: "Log In Info PNP IS Required",
        invitation_date_tantative: "Tentative Submission Date IS Required",
        invitation_date_final: "Final Submission Date  IS Required",
        invit_withdrawn_reason: "Reason  IS Required",
        app_sub_date: "Date Of Application Submitted IS Required",
        fee: "Application Fee Payment Mode IS Required",
        mode_client_payment: "Mode Of Payment By Client IS Required",
        confirm_with: "Confirm With IS Required",
         date_of_payment_recive: "Confirm With IS Required",
         amount: "Amount IS Required",
         client_card_note:"Note's IS Required",
         adr_deadline:"Adr Deadline IS Required",

         adr_note:"Adr Note IS Required",
         approval_doc:"Approval document IS Required",
         nomination_refused_reason:"Nomination Refused Reason IS Required",
         app_sent_date:"Application Sent Date IS Required",
         courier_receipt_slip:"Courier Receipt Slip IS Required",
         aor_app_number:"Application Number IS Required",
         aor_app_date:"Application Date IS Required",
         link:"Have You Link This Application Online IS Required",
         aor_online_detail:"Online Detail IS Required",
         aor_linkreason:"Reason IS Required",
         adr_submission_date:"Submission Date IS Required",
         date_for_medical:"Date For Medical IS Required",
         date_for_medical_ten:"Date For Medical Tentative IS Required",
         medical_note:"Notes IS Required",
         medical_submit:"Date Of Medical Submit IS Required",
         medical_sub_note:"Note IS Required",
         pp_deadline:"PP Submition Deadline IS Required",
         pp_tentative:"PP submition Tentative IS Required",
         approve_note:"Adr Deadline IS Required",
         refused_note:"Adr Deadline IS Required",


       
         }
        
    });

});
</script>

    <script>
  function own_card(){
var fe =document.getElementById("fee").value;
//alert(fe);
    if(fe=='td_credit_card'){
$( "#own" ).removeClass("hide").addClass("show" );
$( "#client" ).removeClass( "show" ).addClass( "hide" );

    }
  }
  function client_card(){
var fe1 =document.getElementById("fee1").value;
//alert(fe1);
    if(fe1=='client'){
$( "#own" ).removeClass("show").addClass("hide" );
$( "#client" ).removeClass( "hide" ).addClass( "show" );

    }
  }
</script>

  <script>
  function MyFunction(){
var li =document.getElementById("link").value;
//alert(li);
    if(li=='yes'){
$( "#online" ).removeClass("hide").addClass("show" );
$( "#reason" ).removeClass( "show" ).addClass( "hide" );

    }
  }
  function MyFunction1(){
var li =document.getElementById("link").value;
//alert(li);
    if(li=='yes'){
$( "#online" ).removeClass("show").addClass("hide" );
$( "#reason" ).removeClass( "hide" ).addClass( "show" );

    }
  }
</script>

<script>
  function show_hide_div(){
var app_status =document.getElementById("application_status").value;

if(app_status=='523'){  
$( "#523" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='524'){

$( "#523" ).removeClass( "show" ).addClass( "hide" );
$( "#524" ).removeClass( "hide" ).addClass( "show" );
}

else if(app_status=='521'){

$( "#523" ).removeClass( "show" ).addClass( "hide" );
$( "#524" ).removeClass( "show" ).addClass( "hide" );
$( "#521" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='522'){

$( "#523" ).removeClass( "show" ).addClass( "hide" );
$( "#524" ).removeClass( "show" ).addClass( "hide" );
$( "#521" ).removeClass( "show" ).addClass( "hide" );
$( "#522" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='525'){

$( "#523" ).removeClass( "show" ).addClass( "hide" );
$( "#524" ).removeClass( "show" ).addClass( "hide" );
$( "#521" ).removeClass( "show" ).addClass( "hide" );
$( "#522" ).removeClass( "show" ).addClass( "hide" );

$( "#525" ).removeClass( "hide" ).addClass( "show" );
}

else if(app_status=='526'){

$( "#523" ).removeClass( "show" ).addClass( "hide" );
$( "#524" ).removeClass( "show" ).addClass( "hide" );
$( "#521" ).removeClass( "show" ).addClass( "hide" );
$( "#522" ).removeClass( "show" ).addClass( "hide" );
$( "#525" ).removeClass( "show" ).addClass( "hide" );
$( "#526" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='527'){

$( "#523" ).removeClass( "show" ).addClass( "hide" );
$( "#524" ).removeClass( "show" ).addClass( "hide" );
$( "#521" ).removeClass( "show" ).addClass( "hide" );
$( "#522" ).removeClass( "show" ).addClass( "hide" );
$( "#525" ).removeClass( "show" ).addClass( "hide" );
$( "#526" ).removeClass( "show" ).addClass( "hide" );
$( "#527" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='528'){
$( "#523" ).removeClass( "show" ).addClass( "hide" );
$( "#524" ).removeClass( "show" ).addClass( "hide" );
$( "#521" ).removeClass( "show" ).addClass( "hide" );
$( "#522" ).removeClass( "show" ).addClass( "hide" );
$( "#525" ).removeClass( "show" ).addClass( "hide" );
$( "#526" ).removeClass( "show" ).addClass( "hide" );
$( "#527" ).removeClass( "show" ).addClass( "hide" );
$( "#528" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='529'){
$( "#523" ).removeClass( "show" ).addClass( "hide" );
$( "#524" ).removeClass( "show" ).addClass( "hide" );
$( "#521" ).removeClass( "show" ).addClass( "hide" );
$( "#522" ).removeClass( "show" ).addClass( "hide" );
$( "#525" ).removeClass( "show" ).addClass( "hide" );
$( "#526" ).removeClass( "show" ).addClass( "hide" );
$( "#527" ).removeClass( "show" ).addClass( "hide" );  
$( "#528" ).removeClass( "show" ).addClass( "hide" );
$( "#529" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='530'){
  $( "#523" ).removeClass( "show" ).addClass( "hide" );
  $( "#524" ).removeClass( "show" ).addClass( "hide" );
  $( "#521" ).removeClass( "show" ).addClass( "hide" );
$( "#522" ).removeClass( "show" ).addClass( "hide" );
  $( "#525" ).removeClass( "show" ).addClass( "hide" );
  $( "#526" ).removeClass( "show" ).addClass( "hide" );
  $( "#527" ).removeClass( "show" ).addClass( "hide" );
  $( "#528" ).removeClass( "show" ).addClass( "hide" );
  $( "#529" ).removeClass( "show" ).addClass( "hide" );
  $( "#530" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='531'){
$( "#523" ).removeClass( "show" ).addClass( "hide" );
$( "#524" ).removeClass( "show" ).addClass( "hide" );
$( "#521" ).removeClass( "show" ).addClass( "hide" );
$( "#522" ).removeClass( "show" ).addClass( "hide" );
$( "#525" ).removeClass( "show" ).addClass( "hide" );
$( "#526" ).removeClass( "show" ).addClass( "hide" );
$( "#527" ).removeClass( "show" ).addClass( "hide" );
$( "#528" ).removeClass( "show" ).addClass( "hide" );
$( "#529" ).removeClass( "show" ).addClass( "hide" );
$( "#530" ).removeClass( "show" ).addClass( "hide" );
$( "#531" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='532'){
$( "#523" ).removeClass( "show" ).addClass( "hide" );
$( "#524" ).removeClass( "show" ).addClass( "hide" );
$( "#521" ).removeClass( "show" ).addClass( "hide" );
$( "#522" ).removeClass( "show" ).addClass( "hide" );
$( "#525" ).removeClass( "show" ).addClass( "hide" );
$( "#526" ).removeClass( "show" ).addClass( "hide" );
$( "#527" ).removeClass( "show" ).addClass( "hide" );
$( "#528" ).removeClass( "show" ).addClass( "hide" );
$( "#529" ).removeClass( "show" ).addClass( "hide" );
$( "#530" ).removeClass( "show" ).addClass( "hide" );
$( "#531" ).removeClass( "show" ).addClass( "hide" );
$( "#532" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='533'){
$( "#523" ).removeClass( "show" ).addClass( "hide" );
$( "#524" ).removeClass( "show" ).addClass( "hide" );
$( "#521" ).removeClass( "show" ).addClass( "hide" );
$( "#522" ).removeClass( "show" ).addClass( "hide" );
$( "#525" ).removeClass( "show" ).addClass( "hide" );
$( "#526" ).removeClass( "show" ).addClass( "hide" );
$( "#527" ).removeClass( "show" ).addClass( "hide" );
$( "#528" ).removeClass( "show" ).addClass( "hide" );
$( "#529" ).removeClass( "show" ).addClass( "hide" );
$( "#530" ).removeClass( "show" ).addClass( "hide" );
$( "#531" ).removeClass( "show" ).addClass( "hide" );
$( "#532" ).removeClass( "show" ).addClass( "hide" );

$( "#533" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='534'){
$( "#523" ).removeClass( "show" ).addClass( "hide" );
$( "#524" ).removeClass( "show" ).addClass( "hide" );
$( "#521" ).removeClass( "show" ).addClass( "hide" );
$( "#522" ).removeClass( "show" ).addClass( "hide" );
$( "#525" ).removeClass( "show" ).addClass( "hide" );
$( "#526" ).removeClass( "show" ).addClass( "hide" );
$( "#527" ).removeClass( "show" ).addClass( "hide" );
$( "#528" ).removeClass( "show" ).addClass( "hide" );
$( "#529" ).removeClass( "show" ).addClass( "hide" );
$( "#530" ).removeClass( "show" ).addClass( "hide" );
$( "#531" ).removeClass( "show" ).addClass( "hide" );
$( "#532" ).removeClass( "show" ).addClass( "hide" );
$( "#533" ).removeClass( "show" ).addClass( "hide" );
$( "#534" ).removeClass( "hide" ).addClass( "show" );
}

else if(app_status=='535'){
$( "#523" ).removeClass( "show" ).addClass( "hide" );
$( "#524" ).removeClass( "show" ).addClass( "hide" );
$( "#521" ).removeClass( "show" ).addClass( "hide" );
$( "#522" ).removeClass( "show" ).addClass( "hide" );
$( "#525" ).removeClass( "show" ).addClass( "hide" );
$( "#526" ).removeClass( "show" ).addClass( "hide" );
$( "#527" ).removeClass( "show" ).addClass( "hide" );
$( "#528" ).removeClass( "show" ).addClass( "hide" );
$( "#529" ).removeClass( "show" ).addClass( "hide" );
$( "#530" ).removeClass( "show" ).addClass( "hide" );
$( "#531" ).removeClass( "show" ).addClass( "hide" );
$( "#532" ).removeClass( "show" ).addClass( "hide" );
$( "#533" ).removeClass( "show" ).addClass( "hide" );
$( "#534" ).removeClass( "show" ).addClass( "hide" );
$( "#535" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='536'){
  $( "#523" ).removeClass( "show" ).addClass( "hide" );
$( "#524" ).removeClass( "show" ).addClass( "hide" );

$( "#521" ).removeClass( "show" ).addClass( "hide" );
$( "#522" ).removeClass( "show" ).addClass( "hide" );
$( "#525" ).removeClass( "show" ).addClass( "hide" );
$( "#526" ).removeClass( "show" ).addClass( "hide" );
$( "#527" ).removeClass( "show" ).addClass( "hide" );
$( "#528" ).removeClass( "show" ).addClass( "hide" );
$( "#529" ).removeClass( "show" ).addClass( "hide" );
$( "#530" ).removeClass( "show" ).addClass( "hide" );
$( "#531" ).removeClass( "show" ).addClass( "hide" );
$( "#532" ).removeClass( "show" ).addClass( "hide" );
$( "#533" ).removeClass( "show" ).addClass( "hide" );
$( "#534" ).removeClass( "show" ).addClass( "hide" );
$( "#535" ).removeClass( "show" ).addClass( "hide" );
$( "#536" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='537'){
 $( "#523" ).removeClass( "show" ).addClass( "hide" );
$( "#524" ).removeClass( "show" ).addClass( "hide" );
$( "#521" ).removeClass( "show" ).addClass( "hide" );
$( "#522" ).removeClass( "show" ).addClass( "hide" );
$( "#525" ).removeClass( "show" ).addClass( "hide" );
$( "#526" ).removeClass( "show" ).addClass( "hide" );
$( "#527" ).removeClass( "show" ).addClass( "hide" );
$( "#528" ).removeClass( "show" ).addClass( "hide" );
$( "#529" ).removeClass( "show" ).addClass( "hide" );
$( "#530" ).removeClass( "show" ).addClass( "hide" );
$( "#531" ).removeClass( "show" ).addClass( "hide" );
$( "#532" ).removeClass( "show" ).addClass( "hide" );
$( "#533" ).removeClass( "show" ).addClass( "hide" );
$( "#534" ).removeClass( "show" ).addClass( "hide" );
$( "#535" ).removeClass( "show" ).addClass( "hide" );
$( "#536" ).removeClass( "show" ).addClass( "hide" );
$( "#537" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='14'){
$( "#2" ).removeClass( "show" ).addClass( "hide" );
$( "#3" ).removeClass( "show" ).addClass( "hide" );
$( "#521" ).removeClass( "show" ).addClass( "hide" );
$( "#522" ).removeClass( "show" ).addClass( "hide" );
$( "#4" ).removeClass( "show" ).addClass( "hide" );
$( "#310" ).removeClass( "show" ).addClass( "hide" );
$( "#5" ).removeClass( "show" ).addClass( "hide" );
$( "#6" ).removeClass( "show" ).addClass( "hide" );
$( "#7" ).removeClass( "show" ).addClass( "hide" );
$( "#8" ).removeClass( "show" ).addClass( "hide" );
$( "#9" ).removeClass( "show" ).addClass( "hide" );
$( "#311" ).removeClass( "show" ).addClass( "hide" );
$( "#10" ).removeClass( "show" ).addClass( "hide" );
$( "#11" ).removeClass( "show" ).addClass( "hide" );
$( "#312" ).removeClass( "show" ).addClass( "hide" );
$( "#12" ).removeClass( "show" ).addClass( "hide" );
$( "#13" ).removeClass( "show" ).addClass( "hide" );
$( "#14" ).removeClass( "hide" ).addClass( "show" );
}
    //alert(app_status);
  }
</script>



  <script>
  $( function() {
    $( "#datepicker" ).datepicker({

dateFormat: 'yy-mm-dd'

    });

     $( "#exp_date_to_apply" ).datepicker({

dateFormat: 'yy-mm-dd'

    });

     $( "#date_of_creation" ).datepicker({

dateFormat: 'yy-mm-dd'

    });





     $( "#invitation_date_tantative" ).datepicker({

dateFormat: 'yy-mm-dd'

    });




     $( "#invitation_date_final" ).datepicker({

dateFormat: 'yy-mm-dd'

    });

       $( "#app_sub_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });

          $( "#date_of_creation_exp" ).datepicker({

dateFormat: 'yy-mm-dd'

    });

           $( "#date_of_creation_exp" ).datepicker({

dateFormat: 'yy-mm-dd'

    });


          $( "#date_of_payment_recive" ).datepicker({

dateFormat: 'yy-mm-dd'

    });


               $( "#adr_deadline" ).datepicker({

dateFormat: 'yy-mm-dd'

    });


$("#app_sent_date").datepicker({

dateFormat: 'yy-mm-dd'

    });
$("#aor_app_date").datepicker({

dateFormat: 'yy-mm-dd'

    });

$("#adr_submission_date").datepicker({

dateFormat: 'yy-mm-dd'

    });



$("#app_recv").datepicker({

dateFormat: 'yy-mm-dd'

    });

$("#app_recv_exp").datepicker({

dateFormat: 'yy-mm-dd'

    });
$("#date_for_medical").datepicker({

dateFormat: 'yy-mm-dd'

    });
$("#date_for_medical_ten").datepicker({

dateFormat: 'yy-mm-dd'

    });
$("#medical_submit").datepicker({

dateFormat: 'yy-mm-dd'

    });
$("#pp_tentative").datepicker({

dateFormat: 'yy-mm-dd'

    });
$("#pp_deadline").datepicker({

dateFormat: 'yy-mm-dd'

    });

  } );



  $( function() {
    $( "#date_of_creation" ).datepicker({

dateFormat: 'yy-mm-dd'

    });

  } );
  </script>
   
    </body>
</html>
