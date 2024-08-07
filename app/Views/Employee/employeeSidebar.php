<?php 
$uri = new \CodeIgniter\HTTP\URI(current_url(true));
$pages = $uri->getSegments();
$page = $uri->getSegment(count($pages));

?>
<?php 
$session = session();
$sessionData = $session->get('sessiondata');
$emp_name = $sessionData['emp_name']; 
// print_r($emp_departmentId);die;

$empdata = []; 

if(!empty($sessionData)){
    
    $adminModel = new \App\Models\Adminmodel();
    $wherecond = array('Emp_id' =>$sessionData['Emp_id']);
    $empdata = $adminModel->getsinglerow('employee_tbl', $wherecond);
    // print_r($empdata);exit();

    $wherecond1 = array('is_deleted' => 'N', 'emp_id' => $sessionData['Emp_id'],'emp_status'=> 'unread');
    $memo_data = $adminModel->getalldata('tbl_memo', $wherecond1);

     // Get the current date and the date 5 days ago
     $current_date = date('Y-m-d');
     $date_5_days_ago = date('Y-m-d', strtotime('-5 days'));
 
   
    // Fetch notifications for the employee within the last 5 days from 'tbl_notification'
    $notifications = $adminModel->getNotifications('tbl_notification', $sessionData['Emp_id'], $date_5_days_ago, $current_date);

    // echo "<pre>";print_r($notifications);exit();
    if (!is_array($notifications)) {
        $notifications = [];  // Ensure $notifications is an array
    }

    $count_memo = 0;

    if (is_array($memo_data) && is_array($notifications)) {
        $count_memo = count($memo_data) + count($notifications);
    } else {
        if (is_array($memo_data)) {
            $count_memo = count($memo_data);
        }
        if (is_array($notifications)) {
            $count_memo += count($notifications);
        }
    }

    }
