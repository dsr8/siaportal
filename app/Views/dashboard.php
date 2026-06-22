<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Siaportal – Dashboard</title>
    <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

<style>
/* ═══════════════════════════════════════════════════════════
   SIA PORTAL — Dashboard (Premium)
   Palette: Midnight Navy #111827 · Emerald #4CAF50 · Lime #7BC043
            Golden Yellow #F4B400 · Coral Red #FF4D5A · White #FFFFFF
            Soft Grey #F5F7FA · Border Grey #E5E7EB
            Charcoal Text #1F2937 · Secondary Text #6B7280
   ═══════════════════════════════════════════════════════════ */

@keyframes fadeUp { from { opacity:0; transform:translateY(16px); } to { opacity:1; transform:translateY(0); } }

/* ── Global ─────────────────────────────────────────────── */
body.sb-nav-fixed {
    background: #F5F7FA;
    font-family: 'Poppins', 'Segoe UI', sans-serif;
}
#layoutSidenav_content { background:transparent; }
main.container-fluid { padding:26px 24px !important; }

/* ── Page heading ────────────────────────────────────────── */
h1.mt-4 { color:#1F2937 !important; font-size:22px; font-weight:700; margin-bottom:2px !important; font-family:'Poppins',sans-serif; }
.breadcrumb { background:transparent !important; padding:0 !important; }
.breadcrumb-item.active { color:#6B7280 !important; font-size:12px; }

/* ── Stat cards ──────────────────────────────────────────── */
.dash-stat-card {
    border-radius: 16px; padding: 20px 20px 0;
    position: relative; overflow: hidden; min-height: 150px;
    box-shadow: 0 4px 16px rgba(17,24,39,.08);
    transition: transform .2s, box-shadow .2s;
    margin-bottom: 22px;
    animation: fadeUp .4s ease both;
    display:flex; flex-direction:column;
}
.dash-stat-card:nth-child(1) { animation-delay:.04s; }
.dash-stat-card:nth-child(2) { animation-delay:.08s; }
.dash-stat-card:nth-child(3) { animation-delay:.12s; }
.dash-stat-card:nth-child(4) { animation-delay:.16s; }
.dash-stat-card:hover { transform:translateY(-4px); box-shadow:0 12px 28px rgba(17,24,39,.16); }

.dash-stat-card.emerald { background:#4CAF50; }
.dash-stat-card.gold    { background:#F4B400; }
.dash-stat-card.lime    { background:#7BC043; }
.dash-stat-card.coral   { background:#FF4D5A; }

.dash-stat-icon {
    position:absolute; top:18px; right:18px;
    width:44px; height:44px; border-radius:50%;
    background:rgba(255,255,255,.25);
    display:flex; align-items:center; justify-content:center;
    font-size:18px; color:#fff; z-index:2;
}

.dash-stat-title  { color:rgba(255,255,255,.92); font-size:14.5px; font-weight:600; margin-bottom:10px; position:relative; z-index:2; padding-right:50px; }
.dash-stat-number { color:#fff; font-size:30px; font-weight:700; line-height:1; margin-bottom:16px; position:relative; z-index:2; }

/* White footer strip */
.dash-stat-footer {
    background:#fff; margin:0 -20px; padding:11px 20px;
    font-size:12.5px; font-weight:600; display:flex; align-items:center; gap:6px;
}
.dash-stat-footer.up   { color:#2f8132; }
.dash-stat-footer.down { color:#d4303d; }
.dash-stat-footer span.muted { color:#6B7280; font-weight:500; }

/* ── Section cards ───────────────────────────────────────── */
.dash-section-card {
    background:#fff; border:1px solid #E5E7EB;
    border-radius:16px; margin-bottom:22px; overflow:hidden;
    box-shadow:0 2px 10px rgba(17,24,39,.05);
    animation: fadeUp .4s ease both;
}
.dash-section-card:nth-child(1) { animation-delay:.18s; }
.dash-section-card:nth-child(2) { animation-delay:.22s; }

.dash-section-header {
    display:flex; align-items:center; justify-content:space-between;
    padding:16px 22px; border-bottom:1px solid #E5E7EB; background:#fff;
}
.dash-section-header h6 { color:#1F2937; font-size:15px; font-weight:700; margin:0; display:flex; align-items:center; gap:10px; letter-spacing:.2px; }
.dash-section-header h6 i { font-size:16px; color:#4CAF50; }

.view-all-btn {
    border:1px solid #E5E7EB; background:#fff;
    color:#1F2937; font-size:12.5px; font-weight:600; padding:6px 16px;
    border-radius:20px; text-decoration:none; transition:all .2s;
    letter-spacing:.2px;
}
.view-all-btn:hover { background:#F5F7FA; color:#1F2937; border-color:#4CAF50; }
.dash-section-body { padding:0; }

/* DataTables pagination/info (restyled to match palette) */
.dataTables_wrapper { padding:8px 20px 16px; }
.dataTables_wrapper .dataTables_info { color:#6B7280; font-size:12.5px; padding-top:6px; }
.dataTables_wrapper .dataTables_paginate { margin-top:4px; }
.dataTables_wrapper .dataTables_paginate .paginate_button {
    border:1px solid #E5E7EB !important; background:#fff !important;
    color:#6B7280 !important; border-radius:7px !important; padding:4px 10px !important;
    margin-left:5px !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background:#4CAF50 !important; border-color:#4CAF50 !important; color:#fff !important; font-weight:700;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background:#F5F7FA !important; color:#1F2937 !important; border-color:#E5E7EB !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
    color:#D1D5DB !important;
}

/* ── Tables ──────────────────────────────────────────────── */
.dash-table { width:100%; border-collapse:collapse; }
.dash-table thead th {
    background:rgba(76,175,80,.07); color:#1F2937; font-size:12.5px; font-weight:700;
    padding:12px 18px; border-bottom:1px solid #E5E7EB;
}
.dash-table tbody td {
    color:#1F2937; font-size:13.5px; padding:13px 18px;
    border-bottom:1px solid #F5F7FA; vertical-align:middle;
}
.dash-table tbody tr:last-child td { border-bottom:none; }
.dash-table tbody tr { transition:background .15s; }
.dash-table tbody tr:hover td { background:#F5F7FA; }

.file-icon {
    width:30px; height:30px; border-radius:8px; flex-shrink:0;
    display:inline-flex; align-items:center; justify-content:center;
    color:#fff; font-size:13px; margin-right:6px;
}
.file-icon.pdf  { background:#FF4D5A; }
.file-icon.doc  { background:#4C6FFF; }
.file-icon.img  { background:#4CAF50; }
.client-cell .upload-by { color:#6B7280; font-size:11.5px; }

/* ── Birthday ────────────────────────────────────────────── */
.birthday-empty {
    display:flex; flex-direction:column; align-items:center;
    justify-content:center; padding:30px 20px 36px; text-align:center;
}
.birthday-empty .cake-wrap {
    position:relative; width:170px; height:170px; margin-bottom:18px;
}
.birthday-empty .cake-circle {
    width:140px; height:140px; border-radius:50%;
    background:#F5F7FA;
    display:flex; align-items:center; justify-content:center;
    font-size:54px; color:#F4B400;
    position:absolute; top:15px; left:15px;
}
.birthday-empty .confetti {
    position:absolute; border-radius:50%;
}
.birthday-empty .confetti.c1 { width:10px; height:10px; background:#FF4D5A; top:8px; right:18px; }
.birthday-empty .confetti.c2 { width:8px; height:8px; background:#4CAF50; bottom:14px; left:4px; }
.birthday-empty .confetti.c3 { width:7px; height:7px; background:#F4B400; bottom:0; right:30px; }
.birthday-empty .confetti.c4 { width:0; height:0; top:30px; left:0; border:none; background:none; color:#4C6FFF; font-size:16px; font-weight:700; }
.birthday-empty .confetti.c5 { width:0; height:0; bottom:40px; right:0; border:none; background:none; color:#FF4D5A; font-size:14px; font-weight:700; }
.birthday-empty h5 { color:#1F2937; font-size:16px; font-weight:700; margin-bottom:4px; }
.birthday-empty p  { color:#6B7280; font-size:13px; margin-bottom:6px; }
.birthday-empty .wish { color:#4CAF50; font-size:13px; font-weight:600; }

.birthday-row { display:flex; align-items:center; gap:13px; padding:12px 20px; border-bottom:1px solid #F5F7FA; transition:background .15s; }
.birthday-row:last-child { border-bottom:none; }
.birthday-row:hover { background:#F5F7FA; }
.birthday-avatar {
    width:40px; height:40px; border-radius:50%; flex-shrink:0;
    background:#7BC043;
    display:flex; align-items:center; justify-content:center;
    color:#fff; font-weight:700; font-size:15px;
}
.birthday-info .name  { color:#1F2937; font-size:13px; font-weight:700; }
.birthday-info .phone { color:#6B7280; font-size:12px; }
.birthday-dob {
    margin-left:auto; background:rgba(244,180,0,.12); color:#b8860a;
    font-size:11px; font-weight:700; padding:4px 10px;
    border-radius:20px; border:1px solid rgba(244,180,0,.3);
    white-space:nowrap;
}

/* ── Footer ──────────────────────────────────────────────── */
footer.py-4 { background:#fff !important; border-top:1px solid #E5E7EB; }
footer .text-muted { color:#6B7280 !important; font-size:12.5px; }
</style>
</head>
<body class="sb-nav-fixed">
<?= view('admininclude/header.php'); ?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php include 'admininclude/admin_nav.php' ?>
    </div>
    <div id="layoutSidenav_content">
        <main class="container-fluid">

            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item active">Overview</li>
            </ol>

            <!-- ── Stat Cards ── -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="dash-stat-card emerald">
                        <div class="dash-stat-icon"><i class="fas fa-calendar-check"></i></div>
                        <div class="dash-stat-title">Appointment scheduled(<?php echo count($prospect); ?>)</div>
                        <div class="dash-stat-number count-up" data-target="<?php echo count($prospect); ?>">0</div>
                        <div class="dash-stat-footer up">
                            <i class="fas fa-arrow-up"></i> 12% <span class="muted">this week</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="dash-stat-card gold">
                        <div class="dash-stat-icon"><i class="fas fa-check-circle"></i></div>
                        <div class="dash-stat-title">Approved(<?php echo count($approve_count); ?>)</div>
                        <div class="dash-stat-number count-up" data-target="<?php echo count($approve_count); ?>">0</div>
                        <div class="dash-stat-footer up">
                            <i class="fas fa-arrow-up"></i> 8% <span class="muted">this week</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="dash-stat-card lime">
                        <div class="dash-stat-icon"><i class="fas fa-file-alt"></i></div>
                        <div class="dash-stat-title">Ready to apply(<?php echo count($ready_to_apply); ?>)</div>
                        <div class="dash-stat-number count-up" data-target="<?php echo count($ready_to_apply); ?>">0</div>
                        <div class="dash-stat-footer up">
                            <i class="fas fa-arrow-up"></i> 15% <span class="muted">this week</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="dash-stat-card coral">
                        <div class="dash-stat-icon"><i class="fas fa-times-circle"></i></div>
                        <div class="dash-stat-title">Refused(<?php echo count($refused); ?>)</div>
                        <div class="dash-stat-number count-up" data-target="<?php echo count($refused); ?>">0</div>
                        <div class="dash-stat-footer down">
                            <i class="fas fa-arrow-down"></i> 3% <span class="muted">this week</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ── Section Row 1 ── -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="dash-section-card sc-green">
                        <div class="dash-section-header">
                            <h6><i class="fas fa-file-import"></i>Document upload by client</h6>
                            <a href="#" class="view-all-btn">View All</a>
                        </div>
                        <div class="dash-section-body">
                            <div class="table-responsive">
                                <table class="dash-table" id="docUploadTable" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Siaportal id</th>
                                            <th>client name/Upload By</th>
                                            <th>Document</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($doc_upload)): ?>
                                            <?php foreach ($doc_upload as $doc):
                                                $docName = $doc['doc_name'] ?? '';
                                                $ext = strtolower(pathinfo($docName, PATHINFO_EXTENSION));
                                                if (in_array($ext, ['doc','docx'])) { $fIcon='fa-file-word'; $fClass='doc'; }
                                                elseif (in_array($ext, ['jpg','jpeg','png','gif'])) { $fIcon='fa-file-image'; $fClass='img'; }
                                                else { $fIcon='fa-file-pdf'; $fClass='pdf'; }
                                            ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($doc['id'] ?? ''); ?></td>
                                                <td><?php echo htmlspecialchars($doc['siaportal_id'] ?? ''); ?></td>
                                                <td>
                                                    <?php echo htmlspecialchars($doc['name'] ?? ''); ?>
                                                    <?php if(!empty($doc['upload_by'])): ?><br><span class="upload-by"><?php echo htmlspecialchars($doc['upload_by']); ?></span><?php endif; ?>
                                                </td>
                                                <td><span class="file-icon <?php echo $fClass; ?>"><i class="fas <?php echo $fIcon; ?>"></i></span><?php echo htmlspecialchars($docName); ?></td>
                                                <td><?php echo htmlspecialchars($doc['insert_on'] ?? ''); ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr><td colspan="5" style="text-align:center;color:#6B7280;padding:30px;font-size:13px;"><i class="fas fa-folder-open" style="font-size:28px;display:block;margin-bottom:8px;color:#E5E7EB;"></i>No documents uploaded yet.</td></tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="dash-section-card sc-yellow">
                        <div class="dash-section-header">
                            <h6><i class="fas fa-birthday-cake"></i>Birth Day</h6>
                            <a href="#" class="view-all-btn">View All</a>
                        </div>
                        <div class="dash-section-body">
                            <?php if (!empty($dob)): ?>
                                <?php foreach ($dob as $db): ?>
                                <div class="birthday-row">
                                    <div class="birthday-avatar"><?php echo strtoupper(substr($db['heading'],0,1)); ?></div>
                                    <div class="birthday-info">
                                        <div class="name"><?php echo htmlspecialchars($db['heading']); ?></div>
                                        <div class="phone"><i class="fas fa-phone-alt" style="font-size:10px;margin-right:3px;"></i><?php echo htmlspecialchars($db['number']); ?></div>
                                    </div>
                                    <div class="birthday-dob"><i class="fas fa-gift" style="margin-right:3px;"></i><?php echo $db['user_dob']; ?></div>
                                </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="birthday-empty">
                                    <div class="cake-wrap">
                                        <div class="cake-circle"><i class="fas fa-birthday-cake"></i></div>
                                        <span class="confetti c1"></span>
                                        <span class="confetti c2"></span>
                                        <span class="confetti c3"></span>
                                        <span class="confetti c4">+</span>
                                        <span class="confetti c5">+</span>
                                    </div>
                                    <h5>No Data Found</h5>
                                    <p>There are no birthdays today.</p>
                                    <div class="wish">Have a wonderful day!</div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>


        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">© <?php echo date('Y'); ?> Siaportal — SIA Immigration</div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script>
/* DataTable for doc uploads */
$(document).ready(function(){
    if($('#docUploadTable tbody tr').length > 1 || ($('#docUploadTable tbody tr').length === 1 && $('#docUploadTable tbody tr td').length > 1)){
        $('#docUploadTable').DataTable({
            pageLength: 5,
            lengthChange: false,
            searching: false,
            ordering: false,
            language: { paginate: { previous: '&lsaquo;', next: '&rsaquo;' } }
        });
    }
});

/* Collapse button icon/text sync now lives in admininclude/admin_nav.php (shared across all admin pages) */

/* Count-up animation */
document.querySelectorAll('.count-up').forEach(function(el){
    var target = parseInt(el.dataset.target) || 0;
    var duration = 1000;
    var step = Math.max(1, Math.floor(target / (duration / 16)));
    var current = 0;
    var timer = setInterval(function(){
        current = Math.min(current + step, target);
        el.textContent = current;
        if (current >= target) clearInterval(timer);
    }, 16);
});
</script>
</body>
</html>
