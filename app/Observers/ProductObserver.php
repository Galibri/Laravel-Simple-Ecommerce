<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Admin\Product;

class ProductObserver
{
    public function updating(Product $product) {

        $unique_slug = Str::slug($product->title);
        $unique_next = 2;
        while(Product::whereSlug($unique_slug)->first()) {
            if($product->getOriginal('title') == $product->title) {
                $unique_slug = $product->getOriginal('slug');
                break;
            }
            $unique_slug = Str::slug($product->title) . '-' . $unique_next;
            $unique_next++;
        }

        $product->slug = $unique_slug;
    }

    public function saving(Product $product) {

        $unique_slug = Str::slug($product->title);
        $unique_next = 2;
        while(Product::whereSlug($unique_slug)->first()) {
            $unique_slug = Str::slug($product->title) . '-' . $unique_next;
            $unique_next++;
        }

        $product->slug = $unique_slug;
    }

    public function deleting(Product $product) {
        // 
    }
}
