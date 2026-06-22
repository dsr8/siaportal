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
                        <h1 class="mt-4">Add Client Application</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>

                       <form id="myform" method="post" action="<?php echo base_url();?>/Siaportal/add_client_application/<?php echo $id;?>"> 
                        <div class="row">
                              <div class="col-xl-3 col-md-3"></div>
                            <div class="col-xl-6 col-md-6">

                              <div class="form-group"><label class="small mb-1" for="inputFirstName"> Upload Voice</label>
          <div >

                         

                          <div id="controls">
     <button id="recordButton" style="background-color:green;color: white; ">Record</button>
     <button id="pauseButton" disabled style="background-color:blue;color: white; ">Pause</button>
     <button id="stopButton" disabled style="background-color:red;color: white; ">Stop</button>
    </div>
    <div id="formats"></div>
    <p><strong></strong></p>
    <ol id="recordingsList"></ol> 
    <input type="hidden" id="audio" name="news_image1">


                          <div id="invalid-image"></div>
                          <progress id="progress" value="0"></progress>

                        </div>
</div>
                                
<div class="form-group"><label class="small mb-1" for="inputFirstName"> Category</label>
    <input type="hidden" name="Siaportal_id" value="<?php echo $id;?>" >
    <select class="form-control"NAME="category" id="category"  onChange="dev(this.value)">
      <option value="">Select Category</option> 
        <?php foreach($category as $ct) {                      
                                    
                                    ?>
                                
                                <option value="<?php echo $ct['id'];?>"><?php echo $ct['category'];?></option>
                                
                                <?php } ?>
                                                                
                                </select></div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">Type</label>
   <select class="form-control"NAME="type" id="subcat11" onChange="status()">
       
                       <option value="">Select Type </option>       
                             
                                
                              
                                                                
                                </select></div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">Status</label>
     <select class="form-control"NAME="file_status" id ="file_status" >
                                <option value="">Select File Stataus </option>
                               
                                
                                </select></div>
    
 <div class="form-group">
 <input type="submit" id="siasubmit" class="form-control py-4" style="background-color: green;text-align: center;color: white" name="submit" value="Submit">
</div>


                            </div>
                            <div class="col-xl-3 col-md-3">
                               

         </form>                   
                           
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



        
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    
        <script>

$(document).ready(function () {

    $('#myform').validate({ // initialize the plugin
        rules: {
            category: {
                required: true
               
            },
            
             type: {
                required: true
               
            },
            
            file_status: {
                required: true
               
            },
            
           
        },
        messages: {
        category: "Category Is required",
         type: "Type Is required",
          file_status: "Status Is required",
           
              
       
         }
        
    });

});
</script>

<script>
 $("#myform").submit(function(event) {

  var str = $("#audio").val();
  
  if(str==""){
    alert("Please Record a voice messages");

 event.preventDefault();
}

});
</script>

  <script type = "text/javascript">
 function dev(categoryid1)
 {  
//alert('dss');
// var categoryid=document.getElementById('category').value;
 //alert(categoryid1);
var url= '<?php echo base_url().'/Siaportal/gettype';?>/'+categoryid1;
//alert(url);
 //alert(url);
    $.ajax({  type: "POST",     
     url: '<?php echo base_url().'/Siaportal/gettype';?>/'+categoryid1, 
      
     success: function(result)
     {
     //alert("rtpe");
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
 var categoryid=document.getElementById('subcat11').value;
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



 
    
    </body>
</html>
