<?php echo view ("Admin/Adminsidebar.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Employee</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Employee</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
        <div class="card card-default">
                <div class="card-header">
            <form action="<?php echo base_url()?>createemp" method="post">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="emp_name" id="name" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="emp_email" id="email" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="contact">Contact Number:</label>
                            <input type="text" class="form-control" name="mobile_no" id="contact" required
                                pattern="\d{10}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="department">Department:</label>
                            <select class="form-control" name="emp_department" id="department" required>
                                <option value="">Select Department</option>
                                <option value="PHP">PHP</option>
                                <option value="Dot NET">Dot NET</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                                <option value="Tester">Tester</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="joiningDate">Joining Date:</label>
                            <input type="date" class="form-control" name="emp_joiningdate" id="joiningDate" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="joiningDate">Create Employee</label>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
        </div>
    </section>

</div>
<?php echo view("Admin/Adminfooter.php"); ?>