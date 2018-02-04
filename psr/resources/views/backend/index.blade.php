@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Accesos rápidos</div>

                <div class="panel-body">
                  <div class="col-md-12">
                    <h3>Cargar Programa</h3>
                    <hr />
                    <div class="col-md-3">
                      <a class="btn btn-primary btn-lg btn-block" href="/backend/contents/createBySection/4/24/1"><h3>Nacional</h3></a>
                    </div>
                    <div class="col-md-3">
                      <a class="btn btn-danger btn-lg btn-block" href="/backend/contents/createBySection/4/24/2"><h3>Internacional</h3></a>
                    </div>
                    <div class="col-md-3">
                      <a class="btn btn-success btn-lg btn-block" href="/backend/contents/createBySection/11/46"><h3>PSR en Acción</h3></a>
                    </div>
                    <div class="col-md-3">
                      <a class="btn btn-default btn-lg btn-block active" href="/backend/contents/createBySection/4/24/50"><h3>Plataforma</h3></a>
                    </div>

                  </div>
                  <div class="col-md-12">

                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
