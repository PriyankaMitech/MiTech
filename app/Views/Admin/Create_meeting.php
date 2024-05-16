<?php echo view ("Admin/Adminsidebar"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white">Create Meeting</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white">Create meeting</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
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
                                                <option value="<?php echo $employee->emp_name; ?>">
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
                                            <input class="form-check-input paddingti" type="checkbox"
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
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-primary">Create Meeting</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php echo view("Admin/Adminfooter"); ?>

<script>
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