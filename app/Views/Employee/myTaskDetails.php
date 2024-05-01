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
                                <ul class="list-group">
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
                                                    <?php foreach ($data['TaskDetails'] as $task): ?>
                                                        <?php if ($task->project_id == $project['projectId']): ?>
                                                            <tr>
                                                                <td><?php echo $task->mainTaskName; ?></td>
                                                                <td><?php echo $task->sub_task_name; ?></td>
                                                                <td><?php echo $task->working_hours; ?></td>
                                                            
                                                                <td>
                                                                    <div class="btn-group" role="group" aria-label="Task actions">
                                                                    <input type="hidden" id="lastInsertedId" name="workingTimingId" value="">
                                                                        <button type="button" class="btn btn-success startBtn" data-task-id="<?php echo $task->id; ?>">Start</button>
                                                                        <button type="button" id ="pauseBtn_<?php echo $task->id; ?>" class="btn btn-warning showbtn pauseBtn mr-3" style="display: none;" data-task-id="<?php echo $task->id; ?>">Pause</button>
                                                                        <button type="button" id ="finishBtn_<?php echo $task->id; ?>" class="btn btn-danger showbtn finishBtn float-right" style="display: none;" data-task-id="<?php echo $task->id; ?>">Finish</button>
                                                                    </div>
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
</script>
<script>



// $(document).ready(function() {
//     // Initially hide pause and finish buttons
//     $(".pauseBtn, .finishBtn").hide();

//     // Event listener for the Start button
//     $(".startBtn").click(function() {
//         var taskId = $(this).data('task-id');
        
//         // Update action and hide start button, show pause and finish buttons
//         $("#taskForm_" + taskId + " input[name='action']").val("start");
//         $(this).hide();
//         // $("#taskForm_" + taskId + " .pauseBtn").css("display", "block");
//         // $("#taskForm_" + taskId + " .finishBtn").css("display", "block");
//         $("#finishBtn_" + taskId ).css("display", "block");
//         $("#pauseBtn_" + taskId ).css("display", "block");

//         // Submit the form
//         $("#taskForm_" + taskId).submit();
//     });

//     // Event listener for the Pause button
//     $(".pauseBtn").click(function() {
//         var taskId = $(this).data('task-id');
//         var actionBtn = $(this);
        
        
//         // Toggle between pause and unpause action
//         var action = (actionBtn.text() === 'Pause') ? 'pause' : 'unpause';
        
//         // Update action and button text accordingly
//         $("#taskForm_" + taskId + " input[name='action']").val(action);
//         actionBtn.text((action === 'pause') ? 'Unpause' : 'Pause');
        
//         // Submit the form
//         $("#taskForm_" + taskId).submit();
//     });

//     // Event listener for the Finish button
//     $(".finishBtn").click(function() {
//         var taskId = $(this).data('task-id');
        
//         // Update action and hide all buttons
//         $("#taskForm_" + taskId + " input[name='action']").val("finish");
//         $(".startBtn, .pauseBtn, .finishBtn").hide();
        
//         // Submit the form
//         $("#taskForm_" + taskId).submit();
//     });
// });


// $('.startBtn').click(function() {
//     var taskId = $(this).data('task-id');
//     var currentTime = new Date().toLocaleString('en-IN', { timeZone: 'Asia/Kolkata' });
   

//     // Split the current time into date and time components
//     var dateParts = currentTime.split(',')[0].split('/');
//     var timePart = currentTime.split(',')[1].trim();

//     // Reorder date components and format them
//     var formattedDate = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0];

//     // Combine date and time components
//     var formattedTimestamp = formattedDate + ' ' + timePart;

//     recordAction( taskId, 'start', formattedTimestamp);
// });

//     // Event listener for the Pause button

//     $('.pauseBtn').click(function() {
//     var taskId = $(this).data('task-id');
//     var buttonText = $(this).text().trim(); // Get the button text and remove any leading/trailing spaces
//     var WorkingTimeId = $('#lastInsertedId').val();
//     console.log(WorkingTimeId); 

//     // Determine the action based on the button text
//     var action;
//     if (buttonText === 'Pause') {
//         action = 'pause_start';
//     } else if (buttonText === 'Unpause') {
//         action = 'pause_end';
//     } else {
//         console.error('Unknown button text:', buttonText);
//         return; // Exit the function if the button text is not recognized
//     }


//     var currentTime = new Date().toLocaleString('en-IN', { timeZone: 'Asia/Kolkata' });
//     // console.log(currentTime);

//     // Split the current time into date and time components
//     var dateParts = currentTime.split(',')[0].split('/');
//     var timePart = currentTime.split(',')[1].trim();

//     // Reorder date components and format them
//     var formattedDate = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0];

//     // Combine date and time components
//     var formattedTimestamp = formattedDate + ' ' + timePart;
    
//     recordAction( taskId, action, formattedTimestamp);
// });

