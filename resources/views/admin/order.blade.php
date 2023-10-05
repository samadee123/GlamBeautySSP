<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')

    <style type="text/css">

    .title_deg
    {
        text-align: center;
        font-size: 25px;
        font-weight: bold;
        padding-bottom: 40px;
    }
    .table_deg
    {
        border: 2px solid white;
        width: 95%;
        margin: auto;
        text-align: center;
    }
    .th_deg
    {
        background-color: skyblue;
        color: black;
    }
    .img_size
    {
        width: 160px;
        height: 110px;
    }
    .th_deg
    {
        padding: 15px;
    }
    .btn-custom 
    {
        background-color: green;
        color: white;
    }

    </style>
</head>
<body>
    <div class="container-scroller">

        @include('admin.sidebar')

        @include('admin.header')

        <div class="main-panel">
            <div class="content-wrapper">
                <h1 class="title_deg">All Orders</h1>

                <table class="table_deg">

                    <tr class="th_deg">
                        <th class="th_deg">Name</th>
                        <th class="th_deg">Email</th>
                        <th class="th_deg">Address</th>
                        <th class="th_deg">Phone</th>
                        <th class="th_deg">Product Title</th>
                        <th class="th_deg">Quantity</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Payment Status</th>
                        <th class="th_deg">Delivery Status</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg">Delivered</th>
                    </tr>

                    @foreach ($order as $order)
                        
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td>
                            <img class="img_size" src="/product/{{$order->image}}">
                        </td>
                        <td>
                            @if($order->delivery_status=='Processing')

                            <a href="{{url('delivered',$order->id)}}" class="btn btn-custom" onclick="return confirm('Are You Sure this Product is Delivered?')">Delivered</a>

                            @else

                                <p style="color: red"> Delivered </p>

                            @endif
                            {{-- <a href="{{url('delivered',$order->id)}}" class="btn btn-custom">Delivered</a> --}}
                        </td>
                    </tr>

                    @endforeach

                </table>
            </div>
        </div>

        @include('admin.script')
      
</body>
</html>