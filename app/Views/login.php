<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?=base_url(); ?>/public/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?=base_url(); ?>/public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="<?=base_url(); ?>/public/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?=base_url(); ?>/public/assets/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?=base_url(); ?>/public/assets/dist/css/adminlte.min.css">


    <style>
    /* .login-page {
        background-image: url('<?php echo base_url() ?>public/Images/backvideo.mp4');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        height: 100vh;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    } */
    .login-page {
            position: relative;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden; /* Ensure no scrollbars appear */
        }

        .login-page video {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: translate(-50%, -50%);
            z-index: -1; /* Ensure video is behind content */
        }

        .content {
            position: relative;
            z-index: 1; /* Ensure content is above video */
            color: white; /* Adjust text color as needed */
        }
    .loginCard {
        width: 407px;
        height: 400px;
        background-size: cover;
        background-repeat: no-repeat;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        background-color: #fff;
        background-image: url(http://localhost/MiTech/public/Images/back6.jpeg);
        border-radius: 20px;
    }
    .login-card-body{
      background-image: url(http://localhost/MiTech/public/Images/back6.jpeg);
      background-size: cover;
    }
    .login-logo{
      font-family: 'Font Awesome 5 Free';
    }
    html, body {
  height: 100%;
}

.wrap {
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.button {
  min-width: 154px;
    min-height: 56px;
    font-family: 'Nunito', sans-serif;
    font-size: 22px;
    text-transform: uppercase;
    letter-spacing: 1.3px;
    font-weight: 700;
  color: #313133;
  background: #4FD1C5;
background: linear-gradient(90deg, rgba(129,230,217,1) 0%, rgba(79,209,197,1) 100%);
  border: none;
  border-radius: 1000px;
  box-shadow: 12px 12px 24px rgba(79,209,197,.64);
  transition: all 0.3s ease-in-out 0s;
  cursor: pointer;
  outline: none;
  position: relative;
  padding: 10px;
  }

button::before {
content: '';
  border-radius: 1000px;
  min-width: calc(300px + 12px);
  min-height: calc(60px + 12px);
  border: 6px solid #00FFCB;
  box-shadow: 0 0 60px rgba(0,255,203,.64);
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  opacity: 0;
  transition: all .3s ease-in-out 0s;
}

.button:hover, .button:focus {
  color: #313133;
  transform: translateY(-6px);
}

button:hover::before, button:focus::before {
  opacity: 1;
}

button::after {
  content: '';
  width: 30px; height: 30px;
  border-radius: 100%;
  border: 6px solid #00FFCB;
  position: absolute;
  z-index: -1;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  animation: ring 1.5s infinite;
}

button:hover::after, button:focus::after {
  animation: none;
  display: none;
}

@keyframes ring {
  0% {
    width: 30px;
    height: 30px;
    opacity: 1;
  }
  100% {
    width: 300px;
    height: 300px;
    opacity: 0;
  }
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
    <video autoplay loop muted>
            <source src="<?= base_url() ?>public/Images/backvideo.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <!-- /.login-logo -->
        <div class="card loginCard">
            <div class="login-logo">
                <a href="<?=base_url(); ?>/public/assets/index2.html"><b>MiTech</b></a>
            </div>

            
            <div class="card-body login-card-body">
                <form id="loginForm" action="<?php echo base_url();?>login" method="post">
                    <div class="input-group mb-5">
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

                    </div>
                    <div class="row justify-content-center">
                        <!-- <div class="col-auto mt-5">
                            <button type="submit" id="submitBtn" class="btn btn-primary btn-block">Sign In</button>
                        </div> -->
                        <div class="wrap">
  <button class="button">Submit</button>
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