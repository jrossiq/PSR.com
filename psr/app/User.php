<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'telephone', 'zone', 'type_id', 'facebook', 'provinces', 'countries' , 'img'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function type(){
        return $this->belongsTo('App\Type');
    }

    public function provinces(){
        return $this->belongsToMany('App\Province', 'users_provinces', 'user_id', 'province_id');
    }

    public function countries(){
        return $this->belongsToMany('App\Country', 'users_countries', 'user_id', 'country_id');
    }

    public function contacts(){
        return $this->hasMany('App\Contact', 'user_id');
    }
}
