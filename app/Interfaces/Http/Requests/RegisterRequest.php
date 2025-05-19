<?php

namespace App\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'         => 'required|string|max:255',
            'email'        => 'required|string|email|max:255|unique:users,email',
            'password'     => 'required|string|min:6|confirmed',
            'role'         => 'in:admin,user',
            'cep'          => 'nullable|string|max:10',
            'street'       => 'nullable|string|max:255',
            'number'       => 'nullable|string|max:10',
            'neighborhood' => 'nullable|string|max:255',
            'city'         => 'nullable|string|max:255',
            'state'        => 'nullable|string|max:255',
        ];
    }
}
