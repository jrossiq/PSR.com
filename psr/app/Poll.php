<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
  protected $fillable = [
      'name', 'lastname', 'sex', 'age', 'province_id', 'country_id', 'city', 'studies', 'occupation', 'telephone', 'email', 'comments'
  ];

  public function country(){
      return $this->belongsTo('App\Country');
  }

  public function province(){
      return $this->belongsTo('App\Province');
  }

  public function helps(){
      return $this->belongsToMany('App\Help', 'polls_helps', 'poll_id', 'help_id');
  }

  public function observations(){
      return $this->belongsToMany('App\Observation', 'polls_observations', 'poll_id', 'observation_id');
  }
}
