<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baner extends Model
{
  public $fillable = ['description', 'title', 'status', 'id', 'file' ,'addedByName'];

}
