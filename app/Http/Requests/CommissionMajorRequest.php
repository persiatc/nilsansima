<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommissionMajorRequest extends FormRequest
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
            'datebargozari' => 'required',
            'typemonaqese' => 'required',
            'arzeshmoamele' => 'required',
            'tedadtaminkonandegan' => 'required',
            'mahaltahvil' => 'required',
            'hazinehaml' => 'required',
            'garanti' => 'nullable',
            'khadamatpasazforosh' => 'required',
            'modatmoamele' => 'required',
            'fileestelambaha' => 'required',
        ];
    }
}
