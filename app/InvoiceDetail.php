<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $fillable = [
        'quantity', 'invoice_id','inventory_id'
    ];

    public function invoice()
    {
        return $this->belongsTo('App\Invoice');
    }

    public function inventory()
    {
        return $this->belongsTo('App\Inventory');
    }
}
