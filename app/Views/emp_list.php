<?php echo view('Admin/Adminsidebar.php'); ?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white">Employee List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white">Employee List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <button id="viewCreateEmployeeBtn" class="btn btn-info mt-2 ">Create Employee</button>
                <!-- Create Employee Card -->
                    <div id="viewEmployeeListCard" class="card mt-2" >
                    <!-- <div class="card"> -->
                        <div class="card-header">
                            <h3 class="card-title">Employee List</h3>
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
                                        <th>Permanent Address</th>
                                        <th>Current Address</th>
                                        <th>Photo File</th>
                                        <th>Resume File</th>
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

                                            $departmentName = $model->getsinglerow('tbl_Department', $wherecond);

                                            // echo "<pre>";print_r($departmentName);exit();
                                            ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $data->emp_name; ?></td>
                                                <td><?= $data->mobile_no; ?></td>
                                                <td><?= $data->emp_email; ?></td>
                                                <td><?php if(!empty($departmentName)){ echo $departmentName->DepartmentName; }?></td>
                                                <td><?php echo $data->permanent_address; ?></td>
                                                <td><?php echo $data->current_address; ?></td>
                                                <td>
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
                                                    <a href="edit_emp/<?= $data->Emp_id; ?>"><i class="far fa-edit me-2"></i></a>
                                                    <a href="<?= base_url(); ?>delete_data/<?php echo base64_encode($data->Emp_id); ?>/employee_tbl" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                                                   
                                                   <?php if($data->status == 'Y'){?>
                                                    <a href="<?= base_url(); ?>deactive_data/<?php echo base64_encode($data->Emp_id); ?>/employee_tbl" onclick="return confirm('Are You Sure You Want To Deactive This Record?')"><i class="fas fa-user-times text-danger"></i></a>                                               
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

                    <!-- Create Employee Form -->

                    <div class="card card-default mt-2" style="display: none;">
                        <div class="card-header">
                            <form action="<?php echo base_url()?>createemp" method="post" id="createEmployeeForm">
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
                                            <label for="emergency_name">Emergency Name:</label>
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
                                    <button type="submit" value=""  name="submit" id="submit" class="btn btn-primary"><?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Submit';} ?></button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php echo view('Admin/Adminfooter.php');?> 
<script>
$(document).ready(function() {
    $('#viewCreateEmployeeBtn').on('click', function() {
        var $viewEmployeeListCard = $('#viewEmployeeListCard');
        var $leaveForm = $('.card').not('#viewEmployeeListCard');
        var $button = $('#viewCreateEmployeeBtn');

        if ($viewEmployeeListCard.is(':hidden')) {
            $viewEmployeeListCard.show();
            $leaveForm.hide();
            $button.text('Create Employee'); // Change text when showing Empolyee List
        } else {
            $viewEmployeeListCard.hide();
            $leaveForm.show();
            $button.text('View Employee List'); // Change text when showing Create Employee form
        }
    });
});

</script>     
