2
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
                        <h1 class="mt-4">Edit Lmia Dual intn High Wage</h1>
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


 <form id="myform" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>/Lmia_dual_int_hg/edit_lmia_dual_int_high_wage/<?php echo $cpm['0']['category'];?>/<?php echo $cpm['0']['id'];?>/<?php echo $cpm['0']['type'];?>"> 

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

         <option value="<?php echo $cpm['0']['application_status'];?>"><?php echo  $app_st=$cpm['0']['st'];?></option>
     <?php 
 $app_st=$cpm['0']['application_status'];

if($app_st=='35'){ ?>
    
       
        <option value="492">Assign Team Member</option> 
           <?php } elseif($app_st=='492'){ ?>
        <option value="236">Application In Process</option>
           <?php } elseif($app_st=='236'){ ?>
        <option value="493">Information Requested For Advertisement</option>
           <?php } elseif($app_st=='493'){ ?>
        <option value="240">Advertisement Started</option>  
           <?php } elseif($app_st=='240'){ ?>          
        <option value="238">Documents Awaiting For Submission</option>  
           <?php } elseif($app_st=='238'){ ?>
        <option value="494">Advertisement Renewal 1st Stage</option>   
           <?php } elseif($app_st=='494'){ ?>       
        <option value="239">Application Submitted</option> 
           <?php } elseif($app_st=='239'){ ?>           
        <option value="242">LMIA Number Received</option> 
           <?php } elseif($app_st=='242'){ ?>           
        <option value="243">Interview/ADR Requested</option>
           <?php } elseif($app_st=='243'){ ?>            
        <option value="244">Interview/ADR Completed</option> 
           <?php } elseif($app_st=='244'){ ?>           
        <option value="495">Advertisement Renewal 2nd Stage</option> 
           <?php } elseif($app_st=='495'){ ?>
         <option value="245">Approved</option> 
          <option value="246">Refused</option> 
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

                      
                        <div class="row">

 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide " id="492" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Assign Team Member</h2>
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
 <label class="small mb-1" for="inputFirstName"> Assign Team Member</label>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide " id="236" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Application In Process</h2>
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
 <label class="small mb-1" for="inputFirstName">Date Of Application Received</label>
 <input  class="form-control"  name="app_recv" id="app_recv"  type="text" placeholder="Enter date of application received" value="<?php echo $cpm['0']['app_recv'];?>"  readonly="readonly"  />
</div>
     
            
                  </div>
                  
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Information Request Sent On</label>
 <input  class="form-control"  name="exp_date_to_apply" id="exp_date_to_apply"  type="text" placeholder="Enter information request sent on" value="<?php echo $cpm['0']['exp_date_to_apply'];?>"  readonly="readonly"  />
</div>
     
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Advertisement Cost Invoice Sent On</label>
 <input  class="form-control"  name="study_permit_exp" id="study_permit_exp"  type="text" placeholder="Enter advertisement cost invoice sent on" value="<?php echo $cpm['0']['study_permit_exp'];?>"   readonly="readonly"  />
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


   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide " id="493" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Information Requested For Advertisement</h2>
                <div class="table-tabs">
                  <!--Table Style-->
                  <section class="section-preview">
                    <!-- Default inline 1-->
                    <div style="padding: 1px;    float:left;height:auto;width:100%">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Information Received On</label>
 <input  class="form-control"  name="info_doc_req_date" id="info_doc_req_date"  type="text" placeholder="Enter Information Received On" value="<?php echo $cpm['0']['info_doc_req_date'];?>"   readonly="readonly"  />
</div>
     
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                         <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Fee Received Or Pending</label><br>
 <input type="radio" name="feerp" id="feerp" <?php if($cpm['0']['feerp']=='received'){ echo "checked=checked";}  ?>     value="received"  />Receiced<br>
 <input type="radio" name="feerp" id="feerp" <?php if($cpm['0']['feerp']=='pending'){ echo "checked=checked";}  ?>  value="pending"  />Pending
</div>
     
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Advertisement Fees Paid Invoice Number</label>
 <textarea  class="form-control"  name="doc_await_note" id="doc_await_note"  type="text" placeholder="Enter Advertisement Fees Paid Invoice Number" ><?php echo $cpm['0']['doc_await_note'];?></textarea>
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

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide " id="240" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Advertisement Started</h2>
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
 <label class="small mb-1" for="inputFirstName">Job Bank Advertisement</label>
                             <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                               <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Start Date</label>
 <input  class="form-control"  name="ad_job_start_date" id="ad_job_start_date"  type="text" placeholder="Enter Start Date" value="<?php echo $cpm['0']['ad_job_start_date'];?>"   readonly="readonly"  />
</div>
     </div>
     <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">End Date</label>
 <input  class="form-control"  name="ad_job_end_date" id="ad_job_end_date"  type="text" placeholder="Enter End Date" value="<?php echo $cpm['0']['ad_job_end_date'];?>"   readonly="readonly"  />
</div>
     </div>
   </div>
                  </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
 <label class="small mb-1" for="inputFirstName">Ingenious Link Advertisement</label>
                             <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                               <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Start Date</label>
 <input  class="form-control"  name="ad_il_start_date" id="ad_il_start_date"  type="text" placeholder="Enter Start Date" value="<?php echo $cpm['0']['ad_il_start_date'];?>"   readonly="readonly"  />
</div>
     </div>
     <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">End Date</label>
 <input  class="form-control"  name="ad_il_end_date" id="ad_il_end_date"  type="text" placeholder="Enter End Date" value="<?php echo $cpm['0']['ad_il_end_date'];?>"   readonly="readonly"  />
</div>
     </div>
   </div>




                  </div>
              

                  
                   
                            

                             </div>
                          </div>



                            <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
 <label class="small mb-1" for="inputFirstName">Kijiji Advertisement</label>
                             <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                               <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Start Date</label>
 <input  class="form-control"  name="ad_ki_start_date" id="ad_ki_start_date"  type="text" placeholder="Enter Start Date" value="<?php echo $cpm['0']['ad_ki_start_date'];?>"   readonly="readonly"  />
</div>
     </div>
     <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">End Date</label>
 <input  class="form-control"  name="ad_ki_end_date" id="ad_ki_end_date"  type="text" placeholder="Enter End Date" value="<?php echo $cpm['0']['ad_ki_end_date'];?>"   readonly="readonly"  />
</div>
     </div>
   </div>
                  </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
 <label class="small mb-1" for="inputFirstName">Craigslist Advertisement </label>
                             <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                               <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Start Date</label>
 <input  class="form-control"  name="ad_ca_start_date" id="ad_ca_start_date"  type="text" placeholder="Enter Start Date" value="<?php echo $cpm['0']['ad_ca_start_date'];?>"   readonly="readonly"  />
</div>
     </div>
     <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">End Date</label>
 <input  class="form-control"  name="ad_ca_end_date" id="ad_ca_end_date"  type="text" placeholder="Enter end Date" value="<?php echo $cpm['0']['ad_ca_end_date'];?>"   readonly="readonly"  />
</div>
     </div>
   </div>



   
                  </div>
              

                  
                   
                            

                             </div>
                          </div>





                                         <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
 <label class="small mb-1" for="inputFirstName">Other Advertisement</label>
                             <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                               <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Start Date</label>
 <input  class="form-control"  name="ad_oa_start_date" id="ad_oa_start_date"  type="text" placeholder="Enter Start Date" value="<?php echo $cpm['0']['ad_oa_start_date'];?>"   readonly="readonly"  />
</div>
     </div>
     <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">End Date</label>
 <input  class="form-control"  name="ad_oa_end_date" id="ad_oa_end_date"  type="text" placeholder="Enter End Date" value="<?php echo $cpm['0']['ad_oa_end_date'];?>"   readonly="readonly"  />
</div>
     </div>
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



  
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide " id="238" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Documents Awaiting For Submission</h2>

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
 <label class="small mb-1" for="inputFirstName">Documents Requested Date</label>
 <input  class="form-control"  name="doc_req_date" id="doc_req_date"  type="text" placeholder="Enter Documents Requested Date" value="<?php echo $cpm['0']['doc_req_date'];?>"   readonly="readonly"  />
</div>
     
                  </div>
                 
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                      <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Documents Received On</label>
 <input  class="form-control"  name="doc_req_on_date" id="doc_req_on_date"  type="text" placeholder="Enter Documents Received On" value="<?php echo $cpm['0']['doc_req_on_date'];?>"   readonly="readonly"  />
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


  
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide " id="494" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Advertisement Renewal 1st stage</h2>
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
 <label class="small mb-1" for="inputFirstName">Job Bank Advertisement</label>
                             <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                               <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Start Date</label>
 <input  class="form-control"  name="st_job_start_date" id="st_job_start_date"  type="text" placeholder="Enter Start Date" value="<?php echo $cpm['0']['st_job_start_date'];?>"   readonly="readonly"  />
</div>
     </div>
     <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">End Date</label>
 <input  class="form-control"  name="st_job_end_date" id="st_job_end_date"  type="text" placeholder="Enter End Date" value="<?php echo $cpm['0']['st_job_end_date'];?>"   readonly="readonly"  />
</div>
     </div>
   </div>
                  </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
 <label class="small mb-1" for="inputFirstName">Ingenious Link Advertisement</label>
                             <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                               <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Start Date</label>
 <input  class="form-control"  name="st_il_start_date" id="st_il_start_date"  type="text" placeholder="Enter Start Date" value="<?php echo $cpm['0']['st_il_start_date'];?>"   readonly="readonly"  />
</div>
     </div>
     <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">End Date</label>
 <input  class="form-control"  name="st_il_end_date" id="st_il_end_date"  type="text" placeholder="Enter End Date" value="<?php echo $cpm['0']['st_il_end_date'];?>"   readonly="readonly"  />
</div>
     </div>
   </div>




                  </div>
              

                  
                   
                            

                             </div>
                          </div>



                            <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
 <label class="small mb-1" for="inputFirstName">Kijiji Advertisement</label>
                             <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                               <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Start Date</label>
 <input  class="form-control"  name="st_ki_start_date" id="st_ki_start_date"  type="text" placeholder="Enter Start Date" value="<?php echo $cpm['0']['st_ki_start_date'];?>"   readonly="readonly"  />
</div>
     </div>
     <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">End Date</label>
 <input  class="form-control"  name="st_ki_end_date" id="st_ki_end_date"  type="text" placeholder="Enter End Date" value="<?php echo $cpm['0']['st_ki_end_date'];?>"   readonly="readonly"  />
</div>
     </div>
   </div>
                  </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
 <label class="small mb-1" for="inputFirstName">Craigslist Advertisement </label>
                             <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                               <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Start Date</label>
 <input  class="form-control"  name="st_ca_start_date" id="st_ca_start_date"  type="text" placeholder="Enter Start Date" value="<?php echo $cpm['0']['st_ca_start_date'];?>"   readonly="readonly"  />
</div>
     </div>
     <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">End Date</label>
 <input  class="form-control"  name="st_ca_end_date" id="st_ca_end_date"  type="text" placeholder="Enter End Date" value="<?php echo $cpm['0']['st_ca_end_date'];?>"   readonly="readonly"  />
</div>
     </div>
   </div>



   
                  </div>
              

                  
                   
                            

                             </div>
                          </div>





                                         <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
 <label class="small mb-1" for="inputFirstName">Other Advertisement</label>
                             <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                               <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Start Date</label>
 <input  class="form-control"  name="st_oa_start_date" id="st_oa_start_date"  type="text" placeholder="Enter Start Date" value="<?php echo $cpm['0']['st_oa_start_date'];?>"   readonly="readonly"  />
</div>
     </div>
     <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">End Date</label>
 <input  class="form-control"  name="st_oa_end_date" id="st_oa_end_date"  type="text" placeholder="Enter End Date" value="<?php echo $cpm['0']['st_oa_end_date'];?>"   readonly="readonly"  />
</div>
     </div>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide " id="239" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Application Submitted</h2>
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
 <label class="small mb-1" for="inputFirstName">Date Of Submission</label>
 <input type="text" id="app_sub_date" name="app_sub_date" class="form-control" placeholder="Date Of Submission" value="<?php echo $cpm['0']['app_sub_date'];?>"/>
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
 <label class="small mb-1" for="inputFirstName">Mode Of payment by client</label><br>
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
 <label class="small mb-1" for="inputFirstName">Date of Payment Recive</label><br>
 <input type="text" name="date_of_payment_recive" id="date_of_payment_recive" class="form-control" readonly=""  value="<?php echo $cpm['0']['date_of_payment_recive'];?>" placeholder="Enter Date of Payment received">
  
</div>
<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Amount</label><br>
 <input type="text" name="amount" id="anount" value="<?php echo $cpm['0']['amount'];?>" placeholder="Enter Amount" class="form-control">
  
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



                          <!------>
                                 <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Application Number</label>
 <input type="text" id="app_number" name="app_number" value="<?php echo $cpm['0']['application_number'];?>"class="form-control" placeholder="Enter application number" >
</div>
     
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                      <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Address Of Immigration Document Received</label> <input type="text" id="add_imm_doc_rec" name="add_imm_doc_rec" class="form-control" placeholder="Address Of Immigration Document Received"  value="<?php echo $cpm['0']['add_imm_doc_rec'];?>">
</div>
     
                  </div>

                   <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                    <div class="form-group">
                    <label class="small mb-1" for="inputFirstName">Fee Receipt Upload</label>
                    <input type="file" name="fee_receipt" id="fee_receipt">



                    <input type="hidden" name="fee_receipt_old" id="fee_receipt_old" value="<?php echo $cpm['0']['fee_receipt'];?>">
</div>
                    </div>


                   <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                    <div class="form-group">
        <label class="small mb-1" for="inputFirstName">Submission Confirmation Upload</label>
                    <input type="file" name="sub_confim" id="sub_confim">
      <input type="hidden" name="sub_confim" id="sub_confim" value="<?php echo $cpm['0']['sub_confim'];?>">
</div>
                    </div>
                          </div>
                          <!------->
                        
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide " id="242"style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >LMIA Number Received</h2>
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
 <label class="small mb-1" for="inputFirstName">LMIA Number Received Date</label><!--date line-->
 <input type="text" name="lmia_rec_date" id="lmia_rec_date" class="form-control" readonly=""   placeholder="Enter Date Of Biometric received" value="<?php echo $cpm['0']['lmia_rec_date'];?>"  />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">LMIA Number</label>
 <input type="text" name="lmia_number" id="lmia_number" placeholder="Enter LMIA Number" class="form-control"  value="<?php echo $cpm['0']['lmia_number'];?>">
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="243" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Interview/ADR Requested</h2>
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
 <label class="small mb-1" for="inputFirstName">Date Of Request Received</label>
 <input type="text"   name="date_int_req_rec" id="date_int_req_rec"  placeholder="Enter Date Of Request Received" class="form-control" readonly="" value="<?php echo $cpm['0']['date_int_req_rec'];?>" >
</div>
     
                  </div>
                  

               
                   <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date Of Request Sent To Client</label>
 <input type="text"   name="date_int_sent_client" id="date_int_sent_client"  placeholder="Enter Date Of Request Sent To Client" class="form-control" readonly="" value="<?php echo $cpm['0']['date_int_sent_client'];?>" >
</div> 
     
                  </div>
                     <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Request upload</label>
 <input type="file"  name="int_req_upload" id="int_req_upload"   >
 <input type="hidden" name="int_req_upload_old" id="int_req_upload_old" value="<?php echo $cpm['0']['int_req_upload'];?>">
     
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="244" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Interview/ADR Completed</h2>
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
 <label class="small mb-1" for="inputFirstName">Request Completed Date</label>
 <input type="text" name="date_int_req_com"  id="date_int_req_com"   class="form-control" placeholder="Enter Application Sent Date" readonly=""  value="<?php echo $cpm['0']['date_int_req_com'];?>"  />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Request Submitted To Ircc</label>
 <input type="file" name="int_sub_to_ircc" id="int_sub_to_ircc"      />

 <input type="hidden" name="int_sub_to_ircc_old" id="int_sub_to_ircc_old" value="<?php echo $cpm['0']['int_sub_to_ircc']?>">
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="495" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 > Advertisement Renewal 2nd stage</h2>
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
 <label class="small mb-1" for="inputFirstName">Job Bank Advertisement</label>
                             <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                               <div class="col-lg-6 col-md-6 col-sm-6 mb-3">


                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Start Date</label>
 <input  class="form-control"  name="stt_job_start_date" id="stt_job_start_date"  type="text" placeholder="Enter Start Date" value="<?php echo $cpm['0']['stt_job_start_date'];?>"   readonly="readonly"  />
</div>
     </div>
     <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">End Date</label>
 <input  class="form-control"  name="stt_job_end_date" id="stt_job_end_date"  type="text" placeholder="Enter End Date" value="<?php echo $cpm['0']['stt_job_end_date'];?>"   readonly="readonly"  />
</div>
     </div>
   </div>
                  </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
 <label class="small mb-1" for="inputFirstName">Ingenious Link Advertisement</label>
                             <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                               <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Start Date</label>
 <input  class="form-control"  name="stt_il_start_date" id="stt_il_start_date"  type="text" placeholder="Enter Start Date" value="<?php echo $cpm['0']['stt_il_start_date'];?>"   readonly="readonly"  />
</div>
     </div>
     <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">End Date</label>
 <input  class="form-control"  name="stt_il_end_date" id="stt_il_end_date"  type="text" placeholder="Enter End Date" value="<?php echo $cpm['0']['stt_il_end_date'];?>"   readonly="readonly"  />
</div>
     </div>
   </div>




                  </div>
              

                  
                   
                            

                             </div>
                          </div>



                            <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
 <label class="small mb-1" for="inputFirstName">Kijiji Advertisement</label>
                             <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                               <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Start Date</label>
 <input  class="form-control"  name="stt_ki_start_date" id="stt_ki_start_date"  type="text" placeholder="Enter Start Date" value="<?php echo $cpm['0']['stt_ki_start_date'];?>"   readonly="readonly"  />
</div>
     </div>
     <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">End Date</label>
 <input  class="form-control"  name="stt_ki_end_date" id="stt_ki_end_date"  type="text" placeholder="Enter End Date" value="<?php echo $cpm['0']['stt_ki_end_date'];?>"   readonly="readonly"  />
</div>
     </div>
   </div>
                  </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
 <label class="small mb-1" for="inputFirstName">Craigslist Advertisement </label>
                             <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                               <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Start Date</label>
 <input  class="form-control"  name="stt_ca_start_date" id="stt_ca_start_date"  type="text" placeholder="Enter Start Date" value="<?php echo $cpm['0']['stt_ca_start_date'];?>"   readonly="readonly"  />
</div>
     </div>
     <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">End Date</label>
 <input  class="form-control"  name="stt_ca_end_date" id="stt_ca_end_date"  type="text" placeholder="Enter End Date" value="<?php echo $cpm['0']['stt_ca_end_date'];?>"   readonly="readonly"  />
</div>
     </div>
   </div>



   
                  </div>
              

                  
                   
                            

                             </div>
                          </div>





                                         <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
 <label class="small mb-1" for="inputFirstName">Other Advertisement</label>
                             <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                               <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Start Date</label>
 <input  class="form-control"  name="stt_oa_start_date" id="stt_oa_start_date"  type="text" placeholder="Enter Start Date" value="<?php echo $cpm['0']['stt_oa_start_date'];?>"   readonly="readonly"  />
</div>
     </div>
     <div class="col-lg-6 col-md-6 col-sm-6 mb-3">

                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">End Date</label>
 <input  class="form-control"  name="stt_oa_end_date" id="stt_oa_end_date"  type="text" placeholder="Enter End Date" value="<?php echo $cpm['0']['stt_oa_end_date'];?>"   readonly="readonly"  />
</div>
     </div>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="246" style="margin-top:1px;">
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
 <label class="small mb-1" for="inputFirstName">Date Of Refusal </label>
 <input  class="form-control" name="refusal_date"  id="refusal_date" class="form-control"  placeholder="Enter Date Of Refusal"  readonly=""  value="<?php echo $cpm['0']['refusal_date'];?>" />
</div>
     
                  </div>
                

                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                                <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Upload Refusal Letter </label>
 <input  type="file" name="refusal_letter"  id="refusal_letter" class="form-control"  placeholder="Upload Refusal Letter"    />
 <input  type="file" name="refusal_letter_old"  id="refusal_letter_old" class="form-control"  value="<?php echo $cpm['0']['refusal_letter'] ?>"    />
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="245" style="margin-top:1px;">
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

                          <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date Of Work Permit  Received Untill </label>
 <input type="text" name="date_work_permit" id="date_work_permit"  placeholder="Enter Date Of Work Permit  Received Until"  class="form-control" value="<?php echo $cpm['0']['date_work_permit'];?>" readonly=""  />
</div>
     
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Approval Letter Upload</label>
 <input type="file" name="approval_letter" id="approval_letter"  />
 <input type="hidden" name="approval_letter_old" id="approval_letter_old" <?php echo $cpm['0']['approval_letter']; ?> />


</div> 
     
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">

                    <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's</label>
 <textarea name="approve_note" id="approve_note"value="<?php echo $cpm['0']['approve_note'];?>" placeholder="Enter Note's" class="form-control" ></textarea>
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


 

  <!--section End -->


   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "  style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >

<hr style="color:gray"></hr>
                <h2 >Account(Remaining Amount :-<?php
 $tm= $acc['0']['tolat_pay_amount'];
$poa=$acc['0']['pay_one_amount'];
 $pta=$acc['0']['pay_two_amount'];
 $ptha=$acc['0']['pay_three_amount'];
 $pfa=$acc['0']['pay_four_amount'];
 $pfia=$acc['0']['pay_five_amount'];
 $psa=$acc['0']['pay_six_amount'];

               echo  $rm=$tm-($poa+$pta+$ptha+$pfa+$pfia+$psa);

                 ?>)</h2>
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
 <label class="small mb-1" for="inputFirstName">Retainer application </label></br>
 <input type="radio" name="retainer_app" id="retainer_app"  <?php if($acc['0']['retainer_app']=='yes'){ echo "checked=checked";}  ?>   value="yes" /> Yes
  <input type="radio" name="retainer_app" id="retainer_app" <?php if($acc['0']['retainer_app']=='no'){ echo "checked=checked";}  ?>   value="no" /> no
</div>

            <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Application Govt fee will be paid from </label></br>
 <input type="radio" name="govt_fee" id="govt_fee" <?php if($acc['0']['govt_fee']=='td_sia'){ echo "checked=checked";}  ?>    value="td_sia" /> Td Sia
  <input type="radio" name="govt_fee" id="govt_fee" <?php if($acc['0']['govt_fee']=='Client_own'){ echo "checked=checked";}  ?>   value="Client_own" /> Client own
  <input type="radio" name="govt_fee" id="govt_fee" <?php if($acc['0']['govt_fee']=='tbd'){ echo "checked=checked";}  ?>   value="tbd" /> Tbd
</div>
     
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Payment plan application</label></br>

 <input type="radio" name="pay_plan" id="pay_plan" <?php if($acc['0']['pay_plan']=='yes'){ echo "checked=checked";}  ?>  value="yes" /> Yes
 <input type="radio" name="pay_plan" id="pay_plan" <?php if($acc['0']['pay_plan']=='no'){ echo "checked=checked";}  ?>   value="no" /> no.


</div> 
     
                  </div>


                          <div class="col-lg-3 col-md-4 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Estimated application </label></br>

 <input type="radio" name="est_app" id="est_app" <?php if($acc['0']['est_app']=='yes'){ echo "checked=checked";}  ?>    value="yes" /> Yes
 <input type="radio" name="est_app" id="est_app" <?php if($acc['0']['est_app']=='no'){ echo "checked=checked";}  ?>    value="no" /> no </br> 

 <label class="small mb-1" for="inputFirstName">Estimated Number </label>
 <input type="text" class="form-control" name="est_num" id="est_num"   placeholder="Enter Estimated Number"  value="<?php echo $acc['0']['est_num'];?>" />


</div> 
     
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">

                    <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Total Payment Plan (copy paste from retainer)</label>
 <input type="text" name="tolat_pay_plan"  id="tolat_pay_plan"value="<?php echo $acc['0']['tolat_pay_plan'];?>" placeholder="Enter Note's" class="form-control" >
  <label class="small mb-1" for="inputFirstName">Total Payment (IN Number only)</label>
 <input type="number" name="tolat_pay_amount"  id="tolat_pay_amount"value="<?php echo $acc['0']['tolat_pay_amount'];?>" placeholder="Enter Total payment" class="form-control" >
</div> 
     
                     
                  </div>
                    

                             </div>

<!---->

            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">1st Payment </label></br>
 <input type="radio" name="pay_one" id="pay_one" <?php if($acc['0']['pay_one']=='Invoice_sent_not_yet_paid'){ echo "checked=checked";}  ?>     value="Invoice_sent_not_yet_paid" /> Invoice sent,not yet paid
  <input type="radio" name="pay_one" id="pay_one" <?php if($acc['0']['pay_one']=='paid'){ echo "checked=checked";}  ?>     value="paid" /> paid
</div>


<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's 1st Payment </label>
 <input type="text" class="form-control" name="pay_one_note" id="pay_one_note"  placeholder="Enter Note's 1st Payment"  value="<?php echo $acc['0']['pay_one_note'];?>" />
 <label class="small mb-1" for="inputFirstName">1st Payment Amount (IN Number Only)</label>
 <input type="number" class="form-control" name="pay_one_amount" id="pay_one_amount"  placeholder="Enter 1st Payment Amount (IN Number Only)"  value="<?php echo $acc['0']['pay_one_amount'];?>" /> 
  
</div>
     
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                 <div class="form-group">
 <label class="small mb-1" for="inputFirstName">2nd Payment </label></br>
 <input type="radio" name="pay_two" id="pay_two" <?php if($acc['0']['pay_two']=='Invoice_sent_not_yet_paid'){ echo "checked=checked";}  ?>     value="Invoice_sent_not_yet_paid" /> Invoice sent,not yet paid
  <input type="radio" name="pay_two" id="pay_two" <?php if($acc['0']['pay_two']=='paid'){ echo "checked=checked";}  ?>    value="paid" /> paid
</div>


<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's 2nd Payment</label>
 <input type="text" class="form-control" name="pay_two_note" id="pay_two_note"  placeholder="Enter Note's 2nd Payment"  value="<?php echo $acc['0']['pay_two_note'];?>" /> 
  <label class="small mb-1" for="inputFirstName">2nd Payment Amount (IN Number Only)</label>
 <input type="number" class="form-control" name="pay_two_amount" id="pay_two_amount"  placeholder="Enter 2nd Payment Amount (IN Number Only)"  value="<?php echo $acc['0']['pay_two_amount'];?>" /> 
  
</div>
     
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">

             <div class="form-group">
 <label class="small mb-1" for="inputFirstName">3rd Payment </label></br>
 <input type="radio" name="pay_three" id="pay_three"  <?php if($acc['0']['pay_three']=='Invoice_sent_not_yet_paid'){ echo "checked=checked";}  ?>   value="Invoice_sent_not_yet_paid" /> Invoice sent,not yet paid
  <input type="radio" name="pay_three" id="pay_three" <?php if($acc['0']['pay_three']=='paid'){ echo "checked=checked";}  ?>    value="paid" /> paid
</div>


<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's 3rd Payment</label>
 <input type="text" class="form-control" name="pay_three_note" id="pay_three_note"  placeholder="Enter Note's 3rd Payment"  value="<?php echo $acc['0']['est_num'];?>" /> 
  <label class="small mb-1" for="inputFirstName">3rd Payment Amount (IN Number Only)</label>
 <input type="number" class="form-control" name="pay_three_amount" id="pay_three_amount"  placeholder="Enter 3rd Payment Amount (IN Number Only)"  value="<?php echo $acc['0']['pay_three_amount'];?>" /> 
  
</div>     
                     
                  </div>
                    

                             </div>




                             <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">4th Payment </label></br>
 <input type="radio" name="pay_four" id="pay_four" <?php if($acc['0']['pay_four']=='Invoice_sent_not_yet_paid'){ echo "checked=checked";}  ?>    value="Invoice_sent_not_yet_paid" /> Invoice sent,not yet paid
  <input type="radio" name="pay_four" id="pay_four" <?php if($acc['0']['pay_four']=='paid'){ echo "checked=checked";}  ?>    value="paid" /> paid
</div>


<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's 4th Payment</label>
 <input type="text" class="form-control" name="pay_four_note" id="pay_four_note"  placeholder="Enter Note's 4th Payment"  value="<?php echo $acc['0']['pay_four_note'];?>" />
  <label class="small mb-1" for="inputFirstName">4th Payment Amount (IN Number Only)</label>
 <input type="text" class="form-control" name="pay_four_amount" id="pay_one_note"  placeholder="Enter 4th Payment Amount (IN Number Only)"  value="<?php echo $acc['0']['pay_four_amount'];?>" />  
  
</div>
     
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                 <div class="form-group">
 <label class="small mb-1" for="inputFirstName">5th Payment </label></br>
 <input type="radio" name="pay_five" id="pay_five" <?php if($acc['0']['pay_five']=='no'){ echo "checked=checked";}  ?>    value="Invoice_sent_not_yet_paid" /> Invoice sent,not yet paid
  <input type="radio" name="pay_five" id="pay_five"<?php if($acc['0']['pay_five']=='paid'){ echo "checked=checked";}  ?>    value="paid" /> paid
</div>


<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's 5th Payment</label>
 <input type="text" class="form-control" name="pay_five_note" id="pay_five_note"  placeholder="Enter Note's 5th Payment"  value="<?php echo $acc['0']['pay_five_note'];?>" /> 
  <label class="small mb-1" for="inputFirstName">5th Payment Amount (IN Number Only)</label>
 <input type="number" class="form-control" name="pay_five_amount" id="pay_five_amount"  placeholder="Enter 5th Payment Amount (IN Number Only)"  value="<?php echo $acc['0']['pay_five_amount'];?>" /> 
  
</div>
     
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">

             <div class="form-group">
 <label class="small mb-1" for="inputFirstName">6th Payment </label></br>
 <input type="radio" name="pay_sex" id="pay_sex" <?php if($acc['0']['pay_sex']=='Invoice_sent_not_yet_paid'){ echo "checked=checked";}  ?>     value="Invoice_sent_not_yet_paid" /> Invoice sent,not yet paid
  <input type="radio" name="pay_sex" id="pay_sex" <?php if($acc['0']['pay_sex']=='paid'){ echo "checked=checked";}  ?>   value="paid" /> paid
</div>


<div class="form-group">
 <label class="small mb-1" for="inputFirstName"> Note's 6th Payment</label>
 <input type="text" class="form-control" name="pay_sex_note" id="pay_sex_note"  placeholder="Enter Note's 6th Payment"  value="<?php echo $acc['0']['pay_sex_note'];?>" /> 
  <label class="small mb-1" for="inputFirstName">6th Payment Amount (IN Number Only)</label>
 <input type="number" class="form-control" name="pay_six_amount" id="pay_six_amount"  placeholder="Enter 6th Payment Amount (IN Number Only)"  value="<?php echo $acc['0']['pay_six_amount'];?>" /> 
  
</div>     
                     
                  </div>
                    

                             </div>



  <!----
  >




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
 <input type="submit" class="form-control py-4" style="background-color: green;text-align: center;color: white" name="submit" value="Submit">
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

          assign_to: {
                required: true               
            },
          app_recv: {
                required: true,
                date: true,  
            },
             exp_date_to_apply: {
                required: true,
                date: true,    
            },
             study_permit_exp: {
                required: true,
                date: true,                              
            },
            info_doc_req_date: {
                required: true,
                date: true,                             
            },
             feerp: {
                required: true               
            },
              doc_await_note: {
                required: true               
            },
             ad_job_start_date: {
               required: true,
                date: true,
            },
            ad_job_end_date: {
               required: true,
                date: true,
            },
            ad_il_start_date: {
               required: true,
                date: true,
            },
            ad_il_end_date: {
               required: true,
                date: true,
            },
            ad_ki_start_date: {
               required: true,
                date: true,
            },
            ad_ki_end_date: {
               required: true,
                date: true,
            },
            ad_ca_start_date: {
               required: true,
                date: true,
            },
            ad_ca_end_date: {
               required: true,
                date: true,
            },
            ad_oa_start_date: {
               required: true,
                date: true,
            },
            ad_oa_end_date: {
               required: true,
                date: true,
            },
             doc_req_date: {
               required: true,
                date: true,
            },
              doc_req_on_date: {
               required: true,
                date: true,
            },
            st_job_start_date: {
               required: true,
                date: true,
            },
            st_job_end_date: {
               required: true,
                date: true,
            },
            st_il_start_date: {
               required: true,
                date: true,
            },
            st_il_end_date: {
               required: true,
                date: true,
            },
            st_ki_start_date: {
               required: true,
                date: true,
            },
            st_ki_end_date: {
               required: true,
                date: true,
            },
            st_ca_start_date: {
               required: true,
                date: true,
            },
            st_ca_end_date: {
               required: true,
                date: true,
            },
            st_oa_start_date: {
               required: true,
                date: true,
            },
            st_oa_end_date: {
               required: true,
                date: true,
            },
            app_sub_date: {
                required: true,
                date: true,    
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
                required: true,
                date: true,  
            },
             
            amount: {
                required: true               
            },
            client_card_note:{
                required:true
            },
              app_number: {
                required: true               
            },
             add_imm_doc_rec: {
                required: true               
            },
             fee_receipt: {
                required: true               
            },

            sub_confim: {
                required: true               
            },
              lmia_rec_date: {
               required: true,
                date: true,
            },
             lmia_number: {
                required: true               
            },            
             date_int_req_rec: {
                required: true,
                date: true,                                
            },
             date_int_sent_client: {
               required: true,
                date: true,                            
            },
             int_req_upload: {
                required: true               
            },
             date_int_req_com: {
                required: true,
                date: true,                              
            },
              int_sub_to_ircc: {
                required: true               
            },

            stt_job_start_date: {
               required: true,
                date: true,
            },
            stt_job_end_date: {
               required: true,
                date: true,
            },
            stt_il_start_date: {
               required: true,
                date: true,
            },
            stt_il_end_date: {
               required: true,
                date: true,
            },
            stt_ki_start_date: {
               required: true,
                date: true,
            },
            stt_ki_end_date: {
               required: true,
                date: true,
            },
            stt_ca_start_date: {
               required: true,
                date: true,
            },
            stt_ca_end_date: {
               required: true,
                date: true,
            },
            stt_oa_start_date: {
               required: true,
                date: true,
            },
            stt_oa_end_date: {
               required: true,
                date: true,
            },

            refusal_date: {
                required: true               
            },
            refusal_letter: {
                required: true               
            },

            date_work_permit: {
                required: true               
            },
            approval_letter: {
                required: true               
            },
        },
        messages: {

        assign_to: "Assign Team Member IS Required",
        app_recv: "Date Of Application Received IS Required",
        exp_date_to_apply: "Accepted Date Of Submission IS Required",
        study_permit_exp:"Study Permit Expiry Date IS Required",
        info_doc_req_date:"This IS Required",
        feerp: "Fee Received Or Pending IS Required",
        doc_await_note:"Note Is Required",

        ad_job_start_date:"Start Date IS Required",
        ad_job_end_date:"End Date IS Required",
        ad_il_start_date:"Start Date IS Required",
        ad_il_end_date:"End Date IS Required",
        ad_ki_start_date:"Start Date IS Required",
        ad_ki_end_date:"End Date IS Required",
        ad_ca_start_date:"Start Date IS Required",
        ad_ca_end_date:"End Date IS Required",
        ad_oa_start_date:"Start Date IS Required",
        ad_oa_end_date:"End Date IS Required",

        doc_req_date:"Document Requested Date IS Required",
        doc_req_on_date:"Documents Received On IS Required",

        st_job_start_date:"Start Date IS Required",
        st_job_end_date:"End Date IS Required",
        st_il_start_date:"Start Date IS Required",
        st_il_end_date:"End Date IS Required",
        st_ki_start_date:"Start Date IS Required",
        st_ki_end_date:"End Date IS Required",
        st_ca_start_date:"Start Date IS Required",
        st_ca_end_date:"End Date IS Required",
        st_oa_start_date:"Start Date IS Required",
        st_oa_end_date:"End Date IS Required",

        app_sub_date: "Date Of Application Submitted IS Required",
        fee: "Application Fee Payment Mode IS Required",
        mode_client_payment: "Mode Of Payment By Client IS Required",
        confirm_with: "Confirm With IS Required",
        date_of_payment_recive: "Confirm With IS Required",
        amount: "Amount IS Required",
        client_card_note:"Note's IS Required",
        app_number: "Application Number IS Required",
        add_imm_doc_rec: "Address Of Immigration Document Received IS Required",
        fee_receipt: "Fee Receipt Upload IS Required",
        sub_confim: "Submission Confirmation Upload IS Required",
        lmia_number: "LMIA Number Received IS Required",
        lmia_rec_date:"LMIA Number Received Date Is Required",
         date_int_req_rec: "Date Of Request Received IS Required",
        date_int_sent_client: "Date Of Request Sent To ClientIS Required",
        int_req_upload: "Request uploadIS Required",
        date_int_req_com: "Request Completed Date Required",
        int_sub_to_ircc: "Request Submitted To Ircc IS Required",

        stt_job_start_date:"Start Date IS Required",
        stt_job_end_date:"End Date IS Required",
        stt_il_start_date:"Start Date IS Required",
        stt_il_end_date:"End Date IS Required",
        stt_ki_start_date:"Start Date IS Required",
        stt_ki_end_date:"End Date IS Required",
        stt_ca_start_date:"Start Date IS Required",
        stt_ca_end_date:"End Date IS Required",
        stt_oa_start_date:"Start Date IS Required",
        stt_oa_end_date:"End Date IS Required",

         refusal_date: "Refusal Date Required",
        refusal_letter: "Refusal letter IS Required",

       

       
        
     

       
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

if(app_status=='492'){  
$( "#492" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='236'){
$( "#492" ).removeClass( "show" ).addClass( "hide" );
$( "#236" ).removeClass( "hide" ).addClass( "show" );

}
else if(app_status=='493'){

$( "#492" ).removeClass( "show" ).addClass( "hide" );

$( "#236" ).removeClass( "show" ).addClass( "hide" );

$( "#493" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='240'){

$( "#492" ).removeClass( "show" ).addClass( "hide" );
$( "#236" ).removeClass( "show" ).addClass( "hide" );
$( "#493" ).removeClass( "show" ).addClass( "hide" );
$( "#240" ).removeClass( "hide" ).addClass( "show" );
}

else if(app_status=='238'){

$( "#492" ).removeClass( "show" ).addClass( "hide" );
$( "#236" ).removeClass( "show" ).addClass( "hide" );
$( "#493" ).removeClass( "show" ).addClass( "hide" );
$( "#240" ).removeClass( "show" ).addClass( "hide" );
$( "#238" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='494'){

$( "#492" ).removeClass( "show" ).addClass( "hide" );
$( "#236" ).removeClass( "show" ).addClass( "hide" );
$( "#493" ).removeClass( "show" ).addClass( "hide" );
$( "#240" ).removeClass( "show" ).addClass( "hide" );
$( "#238" ).removeClass( "show" ).addClass( "hide" );
$( "#494" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='239'){
$( "#492" ).removeClass( "show" ).addClass( "hide" );
$( "#236" ).removeClass( "show" ).addClass( "hide" );
$( "#493" ).removeClass( "show" ).addClass( "hide" );
$( "#240" ).removeClass( "show" ).addClass( "hide" );
$( "#238" ).removeClass( "show" ).addClass( "hide" );
$( "#494" ).removeClass( "show" ).addClass( "hide" );
$( "#239" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='242'){
$( "#492" ).removeClass( "show" ).addClass( "hide" );
$( "#236" ).removeClass( "show" ).addClass( "hide" );
$( "#493" ).removeClass( "show" ).addClass( "hide" );
$( "#240" ).removeClass( "show" ).addClass( "hide" );
$( "#238" ).removeClass( "show" ).addClass( "hide" );
$( "#494" ).removeClass( "show" ).addClass( "hide" );  
$( "#239" ).removeClass( "show" ).addClass( "hide" );
$( "#242" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='243'){
  $( "#492" ).removeClass( "show" ).addClass( "hide" );
  $( "#236" ).removeClass( "show" ).addClass( "hide" );
  $( "#493" ).removeClass( "show" ).addClass( "hide" );
  $( "#240" ).removeClass( "show" ).addClass( "hide" );
  $( "#238" ).removeClass( "show" ).addClass( "hide" );
  $( "#494" ).removeClass( "show" ).addClass( "hide" );
  $( "#239" ).removeClass( "show" ).addClass( "hide" );
  $( "#242" ).removeClass( "show" ).addClass( "hide" );
  $( "#243" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='244'){
$( "#492" ).removeClass( "show" ).addClass( "hide" );
$( "#236" ).removeClass( "show" ).addClass( "hide" );
$( "#493" ).removeClass( "show" ).addClass( "hide" );
$( "#240" ).removeClass( "show" ).addClass( "hide" );
$( "#238" ).removeClass( "show" ).addClass( "hide" );
$( "#494" ).removeClass( "show" ).addClass( "hide" );
$( "#239" ).removeClass( "show" ).addClass( "hide" );
$( "#242" ).removeClass( "show" ).addClass( "hide" );
$( "#243" ).removeClass( "show" ).addClass( "hide" );
$( "#244" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='495'){
$( "#492" ).removeClass( "show" ).addClass( "hide" );
$( "#236" ).removeClass( "show" ).addClass( "hide" );
$( "#493" ).removeClass( "show" ).addClass( "hide" );
$( "#240" ).removeClass( "show" ).addClass( "hide" );
$( "#238" ).removeClass( "show" ).addClass( "hide" );
$( "#494" ).removeClass( "show" ).addClass( "hide" );
$( "#239" ).removeClass( "show" ).addClass( "hide" );
$( "#242" ).removeClass( "show" ).addClass( "hide" );
$( "#243" ).removeClass( "show" ).addClass( "hide" );
$( "#244" ).removeClass( "show" ).addClass( "hide" );
$( "#495" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='245'){
$( "#492" ).removeClass( "show" ).addClass( "hide" );
$( "#236" ).removeClass( "show" ).addClass( "hide" );
$( "#493" ).removeClass( "show" ).addClass( "hide" );
$( "#240" ).removeClass( "show" ).addClass( "hide" );
$( "#238" ).removeClass( "show" ).addClass( "hide" );
$( "#494" ).removeClass( "show" ).addClass( "hide" );
$( "#239" ).removeClass( "show" ).addClass( "hide" );
$( "#242" ).removeClass( "show" ).addClass( "hide" );
$( "#243" ).removeClass( "show" ).addClass( "hide" );
$( "#244" ).removeClass( "show" ).addClass( "hide" );
$( "#495" ).removeClass( "show" ).addClass( "hide" );
$( "#245" ).removeClass( "hide" ).addClass( "show" );
}


    //alert(app_status);
  }
</script>



  <script>
  $( function() {

    $( "#lmia_rec_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
 

       $( "#info_doc_req_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });

$( "#ad_job_start_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });


$( "#doc_req_on_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });



    $( "#ad_job_end_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#ad_il_start_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#ad_il_end_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#ad_ki_start_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#ad_ki_end_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#ad_ca_start_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#ad_ca_end_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#ad_oa_start_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#ad_oa_end_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });



    //////////////

    $( "#st_job_start_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });



    $( "#st_job_end_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#st_il_start_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#st_il_end_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#st_ki_start_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#st_ki_end_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#st_ca_start_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#st_ca_end_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#st_oa_start_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#st_oa_end_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });

    //////////////

  //////////////

    $( "#stt_job_start_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });



    $( "#stt_job_end_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#stt_il_start_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#stt_il_end_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#stt_ki_start_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#stt_ki_end_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#stt_ca_start_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#stt_ca_end_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#stt_oa_start_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
    $( "#stt_oa_end_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });

    //////////////






    $( "#app_recv" ).datepicker({

dateFormat: 'yy-mm-dd'

    });

    $("#study_permit_exp" ).datepicker({

dateFormat: 'yy-mm-dd'

    });

    $("#exp_date_to_apply" ).datepicker({

dateFormat: 'yy-mm-dd'

    });




     $("#doc_req_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });

 $("#date_bio_reciv" ).datepicker({

dateFormat: 'yy-mm-dd'

    });


 $("#date_bio_sent" ).datepicker({

dateFormat: 'yy-mm-dd'

    });



 $("#date_bio_comp" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
 $("#date_int_req_com" ).datepicker({

dateFormat: 'yy-mm-dd'

    });


     $( "#date_int_req_rec" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
     $( "#date_int_sent_client" ).datepicker({

dateFormat: 'yy-mm-dd'

    });
     $( "#date_work_permit" ).datepicker({

dateFormat: 'yy-mm-dd'

    });





     $( "#invitation_date_final" ).datepicker({

dateFormat: 'yy-mm-dd'

    });

       $( "#app_sub_date" ).datepicker({

dateFormat: 'yy-mm-dd'

    });

       $( "#refusal_date" ).datepicker({

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


<!--

           
            c_transfer: {
                required: true               
            },
           
            
             date_of_creation: {
               required: true,
                date: true,
                                
            },



            date_bio_reciv: {
                required: true               
            },
            date_bio_sent: {
                required: true               
            },


             date_bio_comp: {
                required: true               
            },

             bio_com_note: {
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


               c_transfer:"College Transfer Required IS Required",
        
       


      


      
       
        date_of_creation: "Date of Creation IS Required",
       
       

        
       
        


        date_bio_reciv: "Date Of Biometric received IS Required",
        date_bio_sent: "Date of Biometric sent to client IS Required",

        date_bio_comp: "Date Of Biometric completed IS Required",
        bio_com_note: "Note IS Required",

       

       
       


        



        invitation_date_tantative: "Tentative Submission Date IS Required",
        invitation_date_final: "Final Submission Date  IS Required",
        invit_withdrawn_reason: "Reason  IS Required",

       
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
         approve_note:"Approve note IS Required",
         refused_note:"Adr Deadline IS Required",

  --->

