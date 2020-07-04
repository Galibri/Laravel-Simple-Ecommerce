<?php

namespace App\Models\Admin;

use App\Models\Admin\Brand;
use App\Models\Admin\ProductCategory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded  = [];

    public function product_category() {
        return $this->belongsTo(ProductCategory::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function productStatus() {
        return $this->status == 1 ? "Active" : "Incative";
    }

    public function finalPrice() {
        return $this->selling_price == 0 ? $this->price : $this->selling_price;
    }
}
