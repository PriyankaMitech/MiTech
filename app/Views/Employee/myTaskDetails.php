<?php echo view("Employee/employeeSidebar"); ?>
<style>
.badge.total-tasks {
   
    font-size: 100%!important;
    font-weight: 500;
}


</style>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-2">
                    <div class="card-header myTasksCard">
                        <h3 class="title">My Tasks</h3>
                        <small class="badge badge-success total-tasks">Total Tasks: <?php echo $totalTasks; ?></small>
                    </div>


                        <div class="card-body">
                            <!-- Display total tasks count -->
                            <div class="mb-3">
                            <!-- <small class="badge badge-success">Done</small>-->
                                <!-- <h5><small class="badge badge-success">Total Tasks:<?php echo $totalTasks; ?></small> </h5> -->
                            </div>

                            <!-- Display project-wise task counts with links -->
                            <div class="mb-3">
                                <h5>Project :</h5>
                                <ul class="list-group projectlist">
                                    <?php foreach ($projectTaskCounts as $project): ?>
                                        
                                        <?php 
                                            // Generate a random color for each project
                                            // $color = '#' . substr(md5(rand()), 0, 6); 
                                             
                                        ?>
                                        <li class="list-group-item" style="background-color: darkslateblue; color: white;">
                                            <!-- Make the project name clickable -->
                                            <a href="#" class="project-link" data-project-id="<?php echo $project['projectId']; ?>" style="color: inherit;">
                                                <?php echo $project['projectName']; ?>
                                            </a>
                                            <span class="badge badge-light badge-pill"><?php echo $project['taskCount']; ?></span>
                                        </li>
                                        <!-- Details section for project -->
                                        <div class="project-details" id="project_<?php echo $project['projectId']; ?>" style="display: none;">
                                            <!-- Table to display task details -->
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Main Task Name</th>
                                                        <th>Sub Task Name</th>
                                                        <th>Estimated Hours</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                            // Loop through each task
                                            foreach ($TaskDetails as $task):
                                               
                                            // Check if the task belongs to the current project
                                            if ($task->project_id == $project['projectId']):
                                                
                                                // Check if working time data exists for this task
                                                $workingTimeDataExists = isset($alottask['workingTimeData'][$task->id]);
                                                // echo'<pre>';print_r($alottask['workingTimeData'][$task->id]);
                                                   // Check if working time data exists for this task
                                                $workingTimeDataExists = isset($alottask['workingTimeData'][$task->id]);
                                                // Initialize end time variable
                                                $startTime = null;
                                                $endTime = null;
                                                // Check if working time data exists and is not empty
                                                if ($workingTimeDataExists && !empty($alottask['workingTimeData'][$task->id])) {
                                                    // Get the end time from the last element of the workingTimeData array
                                                    $lastWorkingTime = end($alottask['workingTimeData'][$task->id]);
                                                    $startTime = $lastWorkingTime->start_time;
                                                    $endTime = $lastWorkingTime->end_time;
                                                }
                                                // Check if the working time data is not empty
                                                $startTimeExists = $workingTimeDataExists && !empty($alottask['workingTimeData'][$task->id]);
                                                    // Check if pause time data exists for this task
                                                    $pauseTimeDataExists = isset($alottask['pauseTimingData'][$task->id]);
                                                    if($pauseTimeDataExists){
                                                        $last = end($alottask['pauseTimingData'][$task->id]);
                                                        if ($last !== false) {
                                                            // Check if resume time exists for the last inserted record
                                                            $pauseTimeExists = isset($alottask['pauseTimingData'][$task->id]);
                                                    } else {
                                                        $pauseTimeExists = false;
                                                }
                                            }
                               
                                                    // Check if the task is already finished
                                                    $endTimeExists = isset($alottask['workingTimeData'][$task->id]->end_time);
                                                    // If there is no pause time data, set $pauseTimeExists to false
                                                    $resumeTimeExists =false;
                                                    if (!$pauseTimeExists) {
                                                        $pauseTimeExists = false;
                                                    } else {
                                                        // Get the last pause timing record for the task
                                                        $lastElement = end($alottask['pauseTimingData'][$task->id]);
                                                        // Check if the last pause timing record is not false
                                                        if ($lastElement !== false) {
                                                            // Check if resume time exists for the last inserted record
                                                            $resumeTimeExists = !empty($lastElement->resume_time);
                                                        } else {
                                                            $resumeTimeExists = false;
                                                        }
                                                    }
                                            ?>
                                                    <tr>
                                                        <td><?php echo $task->mainTaskName; ?></td>
                                                        <td><?php echo $task->sub_task_name; ?></td>
                                                        <td><?php echo $task->working_hours; ?></td>
                                                     
                                                        <td>
                                                        <div class="form-group">
                                                            <select class=" form-control form-select" name="task_status" onchange="updatetaskstatus(this, <?= $task->id; ?>)">
                                                                <option value="" selected>Select task status</option>
                                                                <option value="Complete" <?php if ($task->task_status == 'Complete') echo "selected"; ?>>Complete</option>
                                                                <option value="BottleNeck" <?php if ($task->task_status == 'BottleNeck') echo "selected"; ?>>BottleNeck</option>
                                                                <option value="In Progress" <?php if ($task->task_status == 'In Progress') echo "selected"; ?>>In Progress</option>
                                                                <option value="Pending" <?php if ($task->task_status == 'Pending') echo "selected"; ?>>Pending</option>
                                                                <!-- Add more options as needed -->
                                                            </select>
                                                            </div>
                                                        </td>
                                                        <td> 
                                                            <?php if($startTime == NUll && $endTime == NULL ){?>
                                                        <form id="startForm_<?php echo $task->id; ?>" class="taskForm" action="<?php echo base_url('startTask'); ?>" method="POST" style="<?php echo $startTimeExists ? 'display: none;' : ''; ?>">
                                                                <input type="hidden" name="taskId" value="<?php echo $task->id; ?>">
                                                                <button type="submit" class="btn btn-success startBtn">Start</button>
                                                                <?php } ?>
                                                            </form>
                                                            <?php if($startTime != NUll && $endTime == NULL ){?>
                                                            <form id="pauseForm_<?php echo $task->id; ?>" class="taskForm" action="<?php echo base_url('pauseTask'); ?>" method="POST" style="<?php echo  ($pauseTimeExists && $resumeTimeExists) || (!$pauseTimeExists)  ? '' : 'display: none;'; ?>">
                                                                <input type="hidden" name="taskId" value="<?php echo $task->id; ?>">
                                                                <button type="submit" class="btn btn-warning pauseBtn">Pause</button>
                                                            </form>
                                                            <?php } ?>
                                                            <?php if($startTime != NUll && $endTime == NULL ){?>
                                                            <form id="unpauseForm_<?php echo $task->id; ?>" class="taskForm" action="<?php echo base_url('unpauseTask'); ?>" method="POST" style="<?php echo   $pauseTimeExists && !$resumeTimeExists ? '' : 'display: none;'; ?>">
                                                                <input type="hidden" name="taskId" value="<?php echo $task->id; ?>">
                                                                <button type="submit" class="btn btn-info unpauseBtn">Unpause</button>
                                                            </form>
                                                            <?php } ?>
                                                            <?php if($startTime != NUll  ){?>
                                                            <form id="finishForm_<?php echo $task->id; ?>" class="taskForm" action="<?php echo base_url('finishTask'); ?>" method="POST" style="<?php echo  $endTime  ? 'display: none;' : ''; ?>">
                                                                <input type="hidden" name="taskId" value="<?php echo $task->id; ?>">
                                                                <button type="submit" class="btn btn-danger finishBtn">Finish</button>
                                                            </form>
                                                           <?php   }?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                endif;
                                            endforeach;
                                            ?>

                                </tbody>
                            </table>
                        </div>
                    <?php endforeach; ?>
                </ul>
            </div>

                                            <!-- You can add more content here if needed -->

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
        url: "<?=base_url(); ?>update_task_status", // URL to your server-side script
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
 


// $(document).ready(function(){
//     $('.taskForm').submit(function(e){
//         e.preventDefault();
//         var form = $(this);
//         var taskId = form.find('input[name="taskId"]').val();
//         $.ajax({
//             url: form.attr('action'),
//             method: form.attr('method'),
//             data: form.serialize(),
//             success: function(response){
//                 // Assuming response contains updated data
//                 var updatedData = response.data;
//                 // Update button visibility based on updated data
//                 if (updatedData.alottask.workingTimeData[taskId]) {
//                     $('#startForm_' + taskId).hide();
//                     $('#pauseForm_' + taskId).show();
//                     $('#finishForm_' + taskId).show();
//                 } else {
//                     $('#startForm_' + taskId).show();
//                     $('#pauseForm_' + taskId).hide();
//                     $('#finishForm_' + taskId).hide();
//                 }
//             },
//             error: function(){
//                 alert('Error occurred while submitting the form.');
//             }
//         });
//     });
// });
</script>
