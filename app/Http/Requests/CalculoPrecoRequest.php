<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculoPrecoRequest extends FormRequest
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
            'pid' => 'required',
            'cep_origem' => 'required|string|max:8',
            'cep_destino' => 'required|string|max:8'
        ];
    }
}
