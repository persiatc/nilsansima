<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['company_name','address','phone','No','date','validity', 'economic_code', 'postal_code',
        'national_code', 'registration_number', 'discount', 'total', 'final_total', 'tax', 'user_id'
        ,'unique_code'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

}
