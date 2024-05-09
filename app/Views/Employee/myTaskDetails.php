<?php echo view("Employee/employeeSidebar"); ?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-2">
                        <div class="card-header">
                            <h3 class="">My Tasks</h3>
                        </div>
                        <div class="card-body">
                            <!-- Display total tasks count -->
                            <div class="mb-3">
                                <h5>Total Tasks: <?php echo $totalTasks; ?></h5>
                            </div>

                            <!-- Display project-wise task counts with links -->
                            <div class="mb-3">
                                <h5>Project :</h5>
                                <ul class="list-group projectlist">
                                    <?php foreach ($projectTaskCounts as $project): ?>
                                        
                                        <?php 
                                            // Generate a random color for each project
                                            $color = '#' . substr(md5(rand()), 0, 6); 
                                        ?>
                                        <li class="list-group-item" style="background-color: <?php echo $color; ?>; color: white;">
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
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            <?php foreach ($TaskDetails as $task): ?>
                                            <?php if ($task->project_id == $project['projectId']): ?>
                                                <tr>
                                                    <td><?php echo $task->mainTaskName; ?></td>
                                                    <td><?php echo $task->sub_task_name; ?></td>
                                                    <td><?php echo $task->working_hours; ?></td>
                                                
                                                    <td>
                                                        <?php
                                                            $startTimeExists = isset($alottask['workingTimeData'][$task->id]);
                                                            $pauseTimeExists = isset($alottask['pauseTimingData'][$task->id]);
                                                            $endTimeExists = isset($alottask['workingTimeData'][$task->id]);
                                                            // print_r($alottask['pauseTimingData']);

                                                            
                                                            // Assuming $alottask['pauseTimingData'] is your array containing pause timing data
                                                            $taskId = $task->id; // Change this to the desired taskId
                                                            
                                                            $lastInsertedId = null;
                                                            
                                                            $pauseTimeExists = false;
                                                            $resumeTimeExists = false;
                                                            
                                                            // Check if the task ID exists in the array
                                                            if (isset($alottask['pauseTimingData'][$taskId])) {
                                                                // Get the last element (last inserted record) for the specific task ID
                                                                $lastElement = end($alottask['pauseTimingData'][$taskId]);
                                                                
                                                                // Check if the last element is not false
                                                                if ($lastElement !== false) {
                                                                    // Get the ID of the last inserted record for the specific task ID
                                                                    $lastInsertedId = $lastElement->id;
                                                            
                                                                    // Check if pause time exists for the last inserted record
                                                                    if (!empty($lastElement->pause_time)) {
                                                                        // Pause time exists
                                                                        $pauseTimeExists = true;
                                                            
                                                                        // Check if resume time also exists for the last inserted record
                                                                        if (!empty($lastElement->resume_time)) {
                                                                            // Both pause time and resume time exist
                                                                            $resumeTimeExists = true;
                                                                        }
                                                                    }
                                                                }
                                                            }                
                                        ?>

                                                    <form id="startForm_<?php echo $task->id; ?>" class="taskForm" action="<?php echo base_url('startTask'); ?>" method="POST" style="<?php echo $startTimeExists ? 'display: none;' : ''; ?>">
                                                        <input type="hidden" name="taskId" value="<?php echo $task->id; ?>">
                                                        <button type="submit" class="btn btn-success startBtn">Start</button>
                                                    </form>

                                                    <form id="pauseForm_<?php echo $task->id; ?>" class="taskForm" action="<?php echo base_url('pauseTask'); ?>" method="POST" style="<?php echo $pauseTimeExists && $resumeTimeExists && !$endTimeExists ? '' : 'display: none;'; ?>">
                                                        <input type="hidden" name="taskId" value="<?php echo $task->id; ?>">
                                                        <button type="submit" class="btn btn-warning pauseBtn">Pause</button>
                                                    </form>
                                                    <form id="unpauseForm_<?php echo $task->id; ?>" class="taskForm" action="<?php echo base_url('unpauseTask'); ?>" method="POST" style="<?php  echo $pauseTimeExists && !$resumeTimeExists ? '' : 'display: none;'; ?>">
                                                        <input type="hidden" name="taskId" value="<?php echo $task->id; ?>">
                                                        <button type="submit" class="btn btn-info unpauseBtn">Unpause</button>
                                                    </form>
                                                    <form id="finishForm_<?php echo $task->id; ?>" class="taskForm" action="<?php echo base_url('finishTask'); ?>" method="POST" style="<?php echo $endTimeExists ? 'display: none;' : ''; ?>">
                                                        <input type="hidden" name="taskId" value="<?php echo $task->id; ?>">
                                                        <button type="submit" class="btn btn-danger finishBtn">Finish</button>
                                                    </form>
                                                </td> 
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

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
