<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            // new user fields validation
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255'
            ],
            'email' => [
                'required',
                'email',
                //'unique:users', // or 'unique:users,email' to specify the column name
                Rule::unique('users', 'email')->ignore($this->user, 'id') // ignores when updating user
            ],
            'password' => [
                'required',
                'min:3',
                'max:20',
            ]
        ];
    }
}
