<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransportadoraRequest extends FormRequest
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
            'cidade' => 'required|min:3|max:255',
        ];
    }

    public function messages(): array
    {
        return[
            'nome.required'     => 'O nome é obrigatório!!',
            'nome.min'          => 'O nome deve ter nomáximo 50 caracteres!',
            'nome.max'          => 'O nome deve ter nomáximo 50 caracteres!',
            'cidade.required'   => 'A cidade é obrigatória!!',
            'cidade.min'        => 'A cidade deve ter nomáximo 255 caracteres!',
            'cidade.max'        => 'A cidade deve ter nomáximo 255 caracteres!',
        ];
    }
}
