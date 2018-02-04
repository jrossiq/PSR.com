<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
  public function polls(){
      return $this->hasMany('App\Poll');
  }

  public function users(){
      return $this->belongsToMany('App\User', 'users_provinces', 'province_id', 'user_id');
  }
}
