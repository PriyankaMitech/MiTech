<?php echo view('Admin/Adminsidebar.php'); ?>

<style>
    .rallstyle{
        /* border:none !important; */
        width: 84%;
        background-color: #fff !important;
        padding-left: 44px;
    }
                                                                  
    .rallstyles{
        width: 84%;

    }
    .plopd{
        padding-left:20px;
    }
 
.pfortd {
    padding: 5px 0px 5px 27px;
}
.plfortotatal {
    padding-left: 25px;
}
#totalamount_in_words{
    width: 100%;
}
</style>

<div class="content-wrapper">

    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="text-white">Add PO</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active text-white">Add PO</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
        <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add PO <small></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url(); ?>set_po" enctype="multipart/form" method="post" id="po_form">
                       
                            <div class="row card-body">
                                <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="client_id">Client Name :</label>
                                            <select class="form-control" name="client_id" id="client_id" required>
                                                <option value="">Select Client</option>
                                                <?php if (!empty($client_data)) { ?>
                                                <?php foreach ($client_data as $data) { ?>
                                                <option value="<?= $data->id; ?>"
                                                    <?= (!empty($single_data) && $single_data->client_id === $data->id) ? "selected" : "" ?>>
                                                    <?= $data->client_name; ?>
                                                </option>
                                                <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="select_type">Select Type :</label>
                                            <select class="form-control" name="select_type" id="select_type" required>
                                                <option value="">Select Type </option>
                                                <option value="PO" <?= (!empty($single_data) && $single_data->select_type === 'PO') ? "selected" : "" ?>>
                                                PO
                                                </option>
                                                <option value="SO" <?= (!empty($single_data) && $single_data->select_type === 'SO') ? "selected" : "" ?>>
                                                SO
                                                </option>
                                                <option value="WO" <?= (!empty($single_data) && $single_data->select_type === 'WO') ? "selected" : "" ?>>
                                                WO
                                                </option>
                                                <option value="MOU" <?= (!empty($single_data) && $single_data->select_type === 'MOU') ? "selected" : "" ?>>
                                                MOU
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="po_no">DOC NO. : </label>
                                    <input type="text" name="doc_no" class="form-control" id="doc_no" placeholder="Enter DOC NO" value="<?php if(!empty($single_data)){ echo $single_data->doc_no;} ?>">
                                </div>

                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="">DOC Date : </label>
                                    <input type="date" name="doc_date" class="form-control" id="doc_date"  value="<?php if(!empty($single_data)){ echo $single_data->doc_date;} ?>">
                                </div>

                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="">Start Date : </label>
                                    <input type="date" name="start_date" class="form-control" id="start_date"  value="<?php if(!empty($single_data)){ echo $single_data->start_date;} ?>">
                                </div>

                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="">End Date : </label>
                                    <input type="date" name="end_date" class="form-control" id="end_date"  value="<?php if(!empty($single_data)){ echo $single_data->end_date;} ?>">
                                </div>
                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                <label for="attachment">Attach File</label>
                                <input type="file" accept=".pdf" class="form-control-file" id="attachment"
                                    name="attachment" save="public/uploades/PDF">
                                <small id="fileError" class="text-danger" style="display:none;">Please select a PDF
                                    file.</small>
                            </div>
                            <div class="invoice-add-table">
                                            <h4>Services Details   <a href="javascript:void(0);" class="add-btn me-2 add_more_services"><i class="fas fa-plus-circle"></i></a></h4>
                                            <div >
                                                <table class="table table-center add-table-items">
                                                    <thead>
                                                        <tr>
                                                            <th>Services</th>
                                                            <th>Description</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Price</th>
                                                            <!-- <th>Amount</th> -->
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <?php if(empty($services)){
                                                    // echo "<pre>";print_r($services);exit();    
                                                    ?>    
                                                    <tbody >
                                                        <tr class="add-row">
                                                            <!-- <td>
                                                                <input type="text" name="services[]" id="services_0" class="dynamic-items form-control">
                                                            </td> -->

                                                            <td>
                                                                <select class="form-control" name="services[]" id="services_0" required>
                                                                    <option value="">Select Services</option>
                                                                    <?php if (!empty($services_data)) { ?>
                                                                    <?php foreach ($services_data as $data) { ?>
                                                                    <option value="<?= $data->id; ?>">
                                                                        <?= $data->ServicesName; ?>
                                                                    </option>
                                                                    <?php } ?>
                                                                    <?php } ?>
                                                                </select>

                                                            </td>

                                                            <td>
                                                                <input type="text" name="description[]" id="description_0" class="dynamic-items form-control">
                                                            </td>
                                                         
                                                            <td>
                                                                <input type="text" name="quantity[]" class="dynamic-quantity form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="price[]" class="dynamic-price form-control">
                                                            </td>
                                                         
                                                   
                                                            <td class="add-remove text-end">
                                                                <!-- <a href="javascript:void(0);" class="add-btn me-2 add_more_services "><i class="fas fa-plus-circle"></i></a>  -->
                                                            <a href="javascript:void(0);" class="remove-btn btn_remove"><i class="fas fa-trash"></i></a>
                                                            </td>
                                                        </tr>  
                                                     
                                                    </tbody>
                                                    <?php }else{
                                                        foreach($services as $data){
                                                            // echo "<pre>";print_r($data);exit();
                                                        ?>

                                                        <tr class="now add-row">
                                                         

                                                            <td>
                                                                <select class="form-control" name="services[]" id="services_0" required>
                                                                    <option value="">Select Services</option>
                                                                    <?php if (!empty($services_data)) { ?>
                                                                    <?php foreach ($services_data as $sdata) { ?>
                                                                    <option value="<?= $sdata->id; ?>"
                                                                        <?= ($data->services == $sdata->id) ? "selected" : "" ?>>
                                                                        <?= $sdata->ServicesName; ?>
                                                                    </option>
                                                                    <?php } ?>
                                                                    <?php } ?>
                                                                </select>

                                                                <!-- <input type="text" name="iteam[]" id="iteam_0" class="dynamic-items form-control"> -->
                                                            </td>

                                                            <td>
                                                                <input type="text" name="description[]" id="description_0" value="<?=$data->description;?>" class="dynamic-items form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="quantity[]" value="<?=$data->quantity;?>" class="dynamic-quantity form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="price[]" value="<?=$data->price;?>" class="dynamic-price form-control">
                                                            </td>
                                                           
                                                            
                                                            <td class="add-remove text-end">
                                                                <!-- <a href="javascript:void(0);" class="add-btn me-2 add_more_services"><i class="fas fa-plus-circle"></i></a>  -->
                                                               <a href="javascript:void(0);" class="remove-btn btn_remove"><i class="fas fa-trash"></i></a>

                                                            </td>
                                                        </tr>
                                                    <?php }} ?>
                                                    <tbody class="dynamic_services"></tbody>
                                                
                                                </table>   
                                                <hr>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="paymentTerms">Select Invoicing(Payment) Terms :</label>
                                                        <select class="form-control" name="paymentTerms" id="paymentTerms" required>
                                                            <option value="">Select Type Of Payment Terms</option>
                                                            <option value="custom" <?= (!empty($single_data) && $single_data->paymentTerms === 'custom') ? "selected" : "" ?>>Custom</option>
                                                            <option value="monthly" <?= (!empty($single_data) && $single_data->paymentTerms === 'monthly') ? "selected" : "" ?>>Monthly</option>
                                                            <option value="half_yearly" <?= (!empty($single_data) && $single_data->paymentTerms === 'half_yearly') ? "selected" : "" ?>>Half yearly</option>
                                                            <option value="quarterly" <?= (!empty($single_data) && $single_data->paymentTerms === 'quarterly') ? "selected" : "" ?>>Quarterly</option>
                                                            <option value="yearly" <?= (!empty($single_data) && $single_data->paymentTerms === 'yearly') ? "selected" : "" ?>>Yearly</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?php if(empty($single_data)){ ?>
                                                <div id="customPaymentTerms" style="display: none;">
                                                    <table class="table table-bordered" id="customPaymentTermsTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Description</th>
                                                                <th>Percentage (%)</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input type="text" name="custom_description[]" class="form-control"></td>
                                                                <td><input type="number" name="custom_percentage[]" class="form-control" oninput="checkTotalPercentage()"></td>
                                                                
                                                                <td>
                                                                    <button href="javascript:void(0);" class="btn btn-success addCustomPaymentTerm"><i class="fas fa-plus-circle"></i></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php }else{ ?>
                                                    <?php if($single_data->paymentTerms === 'custom' ){ ?>


                                                    <?php if(!empty($custom_data)){ ?>
                                                        <div id="customPaymentTerms" style="display: none;">
                                                    <table class="table table-bordered" id="customPaymentTermsTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Description</th>
                                                                <th>Percentage (%)</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php  foreach($custom_data as $data){?>
                                                            <tr>
                                                                <td><input type="text" name="custom_description[]" class="form-control" value="<?=$data->custom_description; ?>"></td>
                                                                <td><input type="number" name="custom_percentage[]" class="form-control" value="<?=$data->custom_percentage; ?>" oninput="checkTotalPercentage()"></td>
                                                                <td>
                                                                    <button href="javascript:void(0);" class="btn btn-success addCustomPaymentTerm"><i class="fas fa-plus-circle"></i></a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php } ?>

                                                        <?php }else{ ?>
                                                            <div id="customPaymentTerms" style="display: none;">
                                                    <table class="table table-bordered" id="customPaymentTermsTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Description</th>
                                                                <th>Percentage (%)</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input type="text" name="custom_description[]" class="form-control"></td>
                                                                <td><input type="number" name="custom_percentage[]" class="form-control" oninput="checkTotalPercentage()"></td>
                                                                <td>
                                                                    <button href="javascript:void(0);" class="btn btn-success addCustomPaymentTerm"><i class="fas fa-plus-circle"></i></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                            <?php } ?>

                                                    <?php } ?>
                                                <div id="halfYearlyOptions" style="display: none;">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="half_yearly_start_month">Starting Month :</label>
                                                                <select class="form-control" name="half_yearly_start_month" id="half_yearly_start_month">
                                                                    <option value="1" <?= (!empty($single_data) && $single_data->half_yearly_start_month === '1') ? "selected" : "" ?>>January</option>
                                                                    <option value="2" <?= (!empty($single_data) && $single_data->half_yearly_start_month === '2') ? "selected" : "" ?>>February</option>
                                                                    <option value="3" <?= (!empty($single_data) && $single_data->half_yearly_start_month === '3') ? "selected" : "" ?>>March</option>
                                                                    <option value="4" <?= (!empty($single_data) && $single_data->half_yearly_start_month === '4') ? "selected" : "" ?>>April</option>
                                                                    <option value="5" <?= (!empty($single_data) && $single_data->half_yearly_start_month === '5') ? "selected" : "" ?>>May</option>
                                                                    <option value="6" <?= (!empty($single_data) && $single_data->half_yearly_start_month === '6') ? "selected" : "" ?>>June</option>
                                                                    <option value="7" <?= (!empty($single_data) && $single_data->half_yearly_start_month === '7') ? "selected" : "" ?>>July</option>
                                                                    <option value="8" <?= (!empty($single_data) && $single_data->half_yearly_start_month === '8') ? "selected" : "" ?>>August</option>
                                                                    <option value="9" <?= (!empty($single_data) && $single_data->half_yearly_start_month === '9') ? "selected" : "" ?>>September</option>
                                                                    <option value="10 <?= (!empty($single_data) && $single_data->half_yearly_start_month === '10') ? "selected" : "" ?>">October</option>
                                                                    <option value="11 <?= (!empty($single_data) && $single_data->half_yearly_start_month === '11') ? "selected" : "" ?>">November</option>
                                                                    <option value="12 <?= (!empty($single_data) && $single_data->half_yearly_start_month === '12') ? "selected" : "" ?>">December</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-3 col-12 form-group">
                                                            <label for="half_yearly_start_date">From Date : </label>
                                                            <input type="date" name="half_yearly_start_date" class="form-control" id="half_yearly_start_date" value="<?php if(!empty($single_data)){ echo $single_data->half_yearly_start_date;} ?>">
                                                        </div>

                                                        <div class="col-lg-4 col-md-3 col-12 form-group">
                                                            <label for="half_yearly_end_date">To Date : </label>
                                                            <input type="date" name="half_yearly_end_date" class="form-control" id="half_yearly_end_date" value="<?php if(!empty($single_data)){ echo $single_data->half_yearly_end_date;} ?>" readonly>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="half_yearly_start_month1">Starting Month :</label>
                                                                <select class="form-control" name="half_yearly_start_month1" id="half_yearly_start_month1">
                                                                    <option value="1" <?= (!empty($single_data) && $single_data->half_yearly_start_month1 === '1') ? "selected" : "" ?>>January</option>
                                                                    <option value="2" <?= (!empty($single_data) && $single_data->half_yearly_start_month1 === '2') ? "selected" : "" ?>>February</option>
                                                                    <option value="3" <?= (!empty($single_data) && $single_data->half_yearly_start_month1 === '3') ? "selected" : "" ?>>March</option>
                                                                    <option value="4" <?= (!empty($single_data) && $single_data->half_yearly_start_month1 === '4') ? "selected" : "" ?>>April</option>
                                                                    <option value="5" <?= (!empty($single_data) && $single_data->half_yearly_start_month1 === '5') ? "selected" : "" ?>>May</option>
                                                                    <option value="6" <?= (!empty($single_data) && $single_data->half_yearly_start_month1 === '6') ? "selected" : "" ?>>June</option>
                                                                    <option value="7" <?= (!empty($single_data) && $single_data->half_yearly_start_month1 === '7') ? "selected" : "" ?>>July</option>
                                                                    <option value="8" <?= (!empty($single_data) && $single_data->half_yearly_start_month1 === '8') ? "selected" : "" ?>>August</option>
                                                                    <option value="9" <?= (!empty($single_data) && $single_data->half_yearly_start_month1 === '9') ? "selected" : "" ?>>September</option>
                                                                    <option value="10 <?= (!empty($single_data) && $single_data->half_yearly_start_month1 === '10') ? "selected" : "" ?>">October</option>
                                                                    <option value="11 <?= (!empty($single_data) && $single_data->half_yearly_start_month1 === '11') ? "selected" : "" ?>">November</option>
                                                                    <option value="12 <?= (!empty($single_data) && $single_data->half_yearly_start_month1 === '12') ? "selected" : "" ?>">December</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-3 col-12 form-group">
                                                            <label for="half_yearly_start_date1">From Date : </label>
                                                            <input type="date" name="half_yearly_start_date1" class="form-control" id="half_yearly_start_date1" value="<?php if(!empty($single_data)){ echo $single_data->half_yearly_start_date1;} ?>">
                                                        </div>

                                                        <div class="col-lg-4 col-md-3 col-12 form-group">
                                                            <label for="half_yearly_end_date1">To Date : </label>
                                                            <input type="date" name="half_yearly_end_date1" class="form-control" id="half_yearly_end_date1" value="<?php if(!empty($single_data)){ echo $single_data->half_yearly_end_date1;} ?>" readonly>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div id="quarterlyOptions" style="display: none;">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="quarterly_start_month">Starting Month :</label>
                                                                <select class="form-control" name="quarterly_start_month" id="quarterly_start_month">
                                                                    <option value="1" <?= (!empty($single_data) && $single_data->quarterly_start_month === '1') ? "selected" : "" ?>>January</option>
                                                                    <option value="2" <?= (!empty($single_data) && $single_data->quarterly_start_month === '2') ? "selected" : "" ?>>February</option>
                                                                    <option value="3" <?= (!empty($single_data) && $single_data->quarterly_start_month === '3') ? "selected" : "" ?>>March</option>
                                                                    <option value="4" <?= (!empty($single_data) && $single_data->quarterly_start_month === '4') ? "selected" : "" ?>>April</option>
                                                                    <option value="5" <?= (!empty($single_data) && $single_data->quarterly_start_month === '5') ? "selected" : "" ?>>May</option>
                                                                    <option value="6" <?= (!empty($single_data) && $single_data->quarterly_start_month === '6') ? "selected" : "" ?>>June</option>
                                                                    <option value="7" <?= (!empty($single_data) && $single_data->quarterly_start_month === '7') ? "selected" : "" ?>>July</option>
                                                                    <option value="8" <?= (!empty($single_data) && $single_data->quarterly_start_month === '8') ? "selected" : "" ?>>August</option>
                                                                    <option value="9" <?= (!empty($single_data) && $single_data->quarterly_start_month === '9') ? "selected" : "" ?>>September</option>
                                                                    <option value="10 <?= (!empty($single_data) && $single_data->quarterly_start_month === '10') ? "selected" : "" ?>">October</option>
                                                                    <option value="11 <?= (!empty($single_data) && $single_data->quarterly_start_month === '11') ? "selected" : "" ?>">November</option>
                                                                    <option value="12 <?= (!empty($single_data) && $single_data->quarterly_start_month === '12') ? "selected" : "" ?>">December</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-3 col-12 form-group">
                                                            <label for="quarterly_start_month_start_date">From Date : </label>
                                                            <input type="date" name="quarterly_start_month_start_date" class="form-control" id="quarterly_start_month_start_date" value="<?php if(!empty($single_data)){ echo $single_data->quarterly_start_month_start_date;} ?>">
                                                        </div>

                                                        <div class="col-lg-4 col-md-3 col-12 form-group">
                                                            <label for="quarterly_start_month_end_date">To Date : </label>
                                                            <input type="date" name="quarterly_start_month_end_date" class="form-control" id="quarterly_start_month_end_date" value="<?php if(!empty($single_data)){ echo $single_data->quarterly_start_month_end_date;} ?>" readonly>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="quarterly_start_month1">Starting Month :</label>
                                                                <select class="form-control" name="quarterly_start_month1" id="quarterly_start_month1">
                                                                    <option value="1" <?= (!empty($single_data) && $single_data->quarterly_start_month1 === '1') ? "selected" : "" ?>>January</option>
                                                                    <option value="2" <?= (!empty($single_data) && $single_data->quarterly_start_month1 === '2') ? "selected" : "" ?>>February</option>
                                                                    <option value="3" <?= (!empty($single_data) && $single_data->quarterly_start_month1 === '3') ? "selected" : "" ?>>March</option>
                                                                    <option value="4" <?= (!empty($single_data) && $single_data->quarterly_start_month1 === '4') ? "selected" : "" ?>>April</option>
                                                                    <option value="5" <?= (!empty($single_data) && $single_data->quarterly_start_month1 === '5') ? "selected" : "" ?>>May</option>
                                                                    <option value="6" <?= (!empty($single_data) && $single_data->quarterly_start_month1 === '6') ? "selected" : "" ?>>June</option>
                                                                    <option value="7" <?= (!empty($single_data) && $single_data->quarterly_start_month1 === '7') ? "selected" : "" ?>>July</option>
                                                                    <option value="8" <?= (!empty($single_data) && $single_data->quarterly_start_month1 === '8') ? "selected" : "" ?>>August</option>
                                                                    <option value="9" <?= (!empty($single_data) && $single_data->quarterly_start_month1 === '9') ? "selected" : "" ?>>September</option>
                                                                    <option value="10 <?= (!empty($single_data) && $single_data->quarterly_start_month1 === '10') ? "selected" : "" ?>">October</option>
                                                                    <option value="11 <?= (!empty($single_data) && $single_data->quarterly_start_month1 === '11') ? "selected" : "" ?>">November</option>
                                                                    <option value="12 <?= (!empty($single_data) && $single_data->quarterly_start_month1 === '12') ? "selected" : "" ?>">December</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-3 col-12 form-group">
                                                            <label for="quarterly_start_month_start_date1">From Date : </label>
                                                            <input type="date" name="quarterly_start_month_start_date1" class="form-control" id="quarterly_start_month_start_date1" value="<?php if(!empty($single_data)){ echo $single_data->quarterly_start_month_start_date1;} ?>">
                                                        </div>

                                                        <div class="col-lg-4 col-md-3 col-12 form-group">
                                                            <label for="quarterly_start_month_end_date1">To Date : </label>
                                                            <input type="date" name="quarterly_start_month_end_date1" class="form-control" id="quarterly_start_month_end_date1" value="<?php if(!empty($single_data)){ echo $single_data->quarterly_start_month_end_date1;} ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="quarterly_start_month2">Starting Month :</label>
                                                                <select class="form-control" name="quarterly_start_month2" id="quarterly_start_month2">
                                                                    <option value="1" <?= (!empty($single_data) && $single_data->quarterly_start_month2 === '1') ? "selected" : "" ?>>January</option>
                                                                    <option value="2" <?= (!empty($single_data) && $single_data->quarterly_start_month2 === '2') ? "selected" : "" ?>>February</option>
                                                                    <option value="3" <?= (!empty($single_data) && $single_data->quarterly_start_month2 === '3') ? "selected" : "" ?>>March</option>
                                                                    <option value="4" <?= (!empty($single_data) && $single_data->quarterly_start_month2 === '4') ? "selected" : "" ?>>April</option>
                                                                    <option value="5" <?= (!empty($single_data) && $single_data->quarterly_start_month2 === '5') ? "selected" : "" ?>>May</option>
                                                                    <option value="6" <?= (!empty($single_data) && $single_data->quarterly_start_month2 === '6') ? "selected" : "" ?>>June</option>
                                                                    <option value="7" <?= (!empty($single_data) && $single_data->quarterly_start_month2 === '7') ? "selected" : "" ?>>July</option>
                                                                    <option value="8" <?= (!empty($single_data) && $single_data->quarterly_start_month2 === '8') ? "selected" : "" ?>>August</option>
                                                                    <option value="9" <?= (!empty($single_data) && $single_data->quarterly_start_month2 === '9') ? "selected" : "" ?>>September</option>
                                                                    <option value="10 <?= (!empty($single_data) && $single_data->quarterly_start_month2 === '10') ? "selected" : "" ?>">October</option>
                                                                    <option value="11 <?= (!empty($single_data) && $single_data->quarterly_start_month2 === '11') ? "selected" : "" ?>">November</option>
                                                                    <option value="12 <?= (!empty($single_data) && $single_data->quarterly_start_month2 === '12') ? "selected" : "" ?>">December</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-3 col-12 form-group">
                                                            <label for="quarterly_start_month_start_date2">From Date : </label>
                                                            <input type="date" name="quarterly_start_month_start_date2" class="form-control" id="quarterly_start_month_start_date2" value="<?php if(!empty($single_data)){ echo $single_data->quarterly_start_month_start_date2;} ?>">
                                                        </div>

                                                        <div class="col-lg-4 col-md-3 col-12 form-group">
                                                            <label for="quarterly_start_month_end_date2">To Date : </label>
                                                            <input type="date" name="quarterly_start_month_end_date2" class="form-control" id="quarterly_start_month_end_date2" value="<?php if(!empty($single_data)){ echo $single_data->quarterly_start_month_end_date2;} ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="quarterly_start_month3">Starting Month :</label>
                                                                <select class="form-control" name="quarterly_start_month3" id="quarterly_start_month3">
                                                                    <option value="1" <?= (!empty($single_data) && $single_data->quarterly_start_month3 === '1') ? "selected" : "" ?>>January</option>
                                                                    <option value="2" <?= (!empty($single_data) && $single_data->quarterly_start_month3 === '2') ? "selected" : "" ?>>February</option>
                                                                    <option value="3" <?= (!empty($single_data) && $single_data->quarterly_start_month3 === '3') ? "selected" : "" ?>>March</option>
                                                                    <option value="4" <?= (!empty($single_data) && $single_data->quarterly_start_month3 === '4') ? "selected" : "" ?>>April</option>
                                                                    <option value="5" <?= (!empty($single_data) && $single_data->quarterly_start_month3 === '5') ? "selected" : "" ?>>May</option>
                                                                    <option value="6" <?= (!empty($single_data) && $single_data->quarterly_start_month3 === '6') ? "selected" : "" ?>>June</option>
                                                                    <option value="7" <?= (!empty($single_data) && $single_data->quarterly_start_month3 === '7') ? "selected" : "" ?>>July</option>
                                                                    <option value="8" <?= (!empty($single_data) && $single_data->quarterly_start_month3 === '8') ? "selected" : "" ?>>August</option>
                                                                    <option value="9" <?= (!empty($single_data) && $single_data->quarterly_start_month3 === '9') ? "selected" : "" ?>>September</option>
                                                                    <option value="10 <?= (!empty($single_data) && $single_data->quarterly_start_month3 === '10') ? "selected" : "" ?>">October</option>
                                                                    <option value="11 <?= (!empty($single_data) && $single_data->quarterly_start_month3 === '11') ? "selected" : "" ?>">November</option>
                                                                    <option value="12 <?= (!empty($single_data) && $single_data->quarterly_start_month3 === '12') ? "selected" : "" ?>">December</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-3 col-12 form-group">
                                                            <label for="quarterly_start_month_start_date3">From Date : </label>
                                                            <input type="date" name="quarterly_start_month_start_date3" class="form-control" id="quarterly_start_month_start_date3" value="<?php if(!empty($single_data)){ echo $single_data->quarterly_start_month_start_date3;} ?>">
                                                        </div>

                                                        <div class="col-lg-4 col-md-3 col-12 form-group">
                                                            <label for="quarterly_start_month_end_date3">To Date : </label>
                                                            <input type="date" name="quarterly_start_month_end_date3" class="form-control" id="quarterly_start_month_end_date3" value="<?php if(!empty($single_data)){ echo $single_data->quarterly_start_month_end_date3;} ?>" readonly>
                                                        </div>

                                                    </div>


                                                </div>
                                              

                                                <div id="dateRanges" style="display: none;">
                                                    <div> <p class="h5 font-weight-bold"> Note: Start and End dates are mentioned above.</p></div>
                                                </div>

                                                <div id="monthlydateRanges" style="display: none;">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-3 col-12 form-group">
                                                            <label for="monthly_start_number"> Every month from this date : </label>
                                                            <input type="number" name="monthly_start_number" class="form-control" id="monthly_start_number" value="<?php if(!empty($single_data)){ echo $single_data->monthly_start_date;} ?>">
                                                        </div>

                                                        <div class="col-lg-4 col-md-3 col-12 form-group">
                                                            <label for="monthly_end_number">To this date : </label>
                                                            <input type="number" name="monthly_end_number" class="form-control" id="monthly_end_number" value="<?php if(!empty($single_data)){ echo $single_data->monthly_end_date;} ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer text-right">
                                <button type="submit" name="submit" id="submit" class="btn btn-primary">
                                    <?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Submit';} ?>
                                </button>
                            </div>
                        </form>



                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
    
        </div>
    </section>
</div>
<?php echo view('Admin/Adminfooter.php');?>      
<script src="https://cdn.jsdelivr.net/npm/number-to-words@1.2.4/numberToWords.min.js"></script>

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
            console.log("PO updated successfully");
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error("Error updating status:", error);
        }
    });
}

