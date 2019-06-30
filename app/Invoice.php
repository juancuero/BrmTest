<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'total','user_id'
    ];

    public function details()
    {
        return $this->hasMany('App\InvoiceDetail');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
