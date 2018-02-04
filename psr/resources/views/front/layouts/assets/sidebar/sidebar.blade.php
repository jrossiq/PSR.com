
<!-- Go to www.addthis.com/dashboard to customize your tools
 <div class="addthis_inline_follow_toolbox"></div>

<div class="">
  <div class="fb-page" data-href="https://www.facebook.com/ProyectoSegundaRepublica/"
  data-tabs="timeline" data-small-header="false" data-adapt-container-width="true"
  data-hide-cover="false" data-show-facepile="true">
  <blockquote cite="https://www.facebook.com/ProyectoSegundaRepublica/"
  class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ProyectoSegundaRepublica/">
    Proyecto Segunda República</a></blockquote>
  </div>

</div>
-->

<div class="col-xs-12 col-sm-6 col-md-12">
  <div class="pilares-sidebar  sidebar-item">
      <p class="title">Nuestros 5 Pilares</p>

      @foreach($pilaresSidebar as $index => $pilar)
      <div class="pilar-sidebar">

          <a class="number" href="{{$pilar->getFullUrl()}}"><img src="/img/pilares/internas/{{$pilar->url}}-btn.jpg" alt=""></a>
          <a class="name" href="{{$pilar->getFullUrl()}}" >{{$pilar->name}}</a>

      </div>
      <div class="clearfix"></div>
      @endforeach
  </div>
</div>

<div class="col-xs-12 col-sm-6 col-md-12">
  <div class="sidebar-item">

      <div class="imagen">
        <a href="/articulos/politica/los-mega-robos-kirchneristas-fuimos-los-primeros-en-denunciarlos"><img class="full-width lazy" data-original="/img/sidebar/los-fondos-de-santa-cruz-lo-denunciamos-en-2004.jpg" alt="Los Fondos de Santa Cruz"></a>
      </div>
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
<!--
<div class="col-xs-12 col-sm-6 col-md-12">
  <div class=" sidebar-item">
  <img class="hidden-xs" src="/img/sidebar/contactateconpsr.jpg" alt="">
  <img class="visible-xs" src="/img/sidebar/contactateconpsr-mobile.jpg" alt="">
  </div>
</div>
-->
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

<div class="col-xs-12 col-sm-6 col-md-12">
<div class="articulos-recomendados sidebar-item">
  <h4>Artículos Recomendados</h4>
  @foreach($recomendados as $content)
  @include('front.layouts.assets.sidebar.articulo-recomendado',$content)
  @endforeach

</div>
</div>
