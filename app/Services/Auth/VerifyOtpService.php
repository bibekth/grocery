<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Services\HashService;
use Illuminate\Support\Facades\Hash;

class VerifyOtpService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected HashService $hashService)
    {
        //
    }

    public function verifyOTP(array $data)
    {
        $user = User::where('contact', $data['contact'])->first();

        $check = $this->hashService->checkHash($data['otp'], $user->otp_code);

        if (!$check) {
            return [
                'success' => false,
                'message' => 'OTP code did not match.',
                'code' => 401
            ];
        }

        return [
            'success' => true,
        ];
    }
}
