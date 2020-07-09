<?php

namespace App\Models\Frontend;

use App\User;
use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
