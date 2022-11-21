<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequestForm extends Model
{
    protected $guarded = [];
    public function PurchaseRequestFormable()
    {
        return $this->morphTo();
    }
    public function manager(){
        return $this->belongsTo('App\User', 'Project_unit_manager_approval');
    }

}
