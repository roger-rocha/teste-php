<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpresaRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'razao_social' => 'required',
            'CNPJ' => 'required|cnpj',
            'telefone' => 'required',
            'email' => 'email:rfc,dns'
        ];
    }

    public function messages()
    {
        return [
            'razao_social.required' => 'O campo Razão Social é obrigatório.',
            'CNPJ.required' => 'O campo CNPJ é obrigatório.',
            'telefone.required' => 'O campo Telefone é obrigatório.',
            'CNPJ.cnpj' => 'O CNPJ informado não é válido',
            'email.email:rfc,dns' => 'O Email informado não é válido'
        ];
    }
}
