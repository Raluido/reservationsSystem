<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Foreach_;

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
            'start.*' => 'required',
            'finish.*' => 'required|after:start.*'
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
            'start.*.required' => 'Tienes que indicar una hora de comienzo.',
            'finish.*.required' => 'Tienes que indicar una hora de finalización.',
            'finish.*.after' => 'Tienes que indicar una hora de finalización posterior a la hora de inicio.',
        ];
    }
}
