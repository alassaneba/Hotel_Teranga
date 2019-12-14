<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    public function ReservationBedroom (){
        return $this->hasMany('App\ReservationBedroom');
    }

    public function ReservationEvent (){
        return $this->hasMany('App\ReservationEvent');
    }

}
