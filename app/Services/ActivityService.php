<?php

namespace App\Services;

use App\Models\Activity;

class ActivityService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create(string $event, array $data): void
    {
        Activity::create([
            'event' => $event,
            'data' => $data,
        ]);
    }
}
