<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatedUserRequest extends FormRequest
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

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório',
            'email.email' => 'E-mail inválid',
            'email.required' => 'E-mail é obrigatório',
            'password.required' => 'Senha é obrigatória',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'email|unique:users,email,id',
            'password' => 'confirmed|required|min:6',
            'password_confirmation' => 'required'
        ];
    }
}
