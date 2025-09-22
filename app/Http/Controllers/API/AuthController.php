<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Auth\CustomerRegisterRequest;
use App\Http\Requests\API\Auth\LoginRequest;
use App\Http\Requests\API\Auth\PasswordRequest;
use App\Http\Requests\API\Auth\PinRequest;
use App\Http\Requests\API\Auth\RequestOtpRequest;
use App\Http\Requests\API\Auth\ResetPasswordRequest;
use App\Http\Requests\API\Auth\VendorRegisterRequest;
use App\Http\Requests\API\Auth\VerifyOtpRequest;
use App\Models\User;
use App\Services\Auth\LoginService;
use App\Services\Auth\PasswordService;
use App\Services\Auth\PinService;
use App\Services\Auth\RegisterService;
use App\Services\Auth\RequestOtpService;
use App\Services\Auth\ResetPasswordService;
use App\Services\Auth\VerifyOtpService;
use Illuminate\Http\JsonResponse;
use Throwable;

class AuthController extends BaseController
{
    public function vendorRegister(VendorRegisterRequest $request, RegisterService $registerService)
    {
        $registerService->registerVendor($request->all());

        return $this->send201();
    }

    public function customerRegister(CustomerRegisterRequest $request, RegisterService $registerService)
    {
        $registerService->registerCustomer($request->all());

        return $this->send201();
    }

    public function vendorLogin(LoginRequest $request, LoginService $loginService)
    {
        return $loginService->vendorLogin($request->all());
    }

    public function customerLogin(LoginRequest $request, LoginService $loginService)
    {
        return $loginService->customerLogin($request->all());
    }

    public function requestOTP(RequestOtpRequest $requestOtpRequest, RequestOtpService $requestOtpService): JsonResponse
    {
        try {
            $response = $requestOtpService->requestOTP($requestOtpRequest->toArray(), $requestOtpRequest->ip());

            if ($response['success']) {
                return $this->sendData($response['data']);
            } else {
                return $this->errorResponse($response['message'], $response['code']);
            }
        } catch (Throwable $t) {
            return $this->error500($t->getMessage());
        }
    }

    public function verifyOTP(VerifyOtpRequest $verifyOtpRequest, VerifyOtpService $verifyOtpService): JsonResponse
    {
        try {
            $response = $verifyOtpService->verifyOTP($verifyOtpRequest->toArray());
            if ($response['success']) {
                return $this->sendData();
            } else {
                return $this->errorResponse($response['message'], $response['code']);
            }
        } catch (Throwable $t) {
            return $this->error500($t->getMessage());
        }
    }

    public function password(PasswordRequest $passwordRequest, PasswordService $passwordService)
    {
        try {
            $response = $passwordService->setPassword($passwordRequest->toArray());
            return $this->send202();
        } catch (Throwable $t) {
            return $this->error500($t->getMessage());
        }
    }

    public function pin(PinRequest $pinRequest, PinService $pinService)
    {
        try {
            $response = $pinService->setPin($pinRequest->toArray());
            return $this->send202();
        } catch (Throwable $t) {
            return $this->error500($t->getMessage());
        }
    }

    public function resetPassword(ResetPasswordRequest $resetPasswordRequest, User $user, ResetPasswordService $resetPasswordService)
    {
        try{
            $resetPasswordService->resetPasswordAndPin($resetPasswordRequest->toArray(), $user);
            return $this->sendResponse();
        }catch(Throwable $t) {
            return $this->error500($t->getMessage());
        }
    }
}
