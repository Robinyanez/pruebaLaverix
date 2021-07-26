<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidatePassword;

class UpdatePasswordRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'password'  => ['required','confirmed','string', new ValidatePassword()],
        ];
    }

    /**
     * Cambio de nombre a los atributos
     *
     * @return void
     */
    public function attributes()
    {
        return [
            'password'  => 'Contraseña',
        ];
    }

    /**
     * Mensajes personalizados de validación
     *
     * @return void
     */
    public function messages()
    {
        return [
            'password.required'     => 'La :attribute es obligatorio.',
            'password.confirmed'    => 'La confirmación de la :attribute no coincide.',
        ];
    }
}

