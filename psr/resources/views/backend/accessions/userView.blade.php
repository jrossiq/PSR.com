@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h4>{{ $contact->name }}</h4>
                </div>
                <div class="panel-body">
                  <div class="row">
                    @if(isset($message))
                        <div class="alert alert-success message">
                            <h5>{{ $message }}</h5>
                        </div>
                    @endif

                  <div class="col-md-12">

                    <h4><b>E-mail:</b> <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></h4>
                    <h4><b>Tema:</b> {{ $contact->subject }}</h4>
                    <h4><b>Mensaje:</b> </h4>
                      <p class="mensaje">{{ $contact->message }}</p>

                    <br />

                    <a href="/backend/polls" class="btn btn-primary">Volver</a>

                    {!! Form::open(['method' => 'DELETE','route' => ['contacts.destroy', $contact->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger pull-right']) !!}
                    {!! Form::close() !!}

                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
