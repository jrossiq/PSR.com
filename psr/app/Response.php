<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
  protected $fillable = [
      'text', 'user_id', 'contact_id'
  ];

  public function user(){
      return $this->belongsTo('App\User');
  }
}
