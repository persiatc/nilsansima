<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $guarded = [];
    public function commissionable()
    {
        return $this->morphTo();
    }
    public function confirms() {
        return $this->morphMany('App\Confirm' , 'confirmable');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}