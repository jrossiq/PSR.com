<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accession extends Model
{
  protected $fillable = ['name', 'lastname', 'city', 'email', 'telephone'];
}
