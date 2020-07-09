<?php

namespace App\Models\Admin;

use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded  = [];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function setLogoAttribute($value) {
        $this->attributes['logo'] = 'uploads/images/brands/' . $value;
    }
}