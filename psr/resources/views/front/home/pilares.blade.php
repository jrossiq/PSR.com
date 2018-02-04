<div class="home-pilares container-fluid">
<h4 class="title">Nuestros 5 pilares fundamentales</h4>
<div class="row">

    @include('front.home.assets.pilar',
    array('n'=>1,'nPilar'=>'primer','title'=>"Refundar el Estado Nacional Soberano",
    'type'=>'Filosófico','url'=>'/pilares/estado-nacional-soberano'))
    @include('front.home.assets.pilar',
    array('n'=>2,'nPilar'=>'segundo','title'=>"Recuperar nuestra Moneda Nacional Soberana",
    'type'=>'Práctico','url'=>'/pilares/moneda-soberana'))
    @include('front.home.assets.pilar',
    array('n'=>3,'nPilar'=>'tercer','title'=>"Rechazar el sistema de deuda pública externa e interna",
    'type'=>'Práctico','url'=>'/pilares/rechazar-el-sistema-de-deuda'))
    @include('front.home.assets.pilar',
    array('n'=>4,'nPilar'=>'cuarto','title'=>"Rescatar las Instituciones Republicanas de su dependencia del dinero",
    'type'=>'Práctico','url'=>'/pilares/rescatar-las-instituciones-republicanas'))
    @include('front.home.assets.pilar',
    array('n'=>5,'nPilar'=>'quinto','title'=>"Recuperar Nuestra Soberanía Personal y Valores y Tradiciones",
    'type'=>'Filosófico','url'=>'/pilares/recuperar-nuestra-soberania-personal'))
    </div>

</div>
