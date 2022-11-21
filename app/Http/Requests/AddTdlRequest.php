<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddTdlRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'max:2505',
            'assignedTo' => 'required|exists:users,id',
            'priority' => [
                    'required',
                    Rule::in(['عادی', 'متوسط', 'آنی', 'فوری']),
                ],
            'assignerAttachment' => 'mimes:jpeg,bmp,png,jpg,pdf,doc,docx,xls,xlsx,xslm'

        ];
    }
}
