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
                        <form action="<?php echo base_url(); ?>set_bank" method="post" id="bank_form">
                        <div class="row card-body">
                            <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">
                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="bank_name">Bank Name : </label>
                                    <input type="text" name="bank_name" class="form-control" id="bank_name" placeholder="Bank name" value="<?php if(!empty($single_data)){ echo $single_data->bank_name;} ?>">
                                </div>
                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="branch_name">Branch Name : </label>
                                    <input type="text" name="branch_name" class="form-control" id="branch_name" placeholder="Branch name" value="<?php if(!empty($single_data)){ echo $single_data->branch_name;} ?>">
                                </div>
                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="branch_name">Account Name : </label>
                                    <input type="text" name="account_holder_name" class="form-control" id="account_holder_name" placeholder="Account holder name" value="<?php if(!empty($single_data)){ echo $single_data->account_name;} ?>">
                                </div>
                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="email">Account Number :</label>
                                    <input type="text" name="account_number" class="form-control" id="account_number" placeholder=" Account number" value="<?php if(!empty($single_data)){ echo $single_data->account_number;} ?>">
                                    <span id="account_numberError" style="color: crimson;"></span>
                                </div>
                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="ifsc_number">IFSC Number :</label>
                                    <input type="text" name="ifsc_number" class="form-control" id="ifsc_number" placeholder=" IFSC number" value="<?php if(!empty($single_data)){ echo $single_data->ifsc_number;} ?>">
                                    <span id="ifsc_numberError" style="color: crimson;"></span>
                                </div>
                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="upi_id">UPI ID :</label>
                                    <input type="text" name="upi_id" class="form-control" id="upi_id" placeholder="UPI ID number" value="<?php if(!empty($single_data)){ echo $single_data->upi_id;} ?>">
                                    <span id="upi_idError" style="color: crimson;"></span>
                                </div>
                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="mobile_no">Mobile No. :</label>
                                    <input type="tel" name="mobile_no" class="form-control" id="mobile_no" placeholder="Enter Mobile Number linked with account" maxlength="10" value="<?php if(!empty($single_data)){ echo $single_data->mobile_no;} ?>">
                                    <span id="mobile_noError" style="color: crimson;"></span>
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
    

 
