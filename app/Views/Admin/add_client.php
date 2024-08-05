<?php echo view('Admin/Adminsidebar.php'); ?>

<div class="content-wrapper">

    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="text-white">Add Client</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active text-white">Add Client</li>
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
                            <h3 class="card-title">Add Client <small></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url(); ?>set_client" method="post" id="client_form">
                       
                            <div class="row card-body">
                            <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">

                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="client_name">Client Name : </label>
                                    <input type="text" name="client_name" class="form-control" id="client_name" placeholder="Enter name" value="<?php if(!empty($single_data)){ echo $single_data->client_name;} ?>">
                                </div>
                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="company_name">Company Name : </label>
                                    <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Enter name" value="<?php if(!empty($single_data)){ echo $single_data->company_name;} ?>">
                                </div>
                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="email">Email Id :</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="<?php if(!empty($single_data)){ echo $single_data->email;} ?>">
                                    <span id="emailError" style="color: crimson;"></span>

                                </div>
                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="mobile_no">Mobile No. :</label>
                                    <input type="tel" name="mobile_no" class="form-control" id="mobile_no" placeholder="Enter contact Number" maxlength="10" value="<?php if(!empty($single_data)){ echo $single_data->mobile_no;} ?>">
                                    <span id="mobile_noError" style="color: crimson;"></span>
                                </div>

                              
                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="pan_no">PAN NO. :</label>
                                    <input type="tel" name="pan_no" class="form-control" id="pan_no" placeholder="Enter contact Number" maxlength="10" value="<?php if(!empty($single_data)){ echo $single_data->pan_no;} ?>">
                                    <span id="pan_noError" style="color: crimson;"></span>
                                </div>
                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="gst_no">GST NO. :</label>
                                    <input type="tel" name="gst_no" class="form-control" id="gst_no" placeholder="Enter contact Number" maxlength="15" value="<?php if(!empty($single_data)){ echo $single_data->gst_no;} ?>">
                                    <span id="gst_noError" style="color: crimson;"></span>
                                </div>

                                <div class="col-lg-4 col-md-3 col-12 form-group">
                              <label for="vendor_code">Vendor Code :</label>
                              <input type="text" name="vendor_code" class="form-control" id="vendor_code" placeholder="Enter vendor code"  value="<?php if(!empty($single_data)){ echo $single_data->vendor_code;} ?>">
                              <span id="vendor_codeError" style="color: crimson;"></span>
                            </div>

                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="address">Address :</label>
                                    <textarea id="address" name="address" rows="4" cols="43"><?php if(!empty($single_data)){ echo $single_data->address;} ?></textarea>
                                    <span id="address_noError" style="color: crimson;"></span>
                                </div>
                                    

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-right">
                                <button type="submit" value=""  name="submit" id="submit" class="btn btn-primary"><?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Submit';} ?></button>
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
    

 
