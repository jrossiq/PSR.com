@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  @if(Auth::user()->type_id == 3)
                    <h4>{{ $user->name }}</h4>
                  @else
                    <h4>
                      @if($user->type_id == 1)
                        <a href="/backend/users">Usuarios</a>
                      @else
                        Usuarios
                      @endif
                      / {{ $user->name }}</h4>
                  @endif
                </div>
                <div class="panel-body">

                  @if(isset($message))
                    <div class="col-md-10 col-md-offset-1">
                        <div class="alert alert-success message">
                            <h5>{{ $message }}</h5>
                        </div>
                    </div>
                  @endif

                  <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/backend/users/{{ $user->id }}">

                      {{ csrf_field() }}
                      {{ method_field('PUT') }}

                      <img src="/{{ $user->img }}" height="150px" />

                      <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
                          <label for="img" class="col-md-4 control-label">Foto</label>
                          <div class="col-md-6">
                              <input id="img" type="file" class="form-control" name="img" value="{{ old('img') }}" >
                              @if ($errors->has('img'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('img') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <label for="name" class="col-md-4 control-label">Nombre</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control" name="name"
                                @if(old('name'))
                                  value="{{ old('name') }}"
                                @else
                                  value="{{ $user->name }}"
                                @endif
                              required>

                              @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <label for="email" class="col-md-4 control-label">E-Mail</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control" name="email"
                                @if(old('email'))
                                  value="{{ old('email') }}"
                                @else
                                  value="{{ $user->email }}"
                                @endif
                              required>

                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      @if($user->type_id == 2 || $user->type_id == 3)

                        <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                            <label for="telephone" class="col-md-4 control-label">Teléfono</label>

                            <div class="col-md-6">
                                <input id="telephone" type="text" class="form-control" name="telephone"
                                  @if(old('telephone'))
                                    value="{{ old('telephone') }}"
                                  @else
                                    value="{{ $user->telephone }}"
                                  @endif
                                >

                                @if ($errors->has('telephone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                            <label for="facebook" class="col-md-4 control-label">Facebook</label>

                            <div class="col-md-6">
                                <input id="facebook" type="text" class="form-control" name="facebook"
                                  @if(old('facebook'))
                                    value="{{ old('facebook') }}"
                                  @else
                                    value="{{ $user->facebook }}"
                                  @endif
                                required>

                                @if ($errors->has('facebook'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('facebook') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      @endif

                      @if(Auth::user()->type_id == 1)

                      <div class="form-group{{ $errors->has('typeview_id') ? ' has-error' : '' }}">
                          <label for="type_id" class="col-md-4 control-label">Tipo de Usuario</label>

                          <div class="col-md-6">

                            <select class="form-control" name="type_id" required>
                              @forelse($types as $type)
                                  @if($type->id == $user->type_id || old('type_id') == $user->type_id)
                                    <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                                  @else
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                  @endif
                              @empty
                                <option value="0">No hay tipos de Usuario</option>
                              @endforelse
                            </select>

                              @if ($errors->has('type_id'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('type_id') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                        @if($user->type_id == 3 || $user->type_id == 2)

                        <div class="form-group{{ $errors->has('provinces') ? ' has-error' : '' }}">
                            <label for="provinces" class="col-md-4 control-label">Provincias Asignadas</label>
                            <div class="col-md-6">
                                <select class="form-control provinces" name="provinces[]" multiple="multiple">
                                  <option value="0">Elegir...</option>
                                  @foreach($provinces as $province)
                                    @if(old('province_id') && old('province_id') == $province->id)
                                      <option value="{{ $province->id }}" selected>{{ $province->name }}</option>
                                    @else
                                      <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endif
                                  @endforeach
                                </select>

                                @if ($errors->has('provinces'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('provinces') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('zone') ? ' has-error' : '' }}">
                            <label for="zone" class="col-md-4 control-label">Zonas</label>

                            <div class="col-md-6">
                                <input id="zone" type="text" class="form-control" name="zone"
                                  @if(old('zone'))
                                    value="{{ old('zone') }}"
                                  @else
                                    value="{{ $user->zone }}"
                                  @endif
                                >

                                @if ($errors->has('zone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('countries') ? ' has-error' : '' }}">
                            <label for="countries" class="col-md-4 control-label">Países Asignados</label>
                            <div class="col-md-6">
                                <select class="form-control countries" name="countries[]" multiple="multiple">
                                  <option value="0">Elegir...</option>
                                  @foreach($countries as $country)
                                    @if(old('country_id') && old('country_id') == $country->id)
                                      <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                                    @else
                                      <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endif
                                  @endforeach
                                </select>

                                @if ($errors->has('countries'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('countries') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @endif

                      @endif

                      <div class="form-group">
                          <div class="col-md-8 col-md-offset-2">
                              <button type="submit" class="btn btn-primary">
                                  Guardar Cambios
                              </button>
                          </div>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
