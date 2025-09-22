<?php

namespace App\Http\Requests\API\Auth;

use App\Http\Requests\API\BaseRequest;

class PasswordRequest extends BaseRequest
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
            'contact' => 'required|exists:users,contact',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ];
    }

    /**
     * Custom messages for validation errors.
     *
     * @return array<string,string>
     */
    public function messages(): array
    {
        return [
            'contact.exists' => 'We couldn’t find any user with that contact number.',
        ];
    }
}
