<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required',
            'name' => 'required',
            'padel_level' => 'required',
            Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->uncompromised(),
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Tienes que añadir un email',
            'phone.required' => 'Tienes que añadir un número de teléfono',
            'password.required' => 'Tienes que añadir un password',
            'password_confirmation.same' => 'Ambos password deben coincidir',
            'name.required' => 'Tienes que añadir un nombre',
            'padel_level.required' => 'Tienes que añadir un nivel de padel',
        ];
    }
}
