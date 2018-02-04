
<div class="row ">
  <div class="content-of-list">
    <div class="col-xs-6 col-sm-4 limagen">
      <a href="{{$content->getFullUrl()}}"><img class="lazy" data-original="{{$content->getImageByType(3)}}" alt=""></a>
    </div>
    <div class="col-xs-6 col-sm-8 lcontent">
    <a class="title" href="{{$content->getFullUrl()}}">{{$title}}</a>
    @include('front.assets.stats')
    <div class="hidden-xs">{{strip_tags(str_limit($text,400))}}</div>
    <a class="vermas hidden-xs" href="{{$content->getFullUrl()}}">Leer Más</a>
    </div>
    <div class="col-xs-12 hidden-xs"><div class=" border-bottom "></div></div>
  </div>



</div>
