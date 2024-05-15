<?php echo view ("Admin/Adminsidebar.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white">List Project</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white">List Project</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Project</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
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
                  </thead>
                  <tbody>
                  <?php if(!empty($projectData)) {  $i=1;?>
                        <?php foreach ($projectData as $project): ?>
                            <tr>
                            <td><?php echo $i; ?></td>

                                <td>
                                
                                <a href="edit_project/<?=$project->p_id ; ?>"><i class="far fa-edit me-2"></i></a>
                                <a href="<?=base_url(); ?>delete/<?php echo base64_encode($project->p_id); ?>/tbl_project" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                            
                    
                                </td>
                                <td>
                                    <select class="form-select" name="project_status" onchange="updatestatus(this, <?= $project->p_id; ?>)">
                                        <option value="" selected>Select status</option>
                                        <option value="Completed" <?php if ($project->project_status == 'Completed') {
                                            echo "selected";
                                        } ?>>Completed</option>
                                        
                                        <option value="WIP" <?php if ($project->project_status == 'WIP') {
                                            echo "selected";
                                        } ?>>WIP</option>
                                        <option value="ON Hold" <?php if ($project->project_status == 'ON Hold') {
                                            echo "selected";
                                        } ?>>ON Hold</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </td>
                                <td><?php echo $project->projectName; ?></td>

                               
                                <td><?php echo $project->Client_name; ?></td>
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
                        <?php 
                        } ?>
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
            <!-- /.card -->
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