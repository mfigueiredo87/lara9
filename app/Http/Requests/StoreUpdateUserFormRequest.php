<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //verifica se o user logado tem autorizacao para fazer a operacao
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // validando o id unico do usuario olhando pelo nome. Ou seja, nao podemos usar um email que ja existe para outro usuario
        $id = $this->id ?? '';

        $rules = [
            'name' => 'required|string|max:255|min:3',
            'email'=>[
                'required',
                'email',
                "unique:users,email,{$id},id",
            ],
            'password' =>[
                'required',
                'min:4',
                'max:15',
            ]

        ];
        // verificando o verbo http que veio por request
        if ($this->method('PUT')){
            $rules['password'] = [
                'nullable',
                'min:4',
                'max:15',
            ];
        }

        return $rules;
    }
}
