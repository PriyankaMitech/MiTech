<?php 
$session = session();
$sessionData = $session->get('sessiondata');
$role = $sessionData['role']; 


if (!empty($role)) {
    if ($role === 'Employee') {
        echo view("Employee/employeeSidebar"); 
    } else if ($role === 'Admin') {
        echo view("Admin/Adminsidebar.php"); 
    }
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white viewApplicationsBtn">Completed Tasks</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewApplicationsBtn"> Completed Tasks</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" id="viewApplicationsCard">
                        <div class="card-header">
                            <h3 class="card-title">Completed Tasks List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table-example1 table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Project Name</th>
                                        <th>Main Task name</th>
                                        <th>Sub Task Name</th>
                                        <th>Employee Name</th>
                                        <th>Developer Status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($CompletedTaskDetails)) { 
                                        // echo'<pre>';print_r($CompletedTaskDetails);exit();?>
                                        <?php foreach ($CompletedTaskDetails as $task): ?>
                                            <?php
                                            $adminModel = new \App\Models\Adminmodel();
                                            $wherecond1 = array('is_deleted' => 'N', 'allotTask_id' => $task->id);
                                            $pause_timedata = $adminModel->getalldata('tbl_pausetiming', $wherecond1);
                                            ?>
                                            <tr>
                                                <td><?php echo $task->projectName; ?></td>
                                                <td><?php echo $task->mainTaskName; ?></td>
                                                <td><?php echo $task->sub_task_name; ?></td>
                                                <td><?php echo $task->emp_name; ?></td>
                                                <td><small class="badge badge-success"><?php echo $task->Developer_task_status; ?></small></td>
                                                <td>
                                                        <!-- Show "Test Case" button if test cases exist for the task -->

                                                        <!-- // Get the task ID -->
                                                       <?php  $taskId = $task->task_id;
                                                       print_r($taskId);
                                                        ?>
                                                       <td>
                                                        <?php $taskId = $task->task_id; ?>
                                                        <?php if (!empty($taskId)) { ?>
                                                            <a href="<?php echo base_url() . 'createTestCase/' . $taskId; ?>" target="_blank" class="btn btn-primary testCaseBtn">Test Case</a>
                                                        <?php } ?>
                                                    </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

    <?php include(APPPATH . 'Views/Employee/empfooter.php'); ?>