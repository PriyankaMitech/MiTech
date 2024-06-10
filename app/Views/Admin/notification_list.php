<?php echo view("Admin/Adminsidebar"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white viewNotificationListCard">Notification</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewNotificationListCard">Notification</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">   
                    <button id="viewCreateNotificationBtn" class="btn btn-info mt-2">Create Notification</button>
                    <!-- Notification List Card -->
                    <div id="viewNotificationListCard" class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title">Notification List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Date</th>
                                        <th>Employee Name</th>
                                        <th>Subject</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($notification_list) && is_array($notification_list)): ?>
                                        <?php
                                        usort($notification_list, function($a, $b) {
                                            return strtotime($b->notification_date) - strtotime($a->notification_date);
                                        });

                                        $count = 1;
                                        ?>
                                        <?php foreach ($notification_list as $notification):
                                        //    echo'<pre>'; print_r($notification); ?>
                                            <tr>
                                                <td><?php echo $count++; ?></td>
                                                <td><?php echo $notification->notification_date; ?></td>
                                                <td><?php echo $notification->emp_name; ?></td>
                                                <td><?php if(!empty($notification->notification_subject)){ echo $notification->notification_subject; }?></td>
                                                <td><?php echo $notification->notification_desc; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card card-default mt-2" style="display: none;">
                        <div class="card-header">
                            <h3 class="card-title">Add Notifications</h3>
                        </div>
                        <div class="card-body">
                            <form id="notificationForm" method="post" action="<?php echo base_url(); ?>set_notification">

                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="notification_date">Select Date</label>
                                            <input type="date" id="notification_date" class="form-control" name="notification_date" value="<?php echo date('Y-m-d'); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="notification_date"> Subject</label>
                                            <input type="text" id="notification_subject" class="form-control" name="notification_subject" value="" required>
                                        </div>
                                    </div>
                            </div>
                                <div class="row">
                                    <div class="form-check col-md-12 pl-2">
                                        <label class="">Select Employee(s)</label> 
                                    </div>
                                    <div class="form-check col-md-12 pl-4">
                                        <input class="form-check-input" type="checkbox" value="all" id="selectAllEmployees">
                                        <label class="form-check-label" for="selectAllEmployees">Select All Employees</label>
                                    </div>
                                    <?php foreach ($emplist as $employee): ?>
                                        <div class="form-check col-md-3 pl-4">
                                            <input class="form-check-input paddingti" name="selectedEmployees" type="checkbox" value="<?php echo $employee->Emp_id; ?>" id="employee_<?php echo $employee->Emp_id; ?>">
                                            <label class="form-check-label paddingtl" for="employee_<?php echo $employee->Emp_id; ?>">
                                                <?php echo $employee->emp_name; ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                    <input type="hidden" name="selectedEmployees" id="selectedEmployeesInput">
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="notification_description">Description</label>
                                            <textarea id="notification_description" class="form-control" rows="4" name="notification_description" required></textarea>
                                        </div>
                                    </div>
                                </div>   
                                <div class="row">
                                    <div class="col-md-4">                   
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div> 
                                </div>                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php echo view("Admin/Adminfooter"); ?>
<script>

$(document).ready(function() {
    const $selectAllEmployees = $("#selectAllEmployees");
    const $employeeCheckboxes = $("input[name='selectedEmployees']");
    const $selectedEmployeesInput = $("#selectedEmployeesInput");
    const $notificationForm = $("#notificationForm");

    // Event listener for "Select All Employees" checkbox
    $selectAllEmployees.change(function() {
        const isChecked = $(this).prop("checked");
        $employeeCheckboxes.prop("checked", isChecked);
        updateSelectedEmployees();
    });

    // Event listeners for individual employee checkboxes
    $employeeCheckboxes.change(function() {
        updateSelectedEmployees();
    });

    // Event listener for form submission
    $notificationForm.submit(function(event) {
        if ($selectedEmployeesInput.val() === "") {
            event.preventDefault();
            alert("Please select at least one employee.");
        }
    });

    // Function to update the hidden input field with selected employee IDs
    function updateSelectedEmployees() {
        const selectedEmployees = $employeeCheckboxes.filter(":checked").map(function() {
            return $(this).val() !== "all" ? $(this).val() : null;
        }).get();

        $selectedEmployeesInput.val(selectedEmployees.join(","));
    }
});


// $(document).ready(function() {
//     $('#selectAllEmployees').change(function() {
//         $('input[type="checkbox"]').prop('checked', $(this).prop('checked'));
//     });

//     $('input[type="checkbox"]').change(function() {
//         if ($(this).prop('checked') == false) {
//             $('#selectAllEmployees').prop('checked', false);
//         }
//     });

//     $('form').submit(function() {
//         var selectedEmployee = [];
//         var allEmployeesChecked = $('#selectAllEmployees').is(':checked');
//         if (allEmployeesChecked) {
//             selectedEmployee.push('all');
//         } else {
//             $('input[type="checkbox"]:checked').each(function() {
//                 if ($(this).val() !== 'all') {
//                     selectedEmployee.push($(this).val());
//                 }
//             });
//         }
//         $('#selectedEmployeesInput').val(selectedEmployee.join(','));
//     });
// });.
$(document).ready(function() {
    $('#viewCreateNotificationBtn').on('click', function() {
        var $viewNotificationListCard = $('#viewNotificationListCard');
        var $leaveForm = $('.card').not('#viewNotificationListCard');
        var $button = $('#viewCreateNotificationBtn');
        var $button1 = $('.viewNotificationListCard');


        if ($viewNotificationListCard.is(':hidden')) {
            $viewNotificationListCard.show();
            $leaveForm.hide();
            $button.text('Create Notification'); // Change text when showing Notification List
            $button1.text('Notification List'); 
        } else {
            $viewNotificationListCard.hide();
            $leaveForm.show();
            $button.text('View Notification List'); // Change text when showing Create Notification form
            $button1.text('Create Notification'); 
        }
    });
});
</script>
