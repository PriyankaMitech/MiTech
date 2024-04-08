<?php echo view ("Admin/Adminsidebar.php"); ?>

<style>
    .select2-purple .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #fff!important;
        border-color: #000!important;
        color: #000!important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: #000!important;
    }
    .select2-container--default .select2-purple .select2-results__option--highlighted[aria-selected] :hover {
        background-color: gray!important;
        color: #fff;
    }
    .delete-row{
        margin-top: 2rem;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 sectionHeading">
                    <h1>Allot Task</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Allot Task</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default"> 
                <div class="card-header">
                    <form id="taskForm" action="<?= base_url()?>allotTaskDetails" method="post">
                        <!-- Project and department fields -->
                        <input type="hidden" id="id" name="id" value="<?php if (isset($single_data)) { echo ($single_data->id); } ?>">
                        <input type="hidden" id="projectCount" name="projectCount" value="1"> <!-- Track the number of projects -->
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
                                        <select class="select2"  name="Departmentname[]" multiple="multiple" data-placeholder="Select a Department" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                            <option value="">Select Department</option>
                                            <?php if (!empty($DepartmentData)) { ?>
                                                <?php foreach ($DepartmentData as $data) { ?>
                                                    <option value="<?= $data->id; ?>" >
                                                        <?= $data->DepartmentName; ?>
                                                    </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <a href="javascript:void(0)" class="add-more btn btn-primary">Add more</a>

                        <div class="main-task-rows">
                            <div class="row main-task-row-template" style="display: none;">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="mainTaskName">Main Task name</label>
                                        <select class="form-control main-task-name" name="mainTaskName[]">
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
                                        <input type="text" class="form-control sub-task-name" name="subTaskName[]" required>
                                    </div>
                                </div>
                               
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="employeeName">Employee name</label>
                                        <div class="select2-purple">
                                            <select class="select2" name="employeeName[]" data-placeholder="Select an Employee" data-dropdown-css-class="select2-purple" style="width: 100%;" id="employeeSelect">
                                                <!-- Options will be populated dynamically using JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="workingHours">Working Hours:</label>
                                        <input type="number" class="form-control working-hours" name="workingHours[]" min="0" max="23" value="0" required>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="workingMinutes">Minutes:</label>
                                        <input type="number" class="form-control working-minutes" name="workingMinutes[]" min="0" max="59" value="0" required>
                                    </div>
                                </div>
                            </div>

                            <div class="paste-new-row"></div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4 offset-5">
                                <div class="form-group"> 
                                    <button type="submit" value="" name="Save" id="saveTask" class="btn btn-primary"><?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Save';} ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function(){
        // Function to handle adding new rows
        $(document).on('click', '.add-more', function(){
            var newRow = $('.main-task-row-template').clone().removeClass('main-task-row-template').addClass('main-task-row').removeAttr('style');
            $('.paste-new-row').append(newRow);
        });

        // Function to handle form submission
        $('#taskForm').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission
            console.log('Form submitted!'); // Check if form submission is triggered
            var formData = $(this).serialize(); // Serialize the form data
            console.log('Form data:', formData); // Log serialized form data for debugging
            // Now you can send formData to your controller method using AJAX
            $.ajax({
                type: 'POST',
                url: '<?= base_url("allotTaskDetails"); ?>', // Check if the URL is correct
                data: formData,
                success: function(response) {
                    // Handle success response
                    console.log('Success:', response);
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error('Error:', error);
                }
            });
        });
    });

    </script>
</div>

<?php echo view("Admin/Adminfooter.php"); ?>
