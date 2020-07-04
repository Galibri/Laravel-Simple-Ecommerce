<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function show($slug) {
        $brand = Brand::where('slug', $slug)->first();
        $brandProducts = $brand->products()->paginate(6);
        return view('frontend.product-brand', compact('brandProducts', 'brand'));
    }
}
