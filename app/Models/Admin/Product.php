<?php

namespace App\Models\Admin;

use App\Models\Admin\Brand;
use App\Models\Frontend\OrderDetail;
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

    public function order_details() {
        return $this->hasMany(OrderDetail::class);
    }

    public function productStatus() {
        return $this->status == 1 ? "Active" : "Incative";
    }

    public function finalPrice() {
        return $this->selling_price == 0 ? $this->price : $this->selling_price;
    }

    public function getFinalPriceAttribute() {
        return $this->selling_price == 0 ? $this->price : $this->selling_price;
    }

    public function setThumbnailAttribute($value) {
        $this->attributes['thumbnail'] = 'uploads/images/products/' . $value;
    }
}
