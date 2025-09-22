<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;

class HashService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function makeHash(string $string): string
    {
        return Hash::make($string);
    }

    public function checkHash(string $value, string $hashedValue):bool
    {
        return Hash::check($value, $hashedValue);
    }
}
