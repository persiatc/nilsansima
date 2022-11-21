<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTdlRequest extends FormRequest
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
          'status' => [
                  'required',
                  Rule::in(['بررسی نشده', 'درحال انجام' , 'انجام شده', 'متوقف']),
              ],
          'holdPoint' => 'max:2505',
          'doerDescription' => 'max:2505',
          'doerAttachment' => 'mimes:jpeg,bmp,png,jpg,pdf,doc,docx,xls,xlsx,xslm'
        ];
    }
}
