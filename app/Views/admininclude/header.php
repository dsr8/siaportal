<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
/* ── Dark Navbar ── */
.sb-topnav.navbar {
  background: #111827 !important;
  box-shadow: 0 2px 8px rgba(0,0,0,0.25);
  padding: 0 16px;
  height: 60px;
  font-family: 'Poppins', sans-serif;
}
.sb-topnav .navbar-brand {
  color: #fff !important;
  font-weight: 700;
  font-size: 1.15rem;
  display: flex; align-items: center; gap: 10px;
}
.brand-logo-circle {
  width: 34px; height: 34px;
  border-radius: 50%;
  background: #fff;
  display: flex; align-items: center; justify-content: center;
  overflow: hidden;
}
.brand-logo-circle img { width: 24px; height: 24px; object-fit: contain; }
#sidebarToggle {
  color: #fff !important;
  background: none; border: none; font-size: 1.2rem; cursor: pointer;
}
.welcome-user {
  color: #fff;
  font-size: 14px;
  font-weight: 500;
  display: flex; align-items: center; gap: 8px;
}
.welcome-user .user-avatar {
  color: #FF4D5A; font-size: 18px;
  display: flex; align-items: center; justify-content: center;
}
/* ── Dark Sidebar ── */
#layoutSidenav_nav .sb-sidenav {
  background: #111827 !important;
  border-right: none;
  box-shadow: 2px 0 8px rgba(0,0,0,0.2);
  font-family: 'Poppins', sans-serif;
}
.sb-sidenav-menu-heading {
  color: #6B7280 !important;
  font-size: 10px !important;
  letter-spacing: 2px !important;
  font-weight: 700 !important;
  padding: 18px 20px 6px !important;
}
.sb-sidenav-dark .sb-sidenav-menu .nav-link {
  color: #9CA3AF !important;
  font-size: 13px;
  font-weight: 500;
  border-radius: 8px;
  margin: 2px 10px;
  padding: 10px 14px;
  transition: all 0.2s;
  display: flex; align-items: center; gap: 10px;
}
.sb-sidenav-dark .sb-sidenav-menu .nav-link:hover {
  background: rgba(255,255,255,0.06) !important;
  color: #fff !important;
}
.sb-sidenav-dark .sb-sidenav-menu .nav-link.active,
#sidenavAccordion .nav-link[href*="dashboard"] {
  background: #4CAF50 !important;
  color: #fff !important;
  border-radius: 8px;
}
.sb-nav-link-icon { font-size: 14px; }
.sb-sidenav-collapse-arrow { margin-left: auto; }

/* ── Mobile toggle ── */
#layoutSidenav #layoutSidenav_nav { transform: translateX(-225px) !important; }
#layoutSidenav #layoutSidenav_content { margin-left: -225px !important; }
.sb-sidenav-toggled #layoutSidenav #layoutSidenav_nav { transform: translateX(0) !important; }
.sb-sidenav-toggled #layoutSidenav #layoutSidenav_content { margin-left: 0 !important; }
@media (min-width: 992px) {
  #sidebarToggle { display: none !important; }
  .sb-sidenav-toggled #sidebarToggle { display: inline-block !important; }
  #layoutSidenav #layoutSidenav_nav { transform: translateX(0) !important; }
  #layoutSidenav #layoutSidenav_content { margin-left: 0 !important; }
  .sb-sidenav-toggled #layoutSidenav #layoutSidenav_nav { transform: translateX(-225px) !important; }
  .sb-sidenav-toggled #layoutSidenav #layoutSidenav_content { margin-left: -225px !important; }
}
.table-responsive { overflow-x: auto !important; width: 100% !important; }
</style>

<nav class="sb-topnav navbar navbar-expand navbar-dark">
  <button class="btn btn-link btn-sm" id="sidebarToggle"><i class="fas fa-bars"></i></button>
  <a class="navbar-brand" href="<?php echo base_url(); ?>/Siaportal/dashboard" style="margin-left:6px;">
    <div class="brand-logo-circle"><img src="<?php echo base_url(); ?>/public/assets_client/img/sia_icon.png" alt="Siaportal"></div>
    Siaportal
  </a>
  <ul class="navbar-nav ml-auto" style="display:flex;align-items:center;gap:14px;">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="welcomeUserDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display:flex;align-items:center;">
        <div class="welcome-user">
          Welcome <?php echo session()->get('firstname'); ?>
          <span class="user-avatar"><i class="fas fa-user-circle"></i></span>
        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="welcomeUserDropdown">
        <a class="dropdown-item" href="<?php echo base_url(); ?>/Siaportal/logout">
          <i class="fas fa-sign-out-alt" style="color:#FF4D5A;font-size:14px;margin-right:6px;"></i>Logout
        </a>
      </div>
    </li>
  </ul>
</nav>
