<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatContent extends Model
{
    protected $guarded = [];
    
    public function sender()
    {
        return $this->belongsTo('App\User', 'sender_id');
    }
    public function receiver()
    {
        return $this->belongsTo('App\User', 'receiver_id');
    }
}
