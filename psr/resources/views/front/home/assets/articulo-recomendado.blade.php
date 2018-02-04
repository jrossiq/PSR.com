<div class="articulo-recomendado col-xs-12">
<!--
  <div class="tags">
    @foreach($articulo->tags as $tag)
    <a href="{{$tag->getFullUrl()}}" class="tag">{{$tag->name}}</a>
    @endforeach
  </div>
-->
    <a href="{{$articulo->getFullUrl()}}" ><img class="lazy" data-original="{{$articulo->getImageByType(2)}}" alt=""></a>

  <a href="{{$articulo->getFullUrl()}}" class="title">{{$articulo->title}}</a>
  <span class="stats">{{$articulo->getDate()}}<span class="views"><i class="material-icons eye">remove_red_eye</i>{{$articulo->views}}</span></span>
<a class="vermas" href="{{$articulo->getFullUrl()}}">Leer Más...</a>
</div>
