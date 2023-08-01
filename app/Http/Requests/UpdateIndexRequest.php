<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    public function messages(): array
    {
        return [
            //required
            'email.required' => 'Preencha o campo Email por favor!',
            'password.required' => 'Preencha o campo Senha por favor!',

            //email
            'email.email' => 'O email inserido nao corresponde a um formato de email valido!',

            //password
            'password.min' => 'Porfavor insira no minimo 8 caracteres!',
        ];
    }
}
