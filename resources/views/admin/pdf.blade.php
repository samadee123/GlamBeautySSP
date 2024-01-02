<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h3 {
            margin: 0;
            color: #333;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .details {
            margin-bottom: 20px;
        }

        .details h3 {
            margin-top: 10px;
            font-size: 16px;
            color: #555;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
        }

        p {
            margin: 0;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>

    <div class="container">

        <h1>Order Confirmation</h1><br><br>

        <div class="details">
            <h3>Order ID: {{$order->id}}</h3>
            <h3>Customer Name: {{$order->name}}</h3>
            <h3>Email: {{$order->email}}</h3>
            <h3>Phone No: {{$order->phone}}</h3>
            <h3>Address: {{$order->address}}</h3>
            <h3>Product: {{$order->product_title}}</h3>
            <h3>Quantity: {{$order->quantity}}</h3>
            <h3>Price: {{$order->price}}</h3>
            <h3>Payment Status: {{$order->payment_status}}</h3>
            <h3>Delivery Status: {{$order->delivery_status}}</h3>
        </div>

        <img src="product/{{$order->image}}" alt="Product Image">

    </div>

</body>
</html>
