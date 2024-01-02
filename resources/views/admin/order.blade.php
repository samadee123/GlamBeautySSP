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
        width: 100%;
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
        width: 200px;
        height: 90px;
    }
    .th_deg
    {
        padding: 5px;
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

                <div style="padding-left: 400px; padding-bottom:30px;">
                    <form action="{{url('search')}}" method="get">
                        @csrf
                        <input type="text" style="color: black;" name="search" placeholder="Search for Something">

                        <input type="submit" value="Search" class="btn btn-outline-primary">
                    </form>
                </div>

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
                        <th class="th_deg">Print PDF</th>
                        {{-- <th class="th_deg">Send Email</th> --}}
                    </tr>

                    @forelse ($order as $order)
                        
                    <tr>
                        <td style="padding: 3px">{{$order->name}}</td>
                        <td style="padding: 3px">{{$order->email}}</td>
                        <td style="padding: 2px">{{$order->address}}</td>
                        <td style="padding: 3px">{{$order->phone}}</td>
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

                            @elseif ($order->delivery_status=='Order Cancelled')

                                <p style="color: red"> Order Cancelled </p>

                            @else

                                <p style="color: red"> Delivered </p>

                            @endif
                        </td>
                        <td style="padding: 5px">
                            <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print PDF</a>
                        </td>

                        {{-- <td style="padding: 2px">
                            <a href="{{url('send_email',$order->id)}}" class="btn btn-info">Send Email</a>
                        </td> --}}
                    </tr>

                    @empty
                    <tr>
                        <td colspan="16">No Data Found</td>
                    </tr>

                    @endforelse

                </table>
            </div>
        </div>

        @include('admin.script')
      
</body>
</html>