
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Siaportal</title>
        <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
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
                        <h1 class="mt-4">ADD CLIENT</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>

                       <form method="post" action="<?php echo base_url();?>/Siaportal/add_client"> 
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                
<div class="form-group"><label class="small mb-1" for="inputFirstName"> Name</label>
    <input class="form-control py-4" name="name" id="inputFirstName" type="text" placeholder="Enter first name" /></div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">Contact Number</label>
    <input class="form-control py-4" name="contact" id="inputFirstName" type="text" placeholder="Enter first name" /></div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">Email</label>
    <input class="form-control py-4"name="email" id="inputFirstName" type="text" placeholder="Enter first name" /></div>
    <div class="form-group"><label class="small mb-1" for="inputFirstName">Client Status</label>
    <input class="form-control py-4"name="contact" id="inputFirstName" type="text" placeholder="Enter first name" /></div>

    <div class="form-group"><label class="small mb-1" for="inputFirstName">Spouse Name</label><input class="form-control py-4" id="inputFirstName" name="spouse_name"type="text" placeholder="Enter first name" /></div>

<div class="form-group"><label class="small mb-1" for="inputFirstName">reff</label><input class="form-control py-4" id="inputFirstName" name="reff"type="text" placeholder="Enter first name" /></div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">User_dob</label><input class="form-control py-4" id="inputFirstName"name="user_dob" type="text" placeholder="Enter first name" /></div>

<div class="form-group"><label class="small mb-1" for="inputFirstName">File Number</label><input class="form-control py-4" id="inputFirstName" type="text" name="file_number" placeholder="Enter first name" /></div>

                            </div>
                            <div class="col-xl-6 col-md-6">
                               
<div class="form-group"><label class="small mb-1" for="inputFirstName">Address</label><input class="form-control py-4" id="inputFirstName" type="text" name="address" placeholder="Enter first name" required="required" /></div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">client status</label><input class="form-control py-4" id="inputFirstName" type="text" name="client_status" placeholder="Enter first name" required="required" /></div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">pass_pob</label><input class="form-control py-4" id="inputFirstName" type="text" name="pass_pob" placeholder="Enter first name" /></div>

<div class="form-group"><label class="small mb-1" for="inputFirstName">Agent Name</label>
<select class="form-control"NAME="agent_name">
                                <option value="">Select Agent </option>
                                <?php foreach($agent as $tta) {                     
                                    
                                    ?>
                                
                                
                                <option value="<?php echo $tta['name'];?>"><?php echo $tta['name'];?></option>
                                
                                <?php } ?>
                                </select>
                                </div>

<div class="form-group"><label class="small mb-1" for="inputFirstName">Visa Type</label><input class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter first name" /></div>

<div class="form-group"><label class="small mb-1" for="inputFirstName">Immigration Type</label><input class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter first name" /></div>



                               
                            </div>
         <input type="submit" name="submit" value="submit">

         </form>                   
                           
                        </div>
                        <!--div class="row">
                            <!--div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Area Chart Example</div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>--
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Bar Chart Example</div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div-->
                        <!--div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>$320,800</td>
                                            </tr>
                                            <tr>
                                                <td>Garrett Winters</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>63</td>
                                                <td>2011/07/25</td>
                                                <td>$170,750</td>
                                            </tr>
                                            <tr>
                                                <td>Ashton Cox</td>
                                                <td>Junior Technical Author</td>
                                                <td>San Francisco</td>
                                                <td>66</td>
                                                <td>2009/01/12</td>
                                                <td>$86,000</td>
                                            </tr>
                                            <tr>
                                                <td>Cedric Kelly</td>
                                                <td>Senior Javascript Developer</td>
                                                <td>Edinburgh</td>
                                                <td>22</td>
                                                <td>2012/03/29</td>
                                                <td>$433,060</td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
    </body>
</html>
