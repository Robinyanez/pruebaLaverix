<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidatePassword;

class StoreRequest extends FormRequest
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
            'name'          => 'required',
            'last_name'     => 'required',
            'phone'         => 'required|numeric|digits:10',
            'address'       => 'required',
            'date_of_birth' => 'required',
            'email'         => 'required|email|unique:users,email',
            /* 'password'      => 'required', */
            'password'      => ['required','confirmed','string', new ValidatePassword()],
            'role_id'       => 'required',
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
            'name'          => 'Nombres',
            'last_name'     => 'Apellidos',
            'phone'         => 'Teléfono',
            'address'       => 'E-mail',
            'date_of_birth' => 'Fecha de Nacimiento',
            'email'         => 'E-mail',
            'password'      => 'Contraseña',
            'role_id'       => 'Rol',
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
            'name.required'                 => 'El :attribute es obligarotio.',
            'last_name.required'            => 'El :attribute es obligarotio.',
            'email.required'                => 'El :attribute es obligarotio.',
            'email.unique'                  => 'El :attribute ya existe',
            'email.email'                   => 'El :attribute debe ser tipo :attribute',
            'phone.required'                => 'El :attribute es obligarotio.',
            'phone.digits'                  => 'La :attribute no debe tener menos ni pasar de 10 números.',
            'phone.numeric'                 => 'EL :attribute debe ser un tipo numérico.',
            'date_of_birth.required'        => 'La :attribute es obligarotio.',
            'password.required'             => 'La :attribute es obligatorio.',
            'password.confirmed'            => 'La confirmación de la :attribute no coincide.',
            'role_id.required'              => 'El :attribute es obligatorio.',
        ];
    }
}
