@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading"><h3>Usuarios <a class="btn btn-success" href="/backend/users/create">Crear</a></h3>
            </div>
              <div class="panel-body">

                @if(isset($message))
                  <div class="col-md-10 col-md-offset-1">
                      <div class="alert alert-success message">
                          <h5>{{ $message }}</h5>
                      </div>
                  </div>
                @endif
                
                <h4>Administradores</h4>
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th width="45%">Nombre de Usuario</th>
                      <th width="40%">E-Mail</th>
                      <th width="15%"></th>
                    </tr>
                    @forelse($users->where('type_id', 1) as $user)
                      <tr>
                        <td><a href="/backend/users/{{ $user->id }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td><a class="btn btn-primary btn-xs" href="/backend/users/{{ $user->id }}/edit">Editar</a></td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="2">No hay Usuarios en la base.</td>
                      </tr>
                    @endforelse
                  </table>
                </div>
                <hr />
                <h4>Supervisores</h4>
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th width="45%">Nombre de Usuario</th>
                      <th width="40%">E-Mail</th>
                      <th width="15%"></th>
                    </tr>
                    @forelse($users->where('type_id', 2) as $user)
                      <tr>
                        <td width="35%"><a href="/backend/users/{{ $user->id }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td><a class="btn btn-primary btn-xs" href="/backend/users/{{ $user->id }}/edit">Editar</a></td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="2">No hay Usuarios en la base.</td>
                      </tr>
                    @endforelse
                  </table>
                </div>
                <hr />
                <h4>Coordinadores</h4>
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th width="32%">Nombre de Usuario</th>
                      <th width="32%">E-Mail</th>
                      <th width="19%">Teléfono</th>
                      <th width="15%"></th>
                    </tr>
                    @forelse($users->where('type_id', 3) as $user)
                      <tr>
                        <td><a href="/backend/users/{{ $user->id }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telephone }}</td>
                        <td><a class="btn btn-primary btn-xs" href="/backend/users/{{ $user->id }}/edit">Editar</a></td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="2">No hay Usuarios en la base.</td>
                      </tr>
                    @endforelse
                  </table>
                </div>
                <hr />
                <h4>Otros</h4>
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th width="45%">Nombre de Usuario</th>
                      <th width="40%">E-Mail</th>
                      <th width="15%"></th>
                    </tr>
                    @forelse($users->where('type_id', 0) as $user)
                      <tr>
                        <td width="35%"><a href="/backend/users/{{ $user->id }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td><a class="btn btn-primary btn-xs" href="/backend/users/{{ $user->id }}/edit">Editar</a></td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="2">No hay Usuarios en la base.</td>
                      </tr>
                    @endforelse
                  </table>
                </div>
                <hr />
              </div>
          </div>
      </div>
    </div>
</div>
@endsection
