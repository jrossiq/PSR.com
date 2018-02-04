@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h4>Detalle: {{ $poll->name }} {{ $poll->lastname }}</h4>
                </div>
                <div class="panel-body">
                  @if(isset($message))
                      <div class="alert alert-success message">
                          <h5>{{ $message }}</h5>
                      </div>
                  @endif

                  <div class="row">
                    <div class="col-md-6">
                      @if(isset($poll->province->name))
                        <h4><b>Provincia:</b> {{ $poll->province->name }}</a></h4>
                      @endif
                      <h4><b>Ciudad:</b> {{ $poll->city }}</a></h4>
                      <h4><b>Edad:</b> {{ $poll->age }}</a></h4>
                      <h4><b>Estudios:</b> {{ $poll->studies }}</a></h4>
                    </div>

                    <div class="col-md-6">
                      <h4><b>Ocupación:</b> {{ $poll->occupation }}</a></h4>
                      <h4><b>E-mail:</b> {{ $poll->email }}</a></h4>
                      <h4><b>Teléfono:</b> {{ $poll->telephone }}</a></h4>
                      <h4><b>Comentarios:</b> {{ $poll->comments }}</h4>
                    </div>
                    <hr />
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <h4><b>Ofecimiento:</b></h4>
                      <ul>
                        @forelse($poll->helps as $help)
                          <li>{{ $help->name }}</li>
                        @empty
                          <li>No detalla</li>
                        @endforelse
                      </ul>
                    </div>
                  </div>

                  <hr />

                  <h4><b>Fecha Encuesta:</b> {{ date("d-m-Y" , strtotime($poll->created_at)) }}
                    @if($poll->contacted == 1)
                      / Contactado <img width="15px" src="/img/icons/success.png" />
                    @else
                      / No contactado
                    @endif
                  </h4>

                  @if(Auth::user()->type_id == 1 or Auth::user()->type_id == 2)
                    @if($poll->country_id == 1)
                      <h4><b>Responsable:</b>
                        @if($poll->province->users()->count() > 0)
                          {{ $poll->province->users()->first()->name }}
                        @else
                          No hay asignado
                        @endif
                      </h4>
                    @else
                      <h4><b>Responsable:</b>
                        @if($poll->province_id == 0 && $poll->country->users()->count() > 0)
                          {{ $poll->country->users()->first()->name }}
                        @else
                          No hay asignado
                        @endif
                      </h4>
                    @endif
                  @endif

                  <hr />

                  <a href="/backend/polls" class="btn btn-primary">Volver</a>

                  {!! Form::open(['method' => 'DELETE','route' => ['polls.destroy', $poll->id],'style'=>'display:inline']) !!}
                  {!! Form::submit('Eliminar', ['class' => 'btn btn-danger pull-right']) !!}
                  {!! Form::close() !!}

                  <hr />

                  <h4><b>Observaciones:</b> </h4>

                  @forelse($observations as $observation)
                    <p class="mensaje">{{ $observation->text }}</p>
                    <p class="mensaje"><b>Fecha: </b>{{ date("d-m-Y" , strtotime($observation->created_at)) }}</p>
                    <hr />
                  @empty
                    <p>No hay ibservaciones</p>
                    <hr />
                  @endforelse

                    @if(Auth::user()->type_id == 3 or Auth::user()->type_id == 3)
                      <form class="form-horizontal" role="form" method="POST" action="/backend/observations/{{ $poll->id }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-1 control-label">Nueva Observación</label>

                            <div class="col-md-11">
                                <textarea rows="4" id="text" class="form-control" name="text" required/>{{ old('text') }}</textarea>
                                @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-11 col-md-offset-1">
                                <button type="submit" class="btn btn-success">
                                    Guardar
                                </button>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                        <input type="hidden" name="poll_id" value="{{ $poll->id }}" />
                      </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
