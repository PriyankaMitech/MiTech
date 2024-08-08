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
    height: 363px;
    background-size: cover;
    background-repeat: no-repeat;
    padding: 40px 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        background-color: #ffffffb5;        /* background-image: url(http://localhost/MiTech/public/Images/back6.jpeg); */
        border-radius: 20px;
    }
    .login-card-body{
      /* background-image: url(http://localhost/MiTech/public/Images/back6.jpeg); */
      background-color: #ffffff00 !important;       

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
  color: #fff;
  background: #4FD1C5;
background: linear-gradient(90deg, rgb(36 149 152) 0%, rgba(79, 209, 197, 1) 100%);;
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
    border-radius: 99999px;
    border-radius: 1000px;
    min-width: calc(113% + 12px);
    min-height: 90px;
    min-height: calc(100% + 12px);
    border: 6px solid #189499;
    box-shadow: 0 0 60px rgb(24 148 153);
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

.login-box {
    padding: 50px 0px !important;
}
.login-card-body .input-group .input-group-text{
    color: #140000 !important;
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
        <div class="toast toast-error" aria-live="assertive" >
            <div class="toast-message">
                <?= session('error') ?>
            </div>
        </div>
    </div>
    <?php endif ?>
    <div class="login-box">
    <video autoplay loop muted>
            <source src="<?= base_url() ?>public/Images/gg.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <!-- /.login-logo -->
        <div class="card loginCard">
            <div class="login-logo">
            <img src="<?=base_url();?>public/Images/mitech.png" alt="AdminLTE Logo" class="logo">
            </div>

            
            <div class="card-body login-card-body">
            <form id="loginForm" action="<?php echo base_url();?>login" method="post">
                <div class="input-group mb-4">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-5">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <buttons type="button" id="togglePassword" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()">
                            <span class="fas fa-eye" id="eyeIcon"></span>
                        </button>
                    </div>
                    <!-- <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div> -->
                
                </div>
                <div class="row justify-content-center">
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
    
    

    function togglePasswordVisibility() {
        var passwordField = $('#password');
        var passwordIcon = $('#eyeIcon');

        // Toggle password visibility
        if (passwordField.attr('type') === 'password') {
            passwordField.attr('type', 'text');
            passwordIcon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            passwordField.attr('type', 'password');
            passwordIcon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    }
</script>

</body>

</html>