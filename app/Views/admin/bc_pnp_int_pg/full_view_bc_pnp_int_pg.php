
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
                        <h1 class="mt-4">Full View Bc Pnp Int PG</h1>
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
 <input style="border-top: none;border-right: none;border-left: none;" class="form-control aa" readonly  value="<?php  echo  $profile['0']['id']; ?>"   />
</div>
     
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName"> Name</label>
 <input style="border-top: none;border-right: none;border-left: none;" class="form-control aa" readonly  value="<?php  echo  $profile['0']['heading']; ?>"   />
</div>
     
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Email</label>
 <input style="border-top: none;border-right: none;border-left: none;" class="form-control aa" readonly  value="<?php  echo  $profile['0']['email']; ?>"   />
</div>
     
                  </div>
                   <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Mobile</label>
 <input style="border-top: none;border-right: none;border-left: none;" class="form-control aa" readonly  value="<?php  echo  $profile['0']['number']; ?>"   />
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


 <form id="myform" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>/Siaportal/edit_bc_pnp_int_grd/<?php echo $cpm['0']['category'];?>/<?php echo $cpm['0']['id'];?>/<?php echo $cpm['0']['type'];?>"> 

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 ></h2>
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
                               
                                 


 <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputFirstName"> Status</label>
    
    <input type="text"value="<?php echo $cpm['0']['st'];?>"  class="form-control aa" readonly id="application_status"  name="application_status"  >



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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " id="2" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Profile in Process</h2>
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
 <input  class="form-control aa" readonly  name="exp_date_to_apply" id="datepicker"  type="text" placeholder="Enter expected date to apply" value="<?php echo $cpm['0']['exp_date_to_apply'];?>"   readonly="readonly"  />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Assign Team Member</label>

  <input  class="form-control aa" readonly  name="exp_date_to_apply" id="exp_date_to_apply"  type="text" placeholder="Enter information request sent on" value="<?php echo $team['0']['firstname'];?> <?php echo $team['0']['lastname'];?>"  readonly="readonly"  />

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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " id="3" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Profile Created</h2>
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
 <input type="text" id="date_of_creation" name="date_of_creation" class="form-control aa" readonly   readonly="" placeholder="Enter date Of Creation" value="<?php echo $cpm['0']['date_of_creation'];?>" />
</div>

<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Job NOC</label>
 <input type="text" class="form-control aa" readonly value="<?php echo $cpm['0']['job_noc'];?>" name="job_noc" id="job_noc" placeholder="Enter job noc"    />
</div>
     
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Application Number </label>
 <input type="text" name="app_number" id="app_number" value="<?php echo $cpm['0']['application_number'];?>" placeholder="Enter application number" class="form-control aa" readonly    />
</div>
<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Upload Document </label>
 

   <br>
  <a target="_blank" href="<?php echo base_url();?>/assets/resume/<?php echo $cpm['0']['upload_doc'];?>">View</a>
</div>
</div>
     
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Registration Score</label>
 <input type="text" name="reg_score" id="reg_score" value="<?php echo $cpm['0']['reg_score'];?>"  placeholder="Enter registration score" class="form-control aa" readonly />
</div>
     
                  </div>
                   <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Log In Info PNP</label>
 <input type="text" name="log_in_info" id="log_in_info"  value="<?php echo $cpm['0']['log_in_info_pnp'];?>" placeholder="Enter log in info PNP" class="form-control aa" readonly    />
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " id="4" style="margin-top:1px;">
            <div class="right-side">
              <div class="content">
                <h2 >Invitation Received</h2>
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
 <input type="text" name="invitation_date_tantative" id="invitation_date_tantative" class="form-control aa" readonly placeholder="Enter tentative submission date" value="<?php echo $cpm['0']['invitation_date_tantative'];?>" readonly=""    />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName"> Final Submission Date  </label>
 <input type="text" name="invitation_date_final" id="invitation_date_final" value="<?php echo $cpm['0']['invitation_date_final'];?>" class="form-control aa" readonly readonly=""   placeholder="Enter final submission date "  />
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " id="310" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Invitation Withdrawn</h2>
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
 <textarea name="invit_withdrawn_reason" id="invit_withdrawn_reason"   placeholder="Enter reason" class="form-control aa" readonly><?php echo $cpm['0']['invit_withdrawn_reason'];?> </textarea>  
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " id="5" style="margin-top:1px;">
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
 <label class="small mb-1" for="inputFirstName">Date Of Application Submitted </label>
 <input type="text" id="app_sub_date" name="app_sub_date" value="<?php echo $cpm['0']['app_sub_date'];?>" class="form-control aa" readonly placeholder="Enter date of application submitted"  readonly=""    />
