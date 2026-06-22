<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Set Prospect Limit</title>
        <link href="data:image/x-icon;base64,AAABAAEAEBAQAAAAAAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAUlL6ANPK/ACAY/8Ae17/AJ+K/wAAAO0ALwD/AKWR/wDq5v8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABmgAAAAACGYGaAAAUAAIZgZoAABQAAhmBmgAZmZgCGYGaAVmZnUIZgZok2FhY5hmBmiUVmZUmGYGaAAEZAAIZgZoAAhoAAhmBmgAACAACGYGaAAAAAAIZgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD//wAAH/EAAB7xAAAe8QAAGDEAABARAAAAAQAAAAEAABxxAAAccQAAHvEAAB/xAAD//wAA//8AAP//AAD//wAA" rel="icon" type="image/x-icon" />
        <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            body { background: #f0f4f8; }

            .form-wrapper {
                min-height: 80vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 30px 15px;
            }

            .form-card {
                background: #fff;
                border-radius: 16px;
                box-shadow: 0 8px 40px rgba(0,0,0,0.12);
                width: 100%;
                max-width: 520px;
                overflow: hidden;
            }

            .form-card-header {
                background: linear-gradient(135deg, #4CAF50, #2E7D32);
                color: #fff;
                padding: 28px 32px;
            }

            .form-card-header h2 {
                font-size: 22px;
                font-weight: 700;
                margin: 0 0 4px;
            }

            .form-card-header p {
                margin: 0;
                font-size: 13px;
                opacity: 0.85;
            }

            .form-card-body {
                padding: 28px 32px 32px;
                display: flex;
                flex-direction: column;
                gap: 18px;
            }

            .field-group label {
                display: block;
                font-size: 12px;
                font-weight: 700;
                color: #555;
                text-transform: uppercase;
                letter-spacing: 0.6px;
                margin-bottom: 7px;
            }

            .field-group label span.req {
                color: #e53935;
                margin-left: 2px;
            }

            .field-icon-wrap {
                position: relative;
            }

            .field-icon-wrap .fi {
                position: absolute;
                left: 14px;
                top: 50%;
                transform: translateY(-50%);
                color: #aaa;
                font-size: 14px;
                pointer-events: none;
            }

            .form-input {
                width: 100%;
                padding: 13px 14px 13px 40px;
                border: 2px solid #e0e0e0;
                border-radius: 10px;
                font-size: 15px;
                color: #333;
                background: #fafafa;
                outline: none;
                transition: border-color 0.2s, box-shadow 0.2s;
                box-sizing: border-box;
                appearance: none;
                -webkit-appearance: none;
                cursor: pointer;
            }

            .form-input:focus {
                border-color: #4CAF50;
                box-shadow: 0 0 0 3px rgba(76,175,80,0.12);
                background: #fff;
            }

            .select-wrap::after {
                content: '\f078';
                font-family: 'Font Awesome 5 Free';
                font-weight: 900;
                position: absolute;
                right: 14px;
                top: 50%;
                transform: translateY(-50%);
                color: #aaa;
                font-size: 12px;
                pointer-events: none;
            }

            .btn-submit {
                width: 100%;
                background: linear-gradient(135deg, #4CAF50, #2E7D32);
                color: #fff;
                border: none;
                padding: 15px;
                border-radius: 10px;
                font-size: 16px;
                font-weight: 700;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                transition: opacity 0.2s, transform 0.1s;
                margin-top: 4px;
            }

            .btn-submit:hover { opacity: 0.92; }
            .btn-submit:active { transform: scale(0.98); }

            label.error {
                display: block;
                color: #e53935;
                font-size: 12px;
                font-weight: 500;
                margin-top: 5px;
                text-transform: none;
                letter-spacing: 0;
            }
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
                    <div class="container-fluid">
                        <div class="form-wrapper">
                            <div class="form-card">

                                <div class="form-card-header">
                                    <h2>View Prospects</h2>
                                    <p>Select how many entries to load, then click View.</p>
                                </div>

                                <form id="contactForm" method="post" action="<?php echo base_url();?>/Siaportal/view_prospect" enctype="multipart/form-data" target="_blank">
                                    <div class="form-card-body">

                                        <!-- Entries -->
                                        <div class="field-group">
                                            <label for="entries">Entries per Page <span class="req">*</span></label>
                                            <div class="select-wrap field-icon-wrap">
                                                <i class="fas fa-list-ol fi"></i>
                                                <select class="form-input" name="entries" id="entries">
                                                    <option value="">Select Entries</option>
                                                    <option value="50">50 Entries (Per page – Fast)</option>
                                                    <option value="all">All Entries (Slow)</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Submit -->
                                        <button type="submit" class="btn-submit">
                                            <i class="fas fa-eye"></i> View Prospects
                                        </button>

                                    </div>
                                </form>

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
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

        <script>
        $(document).ready(function () {
            $('#contactForm').validate({
                rules: {
                    entries: { required: true }
                },
                messages: {
                    entries: 'Please select the number of entries'
                },
                errorElement: 'label'
            });
        });
        </script>
    </body>
</html>
