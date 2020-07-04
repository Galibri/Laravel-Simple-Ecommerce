@extends('layouts.frontend')

@section('content')
    <!--page title start-->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="font-weight-bold">Category: {{ $category->name }}</h2>
                    <nav class="woocommerce-breadcrumb">
                        <a href="{{ route('frontend.home') }}">Home</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--page title end-->

    <main class="site-main">
        <!--shop category start-->
        <section class="space-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="products columns-3">
                            @foreach($categoryProducts as $key => $product)
                            <li class="product">
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
                                <span class="onsale">Sale!</span>
                                <span class="price">
                                    <del>
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol">$</span>
                                            45.00
                                        </span>
                                    </del>
                                    <ins>
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol">$</span>
                                            42.00
                                        </span>
                                    </ins>

                                </span>
                            </li>
                            @endforeach
                        </ul>
                        @if($categoryProducts->hasPages())
                        <div class="text-center d-flex justify-content-center border-top pt-5">
                            {{ $categoryProducts->links() }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!--shop category end-->
    </main>

@endsection