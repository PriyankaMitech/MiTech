<?php echo view ("Admin/Adminsidebar.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white viewApplicationsBtn">Assigned Tasks</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewApplicationsBtn">Assigned Tasks</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-12">
                <button id="viewApplicationsBtn" class="btn btn-info m-2 ">Assigned Tasks</button>

                    <div class="card" id="viewApplicationsCard">
                        <div class="card-header">
                            <h3 class="card-title">Assigned Tasks List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Project Name</th>
                                        <th>Main Task name</th>
                                        <th>Sub Task Name</th>
                                        <th>Employee Name</th>
                                        <th>Developer Status</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                            <?php if(!empty($assignedTasksData)) { ?>
                            <?php foreach ($assignedTasksData as $task): ?>
                                <tr>
                                    <td><?php  echo $task->projectName;   ?></td>
                                    <td><?php echo $task->mainTaskName; ?></td>
                                    <td><?php echo $task->sub_task_name; ?></td>
                                    <td><?php echo $task->emp_name; ?></td>
                                  

                                    <td>  <small class="badge badge-success"><?php  echo $task->Developer_task_status; ?> </small></td>
                                    <!-- <td>
                                    <a href="edit_task/<?=$task->id ; ?>"><i class="far fa-edit me-2"></i></a>
                                    <a href="<?=base_url(); ?>delete/<?php echo base64_encode($task->id); ?>/tbl_taskDetails" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                                    </td> -->
                                    <!-- Add other table cells as needed -->
                                </tr>
                            <?php endforeach; ?>
                            <?php 
                            } ?>
                          
                        </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div class="card card-default" style="display:none"> 
                <div class="card-header">
                    <form action="<?php echo base_url()?>allotTask" method="post">
                        <input type="hidden" id="id" name="id" value="<?php if (isset($single_data)) { echo ($single_data->id); } ?>">
                        <input type="hidden" id="projectCount" name="projectCount" value="1">
                        <input type="hidden" id="technologyData" value="<?= htmlspecialchars(json_encode($projectData)); ?>">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Projectname">Project Name:</label>
                                    <select class="form-control" name="Projectname" id="Projectname" required>
                                        <option value="">Select Project</option>
                                        <?php if(!empty($projectData)){?>
                                            <?php foreach ($projectData as $data){ ?>
                                                <option value="<?=$data->p_id; ?>"
                                            <?php if ((!empty($single_data)) && $single_data->project_id === $data->p_id ) { echo 'selected'; } ?>>
                                                <?= $data->projectName; ?>
                                        </option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                          
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Department name</label>
                                    <div class="select2-purple">
                                        <select class="select2" name="Departmentname[]" multiple="multiple" id="departmentSelect" data-placeholder="Select a Department" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                            <option value="">Select Department</option>
                                            <?php if (!empty($DepartmentData)) { ?>
                                                <?php foreach ($DepartmentData as $data) { ?>
                                                    <option value="<?= $data->id; ?>">
                                                        <?= $data->DepartmentName; ?>
                                                    </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="main-task-rows">
                            <div class="row main-task-row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="mainTaskName">Main Task name</label>
                                        <select class="form-control main-task-name" name="mainTaskName[]" onchange="fetchSubTasks(this)">
                                            <option>Please select main task</option>
                                            <?php if(!empty($mainTaskData)){ ?>
                                                <?php foreach ($mainTaskData as $data){ ?>
                                                    <option value="<?= $data->id; ?>" <?php if ((!empty($single_data)) && $single_data->mainTask_id === $data->id ) { echo 'selected'; } ?>>
                                                        <?= $data->mainTaskName; ?>
                                                    </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="subTaskName">Sub Task name</label>
                                        <select class="form-control sub-task-name" name="subTaskName[]" required>
                                            <option value="">Please select sub task</option>
                                            <!-- Options will be populated dynamically using JavaScript -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="employeeName">Employee name</label>
                                        <div class="select2-purple">
                                            <select class="form-control employeeSelect" name="employeeName[]"  style="width: 100%;" id="employeeSelect">
                                                <!-- Options will be populated dynamically using JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="workingHours"> Hours:</label>
                                        <input type="number" class="form-control working-hours" name="workingHours[]" min="0" max="23" value="0" required>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="workingMinutes">Minutes:</label>
                                        <input type="number" class="form-control working-minutes" name="workingMinutes[]" min="0" max="59" value="0" required>
                                    </div>
                                </div>
                                <div class="col-md-1 mt-2 ">
                                    <div class="text-center form-group mt-4">
                                        <a href="javascript:void(0)" class="add-more btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="paste-new-row"></div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6 offset-6">
                                <div class="float-right form-group"> 
                                    <button type="submit" value=""  name="Save" id="saveTask" class="btn btn-success btn-lg"><?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Save';} ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>    
            </div>
                </div>
            </div>
        </div>
    </section>
                        
<?php echo view("Admin/Adminfooter.php"); ?>

<script>
$(document).ready(function() {
    // Function to fetch employees based on selected department
    function fetchEmployees(selectedDepartments) {
        $.ajax({
            type: 'POST',
            url: "getEmployees",
            data: { departments: selectedDepartments },
            success: function(response) {
                var employees = response.employees;
                $('.employeeSelect').empty();
                $.each(employees, function(index, employee) {
                    $('.employeeSelect').append('<option value="' + employee.emp_id + '">' + employee.emp_name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error occurred during AJAX request:', status, error);
            }
        });
    }

    if ($('#departmentSelect').val()) {
        fetchEmployees($('#departmentSelect').val());
    }
    
    $('#departmentSelect').change(function() {
        var selectedDepartments = $(this).val();
        fetchEmployees(selectedDepartments);
    });

    $(document).on('click', '.delete-row', function() {
        $(this).closest('.main-task-row').remove();
    });

    // Initialize index variable outside the event handler
    var newIndex = 0;
    $(document).on('click', '.add-more', function() {
        newIndex++;
        var newRow = $('<div class="row main-task-row">\
            <div class="col-md-3">\
                <div class="form-group">\
                    <label for="mainTaskName">Main Task name</label>\
                    <select class="form-control main-task-name" name="mainTaskName[' + newIndex + ']" onchange="fetchSubTasks(this)">\
                        <option>Please select main task</option>\
                        <?php if(!empty($mainTaskData)){ ?>\
                            <?php foreach ($mainTaskData as $data){ ?>\
                                <option value="<?= $data->id; ?>" <?php if ((!empty($single_data)) && $single_data->mainTask_id === $data->id ) { echo 'selected'; } ?>>\
                                    <?= $data->mainTaskName; ?>\
                                </option>\
                            <?php } ?>\
                        <?php } ?>\
                    </select>\
                </div>\
            </div>\
            <div class="col-md-3">\
                <div class="form-group">\
                    <label for="subTaskName">Sub Task name</label>\
                    <select class="form-control sub-task-name" name="subTaskName[]" required>\
                        <option value="">Please select sub task</option>\
                    </select>\
                </div>\
            </div>\
            <div class="col-md-2">\
                <div class="form-group">\
                    <label for="employeeName">Employee name</label>\
                    <div class="select2-purple">\
                        <select class="form-control employeeSelect" name="employeeName[]" style="width: 100%;" id="employeeSelect">\
                        </select>\
                    </div>\
                </div>\
            </div>\
            <div class="col-md-1">\
                <div class="form-group">\
                    <label for="workingHours">Hours:</label>\
                    <input type="number" class="form-control working-hours" name="workingHours[]" min="0" max="23" value="0" required>\
                </div>\
            </div>\
            <div class="col-md-1">\
                <div class="form-group">\
                    <label for="workingMinutes">Minutes:</label>\
                    <input type="number" class="form-control working-minutes" name="workingMinutes[]" min="0" max="59" value="0" required>\
                </div>\
            </div>\
            <div class="text-center col-md-1 mt-2">\
                <div class="form-group mt-4">\
                    <a href="javascript:void(0)" class="add-more btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>\
                </div>\
            </div>\
            <div class="col-md-1">\
                <div class="form-group">\
                    <button class="btn btn-danger delete-row">\
                        <i class="fa fa-trash"></i>\
                    </button>\
                </div>\
            </div>\
        </div>');
        fetchEmployees($('#departmentSelect').val());
        $('.paste-new-row').append(newRow);
    });
});

// Function to fetch subtasks based on the selected main task
function fetchSubTasks(mainTaskSelect) {
    var mainTaskId = mainTaskSelect.value;
    var subTaskSelect = $(mainTaskSelect).closest('.main-task-row').find('.sub-task-name');

    $.ajax({
        type: 'POST',
        url: "fetchSubTasks",
        data: JSON.stringify({ mainTaskId: mainTaskId }),
        contentType: 'application/json',
        success: function(response) {
            // console.log(response);
            subTaskSelect.empty();
            subTaskSelect.append('<option value="">Please select sub task</option>');
            $.each(response, function(index, subTask) {
                subTaskSelect.append('<option value="' + subTask.subTaskName + '">' + subTask.subTaskName + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.error('Error occurred during AJAX request:', status, error);
        }
    });
}

$(document).on('change', '.main-task-name', function() {
    fetchSubTasks(this);
});

</script>


<script>
$(document).ready(function() {
    $('#viewApplicationsBtn').on('click', function() {
        var $viewApplicationsCard = $('#viewApplicationsCard');
        var $leaveForm = $('.card').not('#viewApplicationsCard');
        var $button = $('#viewApplicationsBtn');

        var $button1 = $('.viewApplicationsBtn');


        if ($viewApplicationsCard.is(':hidden')) {
            $viewApplicationsCard.show();
            $leaveForm.hide();
            $button.text('Allot Task'); // Change text when showing applications
            $button1.text('Assigned Tasks'); // Change text when showing applications

        } else {
            $viewApplicationsCard.hide();
            $leaveForm.show();
            $button.text('Assigned Tasks'); // Change text when showing leave form
            $button1.text('Allot Task'); // Change text when showing applications

        }
    });
});

</script>