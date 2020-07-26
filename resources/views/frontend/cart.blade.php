@extends('layouts.frontend')

@section('content')
<!--page title start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="font-weight-bold">Shopping Cart</h2>
                <nav class="woocommerce-breadcrumb">
                    <a href="{{ route('frontend.home') }}">Home</a>
                    <span class="breadcrumb-separator"> / </span>Cart
                </nav>
            </div>
        </div>
    </div>
</section>

<!--page title end-->
<main class="site-main">
    <!--shop category start-->
    <section class="space-3">
        <div class="container sm-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="woocommerce-form-coupon-toggle">
                        <div class="woocommerce-info">
                            Have a coupon? <a href="#" class="showcoupon">Click here to enter your
                                code</a>
                        </div>
                    </div>

                    <form class="checkout_coupon woocommerce-form-coupon d-none" method="post"
                        action="{{ route('frontend.coupon-submit') }}">
                        @csrf

                        <p>If you have a coupon code, please apply it below.</p>

                        <p class="form-row form-row-first">
                            <input type="text" name="coupon_code" class="input-text" placeholder="Coupon code"
                                id="coupon_code" value="{{ old('coupon_code') }}">
                        </p>

                        <p class="form-row form-row-last">
                            <button type="submit" class="button" value="Apply coupon">Apply
                                coupon</button>
                        </p>

                        <div class="clear"></div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <article id="post-6" class="post-6 page type-page status-publish hentry">
                        <!--<header class="entry-header">-->
                        <!--<h1 class="entry-title">Cart</h1>		-->
                        <!--</header>-->
                        <!-- .entry-header -->
                        <div class="entry-content">
                            <div class="woocommerce">

                                <form class="woocommerce-cart-form" action="{{ route('frontend.cart-update') }}"
                                    method="POST">
                                    @csrf
                                    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="product-remove">&nbsp;</th>
                                                <th class="product-thumbnail">&nbsp;</th>
                                                <th class="product-name">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-quantity">Quantity</th>
                                                <th class="product-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(CartController::cart_items() as $product)
                                            <tr class="woocommerce-cart-form__cart-item cart_item"
                                                id="cart_item_{{ $product->id }}">
                                                <td class="product-remove">
                                                    <a href="" class="remove remove_from_cart_button"
                                                        aria-label="Remove this item"
                                                        data-product_id="{{ $product->id }}">×</a> </td>
                                                <td class="product-thumbnail">
                                                    @if($product->thumbnail)
                                                    <a href="{{ route('frontend.product', $product->slug) }}"><img
                                                            width="324" height="324"
                                                            src="{{ asset($product->thumbnail) }}"
                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                            alt="{{ $product->title }}"></a>
                                                    @endif
                                                </td>

                                                <td class="product-name" data-title="Product">
                                                    <a
                                                        href="{{ route('frontend.product', $product->slug) }}">{{ $product->title }}</a>
                                                </td>

                                                <td class="product-price" data-title="Price">
                                                    <span class="woocommerce-Price-amount amount"><span
                                                            class="woocommerce-Price-currencySymbol">$</span>{{ $product->finalPrice() }}</span>
                                                </td>

                                                <td class="product-quantity" data-title="Quantity">
                                                    <div class="quantity">
                                                        <label class="screen-reader-text"
                                                            for="quantity_5cc58182489a8">Quantity</label>
                                                        <input type="number" class="input-text qty text" step="1"
                                                            min="0" max="" name="cart[{{ $product->id }}][qty]"
                                                            value="{{ CartController::get_cart()[$product->id]['qty'] }}"
                                                            size="4" inputmode="numeric">
                                                    </div>
                                                </td>
                                                <td class="product-subtotal" data-title="Total">
                                                    <span class="woocommerce-Price-amount amount"><span
                                                            class="woocommerce-Price-currencySymbol">$</span>{{ $product->finalPrice() * CartController::get_cart()[$product->id]['qty'] }}</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="6" class="actions">

                                                    <button type="submit" class="button" name="update_cart"
                                                        value="Update cart">Update cart</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div><!-- .entry-content -->
                    </article>
                </div>
                <div class="col-lg-4">
                    <div class="cart-collaterals">
                        <div class="cart_totals ">
                            <h2>Cart totals</h2>
                            <table cellspacing="0" class="shop_table shop_table_responsive">
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$
                                                </span>{{ CartController::sub_total() }}</span>
                                        </td>
                                    </tr>
                                    @if(CartController::coupon_discount_amount() > 0)
                                    <tr>
                                        <th>Discount</th>
                                        <td>$ {{ sprintf("%0.2f", CartController::coupon_discount_amount()) }}</td>
                                    </tr>
                                    @endif
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td data-title="Total"><strong><span
                                                    class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$
                                                    </span>{{ CartController::cart_final_price() }}</span></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="wc-proceed-to-checkout">
                                <a href="{{ route('frontend.checkout') }}"
                                    class="checkout-button button alt wc-forward">
                                    Proceed to checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--shop category end-->
</main>

@endsection


@section('scripts')

<script>
    $('.showcoupon').on('click', function(e) {
            e.preventDefault();
            $('.checkout_coupon').toggleClass('d-none');
        })
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