// // Event listener for the Finish button
// $('.finishBtn').click(function() {
//     var taskId = $(this).data('task-id');
//     // var currentTime = new Date().toISOString().slice(0, 19).replace('T', ' ');
//     var currentTime = new Date().toLocaleString('en-IN', { timeZone: 'Asia/Kolkata' });
//     var WorkingTimeId = null;
//     // console.log(currentTime);

//     // Split the current time into date and time components
//     var dateParts = currentTime.split(',')[0].split('/');
//     var timePart = currentTime.split(',')[1].trim();

//     // Reorder date components and format them
//     var formattedDate = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0];

//     // Combine date and time components
//     var formattedTimestamp = formattedDate + ' ' + timePart;

//     recordAction(taskId, 'finish', formattedTimestamp);
// });


// function recordAction(taskId, action, timestamp) {
//     $.ajax({
        
//         url: '<?php echo base_url();?>record-action', // Update the URL to match your route
//         method: 'POST',
//         data: {
//             task_id: taskId,
//             action: action,
//             timestamp: timestamp,
            
//         },
//         success: function(response) {
//             // console.log('hi')
//             console.log(response.lastInsertedId);
//             $('#lastInsertedId').val(response.lastInsertedId);
    
//         },
//         error: function(xhr, status, error) {
//             // Handle error if needed
//             console.error(xhr.responseText);
//         }
//     });
// }

$(document).ready(function() {
    // Initially hide pause and finish buttons
    $(".pauseBtn, .finishBtn").hide();

    // Event listener for the Start button
    $(".startBtn").click(function() {
        var taskId = $(this).data('task-id');
        
        // Update action and hide start button, show pause and finish buttons
        var action = "start";
        $(this).hide();
        $("#finishBtn_" + taskId ).css("display", "block");
        $("#pauseBtn_" + taskId ).css("display", "block");

        // Construct timestamp using toLocaleString
        var currentTime = new Date().toLocaleString('en-IN', { timeZone: 'Asia/Kolkata' });
//      Split the current time into date and time components
        var dateParts = currentTime.split(',')[0].split('/');
        var timePart = currentTime.split(',')[1].trim();

        // Reorder date components and format them
        var formattedDate = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0];

        // Combine date and time components
        var formattedTimestamp = formattedDate + ' ' + timePart;

//     recordAction( taskId, 'start', formattedTimestamp);
        
        // Send AJAX request to start the task
        $.ajax({
            url: '<?php echo base_url();?>record-action',
            method: 'POST',
            dataType: 'json',
            data: {
                task_id: taskId,
                action: action,
                timestamp: currentTime
            },
            success: function(response) {
                // Handle success response if needed
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Handle error if needed
                console.error(xhr.responseText);
            }
        });
    });

    // Similar event listeners for Pause and Finish buttons...

    // Event listener for the Pause button
    $(".pauseBtn").click(function() {
        var taskId = $(this).data('task-id');
        var actionBtn = $(this);

        // Toggle between pause and unpause action
        var action = (actionBtn.text() === 'Pause') ? 'pause' : 'unpause';
        
        // Update action and button text accordingly
        actionBtn.text((action === 'pause') ? 'Unpause' : 'Pause');

        var currentTime = new Date().toLocaleString('en-IN', { timeZone: 'Asia/Kolkata' });
        // console.log(currentTime);

        // Split the current time into date and time components
        var dateParts = currentTime.split(',')[0].split('/');
        var timePart = currentTime.split(',')[1].trim();

        // Reorder date components and format them
        var formattedDate = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0];

        // Combine date and time components
        var formattedTimestamp = formattedDate + ' ' + timePart;
        
        // Send AJAX request to pause/unpause the task
        $.ajax({
            url: '<?php echo base_url();?>record-action',
            method: 'POST',
            dataType: 'json',
            data: {
                task_id: taskId,
                action: action,
                timestamp:  formattedTimestamp // Example timestamp
            },
            success: function(response) {
                // Handle success response if needed
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Handle error if needed
                console.error(xhr.responseText);
            }
        });
    });

    // Event listener for the Finish button
    $(".finishBtn").click(function() {
        var taskId = $(this).data('task-id');
        
        // Update action and hide all buttons
        var action = "finish";
        $(".startBtn, .pauseBtn, .finishBtn").hide();

    var currentTime = new Date().toLocaleString('en-IN', { timeZone: 'Asia/Kolkata' });
    var WorkingTimeId = null;
    // console.log(currentTime);

    // Split the current time into date and time components
    var dateParts = currentTime.split(',')[0].split('/');
    var timePart = currentTime.split(',')[1].trim();

    // Reorder date components and format them
    var formattedDate = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0];

    // Combine date and time components
    var formattedTimestamp = formattedDate + ' ' + timePart;
        
        // Send AJAX request to finish the task
        $.ajax({
            url: '<?php echo base_url();?>record-action',
            method: 'POST',
            dataType: 'json',
            data: {
                task_id: taskId,
                action: action,
                timestamp: formattedTimestamp // Example timestamp
            },
            success: function(response) {
                // Handle success response if needed
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Handle error if needed
                console.error(xhr.responseText);
            }
        });
    });
});



    

    



 </script>



