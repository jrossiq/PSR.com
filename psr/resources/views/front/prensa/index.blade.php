@extends('front.layouts.interna-innermenu-layout')
@section('content')

<div class="container-fluid section prensa">

  <div class="row reel" style="margin-bottom:0px;">

    <div class="video-container">
        <iframe id="ytplayer" type="text/html" width="100%" height="360"
        src="http://www.youtube.com/embed/w0XG_PAoBN0" frameborder="0"></iframe>
      </div>
  </div>

  @include('front.prensa.assets.carousel',['type'=>'PSR en TV','contenidos'=>$videos,'class'=>'videos'])  
  @include('front.prensa.assets.carousel',['type'=>'PSR en Radio','contenidos'=>$radio,'class'=>'radio'])
  @include('front.prensa.assets.carousel',['type'=>'Notas y Entevistas escritas','contenidos'=>$articulos,'class'=>'articulos'])



</div>



@endsection
