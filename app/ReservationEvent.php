<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationEvent extends Model
{
    protected $guarded = [];
    public function Administrator (){
        return $this->belongsTo('App\Administrator');
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
