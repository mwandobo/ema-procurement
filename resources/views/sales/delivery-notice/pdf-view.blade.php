<!DOCTYPE html>
<html>
<head>
    <title>DOWNLOAD PDF</title>
</head>
<style type="text/css">
    body {
        font-family: 'Roboto Condensed', sans-serif;
    }

    .m-0 {
        margin: 0px;
    }

    .p-0 {
        padding: 0px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .text-center {
        text-align: center !important;
    }

    .w-100 {
        width: 100%;
    }

    .w-85 {
        width: 85%;
    }

    .w-15 {
        width: 15%;
    }

    .logo img {
        width: 45px;
        height: 45px;
        padding-top: 30px;
    }

    .logo span {
        margin-left: 8px;
        top: 19px;
        position: absolute;
        font-weight: bold;
        font-size: 25px;
    }

    .gray-color {
        color: #5D5D5D;
    }

    .text-bold {
        font-weight: bold;
    }

    .border {
        border: 1px solid black;
    }

    table tbody tr, table thead th, table tbody td {
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }

    table tr th {
        background: #F4F4F4;
        font-size: 15px;
    }

    table tr td {
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
    }

    .box-text p {
        line-height: 10px;
    }

    .float-left {
        float: left;
    }

    .total-part {
        font-size: 16px;
        line-height: 12px;
    }

    .total-right p {
        padding-right: 30px;
    }

    footer {
        color: #777777;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: -20px;
        border-top: 1px solid #aaaaaa;
        padding: 8px 0;
        text-align: center;
    }

    table tfoot tr:first-child td {
        border-top: none;
    }

    table tfoot tr td {
        padding: 7px 8px;
    }


    table tfoot tr td:first-child {
        border: none;
    }

</style>
<body>
<?php
$settings = App\Models\Setting::first();
?>
<div class="head-title">
    <h1 class="text-center m-0 p-0">Delivery Notice</h1>
</div>


<div class="add-detail ">
    <table class="table w-100 ">
        <tfoot>
        <tr>
            <td class="w-50">
                <div class="box-text">
                    <img style="width: 133px; height: 120px;"
                         src="{{ public_path('images/' . $settings->site_logo) }}">

                </div>
            </td>

            <td>
                <div class="box-text"></div>
            </td>
            <td>
                <div class="box-text"></div>
            </td>
            <td>
                <div class="box-text"></div>
            </td>
            <td>
                <div class="box-text"></div>
            </td>
            <td>
                <div class="box-text"></div>
            </td>
            <td class="w-50">
                <div class="box-text">
                    <p><strong>Reference: {{$deliveryNotice->reference_no}}</strong></p>
                    <p><strong>Date: {{Carbon\Carbon::parse($deliveryNotice->created_at)->format('d/m/Y')}}</strong></p>
                </div>
            </td>
        </tr>
        </tfoot>
    </table>


{{--    <div style="clear: both;"></div>--}}
</div>

<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tbody>
        <tr>
            <th class="w-50">Our Info</th>
            <th class="w-50">Clients Details</th>
        </tr>
        <tr>
            <td>
                <div class="box-text">
                    <p>{{$settings->site_name}}</p>
                    <p>{{ $settings->site_address }}</p>
                    <p>Contact :{{  $settings->site_phone_number}}</p>
                    <p>Email: <a href="mailto:{{$settings->site_email}}">{{$settings->site_email}}</p>
                    <p>TIN : {{$settings->tin}}</p>
                </div>
            </td>
            <td>
                <div class="box-text">
                    <p>{{$saleQuotation->client->name}}</p>
                    <p>{{$saleQuotation->client->address}}</p>
                    <p>Contact : {{$saleQuotation->client->phone}}</p>
                    <p>Email: <a href="mailto:{{$saleQuotation->client->email}}">{{$saleQuotation->client->email}}</p>
                    <p>TIN : {{!empty($saleQuotation->client->TIN)? $saleQuotation->client->TIN : ''}}</p>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<?php

$sub_total = 0;
$gland_total = 0;
$tax = 0;
$i = 1;

?>

<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <thead>
        <tr>
            <th class="col-sm-1 w-50">#</th>
            <th class="w-50">Items</th>
            <th class="w-50">Ordered Quantity</th>
            <th class="w-50">Delivered Quantity<</th>
            <th class="w-50">Unit</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($deliveredItems))
            @foreach($deliveredItems as $row)
                    <?php
                    $item = App\Models\Bar\POS\Items::find($row->item_id);
                    ?>

                <tr align="center">
                    <td>{{$i++}}</td>
                    <td class=""><strong
                            class="block">{{ $item->item_code ? "( $item->item_code) - " : '' }}{{ $item->name }}</strong></td>
                    <td>{{ $row->ordered_quantity }}</td>
                    <td>{{ $row->delivered_quantity}}</td>
                    <td>{{ $item->unit}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>

<footer>
    This is a computer generated invoice
</footer>
</body>
</html>
