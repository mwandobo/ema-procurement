<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Supplier Invoice - {{ $invoice_main->reference_no }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 800px; margin: 0 auto; }
        .p-md { padding: 12px; }
        .bg-items { background: #303252; color: #ffffff; }
        .ml-13 { margin-left: -13px; }
        .mb0 { margin-bottom: 0; }
        .mb-lg { margin-bottom: 20px; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .table th { background: #303252; color: white; }
        .table tfoot td { font-weight: bold; border: none; }
        .table tfoot tr:first-child td { border-top: none; }
        .row { display: flex; flex-wrap: wrap; }
        .col-lg-6 { width: 50%; }
        .col-lg-3 { width: 25%; }
        .w-100 { width: 100%; }
        .w-50 { width: 50%; }
        .text-center { text-align: center !important; }
        .text-bold { font-weight: bold; }
        .box-text p { line-height: 10px; }
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
    </style>
</head>
<body>
    <?php $settings = App\Models\Setting::first(); ?>
    <div class="container">
        <div class="head-title">
            <h1 class="text-center mb0">Supplier Invoice - {{ $invoice_main->reference_no }}</h1>
        </div>
        <br><br>
        <div class="add-detail">
            <table class="table w-100">
                <tfoot>
                    <tr>
                        <td class="w-50">
                            <div class="box-text">
                                <img style="width: 133px; height: 120px;" src="{{ asset('images/' . $settings->site_logo) }}">
                            </div>
                        </td>
                        <td><div class="box-text"></div></td>
                        <td><div class="box-text"></div></td>
                        <td><div class="box-text"></div></td>
                        <td><div class="box-text"></div></td>
                        <td><div class="box-text"></div></td>
                        <td class="w-50">
                            <div class="box-text">
                                <p><strong>Reference: {{ $invoice_main->reference_no }}</strong></p>
                                <p><strong>Purchase Date: {{ \Carbon\Carbon::parse($invoice_main->purchase_date)->format('d/m/Y') }}</strong></p>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <div style="clear: both;"></div>
        </div>
        <div class="table-section bill-tbl w-100 mb-lg">
            <table class="table w-100">
                <tbody>
                    <tr>
                        <th class="w-50 bg-items">Our Info</th>
                        <th class="w-50 bg-items">Details</th>
                    </tr>
                    <tr>
                        <td>
                            <div class="box-text">
                                <p>{{ $settings->site_name }}</p>
                                <p>{{ $settings->site_address }}</p>
                                <p>Phone: {{ $settings->site_phone_number }}</p>
                                <p>Email: <a href="mailto:{{ $settings->site_email }}">{{ $settings->site_email }}</a></p>
                                <p>TIN: {{ $settings->tin }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="box-text">
                                <p>{{ $invoice_main->supplier->name }}</p>
                                <p>{{ $invoice_main->supplier->address }}</p>
                                <p>Phone: {{ $invoice_main->supplier->phone }}</p>
                                <p>Email: <a href="mailto:{{ $invoice_main->supplier->email }}">{{ $invoice_main->supplier->email }}</a></p>
                                <p>TIN: {{ !empty($invoice_main->supplier->TIN) ? $invoice_main->supplier->TIN : '' }}</p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-section bill-tbl w-100 mb-lg">
            <table class="table w-100">
                <thead class="bg-items">
                    <tr>
                        <th>#</th>
                        <th>Items</th>
                        <th>Qty</th>
                        <th>Received Qty</th>
                        <th>Price</th>
                        <th>Tax</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($invoice_items))
                        @foreach ($invoice_items as $row)
                            @php
                                $due = App\Models\Bar\POS\PurchaseHistory::where('purchase_id', $row->purchase_id)->where('item_id', $row->item_name)->where('type', 'Purchase Supplier Invoice')->sum('quantity');
                                $qty = $due;
                                $item_name = App\Models\Bar\POS\Items::find($row->item_id);
                                $item_code = App\Models\Bar\POS\Items::find($row->item_id);
                            @endphp
                            <tr align="center">
                                <td>{{ $loop->iteration }}</td>
                                <td><strong>({{ $item_code->item_code }}) - {{ $row->item_name }}</strong></td>
                                <td>{{ number_format($row->quantity ?? 0, 2) }}</td>
                                <td>{{ number_format($row->received_qty ?? 0, 2) }}</td>
                                <td>{{ number_format($row->price, 2) }}</td>
                                <td>{{ number_format($row->total_tax, 2) }}</td>
                                <td>{{ number_format($row->total_cost, 2) }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    @if (!empty($invoice_items))
                        @php
                            $sub_total = 0;
                            $gland_total = 0;
                            $tax = 0;
                            foreach ($invoice_items as $row) {
                                $sub_total += $row->total_cost;
                                $gland_total += $row->total_cost + $row->total_tax;
                                $tax += $row->total_tax;
                            }
                        @endphp
                        <tr>
                            <td colspan="5"></td>
                            <td>Sub Total</td>
                            <td>{{ number_format($sub_total, 2) }} TZS</td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td>Total Tax <small>(VAT 18 %)</small></td>
                            <td>{{ number_format($tax, 2) }} TZS</td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td>Total Amount</td>
                            <td>{{ number_format($gland_total, 2) }} TZS</td>
                        </tr>
                        {{-- @if ($invoice_main->currency != 'TZS')
                            <tr>
                                <td colspan="5"></td>
                                <td><b>Exchange Rate 1 {{ $invoice_main->currency }}</b></td>
                                <td><b>{{ $invoice_main->exchange_rate }} TZS</b></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td>Sub Total</td>
                                <td>{{ number_format($sub_total * $invoice_main->exchange_rate, 2) }} TZS</td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td>Total Tax</td>
                                <td>{{ number_format($tax * $invoice_main->exchange_rate, 2) }} TZS</td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td>Total Amount</td>
                                <td>{{ number_format($invoice_main->exchange_rate * $gland_total, 2) }} TZS</td>
                            </tr>
                        @endif --}}
                    @endif
                </tfoot>
            </table>
        </div>
        <footer>
            This is a computer generated invoice
        </footer>
    </div>
</body>
</html>