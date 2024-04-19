<?php echo view("Admin/Adminsidebar"); ?>
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
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Meeting Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="adminSelect">Select Admin</label>
                                    <select class="form-control" id="adminSelect">
                                        <option value="1">Admin 1</option>
                                        <option value="2">Admin 2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="employeeSelect">Select Employee</label>
                                    <select class="form-control" id="employeeSelect">
                                        <option value="1">Employee 1</option>
                                        <option value="2">Employee 2</option>
                                    </select>
                                </div>
                                <div class="form-group" id="adminList" style="display:none;">
                                    <!-- Admin list will be dynamically populated here -->
                                </div>
                                <div class="form-group" id="employeeList" style="display:none;">
                                    <!-- Employee list will be dynamically populated here -->
                                </div>
                                <div class="form-group">
                                    <label for="meetingLink">Meeting Link</label>
                                    <input type="text" class="form-control" id="meetingLink" placeholder="Paste meeting link">
                                </div>
                                <div class="form-group">
                                    <label for="meetingDateTime">Meeting Date and Time</label>
                                    <input type="datetime-local" class="form-control" id="meetingDateTime">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create Meeting</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>
<?php echo view("Admin/Adminfooter"); ?>

<script>
    $(document).ready(function() {
        $('#adminSelect').change(function() {
            var selectedAdmin = $(this).val();
            // Make AJAX request to get Admin list based on selected Admin
            // Update the content of #adminList
            $('#adminList').html('Admin ' + selectedAdmin + ' checkbox list will be populated here.');
            $('#adminList').show();
        });

        $('#employeeSelect').change(function() {
            var selectedEmployee = $(this).val();
            // Make AJAX request to get Employee list based on selected Employee
            // Update the content of #employeeList
            $('#employeeList').html('Employee ' + selectedEmployee + ' checkbox list will be populated here.');
            $('#employeeList').show();
        });
    });
</script>
