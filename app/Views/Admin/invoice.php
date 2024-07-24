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

 $wherecond1 = [
    'tbl_iteam.is_deleted' => 'N',
    'tbl_iteam.invoice_id' =>$invoice_data->invoiceid
];

 }
 $po_data = $adminModel->get_single_data('tbl_po', $wherecond);


 

   $item_data = $adminModel->getalldata('tbl_iteam', $wherecond1);



// echo'<pre>';print_r($item_data);die;





?>
    <div class="invoice">
        <div class="header">
        <img src="<?=base_url();?>public/Images/logo.png" alt="Logo" class="logo"> 
            <h1 class="invoice-title">Tax Invoice</h1>
            <p class="top-right-text">(ORIGINAL FOR RECIPIENT)</p>
        </div>
        <table class="address-section " style="margin-bottom: 0px !important;">
        <tr class="row">
            
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
                        <tr >
                            <td   style="padding: 11px !important">Invoice No.
                                <br>
                                <?php if(!empty($invoice_data)){ echo $invoice_data->id; } ?>
                            </td>
                            <td  style="padding: 11px !important">
                                Dated<br>
                                <?php if(!empty($invoice_data)){ echo $invoice_data->invoice_date; } ?>
                            </td>
                        </tr>

                        <tr>
                            <td colspan=2 style="padding: 11px !important"><?php if(!empty($po_data)){ echo  $po_data->select_type; } ?>. NO.<br>
                            <?php if(!empty($po_data)){ echo  $po_data->doc_no; } ?>
                            </td>
                        </tr>
                         
                      
                      
                    </table>
                </td>
        </tr>
        <tr class="row">
            <td class="col-md-6"  style="padding-right: 15px !important;
                        padding-left: 15px !important;   vertical-align: top;
            ">
                <p> <p>To <br>
                            <!-- <b></b><br> -->
                <?php if(!empty($invoice_data)){ echo $invoice_data->company_name; } ?><br>
                            GST No.<b><?php if(!empty($invoice_data)){ echo $invoice_data->gst_no; } ?></b><br>
                <?php if(!empty($invoice_data)){ echo $invoice_data->address; } ?><br>
                           
                <!-- State Name : Maharashtra, Code : 27<br> -->
                
               
            </p>
            </td>
                <td class="col-md-6" style="padding-right: 0px !important;
                        padding-left: 0px !important; padding:0px !important;
                    ">
                    <table style="margin-bottom: 0px !important;">
                        <!-- <tr class="row">
                            <td class="col-md-12" style="padding: 11px !important"><?php if(!empty($po_data)){ echo  $po_data->select_type; } ?>. NO.<br>
                            <?php if(!empty($po_data)){ echo  $po_data->doc_no; } ?>
                            </td>
                            </tr> -->
                        <tr >
                            <td  colspan=2 style="padding: 11px !important" >
                                <?php if(!empty($po_data)){ echo  $po_data->select_type; } ?>. Date<br>
                                <?php if(!empty($po_data)){ echo  $po_data->doc_date; } ?>
                            </td>
                        </tr>
                        <tr >
                            <td style="padding: 11px !important" >Vendor Code :<br>
                            <?php if(!empty($invoice_data)){ echo $invoice_data->suppplier_code; } ?>
                            </td>
                             <td  style="padding: 11px !important" > 
                           
                            Kind Attention :<br> <?php if(!empty($invoice_data)){ echo $invoice_data->client_name; } ?>
                           
                          

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
                <?php 
                if(!empty($item_data)){ $i=1;

                

                  
                    
                    ?>
                    <?php foreach($item_data as $data){

                    $wherecond = array('is_deleted' => 'N', 'id' => $data->iteam);
                    $services_data = $adminModel->get_single_data('tbl_services', $wherecond);
                //   echo "<pre>";print_r($data);exit();

                     ?>
                    <tr class="no-border">
                        <td class="text-center"><?=$i;?></td>
                        <td><b><?php if(!empty($services_data)){ echo $services_data->ServicesName;} ?></b><br><?=$data->description; ?></td>
                        <td class="text-center"><?php if(!empty($services_data)){ echo $services_data->hsnno;} ?></td>
                        <td  class="text-center"> 
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
        <?php 
if($invoice_data) {
    if($invoice_data->tax_id == 1 || $invoice_data->tax_id == 2) {
        if(!empty($item_data)) { 
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


                $hsn_data[$hsnno]['total_amount'] += $data->total_amount;
                
                if ($invoice_data->tax_id == 1) {
                    $cgst = $invoice_data->cgst;
                    $sgst = $invoice_data->sgst;
                    $hsn_data[$hsnno]['cgst_amount'] += $data->total_amount * ($cgst / 100);
                    $hsn_data[$hsnno]['sgst_amount'] += $data->total_amount * ($sgst / 100);
                    $hsn_data[$hsnno]['tax_rate'] = $cgst + $sgst;
                } else if ($invoice_data->tax_id == 2) {
                    // echo 'hi';
                    $igst = $invoice_data->igst / 2;
                    $hsn_data[$hsnno]['igst_amount'] += $data->total_amount * ($igst / 100);
                    $hsn_data[$hsnno]['igst_amount1'] += $data->total_amount * ($igst / 100);
                    $hsn_data[$hsnno]['tax_rate'] = $invoice_data->igst;
                }
            }

            foreach ($hsn_data as $hsnno => $data) { 
                $total_amount = $data['total_amount'];
                $total_cgst += $data['cgst_amount'];
                $total_sgst += $data['sgst_amount'];
                $total_igst += $data['igst_amount'];
                $total_igst1 += $data['igst_amount1'];
                $total_gst_item = $data['cgst_amount'] + $data['sgst_amount'] + $data['igst_amount'] + $data['igst_amount1'];
                $total_gst += $total_gst_item;
                ?>
                <tr>
                    <td class="text-center"><?= $hsnno ?></td>
                    <td class="text-right"><?= number_format($total_amount, 2) ?></td>
                    <td class="text-right"><?php if ($invoice_data->tax_id == 1) { echo $data['tax_rate'] / ($invoice_data->tax_id == 1 ? 2 : 1); }else if($invoice_data->tax_id == 2){ echo $data['tax_rate'] / ($invoice_data->tax_id == 1 ? 1 : 2); }?>%</td>
                    <td class="text-right"><?php if ($invoice_data->tax_id == 1) {
echo number_format($data['cgst_amount'], 2);}else if($invoice_data->tax_id == 2){ echo number_format($data['igst_amount'], 2); } ?></td>
                    <td class="text-right"><?php if ($invoice_data->tax_id == 1) { echo $data['tax_rate'] / ($invoice_data->tax_id == 1 ? 2 : 1); }else if($invoice_data->tax_id == 2){ echo $data['tax_rate'] / ($invoice_data->tax_id == 1 ? 1 : 2); }?>%</td>
                    <td class="text-right"><?php if ($invoice_data->tax_id == 1) { echo number_format($data['sgst_amount'], 2); }else if($invoice_data->tax_id == 2){ echo number_format($data['igst_amount1'], 2); } ?></td>
                    <td class="text-right"><?= number_format($total_gst_item, 2) ?></td>
                </tr>
                <?php 
                $total_total_amount += $total_amount;
            }
            ?>
            <tr>
                <td><strong style="float:right">Total</strong></td>
                <td class="text-right"><strong><?= number_format($total_total_amount, 2) ?></strong></td>
                <td></td>
                <td class="text-right"><strong><?php if ($invoice_data->tax_id == 1) { echo  number_format($total_cgst, 2); }else if($invoice_data->tax_id == 2){ echo  number_format($total_igst, 2);  } ?></strong></td>
                <td></td>
                <td class="text-right"><strong><?php if ($invoice_data->tax_id == 1) { echo  number_format($total_sgst, 2); }else if($invoice_data->tax_id == 2){ echo  number_format($total_igst1, 2);  } ?></strong></td>
                <td class="text-right"><strong><?php 
                if($invoice_data->tax_id == 1) {
                    if (!empty($invoice_data) && isset($invoice_data->cgst) && isset($invoice_data->sgst)) { 
                        $gst = $invoice_data->cgst + $invoice_data->sgst;
                        $total_amount = !empty($invoice_data) ? $invoice_data->totalamounttotal : '';
                        echo $gst_rate = $total_amount * ($gst / 100);
                    } else {
                        echo 'N/A'; // Or some default value
                    }
                } else if($invoice_data->tax_id == 2) {
                    if (!empty($invoice_data) && isset($invoice_data->igst)) { 
                        $gst = $invoice_data->igst;
                        $total_amount = !empty($invoice_data) ? $invoice_data->totalamounttotal : '';
                        echo $gst_rate = $total_amount * ($gst / 100);
                    } else {
                        echo 'N/A'; // Or some default value
                    }
                }
                ?></strong></td>
            </tr>
        <?php } ?>
    <?php } 
} ?>

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
             <td colspan="7" style="height: 100px; vertical-align: top;">
                <div class="text-right">
                    <strong class="d-block pr-5">MI Tech Solutions</strong><br>
                    <div class="d-flex justify-content-end pr-5">
                        <img src="<?=base_url();?>public/Images/demoStamp1.png" alt="Stamp" class="img-fluid" style="width: 20%; margin-right: 10px;">
                        <img src="<?=base_url();?>public/Images/sign.jpeg" alt="Signature" class="img-fluid" style="width: 20%;">
                    </div>
                    <p class="pr-5">
                        <span class="d-block pr-4">Rahul Deokar</span><br>
                        <span class="d-block pr-5">Authorised Signatory</span>
                    </p>
                </div>
            </td>

            </tr>
            </tbody>
            </table>


      

            <p class="computer-generated">This is a Computer Generated Invoice</p>
    </div>
</body>
</html>