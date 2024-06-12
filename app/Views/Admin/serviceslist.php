<?php echo view('Admin/Adminsidebar.php'); ?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white viewServiceListCard">Services List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewServiceListCard">Services List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <button id="viewCreateServiceBtn" class="btn btn-info mt-2 ">+ Add Services</button>
                    <!--  Service List Card -->
                    <div id="viewServiceListCard" class="card mt-2" >
                        <div class="card-header">
                            <h3 class="card-title">Services List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Service Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($menu_data)) {
                                        $i = 1; ?>
                                        <?php foreach ($menu_data as $data) {  ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $data->ServicesName; ?></td>
                                                <td>
                                                    <a href="addservices/<?= $data->id; ?>"><i class="far fa-edit me-2"></i></a>
                                                    <a href="<?= base_url(); ?>delete_compan/<?php echo base64_encode($data->id); ?>/tbl_services" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
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

                    <!-- Create Service Form -->
                    <div class="card card-primary mt-2" style="display: none;">
                        <div class="card-header">
                            <h3 class="card-title">Add Services<small></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url(); ?>add_Services" id="Services" method="post">
                            <div class="row card-body">
                            <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">
                                <div class="col-lg-12 col-md-3 col-12 form-group">
                                    <label for="ServicesName">Services Name</label>
                                    <input type="text" name="ServicesName" class="form-control" id="ServicesName"  placeholder="Enter Service name" value="<?php if(!empty($single_data)){ echo $single_data->ServicesName; } ?>">
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
    $('#viewCreateServiceBtn').on('click', function() {
        var $viewServiceListCard = $('#viewServiceListCard');
        var $leaveForm = $('.card').not('#viewServiceListCard');
        var $button = $('#viewCreateServiceBtn');
        var $button1 = $('.viewServiceListCard');


        if ($viewServiceListCard.is(':hidden')) {
            $viewServiceListCard.show();
            $leaveForm.hide();
            $button.text('+ Add Services'); // Change text when showing Service List
            $button1.text('Services List'); 
        } else {
            $viewServiceListCard.hide();
            $leaveForm.show();
            $button.text('Services List'); // Change text when showing Create Service form
            $button1.text('Add Services'); 
        }
    });
});
</script>     
