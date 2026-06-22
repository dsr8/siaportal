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
                



                 <?php include 'admininclude/admin_nav.php' ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                 <div class="card-body">Appointment secduled( <?php 
                                   

          echo $aa111= count($prospect);

                                     ?>
                   )


                </div>
                                    <!--div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div-->
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Approved( <?php 
                                   

          echo $aa111= count($approve_count);

                                     ?>)



                    </div>
                                    <!--div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div-->
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Ready to apply(<?php 
                                   

          echo $aa111= count($ready_to_apply);

                                     ?>)</div>
                                    <!--div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div-->
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Refused(<?php                              

          echo $aa111= count($refused);

                                     ?>)</div>
                                    <!--div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div-->
                                </div>
                            </div>

                              

                             

                           






                        </div>
                        <!--div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Area Chart Example</div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Source</div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div-->


                         <!--div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Admin Notes</div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                               <a target="_blank" href="https://www.siaimmigration.com/Home/sia_links"> <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"> link 2</div>
                                    
                                </div></a>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">link 3</div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">link 4</div>
                                    
                                </div>
                            </div>
                        </div-->
                        <div class="row">
                        <div class="col-xl-6">
                        <div class="card mb-4" >
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Document upload by client</div>
                            <div class="card-body" style="
    min-height: 240px;">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>

                                            <tr>
                                                <th>ID</th>
                                                <th>Siaportal id</th>
                                                <th>client name/Upload By</th>
                                                <th>Document</th>
                                                <th>Date</th>
                                                
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                              <?php 
                                              //print_r($doc_upload);
                                              //exit();

                                              foreach($doc_upload as $doc) { ?>
                                            <tr>
                                                <td><?php echo $doc['id']?></td>
                                                <td><?php echo $doc['siaportal_id']?></td>
                                                <td><?php echo $doc['name']?>/(<?php echo $doc['upload_by']?>)</td>
                                                <td><?php echo $doc['doc_name']?></td>
                                                <td><?php echo $doc['insert_on']?></td>
                                                
                                            </tr>
                                           <?php } ?>
                                         
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                              <div class="card mb-4" style="height: 276px; overflow: scroll;">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>New Form Data</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php foreach($new_form as $nf) { ?>
                                        <lable><?php echo $nf['insert_on'];?></lable>
                                   <h4><?php echo $nf['heading'];?></h4>

                                   <p><?php echo $nf['form_body'];?></p>
                               <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


      <div class="row">
                        <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Birth Day</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                               
                                                <th>Date</th>
                                                
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            <?php 
                                            if(!empty($dob)){

                                            foreach($dob as $db ){ ?>
                                            <tr>
                                                <td><?php echo $db['id'];?></td>
                                                <td><?php echo $db['heading'];?></td>
                                                <td><?php echo $db['number'];?></td>
                                                
                                                <td><?php echo $db['user_dob'];?></td>
                                                
                                            </tr>
                                        <?php } }else { echo "No Data Found"; }?>
                                           
                                         
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                              <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>?????</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    Test Data
                                </div>
                            </div>
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
                                &middot;
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
           var table = $("#dataTable").DataTable({
   "paging": false,
   "ordering": false,
   "searching": false
});
        </script>
    </body>
</html>
