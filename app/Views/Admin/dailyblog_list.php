<?php echo view ("Admin/Adminsidebar.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white viewApplicationsBtn"> Daily Blog List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewApplicationsBtn">List Daily Blog</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <button id="viewAdddailyblogBtn" class="btn btn-info mt-2 "> + Add Daily Blog</button>

                <!-- Create Employee Card -->
            <div id="viewDailyBlogListCard" class="card mt-2" >
              <!-- <div class="card"> -->
              <div class="card-header">
                <h3 class="card-title viewApplicationsBtn"> Daily Blog List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th>Sr.No</th>
                        <th>Action</th>
                        <th>Daily Blog Name</th>
                        <th>Photo</th>
                        <th>Description</th>
                        <th>Link</th>
                      
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(!empty($dailyblog_data)) {  $i=1;?>
                        <?php foreach ($dailyblog_data as $data): ?>
                            <tr>
                            <td><?php echo $i; ?></td>
                                <td>
                                <a href="edit_dailyblog/<?=$data->id ; ?>"><i class="far fa-edit me-2"></i></a>
                                <a href="<?=base_url(); ?>delete_compan/<?php echo base64_encode($data->id); ?>/tbl_dailyblog" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                                </td>
                                <td><?php echo $data->dailyblog_name; ?></td>
                                <td><a href="<?=base_url(); ?>public/uploades/photo/<?php echo $data->photo; ?>" target="_blank"><i class="fa fa-eye" style="font-size:24px"></i></a></td>
                                <td><?php echo $data->description; ?></td>
                                <td><?php echo $data->link; ?></td>
                                
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


          <!-- Create Daily Blog Form -->
            <div class="card card-primary mt-2" style="display: none;">
              <div class="card-header">
                <h3 class="card-title">Add Daily Blog <small></small></h3>
              </div>
                <!-- /.card-header -->
                  <!-- form start -->
                  <form action="<?php echo base_url(); ?>set_dailyblog" method="post" id="dailyblog_form" enctype="multipart/form-data">
                    <div class="row card-body">
                        <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">
                        <div class="col-lg-6 col-md-6 col-12 form-group">
                            <label for="dailyblog_name">Daily Blog Name : </label>
                            <input type="text" name="dailyblog_name" class="form-control" id="dailyblog_name" placeholder="Enter name" value="<?php if(!empty($single_data)){ echo $single_data->dailyblog_name;} ?>">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 form-group">
                            <label for="photo">Attach Photo</label>
                            <input type="file" class="form-control-file" id="photo" name="photo">
                            <small id="fileError" class="text-danger" style="display:none;">Please select a Photo file.</small>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12 form-group">
                            <label for="description">Description :</label><br>
                            <textarea id="description" name="description" rows="7" cols="100"><?php if(!empty($single_data)){ echo $single_data->description;} ?></textarea>
                            <span id="descriptionError" style="color: crimson;"></span>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 form-group">
                            <label for="link">Link :</label>
                            <input type="text" name="link" class="form-control" id="link" placeholder="Enter link" value="<?php if(!empty($single_data)){ echo $single_data->link;} ?>">
                            <span id="linkError" style="color: crimson;"></span>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary"><?php if(!empty($single_data)){ echo 'Update'; } else { echo 'Submit'; } ?></button>
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
            console.log("Daily Blog updated successfully");
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error("Error updating status:", error);
        }
    });
}

$(document).ready(function() {
    $('#viewAdddailyblogBtn').on('click', function() {
        var $viewDailyBlogListCard = $('#viewDailyBlogListCard');
        var $leaveForm = $('.card').not('#viewDailyBlogListCard');
        var $button = $('#viewAdddailyblogBtn');
        var $button1 = $('.viewApplicationsBtn');


        if ($viewDailyBlogListCard.is(':hidden')) {
            $viewDailyBlogListCard.show();
            $leaveForm.hide();
            $button.text('+ Add Daily Blog'); // Change text when showing Empolyee List
            
            $button1.text('Daily Blog List'); // Change text when showing applications

        } else {
            $viewDailyBlogListCard.hide();
            $leaveForm.show();
            $button.text('Daily Blog List'); // Change text when showing Create Employee form
            $button1.text('Add Daily Blog'); // Change text when showing applications

        }
    });
});
</script>