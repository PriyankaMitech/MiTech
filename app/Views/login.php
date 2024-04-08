<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="public/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="public/assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div id="flash-message-container">
        <?php if (session()->has('errormessage')) : ?>
            <div class="flash-message">
                <?= session('errormessage') ?>
            </div>
        <?php endif; ?>
    </div>


    <div id="flash-success-container">
        <?php if (session()->has('success')) : ?>
            <div class="flash-success">
                <?= session('success') ?>
            </div>
        <?php endif; ?>
    </div>
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="card">
  <div class="login-logo">
    <a href="public/assets/index2.html"><b>Admin</b>LTE</a>
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
<script src="public/assets/plugins/jquery/jquery.min.js"></script>
<script src="public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="public/assets/dist/js/adminlte.min.js"></script>
<script>
  
</script>
</body>
</html>
