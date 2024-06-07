<?php echo view('Admin/Adminsidebar.php'); ?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white viewCurrencyListCard">Currency List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewCurrencyListCard">Currency List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <button id="viewCreateCurrencyBtn" class="btn btn-info mt-2">Add Currency</button>
                    <!--  Currency List Card -->
                    <div id="viewCurrencyListCard" class="card mt-2" >

                    <div class="card-header">
                            <h3 class="card-title">Currency List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>currency Name</th>
                                        <th>currency Code</th>
                                        <th>symbol</th>
                                        <th>exchange Rate</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // echo "<pre>";print_r($emp_data);exit();
                                    if (!empty($currency_data)) {
                                        $i = 1; ?>
                                        <?php foreach ($currency_data as $data) {  
                                            // print_r($data);?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $data->currency_name; ?></td>
                                                <td><?= $data->currency_code; ?></td>
                                                <td><?= $data->symbol; ?></td>
                                                <td><?= $data->exchange_rate; ?></td>
                                                <td>
                                                    <a href="edit_currency/<?= $data->id; ?>"><i class="far fa-edit me-2"></i></a>
                                                    <a href="<?= base_url(); ?>delete_compan/<?php echo base64_encode($data->id); ?>/tbl_currencies" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
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

                    <!-- Create Currency Form -->
                    <div class="card card-primary mt-2" style="display: none;" >
                        <div class="card-header">
                            <h3 class="card-title">Add Currency <small></small></h3>
                        </div>
                        <form action="<?php echo base_url(); ?>set_currency" method="post" id="currency_form">
                        <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-12 form-group">
                                            <label for="currency_code">Currency Code</label>
                                            <input type="text" class="form-control" name="currency_code" value="<?php if(!empty($single_data)){ echo $single_data->currency_code; }?>" required>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-12 form-group">
                                            <label for="currency_name">Currency Name</label>
                                            <input type="text" class="form-control" name="currency_name" value="<?php if(!empty($single_data)){ echo $single_data->currency_name; }?>" required>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-12 form-group">
                                            <label for="symbol">Symbol</label>
                                            <input type="text" class="form-control" name="symbol" value="<?php if(!empty($single_data)){ echo $single_data->symbol; }?>" required>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12 form-group">
                                            <label for="exchange_rate">Exchange Rate (to 1 INR)</label>
                                            <input type="number" step="0.0001" class="form-control" name="exchange_rate" value="<?php if(!empty($single_data)){ echo $single_data->exchange_rate; }?>" required>
                                        </div>
                                </div>
                            </div> 
                            <!-- /.card-body -->
                            <div class="card-footer text-right">
                                <button type="submit" value=""  name="submit" id="submit" class="btn btn-primary"><?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Submit';} ?></button>
                            </div>                 
                        </form>      
                    </div>

                </div>
            </div>
        </div>
    </section>
    <?php echo view('Admin/Adminfooter.php');?> 
    <script>
$(document).ready(function() {
    $('#viewCreateCurrencyBtn').on('click', function() {
        var $viewCurrencyListCard = $('#viewCurrencyListCard');
        var $leaveForm = $('.card').not('#viewCurrencyListCard');
        var $button = $('#viewCreateCurrencyBtn');
        var $button1 = $('.viewCurrencyListCard');


        if ($viewCurrencyListCard.is(':hidden')) {
            $viewCurrencyListCard.show();
            $leaveForm.hide();
            $button.text('Add Currency'); // Change text when showing Currency List
            $button1.text('Currency List'); 
        } else {
            $viewCurrencyListCard.hide();
            $leaveForm.show();
            $button.text('View Currency List'); // Change text when showing Create Currency form
            $button1.text('Add Currency'); 
        }
    });
});
</script> 
