@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h4><a href="/backend/users">Usuarios</a> / {{ $user->name }}</h4>
                </div>
                <div class="panel-body">
                  @if(isset($message))
                      <div class="alert alert-success message">
                          <h5>{{ $message }}</h5>
                      </div>
                  @endif
                  <p><b>Nivel:</b> {{ $user->type_id }}</p>
                  <p><b>E-Mail:</b> {{ $user->email }}</p>
                  <p><b>Teléfono:</b> {{ $user->telephone }}</p>
                  <p><b>Zonas Asignadas:</b>
                    <h4>Provincias</h4>
                    <ul>
                      @forelse($user->provinces as $province)
                        <li>{{ $province->name }}</li>
                      @empty
                        <p>No tiene Provincias asignadas</p>
                      @endforelse
                    </ul>
                    <hr />
                    <h4>Países</h4>
                    <ul>
                      @forelse($user->countries as $country)
                        <li>{{ $country->name }}</li>
                      @empty
                        <p>No tiene Países asignados</p>
                      @endforelse
                    </ul>
                  <hr />
                  <a class="btn btn-primary" href="/backend/users/{{ $user->id }}/edit">Editar</a>

                  {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                  {!! Form::submit('Eliminar', ['class' => 'btn btn-danger pull-right']) !!}
                  {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
