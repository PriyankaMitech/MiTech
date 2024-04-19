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
                                <h5>Project-wise Task Counts:</h5>
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
                <th>Working Hours</th>
                <th>Working Minutes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['TaskDetails'] as $task): ?>
                <?php if ($task->project_id == $project['projectId']): ?>
                    <tr>
                        <td><?php echo $task->mainTaskName; ?></td>
                        <td><?php echo $task->sub_task_name; ?></td>
                        <td><?php echo $task->working_hours; ?></td>
                        <td><?php echo $task->working_min; ?></td>
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


