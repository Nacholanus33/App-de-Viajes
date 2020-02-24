<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'patent', 'work_from_hour', 'work_to_hour',
    ];
    public function  user(){
      return $this->belongsTo('App\User');
    }
    public function  brand(){
      return $this->belongsTo('App\Brand');
    }
}
