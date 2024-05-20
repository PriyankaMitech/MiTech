<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @page {
            size: A4;
            margin: 20mm;
        }
        body {
            font-family: serif;
            -webkit-print-color-adjust: exact;
        }
        .invoice-container {
            background-color: #ffffff;
            border: 1px solid #ddd;
            padding: 20px;
            margin: 0 auto;
            width: 210mm;
            min-height: 297mm;
            box-sizing: border-box;
        }
        .invoice-header h1 {
            font-size: 24px;
            margin: 0;
        }
        .invoice-table th, .invoice-table td {
            padding: 10px;
        }
        .invoice-footer {
            font-size: 14px;
            color: #000000;
            margin-top: 20px;
        }
        .invoice-footer p {
            margin-bottom: 5px;
        }
        .amount-in-words {
            font-size: 14px;
            margin-top: 20px;
        }
        p {
            margin-bottom: 0.2rem !important; 
        }
        .signature {
            text-align: -webkit-center;
                margin-top: 20px; /* Adjust this value as needed */
}

.signature img {
    width: 150px; /* Adjust the width of the signature image */
    height: auto; /* Maintain aspect ratio */
}

    </style>
</head>
<body>

<div class="container p-5">
    <div class="invoice-container">
        <div class="invoice-header text-center mb-4">
            <h1>Tax Invoice</h1>
        
        </div>

        <div class="invoice-details mb-4">
            <div class="row">
                <div class="col-sm-12">
                    <p><img src="<?=base_url();?>public/Images/logo.png" alt="Logo" style="height: 50px; width: auto;"> </p>
                        <br>
                </div>
                <div class="col-sm-6">
                    <p><strong>Invoice NO.: </strong> # MIT-2223-032</p>
                    <p><strong>Date: </strong> 18-July-2022</p>
                    <br>
                    <p><strong>PO No.:</strong> Approval Dt. 11-Jul-22</p>
                    <p><strong>Supplier Code:</strong> --</p>
                    <p><strong>PO Date:</strong> NA</p>
                
                </div>
                <div class="col-sm-6 text-right">
                    <p><strong>Invoice To:</strong></p>
                    <p>Ace Children's Hospital</p>
                    <p>Star Colony Nandivali</p>
                    <p>Panchanand Dombivli (E) - 421201</p>
                    <p>Kind Attn: Mr. Shriram / Ms. Rohini</p>
                </div>
            </div>
          
        </div>

        <table class="table table-bordered invoice-table">
            <thead class="thead-light">
                <tr>
                    <th>Sr. No.</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price (₹)</th>
                    <th>Amount (₹)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Application Support Services for ePulse (Hospital Information System) – 1-Aug-22 to 31-July-23</td>
                    <td>1</td>
                    <td>25000</td>

                    <td>25000</td>
                </tr>
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-8">
                <div class="amount-in-words">
                    <p><b>Amount in words: </b>Indian Rupees Twenty Five Thousand only.</p>
                </div>
                <div class="invoice-footer">
                    <p><b>Online Payment Details: </b></p>
                    <p><b>Bank & Branch Name: </b>Kotak Mahindra Bank Ltd.</p>
                    <p><b>Acc. Name: </b>MI Tech Solutions</p>
                    <p><b>Account No.: </b>1012075826</p>
                    <p><b>IFSC Code: </b>KKBK0001757</p>
                  
                </div>
            </div>
            <div class="col-md-4">
                <table class="table">
                    <tr>
                        <th>Subtotal (₹)</th>
                        <td>25000.00</td>
                    </tr>
                    <tr>
                        <th>CGST (%)</th>
                        <td>--</td>
                    </tr>
                    <tr>
                        <th>SGST (%)</th>
                        <td>--</td>
                    </tr>
                    <tr>
                        <th class="total-label">Total (₹)</th>
                        <td class="total-value">25000.00</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="invoice-footer">
            <div class="row">
                <div class="col-md-6">
                    <!-- Additional contact information -->
                    <div class="additional-contact-info">
                        <p>MI Tech Solutions, 97/25 PCNT Nigdi Pune 411-044</p>
                        <p><b>Phone: </b>7057778221</p>
                        <p><b>Email: </b>deokar.rahul@gmail.com</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Signature -->
                    <div class="signature">
                        <img src="<?=base_url();?>public/Images/sign.jpeg" alt="Signature">
                        <p><b>Proprietor : Rahul Deokar</b></p>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
