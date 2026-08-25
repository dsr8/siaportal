<?php
// Today's team birthdays — drives the header banner + sidebar ribbon/balloon decoration.
// Queried directly here since header.php is a shared include across many controllers that
// don't all pass this data down.
$todayBirthdays = [];
if (session()->get('isLoggedIn') == true) {
    $birthdayModel = new \App\Models\Birthday_model();
    $todayBirthdays = $birthdayModel->getToday();
}
?>
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
.topbar-bell {
  position: relative; color: #9CA3AF; font-size: 17px; text-decoration: none;
  display: flex; align-items: center; justify-content: center;
}
.topbar-bell:hover { color: #fff; }
.topbar-bell .bell-badge {
  position: absolute; top: -6px; right: -8px; background: #FF4D5A; color: #fff;
  font-size: 10px; font-weight: 700; min-width: 16px; height: 16px; border-radius: 8px;
  display: flex; align-items: center; justify-content: center; padding: 0 3px; line-height: 1;
}
.topbar-avatar {
  width: 32px; height: 32px; border-radius: 50%; background: #4CAF50; color: #fff;
  font-weight: 700; font-size: 13px; display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
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

/* ── Birthday celebration ── */
/* Sits as a flex item inside the already sb-topnav.navbar (fixed, 60px row) between the brand
   and the right-side icons — NOT a separate strip below it, since .sb-topnav is position:fixed
   and anything placed after it in normal flow renders hidden underneath it. */
.birthday-banner {
  display: flex; align-items: center; gap: 8px;
  background: linear-gradient(90deg, #FF4D5A, #FF8A65);
  color: #fff; font-weight: 600; font-size: 12.5px;
  padding: 5px 14px; border-radius: 20px;
  font-family: 'Poppins', sans-serif;
  margin-left: 18px;
  max-width: 45%;
  overflow: hidden;
}
/* Long messages (e.g. a full custom greeting typed into the birthday's Name field) don't fit the
   navbar's fixed 60px row at any font size, so instead of truncating with "..." the text scrolls
   across — the FULL message is always eventually visible rather than being cut off. Short text
   just sits still (nothing to scroll). */
.birthday-banner .bb-text-wrap {
  overflow: hidden; flex: 1; min-width: 0;
}
.birthday-banner .bb-text {
  display: inline-block; white-space: nowrap;
  animation: bbScroll var(--bb-scroll-duration, 14s) linear infinite;
  padding-left: 100%;
}
.birthday-banner .bb-text.bb-text-short {
  animation: none; padding-left: 0;
}
@keyframes bbScroll {
  0%   { transform: translateX(0); }
  100% { transform: translateX(-100%); }
}
.birthday-banner .bb-emoji { font-size: 15px; flex-shrink: 0; }
@media (max-width: 767px) {
  .birthday-banner { display: none !important; }
}
/* Full-page balloon/ribbon overlay — position:fixed against the real viewport (this file has no
   transformed ancestor, unlike admin_nav.php's sidebar, which would otherwise re-anchor a fixed
   overlay to itself when toggled). pointer-events:none on the whole layer means every balloon is
   purely decorative and can never intercept a click, so normal work is never affected — the user
   can keep using the page exactly as before even while this is showing. */
.birthday-decor { position: fixed; inset: 0; pointer-events: none; z-index: 1060; overflow: hidden; }
.birthday-decor span {
  position: absolute; font-size: 34px; opacity: 0.35; animation: birthdayFloat 6s ease-in-out infinite;
  filter: drop-shadow(0 1px 3px rgba(0,0,0,0.35));
}
.birthday-decor span:nth-child(1)  { top: 6%;  left: 4%;  animation-delay: 0s;    font-size: 30px; }
.birthday-decor span:nth-child(2)  { top: 10%; left: 24%; animation-delay: 0.8s;  font-size: 22px; }
.birthday-decor span:nth-child(3)  { top: 16%; left: 44%; animation-delay: 1.5s;  font-size: 26px; }
.birthday-decor span:nth-child(4)  { top: 8%;  left: 64%; animation-delay: 0.4s;  font-size: 24px; }
.birthday-decor span:nth-child(5)  { top: 18%; left: 88%; animation-delay: 1.1s;  font-size: 26px; }
.birthday-decor span:nth-child(6)  { top: 30%; left: 12%; animation-delay: 1.9s;  font-size: 22px; }
.birthday-decor span:nth-child(7)  { top: 32%; left: 30%; animation-delay: 0.5s;  font-size: 24px; }
.birthday-decor span:nth-child(8)  { top: 28%; left: 55%; animation-delay: 1.3s;  font-size: 28px; }
.birthday-decor span:nth-child(9)  { top: 40%; left: 75%; animation-delay: 1.7s;  font-size: 32px; }
.birthday-decor span:nth-child(10) { top: 36%; left: 95%; animation-delay: 0.2s;  font-size: 22px; }
.birthday-decor span:nth-child(11) { top: 48%; left: 6%;  animation-delay: 1.0s;  font-size: 26px; }
.birthday-decor span:nth-child(12) { top: 55%; left: 22%; animation-delay: 0.3s;  font-size: 28px; }
.birthday-decor span:nth-child(13) { top: 50%; left: 42%; animation-delay: 1.6s;  font-size: 24px; }
.birthday-decor span:nth-child(14) { top: 58%; left: 62%; animation-delay: 2.0s;  font-size: 24px; }
.birthday-decor span:nth-child(15) { top: 52%; left: 82%; animation-delay: 0.6s;  font-size: 30px; }
.birthday-decor span:nth-child(16) { top: 72%; left: 14%; animation-delay: 1.4s;  font-size: 26px; }
.birthday-decor span:nth-child(17) { top: 68%; left: 34%; animation-delay: 0.9s;  font-size: 22px; }
.birthday-decor span:nth-child(18) { top: 74%; left: 54%; animation-delay: 1.8s;  font-size: 28px; }
.birthday-decor span:nth-child(19) { top: 70%; left: 74%; animation-delay: 0.7s;  font-size: 24px; }
.birthday-decor span:nth-child(20) { top: 72%; left: 90%; animation-delay: 1.2s;  font-size: 30px; }
.birthday-decor span:nth-child(21) { top: 88%; left: 8%;  animation-delay: 0.5s;  font-size: 24px; }
.birthday-decor span:nth-child(22) { top: 84%; left: 28%; animation-delay: 1.5s;  font-size: 28px; }
.birthday-decor span:nth-child(23) { top: 90%; left: 48%; animation-delay: 0.1s;  font-size: 22px; }
.birthday-decor span:nth-child(24) { top: 86%; left: 68%; animation-delay: 1.1s;  font-size: 26px; }
.birthday-decor span:nth-child(25) { top: 92%; left: 88%; animation-delay: 1.9s;  font-size: 28px; }
@keyframes birthdayFloat {
  0%, 100% { transform: translateY(0) rotate(0deg); }
  50% { transform: translateY(-14px) rotate(6deg); }
}
body.birthday-hidden .birthday-decor { display: none !important; }
</style>

<nav class="sb-topnav navbar navbar-expand navbar-dark">
  <button class="btn btn-link btn-sm" id="sidebarToggle"><i class="fas fa-bars"></i></button>
  <a class="navbar-brand" href="<?php echo base_url(); ?>/Siaportal/dashboard" style="margin-left:6px;">
    <div class="brand-logo-circle"><img src="<?php echo base_url(); ?>/public/assets_client/img/sia_icon.png" alt="Siaportal"></div>
    Siaportal
  </a>

  <?php if (!empty($todayBirthdays)) {
      if (count($todayBirthdays) > 1) {
          $bbNames = array_map(function($r){ return esc($r['name']); }, $todayBirthdays);
          $bbText = 'Happy Birthday, ' . implode(', ', array_slice($bbNames, 0, -1)) . ' & ' . end($bbNames) . '!';
      } else {
          $singleName = $todayBirthdays[0]['name'];
          // The Name field is sometimes used to hold a full custom greeting rather than just a
          // plain name (e.g. "Happy Birthday! Munish Joshi Sir Wishing you...") — don't prefix
          // "Happy Birthday," onto something that already says it, or it reads twice.
          $bbText = (stripos($singleName, 'happy birthday') !== false)
              ? esc($singleName)
              : 'Happy Birthday, ' . esc($singleName) . '!';
      }
      // Anything long enough to risk clipping in the navbar's fixed-height row scrolls instead;
      // short text just sits still. Scroll speed scales with length so it stays readable.
      $bbIsLong = mb_strlen($bbText) > 28;
      $bbDuration = max(10, round(mb_strlen($bbText) / 6));
  ?>
  <div class="birthday-banner" id="birthdayBanner">
    <span class="bb-emoji">🎉🎂🎈</span>
    <span class="bb-text-wrap">
      <span class="bb-text<?php echo $bbIsLong ? '' : ' bb-text-short'; ?>" style="--bb-scroll-duration: <?php echo $bbDuration; ?>s;"><?php echo $bbText; ?></span>
    </span>
  </div>
  <?php } ?>

  <ul class="navbar-nav ml-auto" style="display:flex;align-items:center;gap:18px;">
    <li class="nav-item">
      <a class="topbar-bell" href="#" title="Notifications">
        <i class="fas fa-bell"></i>
      </a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="welcomeUserDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display:flex;align-items:center;">
        <div class="welcome-user">
          Welcome <?php echo session()->get('firstname'); ?>
          <?php $initial = strtoupper(substr((string) session()->get('firstname'), 0, 1)) ?: 'U'; ?>
          <span class="topbar-avatar"><?php echo esc($initial); ?></span>
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

<?php if (!empty($todayBirthdays)) { ?>
<div class="birthday-decor" id="birthdayDecor">
  <span>🎈</span><span>🎀</span><span>🎊</span><span>🎈</span><span>🎉</span>
  <span>🎀</span><span>🎈</span><span>🎊</span><span>🎉</span><span>🎀</span>
  <span>🎈</span><span>🎀</span><span>🎊</span><span>🎈</span><span>🎉</span>
  <span>🎀</span><span>🎈</span><span>🎊</span><span>🎉</span><span>🎀</span>
  <span>🎈</span><span>🎀</span><span>🎊</span><span>🎈</span><span>🎉</span>
</div>
<?php } ?>
<script>
// Clear any stale "hidden for today" flag from before the Stop button was removed, so it can
// never keep the banner/balloons suppressed now that there's no way to re-enable them from the UI.
(function(){
  var todayKey = 'birthday_hidden_' + new Date().toISOString().slice(0,10);
  localStorage.removeItem(todayKey);
  document.body.classList.remove('birthday-hidden');
})();
</script>
