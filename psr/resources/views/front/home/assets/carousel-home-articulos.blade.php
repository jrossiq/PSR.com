<div class="extra-slider slider-articulos container-fluid">
  <div class="wrapper ">
    <ul>
      @foreach($articulos as $articulo)
      @include('front.home.assets.articulo-home-carousel',$articulo)
      @endforeach
      </ul>
  </div>
  <div class="navigation navigation-articulos">
    <a href="#" class="prev"><i class="material-icons">keyboard_arrow_left</i></a>
    <a href="#" class="next"><i class="material-icons">keyboard_arrow_right</i></a>
  </div>


</div>
