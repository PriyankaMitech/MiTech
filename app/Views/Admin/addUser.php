<?php echo view('Admin/Adminsidebar.php'); ?>

<div class="content-wrapper">

    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="text-white">Add New User</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active text-white">Add New Admin</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
        <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Admin <small></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url(); ?>AdduserByadmin" method="post" id="adminForm">
                       <!-- <?php // echo'<pre>';print_r($single_data);exit();?> -->
                            <div class="card-body">
                                <div class="row">
                            <input type="hidden" name="Emp_id" class="form-control" id="Emp_id" value="<?php if(!empty($single_data)){ echo $single_data->Emp_id;} ?>">

                                <div class="col-lg-3 col-md-3 col-12 form-group">
                                    <label for="full_name">Name</label>
                                    <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Name" value="<?php if(!empty($single_data)){ echo $single_data->emp_name;} ?>">
                                </div>
                                <div class="col-lg-3 col-md-3 col-12 form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php if(!empty($single_data)){ echo $single_data->emp_email;} ?>">
                                    <span id="emailError" style="color: crimson;"></span>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12 form-group">
                                    <label for="mobile_no">Mobile number</label>
                                    <input type="tel" name="mobile_no" class="form-control" id="mobile_no" placeholder="Contact Number" maxlength="10" value="<?php if(!empty($single_data)){ echo $single_data->mobile_no;} ?>">
                                    <span id="mobile_noError" style="color: crimson;"></span>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12 form-group">
                                    <label for="WhatsApp_no">WhatsApp number</label>
                                    <input type="tel" name="WhatsApp_no" class="form-control" id="WhatsApp_no" placeholder="WhatsApp Number" maxlength="10" value="<?php if(!empty($single_data)){ echo $single_data->WhatsApp_no;} ?>">
                                    <span id="WhatsApp_noError" style="color: crimson;"></span>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-12 form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?php if(!empty($single_data)){ echo $single_data->password;} ?>">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-12 form-group">
                                            <label for="confirm_pass"> Confirm Password</label>
                                            <input type="password" class="form-control" id="confirm_pass"  name="confirm_pass" required>    
                                    </div>
                                </div>
              

                                
                                <div class="col-md-12">
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                             <label>Access Level</label>
                                                        </div>
                                                        <?php if (!empty($menu_data)) { $i = 1; ?>
                                                            <?php foreach ($menu_data as $data) { ?>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" id="Upload_b_d" name="access_level[]" value="<?= $data->url_location; ?>" 
                                                                        <?php 
                                                                        if (isset($single_data) && is_object($single_data) && property_exists($single_data, 'access_level') && in_array($data->url_location, explode(',', $single_data->access_level))) {
                                                                            echo 'checked';
                                                                        } 
                                                                        ?>>
                                                                    <label for="Upload_b_d"> <?= $data->menu_name; ?></label>
                                                                </div>
                                                                <?php $i++;
                                                            } ?>
                                                        <?php } ?> 
                                                    </div>
                                                </div>
                                            </div>

                                            

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-right">
                                <button type="submit" value=""  name="submit" id="submit" class="btn btn-primary"><?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Submit';} ?></button>
                            </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
    
        </div>
    </section>
</div>
<?php echo view('Admin/Adminfooter.php');?>      
    

 
