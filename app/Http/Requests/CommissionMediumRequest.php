<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommissionMediumRequest extends FormRequest
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
            'typekala' => 'required',
            'datesabt' => 'required',
            'mahaltahvil' => 'required',
            'hazinehaml' => 'nullable',
            'garanti' => 'required',
            'khadamatpasazforosh' => 'required',
            'email_status' => 'required',
        ];
    }
}
