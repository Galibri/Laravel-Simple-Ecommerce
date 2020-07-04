@extends('layouts.frontend')

@section('content')
<!--hero section start-->
<div id="home">
    <section class="hero js_full_height base-gradient- " style="background-image: url('{{ asset('assets/frontend/img/hero.jpg') }}')">
        <div class="hero-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-5" data-wow-duration="2s" data-wow-delay="1s">
                        <h1 class="hero-title">Olive color winter jacket
                            for ladies
                        </h1>
                        <a href="#" class="hero-link">Winter Fashion</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!--hero section end-->

<main class="site-main">
    <!--shop category start-->
    <section class="space-3">
        <div class="container sm-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2 class="title"> Shop By Category</h2>
                    </div>
                </div>

                <div class="col-md-12">
                    <ul class="products columns-3">
                        @foreach($categories as $key => $category)
                        <li class="product-category product {{ ($key+1) % 3 == 0 ? 'last' : '' }}">
                            <a href="{{ route('frontend.product_category', $category->slug) }}">
                                @if($category->thumbnail)
                                <img src="{{ asset($category->thumbnail) }}" alt="{{ $category->name }}">
                                @else
                                <img src="{{ asset('assets/frontend/img/pc1.jpg') }}" alt="{{ $category->name }}">
                                @endif
                                <h2 class="woocommerce-loop-category__title">
                                    {{ $category->name }}
                                    <!--<mark class="count">(14)</mark>-->
                                </h2>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--shop category end-->

    <!--product section start-->
    <section class="space-3 space-adjust">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="section-title text-center">
                        <h2 class="title ">New Arrival</h2>
                        <div class="sub-title">37 New fashion products arrived recently in our showroom for this
                            winter
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <ul class="products columns-3">
                        @foreach($products as $key => $product)
                        <li class="product {{ ($key+1) % 3 == 0 ? 'last' : '' }}">
                            <div class="product-wrap">
                                <a href="{{ route('frontend.product', $product->slug) }}" class="">
                                    @if($product->thumbnail)
                                    <img src="{{ asset($product->thumbnail) }}" alt="">
                                    @else
                                    <img src="{{ asset('assets/frontend/img/p1.jpg') }}" alt="">
                                    @endif
                                </a>
                                <a href="#" data-id="{{ $product->id }}" class="button product_type_simple add_to_cart_button ajax_add_to_cart add-to-cart">
                                    <i class="fa fa-shopping-basket"></i>
                                </a>
                            </div>
                            <div class="woocommerce-product-title-wrap">
                                <h2 class="woocommerce-loop-product__title">
                                    <a href="{{ route('frontend.product', $product->slug) }}">{{ $product->title }}</a>
                                </h2>
                                <a href="#" class="wish-list"><i class="fa fa-heart-o"></i></a>
                            </div>
                            {!! $product->selling_price != 0 ? "<span class='onsale'>Sale!</span>" : '' !!}
                            @if($product->selling_price != 0)
                            <span class="price">
                                <del>
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">$</span>
                                        {{ number_format($product->price, 2) }}
                                    </span>
                                </del>
                                <ins>
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">$</span>
                                        {{ number_format($product->selling_price, 2) }}
                                    </span>
                                </ins>

                            </span>
                            @else
                            <span class="price">
                                <ins>
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">$</span>
                                        {{ number_format($product->price, 2) }}
                                    </span>
                                </ins>

                            </span>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('frontend.shop') }}" class="view-all-product mt-md-5">View All Products</a>
                </div>

            </div>
        </div>
    </section>
    <!-- product section end-->

    <!--promo section start-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="promo-box space-3">
                        <div class="promo-img rounded bg-overlay" data-overlay="1" style="background-image: url('{{ asset('assets/frontend/img/sb.jpg') }}');"></div>
                        <div class="container">
                            <div class="row justify-content-center align-items-center text-center">
                                <div class="col-md-8">
                                    <!-- heading -->
                                    <h2 class="text-white mb-0 promo-title">
                                        Sale
                                    </h2>
                                    <h3 class="text-white promo-sub-title mt-0">Up to 50% off</h3>

                                    <a href="#" class="promo-link">in store and online</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--promo section end-->

    <!--product section start-->
    <section class="space-3">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="section-title text-center">
                        <h2 class="title ">Popular Product</h2>
                        <!--<div class="sub-title">37 New fashion products arrived recently in our showroom for this-->
                        <!--winter-->
                        <!--</div>-->
                    </div>
                </div>

                <div class="col-md-12">
                    <ul class="products columns-3">
                        <li class="product">
                            <div class="product-wrap">
                                <a href="#" class="">
                                    <img src="{{ asset('assets/frontend/img/p10.jpg') }}" alt="">
                                </a>
                                <a href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart">
                                    <i class="fa fa-shopping-basket"></i>
                                </a>
                            </div>
                            <div class="woocommerce-product-title-wrap">
                                <h2 class="woocommerce-loop-product__title">
                                    <a href="#">Stitched leather sports shoe</a>
                                </h2>
                                <a href="#" class="wish-list"><i class="fa fa-heart-o"></i></a>
                            </div>
                            <span class="price">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">$</span> 18.00
                                    </span>
                                </span>
                        </li>
                        <li class="product">
                            <div class="product-wrap">
                                <a href="#" class="">
                                    <img src="{{ asset('assets/frontend/img/p11.jpg') }}" alt="">
                                </a>
                                <a href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart">
                                    <i class="fa fa-shopping-basket"></i>
                                </a>
                            </div>
                            <div class="woocommerce-product-title-wrap">
                                <h2 class="woocommerce-loop-product__title">
                                    <a href="#">Stitched leather sports shoe</a>
                                </h2>
                                <a href="#" class="wish-list"><i class="fa fa-heart-o"></i></a>
                            </div>
                            <span class="price">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">$</span> 18.00
                                    </span>
                                </span>
                        </li>
                        <li class="product last">
                            <div class="product-wrap">
                                <a href="#" class="">
                                    <img src="{{ asset('assets/frontend/img/p12.jpg') }}" alt="">
                                </a>
                                <a href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart">
                                    <i class="fa fa-shopping-basket"></i>
                                </a>
                            </div>
                            <div class="woocommerce-product-title-wrap">
                                <h2 class="woocommerce-loop-product__title">
                                    <a href="#">Stitched leather sports shoe</a>
                                </h2>
                                <a href="#" class="wish-list"><i class="fa fa-heart-o"></i></a>
                            </div>
                            <span class="price">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">$</span> 18.00
                                    </span>
                                </span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
    <!-- product section end-->

    <!--offer section start-->
    <section class="space-3 space-adjust">
        <div class="container ">
            <div class="row no-gutters text-center">
                <div class="col-md-4">
                    <div class="offer-box border p-5">
                        <i class="bi bi-delivery-van"></i>
                        <h5 class="font-weight-bold mt-3 mb-0">Free Shipping</h5>
                        <p class="mb-0">On all order over $39.00</p>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="offer-box border p-5 border-adjust">
                        <i class="bi bi-delivery-van"></i>
                        <h5 class="font-weight-bold mt-3 mb-0">30 Days Return</h5>
                        <p class="mb-0">Money back Guarantee</p>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="offer-box border p-5">
                        <i class="bi bi-delivery-van"></i>
                        <h5 class="font-weight-bold mt-3 mb-0">Secure Checkout</h5>
                        <p class="mb-0">100% Protected by paypal</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--offer section end-->
</main>
@endsection