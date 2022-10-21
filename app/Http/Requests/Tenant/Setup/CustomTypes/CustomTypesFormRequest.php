<?php

namespace App\Http\Requests\Tenant\Setup\CustomTypes;

use Illuminate\Foundation\Http\FormRequest;

class CustomTypesFormRequest extends FormRequest
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
            'description' => ['required','min:2'],
            'controller' => ['required','min:2'],
            'field_name' => ['required','min:2'],
        ];
    }
}
