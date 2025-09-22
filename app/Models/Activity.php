<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends BaseModel
{
    protected $casts = ['data' => 'array'];
}
