@extends('front.layouts.interna-innermenu-layout')
@section('content')

<?php
$subs = ($target->parent) ? $target->parent->getSubSections() : $target->getSubSections();
$subs[0]->headerTitle = 'Refundar El Estado Nacional Soberano';$subs[0]->btnName = 'Primer Pilar';$subs[0]->pilarType = 'Filosófico';
$subs[1]->headerTitle = 'Recuperar Nuestra Moneda Soberana';$subs[1]->btnName = 'Segundo Pilar';$subs[1]->pilarType = 'Práctico';
$subs[2]->headerTitle = 'Rechazar el Sistema de Deuda';$subs[2]->btnName = 'Tercer Pilar';$subs[2]->pilarType = 'Práctico';
$subs[3]->headerTitle = 'Rescatar a Las Instituciones Republicanas de su dependencia del Dinero';$subs[3]->btnName = 'Cuarto Pilar';$subs[3]->pilarType = 'Práctico';
$subs[4]->headerTitle = 'Recuperar Nuestra Soberanía Personal';$subs[4]->btnName = 'Quinto Pilar';$subs[4]->pilarType = 'Filosófico';
foreach ($subs as $sub) {if($target->url == $sub->url)$target=$sub;}
?>
<div class="container-fluid">
  <div class="row">
    @include('front.pillars.assets.botonera')
  </div>

</div>

<div class="container-fluid header-pilar" style="background-image: url(/img/pilares/internas/{{$target->url}}.jpg)">
<div class="h-container"><h2>{{$target->btnName}}<span class="h-border"></span></h2></div>
<div class="h-container"><h1>{{$target->headerTitle}}<span class="h-border"></h1></div>
<!--<div class="h-container"><h3>Pilar de Carácter {{$target->pilarType}}</h3></div>-->
</div>
<div class="container-fluid section pilares">

  <div class="row">

      @include('front.pillars.assets.show-pilar-in-section')


  </div>

</div>

<!-- Modal -->
<div class="modal fade modal-pilar" id="pilar-infografia-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <img class="large-infografia" alt="" src="/img/pilares/infografias/{{$target->url}}.jpg">
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade modal-pilar" id="modal-video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
<div class="v-container">
      <div class="video-container hidden"></div>
</div>



</div>

@endsection
