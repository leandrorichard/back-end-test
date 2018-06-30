<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoCreateRequest extends FormRequest
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
        $ruleNome = 'required|string|max:255|unique:produtos';
        if ($product = $this->route('produto')) {
            $ruleNome = 'required|string|max:255|unique:produtos,id,'.$product;
        }
        return [
            'nome' => $ruleNome,
            'sku' => 'required|string|max:64|unique:produtos',
            'peso' => 'required|numeric',
            'altura' => 'required|numeric',
            'largura' => 'required|numeric',
            'profundidade' => 'required|numeric',
            'valor' => 'required|numeric',
        ];
    }
}
