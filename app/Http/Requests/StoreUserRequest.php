<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'name.string' => 'El campo nombre debe ser una cadena de texto',
            'name.max' => 'El campo nombre no debe exceder los 255 caracteres',
            'username.required' => 'El campo usuario es obligatorio',
            'username.string' => 'El campo usuario debe ser una cadena de texto',
            'username.max' => 'El campo usuario no debe exceder los 255 caracteres',
            'username.unique' => 'El usuario ya ha sido registrado',
            'email.required' => 'El campo correo electrónico es obligatorio',
            'email.string' => 'El campo correo electrónico debe ser una cadena de texto',
            'email.email' => 'El campo correo electrónico debe ser una dirección de correo válida',
            'email.max' => 'El campo correo electrónico no debe exceder los 255 caracteres',
            'email.unique' => 'El correo electrónico ya ha sido registrado',
            'password.required' => 'El campo contraseña es obligatorio',
            'password.string' => 'El campo contraseña debe ser una cadena de texto',
            'password.min' => 'El campo contraseña debe tener al menos 8 caracteres',
        ];
    }
}
