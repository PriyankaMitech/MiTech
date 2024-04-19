<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
</head>

<body>
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url()?>login" class="nav-link">Home</a>
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
                <!-- <img src="public/Images/mitech.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                <span class="brand-text font-weight-light"><b>Admin</b></span>
            </a>

            <?php
    // Assume $user_role is retrieved from session data
  
//   session_start();
//   echo $_SESSION['sessiondata'];
// exit();// Example session data

// print_r($user_role);die;
?>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="public/Images/Admin.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Admin</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-user" aria-hidden="true"></i>
                                <p>
                                    New User
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>AddNewUser" class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>Add New Admin</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>admin_list" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Admin List</p>
                                    </a>
                                </li>
                                <!-- Add other New User menu items with access level checks here -->
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Employee
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>create_emp" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>create Employee</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="<?php echo base_url()?>leave_app" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Leave Application</p>
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <?php
                                    if (!empty($leave_app)) {
                                        $recordCount = count($leave_app);
                                        $countHtml = "<span class='badge badge-danger'>$recordCount</span>";
                                    } else {
                                        $countHtml = "";
                                    }
                                    ?>
                                    <a href="<?php echo base_url()?>leave_app" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Leave Application <?php echo $countHtml; ?></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>daily_report" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Daily Report</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>Create_meeting" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Meeting</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Project
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>create_project" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Project</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>addTask" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Task</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>allotTask" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Allot Task</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                              UI Elements
                              <i class="fas fa-angle-left right"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="pages/UI/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General</p>
                              </a>
                            </li> 
                          </ul>
                        </li> -->
                        <!-- <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                              Forms
                              <i class="fas fa-angle-left right"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="pages/forms/validation.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Validation</p>
                              </a>
                            </li>
                          </ul>
                        </li> -->
                        <!-- <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                            Tables
                            <i class="fas fa-angle-left right"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">            
                          <li class="nav-item">
                            <a href="pages/tables/jsgrid.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>jsGrid</p>
                            </a>
                          </li>
                        </ul>
                      </li> -->
                        <!--           
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="nav-icon far fa-envelope"></i>
                          <p>
                            Mailbox
                            <i class="fas fa-angle-left right"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="pages/mailbox/read-mail.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Read</p>
                            </a>
                          </li>
                        </ul>
                      </li> -->
                        <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-book"></i>
                      <p>
                        Pages
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="pages/examples/contact-us.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Contact us</p>
                        </a>
                      </li>
                    </ul>
                  </li> -->
                        <!-- <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                          Extras
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="starter.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Starter Page</p>
                          </a>
                        </li>
                      </ul>
                    </li> -->
                        <!-- </ul>
          </li> -->

                    </ul>
                </nav>
            </div>
        </aside>