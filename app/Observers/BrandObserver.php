<?php

namespace App\Observers;

use App\Models\Admin\Brand;
use Illuminate\Support\Str;
use App\Models\Admin\Product;

class BrandObserver
{
    public function updating(Brand $brand) {

        $unique_slug = Str::slug($brand->name);
        $unique_next = 2;
        while(Brand::whereSlug($unique_slug)->first()) {
            if($brand->getOriginal('name') == $brand->name) {
                $unique_slug = $brand->getOriginal('slug');
                break;
            }
            $unique_slug = Str::slug($brand->name) . '-' . $unique_next;
            $unique_next++;
        }

        $brand->slug = $unique_slug;
    }

    public function saving(Brand $brand) {

        $unique_slug = Str::slug($brand->name);
        $unique_next = 2;
        while(Brand::whereSlug($unique_slug)->first()) {
            $unique_slug = Str::slug($brand->name) . '-' . $unique_next;
            $unique_next++;
        }

        $brand->slug = $unique_slug;
    }

    public function deleting(Brand $brand) {
        Product::where('brand_id', $brand->id)->update(['brand_id' => null]);
    }

}
