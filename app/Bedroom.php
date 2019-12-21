<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bedroom extends Model
{
    protected $guarded = [];
    public function ReservationBedroom (){
        return $this->belongsTo('App\ReservationBedroom');
    }
}
