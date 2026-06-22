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
                        <h1 class="mt-4">Edit FSW na</h1>
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


 <form id="myform1" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>/FSW_na/edit_fsw_na_new/<?php echo $cpm['0']['category'];?>/<?php echo $cpm['0']['id'];?>/<?php echo $cpm['0']['type'];?>"> 

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
                               
                                 


 <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputFirstName"> Status</label>
    <select class="form-control" id="application_status"  name="application_status" onchange="show_hide_div()" >

         <option value="<?php echo $cpm['0']['application_status'];?>"><?php echo  $app_st=$cpm['0']['st'];?></option>
        <option value="380">Assign Team Member</option>
        
         <option value="590">Profile in process</option>
          <option value="591">Profile created</option>
           <option value="592">Profile submitted</option> 
        
        
        <option value="381">Application in Process</option>
        <option value="382">Application Submitted</option> 
         <option value="383">Approved</option> 
         <option value="384">Refused</option> 
         


    
    


    

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

 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide " id="380" style="margin-top:1px;">
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide " id="381" style="margin-top:1px;">
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

                          <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date Of Application Received</label>
 <input  class="form-control"  name="app_recv" id="app_recv"  type="text" placeholder="Enter date of application received" value="<?php echo $cpm['0']['app_recv'];?>"  readonly="readonly"  />
</div>
  <div class="form-group">
 <label class="small mb-1" for="inputFirstName">GC KEY username</label>
 <input  class="form-control"  name="gc_username" id="gc_username"  type="text" placeholder="Enter GC KEY username " value="<?php echo $cpm['0']['gc_username'];?>"   />
</div>
     
            
                  </div>
                  
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Information Request Sent On</label>
 <input  class="form-control"  name="exp_date_to_apply" id="exp_date_to_apply"  type="text" placeholder="Enter information request sent on" value="<?php echo $cpm['0']['exp_date_to_apply'];?>"  readonly="readonly"  />
</div>

  <div class="form-group">
 <label class="small mb-1" for="inputFirstName">GC KEY password</label>
 <input  class="form-control"  name="gc_password" id="gc_password"  type="text" placeholder="Enter GC KEY password" value="<?php echo $cpm['0']['gc_password'];?>"    />
</div>
     
                  </div>
      
                  <!--div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Advertisement Cost Invoice Sent On</label>
 <input  class="form-control"  name="study_permit_exp" id="study_permit_exp"  type="text" placeholder="Enter advertisement cost invoice sent on" value="<?php echo $cpm['0']['study_permit_exp'];?>"   readonly="readonly"  />
</div>
     
                  </div-->

                  
                   
                            

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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide " id="382" style="margin-top:1px;">
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
  
  <!--section start-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide " id="590" style="margin-top:1px;">
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
 <label class="small mb-1" for="inputFirstName">GC KEY username</label>
 <input  class="form-control"  name="gc_username" id="gc_username"  type="text" placeholder="Enter GC KEY username " value="<?php echo $cpm['0']['gc_username'];?>"   />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
               <div class="form-group">
 <label class="small mb-1" for="inputFirstName">GC KEY password</label>
 <input  class="form-control"  name="gc_password" id="gc_password"  type="text" placeholder="Enter GC KEY password" value="<?php echo $cpm['0']['gc_password'];?>"    />
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

  <!--section end-->
  
  
  <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide " id="591" style="margin-top:1px;">
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

                  <!--div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Comprehensive Ranking Score remove</label>
 <input type="text" name="reg_score" id="reg_score" value="<?php echo $cpm['0']['reg_score'];?>"  placeholder="Enter registration score" class="form-control" />
</div>
     
                  </div-->
                   <!--div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Log In Info PNP  remove</label>
 <input type="text" name="log_in_info" id="log_in_info"  value="<?php echo $cpm['0']['log_in_info_pnp'];?>" placeholder="Enter log in info PNP" class="form-control"    />
</div>
     
                  </div-->
                            

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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide " id="592" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Profile submitted</h2>
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
 <label class="small mb-1" for="inputFirstName">CRS score</label>
 <input  class="form-control"  name="CRS_score" id="CRS_score"  type="text" placeholder="Enter CRS score" value="<?php echo $cpm['0']['CRS_score'];?>"   />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
               <!--div class="form-group">
 <label class="small mb-1" for="inputFirstName">GC KEY password</label>
 <input  class="form-control"  name="gc_password" id="gc_password"  type="text" placeholder="Enter GC KEY password" value="<?php echo $cpm['0']['gc_password'];?>"    />
</div-->
     
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="384" style="margin-top:1px;">
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
 <input  type="hidden" name="refusal_letter_old"  id="refusal_letter_old" class="form-control"  value="<?php echo $cpm['0']['refusal_letter'] ?>"    />
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="383" style="margin-top:1px;">
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
 <label class="small mb-1" for="inputFirstName">Date Of Approval </label>
 <input type="text" name="date_work_permit" id="date_work_permit"  placeholder="Enter Date Of Approval"  class="form-control" value="<?php echo $cpm['0']['date_work_permit'];?>" readonly=""  />
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

  <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Application Number</h2>
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
 <label class="small mb-1" for="inputFirstName">Application Number</label>
 <input type="text" id="app_number" name="app_number" value="<?php echo $cpm['0']['application_number'];?>"class="form-control" placeholder="Enter application number" >
