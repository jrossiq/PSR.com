<div class="section-intro">


<div class="row">
  <div class="col-xs-12">
    <h1 class="hidden-sm hidden-md hidden-lg">{{$target->name}}</h1>
    <div class="breadcumb">
    @foreach($target->getBreadcrumb() as $link)
        <a href="{{$link['url']}}">{{$link['name']}}</a> <span class="b-separator">>></span>
    @endforeach
    </div>

  </div>
  <div class="col-sm-6 hidden-xs">
    <img class="intro" src="{{$target->getImageByType(2)}}" alt="">
  </div>
  <div class="col-sm-6">
    <h1 class="hidden-xs">{{$target->name}}</h1>
    <p>{!!$target->text!!}</p>
    @include('front.assets.addthis')
  </div>
<div class="border-bottom-hard col-xs-12 hidden-xs"></div>
</div>
</div>
