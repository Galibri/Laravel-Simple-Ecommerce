<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Services\CartService;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function add_to_cart(Request $request) {

        $productId = $request->id;
        $productQty = $request->qty;

        $request->session()->put('cart.'.$productId.'.qty', $productQty);

        return response()->json([
            'count' =>  self::total_in_cart(),
            'items' => self::cart_items(),
            'markup' => self::get_markup(),
            'subtotal' => self::sub_total()
        ]);
    }


    public static function total_in_cart() {
        return session('cart') ? count(session('cart')) : 0;
    }

    public static function sub_total() {
        $products = self::cart_items();
        $subTotal = 0;
        if(count($products)) {
            foreach($products as $product) {
                $subTotal += $product->finalPrice() * session('cart')[$product->id]['qty'];
            }
        }
        return sprintf("%0.2f", $subTotal);
    }

    public static function cart_items() {
        $sProducts = [];
        if(session('cart') && count(session('cart')) > 0) {
            $p_ids = array_keys(session('cart'));
            $sProducts = Product::whereIn('id', $p_ids)->get();
        }
        return $sProducts;

    }

    public static function get_markup() {

        $products = self::cart_items();
        $cart_service = new CartService;
        return $cart_service->mini_cart_markup($products);
        
    }

    public function showCartPage() {
        return view('frontend.cart');
    }
}
