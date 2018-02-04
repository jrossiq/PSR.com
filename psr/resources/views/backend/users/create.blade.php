@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Usuario</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/backend/users">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
                              <label for="type_id" class="col-md-4 control-label">Tipo de Usuario</label>
                              <div class="col-md-6">
                                <select class="form-control select-types" name="type_id" required>
                                    <option value="0">Elegir...</option>
                                      @foreach($types as $type)
                                        @if(old('type_id') && old('type_id') == $type->id)
                                          <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                                        @else
                                          <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endif
                                      @endforeach
                                </select>

                                  @if ($errors->has('section_id'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('section_id') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                              <label for="telephone" class="col-md-4 control-label">Teléfono</label>

                              <div class="col-md-6">
                                  <input id="telephone" type="text" class="form-control" name="telephone" value="{{ old('telephone') }}">

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
                                  <input id="facebook" type="text" class="form-control" name="facebook" value="{{ old('facebook') }}">

                                  @if ($errors->has('facebook'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('facebook') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div>
                          <div class="form-group{{ $errors->has('provinces') ? ' has-error' : '' }}">
                              <label for="provinces" class="col-md-4 control-label">Provincias Asignadas</label>
                              <div class="col-md-6">
                                  <select class="form-control provinces" name="provinces[]" multiple="multiple">
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
                              <label for="zone" class="col-md-4 control-label">Zona</label>

                              <div class="col-md-6">
                                  <input id="zone" type="text" class="form-control" name="zone" value="{{ old('zone') }}">

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
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
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
