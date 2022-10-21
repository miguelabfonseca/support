<?php

namespace App\Http\Requests\Tenant\Customers;

use Illuminate\Foundation\Http\FormRequest;

class CustomersFormRequest extends FormRequest
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
            'name' => ['required', 'min:2'],
            'vat' => ['required', 'min:9'],
            'contact' => ['required', 'min:9'],
            'email' => ['required', 'email'],
            'address' => ['required', 'min:5'],
            'zipcode' => ['required', 'min:5'],
            'district' => ['required'],
            'county' => ['required'],
        ];
    }
}
