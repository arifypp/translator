<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Backend\TextLanguage;

class TextLanguageRequest extends FormRequest
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
            'sourcetext'        =>  ['required'],
            'sourcelanguage'    =>  ['required'],
            'targettext'        =>  ['required'],
            'targetlanguage'    =>  ['required'],
            'keyword'           =>  ['required'],
            'status'            =>  ['required'],
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'sourcetext.required'       => 'This field is required!',
            'sourcelanguage.required'   => 'This field is required!',
            'targettext.required'       => 'This field is required!',
            'targetlanguage.required'   => 'This field is required!',
            'keyword.required'          => 'This field is required!',
            'status.required'           => 'This field is required!',
        ];
    }
}
