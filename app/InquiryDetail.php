<?php

namespace App;

use App\Inquiry;
use Illuminate\Database\Eloquent\Model;

class InquiryDetail extends Model
{
    protected $guarded = [];

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class, 'inquiry_id');
    }

}
