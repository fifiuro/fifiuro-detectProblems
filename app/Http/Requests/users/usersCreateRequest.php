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
            'password'  => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
                'confirmed',
                'regex:/^\S*$/u'
            ],
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
            'password.required'         => 'La Contraseña es obligatorio.',
            'password.string'           => 'La contraseña debe ser una cadena de texto.',
            'password.min'              => 'La contraseña debe tener al menos 8 caracteres.',
            'password.regex'            => 'La contraseña debe contener al menos una letra minúscula, una letra mayúscula, un número y un carácter especial.',
            'password.confirmed'        => 'La confirmación de la contraseña no coincide.',
            'password.regex:/^\S*$/u'   => 'La contraseña no debe contener espacios.',
            'password.confirmed'        => 'Las Contraseñas no coinciden.',
            'password.strong_password'  => 'Las Contraseñas que se escribio es debil y esta en la lista de contraseñas comunes.',
        ];
    }
}
