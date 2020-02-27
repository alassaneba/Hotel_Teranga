<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];
    public function ReservationEvents (){
        return $this->hasMany('App\ReservationEvent');
    }

}
