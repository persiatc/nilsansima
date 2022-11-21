<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPurchaseRequest extends FormRequest
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
            'onvan' => 'required',
            'description' => 'required',
            'peymankar' => 'required',
            'mablagh' => 'required|numeric',
            'pardakht' => 'required',
            'moddat' => 'required',
            'from' => 'required',
            'to' => 'required',
            'contractorFile' => 'required|mimes:doc,docx,xls,xlsx,pdf,jpg,JPG,png,PNG,jpeg',
        ];
    }
}