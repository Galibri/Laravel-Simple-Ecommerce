<?php

namespace App\Models\Admin;

use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $guarded  = [];

    public function subcategories() {
        return $this->hasMany(ProductCategory::class, 'parent_id', 'id');
    }


    public function parent_category() {
        return $this->belongsTo(static::class, 'parent_id');
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function setThumbnailAttribute($value) {
        $this->attributes['thumbnail'] = 'uploads/images/categories/' . $value;
    }

}