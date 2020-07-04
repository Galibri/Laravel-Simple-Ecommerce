<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Admin\Product;
use App\Models\Admin\ProductCategory;



class ProductCategoryObserver
{
    public function updating(ProductCategory $productCategory) {

        $unique_slug = Str::slug($productCategory->name);
        $unique_next = 2;
        while(ProductCategory::whereSlug($unique_slug)->first()) {
            if($productCategory->getOriginal('name') == $productCategory->name) {
                $unique_slug = $productCategory->getOriginal('slug');
                break;
            }
            $unique_slug = Str::slug($productCategory->name) . '-' . $unique_next;
            $unique_next++;
        }

        $productCategory->slug = $unique_slug;
    }

    public function saving(ProductCategory $productCategory) {

        $unique_slug = Str::slug($productCategory->name);
        $unique_next = 2;
        while(ProductCategory::whereSlug($unique_slug)->first()) {
            $unique_slug = Str::slug($productCategory->name) . '-' . $unique_next;
            $unique_next++;
        }

        $productCategory->slug = $unique_slug;
    }

    public function deleting(ProductCategory $productCategory) {
        Product::where('product_category_id', $productCategory->id)->update(['product_category_id' => null]);
        ProductCategory::where('parent_id', $productCategory->id)->update(['parent_id' => 0]);

    }

}
