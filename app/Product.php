<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['number','unit','unit_price','total_price','description','invoice_id'];

    public function invoice()
    {
        return $this->belongsTo(Product::class);
    }

}
