<?php echo view ("Admin/Adminsidebar.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white"> PO List </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white"> PO List </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <button id="viewCreatePOBtn" class="btn btn-info mt-2 ">Add PO</button>
            <!-- Create Employee Card -->
            <div id="viewPOListCard" class="card mt-2" > 
              <div class="card-header">
                <h3 class="card-title"> PO List </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th>Sr.No</th>
                        <th>Action</th>
                        <th>Client Name </th>
                        <th>Select Type</th>
                        <th>DOC NO.</th>
                        <th>DOC Date</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Type Of Payment Terms</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(!empty($po_data)) {  $i=1;?>
                        <?php foreach ($po_data as $data): ?>
                            <tr>
                            <td><?php echo $i; ?></td>

                                <td>
                                
                                <a href="edit_po/<?=$data->id ; ?>"><i class="far fa-edit me-2"></i></a>
                                <a href="<?=base_url(); ?>delete_compan/<?php echo base64_encode($data->id); ?>/tbl_po" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                            
                                <?php if($data->po_file != ''){ ?>
                                  <a href="<?=base_url(); ?>public/uploades/PDF/<?=$data->po_file ; ?>"><i class="far fa-eye me-2"></i></a>
                                  <?php } ?>
                                </td>
                                <td><?php echo $data->client_name; ?></td>
                                <td><?php echo $data->select_type; ?></td>
                                <td><?php echo $data->doc_no; ?></td>
                                <td><?php echo $data->doc_date; ?></td>
                                <td><?php echo $data->start_date; ?></td>
                                <td><?php echo $data->end_date; ?></td>
                                <td><?php echo $data->paymentTerms; ?></td>
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
                        <th>Client Name </th>
                        <th>Select Type</th>
                        <th>DOC NO.</th>
                        <th>DOC Date</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Type Of Payment Terms</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>


            <!--  Add PO Form -->
            <div class="card card-primary mt-2" style="display: none;">
                        <div class="card-header">
                            <h3 class="card-title">Add PO <small></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url(); ?>set_po" edata" nctype="multipart/form-method="post" id="po_form">
                       
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
                                                            <th>Quantity</th>
                                                            <th>Unit Price</th>
                                                            <th>Period</th>
                                                            <!-- <th>Amount</th> -->
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <?php if(empty($services)){
                                                    // echo "<pre>";print_r($services);exit();    
                                                    ?>    
                                                    <tbody >
                                                        <tr class="add-row">
                                                            <td>
                                                                <input type="text" name="services[]" id="services_0" class="dynamic-items form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="quantity[]" class="dynamic-quantity form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="price[]" class="dynamic-price form-control">
                                                            </td>
                                                            <td>
                                                            <input type="text" name="period[]" class="dynamic-price form-control">
                                                            </td>
                                                            <td class="add-remove text-end">
                                                                <!-- <a href="javascript:void(0);" class="add-btn me-2 add_more_services "><i class="fas fa-plus-circle"></i></a>  -->
                                                            <a href="javascript:void(0);" class="remove-btn btn_remove"><i class="fas fa-trash"></i></a>
                                                            </td>
                                                        </tr>  
                                                     
                                                    </tbody>
                                                    <?php }else{
                                                        foreach($services as $data){
                                                        ?>
                                                        <tr class="now add-row">
                                                            <td>
                                                                <input type="text" name="services[]" value="<?=$data->services;?>" class="dynamic-items form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="quantity[]" value="<?=$data->quantity;?>" class="dynamic-quantity form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="price[]" value="<?=$data->price;?>" class="dynamic-price form-control">
                                                            </td>
                                                            <td>
                                                            <input type="text" name="period[]" value="<?=$data->period;?>" class="dynamic-period form-control">
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
                                                        <label for="paymentTerms">Select Type Of Payment Terms :</label>
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
                                                    <table class="table table-bordered" id="dateRangesTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Start Date</th>
                                                                <th>End Date</th>
                                                              
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input type="date" name="yearly_start_date" class="form-control" value="<?php if(!empty($single_data)){ echo $single_data->yearly_start_date;} ?>"></td>
                                                                <td><input type="date" name="yearly_end_date" class="form-control" value="<?php if(!empty($single_data)){ echo $single_data->yearly_end_date;} ?>"></td>
                                                                
                                                            </tr>
                                                        </tbody>
                                                    </table>
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

        if ($viewPOListCard.is(':hidden')) {
            $viewPOListCard.show();
            $leaveForm.hide();
            $button.text('Create PO'); // Change text when showing Meeting List
        } else {
            $viewPOListCard.hide();
            $leaveForm.show();
            $button.text('View PO List'); // Change text when showing Create Meeting form
        }
    });
});
</script>