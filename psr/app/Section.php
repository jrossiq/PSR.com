<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'level', 'section_id', 'name', 'url', 'text', 'topnav', 'topnav_back', 'html_title', 'description', 'social_desc',
        'typeview_id', 'order', 'active'
    ];

    public function childrens(){
      return $this->hasMany('App\Section', 'section_id')->where('sections.active',1);
    }

    public function parent(){
        return $this->belongsTo('App\Section', 'section_id');
    }

    public function typeView(){
        return $this->belongsTo('App\Typeview', 'typeview_id');
    }

    public function getSubSections(){
        if($this->childrens->count()){
          return $this->childrens;
        }
        return false;
    }

    public function contents(){
      return $this->hasMany('App\Content')->where('active',1)->orderBy('date','desc');
    }

    public function getLink(){
      return "<a href='/".$this->url."'>".$this->name."</a>";
    }

    public function getBreadcrumb(){
      $results = [];
      $current = $this;
      while($current->section_id){
        $results[] = array('url'=>$current->parent->getFullUrl(),'name'=>$current->parent->name);
        $current = $current->parent;
      }
      $results = array_reverse($results);
      $results[] = array('url'=>$this->getFullUrl(),'name'=>$this->name);
      return $results;
    }

    //para hacer poliformico el objeto seccion, y que tome el atributto title para el seo y social
    //<meta property="og:title" content="{{$target->title}}" /> $seccion no posee atributo title
    public function getTitleAttribute($value){
      return $this->name;
    }

    //idem poliformico
    public function getFullUrl(){
      $results = [];
      $current = $this;
      while($current->section_id){
        $results[] = $current->url;
        $current = $current->parent;
      }
      $results[] = $current->url;
      $results = array_reverse($results);
      //dd($results);
      return '/'.implode("/", $results);
    }

    public function getImageByType($type){
      switch ($type) {
        case 1:$subfolder='standard'; break;
        case 2:$subfolder='medium'; break;
        case 3:$subfolder='small'; break;
      }

      return '/img/secciones/'.$subfolder.'/'.$this->social_img;
    }

}
