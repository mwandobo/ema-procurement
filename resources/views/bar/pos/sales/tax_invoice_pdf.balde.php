<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DIY LIMITED - Tax Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
            color: #000;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 3px double #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .logo {
            margin-right: 15px;
        }

        .company-header {
            display: flex;
            align-items: flex-start;
        }

        .company-details {
            font-size: 12px;
            line-height: 1.4;
        }

        .company-name {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #f1f1f1;
        }

        .section-title {
            font-weight: bold;
            margin: 20px 0 8px;
            font-size: 14px;
        }

        .totals td {
            font-weight: bold;
        }

        .notes {
            font-size: 11px;
            margin-top: 20px;
            border-top: 1px dashed #ccc;
            padding-top: 10px;
        }

        .signature {
            margin-top: 25px;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <div class="header">
        <div class="company-header">
            <div class="logo">
                <img width="60" height="60" src="https://img.icons8.com/color/48/artstation.png" alt="Logo">
            </div>
            <div class="company-details">
                <div class="company-name">DIY LIMITED</div>
                Changombe: Plot 38, Mbozi Road<br>
                T: +255 22 2864114 / 2860505 &nbsp; F: +255 22 28654220<br>
                Mwenge: Plot 42, Opp Majembe Auction Mart<br>
                T: +255 22 2773270 / 2774906 &nbsp; F: +255 22 2772471<br>
                PO Box: 19886, Dar es Salaam, Tanzania<br>
                Email: info@diy.co.tz &nbsp; Web: www.diy.co.tz<br>
                TIN: 101-642-879 &nbsp; VRN: 10-015864-U
            </div>
        </div>
    </div>

    <!-- Invoice Info -->
    <div class="section-title">
        <div class="document-title">
            <span style="color: yellow; font-weight: bold;">▌</span> Tax Invoices : 559616
        </div>
    </div>
    <table>
        <tr>
            <td><strong>Customer Name:</strong> Yanaty Traders</td>
            <td><strong>Invoice Date:</strong> 08-05-25</td>
        </tr>
        <tr>
            <td><strong>Address:</strong> Tabora Stand</td>
            <td><strong>Invoice No.:</strong> 939267</td>
        </tr>
        <tr>
            <td><strong>Phone:</strong> 0652356350</td>
            <td><strong>Terms:</strong> Cash Basic</td>
        </tr>
        <tr>
            <td><strong>Customer TIN:</strong> 144291921</td>
            <td><strong>Currency:</strong> TSH</td>
        </tr>
    </table>

    <!-- Item Table -->
    <div class="section-title">Items</div>
    <table>
        <thead>
            <tr>
                <th style="background-color: #99ccff;">S.No.</th>
                <th style="background-color: #99ccff;">Item No.</th>
                <th style="background-color: #99ccff;">Description</th>
                <th style="background-color: #99ccff;">Unit</th>
                <th style="background-color: #99ccff;">Qty</th>
                <th style="background-color: #99ccff;">Whs</th>
                <th style="background-color: #99ccff;">Disc. %</th>
                <th style="background-color: #99ccff;">Price</th>
                <th style="background-color: #99ccff;">Tax%</th>
                <th style="background-color: #99ccff;">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>GS0001</td>
                <td>Gypsum Powder Airplane 25kg Bag</td>
                <td>Bag</td>
                <td>50</td>
                <td>W14</td>
                <td>0.00</td>
                <td>TSH 21,610.17</td>
                <td>18.00%</td>
                <td>TSH 1,080,508.48</td>
            </tr>
        </tbody>
    </table>

    <!-- Summary -->
    <div class="section-title">Summary</div>
    <table class="totals">
        <tr>
            <td>Exclusive Amount (TSH)</td>
            <td>1,080,508.48</td>
        </tr>
        <tr>
            <td>VAT Amount (TSH)</td>
            <td>194,491.53</td>
        </tr>
        <tr>
            <td><strong>Total Amount (TSH)</strong></td>
            <td><strong>1,275,000.01</strong></td>
        </tr>
        <tr>
            <td colspan="2"><strong>Amount in Words:</strong> One million two hundred seventy-five thousand and One Only
            </td>
        </tr>
    </table>

    <!-- Remarks -->
    <div class="section-title">Remarks</div>
    <p>Based on Quotation 572900 and Sales Order 782983</p>
    <p><strong>Vehicle:</strong> TRUCK T604 EKA - CHUMA</p>
    <p><strong>Sales Employee:</strong> bakarisaidi</p>

    <!-- Notes -->
    <div class="notes">
        <strong>Note:</strong><br>
        - Goods once sold will not be exchanged or returned.<br>
        - Contact Sales Dept:<br>
        &nbsp;&nbsp;&nbsp;Rahma: +255 715 334 488<br>
        &nbsp;&nbsp;&nbsp;Yohana: +255 714 839 355<br>
        &nbsp;&nbsp;&nbsp;Bahiya: +255 712 245 050
    </div>

    <!-- Signature -->
    <div class="signature">
        <div><strong>Authorized Signature: __________</strong></div>
        <div><strong>Received By: __________</strong></div>
        <div><strong>Date: __________</strong></div>
    </div>

</body>

</html>