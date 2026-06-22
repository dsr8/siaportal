
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
                        <h1 class="mt-4">Add Client</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>

                       <form id="myform" method="post" action="<?php echo base_url();?>/Siaportal/add_client"> 
                        <div class="row">
                            <div class="col-xl-6 col-md-6">

                                
<div class="form-group"><label class="small mb-1" for="inputFirstName"> Name</label>
    <input class="form-control py-4" name="name" id="name" type="text" placeholder="Enter  name" /></div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">Contact Number</label>
    <input class="form-control py-4" name="contact" id="contact" type="text" placeholder="Enter contact number" /></div>
    <div class="form-group"><label class="small mb-1" for="inputFirstName">Alternet Contact Number</label>
    <input class="form-control py-4" name="alt_mobile_no" id="alt_mobile_no" type="text" placeholder="Enter Alternet Contact Number" /></div>
<div class="form-group">
  <label class="small mb-1" for="inputFirstName">Email</label>
    <input class="form-control py-4"name="email" id="email"  type="text" placeholder="Enter email"Onclick="check_mail()" />

    <input type="text" name="aa" id="aa" onclick="aaa();">
  </div>
    <div class="form-group"><label class="small mb-1" for="inputFirstName">Date of Birth</label>
    <input class="form-control py-4"name="dob" id="dob" type="text" placeholder="Enter Date of Birth" /></div>
    <div class="form-group"><label class="small mb-1" for="inputFirstName">Client Status</label>
    <input class="form-control py-4"name="client_status" id="client_status" type="text" placeholder="Enter client status" /></div>

    <div class="form-group"><label class="small mb-1" for="inputFirstName">Spouse Name</label><input class="form-control py-4" id="spouse_name" name="spouse_name"type="text" placeholder="Enter spouse name" /></div>
    


 <div class="form-group">
 <input type="submit" id="siasubmit"  class="form-control py-4" style="background-color: green;text-align: center;color: white" name="submit" value="Submit">
</div>

                            </div>
                            <div class="col-xl-6 col-md-6">
                               
<div class="form-group"><label class="small mb-1" for="inputFirstName">Address</label><input class="form-control py-4" id="address" type="text" name="address" placeholder="Enter address" required="required" /></div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">City</label><input class="form-control py-4" id="city" type="text" name="city" placeholder="Enter City" required="required" /></div>

<div class="form-group"><label class="small mb-1" for="inputFirstName">Source</label><select class="form-control"NAME="source">
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
<select class="form-control"NAME="agent_name">
                                <option value="">Select Agent </option>
                                <?php foreach($agent as $tta) {                     
                                    
                                    ?>
                                
                                
                                <option value="<?php echo $tta['name'];?>"><?php echo $tta['name'];?></option>
                                
                                <?php } ?>
                                </select>
                                </div>



<div class="form-group">
        <label class="small mb-1" for="inputFirstName">Family Tree</label><br>

<input  id="spouse_name" name="family"type="radio" value="yes" />Yes
<input  id="spouse_name" name="family"type="radio" value="no" />No




        <input class="form-control dekho" id="master_sia_id" name="master_sia_id"type="text" placeholder="Enter Family Tree" /></div>

<div class="form-group"><label class="small mb-1" for="inputFirstName">Reference</label><input class="form-control py-4" id="reff" name="reff"type="text" placeholder="Enter Reference" /></div>


                               
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
  function aa() {
    alert("hiihi");
 // document.getElementById("myInput");
}
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
             agent_name: {
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
        agent_name: "Agent Name Is Required",
        spouse_name: "Spouse Name Is Required",
        client_status: "Client Status Is Required",
        dob: "Date Of Birth Is Required",
           
           
              
       
         }
        
    });

});
</script>
    </body>
</html>
