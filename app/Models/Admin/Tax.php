<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $guarded = [];

    public function getTaxStatusAttribute()
    {
        return $this->status == 1 ? __('Active') : __('Inactive');
    }
}