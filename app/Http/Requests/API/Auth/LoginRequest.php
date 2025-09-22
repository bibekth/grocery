<?php

namespace App\Http\Requests\API\Auth;

use App\Http\Requests\API\BaseRequest;

class LoginRequest extends BaseRequest
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
            'contact' => 'required|numeric|digits_between:8,15|exists:users,contact',
            'password' => 'required|string|min:4',
            'device_id' => 'required|string',
            'fcm_id' => 'required|string',
            'device_name' => 'required|string',
            'uuid' => 'required|string',
        ];
    }
}
