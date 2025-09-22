<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Models\UserDevice;
use App\Services\HashService;
use Illuminate\Support\Facades\DB;
use Throwable;

class LoginService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected HashService $hashService)
    {
        //
    }

    public function vendorLogin(array $data)
    {
        return DB::transaction(function () use ($data) {
            try {
                $user = User::where('contact', $data['contact'])->first();

                if (!$user) {
                    return ['success' => false, 'code' => 404, 'message' => 'User not found'];
                }

                if (!$user->hasRole('vendor')) {
                    return ['success' => false, 'code' => 403, 'message' => 'You are not a vendor.'];
                }

                $isValid = strlen($data['password']) === 4
                    ? $this->hashService->checkHash($data['password'], $user->mpin)
                    : $this->hashService->checkHash($data['password'], $user->password);

                if (!$isValid) {
                    return ['success' => false, 'code' => 401, 'message' => 'Credential did not match'];
                }

                $this->manageUserDevice($data, $user);


                $token = $this->generateToken($data['device_name'], $user);

                return [
                    'success' => true,
                    'code' => 200,
                    'data' => [
                        'token' => $token,
                        'role' => 'vendor',
                        'user' => $user->makeHidden(['roles']),
                    ]
                ];
            } catch (Throwable $t) {
                return [
                    'success' => false,
                    'code' => 500,
                    'data' => [
                        'message' => $t->getMessage(),
                    ],
                ];
            }
        });
    }

    public function customerLogin(array $data)
    {
        return DB::transaction(function () use ($data) {
            $user = User::where('contact', $data['contact'])->first();

            if (!$user) {
                return ['success' => false, 'code' => 404, 'message' => 'User not found'];
            }

            if (!$user->hasRole('customer')) {
                return ['success' => false, 'code' => 403, 'message' => 'You are not a customer.'];
            }

            $isValid = strlen($data['password']) === 4
                ? $this->hashService->checkHash($data['password'], $user->mpin)
                : $this->hashService->checkHash($data['password'], $user->password);

            if (!$isValid) {
                return ['success' => false, 'code' => 401, 'message' => 'Credential did not match'];
            }

            $this->manageUserDevice($data, $user);

            $token = $this->generateToken($data['device_name'], $user);

            return [
                'success' => true,
                'code' => 200,
                'data' => [
                    'token' => $token,
                    'role' => 'customer',
                    'user' => $user->makeHidden(['roles']),
                ]
            ];
        });
    }

    public function manageUserDevice(array $data, User $user)
    {
        DB::transaction(function () use ($data, $user) {
            $userDevice = UserDevice::where('uuid', $data['uuid'])->first();

            if (!$userDevice) {
                $userDevice = UserDevice::create([
                    'uuid' => $data['uuid'],
                    'user_id' => $user->id,
                    'device_id' => $data['device_id'],
                    'fcm_id' => $data['fcm_id'],
                    'device_name' => $data['device_name'],
                    'order' => UserDevice::where('user_id', $user->id)->count() + 1,
                ]);
            } else {
                $userDevice->update([
                    'device_id' => $data['device_id'],
                    'fcm_id' => $data['fcm_id'],
                    'device_name' => $data['device_name'],
                ]);
            }
        });
    }

    public function generateToken(string $related, object $user)
    {
        $token = $user->createToken($related)->plainTextToken;
        return $token;
    }
}
