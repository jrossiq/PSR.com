<div class="col col-xs-12 col-sm-{{$colsm}} col-md-{{$colmd}} col-lg-3 {{!empty($data['hide']) ? 'sm-lg':''}}" >
  <div class="mini-video">
    <div class="content-mini">


    <a class="vimage" href="{{$content->getFullUrl()}}"><img class="lazy" data-original="{{$content->getImageByType(3)}}" alt=""></a>
    <?php $theTag = $content->getProgramaTag()->id ?>
    @if( $theTag== 1)<div class="tag programa blue-bloque">Nacional</div>
    @elseif($theTag == 2) <div class="tag programa red-bloque">Internacional</div>
    @elseif($theTag == 3) <div class="tag programa especial-bloque">Especiales</div>
    @elseif($theTag == 50) <div class="tag programa doctrina-bloque">Plataforma PSR</div>
    @endif

    <a class="vlink" href="{{$content->getFullUrl()}}"><p class="title">{{str_limit($title,60)}}</p></a>
     @include('front.assets.stats')
    </div>
  </div>
</div>
<div class="clearfix visible-xs"></div>
