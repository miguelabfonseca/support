<?php

namespace App\Http\Requests\Tenant\TeamMember;

use Illuminate\Foundation\Http\FormRequest;

class TeamMemberFormRequest extends FormRequest
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
            'mobile_phone' => ['required', 'min:9'],
            'email' => ['required', 'email'],
        ];
    }
}
