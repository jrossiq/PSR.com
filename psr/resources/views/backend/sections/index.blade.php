@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>
                <a href="/backend/sections">Secciones</a>
                <a class="btn btn-success article-create" href="/backend/sections/create">Crear</a>
                <a class="btn btn-default btn-xs pull-right" href="/articulos" target="_blank">Web</a>
            </h4>
          </div>
        </div>
      </div>
      <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading"><h3>Secciones Principales</h3>
            </div>
              <div class="panel-body">
                  <ul>
                    @forelse($menuSections as $principalSection)
                      @if($principalSection->id > 1)
                        <li><a href="/backend/sections/{{ $principalSection->id }}">{{ $principalSection->name }}</a></li>
                      @endif
                    @empty
                      No hay secciones aquí.
                    @endforelse
                  </ul>
              </div>
          </div>
      </div>
      <div class="col-md-8">
          <div class="panel panel-default">
              <div class="panel-heading"><h3>
                <a href="/backend/sections/{{ $section->id }}">{{ $section->name }}</a>
                <a class="btn btn-primary" href="/backend/sections/{{ $section->id }}/edit">Editar</a>
              </h3>
              </div>
              <div class="panel-body">
                @if(isset($message))
                    <div class="alert alert-success message">
                        <h5>{{ $message }}</h5>
                    </div>
                @endif

                    <ul class="list-group">
                      @forelse($subSections as $subSection)
                          <li class="list-group-item">
                            <a href="/backend/contents/subSection/{{ $subSection->id }}">{{ $subSection->name }}</a>
                              <div class="actions">
                                <a href="/backend/sections/{{ $subSection->id }}/edit" class="btn btn-primary btn-xs article-edit">Editar</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['sections.destroy', $subSection->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs pull-right']) !!}
                                {!! Form::close() !!}
                              </div>
                          </li>
                      @empty
                        - No hay subsecciones aquí.
                      @endforelse
                    </ul>
                  </div>
                </div>
              </div>
          </div>
      </div>
    </div>
</div>
@endsection
