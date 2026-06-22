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
                        <h1 class="mt-4">View LMIA Needed</h1>
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
                <th  style="width:5px;">Id</th>
                 <th  style="width:5px;">Voice</th>
              
                <th style="width:10px;">Name</th>
                 <th style="width:10px;">Taggs for Search</th>
                  <th style="width:10px;">Canada visa</th>
                <th style="width:5px;">Add on Date</th>
                <th style="width:5px;">Source</th>
                <th style="width:5px;">Type</th>
                <th style="width:5px;">Team Mamber Name </th>
                <th style="width:5px;">Number</th>
                <th style="width:5px;">Resume</th>

                <th style="width:5px;">Edit</th>
               
                 
                </tr>
                </thead>
                
                
                <tbody>
                
                <?php foreach($lmia_needed as $allcat) { ?>
                <tr id="dd<?php echo $allcat['id'];?>">
                  <td style="width:5px;"><?php echo $allcat['id'];?> </td>
                 
 <td >
                    <?php if($allcat['news_image1']==""){ ?>

                          <label style="color:white">Recoding not uploaded yet</label>

                        <?php 
                    }else { 


if($allcat['voice_added']=='siaportal'){
                     ?>
 <video controls="" style="height:30px;width: 150px;background-color: red;" name="media"><source src="https://canada.siaimmigration.com/form/<?php echo $allcat['news_image1'];?>" type="audio/x-wav"></video>
 <?php } else {?>

                  <video controls="" style="height:30px;width: 150px;background-color: red;" name="media"><source src="https://siaimmigration.com/admin/form/<?php echo $allcat['news_image1'];?>" type="audio/x-wav"></video>
                  <?php } }?>
</td>
                   

                   

                 
                  <td style="width:5px;"><?php echo $allcat['heading'];?> </td>
                   <td style="width:5px;"><?php echo $allcat['tag_search'];?> </td>
                   <td style="width:5px;"><?php echo $allcat['having_canada_visa'];?> </td>
             
                  <td style="width:5px;"><?php echo $allcat['insert_on'];?></td>
                  
                  <td style="width:5px;"> <?php echo $allcat['agent_name'];?></td>
                  <td style="width:5px;"> <?php echo str_replace("_"," ",$allcat['typee']);?></td>
                  <td style="width:5px;"><?php echo $allcat['team_member'];?> </td>
                  <td style="width:5px;"><?php echo $allcat['number'];?> </td>
                   <td>

            <?php if($allcat['resume']!=""){ ?>

<a target="_blank" href="<?php echo $allcat['resume'];?>" >Download </a>

<?php } else { ?> <?php } ?>
 </td>
               
                   <td style="width:5px;"><a href ="<?php echo base_url();?>/Siaportal/edit_lmia_needed/<?php echo $allcat['id'];?>">Edit</a></td>
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
