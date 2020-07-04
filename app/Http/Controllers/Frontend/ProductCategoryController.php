<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductCategory;

class ProductCategoryController extends Controller
{
    public function show($slug) {
        $category = ProductCategory::where('slug', $slug)->first();
        $categoryProducts = $category->products()->paginate(6);
        return view('frontend.product-category', compact('category', 'categoryProducts'));
    }
}