@extends('layouts.mastershop')

@section('title', 'Home - JDM Techno Computer Center')

@section('content')


<section class="hero-section">
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="https://pcx.com.ph/wp-content/uploads/2018/07/LENOVO-L340-Shop-Page-Banner-1774-x-500-px.jpg">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </div>
        <div class="hs-item set-bg" data-setbg="https://pcx.com.ph/wp-content/uploads/2019/11/9-Hero-Slider-Desktop-1920-x-700.jpg">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="slide-num-holder" id="snh-1"></div>
    </div>
</section>

<!-- Features section -->
<section class="features-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 p-0 feature">
                <div class="feature-inner">
                    <div class="feature-icon">
                        <img src="{{asset('src/1.png')}}" alt="#">
                    </div>
                    <h2>Fast Secure Payments</h2>
                </div>
            </div>
            <div class="col-md-4 p-0 feature">
                <div class="feature-inner">
                    <div class="feature-icon">
                        <img src="{{asset('src/2.png')}}" alt="#">
                    </div>
                    <h2>Premium Products</h2>
                </div>
            </div>
            <div class="col-md-4 p-0 feature">
                <div class="feature-inner">
                    <div class="feature-icon">
                        <img src="{{asset('src/3.png')}}" alt="#">
                    </div>
                    <h2>Free & fast Delivery</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Features section end -->


<!-- letest product section -->
<section class="top-letest-product-section">
    <div class="container">
        <div class="section-title">
            <h2>LATEST PRODUCTS</h2>
        </div>
        <div class="product-slider owl-carousel">
            @foreach ($products as $product)
            <div class="product-item">
                <div class="pi-pic">
                    <img src="{{asset('/images/'.$product->image)}}" alt="image">
                    <div class="pi-links">
                        <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                        <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                    </div>
                </div>
                <div class="pi-text">
                    <h6>&#8369; {{number_format($product->price_min, 2, '.', ',')}}</h6>
                    <p>{{ $product->product_name }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- letest product section end -->



<!-- Product filter section -->
<section class="product-filter-section">
    <div class="container">
        <div class="section-title">
            <h2>BROWSE TOP SELLING PRODUCTS</h2>
        </div>
        <ul class="product-filter-menu">
            <li><a href="#">Processors</a></li>
            <li><a href="#">Motherboards</a></li>
            <li><a href="#">Graphics Card</a></li>
            <li><a href="#">Casing & PSU</a></li>
            <li><a href="#">Monitors</a></li>
            <li><a href="#">Other Components</a></li>
            <li><a href="#">Peripherals</a></li>
        </ul>
        <div class="row">
            @foreach ($products as $product)
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="{{asset('/images/'.$product->image)}}" alt="image">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i></i><span>ADD TO CART</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                        <h6>&#8369; {{number_format($product->price_min, 2, '.', ',')}}</h6>
                        <p>F{{ $product->product_name }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center pt-5">
            <button class="site-btn sb-line sb-dark">LOAD MORE</button>
        </div>
    </div>
</section>

<!-- Product filter section end -->


<!-- Banner section -->
<section class="banner-section">
    <div class="container">
        <div class="banner set-bg" data-setbg="img/banner-bg.jpg">
            <div class="tag-new">NEW</div>
            <span>New Arrivals</span>
            <h2>STRIPED SHIRTS</h2>
            <a href="#" class="site-btn">SHOP NOW</a>
        </div>
    </div>
</section>

@endsection