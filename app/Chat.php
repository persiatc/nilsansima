<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $guarded = [];
    public function starter()
    {
        return $this->belongsTo('App\User', 'starter_id');
    }
}
