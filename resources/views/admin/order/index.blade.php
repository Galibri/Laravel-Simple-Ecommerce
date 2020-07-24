@extends('layouts.admin')
@section('title', 'Category')


@section('content')
<div class="card mt-3">
    <div class="card-header">
        <h3>Orders</h3>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Payment Status</th>
                    <th>Order Status</th>
                    <th>Total Amount</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    @if($order->user)
                    <td>{{ $order->user->email }}</td>
                    @else
                    <td>{{ __('No Email') }}</td>
                    @endif
                    <td>{{ $order->payment_status }}</td>
                    <td>{{ $order->order_status }}</td>
                    <td>$ {{ sprintf("%0.2f", $order->order_total) }}</td>
                    <td>
                        <a href="{{ route('admin.order.edit', $order->id) }}" class="btn btn-warning btn-sm"><i
                                class="far fa-edit"></i></a>
                        <a href="{{ route('admin.order.destroy', $order->id) }}" class="btn btn-danger btn-sm delete"><i
                                class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
</div>
@endsection