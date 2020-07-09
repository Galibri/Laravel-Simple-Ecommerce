<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public  function dashbaord() {
        $user = auth()->user();
        return view('frontend.dashboard.dashboard', compact('user'));
    }

    public function orders() {
        return view('frontend.dashboard.orders');
    }

    public function order_details() {
        return view('frontend.dashboard.order-details');
    }
}
