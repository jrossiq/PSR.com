


  <div class="col-xs-12">
    <div class="videos sidebar-item">
      <p class="sidebar-title">Videos de Doctrina</p>
      @foreach($doctrina as $video)
      <div class="mini">
        <div class="content-mini">
        <a onclick="showModalVideo('{{$video->video_id}}')"><img src="{{$video->getImageByType(2)}}" alt=""></a>
        <a onclick="showModalVideo('{{$video->video_id}}')"><p class="title {{!(strlen($video->title)>40)?'':'short'}}">{{str_limit($video->title,50)}}</p></a>
        </div>
      </div>
      @endforeach

    </div>
  </div>

  <div class="col-xs-12 col-sm-6 hidden-sm col-md-12">
    <div class="fb-page  sidebar-item" data-href="https://www.facebook.com/ProyectoSegundaRepublica/"
     data-small-header="false" data-adapt-container-width="true"
    data-hide-cover="false" data-show-facepile="true">
    <blockquote cite="https://www.facebook.com/ProyectoSegundaRepublica/"
    class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ProyectoSegundaRepublica/">
      Proyecto Segunda República</a></blockquote>
    </div>

  </div>

  <div class="col-xs-12 col-sm-6 col-md-12">
    <div class=" sidebar-item">
      <a href="/psr-en-accion">
        <img class="hidden-xs" src="/img/sidebar/contactateconpsr.jpg" alt="">
        <img class="visible-xs" src="/img/sidebar/contactateconpsr-mobile.jpg" alt="">
      </a>
    </div>
  </div>

  <div class="clearfix"></div>
  <div class="col-xs-12 col-sm-6 col-md-12 ">
    <h3>SEGUINOS EN</h3>
    @include('front.layouts.assets.sidebar.social-sidebar')
    </div>

  <div class="col-xs-12 ">
  <div class="tag-cloud  sidebar-item">
    <h3>TEMAS</h3>
    @foreach($tags as $tag)
    <a class="tag {{$tag->color}}" href="{{$tag->getFullUrl()}}">{{$tag->name}}</a>
    @endforeach
  </div>
  </div>
