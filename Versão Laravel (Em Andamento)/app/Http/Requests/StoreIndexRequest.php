<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIndexRequest extends FormRequest
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
            'nome' => ['required', 'string', 'max:100'],
            'sobrenome' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tipo_usuario' => ['string'],
        ];
    }

    //menssagens
    public function messages(): array
    {
        return [
            //required
            'nome.required' => 'Preencha o campo Nome por favor!',
            'sobrenome.required' => 'Preencha o campo Nome por favor!',
            'email.required' => 'Preencha o campo Email por favor!',
            'password.required' => 'Preencha o campo Senha por favor!',

            //email
            'email.email' => 'O email inserido nao corresponde a um formato de email valido!',
            'email.unique' =>'Este email ja esta em uso!',

            //max e min
            'nome.max' => 'O campo nome ultrapassou o limite de caracteres!',
            'sobrenome.max' => 'O campo nome ultrapassou o limite de caracteres!',
            'password.min' => 'Porfavor insira no minimo 8 caracteres!',

            //corfirmação
            'password.confirmed' => 'As senhas nao correspondem uma com a outra!',
        ];
    }
}
