<div class="list-content" data-next-page="{{$contents->nextPageUrl()}}">

  @foreach($contents as $content)
  @include('front.articles.assets.content-of-list',$content)
  @endforeach

</div>


@if(count($contents->nextPageUrl()))
<div class="row">
  <div class="verMas col-xs-12">
    <a class="verMasContenido" onClick=loadContent()>Ver Más</a>
    <div class="spinner-wrapper">@include('front.assets.material-loading')</div>
  </div>
</div>
@endif
