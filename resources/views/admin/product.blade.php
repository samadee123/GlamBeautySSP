<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')

    <style type="text/css">
    .div_center
    {
        text-align: center;
        padding-top: 40px;
    }
    .font_size
    {
        font-size: 40px;
        padding-bottom: 40px;
    }
    .text_color
    {
        color: black;
        padding-bottom: 20px;
    }
    label
    {
        display: inline-block;
        width: 200px;
    }
    .div_design
    {
        padding-bottom: 15px;
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
                
                <div class="div_center">
                    <h1 class="font_size" style="color: black">Add Product</h1>

                    <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="div_design">
                        <label style="color: black">Product Title : </label>
                        <input class="text_color" type="text" name="title" placeholder="Write a title" required="">
                    </div>

                    <div class="div_design">
                        <label style="color: black">Product Description : </label>
                        <input class="text_color" type="text" name="description" placeholder="Write a description" required="">
                    </div>

                    <div class="div_design">
                        <label style="color: black">Product Price : </label>
                        <input class="text_color" type="number" name="price" placeholder="Write a price" required="">
                    </div>

                    <div class="div_design">
                        <label style="color: black">Discount Price : </label>
                        <input class="text_color" type="number" name="dis_price" placeholder="Write a discount if apply">
                    </div>

                    <div class="div_design">
                        <label style="color: black">Product Quantity : </label>
                        <input class="text_color" type="number" min="0" name="quantity" placeholder="Write a quantity" required="">
                    </div>

                    <div class="div_design">
                        <label style="color: black">Product Catagory : </label>
                        <select class="text_color" name="catagory" required="">
                            <option value="" selected="">Add a catagory here</option>

                            @foreach ($catagory as $catagory)
                                
                            <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>

                            @endforeach
                        </select>
                    </div>

                    <div class="div_design">
                        <label style="color: black">Product Image Here : </label>
                        <input style="color: black" type="file" name="image" required="">
                    </div>

                    <div class="div_design">
                        <input style="color: black" type="submit" value="Add Product" class="btn btn-primary">
                    </div>

                </form>

                </div>
            </div>
        </div>

        @include('admin.script')
      
</body>
</html>