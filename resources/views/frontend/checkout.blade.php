@extends('layouts.frontend')

@section('content')
    <!--page title start-->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="font-weight-bold">Checkout</h2>
                    <nav class="woocommerce-breadcrumb">
                        <a href="{{ route('frontend.home') }}">Home</a>
                        <span class="breadcrumb-separator"> / </span>Checkout
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
                    <section id="primary" class="content-area col-lg-12">
                        <main id="main" class="site-main" role="main">
                            <article id="post-8" class="post-8 page type-page status-publish hentry">
                                <!--<header class="entry-header">-->
                                    <!--<h1 class="entry-title">Checkout</h1>	-->
                                <!--</header>-->
                                <div class="entry-content">
                                    <div class="woocommerce">
                                        <div class="woocommerce-notices-wrapper"></div>
                                        <div class="woocommerce-form-coupon-toggle">
                                        <div class="woocommerce-info">
                                            Have a coupon? <a href="#" class="showcoupon">Click here to enter your code</a>
                                        </div>
                                    </div>

                                        <form class="checkout_coupon woocommerce-form-coupon d-none" method="post" >

                                            <p>If you have a coupon code, please apply it below.</p>

                                            <p class="form-row form-row-first">
                                                <input type="text" name="coupon_code" class="input-text" placeholder="Coupon code" id="coupon_code" value="">
                                            </p>

                                            <p class="form-row form-row-last">
                                                <button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply coupon</button>
                                            </p>

                                            <div class="clear"></div>
                                        </form>
                                        <form name="checkout" method="post" class="checkout woocommerce-checkout row" action="{{ route('frontend.place-order') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="first_name">First Name</label>
                                                            <input type="text" name="first_name" id="first_name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="last_name">Last Name</label>
                                                            <input type="text" name="last_name" id="last_name" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="company">Company (Optional)</label>
                                                            <input type="text" name="company" id="company" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Billing Address</h5>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="address_line_1">Address Line 1</label>
                                                                            <input type="text" name="address_line_1" id="address_line_1" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="address_line_2">Address Line 2</label>
                                                                            <input type="text" name="address_line_2" id="address_line_2" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="city">City</label>
                                                                            <input type="text" name="city" id="city" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="state">State</label>
                                                                            <input type="text" name="state" id="state" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="zip">Zip</label>
                                                                            <input type="text" name="zip" id="zip" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="country">Country</label>
                                                                            <select name="country" id="country" class="form-control">
                                                                                <option value="">Hello</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="different_shipping" id="different_shipping" class="form-check-input" checked="checked">
                                                            <label class="form-check-label" for="different_shipping"><strong>Different Shipping Address?</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3 shipping-address-box d-none">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Shipping Address</h5>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="s_address_line_1">Address Line 1</label>
                                                                            <input type="text" name="s_address_line_1" id="s_address_line_1" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="s_address_line_2">Address Line 2</label>
                                                                            <input type="text" name="s_address_line_2" id="s_address_line_2" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="s_city">City</label>
                                                                            <input type="text" name="s_city" id="s_city" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="s_state">State</label>
                                                                            <input type="text" name="s_state" id="s_state" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="s_zip">Zip</label>
                                                                            <input type="text" name="s_zip" id="s_zip" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="s_country">Country</label>
                                                                            <select name="s_country" id="s_country" class="form-control">
                                                                                <option value="">Hello</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="phone">Phone (Optional)</label>
                                                            <input type="text" name="phone" id="phone" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="email" name="email" id="email" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3>Additional information</h3>
                                                        <div class="form-group">
                                                            <label for="additional">Other notes (optional)</label>
                                                            <textarea name="additional" id="additional" cols="30" rows="5" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <h3 id="order_review_heading">Your order</h3>
                                                <div id="order_review" class="woocommerce-checkout-review-order">
                                                    <table class="shop_table woocommerce-checkout-review-order-table">
                                                        <thead>
                                                        <tr>
                                                            <th class="product-name">Product</th>
                                                            <th class="product-total">Total</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr class="cart_item">
                                                            <td class="product-name">
                                                                Beanie with Logo&nbsp;
                                                                <strong class="product-quantity">× 2</strong>													</td>
                                                            <td class="product-total">
                                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">৳&nbsp;</span>36.00</span>						</td>
                                                        </tr>
                                                        <tr class="cart_item">
                                                            <td class="product-name">
                                                                Beanie&nbsp;
                                                                <strong class="product-quantity">× 1</strong>													</td>
                                                            <td class="product-total">
                                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">৳&nbsp;</span>18.00</span>						</td>
                                                        </tr>
                                                        </tbody>
                                                        <tfoot>

                                                        <tr class="cart-subtotal">
                                                            <th>Subtotal</th>
                                                            <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">৳&nbsp;</span>54.00</span></td>
                                                        </tr>

                                                        <tr class="order-total">
                                                            <th>Total</th>
                                                            <td><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">৳&nbsp;</span>54.00</span></strong> </td>
                                                        </tr>
                                                        </tfoot>
                                                    </table>

                                                    <div id="payment" class="woocommerce-checkout-payment">
                                                        <ul class="wc_payment_methods payment_methods methods">
                                                            <li class="wc_payment_method payment_method_cod">
                                                                <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" checked="checked" data-order_button_text="" style="display: none;">

                                                                <label for="payment_method_cod">
                                                                    Cash on delivery 	</label>
                                                                <div class="payment_box payment_method_cod">
                                                                    <p>Pay with cash upon delivery.</p>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="form-row place-order">
                                                            <noscript>
                                                                Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.			<br/>
                                                                <button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals">Update totals</button>
                                                            </noscript>

                                                            <div class="woocommerce-terms-and-conditions-wrapper">
                                                                <div class="woocommerce-privacy-policy-text"><p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.</p>
                                                                </div>
                                                            </div>

                                                            <button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">Place order</button>
                                                            <input type="hidden" id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="c75f934b1d"><input type="hidden" name="_wp_http_referer" value="/?wc-ajax=update_order_review">	</div>
                                                    </div>

                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div><!-- .entry-content -->

                            </article><!-- #post-## -->

                        </main><!-- #main -->
                    </section>
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
        if( $('#different_shipping').prop('checked') ) {
            $('.shipping-address-box').removeClass('d-none');
        }
        $('#different_shipping').on('click', function(e) {
            $('.shipping-address-box').toggleClass('d-none');
        })

        let option_list = ''
        let selected = ''
        countryList.getNames().forEach(element => {
            selected = element == 'Bangladesh' ? "selected='selected'" : ''
            option_list += "<option value='"+element+"' "+selected+">"+element+"</option>";
        })
        $('#country').html(option_list)
        $('#s_country').html(option_list)
    </script>

@endsection