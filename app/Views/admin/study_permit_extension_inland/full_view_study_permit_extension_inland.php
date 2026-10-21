<?php
$app  = isset($cpm[0]) ? $cpm[0] : array();
$prof = isset($profile[0]) ? $profile[0] : array();
$tm   = isset($team[0]) ? $team[0] : null;

// Trimmed value; unset dates (0000-00-00) count as empty.
$g = function ($row, $key) {
    $x = isset($row[$key]) ? trim((string) $row[$key]) : '';
    return strpos($x, '0000-00-00') === 0 ? '' : $x;
};
// Escaped value, or a muted note when empty.
$v = function ($row, $key) use ($g) {
    $x = $g($row, $key);
    return $x !== '' ? esc($x) : '<span class="spx-empty">Not added</span>';
};
// "View" link for an uploaded file, or a muted note when nothing was uploaded.
$file = function ($row, $key) use ($g) {
    $x = $g($row, $key);
    if ($x === '') {
        return '<span class="spx-empty">Not uploaded</span>';
    }
    return '<a class="spx-file" target="_blank" href="' . base_url() . '/assets/resume/' . esc($x, 'url') . '"><i class="fas fa-file-pdf"></i> View file</a>';
};
// TRUE when any of the given fields has a value.
$any = function ($keys) use ($g, $app) {
    foreach ($keys as $k) {
        if ($g($app, $k) !== '') {
            return true;
        }
    }
    return false;
};
// One label / value tile.
$tile = function ($label, $value, $wide = false) {
    return '<div class="spx-t' . ($wide ? ' wide' : '') . '"><div class="l">' . $label . '</div><div class="val">' . $value . '</div></div>';
};
// Completed / Pending tag for a section header.
$tag = function ($done) {
    return $done
        ? '<span class="spx-tag"><i class="fas fa-check"></i> Completed</span>'
        : '<span class="spx-tag wait">Pending</span>';
};

$name     = $g($prof, 'heading');
$initials = '';
foreach (preg_split('/\s+/', $name) as $w) {
    if ($w !== '' && strlen($initials) < 2) {
        $initials .= strtoupper(substr($w, 0, 1));
    }
}
$feeLabels = array('td_credit_card' => 'TD Credit Card', 'client' => 'Client Card');
$fee       = $g($app, 'fee');
$teamName  = $tm ? trim($tm['firstname'] . ' ' . $tm['lastname']) : '';
$editUrl   = base_url() . '/Study_permit_extension_inland/edit_study_permit_extension_inland/' . $g($app, 'category') . '/' . $g($app, 'id') . '/' . $g($prof, 'id');

// Which stages have data filled in.
$inProcess = $any(array('app_recv', 'exp_date_to_apply', 'gc_username', 'gc_password'));
$submitted = $any(array('app_sub_date', 'application_number', 'sub_confim', 'job_noc'));
$approved  = $any(array('date_work_permit', 'approval_letter'));
$refused   = $any(array('refusal_date', 'refusal_letter'));

$docCount   = count((array) $doc) + count((array) $doc1);
$voiceCount = count((array) $voice_msg);