$(document).ready(function() {
    $('#viewCreatePOBtn').on('click', function() {
        var $viewPOListCard = $('#viewPOListCard');
        var $leaveForm = $('.card').not('#viewPOListCard');
        var $button = $('#viewCreatePOBtn');

        var $button1 = $('.viewApplicationsBtn');


        if ($viewPOListCard.is(':hidden')) {
            $viewPOListCard.show();
            $leaveForm.hide();
            $button.text('+ Add PO'); // Change text when showing Meeting List
            $button1.text('PO List'); // Change text when showing applications

        } else {
            $viewPOListCard.hide();
            $leaveForm.show();
            $button.text('PO List'); // Change text when showing Create Meeting form
            $button1.text('Add PO'); // Change text when showing applications

        }
    });
});

$(document).on("change", ".add-row input[type='text'], #cgst, #sgst , #tax", function () {
    var row = $(this).closest(".add-row");
    var discount = 0;
    var tax_data = 0;
    var cgst_data = parseFloat($("#cgst").val()) || 0;
    var sgst_data = parseFloat($("#sgst").val()) || 0;
    var totalAmountWithtax = 0;
    var quantity = parseFloat(row.find("input[name='quantity[]']").val()) || 0;
    var price = parseFloat(row.find("input[name='price[]']").val()) || 0;
    discount = parseFloat(row.find("input[name='discount[]']").val()) || 0;
    tax_data = parseFloat(row.find("input[name='tax[]']").val()) || 0;

    var amount = quantity * price;

    row.find("input[name='total_amount[]']").val(amount.toFixed(2));

    var total_amount = 0;
    $(".add-row").each(function() {
        var totalAmount = parseFloat($(this).find("input[name='total_amount[]']").val()) || 0;
        total_amount += totalAmount;
    });

    $(".totalAmountWithtax").text(total_amount.toFixed(2));

    var tax_value1 = total_amount * (tax_data / 100);
    var cgst_value1 = total_amount * (cgst_data / 100);
    var sgst_value1 = total_amount * (sgst_data / 100);

    $("#final_total").val(total_amount.toFixed(2));

    // Calculate final total by adding CGST, SGST, and total amount
    var final_total = total_amount + cgst_value1 + sgst_value1;

    $("#totalamounttotal").val(total_amount.toFixed(2));

    $("#final_total").val(final_total.toFixed(2));


    var totalAmountTotalWords = numberToWords.toWords(final_total);
    $("input[name='totalamount_in_words']").val(totalAmountTotalWords);

    $(".preview_sgst2").text(sgst_value.toFixed(2));
    $(".preview_cgst2").text(cgst_value.toFixed(2));
    $(".preview_igst2").text(0); // Assuming IGST is not part of this calculation
    $(".preview_totalAmountWithtax").text(total_amount.toFixed(2));
});

