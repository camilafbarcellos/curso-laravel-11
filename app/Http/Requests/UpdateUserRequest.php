<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// extends the StoreUserRequest class
class UpdateUserRequest extends StoreUserRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // allow personalized rules
        $rules = parent::rules();

        // turn password nullable
        $rules['password'] = [
            'nullable',
            'min:6',
            'max:20',
        ];

        return $rules;
    }
}
