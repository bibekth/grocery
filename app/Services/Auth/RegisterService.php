<?php

namespace App\Services\Auth;

use App\Models\Customer;
use App\Models\User;
use App\Models\Vendor;
use App\Services\ActivityService;
use App\Services\HashService;
use App\Services\User\RegisterUserService;
use Illuminate\Support\Facades\DB;

class RegisterService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected RegisterUserService $registerUserService,
        protected HashService $hashService,
        protected ActivityService $activityService
    ) {
        //
    }

    public function registerVendor(array $data)
    {
        DB::transaction(function () use ($data) {

            $vendor = Vendor::create($data);

            $this->activityService->create('Vendor created', ['vendor_id' => $vendor->id]);

            $user = User::where('contact', $data['contact'])->first();

            if (!$user) {
                $user = $this->registerUserService->create([
                    'name' => $data['name'],
                    'contact' => $data['contact'],
                    'email' => $data['email'],
                    'password' => $this->hashService->makeHash($data['password']),
                    'mpin' => $this->hashService->makeHash($data['mpin']),
                    'vendor_id' => $vendor->id,
                ]);

                $this->activityService->create('User created', ['user_id' => $user->id]);
            }

            $user->update(['vendor_id' => $vendor->id]);

            $user->assignRole('vendor');
        });
    }

    public function registerCustomer(array $data)
    {
        DB::transaction(function () use ($data) {

            $customer = Customer::create($data);

            $this->activityService->create('Customer created', ['customer_id' => $customer->id]);

            $user = User::where('contact', $data['contact'])->first();

            if (!$user) {
                $user = $this->registerUserService->create([
                    'name' => $data['name'],
                    'contact' => $data['contact'],
                    'email' => $data['email'],
                    'password' => $this->hashService->makeHash($data['password']),
                    'mpin' => $this->hashService->makeHash($data['mpin']),
                    'customer_id' => $customer->id,
                ]);

                $this->activityService->create('User created', ['user_id' => $user->id]);
            }

            $user->update(['customer_id' => $customer->id]);

            $user->assignRole('customer');
        });
    }
}
