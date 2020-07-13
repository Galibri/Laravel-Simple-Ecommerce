@extends('layouts.admin')
@section('title', 'Edit Coupon')


@section('content')
<form action="{{ route('admin.coupon.update', $coupon->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mt-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Coupon</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Coupon name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ old('name') ? old('name') : $coupon->name }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="code">Coupon code</label>
                        <input type="text" class="form-control" name="code" id="code"
                            value="{{ old('code') ? old('code') : $coupon->code }}">
                        @error('code')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="datetimepicker1">Start from</label>
                                <input type="text" name="starts_at"
                                    class="form-control datetimepicker-input datetimepicker"
                                    value="{{ old('starts_at') ? old('starts_at') : $coupon->starts_at }}">
                                @error('starts_at')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="datetimepicker1">Expires at</label>
                                <input type="text" name="expires_at"
                                    class="form-control datetimepicker-input datetimepicker"
                                    value="{{ old('expires_at') ? old('expires_at') : $coupon->expires_at }}">
                                @error('expires_at')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Coupon description</label>
                        <textarea name="description" id="description" cols="30" rows="4"
                            class="form-control textarea">{{ old('description') ? old('description') : $coupon->description }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 offset-lg-1">
            <div class="card">
                <div class="card-header">
                    <label for="status">Status</label>
                </div>
                <div class="card-body">
                    <select name="status" id="status" class="form-control">
                        <option value="1"
                            {{ old('status') ? (old('status') == 1 ? "selected='selected'" : '') : (1 == $coupon->status ? "selected='selected'" : '') }}>
                            Active
                        </option>
                        <option value="0"
                            {{ old('status') ? (old('status') == 0 ? "selected='selected'" : '') : (0 == $coupon->status ? "selected='selected'" : '') }}>
                            Inactive
                        </option>
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
                    <label for="is_fixed">Fixed amount?</label>
                </div>
                <div class="card-body">
                    <select name="is_fixed" id="is_fixed" class="form-control">
                        <option value="1"
                            {{ old('is_fixed') ? (old('is_fixed') == 1 ? "selected='selected'" : '') : (1 == $coupon->is_fixed ? "selected='selected'" : '') }}>
                            Yes
                        </option>
                        <option value="0"
                            {{ old('is_fixed') ? (old('is_fixed') == 0 ? "selected='selected'" : '') : (0 == $coupon->is_fixed ? "selected='selected'" : '') }}>
                            No
                        </option>
                    </select>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <label for="amount">Amount</label>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="number" name="amount" id="amount" step="any" min="0" class="form-control"
                            value="{{ old('amount') ? old('amount') : $coupon->amount }}">
                        @error('amount')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <label for="max_uses">Max Uses</label>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="number" name="max_uses" id="max_uses" step="1" min="1" class="form-control"
                            value="{{ old('max_uses') ? old('max_uses') : $coupon->max_uses }}">
                        @error('max_uses')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection