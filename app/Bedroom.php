<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bedroom extends Model
{
    public function ReservationBedroom (){
        return $this->belongsToMany('App\ReservationBedroom');
    }
}
