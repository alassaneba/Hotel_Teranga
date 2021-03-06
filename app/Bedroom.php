<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bedroom extends Model
{
    protected $guarded = [];
    public function ReservationBedrooms (){
        return $this->hasMany('App\ReservationBedroom');
    }

    public function Chambres (){
      return $this->hasMany(Chambre::class);
    }
}
