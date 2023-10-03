<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <b><h3 style="text-align: center;">Our Products</h3></b><br>

                {{-- <ul class="filter__controls">
                    <li class="active" data-filter="*">Our Products</li>
                    <li data-filter=".new-arrivals">New Arrivals</li>
                    <li data-filter=".hot-sales">Hot Sales</li>
                </ul> --}}
            </div>
        </div>
        <div class="row product__filter">

            @foreach ($product as $product)
                
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="product/{{$product->image}}">
                        {{-- <span class="label">New</span> --}}
                        <ul class="product__hover">
                            <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>{{$product->title}}</h6>
                        <a href="#" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
        

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
</section>