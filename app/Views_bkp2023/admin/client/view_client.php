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
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>



 <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

          <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>



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

/*

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #DCDCDC;
}
*/


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
                        <h1 class="mt-4">View Client</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        
                       
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                               <th>Export Data</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                             <?php foreach($client as $allcat){ ?>
                                            <tr>
                                                <td>
                                               
                                               
                 
             

 
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-md-3"><i style="color:#80ced6;"class="fa fa-id-card" aria-hidden="true"></i><?php echo $allcat['id'];?> <br>



          <?php if($allcat['news_image1']==""){ ?>

                          <label style="color:#ff7b25">Recoding not uploaded yet</label>

                        <?php 
                    }else { 


if($allcat['voice_added']=='siaportal'){
                     ?>
 <video controls="" style="height:30px;width: 150px;background-color: red;" name="media"><source src="https://canada.siaimmigration.com/form/<?php echo $allcat['news_image1'];?>" type="audio/x-wav"></video>
 <?php } else { ?>

                  <video controls="" style="height:30px;width: 150px;background-color: red;" name="media"><source src="https://siaimmigration.com/admin/form/<?php echo $allcat['news_image1'];?>" type="audio/x-wav"></video>
                  <?php } } ?>


                  <br>






         
<i class="fa fa-bookmark" aria-hidden="true"></i> <?php echo $allcat['heading'];?><br>
<i class="fa fa-mobile" aria-hidden="true"></i><?php echo $allcat['number'];?><br>
<i class="fa fa-envelope-open" aria-hidden="true"></i><?php echo $allcat['email'];?><br>

          
            <?php 
            $a = $allcat['address'];
            $b = $allcat['city'];
            $c = $allcat['family'];
             if($a=="" || $b==''|| $c=''){ 

            ?>

            <lable >  <a onclick="aa();"  href=""><i class="fa fa-plus" aria-hidden="true"></i></a></lable><lable>


<script type = "text/javascript">
 function aa()
 {  
alert('Complet Your profile first');
}
</script>
<!-- Modal -->


            <?php  } else { ?>
          <lable >  <a  target="_blank" href="<?php echo base_url();?>/Siaportal/add_client_application/<?php echo $allcat['id'];?>"><i class="fa fa-plus" aria-hidden="true"></i></a></lable><lable>

        <?php } ?>
             <a  target="_blank" href="<?php echo base_url();?>/Siaportal/edit_client_prospect/<?php echo $allcat['id'];?>"> <img style="height:20px;width:40px;" src="<?php echo base_url();?>/assets/edit.png"></a>
            </lable><label>
             <a  target="_blank" href="<?php echo base_url();?>/Siaportal/full_view_client/<?php echo $allcat['id'];?>"> <i class="fa fa-binoculars" aria-hidden="true"></i></a>
            </label>




          </div>


         <div class="col-xl-9 col-md-9">

            <?php 

           $host="localhost";
  $db="sia_database";
  $user="sia_user";
  $password="sia_password";

$con = mysqli_connect($host,$user,$password,'sia_database')or die(mysqli_error());
 //$CI =& get_instance();
   // $CI->load->model('Backoffice_model');
$ddd=$allcat['id'];
  $SelQuery = "SELECT tbl_client_application.*,tbl_category.category as cat,tbl_type_client.type as ttyy, tbl_status.app_status as apps
FROM tbl_client_application
LEFT JOIN tbl_category ON tbl_client_application.category = tbl_category.id 
LEFT JOIN  tbl_type_client ON tbl_client_application.type = tbl_type_client.id 
LEFT JOIN  tbl_status ON tbl_client_application.application_status = tbl_status.id 



where tbl_client_application.`siaportalid` =$ddd "; 
   //exit();
    
  $Query=mysqli_query($con,$SelQuery) or die(mysqli_error());
     while($GetData=mysqli_fetch_array($Query)){
                    ?>
          

    <div class="row">

      
      <div class="col-xl-3 col-md-3  "  data-toggle="tooltip" title="<?php echo $GetData['cat'];?>" > 
        <div class="row">

       <div class="col-xl-12 col-md-12" style="background-color:#6b5b95; font-size: 13px;color:#fff;" > <i  class="fa fa-id-badge" style="color:#fff; margin-left:1px;" ></i> <?php echo $GetData['cat'];?>

</div>
</div>
         
      </div>
     

       <div class="col-xl-3 col-md-3"  data-toggle="tooltip" title="<?php echo $GetData['ttyy'];?>">


<div  style="background-color:#feb236;font-size: 13px;color:#fff; ">
          <i style="color:#fff; margin-left:1px;" class="fa fa-list-alt" aria-hidden="true"></i>  <?php echo substr($GetData['ttyy'], 0, 15);?>

</div>

      </div>
       <div class="col-xl-3 col-md-3"  data-toggle="tooltip" title="<?php echo $GetData['apps'];?>">
<div style="background-color:#d64161;font-size: 13px;color:#fff;">
  
        <i style="color:#fff;margin-left:1px;" class="fa fa-bullhorn" aria-hidden="true"></i> <?php echo substr($GetData['apps'], 0, 15);?>
      
</div>
      </div>
       <div class="col-xl-1 col-md-1"  >

        <?php $block =$GetData['application_status'];

$allid= array(490,485,480,475,471,451,438,433,428,423,418,413,408,403,398,393,388,383,378,373,368,363,358,353,348,343,338,333,324,307,298,290,282,272,264,256,245,233,222,212,204,196,188,180,170,160,150,140,133,127,117,107,97,85,75,64,55,44,33,21,13,491,486,481,476,439,434,429,424,419,414,409,404,399,394,389,384,379,374,369,364,359,354,349,344,339,334,325,308,299,291,283,273,265,257,246,234,223,213,205,197,189,181,171,161,151,141,134,128,118,108,98,86,76,65,54,43,34,22,14);
if(in_array($block,$allid)){ ?>



<?php }else{

        ?>
         <a  target="_blank" href="<?php   echo base_url();?>/Siaportal/edit_client_application/<?php echo $GetData['category'];?>/<?php echo $GetData['id'];?>/<?php echo $GetData['siaportalid'];?>/<?php echo $GetData['type'];?> ">
        <img style="height:20px;width:20px;" src="<?php echo base_url();?>/assets/ed.png">

      </a>
<?php } ?>
      <br> <a  target="_blank" href="<?php   echo base_url();?>/Siaportal/full_view_client_application/<?php echo $GetData['category'];?>/<?php echo $GetData['id'];?>/<?php echo $GetData['siaportalid'];?>/<?php echo $GetData['type'];?> "> <i class="fa fa-binoculars" aria-hidden="true"></i></a>

       </div>

        <div class="col-xl-2 col-md-2"  >  

<video controls="" style="height:21px;width: 115px;;background-color: red;" name="media"><source src="https://canada.siaimmigration.com/form/<?php echo $GetData['voice_msg'];?>" type="audio/x-wav"></video>
       </div>
   </div>

  <hr style="margin-top: 0px; margin-bottom: 3px;">

<?php } ?>
             </div>
             </div>
              </div>
         



  </form>



<script type = "text/javascript">
 function dev(categoryid1)
 {  
alert('dss');
// var categoryid=document.getElementById('category').value;
 alert(categoryid1);
var url= '<?php echo base_url().'/Siaportal/gettype';?>/'+categoryid1;
//alert(url);
 //alert(url);
    $.ajax({  type: "POST",     
     url: '<?php echo base_url().'/Siaportal/gettype';?>/'+categoryid1, 
      
     success: function(result)
     {
     alert("rtpe");
     $('#subcat11').html(result);
     //<option>fgfdsg</option>
     }         
       } ); 
}
</script>


<script type = "text/javascript">
 function status()
 {  
//alert('dss');
 var categoryid=document.getElementById('subcat').value;
 //alert(categoryid);
var url= '<?php echo base_url().'/Siaportal/gettype_status';?>/'+categoryid;
//alert(url);
 //alert(url);
    $.ajax({  type: "POST",     
     url: '<?php echo base_url().'/Siaportal/gettype_status';?>/'+categoryid, 
      
     success: function(result)
     {
   // alert("ghdfghg");
     $('#file_status').html(result);
     //<option>fgfdsg</option>
     }         
       } ); 
}
</script>



    </div>
  </div>
</div>

<!----->





          </div>


</div>
</div>
                                               
</td>
                                            </tr>









                                           <?php } ?>
                                           
                                        </tbody>
                                    </table>

                                    <?= $pager->links() ?>
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
  
<script>
  <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</script>

 <script>
        $('#dataTable').dataTable( {
  "iDisplayLength": 50,
  "bPaginate":false,
  "showNEntries" : false,
   "bInfo" : false

 
 
});

         var oTable = $('#dataTable').dataTable();
    
        // Sort immediately with columns 0 and 1
       oTable.fnSort( [ [0,'desc'] ] );


      
</script>


    
        <script>

$(document).ready(function () {

    $('#myform1').validate({ // initialize the plugin
        rules: {
            category: {
                required: true
               
            },
            
             email: {
                required: true
               
            },
            contact: {
                required: true
               
            },
            
           
           
        },
        messages: {
        category: "Category Is required",
         subcat: "Type Is required",
          app_status: "Status Is required",
           
           
              
       
         }
        
    });

});
</script>





    </body>
</html>