$(document).ready(function() {
    $('.add-row input[type="text"], #cgst, #sgst, #tax,').change();
});

$(document).ready(function() {
    // Calculate totals on page load
    calculateAndStoreTotals();
    

    // Listen for changes in relevant inputs
    $(document).on("change", "input[name='tax[]'], input[name='cgst[]'], input[name='sgst[]'], input[name='services[]'], input[name='quantity[]'], input[name='price[]'], input[name='amount_p[]'], input[name='tax[]'], input[name='discount[]']", function () {
        calculateAndStoreTotals();

        // handleTaxChange();
        
    });

    function calculateAndStoreTotals() {
        var totalQuantity = 0;
        var totalPrice = 0;
        var totalAmount = 0;
        var totalDiscount = 0;
        var totaltaxvalue = 0;
        var totalcgstvalue = 0;
        var totalsgstvalue = 0;

        var totalTax = 0;
        var totalSGST = 0;
        var totalCGST = 0;

        var totalTax = 0;
        var totalamounttotal = 0;


        $(".add-row").each(function () {
            var row = $(this);
            var quantity = parseFloat(row.find("input[name='quantity[]']").val()) || 0;
            var price = parseFloat(row.find("input[name='price[]']").val()) || 0;
            var amount = parseFloat(row.find("input[name='amount_p[]']").val()) || 0;
            var discount = parseFloat(row.find("input[name='discount[]']").val()) || 0;
            var total_amount = parseFloat(row.find("input[name='total_amount[]']").val()) || 0;
            var total_tax = parseFloat(row.find("input[name='tax[]']").val()) || 0;
            var total_tax_value = parseFloat(row.find("input[name='tax_value[]']").val()) || 0;
            var total_cgst_value = parseFloat(row.find("input[name='cgst_value[]']").val()) || 0;

            var total_sgst_value = parseFloat(row.find("input[name='sgst_value[]']").val()) || 0;


            var total_sgst = parseFloat(row.find("input[name='sgst[]']").val()) || 0;
            var total_cgst = parseFloat(row.find("input[name='cgst[]']").val()) || 0;
          


            totalQuantity += quantity;
            totalPrice += price;
            totalAmount += amount;
            totalDiscount += discount;
            totalamounttotal += total_amount;

            totaltaxvalue += total_tax_value;
            totalcgstvalue += total_cgst_value;
            totalsgstvalue += total_sgst_value;


            totalTax += total_tax;
            totalSGST += total_sgst;
            totalCGST += total_cgst;
        });

        $("input[name='totalQuantity']").val(totalQuantity.toFixed(2));
        $("input[name='total_price']").val(totalPrice.toFixed(2));
        $("input[name='totalamount']").val(totalAmount.toFixed(2));
        $("input[name='total_discount']").val(totalDiscount.toFixed(2));
        $("input[name='totalamounttotal']").val((totalamounttotal).toFixed(2));
        $("input[name='final_total']").val((totalamounttotal).toFixed(2));

        $("input[name='total_tax_value']").val(totaltaxvalue.toFixed(2));

        $("input[name='total_tax']").val(totalTax.toFixed(2));
        $("input[name='total_sgst']").val(totalSGST.toFixed(2));
        $("input[name='total_cgst']").val((totalCGST).toFixed(2));
        $(".sub_total").text((totalAmount).toFixed(2));
        $(".total_d").text((totalDiscount).toFixed(2));

       
      

        if (totalcgstvalue !== 0 || totalsgstvalue !== 0) {
                $(".cgst2").text((totalcgstvalue).toFixed(2));
                $(".sgst2").text((totalsgstvalue).toFixed(2));
            
                $("#cgst2").val((totalcgstvalue).toFixed(2));
                $("#sgst2").val((totalsgstvalue).toFixed(2));
                $('.tax2').hide();
            }else {
            

                $(".tax2").text((totaltaxvalue).toFixed(2));
                        $("#tax2").val((totaltaxvalue).toFixed(2));
                        $('.tax2').show();
            }

        $("#preview_total_discount").text((totalDiscount).toFixed(2));
        // var totalAmountTotalWords = numberToWords.toWords(totalamounttotal);
        // $("input[name='totalamount_in_words']").val(totalAmountTotalWords);
  
    }

    $('.add_more_services').click(function(e) {
        $('.tax_column, .tax_column1, .tax_column2').hide();
    e.preventDefault();
    var max_fields = 5000;
    var x = 1;

    		var isBillWithoutTaxChecked = $("input[name='bill'][value='Bill Without Tax']").is(":checked");
    if (x < max_fields) {
        x++;
        $('.dynamic_services').append('<tr class="now add-row "><td><select class="form-control" name="services[]" id="services_'+ x +'" required><option value="">Select Services</option><?php if (!empty($services_data)) { ?><?php foreach ($services_data as $data) { ?><option value="<?= $data->id; ?>"><?= $data->ServicesName; ?></option><?php } ?><?php } ?></select></td><td><input type="text" name="description[]" id="description" class="dynamic-items form-control"></td><td><input type="text" name="quantity[]" class="dynamic-quantity form-control"></td><td><input type="text" name="price[]" class="dynamic-price form-control"></td> <td class="add-remove text-end"> <a href="javascript:void(0);" class="remove-btn btn_remove"><i class="fas fa-trash"></i></a></td></tr>');
        
        $('.btn_remove').on('click', function() {
            $(this).closest('.add-row').remove();

            var row = $(this).closest(".add-row");
    var discount = 0;
    var tax_data = 0;
    var cgst_data = parseFloat($("#cgst").val()) || 0;
    var sgst_data = parseFloat($("#sgst").val()) || 0;
    var totalAmountWithtax = 0;
    var quantity = parseFloat(row.find("input[name='quantity[]']").val()) || 0;
    var price = parseFloat(row.find("input[name='price[]']").val()) || 0;
    discount = parseFloat(row.find("input[name='discount[]']").val()) || 0;
    tax_data = parseFloat(row.find("input[name='tax[]']").val()) || 0;

    var amount = quantity * price;


    row.find("input[name='total_amount[]']").val(amount.toFixed(2));

    var total_amount = 0;
    $(".add-row").each(function() {
        var totalAmount = parseFloat($(this).find("input[name='total_amount[]']").val()) || 0;
        total_amount += totalAmount;
    });

    $(".totalAmountWithtax").text(total_amount.toFixed(2));

    var tax_value1 = total_amount * (tax_data / 100);
    var cgst_value1 = total_amount * (cgst_data / 100);
    var sgst_value1 = total_amount * (sgst_data / 100);

    $("#final_total").val(total_amount.toFixed(2));

    // Calculate final total by adding CGST, SGST, and total amount
    var final_total = total_amount + cgst_value1 + sgst_value1;

    $("#totalamounttotal").val(total_amount.toFixed(2));

    $("#final_total").val(final_total.toFixed(2));


    var totalAmountTotalWords = numberToWords.toWords(final_total);
    $("input[name='totalamount_in_words']").val(totalAmountTotalWords);

    $(".preview_sgst2").text(sgst_value.toFixed(2));
    $(".preview_cgst2").text(cgst_value.toFixed(2));
    $(".preview_igst2").text(0); // Assuming IGST is not part of this calculation
    $(".preview_totalAmountWithtax").text(total_amount.toFixed(2));
            calculateAndStoreTotals();
        });
    }

});
$('.btn_remove').on('click', function() {
    $(this).closest('.add-row').remove();

    var row = $(this).closest(".add-row");
    var discount = 0;
    var tax_data = 0;
    var cgst_data = parseFloat($("#cgst").val()) || 0;
    var sgst_data = parseFloat($("#sgst").val()) || 0;
    var totalAmountWithtax = 0;
    var quantity = parseFloat(row.find("input[name='quantity[]']").val()) || 0;
    var price = parseFloat(row.find("input[name='price[]']").val()) || 0;
    discount = parseFloat(row.find("input[name='discount[]']").val()) || 0;
    tax_data = parseFloat(row.find("input[name='tax[]']").val()) || 0;

    var amount = quantity * price;



    row.find("input[name='total_amount[]']").val(amount.toFixed(2));

    var total_amount = 0;
    $(".add-row").each(function() {
        var totalAmount = parseFloat($(this).find("input[name='total_amount[]']").val()) || 0;
        total_amount += totalAmount;
    });

    $(".totalAmountWithtax").text(total_amount.toFixed(2));

    var tax_value1 = total_amount * (tax_data / 100);
    var cgst_value1 = total_amount * (cgst_data / 100);
    var sgst_value1 = total_amount * (sgst_data / 100);

    $("#final_total").val(total_amount.toFixed(2));

    // Calculate final total by adding CGST, SGST, and total amount
    var final_total = total_amount + cgst_value1 + sgst_value1;

    $("#totalamounttotal").val(total_amount.toFixed(2));

    $("#final_total").val(final_total.toFixed(2));


    var totalAmountTotalWords = numberToWords.toWords(final_total);
    $("input[name='totalamount_in_words']").val(totalAmountTotalWords);

    $(".preview_sgst2").text(sgst_value.toFixed(2));
    $(".preview_cgst2").text(cgst_value.toFixed(2));
    $(".preview_igst2").text(0); // Assuming IGST is not part of this calculation
    $(".preview_totalAmountWithtax").text(total_amount.toFixed(2));

    
    calculateAndStoreTotals();
});

	});


    $(document).ready(function() {
    function updatePaymentTermsDisplay() {
        var value = $('#paymentTerms').val();
        $('#customPaymentTerms').hide();
        $('#dateRanges').hide();
        $('#halfYearlyOptions').hide();
        $('#quarterlyOptions').hide();
        $('#monthlydateRanges').hide();

        if (value === 'custom') {
            $('#customPaymentTerms').show();
        } else if (value === 'yearly') {
            $('#dateRanges').show();
        } else if (value === 'half_yearly') {
            $('#halfYearlyOptions').show();
        } else if (value === 'quarterly') {
            $('#quarterlyOptions').show();
        }else if (value === 'monthly') {
            $('#monthlydateRanges').show();
        }
    }

    // Attach the change event handler
    $('#paymentTerms').on('change', updatePaymentTermsDisplay);

    // Trigger the change event on page load
    updatePaymentTermsDisplay();

    $(document).on('click', '.addCustomPaymentTerm', function(event) {
        event.preventDefault();
        var row = `
            <tr>
                <td><input type="text" name="custom_description[]" class="form-control"></td>
                <td><input type="number" name="custom_percentage[]" class="form-control" oninput="checkTotalPercentage()"></td>
                <td>
                    <a href="javascript:void(0);" class="btn btn-danger removeCustomPaymentTerm"><i class="fas fa-trash"></i></a>
                    <a href="javascript:void(0);" class="btn btn-success addCustomPaymentTerm"><i class="fas fa-plus-circle"></i></a>
                </td>
            </tr>
        `;
        $('#customPaymentTermsTable tbody').append(row);
        checkTotalPercentage();
    });

    $(document).on('click', '.removeCustomPaymentTerm', function(event) {
        event.preventDefault();
        $(this).closest('tr').remove();
        checkTotalPercentage();
    });

    $(document).on('click', '.addDateRange', function(event) {
        event.preventDefault();
        var row = `
            <tr>
                <td><input type="date" name="from_date_range[]" class="form-control"></td>
                <td><input type="date" name="to_date_range[]" class="form-control"></td>
                <td>
                    <a href="javascript:void(0);" class="btn btn-danger removeDateRange"><i class="fas fa-trash"></i></a>
                    <a href="javascript:void(0);" class="btn btn-success addDateRange"><i class="fas fa-plus-circle"></i></a>
                </td>
            </tr>
        `;
        $('#dateRangesTable tbody').append(row);
    });

    $(document).on('click', '.removeDateRange', function(event) {
        event.preventDefault();
        $(this).closest('tr').remove();
    });

    window.checkTotalPercentage = function() {
        var totalPercentage = 0;
        $('input[name="custom_percentage[]"]').each(function() {
            totalPercentage += parseFloat($(this).val()) || 0;
        });
        if (totalPercentage > 100) {
            alert('Total percentage cannot exceed 100%.');
            $('.addCustomPaymentTerm').show();
        } else if (totalPercentage >= 100) {
            $('.addCustomPaymentTerm').hide();
        } else {
            $('.addCustomPaymentTerm').show();
        }
    }
});


    $(document).ready(function() {
        function updateDates() {
            var startDateStr = $('#half_yearly_start_date').val();
            var startDate = new Date(startDateStr);
            
            // Calculate end date (6 months from start date)
            var endDate = new Date(startDate);
            endDate.setMonth(startDate.getMonth() + 6);
            endDate.setDate(endDate.getDate() - 1); // Adjust to one day before for consistency
            var endDateStr = endDate.toISOString().substring(0, 10);
            $('#half_yearly_end_date').val(endDateStr);
            
            // Set the starting date for the second half
            var startDate1 = new Date(endDate);
            startDate1.setDate(startDate1.getDate() + 1);
            var startDate1Str = startDate1.toISOString().substring(0, 10);
            $('#half_yearly_start_date1').val(startDate1Str);

            // Set the starting month for the second half
            $('#half_yearly_start_month1').val(startDate1.getMonth() + 1);

            // Calculate the end date for the second half (6 months from start date1)
            var endDate1 = new Date(startDate1);
            endDate1.setMonth(startDate1.getMonth() + 6);
            endDate1.setDate(endDate1.getDate() - 1); // Adjust to one day before for consistency
            var endDate1Str = endDate1.toISOString().substring(0, 10);
            $('#half_yearly_end_date1').val(endDate1Str);
        }

        $('#half_yearly_start_date').change(function() {
            updateDates();
        });

        $('#half_yearly_start_month').change(function() {
            var startMonth = parseInt($(this).val());
            var startDate = new Date();
            startDate.setMonth(startMonth - 1); // Months are 0-based in JavaScript Date
            startDate.setDate(1); // Set to the first day of the month
            
            var startDateStr = startDate.toISOString().substring(0, 10);
            $('#half_yearly_start_date').val(startDateStr);

            updateDates();
        });
    });

    function updateMonthlyNumbers() {
    var startNumber = parseInt($('#monthly_start_number').val(), 10);

    // Calculate end number (1 month from start number)
    var endNumber = startNumber - 1;
    $('#monthly_end_number').val(endNumber);
}

