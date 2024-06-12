<?php echo view('Admin/Adminsidebar.php'); ?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white">Main Task List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white">Main Task List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <button id="viewCreateMainTaskBtn" class="btn btn-info mt-2 ">Create Main Task</button>
                    <!-- Create Employee Card -->
                        <div id="viewMainTaskListCard" class="card mt-2" >
                            <div class="card-header">
                                <h3 class="card-title">Main Task List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Main Task Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($menu_data)) {
                                            $i = 1; ?>
                                            <?php foreach ($menu_data as $data) {  ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $data->mainTaskName; ?></td>
                                                    <td>
                                                        <a href="addmaintask/<?= $data->id; ?>"><i class="far fa-edit me-2"></i></a>
                                                        <a href="<?= base_url(); ?>delete_compan/<?php echo base64_encode($data->id); ?>/tbl_maintaskmaster" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
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
                        <!-- /.card -->

                        <!-- Create Main Task Form -->
                        <div class="card card-primary mt-2" style="display: none;">
                            <div class="card-header">
                                <h3 class="card-title">Add MainTask<small></small></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="<?php echo base_url(); ?>add_maintask" id="mainTaskName" method="post">
                                <div class="row card-body">
                                <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">
                                    <div class="col-lg-12 col-md-3 col-12 form-group">
                                        <label for="mainTaskName">Enter MainTask Name</label>
                                        <input type="text" name="mainTaskName" class="form-control" id="mainTaskName"  placeholder="Enter menu name" value="<?php if(!empty($single_data)){ echo $single_data->mainTaskName; } ?>">
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" value=""  name="submit" id="submit" class="btn btn-primary submitButton"><?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Submit';} ?></button>
                                </div>
                            </form>
                        </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
<?php echo view('Admin/Adminfooter.php');?> 
<script>
$(document).ready(function() {
    $('#viewCreateMainTaskBtn').on('click', function() {
        var $viewMainTaskListCard = $('#viewMainTaskListCard');
        var $leaveForm = $('.card').not('#viewMainTaskListCard');
        var $button = $('#viewCreateMainTaskBtn');

        if ($viewMainTaskListCard.is(':hidden')) {
            $viewMainTaskListCard.show();
            $leaveForm.hide();
            $button.text('Create Main Task'); // Change text when showing Main Task List
        } else {
            $viewMainTaskListCard.hide();
            $leaveForm.show();
            $button.text('View Main Task List'); // Change text when showing Create Main Task form
        }
    });
});
</script>     
