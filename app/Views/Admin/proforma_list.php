<?php echo view ("Admin/Adminsidebar.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white"> Proforma List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white"> Proforma List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
          <button id="viewCreateProformaBtn" class="btn btn-info mt-2 ">Create Proforma</button>
            <!-- Create Employee Card -->
            <div id="viewProformaListCard" class="card mt-2" >
              <div class="card-header">
                <h3 class="card-title"> Proforma List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th>Sr.No</th>
                        <th>Action</th>
                        <th>Proforma Date</th>
                        <th>Client Name</th>
                        <th>Po No.</th>
                        <th>Vendor Code</th>
                        <th>Due Date</th>
                        <th>Total Amount</th>
                        <th>CGST</th>
                        <th>SGST</th>
                        <th>Final Total</th>  
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(!empty($proforma_data)) {  $i=1;?>
                        <?php foreach ($proforma_data as $data): 
                          $adminModel = new \App\Models\Adminmodel();
                          $wherecond1 = array('is_deleted' => 'N', 'id' => $data->po_no);
                          $po_data = $adminModel->get_single_data('tbl_po', $wherecond1);
                          ?>
                            <tr>
                            <td><?php echo $i; ?></td>
                                <td>
                                <a href="edit_proforma/<?=$data->id ; ?>"><i class="far fa-edit me-2"></i></a>
                                <a href="<?=base_url(); ?>delete_compan/<?php echo base64_encode($data->id); ?>/tbl_proforma" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                                <a href="proforma/<?=$data->id ; ?>"><i class="far fa-eye me-2"></i></a>
                                </td>
                                <td><?php echo $data->proforma_date; ?></td>
                                <td><?php echo $data->client_name; ?></td>
                                <td><?php if(!empty($po_data)){ echo $po_data->doc_no;}?></td>
                                <td><?php echo $data->suppplier_code; ?></td>
                                <td><?php echo $data->due_date; ?></td>
                                <td><?php echo $data->totalamounttotal; ?></td>
                                <td><?php echo $data->cgst; ?></td>
                                <td><?php echo $data->sgst; ?></td>
                                <td><?php echo $data->final_total; ?></td>
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
                    <th>Proforma Date</th>
                    <th>Client Name</th>
                    <th>Po No.</th>
                    <th>Vendor Code</th>
                    <th>Due Date</th>
                    <th>Total Amount</th>
                    <th>CGST</th>
                    <th>SGST</th>
                    <th>Final Total</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Create Proforma Form -->
            <div class="card card-primary mt-2" style="display: none;">
                        <div class="card-header">
                            <h3 class="card-title">Add Proforma <small></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url(); ?>set_proforma" method="post" id="client_form">
                       
                            <div class="row card-body">
                            <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">

                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="">Proforma Date : </label>
                                    <input type="date" name="proforma_date" class="form-control" id="proforma_date"  value="<?php if(!empty($single_data)){ echo $single_data->proforma_date;} ?>">
                                </div>

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
                                
                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="po_no">Po No. : </label>
                                    <!-- <input type="text" name="po_no" class="form-control" id="po_no" placeholder="Enter po no" value="<?php if(!empty($single_data)){ echo $single_data->po_no;} ?>"> -->
                                    <select class="form-control choosen" id="po_no" name="po_no">
                                        <option value="">Please select PO.NO.</option>
                                        <?php if(!empty($po_data)) {
                                            foreach($po_data as $data) { ?>
                                                <option value="<?=$data->id?>" 
                                                    <?php if(!empty($single_data) && $single_data->po_no == $data->id) { ?>selected="selected"<?php } ?>>
                                                    <?=$data->doc_no?>
                                                </option>
                                            <?php } 
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="suppplier_code">Vendor Code :</label>
                                    <input type="text" name="suppplier_code" class="form-control" id="suppplier_code" placeholder="Enter Suppplier Code" value="<?php if(!empty($single_data)){ echo $single_data->suppplier_code;} ?>">
                                    <span id="suppplier_codeError" style="color: crimson;"></span>

                                </div>
                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="">Due Date : </label>
                                    <input type="date" name="due_date" class="form-control" id="due_date" value="<?php if(!empty($single_data)){ echo $single_data->due_date;} ?>">
                                </div>

                                <div class="proforma-add-table">
                                            <h4>Services Details   <a href="javascript:void(0);" class="add-btn me-2 add_more_iteam"><i class="fas fa-plus-circle"></i></a></h4>
                                            <div >
                                                <table class="table table-center add-table-items">
                                                    <thead>
                                                        <tr>
                                                            <th>Services</th>
                                                            <th>Description</th>

                                                            <th>Quantity</th>
                                                            <th>Unit Price</th>
                                                            <th>Amount</th>
                                                          
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <?php if(empty($proformaiteam)){
                                                    // echo "<pre>";print_r($iteam);exit();    
                                                    ?>    
                                                    <tbody >
                                                        <tr class="add-row">
                                                            <!-- <td>
                                                                <input type="text" name="iteam[]" id="iteam_0" class="dynamic-items form-control">
                                                            </td> -->
                                                            <td>
                                                                <select class="form-control" name="iteam[]" id="iteam_0" required>
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
                                                            <td>
                                                                <input type="text" name="total_amount[]"  class="dynamic-total_amount form-control" readonly >
                                                            </td>
                                                            <td class="add-remove text-end">
                                                                <!-- <a href="javascript:void(0);" class="add-btn me-2 add_more_iteam "><i class="fas fa-plus-circle"></i></a>  -->
                                                            <a href="javascript:void(0);" class="remove-btn"><i class="fas fa-trash"></i></a>
                                                            </td>
                                                        </tr>  
                                                     
                                                    </tbody>
                                                    <?php }else{
                                                        foreach($proformaiteam as $data){
                                                        ?>

                                                        <tr class="now add-row">
                                                         
                                                          <td>
                                                                <select class="form-control" name="iteam[]" id="iteam_0" required>
                                                                    <option value="">Select Services</option>
                                                                    <?php if (!empty($services_data)) { ?>
                                                                    <?php foreach ($services_data as $sdata) { ?>
                                                                    <option value="<?= $data->id; ?>"
                                                                        <?= ($data->iteam === $sdata->id) ? "selected" : "" ?>>
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
                                                            <td>
                                                                <input type="text" name="total_amount[]"  value="<?=$data->total_amount;?>"  class="dynamic-total_amount form-control" readonly >
                                                            </td>
                                                          
                                                            <td class="add-remove text-end">
                                                                <!-- <a href="javascript:void(0);" class="add-btn me-2 add_more_iteam"><i class="fas fa-plus-circle"></i></a>  -->
                                                               <a href="javascript:void(0);" class="remove-btn btn_remove"><i class="fas fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php }} ?>
                                                    <tbody class="dynamic_iteam"></tbody>
                                                    <tbody>
                                                    </tbody>
                                                </table>   
                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-7 plopd">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                            <p><b>Total Amount In Words : </b><p>    
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input type="text" name="totalamount_in_words" id="totalamount_in_words" value="<?php if(!empty($single_data)){ echo $single_data->totalamount_in_words;} ?>">  
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-5 plfortotatal">
                                                        <table>
                                                        <tr>
                                                                <td><b>Subtotal : </b></td>
                                                                <td class="pfortd"> 
                                                                    <input type="text" name="totalamounttotal" id="totalamounttotal" class="form-control rallstyles" readonly   value="<?php if(!empty($single_data)){ echo $single_data->totalamounttotal;} ?>">
                                                                </td>   
                                                            </tr>
                                                            <tr>
                                                                <td><b>CGST (%) : </b></td>
                                                                <td class="pfortd"> 
                                                                    <input type="text" name="cgst" id="cgst" class="form-control rallstyle"  value="<?php if(!empty($single_data)){ echo $single_data->cgst;} ?>">
                                                               
                                                                </td>   
                                                            </tr>
                                                            <tr>
                                                                <td><b>SGST (%) : </b></td>
                                                                <td class="pfortd"> 
                                                                    <input type="text" name="sgst" id="sgst" class="form-control rallstyle"  value="<?php if(!empty($single_data)){ echo $single_data->sgst;} ?>">
                                                                  
                                                                </td>   
                                                            </tr>
                                                            <tr>
                                                                <td><b>Total : </b></td>
                                                                <td class="pfortd"> 
                                                                    <input type="text" name="final_total" id="final_total" class="form-control rallstyles" readonly value="<?php if(!empty($single_data)){ echo $single_data->final_total;} ?>">
                                                                   

                                                                </td>   
                                                            </tr>
                                                        </table>
                                                        
                                                    </div>

                                                </div>
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
            console.log("Proforma updated successfully");
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error("Error updating status:", error);
        }
    });
}

$(document).ready(function() {
    $('#viewCreateProformaBtn').on('click', function() {
        var $viewProformaListCard = $('#viewProformaListCard');
        var $leaveForm = $('.card').not('#viewProformaListCard');
        var $button = $('#viewCreateProformaBtn');

        if ($viewProformaListCard.is(':hidden')) {
            $viewProformaListCard.show();
            $leaveForm.hide();
            $button.text('Create Proforma'); // Change text when showing Proforma List
        } else {
            $viewProformaListCard.hide();
            $leaveForm.show();
            $button.text('View Proforma List'); // Change text when showing Create Proforma form
        }
    });
});
</script>