<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimetableRequest extends FormRequest
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
            'start' => 'required|before:finish',
            'finish' => 'required|after:start'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'start.required' => 'Tienes que indicar una hora de comienzo.',
            'start.before' => 'Tienes que indicar una hora anterior a la fecha de finalización.',
            'finish.required' => 'Tienes que indicar una hora de finalización.',
            'finish.after' => 'Tienes que indicar una hora de finalización posterior a la hora de inicio.',
        ];
    }
}
