<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAuthRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'username' => ['required', 'string', 'min:3', 'unique:users'],
            'email' => ['required', 'string', 'email', 'min:3', 'unique:users'],
            'password' => ['required', 'confirmed' ,'min:3'],
        ];
    }
}
