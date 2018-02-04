@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h4><a href="/backend/sections">Secciones</a> / {{ $section->name }} <a class="btn btn-default btn-xs pull-right" href="/articulos" target="_blank">Web</a></h4>
                </div>
                <div class="panel-body">
                  @if(isset($message))
                      <div class="alert alert-success message">
                          <h5>{{ $message }}</h5>
                      </div>
                  @endif
                  <a class="btn btn-primary" href="/backend/sections/{{ $section->id }}/edit">Editar</a>

                  {!! Form::open(['method' => 'DELETE','route' => ['sections.destroy', $section->id],'style'=>'display:inline']) !!}
                  {!! Form::submit('Eliminar', ['class' => 'btn btn-danger pull-right']) !!}
                  {!! Form::close() !!}

                  <hr />

                  <p><b>Nivel:</b> {{ $section->level }}</p>
                  @if($section->level == 2)
                    <p><b>Sección Principal:</b> {{ $section->parent->name }}</p>
                  @endif
                  <p><b>URL:</b> {{ $section->url }}</p>
                  <p><b>Descripción:</b> {{ $section->description }}</p>
                  <p><b>Estado:</b> {{ $section->active }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
