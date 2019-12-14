<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeEvent extends Model
{
    public function ReservationEvent (){
        return $this->belongsTo('App\ReservationEvent');
    }
}
