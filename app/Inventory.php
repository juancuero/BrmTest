<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'quantity', 'lot','expiration','price','product_id','quantity_original'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
