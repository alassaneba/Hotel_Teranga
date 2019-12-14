<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationEvent extends Model
{
    public function Administrator (){
        return $this->belongsTo('App\Administrator');
    }
    public function TypeEvent (){
        return $this->hasMany('App\TypeEvent');
    }
    public function Room (){
        return $this->hasMany('App\Room');
    }
    public function MaterialRoom (){
        return $this->hasMany('App\MaterialRoom');
    }
    public function DisposalRoom (){
        return $this->hasMany('App\DisposalRoom');
    }
}