</div>
     
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                      <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Application Fee Payment Mode</label><br>
 <input type="radio" name="fee" id="fee" <?php if($cpm['0']['fee']=='td_credit_card'){ echo "checked=checked";}  ?> value="td_credit_card" onclick="own_card()" />Td Credit Card<br>
 <input type="radio" name="fee" id="fee1" <?php if($cpm['0']['fee']=='client'){ echo "checked=checked";}  ?> value="client" onclick="client_card()" />Client card
</div>
     
                  </div>

                   <div class="col-lg-6 col-md-6 col-sm-3 mb-6 " id="own">
                    <div class="col-lg-6 col-md-6 col-sm-3 mb-6 ">
                      <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Mode Of Payment By Client</label><br>
 <input  class="form-control aa" readonly  name="exp_date_to_apply" id="exp_date_to_apply"  type="text" placeholder="Enter information request sent on" value="<?php echo $cpm['0']['mode_client_payment'];?>"  readonly="readonly"  />
</div>
     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Confirm With</label><br>
 <input type="text" name="confirm_with" id="confirm_with" value="<?php echo $cpm['0']['confirm_with'];?>"  placeholder="Enter confirm with" class="form-control aa" readonly>
  
</div>
  </div>


      <div class="col-lg-6 col-md-6 col-sm-3 mb-6">
                      <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date of Payment Received</label><br>
 <input type="text" name="date_of_payment_recive" value="<?php echo $cpm['0']['date_of_payment_recive'];?>" id="date_of_payment_recive" class="form-control aa" readonly readonly="" placeholder="Enter date of payment received">
  
</div>
<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Amount</label><br>
 <input type="text" name="amount" id="amount" value="<?php echo $cpm['0']['amount'];?>" placeholder="Enter amount" class="form-control aa" readonly>
  
</div>
  </div>   
                  </div>


                  <div class="col-lg-6 col-md-6 col-sm-3 mb-6 " id="client">
       

<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's</label>
 <textarea name="client_card_note" id="client_card_note"   placeholder="Enter reason" class="form-control aa" readonly><?php echo $cpm['0']['client_card_note'];?></textarea>  
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " id="6"style="margin-top:1px;">
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
 <input type="text" name="adr_deadline" id="adr_deadline" class="form-control aa" readonly readonly=""   placeholder="Enter adr deadline"  value="<?php echo $cpm['0']['adr_deadline'];?>" />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName"> Adr Note's</label>
 <textarea name="adr_note" id="adr_note" placeholder="Enter adr notes" value="<?php echo $cpm['0']['adr_note'];?>" class="form-control aa" readonly></textarea>  
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="7" style="margin-top:1px;">
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

  <br>
  <a target="_blank" href="<?php echo base_url();?>/assets/resume/<?php echo $cpm['0']['approval_doc'];?>">View</a>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="8" style="margin-top:1px;">
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
 <TEXTAREA   name="nomination_refused_reason" id="nomination_refused_reason" value="<?php echo $cpm['0']['nomination_refused_reason'];?>"  placeholder="Enter reason" class="form-control aa" readonly ></TEXTAREA>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="9" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Federal Application Sent</h2>
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
 <input type="text" name="app_sent_date"  id="app_sent_date" value="<?php echo $cpm['0']['app_sent_date'];?>"   class="form-control aa" readonly placeholder="Enter application sent date" readonly=""   />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Courier Receipt Slip </label>
 
   <br>
  <a target="_blank" href="<?php echo base_url();?>/assets/resume/<?php echo $cpm['0']['courier_receipt_slip'];?>">View</a>


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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="311" style="margin-top:1px;">
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
 <input type="text" name="aor_app_number" id="aor_app_number"  value="<?php echo $cpm['0']['aor_app_number'];?>"class="form-control aa" readonly  placeholder="Enter application number"   />
