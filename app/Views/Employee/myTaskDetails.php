<?php echo view("Employee/employeeSidebar"); ?>

<?php 
$session = session();
$sessionData = $session->get('sessiondata');
$emp_name = $sessionData['emp_name'];
// $department = print_r($sessionData['emp_department']);exit();
?>
<style>
/* Add any necessary styles here */

</style>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-2">
                        <div class="card-header myTasksCard">
                            <h3 class="title">My Tasks</h3>
                            <small class="badge badge-success total-tasks">Total Tasks: <?php echo !empty($totalTasks) ? $totalTasks : "No tasks assigned yet."; ?></small>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($allotTaskDetails)) { ?>
                            <div class="mb-3">
                                <h5>Project :</h5>
                                <ul class="list-group projectlist">
                                    <?php foreach ($projectTaskCounts as $project) { ?>
                                    <li class="list-group-item" style="background-color: darkslateblue; color: white;">
                                        <a href="#" class="project-link" data-project-id="<?php echo $project['projectId']; ?>" style="color: inherit;">
                                            <?php echo $project['projectName']; ?>
                                        </a>
                                        <span class="badge badge-light badge-pill"><?php echo $project['taskCount']; ?></span>
                                    </li>
                                    <div class="project-details" id="project_<?php echo $project['projectId']; ?>" style="display: none;">
                                        <!-- <table class="table table-bordered"> -->
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Main Task Name</th>
                                                    <th>Sub Task Name</th>
                                                    <th>Estimated Hours</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    <th>Test Case</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($allotTaskDetails as $alloted_task) {
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
                                                <tr>
                                                    <td><?php echo $alloted_task->mainTaskName; ?></td>
                                                    <td><?php echo $alloted_task->sub_task_name; ?></td>
                                                    <td><?php echo $alloted_task->working_hours; ?></td>
                                                    <td>
                                                        <div class="form-group">
                                                            <select class="form-control form-select" name="task_status" onchange="updatetaskstatus(this, <?= $alloted_task->id; ?>)">
                                                                <option value="" selected>Select task status</option>
                                                                <option value="Complete" <?php if ($alloted_task->Developer_task_status == 'Complete') echo "selected"; ?>>Complete</option>
                                                                <option value="BottleNeck" <?php if ($alloted_task->Developer_task_status == 'BottleNeck') echo "selected"; ?>>BottleNeck</option>
                                                                <option value="In Progress" <?php if ($alloted_task->Developer_task_status == 'In Progress') echo "selected"; ?>>In Progress</option>
                                                                <option value="Pending" <?php if ($alloted_task->Developer_task_status == 'Pending') echo "selected"; ?>>Pending</option>
                                                            </select>
                                                        </div>
                                                    </td>
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
                                                    <td>
                                                        <!-- Show "Test Case" button if test cases exist for the task -->

                                                        <!-- // Get the task ID -->
                                                       <?php  $taskId = $alloted_task->task_id;
                                                    //    print_r($taskId);
                                                        ?>
                                                        <?php //echo '<pre>'; print_r($testCasesByTask[$taskId]); ?>
                                                        <?php if (!empty($testCasesByTask[$taskId])) { ?>
                                                        <a href="<?php echo base_url() . 'createTestCase/' . $taskId; ?>" target="_blank" class="btn btn-primary testCaseBtn">Test Case</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php } ?>
                                </ul>
                            </div>
                            <?php } else { echo "No tasks assigned yet."; } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php echo view("Employee/empfooter"); ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Get all project links
    var projectLinks = document.querySelectorAll(".project-link");

    // Add click event listener to each project link
    projectLinks.forEach(function(link) {
        link.addEventListener("click", function(event) {
            event.preventDefault();
            var projectId = this.getAttribute("data-project-id");
            var projectDetails = document.getElementById("project_" + projectId);

            // Toggle the visibility of all project details sections
            document.querySelectorAll(".project-details").forEach(function(detail) {
                detail.style.display = "none";
            });

            // Toggle the visibility of the clicked project details section
            if (projectDetails.style.display === "none") {
                projectDetails.style.display = "block";
            } else {
                projectDetails.style.display = "none";
            }
        });
    });
});

function updatetaskstatus(selectElement, id) {
    var selectedValue = selectElement.value;
    console.log(selectedValue);
    var id = id;

    // Make AJAX request
    $.ajax({
        type: "POST",
        url: "<?= base_url(); ?>update_task_status", // URL to your server-side script
        data: {
            id: id,
            selectedValue: selectedValue
        },
        success: function(response) {
            // Handle success response
            console.log("Task status updated successfully");
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error("Error updating status:", error);
        }
    });
}
</script>
