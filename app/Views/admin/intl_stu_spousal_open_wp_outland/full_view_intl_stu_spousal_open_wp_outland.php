
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
                        <h1 class="mt-4">Full View intl stu spousal open wp</h1>
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


 <form id="myform" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>/Siaportal/edit_intl_stu_spousal_open_wp_outland/<?php echo $cpm['0']['category'];?>/<?php echo $cpm['0']['id'];?>/<?php echo $cpm['0']['type'];?>"> 

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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " id="45" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Application in Process</h2>
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
 <input  class="form-control aa" readonly  name="app_recv" id="app_recv"  type="text" placeholder="Enter date of application received" value="<?php echo $cpm['0']['app_recv'];?>"  readonly="readonly"  />
</div>
     
             <div class="form-group">
 <label class="small mb-1" for="inputFirstName">College Transfer Required </label><br>
 <input type="radio" name="c_transfer" id="c_transfer" <?php if($cpm['0']['c_transfer']=='yes'){ echo "checked=checked";}  ?> value="yes" onclick="college()"/>Yes<br>
 <input type="radio" name="c_transfer" id="c_transfer1" <?php if($cpm['0']['c_transfer']=='no'){ echo "checked=checked";}  ?> value="no"  onclick="college1()"/>No
</div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName"> Assign Team Member</label>
 <input  class="form-control aa" readonly   placeholder="Enter date of application received" value="<?php echo $team['0']['firstname'];?> <?php echo $team['0']['lastname'];?>"  readonly="readonly"  />

</div>
 <div class="form-group  " id="1">
 <label class="small mb-1" for="inputFirstName">Document Received</label>
 <input  class="form-control aa" readonly  name="doc_rec" id="doc_rec"  type="text" placeholder="Enter Document Received" value="<?php  echo $dddd= $cpm['0']['doc_rec']; ?>"  readonly="readonly"  />
</div>
     
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                    <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Accepted Date Of Submission</label>
 <input  class="form-control aa" readonly  name="exp_date_to_apply" id="exp_date_to_apply"  type="text" placeholder="Enter Expected Date to apply" value="<?php echo $cpm['0']['exp_date_to_apply'];?>"   readonly="readonly"  />
</div>

 <div class="form-group " id="2">
 <label class="small mb-1" for="inputFirstName">Assigned team member for college transfer</label>
 <input  class="form-control aa" readonly  name="team_college_transfer" id="team_college_transfer"  type="text" placeholder="Enter Assigned team member for college transfer" value="<?php  echo $dddd= $cpm['0']['team_college_transfer']; ?>"    />
</div>
     
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                    <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Study Permit Expiry Date</label>
 <input  class="form-control aa" readonly  name="study_permit_exp" id="study_permit_exp"  type="text" placeholder="Enter study permit expiry date" value="<?php echo $cpm['0']['study_permit_exp'];?>"  readonly="readonly"  />
</div>
<div class="form-group " id="3">
 <label class="small mb-1" for="inputFirstName">date of document sent to assigned team member</label>
 <input  class="form-control aa" readonly  name="date_doc_to_team" id="date_doc_to_team"  type="text" placeholder="Enter Expected Date to apply" value="<?php  echo $dddd= $cpm['0']['date_doc_to_team']; ?>"  readonly="readonly"  />
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



  
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " id="56" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Documents Awaiting for Submission</h2>
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
 <label class="small mb-1" for="inputFirstName">Document Requested Date</label>
 <input  class="form-control aa" readonly  name="doc_req_date" id="doc_req_date"  type="text" placeholder="Enter document requested date"  value="<?php echo $cpm['0']['doc_req_date'];?>"     readonly="readonly"  />
</div>
     
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                         <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Fee Received Or Pending</label><br>
 <input type="radio" name="feerp" id="fee_rp" <?php if($cpm['0']['feerp']=='receiced'){ echo "checked=checked";}  ?> value="receiced" onclick="fees()" />Receiced<br>
 <input type="radio" name="feerp" id="fee_rp1" <?php if($cpm['0']['feerp']=='pending'){ echo "checked=checked";}  ?> value="pending" onclick="fees1()" />Pending
