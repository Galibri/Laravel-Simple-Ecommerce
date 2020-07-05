@extends('layouts.frontend')

@section('content')
    <!--page title start-->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="woocommerce-breadcrumb">
                        <a href="{{ route('frontend.home') }}">Home</a>
                        <span class="breadcrumb-separator"> / </span>Shop
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--page title end-->
    <main class="site-main">
        <!--product section start-->
        <section class="space-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-4 mb-lg-0">
                        <div class="section-title">
                            <h2 class="title d-block text-left-sm">Shop</h2>
                            <p class="woocommerce-result-count"> Showing 1–16 of 17 results</p>
                            <form class="woocommerce-ordering float-lg-right" method="get">
                                <select name="orderby" class="orderby gw-sort-products form-control" aria-label="Shop order" >
                                    <option value="" selected="selected">Default sorting</option>
                                    <option value="latest" {{ request()->get('sort') == 'latest' ? "selected='selected'" : '' }}>Sort by latest</option>
                                    <option value="price_low_to_high" {{ request()->get('sort') == 'price_low_to_high' ? "selected='selected'" : '' }}>Sort by price: low to high</option>
                                    <option value="price_high_to_low" {{ request()->get('sort') == 'price_high_to_low' ? "selected='selected'" : '' }}>Sort by price: high to low</option>
                                </select>
                                <input type="hidden" name="paged" value="1">
                            </form>
                        </div>
                        <ul class="products columns-3">
                            @foreach($products as $key => $product)
                            <li class="product {{ ($key+1) % 3 == 0 ? 'last' : '' }}">
                                <div class="product-wrap">
                                    <a href="{{ route('frontend.product', $product->slug) }}" class="">
                                        @if($product->thumbnail)
                                        <img src="{{ $product->thumbnail }}" alt="{{ $product->title }}">
                                        @else
                                        <img src="{{ asset('assets/frontend/img/p1.jpg') }}" alt="{{ $product->title }}">
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
                        @if($products->hasPages())
                        <div class="text-center d-flex justify-content-center border-top pt-5">
                            {{ $products->links() }}
                        </div>
                        @endif
                    </div>

                    <div class="col-lg-4 widget-area " role="complementary">
                        <section id="woocommerce_product_search-2" class="widget woocommerce widget_product_search">
                            <form role="search" method="get" class="woocommerce-product-search"
                                  action="#">
                                <label class="screen-reader-text" for="woocommerce-product-search-field-0">
                                    Search for:</label>
                                <input type="search" id="woocommerce-product-search-field-0" class="search-field"
                                       placeholder="Search products…" value="" name="s">
                                <button type="submit" value="Search">Search</button>
                                <input type="hidden" name="post_type" value="product">
                            </form>
                        </section>
                        <section id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter">
                            <h3 class="widget-title">Filter by price</h3>
                            <form method="get" action="#">
                                <div class="price_slider_wrapper">
                                    {{-- <div class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                         style="">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"
                                             style="left: 22.2222%; width: 44.4444%;"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                                              style="left: 22.2222%;"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                                              style="left: 66.6667%;"></span>
                                    </div> --}}
                                    <div id="slider-range"></div>
                                    <p>
                                        <label for="amount">Price range:</label>
                                        <input type="text" id="amount" readonly style="border:0; color:#ff5f5f; font-weight:bold;">
                                    </p>
                                </div>
                            </form>
                        </section>
                        <section id="woocommerce_layered_nav-2"
                                 class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav"><h3
                                class="widget-title">Filter by</h3>
                            <ul class="woocommerce-widget-layered-nav-list">
                                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow" href="#">Blue</a> <span class="count">(4)</span></li>
                                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term current-cat"><a rel="nofollow" href="#">Gray</a> <span class="count">(2)</span></li>
                                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow" href="#">Green</a> <span class="count">(3)</span></li>
                                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow" href="#">Red</a> <span class="count">(4)</span></li>
                                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow" href="#">Yellow</a> <span class="count">(1)</span></li>
                            </ul>
                        </section>
                        <section id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
                            <h3 class="widget-title">Product categories</h3>
                            <ul class="product-categories nav flex-column">
                                <li class="cat-item cat-item-17 cat-parent nav-item"><a href="#" class="nav-link">Clothing</a>
                                    <ul class="children nav flex-column">
                                        <li class="cat-item cat-item-20 nav-item current-cat"><a href="#" class="nav-link">Accessories</a></li>
                                        <li class="cat-item cat-item-19 nav-item"><a href="#" class="nav-link">Hoodies</a></li>
                                        <li class="cat-item cat-item-18 nav-item"><a href="#" class="nav-link">Tshirts</a></li>
                                    </ul>
                                </li>
                                <li class="cat-item cat-item-22 nav-item"><a href="#" class="nav-link">Decor</a></li>
                                <li class="cat-item cat-item-21 nav-item"><a href="#" class="nav-link">Music</a></li>
                                <li class="cat-item cat-item-15 nav-item"><a href="#" class="nav-link">Uncategorized</a></li>
                            </ul>
                        </section>
                    </div>

                </div>
            </div>
        </section>
        <!-- product section end-->


    </main>

@endsection


@section('scripts')

    <script>
        $('.gw-sort-products').on('change', function() {
            let current_url = '{{ request()->url() }}'
            let sort_type = $(this).val()
            if(sort_type) {
                window.location.href = current_url + `?sort=${sort_type}`
            } else {
                window.location.href = current_url
            }
        })
    </script>

@endsection