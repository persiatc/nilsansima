<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
  protected $fillable = ['name','description','contractor','from','to','file', 'created_at', 'updated_at'];

}
