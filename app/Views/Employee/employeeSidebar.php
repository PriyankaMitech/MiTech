<?php 
$session = session();
$sessionData = $session->get('sessiondata');
$emp_name = $sessionData['emp_name']; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiTech</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?=base_url(); ?>public/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="<?=base_url(); ?>public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="<?=base_url();?>public/assets/dist/css/adminDashboard.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/dist/css/select2-bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .sidebar {

        overflow-x: none !important;
    }
    .card-secondary:not(.card-outline)>.card-header.signUp {
    background-color: #ffc107!important;
    }
    .goodMorningImage{
        background-image: url('<?php echo base_url() ?>public/Images/goodMorning3.jpg');
    background-size: cover;
    }
    .timeOutRow{
        margin-top: 8rem !important;
    }
    </style>
</head>

<body>
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?=base_url(); ?>public/assets/img/Mitechlogo.jpg" alt="AdminLTELogo"
                height="60" width="60">
            <!-- E:\xampp\htdocs\MiTech\public\assets\img\Mitechlogo.jpg -->
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url()?>logout" class="nav-link">Logout</a>
                </li>
            </ul>

            <!-- Right navbar links -->

        </nav>
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="<?=base_url(); ?>public/assets/img/Mitechlogo.jpg" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Employee</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->


                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="public/Images/Admin.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?php echo base_url()?>login" class="d-block">Employee</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="<?=base_url(); ?>public/assets/img/Mitechlogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Employee</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="public/Images/Admin.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?php echo base_url()?>login" class="d-block"><?= $emp_name  ; ?></a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                            <a href="<?php echo base_url(); ?>saveSignupTime" class="nav-link">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <p>Sign up time</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>leave_form" class="nav-link">
                                <i class="fas fa-envelope nav-icon"></i>
                                <p>Leave Form</p>
                            </a>
                        </li>
                    </ul>
                        <!-- Menu Items -->
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <?php if ($sessionData && isset($sessionData['emp_department']) && $sessionData['emp_department'] !== 'Testing'): ?>
                      
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>myTasks" class="nav-link">
                                <i class="fas fa-envelope nav-icon"></i>
                                <p>My Tasks</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>Daily_Task" class="nav-link">
                                <i class="fas fa-envelope nav-icon"></i>
                                <p>Daily Task</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>meetings" class="nav-link">
                                <i class="fas fa-envelope nav-icon"></i>
                                <p>Meetings</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                        <!-- Conditional Menu for Testing Department -->
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Menu Items -->
                        <?php if ($sessionData && isset($sessionData['emp_department']) && $sessionData['emp_department'] === 'Testing'): ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>TestingTask" class="nav-link">
                            <i class="fa fa-check" aria-hidden="true"></i>
                                <p>Test task</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        </ul>
                   
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
            </div>
        </aside>