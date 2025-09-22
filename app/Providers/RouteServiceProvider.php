<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ProvidersRouteServiceProvider;
use Illuminate\Support\Facades\RateLimiter;

class RouteServiceProvider extends ProvidersRouteServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        RateLimiter::for('login', function ($request) {
            return Limit::perMinute(10)->by($request->ip());
        });

        RateLimiter::for('request-otp', function ($request) {
            return Limit::perMinute(1)->by($request->ip());
        });
    }
}