</div>
     
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4 " id="ffee">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Amount</label>
 <input  class="form-control aa" readonly  name="fee_amount" id="fee_amount"  type="text" placeholder="Enter Amount"    value="<?php echo $cpm['0']['fee_amount'];?>"  />
</div>
<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Fee Paid Invoice Number</label>
 <input  class="form-control aa" readonly  name="fee_inv_no" id="fee_inv_no"  type="text" placeholder="Enter Fee paid invoice number"    value="<?php echo $cpm['0']['fee_inv_no'];?>"  />
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " id="57" style="margin-top:1px;">
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
 <input type="text" id="app_sub_date" name="app_sub_date" class="form-control aa" readonly placeholder="Application submitted Date" value="<?php echo $cpm['0']['app_sub_date'];?>"/>
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
 <label class="small mb-1" for="inputFirstName">Mode of payment by client</label><br>
 <input  class="form-control aa" readonly  name="exp_date_to_apply" id="exp_date_to_apply"  type="text" placeholder="Enter information request sent on" value="<?php echo $cpm['0']['mode_client_payment'];?>"  readonly="readonly"  />
</div>
     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Confirm With</label><br>
 <input type="text" name="confirm_with" id="confirm_with"  placeholder="Enter confirm with" class="form-control aa" readonly>
  
</div>
  </div>


      <div class="col-lg-6 col-md-6 col-sm-3 mb-6">
                      <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date of Payment Recive</label><br>
  <input type="text" name="date_of_payment_recive" id="date_of_payment_recive" class="form-control aa" readonly readonly=""  value="<?php echo $cpm['0']['date_of_payment_recive'];?>" placeholder="Enter Date of Payment received">
  
</div>
<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Amount</label><br>
 <input type="text" name="amount" id="anount" value="<?php echo $cpm['0']['amount'];?>"  placeholder="Enter Amount" class="form-control aa" readonly>
  
</div>
  </div>  
                  </div>


                 <div class="col-lg-6 col-md-6 col-sm-3 mb-6 " id="client">
             <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's</label>
 <textarea name="client_card_note" id="client_card_note"  placeholder="Enter reason" class="form-control aa" readonly>?php echo $cpm['0']['client_card_note'];?></textarea>  
</div>
                  </div>

                  
                            

                             </div>
                          </div>



                          <!------>
                                 <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          
                

                   <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
                    <label class="small mb-1" for="inputFirstName">Fee Receipt Upload</label>
                    <input type="file" name="fee_receipt" id="fee_receipt">
                     <input type="hidden" name="fee_receipt_old" id="fee_receipt_old" value="<?php echo $cpm['0']['fee_receipt']; ?>">
</div>

                    </div>


                   <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
       <div class="form-group">
        <label class="small mb-1" for="inputFirstName">Submission Confirmation Upload</label>
                    <input type="file" name="sub_confim" id="sub_confim">
                    <input type="hidden" name="sub_confim_old" id="sub_confim_old" value="<?php echo $cpm['0']['sub_confim']; ?>">
</div>

                    </div>

                     <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                    

                    </div>
                     <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                   

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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " id="58"style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Biometric Requested</h2>
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
<label class="small mb-1" for="inputFirstName">Date Of Biometric received</label><!--date line-->
 <input type="text" name="date_bio_reciv" id="date_bio_reciv" class="form-control aa" readonly readonly=""   placeholder="Enter Date Of Biometric received" value="<?php echo $cpm['0']['date_bio_reciv'];?>"  />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                       <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date of Biometric sent to client</label>
 <input type="text" name="date_bio_sent" id="date_bio_sent" placeholder="Enter Date of Biometric sent to client" class="form-control aa" readonlyreadonly="" value="<?php echo $cpm['0']['date_bio_sent'];?>">
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="59" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Biometric Completed</h2>
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
 <label class="small mb-1" for="inputFirstName">Date Of Biometric completed</label>
