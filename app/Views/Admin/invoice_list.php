<?php echo view ("Admin/Adminsidebar.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white viewApplicationsBtn"> Invoice  List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewApplicationsBtn"> Invoice List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <button id="viewCreateInvoiceBtn" class="btn btn-info mt-2 ">+ Add Invoice</button>
            <!-- Create Employee Card -->
            <div id="viewInvoiceListCard" class="card mt-2" >
              <div class="card-header">
                <h3 class="card-title viewApplicationsBtn"> Invoice List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th>Sr.No</th>
                        <th>Action</th>
                        <th>Payment Status</th>
                        <th>Invoice Date</th>
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
                  <?php if(!empty($invoice_data)) {  $i=1;?>
                        <?php foreach ($invoice_data as $data): 
                          
                          $adminModel = new \App\Models\Adminmodel();
                          $wherecond1 = array('is_deleted' => 'N', 'id' => $data->po_no);
                          $po_data = $adminModel->get_single_data('tbl_po', $wherecond1);
                          ?>
                            <tr>
                            <td><?php echo $i; ?></td>
                                <td>
                                <a href="edit_invoice/<?=$data->id ; ?>"><i class="far fa-edit me-2"></i></a>
                                <a href="<?=base_url(); ?>delete_compan/<?php echo base64_encode($data->id); ?>/tbl_invoice" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>

                            
                                <a href="invoice/<?=$data->id ; ?>" target="_blank"><i class="far fa-eye me-2"> </i></a>

                                </td>
                                <td>
                                <select class="form-select" name="payment_status" onchange="updatestatus(this, <?= $data->id; ?>)">
                                  <option value="" selected>Select status</option>
                                  <option value="Received" <?php if ($data->payment_status == 'Received') { echo "selected"; } ?>>Received</option>
                                  <option value="Pending" <?php if ($data->payment_status == 'Pending') { echo "selected"; } ?>>Pending</option>
                                  <option value="Cancelled" <?php if ($data->payment_status == 'Cancelled') { echo "selected"; } ?>>Cancelled</option>
                                  <!-- Add more options as needed -->
                                </select>
                                </td>
                                <td><?php echo $data->invoice_date; ?></td>
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
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <!-- Create Invoice Form -->
            <div class="card card-primary mt-2" style="display: none;">
                        <div class="card-header">
                            <h3 class="card-title">Add Invoice <small></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url(); ?>set_invoice" method="post" id="client_form">
                       
                            <div class="row card-body">
                            <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">

                                <div class="col-lg-4 col-md-3 col-12 form-group">
                                    <label for="">Invoice Date : </label>
                                    <input type="date" name="invoice_date" class="form-control" id="invoice_date"  value="<?php if(!empty($single_data)){ echo $single_data->invoice_date;} ?>">
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
                                <label for="po_no">PO NO. : </label>
                                <select class="form-control choosen" id="po_no" name="po_no">
                                    <option value="">Please select PO.NO.</option>
                           
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

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="currancy_id">Currency Symbol :</label>
                                        <select class="form-control" name="currancy_id" id="currancy_id" required>
                                            <option value="">Select Currency Symbol</option>
                                            <?php if (!empty($currancy_data)) { ?>
                                            <?php foreach ($currancy_data as $data) { ?>
                                            <option value="<?= $data->id; ?>"
                                                <?= (!empty($single_data) && $single_data->currancy_id === $data->id) ? "selected" : "" ?>>
                                                <?= $data->symbol; ?>
                                            </option>
                                            <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="invoice-add-table col-lg-12 col-md-12 col-12">
                                    <h4>Item Details   <a href="javascript:void(0);" class="add-btn me-2 add_more_iteam"><i class="fas fa-plus-circle"></i></a></h4>
                                    <div>
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
                                                    <?php if(empty($iteam)){
                                                    // echo "<pre>";print_r($iteam);exit();    
                                                
                                                    ?>    
                                                    <tbody >
                                                        <tr class="add-row">
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
                                                        foreach($iteam as $data){
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
        url: "<?=base_url(); ?>update_payment_status", // URL to your server-side script
        data: {
            id: id,
            selectedValue: selectedValue
        },
        success: function(response) {
            // Handle success response
            console.log("Invoice updated successfully");
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error("Error updating status:", error);
        }
    });
}

$(document).ready(function() {
    $('#viewCreateInvoiceBtn').on('click', function() {
        var $viewInvoiceListCard = $('#viewInvoiceListCard');
        var $leaveForm = $('.card').not('#viewInvoiceListCard');
        var $button = $('#viewCreateInvoiceBtn');
        var $button1 = $('.viewApplicationsBtn');


        if ($viewInvoiceListCard.is(':hidden')) {
            $viewInvoiceListCard.show();
            $leaveForm.hide();
            $button.text('+ Add Invoice'); // Change text when showing Invoice List
            $button1.text('Invoice List'); // Change text when showing applications

        } else {
            $viewInvoiceListCard.hide();
            $leaveForm.show();
            $button.text('Invoice List'); // Change text when showing Create Invoice form
            $button1.text('Add Invoice'); // Change text when showing applications

        }
    });
});
</script>


<script src="https://cdn.jsdelivr.net/npm/number-to-words@1.2.4/numberToWords.min.js"></script>



<script>
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
    $(document).on("change", "input[name='tax[]'], input[name='cgst[]'], input[name='sgst[]'], input[name='iteam[]'], input[name='quantity[]'], input[name='price[]'], input[name='amount_p[]'], input[name='tax[]'], input[name='discount[]']", function () {
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



    $('.add_more_iteam').click(function(e) {
        $('.tax_column, .tax_column1, .tax_column2').hide();
    e.preventDefault();
    var max_fields = 5000;
    var x = 1;

    		var isBillWithoutTaxChecked = $("input[name='bill'][value='Bill Without Tax']").is(":checked");
    if (x < max_fields) {
        x++;
        $('.dynamic_iteam').append('<tr class="now add-row "><td><select class="form-control" name="iteam[]" id="iteam_'+ x +'" required><option value="">Select Services</option><?php if (!empty($services_data)) { ?><?php foreach ($services_data as $data) { ?><option value="<?= $data->id; ?>"><?= $data->ServicesName; ?></option><?php } ?><?php } ?></select></td><td><input type="text" name="description[]" id="description" class="dynamic-items form-control"></td><td><input type="text" name="quantity[]" class="dynamic-quantity form-control"></td><td><input type="text" name="price[]" class="dynamic-price form-control"></td><td><input type="text" name="total_amount[]"  class="dynamic-total_amount form-control" readonly ></td><td class="add-remove text-end"> <a href="javascript:void(0);" class="remove-btn btn_remove"><i class="fas fa-trash"></i></a></td></tr>');
        
     


        $('.btn_remove').on('click', function() {
            $(this).closest('.now').remove();

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
    $(this).closest('.now').remove();

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
    // Define the change event handler for #client_id
    $("#client_id").change(function() {
        $.ajax({
            type: "post",
            url: "<?=base_url();?>get_po_details",
            data: {
                'client_id': $("#client_id").val()
            },
            success: function(data) {
                console.log(data);
                $('#po_no').empty();
                $('#po_no').append('<option value="">Choose ...</option>');
                var opts = $.parseJSON(data);
                $.each(opts, function(i, d) {
                    $('#po_no').append('<option value="' + d.id + '">' + d.doc_no + '</option>');
                });
                $('#po_no').trigger("chosen:updated");

                // If there is an existing selected PO number, set it
                <?php if(!empty($single_data)) { ?>
                    $('#po_no').val("<?= $single_data->po_no; ?>");
                <?php } ?>
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });

    // Check if #client_id has a value and trigger the change event if it does
    if ($("#client_id").val()) {
        $("#client_id").trigger('change');
    } else {
        // If client_id is not set, set the PO number directly from the server-rendered options
        <?php if(!empty($single_data)) { ?>
            $('#po_no').val("<?= $single_data->po_no; ?>");
        <?php } ?>
    }
});


</script>
