<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DIY LIMITED - Delivery Note</title>
    <style>
        /* Include all your existing styles here, unchanged */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 2px solid #ccc;
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

        .document-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .document-info div,
        .totals div {
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

        .totals {
            float: right;
            width: 30%;
            margin-top: 10px;
            margin-bottom: 20px;
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

        .notes {
            font-size: 11px;
            margin-top: 20px;
            border-top: 1px dashed #ccc;
            padding-top: 10px;
        }

        .yellow-pipe {
            color: #f1c40f;
            font-weight: bold;
        }

        .document-info div {
            margin-bottom: 4px;
            border-bottom: 2px dotted lightblue;
            padding-bottom: 2px;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="company-header">
            <div class="logo">
                <img width="60" height="60" src="https://img.icons8.com/color/48/artstation.png" alt="artstation">
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

        <div class="document-title" style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">
            <span class="yellow-pipe">▌</span> DELIVERY NOTE
        </div>

        <div class="document-info">
            <div><strong>Document Date:</strong> 08-05-25</div>
            <div><strong>Page:</strong> 1/1</div>
            <div><strong>Customer No.:</strong> C13638</div>
            <div><strong>VAT Number - Business Partner:</strong> TIN: 140-150-274</div>
            <div><strong>Your Reference:</strong> 560585</div>
            <div><strong>Your Contact:</strong> saidi</div>
            <div><strong>Document Number:</strong> 942356</div>
            <div><strong>Currency:</strong> TSH</div>
        </div>

    </div>

    <div class="customer-info" style="display: flex; justify-content: space-between; margin-bottom: 10px;">
        <div class="bill-to">
            <div class="section-title">Bill-to Address</div>
            <div>Milika Michael Kaduda</div>
            <div>Kariakoo, Gogo / Mchikichi Dar es salaam, Region: Dar Es Salaam</div>
            <div>Ph: 0712733625</div>
        </div>
        <div class="ship-to">
            <div class="section-title">Ship-to</div>
            <div>Same as Ship-to</div>
            <div>Original</div>
        </div>
    </div>

    <div class="document-title"> <span class="yellow-pipe">▌</span> Items</div>

    <table>
        <thead>
            <tr>
                <th>Item Code</th>
                <th>Description</th>
                <th>Whs</th>
                <th>Quantity</th>
                <th>UoM</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>DL0106</td>
                <td>Door Lock 116 - Lucho</td>
                <td>No38</td>
                <td>24</td>
                <td>Pieces</td>
            </tr>
        </tbody>
    </table>

    <div class="document-title"> <span class="yellow-pipe">▌</span> Delivery Details</div>
    <table>
        <tr>
            <td><strong>Delivery Date:</strong></td>
            <td>08-05-25</td>
        </tr>
        <tr>
            <td><strong>Vehicle:</strong></td>
            <td>1CTN - SELE/0782 457161 - MC944 ERX</td>
        </tr>
        <tr>
            <td><strong>Based On:</strong></td>
            <td>Quotation 573189 & Sales Order 783219</td>
        </tr>
    </table>

    <div class="signature">
        <div><strong>Signature: _________________________</strong></div>
        <div><strong>Date: _________________________</strong></div>
        <div><strong>Confirmation of Delivery Note</strong></div>
        <div><strong>Doc. Time: 1522</strong></div>
    </div>

</body>

</html>