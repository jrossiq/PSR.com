<div class="row">
  <div class="libro">


  <div class="col-md-3 imagen">
    <img src="{{$content->getImageByType(1)}}" alt="">
  </div>
  <div class="col-md-9">
    <h3 class="titulo"><a href="{{$content->getFullUrl()}}">{{$content->title}}</a></h3>
    <span class="autor">{{$content->author->name}}</span>
    <p>{!!$content->text!!}</p>
  </div>

</div>
</div>
<div class="end"></div>
