<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip_request extends Model
{
  protected $fillable = [
      'estimated_time','total_price','user_id','from_address', 'to_address',
  ];
  public function  user(){
    return $this->belongsTo('App\User');
  }
  public function  trip(){
    return $this->hasOne('App\Trip');
  }
}
