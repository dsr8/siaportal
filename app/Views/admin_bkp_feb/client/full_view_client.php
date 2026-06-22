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
                        <h1 class="mt-4">Full View Client</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>

                       
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                
<div class="form-group"><label class="small mb-1" for="inputFirstName"> Name</label>
    <input class="form-control py-4" name="name" id="name" type="text" placeholder="Enter  name" value="<?php echo $fview['0']['heading'];?>" readonly="" /></div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">Contact Number</label>
    <input class="form-control py-4" name="contact" id="contact" type="text" placeholder="Enter contact number" value="<?php echo $fview['0']['number'];?>" readonly="" /></div>
    <div class="form-group"><label class="small mb-1" for="inputFirstName">Alternet Contact Number</label>
    <input class="form-control py-4" name="contact" id="contact" type="text" placeholder="Enter contact number"value="<?php echo $fview['0']['alt_mobile_no'];?>" readonly="" /></div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">Email</label>
    <input class="form-control py-4"name="email" id="email" type="text" placeholder="Enter email" value="<?php echo $fview['0']['email'];?>" readonly=""/></div>
    <div class="form-group"><label class="small mb-1" for="inputFirstName">Dob</label>
    <input class="form-control py-4"name="email" id="email" type="text" placeholder="Enter email" value="<?php echo $fview['0']['user_dob'];?>" readonly=""/></div>
    <div class="form-group"><label class="small mb-1" for="inputFirstName">Client Status</label>
    <input class="form-control py-4"name="client_status" id="client_status" type="text" placeholder="Enter client status" value="<?php echo $fview['0']['client_status'];?>" readonly="" /></div>

    <div class="form-group"><label class="small mb-1" for="inputFirstName">Spouse Name</label><input class="form-control py-4" id="spouse_name" name="spouse_name"type="text" placeholder="Enter spouse name" value="<?php echo $fview['0']['spouse_name'];?>" readonly="" /></div>
    


 
                            </div>
                            <div class="col-xl-6 col-md-6">
                               
<div class="form-group"><label class="small mb-1" for="inputFirstName">Address</label><input class="form-control py-4" id="address" type="text" name="address" placeholder="Enter address" required="required" value="<?php echo $fview['0']['address'];?>" readonly="" /></div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">City</label><input class="form-control py-4" id="address" type="text" name="address" placeholder="Enter City" required="required"value="<?php echo $fview['0']['city'];?>" readonly="" /></div>

<div class="form-group"><label class="small mb-1" for="inputFirstName">Source</label>
<input class="form-control py-4" id="address" type="text" name="address" placeholder="Enter City" required="required"value="<?php echo $fview['0']['source'];?>" readonly="" />
</div>


<div class="form-group">
        <label class="small mb-1" for="inputFirstName">Family Tree</label><br>

<input  id="spouse_name" name="spouse_name"type="radio" value="yes" />Yes
<input  id="spouse_name" name="spouse_name"type="radio" value="no" />No




        <input class="form-control dekho" id="spouse_name" name="spouse_name"type="text" placeholder="Enter Family Tree" /></div>

<div class="form-group"><label class="small mb-1" for="inputFirstName">Reference</label><input class="form-control py-4" id="reff" name="reff"type="text" placeholder="Enter reff"value="<?php echo $fview['0']['reff'];?>" readonly="" /></div>


                               
                            </div>

                            <!--div class="col-xl-4 col-md-4">
                            </div-->
        
         </form>                   
                           
                        </div>



<!--div class="container-fluid bg-gray" id="accordion-style-1">
  <div class="container">
    <section>
      <div class="row">
        <div class="col-12">
          
        </div>
        <div class="col-12 mx-auto">
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="fa fa-amazon main"></i><i class="fa fa-angle-double-right mr-3"></i>BC PNP INT GRD
              </button>
              </h5>
              </div>

              <div id="collapseOne" class="collapse show fade" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.<a href="https://www.fiverr.com/share/qb8D02" class="ml-3" target="_blank"><strong>View More designs <i class="fa fa-angle-double-right"></i></strong></a>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
              <button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
               <i class="fa fa-plus main"></i><i class="fa fa-angle-double-right mr-3"></i>Canadian Exp Class
              </button>
              </h5>
              </div>
              <div id="collapseTwo" class="collapse fade" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.<a href="https://www.fiverr.com/share/qb8D02" class="ml-3" target="_blank"><strong>View More designs <i class="fa fa-angle-double-right"></i></strong></a>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
              <button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <i class="fa fa-expeditedssl main"></i><i class="fa fa-angle-double-right mr-3"></i>Spausal Sponsorship
              </button>
              </h5>
              </div>
              <div id="collapseThree" class="collapse fade" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.<a href="https://www.fiverr.com/share/qb8D02" class="ml-3" target="_blank"><strong>View More designs <i class="fa fa-angle-double-right"></i></strong></a>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingFour">
                <h5 class="mb-0">
              <button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <i class="fa fa-envelope main"></i><i class="fa fa-angle-double-right mr-3"></i>INTL Stu Spousal Open WP

              </button>
              </h5>
              </div>
              <div id="collapseFour" class="collapse fade" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.<a href="https://www.fiverr.com/share/qb8D02" class="ml-3" target="_blank"><strong>View More designs <i class="fa fa-angle-double-right"></i></strong></a>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </div>
    </section>
  </div>
</div-->



                      
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
            name: {
                required: true
               
            },
            
             email: {
                required: true
               
            },
            contact: {
                required: true
               
            },
            
           
           
        },
        messages: {
        name: "Name Is required",
         mobile_no: "Contact number Is required",
          email: "Email Is required",
           
           
              
       
         }
        
    });

});
</script>
    </body>
</html>
