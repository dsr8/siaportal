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

.hidden{ 
    display: none;
}

.dekho{ 
    display: block;
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
                        <h1 class="mt-4">Add LMIA Needed</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>

                       <form id="myform" method="post" action="<?php echo base_url();?>/Siaportal/add_lmia_needed" enctype="multipart/form-data"> 
                        <div class="row">
                            <div class="col-xl-6 col-md-6">

                                <div class="form-group"><label class="small mb-1" for="inputFirstName">Voice Notes</label>
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
                                
<div class="form-group"><label class="small mb-1" for="inputFirstName"> Name</label>
    <input class="form-control py-4" name="name" id="name" type="text" placeholder="Enter  name" /></div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">Contact Number</label>
    <input class="form-control py-4" name="contact" id="contact" type="text" placeholder="Enter contact number" /></div>
   
<div class="form-group"><label class="small mb-1" for="inputFirstName">Email</label>
    <input class="form-control py-4"name="email" id="email" type="text" placeholder="Enter email" /></div>
   
    


 <div class="form-group">
 <input type="submit" id="siasubmit"  class="form-control py-4" style="background-color: green;text-align: center;color: white" name="submit" value="Submit">
</div>

                            </div>
                            <div class="col-xl-6 col-md-6">
                               


<div class="form-group" style="margin-top: 110px;"><label class="small mb-1" for="inputFirstName">Source</label><select class="form-control"NAME="source">
                                 <option value="">Select Source</option>
          <option value="Facebook">Facebook</option>
          <option value="Webform">Webform</option>
          <option value="Phone/WhatsApp">Phone/WhatsApp</option>
          <option value="Email">Email</option>
          <option value="LinkedIn">LinkedIn</option>
          <option value="Google my Bus">Google my Bus</option>
          <option value="Live Chat">Live Chat</option>
          <option value="Instagram">Instagram</option>
           <option value="YouTube">YouTube</option>
           <option value="Reffrence/Agent">Reffrence/Agent</option>
            <option value="Existing client">Existing client</option>
            <option value="YouTube">Other</option>
                                
                                </select></div>

<div class="form-group"><label class="small mb-1" for="inputFirstName">Agent Name</label>
<select class="form-control"NAME="team_member">
                                <option value="">Select Agent </option>
                                <?php foreach($team as $tta) {                     
                                    
                                    ?>
                                
                                
                  <option value="<?php echo $tta['firstname'];?>"><?php echo $tta['firstname'];?></option>
                                
                                <?php } ?>
                                </select>
                                </div>

                                <div class="form-group"><label class="small mb-1" for="inputFirstName">Upload Resume</label><input class="form-control py-4" id="resume" type="file" name="resume"  /></div>






                               
                            </div>
        
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
 $("#myform").submit(function(event) {

  var str = $("#audio").val();
  
  if(str==""){
    alert("Please Record a voice messages");

 event.preventDefault();
}

});
</script>
    
        <script>

$(document).ready(function () {

    $('#myform').validate({ // initialize the plugin
        rules: {
            name: {
                required: true               
            },
            
             email: {
                required: true               
            },
            contact: {
                required: true               
            },
            alt_mobile_no: {
                required: true               
            },
             dob: {
                required: true               
            },
            client_status: {
                required: true               
            },
            spouse_name: {
                required: true               
            },
            reff: {
                required: true              
            },
            city: {
                required: true               
            },
            source: {
                required: true
               
            },
             team_member: {
                required: true
               
            },
            
           
           
        },
        messages: {
        name: "Name Is Required",
        contact: "Contact Number Is Required",
        email: "Email Is Required",
        alt_mobile_no: "Alternet Contact Number Is Required",
        city: "City Is Required",
        source: "Source Is Required",
        reff: "Reference Is Required",
        team_member: "Team Member Name Is Required",
        spouse_name: "Spouse Name Is Required",
        client_status: "Client Status Is Required",
        dob: "Date Of Birth Is Required",
           
           
              
       
         }
        
    });

});
</script>
    </body>
</html>
