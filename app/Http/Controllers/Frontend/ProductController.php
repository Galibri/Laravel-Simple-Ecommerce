<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function show($slug) {
        $product = Product::where('slug', $slug)->first();
        $related_products = Product::where('product_category_id', $product->product_category_id)->where('slug', '!=', $slug)->limit(3)->get();
        return view('frontend.single-product', compact('product', 'related_products'));
    }
}
