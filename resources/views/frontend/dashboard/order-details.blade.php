@extends('layouts.frontend')

@section('content')
    <!--page title start-->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="font-weight-bold">My Account</h2>
                    <nav class="woocommerce-breadcrumb">
                        <a href="{{ route('frontend.home') }}">Home</a>
                        <span class="breadcrumb-separator"> / </span>My Account
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
                        <div class="woocommerce">
                            @include('frontend.dashboard.partials.dashboard_sidebar')

                            <div class="woocommerce-MyAccount-content">
                                <div class="woocommerce-notices-wrapper"></div><p>Order #<mark class="order-number">80</mark> was placed on <mark class="order-date">June 12, 2019</mark> and is currently <mark class="order-status">Processing</mark>.</p>


                                <section class="woocommerce-order-details">

                                    <h2 class="woocommerce-order-details__title">Order details</h2>

                                    <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

                                        <thead>
                                        <tr>
                                            <th class="woocommerce-table__product-name product-name">Product</th>
                                            <th class="woocommerce-table__product-table product-total">Total</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr class="woocommerce-table__line-item order_item">

                                            <td class="woocommerce-table__product-name product-name">
                                                <a href="#">Beanie with Logo</a> <strong class="product-quantity">× 2</strong>	</td>

                                            <td class="woocommerce-table__product-total product-total">
                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">৳&nbsp;</span>36.00</span>	</td>

                                        </tr>

                                        <tr class="woocommerce-table__line-item order_item">

                                            <td class="woocommerce-table__product-name product-name">
                                                <a href="#">Beanie</a> <strong class="product-quantity">× 1</strong>	</td>

                                            <td class="woocommerce-table__product-total product-total">
                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">৳&nbsp;</span>18.00</span>	</td>

                                        </tr>

                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <th scope="row">Subtotal:</th>
                                            <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">৳&nbsp;</span>54.00</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Payment method:</th>
                                            <td>Cash on delivery</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total:</th>
                                            <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">৳&nbsp;</span>54.00</span></td>
                                        </tr>
                                        </tfoot>
                                    </table>

                                </section>

                                <section class="woocommerce-customer-details">


                                    <h2 class="woocommerce-column__title">Billing address</h2>

                                    <address>
                                        Hasin hayder<br>sss<br>dhaka<br>Dhaka
                                        <p class="woocommerce-customer-details--phone">99182</p>

                                        <p class="woocommerce-customer-details--email">me@hasin.me</p>
                                    </address>

                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--shop category end-->
    </main>

@endsection