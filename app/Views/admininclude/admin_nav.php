<style>
  .sb-sidenav-dark .sb-sidenav-menu .nav-link {
    color: #fff;
  }
  /* Collapse bar button inside sidebar */
  #sidebarCollapseBtn {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    padding: 8px 12px 4px;
  }
  #sidebarCollapseBtn button {
    background: rgba(255,255,255,0.1);
    border: none;
    border-radius: 6px;
    color: #fff;
    cursor: pointer;
    font-size: 14px;
    padding: 5px 10px;
    transition: background 0.2s;
    width: 100%;
    text-align: left;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  #sidebarCollapseBtn button:hover {
    background: rgba(255,255,255,0.2);
  }
  /* Desktop only: show collapse bar */
  @media (max-width: 991px) {
    #sidebarCollapseBtn { display: none; }
  }
</style>

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- Collapse sidebar button (desktop) -->
                            <div id="sidebarCollapseBtn">
                              <button onclick="document.body.classList.toggle('sb-sidenav-toggled')">
                                <i class="fas fa-chevron-left" id="collapseIcon"></i>
                                <span id="collapseText">Collapse Menu</span>
                              </button>
                            </div>
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?php echo base_url();?>/Siaportal/dashboard"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a
                            >
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            
                              <!---->
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Frontend" aria-expanded="false" aria-controls="Frontend"
                                ><div class="sb-nav-link-icon"><i style="color:#FF4D5A" class="fas fa-calendar-alt"></i></div>
                             Frontend Inquiries
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="Frontend" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_frontend_inquiries">  Add  Frontend Inquiries </a>

                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_canada_inquiries">View Canada inquiries</a>
                                     <!--<a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_overseas">View Overseas</a>
                                      <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_decline">View Decline</a>-->

                                </nav>
                            </div>
                              <!---->
                              
                              <!---->
                            <?php /* ?><a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#neww" aria-expanded="false" aria-controls="neww"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa-columns"></i></div>
                              New Admission Records
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="neww" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_new_record">  Add Admission Records</a>

                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_new_record">View Admission Records</a>
                                     <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_new_record_req_pending">View Requirements Pending</a>

                                </nav>
                            </div>
                            <?php */ ?>
							
							
							 <!---->
                                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#prospect" aria-expanded="false" aria-controls="prospect"
                                ><div class="sb-nav-link-icon"><i style="color:#FF4D5A" class="fas fa-calendar-alt"></i></div>
                                Prospect
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="prospect" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">

                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_prospect">Add Prospect</a>
                                    <!--a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_prospect">View Prospect</a-->

                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/set_prospect_limit">View Prospect</a>
                                    

                                </nav>
                            </div>
                              <!---->
							  <!---->
                                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Appointment" aria-expanded="false" aria-controls="prospect"
                                ><div class="sb-nav-link-icon"><i style="color:#4CAF50" class="fas fa-gift"></i></div>
                                Manage Appointment
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="Appointment" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">

                                    <a class="nav-link" href="<?php echo base_url();?>/appoint/AppointAdmin/dashboard">Manage All Appointment</a>
                                      <!--a class="nav-link" href="<?php echo base_url();?>/appoint/Appoint/add">Add Appointment</a-->
                                    <a class="nav-link" href="<?php echo base_url();?>/appoint/Appoint/index">View My Appointments</a>
                                    <a class="nav-link" href="<?php echo base_url();?>/appoint/AppointAdmin/team_schedule">Team Appointments slot</a>

                                </nav>
                            </div>

                              <!---->
                                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#agreementMenu" aria-expanded="false" aria-controls="agreementMenu"
                                ><div class="sb-nav-link-icon"><i style="color:#e23b3b" class="fas fa-file-signature"></i></div>
                                Agreement
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="agreementMenu" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">

                                    <a class="nav-link" href="<?php echo base_url();?>/agreement/Agreement/dashboard">Dashboard</a>

                                </nav>
                            </div>
                              <!---->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i style="color:#F4B400" class="fa fa-user-circle"></i></div>
                               Clients
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <!--a class="nav-link" href="<?php echo base_url()?>/Siaportal/add_client">Add Clients</a-->
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/set_client_limit">View Client</a>


                                    <!--a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_view_client">Test client</a--></nav>
                            </div>

                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url()?>/Final_document_upload/final_document">Final Document Upload</a>
                                </nav>
                            </div>




                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                                >

                                </a>


                                <!---->
                                  
                              <!---->

                                 
							  
							  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"></a>
							  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"></a>
							  
							  
							
						  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"></a>


                                 <!---->
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#adr" aria-expanded="false" aria-controls="adr"
                                ><div class="sb-nav-link-icon"><i style="color:#FF4D5A" class="fas fa-calendar-alt"></i></div>
                                Adr
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="adr" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_adr">  Add Adr</a>

                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_adr">View Adr</a>

                                </nav>
                            </div>
                              <!---->
                              
                              
                               <!---->
                                <!--a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#service" aria-expanded="false" aria-controls="service"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa-columns"></i></div>
                              service
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="service" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_service">  Add service</a>

                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_service">View service</a>

                                </nav>
                            </div-->
                              <!---->
                              
                             
                              
                             
                              
                              
							  
							  <!--a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"></a-->

                                <!---->
                                <?php /* ?><a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#whatsapp" aria-expanded="false" aria-controls="whatsapp"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa-columns"></i></div>
                                Whats'app Message
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                                ></a>
                                <div class="collapse" id="whatsapp" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo base_url();?>/Siaportal/send_whatsapp_msg">  Whats'app Message</a>

                                </nav>
                                </div>
                                <?php */ ?>
                              <!---->

