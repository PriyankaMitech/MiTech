<?php echo view ("Admin/Adminsidebar"); ?>
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
            <form action="<?php echo base_url()?>createemp" method="post" id="createEmployeeForm">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="hidden" name="Emp_id" class="form-control" id="Emp_id" value="<?php if(!empty($single_data)){ echo $single_data->Emp_id;} ?>">

                            <input type="text" class="form-control" name="emp_name" value="<?php if(!empty($single_data)){ echo $single_data->emp_name;} ?>" id="name" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="emp_email" value="<?php if(!empty($single_data)){ echo $single_data->emp_email;} ?>" id="email" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="mobile_no">Contact Number:</label>
                            <input type="text" class="form-control" name="mobile_no" value="<?php if(!empty($single_data)){ echo $single_data->mobile_no;} ?>" id="mobile_no" pattern="\d{10}" maxlength="10" required>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                <div class="col-md-4">
                        <div class="form-group">
                            <label for="department">Department:</label>
                            <select class="form-control" name="emp_department" id="department" required>
                            <option value="">Select Department</option>
                                <?php if (!empty($DepartmentData)) { ?>
                                    <?php foreach ($DepartmentData as $data) { ?>
                                        <option value="<?= $data->id; ?>" <?= (!empty($single_data) && $single_data->department_id === $data->id) ? "selected" : "" ?>>
                                            <?= $data->DepartmentName; ?>
                                        </option>

                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="joiningDate">Joining Date:</label>
                            <input type="date" class="form-control" name="emp_joiningdate" id="joiningDate" value="<?php if(!empty($single_data)){ echo $single_data->emp_joiningdate;} ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" value="<?php if(!empty($single_data)){ echo $single_data->password;} ?>" required>
                        </div>
                    </div>
                    <!-- <div class="col-md-2">
                        <div class="form-group">
                            <label for="joiningDate">Create Employee</label>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div> -->
                </div>
                <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
        </div>
        </div>
    </section>

</div>
<?php echo view("Admin/Adminfooter"); ?>