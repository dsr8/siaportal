<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Add ADR — Siaportal</title>
    <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        * { box-sizing: border-box; }
        .adr-form-wrap { max-width: 720px; margin: 30px auto; padding: 0 16px 60px; }
        .form-card { background: #fff; border-radius: 16px; box-shadow: 0 4px 24px rgba(0,0,0,0.09); overflow: hidden; }
        .form-card-head {
            background: linear-gradient(135deg, #4CAF50, #2E7D32);
            padding: 22px 28px; color: #fff;
            display: flex; align-items: center; gap: 12px;
        }
        .form-card-head .head-icon {
            width: 44px; height: 44px; border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex; align-items: center; justify-content: center;
            font-size: 20px; flex-shrink: 0;
        }
        .form-card-head h2 { font-size: 18px; font-weight: 700; margin: 0; }
        .form-card-head p  { font-size: 12px; opacity: 0.8; margin: 2px 0 0; }
        .form-card-body { padding: 28px; }

        .frow { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

        .fgroup { margin-bottom: 16px; }
        .fgroup label {
            display: block; font-size: 12px; font-weight: 700;
            color: #555; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.4px;
        }
        .fgroup label .req { color: #e74c3c; margin-left: 2px; }
        .fgroup input, .fgroup textarea, .fgroup select {
            width: 100%; padding: 10px 14px;
            border: 2px solid #e8ecf0; border-radius: 8px;
            font-size: 13px; color: #333; background: #fafbfc;
            outline: none; transition: border-color 0.2s, box-shadow 0.2s;
        }
        .fgroup input:focus, .fgroup textarea:focus {
            border-color: #4CAF50; box-shadow: 0 0 0 3px rgba(76,175,80,0.12);
            background: #fff;
        }
        .fgroup textarea { resize: vertical; min-height: 90px; }
        .fgroup input[type="file"] { padding: 8px 10px; background: #fafbfc; }

        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, #4CAF50, #2E7D32);
            color: #fff; border: none; padding: 13px;
            border-radius: 10px; font-size: 15px; font-weight: 700;
            cursor: pointer; margin-top: 8px;
            transition: opacity 0.2s, transform 0.1s;
            box-shadow: 0 4px 14px rgba(76,175,80,0.3);
        }
        .btn-submit:hover  { opacity: 0.92; }
        .btn-submit:active { transform: scale(0.98); }
        .btn-back {
            display: inline-flex; align-items: center; gap: 6px;
            color: #2E7D32; text-decoration: none; font-size: 13px;
            font-weight: 600; margin-bottom: 20px;
        }
        .btn-back:hover { text-decoration: underline; color: #2E7D32; }

        @media(max-width: 560px) { .frow { grid-template-columns: 1fr; } }
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
                <div class="adr-form-wrap">

                    <a href="<?php echo base_url('Siaportal/view_adr'); ?>" class="btn-back">&#8592; Back to ADR List</a>

                    <div class="form-card">
                        <div class="form-card-head">
                            <div class="head-icon">&#128196;</div>
                            <div>
                                <h2>Add ADR</h2>
                                <p>Record a new ADR entry</p>
                            </div>
                        </div>
                        <div class="form-card-body">

                            <form id="myform" method="post" action="<?php echo base_url();?>/Siaportal/add_adr" enctype="multipart/form-data">

                                <div class="frow">
                                    <div class="fgroup">
                                        <label>Sia Id <span class="req">*</span></label>
                                        <input type="text" name="sia_id" id="sia_id" placeholder="Enter Sia Id" required>
                                    </div>
                                    <div class="fgroup">
                                        <label>Client Name <span class="req">*</span></label>
                                        <input type="text" name="client_name" id="client_name" placeholder="Enter Client Name" required>
                                    </div>
                                </div>

                                <div class="fgroup">
                                    <label>Notes <span class="req">*</span></label>
                                    <textarea name="notes" id="notes" placeholder="Enter Notes" required></textarea>
                                </div>

                                <div class="frow">
                                    <div class="fgroup">
                                        <label>Start Date <span class="req">*</span></label>
                                        <input type="date" name="adr_start_date" id="adr_start_date" required>
                                    </div>
                                    <div class="fgroup">
                                        <label>End Date <span class="req">*</span></label>
                                        <input type="date" name="adr_end_date" id="adr_end_date" required>
                                    </div>
                                </div>

                                <div class="fgroup">
                                    <label>Application Number <span class="req">*</span></label>
                                    <input type="text" name="app_number" id="app_number" placeholder="Enter Application Number" required>
                                </div>

                                <div class="fgroup">
                                    <label>Upload Document</label>
                                    <input type="file" name="adr_doc" id="adr_doc">
                                </div>

                                <button type="submit" class="btn-submit" name="submit" value="Submit">Submit</button>
                            </form>

                        </div>
                    </div>

                </div>
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
</body>
</html>
