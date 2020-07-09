<?php

namespace App\Models\Frontend;

use App\User;
use App\Models\Frontend\OrderDetail;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function order_details() {
        return $this->hasMany(OrderDetail::class);
    }
}


// $table->unsignedInteger('order_id');
// $table->unsignedInteger('product_id');
// $table->float('product_price')->default(0);
// $table->unsignedInteger('product_qty')->nullable();
// $table->float('total_price')->default(0);