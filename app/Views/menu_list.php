<?php echo view('Admin/Adminsidebar.php'); ?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white viewApplicationsBtn">Menu List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewApplicationsBtn">Menu List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <button id="viewCreateMenuBtn" class="btn btn-info mt-2 ">Add Menu</button>
                    <!-- Create Employee Card -->
                        <div id="viewMenuListCard" class="card mt-2" >
                            <div class="card-header">
                                <h3 class="card-title viewApplicationsBtn">Menu List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Menu Name</th>
                                            <th>URL Location</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($menu_data)) {
                                            $i = 1; ?>
                                            <?php foreach ($menu_data as $data) {  ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $data->menu_name; ?></td>
                                                    <td><?= $data->url_location; ?></td>
                                                    <td>
                                                        <a href="edit_menu/<?= $data->id; ?>"><i class="far fa-edit me-2"></i></a>
                                                        <a href="<?= base_url(); ?>delete_compan/<?php echo base64_encode($data->id); ?>/tbl_menu" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
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
                        <!-- card -->

                        <!-- Add menu form -->
                        <div class="card card-primary mt-2" style="display: none;">
                        <div class="card-header">
                            <h3 class="card-title">Add menu <small></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url(); ?>set_menu" method="post" id="add_menu_form">
                            <div class="row card-body">
                            <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">

                                <div class="col-lg-12 col-md-3 col-12 form-group">
                                    <label for="menu_name">Enter Menu Name</label>
                                    <input type="text" name="menu_name" class="form-control" id="menu_name"  placeholder="Enter menu name" value="<?php if(!empty($single_data)){ echo $single_data->menu_name; } ?>">
                                </div>
                                <div class="col-lg-12 col-md-3 col-12 form-group">
                                    <label for="url_location">URL Location</label>
                                    <input type="text" name="url_location" class="form-control" id="url_location" placeholder="Enter url location" value="<?php if(!empty($single_data)){ echo $single_data->url_location; } ?>">
                                    <span id="menu_nameError" style="color: red;"></span>

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
    $('#viewCreateMenuBtn').on('click', function() {
        var $viewMenuListCard = $('#viewMenuListCard');
        var $leaveForm = $('.card').not('#viewMenuListCard');
        var $button = $('#viewCreateMenuBtn');
        var $button1 = $('.viewApplicationsBtn');


        if ($viewMenuListCard.is(':hidden')) {
            $viewMenuListCard.show();
            $leaveForm.hide();
            $button.text('+ Add Menu'); // Change text when showing Menu List
            $button1.text('Menu List'); // Change text when showing applications

        } else {
            $viewMenuListCard.hide();
            $leaveForm.show();
            $button.text('View Menu List'); // Change text when showing Create Menu form
            $button1.text('Add Menu'); // Change text when showing applications

        }
    });
});
</script>   
