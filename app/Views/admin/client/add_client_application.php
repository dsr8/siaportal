<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Add Client Application</title>
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
                background: linear-gradient(135deg, #1a73e8, #0d47a1);
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
                border-color: #1a73e8;
                box-shadow: 0 0 0 3px rgba(26,115,232,0.12);
                background: #fff;
            }

            /* arrow for select */
            .select-wrap {
                position: relative;
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
                background: linear-gradient(135deg, #1a73e8, #0d47a1);
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
                                    <h2>Add Client Application</h2>
                                    <p>Select category, type, status and assign a team member.</p>
                                </div>

                                <form id="myform" method="post" action="<?php echo base_url();?>/Siaportal/add_client_application/<?php echo $id;?>">
                                    <input type="hidden" name="Siaportal_id" value="<?php echo $id;?>">

                                    <div class="form-card-body">

                                        <!-- Category -->
                                        <div class="field-group">
                                            <label for="category">Category <span class="req">*</span></label>
                                            <div class="select-wrap field-icon-wrap">
                                                <i class="fas fa-folder fi"></i>
                                                <select class="form-input" name="category" id="category" onchange="dev(this.value)">
                                                    <option value="">Select Category</option>
                                                    <?php foreach($category as $ct) { ?>
                                                        <option value="<?php echo $ct['id'];?>"><?php echo $ct['category'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Type -->
                                        <div class="field-group">
                                            <label for="subcat11">Type <span class="req">*</span></label>
                                            <div class="select-wrap field-icon-wrap">
                                                <i class="fas fa-tag fi"></i>
                                                <select class="form-input" name="type" id="subcat11" onchange="status()">
                                                    <option value="">Select Type</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Status -->
                                        <div class="field-group">
                                            <label for="file_status">Status <span class="req">*</span></label>
                                            <div class="select-wrap field-icon-wrap">
                                                <i class="fas fa-info-circle fi"></i>
                                                <select class="form-input" name="file_status" id="file_status">
                                                    <option value="">Select Status</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Team Member -->
                                        <div class="field-group">
                                            <label for="team_member">Assign Team Member <span class="req">*</span></label>
                                            <div class="select-wrap field-icon-wrap">
                                                <i class="fas fa-user-tie fi"></i>
                                                <select class="form-input" name="team_member" id="team_member">
                                                    <option value="">-- Select Team Member --</option>
                                                    <?php foreach($team as $tm) { ?>
                                                        <option value="<?php echo $tm['id']; ?>">
                                                            <?php echo $tm['firstname'] . ' ' . $tm['lastname']; ?> | <?php echo $tm['email']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Submit -->
                                        <button type="submit" class="btn-submit">
                                            <i class="fas fa-plus-circle"></i> Add Application
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
            $('#myform').validate({
                rules: {
                    category:    { required: true },
                    type:        { required: true },
                    file_status: { required: true },
                    team_member: { required: true }
                },
                messages: {
                    category:    'Please select a category',
                    type:        'Please select a type',
                    file_status: 'Please select a status',
                    team_member: 'Please select a team member'
                },
                errorElement: 'label'
            });
        });

        function dev(categoryid1) {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url()."/Siaportal/gettype"; ?>/' + categoryid1,
                success: function(result) {
                    $('#subcat11').html(result);
                    $('#file_status').html('<option value="">Select Status</option>');
                }
            });
        }

        function status() {
            var categoryid = document.getElementById('subcat11').value;
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url()."/Siaportal/gettype_status"; ?>/' + categoryid,
                success: function(result) {
                    $('#file_status').html(result);
                }
            });
        }
        </script>
    </body>
</html>
