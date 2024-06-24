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
                    <h1 class="text-white viewApplicationsBtn">Corrections - Tasks List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewApplicationsBtn"> Corrections - Tasks List</li>
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
                            <h3 class="card-title">Corrections - Tasks List</h3>
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
                                <?php foreach ($alottask as $alloted_task) {
                                echo'<pre>';print_r($alloted_task);exit();
                                                    if ($alloted_task->project_id == $project['projectId']) {
                                                        $workingTimeDataExists = isset($alottask['workingTimeData'][$alloted_task->id]);
                                                        $startTime = null;
                                                        $endTime = null;
                                                        if ($workingTimeDataExists && !empty($alottask['workingTimeData'][$alloted_task->id])) {
                                                            $lastWorkingTime = end($alottask['workingTimeData'][$alloted_task->id]);
                                                            $startTime = $lastWorkingTime->start_time;
                                                            $endTime = $lastWorkingTime->end_time;
                                                        }
                                                        $startTimeExists = $workingTimeDataExists && !empty($alottask['workingTimeData'][$alloted_task->id]);
                                                        $pauseTimeDataExists = isset($alottask['pauseTimingData'][$alloted_task->id]);
                                                        if ($pauseTimeDataExists) {
                                                            $last = end($alottask['pauseTimingData'][$alloted_task->id]);
                                                            $pauseTimeExists = $last !== false;
                                                        }
                                                        $endTimeExists = isset($alottask['workingTimeData'][$alloted_task->id]->end_time);
                                                        $resumeTimeExists = false;
                                                        if ($pauseTimeExists) {
                                                            $lastElement = end($alottask['pauseTimingData'][$alloted_task->id]);
                                                            $resumeTimeExists = $lastElement !== false && !empty($lastElement->resume_time);
                                                        }
                                                ?>
                                    <?php if (!empty($CorrectionInTaskData)) { 
                                        // echo'<pre>';print_r($CorrectionInTaskData);exit();?>
                                        <?php foreach ($CorrectionInTaskData as $task): ?>
                                            <?php
                                            $adminModel = new \App\Models\Adminmodel();
                                            $wherecond1 = array('is_deleted' => 'N', 'allot_task_id' => $task->id);
                                            $pause_timedata = $adminModel->getalldata('tbl_corrections_pausetiming', $wherecond1);
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
                                                        <div class="action-buttons d-flex">
                                                            <?php if ($startTime == NULL && $endTime == NULL) { ?>
                                                            <form id="startForm_<?php echo $alloted_task->id; ?>" class="taskForm" action="<?php echo base_url('startTask'); ?>" method="POST" style="<?php echo $startTimeExists ? 'display: none;' : ''; ?>">
                                                                <input type="hidden" name="alloted_taskId" value="<?php echo $alloted_task->id; ?>">
                                                                <button type="submit" class="btn btn-success startBtn">Start</button>
                                                            </form>
                                                            <?php } ?>
                                                            <?php if ($startTime != NULL && $endTime == NULL) { ?>
                                                            <form id="pauseForm_<?php echo $alloted_task->id; ?>" class="taskForm" action="<?php echo base_url('pauseTask'); ?>" method="POST" style="<?php echo ($pauseTimeExists && $resumeTimeExists) || (!$pauseTimeExists) ? '' : 'display: none;'; ?>">
                                                                <input type="hidden" name="alloted_taskId" value="<?php echo $alloted_task->id; ?>">
                                                                <button type="submit" class="btn btn-warning pauseBtn">Pause</button>
                                                            </form>
                                                            <form id="unpauseForm_<?php echo $alloted_task->id; ?>" class="taskForm" action="<?php echo base_url('unpauseTask'); ?>" method="POST" style="<?php echo $pauseTimeExists && !$resumeTimeExists ? '' : 'display: none;'; ?>">
                                                                <input type="hidden" name="alloted_taskId" value="<?php echo $alloted_task->id; ?>">
                                                                <button type="submit" class="btn btn-info unpauseBtn">Unpause</button>
                                                            </form>
                                                            <?php } ?>
                                                            <?php if ($startTime != NULL) { ?>
                                                            <form id="finishForm_<?php echo $alloted_task->id; ?>" class="taskForm" action="<?php echo base_url('finishTask'); ?>" method="POST" style="<?php echo $endTime ? 'display: none;' : ''; ?>">
                                                                <input type="hidden" name="alloted_taskId" value="<?php echo $alloted_task->id; ?>">
                                                                <button type="submit" class="btn btn-danger finishBtn">Finish</button>
                                                            </form>
                                                            <?php } ?>
                                                        </div>
                                                    </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php } ?>
                                    <?php } } ?>
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