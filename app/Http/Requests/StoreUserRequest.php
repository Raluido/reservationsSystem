<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|digits:9|unique:users,phone',
            'role' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tienes que indicar un nombre',
            'email.required' => 'Tienes que indicar un email',
            'phone.required' => 'Tienes que indicar un telefono',
            'role.required' => 'Tienes que indicar un role',
            'email.unique' => 'Otro usuario ya ha utilizado éste email',
            'phone.unique' => 'Otro usuario ya ha utilizado éste telefono',
        ];
    }
}
