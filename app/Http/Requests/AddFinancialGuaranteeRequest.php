<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddFinancialGuaranteeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'required',
            'subject' => 'required',
            'status' => 'required',
            'active_status' => 'required',
            'validity_duration' => 'required',
            'name_of_issuing_bank' => 'nullable',
            'beneficiary_name' => 'required',
            'price' => 'required|integer',
            // 'end_date' => 'nullable',

        ];
    }
}
