<div class="home-articulos container-fluid">
  <div class="row">
    <div class="col-md-6 col-sm-12">
      <h3>Artículos</h3>
      @include('front.home.assets.carousel-home-articulos')
      </div>
    <div class="col-md-6 col-sm-12">

        <div class="col-md-6 col-sm-12">
          <h3>Recomendados</h3>
          <?php $articulo = $recomendados[0];?>
            @include('front.home.assets.articulo-recomendado',$articulo)
            <?php $articulo = $recomendados[1];?>
            @include('front.home.assets.articulo-recomendado',$articulo)
        </div>
        <div class="col-md-6 col-sm-12">
          <h3>Los más leídos</h3>
          <div class="leidos-wrapper">
            @foreach($masvistos as $articulo)
            @include('front.home.assets.articulo-masvistos',$articulo)
            @endforeach
          </div>


        </div>

    </div>
  </div>
<!--
  <div class="row">
    @include('front.home.assets.articulo-seccion',array('name'=>"Economía",'url'=>'articulos/economia','title'=>'Argentina Endeudada','img'=>'./img/test/bonos.jpg','txt'=>'Y esto sucede aun en un entorno internacional de cooperación entre los Estados, pero sobre todo sucede cuando la realidad internacional es preocupante y casi no existen certidumbres sobre el curso del orden internacional.'))
    @include('front.home.assets.articulo-seccion',array('name'=>"Geopolítica",'url'=>'articulos/geopolítica','title'=>'Hacia un Mundo Multpolar','img'=>'./img/test/rusia.jpg','txt'=>'Y esto sucede aun en un entorno internacional de cooperación entre los Estados, pero sobre todo sucede cuando la realidad internacional es preocupante y casi no existen certidumbres sobre el curso del orden internacional.'))
    @include('front.home.assets.articulo-seccion',array('name'=>"Cultura",'url'=>'articulos/cultura','title'=>'El Problema Sirio','img'=>'./img/test/syria.jpg','txt'=>'En el ámbito de las relaciones internacionales, los Estados (como así otros actores no estatales) pasan buena parte de su tiempo considerando cursos o medidas que afirmen su grado de autoayuda y los posicione propiciamente frente a otros Estados.'))
    @include('front.home.assets.articulo-seccion',array('name'=>"Política",'url'=>'articulos/politica','title'=>'Sudamérica en Peligro','img'=>'./img/test/theeconomist.jpg','txt'=>'La perturbadora imputación de Donald Trump de que Obama es el "fundador" de los yihadistas de Isis/Daesh ha causado tremendo revuelo tanto en Estados...'))
    @include('front.home.assets.articulo-seccion',array('name'=>"Medio Ambiente",'url'=>'articulos/energia-y-medio-ambiente','title'=>'','img'=>'./img/test/ecologia.jpg','txt'=>'Las negociaciones en Brasil, para la venta de manantiales del acuífero con los principales conglomerados transnacionales del sector, entre ellos Nestlé y Coca-Cola, siguen a pasos agigantados.'))
  </div>
-->
</div>
