 
 <?php echo view('Admin/Adminsidebar.php'); ?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white viewCurrencyListCard"> Add Currency </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewCurrencyListCard"> Add Currency</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
 
 <!-- Create Currency Form -->
                    <div class="card card-primary mt-2" >
                        <div class="card-header">
                            <h3 class="card-title">Add Currency <small></small></h3>
                        </div>
                        <form action="<?php echo base_url(); ?>set_currency" method="post">
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
                                            <label for="exchange_rate">Exchange Rate</label>
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
</div>
<?php echo view('Admin/Adminfooter.php');?> 