<!--a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"></a-->
                                    <!---->
                                  <!--a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#invoice" aria-expanded="false" aria-controls="invoice"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa-columns"></i></div>
                                Invoice
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="invoice" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">

                                   
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_invoice">View Invoice</a>
                                    

                                </nav>
                            </div-->
                              <!---->

                                <!---->
                                  <!--<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ck" aria-expanded="false" aria-controls="ck"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa-columns"></i></div>
                                Checklist
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="ck" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">

                                    
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_checklist">Checklist</a>
                                    

                                </nav>
                            </div>-->
                              <!---->

                                <!---->
                                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cs" aria-expanded="false" aria-controls="cs"
                                ><div class="sb-nav-link-icon"><i style="color:#FF4D5A" class="fas fa-calendar-alt"></i></div>
                                Application Finder
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="cs" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">

                                    
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_app_finder_new">View Application Finder</a>
                                    

                                </nav>
                            </div>
                              <!---->
<!--a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"></a-->
                              <!---->
                                  <!--a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cll" aria-expanded="false" aria-controls="cll"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa-columns"></i></div>
                                Client login
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="cll" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">

                                    
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_client_login">Client login</a>
                                     <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_client_login">view Client login</a>
                                    

                                </nav>
                            </div-->
                              <!---->

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"></a>
                             

                              <!---->
                                  <!--a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#de" aria-expanded="false" aria-controls="de"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa-columns"></i></div>
                                Email
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="de" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">

                                    
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/download_email">Download Email</a>
                                    

                                </nav>
                            </div-->
                              <!---->

                              <!---->
                                  <!--<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ft" aria-expanded="false" aria-controls="ft"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa-columns"></i></div>
                                Family Tree
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="ft" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">

                                    
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_family_tree">View Family Tree</a>
                                    

                                </nav>
                            </div>-->
                              <!---->


                              

                             

                              <!---->
                                  <!--a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sheet" aria-expanded="false" aria-controls="sheet"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Assessment Sheet
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="sheet" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">

                                    
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_checklist">View Assessment Sheet</a>
                                    

                                </nav>
                            </div-->
                              <!---->





                            


                              <!---->
                                 <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#nf" aria-expanded="false" aria-controls="nf"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa-columns"></i></div>
                                New form  
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="nf" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">

                                  <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_new_form">Add  New form </a>

                                    
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_new_form">View  New form </a>
                                    

                                </nav>
                            </div>-->
                              <!---->


                               <!---->
                                  <!--<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#wed" aria-expanded="false" aria-controls="wed"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa-columns"></i></div>
                                Work and Eduction
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="wed" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">

                                  
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_work_and_eduction">View work and  eduction</a>
                                    

                                </nav>
                            </div>-->
                              <!---->

                              <!---->
                                  <!--<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#adv" aria-expanded="false" aria-controls="adv"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa-columns"></i></div>
                                Advertisement 
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="adv" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">-->

                                  <!--a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_adv">Add  Advertisement </a-->

                                    
                                    <!--<a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_adv">View   Advertisement 1</a>
                                     <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_adv1">View   Advertisement stage 1</a>
                                      <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_adv2">View   Advertisement stage 2</a>
                                    

                                </nav>
                            </div>-->
                              <!---->


                                  <!---->
                                  <!--<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#emp" aria-expanded="false" aria-controls="emp"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa fa-handshake"></i></div>
                                Employers
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="emp" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_emp"><div class="sb-nav-link-icon"><i class="fas fa fa-handshake"></i></div>Add employers</a>
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_emp">View employers</a>
                                     <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_job_lmia">Add job/LMIA</a>
                                     <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_job_lmia">View Available job/LMIA</a>
                                     <!--a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_emp_own_lmia">Employer's Own LMIA</a-->

                                    
