<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    protected $filable = ['code','nom'];
    public function bedroom(){
      return $this->belongsTo(Bedroom::class);
    }

}
