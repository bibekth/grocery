<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that gets hidden on Model instance.
     *
     * @var list<string>
     */
    protected $hidden = ['created_at', 'deleted_at'];
}
