<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Paddy Variety Product Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            line-height: 1.5;
            margin: 20px;
        }

        header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        header img {
            height: 70px;
            margin-right: 20px;
        }

        .company-info {
            flex: 1;
            text-align: center;
        }

        h2 {
            margin: 0;
        }

        .report-title {
            text-align: center;
            font-size: 18px;
            margin-top: 10px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px 10px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        .footer {
            position: fixed;
            bottom: -30px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 12px;
        }

        .pagenum:before {
            content: counter(page);
        }

        .total {
            text-align: right;
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <header>
        <img src="{{ public_path('img/logo1.png') }}" alt="Logo">
        <div class="company-info">
            <h2>ICC PVT Ltd</h2>
            <p>Paddy Variety Product Report</p>
            <p><strong>Generated on:</strong> {{ now()->format('Y-m-d H:i') }}</p>
        </div>
    </header>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Paddy ID</th>
                <th>User ID</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price (Rs.)</th>
                <th>Quantity (kg)</th>
                <th>Badge</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($paddies as $index => $paddy)
            @php $subtotal = $paddy->price * $paddy->quantity; $total += $subtotal; @endphp
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $paddy->paddy_id }}</td>
                <td>FM{{ $paddy->added_by }}</td>
                <td>{{ $paddy->product_name }}</td>
                <td>{{ $paddy->description }}</td>
                <td>{{ number_format($paddy->price, 2) }}</td>
                <td>{{ $paddy->quantity }}</td>
                <td>{{ $paddy->badge ?? '—' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p class="total">Total Value of All Products: Rs. {{ number_format($total, 2) }}</p>

    <div class="footer">
        Page <span class="pagenum"></span>
    </div>

</body>
</html>
