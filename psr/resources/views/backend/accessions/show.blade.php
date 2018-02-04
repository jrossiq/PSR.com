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

                    <div class="col-md-7">

                    <h4><b>E-mail:</b> <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></h4>
                    <h4><b>Tema:</b> {{ $contact->subject }}</h4>
                    <h4><b>Mensaje:</b> </h4>
                      <p class="mensaje">{{ $contact->message }}</p>

                    <hr />

                    <h5><b>Coordinador Asignado: </b>
                      @if($contact->user()->count() >0)
                        {{ $contact->user->name }}
                          @if($contact->userView == 1)
                            <span class="label label-success userView">Visto</span>
                          @else
                            <span class="label label-default userView">No visto</span>
                          @endif
                      @else
                          No hay coordinador asignado.
                      @endif
                    </h5>

                    <hr />

                    <br />

                    <a href="/backend/contacts" class="btn btn-primary">Volver</a>

                    {!! Form::open(['method' => 'DELETE','route' => ['contacts.destroy', $contact->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger pull-right']) !!}
                    {!! Form::close() !!}

                    <hr />

                    @if($contact->response()->count() > 0)
                    <h4><b>Comentario:</b> </h4>
                      <p class="mensaje">{{ $contact->response()->first()->text }}</p>
                      <hr />
                      <p class="mensaje"><b>Fecha: </b>{{ date("d-m-Y" , strtotime($contact->response()->first()->created_at)) }}</p>
                      <p class="mensaje"><b>Usuario: </b>{{ $contact->response()->first()->user->name }}</p>
                    @else
                      <form class="form-horizontal" role="form" method="POST" action="/backend/response/{{ $contact->id }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-2 control-label">Comentario</label>

                            <div class="col-md-10">
                                <textarea rows="4" id="text" class="form-control" name="text" required/>{{ old('text') }}</textarea>
                                @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2">
                                <button type="submit" class="btn btn-success">
                                    Guardar
                                </button>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                        <input type="hidden" name="contact_id" value="{{ $contact->id }}" />
                      </form>
                    @endif
                  </div>
                  <div class="col-md-4 col-md-offset-1 coordinadores">
                    @foreach($admins as $admin)
                      <h4>- <b>{{ $admin->name }}</b></h4>
                        <p><img src="/img/icons/email.png" /> {{ $admin->email }}</p>
                        <p><img src="/img/icons/whatsApp.png" /> {{ $admin->telephone }}</p>

                      <form class="form-horizontal" role="form" method="POST" action="/backend/contacts/addUser/{{ $contact->id }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="user_id" value="{{ $admin->id }}" />

                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-warning">
                                    Asignar Contacto
                                </button>
                            </div>
                        </div>

                      </form>
                      <hr />
                    @endforeach
                    <h4>Coordinadores</h4>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      @forelse($provinces as $province)
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading-{{ $province->id }}">
                          <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $province->id }}" aria-expanded="true" aria-controls="collapseOne">
                              {{ $province->name }} ({{ $province->users()->count() }})
                            </a>
                          </h4>
                        </div>
                        <div id="collapse-{{ $province->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-{{ $province->id }}">
                          <div class="panel-body">
                              @forelse($province->users as $user)
                                <h4>- <b>{{ $user->name }}</b></h4>
                                  <p><img src="/img/icons/email.png" /> {{ $user->email }}</p>
                                  <p><img src="/img/icons/whatsApp.png" /> {{ $user->telephone }}</p>
                                <hr />

                                <form class="form-horizontal" role="form" method="POST" action="/backend/contacts/addUser/{{ $contact->id }}">
                                  {{ csrf_field() }}

                                  <input type="hidden" name="user_id" value="{{ $user->id }}" />

                                  <div class="form-group">
                                      <div class="col-md-6">
                                          <button type="submit" class="btn btn-warning">
                                              Asignar Contacto
                                          </button>
                                      </div>
                                  </div>

                                </form>
                              @empty
                                <h5>No hay Coordinador Asignado</h5>
                                @foreach($admins as $admin)
                                  <h4>- <b>{{ $admin->name }}</b></h4>
                                    <p><img src="/img/icons/email.png" /> {{ $admin->email }}</p>
                                    <p><img src="/img/icons/whatsApp.png" /> {{ $admin->telephone }}</p>

                                  <form class="form-horizontal" role="form" method="POST" action="/backend/contacts/addUser/{{ $contact->id }}">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="user_id" value="{{ $admin->id }}" />
                                    <input type="hidden" name="no_coordinator" value="1" />

                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-warning">
                                                Asignar Contacto
                                            </button>
                                        </div>
                                    </div>

                                  </form>
                                  <hr />
                                @endforeach
                              @endforelse
                          </div>
                        </div>
                      </div>
                      @empty
                      @endforelse
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
