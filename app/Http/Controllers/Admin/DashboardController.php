<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Coupon;
use App\Models\Admin\Product;
use App\Models\Frontend\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $unreadOrders  = Order::where('is_seen', false)->count();
        $totalOrders   = Order::count();
        $totalProducts = Product::where('status', 1)->count();
        $totalCoupons  = Coupon::where('status', 1)->count();
        $orders        = Order::orderBy('created_at', 'desc')->limit(5)->get();
        return view('admin.dashboard.index', compact('unreadOrders', 'totalOrders', 'totalProducts', 'totalCoupons', 'orders'));
    }
}