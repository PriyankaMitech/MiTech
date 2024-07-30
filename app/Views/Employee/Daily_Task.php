<?php echo view("Employee/employeeSidebar"); ?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-12">
                    <button id="viewDailyTaskBtn" class="btn btn-info mt-2">Add Daily Task</button>
                    <!-- View Applications Card -->
                    <div id="viewDailyTaskCard" class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title viewDailyTaskBtn">View Daily Task report</h3>
                        </div>
                        <div class="card-body">
                            <form id="dateSearchForm" method="GET">
                                <div class="form-group row">
                                    <label for="searchDate" class="col-sm-2 col-form-label">Select Date:</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="searchDate" name="searchDate" value="<?= esc($searchDate); ?>" max="<?= date('Y-m-d'); ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>

                            <div id="dailyTaskTable">
                                <?= view('Employee/daily_task_table', ['DailyWorkData' => $DailyWorkData]); ?>
                            </div>
                            
                        </div>
                    </div>
                    <!-- Additional Card for Adding Daily Task -->
                    <div class="card mt-2" style="display: none;">
                    <div class="card-header">
                        <h3 class="card-title">Daily Work</h3>
                        <h6 class="text-right" id="currentDate"><b><?php echo date('F j, Y'); ?></b></h6>
                    </div>
                        <div class="card-body">
                            <form action="<?= base_url('daily_work'); ?>" method="post" id="dailyWorkForm">
                                <div class="row">
                                   
                                    <!-- <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="project_name">Project Name</label>
                                            <input type="text" class="form-control" name="project_name[]"
                                                id="project_name" placeholder="Enter project name">
                                        </div>
                                    </div> -->
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="task_date">Task Date</label>
                                            <input type="date" class="form-control" name="task_date"
                                                id="task_date" placeholder="Select task date">
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="project_name">Project Name:</label>
                                            <select class="form-control" name="project_name[]" id="project_name[]" required>
                                                <option value="">Select Project</option>
                                                <?php if (!empty($projectData)) { ?>
                                                    <?php foreach ($projectData as $data) { ?>
                                                        <option value="<?=$data->p_id; ?>"
                                                            <?php if ((!empty($single_data)) && $single_data->project_name === $data->p_id) { echo 'selected'; } ?>>
                                                            <?= $data->projectName; ?>
                                                        </option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12"  >
                                        <div class="form-group">
                                            <label for="task">Task</label>
                                                <textarea id="task" name="task[]" class="form-control" rows="1" cols="2"  placeholder="Task"><?php if(!empty($single_data)){ echo $single_data->task;} ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="use_hours">Hours for Task: </label>
                                            <input type="number" class="form-control" name="use_hours[]" id="use_hours"
                                            placeholder="Hours for the Task" step="0.01" value="<?php if(!empty($single_data)){ echo $single_data->use_hours;} ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                        <label for="task_status">Task Status: </label>
                                            <select id="task_status" class="form-control form-select "name="task_status[]" >
                                                <option value="" selected>Select task status</option>
                                                <option value="Complete" <?php if ((!empty($single_data)) && $single_data->task_status == 'Complete') echo "selected"; ?>>Complete</option>
                                                <option value="Work In Progress" <?php if ((!empty($single_data)) && $single_data->task_status == 'Work In Progress') echo "selected"; ?>> Work In Progress</option>
                                                <option value="Pending" <?php if ((!empty($single_data)) && $single_data->task_status == 'Pending') echo "selected"; ?>>Hold</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="use_minutes">Minutes</label>
                                            <input type="number" class="form-control" name="use_minutes[]"
                                                id="use_minutes" placeholder="Enter use minutes">
                                        </div>
                                    </div> -->
                                

                                  
                                    <div class="col-md-1 mt-2 ">
                                        <div class="form-group mt-4">
                                            <button type="button" class="btn btn-primary add-row"><i class="fa fa-plus"
                                                    aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div id="dynamic-rows"></div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php echo view("Employee/empfooter"); ?>

<script>
    $(document).ready(function() {
        // Function to toggle between Add and View Daily Task sections
        $('#viewDailyTaskBtn').on('click', function() {
            var $viewDailyTaskCard = $('#viewDailyTaskCard');
            var $leaveForm = $('.card').not('#viewDailyTaskCard');
            var $button = $('#viewDailyTaskBtn');
            var $button1 = $('.viewDailyTaskBtn');

            if ($viewDailyTaskCard.is(':hidden')) {
                $viewDailyTaskCard.show();
                $leaveForm.hide();
                $button.text('Add Daily Task');
                $button1.text('View Daily Task report');
            } else {
                $viewDailyTaskCard.hide();
                $leaveForm.show();
                $button.text('View Daily Task report');
                $button1.text('Add Daily Task');
            }
        });

        // Function to load daily task data based on selected date
        function loadDailyTaskData(date) {
            $.ajax({
                url: '<?= base_url('get_dailyTask_list'); ?>',
                type: 'GET',
                data: { searchDate: date },
                success: function(response) {
                    $('#dailyTaskTable').html(response);
                    var options = { year: 'numeric', month: 'long', day: 'numeric' };
                    // var formattedDate = new Date(date.split('-').reverse().join('-')).toLocaleDateString('en-US', options);
                  
                    var formattedDate = new Date(date).toLocaleDateString('en-US', options);
                    $('#currentDate').html('<b>' + formattedDate + '</b>');
                }
            });
        }

        // Load data for the initial date (today's date)
        var currentDate = new Date().toISOString().slice(0, 10); // Get today's date in YYYY-MM-DD format
        loadDailyTaskData(currentDate);

        // Handle form submission for date search
        $('#dateSearchForm').on('submit', function(e) {
            e.preventDefault();
            var searchDate = $('#searchDate').val();
            loadDailyTaskData(searchDate);
        });
    });
</script>
