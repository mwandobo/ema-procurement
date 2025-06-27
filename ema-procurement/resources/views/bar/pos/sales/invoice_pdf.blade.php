<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Quotation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 12px;
        }

        .company-header {
            text-align: center;
            margin-bottom: 15px;
        }

        .company-name {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .company-address {
            line-height: 1.4;
        }

        .document-title {
            text-align: center;
            font-weight: bold;
            font-size: 14px;
            margin: 15px 0;
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
        }

        .quotation-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .customer-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .customer-table td {
            padding: 5px;
            vertical-align: top;
        }

        .customer-table .label {
            font-weight: bold;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .items-table th,
        .items-table td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }

        .items-table th {
            background-color: #e6f7ff;
        }

        .items-table td:nth-child(5) {
            background-color: #cce7ff;
        }

        .summary-section {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .amounts {
            width: 49%;
        }

        .highlight {
            font-weight: bold;
            color: #000;
            margin-top: 5px;
        }

        .highlight::before {
            content: '▌';
            color: yellow;
            padding-right: 5px;
        }

        .remarks {
            margin-top: 20px;
            clear: both;
        }

        .remarks-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .bank-details {
            margin-top: 10px;
        }

        .signature {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
        }

        .note {
            font-style: italic;
            margin-top: 10px;
        }

        .dotted-line {
            border-bottom: 2.5px dotted #99ccff;
            margin: 10px 0;
        }

        .currency-display {
            font-weight: bold;
            text-align: right;
            padding-top: 5px;
        }




        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
            border-bottom: 3px double black;
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
            background-color: #add8e6;
            /* light blue */
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
            color: #f1c40f;
            ;
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

        .summary-section {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .amounts {
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
            <span style="color: yellow; font-weight: bold;">▌</span> Sales Quotation No : 559616
            <div class="document-info">
                <div><strong>Sales Quotation No :</strong> 559616</div>
                <div><strong>Sales Quotation Date :</strong> 06-May-25</div>
                <div><strong>Payment Terms :</strong> - Cash Basic -</div>
            </div>
        </div>

    </div>


    <table class="customer-table">
        <tr>
            <td class="label">To :</td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 70%;">
                <strong>CW0473 : MENAS NTIBA SHIMA</strong><br>
                KEKOMAGULUMBAS, Region:Dar Es Salaam<br>
                Ph :0628056262
            </td>
            <td>
                <strong>TIN :</strong> 000000000<br>
                <strong>VRN :</strong> 00000000
            </td>
        </tr>
    </table>

    <table class="items-table">
        <thead>
            <tr>
                <th>Sr</th>
                <th>Code</th>
                <th>Description</th>
                <th>Unit</th>
                <th>Qty</th>
                <th>Whs</th>
                <th>Price</th>
                <th>Tax</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>HW0683</td>
                <td>PVC Edging Black 22mm</td>
                <td>MT</td>
                <td>200</td>
                <td>W15</td>
                <td>254.24</td>
                <td>18</td>
                <td>50,847.46</td>
            </tr>
        </tbody>
    </table>

    <div class="summary-section" style="display: flex; justify-content: flex-end;">
        <div class="amounts" style="text-align: right;">
            <div>Exclusive Amount TZS : 50,847.46</div>
            <div>VAT Amount TZS : 9,152.54</div>
            <div class="highlight"><strong>Total Amount TZS : 60,000.00</strong></div>
        </div>
    </div>




    <div class="remarks">
        <div class="remarks-title">Remarks :</div>
        <div class="bank-details">
            Our Bank A/c Details : Account Name - <strong>DIY Limited</strong><br>
            <strong>CRDB A/c</strong> : 0150357347900 (Branch - Pugu Road), USD A/c: 0250357347900<br>
            <strong>NMB A/c</strong> : 22510028994 (Branch - Milmani City Mall)<br>
            <strong>DTB A/c</strong> : 7122663001 (Branch - Milmani City Mall), DTB USD A/c: 0122663001<br>
            Azania Bank Ltd TZS A/c : 020000003750 , USD A/c : 020010000195<br>
            Equity Bank Mwenge Branch : TZS A/c 3007211841752, USD A/c: 3007211841754
        </div>
        <div class="note">
            Note :<br>
            1) Quotation is Valid For 7 Days if stock is available<br>
            2) Quotation will be invalid incase of any price changes.<br>
            3) Prices to be changed without prior notice.
        </div>
    </div>

    <div class="signature">
        <div>Authorized Signature : ______</div>
        <div>Received By : ______</div>
        <div>Date : ______</div>
    </div>

    <div class="note" style="margin-top: 20px;">
        Goods Once Sold Will Not be Exchanged or Returned. In the event of any changes Customer will be liable to pay
        VAT Amount.
    </div>
</body>

</html>