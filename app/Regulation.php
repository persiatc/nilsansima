<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regulation extends Model
{
    protected $fillable = [
        'title', 'file', 'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
