<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Shipped</title>
</head>
<body>
    <h1>Your Order Has Been Shipped!</h1>

    <p>Hello {{ $userEmail }},</p>

    <p>We are pleased to inform you that your order has been shipped. Here are the details:</p>

    <ul>
        @foreach ($ordersData as $order)
            <li>
                <strong>Product ID:</strong> {{ $order['product_id'] }}<br>
                <strong>Quantity:</strong> {{ $order['quantity'] }}<br>
                <strong>Order Date:</strong> {{ $order['updated_at'] }}<br>
                <!-- Add other order details as needed -->
            </li>
            <br>
        @endforeach
    </ul>

    <p>Thank you for shopping with us!</p>
</body>
</html>
