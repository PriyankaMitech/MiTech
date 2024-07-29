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
    font-size:12px;
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
p {
    margin: 0 0 -4px !important;
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
            
                <td class="col-md-6"  style="padding: 5px 11px !important; ;
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
                            <td   style="padding: 5px !important">Invoice No.
                                <br>
                                <?php if(!empty($invoice_data)){ echo $invoice_data->id; } ?>
                            </td>
                            <td  style="padding: 5px !important">
                                Dated<br>
                                <?php if(!empty($invoice_data)){ echo $invoice_data->invoice_date; } ?>
                            </td>
                        </tr>

                        <tr>
                            <td colspan=2 style="padding: 5px !important"><?php if(!empty($po_data)){ echo  $po_data->select_type; } ?>. NO.<br>
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
                            <td class="col-md-12" style="padding: 5px !important"><?php if(!empty($po_data)){ echo  $po_data->select_type; } ?>. NO.<br>
                            <?php if(!empty($po_data)){ echo  $po_data->doc_no; } ?>
                            </td>
                            </tr> -->
                        <tr >
                            <td  colspan=2 style="padding: 5px !important" >
                                <?php if(!empty($po_data)){ echo  $po_data->select_type; } ?>. Date<br>
                                <?php if(!empty($po_data)){ echo  $po_data->doc_date; } ?>
                            </td>
                        </tr>
                        <tr >
                            <td style="padding: 5px !important" >Vendor Code :<br>
                            <?php if(!empty($invoice_data)){ echo $invoice_data->suppplier_code; } ?>
                            </td>
                             <td  style="padding: 5px !important" > 
                           
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
    <?php if ($invoice_data) {
        if ($invoice_data->tax_id == 1 || $invoice_data->tax_id == 2) { ?>
            <thead>
                <tr>
                    <th rowspan="2" style="width: 284px;" class="text-center">HSN/ SAC</th>
                    <th rowspan="2">Taxable Value</th>
                    <th colspan="2" class="text-center">Central Tax</th>
                    <?php if ($invoice_data->tax_id == 1) { ?>
                        <th colspan="2" class="text-center">State Tax</th>
                    <?php } ?>
                    <th rowspan="2">Total Tax Amount</th>
                </tr>
                <tr>
                    <th>Rate</th>
                    <th>Amount</th>
                    <?php if ($invoice_data->tax_id == 1) { ?>
                        <th>Rate</th>
                        <th>Amount</th>
                    <?php } ?>
                </tr>
            </thead>
        <?php }
    } ?>
    <tbody>
    <?php 
    if ($invoice_data) {
        if ($invoice_data->tax_id == 1 || $invoice_data->tax_id == 2) {
            if (!empty($item_data)) { 
                $summary_data = [];
                $total_gst = 0;
                $total_total_amount = 0.0;

                foreach ($item_data as $data) {
                    $wherecond = ['is_deleted' => 'N', 'id' => $data->iteam];
                    $services_data1 = $adminModel->get_single_data('tbl_services', $wherecond);

                    if (!empty($services_data1)) {
                        $hsnno = $services_data1->hsnno;

                        if (!isset($summary_data[$hsnno])) {
                            $summary_data[$hsnno] = [
                                'taxable_value' => 0,
                                'cgst_rate' => 0,
                                'cgst_amount' => 0,
                                'sgst_rate' => 0,
                                'sgst_amount' => 0,
                                'igst_rate' => 0,
                                'igst_amount' => 0,
                            ];
                        }

                        $taxable_value = is_numeric($data->total_amount) ? (float)$data->total_amount : 0;
                        $summary_data[$hsnno]['taxable_value'] += $taxable_value;
                        $total_total_amount += $taxable_value;

                        if ($invoice_data->tax_id == 1) {
                            $cgst_rate = $invoice_data->cgst;
                            $sgst_rate = $invoice_data->sgst;
                            $cgst_amount = $taxable_value * ($cgst_rate / 100);
                            $sgst_amount = $taxable_value * ($sgst_rate / 100);
                            $summary_data[$hsnno]['cgst_rate'] = $cgst_rate;
                            $summary_data[$hsnno]['sgst_rate'] = $sgst_rate;
                            $summary_data[$hsnno]['cgst_amount'] += $cgst_amount;
                            $summary_data[$hsnno]['sgst_amount'] += $sgst_amount;
                            $total_gst += $cgst_amount + $sgst_amount;
                        } else if ($invoice_data->tax_id == 2) {
                            $igst_rate = $invoice_data->igst;
                            $igst_amount = $taxable_value * ($igst_rate / 100);
                            $summary_data[$hsnno]['igst_rate'] = $igst_rate;
                            $summary_data[$hsnno]['igst_amount'] += $igst_amount;
                            $total_gst += $igst_amount;
                        }
                    }
                }

                foreach ($summary_data as $hsnno => $data) { ?>  
                    <tr>
                        <td><?=$hsnno;?></td>
                        <td class="text-right"><?=number_format($data['taxable_value'], 2);?></td>
                        <td class="text-right"><?=($invoice_data->tax_id == 1) ? $data['cgst_rate'] : $data['igst_rate'];?>%</td>
                        <td class="text-right"><?=($invoice_data->tax_id == 1) ? number_format($data['cgst_amount'], 2) : number_format($data['igst_amount'], 2);?></td>
                        <?php if ($invoice_data->tax_id == 1) { ?>
                        <td class="text-right"><?=$data['sgst_rate'];?>%</td>
                        <td class="text-right"><?=number_format($data['sgst_amount'], 2);?></td>
                        <?php } ?>
                        <td class="text-right"><?=number_format(($invoice_data->tax_id == 1) ? ($data['cgst_amount'] + $data['sgst_amount']) : $data['igst_amount'], 2);?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="7">
                        <p class="mitechdetails">GST No.: <b>27571103949C</b></p>
                        <p class="mitechdetails">PAN No. : <b>AMGPP0554J</b></p>
                        <b>Online Payment Details</b> <br>
                        <b>Bank & Branch Name:</b> Kotak Mahindra Bank Ltd.<br>
                        <b>Acc. Name: </b> MI Tech Solutions<br>
                        <b>Account No.: </b> 1012075826<br>
                        <b>IFSC Code: </b> KKBK0001757<br>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" style="vertical-align: top;">
                        <div class="text-right">
                            <strong class="d-block pr-5">MI Tech Solutions</strong><br>
                            <div class="d-flex justify-content-end pr-5">
                                <img src="<?=base_url();?>public/Images/demoStamp1.png" alt="Stamp" class="img-fluid" style="width: 10%; margin-right: 10px;">
                                <img src="<?=base_url();?>public/Images/sign.jpeg" alt="Signature" class="img-fluid" style="width: 10%;">
                            </div>
                            <p class="pr-5">
                                <span class="d-block pr-4">Rahul Deokar</span><br>
                                <span class="d-block pr-5">Authorised Signatory</span>
                            </p>
                        </div>
                    </td>
                </tr>
            </tbody>
        <?php } ?>
    <?php } ?>
<?php } ?>


            
            </table>


      

            <p class="computer-generated">This is a Computer Generated Invoice</p>
    </div>
</body>
</html>