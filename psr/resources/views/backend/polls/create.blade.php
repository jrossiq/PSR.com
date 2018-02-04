@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4><a href="/backend/sections">Secciones</a> / Neva Sección</h4></div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="/backend/polls">
                      {{ csrf_field() }}


                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <label for="name" class="col-md-4 control-label">Nombre</label>
                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control title" name="name" value="{{ old('name') }}" required autofocus>
                              @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                          <label for="lastname" class="col-md-4 control-label">Apellido</label>
                          <div class="col-md-6">
                              <input id="lastname" type="text" class="form-control title" name="lastname" value="{{ old('lastname') }}" required autofocus>
                              @if ($errors->has('lastname'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('lastname') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
                          <label for="country_id" class="col-md-4 control-label">País</label>
                          <div class="col-md-6">
                              <select class="form-control sel-countries" name="country_id" required>
                                  @forelse($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                  @empty
                                    <option value="0">No hay conexión a la base</option>
                                  @endforelse
                              </select>

                              @if ($errors->has('country_id'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('country_id') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('province_id') ? ' has-error' : '' }}  sel-provinces">
                          <label for="province_id" class="col-md-4 control-label">Provincia</label>
                          <div class="col-md-6">
                              <select class="form-control" name="province_id" required>
                                <option value="0">Elegir...</option>
                                  @forelse($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                  @empty
                                    <option value="0">No hay conexión a la base</option>
                                  @endforelse
                              </select>

                              @if ($errors->has('province_id'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('province_id') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                          <label for="city" class="col-md-4 control-label">Ciudad / Localidad / Barrio</label>
                          <div class="col-md-6">
                              <input id="city" type="text" class="form-control title" name="city" value="{{ old('city') }}" required autofocus>
                              @if ($errors->has('city'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('city') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                          <label for="sex" class="col-md-4 control-label">Sexo</label>
                          <div class="col-md-6">
                              <select class="form-control" name="sex" required>
                                <option value="0">Elegir...</option>
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                              </select>
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                          <label for="age" class="col-md-4 control-label">Edad</label>
                          <div class="col-md-6">
                              <input id="age" type="number" class="form-control title" name="age" value="{{ old('age') }}" required autofocus>
                              @if ($errors->has('age'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('age') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('occupation') ? ' has-error' : '' }}">
                          <label for="occupation" class="col-md-4 control-label">Ocupación</label>
                          <div class="col-md-6">
                              <input id="occupation" type="text" class="form-control" name="occupation" value="{{ old('occupation') }}" required autofocus>
                              @if ($errors->has('occupation'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('occupation') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('studies') ? ' has-error' : '' }}">
                          <label for="studies" class="col-md-4 control-label">Estudios</label>
                          <div class="col-md-6">
                              <input id="studies" type="text" class="form-control title" name="studies" value="{{ old('studies') }}" required autofocus>
                              @if ($errors->has('studies'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('studies') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <label for="email" class="col-md-4 control-label">E-Mail</label>
                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control title" name="email" value="{{ old('email') }}" required autofocus>
                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                          <label for="telephone" class="col-md-4 control-label">Teléfono</label>
                          <div class="col-md-6">
                              <input id="telephone" type="text" class="form-control title" name="telephone" value="{{ old('telephone') }}" required autofocus>
                              @if ($errors->has('telephone'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('telephone') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                          <label for="helps[]" class="col-md-4 col-md-offset-2 control-label">¿Qué tipo de colaboración podés brindar?</label>
                      </div>


                      <div class="col-md-9  col-md-offset-3">
                        @foreach($helps as $help)
                          <div class="col-md-4">
                            <input type="checkbox" name="helps[]" value="{{ $help->id }}" /> {{ $help->name }}
                              @if ($errors->has('helps[]'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('helps[]') }}</strong>
                                  </span>
                              @endif
                          </div>
                        @endforeach
                      </div>

                      <hr />

                      <div class="form-group{{ $errors->has('comments') ? ' has-error' : '' }}">
                          <label for="comments" class="col-md-4 control-label">Comentarios</label>

                          <div class="col-md-6">
                              <textarea rows="4" id="comments" class="form-control" name="comments" required/>{{ old('comments') }}</textarea>
                              @if ($errors->has('comments'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('comments') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Enviar
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
