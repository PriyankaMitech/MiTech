<?php echo view ("Admin/Adminsidebar.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white viewApplicationsBtn"> Client List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewApplicationsBtn">List Client</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <button id="viewAddClientBtn" class="btn btn-info mt-2 ">+ Add Client</button>

                <!-- Create Employee Card -->
            <div id="viewClientListCard" class="card mt-2" >
              <!-- <div class="card"> -->
              <div class="card-header">
                <h3 class="card-title viewApplicationsBtn"> Client List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th>Sr. No.</th>
                        <th>Action</th>
                        <th>Client Name</th>
                        <th>Company Name</th>
                        <th>Mobile No.</th>
                        <th>Email Id</th>
                        <th>Pan No.</th>
                        <th>GST No.</th>
                        <th>Address</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(!empty($client_data)) {  $i=1;?>
                        <?php foreach ($client_data as $data): ?>
                            <tr>
                            <td><?php echo $i; ?></td>
                                <td>
                                <a href="<?=base_url(); ?>edit_client/<?=$data->id ; ?>"><i class="far fa-edit me-2"></i></a>
                                <a href="<?=base_url(); ?>delete_compan/<?php echo base64_encode($data->id); ?>/tbl_client" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                                </td>
                                <td><?php echo $data->client_name; ?></td>
                                <td><?php echo $data->company_name; ?></td>
                                <td><?php echo $data->mobile_no; ?></td>
                                <td><?php echo $data->email; ?></td>
                                <td><?php echo $data->pan_no; ?></td>
                                <td><?php echo $data->gst_no; ?></td>
                                <td><?php echo $data->address; ?></td>
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


          <!-- Create Client Form -->
            <div class="card card-primary mt-2" style="display: none;">
              <div class="card-header">
                <h3 class="card-title">Add Client <small></small></h3>
              </div>
                <!-- /.card-header -->
                  <!-- form start -->
                  <form action="<?php echo base_url(); ?>set_client" method="post" id="client_form">
                      <div class="row card-body">
                          <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">
                            <div class="col-lg-3 col-md-3 col-12 form-group">
                              <label for="client_name">Client Name : </label>
                              <input type="text" name="client_name" class="form-control" id="client_name" placeholder="Enter name" value="<?php if(!empty($single_data)){ echo $single_data->client_name;} ?>">
                            </div>
                            <div class="col-lg-3 col-md-3 col-12 form-group">
                              <label for="company_name">Company Name : </label>
                              <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Enter name" value="<?php if(!empty($single_data)){ echo $single_data->company_name;} ?>">
                            </div>
                            <div class="col-lg-3 col-md-3 col-12 form-group">
                              <label for="email">Email Id :</label>
                              <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="<?php if(!empty($single_data)){ echo $single_data->email;} ?>">
                              <span id="emailError" style="color: crimson;"></span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-12 form-group">
                              <label for="mobile_no">Mobile No. :</label>
                              <input type="tel" name="mobile_no" class="form-control" id="mobile_no" placeholder="Enter contact Number" maxlength="10" value="<?php if(!empty($single_data)){ echo $single_data->mobile_no;} ?>">
                              <span id="mobile_noError" style="color: crimson;"></span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-12 form-group">
                              <label for="pan_no">PAN NO. :</label>
                              <input type="tel" name="pan_no" class="form-control" id="pan_no" placeholder="Enter contact Number" maxlength="10" value="<?php if(!empty($single_data)){ echo $single_data->pan_no;} ?>">
                              <span id="pan_noError" style="color: crimson;"></span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-12 form-group">
                              <label for="gst_no">GST NO. :</label>
                              <input type="tel" name="gst_no" class="form-control" id="gst_no" placeholder="Enter contact Number" maxlength="15" value="<?php if(!empty($single_data)){ echo $single_data->gst_no;} ?>">
                              <span id="gst_noError" style="color: crimson;"></span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-12 form-group">
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
            $button.text('+ Add Client'); // Change text when showing Empolyee List
            $button1.text('Client List'); // Change text when showing applications

        } else {
            $viewClientListCard.hide();
            $leaveForm.show();
            $button.text('Client List'); // Change text when showing Create Employee form
            $button1.text('Add Client'); // Change text when showing applications

        }
    });
});
</script>