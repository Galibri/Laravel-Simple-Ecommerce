<?php

namespace App\Services;

use App\Http\Controllers\Frontend\CartController;

// use App\Http\Controllers\Frontend;

class CartService {

    public function mini_cart_markup($products) {
        $data = '';
        foreach($products as $product) {
            $data .= '<li class="woocommerce-mini-cart-item mini_cart_item" id="cart_item_'. $product->id .'">
            <a href="#" class="remove remove_from_cart_button" aria-label="Remove this item" data-product_id="'. $product->id .'">×</a><a class="mini_cart_item-image" href="'. route('frontend.product', $product->slug) .'">
            <img src="'. asset($product->thumbnail) .'" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="'. $product->title .'">							</a>
            <div class="mini_cart_item-desc">
                <a class="font-titles" href="'. route('frontend.product', $product->slug) .'">'. $product->title .'</a>
                <span class="woo-c_product_category">
                        <a href="'. route('frontend.product_category', $product->product_category->slug) .'" rel="tag">'. $product->product_category->name .'</a>
                    </span>

                <span class="quantity">'. session('cart')[$product->id]['qty'] .' × <span class="woocs_special_price_code"><span class="woocommerce-Price-amount amount">'. $product->finalPrice() .'<span class="woocommerce-Price-currencySymbol">$</span></span></span></span>
            </div>
        </li>';
        }
        if(count($products) > 0) {
            $data .= '<li class="woocommerce-mini-cart-item mini_cart_item">
                <div class="woocomerce-mini-cart__container">
                    <p class="woocommerce-mini-cart__total total"><strong>Subtotal:</strong> <span class="woocs_special_price_code"><span class="woocommerce-Price-amount amount mini-cart-subtotal">'. CartController::sub_total() .'</span><span class="woocommerce-Price-currencySymbol">$</span></span></p>
                    <p class="woocommerce-mini-cart__buttons buttons">
                        <a href="'. route('frontend.cart') .'" class="button wc-forward">View cart</a>
                        <a href="#" class="button checkout wc-forward">Checkout</a>
                    </p>
                </div>
            </li>';
        } else {
            $data .= '<li class="woocommerce-mini-cart-item mini_cart_item">
            <div class="woocomerce-mini-cart__container">
                <p class="woocommerce-mini-cart__total total text-center"><strong>Empty Cart</strong></p>
            </div>
        </li>';
        }
        return $data;
    }
}