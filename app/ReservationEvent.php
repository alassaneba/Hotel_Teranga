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
        return $this->hasMany('App\TypeEvent');
    }
    public function Room (){
        return $this->hasMany('App\Room');
    }
    public function DisposalRoom (){
        return $this->hasMany('App\DisposalRoom');
    }
}
