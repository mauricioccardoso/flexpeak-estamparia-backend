<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3'],
            'address' => ['required', 'string', 'min: 5'],
            'phone' => ['required', 'string', 'min: 11', 'max: 15'],
            'email' => ['required', 'email', 'string', 'unique:users,email'],
            'password' => [
                'confirmed',
                'required',
                Password::min(8)->mixedCase()->numbers()->symbols()
            ] 
        ];
    }
}
