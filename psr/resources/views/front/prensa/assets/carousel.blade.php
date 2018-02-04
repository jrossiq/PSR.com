<div class="row {{$class}}">

  <h2 class="title">{{$type}}</h2>
  @if(count($contenidos)>3)
  <div class="extra-slider slider-prensa-{{$class}}">
    <div class="wrapper ">
      <ul>
        @foreach ($contenidos->chunk(3) as $thecontents)

        <li class="item">
          @foreach ($thecontents as $content)
            @include('front.prensa.assets.content-of-list',$content)
          @endforeach
        </li>


        @endforeach

      </ul>

    </div>
    <div class="navigation">
      <a href="#" class="prev"><i class="material-icons">keyboard_arrow_left</i></a>
      <a href="#" class="next"><i class="material-icons">keyboard_arrow_right</i></a>
    </div>
  </div>
  @else
  <div class="extra-slider">
  @foreach ($contenidos as $content)
    @include('front.prensa.assets.content-of-list',$content)
  @endforeach
  </div>
  @endif
</div>