$('#monthly_start_number').change(function() {
    updateMonthlyNumbers();
});

    $(document).ready(function() {
        // Function to update subsequent quarters based on the selected starting month
        function updateQuarters() {
            // Get the selected starting month
            var startMonth = parseInt($('#quarterly_start_month').val());
            
            // Calculate and set the start and end dates for the first quarter
            var firstQuarterStartDate = new Date();
            firstQuarterStartDate.setFullYear(new Date().getFullYear(), startMonth - 1, 1); // First day of the selected month
            var firstQuarterEndDate = new Date(firstQuarterStartDate.getFullYear(), firstQuarterStartDate.getMonth() + 3, 0); // Last day of the current quarter
            $('#quarterly_start_month_start_date').val(firstQuarterStartDate.toISOString().substring(0, 10));
            $('#quarterly_start_month_end_date').val(firstQuarterEndDate.toISOString().substring(0, 10));
            
            // Update subsequent quarters
            for (var i = 1; i <= 3; i++) {
                var nextMonth = (startMonth + (i * 3)) % 12 || 12; // Calculate next quarter's starting month
                
                // Set the starting month for the next quarter
                $('#quarterly_start_month' + i).val(nextMonth);
                
                // Calculate and set the start date for the next quarter
                var startDate = new Date();
                startDate.setFullYear(new Date().getFullYear(), nextMonth - 1, 1); // Months are 0-based in JavaScript Date
                var startDateStr = startDate.toISOString().substring(0, 10);
                $('#quarterly_start_month_start_date' + i).val(startDateStr);
                
                // Calculate and set the end date for the next quarter
                var endDate = new Date(startDate.getFullYear(), startDate.getMonth() + 3, 0); // Last day of the current quarter
                var endDateStr = endDate.toISOString().substring(0, 10);
                $('#quarterly_start_month_end_date' + i).val(endDateStr);
            }
        }

        // Event listener for changes in the selected month
        $('#quarterly_start_month').change(function() {
            updateQuarters();
        });

        // Initial call to update quarters when the page loads
        updateQuarters();
    });

   
    document.addEventListener('DOMContentLoaded', function() {
    var selectElements = document.querySelectorAll('.select-type, #form_select_type');

    function updateDocNo(selectElement) {
        var selectedValue = selectElement.value;
        var docNoInputId = selectElement.getAttribute('data-doc-id') || 'form_doc_no';
        // var docNoInputId = selectElement.getAttribute('form_doc_no');
        var docNoInput = document.getElementById(docNoInputId);

        if (selectedValue === 'PO') {
            docNoInput.value = 'PO: ' + docNoInput.value.replace(/^PO: |^SO: |^WO: /, '');
        } else if (selectedValue === 'SO') {
            docNoInput.value = 'SO: ' + docNoInput.value.replace(/^PO: |^SO: |^WO: /, '');
        } else if (selectedValue === 'WO') {
            docNoInput.value = 'WO: ' + docNoInput.value.replace(/^PO: |^SO: |^WO: /, '');
        }
    }

    selectElements.forEach(function(selectElement) {
        selectElement.addEventListener('change', function() {
            updateDocNo(this);
        });

        // Trigger change event on page load to set initial values correctly
        updateDocNo(selectElement);
    });
});
    
</script>