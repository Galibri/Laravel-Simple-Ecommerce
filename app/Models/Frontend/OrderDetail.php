<?php

namespace App\Models\Frontend;

use App\Models\Admin\Product;
use App\Models\Frontend\Order;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $guarded = [];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}

// $table->unsignedInteger('user_id');
// $table->string('address_line_1');
// $table->string('address_line_2')->nullable();
// $table->string('city')->nullable();
// $table->string('state')->nullable();
// $table->string('zip')->nullable();
// $table->string('country')->nullable();
// $table->string('payment_method')->nullable();
// $table->float('order_total')->default(0);
// $table->string('payment_status')->default('pending');
// $table->string('order_status')->default('pending');