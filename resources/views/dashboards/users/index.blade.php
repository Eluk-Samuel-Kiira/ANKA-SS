
@extends('dashboards.users.layouts.user_layout')
@section('title','ANKA | SHOP')
@section('content')
<!-- Start Hero Area -->
<section class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 custom-padding-right">
                <div class="slider-head">
                    <!-- Start Hero Slider -->
                    <div class="hero-slider">
                        <!-- Start Single Slider -->
                        <div class="single-slider"
                            style="background-color:#e6e6e6;">
                            <div class="content">
                                <h2><span>No restocking fee ($35 savings)</span>
                                    M75 Sport Watch
                                </h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                                <h3><span>Now Only</span> $320.99</h3>
                                <div class="button">
                                    <a href="{{ route('user.dashboard') }}" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Slider -->
                        <!-- Start Single Slider -->
                        <div class="single-slider"
                            style="background-color:#e6e6e6;">
                            <div class="content">
                                <h2><span>Big Sale Offer</span>
                                    Get the Best Deal on CCTV Camera
                                </h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                                <h3><span>Combo Only:</span> $590.00</h3>
                                <div class="button">
                                    <a href="{{ route('user.dashboard') }}" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Slider -->
                    </div>
                    <!-- End Hero Slider -->
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                        <!-- Start Small Banner -->
                        <div class="hero-small-banner"
                            style="background-color:#e6e6e6;">
                            <div class="content">
                                <h2>
                                    <span>New line required</span>
                                    iPhone 12 Pro Max
                                </h2>
                                <h3>$259.99</h3>
                            </div>
                        </div>
                        <!-- End Small Banner -->
                    </div>
                    <div class="col-lg-12 col-md-6 col-12">
                        <!-- Start Small Banner -->
                        <div class="hero-small-banner style2">
                            <div class="content">
                                <h2>Weekly Sale!</h2>
                                <p>Saving up to 50% off all online store items this week.</p>
                                <div class="button">
                                    <a class="btn" href="{{ route('user.dashboard') }}">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Start Small Banner -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hero Area -->

<!-- Start Trending Product Area -->
<section class="trending-product section" style="margin-top: 12px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Our Product</h2>
                    <p>Welcome to our products section, please choose all the products you want to add to the cart.
                        we are very grateful for the support. Enjoy your shopping. We are looking forward to giving
                        you an unforgetable experience.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @if (count($products)!=0)
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-image">
                                <img src="assets/images/products/product.jpeg" alt="#">
                                <div class="button">
                                    <form method="POST" action="{{route('store-cart')}}">
                                        @csrf
                                        <input hidden="true" value="{{ auth()->user()->id }}" name="user_id">
                                        <input hidden="true" value="{{$product->id}}" name="product_id">
                                        <button type="submit" class="btn"><i class="lni lni-cart"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="product-info">
                                <h4 class="title">
                                    <a href="{{ route('product.show',$product->id) }}">{{ $product->product }}</a>
                                </h4>
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star"></i></li>
                                    <li><span>4.0 Review(s)</span></li>
                                </ul>
                                <div class="price">
                                    <span>${{$product->price}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    </div>
                @endforeach
            @else
            <h4 class="text-center">No products availabe</h4>
            @endif
        </div>
    </div>
</section>
<!-- End Trending Product Area -->
@endsection()
