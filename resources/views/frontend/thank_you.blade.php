@extends('layouts.frontend')

@section('content')
    <!--page title start-->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="woocommerce-breadcrumb">
                        <a href="{{ route('frontend.home') }}">Home</a>
                        <!--<span class="breadcrumb-separator"> / </span>Error-->
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
                        <h3>Thank you for placing order. Here is your order summary:</h3>
                        <div class="order-payment-info mt-4">
                            <div class="payment-status"><strong>Payment Method: </strong>
                                @if($order->payment_method == 'cod')
                                {{ __('Cash on Delivery') }}
                                @else
                                {{ $order->payment_method }}
                                @endif
                            </div>
                            <div class="payment-status"><strong>Payment Status: </strong>
                                @if($order->payment_status == 'pending')
                                <span class="text-warning">{{ __('Unpaid') }}</span>
                                @elseif($order->payment_status == 'failed')
                                <span class="text-danger">{{ __('Failed') }}</span>
                                @elseif($order->payment_status == 'paid')
                                <span class="text-success">{{ __('Paid') }}</span>
                                @endif
                            </div>
                            <div class="payment-status"><strong>Order Status: </strong>
                                @if($order->payment_status == 'pending')
                                <span class="text-warning">{{ __('Pending') }}</span>
                                @elseif($order->payment_status == 'processing')
                                <span class="text-normal">{{ __('Processing') }}</span>
                                @elseif($order->payment_status == 'delivered')
                                <span class="text-success">{{ __('Delivered') }}</span>
                                @elseif($order->payment_status == 'cancelled')
                                <span class="text-danger">{{ __('Cancelled') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="table-responsive mt-5">
                            <table class="table table-brodered">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Product Name</th>
                                        <th>Product Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order_details as $order_detail)
                                    @if($order_detail->product)
                                    <tr>
                                        <td><img src="{{ asset($order_detail->product->thumbnail) }}" height="50" style="height: 60px !important;" alt="{{ $order_detail->product->title }}"></td>
                                        <td>{{ $order_detail->product->title }}</td>
                                        <td>{{ $order_detail->product_qty }}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Billing Address</h4>
                                <div>{{ $order->address_line_1 }}</div>
                                <div>{{ $order->address_line_2 }}</div>
                                <div>City: {{ $order->city }}</div>
                                <div>State: {{ $order->state }}</div>
                                <div>{{ $order->country }}</div>
                                <div>Zip: {{ $order->zip }}</div>
                            </div>
                            <div class="col-md-6">
                                <h4>Shipping Address</h4>
                                @if($order->different_shipping == false)
                                <div>{{ $order->address_line_1 }}</div>
                                <div>{{ $order->address_line_2 }}</div>
                                <div>City: {{ $order->city }}</div>
                                <div>State: {{ $order->state }}</div>
                                <div>{{ $order->country }}</div>
                                <div>Zip: {{ $order->zip }}</div>
                                @else
                                <div>{{ $order->s_address_line_1 }}</div>
                                <div>{{ $order->s_address_line_2 }}</div>
                                <div>City: {{ $order->s_city }}</div>
                                <div>State: {{ $order->s_state }}</div>
                                <div>{{ $order->s_country }}</div>
                                <div>Zip: {{ $order->s_zip }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--shop category end-->
    </main>

@endsection