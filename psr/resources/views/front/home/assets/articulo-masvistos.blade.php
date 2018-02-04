
  <div class="articulo-masvisto">
    <!--
    <div class="tags">
      <?php //$tags = $articulo->tags ?>
    @if(count($tags)>0)  <a href="{{$tags[0]->getFullUrl()}}" class="tag">{{$tags[0]->name}}</a>@endif
    @if(count($tags)>1)  <a href="{{$tags[1]->getFullUrl()}}" class="tag">{{$tags[1]->name}}</a>@endif

    </div>
  -->
    <a href="{{$articulo->getFullUrl()}}" class="title">{{$articulo->title}}</a>
    <span class="stats">{{$articulo->getDate()}}<span class="views"><i class="material-icons eye">remove_red_eye</i>{{$articulo->views}}</span></span>
  </div>
