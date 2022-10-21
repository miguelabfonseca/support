<?php

namespace App\Http\Requests\Tenant\CustomerLocations;

use Illuminate\Foundation\Http\FormRequest;

class CustomerLocationsFormRequest extends FormRequest
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
            'description' => ['required', 'min:5'],
            'customer_id' => ['required', 'min:1'],

        ];
    }
}
