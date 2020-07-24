<?php

namespace App\Models\Frontend;

use App\Models\Frontend\OrderDetail;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function getPaymentMethodNameAttribute()
    {
        if ($this->payment_method == 'cod') {
            return __('Cash On Delivery');
        } elseif ($this->payment_method == 'bkash') {
            return __('bKash');
        }
        return __('Not found');
    }
}