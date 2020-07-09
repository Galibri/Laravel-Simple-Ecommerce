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
    <main class="site-main shop">
        <!--product section start-->
        <section class="space-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-4 mb-lg-0">
                        <div class="section-title">
                            <h2 class="title d-block text-left-sm">Shop</h2>
                            <p class="woocommerce-result-count"> Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }} results</p>

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
                            {{ $products->withQueryString()->links() }}
                        </div>
                        @endif
                    </div>

                    <div class="col-lg-4 widget-area " role="complementary">
                        <section id="woocommerce_product_search-2" class="widget woocommerce widget_product_search">
                            <form role="search" method="get" class="woocommerce-product-search" action="{{ request()->fullUrl() }}">
                                <label class="screen-reader-text" for="woocommerce-product-search-field-0">
                                    Search for:</label>
                                <input type="search" id="woocommerce-product-search-field-0" class="search-field"
                                       placeholder="Search products…" name="s" value="{{ request()->has('s') ? request()->get('s') : '' }}">
                                <button type="submit" value="Search">Search</button>
                            </form>
                        </section>
                        <section id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter">
                            <h3 class="widget-title">Filter by price</h3>
                            <div class="price_slider_wrapper">
                                <div id="slider-range"></div>
                                <p>
                                    <label for="amount">Price range:</label>
                                    <input type="text" id="amount" readonly style="border:0; color:#ff5f5f; font-weight:bold;">
                                    <input type="hidden" id="min-price">
                                    <input type="hidden" id="max-price">
                                </p>
                                <button class="price-submit">Filter</button>
                            </div>
                        </section>
                        <section id="woocommerce_layered_nav-2" class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav">
                            <h3 class="widget-title">Filter by Brand</h3>
                            @foreach($brands as $brand)
                            <div class="custom-control custom-radio">
                                <input type="radio" id="brand_id_{{ $brand->id }}" value="{{ $brand->slug }}" name="brand" class="custom-control-input filter-brand" {{ request()->has('brand') && request()->get('brand') == $brand->slug ? "checked='checked'" : '' }} >
                                <label class="custom-control-label" for="brand_id_{{ $brand->id }}">{{ $brand->name }}</label>
                            </div>
                            @endforeach
                        </section>
                        <section id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
                            <h3 class="widget-title">Filter by Categories</h3>
                            @foreach($categories as $category)
                            <div class="custom-control custom-radio">
                                <input type="radio" id="category_id_{{ $category->id }}" value="{{ $category->slug }}" name="category" class="custom-control-input filter-category" {{ request()->has('category') && request()->get('category') == $category->slug ? "checked='checked'" : '' }}>
                                <label class="custom-control-label" for="category_id_{{ $category->id }}">{{ $category->name }}</label>
                            </div>
                            @endforeach
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
        var current_url = new URL('{!! url()->full() !!}');

        $('.gw-sort-products').on('change', function() {
            let sort_type = $(this).val()
            if(sort_type) {
                current_url.searchParams.set('sort', sort_type)
                window.location.href = current_url
            } else {
                window.location.href = current_url
            }
        })

        // Brand filter
        $('.filter-brand').on('change', function() {
            let brand_slug = $(this).val()
            current_url.searchParams.set('brand', brand_slug)
            window.location.href = current_url
        })

        // Category Filter
        $('.filter-category').on('change', function() {
            let category_slug = $(this).val()
            current_url.searchParams.set('category', category_slug)
            window.location.href = current_url
        })

        $(document).on('click', '.price-submit', function() {
            let min_price = $('#min-price').val()
            let max_price = $('#max-price').val()
            current_url.searchParams.set('min_price', min_price)
            current_url.searchParams.set('max_price', max_price)
            window.location.href = current_url
        })

        // Filter range slider
        $( function() {
            $( "#slider-range" ).slider({
                range: true,
                min: {{ floor($minPriceItem) }},
                max: {{ ceil($maxPriceItem) }},
                values: [ {{ request()->has('min_price') ? request()->get('min_price') : floor($minPriceItem) }}, {{ request()->has('max_price') ? request()->get('max_price') : ceil($maxPriceItem) }} ],
                slide: function( event, ui ) {
                    $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] )
                    $('#min-price').val(ui.values[0])
                    $('#max-price').val(ui.values[1])
                }
            })
            $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) )
            $('#min-price').val($( "#slider-range" ).slider( "values", 0 ))
            $('#max-price').val($( "#slider-range" ).slider( "values", 1 ))
        })
    </script>

@endsection