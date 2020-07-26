@extends('layouts.admin')
@section('title', 'Shipping')


@section('content')
<div class="card mt-3">
    <div class="card-header">
        <h3 class="float-left">Shipping</h3>
        <a href="{{ route('admin.shipping.create') }}" class="btn btn-primary float-right">Add new</a>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Countries</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shippings as $shipping)
                <tr>
                    <td>{{ $shipping->name }}</td>
                    <td>{{ implode(', ', json_decode($shipping->countries, true)) }}</td>
                    <td>$ {{ $shipping->amount }}</td>
                    <td>{{ $shipping->shipping_status }}</td>
                    <td>
                        <a href="{{ route('admin.shipping.edit', $shipping->id) }}" class="btn btn-warning btn-sm"><i
                                class="far fa-edit"></i></a>
                        <a href="{{ route('admin.shipping.destroy', $shipping->id) }}"
                            class="btn btn-danger btn-sm delete"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $shippings->links() }}
    </div>
</div>
@endsection