<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTimeSheetRequest extends FormRequest
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
            'description' => 'required',
            'assignment' => 'required',
            'kaarfarma' => 'required',
            'projectName' => 'required',
            'startHour' => 'required',
            'endHour' => 'required',
            'minutes' => 'required',
            'holdpoint' => 'nullable',
            'result' => 'required',
            'attach1' => 'nullable|mimes:doc,docx,xls,xlsx,pdf,jpg,JPG,png,PNG,jpeg',
            'attach2' =>'nullable',
            'tdl_id' => 'nullable',

        ];
    }
}
