
<div class="">

  <!--  @include('front.assets.stats')-->
<div class="articulo-recomendado">


    <div class="imagen">
      @if($content->typeview_id == 2)<a href="{{$content->section->getFullUrl()}}"><img class="full-width lazy" data-original="{{$content->getImageByType(3)}}" alt=""></a>
      @else <a href="{{$content->getFullUrl()}}"><img class="full-width lazy" data-original="{{$content->getImageByType(3)}}" alt=""></a>
      @endif
    </div>
    <div class="link">
        @if($content->typeview_id == 2)<a href="{{$content->section->getFullUrl()}}">{{str_limit($content->title,80)}}</a>
        @else<a href="{{$content->getFullUrl()}}">{{str_limit($content->title,80)}}</a>
        @endif
      </div>

<div class="clearfix"></div>
</div>

</div>
