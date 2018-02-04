@extends('front.layouts.interna-innermenu-layout')
@section('content')

<div class="container-fluid section programas-section">

  <div class="row">

  <div class="col-md-9 section-content">
      @include('front.assets.section-intro')
      @include('front.programs.assets.botonera')
      @include('front.programs.assets.list-programas')
  </div>

  <div class="col-md-3 sidebar">
      @include('front.layouts.assets.sidebar.sidebar')
  </div>
  </div>

</div>



@endsection
