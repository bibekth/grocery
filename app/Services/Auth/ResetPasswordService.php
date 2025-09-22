<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Services\HashService;

class ResetPasswordService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected HashService $hashService)
    {
        //
    }

    public function resetPasswordAndPin(array $data, User $user)
    {
        $user->update(['password' => $this->hashService->makeHash($data['password']), 'mpin' => $this->hashService->makeHash($data['mpin'])]);
    }
}
