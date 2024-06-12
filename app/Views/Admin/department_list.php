<?php echo view('Admin/Adminsidebar.php'); ?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white  viewDepartmentListCard">Department List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewDepartmentListCard">Department List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <button id="viewCreateDepartmentBtn" class="btn btn-info mt-2 "> + Add Department</button>
                    <!-- Create Employee Card -->
                    <div id="viewDepartmentListCard" class="card mt-2" >
                        <div class="card-header">
                            <h3 class="card-title">Department List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Department Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($menu_data)) {
                                        $i = 1; ?>
                                        <?php foreach ($menu_data as $data) {  ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $data->DepartmentName; ?></td>
                                                <td>
                                                    <a href="edit_deparment/<?= $data->id; ?>"><i class="far fa-edit me-2"></i></a>
                                                    <a href="<?= base_url(); ?>delete_compan/<?php echo base64_encode($data->id); ?>/tbl_department" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
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

                    <div class="card card-primary mt-2" style="display: none;">
                        <div class="card-header">
                            <h3 class="card-title">Add Department <small></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url(); ?>add_departments" method="post" id="add_department">
                            <div class="row card-body">
                            <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">

                                <div class="col-lg-12 col-md-3 col-12 form-group">
                                    <label for="menu_name">Department Name</label>
                                    <input type="text" name="DepartmentName" class="form-control" id="DepartmentName"  placeholder="Enter Department name" value="<?php if(!empty($single_data)){ echo $single_data->DepartmentName; } ?>">
                                </div>
                               
                            </div>
                            <!-- /.card-body -->
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
    $('#viewCreateDepartmentBtn').on('click', function() {
        var $viewDepartmentListCard = $('#viewDepartmentListCard');
        var $leaveForm = $('.card').not('#viewDepartmentListCard');
        var $button = $('#viewCreateDepartmentBtn');
        var $button1 = $('.viewDepartmentListCard');


        if ($viewDepartmentListCard.is(':hidden')) {
            $viewDepartmentListCard.show();
            $leaveForm.hide();
            $button.text('+ Add Department'); // Change text when showing Department List
            $button1.text('Department List'); 
        } else {
            $viewDepartmentListCard.hide();
            $leaveForm.show();
            $button.text('Department List'); // Change text when showing Create Department form
            $button1.text('Add Department'); 
        }
    });
});
</script> 

