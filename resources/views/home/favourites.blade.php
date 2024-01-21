<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
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

    
    @include('home.header')
    <section class="product spad">
        <div class="container"><br><br><br>
            <div class="row product__filter">
                    
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                            {{-- <span class="label">New</span> --}}
                            <ul class="product__hover">
                                    {{-- <li><a href=""><img src="img/icon/heart.png" alt=""></a></li> --}}
                                    <li><a href=""><img src="img/icon/search.png" alt=""></a><span>Product<br>Details</span></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Hair Spray</h6>
                            <form class="add-cart" action="" method="Post">
    
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="number" name="quantity" value="1" min="1" class="quantity-input" style="width: 60px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px; font-size: 14px;">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="submit" value="Add to Cart" class="add-to-cart-button" style="background-color: rgb(235, 235, 235); color: black; border: none;border-radius: 5px; padding: 10px 20px; cursor: pointer; font-size: 14px; transition: background-color 0.3s ease;">
                                    </div>
                                </div>
    
                            </form>
    
                            <h5 style="color: black;">Rs.5000</h5>
    
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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