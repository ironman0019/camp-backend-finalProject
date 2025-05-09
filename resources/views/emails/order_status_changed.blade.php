<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>وضعیت سفارش تغییر کرد.</title>
</head>
<body>
    <h2>سلام {{ $order->user->name }},</h2>

    <p>{{ $statusMessage }}</p>

    <p>کد رهگیری: {{ $order->tracking_code }}</p>
    <p>ممنون از خرید شما!</p>
</body>
</html>
