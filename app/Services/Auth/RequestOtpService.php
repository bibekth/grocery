<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Models\Vendor;
use App\Services\HashService;
use App\Services\User\RegisterUserService;
use Illuminate\Support\Facades\DB;

class RequestOtpService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected HashService $hashService, protected RegisterUserService $registerUserService)
    {
        $this->hashService = $hashService;
        $this->registerUserService = $registerUserService;
    }


    public function requestOTP(array $data, $requestIP)
    {
        return DB::transaction(function () use ($data, $requestIP) {
            $contact = $data['contact'];
            $otp_code = $this->makeOtpCode();
            $time = time();

            $user = User::where('contact', $contact)->first();

            $user->syncRoles('vendor');

            $user->otp_code = $this->hashService->makeHash($otp_code);
            $user->otp_registered = $time;
            $user->save();

            $this->sendOTP($otp_code, $user->contact);

            return [
                'success' => true,
                'data' => ['otp_code' => $otp_code],
            ];
        });
    }

    private function makeOtpCode()
    {
        return '123456';
        // return random_int(100000, 999999);
    }

    private function sendOTP() {}
}
