<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="<?php echo base_url();?>/Siaportal/dashboard">Siaportal</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
           
                <div class="input-group">

                <!--input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" /-->
                    <div class="input-group-append" style="color:white; float:right;">
                       <h6 style="color:white ;float:left; margin-left: 800px;"> Welcome <?php echo $aa=session()->get('firstname'); ?></h6>
                    </div>
                </div>
           
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i style="color:#ff7b25" class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!--a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a-->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url();?>/Siaportal/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>