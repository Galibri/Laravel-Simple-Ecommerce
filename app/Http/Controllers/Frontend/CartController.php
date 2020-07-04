<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
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
        $data = '';
        foreach($products as $product) {
            $data .= '<li class="woocommerce-mini-cart-item mini_cart_item">
            <a href="#" class="remove remove_from_cart_button" aria-label="Remove this item" data-product_id="180" data-cart_item_key="045117b0e0a11a242b9765e79cbf113f" data-product_sku="9015-DF-1">×</a>													<a class="mini_cart_item-image" href="https://stockie.colabr.io/demo1/shop/gosta-leather-chair/">
            <img src="'. asset($product->thumbnail) .'" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="'. $product->title .'">							</a>
            <div class="mini_cart_item-desc">
                <a class="font-titles" href="'. route('frontend.product', $product->slug) .'">'. $product->title .'</a>
                <span class="woo-c_product_category">
                        <a href="assets/frontend/img/p1.jpg" rel="tag">'. $product->product_category->name .'</a>
                    </span>

                <span class="quantity">'. session('cart')[$product->id]['qty'] .' × <span class="woocs_special_price_code"><span class="woocommerce-Price-amount amount">'. $product->finalPrice() .'<span class="woocommerce-Price-currencySymbol">$</span></span></span></span>
            </div>
        </li>';
        }
        return $data;
    }

    public function showCartPage() {
        return view('frontend.cart');
    }
}
