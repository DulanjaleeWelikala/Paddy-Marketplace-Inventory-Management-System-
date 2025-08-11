<!DOCTYPE html>
<html>
<head>
    <title>Order Report - ICC PVT Ltd</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        header {
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        header img {
            height: 80px;
            margin-right: 20px;
        }

        .company-info {
            text-align: center;
            flex: 1;
        }

        .report-meta {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 8px;
            border: 1px solid #000;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            margin-top: 15px;
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>
<body>

    <header>
        <img src="{{ public_path('img/logo1.png') }}" alt="Logo">
        <div class="company-info">
            <h2>ICC PVT Ltd</h2>
            <h4>Order Report</h4>
        </div>
    </header>

    <div class="report-meta">
        <p><strong>From:</strong> {{ $request->from }} &nbsp;&nbsp;
           <strong>To:</strong> {{ $request->to }}</p>
        <p><strong>Status:</strong> {{ ucfirst($request->status) }}</p>
        <p><strong>Generated on:</strong> {{ now()->format('Y-m-d H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Farmer ID</th>
                <th>Paddy ID</th>
                <th>Product Name</th>
                <th>Quantity (kg)</th>
                <th>Date</th>
                <th>Status</th>
                <th>Total Amount (LKR)</th>
            </tr>
        </thead>
        <tbody>
            @php $totalAmount = 0; @endphp
            @foreach($orders as $order)
                <tr>
                    <td>OR{{ $order->id }}</td>
                    <td>FM{{ $order->farmer_id }}</td>
                    <td>PD{{ $order->paddy_id }}</td>
                    <td>{{ $order->product_name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>{{ number_format($order->price, 2) }}</td>
                </tr>
                @php $totalAmount += $order->price; @endphp
            @endforeach
        </tbody>
    </table>

    <p class="total">Total Order Amount: LKR {{ number_format($totalAmount, 2) }}</p>

</body>
</html>