?>
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

        
.nav-sidebar .nav-item a {
    background-color: transparent;
    background-image: linear-gradient(90deg, #189499 0%, #e6f3f4 100%);
    color: #000;
}
.nav-sidebar .nav-item a:hover {
    background-color: transparent !important;
    background-image: linear-gradient(90deg, #040a0a 0%, #eeeeee 100%) !important;
    color: #fff !important;
}
.nav-sidebar .nav-item .active-nav-link {
    background-color: transparent !important;
    background-image: linear-gradient(90deg, #040a0a 0%, #eeeeee 100%) !important;
    color: #fff!important;

}


[class*=sidebar-light-] .nav-sidebar>.nav-item.menu-open>.nav-link{
    color: #000 !important;
}
[class*=sidebar-light-] .nav-sidebar>.nav-item.menu-open>.active-nav-link {
    color: #fff !important;
}
[class*=sidebar-light-] .nav-treeview>.nav-item>.nav-link {
    padding-left: 39px !important;
    color: #000 !important;
}

[class*=sidebar-light-] .nav-treeview>.nav-item>.active-nav-link {
    background-image: linear-gradient(90deg, #000000 0%, #000000 100%) !important;

    padding-left: 39px !important;
    color: #fff !important;
}

[class*=sidebar-light-] .nav-treeview > .nav-item > .nav-link:hover {
    background-image: linear-gradient(90deg, #000000 0%, #000000 100%) !important;

    color: #fff !important;
    /* padding-left is already set, so you may not need to redefine it unless it changes */
}

[class*=sidebar-light-] .nav-sidebar > .nav-item > .nav-link:hover {
    color: #fff !important;
}

.container-fluid {
    padding: 20px 0px 0px 0px;
}


   .breadcrumb-item+.breadcrumb-item::before {

    color: #bfbfbf !important;
   
}
.buttons-excel{

    background-color: #28a745 !important;
    border-color: #28a745 !important;
}
.buttons-pdf{
    background-color: #17a2b8 !important;
    border-color: #17a2b8 !important;
}
.buttons-excel , .buttons-pdf ,.buttons-print{
    margin: 5px !important;
}
.submitbuttonp{
    padding: 0px 9px !important;
}


    .timeOutRow{
        margin-top: 8rem !important;
    }
 
    .user-panel {
        padding: 10px 0px;
    }

    .sidebar {
        position: relative;
        z-index: 1;
        overflow-y: auto;
        /* Ensure vertical scrollbar when content overflows */
        max-height: calc(80vh - 60px);
        /* Adjust 60px according to your header height */
    }

    .bottom-image {
        position: absolute;
        bottom: -20px;
        left: 0;
        width: 100%;
        z-index: 0;
    }

    .nav-sidebar {
        position: relative;
        z-index: 2;
    }
    <?php if($page == 'saveSignupTime') { ?>

    .content-wrapper {
        background-image:url('<?php echo base_url('public/Images/gm.webp'); ?>');


        background-repeat: no-repeat;
        background-size: cover;
    }
    <?php }else{ ?>
        .content-wrapper {
            background-image: url('<?php echo base_url() ?>public/Images/gm.png');
            background-repeat: no-repeat;
            background-size: cover;
            }

        <?php } ?>

    .logo {
        width: 100%;
    }

    .punchInBtn{
        background-color: #007bff;
    }
    .punchOutBtn{
        background-color: #001f3f;
    }

    .dataTables_filter {
    padding-top: 0.5rem!important;
    }


#viewApplicationsBtn, .monthc{
    width: auto !important;
        border-color: #78bcbe !important;
        font-weight: 700 !important;
         /* background-image: linear-gradient(90deg, #545454 0%, #39b3b7 100%) !important; */
         background-color: #fff900;
    }

    /* .direct-chat-messages, .direct-chat-contacts {
    height: 400px !important;
} */

    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div id="flash-success-container" class="flash-message">
        <?php if (session()->has('success')) : ?>
        <div class="flash-success">
            <?= session('success') ?>
        </div>
        <?php endif; ?>
    </div>
    <?php if (session()->has('error')): ?>

    <div id="toast-container" class="toast-top-right flash-message">
        <div class="toast toast-error" aria-live="assertive" style="">
            <div class="toast-message">
                <?= session('error') ?>
            </div>
        </div>
    </div>
    <?php endif ?>
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
                    <a href="<?=base_url(); ?>EmployeeDashboard" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?=base_url();?>logout" class="nav-link">Logout</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge"><span class="chatCounter"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
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
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
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
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
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
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>

            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">
                            <?php echo !empty($count_memo) ?  $count_memo : '0'; ?>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">
                            <?php echo !empty($count_memo) ? ($count_memo) . ' Notifications' : 'No Notifications'; ?>
                        </span>
                        <div class="dropdown-divider"></div>
                        <?php if (!empty($memo_data)) { ?>
                                <a href="<?php echo base_url();?>memo" class="dropdown-item">
                                <i class="fas fa-exclamation-circle"></i>  <span> <?php echo !empty($memo_data) ? count($memo_data) . ' Memo' : 'No Memo'; ?></span>
                                </a>
                        <?php } ?>
                        <div class="dropdown-divider"></div>
                                <a href="<?php echo base_url();?>show_notification" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i>  <span> <?php echo !empty($notifications) ? count($notifications) . ' Notifications' : 'No Notifications'; ?></span>
                                </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
              
            </ul>
        </nav>
        <!-- /.navbar -->
        <?php  if (isset($empdata->access_level)) {
                $access_levels = explode(',', $empdata->access_level);
                    // echo "<pre>";print_r($access_levels);die;
        ?>

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
                        <a href="#" class="d-block "><b> <?= $emp_name  ; ?></b></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item ">
                            <a href="<?php echo base_url() ?>EmployeeDashboard" <?php if (in_array('EmployeeDashboard', $access_levels)) {
                                                                echo "style='display:block'";
                                                            } else {
                                                                echo "style='display:none'";
                                                            } ?> class="d-block <?php if($page == 'EmployeeDashboard') { echo "active-nav-link";  }?>"></a>
                        </li>
                        <li class="nav-item " <?php if (in_array('EmployeeDashboard', $access_levels) || in_array('saveSignupTime', $access_levels)) {
                                                                echo "style='display:block'";
                                                            } else {
                                                                echo "style='display:none'";
                                                            } ?>>
                                    <a href="<?= base_url(); ?><?php if (!empty($empdata)) {
                                        if ($empdata->AadharFile == '') {
                                            echo 'EmployeeDashboard';
                                        } else {
                                            echo 'saveSignupTime';
                                        }
                                    } ?>" class="nav-link <?php if($page == 'EmployeeDashboard' || $page == 'saveSignupTime') { echo "active-nav-link";  }?>">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Dashboard
                                        </p>

                                    </a>
                                </li>
                                <li class="nav-item" <?php if(!empty($empdata)){
                                     if(($empdata->AadharFile != '') && in_array('showProfile', $access_levels)){ ?> style="display:block" <?php }else{   echo "style='display:none'";}} ?>>
                                    <a href="<?php echo base_url()?>showProfile" class="nav-link <?php if($page == 'showProfile') { echo "active-nav-link";  }?>">
                                    <i class="nav-icon fas fa-user-check"></i>
                                        <p>
                                            Profile
                                        </p>
                                    </a>
                                </li>
                             
                                <li class="nav-item" <?php if(!empty($empdata)){
                                     if(($empdata->AadharFile != '') && in_array('myTasks', $access_levels)){ ?> style="display:block" <?php }else{   echo "style='display:none'";}} ?> >
                                    
                                    <a href="#dd" class="nav-link <?php if($page == 'myTasks') { echo "active-nav-link";  }?>">
                                        <i class="nav-icon fas fa-tasks"></i>
                                        <p>
                                           Tasks
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview" id="dd">
                                        <li class="nav-item">
                                            <a href="<?php echo base_url(); ?>myTasks" class="nav-link <?php if($page == 'myTasks') { echo "active-nav-link";  }?>">
                                            <i class="fas fa-circle nav-icon"></i>
                                                <p>My Tasks</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url(); ?>corrections" class="nav-link <?php if($page == 'corrections') { echo "active-nav-link";  }?>">
                                            <i class="fas fa-circle nav-icon"></i>
                                                <p>Corrections/Rejections</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" >
                                        <li class="nav-item" <?php if (in_array('Daily_Task', $access_levels)) {
                                                                echo "style='display:block'";
                                                            } else {
                                                                echo "style='display:none'";
                                                            } ?> >
                                            <a href="<?php echo base_url(); ?>Daily_Task" class="nav-link <?php if($page == 'Daily_Task') { echo "active-nav-link";  }?>">
                                            <i class="fas fa-circle nav-icon"></i>
                                                <p>Daily Task</p>
                                            </a>
                                        </li>
                                        <li class="nav-item" <?php if (in_array('addTask', $access_levels)) {
                                                                echo "style='display:block'";
                                                            } else {
                                                                echo "style='display:none'";
                                                            } ?> >
                                            <a href="<?php echo base_url(); ?>addTask" class="nav-link <?php if($page == 'addTask') { echo "active-nav-link";  }?>">
                                            <i class="fas fa-circle nav-icon"></i>
                                                <p>Add Task</p>
                                            </a>
                                            <a href="<?php echo base_url(); ?>taskList" class="nav-link <?php if($page == 'taskList') { echo "active-nav-link";  }?>">
                                            <i class="fas fa-circle nav-icon"></i>
                                                <p>Task List</p>
                                            </a>
                                            <!-- <a href="<?php echo base_url(); ?>assignedTaskList" class="nav-link <?php if($page == 'taskList') { echo "active-nav-link";  }?>">
                                            <i class="fas fa-circle nav-icon"></i>
                                                <p>Assigned Task List</p>
                                            </a> -->
                                        </li>
                                        <li class="nav-item" <?php if (in_array('allotTask', $access_levels)) {
                                                                echo "style='display:block'";
                                                            } else {
                                                                echo "style='display:none'";
                                                            } ?> >
                                            <a href="<?php echo base_url(); ?>allotTask" class="nav-link <?php if($page == 'allotTask') { echo "active-nav-link";  }?>">
                                            <i class="fas fa-circle nav-icon"></i>
                                                <p>Allot Task</p>
                                            </a>
                                        </li>
                                        <li class="nav-item" <?php if (in_array('testing_specific', $access_levels)) {
                                                                echo "style='display:block'";
                                                            } else {
                                                                echo "style='display:none'";
                                                            } ?> >
                                            <a href="<?php echo base_url(); ?>CompletedTasks" class="nav-link <?php if($page == 'CompletedTasks') { echo "active-nav-link";  }?>">
                                            <i class="fas fa-circle nav-icon"></i>
                                                <p>Completed Tasks</p>
                                            </a>
                                        </li>
                                        <li class="nav-item" <?php if (in_array('meetings', $access_levels)) {
                                                                echo "style='display:block'";
                                                            } else {
                                                                echo "style='display:none'";
                                                            } ?> >
                                            <a href="<?php echo base_url(); ?>meetings" class="nav-link <?php if($page == 'meetings') { echo "active-nav-link";  }?>">
                                            <i class="fas fa-circle nav-icon"></i>
                                                <p>Meetings</p>
                                            </a>
                                        </li>
                        
                                    </ul>
                                </li>


                                <li class="nav-item" <?php if(!empty($empdata)){
                                     if(($empdata->AadharFile != '') && in_array('leave_list', $access_levels)){ ?> style="display:block" <?php }else{   echo "style='display:none'";}} ?> >
                                    
                                    <a href="<?php echo base_url(); ?>leave_list" class="nav-link <?php if($page == 'leave_list') { echo "active-nav-link";  }?>">
                                        <i class="fas fa-calendar-alt" style="padding: 0px 10px 1px 4px !important;" aria-hidden="true"></i>
                                        <p>
                                        Leave
                                        </p>
                                    </a>
                                  
                                
                                </li>

                                <li class="nav-item" <?php if(!empty($empdata)){ if(($empdata->AadharFile != '') && in_array('mattendance', $access_levels)){ ?> style="display:block" <?php }else{   echo "style='display:none'";}} ?>>
                                    <a href="<?php echo base_url()?>mattendance" class="nav-link <?php if($page == 'mattendance') { echo "active-nav-link";  }?>">
                                    <i class="nav-icon fas fa-user-check"></i>
                                        <p>
                                        Monthly Attendance
                                        </p>
                                    </a>
                                </li>


                                <li class="nav-item" <?php if(!empty($empdata)){
                                     if(($empdata->AadharFile != '') && in_array('chatuser', $access_levels)){ ?> style="display:block" <?php }else{   echo "style='display:none'";}} ?> >
                                    <a href="<?= base_url() ?>chatuser" class="nav-link">
                                        <i class="nav-icon far fa-comment-dots"></i>
                                        <p>
                                            Messages
                                          
                                            <span class="chatCounter badge badge-danger right"></span>

                                        </p>
                                        
                                    </a>
                                   
                                </li>

                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <img src="<?= base_url(); ?>public/Images/bga.png" class="bottom-image">

            <!-- /.sidebar -->
        </aside>
        <?php }?>
        