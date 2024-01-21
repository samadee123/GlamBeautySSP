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
        width: 250px;
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
    .description-column {
        max-width: 1500px; /* Adjust the max-width as needed */

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

                <h2 class="font_size">All Blogs</h2>

                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">Blog Title</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Blog Image</th>
                        <th class="th_deg">Delete</th>
                        <th class="th_deg">Edit</th>
                    </tr>

                    @foreach ($blogs as $blogs)
                        
                    <tr>
                        <td>{{$blogs->title}}</td>
                        <td class="description-column">{{$blogs->description}}</td>
                        <td>
                            <img class="img_size" src="/blog/{{$blogs->image}}">
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')" href="">Delete</a>
                        </td>

                        <td>
                            <a class="btn btn-success" href="">Edit</a>
                        </td>
                    </tr>

                    @endforeach

                </table>

            </div>
        </div>

        @include('admin.script')
      
</body>
</html>