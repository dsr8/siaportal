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
                        <h1 class="mt-4">Edit Prospect</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>

                       <form id="contactForm" method="post" action="<?php echo base_url();?>/Siaportal/edit_prospect/<?php echo $prospect['0']['id'];?>" enctype="multipart/form-data"> 
                        <div class="row">
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

<?php if($prospect['0']['voice_added']=='siaportal'){
                     ?>
 <video controls="" style="height:30px;width: 150px;color:red;" name="media"><source src="https://canada.siaimmigration.com/form/<?php echo $prospect['0']['news_image1'];?>" type="audio/x-wav"></video>
 <?php } else { ?>

                  <video controls="" style="height:30px;width: 150px;color:red;" name="media"><source src="https://siaimmigration.com/admin/form/<?php echo $prospect['0']['news_image1'];?>" type="audio/x-wav"></video>
                  <?php }  ?>


</div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">Source</label>
    <input class="form-control py-4" name="agent_name" id="agent_name" value="<?php echo $prospect['0']['agent_name'];?>"type="text" placeholder="Enter Source" /></div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">Team Member name</label>
    <input class="form-control py-4"name="team_member" value="<?php echo $prospect['0']['team_member'];?>" id="team_member" type="text" placeholder="Enter Team Member name" /></div>
    <div class="form-group"><label class="small mb-1" for="inputFirstName">Email</label>
    <input class="form-control py-4"name="email" id="email"value="<?php echo $prospect['0']['email'];?>" type="text" placeholder="Enter Email" /></div>

    

                            </div>
                            <div class="col-xl-6 col-md-6">
                               
<div class="form-group"><label class="small mb-1" for="inputFirstName">Name</label><input class="form-control py-4" id="heading" type="text" name="heading" value="<?php echo $prospect['0']['heading'];?>" placeholder="Enter Name" required="required" /></div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">Type</label><input class="form-control py-4" id="typee" type="text" value="<?php echo $prospect['0']['typee'];?>" name="typee" placeholder="Enter Type" required="required" /></div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">Number</label><input class="form-control py-4" id="number" type="text" name="number" value="<?php echo $prospect['0']['number'];?>" placeholder="Enter Number" /></div>


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
    </body>
</html>
