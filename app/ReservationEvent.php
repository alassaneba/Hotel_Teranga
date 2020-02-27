<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationEvent extends Model
{
    protected $guarded = [];
    public function User (){
        return $this->belongsTo('App\User');
    }
    public function TypeEvent (){
        return $this->belongsTo('App\TypeEvent');
    }
    public function Room (){
        return $this->belongsTo('App\Room');
    }
    public function DisposalRoom (){
        return $this->belongsTo('App\DisposalRoom');
    }
  }
