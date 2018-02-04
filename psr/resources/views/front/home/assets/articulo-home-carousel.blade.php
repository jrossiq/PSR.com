
<li class="item articulo-carousel">
  <div class="tags">
    @foreach($articulo->tags as $tag)

    <a href="{{$tag->getFullUrl()}}" class="tag">{{$tag->name}}</a>
    @endforeach
  </div>
  <div class="wrapper-articulo">
    <img class="lazy" data-original="{{$articulo->getImageByType(2)}}" alt="">
    <h5 class="title">{{$articulo->title}}</h5>
    <span class="stats">{{$articulo->getDate()}}<span class="views"><i class="material-icons eye">remove_red_eye</i>{{$articulo->views}}</span></span>
    <p>{{strip_tags(str_limit($articulo->text,300))}}</p>
    <a class="vermas" href="{{$articulo->getFullUrl()}}">Leer Más...</a>
  </div>

</li>
