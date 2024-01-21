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
    input.text_color, textarea.text_color {
            width: 300px;
            padding: 16px; /* Adjust padding as needed */
            box-sizing: border-box;
        }
        .text-center {
        text-align: center;
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
                    <h1 class="font_size">Add Blog</h1>

                    <form action="{{url('/add_blog')}}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="div_design">
                        <label>Blog Title : </label>
                        <input class="text_color" type="text" name="title" id="title" placeholder="Write a title" required="">
                    </div>

                    <div class="div_design flex-center">
                        <label>Blog Description : </label>
                        <textarea class="text_color" type="text" name="description" id="description" cols="30" rows="10"placeholder="Write a description" required=""></textarea>
                    </div> <br>

                    <div class="div_design">
                        <label>Blog Image Here : </label>
                        <input type="file" name="image" required="">
                    </div>

                    <div class="div_design">
                        <input type="submit" value="Add Blog" class="btn btn-primary">
                    </div>

                </form>

                </div>
            </div>
        </div>

        @include('admin.script')
      
</body>
</html>