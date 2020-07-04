<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\ProductCategory;

class HomeController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::whereStatus(1)->has('products')->orderBy('created_at', 'desc')->limit(9)->get();
        $products = Product::whereStatus(1)->orderBy('created_at', 'desc')->paginate(9);

        return view('frontend.index', compact('categories', 'products'));
    }
}