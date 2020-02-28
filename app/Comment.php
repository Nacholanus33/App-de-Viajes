<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = [
      'rating', 'content',
  ];
  public function  trip(){
    return $this->belongsTo('App\Trip');
  }
}
