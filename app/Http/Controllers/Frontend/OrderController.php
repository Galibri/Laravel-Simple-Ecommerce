<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request) {
        if(auth()->check()) {
            $user_cart = auth()->user()->cart;
            dd($user_cart);
        }
        // dd($request->all(), session('cart'));
    }

    public function checkout() {
        // dd(auth()->user()->cart->cart_items);
        // dd(json_decode(auth()->user()->cart->cart_items, true));
        // dd(CartController::get_cart());
        return view('frontend.checkout');
    }
}