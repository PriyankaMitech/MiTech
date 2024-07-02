<?php echo view ("Admin/Adminsidebar"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white">Create Employee</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white">Create Employee</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid p-2">
            <div class="card card-default">
                <div class="card-header">
                <form action="<?php echo base_url()?>createemp" method="post" id="createEmployeeForm" enctype="multipart/form-data">
                            <!-- <?php //echo'<pre>'; print_r($single_data);exit();?> -->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="hidden" name="Emp_id" class="form-control" id="Emp_id"
                                            value="<?php if(!empty($single_data)){ echo $single_data->Emp_id;} ?>">

                                        <input type="text" class="form-control" name="emp_name" placeholder="Name"
                                            value="<?php if(!empty($single_data)){ echo $single_data->emp_name;} ?>"
                                            id="name" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="mobile_no">Contact Number:</label>
                                        <input type="text" class="form-control" name="mobile_no" placeholder="Contact Number"
                                            value="<?php if(!empty($single_data)){ echo $single_data->mobile_no;} ?>"
                                            id="mobile_no" pattern="\d{10}" maxlength="10" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="WhatsApp_no">WhatsApp Number:</label>
                                        <input type="text" class="form-control" name="WhatsApp_no" placeholder="WhatsApp Number"
                                            value="<?php if(!empty($single_data)){ echo $single_data->WhatsApp_no;} ?>"
                                            id="WhatsApp_no" pattern="\d{10}" maxlength="10" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" name="emp_email" placeholder="Email" 
                                            value="<?php if(!empty($single_data)){ echo $single_data->emp_email;} ?>"
                                            id="email" required>
                                        <span id="emailError" class="text-danger" style="display: none;">Email already exists</span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="department">Department:</label>
                                        <select class="form-control" name="emp_department" id="department" placeholder="Department" required>
                                            <option value="">Select Department</option>
                                            <?php if (!empty($DepartmentData)) { ?>
                                            <?php foreach ($DepartmentData as $data) { ?>
                                            <option value="<?= $data->id; ?>"
                                                <?= (!empty($single_data) && $single_data->emp_department === $data->id) ? "selected" : "" ?>>
                                                <?= $data->DepartmentName; ?>
                                            </option>
                                            <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="emergency_name">Emergency Contact Name:</label>
                                        <input type="text" class="form-control" name="emergency_name" placeholder="Emergency Name"
                                            value="<?php if(!empty($single_data)){ echo $single_data->emergency_name;} ?>"
                                            id="emergency_name" required>
                                    </div>
                                </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="relationship">Relationship:</label>
                                                <input type="text" class="form-control" name="relationship" placeholder="Relationship"
                                                    value="<?php if(!empty($single_data)){ echo $single_data->relationship;} ?>"
                                                    id="relationship" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="emergency_no">Emergency Number:</label>
                                                <input type="text" class="form-control" name="emergency_no" placeholder="Emergency Number"
                                                    value="<?php if(!empty($single_data)){ echo $single_data->emergency_no;} ?>"
                                                    id="emergency_no" pattern="\d{10}" maxlength="10" required>
                                            </div>
                                        </div>
                             
                           
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="joiningDate">Joining Date:</label>
                                        <input type="date" class="form-control" name="emp_joiningdate" id="joiningDate"
                                            value="<?php if(!empty($single_data)){ echo $single_data->emp_joiningdate;} ?>"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                                            value="<?php if(!empty($single_data)){ echo $single_data->password;} ?>"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="confirm_password"> Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm_password"  name="confirm_password" placeholder="confirm Password"  value="<?php if(!empty($single_data)){ echo $single_data->password;} ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="required-field">Add this user as:</label>
                                    <div class="form-group d-flex align-items-center userRole">
                                        <div class="form-check mr-3">
                                            <input class="form-check-input" type="radio" id="admin" name="user_role" value="Admin" <?php if(!empty($single_data) && $single_data->role == 'Admin'){ echo 'checked';} ?> >
                                            <label class="form-check-label" for="admin">Admin</label>
                                        </div>
                                        <div class="form-check mr-3">
                                            <input class="form-check-input" type="radio" id="employee" name="user_role" value="Employee" <?php if(!empty($single_data) && $single_data->role == 'Employee'){ echo 'checked';} ?>>
                                            <label class="form-check-label" for="employee">Employee</label>
                                        </div>
                                        <div class="form-check mr-3">
                                            <input class="form-check-input" type="radio" id="other" name="user_role" value="Other" <?php if(!empty($single_data) && $single_data->role == 'Other'){ echo 'checked';} ?>>
                                            <label class="form-check-label" for="other">Other</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="PhotoFile">User Photo</label>
                                        <div class="d-flex align-items-center">
                                            <?php if(!empty($single_data) && !empty($single_data->PhotoFile)) { ?>
                                                <a href="<?php echo base_url('public/uploads/photos/' . $single_data->PhotoFile); ?>" target="_blank" class="btn btn-primary btn-sm mr-1">
                                                    <i class="fas fa-image"></i>
                                                </a>
                                            <?php } else { ?>
                                                <span class="text-danger mr-1">No photo available</span>
                                            <?php } ?>
                                            <input type="file" class="form-control" id="PhotoFile" name="PhotoFile">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="AadharFile">Aadhar File</label>
                                        <div class="d-flex align-items-center">
                                            <?php if(!empty($single_data) && !empty($single_data->AadharFile)) { ?>
                                                <a href="<?php echo base_url('public/uploads/aadhar/' . $single_data->AadharFile); ?>" target="_blank" class="btn btn-primary btn-sm mr-1">
                                                    <i class="fas fa-image"></i>
                                                </a>
                                            <?php } else { ?>
                                                <span class="text-danger mr-1">No Aadhar available</span>
                                            <?php } ?>
                                            <input type="file" class="form-control" id="AadharFile" name="AadharFile">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="PhotoFile">Resume File</label>
                                        <div class="d-flex align-items-center">
                                            <?php if(!empty($single_data) && !empty($single_data->ResumeFile)) { ?>
                                                <a href="<?php echo base_url('public/uploads/resumes/' . $single_data->ResumeFile); ?>" target="_blank" class="btn btn-primary btn-sm mr-1">
                                                    <i class="fas fa-image"></i>
                                                </a>
                                            <?php } else { ?>
                                                <span class="text-danger mr-1">No Resume available</span>
                                            <?php } ?>
                                            <input type="file" class="form-control" id="ResumeFile" name="ResumeFile" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="AadharFile">PAN File</label>
                                        <div class="d-flex align-items-center">
                                            <?php if(!empty($single_data) && !empty($single_data->PANFile)) { ?>
                                                <a href="<?php echo base_url('public/uploads/pan/' . $single_data->PANFile); ?>" target="_blank" class="btn btn-primary btn-sm mr-1">
                                                    <i class="fas fa-image"></i>
                                                </a>
                                            <?php } else { ?>
                                                <span class="text-danger mr-1">No PAN available</span>
                                            <?php } ?>
                                            <input type="file" class="form-control" id="PANFile" name="PANFile">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">                    
                                <div class="col-md-12">
                                    <label>Access Level</label>
                                </div>
                                <?php if (!empty($menu_data)) {
                                    $default_access = ['EmployeeDashboard', 'saveSignupTime', 'myTasks', 'Daily_Task'];
                                    $i = 1; ?>
                                    <?php foreach ($menu_data as $data) { ?>
                                    <div class="col-md-4">
                                        <input type="checkbox" id="access_<?= $i ?>" name="access_level[]"
                                            value="<?= $data->url_location; ?>"
                                            <?= in_array($data->url_location, $default_access) ? 'checked' : '' ?>
                                            <?= (isset($single_data) && is_object($single_data) && property_exists($single_data, 'access_level') && in_array($data->url_location, explode(',', $single_data->access_level))) ? 'checked' : '' ?>>
                                        <label for="access_<?= $i ?>"> <?= $data->menu_name; ?></label>
                                    </div>
                                    <?php $i++; } ?>
                                <?php } ?>
                            </div>
                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" name="submit" id="submit" class="btn btn-primary">
                                    <?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Submit';} ?>
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>
<?php echo view("Admin/Adminfooter"); ?>

<script>
$(document).ready(function() {
    $('#viewCreateEmployeeBtn').on('click', function() {
        var $viewEmployeeListCard = $('#viewEmployeeListCard');
        var $leaveForm = $('.card').not('#viewEmployeeListCard');
        var $button = $('#viewCreateEmployeeBtn');
        var $button1 = $('.viewApplicationsBtn');


        if ($viewEmployeeListCard.is(':hidden')) {
            $viewEmployeeListCard.show();
            $leaveForm.hide();
            $button.text('+ Add User'); // Change text when showing Empolyee List
            $button1.text('Employee List'); // Change text when showing applications

        } else {
            $viewEmployeeListCard.hide();
            $leaveForm.show();
            $button.text('Employee List'); // Change text when showing Create Employee form
            $button1.text('Add User'); // Change text when showing applications


        }
    });
});

$(document).ready(function() {
    const defaultAccessLevels = {
        Admin: ['saveSignupTime', 'leave_list', 'addTask', 'notification_list', 'chatuser', 'meetings', 'AddNewUser', 'emp_list', 'listofproject', 'po_list', 'invoice_list', 'proforma_list', 'debitnote_list', 'client_list', 'maintask_list', 'department_list', 'services_list', 'currency_list', 'dailyblog_list'],
        Employee: ['EmployeeDashboard', 'saveSignupTime', 'myTasks', 'Daily_Task', 'notification_list', 'chatuser', 'meetings'],
        Other: []
    };

    const menuData = <?php echo json_encode($menu_data); ?>;

    // Function to update checkboxes based on selected role
    function updateAccessLevels(role) {
        $(".access-level-checkbox").each(function() {
            const checkbox = $(this);
            const value = checkbox.val();

            if (defaultAccessLevels[role].includes(value)) {
                checkbox.prop("checked", true);
            } else {
                checkbox.prop("checked", false);
            }
        });
    }

    // Function to add the Testing-specific checkbox
    function addTestingCheckbox() {
        const testingCheckboxHtml = `
            <div class="col-md-4" id="testingCheckboxContainer">
                <input type="checkbox" id="access_testing" name="access_level[]" value="testing_specific" class="access-level-checkbox" checked>
                <label for="access_testing"> Create/Edit Test case </label>
            </div>
        `;
        $("#accessLevelContainer").append(testingCheckboxHtml);
    }

    // Function to check if the department is Testing
    function checkDepartment() {
        const selectedDepartment = $("#department option:selected").text();
        if (selectedDepartment === "Testing") {
            if ($("#testingCheckboxContainer").length === 0) {
                addTestingCheckbox();
            }
            $("#access_testing").prop("checked", true);
        } else {
            $("#testingCheckboxContainer").remove();
        }
    }

    // Event listener for department dropdown
    $("#department").change(function() {
        checkDepartment();
    });

    // Check initial department value on page load
    checkDepartment();

    // Event listener for radio buttons
    $("input[name='user_role']").change(function() {
        const selectedRole = $(this).val();
        updateAccessLevels(selectedRole);

        // Additional logic for Employee role and Testing department
        if (selectedRole === "Employee" && $("#department option:selected").text() === "Testing") {
            if ($("#testingCheckboxContainer").length === 0) {
                addTestingCheckbox();
            }
            $("#access_testing").prop("checked", true);
        }
    });

    // Initialize checkboxes based on the current selection
    const currentRole = $("input[name='user_role']:checked").val();
    if (currentRole) {
        updateAccessLevels(currentRole);

        // Additional logic for Employee role and Testing department
        if (currentRole === "Employee" && $("#department option:selected").text() === "Testing") {
            if ($("#testingCheckboxContainer").length === 0) {
                addTestingCheckbox();
            }
            $("#access_testing").prop("checked", true);
        }
    }
});



</script>     