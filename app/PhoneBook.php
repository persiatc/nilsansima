<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneBook extends Model
{
    protected $fillable = [
      'personName', 'company', 'fax', 'email',  'address', 'phone1', 'phone2', 'phone3', 'type_company'
    ];

//    public function phones()
//    {
//        return $this->hasMany(Phone::class);
//    }
}
