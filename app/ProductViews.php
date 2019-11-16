<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductViews extends Model
{
    protected $fillable = [
        'product_id', 'ip_address'
    ];
}