<input type="text" class="form-control aa" readonly name="date_bio_comp"  id="date_bio_comp" placeholder="Date Of Biometric completed"  readonly="" value="<?php echo $cpm['0']['date_bio_comp'];?>"    />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's</label>
  <textarea class="form-control aa" readonly name="bio_com_note"  id="bio_com_note" ><?php echo $cpm['0']['bio_com_note'];?>"</textarea>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="60" style="margin-top:1px;">
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
 <input type="text"   name="date_int_req_rec" id="date_int_req_rec"  placeholder="Enter Date Of Request Received" class="form-control aa" readonly readonly="" value="<?php echo $cpm['0']['date_int_req_rec'];?>" >
</div>
     
     
                  </div>
                  

               
                   <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                   <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date Of Request Sent To Client</label>
<input type="text"   name="date_int_sent_client" id="date_int_sent_client"  placeholder="Enter Date Of Request Sent To Client" class="form-control aa" readonly readonly="" value="<?php echo $cpm['0']['date_int_sent_client'];?>" >
</div> 
     
                  </div>
                     <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                    <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Request upload</label>
 <input type="file"  name="int_req_upload" id="int_req_upload"   >
  <input type="hidden" name="int_req_upload_old" id="int_req_upload_old" value="<?php echo $cpm['0']['int_req_upload']; ?>">
     
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="61" style="margin-top:1px;">
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
 <input type="text" name="date_int_req_com"  id="date_int_req_com"   class="form-control aa" readonly placeholder="Enter Application Sent Date" readonly=""  value="<?php echo $cpm['0']['date_int_req_com'];?>"  />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                   <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Request Submitted To Ircc</label>
 <input type="file" name="int_sub_to_ircc" id="int_sub_to_ircc"      />
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="62" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 > Medical Request Received</h2>
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
 <label class="small mb-1" for="inputFirstName">Date For Medical</label>
  <input type="text" name="date_for_medical" id="date_for_medical"  placeholder="Enter date for medical"  class="form-control aa" readonly  readonly=""  value="<?php echo $cpm['0']['date_for_medical'];?>" />
</div>
     
                  </div>
                  

                  
                   <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
       
     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Medical Upload</label>
 <input type="file" name="medical_submit" id="medical_submit"    />
  <input type="hidden" name="medical_submit_old" id="medical_submit_old" value="<?php echo $cpm['0']['medical_submit']; ?>">
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="63" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 > Passport Request Received</h2>
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
 <label class="small mb-1" for="inputFirstName">Passport Request date</label>
 <input type="text" name="pass_req_date" id="pass_req_date" class="form-control aa" readonly  placeholder="Enter Application Number"   />
</div>
     
                  </div>
                  

                  
                   <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
             <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Passport Upload</label>
 <input type="file" name="passport_upload" id="passport_upload"    />
 <input type="hidden" name="passport_upload_old" id="passport_upload_old" value="">

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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="64" style="margin-top:1px;">
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
 <input type="text" name="date_work_permit" id="date_work_permit"  placeholder="Enter Date Of Work Permit  Received Until"  class="form-control aa" readonly  readonly=""  />
</div>
     
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
               <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Approval Letter Upload</label>
 <input type="file" name="approval_letter" id="approval_letter"  />
 <input type="hidden" name="approval_letter_old" id="approval_letter_old"  value="<?php echo $cpm['0']['approval_letter'];?>"  />

</div> 
     
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
    <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's</label>
 <textarea name="approve_note" id="approve_note" placeholder="Enter Note's" class="form-control aa" readonly ></textarea>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="65" style="margin-top:1px;">
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
 <input  class="form-control aa" readonly name="refusal_date"  id="refusal_date" class="form-control aa" readonly  placeholder="Enter Date Of Refusal"  readonly=""   />
</div>
     
                  </div>
                

                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                                        <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Upload Refusal Letter </label>
 <input  type="file" name="refusal_letter"  id="refusal_letter" class="form-control aa" readonly  placeholder="Upload Refusal Letter"    />
 <input  type="hidden" name="refusal_letter_old"  id="refusal_letter_old" value="<?php echo $cpm['0']['refusal_letter'];?>"   />


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
