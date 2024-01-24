<!DOCTYPE html>
<html lang="zxx">

<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Glam Beauty</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="home/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="home/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="home/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="home/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="home/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="home/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="home/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="home/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>Free shipping, 30-day return or refund guarantee.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">
                            @if (Route::has('login'))

                            @auth 
                            
                            <x-app-layout>
    
                            </x-app-layout>

                            @else
                                <a href="{{ route('login') }}">Login</a>
                                <a href="{{ route('register') }}">Register</a>
                            @endauth
                            @endif
                        </div>
                        {{-- <div class="header__top__hover">
                            <span>Usd <i class="arrow_carrot-down"></i></span>
                            <ul>
                                <li>USD</li>
                                <li>EUR</li>
                                <li>USD</li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" >
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="{{url('/')}}"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li class="active"><a href="{{url('/shop')}}">Shop</a></li>
                        {{-- <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./about.html">About Us</a></li>
                                <li><a href="./shop-details.html">Shop Details</a></li>
                                <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li> --}}
                        <li><a href="{{url('/allblogs')}}">Blogs</a></li>
                        <li><a href="{{url('contact_us')}}">Contact-Us</a></li>
                        <li><a href="{{url('show_order')}}">Orders</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                    <a href="{{url('show_fav')}}"><img src="img/icon/heart.png" alt=""></a>
                    <a href="{{url('show_cart')}}"><img src="img/icon/cart.png" alt=""></a>
                    {{-- <div class="price">Cart</div> --}}
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
<!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container" style="padding-left: 150px; padding-right: 150px;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url('/')}}">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="{{url('product_search')}}" method="GET">
                                @csrf
                                <input type="text" placeholder="Search..." name="search">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    <li><a href="{{url('skin_filter')}}">Skin Care (20)</a></li>
                                                    <li><a href="{{url('hair_filter')}}">Hair Care (20)</a></li>
                                                    <li><a href="{{url('makeup_filter')}}">Makeup (20)</a></li>
                                                    <li><a href="{{url('fragrance_filter')}}">Fragrance (20)</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                    </div>
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                    <li><a href="{{url('firstprice_filter')}}">Rs.0.00 - Rs.5000.00</a></li>
                                                    <li><a href="{{url('secondprice_filter')}}">Rs.5000.00 - Rs.15,000.00</a></li>
                                                    <li><a href="{{url('thirdprice_filter')}}">Rs.15,000.00 - Rs.30,000.00</a></li>
                                                    <li><a href="{{url('fourthprice_filter')}}">Rs.30,000.00+</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing 1-12 of 126 results</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sort by Price:</p>
                                    <select>
                                        <option value="">Low To High</a></option>
                                        <option value="">High To Low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(session()->has('message'))

                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{session()->get('message')}}
                        </div>

                    @endif
                    
                    <div class="row">

                        @foreach ($product as $product)
                            
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="product/{{$product->image}}">
                                    <ul class="product__hover">
                                        <li>
                                            <form class="add-fav" action="{{url('add_fav',$product->id)}}" method="Post">
                                                @csrf
                                                <button type="submit" class="heart-button" style="border: none; background-color: transparent; cursor: pointer;">
                                                    <img src="img/icon/heart.png" alt="">
                                                </button>
                                            </form>
                                        </li>
                                        <li><a href="{{url('product_details',$product->id)}}"><img src="img/icon/search.png" alt=""><span>Product<br>Details</span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>{{$product->title}}</h6>   
                                    <form class="add-cart" action="{{url('add_cart',$product->id)}}" method="Post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="number" name="quantity" value="1" min="1" class="quantity-input" style="width: 60px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px; font-size: 14px;">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="submit" value="Add to Cart" class="add-to-cart-button" style="background-color: rgb(235, 235, 235); color: black; border: none;border-radius: 5px; padding: 10px 20px; cursor: pointer; font-size: 14px; transition: background-color 0.3s ease;">
                                            </div>
                                        </div>
            
                                    </form>   

                                    @if ($product->discount_price!==null)

                                    <h5 style="color: black;">Rs.{{$product->discount_price}}</h5>

                                    <h5 style="text-decoration:line-through; color:grey">Rs.{{$product->price}}</h5>

                                    @else

                                    <h5 style="color: black">Rs.{{$product->price}}</h5>

                                    @endif
                                    
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    @include('home.footer')

    <!-- Js Plugins -->
    <script src="home/js/jquery-3.3.1.min.js"></script>
    <script src="home/js/bootstrap.min.js"></script>
    <script src="home/js/jquery.nice-select.min.js"></script>
    <script src="home/js/jquery.nicescroll.min.js"></script>
    <script src="home/js/jquery.magnific-popup.min.js"></script>
    <script src="home/js/jquery.countdown.min.js"></script>
    <script src="home/js/jquery.slicknav.js"></script>
    <script src="home/js/mixitup.min.js"></script>
    <script src="home/js/owl.carousel.min.js"></script>
    <script src="home/js/main.js"></script>
</body>

</html>