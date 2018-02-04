<?php
$subsections = ($target->parent) ? $target->parent->getSubSections(): $target->getSubSections();
$mas = $subsections->splice(4,count($subsections)-4);
?>
<div class="row">
<div class="col-xs-12">



<ul class="inner-menu nav nav-tabs  nav-justified hidden-xs">
  @foreach($subsections as $temporada)
  <li role="presentation" class="{{$target->url == $temporada->url ? 'active': ''}}">
    <a href="{{$temporada->getFullUrl()}}">{{$temporada->name}}</a></li>
  @endforeach
  <li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      Ver más   <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      @foreach($mas as $temporada)
      <li role="presentation" class="{{$target->url == $temporada->url ? 'active': ''}}">
        <a href="{{$temporada->getFullUrl()}}">{{$temporada->name}}</a></li>
      @endforeach
    </ul>
  </li>
</ul>

</div>
</div>
