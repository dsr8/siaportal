
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

         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
                        <h1 class="mt-4">Edit Client Member</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">

                            </li>
                        </ol>

                       <form id="myform" method="post" action="<?php echo base_url();?>/Siaportal/edit_client/<?php echo $team['0']['id'];?>"> 


<?php if (isset($validation)){ ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?php $validation->listErrors() ?>
              </div>
            </div>
          <?php } ?>


                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                
<div class="form-group"><label class="small mb-1" for="inputFirstName">First Name</label>
    <input class="form-control py-4" name="firstname" id="firstname" type="text" placeholder="Enter first name" value="<?php echo $team['0']['firstname']; ?>"/></div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">Last Name</label>
    <input class="form-control py-4" name="lastname" id="lastname" type="text" placeholder="Enter last name" value="<?php echo $team['0']['lastname']; ?>"/></div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">Email</label>
    <input class="form-control py-4"name="email" id="email" type="text" placeholder="Enter email" value="<?php echo $team['0']['email']; ?>" /></div>
    <div class="form-group"><label class="small mb-1" for="inputFirstName">Mobile Number</label>
    <input class="form-control py-4"name="mobile_no" id="mobile_no" type="text" placeholder="Enter Mobile Number" value="<?php echo $team['0']['mobile_no']; ?>" /></div>
    
 


                            </div>
                            <div class="col-xl-6 col-md-6">
                               
<div class="form-group"><label class="small mb-1" for="inputFirstName">Password</label><input class="form-control py-4" id="password" type="text" name="password" placeholder="Enter password" required="required" value="<?php echo $team['0']['pass']; ?>"/></div>
<input type="hidden"  name="type" value="client">
<!--div class="form-group"><label class="small mb-1" for="inputFirstName">Type</label>
<select class="form-control " name="type">
    <option value="">Select Type</option>
    
    <option value="client" <?php if($team['0']['type'] == 'client'){ echo 'selected';} ?>>Client</option>
    <option value="Admin" <?php if($team['0']['type'] == 'Admin'){ echo 'selected';} ?>>Admin</option>
     <option value="Employe" <?php if($team['0']['type'] == 'Employee'){ echo 'selected';} ?>>Employee</option>

</select>

</div-->
<div class="form-group"><label class="small mb-1" for="inputFirstName">Status</label>
<select class="form-control" name="status" style="font-size: 10px;">
     <option value="">Select Status</option>
    <option value="1" <?php if($team['0']['status'] == '1'){ echo 'selected';} ?>>Active</option>
    <option value="0" <?php if($team['0']['status'] == '0'){ echo 'selected';} ?>>Deactive</option>
     

</select>

</div>

<div class="form-group"><label class="small mb-1" for="inputFirstName">Refer Cases Status</label>
<select class="form-control" name="ref_hide" style="font-size: 10px;">
     <option value="">Select show Hide</option>
    <option value="1" <?php if($team['0']['ref_hide'] == '1'){ echo 'selected';} ?>>Show</option>
    <option value="0" <?php if($team['0']['ref_hide'] == '0'){ echo 'selected';} ?>>Hide</option>
     

</select>

</div>

   <div class="form-group"><label class="small mb-1" for="inputFirstName">Sia portal id</label>
    <input class="form-control py-4"name="siaprotal_id" id="siaprotal_id" type="text" placeholder="Enter Siaportal id" value="<?php echo $team['0']['siaprotal_id']; ?>" /></div>

<div class="form-group">
 <input type="submit" class="form-control py-4" style="background-color: green;text-align: center;color: white" name="submit" value="Submit">
</div>




                               
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

$(document).ready(function () {

    $('#myform').validate({ // initialize the plugin
        rules: {
            firstname: {
                required: true
               
            },
            lastname: {
                required: true
               
            },
             email: {
                required: true
               
            },
            mobile_no: {
                required: true
               
            },
             type: {
                required: true
               
            },
            status: {
                required: true
               
            },
             password: {
                required: true
               
            },
           
        },
        messages: {
        firstname: "First name Is required",
         lastname: "Last name Is required",
          email: "Email Is required",
           mobile_no: "Mobile Number Is required",
            type: "Type Is required",
             status: "Status Is required",
              password: "Password Is required",
              
       
         }
        
    });

});
</script>

    </body>
</html>
