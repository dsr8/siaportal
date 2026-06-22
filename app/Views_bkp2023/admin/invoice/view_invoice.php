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
                        <h1 class="mt-4">View Invoice</h1>
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
                                                <th>Id</th>
                                                <th>Company Name</th>
                                                 <th>Contact Person</th>

                                                <th>Contact Number</th>
                                                  <th>Client Name</th>
                                                
                                                  <th>Application Type</th>
                                                   <th>Remarks</th>


                                                   <th>Status</th>
                                                   <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                             <?php foreach($invoice as $nf){ ?>
                                            <tr>
                                                <td><?php echo $nf['id'];?></td>

                                                <td><?php echo $nf['company_name'];?></td>
                                                <td><?php echo $nf['cont_person'];?></td>
                                               
                                                <td><?php echo $nf['cont_no'];?></td>
                                                 <td><?php echo $nf['client_name'];?></td>

                                                   <td><?php echo $nf['app_type'];?></td>
                                                 <td><?php echo $nf['remark'];?></td>

                                                   <td><textarea name="agent_status" id="agent_status" onkeyup="updatestatus(<?php echo $nf['id'];?>);"><?php echo $nf['agent_status'];?></textarea></td>
                                                 <td><a href="<?php echo base_url();?>/Siaportal/full_invoice/<?php echo $nf['id'];?>">Full view</a><br><a href="<?php echo base_url();?>/Siaportal/del_invoice/<?php echo $nf['id'];?>">Delete</a></td>

                                               
                                                

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

<script>
    function updatestatus(id){

         // var zone = $(this).val();
        var as=document.getElementById("agent_status").value;


        $.ajax({
            url: 'https://canada.siaimmigration.com/Siaportal/updatestatus_invoice',
            type:'POST',
            data:{
                "id":id,
                "st":as
            },
            async: false,
            success:function(result){
                $("#academy-data").html(result);        
            }
        });
    }
    </script>

    </body>
</html>
