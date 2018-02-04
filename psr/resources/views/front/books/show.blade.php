@extends('front.layouts.interna')

@section('content')
<div class="content book">

<div class="row">
  <div class="col-xs-12">
    <h1>{{$content->title}}</h1>
    <div class="bottom-line col-xs-12"></div>


    <div class="breadcumb">
    @foreach($target->getBreadcrumb() as $link)
        <a href="/{{$link['url']}}">{{$link['name']}}</a> <span class="b-separator">>></span>
    @endforeach
    </div>
    @include('front.assets.stats')
    @include('front.assets.addthis')
  </div>



  <div class="col-xs-12">
    <div class="text">
      <img class="main-image" src="{{$content->getImageByType(1)}}" alt="">
      {!!$content->text!!}
    </div>
  </div>
  <div class="col-xs-12">


    <div class="col-xs-12 col-sm-6">
      <div class="author {{($content->tags()->count()) ? 'border':''}}">
        <img src="{{$content->author->getFullImgUrl()}}" alt="">
        <span>{{$content->author->name}}</span>
      </div>
    </div>

    <div class="col-xs-12 col-sm-6">
      <div class="tags">
        @if($content->tags()->count())<span>En éste artículo: </span>@endif
          @foreach($content->tags as $tag)
          <a class="tag" href="{{$tag->getFullUrl()}}">{{$tag->name}}</a>
        @endforeach
      </div>
    </div>

  </div>
  <div class="bottom-line col-xs-12"></div>
  @if(!Auth::guest())
    <a class="btn btn-success pull-right article-create" href="/backend/contents/{{ $content->id }}/edit">Editar</a>
  @endif

</div>
</div>

@endsection