</div>
     
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                    <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Address Of Immigration Document Received</label> <input type="text" id="add_imm_doc_rec" name="add_imm_doc_rec" class="form-control" placeholder="Address Of Immigration Document Received"  value="<?php echo $cpm['0']['add_imm_doc_rec'];?>">
</div> 
     
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">

                    <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Free Text Note's</label>
 <textarea name="free_text" id="free_text"value="<?php echo $cpm['0']['free_text'];?>" placeholder="Enter Note's" class="form-control" ><?php echo $cpm['0']['free_text'];?></textarea>
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
                required: true,
                date: true, 

            },
            refusal_letter: {
                required: true               
            },

            date_work_permit: {
                required: true,
                date: true,                
            },
            approval_letter: {
                required: true               
            },

                retainer_app: {
                required: true               
            },
             govt_fee: {
                required: true               
            },
            pay_plan: {
                required: true               
            },
            est_app: {
                required: true               
            },
            est_num: {
                required: true               
            },
            tolat_pay_plan: {
                required: true               
            },
            tolat_pay_amount: {
                required: true               
            },

        },
        messages: {

         retainer_app: "Please Select Yes Or No",
          govt_fee: "Please Select Td Sia Or Client own OR Tbd",
          pay_plan: "Please Select Yes Or No",
          est_app: "Please Select Yes Or No",
          est_num: "Please Enter Value",
          tolat_pay_plan: "Please Enter Value",
          tolat_pay_amount: "Please Enter Value",   

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

if(app_status=='380'){  
$( "#380" ).removeClass( "hide" ).addClass( "show" );
$("#note").prop('required',true);
 $("p").css("color", "red");
}
else if(app_status=='381'){
$( "#380" ).removeClass( "show" ).addClass( "hide" );
$( "#381" ).removeClass( "hide" ).addClass( "show" );

}
else if(app_status=='382'){

$( "#380" ).removeClass( "show" ).addClass( "hide" );

$( "#381" ).removeClass( "show" ).addClass( "hide" );

$( "#382" ).removeClass( "hide" ).addClass( "show" );
$("#note").prop('required',true);
 $("p").css("color", "red");
}
else if(app_status=='383'){

$( "#380" ).removeClass( "show" ).addClass( "hide" );
$( "#381" ).removeClass( "show" ).addClass( "hide" );
$( "#382" ).removeClass( "show" ).addClass( "hide" );
$( "#383" ).removeClass( "hide" ).addClass( "show" );
$("#note").prop('required',true);
 $("p").css("color", "red");
}

else if(app_status=='384'){

$( "#380" ).removeClass( "show" ).addClass( "hide" );
$( "#381" ).removeClass( "show" ).addClass( "hide" );
$( "#382" ).removeClass( "show" ).addClass( "hide" );
$( "#383" ).removeClass( "show" ).addClass( "hide" );
$( "#384" ).removeClass( "hide" ).addClass( "show" );
$("#note").prop('required',true);
 $("p").css("color", "red");
}

else if(app_status=='590'){

$( "#380" ).removeClass( "show" ).addClass( "hide" );
$( "#381" ).removeClass( "show" ).addClass( "hide" );
$( "#382" ).removeClass( "show" ).addClass( "hide" );
$( "#383" ).removeClass( "show" ).addClass( "hide" );
$( "#384" ).removeClass( "show" ).addClass( "hide" );
$( "#591" ).removeClass( "show" ).addClass( "hide" );
$( "#592" ).removeClass( "show" ).addClass( "hide" );

$( "#590" ).removeClass( "hide" ).addClass( "show" );
$("#note").prop('required',true);
 $("p").css("color", "red");
}

else if(app_status=='591'){

$( "#380" ).removeClass( "show" ).addClass( "hide" );
$( "#381" ).removeClass( "show" ).addClass( "hide" );
$( "#382" ).removeClass( "show" ).addClass( "hide" );
$( "#383" ).removeClass( "show" ).addClass( "hide" );
$( "#384" ).removeClass( "show" ).addClass( "hide" );
$( "#590" ).removeClass( "show" ).addClass( "hide" );
$( "#592" ).removeClass( "show" ).addClass( "hide" );

$( "#591" ).removeClass( "hide" ).addClass( "show" );
$("#note").prop('required',true);
 $("p").css("color", "red");
}

else if(app_status=='592'){

$( "#380" ).removeClass( "show" ).addClass( "hide" );
$( "#381" ).removeClass( "show" ).addClass( "hide" );
$( "#382" ).removeClass( "show" ).addClass( "hide" );
$( "#383" ).removeClass( "show" ).addClass( "hide" );
$( "#384" ).removeClass( "show" ).addClass( "hide" );
$( "#590" ).removeClass( "show" ).addClass( "hide" );
$( "#591" ).removeClass( "show" ).addClass( "hide" );

$( "#592" ).removeClass( "hide" ).addClass( "show" );
$("#note").prop('required',true);
 $("p").css("color", "red");
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

