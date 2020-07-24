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
                        <h3>Account details</h3>
                        <form action="{{ route('frontend.user-account-update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name">First name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                            value="{{ auth()->user()->first_name }}">
                                        @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name">Last name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                            value="{{ auth()->user()->last_name }}">
                                        @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ auth()->user()->email }}" disabled="disabled">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            value="{{ auth()->user()->phone }}">
                                        @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="company">Company</label>
                                        <input type="text" class="form-control" name="company" id="company"
                                            value="{{ auth()->user()->company }}">
                                        @error('company')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <h3>Account password</h3>
                        <form action="{{ route('frontend.user-password-update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="current_password">Current password</label>
                                <input type="password" class="form-control" name="current_password"
                                    id="current_password">
                                @error('current_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">New password</label>
                                <input type="password" class="form-control" name="password" id="password">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm new password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation">
                                @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Update password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--shop category end-->
</main>

@endsection