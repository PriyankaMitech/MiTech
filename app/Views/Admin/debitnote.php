<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Debit Note</title>
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

.debitnote {
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

.debitnote-title {
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

@media print {
    .debitnote {
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

 if(!empty($debitnote_data)){ 
 $wherecond = array('is_deleted' => 'N', 'id' => $debitnote_data->po_no);

 $wherecond1 = array('is_deleted' => 'N', 'debitnote_id' => $debitnote_data->debitnoteid);


 }
 $po_data = $adminModel->get_single_data('tbl_po', $wherecond);

//  echo "<pre>";print_r($po_data);exit();

$item_data = $adminModel->getalldata('tbl_debitnoteitem', $wherecond1);




?>
    <div class="debitnote">
        <div class="header">
        <img src="<?=base_url();?>public/Images/logo.png" alt="Logo" class="logo"> 
            <h1 class="debitnote-title">Debit Note</h1>
            <p class="top-right-text">(ORIGINAL FOR RECIPIENT)</p>
        </div>
        <table class="address-section " style="margin-bottom: 0px !important;">
        <tr>
              
                <td class="col-md-6" style="padding-right: 0px !important;
                        padding-left: 0px !important; padding:0px !important;
                    ">
                    <table style="margin-bottom: 0px !important;">
                        <tr class="row">
                            <td class="col-md-6"  style="padding: 11px !important">Debit Note No.
                                <br>
                                <?php if(!empty($debitnote_data)){ echo $debitnote_data->id; } ?>
                            </td>
                            <td class="col-md-6"  style="padding: 11px !important">
                                Dated<br>
                                <?php if(!empty($debitnote_data)){ echo $debitnote_data->debitnote_date; } ?>
                            </td>
                            
                      
                        <tr class="row">
                            <td class="col-md-6"  style="padding: 11px !important" >Vendor Code.<br>
                            <?php if(!empty($debitnote_data)){ echo $debitnote_data->suppplier_code; } ?>

                          
                            </td>
                            <td class="col-md-6"    style="padding: 11px !important" > GST NO.
                           <br>
                           
                           <?php if(!empty($debitnote_data)){ echo $debitnote_data->gst_no; } ?>

                            </td>
                            
                        </tr>
                      
                    </table>
                </td>
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
            </tr>
            <tr>
               
                <td class="col-md-6" style="padding-right: 0px !important;
                        padding-left: 0px !important; padding:0px !important;
                    ">
                    <table style="margin-bottom: 0px !important;">
                        <tr class="row">
                            <td class="col-md-6" style="padding: 11px !important"><?php if(!empty($po_data)){ echo  $po_data->select_type; } ?>. NO.<br>
                            <?php if(!empty($po_data)){ echo  $po_data->doc_no; } ?>

                              
                            </td>
                            <td class="col-md-6 "  style="padding: 11px !important" >
                            <?php if(!empty($po_data)){ echo  $po_data->select_type; } ?>. Date<br>

                            <?php if(!empty($po_data)){ echo  $po_data->doc_date; } ?>
                           

                            </td>
                            
                        </tr>
                       
                        <tr class="row">
                            <td class="col-md-12" colspan="2" style="    height: 106px;   vertical-align: top;"><p>Terms of Delivery
                                <br><p>
                              
                            </td>
                           
                            
                        </tr>
                    </table>
                </td>
                <td class="col-md-6"  style="padding-right: 15px !important;
                        padding-left: 15px !important;   vertical-align: top;
                    ">
                        <p> <p>Client <br>
                            <!-- <b></b><br> -->
                            <?php if(!empty($debitnote_data)){ echo $debitnote_data->company_name; } ?><br>
                            <?php if(!empty($debitnote_data)){ echo $debitnote_data->address; } ?><br>
                            <!-- State Name : Maharashtra, Code : 27<br> -->
                            Kind Attention : <?php if(!empty($debitnote_data)){ echo $debitnote_data->client_name; } ?>
                        </p>
                        <p>
                </td>
            </tr>

        </table>

        <table  style="margin-bottom: 0px !important;">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Description</th>
                    <th>HSN/SAC</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                 
                    <th>Amount</th>
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
                    <td><b></b></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                  
                    <td colspan=2 class="text-right"><strong>Sub Total</strong></td>

                    <td class="text-right"><b><?php if(!empty($debitnote_data)){ echo  $debitnote_data->currency_symbol; } ?>  <?php if(!empty($debitnote_data)){ echo  $debitnote_data->totalamounttotal; } ?></b></td>
                </tr>

            
              
                <tr>
                    <td colspan=8>
                    <p>Amount Chargeable (in words): <span style="  float: right;">E.& O.E</span> <br><strong> <?php if(!empty($debitnote_data)){ echo  $debitnote_data->totalamount_in_words; } ?></strong></p>

                    </td>
                </tr>
            </tbody>
        </table>


        <table style="margin-bottom: 0px !important;">
      
        <tbody>
       
       
        
          
         
            <tr>
                <td colspan=7>
                <!-- <p style="padding-bottom:10%"></p> -->

                <p>GST No.: <b>27571103949C</b></p>

                <p>PAN No. : <b>AMGPP0554J</b></p>
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


      

        <p class="computer-generated">This is a Computer Generated Debit Note</p>
    </div>
</body>
</html>