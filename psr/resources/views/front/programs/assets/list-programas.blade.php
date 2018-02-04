<div class="row">

<div class="list-content" data-next-page="{{$contents->nextPageUrl()}}">

  @foreach($contents as $content)
  <?php $colsm = 4; $colmd = 4;?>
  @include('front.assets.list-content.content-list-video',$content)

  @endforeach

</div>

</div>

@if(count($contents->nextPageUrl()))
<div class="row">
  <div class="verMas col-xs-12">
    <a class="verMasContenido" onClick=loadContent()>Ver Más</a>
    <div class="spinner-wrapper">@include('front.assets.material-loading')</div>
  </div>
</div>
@endif
