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



  


         <SCRIPT language="JavaScript">
function add_status(id,st)
{

 //var st= document.getElementById("pstatus").value;

 //alert(st);

 //alert(st);
 //var st="ffff";
 //var aa="ffff";
  
  //  var hi= confirm("Do you really want to change");
  //  if (hi== true){
       // alert("hi");
       
     $.ajax({   type: "POST",       
          url: '<?php echo base_url().'/Account/add_statusjj';?>/'+id+'/'+st, 
          
          
    success: function(result){ 

    $('st'+id).removeClass('hide');
    $('#st'+id).addClass('show') ; 
      //alert(result);
      
    //$('#status'+id).html('Recode Delet').delay(5000).fadeOut();
    //$('#mark_dropped'+id).hide();
    //$('#l'+id).hide();
    //$('#sub').show();
    
    //$('#ddd'+id).removeClass('hide');
    //$('#ddd'+id).addClass('show') ;
    //.delay(5000).removeClass('show').addClass('hide')
    }         

       } ); 
    
    
    
  //  }else{
      //  alert("Meany!!!");
   // }
}
 </SCRIPT>


   <SCRIPT language="JavaScript">
function p_status(id,st)
{

 
       
     $.ajax({   type: "POST",       
          url: '<?php echo base_url().'/Account/add_pstatus';?>/'+id+'/'+st, 
          
          
    success: function(result){ 

    $('stt'+id).removeClass('hide');
    $('#stt'+id).addClass('show') ; 
      
    }         

       } ); 
    
    
    
  
}
 </SCRIPT>





    </head>
    <body class="sb-nav-fixed">
        <?= view ('account_include/header.php'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                


 <?= view ('account/left_menu.php'); ?>
                 
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">View Account</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        
                       
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Sia Id</th>

                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Type</th>                                             
                                                <th>Status</th>
                                                <th>Account Status</th>
                                                 <th>Payment Status</th>
                                                  <th>Payment total/Recived/Remaining</th>
                                                  

                                                   <th>Edit</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                             <?php foreach($account as $ag){ ?>
                                            <tr>
                                                  <td><?php echo $ag['id'];?></td>
                                                <td><?php echo $ag['siaportal_id'];?></td>
                                                <td><?php echo $ag['cname'];?></td>
                                                <td><?php echo $ag['ct'];?></td>
                                                <td> <?php echo $ag['ty'];?> </td>
                                                <td><?php echo $ag['st'];?></td>
                                                <td>
<label class="hide" id=st<?php echo $ag['id'];?>>Status successful update </label></br><textarea name="account_status" onkeyup="add_status(<?php echo $ag['id'];?>,this.value)" ><?php echo $ag['account_status'];?></textarea></td>
                                                <td>
                                                  <label class="hide" id=stt<?php echo $ag['id'];?>>Status successful update </label></br>
                                                  <select name="payment_status" id="payment_status" onchange="p_status(<?php echo $ag['id'];?>,this.value)">
                                                    <option value="<?php echo $ag['payment_status'];?>"><?php echo $ag['payment_status'];?></option>
                                                     <option value="Fully_paid">Fully paid</option>
                                                      <option value="Partial_paid">Partial paid</option>
                                                       <option value="Droped">Droped</option>
                                                        <option value="In_process">In process</option>

                                                </select></td>
                                                <td>
                                                   <?php echo $tpa= $ag['tolat_pay_amount'];?>/<?php

                                                $p1 = $ag['pay_one'];
                                                $p2 = $ag['pay_two'];
                                                $p3 = $ag['pay_three'];
                                                $p4 = $ag['pay_four'];
                                                $p5 = $ag['pay_five'];
                                                $p6 = $ag['pay_six'];

                                                if($p1=='paid'){
                                                 $pp1= $ag['pay_one_amount'];
                                                }else{
                                                  $pp1='0';
                                                }

                                                 if($p2=='paid'){
                                                 $pp2= $ag['pay_two_amount'];
                                                }else{
                                                  $pp2='0';
                                                }

                                                 if($p3=='paid'){
                                                 $pp3= $ag['pay_three_amount'];
                                                }else{
                                                  $pp3='0';
                                                }
                                                 if($p4=='paid'){
                                                 $pp4= $ag['pay_four_amount'];
                                                }else{
                                                  $pp4='0';
                                                }
                                                 if($p5=='paid'){
                                                 $pp5= $ag['pay_five_amount'];
                                                }else{
                                                  $pp5='0';
                                                }
                                                 if($p6=='paid'){
                                                 $pp6= $ag['pay_six_amount'];
                                                }else{
                                                  $pp6='0';
                                                }
                                                echo $aa=$pp1+$pp2+$pp3+$pp4+$pp5+$pp6;
                                                  




                                                 /*echo $aa=  $ag['pay_one_amount']+$ag['pay_two_amount']+$ag['pay_three_amount']+$ag['pay_four_amount']+$ag['pay_five_amount']+$ag['pay_six_amount'] */


                                                    ?>/<?php echo $as=$tpa-$aa?>


                                                </td>
                                               <!--td><a href="<?php echo base_url();?>/Account/edit_agent/<?php echo $ag['id'];?>">Edit</a></td-->

                                               <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $ag['id'];?>">
  View 
</button>

</td>

 <!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $ag['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document" >
    <div class="modal-content" style="width:845px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "  style="margin-top:1px;">
            <div class="right-side">
              <div class="content" >

<hr style="color:gray"></hr>
                <h2 >Account(Remaining Amount :-<?php
 $tm= $ag['tolat_pay_amount'];
$poa=$ag['pay_one_amount'];
 $pta=$ag['pay_two_amount'];
 $ptha=$ag['pay_three_amount'];
 $pfa=$ag['pay_four_amount'];
 $pfia=$ag['pay_five_amount'];
 $psa=$ag['pay_six_amount'];

               echo  $rm=$tm-($aa);

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
 
  <input type="text" class="form-control" readonly=""    value="<?php echo $ag['retainer_app'];?>" />
</div>

            <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Application Govt fee will be paid from </label></br>
 
  <input type="text" class="form-control"  readonly=""   value="<?php echo $ag['govt_fee'];?>" />

</div>
     
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Payment plan application</label></br>

 <input type="text" class="form-control"  readonly=""   value="<?php echo $ag['pay_plan'];?>" />


</div> 
     
                  </div>


                          <div class="col-lg-3 col-md-4 col-sm-3 mb-3">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Estimated application </label></br>

 <input type="text" class="form-control"  readonly=""   value="<?php echo $ag['est_app'];?>" />

 </br> 

 <label class="small mb-1" for="inputFirstName">Estimated Number </label>
 <input type="text" class="form-control" name="est_num" id="est_num" readonly="" placeholder="Enter Estimated Number"  value="<?php echo $ag['est_num'];?>" />


</div> 
     
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">

                    <div class="form-group">
 <label class="small mb-1" for="inputFirstName">Total Payment Plan (copy paste from retainer)</label>
 <input type="text" name="tolat_pay_plan"  id="tolat_pay_plan" readonly="" value="<?php echo $ag['tolat_pay_plan'];?>" placeholder="Enter Note's" class="form-control" >
  <label class="small mb-1" for="inputFirstName">Total Payment (IN Number only)</label>
 <input type="number" name="tolat_pay_amount"  id="tolat_pay_amount" readonly="" value="<?php echo $ag['tolat_pay_amount'];?>" placeholder="Enter Total payment" class="form-control" >
</div> 
     
                     
                  </div>
                    

                             </div>

<!---->

            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">1st Payment </label></br>
  <input type="text" class="form-control"  readonly=""   value="<?php echo $ag['pay_one'];?>" />
</div>


<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's 1st Payment </label>
 <input type="text" class="form-control" name="pay_one_note" id="pay_one_note"  placeholder="Enter Note's 1st Payment"readonly=""  value="<?php echo $ag['pay_one_note'];?>" />
 <label class="small mb-1" for="inputFirstName">1st Payment Amount (IN Number Only)</label>
 <input type="number" class="form-control" name="pay_one_amount" id="pay_one_amount"  placeholder="Enter 1st Payment Amount (IN Number Only)" readonly="" value="<?php echo $ag['pay_one_amount'];?>" /> 
  
</div>
     
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                 <div class="form-group">
 <label class="small mb-1" for="inputFirstName">2nd Payment </label></br>
 

   <input type="text" class="form-control" readonly=""    value="<?php echo $ag['pay_two'];?>" />
</div>


<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's 2nd Payment</label>
 <input type="text" class="form-control" name="pay_two_note" id="pay_two_note"  placeholder="Enter Note's 2nd Payment" readonly=""  value="<?php echo $ag['pay_two_note'];?>" /> 
  <label class="small mb-1" for="inputFirstName">2nd Payment Amount (IN Number Only)</label>
 <input type="number" class="form-control" name="pay_two_amount" id="pay_two_amount"  placeholder="Enter 2nd Payment Amount (IN Number Only)" readonly=""  value="<?php echo $ag['pay_two_amount'];?>" /> 
  
</div>
     
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">

             <div class="form-group">
 <label class="small mb-1" for="inputFirstName">3rd Payment </label></br>
 
   <input type="text" class="form-control"readonly=""     value="<?php echo $ag['pay_three'];?>" />


</div>


<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's 3rd Payment</label>
 <input type="text" class="form-control" name="pay_three_note" id="pay_three_note"  placeholder="Enter Note's 3rd Payment" readonly="" value="<?php echo $ag['pay_three_note'];?>" /> 
  <label class="small mb-1" for="inputFirstName">3rd Payment Amount (IN Number Only)</label>
 <input type="number" class="form-control" name="pay_three_amount" id="pay_three_amount"  placeholder="Enter 3rd Payment Amount (IN Number Only)" readonly="" value="<?php echo $ag['pay_three_amount'];?>" /> 
  
</div>     
                     
                  </div>
                    

                             </div>




                             <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                          <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                     <div class="form-group">
 <label class="small mb-1" for="inputFirstName">4th Payment </label></br>
 

  <input type="text" class="form-control" readonly=""    value="<?php echo $ag['pay_four'];?>" />

</div>


<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's 4th Payment</label>
 <input type="text" class="form-control" name="pay_four_note" id="pay_four_note"  placeholder="Enter Note's 4th Payment" readonly=""  value="<?php echo $ag['pay_four_note'];?>" />
  <label class="small mb-1" for="inputFirstName">4th Payment Amount (IN Number Only)</label>
 <input type="text" class="form-control" readonly="" name="pay_four_amount" id="pay_one_note"  placeholder="Enter 4th Payment Amount (IN Number Only)"  value="<?php echo $ag['pay_four_amount'];?>" />  
  
</div>
     
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                 <div class="form-group">
 <label class="small mb-1" for="inputFirstName">5th Payment </label></br>
 

  <input type="text" class="form-control" readonly=""    value="<?php echo $ag['pay_five'];?>" />
</div>


<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Note's 5th Payment</label>
 <input type="text" class="form-control" name="pay_five_note" id="pay_five_note"  placeholder="Enter Note's 5th Payment" readonly="" value="<?php echo $ag['pay_five_note'];?>" /> 
  <label class="small mb-1" for="inputFirstName">5th Payment Amount (IN Number Only)</label>
 <input type="number" class="form-control" name="pay_five_amount" id="pay_five_amount"  placeholder="Enter 5th Payment Amount (IN Number Only)" readonly="" value="<?php echo $ag['pay_five_amount'];?>" /> 
  
</div>
     
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">

             <div class="form-group">
 <label class="small mb-1" for="inputFirstName">6th Payment </label></br>

  <input type="text" class="form-control" readonly=""    value="<?php echo $ag['pay_six'];?>" />
</div>


<div class="form-group">
 <label class="small mb-1" for="inputFirstName"> Note's 6th Payment</label>
 <input type="text" readonly="" class="form-control" name="pay_sex_note" id="pay_sex_note"  placeholder="Enter Note's 6th Payment"  value="<?php echo $ag['pay_sex_note'];?>" /> 
  <label class="small mb-1" for="inputFirstName">6th Payment Amount (IN Number Only)</label>
 <input type="number"readonly="" class="form-control" name="pay_six_amount" id="pay_six_amount"  placeholder="Enter 6th Payment Amount (IN Number Only)"  value="<?php echo $ag['pay_six_amount'];?>" /> 
  
</div>     
                     
                  </div>
                    

                             </div>

      </div>
      <div class="modal-footer">
        <!--button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button-->
      </div>
    </div>
  </div>
</div>
<!-- Small modal -->

                                                

                                            </tr>
                                           <?php } ?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 
<script type="text/javascript">
    
   $('#myModal').on('shown.bd-example-modal-lg', function () {
  $('#myInput').trigger('focus')
})
</script>

                     <script>
  $(function () {
          $('#dataTable1').dataTable( {
  "iDisplayLength": 50,
 
 
});
   
     var oTable = $('#dataTable1').dataTable();
    
        // Sort immediately with columns 0 and 1
       oTable.fnSort( [ [0,'desc'] ] );
    
  });
</script>

    </body>
</html>
