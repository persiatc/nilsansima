<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommissionPartialRequest extends FormRequest
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
            'mozoo' => 'required',
            'darkhastkonande' => 'required',
            'arzeshmoamele' => 'required',
            'tedadestelambaha' => 'required',

            'datesabt' => 'required',
            // 'purchase_requests_id' => 'required',

            'project_manager' => 'nullable',
            'amount' => 'required',
            'to_buy' => 'required',
            // 'email_status' => 'required',

            'fileestelambaha1' => 'required',
            'fileestelambaha2' => 'required',
            'fileestelambaha3' => 'required',


        ];
    }
}