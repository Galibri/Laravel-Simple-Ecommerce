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
                            @if(count($orders) > 0)
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Date</th>
                                        <th>Order Status</th>
                                        <th>Payment Status</th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>#{{ $order->id }}</td>
                                        <td>{{ $order->created_at->format('M d, Y')}}</td>
                                        <td>{{ ucfirst($order->order_status) }}</td>
                                        <td>{{ ucfirst($order->payment_status) }}</td>
                                        <td>{{ $order->order_total }}</td>
                                        <td><a href="{{ route('frontend.user-order-details', $order->id) }}" class="button">View</a></td>
                                    </tr>
                                    @endforeach
                                    {{ $orders->links() }}
                                    
                                </tbody>
                            </table>
                            @else
                            <h3>{{ __('No orders found.') }}</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--shop category end-->
    </main>

@endsection