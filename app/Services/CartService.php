<?php

namespace App\Services;

class CartService {

    public function mini_cart_markup($products) {
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
}