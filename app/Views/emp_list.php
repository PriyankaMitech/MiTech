<?php echo view('Admin/Adminsidebar.php'); ?>
<style>
         #date-picker-container {
            cursor: pointer;
        }
        #joiningDate {
            cursor: pointer;
        }
    </style>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white viewApplicationsBtn">Employee List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewApplicationsBtn">Employee List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <button id="viewCreateEmployeeBtn" class="btn btn-info mt-2 ">+ Add User</button>
                <!-- Employee List Card -->
                    <div id="viewEmployeeListCard" class="card mt-2" >
                        <!-- <div class="card"> -->
                        <div class="card-header">
                            <h3 class="card-title viewApplicationsBtn">Employee List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Name</th>
                                            <th>Mobile No.</th>
                                            <th>Email</th>
                                            <th>Technology</th>
                                            <th>Employee Details</th>
                                            <!-- <th>Permanent Address</th>
                                            <th>Current Address</th> -->
                                            <th>Attachments</th>
                                            <!-- <th>Resume File</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //  echo "<pre>";print_r($emp_data);exit();
                                        if (!empty($emp_data)) {
                                            $i = 1; ?>
                                            <?php foreach ($emp_data as $data) {  

                                                $model = new \App\Models\AdminModel();
                                                $ids=  $data->emp_department;
                                                $wherecond = array('id' => $ids);
                                                $departmentName = $model->getsinglerow('tbl_department', $wherecond);
                                                // echo "<pre>";print_r($departmentName);exit();
                                                ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $data->emp_name; ?></td>
                                                    <td><?= $data->mobile_no; ?></td>
                                                    <td><?= $data->emp_email; ?></td>
                                                    <td><?php if(!empty($departmentName)){ echo $departmentName->DepartmentName; }?></td>
                                                   <td>
                                                    <button class="btn btn-info btn-sm show-info" data-id="<?= $data->Emp_id; ?>">View </button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-info btn-sm show-attachment" data-id="<?= $data->Emp_id; ?>">View </button>
                                                </td>

                                                    <!-- <td>
                                                        <?php if (!empty($data->PhotoFile)): ?>
                                                            <div class="text-center">
                                                                <a href="<?php echo base_url('public/uploads/photos/' . $data->PhotoFile); ?>" target="_blank" class="btn btn-primary btn-sm mr-1">
                                                                    <i class="fas fa-image"></i>
                                                                </a>
                                                            </div>
                                                        <?php else: ?>
                                                            No photo available
                                                        <?php endif; ?>
                                                    </td>

                                                    <td>
                                                        <?php if (!empty($data->ResumeFile)): ?>
                                                            <div class="text-center">
                                                                <a href="<?php echo base_url('public/uploads/resumes/' . $data->ResumeFile); ?>" target="_blank" class="btn btn-primary btn-sm mr-1">
                                                                    <i class="fas fa-image"></i>
                                                                </a>
                                                            
                                                            </div>
                                                        <?php else: ?>
                                                            No photo available
                                                        <?php endif; ?>
                                                    </td> -->


                                                    <td>
                                                        <a href="edit_emp/<?= $data->Emp_id; ?>"><i class="far fa-edit me-2"></i></a>
                                                        <a href="<?= base_url(); ?>delete_data/<?php echo base64_encode($data->Emp_id); ?>/employee_tbl" onclick="return confirm('Are You Sure You Want To Delete This Employee: <?= $data->emp_name; ?>?')"><i class="far fa-trash-alt me-2"></i></a>
                                                    
                                                    <?php if($data->status == 'Y'){?>

                                                        <a href="<?= base_url(); ?>deactive_data/<?= base64_encode($data->Emp_id); ?>/employee_tbl" onclick="return confirm('Are You Sure You Want To Deactivate This Employee: <?= $data->emp_name; ?>?')">
                                                        <i class="fas fa-user-times text-danger"></i>
                                                        </a> 
                                                        <?php }elseif($data->status == 'N'){ ?>
                                                            <a href="<?= base_url(); ?>active_data/<?php echo base64_encode($data->Emp_id); ?>/employee_tbl" onclick="return confirm('Are You Sure You Want To Active This Record?')"><i class="fas fa-user-check text-success"></i></a>
                                                            <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php $i++;
                                            } ?>
                                        <?php } ?>

                                    </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
                    <!-- Create Employee Form -->

                    <div class="card card-default mt-2" style="display: none;">
    <div class="card-header">
        <form action="<?php echo base_url()?>createemp" method="post" id="createEmployeeForm">
            <div class="note">Note: All fields marked with * are compulsory.</div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="name" class="required-field">Name:</label>
                        <input type="hidden" name="Emp_id" class="form-control" id="Emp_id" value="<?php if(!empty($single_data)){ echo $single_data->Emp_id;} ?>">
                        <input type="text" class="form-control" name="emp_name" placeholder="Name" value="<?php if(!empty($single_data)){ echo $single_data->emp_name;} ?>" id="name" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="mobile_no" class="required-field">Contact Number:</label>
                        <input type="text" class="form-control" name="mobile_no" placeholder="Contact Number" value="<?php if(!empty($single_data)){ echo $single_data->mobile_no;} ?>" id="mobile_no" pattern="\d{10}" maxlength="10" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="WhatsApp_no" class="required-field">WhatsApp Number:</label>
                        <input type="text" class="form-control" name="WhatsApp_no" placeholder="WhatsApp Number" value="<?php if(!empty($single_data)){ echo $single_data->WhatsApp_no;} ?>" id="WhatsApp_no" pattern="\d{10}" maxlength="10" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="email" class="required-field">Email:</label>
                        <input type="email" class="form-control" name="emp_email" placeholder="Email" value="<?php if(!empty($single_data)){ echo $single_data->emp_email;} ?>" id="email" required>
                        <span id="emailError" class="text-danger" style="display: none;">Email already exists</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="department" class="required-field">Department:</label>
                        <select class="form-control" name="emp_department" id="department" placeholder="Department" required>
                            <option value="">Select Department</option>
                            <?php if (!empty($DepartmentData)) { ?>
                                <?php foreach ($DepartmentData as $data) { ?>
                                    <option value="<?= $data->id; ?>" <?= (!empty($single_data) && $single_data->emp_department === $data->id) ? "selected" : "" ?>><?= $data->DepartmentName; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="emergency_name" class="required-field">Emergency Contact Name:</label>
                        <input type="text" class="form-control" name="emergency_name" placeholder="Emergency Name" value="<?php if(!empty($single_data)){ echo $single_data->emergency_name;} ?>" id="emergency_name" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="relationship" class="required-field">Relationship:</label>
                        <input type="text" class="form-control" name="relationship" placeholder="Relationship" value="<?php if(!empty($single_data)){ echo $single_data->relationship;} ?>" id="relationship" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="emergency_no" class="required-field">Emergency Number:</label>
                        <input type="text" class="form-control" name="emergency_no" placeholder="Emergency Number" value="<?php if(!empty($single_data)){ echo $single_data->emergency_no;} ?>" id="emergency_no" pattern="\d{10}" maxlength="10" required>
                    </div>
                </div>
                <div class="col-md-3" id="date-picker-container">
                    <div class="form-group">
                        <label for="joiningDate" class="required-field">Joining Date:</label>
                        <input type="date" class="form-control" name="emp_joiningdate" id="joiningDate" value="<?php if(!empty($single_data)){ echo $single_data->emp_joiningdate;} ?>" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="password" class="required-field">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php if(!empty($single_data)){ echo $single_data->password;} ?>" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="confirm_password" class="required-field">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password"  name="confirm_password" placeholder="Confirm Password"  value="<?php if(!empty($single_data)){ echo $single_data->password;} ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label class="required-field">Add this user as:</label>
                    <div class="form-group d-flex align-items-center userRole">
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" id="admin" name="user_role" value="Admin" required>
                            <label class="form-check-label" for="admin">Admin</label>
                        </div>
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" id="employee" name="user_role" value="Employee">
                            <label class="form-check-label" for="employee">Employee</label>
                        </div>
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" id="other" name="user_role" value="Other">
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="accessLevelContainer">
                <div class="col-md-12">
                    <label>Access Level</label>
                </div>
                <?php if (!empty($menu_data)) {
                    $i = 1; ?>
                    <?php foreach ($menu_data as $data) { ?>
                        <div class="col-md-4">
                            <input type="checkbox" id="access_<?= $i ?>" name="access_level[]" value="<?= $data->url_location; ?>" class="access-level-checkbox" <?= (isset($single_data) && is_object($single_data) && property_exists($single_data, 'access_level') && in_array($data->url_location, explode(',', $single_data->access_level))) ? 'checked' : '' ?>>
                            <label for="access_<?= $i ?>"> <?= $data->menu_name; ?></label>
                        </div>
                    <?php $i++; } ?>
                <?php } ?>
            </div>
            <div class="card-footer text-right">
                <button type="submit" value=""  name="submit" id="submit" class="btn btn-primary"><?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Submit';} ?></button>
            </div>
        </form>
    </div>
</div>

<!-- <script>
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
                <input type="checkbox" id="access_testing" name="access_level[]" value="testing_specific" class="access-level-checkbox">
                <label for="access_testing">Testing Specific Access</label>
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
            addTestingCheckbox();
        }
    });

    // Initialize checkboxes based on the current selection
    const currentRole = $("input[name='user_role']:checked").val();
    if (currentRole) {
        updateAccessLevels(currentRole);

        // Additional logic for Employee role and Testing department
        if (currentRole === "Employee" && $("#department option:selected").text() === "Testing") {
            addTestingCheckbox();
        }
    }
});
</script> -->

        </div>
    </section>
