<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialGuarantee extends Model
{
    protected $fillable = ['name_of_issuing_bank','beneficiary_name','image','price','end_date'
, 'type', 'subject', 'status', 'active_status', 'validity_duration'];

}
