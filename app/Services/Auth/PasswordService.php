<?php

namespace App\Services\Auth;

use App\Services\HashService;
use App\Services\User\FindUserService;

class PasswordService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected FindUserService $findUserService, protected HashService $hashService)
    {
        //
    }

    public function setPassword(array $data)
    {
        $user = $this->findUserService->findUser('contact', $data['contact']);

        $password = $this->hashService->makeHash($data['password']);

        $user->update(['password' => $password]);
    }
}
