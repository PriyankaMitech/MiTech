<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Invoice</title>
    <link rel="stylesheet" href="styles.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
@page {
    size: A4;
    margin: 20mm;
}

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f9f9f9;
}

.invoice {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
}

.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px; /* Adjust as necessary */
}

.logo {
    height: 50px; /* Adjust the height as necessary */
    margin-right: 20px; /* Adjust the space between the logo and the title as necessary */
}

.invoice-title {
    flex-grow: 1;
    text-align: center;    
    margin: 0; /* Remove default margin */
}

.top-right-text {
    margin: 0;
    text-align: right; /* Ensure the text is aligned to the right */
}

h1 {
    text-align: center;
}

.header-section, .footer-section {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.address-section {
    border: 1px solid #000;
    padding: 10px;
    margin-bottom: 20px;
}

.left, .right {
    width: 22%;
}

.buyer-section {
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 5px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

.text-right {
    text-align: right;
}

.tax th, .tax td {
    text-align: center;
}

.computer-generated {
    text-align: center;
    margin-top: 6px;    
}

.no-border td {
    border-top: none !important;
    border-bottom: none !important;
}

.no_border td {
    border-bottom: none !important;
}

.footer {
    position: fixed;
    bottom: 20mm; /* Adjust according to your page margin */
    width: 100%;
    text-align: center;
    display: none;
}

.continue {
    display: none;
    text-align: center;
    padding-top: 10px;
}
.mitechdetails{
    
    margin: 10px 0 10px;
}

@media print {
    .invoice {
        width: 100%;
        max-width: 100%;
        page-break-after: always;
    }
    
    .continue {
        display: block;
    }

    .footer {
        display: block;
    }

    .page-break {
        page-break-before: always;
    }
}




    </style>
</head>
<body>

<?php 
 $adminModel = new \App\Models\Adminmodel();
 $wherecond1 = [];
 $wherecond =[];

 if(!empty($invoice_data)){ 
 $wherecond = array('is_deleted' => 'N', 'id' => $invoice_data->po_no);

 $wherecond1 = array('is_deleted' => 'N', 'invoice_id' => $invoice_data->invoiceid);


 }
 $po_data = $adminModel->get_single_data('tbl_po', $wherecond);

//  echo "<pre>";print_r($po_data);exit();

$item_data = $adminModel->getalldata('tbl_iteam', $wherecond1);




?>
    <div class="invoice">
        <div class="header">
        <img src="<?=base_url();?>public/Images/logo.png" alt="Logo" class="logo"> 
            <h1 class="invoice-title">Tax Invoice</h1>
            <p class="top-right-text">(ORIGINAL FOR RECIPIENT)</p>
        </div>
        <table class="address-section " style="margin-bottom: 0px !important;">
        <tr>
                <td class="col-md-6"  style="padding-right: 15px !important;
                        padding-left: 15px !important; padding: 8px  !important;
                    ">
                        <p> <b>MI Tech Solutions</b><br>
                           97/25 , PCNT,<br>
                              Nigdi, Pune 411-044
                              <br>Phone No.: 7057778221 <br>
                              Email ID : deokar.rahul@gmail.com 

                        <p>
                </td>
                <td class="col-md-6" style="padding-right: 0px !important;
                        padding-left: 0px !important; padding:0px !important;
                    ">
                    <table style="margin-bottom: 0px !important;">
                        <tr class="row">
                            <td class="col-md-6"  style="padding: 11px !important">Invoice No.
                                <br>
                                <?php if(!empty($invoice_data)){ echo $invoice_data->id; } ?>
                            </td>
                            <td class="col-md-6"  style="padding: 11px !important">
                                Dated<br>
                                <?php if(!empty($invoice_data)){ echo $invoice_data->invoice_date; } ?>
                            </td>
                            
                      
                        <tr class="row">
                            <td class="col-md-6"  style="padding: 11px !important" >Vendor Code.<br>
                            <?php if(!empty($invoice_data)){ echo $invoice_data->suppplier_code; } ?>

                          
                            </td>
                            <!-- <td class="col-md-6"    style="padding: 11px !important" > GST NO.
                           <br>
                           
                           <?php if(!empty($invoice_data)){ echo $invoice_data->gst_no; } ?>

                            </td> -->
                            
                        </tr>
                      
                    </table>
                </td>
            </tr>
            <tr>
                <td class="col-md-6"  style="padding-right: 15px !important;
                        padding-left: 15px !important;   vertical-align: top;
                    ">
                        <p> <p>To <br>
                            <!-- <b></b><br> -->
                             
                            <?php if(!empty($invoice_data)){ echo $invoice_data->company_name; } ?><br>
                            GST No.<b><?php if(!empty($invoice_data)){ echo $invoice_data->gst_no; } ?></b><br>
                            <?php if(!empty($invoice_data)){ echo $invoice_data->address; } ?><br>
                           
                            <!-- State Name : Maharashtra, Code : 27<br> -->
                            Kind Attention : <?php if(!empty($invoice_data)){ echo $invoice_data->client_name; } ?>
                        </p>
                        <p>
                </td>
                <td class="col-md-6" style="padding-right: 0px !important;
                        padding-left: 0px !important; padding:0px !important;
                    ">
                    <table style="margin-bottom: 0px !important;">
                        <tr class="row">
                            <td class="col-md-12" style="padding: 11px !important"><?php if(!empty($po_data)){ echo  $po_data->select_type; } ?>. NO.<br>
                            <?php if(!empty($po_data)){ echo  $po_data->doc_no; } ?>
                            </td>
                            </tr>
                            <tr class="row">
                            <td class="col-md-12 "  style="padding: 11px !important" >
                            <?php if(!empty($po_data)){ echo  $po_data->select_type; } ?>. Date<br>
                            <?php if(!empty($po_data)){ echo  $po_data->doc_date; } ?>
                            </td>
                        </tr>
                       
                        <!-- <tr class="row">
                            <td class="col-md-12" colspan="2" style="    height: 106px;   vertical-align: top;"><p>Terms of Delivery
                                <br><p>
                            </td>
                        </tr> -->
                    </table>
                </td>
            </tr>

        </table>

        <table  style="margin-bottom: 0px !important;">
            <thead>
                <tr>
                    <th  class="text-center">Sr. No</th>
                    <th  class="text-center">Description</th>
                    <th  class="text-center">HSN/ SAC</th>
                   
                       
                    <th  class="text-center">GST Rate</th>
                  
                    <th  class="text-center">Quantity</th>
                    <th  class="text-center">Rate</th>
                 
                    <th  class="text-center">Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($item_data)){ $i=1;
                    // echo "<pre>";print_r($item_data);exit();
                    
                    ?>
                    <?php foreach($item_data as $data){ ?>
                    <tr class="no-border">
                        <td><?=$i;?></td>
                        <td><b><?=$data->iteam; ?></b></td>
                        <td>85238020</td>
                        <td> 
                            <?php 
                              if($invoice_data->tax_id == 1){
                                if (!empty($invoice_data) && isset($invoice_data->cgst) && isset($invoice_data->sgst)) { 
                                  
                                      
                                    $gst = $invoice_data->cgst + $invoice_data->sgst; 
                                    echo $gst . '%'; 
                                       
                                }else {
                                    echo 'N/A'; // Or some default value
                                }

                            }else if($invoice_data->tax_id == 2){
                                if(isset($invoice_data->igst)){
                                    $gst = $invoice_data->igst; 
                                    echo $gst . '%'; 
                                    }else {
                                            echo 'N/A'; // Or some default value
                                        }

                            }else{
                                echo "0 %";
                            }
                            ?>
                        </td>
                        <td style="text-align: center;"><b><?=$data->quantity; ?></b></td>
                        <td style="text-align: right;"><?=$data->price; ?></td><td style="text-align: right;"><b><?=$data->total_amount; ?></b></td>               
                    </tr>
                 <?php $i++;} ?>
                 <?php } ?>
             
                <tr class="no-border" style="vertical-align: baseline; height: 140px;">
                    <td></td>
                    <td  class="text-right"><b></b></td>
                    <td></td>
                   
                    <td></td>
                   
                    <td></td>
                    <td></td>
                    <td><b></b></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  
                    <td colspan=2 class="text-right"><strong>Sub Total</strong></td>

                    <td class="text-right"><b><?php if(!empty($invoice_data)){ echo  $invoice_data->currency_symbol; } ?>  <?php if(!empty($invoice_data)){ echo  $invoice_data->totalamounttotal; } ?></b></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                    <?php if($invoice_data){
                       
                        // echo "<pre>";print_r($invoice_data);exit();
                        ?>
                   
                    <td  colspan=2 class="text-right"><strong>GST</strong></td>

                    <td class="text-right">
                        <b><?php if(!empty($invoice_data)){ echo  $invoice_data->currency_symbol; } ?>   <?php 

                                if($invoice_data->tax_id == 1 ){
                                    if (!empty($invoice_data) && isset($invoice_data->cgst) && isset($invoice_data->sgst)) { 
                                        $gst = $invoice_data->cgst + $invoice_data->sgst;

                                        $total_amount = '';
                                        
                                        if(!empty($invoice_data)){ $total_amount =  $invoice_data->totalamounttotal; }
                                    

                                        echo $gst_rate = $total_amount * ($gst / 100);

                                    
                                    }else {
                                        echo 'N/A'; // Or some default value
                                    }

                        }else if($invoice_data->tax_id == 2){

                            if(isset($invoice_data->igst)){

                                $gst = $invoice_data->igst ;

                                $total_amount = '';
                                
                                if(!empty($invoice_data)){ $total_amount =  $invoice_data->totalamounttotal; }
                               

                                echo $gst_rate = $total_amount * ($gst / 100);
                            
                            }else {
                                echo 'N/A'; // Or some default value
                            }

                        }else{
                            echo "0";
                        }
                        ?>
                        </b>
                    </td>
                    <?php } ?>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan=2 class="text-right"><strong>Total</strong></td>

                  <td style="text-align: right;"><b><?php if(!empty($invoice_data)){ echo  $invoice_data->currency_symbol; } ?><?php if(!empty($invoice_data)){ echo  $invoice_data->final_total; } ?></b></td>
                </tr>
                <tr>
                <td colspan=8>
                    <p>Amount (in words): <span style="float: right;">E.& O.E</span> <br>
                        <strong>
                            <?php 
                            if (!empty($invoice_data)) { 
                                $amount_in_words = ucfirst($invoice_data->totalamount_in_words);
                                echo $amount_in_words . ' Only'; 
                            } 
                            ?>
                        </strong>
                    </p>
                </td>

                </tr>
            </tbody>
        </table>


        <table style="margin-bottom: 0px !important;">
        <?php if($invoice_data){
                        if($invoice_data->tax_id == 1 || $invoice_data->tax_id == 2){
                        // echo "<pre>";print_r($invoice_data);exit();
                        ?>    
        <thead>
            <tr>
                <th rowspan="2" style="   width: 284px;"  class="text-center">HSN/ SAC</th>
                <th rowspan="2">Taxable Value</th>
                <th colspan="2"  class="text-center">Central Tax</th>
                <th colspan="2"  class="text-center">State Tax</th>
                <th rowspan="2">Total Tax Amount</th>
            </tr>
            <tr>
                <th>Rate</th>
                <th>Amount</th>
                <th>Rate</th>
                <th>Amount</th>
            </tr>
        </thead>
        <?php }} ?>
        <tbody>
        <?php if($invoice_data){
                        if($invoice_data->tax_id == 1 || $invoice_data->tax_id == 2){
                        // echo "<pre>";print_r($invoice_data);exit();
                        ?>    
        <?php if(!empty($item_data)){ 
            $gst_rate1 = 0;
            $gst_rate2 = 0;
            
         
            ?>
           <?php 
                $total_gst = 0; // Initialize total GST variable
                $total_sgst =0;
                $total_cgst = 0;
                $total_igst = 0;
                $total_igst1 = 0;

                $total_total_amount = 0.0;

                foreach($item_data as $data) { 
                ?>  
                   
                    <tr>
                        <td>85238020</td>
                        <td class="text-right">
            <?=$data->total_amount;?>
            <?php 
                // Ensure total_amount is numeric before accumulating
                if (is_numeric($data->total_amount)) {
                    $total_total_amount += (float)$data->total_amount;
                } else {
                    echo "Invalid amount"; // Handle the case where total_amount is not numeric
                }
            ?>
        </td>
                        <td class="text-right"><?php if(!empty($invoice_data)) {
                             if($invoice_data->tax_id == 1){
                            echo $invoice_data->cgst; 
                            } else if($invoice_data->tax_id == 2){
                                echo $invoice_data->igst / 2;  
                             }
                             } ?>%</td>
                        <td class="text-right">
                            <?php 
                              if($invoice_data->tax_id == 1){
                            if (!empty($invoice_data) && isset($invoice_data->cgst)) { 

                                $cgst = $invoice_data->cgst;
                                $cgst_amount = $data->total_amount * ($cgst / 100);
                                $total_cgst += $cgst_amount; // Accumulate the total GST

                                echo number_format($cgst_amount, 2); 
                            } else {
                                echo 'N/A';
                            }
                        }else if($invoice_data->tax_id == 2){
                           if(isset($invoice_data->igst)) {
                            // echo "hiii";exit();
                                $igst = $invoice_data->igst / 2;
                                $igst_amount = $data->total_amount * ($igst / 100);
                                 $total_igst += $igst_amount; // Accumulate the total GST

                                echo number_format($igst_amount, 2); 
                            }else{
                                echo 'N/A';
                            }

                        }
                            ?>
                        </td>
                        
                        <td class="text-right"><?php if(!empty($invoice_data)) {
                             if($invoice_data->tax_id == 1){
                            echo $invoice_data->sgst; 
                            } else if($invoice_data->tax_id == 2){
                                echo $invoice_data->igst / 2;  
                             }
                             }?>%</td>
                        <td class="text-right">
                            <?php 
                                                          if($invoice_data->tax_id == 1){

                            if (!empty($invoice_data) && isset($invoice_data->sgst)) { 
                                $sgst = $invoice_data->sgst;
                                $sgst_amount = $data->total_amount * ($sgst / 100);
                                $total_sgst += $sgst_amount; // Accumulate the total GST

                                echo number_format($sgst_amount, 2);
                            
                            }else{
                                echo 'N/A';
                            }
                        }else if($invoice_data->tax_id == 2){

                            if(isset($invoice_data->igst)) {
                                $igst1 = $invoice_data->igst / 2;
                                $igst_amount1 = $data->total_amount * ($igst1 / 100);
                                $total_igst1 += $igst_amount1; // Accumulate the total GST

                                echo number_format($igst_amount1, 2);
                            }else{
                                echo 'N/A';
                            }

                        }
                            ?>
                        </td>
                        <td class="text-right">
                            <?php 
                                                        if($invoice_data->tax_id == 1){

                            if (isset($cgst_amount) && isset($sgst_amount)) {
                                $total_gst_item = $cgst_amount + $sgst_amount;
                                echo number_format($total_gst_item, 2);
                                $total_gst += $total_gst_item; // Accumulate the total GST
                            }else{
                                echo 'N/A';
                            }
                        }else if($invoice_data->tax_id == 2){

                            if (isset($igst_amount) && isset($igst_amount1)) {
                                $total_gst_item = $igst_amount + $igst_amount1;
                                echo number_format($total_gst_item, 2);
                                $total_gst += $total_gst_item; // Accumulate the total GST
                            }else{
                                echo 'N/A';
                            }

                        }
                            ?>
                        </td>
                    </tr>
                <?php 
                    $i++;
                } 
                ?>
       
        
            <tr>
                <td ><strong style="float:right">Total</strong></td>
                <td class="text-right"><strong><?=$total_total_amount?></strong></td>
                <td></td>
                <td class="text-right"><strong><?=$total_cgst?></strong></td>
                <td></td>
                <td class="text-right"><strong><?=$total_sgst?></strong></td>
                <td class="text-right"><strong><?php 

if($invoice_data->tax_id == 1){

                                            
                    if (!empty($invoice_data) && isset($invoice_data->cgst) && isset($invoice_data->sgst)) { 
                        $gst = $invoice_data->cgst + $invoice_data->sgst;

                        $total_amount = '';
                        
                        if(!empty($invoice_data)){ $total_amount =  $invoice_data->totalamounttotal; }
                    

                        echo $gst_rate = $total_amount * ($gst / 100);

                    } else {
                        echo 'N/A'; // Or some default value
                    }
                }else if($invoice_data->tax_id == 2){
                    if (!empty($invoice_data) && isset($invoice_data->igst)) { 
                        $gst = $invoice_data->igst;

                        $total_amount = '';
                        
                        if(!empty($invoice_data)){ $total_amount =  $invoice_data->totalamounttotal; }
                    

                        echo $gst_rate = $total_amount * ($gst / 100);

                    } else {
                        echo 'N/A'; // Or some default value
                    }
                }
                    ?></strong></td>
            </tr>
            <?php } ?>
            <?php }} ?>
            <tr>
                <td colspan=7 >
                <!-- <p style="padding-bottom:10%"></p> -->

                <p class="mitechdetails">GST No.: <b>27571103949C</b></p>
                <p class="mitechdetails">PAN No. : <b>AMGPP0554J</b></p>
                <b>Online Payment Details</b> <br>
                <b>Bank & Branch Name:</b>  Kotak Mahindra Bank Ltd.<br>
                <b>Acc. Name: </b> MI Tech Solutions<br>
                <b>Account No.: </b> 1012075826<br>
                <b>IFSC Code: </b> KKBK0001757<br>
                </p>
                </td>
            </tr>
            <tr>
            <td colspan="7" style="height:100px; vertical-align: top;">
                <div style="text-align: right;">
                    <strong style="padding-right: 7%;">MI Tech Solutions</strong><br>
                    <img src="<?=base_url();?>public/Images/sign.png" alt="Signature" style="width: 31%;"><br>
                    <p><span  style="padding-right: 10%; !important">Rahul Deokar</span><br>
                   <span style="padding-right: 7%; !important">Authorised Signatory</span></p>
                </div>
            </td>
        </tr>
        </tbody>
    </table>


      

        <p class="computer-generated">This is a Computer Generated Invoice</p>
    </div>
</body>
</html>