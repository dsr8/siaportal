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
                        <h1 class="mt-4">Edit Bc Pnp Int Grd</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                              <ul>
                                 <li>Sia Portal Id:-<?php echo $profile['0']['id'];?></li>
                                <li>Name:-<?php echo $profile['0']['heading'];?></li>
                                 <li>Email:-<?php echo $profile['0']['email'];?></li>
                                  <li>Mobile :-<?php echo $profile['0']['number'];?></li>
                                   <li>File number :-<?php echo $profile['0']['id'];?></li>
                              </ul>
                            </li>
                        </ol>

                       <form id="myform" method="post" action="<?php echo base_url();?>/Siaportal/edit_bc_pnp_int_grd/<?php echo $cpm['0']['category'];?>/<?php echo $cpm['0']['id'];?>"> 
                        <div class="row">
                            <div class="col-xl-3 col-md-3">
                                
                                 <div class="form-group"><label class="small mb-1" for="inputFirstName"> Voice Note's</label>
    
       <div id="controls">
    <button id="recordButton" style="background-color:#6b5b95;color: white; ">Record</button>
     <button id="pauseButton" disabled style="background-color:blue;color: white; ">Pause</button>
     <button id="stopButton" disabled style="background-color:red;color: white; ">Stop</button>
    </div>
    <div id="formats"></div>
    <p><strong></strong></p>
    <ol id="recordingsList"></ol> 
    <input type="hidden" id="audio" name="news_image1">
                
  <video controls="" style="height:50px;width: 150px;color:red;" name="media"><source src="https://canada.siaimmigration.com/form/<?php echo $cpm['0']['voice_msg'];?>" type="audio/x-wav"></video>

<input type="hidden"  name="news_image1_old" value="<?php echo $cpm['0']['voice_msg'];?>">
</label>
<progress id="progress" value="0"></progress>



</div>
                            </div>
                            <div class="col-xl-3 col-md-3">

                               
                                
                                <div class="form-group">
                                    <label class="small mb-1" for="inputFirstName"> Status</label>
    <select class="form-control" id="application_status"  name="application_status" >
    
    <?php 


    foreach($status as $st){ ?>
        <?PHP $val = $st['id'];?>

        <option  <?php if(isset($val) && $val==$cpm['0']['application_status']) {?> selected="selected"<?php } ?>value="<?php echo $st['id'];?>"><?php echo $st['app_status'];?></option>
    <?php } ?>

    

</select>



</div>
<div class="form-group">
 <label class="small mb-1" for="inputFirstName"> Date of creation</label>
 <input class="form-control" name="date_of_creation" id="date_of_creation"  type="text" placeholder="Enter Date of creation" value="<?php  echo  $cpm['0']['date_of_creation']; ?>"  readonly="readonly" />
</div>
    

    <div class="form-group">
 <label class="small mb-1" for="inputFirstName"> Log in info pnp</label>
 <input class="form-control" name="log_in_info_pnp" id="log_in_info_pnp"  type="text" placeholder="Enter Log in info pnp" value="<?php echo $cpml['0']['log_in_info_pnp']; ?>"   />
</div>





                            </div>
                            <div class="col-xl-3 col-md-3">
                                
<div class="form-group"><label class="small mb-1" for="inputFirstName"> Expected Date to apply</label>
    <input class="form-control" name="exp_date_to_apply" id="datepicker"  type="text" placeholder="Enter Expected Date to apply" value="<?php  echo $dddd= $cpm['0']['exp_date_to_apply']; ?>"  readonly="readonly" />
</div>


    <div class="form-group">
 <label class="small mb-1" for="inputFirstName">  Application number</label>
 <input class="form-control" name="application_number" id="application_number"  type="text" placeholder="Enter  Application number" value="<?php  echo  $cpm['0']['application_number']; ?>"   />
</div>

<div class="form-group">
 <label class="small mb-1" for="inputFirstName">  Job noc</label>
 <input class="form-control" name="job_noc" id="job_noc"  type="text" placeholder="Enter Job noc" value="<?php  echo  $cpm['0']['job_noc']; ?>"   />
</div>

    
 <div class="form-group">
 <input type="submit" class="form-control py-4" style="background-color: green;text-align: center;color: white" name="submit" value="Submit">
</div>



                            </div>
                            <div class="col-xl-3 col-md-3">
                               
<div class="form-group"><label class="small mb-1" for="inputFirstName">Assign to </label>

    <!--input class="form-control py-4" id="city" type="text" name="city" value="" placeholder="Enter City" required="required" /-->

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
<div class="form-group">
 <label class="small mb-1" for="inputFirstName">Registration score</label>
 <input class="form-control" name="reg_score" id="reg_score"  type="text" placeholder="Enter Registration score" value="<?php  echo  $cpm['0']['reg_score']; ?>"   />
</div>

<div class="form-group">
 <label class="small mb-1" for="inputFirstName"> Upload Document</label>
 <input class="form-control" name="upload_doc" id="upload_doc"  type="file" />
</div>

                            </div>
        

         </form>       





    <div class="container-fluid">
                        <h1 class="mt-4">Voice Note</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>

                      
                        <div class="row">
                          <div class="col-xl-12 col-md-12">
                            
<?php
                    if($voice_msg !=""){ 

                      echo' <label class="small mb-1" for="inputFirstName">Voice note</label>';
 

                        foreach($voice_msg as $vm ){ 


                        ?>

                        <div class="form-group">
 

                        <video controls="" style="height:50px;width: 350px;color:red;" name="media"><source src="https://canada.siaimmigration.com/form/<?php echo $vm['voice_msg'];?>" type="audio/x-wav"></video><br><?php echo $vm['insert_on'];?>
</div>
                        


                  <?php  } }

                     ?> 




                          </div>
                        
                          
        

                  
                           
                        </div>
                           </div>



<br>
<hr>

          <div class="container-fluid">
                        <h1 class="mt-4">Document Upload By client</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="row">
                          <div class="col-xl-12 col-md-12">
                            
<?php
                    if($doc !=""){ 

                      echo' <label class="small mb-1" for="inputFirstName">Document</label>';
 

                        foreach($doc as $do ){ 


                        ?>
 <div class="form-group">
                        <a  data-toggle="tooltip" title="<?php echo $do['doc_name'];?>" target="_blank" href="<?php echo $do['client_document_link'];?>">   <i style="font-size: 2rem;" class="fa fa-file-o" aria-hidden="true"></i></a>
                  <?php echo $do['doc_name'];?>
                </div>

                  <?php  } }

                     ?> 




                          </div>
                        
                          
        

                  
                           
                        </div>
                           </div>

                    
<br>
<hr>

          <div class="container-fluid">
                        <h1 class="mt-4">Document Upload By Sia Immigration</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="row">
                          <div class="col-xl-12 col-md-12">
                            
<?php
                    if($doc !=""){ 

                      echo' <label class="small mb-1" for="inputFirstName">Document</label>';
 

                        foreach($doc1 as $do ){ 


                        ?>
 <div class="form-group">
                        <a  data-toggle="tooltip" title="<?php echo $do['doc_name'];?>" target="_blank" href="<?php echo $do['client_document_link'];?>">   <i style="font-size: 2rem;" class="fa fa-file-o" aria-hidden="true"></i></a>
                  <?php echo $do['doc_name'];?>
                </div>

                  <?php  } }

                     ?> 




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
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
  $( function() {
    $( "#datepicker" ).datepicker({

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
