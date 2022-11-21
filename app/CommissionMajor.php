<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommissionMajor extends Model
{
    protected $guarded = [];
    public function confirms() {
        return $this->morphMany('App\Confirm' , 'confirmable');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function purchaseRequest()
    {
        return $this->belongsTo('App\PurchaseRequest', 'purchase_requests_id');
    }
}
