<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 12px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .company-info {
            width: 60%;
        }

        .document-info {
            width: 35%;
            text-align: right;
        }

        .document-title {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .customer-info {
            display: flex;
            margin-bottom: 20px;
        }

        .bill-to {
            width: 50%;
        }

        .ship-to {
            width: 50%;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .totals {
            float: right;
            width: 30%;
            margin-top: 10px;
        }

        .totals div {
            margin-bottom: 5px;
        }

        .signature {
            margin-top: 50px;
        }

        .notes {
            margin-top: 20px;
            font-size: 11px;
        }

        .highlight {
            font-weight: bold;
        }


    </style>


<style>
    .header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
        border-bottom: 2px solid #ccc;
        padding-bottom: 10px;
    }

    .logo {
        margin-right: 15px;
    }

    .company-details {
        flex: 1;
        font-size: 12px;
        line-height: 1.5;
    }

    .document-info {
        font-size: 12px;
        text-align: left;
        width: 250px;
    }

    .document-info div {
        margin-bottom: 4px;
    }

    .company-header {
        display: flex;
        align-items: flex-start;
    }

    .company-name {
        font-weight: bold;
        font-size: 14px;
        margin-bottom: 4px;
    }


    .header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
        border-bottom: 2px solid #ccc;
        padding-bottom: 10px;
    }

    .logo {
        margin-right: 15px;
    }

    .company-details {
        flex: 1;
        font-size: 12px;
        line-height: 1.5;
    }

    .document-info {
        font-size: 12px;
        text-align: left;
        width: 250px;
    }

    .document-info div {
        margin-bottom: 4px;
    }

    .company-header {
        display: flex;
        align-items: flex-start;
    }

    .company-name {
        font-weight: bold;
        font-size: 14px;
        margin-bottom: 4px;
    }



    .document-info div {
        margin-bottom: 4px;
        border-bottom: 2.5px dotted lightblue;
        padding-bottom: 2px;
    }

    .totals div {
        border-bottom: 2.5px dotted lightblue;
        padding-bottom: 4px;
        margin-bottom: 6px;
    }

    .totals .highlight {
        font-weight: bold;
        border-bottom: none;
        margin-top: 8px;
    }

    .signature {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 30px;
    padding-top: 10px;
    border-top: 1px dotted lightblue;
    font-size: 12px;
    gap: 20px;
}

.signature div {
    white-space: nowrap;
}


.totals {
    float: right;
    width: 30%;
    margin-top: 10px;
    margin-bottom: 20px;
}

.notes {
    clear: both;
    margin-top: 20px;
    font-size: 11px;
    border-top: 1px dotted lightblue;
    padding-top: 10px;
}

.signature {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 30px;
    padding-top: 10px;
    border-top: 1px dotted lightblue;
    font-size: 12px;
    gap: 20px;
    clear: both;
    flex-wrap: wrap;
}


.notes div {
    font-weight: bold;
}

/* Table header */
th.light-blue {
    background-color: lightblue;
    padding: 8px;
    text-align: left;
}

th.blue {
    background-color: #add8e6; /* light blue */
    padding: 8px;
    text-align: left;
}


.totals-container {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
    align-items: flex-start;
    gap: 20px;
}

.payment-term {
    white-space: nowrap;
    margin-top: 20px;
    font-weight: bold;
}


.highlight {
    color: inherit;
}

.highlight::first-letter {
     color: #f1c40f;;
    font-weight: bold;
}

.yellow-pipe {
    color: #f1c40f;
    font-weight: bold;
}

.document-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
}

