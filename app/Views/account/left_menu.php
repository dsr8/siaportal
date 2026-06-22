<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?php echo base_url();?>/Account/index"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a
                            >
                            <div class="sb-sidenav-menu-heading">Menu</div>


                                <!---->
                                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ag" aria-expanded="false" aria-controls="ag"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa fa-briefcase"></i></div>
                                Agent
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="ag" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url();?>/Account/add_agent">Add Agent</a>
                                    <a class="nav-link" href="<?php echo base_url();?>/Account/view_agent">View Agent</a>
                                    
                                </nav>
                            </div>
                              <!---->
                                <!---->
                                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#acc" aria-expanded="false" aria-controls="acc"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa fa-briefcase"></i></div>
                                Account
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="acc" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    
                                    <a class="nav-link" href="<?php echo base_url();?>/Account/view_account">View Account</a>
                                    
                                </nav>
                            </div>
                              <!---->

                                   <!---->
                                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#td" aria-expanded="false" aria-controls="td"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa fa-briefcase"></i></div>
                                TD Card
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="td" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    
                                    <a class="nav-link" href="<?php echo base_url();?>/Account/view_td_card">View Card</a>
                                    
                                </nav>
                            </div>
                              <!---->




                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                                >

                                </a>
                                
                           
                    </div>
                    <!--div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div-->
                </nav>