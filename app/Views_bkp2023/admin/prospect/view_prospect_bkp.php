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
       

         <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        

         <SCRIPT language="JavaScript">
function st_change(id,st)
{

 //var st= document.getElementById("pstatus").value;

 //alert(id);
 //alert(st);
 //var st="ffff";
 //var aa="ffff";
  
  //  var hi= confirm("Do you really want to change");
  //  if (hi== true){
       // alert("hi");
       
     $.ajax({   type: "POST",       
          url: '<?php echo base_url().'/Siaportal/st_changem';?>/'+id+'/'+st, 
          
          
    success: function(result){  
     // alert(result);
      
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
function add_status(id,st)
{

//var stt =document.getElementById("ppstatus").value;
//var removeData=st.replace("%"," ");

//alert(removeData);
       
     $.ajax({   type: "POST",       
          url: '<?php echo base_url().'/Siaportal/st_chang';?>/'+id+'/'+st, 
          
          
    success: function(result){  
    
    }         

       } ); 
    
    
  
}
 </SCRIPT>


        <style type="text/css">
          .on {
          width: 6em;
    margin: .0em;
    padding: .4em 1em;
    text-align: center;
    border-radius: .25em;
    display: inline-block;
    background: lightgreen;
    box-sizing: border-box;
    font: 1em/1em 'Segoe UI';
    color: #fff;
    border: 1px solid rgba(0, 0, 0, .15);
    box-shadow: 0 0.1em 0.2em rgba(0, 0, 0, .3);
    /* background-image: linear-gradient(145deg, rgba(255, 255, 255, .5), rgba(255, 255, 255, 0) 1em), linear-gradient(0deg, rgba(0, 0, 0, .2), transparent); */
    background: linear-gradient(-90deg, #333, #333);
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
                        <h1 class="mt-4">View Prospect</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        
                       
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable1" width="50%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                 <th>Id</th>

               <th >Voice</th>
                <th >Name</th>
                 <th>Email/SMS</th>
               
                <th >Add on Date</th>
                 <th >Team status</th>
                <th >Source/Type</th>
                
                <th >Team Mamber Name/Number </th>
                <!--th >Number</th-->
              
                <th >Admin Status</th>
                
               
               
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                             <?php foreach($prospect as $allcat){ ?>
                                            <tr>
                                                 <td><?php echo $allcat['id'];?> </td>
                                                <td >
                    <?php if($allcat['news_image1']==""){ ?>

                          <label style="color:white">Recoding not uploaded yet</label>

                        <?php 
                    }else { 


if($allcat['voice_added']=='siaportal'){
                     ?>
 <video controls="" style="height:30px;width: 150px;background-color: red;" name="media"><source src="https://canada.siaimmigration.com/form/<?php echo $allcat['news_image1'];?>" type="audio/x-wav"></video>
 <?php } else { ?>

                  <video controls="" style="height:30px;width: 150px;background-color: red;" name="media"><source src="https://siaimmigration.com/admin/form/<?php echo $allcat['news_image1'];?>" type="audio/x-wav"></video>
                  <?php } } ?>
</td>
                                               <?php if ($allcat['from_web']!=''){ ?>
                  <td style="color:red"><?php echo $allcat['heading'];?>/</br><?php echo $allcat['email'];?> </td>
              <?php } else { ?>

<td ><?php echo $allcat['heading'];?>/</br><?php echo $allcat['email'];?> </td>
          <?php    } ?>


 <td> <a  class="on" style="background:lightgreen;margin-bottom: 5px;color:black; width: 177px;
    font-size: 13px;" href="<?php echo base_url();?>/Siaportal/immigration_enquiry_mail/<?php echo $allcat['id'];?>/<?php echo $allcat['mail_send'];?>"><i class="fa fa-envelope" aria-hidden="true"></i>(<?php echo $allcat['mail_send'];?>)(<?php echo $allcat['mail_send_on'];?>)</a><br>

                    <a  style="color:white; margin-bottom: 5px; width: 177px;
    font-size: 13px;" class="on" target="_blank" href="<?php echo base_url();?>/Siaportal/edit_prospect/<?php echo $allcat['id'];?>">Edit</a><br>

    <a onclick="sms(<?php echo $allcat['id'];?>)"  class="on" style="background: blue;margin-bottom: 5px;color:white;  width: 177px;
    font-size: 13px;" ><i class="fa fa-comment"></i>(<?php echo $allcat['sms_send'];?>)(<?php echo $allcat['sms_send_on'];?>)</a>
                                                   <a  style="color:white;  width: 177px;
    font-size: 13px;"class="on" onclick="move_to_client(<?php echo $allcat['id'];?>,<?php echo $allcat['number'];?>)"  style="background: black;margin-bottom: 5px;color:white; ">Move To client</a>

  </td>
                                                 <!--td> <a onclick="sms(<?php echo $allcat['id'];?>)"  class="on" style="background: blue;margin-bottom: 5px;color:white;  width: 177px;
    font-size: 13px;" ><i class="fa fa-comment"></i>(<?php echo $allcat['sms_send'];?>)(<?php echo $allcat['sms_send_on'];?>)</a>
                                                   <a  style="color:white;  width: 177px;
    font-size: 13px;"class="on" onclick="move_to_client(<?php echo $allcat['id'];?>)"  style="background: black;margin-bottom: 5px;color:white; ">Move To client</a>


                                                 </td-->

                                                <td ><?php echo $allcat['insert_on'];?></hr></td>

 <td><!--?php echo $allcat['agent_status'];?-->
                                                
                          <select style="line-height: 3;" onchange="st_change(<?php echo $allcat['id'];?>,this.value)" id="pstatus" name="pstatus">
                            <?php if($allcat['pstatus']=='') {?>
                            <option value="">Select value</option>
<?php } else {?>

   <option style="background-color:#55BCC9;" value="<?php echo $allcat['pstatus']; ?>"><?php echo str_replace('_', ' ',$allcat['pstatus']);?></option>

<?php } ?>


 <option style="background-color:#E27D60;" value="Retainer_sent_but_waiting_for_signatures">Retainer sent but waiting for signatures </option>
  <option style="background-color:#85DCB;" value="Retainer_signed_but_waiting_for_documents">Retainer signed but waiting for documents</option>
                      <option style="background-color:#E8A87C;" value="Dropped">Dropped</option>
                      <option style="background-color:#C38D9E;"value="Retainer_Declined">Retainer Declined </option>
                      <option style="background-color:#41B3A3;" value="Follow_up_next_month">Follow up next month </option>
  <option style="background-color:#8D8741;" value="Waiting_for_one_year_of_experience">Waiting  for one year of experience</option>
   <option style="background-color:#659DBD;"  value="Waiting_for_wes_or_ielts">Waiting for wes or ielts</option>
   <option style="background-color:#DAAD86;" value="Dont_want_to_continue_with_us">Dont want to  continue with us </option>
   <option style="background-color:#BC986A;"value="Not_decided_or_needs_time_to_decide">Not decided or needs time to decide</option>
  <option style="background-color:#FBEEC1;" value="Not_contactable_or_reachable">Not contactable or reachable</option>
   <option  style="background-color:red;" value="Done_Delete">Done/Delete</option>

                                                </select></br></br>



      <input style="    width: 284px;
   
    line-height: 3;" type="text" name="ppstatus" id="ppstatus" value="<?php echo str_replace('%20', ' ',$allcat['ppstatus']);?>"onkeyup="add_status(<?php echo $allcat['id'];?>,this.value)" >
                                              </td>


                                                <td><?php echo $allcat['agent_name'];?><br>
<?php echo $allcat['typee'];?>
                                                </td>
                                                
                                                 <td><?php echo $allcat['team_member'];?><br>
                                                   <?php echo $allcat['number'];?>

                                                 </td>    
                                               
                                             
                                               <td><?php echo $allcat['admin_status'];?></td>
      
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
       
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>
       
        <script src="<?php echo base_url();?>/public/dist/assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url();?>/public/dist/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/public/dist/assets/demo/datatables-demo.js"></script>




    
    
<SCRIPT language="JavaScript">
function sms(id)
{
  
  
    var hi= confirm(" mobile number in right format e.g 17782575709 ");

  //  alert(id);
    if (hi == true){
       // alert("hi");



        $url = 'immigration_enquiry_sms/'+id;
       // alert($url);
     window.location.href = $url; 
    
    
    
    }else{


 $url = 'edit_prospect/'+id;
     //   alert($url);
     window.location.href = $url; 

     
    }
}
 </SCRIPT>

<SCRIPT language="JavaScript">
function move_to_client(id,num)
{
  
  
    var hi= confirm("You want to move client");

  //  alert(id);
    if (hi == true){
       // alert("hi");
 var hi1= confirm("Mobile number is correct "+num);
if(hi1 == true){

        //$url = 'move_to_client/'+id;
        $url = 'edit_move_to_client/'+id;
       // alert($url);
     window.location.href = $url; 
    
    }else{
 $url = 'https://canada.siaimmigration.com/Siaportal/edit_prospect/'+id;
       // alert($url);
     window.location.href = $url; 

    }
    
    }else{


 $url = 'view_prospect';
     //   alert($url);
     window.location.href = $url; 

     
    }
}
 </SCRIPT>

             <script>
  $(function () {
          $('#dataTable1').dataTable( {
  "iDisplayLength": 20,
 
 
});
   
     var oTable = $('#dataTable1').dataTable();
    
        // Sort immediately with columns 0 and 1
       oTable.fnSort( [ [0,'desc'] ] );
    
  });
</script>




    </body>
</html>
