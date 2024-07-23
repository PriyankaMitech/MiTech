<?php echo view ("Admin/Adminsidebar.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white viewApplicationsBtn"> Bank List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewApplicationsBtn"> Bank List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <button id="viewAddClientBtn" class="btn btn-info mt-2 ">+ Add Bank</button>

                <!-- Create Employee Card -->
            <div id="viewClientListCard" class="card mt-2" >
              <!-- <div class="card"> -->
              <div class="card-header">
                <h3 class="card-title viewApplicationsBtn"> Bank List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th>Sr.No</th>
                        <th>Action</th>
                        <th>Bank Name</th>
                        <th>Branch Name</th>
                        <th>Account Name</th>
                        <th>Account No.</th>
                        <th>IFSC No.</th>
                        <th>UPI ID</th>
                        <th>Mobile No.</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(!empty($bank_data)) {  $i=1;?>
                        <?php foreach ($bank_data as $data): ?>
                            <tr>
                            <td><?php echo $i; ?></td>
                                <td>
                                <a href="edit_bank/<?=$data->id ; ?>"><i class="far fa-edit me-2"></i></a>
                                <a href="<?=base_url(); ?>delete_compan/<?php echo base64_encode($data->id); ?>/tbl_bank" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                                </td>
                                <td><?php echo $data->bank_name; ?></td>
                                <td><?php echo $data->branch_name; ?></td>
                                <td><?php echo $data->account_name; ?></td>
                                <td><?php echo $data->account_number; ?></td>
                                <td><?php echo $data->ifsc_number; ?></td>
                                <td><?php echo $data->upi_id; ?></td>
                                <td><?php echo $data->mobile_no; ?></td>
                                
                                
                                <!-- Add other table cells as needed -->
                            </tr>
                        <?php $i++; endforeach; ?>
                        <?php 
                        } ?>
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          <!-- Create Bank Form -->
            <div class="card card-primary mt-2" style="display: none;">
              <div class="card-header">
                <h3 class="card-title">Add Bank <small></small></h3>
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
                                    <input type="text" name="account_holder_name" class="form-control" id="account_holder_name" placeholder="Account holder name" value="<?php if(!empty($single_data)){ echo $single_data->account_holder_name;} ?>">
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
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
</div>

<?php echo view("Admin/Adminfooter.php"); ?>

<script>
function updatestatus(selectElement, id) {
    var selectedValue = selectElement.value;
    var id = id;

    // Make AJAX request
    $.ajax({
        type: "POST",
        url: "<?=base_url(); ?>update_status", // URL to your server-side script
        data: {
            id: id,
            selectedValue: selectedValue
        },
        success: function(response) {
            // Handle success response
            console.log("Client updated successfully");
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error("Error updating status:", error);
        }
    });
}

$(document).ready(function() {
    $('#viewAddClientBtn').on('click', function() {
        var $viewClientListCard = $('#viewClientListCard');
        var $leaveForm = $('.card').not('#viewClientListCard');
        var $button = $('#viewAddClientBtn');
        var $button1 = $('.viewApplicationsBtn');


        if ($viewClientListCard.is(':hidden')) {
            $viewClientListCard.show();
            $leaveForm.hide();
            $button.text('+ Add Bank'); // Change text when showing Empolyee List
            $button1.text('Bank List'); // Change text when showing applications

        } else {
            $viewClientListCard.hide();
            $leaveForm.show();
            $button.text('Bank List'); // Change text when showing Create Employee form
            $button1.text('Add Bank'); // Change text when showing applications

        }
    });
});
</script>