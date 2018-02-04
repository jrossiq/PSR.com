<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
  public function getFullImgUrl(){
    return '/img/authors/'. $this->img;
  }
}
