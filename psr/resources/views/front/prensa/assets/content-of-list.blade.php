<div class="col-sm-6 col-md-4">


<div class="content-of-prensa-list">
  <div class="pimagen">
    <a href="{{$content->getFullUrl()}}"><img data-original="{{$content->getImageByType(2)}}" alt=""></a>
  </div>
  <div class="pcontent {{($content->getMedioImg() != "")? 'true-image':''}}">
    @if($content->getMedioImg() != "")<a href="#"><img data-original="{{$content->getMedioImg()}}" alt=""></a>@endif
    <div class="title">
      <a class="title" href="{{$content->getFullUrl()}}">{{$content->title}}</a>
      @include('front.assets.stats',$content)
    </div>

  </div>

</div>

</div>
