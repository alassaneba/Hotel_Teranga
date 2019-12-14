<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function ReservationEvent (){
        return $this->belongsTo('App\ReservationEvent');
    }
}
