<?php

namespace App\Services\User;

use App\Models\User;

class FindUserService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function findUser(string $field, $value) {
        return User::where($field, $value)->first();
    }
}
