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

                <h2 class="font_size"  style="color: black">All Users</h2>

                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">Name</th>
                        <th class="th_deg">Email</th>
                        <th class="th_deg">Phone</th>
                        <th class="th_deg">Address</th>
                        <th class="th_deg">Remove</th>
                    </tr>

                    @foreach ($user as $user)
                        
                    <tr>
                        <td style="padding-bottom: 20px; color: black">{{$user->name}}</td>
                        <td style="padding-bottom: 20px; color: black">{{$user->email}}</td>
                        <td style="padding-bottom: 20px; color: black">{{$user->phone}}</td>
                        <td style="padding-bottom: 20px; color: black">{{$user->address}}</td>
                        <td style="padding-bottom: 20px;">
                            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this user?')" href="{{url('delete_user',$user->id)}}">Remove</a>
                        </td>
                    </tr>

                    @endforeach

                </table>

            </div>
        </div>

        @include('admin.script')    
</body>
</html>