<?php

namespace App\Http\Requests\API\Auth;

use App\Http\Requests\API\BaseRequest;

class CustomerRegisterRequest extends BaseRequest
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
            'name' => 'required|max:64|regex:^[A-Za-z]+$^',
            'address' => 'required',
            'email' => 'nullable|email',
            'contact' => 'required|unique:customers,contact',
            'password' => 'min:8',
            'mpin' => 'size:4',
        ];
    }
}
