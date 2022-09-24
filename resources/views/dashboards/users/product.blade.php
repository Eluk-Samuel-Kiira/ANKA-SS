@extends('dashboards.users.layouts.user_layout')
@section('title','Product')
@section('content')
<!-- Start Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Single Product</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="index.html">Shop</a></li>
                    <li>Single Product</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Item Details -->
<section class="item-details section">
    <div class="container">
        <div class="top-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-images">
                        <main id="gallery">
                            <div class="main-img">
                                <img src="assets/images/products/product.jpeg" id="current" alt="#">
                            </div>
                            <div class="images">
                                <img src="assets/images/products/product.jpeg" class="img" alt="#">
                                <img src="assets/images/products/product.jpeg" class="img" alt="#">
                                <img src="assets/images/products/product.jpeg" class="img" alt="#">
                                <img src="assets/images/products/product.jpeg" class="img" alt="#">
                                <img src="assets/images/products/product.jpeg" class="img" alt="#">
                            </div>
                        </main>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-info">
                        <h2 class="title">{{ $product->product }}</h2>
                        <h3 class="price">${{$product->price}}</h3>
                        <p class="info-text">{{ $product->description }}</p>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group color-option">
                                    <label class="title-label" for="size">Choose color</label>
                                    <div class="single-checkbox checkbox-style-1">
                                        <input type="checkbox" id="checkbox-1" checked>
                                        <label for="checkbox-1"><span></span></label>
                                    </div>
                                    <div class="single-checkbox checkbox-style-2">
                                        <input type="checkbox" id="checkbox-2">
                                        <label for="checkbox-2"><span></span></label>
                                    </div>
                                    <div class="single-checkbox checkbox-style-3">
                                        <input type="checkbox" id="checkbox-3">
                                        <label for="checkbox-3"><span></span></label>
                                    </div>
                                    <div class="single-checkbox checkbox-style-4">
                                        <input type="checkbox" id="checkbox-4">
                                        <label for="checkbox-4"><span></span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group quantity">
                                    <label for="color">Quantity</label>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-content">
                            <div class="row align-items-end">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="button cart-button">
                                        <button class="btn" style="width: 100%;">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-details-info">
            <div class="single-block">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="info-body custom-responsive-margin">
                            <h4>Description</h4>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="info-body">
                            <h4>Manufacturer</h4>
                            <ul class="features">
                                <li><a href="{{ route('product.participant',$product->uname) }}">{{ $product->uname }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
