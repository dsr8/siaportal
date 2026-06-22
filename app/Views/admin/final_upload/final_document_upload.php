
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
                        <h1 class="mt-4">Final Document Upload</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>

                       <form id="myform" method="post" action="<?php echo base_url();?>/Final_document_upload/final_document_upload/<?php echo $sss['0']['id'];?>" enctype="multipart/form-data"> 
                        <div class="row">
                             <div class="col-xl-3 col-md-3"></div>
                            <div class="col-xl-6 col-md-6">
                                
<div class="form-group"><label class="small mb-1" for="inputFirstName">Document name</label>
    <input class="form-control py-4" name="doc_name" id="doc_name" type="text" placeholder="Enter Document Name" />

 <input class="form-control py-4" name="application_id" id="application_id" type="hidden" placeholder="Enter Category" value="<?php echo $sss['0']['id'];?>"/>
  <input class="form-control py-4" name="category" id="category" type="hidden" value="<?php echo $sss['0']['category'];?>" />
   <input class="form-control py-4" name="type" id="type" type="hidden" value="<?php echo $sss['0']['type'];?>" />
    <input class="form-control py-4" name="status" id="status" type="hidden" value="<?php echo $sss['0']['application_status'];?>" />
    <input class="form-control py-4" name="siaprotal_id" id="siaprotal_id" type="hidden" value="<?php echo $sss['0']['siaportalid'];?>" />


     <input class="form-control py-4" name="ct" id="ct" type="hidden" value="<?php echo $cat['0']['ct'];?>" />
      <input class="form-control py-4" name="ty" id="ty" type="hidden" value="<?php echo $cat['0']['ty'];?>" />
 <input class="form-control py-4" name="st" id="st" type="hidden" value="<?php echo $cat['0']['st'];?>" />
  <input class="form-control py-4" name="name" id="name" type="hidden" value="<?php echo $dd['0']['heading'];?>" />
   <input class="form-control py-4" name="siaprotal_id" id="siaprotal_id" type="hidden" value="<?php echo $dd['0']['id'];?>" />

</div>

    <div class="form-group"><label class="small mb-1" for="inputFirstName">Upload Document</label>
    <input  name="resume" id="resume" type="file" placeholder="Enter Category" /></div>
 <div class="form-group">
 <input type="submit" class="form-control py-4" style="background-color: green;text-align: center;color: white" name="submit" value="Submit">
</div>


                            </div>
                            <div class="col-xl-3 col-md-3"></div>
                    
        

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
            doc_name: {
                required: true
               
            },
              resume: {
                required: true
               
            },
            
           
           
        },
        messages: {
        doc_name: "Document Name Is required",
         resume: "Document  Is required",
         
              
       
         }
        
    });

});
</script>
    </body>
</html>
