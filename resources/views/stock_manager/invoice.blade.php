<!DOCTYPE html>
<html>
<head>
    <title>Order Invoice</title>
</head>
<body>
    <h1>🧾 Order Invoice - #{{ $order->id }}</h1>
    <p><strong>Paddy:</strong> {{ $order->paddy->name }}</p>
    <p><strong>Quantity:</strong> {{ $order->quantity }} kg</p>
    <p><strong>Approved Date:</strong> {{ now()->format('Y-m-d') }}</p>
    <p><strong>Approved By:</strong> Stock Manager</p>
</body>
</html>
