<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MI-TECH</title>

    <!-- Google Font: Source Sans Pro -->
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

    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?=base_url(); ?>public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?=base_url(); ?>public/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?=base_url(); ?>public/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


    <!-- Select2 -->
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/plugins/select2/css/select2.min.css" />



    <link rel="stylesheet"
        href="<?=base_url(); ?>public/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" />

        <link rel="stylesheet" href="<?=base_url(); ?>public/assets/dist/css/adminDashboard.css" />
        <link rel="stylesheet" href="<?=base_url(); ?>public/assets/dist/css/chat.css" />

<style>
        
        


    </style>
  
</head>


<body class="hold-transition sidebar-mini layout-fixed">
<?php 
    $uri = new \CodeIgniter\HTTP\URI(current_url(true));
    $pages = $uri->getSegments();
    $page = $uri->getSegment(count($pages));

    // Use the session service to access session data
    $session = session();
    // echo "<pre>"; 
    // print_r($session->get()); // Get all session data
    // exit();
    ?>
       <div id="flash-success-container"  class="flash-message">
        <?php if (session()->has('success')) : ?>
        <div class="flash-success">
            <?= session('success') ?>
        </div>
        <?php endif; ?>
    </div>
   

    <div id="flash-message-container" class="flash-message" >
        <!-- <div class="toast toast-error" aria-live="assertive" style=""> -->
        <?php if (session()->has('error')): ?>
            <div class="flash-error">
                <?= session('error') ?>
            </div>
        <?php endif ?>
        <!-- </div> -->
    </div>
   
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="<?=base_url(); ?>public/assets/img/Mitechlogo.png"
                alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?=base_url(); ?>AdminDashboard" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?=base_url();?>logout" class="nav-link">Logout</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> -->

                <!-- Messages Dropdown Menu -->
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge"><span class="chatCounter"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                           
                            <div class="media">
                                <img src="<?=base_url(); ?>public/assets/dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                           
                            <div class="media">
                                <img src="<?=base_url(); ?>public/assets/dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                          
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                           
                            <div class="media">
                                <img src="<?=base_url(); ?>public/assets/dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li> -->
                <!-- Notifications Dropdown Menu -->
                <!-- <li class="nav-item dropdown">
                     <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a> 
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div> 
                 </li> -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> -->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="<?=base_url();?>public/Images/mitech.png" alt="AdminLTE Logo" class="logo">

            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel d-flex">
                    <div class="image">
                        <img src="<?=base_url(); ?>public/Images/Admin.png" class="img-circle elevation-2" alt="User Image">

                        
                    </div>
                    <div class="info ">
                        <a href="#" class="d-block "><b> Admin </b></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="<?= base_url(); ?>AdminDashboard" class="nav-link <?php if($page == 'AdminDashboard') { echo "active-nav-link";  }?>">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url()?>listofproject" class="nav-link <?php if($page == 'create_project' || $page == 'listofproject' ) { echo "active-nav-link";  }?>">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Project
                                </p>
                            </a>
                       
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if($page == 'addTask' || $page == 'taskList' || $page == 'allotTask' || $page == 'assignedTaskList') { echo "active-nav-link";  }?>">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Task
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <!-- <li class="nav-item">
                                    <a href="<?php echo base_url()?>addTask" class="nav-link <?php if($page == 'addTask') { echo "active-nav-link";  }?>">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>Add Task</p>
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>taskList" class="nav-link <?php if($page == 'taskList') { echo "active-nav-link";  }?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Task List</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="<?php echo base_url()?>allotTask" class="nav-link <?php if($page == 'allotTask') { echo "active-nav-link";  }?>">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>Assign Task</p>
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>assignedTaskList" class="nav-link <?php if($page == 'assignedTaskList') { echo "active-nav-link";  }?>">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>Assigned Task List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if($page == 'create_emp' || $page == 'memo_list' || $page == 'emp_list' || $page == 'leave_app' ) { echo "active-nav-link";  }?>">
                            <i class="fa fa-user nav-icon" aria-hidden="true"></i>
                                <p>
                                    Employee
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                        <a href="<?php echo base_url()?>emp_list" class="nav-link <?php if($page == 'emp_list') { echo "active-nav-link";  }?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Emploee List </p>
                                        </a>
                                    </li>
                            
                                <li class="nav-item">
                                    <?php
                                        if (!empty($leave_app)) {
                                            $recordCount = count($leave_app);
                                            $countHtml = "<span class='badge badge-danger'>$recordCount</span>";
                                        } else {
                                            $countHtml = "";
                                        }
                                    ?>
                                    <a href="<?php echo base_url()?>leave_app" class="nav-link <?php if($page == 'leave_app') { echo "active-nav-link";  }?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Leave Application <?php echo $countHtml; ?></p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>memo_list" class="nav-link <?php if($page == 'memo_list') { echo "active-nav-link";  }?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Memo </p>
                                    </a>
                                </li>
                              
                            </ul>
                        </li>
                     
                        <li class="nav-item">
                            <a href="<?php echo base_url()?>Join_meeting" class="nav-link <?php if($page == 'Create_meeting' || $page == 'Join_meeting') { echo "active-nav-link";  }?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Meeting
                                </p>
                            </a>
                          
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if($page == 'AddNewUser' || $page == 'user_list' || $page == 'admin_list') { echo "active-nav-link";  }?>">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Setting
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <!-- <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>AddNewUser" class="nav-link <?php if($page == 'AddNewUser') { echo "active-nav-link";  }?>">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>Add New User</p>
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>user_list" class="nav-link <?php if($page == 'user_list') { echo "active-nav-link";  }?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>admin_list" class="nav-link <?php if($page == 'admin_list') { echo "active-nav-link";  }?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Admin </p>
                                    </a>
                                </li>
                                <!-- Add other New User menu items with access level checks here -->
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url()?>po_list" class="nav-link <?php if($page == 'add_po' || $page == 'po_list') { echo "active-nav-link";  }?>">
                            <i class="nav-icon fas fa-file-invoice"></i>
                                <p>
                                    PO
                                </p>
                            </a>
                        </li>

                       
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if($page == 'add_invoice' || $page == 'invoice_list') { echo "active-nav-link";  }?>">
                            <i class="nav-icon fas fa-file-invoice"></i>
                                <p>
                                    Invoice / Bill
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>invoice_list" class="nav-link <?php if($page == 'invoice_list') { echo "active-nav-link";  }?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Invoice </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>proforma_list" class="nav-link <?php if($page == 'proforma_list') { echo "active-nav-link";  }?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Proforma </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>debitnote_list" class="nav-link <?php if($page == 'debitnote_list') { echo "active-nav-link";  }?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Debit Note </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if($page == 'add_menu' ||  $page == 'client_list' || $page == 'menu_list' || $page == 'addmaintask' || $page == 'maintask_list' || $page == 'add_department' || $page == 'department_list' || $page == 'addservices' || $page == 'services_list' || $page == 'dailyblog_list') { echo "active-nav-link";  }?>">
                                <i class="nav-icon fas fa-key"></i>
                                <p>
                                    Master
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>client_list " class="nav-link <?php if($page == 'client_list') { echo "active-nav-link";  }?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Client </p>
                                    </a>
                                </li>
                             
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>menu_list" class="nav-link <?php if($page == 'menu_list') { echo "active-nav-link";  }?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Menu </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>maintask_list" class="nav-link <?php if($page == 'maintask_list') { echo "active-nav-link";  }?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>MainTask </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>department_list" class="nav-link <?php if($page == 'department_list') { echo "active-nav-link";  }?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Department </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>services_list" class="nav-link <?php if($page == 'services_list') { echo "active-nav-link";  }?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Services</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>currency_list" class="nav-link <?php if($page == 'currency_list') { echo "active-nav-link";  }?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Currency </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>dailyblog_list " class="nav-link <?php if($page == 'dailyblog_list') { echo "active-nav-link";  }?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Daily Blog </p>
                                    </a>
                                </li>
                                <!-- Add other New User menu items with access level checks here -->
                            </ul>
                        </li>
                        <li class="nav-item">
                                    <a href="<?= base_url() ?>chatuser" class="nav-link">
                                        <i class="nav-icon far fa-comment-dots"></i>
                                        <p>
                                            Messages
                                            <span class="chatCounter badge badge-danger right"></span>
                                        </p>
                                    </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if($page == 'daily_report' || $page == 'menu_list') { echo "active-nav-link";  }?>">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Reports
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>attendance" class="nav-link <?php if($page == 'daily_report') { echo "active-nav-link";  }?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Monthly Attendance</p>
                                    </a>
                                </li>
                              
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>notification_list" class="nav-link  <?php if($page == 'notification_list') { echo "active-nav-link";  }?>">
                            <i class="fa fa-bell nav-icon" aria-hidden="true"></i>
                                <p>Notifications </p>
                            </a>
                        </li>

                           
        





                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <img src="<?= base_url(); ?>public/Images/bga.png" class="bottom-image">

            <!-- /.sidebar -->
        </aside>