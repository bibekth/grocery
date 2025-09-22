<?php

namespace App\Services\Auth;

use App\Services\HashService;
use App\Services\User\FindUserService;

class PinService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected FindUserService $findUserService, protected HashService $hashService)
    {
        //
    }

    public function setPin(array $data)
    {
        $user = $this->findUserService->findUser('contact', $data['contact']);

        $mpin = $this->hashService->makeHash($data['mpin']);

        $user->update(['mpin' => $mpin]);
    }
}
