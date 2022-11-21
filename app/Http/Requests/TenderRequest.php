<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenderRequest extends FormRequest
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
            'karshenasDaryaft' => 'required',
            'nahveDaryaft' => 'required',
            'monagheseGozar' => 'required',
            'mozoo' => 'required',
            'codeMonagheseGozar' => 'nullable',
            'codeSamaneSetadIran' => 'nullable',
            'dateRecieved' => 'required',
            'peyvastDaryafti' => 'nullable|mimes:doc,docx,xls,xlsx,pdf,jpg,JPG,png,PNG,jpeg',
            'timeJalasePorseshPasokh' => 'nullable',
            'mohlat' => 'required',
            'tarikhBazgoshaei' => 'nullable',
            'namePhoneKarfarma' => 'nullable',
            'mablaghZemanat' => 'nullable',
            'moddatGharardad' => 'nullable',
            'nazarieKomisionTavan' => 'nullable',
            'karshenasPaygiri' => 'nullable',
            'mablaghEstelam' => 'required|numeric',
            'tasvirZemanat' => 'nullable|mimes:doc,docx,xls,xlsx,pdf,jpg,JPG,png,PNG,jpeg',
            'tasvirPishnahadFanni' => 'nullable|mimes:doc,docx,xls,xlsx,pdf,jpg,JPG,png,PNG,jpeg',
            'tasvirPishnahadGheymat' => 'nullable|mimes:doc,docx,xls,xlsx,pdf,jpg,JPG,png,PNG,jpeg',
            'attachmentErsali' => 'nullable|mimes:doc,docx,xls,xlsx,pdf,jpg,JPG,png,PNG,jpeg',
            'natijeMonaghese' => 'nullable',
            'paasokhKarfarma' => 'nullable',
            'akharinEghdamat' => 'nullable',
            'tarikhEsterdadZemanat' => 'nullable',
        ];
    }
}