<?php

namespace App;

use App\InquiryDetail;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $guarded = [];

    public function inquiryDetails()
    {
        return $this->hasMany(InquiryDetail::class);
    }

}
