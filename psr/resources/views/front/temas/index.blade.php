@extends('front.layouts.interna')

@section('content')

<div class="tag-page">
  <div class="">
    <h1 class="">{{$target->name}}</h1>
    <div class="breadcumb">
    <a href="/">Home</a> <span class="b-separator">>></span>
    <a href="{{$target->getFullUrl()}}">{{$target->name}}</a>
    </div>

  </div>
</div>

@include('front.assets.list-content.list-contents')

@endsection
