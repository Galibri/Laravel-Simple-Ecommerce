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
                <div class="col-md-4">
                    <div class="woocommerce">
                        @include('frontend.dashboard.partials.dashboard_sidebar')
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="woocommerce-MyAccount-content">
                        <div class="woocommerce-notices-wrapper"></div>
                        <p>Order #<mark class="order-number">{{ $order->id }}</mark> was placed on <mark
                                class="order-date">{{ $order->created_at->format('M d, Y') }}</mark> and is currently
                            <mark class="order-status">{{ ucfirst($order->order_status) }}</mark>.</p>


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
                                    @foreach($orderDetails as $single_order_item)
                                    <tr class="woocommerce-table__line-item order_item">

                                        <td class="woocommerce-table__product-name product-name">
                                            @if($single_order_item->product)
                                            <a
                                                href="{{ route('frontend.product', $single_order_item->product->slug ) }}">{{ $single_order_item->product->title }}</a>
                                            @else
                                            {{ __('Product removed.') }}
                                            @endif
                                            <strong class="product-quantity">×
                                                {{ $single_order_item->product_qty }}</strong>
                                        </td>

                                        <td class="woocommerce-table__product-total product-total">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">৳&nbsp;</span>{{ $single_order_item->total_price }}</span>
                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th scope="row">Payment method:</th>
                                        <td>{{ $order->payment_method_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Total:</th>
                                        <td><span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>{{ $order->order_total }}</span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                        </section>

                        <section class="woocommerce-customer-details">


                            <div class="row">
                                <div class="col-md-6">
                                    <h2 class="woocommerce-column__title">Billing address</h2>

                                    <address>
                                        {{ $order->address_line_1 }}<br>
                                        {{ $order->address_line_2 }}<br>
                                        {{ $order->city }}<br>
                                        {{ $order->state }}<br>
                                        {{ $order->country }} - {{ $order->zip }}
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <h2 class="woocommerce-column__title">Shipping address</h2>
                                    @if($order->different_shipping == false)
                                    <address>
                                        {{ $order->address_line_1 }}<br>
                                        {{ $order->address_line_2 }}<br>
                                        {{ $order->city }}<br>
                                        {{ $order->state }}<br>
                                        {{ $order->country }} - {{ $order->zip }}
                                    </address>
                                    @else
                                    <address>
                                        {{ $order->s_address_line_1 }}<br>
                                        {{ $order->s_address_line_2 }}<br>
                                        {{ $order->s_city }}<br>
                                        {{ $order->s_state }}<br>
                                        {{ $order->s_country }} - {{ $order->s_zip }}
                                    </address>
                                    @endif
                                </div>
                            </div>

                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--shop category end-->
</main>

@endsection