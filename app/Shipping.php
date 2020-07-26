<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $guarded = [];

    public function getShippingStatusAttribute()
    {
        return $this->status == 0 ? __('Inactive') : __('Active');
    }
}