<?php

namespace App\Services\User;

use App\Models\User;

class RegisterUserService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create(array $data)
    {
        return User::create($data);
    }
}
