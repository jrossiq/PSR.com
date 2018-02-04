@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>
                <a href="/backend/contacts">Contactos</a>
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
                    <th>Nombre</th>
                    <th class="fecha-contacto">Fecha</th>
                    <th>Mail</th>
                    <th>Asunto</th>
                    <th></th>
                  </tr>
                  @forelse($contacts as $contact)
                      <tr
                        @if($contact->view == 1)
                          @if($contact->response()->count() > 0)
                            class="view-responsed"
                          @else
                            class="view"
                          @endif
                        @endif
                      >
                        <td>
                          <a href="/backend/contacts/{{ $contact->id }}">{{ $contact->name }}</td>
                        <td>{{ date("d-m-Y" , strtotime($contact->created_at)) }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>
                          {!! Form::open(['method' => 'DELETE','route' => ['contacts.destroy', $contact->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs pull-right']) !!}
                          {!! Form::close() !!}
                        </td>
                      </tr>
                  @empty
                    - No hay contactos.
                  @endforelse
                </table>
              </div>
          </div>
      </div>
    </div>
</div>
@endsection
