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


<style>
/* Styles remain the same */
.select2-purple .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #fff!important;
    border-color: #000!important;
    color: #000!important;
}
select2-container--default .select2-selection--multiple .select2-selection__choice__remove { color: #000!important; }
.select2-container--default .select2-purple .select2-results__option--highlighted[aria-selected]:hover {
    background-color: gray!important;
    color: #fff;
}
.select2-purple .select2-container--default .select2-selection--multiple .select2-selection__choice__remove { color: #000; }
.select2-container--default .select2-purple .select2-results__option--highlighted[aria-selected], 
.select2-container--default .select2-purple .select2-results__option--highlighted[aria-selected]:hover {
    background-color: gray!important;
    color: #fff;
}
.delete-row { margin-top: 2rem; }
.brand-link .brand-image {
    float: left;
    line-height: 0.8;
    margin-left: -0.2rem;
    margin-right: 0.5rem;
    margin-top: 6px!important;
    max-height: 18px!important;
    width: auto;
}
</style>

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
                        <li class="breadcrumb-item active text-white viewApplicationsBtn"> Assigned Tasks</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <button type="button" id="viewApplicationsBtn" class="btn btn-info m-2">+ Assigned Tasks</button>
                    <div class="card" id="viewApplicationsCard">
                        <div class="card-header">
                            <h3 class="card-title">Assigned Tasks List</h3>
                        </div>
                        <div class="card-body">
                        <table class="table-example1 table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>Sr.No</th>

                                    <th>Project Name</th>
                                    <th>Main Task name</th>
                                    <th>Sub Task Name</th>
                                    <th>Employee Name</th>
                                    <th>Developer Status</th>
                                    <th>Start Time to End Time</th>
                                    <th>Total Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($assignedTasksData)) { $i =1; ?>
                                    <?php foreach ($assignedTasksData as $task):
                                        // echo'<pre>';print_r($task);die; ?>
                                        <?php
                                        $adminModel = new \App\Models\Adminmodel();
                                        $wherecond1 = array('is_deleted' => 'N', 'allotTask_id' => $task->id);
                                        $pause_timedata = $adminModel->getalldata('tbl_pausetiming', $wherecond1);

                                        // Initialize the time breakdown list items
                                        $time_breakdown = "<ul><li>" . date("d M g:i a", strtotime($task->start_time));
                                        $previous_resume_time = $task->start_time;

                                        // Calculate total time
                                        $total_seconds = 0;

                                        if (!empty($pause_timedata)) {
                                            foreach ($pause_timedata as $data) {
                                                $pause_time = date("d M g:i a", strtotime($data->pause_time));
                                                $resume_time = date("d M g:i a", strtotime($data->resume_time));
                                                $time_breakdown .= " - " . $pause_time . "</li><li>" . $resume_time;
                                                
                                                // Calculate time from previous resume to pause
                                                $from_time = strtotime($previous_resume_time);
                                                $to_time = strtotime($data->pause_time);
                                                if ($from_time !== false && $to_time !== false && $to_time > $from_time) {
                                                    $total_seconds += ($to_time - $from_time);
                                                }

                                                // Update the previous resume time
                                                $previous_resume_time = $data->resume_time;
                                            }
                                        }

                                        // Calculate time from last resume to end
                                        $from_time = strtotime($previous_resume_time);
                                        $to_time = strtotime($task->end_time);
                                        if ($from_time !== false && $to_time !== false && $to_time > $from_time) {
                                            $total_seconds += ($to_time - $from_time);
                                        }

                                        $end_time = date("d M g:i a", strtotime($task->end_time));
                                        $time_breakdown .= " - " . $end_time . "</li></ul>";
                                        
                                        // Calculate total hours and minutes
                                        $hours = floor($total_seconds / 3600);
                                        $minutes = floor(($total_seconds % 3600) / 60);
                                        ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?php echo $task->projectName; ?></td>
                                            <td><?php echo $task->mainTaskName; ?></td>
                                            <td><?php echo $task->sub_task_name; ?></td>
                                            <td><?php echo $task->emp_name; ?></td>
                                            <td>
                                                            <?php 
                                                                $statusLabel = '';
                                                                switch ($task->Developer_task_status) {
                                                                    case 'complete':
                                                                        $statusLabel = 'complete'; ?>
                                                                        <small class="badge badge-success"><?php echo $statusLabel; ?> </small>
                                                                       <?php break;
                                                                    case 'Bottleneck':
                                                                        $statusLabel = 'Bottleneck';?>
                                                                        <small class="badge badge-danger"><?php echo $statusLabel; ?> </small>
                                                                       <?php break;
                                                                    case 'In Progress':
                                                                        $statusLabel = 'In Progress'; ?>
                                                                        <small class="badge badge-primary"><?php echo $statusLabel; ?> </small>
                                                                       <?php break;
                                                                    // Add more cases if needed
                                                                    case 'Pending':
                                                                        $statusLabel = 'Pending'; ?>
                                                                        <small class="badge badge-warning"><?php echo $statusLabel; ?> </small>
                                                                       <?php break;
                                                                }?>
                                                             
                                                            
                                                        </td>
                                            <td style="width: 100%; !important"><?php echo $time_breakdown; ?></td>
                                            <td><?php echo " (" . $hours . "h " . $minutes . "m)"; ?></td>
                                        
                                        </tr>
                                    <?php endforeach; ?>
                                <?php } ?>
                            </tbody>
                        </table>

                        </div>
                    </div>

                    <div class="card card-default" style="display:none">
                        <div class="card-header">
                        <form action="<?php echo base_url()?>allotTask" method="post" id="form">
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
                                        <option value="<?=$data->p_id; ?>" <?php if ((!empty($single_data)) && $single_data->project_id === $data->p_id ) { echo 'selected'; } ?>>
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
                                <select class="select2" name="Departmentname[]" multiple="multiple" id="departmentSelect" data-placeholder="Select a Department" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
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
                                <select class="form-control main-task-name" name="mainTaskName[]" onchange="fetchSubTasks(this)" required>
                                    <option value="">Please select main task</option>
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
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="employeeName">Employee name</label>
                                <div class="select2-purple">
                                    <select class="form-control employeeSelect" name="employeeName[]" style="width: 100%;" id="employeeSelect" required>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="workingHours">Hours:</label>
                                <input type="number" class="form-control working-hours" name="workingHours[]" min="0" max="23" value="" required>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="workingMinutes">Minutes:</label>
                                <input type="number" class="form-control working-minutes" name="workingMinutes[]" min="0" max="59" value="" required>
                            </div>
                        </div>
                        <div class="text-center col-md-1 mt-2">
                            <div class="form-group mt-4">
                                <a href="javascript:void(0)" class="add-more btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="text-center col-md-1 mt-2">
                            <div class="form-group mt-4">
                                <a href="javascript:void(0)" class="remove-task btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Assign Task</button>
                </div>
            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<?php
 
 $file = __DIR__ . "/Adminfooter.php";
if (file_exists($file)) {
    include $file;
} else {
    echo "File not found: $file";
}
 ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        $('#form').validate({
            rules: {
                Projectname: {
                    required: true
                },
                'Departmentname[]': {
                    required: true
                },
                'mainTaskName[]': {
                    required: true
                },
                'subTaskName[]': {
                    required: true
                },
                'employeeName[]': {
                    required: true
                },
                'workingHours[]': {
                    required: true,
                    min: 0,
                    max: 23,
                    digits: true
                },
                'workingMinutes[]': {
                    required: true,
                    min: 0,
                    max: 59,
                    digits: true
                }
            },
            messages: {
                Projectname: {
                    required: "Please select a project"
                },
                'Departmentname[]': {
                    required: "Please select at least one department"
                },
                'mainTaskName[]': {
                    required: "Please select a main task"
                },
                'subTaskName[]': {
                    required: "Please select a sub task"
                },
                'employeeName[]': {
                    required: "Please select an employee"
                },
                'workingHours[]': {
                    required: "Please enter working hours",
                    min: "Hours must be between 0 and 23",
                    max: "Hours must be between 0 and 23",
                    digits: "Please enter a valid number"
                },
                'workingMinutes[]': {
                    required: "Please enter working minutes",
                    min: "Minutes must be between 0 and 59",
                    max: "Minutes must be between 0 and 59",
                    digits: "Please enter a valid number"
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>



<script>
$(document).ready(function() {
    // Function to fetch employees based on selected department
    function fetchEmployees(selectedDepartments, callback) {
        $.ajax({
            type: 'POST',
            url: "<?= base_url(); ?>getEmployees",
            data: { departments: selectedDepartments },
            success: function(response) {
                var employees = response.employees;
                $('.employeeSelect').empty();
                $.each(employees, function(index, employee) {
                    $('.employeeSelect').append('<option value="' + employee.emp_id + '">' + employee.emp_name + '</option>');
                });
                if (callback) callback();
            },
            error: function(xhr, status, error) {
                console.error('Error occurred during AJAX request:', status, error);
            }
        });
    }

    function reapplyEmployeeSelections(selections) {
        $('.employeeSelect').each(function(index) {
            $(this).val(selections[index]);
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

    var newIndex = 0;

    // Ensure event listener for adding new rows is attached only once
    $(document).on('click', '.add-more', function() {
        newIndex++;

        // Store current selections
        var employeeSelections = [];
        $('.employeeSelect').each(function() {
            employeeSelections.push($(this).val());
        });

        var newRow = $('<div class="row main-task-row">\
            <div class="col-md-3">\
                <div class="form-group">\
                    <label for="mainTaskName">Main Task name</label>\
                    <select class="form-control main-task-name" name="mainTaskName[' + newIndex + ']" onchange="fetchSubTasks(this)" required>\
                        <option>Please select main task</option>\
                        <?php if(!empty($mainTaskData)){ ?>\
                            <?php foreach ($mainTaskData as $data){ ?>\
                                <option value="<?= $data->id; ?>"><?= $data->mainTaskName; ?></option>\
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
                    <input type="number" class="form-control working-hours" name="workingHours[]" min="0" max="23" value="" required>\
                </div>\
            </div>\
            <div class="col-md-1">\
                <div class="form-group">\
                    <label for="workingMinutes">Minutes:</label>\
                    <input type="number" class="form-control working-minutes" name="workingMinutes[]" min="0" max="59" value="" required>\
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
        
        fetchEmployees($('#departmentSelect').val(), function() {
            reapplyEmployeeSelections(employeeSelections);
        });

        $('.main-task-rows').append(newRow);
    });

    // Function to fetch subtasks based on the selected main task
    function fetchSubTasks(mainTaskSelect) {
        var mainTaskId = mainTaskSelect.value;
        var subTaskSelect = $(mainTaskSelect).closest('.main-task-row').find('.sub-task-name');

        $.ajax({
            type: 'POST',
            url: "<?= base_url(); ?>fetch_subtasks",
            data: JSON.stringify({ mainTaskId: mainTaskId }),
            contentType: 'application/json',
            success: function(response) {
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
                    $button.text('+ Assigned Tasks'); // Change text when showing Invoice List
                    $button1.text('Assigned Tasks List'); // Change text when showing applications

                } else {
                    $viewApplicationsCard.hide();
                    $leaveForm.show();
                    $button.text('Assigned Tasks List'); // Change text when showing Create Invoice form
                    $button1.text('Assigned Tasks'); // Change text when showing applications

                }
            });
        });
</script>