</div>




<!-- Modal -->
<div class="modal fade" id="employeeInfoModal" tabindex="-1" role="dialog" aria-labelledby="employeeInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employeeInfoModalLabel">Employee Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Employee details will be loaded here -->
                <div id="employeeDetails"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="attachmentsModal" tabindex="-1" role="dialog" aria-labelledby="attachmentsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="attachmentsModalLabel">Attachments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul id="attachmentsList" class="list-group">
                    <!-- Attachments will be loaded here -->
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>










<?php echo view('Admin/Adminfooter.php');?> 
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
        Employee: ['EmployeeDashboard', 'saveSignupTime', 'myTasks', 'Daily_Task', 'notification_list', 'chatuser', 'meetings','leave_list'],
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


$(document).ready(function() {
    $('.show-info').on('click', function() {
        var empId = $(this).data('id');
        console.log('Button clicked. Employee ID:', empId);
        alert(empId);

        $.ajax({
            url: '<?= base_url("get_employee_details"); ?>/' + empId,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Response from server:', response);
                if (response.error) {
                    $('#employeeDetails').html('<div class="alert alert-danger">' + response.error + '</div>');
                } else {
                    var employeeDetails = `
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Employee Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <p><strong>Name :</strong> ${response.emp_name}</p>
                                            <p><strong>Mobile No :</strong> ${response.mobile_no}</p>
                                            <p><strong>Email :</strong> ${response.emp_email}</p>
                                            <p><strong>Joining Date :</strong> ${response.emp_joiningdate}</p>
                                            <p><strong>Technology :</strong> ${response.DepartmentName}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <p><strong>Skill Name :</strong> ${response.skill_name}</p>
                                            <p><strong>Emergency Contact Name :</strong> ${response.emergency_name}</p>
                                            <p><strong>Relation :</strong> ${response.relationship}</p>
                                            <p><strong>Emergency Contact No :</strong> ${response.emergency_no}</p>
                                            <p><strong>Current Address :</strong> ${response.current_address}</p>
                                            <p><strong>Permanent Address :</strong> ${response.permanent_address}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    $('#employeeDetails').html(employeeDetails);
                }
                $('#employeeInfoModal').modal('show');
            },
            error: function() {
                alert('An error occurred while fetching employee details.');
            }
        });
    });
});




document.addEventListener('DOMContentLoaded', function() {
    // Handle attachments button click
    document.querySelectorAll('.show-attachment').forEach(button => {
        button.addEventListener('click', function() {
            const empId = this.getAttribute('data-id');
            alert(empId);
            fetch(`<?= base_url('get_employee_attachments'); ?>/${empId}`)
                .then(response => response.json())
                .then(data => {
                    // Clear previous attachments
                    const attachmentsList = document.getElementById('attachmentsList');
                    attachmentsList.innerHTML = '';

                    // Populate attachments
                    if (data.length > 0) {
                        data.forEach(attachment => {
                            const li = document.createElement('li');
                            li.classList.add('list-group-item');
                            li.innerHTML = `<a href="<?= base_url('public/uploads'); ?>/${attachment.file_path}" target="_blank">${attachment.file_name}</a>`;
                            attachmentsList.appendChild(li);
                        });
                    } else {
                        const li = document.createElement('li');
                        li.classList.add('list-group-item');
                        li.textContent = 'No attachments available';
                        attachmentsList.appendChild(li);
                    }

                    // Show the modal
                    $('#attachmentsModal').modal('show');
                })
                .catch(error => console.error('Error fetching attachments:', error));
        });
    });
});



// $(document).ready(function() {
//     // Fetch and display employee details
//     $('.show-info').on('click', function() {
//         var empId = $(this).data('id');

//         $.ajax({
//             url: '<?= base_url("get_employee_details"); ?>/' + empId,
//             type: 'GET',
//             success: function(response) {
//                 $('#employeeDetails').html(response);
//                 $('#employeeInfoModal').modal('show');
//             },
//             error: function() {
//                 alert('An error occurred while fetching employee details.');
//             }
//         });
//     });

//     // Fetch and display employee attachments
//     $('.show-attachment').on('click', function() {
//         var empId = $(this).data('id');

//         $.ajax({
//             url: '<?= base_url("get_employee_attachments"); ?>/' + empId,
//             type: 'GET',
//             dataType: 'json',
//             success: function(response) {
//                 const attachmentsList = $('#attachmentsList');
//                 attachmentsList.empty();

//                 if (response.error) {
//                     attachmentsList.append('<li class="list-group-item">' + response.error + '</li>');
//                 } else {
//                     $.each(response, function(key, value) {
//                         if (value.includes('No')) {
//                             attachmentsList.append('<li class="list-group-item">' + key + ': ' + value + '</li>');
//                         } else {
//                             attachmentsList.append('<li class="list-group-item"><strong>' + key + ':</strong> <a href="' + value + '" target="_blank">' + key + ' File</a></li>');
//                         }
//                     });
//                 }

//                 $('#attachmentsModal').modal('show');
//             },
//             error: function() {
//                 alert('An error occurred while fetching attachments.');
//             }
//         });
//     });
// });




// $(document).ready(function() {
//     $('#date-picker-container').on('click', function() {
//         $('#joiningDate').focus();
//     });
// });

    // Set the min attribute to today's date in the format YYYY-MM-DD
    // var today = new Date().toISOString().split('T')[0];
    // document.getElementById('joiningDate').setAttribute('min', today);

  
document.addEventListener("DOMContentLoaded", function() {
    const dateInput = document.getElementById('joiningDate');

    // Ensure the date picker opens on focus
    dateInput.addEventListener('focus', function() {
        if (typeof dateInput.showPicker === "function") {
            dateInput.showPicker(); // Using showPicker() for modern browsers
        } else {
            dateInput.click(); // Fallback for browsers without showPicker()
        }
    });

    // Click event to ensure the date picker opens
    dateInput.addEventListener('click', function() {
        if (typeof dateInput.showPicker === "function") {
            dateInput.showPicker(); // Using showPicker() for modern browsers
        } else {
            dateInput.focus(); // Fallback for older browsers
        }
    });

    // Ensure the date picker opens when clicking anywhere within the date input container
    document.getElementById('date-picker-container').addEventListener('click', function(event) {
        if (!event.target.closest('#joiningDate')) {
            dateInput.focus();
        }
    });
});

</script>


