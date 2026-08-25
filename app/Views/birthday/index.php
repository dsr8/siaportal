<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Siaportal</title>
        <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    </head>
    <body class="sb-nav-fixed">
        <?= view('admininclude/header.php'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?= view('admininclude/admin_nav'); ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Team Birthdays</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Birthday</li>
                        </ol>

                        <?php if(session()->getFlashdata('success')){ ?>
                        <div class="alert alert-success"><?php echo session()->getFlashdata('success'); ?></div>
                        <?php } ?>

                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-birthday-cake mr-1"></i> Birthday List</span>
                                <a href="<?php echo base_url();?>/Birthday/add" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> Add Birthday
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Date of Birth</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($list as $row){ ?>
                                            <tr>
                                                <td><?php echo $row['id'];?></td>
                                                <td><?php echo esc($row['name']);?></td>
                                                <td><?php echo esc($row['email']);?></td>
                                                <td><?php echo !empty($row['dob']) ? date('d M Y', strtotime($row['dob'])) : '-'; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url();?>/Birthday/edit/<?php echo $row['id'];?>" class="btn btn-info btn-xs"><i class="fas fa-edit"></i></a>
                                                    <a href="<?php echo base_url();?>/Birthday/delete/<?php echo $row['id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Remove this birthday entry?');"><i class="fas fa-trash"></i></a>
                                                </td>
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
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>
    </body>
</html>
