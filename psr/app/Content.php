<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Content extends Model
{
    protected $fillable = ['section_id', 'videotype_id', 'mediatype_id', 'url', 'canonical', 'title', 'html_title', 'description', 'social_desc', 'radio_url',
    'social_img', 'typeview_id', 'text', 'author_id', 'tags', 'video_id', 'img_url', 'date', 'reference', 'user_id', 'filter_id'];

    public function typeView(){
        return $this->belongsTo('App\Typeview', 'typeview_id');
    }

    public function section(){
        return $this->belongsTo('App\Section');
    }

    public function author(){
        return $this->belongsTo('App\Author');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag', 'tagscontents', 'content_id', 'tag_id');
    }

    public function creator(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getDate(){
        return date_format($this->created_at, 'd-m-Y');
    }

    public function editors(){
        return $this->belongsToMany('App\User', 'userscontents', 'content_id', 'user_id');
    }


    public function renderDate(){
      setlocale(LC_TIME, 'Spanish');
      $param = '%d %B %Y';
      return Carbon::parse($this->date)->formatLocalized($param);
    }

    public function getFullUrl(){
      $url = '/';
      if($this->section->section_id)$url.=$this->section->parent->url.'/';
      $url.=$this->section->url.'/';
      $url.=$this->url;
      return $url;
    }

    public function getBreadcrumb(){
      $result = [];
      $current = $this->section;
      while($current->section_id){
        $results[] = array('url'=>$current->parent->url.'/'.$current->url,'name'=>$current->name);
        $current = $current->parent;
      }
      $results[] = array('url'=>$current->url,'name'=>$current->name);
      $results = array_reverse($results);
      return $results;
      /*
      if($this->section->section_id){
        return [array('url'=>$this->section->parent->url,'name'=>$this->section->parent->name),
        array('url'=>$this->section->parent->url."/".$this->section->url,'name'=>$this->section->name)];
      }else{
        return [array('url'=>$this->section->url,'name'=>$this->section->name)];
      }
      */
    }

    public function getStandardImg($tipeView){
      if($tipeView == 3){
        return '/img/articulos/standard/'.$this->img_url;
      }elseif($tipeView == 4){
        return '/img/programas/standard/'.$this->img_url;
      }elseif($tipeView == 5){
        return '/img/radio/standard/'.$this->img_url;
      }elseif($tipeView == 6){
        return '/img/medios/standard/'.$this->img_url;
      }elseif($tipeView == 9){
        return '/img/libros/standard/'.$this->img_url;
      }elseif($tipeView == 11){
        return '/img/PSR-en-accion/standard/'.$this->img_url;
      }
    }

    public function getMediumImg($tipeView){
      if($tipeView == 3){
        return '/img/articulos/medium/'.$this->img_url;
      }elseif($tipeView == 4){
        return '/img/programas/medium/'.$this->img_url;
      }elseif($tipeView == 5){
        return '/img/radio/medium/'.$this->img_url;
      }elseif($tipeView == 6){
        return '/img/medios/medium/'.$this->img_url;
      }elseif($tipeView == 9){
        return '/img/libros/medium/'.$this->img_url;
      }elseif($tipeView == 11){
        return '/img/PSR-en-accion/medium/'.$this->img_url;
      }
    }

    public function getSmallImg($tipeView){
      if($tipeView == 3){
        return '/img/articulos/small/'.$this->img_url;
      }elseif($tipeView == 4){
        return '/img/programas/small/'.$this->img_url;
      }elseif($tipeView == 5){
        return '/img/radio/small/'.$this->img_url;
      }elseif($tipeView == 6){
        return '/img/medios/small/'.$this->img_url;
      }elseif($tipeView == 9){
        return '/img/libros/small/'.$this->img_url;
      }elseif($tipeView == 11){
        return '/img/PSR-en-accion/small/'.$this->img_url;
      }
    }

    public function getImageByType($type){
      switch ($type) {
        case 1:$subfolder='standard'; break;
        case 2:$subfolder='medium'; break;
        case 3:$subfolder='small'; break;
      }
      //dd($this->typeview_id);
      switch ($this->typeview_id) {
        case 2:$folder='pilares'; break;
        case 3:$folder='articulos'; break;
        case 4:$folder='programas'; break;
        case 5:$folder='radio'; break;
        case 6:$folder='medios'; break;
        case 9:$folder='libros'; break;
        case 12:$folder='custom'; break;
        case 11:$folder='PSR-en-accion'; break;
        case 13:$folder='eventos'; break;
        case 14:$folder='videos-cortos'; break;
      }
      return '/img/'.$folder.'/'.$subfolder.'/'.$this->img_url;
    }

    public function addView(){
      $this->views += 1;
      $this->save();
    }

    public function getProgramaTag(){
      $tags = [1,2,3,50];//nacional,internacional,especial,doctrina
      foreach ($this->tags()->getResults() as $value) {
        if(in_array($value->id,$tags))return $value;
      }
      return new Tag();
    }

    public function getMedioImg(){
      switch ($this->filter_id) {
        case 1:$folder='canal-26'; break;
        case 2:$folder='cronica-tv'; break;
        case 3:$folder='russia-today'; break;
        case 4:$folder='annurtv'; break;
        case 5:$folder='hispantv'; break;
        case 6:$folder='c5n'; break;
        case 6:$folder='telesur'; break;
        case 6:$folder='actualidadrt'; break;
        case 9:$folder='redvoltaire'; break;
        case 10:$folder='newdownmagazine'; break;
        case 11:$folder='ntn24'; break;
        default: return "";
      }
      return '/img/medios/'.$folder.'.jpg';
    }
}
