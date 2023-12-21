<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|min:3|max:255',
            'descricao' => 'required|min:3|max:255',
            'preco' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return[
            'nome.required'     => 'O nome é obrigatório!!',
            'nome.min'          => 'O nome deve ter nomáximo 50 caracteres!',
            'nome.max'          => 'O nome deve ter nomáximo 50 caracteres!',
            'descricao.required'=> 'A descrição é obrigatória!!',
            'descricao.min'     => 'A descrição deve ter nomáximo 255 caracteres!',
            'descricao.max'     => 'A descrição deve ter nomáximo 255 caracteres!',
            'preco.required'    => 'O preço é obrigatório!!',
            'preco.numeric'     => 'O preço deve ser um número!!'
        ];
    }
}
