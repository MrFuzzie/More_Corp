<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $fillable = [
        'product_id', 'user_id', 'bid'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
