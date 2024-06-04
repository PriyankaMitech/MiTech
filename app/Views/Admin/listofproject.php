<?php echo view("Admin/Adminsidebar.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white viewApplicationsBtn">Project List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewApplicationsBtn">Project List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <button id="viewApplicationsBtn" class="btn btn-info m-2 ">Add Project</button>

            <div class="card " id="viewApplicationsCard" >
              <div class="card-header">
                <h3 class="card-title">Project List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Sr.No</th>
                      <th class="noExport">Action</th>
                      <th class="noExport">Project Status</th>
                      <th>Project Name</th>
                      <th>Client Name</th>
                      <th>Client Mobile No.</th>
                      <th>Client Email</th>
                      <th>Start date</th>
                      <th>UAT Date</th>
                      <th>Delivery date</th>
                      <th>POC name</th>
                      <th>POC Mobile No.</th>
                      <th>POC email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($projectData)) {  $i=1;?>
                      <?php foreach ($projectData as $project): ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td class="noExport">
                            <a href="edit_project/<?=$project->p_id ; ?>"><i class="far fa-edit me-2"></i></a>
                            <a href="<?=base_url(); ?>delete/<?php echo base64_encode($project->p_id); ?>/tbl_project" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                          </td>
                          <td class="noExport">
                            <select class="form-select" name="project_status" onchange="updatestatus(this, <?= $project->p_id; ?>)">
                              <option value="" selected>Select status</option>
                              <option value="Finish" <?php if ($project->project_status == 'Finish') { echo "selected"; } ?>>Finish</option>
                              <option value="WIP" <?php if ($project->project_status == 'WIP') { echo "selected"; } ?>>WIP</option>
                              <option value="ON Hold" <?php if ($project->project_status == 'ON Hold') { echo "selected"; } ?>>ON Hold</option>
                              <option value="New Project" <?php if ($project->project_status == 'New Project') { echo "selected"; } ?>>New Project</option>

                              <!-- Add more options as needed -->
                            </select>
                          </td>
                          <td><?php echo $project->projectName; ?></td>
                          <td><?php echo $project->clientname; ?></td>
                          <td><?php echo $project->Client_mobile_no; ?></td>
                          <td><?php echo $project->Client_email; ?></td>
                          <td><?php echo date('j F Y', strtotime($project->Project_startdate)); ?></td>
                          <td><?php echo date('j F Y', strtotime($project->TargetedUAT_Date)); ?></td>
                          <td><?php echo date('j F Y', strtotime($project->Project_DeliveryDate)); ?></td>
                          <td><?php echo $project->POC_name; ?></td>
                          <td><?php echo $project->POC_mobile_no; ?></td>
                          <td><?php echo $project->POC_email; ?></td>
                          <!-- Add other table cells as needed -->
                        </tr>
                      <?php $i++; endforeach; ?>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Sr.No</th>
                      <th>Action</th>
                      <th>Project Status</th>
                      <th>Project Name</th>
                      <th>Client Name</th>
                      <th>Client Mobile No.</th>
                      <th>Client Email</th>
                      <th>Start date</th>
                      <th>UAT Date</th>
                      <th>Delivery date</th>
                      <th>POC name</th>
                      <th>POC Mobile No.</th>
                      <th>POC email</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>


             <div class="card"  style="display:none">     
            <div class="card-header"  >
                    <form action="<?php echo base_url()?>project" method="post" id="projectForm"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" class="form-control" id="id"
                            value="<?php if(!empty($single_data)){ echo $single_data->p_id ;} ?>">



                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">Project Name:</label>
                                    <input type="text" class="form-control" name="projectName" id="projectName"
                                        value="<?php if(!empty($single_data)){ echo $single_data->projectName;} ?>"
                                        required>
                                    <span id="projectNameError" style="color: crimson;"></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Client_name">Client Name:</label>
                                    <select class="form-control" name="Client_name" id="Client_name" required>
                                        <option value="" disabled selected>Select a client</option>
                                        <?php 
                                        if(!empty($client_data)){
                                        foreach ($client_data as $client): ?>
                                        <option value="<?= $client->id ?>"
                                            <?= !empty($single_data) && $single_data->Client_name == $client->id ? 'selected' : '' ?>>
                                            <?= $client->client_name ?>
                                        </option>
                                        <?php endforeach;} ?>
                                    </select>
                                    <span id="Client_nameError" style="color: crimson;"></span>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Client_mobile_no"> Contact Number:</label>
                                    <input type="tel" class="form-control" name="Client_mobile_no" id="Client_mobile_no"
                                        required pattern="[0-9]{10}" title="Please enter 10 digits"
                                        maxlength=10 value="<?php if(!empty($single_data)){ echo $single_data->Client_mobile_no;} ?>">
                                    <span id="Client_mobile_noError" style="color: crimson;"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Client_email"> Email:</label>
                                    <input type="email" class="form-control" name="Client_email" id="Client_email"
                                        value="<?php if(!empty($single_data)){ echo $single_data->Client_email;} ?>"
                                        required>
                                    <span id="Client_emailError" style="color: crimson;"></span>
                                </div>
                            </div>
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Company Name:</label>
                                    <input type="text" class="form-control" name="companyName" id="companyName"
                                        value="<?php if(!empty($single_data)){ echo $single_data->CompanyName;} ?>"
                                        required>
                                    <span id="companyNameError" style="color: crimson;"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">GSTIN:</label>
                                    <input type="text" class="form-control" name="GSTIN" id="GSTIN"
                                        value="<?php if(!empty($single_data)){ echo $single_data->GSTIN;} ?>" required>
                                    <span id="GSTINError" style="color: crimson;"></span>
                                </div>
                            </div> -->
                        </div>
                       
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">POC Name:</label>
                                    <input type="text" class="form-control" name="POCname" id="POCname"
                                        value="<?php if(!empty($single_data)){ echo $single_data->POC_name;} ?>"
                                        required>
                                    <span id="POCnameError" style="color: crimson;"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="contact"> Contact Number:</label>
                                    <input type="tel" class="form-control" name="POCmobileNo" id="POCmobileNo" required
                                        pattern="[0-9]{10}" title="Please enter 10 digits" maxlength=10
                                        value="<?php if(!empty($single_data)){ echo $single_data->POC_mobile_no;} ?>">
                                    <span id="POCmobileNoError" style="color: crimson;"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email"> Email:</label>
                                    <input type="email" class="form-control" name="POCemail" id="POCemail"
                                        value="<?php if(!empty($single_data)){ echo $single_data->POC_email;} ?>"
                                        required>
                                    <span id="POCemailError" style="color: crimson;"></span>
                                </div>
                            </div>

                        </div>
                      
                        <div class="row ">


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="department">Department:</label>
                                    <select class="form-control" name="Technology" id="department" required>
                                        <option>Please select Department</option>
                                        <?php if (!empty($DepartmentData)) { ?>
                                        <?php foreach ($DepartmentData as $data) { ?>
                                        <option value="<?= $data->id; ?>" <?php if ((!empty($single_data)) && $single_data->Technology === $data->id) {
                                                                                        echo 'selected';
                                                                                    }
                                                                                    ?>>
                                            <?= $data->DepartmentName; ?>
                                        </option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="joiningDate">Project Start Date:</label>
                                    <input type="date" class="form-control" name="Project_startdate" id="joiningDate"
                                        value="<?php if(!empty($single_data)){ echo $single_data->Project_startdate;} ?>"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="joiningDate">Expected Delivery Date:</label>
                                    <input type="date" class="form-control" name="Project_DeliveryDate"
                                        id="Project_DeliveryDate"
                                        value="<?php if(!empty($single_data)){ echo $single_data->Project_DeliveryDate;} ?>"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="joiningDate">Targeted UAT Date:</label>
                                    <input type="date" class="form-control" name="TargetedUAT" id="TargetedUAT"
                                        value="<?php if(!empty($single_data)){ echo $single_data->TargetedUAT_Date;} ?>"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 ">
                            <div class="form-group submitbuttonp">
                                <button type="submit" value="" name="Save" id="submit" class="btn btn-lg btn-success">
                                    <?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Save';} ?>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            <!-- /.card -->
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
            console.log("Project updated successfully");
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error("Error updating status:", error);
        }
    });
}


</script>


<script>
$(document).ready(function() {
    $('#viewApplicationsBtn').on('click', function() {
        var $viewApplicationsCard = $('#viewApplicationsCard');
        var $leaveForm = $('.card').not('#viewApplicationsCard');
        var $button = $('#viewApplicationsBtn');

        var $button1 = $('.viewApplicationsBtn');


        if ($viewApplicationsCard.is(':hidden')) {
            $viewApplicationsCard.show();
            $leaveForm.hide();
            $button.text('Add Project'); // Change text when showing applications
            $button1.text('Project List'); // Change text when showing applications

        } else {
            $viewApplicationsCard.hide();
            $leaveForm.show();
            $button.text('Project List'); // Change text when showing leave form
            $button1.text('Add Project'); // Change text when showing applications

        }
    });
});

</script>
