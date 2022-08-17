<?php

namespace App\Http\Requests;

use App\Rules\FullName;
use Illuminate\Foundation\Http\FormRequest;

class StoreColaboradorRequest extends FormRequest
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
            'nome' => ['required', new FullName],
            'telefone' => 'required',
            'email' => ['required', 'email:rfc,dns'],
            'data_nascimento' => 'date_format:d/m/Y'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo Nome Completo é obrigatório.',
            'telefone.required' => 'O campo Telefone é obrigatório.',
            'email.required' => 'O campo Email é obrigatório.',
        ];
    }
}
