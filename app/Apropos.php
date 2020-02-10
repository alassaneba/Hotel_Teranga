<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apropos extends Model
{
  protected $guarded = [];
  public function User ()
  {
      return $this->belongsTo('App\User');
  }
}
