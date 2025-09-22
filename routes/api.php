<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['namespace' => 'App\Http\Controllers\API', 'as' => 'api.'], function () {
    Route::group(['controller' => 'AuthController'], function () {
        Route::prefix('vendor/')->as('vendor.')->group(function () {
            Route::post('register', 'vendorRegister')->name('register');
            Route::post('login', 'vendorLogin')->name('login');
            Route::post('request-otp', 'requestOTP')->name('request.otp');
            Route::post('verify-otp', 'verifyOTP')->name('verify.otp');
            Route::post('password', 'password')->name('password');
            Route::post('pin', 'pin')->name('pin');
            Route::post('reset/password/{user}', 'resetPassword')->name('reset.password');
        });
        Route::prefix('customer/')->as('customer.')->group(function () {
            Route::post('register', 'customerRegister')->name('register');
            Route::post('login', 'customerLogin')->name('login');
        });
    });
});
