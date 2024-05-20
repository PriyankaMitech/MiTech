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
            justify-content: center;
            position: relative;
            align-items: flex-start; /* Aligns items to the top */
        }
        .invoice-title {
            margin-top: 20px; /* Adjust the margin as needed */
        }
        .top-right-text {
            position: absolute;
            top: 20px; /* Adjust the top position as needed */
            right: 20px; /* Adjust the right position as needed */
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
    padding: 8px;
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
.no-border td{
    border-top:none !important;
    border-bottom:none !important;
}
.no_border td {
    border-bottom:none !important;
}

    </style>
</head>
<body>
    <div class="invoice">
        <div class="header">
            <h1 class="invoice-title">Tax Invoice</h1>
            <p class="top-right-text">(ORIGINAL FOR RECIPIENT)</p>
        </div>
        <table class="address-section " style="margin-bottom: 0px !important;">
        <tr>
                <td class="col-md-6"  style="padding-right: 15px !important;
                        padding-left: 15px !important;
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
                            <td class="col-md-6"  style="padding: 17px !important">Invoice No.
                                <br>
                                GST/22-23/201
                            </td>
                            <td class="col-md-6"  style="padding: 17px !important">
                                Dated<br>
                                20-Jan-2023
                            </td>
                            
                        <!-- </tr>
                        <tr class="row">
                            <td class="col-md-6"   >Delivery Note<br>
                              
                            </td>
                            <td class="col-md-6"    >
                            Mode/Terms of Payment<br>
                           

                            </td>
                            
                        </tr> -->
                        <tr class="row">
                            <td class="col-md-6"  style="padding: 17px !important" >Vendor Code.<br>
                              
                          
                            </td>
                            <td class="col-md-6"    style="padding: 17px !important" >
                            GST/22-23/201<br>
                           

                            </td>
                            
                        </tr>
                      
                    </table>
                </td>
            </tr>
            <tr>
                <td class="col-md-6"  style="padding-right: 15px !important;
                        padding-left: 15px !important;   vertical-align: top;
                    ">
                        <p> <p>Buyer <br>
                            <b>MRS MRUNAL KULKARNI</b><br>
                            NIGADI<br>
                            PUNE -411044<br>
                            State Name : Maharashtra, Code : 27<br>
                            GST number :<br>
                            kind attention :
                        </p>
                        <p>
                </td>
                <td class="col-md-6" style="padding-right: 0px !important;
                        padding-left: 0px !important; padding:0px !important;
                    ">
                    <table style="margin-bottom: 0px !important;">
                        <tr class="row">
                            <td class="col-md-6" style="padding: 17px !important">PO/ SO No.<br>
                              
                            </td>
                            <td class="col-md-6 "  style="padding: 17px !important" >
                            POSO date<br>
                           

                            </td>
                            
                        </tr>
                        <!-- <tr class="row">
                            <td class="col-md-6" >Despatch Document No<br>
                              
                            </td>
                            <td class="col-md-6"   >
                            Delivery Note Date<br>
                           

                            </td>
                            
                        </tr>
                        <tr class="row">
                            <td class="col-md-6" >Despatched through<br>
                              
                            </td>
                            <td class="col-md-6"   >
                            Destination<br>
                           

                            </td>
                            
                        </tr> -->
                        <tr class="row">
                            <td class="col-md-12" colspan="2" style="    height: 120px;   vertical-align: top;"><p>Terms of Delivery
                                <br><p>
                              
                            </td>
                           
                            
                        </tr>
                    </table>
                </td>
            </tr>

        </table>

        <table  style="margin-bottom: 0px !important;">
            <thead>
                <tr>
                <th>Sr.No</th>
                    <th>Description of Goods</th>
                    <th>HSN/SAC</th>
                    <th>GST Rate</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                 
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr class="no_border">
                <td>1.</td>
                    <td><b>QUICK HEAL INTERNET SECURITY RENEWAL</b></td>
                    <td>85238020</td>
                    <td>18%</td>
                    <td><b>1 NOS.</b></td>
                    <td>770.00</td>
                    <td><b>770.00</b></td>
                </tr>
                <tr class="no-border">
                    <td ></td>
                    <td  class="text-right"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b></b></td>
                    <td><b></b></td>
                </tr>
                <tr class="no-border">
                    <td></td>
                    <td  class="text-right"><b> </b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b></b></td>
                    <td><b></b></td>
                </tr>
                <tr class="no-border" style="vertical-align: baseline;
    height: 140px;">
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

                    <td><b>₹ 770.00</b></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                   
                    <td  colspan=2 class="text-right"><strong>GST</strong></td>

                    <td><b>₹ 138.6</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan=2 class="text-right"><strong>Total</strong></td>

                    <td><b>₹ 909.00</b></td>
                </tr>
                <tr>
                    <td colspan=8>
                    <p>Amount Chargeable (in words): <span style="  float: right;">E.& O.E</span> <br><strong> Indian Rupees Nine Hundred Nine Only</strong></p>

                    </td>
                </tr>
            </tbody>
        </table>


        <table style="margin-bottom: 0px !important;">
        <thead>
            <tr>
                <th rowspan="2" style="    width: 284px;
">HSN/SAC</th>
                <th rowspan="2">Taxable Value</th>
                <th colspan="2">Central Tax</th>
                <th colspan="2">State Tax</th>
                <th rowspan="2">Total Tax Amount</th>
            </tr>
            <tr>
                <th>Rate</th>
                <th>Amount</th>
                <th>Rate</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>85238020</td>
                <td>770.00</td>
                <td>9%</td>
                <td>69.30</td>
                <td>9%</td>
                <td>69.30</td>
                <td>138.60</td>
            </tr>
            <tr>
                <td ><strong style="float:right">Total</strong></td>
                <td><strong>770.00</strong></td>
                <td></td>
                <td><strong>69.30</strong></td>
                <td></td>
                <td><strong>69.30</strong></td>
                <td><strong>138.60</strong></td>
            </tr>
            <tr>
                <td colspan=7>
                <!-- <p style="padding-bottom:10%"></p> -->

                <p>Company's VAT TIN: <b> 27571103949V</b></p>
                <p>Company's CST No.: <b>27571103949C</b></p>

                <p>Company's PAN : <b>AMGPP0554J</b></p>
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
                    <img src="<?=base_url();?>public/Images/sign.jpeg" alt="Signature" style="width: 23%;"><br>
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