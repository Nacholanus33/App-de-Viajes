<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
  public function  car(){
    return $this->belongsTo('App\Car');
  }
  public function  trip_request(){
    return $this->belongsTo('App\Trip_request');
  }
  public function comment(){
    return $this->hasOne('App\Comment');
  }
}
