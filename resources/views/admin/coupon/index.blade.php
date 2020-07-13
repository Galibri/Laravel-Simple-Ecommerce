@extends('layouts.admin')
@section('title', 'Coupons')


@section('content')
<div class="card mt-3">
    <div class="card-header">
        <h3>Coupons</h3>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Used</th>
                    <th>Max Uses</th>
                    <th>Starts</th>
                    <th>Expires</th>
                    <th>Status</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($coupons as $coupon)
                <tr>
                    <td>{{ $coupon->name }}</td>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->coupon_type }}</td>
                    <td>{{ $coupon->amount }}</td>
                    <td>{{ $coupon->used }}</td>
                    <td>{{ $coupon->max_uses }}</td>
                    <td>{{ $coupon->starts_at }}</td>
                    <td>{{ $coupon->expires_at }}</td>
                    <td>{{ $coupon->coupon_status }}</td>
                    <td>
                        <a href="{{ route('admin.coupon.edit', $coupon->id) }}" class="btn btn-warning btn-sm"><i
                                class="far fa-edit"></i></a>
                        <a href="{{ route('admin.coupon.destroy', $coupon->id) }}"
                            class="btn btn-danger btn-sm delete"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $coupons->links() }}
    </div>
</div>
@endsection