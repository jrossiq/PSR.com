@extends('front.layouts.interna-innermenu-layout')

@section('content')

<div class="container-fluid section">
  <div class="row">


  <div class="col-md-9">
    <?php $video = false;?>
    @include('front.articles.assets.content',$content)
  </div>

  <div class="col-md-3 sidebar">
      @include('front.pillars.assets.sidebar')
  </div>
  </div>

</div>

@endsection
