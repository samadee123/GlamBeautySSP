<!DOCTYPE html>
<html lang="zxx">

<head>
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

    <style>

        .img_deg
        {
            height: 100px;
            width: 100px;
        }
        .button-container 
        {
            white-space: nowrap;
        }
        .button-container .btn 
        {
            display: inline-block;
        }

    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    @include('home.header')

    @if(session()->has('message'))

        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>

    @endif

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $totalprice=0;  ?>

                                <?php $totalproduct=0;  ?>

                                @foreach ($cart as $cart)
                                    
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img class="img_deg" src="/product/{{$cart->image}}" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{$cart->product_title}}</h6>
                                            {{-- <h5>$98.49</h5> --}}
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                                <h4>{{$cart->quantity}}</h4>
                                        </div>
                                    </td>
                                    <td class="cart__price">Rs.{{$cart->price}}</td>
                                    <td class="cart__close">
                                        <a onclick="return confirm('Are you sure you want to remove this product from the cart?')" href="{{url('remove_cart',$cart->id)}}">
                                            <i class="fa fa-close"></i>
                                        </a>
                                    </td>
                                </tr>

                                <?php $totalproduct++; ?>

                                <?php $totalprice=$totalprice + $cart->price ?>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{url('/')}}">Continue Shopping</a>
                            </div>
                        </div>
                        {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            {{-- <li>Subtotal <span>$ 169.50</span></li> --}}
                            <li>Total <span>Rs.{{$totalprice}}</span></li><br>
                        </ul>
                        <h1 style="font-size: 16px;">PROCEED TO CHECKOUT:</h1>
                        {{-- <a href="#" class="primary-btn">Proceed to checkout</a> --}}
                        <div class="button-container">
                            <a href="{{url('cash_order',$totalproduct)}}" class="btn" style="margin: 10px 0px; padding: 5px 15px; background-color: black; color: white;">Cash on Delivery</a>
                            <a href="" class="btn" style="margin: 10px 20px; padding: 5px 15px; background-color: black; color: white;">Card</a>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

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