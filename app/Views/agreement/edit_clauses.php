<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Edit Clause Text - Agreement #<?php echo (int) $agreement['id']; ?></title>
        <link rel="icon" type="image/png" href="<?php echo base_url();?>/public/assets_client/img/favicon.png" />
        <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <style>
            .ec-page { font-family: 'Segoe UI', Arial, sans-serif; color: #1f2430; padding-top: 6px; }
            .ec-page * { box-sizing: border-box; }
            .ec-top-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 10px; }
            .ec-top-row h4 { margin: 0; }
            .ec-back { font-size: 13px; font-weight: 600; color: #6b7280; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; }
            .ec-back:hover { color: #1f2430; }

            .ec-note { background: #eef4ff; color: #1f2430; font-size: 13px; padding: 12px 16px; border-radius: 10px; margin-bottom: 20px; }
            .ec-note strong { color: #2f5fd6; }

            .ec-card { background: #fff; border-radius: 14px; padding: 20px 22px; margin-bottom: 18px; box-shadow: 0 2px 10px rgba(20,20,43,0.05); }
            .ec-card-head { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; flex-wrap: wrap; gap: 8px; }
            .ec-card-head h5 { margin: 0; font-size: 14.5px; font-weight: 700; color: #1f2430; }
            .ec-badge-custom { display: none; font-size: 11px; font-weight: 700; color: #e08e2b; background: #fdf1e3; padding: 3px 10px; border-radius: 10px; }
            .ec-card.ec-is-custom .ec-badge-custom { display: inline-block; }
            .ec-reset-link { font-size: 12.5px; font-weight: 600; color: #9aa0aa; cursor: pointer; background: none; border: none; padding: 0; }
            .ec-reset-link:hover { color: #e23b3b; }

            .ec-actions-row { position: sticky; bottom: 0; background: #fff; border-radius: 14px; padding: 16px 22px; box-shadow: 0 -4px 16px rgba(20,20,43,0.08); display: flex; gap: 10px; align-items: center; z-index: 10; }
            .ec-btn-save { background: #e23b3b; color: #fff; border: none; padding: 12px 26px; border-radius: 10px; font-size: 14px; font-weight: 700; cursor: pointer; box-shadow: 0 4px 12px rgba(226,59,59,0.28); }
            .ec-btn-save:hover { background: #c92f2f; }
            .ec-save-hint { font-size: 12.5px; color: #6b7280; }

            .ec-locked-banner { background: #fdecec; color: #c0392b; font-weight: 700; font-size: 13.5px; padding: 14px 18px; border-radius: 10px; margin-bottom: 18px; }

            #ec-toast { display: none; position: fixed; bottom: 24px; right: 24px; background: #1e7e42; color: #fff; padding: 12px 20px; border-radius: 8px; font-size: 13.5px; z-index: 9999; box-shadow: 0 6px 20px rgba(0,0,0,0.2); }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <?= view('admininclude/header.php'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?= view('admininclude/admin_nav'); ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid ec-page">

                        <div class="ec-top-row">
                            <div>
                                <h4>Edit Clause Text</h4>
                                <a class="ec-back" href="<?php echo base_url('agreement/Agreement/detail/' . $agreement['id']); ?>">&larr; Back to Agreement #<?php echo (int) $agreement['id']; ?> (<?php echo esc($agreement['client_name']); ?>)</a>
                            </div>
                        </div>

                        <?php if (!empty($flashMsg = session()->getFlashdata('message'))): ?>
                            <div class="ec-note" style="background:#e8f8ee;color:#1e7e42;"><?php echo esc($flashMsg); ?></div>
                        <?php endif; ?>
                        <?php if (!empty($flashErr = session()->getFlashdata('error'))): ?>
                            <div class="ec-locked-banner"><?php echo esc($flashErr); ?></div>
                        <?php endif; ?>

                        <div class="ec-note">
                            <strong>Only this agreement is affected.</strong> Changes here apply solely to Agreement #<?php echo (int) $agreement['id']; ?> — every other agreement keeps the standard wording. Clause 6 (Payment Terms and Conditions) isn't shown here; it's always generated automatically from the fee amounts entered on the main Edit Agreement page.
                        </div>

                        <form id="ecForm" method="post" action="<?php echo base_url('agreement/Agreement/save_clauses/' . $agreement['id']); ?>">
                            <?php foreach ($clauses as $i => $clause): ?>
                                <?php if ($i === $feeClauseIndex) continue; ?>
                                <?php $isCustom = ($clauseHtml[$i] ?? '') !== ($defaultHtml[$i] ?? ''); ?>
                                <div class="ec-card<?php echo $isCustom ? ' ec-is-custom' : ''; ?>" id="ec-card-<?php echo $i; ?>">
                                    <div class="ec-card-head">
                                        <h5><?php echo esc($clause['title']); ?> <span class="ec-badge-custom">Edited</span></h5>
                                        <button type="button" class="ec-reset-link" onclick="ecReset(<?php echo $i; ?>)">Reset to standard text</button>
                                    </div>
                                    <textarea class="ec-editor" id="ec_clause_<?php echo $i; ?>" name="clause[<?php echo $i; ?>]"><?php echo $clauseHtml[$i] ?? ''; ?></textarea>
                                </div>
                            <?php endforeach; ?>

                            <div class="ec-actions-row">
                                <button type="submit" class="ec-btn-save">Save Clause Text</button>
                                <span class="ec-save-hint">Saves every clause above together.</span>
                            </div>
                        </form>

                    </div>
                </main>
            </div>
        </div>
        <div id="ec-toast"></div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
        <script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>
        <script>
            var ecDefaults = <?php echo json_encode($defaultHtml); ?>;
            var ecEditors = {}; // ta.id -> CKEditor 5 instance

            document.querySelectorAll('.ec-editor').forEach(function (ta) {
                ClassicEditor.create(ta, {
                    toolbar: ['bold', 'italic', 'underline', '|', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
                }).then(function (editor) {
                    ecEditors[ta.id] = editor;

                    // Marks a clause card as "Edited" the moment its content actually differs
                    // from the standard default — checked on every keystroke, not just on save.
                    editor.model.document.on('change:data', function () {
                        var idx = ta.id.replace('ec_clause_', '');
                        var card = document.getElementById('ec-card-' + idx);
                        if (!card) return;
                        var isDefault = editor.getData().trim() === (ecDefaults[idx] || '').trim();
                        card.classList.toggle('ec-is-custom', !isDefault);
                    });
                });
            });

            function ecReset(idx) {
                var editor = ecEditors['ec_clause_' + idx];
                if (!editor) return;
                editor.setData(ecDefaults[idx] || '');
            }

            // CKEditor 5 doesn't keep the original <textarea> synced live — it only writes
            // back into it on demand, so the form's real submitted values must be pulled from
            // each editor instance right before the browser actually serializes the form.
            document.getElementById('ecForm').addEventListener('submit', function () {
                Object.keys(ecEditors).forEach(function (id) {
                    ecEditors[id].updateSourceElement();
                });
            });
        </script>
    </body>
</html>
