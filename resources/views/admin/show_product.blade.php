<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')

    <style type="text/css">

    .center
    {
        margin:auto;
        width: 95%;
        border: 2px solid white;
        text-align: center;
        margin-top: 40px;
    }
    .font_size
    {
        text-align: center;
        font-size: 40px;
        padding-top: 20px;
    }
    .img_size
    {
        width: 150px;
        height: 150px;
    }
    .th_color
    {
        background: skyblue;
        color: black;
    }
    .th_deg
    {
        padding: 15px;
    }

    </style>
</head>
<body>
    <div class="container-scroller">

        @include('admin.sidebar')

        @include('admin.header')

        <div class="main-panel">
            <div class="content-wrapper">

                @if(session()->has('message'))

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>

                @endif

                <h2 class="font_size" style="color: black">All Products</h2>

                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">Product Title</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Quantity</th>
                        <th class="th_deg">Catagory</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Discount Price</th>
                        <th class="th_deg">Product Image</th>
                        <th class="th_deg">Delete</th>
                        <th class="th_deg">Edit</th>
                    </tr>

                    @foreach ($product as $product)
                        
                    <tr>
                        <td style="color: black">{{$product->title}}</td>
                        <td style="color: black">{{$product->description}}</td>
                        <td style="color: black">{{$product->quantity}}</td>
                        <td style="color: black">{{$product->catagory}}</td>
                        <td style="color: black">{{$product->price}}</td>
                        <td style="color: black">{{$product->discount_price}}</td>
                        <td>
                            <img class="img_size" src="/product/{{$product->image}}">
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')" href="{{url('delete_product',$product->id)}}">Delete</a>
                        </td>

                        <td>
                            <a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a>
                        </td>
                    </tr>

                    @endforeach

                </table>

            </div>
        </div>

        @include('admin.script')
      
</body>
</html>