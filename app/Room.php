<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];
    public function ReservationEvent (){
        return $this->belongsTo('App\ReservationEvent');
    }
}