<!--
                                </nav>
                            </div>-->
                              <!---->
                               <!---->
                                  <!--a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#stu" aria-expanded="false" aria-controls="stu"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa fa-graduation-cap"></i></div>
                                Student need job
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="stu" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_student_need_job">Add Student need job</a>

                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_employe_for_student">View Student need job</a>  

                                </nav>
                            </div-->
                              <!---->
							  
							  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"></a>

                                 <!---->
                                  <!--a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#lmia" aria-expanded="false" aria-controls="lmia"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa fa-shopping-bag"></i></div>
                                LMIA Needed
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="lmia" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                  <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_lmia_needed">Add LMIA Needed</a>
                                   
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_lmia_needed">View LMIA Needed</a>
                                    
                                </nav>
                            </div-->
                              <!---->
							  
                              <?php /* ?>
                              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"></a>
                                 <!---->
                                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#smtp" aria-expanded="false" aria-controls="smtp"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa fa-shopping-bag"></i></div>
                                SMPT SETTING
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="smtp" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                  
                                   
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_smtp_setting">View SMTP Setting</a>
                                    
                                </nav>
                            </div>
							
							<?php */ ?>
                              <!---->

                              <!---->
                                  <!--<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#td" aria-expanded="false" aria-controls="td"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa fa-credit-card"></i></div>
                                TD credit card
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="td" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">-->
                                    <!--a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_td_card">Add card</a-->
                                    <!--<a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_td_card">View card</a>
                                </nav>
                            </div>-->
                              <!---->

                                 <!---->
                                  <!--<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rc" aria-expanded="false" aria-controls="rc"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa fa-credit-card"></i></div>
                                Referred Client
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="rc" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">-->
                                    <!--a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_td_card">Add card</a-->
                                    <!--<a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_referred_client">View Referred Client</a>
                                </nav>
                            </div>-->
                              <!---->


                              <!---->
                                  <!--a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#app" aria-expanded="false" aria-controls="app"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Appointment
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="app" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#">View Appointment</a>
                                    
                                </nav>
                            </div-->
                              <!---->

                                <!---->
                                  <!--<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ag" aria-expanded="false" aria-controls="ag"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa fa-briefcase"></i></div>
                                Agent
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="ag" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_agent">Add Agent</a>
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_agent">View Agent</a>
                                    
                                </nav>
                            </div>-->
                              <!---->

                              <!---->
                                  <!--a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tl" aria-expanded="false" aria-controls="tl"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa fa-users"></i></div>
                                Team Login
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="tl" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_team_login">Add Team Account</a>
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_team_login">View Team Account</a>
                                </nav>
                            </div-->
                              <!---->

                                  <!---->
                                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cat" aria-expanded="false" aria-controls="cat"
                                ><div class="sb-nav-link-icon"><i style="color:#9CA3AF" class="fas fa-cog"></i></div>
                                Admin Settings
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="cat" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_category">Add Category</a>
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_category">View Category</a>

                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_type">Add Type</a>
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_type">View Type</a>

                                     <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_status">Add Status</a>
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_status">View Status</a>

                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_team_login">Add Team Account</a>
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_team_login">View Team Account</a>
									<a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_smtp_setting">View SMTP Setting</a>
                                </nav>
                            </div>
                              <!---->
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1"
                                ><div class="sb-nav-link-icon"><i style="color:#9CA3AF" class="fas fa-th-large"></i></div>
                                Other Service
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <!--a class="nav-link" href="layout-static.html">Immigration Inquires</a-->
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_appointment_secduled">Appointment secduled</a>
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_approved">Approved</a>
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_ready_to_apply">Ready to apply</a>
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_refused">Refused</a>
<a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_service">  Add service</a>

                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_service">View service</a>

 <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_client_login">Client login</a>
                                     <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_client_login">view Client login</a>
                                    
  <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_invoice">View Invoice</a>
         <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_student_need_job">Add Student need job</a>

                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_employe_for_student">View Student need job</a>  


                                     <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_lmia_needed">Add LMIA Needed</a>
                                   
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_lmia_needed">View LMIA Needed</a>
                                                                
                                </nav>
                            </div>
                              <!---->
                                  <!--a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#type" aria-expanded="false" aria-controls="type"
                                ><div class="sb-nav-link-icon"><i class="fas fa fa-users"></i></div>
                                Type
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="type" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_type">Add Type</a>
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_type">View Type</a>
                                </nav>
                            </div-->
                              <!---->

                               <!---->
                                  <!--a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#st" aria-expanded="false" aria-controls="st"
                                ><div class="sb-nav-link-icon"><i class="fas fa fa-users"></i></div>
                                Status
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="st" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/add_status">Add Status</a>
                                    <a class="nav-link" href="<?php echo base_url();?>/Siaportal/view_status">View Status</a>
                                </nav>
                            </div-->
                              <!---->

                               <!---->
                                  <!--a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2"
                                ><div class="sb-nav-link-icon"><i class="fas fa fa-file-text"></i></div>
                                Client Assesment Sheet
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingtwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">View Client Assesment Sheet </a>
                                    
                                </nav>
                            </div-->
                              <!---->
                            <!--Appointments-->
                            <!--a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Appointments" aria-expanded="false" aria-controls="Appointments"
                                ><div class="sb-nav-link-icon"><i style="color:#ff7b25" class="fas fa-calendar-check"></i></div>
                                Other Option
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="Appointments" aria-labelledby="headingAppointments" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url();?>/appoint/Appoint/add">Add Appointment</a>
                                    <a class="nav-link" href="<?php echo base_url();?>/appoint/Appoint/index">View All Appointments</a>
                                </nav>
                            </div-->
                            <!--Appointments-->

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                                >

                                </a>


                    </div>
                    <!--div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div-->
                </nav>
<script>
/* Sync collapse button icon/text with sidebar state (shared across all admin pages) */
function syncCollapseBtn() {
    var toggled = document.body.classList.contains('sb-sidenav-toggled');
    var isDesktop = window.matchMedia('(min-width: 992px)').matches;
    /* On desktop, toggled = collapsed. On mobile, toggled = expanded (off-canvas drawer opened). */
    var collapsed = isDesktop ? toggled : !toggled;
    var icon = document.getElementById('collapseIcon');
    var text = document.getElementById('collapseText');
    if (icon) icon.className = collapsed ? 'fas fa-chevron-right' : 'fas fa-chevron-left';
    if (text) text.textContent = collapsed ? 'Expand Menu' : 'Collapse Menu';
}
document.getElementById('sidebarToggle') && document.getElementById('sidebarToggle').addEventListener('click', syncCollapseBtn);
document.getElementById('sidebarCollapseBtn') && document.getElementById('sidebarCollapseBtn').querySelector('button').addEventListener('click', syncCollapseBtn);
</script>