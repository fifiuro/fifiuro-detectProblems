<?php

namespace App\Http\Requests\users;

use Illuminate\Foundation\Http\FormRequest;

class usersCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'      => 'required|max:255',
            'last_name' => 'required|max:255',
            'username'  => 'required|max:255|unique:users',
            'email'     => 'required|max:255|unique:users',
            'password'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'El Nombre de Usuario es obligatorio.',
            'name.string'               => 'El Nombre del Usuario tener solo caracteres.',
            'last_name.required'        => 'El Apellido de Usuario es obligatorio.',
            'last_name.string'          => 'El Apellido del Usuario tener solo caracteres.',
            'username.required'         => 'El Nombre de Usuario es obligatorio.',
            'username.max'              => 'El Nombre de Usuario debe tener como maximo de caracteres 140.',
            'username.unique'           => 'El Nombre de Usuario debe ser unico.',
            'email.required'            => 'El Correo Electrónico es obligatorio.',
            'email.max'                 => 'El Correo Electrónico debe tener como maximo de caracteres 255.',
            'email.unique'              => 'El Correo Electrónico debe ser unico.',
            'password.required'         => 'La Contraseña es obligatorio'
        ];
    }
}
