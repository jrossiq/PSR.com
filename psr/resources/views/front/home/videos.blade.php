<div class="home-videos container-fluid">
  <!--<h4 class="destacado"><span class="destacado-mayor">Marchamos por el Día de la Soberanía</span> (Mirá el recorrido <a href="marcha">aquí</a>)</h4>-->
  <h4 class="title">Último Programa</h4>
  <div class="row">
    <div class="col-xs-12 col-md-6 video-nacional">
      <div class="video {{$nacional->getProgramaTag()->color}}">
        <a href="{{$nacional->getFullUrl()}}"><img  data-original="{{$nacional->getImageByType(2)}}" alt=""></a>
        <!--<a href="{{$nacional->getFullUrl()}}"><span>{{str_limit($nacional->title,100)}}</span></a>-->
      </div>
    </div>
    <div class="col-xs-12 col-md-6 video-internacional">
      <div class="video {{$nacional->getProgramaTag()->color}}">
        <a href="{{$internacional->getFullUrl()}}"><img  data-original="{{$internacional->getImageByType(2)}}" alt=""></a>
        <!--<a href="{{$internacional->getFullUrl()}}"><span>{{str_limit($internacional->title,100)}}</span></a>-->
      </div>
    </div>
  </div>
  
  <div class="clearfix"></div>

  <hr />
  @include('front.produccion.donaciones')

</div>

  <div class="home-mas-videos container-fluid">

    <h4 class="title">Programas Anteriores</h4>

    <div class="clearfix"></div>

    <div class="videos-content" data-next-page="1">

        <?php $colsm = 3; $colmd = 3; ?>
        @foreach($videos as $content)

        @include('front.assets.list-content.content-list-video',$content)

        @endforeach
      <div class="clearfix"></div>

    </div>

    <div class="clearfix"></div>

      <div class="row">
        <div class="verMas col-xs-12">
          <a class="verMasVideos" onClick=verMasVideos()>Ver Más</a>
          <div class="spinner-wrapper home">@include('front.assets.material-loading')</div>
        </div>

      </div>

  </div>
</div>
