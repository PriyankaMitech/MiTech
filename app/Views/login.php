<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?=base_url(); ?>/public/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?=base_url(); ?>/public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?=base_url(); ?>/public/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?=base_url(); ?>/public/assets/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="<?=base_url(); ?>/public/assets/dist/css/adminlte.min.css">


  <style>
    .login-page{
      background-image: url('<?php echo base_url() ?>public/Images/binary.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh; /* Ensure the background covers the entire viewport height */
            margin: 0; /* Remove default body margin */
            display: flex; /* Center content vertically */
            align-items: center; /* Center content vertically */
            justify-content: center; /* Center content horizontally */
    }
  </style>
</head>
<body class="hold-transition login-page">
<div id="flash-success-container">
        <?php if (session()->has('success')) : ?>
            <div class="flash-success">
                <?= session('success') ?>
            </div>
        <?php endif; ?>
    </div> 
    <?php if (session()->has('error')): ?>

<div id="toast-container" class="toast-top-right">
  <div class="toast toast-error" aria-live="assertive" style="">
    <div class="toast-message">                
      <?= session('error') ?>
    </div>
  </div>
</div>
<?php endif ?><div class="login-box">
  
  <!-- /.login-logo -->
  <div class="card loginCard">
  <div class="login-logo">
    <a href="<?=base_url(); ?>/public/assets/index2.html"><b>MiTech</b></a>
  </div>
  <div class="card-body login-card-body">
    <form id="loginForm" action="<?php echo base_url();?>login" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <label for="remember">
              </label>
            </div>
          </div>
          <div class="col-4">
                <button type="submit" id="submitBtn" class="btn btn-primary btn-block">Sign In</button>
            </div>
        </div>
    </form>
    </div>
  </div>
</div>
<script src="<?=base_url(); ?>/public/assets/plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url(); ?>/public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url(); ?>/public/assets/dist/js/adminlte.min.js"></script>
<script>
    // jQuery function to hide the success message after 5 seconds
    $(document).ready(function() {
      setTimeout(function() {
        $(".toast").fadeOut(1000);
      }, 5000); // 5000 milliseconds = 5 seconds
    });
  </script>
</body>
</html>
