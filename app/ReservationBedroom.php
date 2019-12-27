<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationBedroom extends Model
{
    protected $guarded = [];
    public function User (){
        return $this->belongsTo('App\User');
    }
    public function Bedroom (){
        return $this->hasMany('App\Bedroom');
    }

}
