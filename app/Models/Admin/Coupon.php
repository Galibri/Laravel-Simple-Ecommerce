<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = [];

    public function getCouponTypeAttribute()
    {
        return $this->is_fixed == 1 ? __('Fixed') : __('Percentage');
    }

    public function getCouponStatusAttribute()
    {
        return $this->status == 1 ? __('Active') : __('Inactive');
    }
}