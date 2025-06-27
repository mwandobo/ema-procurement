<!DOCTYPE html>
<html>
<head>
    <title>Clearing Tracking Report</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .header { text-align: center; margin-bottom: 20px; }
        .details { margin-bottom: 20px; }
        .table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .table th, .table td { border: 1px solid #000; padding: 8px; text-align: left; }
        .table th { background-color: #f2f2f2; }
        .total { margin-top: 20px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Clearing Tracking Report</h2>
        <p>Reference No: {{ $reference_no }}</p>
    </div>
    <div class="details">
        <h3>Invoices</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Reference No</th>
                    <th>Clearing Cost</th>
                    <th>Shipping Cost</th>
                    <th>Total Cost</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalClearingCost = 0;
                    $totalShippingCost = 0;
                @endphp
                @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $invoice->reference_no }}</td>
                        <td>{{ number_format($invoice->clearing_cost, 2) }}</td>
                        <td>{{ number_format($invoice->shipping_cost, 2) }}</td>
                        <td>{{ number_format($invoice->clearing_cost + $invoice->shipping_cost, 2) }}</td>
                    </tr>
                    @php
                        $totalClearingCost += $invoice->clearing_cost;
                        $totalShippingCost += $invoice->shipping_cost;
                    @endphp
                @endforeach
            </tbody>
        </table>

        <h3>Clearing Items</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Item Code</th>
                    <th>Item Name</th>
                    <th>Item Tax</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalItemTax = 0;
                @endphp
                @foreach ($groupedItems as $item)
                    <tr>
                        <td>{{ $item['item_code'] }}</td>
                        <td>{{ $item['item_name'] }}</td>
                        <td>{{ number_format($item['item_tax'], 2) }}</td>
                    </tr>
                    @php
                        $totalItemTax += $item['item_tax'];
                    @endphp
                @endforeach
            </tbody>
        </table>
        <div class="total">
            <p>Total Item Tax: {{ number_format($totalItemTax, 2) }}</p>
            <p>Total Clearing Cost: {{ number_format($totalClearingCost, 2) }}</p>
            <p>Total Shipping Cost: {{ number_format($totalShippingCost, 2) }}</p>
            <p>Total Items Clearing (with Shipping) Cost: {{ number_format($totalClearingCost + $totalShippingCost + $totalItemTax, 2) }}</p>
        </div>
    </div>
</body>
</html>