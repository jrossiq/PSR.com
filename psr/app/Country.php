<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  public function polls(){
      return $this->hasMany('App\Poll');
  }

  public function users(){
      return $this->belongsToMany('App\User', 'users_countries', 'country_id', 'user_id');
  }
}
