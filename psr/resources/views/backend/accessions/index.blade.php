@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>
                <a href="/backend/accessions">Adhesiones</a>
            </h4>
          </div>
        </div>
      </div>
      <div class="col-md-12">
          <div class="panel panel-default">
              <div class="panel-body">
                @if(isset($message))
                    <div class="alert alert-success message">
                        <h5>{{ $message }}</h5>
                    </div>
                @endif
                <table class="table table-hover">
                  <tr>
                    <th>Nombre y Apellido</th>
                    <th>Ciudad</th>
                    <th class="fecha-contacto">Fecha</th>
                    <th>Mail</th>
                    <th>Teléfono</th>
                    <th></th>
                  </tr>
                  @forelse($accessions as $accession)
                      <tr>
                        <td>{{ $accession->name }} {{ $accession->lastname }}</td>
                        <td>{{ $accession->city }}</td>
                        <td>{{ date("d-m-Y" , strtotime($accession->created_at)) }}</td>
                        <td>{{ $accession->email }}</td>
                        <td>{{ $accession->telephone }}</td>
                        <td>
                          {!! Form::open(['method' => 'DELETE','route' => ['accessions.destroy', $accession->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs pull-right']) !!}
                          {!! Form::close() !!}
                        </td>
                      </tr>
                  @empty
                    - No hay datos.
                  @endforelse
                </table>
              </div>
          </div>
      </div>
    </div>
</div>
@endsection
