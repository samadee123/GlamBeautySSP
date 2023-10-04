<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 style="text-align: center; font-weight: bold;">Best Sellers</h3><br>

                {{-- <ul class="filter__controls">
                    <li class="active" data-filter="*">Our Products</li>
                    <li data-filter=".new-arrivals">New Arrivals</li>
                    <li data-filter=".hot-sales">Hot Sales</li>
                </ul> --}}
            </div>
        </div>
        <div class="row product__filter">

            @foreach ($product as $products)
                
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="product/{{$products->image}}">
                        {{-- <span class="label">New</span> --}}
                        <ul class="product__hover">
                            <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                            <li><a href="{{url('product_details',$products->id)}}"><img src="img/icon/search.png" alt=""></a><span>Product<br>Details</span></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>{{$products->title}}</h6>
                        <form class="add-cart" action="{{url('add_cart',$products->id)}}" method="Post">

                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    <input type="number" name="quantity" value="1" min="1" style="width: 50px; height:20px">
                                </div>
                                <div class="col-md-4">
                                    <input type="submit" value="+ Add to cart">
                                </div>
                            </div>

                        </form>
                        {{-- <a href="#" class="add-cart">+ Add To Cart</a> --}}
                        {{-- <a href="#" class="">Product Details</a> --}}
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
        

                        @if ($products->discount_price!==null)

                        <h5 style="color: black;">Rs.{{$products->discount_price}}</h5>

                        <h5 style="text-decoration:line-through; color:grey">Rs.{{$products->price}}</h5>

                        @else

                        <h5 style="color: black">Rs.{{$products->price}}</h5>

                        @endif
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>