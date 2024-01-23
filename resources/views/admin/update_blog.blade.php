<!DOCTYPE html>
<html lang="en">
<head>

    <base href="/public">
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
                    <h1 class="font_size" style="color: black">Update Blog</h1>

                    <form action="{{url('/update_blog_confirm',$blogs->id)}}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="div_design">
                        <label style="color: black">Blog Title : </label>
                        <input class="text_color" type="text" name="title" placeholder="Write a title" required="" value="{{$blogs->title}}">
                    </div>

                    <div class="div_design">
                        <label style="color: black">Product Description : </label>
                        <input class="text_color" type="text" name="description" placeholder="Write a description" required="" value="{{$blogs->description}}">
                    </div>

                    <div class="div_design">
                        <label style="color: black">Current Blog Image : </label>
                        <img style="margin:auto;" height="100" width="100" src="/blog/{{$blogs->image}}">
                    </div>

                    <div class="div_design">
                        <label style="color: black">Change Blog Image : </label>
                        <input style="color: black" type="file" name="image">
                    </div>

                    <div class="div_design">
                        <input style="color: black" type="submit" value="Update Blog" class="btn btn-primary">
                    </div>

                </form>

                </div>
            </div>
        </div>

        @include('admin.script')
      
</body>
</html>