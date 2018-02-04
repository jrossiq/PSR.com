@extends('front.layouts.interna')

@section('content')
@include('front.assets.section-intro')

<div class="list-content" data-next-page="{{$contents->nextPageUrl()}}">

  @foreach($contents as $content)
  @include('front.events.assets.content-list-event',$content)
  @endforeach

</div>



@endsection
