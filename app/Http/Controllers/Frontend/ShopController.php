<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Services\ShopService;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductCategory;

class ShopController extends Controller
{
    public function index() {

        $shopService = new ShopService();
        $products = $shopService->get_products_for_shop();

        $maxPriceItem = Product::max('price');
        $minPriceItem = Product::min('price');

        $brands = Brand::whereStatus(1)->get();
        $categories = ProductCategory::whereStatus(1)->get();
        
        return view('frontend.shop', compact('products', 'maxPriceItem', 'minPriceItem', 'brands', 'categories'));
    }
}