$docs = function ($list, $emptyText) {
    if (empty($list)) {
        return '<div class="spx-none"><i class="far fa-folder-open"></i><span>' . $emptyText . '</span></div>';
    }
    $h = '<ul class="spx-docs">';
    foreach ($list as $d) {
        $h .= '<li><a target="_blank" href="' . esc($d['client_document_link'], 'attr') . '">'
            . '<span class="ic"><i class="fas fa-file-alt"></i></span>'
            . '<span class="nm">' . (trim((string) $d['doc_name']) !== '' ? esc($d['doc_name']) : '<span class="spx-empty">Untitled document</span>') . '</span>'
            . '<i class="fas fa-external-link-alt go"></i></a></li>';
    }
    return $h . '</ul>';
};
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Study Permit Extension (Inland) - Full View</title>
        <link rel="icon" type="image/png" href="<?php echo base_url();?>/public/assets_client/img/sia_icon.png?v=2" />
        <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <style>
            /* Sia colours, as in the Business Associate Agreement screens. */
            .spx-page {
                --g: #79B63C; --g-d: #5f9a28; --g-t: #eef7e6;
                --o: #F5B51B; --o-d: #b7790a; --o-t: #fef5df;
                --r: #F15B62; --r-d: #d9434a; --r-t: #fdeced;
                --b: #2f6fdf; --b-t: #e6effd;
                --ink: #111827; --text: #1f2937; --muted: #4b5563; --line: #e3e7ed; --head: #f3f4f6;
            }
            #layoutSidenav_content { background: #eef0f3; }
            .spx-page { font-family: 'Inter', 'Segoe UI', Arial, sans-serif; color: var(--text); padding: 20px 8px 34px; max-width: 1400px; }
            .spx-page * { box-sizing: border-box; }
            .spx-page a { text-decoration: none; }
            .spx-page .svg-inline--fa { flex: 0 0 auto; }

            /* Header */
            .spx-head { background: #fff; border: 1px solid var(--line); border-radius: 12px; overflow: hidden; margin-bottom: 16px; }
            .spx-tri { display: flex; height: 5px; }
            .spx-tri span { flex: 1; }
            .spx-head-main { display: flex; align-items: center; gap: 16px; flex-wrap: wrap; padding: 18px 22px; }
            .spx-avatar { flex: 0 0 56px; width: 56px; height: 56px; border-radius: 50%; background: var(--g); color: #fff; font-size: 20px; font-weight: 800; display: flex; align-items: center; justify-content: center; box-shadow: 0 0 0 4px var(--g-t); }
            .spx-who { flex: 1; min-width: 240px; }
            .spx-kicker { font-size: 11.5px; font-weight: 800; letter-spacing: .07em; text-transform: uppercase; color: var(--r-d); }
            .spx-page .spx-name { font-size: 22px; line-height: 1.25; font-weight: 800; color: var(--ink); margin: 2px 0 6px; }
            .spx-meta { display: flex; flex-wrap: wrap; gap: 4px 18px; font-size: 13.5px; font-weight: 500; color: var(--muted); }
            .spx-meta span { display: inline-flex; align-items: center; gap: 7px; }
            .spx-meta .svg-inline--fa { font-size: 12px; color: #9ca3af; }
            .spx-actions { display: flex; gap: 8px; flex-wrap: wrap; }
            .spx-btn { display: inline-flex; align-items: center; gap: 8px; height: 40px; padding: 0 16px; border-radius: 6px; font-size: 14px; font-weight: 700; border: 1px solid #cfd5de; background: #fff; color: var(--ink); }
            .spx-btn:hover, .spx-btn:focus { background: var(--head); color: var(--ink); outline: none; }
            .spx-btn-primary { background: var(--g); border-color: var(--g); color: #fff; }
            .spx-btn-primary:hover, .spx-btn-primary:focus { background: var(--g-d); border-color: var(--g-d); color: #fff; }

            .spx-facts { display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); border-top: 1px solid var(--line); background: #fafbfc; }
            .spx-fact { padding: 11px 22px; border-right: 1px solid var(--line); }
            .spx-fact:last-child { border-right: none; }
            .spx-fact .l { font-size: 11px; font-weight: 700; color: var(--muted); text-transform: uppercase; letter-spacing: .05em; }
            .spx-fact .val { font-size: 14.5px; font-weight: 800; color: var(--ink); margin-top: 3px; word-break: break-word; }
            .spx-status { display: inline-flex; align-items: center; gap: 7px; background: var(--g); color: #fff; border-radius: 4px; padding: 3px 10px; font-size: 12.5px; font-weight: 700; }
            .spx-status:before { content: ''; width: 6px; height: 6px; border-radius: 50%; background: #fff; }

            /* Coloured section boxes */
            .spx-sec { background: #fff; border: 1px solid var(--line); border-radius: 12px; overflow: hidden; margin-bottom: 16px; }
            .spx-sec-h { display: flex; align-items: center; gap: 11px; padding: 12px 18px; color: #fff; }
            .spx-sec-h h4 { margin: 0; flex: 1; font-size: 15.5px; font-weight: 800; letter-spacing: .02em; text-transform: uppercase; color: #fff; }
            .spx-sec-h .hi { display: inline-flex; align-items: center; justify-content: center; flex: 0 0 32px; width: 32px; height: 32px; border-radius: 50%; background: rgba(255,255,255,.22); font-size: 13px; }
            .spx-sec.c-blue .spx-sec-h { background: var(--b); }
            .spx-sec.c-orange .spx-sec-h { background: var(--o); }
            .spx-sec.c-green .spx-sec-h { background: var(--g); }
            .spx-sec.c-red .spx-sec-h { background: var(--r); }
            .spx-sec.c-ink .spx-sec-h { background: #374151; }
            .spx-sec.c-blue { border-color: #c9d9f7; }
            .spx-sec.c-orange { border-color: #f6dfa3; }
            .spx-sec.c-green { border-color: #cfe5ba; }
            .spx-sec.c-red { border-color: #f6c3c6; }
            .spx-sec.dim { opacity: .55; }
            .spx-sec-b { padding: 16px 18px 18px; }
            .spx-tag { display: inline-flex; align-items: center; gap: 5px; font-size: 12px; font-weight: 800; border-radius: 4px; padding: 4px 10px; background: #fff; color: var(--ink); }
            .spx-tag.wait { background: rgba(255,255,255,.25); color: #fff; }
            .spx-cnt { min-width: 26px; text-align: center; font-size: 12px; font-weight: 800; border-radius: 4px; padding: 3px 8px; background: #fff; color: var(--ink); }
            .spx-sub { display: flex; align-items: center; gap: 8px; font-size: 12px; font-weight: 800; color: var(--o-d); text-transform: uppercase; letter-spacing: .06em; margin: 18px 0 10px; }
            .spx-sub:after { content: ''; flex: 1; height: 1px; background: var(--line); }

            /* Field tiles, 4 per row */
            .spx-tiles { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 12px; }
            .spx-t { background: #f9fafb; border: 1px solid var(--line); border-radius: 8px; padding: 11px 13px; min-width: 0; }
            .spx-t.wide { grid-column: 1 / -1; }
            .spx-t .l { font-size: 12px; font-weight: 700; color: var(--muted); margin-bottom: 5px; }
            .spx-t .val { font-size: 14.5px; font-weight: 700; color: var(--ink); word-break: break-word; }
            .spx-t.wide .val { font-weight: 500; white-space: pre-wrap; }
            .spx-sec.c-blue .spx-t { border-left: 3px solid var(--b); }
            .spx-sec.c-orange .spx-t { border-left: 3px solid var(--o); }
            .spx-sec.c-green .spx-t { border-left: 3px solid var(--g); }
            .spx-sec.c-red .spx-t { border-left: 3px solid var(--r); }
            .spx-empty { color: #9ca3af; font-weight: 500; font-size: 13.5px; font-style: italic; }
            .spx-file { display: inline-flex; align-items: center; gap: 6px; color: #fff; background: var(--b); border-radius: 5px; padding: 5px 11px; font-size: 13px; font-weight: 700; }
            .spx-file:hover { background: #2459b8; color: #fff; }
            .spx-secret { display: inline-flex; align-items: center; gap: 10px; }
            .spx-secret button { border: 1px solid #cfd5de; background: #fff; border-radius: 5px; color: var(--ink); font-weight: 700; cursor: pointer; padding: 2px 9px; font-size: 12px; }

            .spx-two { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; align-items: start; }
            .spx-two .spx-tiles { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .spx-cols { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
            .spx-col-h { display: flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 800; color: var(--ink); text-transform: uppercase; letter-spacing: .04em; padding-bottom: 8px; border-bottom: 2px solid var(--line); }
            .spx-col-h .n { margin-left: auto; font-size: 12px; background: #374151; color: #fff; border-radius: 4px; padding: 2px 8px; }

            .spx-docs { list-style: none; margin: 0; padding: 4px 0 0; max-height: 420px; overflow-y: auto; }
            .spx-docs li + li { border-top: 1px solid #edf0f3; }
            .spx-docs li a { display: flex; align-items: center; gap: 11px; padding: 8px 6px; color: var(--ink); }
            .spx-docs li a:hover { background: #f6faf1; }
            .spx-docs .ic { flex: 0 0 30px; width: 30px; height: 30px; border-radius: 6px; background: var(--b-t); color: var(--b); display: flex; align-items: center; justify-content: center; font-size: 12px; }
            .spx-docs .ic.v { background: var(--g-t); color: var(--g-d); }
            .spx-docs .nm { flex: 1; min-width: 0; font-size: 14px; font-weight: 700; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
            .spx-docs .go { color: var(--muted); font-size: 11px; }
            .spx-none { display: flex; align-items: center; gap: 10px; padding: 16px 4px 4px; color: var(--muted); font-size: 13.5px; font-weight: 500; }
            .spx-none .svg-inline--fa { font-size: 20px; color: #c4cad3; }

            @media (max-width: 1100px) {
                .spx-tiles { grid-template-columns: repeat(2, minmax(0, 1fr)); }
                .spx-two, .spx-cols { grid-template-columns: 1fr; }
            }
            @media (max-width: 760px) {
                .spx-head-main { padding: 16px; }
                .spx-fact { padding: 10px 16px; }
                .spx-sec-b { padding: 14px; }
                .spx-tiles, .spx-two .spx-tiles { grid-template-columns: 1fr; }
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
                    <div class="container-fluid spx-page">

                        <!-- Header -->
                        <div class="spx-head">
                            <div class="spx-tri"><span style="background:#79B63C"></span><span style="background:#F5B51B"></span><span style="background:#F15B62"></span></div>
                            <div class="spx-head-main">
                                <div class="spx-avatar"><?php echo esc($initials !== '' ? $initials : '?'); ?></div>
                                <div class="spx-who">
                                    <div class="spx-kicker">Study Permit Extension &middot; Inland</div>
                                    <div class="spx-name"><?php echo $name !== '' ? esc($name) : 'Client'; ?></div>
                                    <div class="spx-meta">
                                        <span><i class="fas fa-envelope"></i><?php echo $v($prof, 'email'); ?></span>
                                        <span><i class="fas fa-phone-alt"></i><?php echo $v($prof, 'number'); ?></span>
                                    </div>
                                </div>
                                <div class="spx-actions">
                                    <a class="spx-btn" href="javascript:history.back()"><i class="fas fa-arrow-left"></i> Back</a>
                                    <a class="spx-btn spx-btn-primary" href="<?php echo esc($editUrl, 'attr'); ?>"><i class="fas fa-pen"></i> Edit Application</a>
                                </div>
                            </div>
                            <div class="spx-facts">
                                <div class="spx-fact"><div class="l">Status</div><div class="val"><?php echo $g($app, 'st') !== '' ? '<span class="spx-status">' . esc($g($app, 'st')) . '</span>' : '<span class="spx-empty">Not set</span>'; ?></div></div>
                                <div class="spx-fact"><div class="l">Assigned To</div><div class="val"><?php echo $teamName !== '' ? esc($teamName) : '<span class="spx-empty">Not assigned</span>'; ?></div></div>
                                <div class="spx-fact"><div class="l">SiaPortal ID</div><div class="val"><?php echo $v($prof, 'id'); ?></div></div>
                                <div class="spx-fact"><div class="l">Application ID</div><div class="val"><?php echo $v($app, 'id'); ?></div></div>
                                <div class="spx-fact"><div class="l">Application Number</div><div class="val"><?php echo $v($app, 'application_number'); ?></div></div>
                            </div>
                        </div>

                        <!-- Application In Process -->
                        <div class="spx-sec c-blue">
                            <div class="spx-sec-h"><span class="hi"><i class="fas fa-hourglass-half"></i></span><h4>Application In Process</h4><?php echo $tag($inProcess); ?></div>
                            <div class="spx-sec-b">
                                <div class="spx-tiles">
                                    <?php echo $tile('Date Of Application Received', $v($app, 'app_recv')); ?>
                                    <?php echo $tile('Information Request Sent On', $v($app, 'exp_date_to_apply')); ?>
                                    <?php echo $tile('GC KEY Username', $v($app, 'gc_username')); ?>
                                    <?php
                                    $pwd = $g($app, 'gc_password') !== ''
                                        ? '<span class="spx-secret"><span id="spxPwd" data-pwd="' . esc($g($app, 'gc_password'), 'attr') . '">&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;</span><button type="button" onclick="spxTogglePwd(this)">Show</button></span>'
                                        : '<span class="spx-empty">Not added</span>';
                                    echo $tile('GC KEY Password', $pwd);
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- Application Submitted -->
                        <div class="spx-sec c-orange">
                            <div class="spx-sec-h"><span class="hi"><i class="fas fa-paper-plane"></i></span><h4>Application Submitted</h4><?php echo $tag($submitted); ?></div>
                            <div class="spx-sec-b">
                                <div class="spx-tiles">
                                    <?php echo $tile('Date Of Submission', $v($app, 'app_sub_date')); ?>
                                    <?php echo $tile('Application Number', $v($app, 'application_number')); ?>
                                    <?php echo $tile('Address Of Immigration Document Received', $v($app, 'add_imm_doc_rec')); ?>
                                    <?php echo $tile('Fee Receipt', $file($app, 'job_noc')); ?>
                                    <?php echo $tile('Submission Confirmation', $file($app, 'sub_confim')); ?>
                                </div>
                                <div class="spx-sub"><i class="fas fa-credit-card"></i> Application Fee Payment</div>
                                <div class="spx-tiles">
                                    <?php echo $tile('Payment Mode', isset($feeLabels[$fee]) ? esc($feeLabels[$fee]) : $v($app, 'fee')); ?>
                                    <?php echo $tile('Mode Of Payment By Client', $v($app, 'mode_client_payment')); ?>
                                    <?php echo $tile('Confirm With', $v($app, 'confirm_with')); ?>
                                    <?php echo $tile('Date Of Payment Received', $v($app, 'date_of_payment_recive')); ?>
                                    <?php echo $tile('Amount', $v($app, 'amount')); ?>
                                    <?php echo $tile('Notes', $v($app, 'client_card_note'), true); ?>
                                </div>
                            </div>
                        </div>

                        <!-- Approved / Refused -->
                        <div class="spx-two">
                            <div class="spx-sec c-green<?php echo $refused && !$approved ? ' dim' : ''; ?>">
                                <div class="spx-sec-h"><span class="hi"><i class="fas fa-check"></i></span><h4>Approved</h4><?php echo $tag($approved); ?></div>
                                <div class="spx-sec-b">
                                    <div class="spx-tiles">
                                        <?php echo $tile('Date Of Approval', $v($app, 'date_work_permit')); ?>
                                        <?php echo $tile('Approval Letter', $file($app, 'approval_letter')); ?>
                                        <?php echo $tile('Notes', $v($app, 'approve_note'), true); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="spx-sec c-red<?php echo $approved ? ' dim' : ''; ?>">
                                <div class="spx-sec-h"><span class="hi"><i class="fas fa-times"></i></span><h4>Refused</h4><?php echo $refused ? '<span class="spx-tag"><i class="fas fa-times"></i> Refused</span>' : $tag(false); ?></div>
                                <div class="spx-sec-b">
                                    <div class="spx-tiles">
                                        <?php echo $tile('Date Of Refusal', $v($app, 'refusal_date')); ?>
                                        <?php echo $tile('Refusal Letter', $file($app, 'refusal_letter')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Documents -->
                        <div class="spx-sec c-ink">
                            <div class="spx-sec-h"><span class="hi"><i class="fas fa-folder-open"></i></span><h4>Documents</h4><span class="spx-cnt"><?php echo $docCount; ?></span></div>
                            <div class="spx-sec-b">
                                <div class="spx-cols">
                                    <div>
                                        <div class="spx-col-h"><i class="fas fa-user"></i> Uploaded By Client <span class="n"><?php echo count((array) $doc); ?></span></div>
                                        <?php echo $docs($doc, 'No documents uploaded by the client yet.'); ?>
                                    </div>
                                    <div>
                                        <div class="spx-col-h"><i class="fas fa-building"></i> Uploaded By Sia Immigration <span class="n"><?php echo count((array) $doc1); ?></span></div>
                                        <?php echo $docs($doc1, 'No documents uploaded by Sia yet.'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Voice notes -->
                        <div class="spx-sec c-ink">
                            <div class="spx-sec-h"><span class="hi"><i class="fas fa-microphone"></i></span><h4>Voice Notes</h4><span class="spx-cnt"><?php echo $voiceCount; ?></span></div>
                            <div class="spx-sec-b">
                                <?php if (!empty($voice_msg)) { ?>
                                    <ul class="spx-docs">
                                        <?php foreach ($voice_msg as $vm) { ?>
                                            <li><a href="javascript:void(0)"><span class="ic v"><i class="fas fa-microphone"></i></span><span class="nm"><?php echo esc($vm['insert_on']); ?></span></a></li>
                                        <?php } ?>
                                    </ul>
                                <?php } else { ?>
                                    <div class="spx-none"><i class="fas fa-microphone-slash"></i><span>No voice notes.</span></div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </main>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>
        <script>
            function spxTogglePwd(btn) {
                var el = document.getElementById('spxPwd');
                var shown = el.getAttribute('data-shown') === '1';
                el.textContent = shown ? '••••••••' : el.getAttribute('data-pwd');
                el.setAttribute('data-shown', shown ? '0' : '1');
                btn.textContent = shown ? 'Show' : 'Hide';
            }
        </script>
    </body>
</html>
