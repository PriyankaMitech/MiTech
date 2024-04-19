<?php echo view ("Admin/Adminsidebar"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Meeting</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create meeting</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Meeting Details</h3>
                        </div>
                        <form action="<?php echo base_url()?>create_meetings" method="post" role="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Select Employee(s)</label><br>
                                    <?php foreach ($emplist as $employee): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            value="<?php echo $employee->Emp_id; ?>"
                                            id="employee_<?php echo $employee->Emp_id; ?>">
                                        <label class="form-check-label" for="employee_<?php echo $employee->Emp_id; ?>">
                                            <?php echo $employee->emp_name; ?>
                                        </label>
                                    </div>
                                    <?php endforeach; ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="all"
                                            id="selectAllEmployees">
                                        <label class="form-check-label" for="selectAllEmployees">
                                            Select All Employees
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="meetingLink">Meeting Link</label>
                                    <input type="text" class="form-control" name="meetingLink" id="meetingLink"
                                        placeholder="Paste meeting link" required>
                                </div>
                                <div class="form-group">
                                    <label for="meetingDateTime">Meeting Date </label>
                                    <input type="date" class="form-control" name="meetingdate" id="meetingDateTime"
                                        min="<?= date('Y-m-d'); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="meetingTime">Meeting Time </label>
                                    <input type="time" class="form-control" name="meetingtime" id="meetingTime"
                                        required>
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