.customer-info {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.dotted-line-row {
    border-bottom: 2.5px dotted lightblue;
    margin: 10px 0;
    width: 100%;
}

.currency-display {
    font-weight: bold;
    color: #000;
    padding-top: 5px;
}


.currency-display {
    font-weight: bold;
    color: #000;
    padding-top: 5px;
    text-align: right;
}

</style>



</head>

<body>

    <div class="header">
        <!-- Left side: logo and company info -->
        <div class="company-header">
            <div class="logo">
                <img width="60" height="60" src="https://img.icons8.com/color/48/artstation.png" alt="artstation">
            </div>
            <div class="company-details">
                <div class="company-name">DIY LIMITED</div>
                <div>Changombe: Plot 38, Mbozi Road</div>
                <div>T: +255 22 2864114 / 2860505 &nbsp; F: +255 22 28654220</div>
                <div>Email: info@diy.co.tz &nbsp; Web: www.diy.co.tz</div>
                <div>TIN: 101-642-879 &nbsp; VRN: 10-015864-U</div>
                <div>Mwenge: Plot 42, Opp Majembe Auction Mart</div>
                <div>PO Box: 19886, Dar es Salaam, Tanzania</div>
                <div>T: +255 22 2773270 / 2774906 &nbsp; F: +255 22 2772471</div>
            </div>
        </div>
    
        <!-- Right side: document info -->
         <div class="document-title">
            <span style="color: yellow; font-weight: bold;">▌</span> Sales Order No : 559616
        <div class="document-info">
            <div><strong>Document Date:</strong> 06-05-25</div>
            <div><strong>Page:</strong> 1/1</div>
            <div><strong>Customer No.:</strong> 559616</div>
            <div><strong>VAT Number - Business Partner:</strong> 000000000</div>
            <div><strong>Your Reference:</strong> CW0473</div>
            <div><strong>Your Contact:</strong> Edwin</div>
            <div><strong>Document Number:</strong> 782407</div>
            <div><strong>Currency:</strong> TSH</div>
        </div>
        </div>
        
    </div>


    <div class="customer-info">
        <div class="bill-to">
            <div class="section-title">Bill-to:</div>
            <div>MENAS NTIBA SHIMA</div>
            <div>KEKO/MAGULUMBAS, Region:Dar Es Salaam</div>
            <div>Ph: 0628055262</div>
        </div>
        <div class="ship-to">
            <div class="section-title">Ship-to:</div>
            <div>Same as Bill-to</div>
            <div>MENAS NTIBA SHIMA</div>
            <div>Copy</div>
        </div>
    </div>
    
    <!-- Dotted Line Row -->
    <div class="dotted-line-row" style="margin-top: 60px;"></div>
    
    <!-- Currency display -->
    <div class="currency-display">Currency: TSH</div>
    

    <div class="document-title"> <span class="yellow-pipe">▌</span>Quote</div>

    <table>
        <thead>
            <tr>
                <th class="light-blue">Item Code</th>
                <th class="light-blue">Description</th>
                <th class="light-blue">Whs</th>
                <th class="blue">Qty</th>
                <th class="light-blue">UoM</th>
                <th class="light-blue">Price</th>
                <th class="light-blue">Tax %</th>
                <th class="light-blue">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>HW0683</td>
                <td>PVC Edging Black 22mm 001</td>
                <td>W15</td>
                <td>200</td>
                <td>mtr</td>
                <td>254.24</td>
                <td>18.00</td>
                <td>50,847.46</td>
            </tr>
        </tbody>
    </table>

    <div class="totals-container">

        <div class="payment-term highlight">
            <span class="yellow-pipe">▌</span>Payment Term: - Cash Basic -
        </div>

        <div class="totals">
            <div>Order Subtotal: TSH 50,847.46</div>
            <div>Total Before Tax: TSH 50,847.46</div>
            <div>Total Tax Amount: TSH 9,152.54</div>
            <div class="highlight"> <span class="yellow-pipe">▌</span>Total Amount: TSH 60,000.00</div>
        </div>
    
      
    </div>
    
    
    <div class="notes">
        <div>Based on Quotation 572226</div>
        <div class="notes">
            <div><strong>Note:</strong> This Quotation is only valid for 7 Days / On Available Stock / In case of Price Changes this Quotation Will Not be Valid.</div>
        </div>
        
    </div>
    
    <div class="signature">
        <div>Signature: _________________________</div>
        <div>Date: _________________________</div>
        <div>Confirmation of Sales Order</div>
        <div>Doc. Time: 1050</div>
    </div>
    
    
</body>

</html>