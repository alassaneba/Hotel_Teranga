<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationBedroom extends Model
{
    public function Administrator (){
        return $this->belongsTo('App\Administrator');
    }
    public function Bedroom (){
        return $this->hasMany('App\Bedroom');
    }

}
