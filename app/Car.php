<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'patent', 'work_from_hour', 'work_to_hour',
    ];
}
