<?php echo view ("Admin/Adminsidebar.php"); ?>


<style>
.select2-purple .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #fff!important;
    border-color: #000!important;
    color: #000!important;
}
select2-container--default .select2-selection--multiple .select2-selection__choice__remove{color:#000!important;
}
.select2-container--default .select2-purple .select2-results__option--highlighted[aria-selected] :hover {
    background-color: gray!important;
    color: #fff;
}
 .select2-purple .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    color: #000;
}
.select2-container--default .select2-purple .select2-results__option--highlighted[aria-selected], .select2-container--default .select2-purple .select2-results__option--highlighted[aria-selected]:hover {
    background-color: gray!important;
    color: #fff;
}
.delete-row{
    margin-top: 2rem;
}
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
                    <form action="<?php echo base_url()?>allotTask" method="post">
                        <!-- Project and department fields -->
                        <input type="hidden" id="id" name="id" value="<?php if (isset($single_data)) { echo ($single_data->id); } ?>">
                        <input type="hidden" id="projectCount" name="projectCount" value="1"> <!-- Track the number of projects -->
                        <!-- <input type="hidden" id="hiddendepartmentName" name="departmentName" value=""> Hidden input for department name -->
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
                            
                               
 
                            <!-- </div> -->
                            <!-- <a href="javascript:void(0)" class="add-more btn btn-primary ">Add more</a> -->

  
                            <div class="main-task-rows">
                                <div class="row main-task-row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="mainTaskName">Main Task name</label>
                                            <select class="form-control main-task-name" name="mainTaskName[]">
                                            <option>Please select main task</option>
                                                <!-- Options will be populated dynamically -->
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
                                            <!-- <button type="button" class="btn btn-success add-row">Add</button> -->
                                            <a href="javascript:void(0)" class="add-more btn btn-primary "><i class="fa fa-plus"
                                                    aria-hidden="true"></i></a>
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
    </section>

  

    <script src= "https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
$(document).ready(function() {
    const projectData = <?= json_encode($projectData) ?>;
    const employeeDetails = <?= json_encode($employeeDetails) ?>;

$(document).ready(function() {
    // Event handler for dropdown items
    $(document).on('click', '.dropdown-item', function() {
        const selectedEmployeeName = $(this).text(); // Extract the employee name from the clicked item
        $(this).closest('.main-task-row').find('#employeeSelectButton').text(selectedEmployeeName); // Update the employee name in the same row
    });

    $(document).on('click', '.dropdown-item', function() {
    const selectedEmployeeName = $(this).text(); // Extract the employee name from the clicked item
    $(this).closest('.main-task-row').find('.selected-employee').val(selectedEmployeeName); // Set the selected employee name in the hidden input field
});

});



});


$(document).ready(function() {
    // Function to fetch employees based on selected department
    function fetchEmployees(selectedDepartments) {
    $.ajax({
        type: 'POST',
        url: "getEmployees", // Path to your PHP script
        data: { departments: selectedDepartments },
        success: function(response) {
            // Parse the JSON response
            var employees = response.employees;
            
            // Clear existing options
            $('.employeeSelect').empty();
            
            // Populate select dropdown with employee names and IDs
            $.each(employees, function(index, employee) {
                $('.employeeSelect').append('<option value="' + employee.emp_id + '">' + employee.emp_name + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.error('Error occurred during AJAX request:', status, error);
        }
    });
}


    // Trigger the change event if a value is already selected
    if ($('#departmentSelect').val()) {
        fetchEmployees($('#departmentSelect').val());
    }
    
    // Fetch employees when department selection changes
    $('#departmentSelect').change(function() {
        var selectedDepartments = $(this).val();
        fetchEmployees(selectedDepartments);
    });

    // Delete row when delete button is clicked
    $(document).on('click', '.delete-row', function(){
        $(this).closest('.main-task-row').remove();
    });


    // Initialize index variable outside the event handler
var newIndex = 0;
    // Add new row when add more button is clicked
    $(document).on('click', '.add-more', function(){
    // Increment the newIndex
    newIndex++;
    // Append new row
    var newRow = $('<div class="row main-task-row">\
                                <div class="col-md-3">\
                                    <div class="form-group">\
                                        <label for="mainTaskName">Main Task name</label>\
                                        <select class="form-control main-task-name" name="mainTaskName[' + newIndex + ']">\
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
                                        <input type="text" class="form-control sub-task-name" name="subTaskName[]" required>\
                                    </div>\
                                </div>\
                                <div class="col-md-2">\
                                        <div class="form-group">\
                                            <label for="employeeName">Employee name</label>\
                                            <div class="select2-purple">\
                                                <select class="form-control employeeSelect" name="employeeName[]"  style="width: 100%;" id="employeeSelect">\
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
        
        // Fetch employees and populate dropdown
        fetchEmployees($('#departmentSelect').val());

        // Append new row to the container
        $('.paste-new-row').append(newRow);
    });
});



// });
</script>


<?php echo view("Admin/Adminfooter.php"); ?>