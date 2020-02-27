<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeEvent extends Model
{
    protected $guarded = [];
    public function ReservationEvents (){
        return $this->hasMany('App\ReservationEvent');
    }
}
