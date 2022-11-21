<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddInvoiceRequest extends FormRequest
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
            'date' => 'required',
            'company_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'No' => 'required',
            'validity' => 'required',
            'economic_code' => 'required',
            'postal_code' => 'required',
            // 'national_code' => 'required',
            'registration_number' => 'required',
            // 'user_id' => 'required',

        ];
    }
}
