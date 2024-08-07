<?php echo view("Admin/Adminsidebar"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white viewApplicationsBtn">Meetings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewApplicationsBtn">Meetings</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <button id="viewCreateMeetingBtn" class="btn btn-info mt-2 "> + Create Meeting</button>
                    <!-- Create Employee Card -->
                    <div id="viewMeetingListCard" class="card mt-2" >
                        <div class="card-header">
                            <h3 class="card-title viewApplicationsBtn">Meeting List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Meeting Date</th>
                                        <th>Meeting Time</th>
                                        <th>Hostname</th>
                                        <th>Client Involve</th>
                                        <th>Involve Employee Names</th>

                                        <th>Meeting Link</th>
                                        <th>Copy Link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                                                     $adminModel = new \App\Models\Adminmodel();

                                if(!empty($meetings) && is_array($meetings)){ ?>
                                    <?php
                                    
                                    // Sort the meetings array in descending order by meeting_date
                                    usort($meetings, function($a, $b) {
                                        return strtotime($b->meeting_date) - strtotime($a->meeting_date);
                                    });

                                    $count = 1;
                                    $current_date = date('Y-m-d'); // Get today's date in 'Y-m-d' format
                                    ?>
                                    <?php foreach ($meetings as $meeting):
                                        
                                        $employeeIds = explode(',', $meeting->employee_id); // Extract employee IDs
                                        $employeeNames = [];
                                
                                        foreach ($employeeIds as $id) {
                                            $wherecond1 = array('is_deleted' => 'N', 'Emp_id' => $id);
                                            $employee = $adminModel->get_single_data('employee_tbl', $wherecond1);
                                            
                                            if (!empty($employee)) {
                                                $employeeNames[] = $employee->emp_name; // Assuming 'Emp_name' is the field name for employee's name
                                            } else {
                                                $employeeNames[] = 'Unknown Employee';
                                            }
                                        }
                                
                                        $employeeNamesStr = implode(', ', $employeeNames); // Convert names array to a comma-separated string
                                        
                                        ?>
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $meeting->meeting_date; ?></td>
                                        <td><?php echo $meeting->meeting_time; ?></td>
                                        <td><?php echo $meeting->emp_name; ?></td>
                                        <td><?php echo $meeting->client_involve; ?></td>
                                        <td><?php echo $employeeNamesStr; ?></td> <!-- Display employee names here -->

                                        <td>
                                            <?php if (strtotime($meeting->meeting_date) >= strtotime($current_date)): ?>
                                                <a class="btn btn-primary" href="<?php echo $meeting->meeting_link; ?>" target="_blank">Join Now</a>
                                            
                                               
                                                
                                                <?php else: ?>
                                                <?php echo $meeting->meeting_link; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                        <?php if (strtotime($meeting->meeting_date) >= strtotime($current_date)): ?>
                                                <button class="btn btn-success" onclick="copyToClipboard('<?php echo $meeting->meeting_link; ?>')">Copy</button>
                                                <?php else: ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!-- Create Meeting Form -->
                    <div class="card card-primary mt-2" style="display: none;">
                        <div class="card-header">
                            <h3 class="card-title">Meeting Details</h3>
                        </div>
                        <form action="<?php echo base_url()?>create_meetings" method="post" role="form">
                            <div class="card-body row">
                                <div class="form-group col-md-12">
                                    <div class="row paddingtl">
                                        <div class="form-group col-md-4">
                                            <label for="meetingLink">Meeting Link</label>
                                            <input type="text" class="form-control" name="meetingLink" id="meetingLink"
                                                placeholder="Paste meeting link" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="meetingDateTime">Meeting Date </label>
                                            <input type="date" class="form-control" name="meetingdate"
                                                id="meetingDateTime" min="<?= date('Y-m-d'); ?>" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="meetingTime">Meeting Time </label>
                                            <input type="time" class="form-control" name="meetingtime" id="meetingTime"
                                                required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Hostname">Host</label>
                                            <select class="form-control" name="Hostname" id="Hostname" required>
                                                <option value="" disabled selected>Select</option>
                                                <?php foreach ($emplist as $employee): ?>
                                                <option value="<?php echo $employee->Emp_id ; ?>">
                                                    <?php echo $employee->emp_name; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Subject">Subject </label>
                                            <input type="text" class="form-control" name="Subject" id="Subject"
                                                required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Subject">Client Involve</label>
                                            <div>
                                                <input type="radio" id="yes" name="client_involve" value="yes" checked>
                                                <label for="yes">Yes </label>

                                                <input style="margin-left: 50px;" type="radio" id="no" name="client_involve"
                                                    value="no" required>
                                                <label for="no">No</label>
                                            </div>
                                        </div>
                                        <div class="form-check col-md-12 fcheckl">
                                            <label class="">Select Employee(s)</label> <br>


                                        </div>
                                        <div class="form-check col-md-12">
                                            <input class="form-check-input " type="checkbox" value="all"
                                                id="selectAllEmployees">
                                            <label class="form-check-label " for="selectAllEmployees">
                                                Select All Employees
                                            </label>
                                        </div>
                                        <?php foreach ($emplist as $employee): ?>
                                        <div class="form-check col-md-3">
                                            <input class="form-check-input paddingti" name="selectedEmployees" type="checkbox"
                                                value="<?php echo $employee->Emp_id; ?>"
                                                id="employee_<?php echo $employee->Emp_id; ?>">
                                            <label class="form-check-label paddingtl"
                                                for="employee_<?php echo $employee->Emp_id; ?>">
                                                <?php echo $employee->emp_name; ?>
                                            </label>
                                        </div>
                                        <?php endforeach; ?>

                                    </div>
                                </div>

                                <input type="hidden" name="selectedEmployees" id="selectedEmployeesInput">
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create Meeting</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>
<?php echo view("Admin/Adminfooter"); ?>

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        alert('Meeting link copied to clipboard');
    }, function(err) {
        alert('Failed to copy: ', err);
    });
}

$(document).ready(function() {
    $('#viewCreateMeetingBtn').on('click', function() {
        var $viewMeetingListCard = $('#viewMeetingListCard');
        var $leaveForm = $('.card').not('#viewMeetingListCard');
        var $button = $('#viewCreateMeetingBtn');
        var $button1 = $('.viewApplicationsBtn');


        if ($viewMeetingListCard.is(':hidden')) {
            $viewMeetingListCard.show();
            $leaveForm.hide();
            $button.text('+ Create Meeting'); // Change text when showing Meeting List
            $button1.text('Meeting List'); // Change text when showing applications

        } else {
            $viewMeetingListCard.hide();
            $leaveForm.show();
            $button.text('Meeting List'); // Change text when showing Create Meeting form
            $button1.text('Add Meeting'); // Change text when showing applications

        }
    });
});


$(document).ready(function() {
    $('#selectAllEmployees').change(function() {
        $('input[type="checkbox"]').prop('checked', $(this).prop('checked'));
    });

    $('input[type="checkbox"]').change(function() {
        if ($(this).prop('checked') == false) {
            $('#selectAllEmployees').prop('checked', false);
        }
    });

    $('form').submit(function() {
        var selectedEmployee = [];
        var allEmployeesChecked = $('#selectAllEmployees').is(':checked');
        if (allEmployeesChecked) {
            selectedEmployee.push('all');
        } else {
            $('input[type="checkbox"]:checked').each(function() {
                if ($(this).val() !== 'all') {
                    selectedEmployee.push($(this).val());
                }
            });
        }
        $('#selectedEmployeesInput').val(selectedEmployee.join(','));
    });
});

</script>
