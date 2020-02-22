<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip_request extends Model
{
  protected $fillable = [
      'from_address', 'to_address',
  ];
}
