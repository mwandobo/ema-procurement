<!DOCTYPE html>
<html>
<head>
    <title>Income Statement</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .total-row { font-weight: bold; background-color: #f9f9f9; }
        .title { text-align: center; font-size: 20px; font-weight: bold; margin-top: 20px; }
    </style>
</head>
<body>

    <div class="title">Income Statement ({{ $data['start_date'] }} - {{ $data['end_date'] }})</div>

    <h3>Income</h3>
    <table>
        <tr>
            <th>GL Code</th>
            <th>Account</th>
            <th>Balance</th>
        </tr>
        @foreach ($data['income'] as $income)
            <tr>
                <td>{{ $income['gl_code'] }}</td>
                <td>{{ $income['name'] }}</td>
                <td>{{ $income['balance'] }}</td>
            </tr>
        @endforeach
        <tr class="total-row">
            <td colspan="2">Total Income</td>
            <td>{{ $data['total_income'] }}</td>
        </tr>
    </table>

    <h3>Expenses</h3>
    <table>
        <tr>
            <th>GL Code</th>
            <th>Account</th>
            <th>Balance</th>
        </tr>
        @foreach ($data['expenses'] as $expense)
            <tr>
                <td>{{ $expense['gl_code'] }}</td>
                <td>{{ $expense['name'] }}</td>
                <td>{{ $expense['balance'] }}</td>
            </tr>
        @endforeach
        <tr class="total-row">
            <td colspan="2">Total Expenses</td>
            <td>{{ $data['total_expenses'] }}</td>
        </tr>
    </table>

    <h3>Summary</h3>
    <table>
        <tr class="total-row">
            <td colspan="2">Net Profit</td>
            <td>{{ $data['net_profit'] }}</td>
        </tr>
    </table>

</body>
</html>

