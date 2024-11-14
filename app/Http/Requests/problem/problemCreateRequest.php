<?php

namespace App\Http\Requests\problem;

use Illuminate\Foundation\Http\FormRequest;

class problemCreateRequest extends FormRequest
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
            'problem'       => 'required|string',
            'coordinates'   => 'required|string',
            'zone'          => 'required|max:255',
            'street'        => 'required|max:255',
            'other'         => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'problem.required'      => 'El Nombre del Problema es obligatorio.',
            'problem.string'        => 'El Nombre del Problema tener solo caracteres.',
            'coordinates.required'  => 'La URL de coordenadas es obligatorio.',
            'coordinates.string'    => 'La URL de coordenadas debe contener solo caracteres.',
            'zone.required'         => 'El Dato Zona es obligatorio.',
            'zone.max'              => 'El Dato Zona debe contener como maximo 255 de caracteres.',
            'street.required'       => 'El Dato Calle es obligatorio.',
            'street.max'            => 'El Dato Calle debe contener como maximo 255 de caracteres.',
            'other.string'          => 'El Dato Otros debe contener solo caracteres.',
        ];
    }
}
