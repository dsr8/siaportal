<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Siaportal  - forget Password</title>
    <!-- **updated ** --->	<link href="https://canada.siaimmigration.com/public/dist/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://canada.siaimmigration.com/public/assets/css/style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="main-page" >
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                   <div class="loginform container-fluid">
  <div class="row">
    <div class="col-md-6 ">
    </div>
    <div class="offset-6 col-md-6">

      <div class="main-login-form">
        <h3>Forgot password</h3>
        <hr>
        <?php if (session()->get('success')): ?>
          <div class="alert alert-success" role="alert">
            <?= session()->get('success') ?>
          </div>
        <?php endif; ?>
        <form class="" action="<?php  base_url();?>/Siaportal/forget_pass" method="post">
          <div class="form-group">
           <label for="email">Email address</label>
           <input type="text" class="form-control" name="email" id="email" value="">
          </div>
          <!--div class="form-group">
           <label for="password">Password</label>
           <input type="password" class="form-control" name="password" id="password" value="">
          </div-->
          <?php if (isset($validation)): ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?php $validation->listErrors() ?>
              </div>
            </div>
          <?php endif; ?>
          <div class="row">
            <div class="col-12 col-sm-4">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-12 col-sm-8 text-right">
              <a href="<?php  base_url();?>/Siaportal/index">Home</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
                </main>
            </div>
            <!--div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; siaimmigration.com</div>
                            <div>
                                <!--a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a-->
                            <!--/div>
                        </div>
                    </div>
                </footer>
            </div-->
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="public/dist/js/scripts.js"></script>
    </body>
</html>
