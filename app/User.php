<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function ReservationBedroom (){
        return $this->hasMany('App\ReservationBedroom');
    }

    public function ReservationEvent (){
        return $this->hasMany('App\ReservationEvent');
    }
    public function Contact () {
        return $this->hasMany('App\Contact');
    }
    public function BesoinClient () {
        return $this->hasMany('App\BesoinClient');
    }
    public function Temoignage () {
        return $this->hasMany('App\Temoignage');
    }
    public function Services () {
        return $this->hasMany('App\Services');
    }
    public function isSuperadmin(){
        return strtolower(@$this->role) === 'Superadmin'? true : false;
    }
    /**Cette méthode va determiner si le user connecté a un role admin*/
    public function isAdmin(){
        return strtolower(@$this->role) === 'Admin'? true : false;
    }

    /**Cett méthode va determiner si le user connecté a un role moderator*/
    public function isModerator(){
        return strtolower(@$this->role) === 'Moderator'? true : false;
    }


}
