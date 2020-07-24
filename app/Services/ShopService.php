<?php

namespace App\Services;

use App\Models\Admin\Brand;
use App\Models\Admin\Product;
use App\Models\Admin\ProductCategory;

class ShopService
{

    public function get_products_for_shop()
    {
        $order   = 'desc';
        $orderBy = 'created_at';

        if (request()->has('sort')) {
            $sort = request()->get('sort');
            switch ($sort) {
                case 'latest':
                    $order   = 'desc';
                    $orderBy = 'created_at';
                    break;
                case 'price_low_to_high':
                    $order   = 'asc';
                    $orderBy = 'price';
                    break;
                case 'price_high_to_low':
                    $order   = 'desc';
                    $orderBy = 'price';
                    break;
                default:
                    $order   = 'desc';
                    $orderBy = 'created_at';
                    break;
            }
        }

        $where = [
            ['status', '=', 1]
        ];

        if (request()->has('min_price')) {
            array_push($where, ['price', '>=', request()->get('min_price')]);
        }
        if (request()->has('max_price')) {
            array_push($where, ['price', '<=', request()->get('max_price')]);
        }
        if (request()->has('brand')) {
            $brand = Brand::whereSlug(request()->get('brand'))->first();
            array_push($where, ['brand_id', '=', $brand->id]);
        }
        if (request()->has('category')) {
            $pc = ProductCategory::whereSlug(request()->get('category'))->first();
            array_push($where, ['product_category_id', '=', $pc->id]);
        }
        if (request()->has('s')) {
            array_push($where, ['title', 'like', '%' . request()->get('s') . '%']);
            array_push($where, ['description', 'like', '%' . request()->get('s') . '%']);
            $products = Product::where($where)->orderBy($orderBy, $order)->paginate(9);
        } else {
            $products = Product::where($where)->orderBy($orderBy, $order)->paginate(9);
        }

        return $products;
    }
}