
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

                        <h1 class="mt-4">Edit Worker Spousal Open Wp Inland</h1>
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


 <form id="myform" method="post" action="<?php echo base_url();?>/Siaportal/edit_bc_pnp_int_grd/<?php echo $cpm['0']['category'];?>/<?php echo $cpm['0']['id'];?>"> 

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

      <?php 
 $app_st=$cpm['0']['application_status'];
//exit();

        if($app_st==35){ ?>
    
       
    
        <!--option value="35">Ready to apply</option-->  
        
        <option value="77">Application in Process</option>
         <?php } else if ($cpm['0']['application_status']==77) { ?> 
        <option value="78">Documents Awaiting for Submission</option>
         <?php } else if ($cpm['0']['application_status']==78) { ?> 
        <option value="79">Ready to Apply</option>
         <?php } else if ($cpm['0']['application_status']==79) { ?> 
        <option value="80">Application Submitted</option>    
         <?php } else if ($cpm['0']['application_status']==80) { ?>         
        <option value="81">Biometric Requested</option>  
         <?php } else if ($cpm['0']['application_status']==81) { ?> 
        <option value="82">Biometric Completed</option> 
         <?php } else if ($cpm['0']['application_status']==82) { ?>          
        <option value="83">Interview/ADR Requested</option> 
         <?php } else if ($cpm['0']['application_status']==83) { ?>            
        <option value="84">Interview/ADR Completed</option>
         <?php } else if ($cpm['0']['application_status']==84) { ?> 
        <option value="85">Approved</option> 
        <option value="86">Refused</option> 
       
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


                           <!--section Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide " id="77" style="margin-top:1px;">
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
 <label class="small mb-1" for="inputFirstName">date of application received</label>
 <input  class="form-control"  ame="exp_date_to_apply" id="datepicker"  type="text" placeholder="Enter Expected Date to apply" value="<?php  echo $dddd= $cpm['0']['exp_date_to_apply']; ?>"  readonly="readonly"  />
</div>
     
             <div class="form-group">
 <label class="small mb-1" for="inputFirstName">college transfer required </label><br>
 <input type="radio" name="c_transfer" id="c_transfer" value="yes" onclick="college()"/>Yes<br>
 <input type="radio" name="c_transfer" id="c_transfer1" value="no"  onclick="college1()"/>No
</div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
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
 <div class="form-group hide " id="1">
 <label class="small mb-1" for="inputFirstName">Document Received</label>
 <input  class="form-control"  ame="exp_date_to_apply" id="datepicker"  type="text" placeholder="Enter Expected Date to apply" value="<?php  echo $dddd= $cpm['0']['exp_date_to_apply']; ?>"  readonly="readonly"  />
</div>
     
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">accepted date of submission</label>
 <input  class="form-control"  ame="exp_date_to_apply" id="datepicker"  type="text" placeholder="Enter Expected Date to apply" value="<?php  echo $dddd= $cpm['0']['exp_date_to_apply']; ?>"  readonly="readonly"  />
</div>

 <div class="form-group hide" id="2">
 <label class="small mb-1" for="inputFirstName">assigned team member for college transfer</label>
 <input  class="form-control"  ame="exp_date_to_apply" id="datepicker"  type="text" placeholder="Enter Expected Date to apply" value="<?php  echo $dddd= $cpm['0']['exp_date_to_apply']; ?>"  readonly="readonly"  />
</div>
     
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">study permit expiry date</label>
 <input  class="form-control"  ame="exp_date_to_apply" id="datepicker"  type="text" placeholder="Enter Expected Date to apply" value="<?php  echo $dddd= $cpm['0']['exp_date_to_apply']; ?>"  readonly="readonly"  />
</div>
<div class="form-group hide" id="3">
 <label class="small mb-1" for="inputFirstName">date of document sent to assigned team member</label>
 <input  class="form-control"  ame="exp_date_to_apply" id="datepicker"  type="text" placeholder="Enter Expected Date to apply" value="<?php  echo $dddd= $cpm['0']['exp_date_to_apply']; ?>"  readonly="readonly"  />
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



  
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide " id="78" style="margin-top:1px;">
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
 <label class="small mb-1" for="inputFirstName">document requested date</label>
 <input  class="form-control"  ame="exp_date_to_apply" id="datepicker"  type="text" placeholder="Enter Expected Date to apply" value="<?php  echo $dddd= $cpm['0']['exp_date_to_apply']; ?>"  readonly="readonly"  />
</div>
     
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                         <div class="form-group">
 <label class="small mb-1" for="inputFirstName">fee received or pending</label><br>
 <input type="radio" name="fee" id="fee_rp" value="receiced" onclick="fees()" />Receiced<br>
 <input type="radio" name="fee" id="fee_rp1" value="pending" onclick="fees1()" />Pending
</div>
     
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4 hide" id="ffee">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Amount</label>
 <input  class="form-control"  ame="exp_date_to_apply" id="datepicker"  type="text" placeholder="Enter Expected Date to apply" value="<?php  echo $dddd= $cpm['0']['exp_date_to_apply']; ?>"  readonly="readonly"  />
</div>
<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Fee paid invoice number</label>
 <input  class="form-control"  ame="exp_date_to_apply" id="datepicker"  type="text" placeholder="Enter Expected Date to apply" value="<?php  echo $dddd= $cpm['0']['exp_date_to_apply']; ?>"  readonly="readonly"  />
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

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide " id="79" style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >
                <h2 >Ready to Apply</h2>
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
 <label class="small mb-1" for="inputFirstName">document requested date</label>
 <input  class="form-control"  ame="exp_date_to_apply" id="datepicker"  type="text" placeholder="Enter Expected Date to apply" value="<?php  echo $dddd= $cpm['0']['exp_date_to_apply']; ?>"  readonly="readonly"  />
</div>
     
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                         <div class="form-group">
 <label class="small mb-1" for="inputFirstName">fee received or pending</label><br>
 <input type="radio" name="fee" id="fee_rp" value="receiced" onclick="fees()" />Receiced<br>
 <input type="radio" name="fee" id="fee_rp1" value="pending" onclick="fees1()" />Pending
</div>
     
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4 hide" id="ffee">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Amount</label>
 <input  class="form-control"  ame="exp_date_to_apply" id="datepicker"  type="text" placeholder="Enter Expected Date to apply" value="<?php  echo $dddd= $cpm['0']['exp_date_to_apply']; ?>"  readonly="readonly"  />
</div>
<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Fee paid invoice number</label>
 <input  class="form-control"  ame="exp_date_to_apply" id="datepicker"  type="text" placeholder="Enter Expected Date to apply" value="<?php  echo $dddd= $cpm['0']['exp_date_to_apply']; ?>"  readonly="readonly"  />
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide " id="80" style="margin-top:1px;">
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
 <label class="small mb-1" for="inputFirstName">Date of submission</label>
 <textarea id="app_sub_date" name="app_sub_date" class="form-control" placeholder="Application submitted Date" ></textarea>
</div>
     
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                      <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Application Fee Payment Mode</label><br>
 <input type="radio" name="fee" id="fee" value="td_credit_card" onclick="own_card()" />Td Credit Card<br>
 <input type="radio" name="fee" id="fee1" value="client" onclick="client_card()" />Client card
</div>
     
                  </div>

                   <div class="col-lg-6 col-md-6 col-sm-3 mb-6 hide" id="own">
                    <div class="col-lg-6 col-md-6 col-sm-3 mb-6 ">
                      <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Mode of payment by client</label><br>
 <select class="form-control" name="mode_client_payment">
   <option value="">Select Mode of Payment</option>
   <option value="net_backing">Net Backing</option>
   <option value="e_transfar">E-transfar</option>
 </select>
</div>
     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Confirm With</label><br>
 <input type="text" name="cofirm_with" id="confirm_with"  placeholder="Enter Confirm With" class="form-control">
  
</div>
  </div>


      <div class="col-lg-6 col-md-6 col-sm-3 mb-6">
                      <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date of Payment Recive</label><br>
 <input type="text" name="date_of_payment_recive" id="date_of_payment_recive" class="form-control" readonly="" placeholder="Enter Date of Payment received">
  
</div>
<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Amount</label><br>
 <input type="text" name="amount" id="anount" placeholder="Enter Amount" class="form-control">
  
</div>
  </div>   
                  </div>


                  <div class="col-lg-6 col-md-6 col-sm-3 mb-6 hide" id="client">
                      <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's</label><br>
<textarea class="form-control" name="client_card_note" id="client_card_note" placeholder="Enter Client Note's if any"> </textarea>
</div>
     
                  </div>

                  
                            

                             </div>
                          </div>



                          <!------>
                                 <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          
                

                   <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                    <label class="small mb-1" for="inputFirstName">fee receipt upload</label>
                    <input type="file" name="" id="">

                    </div>


                   <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
        <label class="small mb-1" for="inputFirstName">submission confirmation upload</label>
                    <input type="file" name="" id="">

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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide " id="81"style="margin-top:1px;">
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
 <input type="text" name="adr_deadline" id="adr_deadline" class="form-control" readonly=""   placeholder="Enter Adr deadline"  />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Date of Biometric sent to client</label>
 <textarea name="adr_note" id="adr_note" placeholder="Enter Adr Notes" class="form-control"></textarea>  
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="82" style="margin-top:1px;">
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
 <input type="text" class="form-control" name="approval_doc"  id="approval_doc"      />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                    <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's</label>
 <textarea class="form-control" name="approval_doc"  id="approval_doc" ></textarea>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="83" style="margin-top:1px;">
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
 <label class="small mb-1" for="inputFirstName">date of request received</label>
 <TEXTAREA   name="nomination_refused_reason" id="nomination_refused_reason"  placeholder="Enter Nomination refused Reason" class="form-control" ></TEXTAREA>
</div>
     
                  </div>
                  

               
                   <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">date of request sent to client</label>
 <TEXTAREA   name="nomination_refused_reason" id="nomination_refused_reason"  placeholder="Enter Nomination refused Reason" class="form-control" ></TEXTAREA>
</div> 
     
                  </div>
                     <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Request upload</label>
 <input type="file"  name="nomination_refused_reason" id="nomination_refused_reason"  placeholder="Enter Nomination refused Reason"  >
     
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="84" style="margin-top:1px;">
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
 <label class="small mb-1" for="inputFirstName">request completed date</label>
 <input type="text" name="app_sent_date"  id="app_sent_date"   class="form-control" placeholder="Enter Application Sent Date" readonly=""   />
</div>
     
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">request submitted to ircc</label>
 <input type="file" name="courier_receipt_slip" id=""   value=""   />
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="85" style="margin-top:1px;">
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
 <label class="small mb-1" for="inputFirstName">approval Date  </label>
 <input type="text" name="date_for_medical" id="date_for_medical"  placeholder="Enter Date for Medical"  class="form-control"  readonly=""  />
</div>
     
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">approval letter Upload</label>
 <input type="file" name="date_for_medical_ten" id="date_for_medical_ten" placeholder="Enter Date For Medical Tentative" class="form-control"   readonly=""  />
</div> 
     
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">

                    <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's</label>
 <textarea name="medical_note" id="medical_note" placeholder="Enter Note's" class="form-control" ></textarea>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="86" style="margin-top:1px;">
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
 <label class="small mb-1" for="inputFirstName">refusal date</label>
 <input  class="form-control" name="adr_submission_date"  id="adr_submission_date" class="form-control" value="" placeholder="Enter Date of Submission" readonly=""   />
</div>
     
                  </div>
                

                  <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                                <div class="form-group">
 <label class="small mb-1" for="inputFirstName">refusal letter upload</label>
 <input  type="file" name="adr_submission_date"  id="adr_submission_date" class="form-control" value="" placeholder="Enter Date of Submission" readonly=""   />
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
                          
                     
        

         </form>       





   

      


                           
                      
                        
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

  <script>
    function fees(){
       var frp =document.getElementById("fee_rp").value;
//alert(frp);
    if(frp=='receiced'){
$( "#ffee" ).removeClass("hide").addClass("show" );
    }
    }

    function fees1(){
       var frp1 =document.getElementById("fee_rp1").value;
//alert(frp);
    if(frp1=='pending'){
$( "#ffee" ).removeClass("show").addClass("hide" );
    }
    }
  </script>

<script>
  function college(){
    var ct =document.getElementById("c_transfer").value;
//alert(ct);
    if(ct=='yes'){
$( "#1" ).removeClass("hide").addClass("show" );
$( "#2" ).removeClass("hide" ).addClass( "show" );
$( "#3" ).removeClass("hide" ).addClass( "show" );

    }}
    function college1(){
      var ctt =document.getElementById("c_transfer1").value;

    if(ctt=='no'){
$( "#1" ).removeClass("show").addClass("hide");
$( "#2" ).removeClass("show" ).addClass("hide");
$( "#3" ).removeClass("show" ).addClass("hide");

    }

  }
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

if(app_status=='77'){  
$( "#77" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='78'){
$( "#77" ).removeClass( "show" ).addClass( "hide" );
$( "#78" ).removeClass( "hide" ).addClass( "show" );

}
else if(app_status=='79'){

$( "#77" ).removeClass( "show" ).addClass( "hide" );
$( "#78" ).removeClass( "show" ).addClass( "hide" );

$( "#79" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='80'){

$( "#77" ).removeClass( "show" ).addClass( "hide" );
$( "#78" ).removeClass( "show" ).addClass( "hide" );
$( "#79" ).removeClass( "show" ).addClass( "hide" );
$( "#80" ).removeClass( "hide" ).addClass( "show" );
}

else if(app_status=='81'){

$( "#77" ).removeClass( "show" ).addClass( "hide" );
$( "#78" ).removeClass( "show" ).addClass( "hide" );
$( "#79" ).removeClass( "show" ).addClass( "hide" );
$( "#80" ).removeClass( "show" ).addClass( "hide" );
$( "#81" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='82'){

$( "#77" ).removeClass( "show" ).addClass( "hide" );
$( "#78" ).removeClass( "show" ).addClass( "hide" );
$( "#79" ).removeClass( "show" ).addClass( "hide" );
$( "#80" ).removeClass( "show" ).addClass( "hide" );
$( "#81" ).removeClass( "show" ).addClass( "hide" );
$( "#82" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='83'){
$( "#77" ).removeClass( "show" ).addClass( "hide" );
$( "#78" ).removeClass( "show" ).addClass( "hide" );
$( "#79" ).removeClass( "show" ).addClass( "hide" );
$( "#80" ).removeClass( "show" ).addClass( "hide" );
$( "#81" ).removeClass( "show" ).addClass( "hide" );
$( "#82" ).removeClass( "show" ).addClass( "hide" );
$( "#83" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='84'){
$( "#77" ).removeClass( "show" ).addClass( "hide" );
$( "#78" ).removeClass( "show" ).addClass( "hide" );
$( "#79" ).removeClass( "show" ).addClass( "hide" );
$( "#80" ).removeClass( "show" ).addClass( "hide" );
$( "#81" ).removeClass( "show" ).addClass( "hide" );
$( "#82" ).removeClass( "show" ).addClass( "hide" );  
$( "#83" ).removeClass( "show" ).addClass( "hide" );
$( "#84" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='85'){
  $( "#77" ).removeClass( "show" ).addClass( "hide" );
  $( "#78" ).removeClass( "show" ).addClass( "hide" );
  $( "#79" ).removeClass( "show" ).addClass( "hide" );
  $( "#80" ).removeClass( "show" ).addClass( "hide" );
  $( "#81" ).removeClass( "show" ).addClass( "hide" );
  $( "#82" ).removeClass( "show" ).addClass( "hide" );
  $( "#83" ).removeClass( "show" ).addClass( "hide" );
  $( "#84" ).removeClass( "show" ).addClass( "hide" );
  $( "#85" ).removeClass( "hide" ).addClass( "show" );
}
else if(app_status=='86'){
$( "#77" ).removeClass( "show" ).addClass( "hide" );
$( "#78" ).removeClass( "show" ).addClass( "hide" );
$( "#79" ).removeClass( "show" ).addClass( "hide" );
$( "#80" ).removeClass( "show" ).addClass( "hide" );
$( "#81" ).removeClass( "show" ).addClass( "hide" );
$( "#82" ).removeClass( "show" ).addClass( "hide" );
$( "#83" ).removeClass( "show" ).addClass( "hide" );
$( "#84" ).removeClass( "show" ).addClass( "hide" );
$( "#85" ).removeClass( "show" ).addClass( "hide" );
$( "#86" ).removeClass( "hide" ).addClass( "show" );
}


    //alert(app_status);
  }
</script>



  <script>
  $( function() {
    $( "#datepicker" ).datepicker({

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
