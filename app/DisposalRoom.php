<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisposalRoom extends Model
{
  public function ReservationEvents (){
      return $this->hasMany('App\ReservationEvent');
  }

}
