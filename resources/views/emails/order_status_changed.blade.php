<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>وضعیت سفارش تغییر کرد.</title>
</head>
<body>
    <h2>سلام {{ $order->user->name }},</h2>

    <p>{{ $statusMessage }}</p>

    <p>Order ID: {{ $order->id }}</p>
    <p>ممنون از خرید شما!</p>
</body>
</html>
