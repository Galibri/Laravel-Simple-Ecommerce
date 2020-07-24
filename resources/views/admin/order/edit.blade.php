@extends('layouts.admin')
@section('title', 'Edit Brand')


@section('content')
<form action="{{ route('admin.order.update', $order->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mt-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Order #{{ $order->id }}</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($order->order_details))
                            @foreach($order->order_details as $order_detail)
                            <tr>
                                @if($order_detail->product)
                                <td>{{ $order_detail->product->title }} x {{ $order_detail->product_qty }}</td>
                                @else
                                <td>Product removed x {{ $order_detail->product_qty }}</td>
                                @endif
                                <td>{{ $order_detail->total_price }}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Billing Address</h4>
                            <address>
                                <div>{{ $order->address_line_1 }}</div>
                                <div>{{ $order->address_line_2 }}</div>
                                <div>{{ $order->city }}, {{ $order->state }}</div>
                                <div>{{ $order->country }}, {{ $order->zip }}</div>
                            </address>
                        </div>
                        <div class="col-md-6">
                            <h4>Shipping Address</h4>
                            @if($order->different_shipping == false)
                            <address>
                                <div>{{ $order->address_line_1 }}</div>
                                <div>{{ $order->address_line_2 }}</div>
                                <div>{{ $order->city }}, {{ $order->state }}</div>
                                <div>{{ $order->country }}, {{ $order->zip }}</div>
                            </address>
                            @else
                            <address>
                                <div>{{ $order->s_address_line_1 }}</div>
                                <div>{{ $order->s_address_line_2 }}</div>
                                <div>{{ $order->s_city }}, {{ $order->s_state }}</div>
                                <div>{{ $order->s_country }}, {{ $order->s_zip }}</div>
                            </address>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 offset-lg-1">
            <div class="card">
                <div class="card-header">
                    <label for="payment_status">Payment Status</label>
                </div>
                <div class="card-body">
                    <select name="payment_status" id="payment_status" class="form-control">
                        <option {{ $order->payment_status == 'pending' ? "selected='selected'" : '' }} value="pending">
                            Pending</option>
                        <option {{ $order->payment_status == 'processing' ? "selected='selected'" : '' }}
                            value="processing">Processing</option>
                        <option {{ $order->payment_status == 'paid' ? "selected='selected'" : '' }} value="paid">Paid
                        </option>
                        <option {{ $order->payment_status == 'refunded' ? "selected='selected'" : '' }}
                            value="refunded">Refunded</option>
                        <option {{ $order->payment_status == 'cancelled' ? "selected='selected'" : '' }}
                            value="cancelled">Cancelled</option>
                    </select>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <label for="order_status">Order Status</label>
                </div>
                <div class="card-body">
                    <select name="order_status" id="order_status" class="form-control">
                        <option {{ $order->order_status == 'pending' ? "selected='selected'" : '' }} value="pending">
                            Pending</option>
                        <option {{ $order->order_status == 'processing' ? "selected='selected'" : '' }}
                            value="processing">Processing</option>
                        <option {{ $order->order_status == 'completed' ? "selected='selected'" : '' }}
                            value="completed">Completed</option>
                        <option {{ $order->order_status == 'cancelled' ? "selected='selected'" : '' }}
                            value="cancelled">Cancelled</option>
                    </select>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary text-light btn-block">Save</button>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <label for="logo">Payment Method</label>
                </div>
                <div class="card-body">
                    <p>{{ $order->payment_method_name }}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <label for="logo">Order Total</label>
                </div>
                <div class="card-body">
                    <p>$ {{ sprintf("%0.2f", $order->order_total) }}</p>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection