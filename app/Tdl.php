<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tdl extends Model
{
  protected $fillable = ['name', 'description','user_id','assignerId','assignerName','priority','jDate', 'status', 'assignerAttachment', 'doerAttachment'];

public function user(){
  return $this->belongsTo('App\User');
}

}
