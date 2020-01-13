<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BesoinClient extends Model
{
  protected $guarded = [];
  public function User (){
      return $this->belongsTo('App\User');
}
}
