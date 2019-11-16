<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'sku', 'price', 'description'
    ];

    public function bids(){

        return $this->hasMany(Bid::class, 'product_id');
    }

    public function views(){

        return $this->hasMany(ProductViews::class, 'product_id');
    }
}