</div>
     
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName"> Application Date</label>
 <input type="text" name="aor_app_date"  id="aor_app_date" value="<?php echo $cpm['0']['aor_app_date'];?>" placeholder="Enter application date" class="form-control aa" readonly   readonly=""  />
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
                     <div class="form-group " id="online" >
 <label class="small mb-1" for="inputFirstName">Online Detail</label>
 <textarea class="form-control aa" readonly  name="aor_online_detail" id="aor_online_detail" placeholder="Enter online detail" ><?php echo $cpm['0']['aor_online_detail'];?></textarea>
</div>
     
     <div class="form-group " id="reason" >
 <label class="small mb-1" for="inputFirstName">Reason</label>
 <textarea class="form-control aa" readonly  name="aor_linkreason" id="aor_linkreason"   placeholder="Enter why not done online link" > <?php echo $cpm['0']['aor_linkreason'];?></textarea>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="10" style="margin-top:1px;">
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
 <input  class="form-control aa" readonly name="adr_submission_date"  id="adr_submission_date" class="form-control aa" readonly  placeholder="Enter submission date" readonly="" value="<?php echo $cpm['0']['adr_submission_date'];?>"   />
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="11" style="margin-top:1px;">
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
 <input type="text" name="date_for_medical" id="date_for_medical"  value="<?php echo $cpm['0']['date_for_medical'];?>" placeholder="Enter date for medical"  class="form-control aa" readonly  readonly=""  />
</div>
     
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date For Medical Tentative </label>
 <input type="text" name="date_for_medical_ten" id="date_for_medical_ten" placeholder="Enter date for medical tentative" class="form-control aa" readonly value="<?php echo $cpm['0']['date_for_medical_ten'];?>" readonly=""  />
</div> 
     
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">

                    <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's</label>
 <textarea name="medical_note" id="medical_note"  placeholder="Enter note's" class="form-control aa" readonly ><?php echo $cpm['0']['medical_note'];?></textarea>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="312" style="margin-top:1px;">
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
 <input type="text" name="medical_submit" id="medical_submit" value="<?php echo $cpm['0']['medical_submit'];?>" placeholder="Enter date for medical submit" class="form-control aa" readonly readonly="" value=""   />
</div>
     
                  </div>
                  

                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">

                    <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's</label>
 <textarea name="medical_sub_note" id="medical_sub_note" class="form-control aa" readonly  placeholder="Enter note's"  ><?php echo $cpm['0']['medical_sub_note'];?></textarea>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="12" style="margin-top:1px;">
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
 <input type="text" name="pp_deadline" id="pp_deadline" value="<?php echo $cpm['0']['pp_deadline'];?>" placeholder="PP submition deadline" class="form-control aa" readonly  readonly=""     />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">PP submition Tentative</label>
 <input type="text" name="pp_tentative" id="pp_tentative" value="<?php echo $cpm['0']['pp_tentative'];?>" class="form-control aa" readonly placeholder="Enter PP submition tentative"   readonly=""  />
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="13" style="margin-top:1px;">
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
 <textarea name="approve_note" id="approve_note" class="form-control aa" readonly  placeholder="Enter note" ><?php echo $cpm['0']['approve_note'];?></textarea>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="14" style="margin-top:1px;">
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
 <textarea name="refused_note" id="refused_note" class="form-control aa" readonly placeholder="Enter Refused Note's" ><?php echo $cpm['0']['refused_note'];?></textarea>
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
 

                        <br><?php echo $vm['insert_on'];?>
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


    </body>
</html>
