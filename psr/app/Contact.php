<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'email', 'subject', 'message', 'user_id', 'province_id', 'no_coordinator', 'userView', 'text', 'view', 'cantacted'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function province(){
        return $this->belongsTo('App\Province');
    }

    public function response(){
        return $this->hasMany('App\Response', 'contact_id');
    }

}
