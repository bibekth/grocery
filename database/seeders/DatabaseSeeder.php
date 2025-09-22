<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::insert([
            ['name' => 'admin', 'guard_name' => 'web'],
            ['name' => 'vendor', 'guard_name' => 'web'],
            ['name' => 'customer', 'guard_name' => 'web'],
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        for($i = 0; $i<100; $i++) {
            $vendor = Vendor::create([
                'name' => 'Test Vendor ' . $i,
                'firm_name' => 'Test Vendor ' . $i,
                'address' => 'Test Address ' . $i,
                'contact' => '000000000' . $i,
                'pan_vat' => '',
                'email' => 'testvendor' . $i .'@gmail.com'
            ]);
        }
        // $customer = Customer::create([
        //     'name' => 'Test Customer',
        //     'phone_number' => '0000000001',
        //     'email' => 'testcustomer@gmail.com',
        //     'address' => 'Test Address',
        // ]);
        // User::insert([
        //     [
        //         'name' => 'Test Vendor',
        //         'email' => 'vendor@example.com',
        //         'password' => Hash::make('password'),
        //         'created_at' => now(),
        //     ],
        //     // [
        //     //     'name' => 'Test Customer',
        //     //     'email' => 'testcustomer@gmail.com',
        //     //     'password' => Hash::make('0000000001'),
        //     //     'phone_number' => '0000000001',
        //     //     'role' => 'User',
        //     //     'customer_id' => 1,
        //     //     'created_at' => now(),
        //     // ]
        // ]);
    }
}
