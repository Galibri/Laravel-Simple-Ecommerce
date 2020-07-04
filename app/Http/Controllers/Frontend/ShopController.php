<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function index() {
        if(request()->has('sort')) {
            // dd(request()->get('sort'));
            $sort = request()->get('sort');
            $order = 'desc';
            $orderBy = 'created_at';
            switch($sort) {
                case 'latest':
                    $order = 'desc';
                    $orderBy = 'created_at';
                break;
                case 'price_low_to_high':
                    $order = 'asc';
                    $orderBy = 'price';
                break;
                case 'price_high_to_low':
                    $order = 'desc';
                    $orderBy = 'price';
                break;
                default:
                    $order = 'desc';
                    $orderBy = 'created_at';
                break;
            }

            $products = Product::whereStatus(1)->orderBy($orderBy, $order)->paginate(9);
        } else {
            $products = Product::whereStatus(1)->orderBy('created_at', 'desc')->paginate(9);
        }

        
        return view('frontend.shop', compact('products'));
    }
}