<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="col-md-11">
              <img src="/img/adhesiones/banner.jpg" class="img-responsive" alt="Responsive image" />
              <hr />
            </div>

                  <form class="form-horizontal" role="form" method="POST" action="/adhesiones">
                      {{ csrf_field() }}

                      <div class="row">

                            @if(isset($message))
                              <div class="alert alert-success message col-md-7 col-md-offset-2">
                                  <h5>{{ $message }}</h5>
                              </div>
                            @endif

                        <div class="col-md-7 col-md-offset-2 texto-adhesiones">
                          <p>Por el momento <b>sólo podemos juntar Adhesiones para el distrito de la Ciudad Autónoma de Buenos Aires</b>.</p>
                          <p>Podés dirigirte personalemente a firmar tu Adhesión a <b>Suipacha 119 - 1er Piso, de Lunes a Viernes de 12 a 19 hs.
                            o Sábados de 10 a 14 hs.</b></p>

                          <hr />

                          <p>Si querés combinar otro punto de encuentro, día y/u horario podés dejarnos tus datos y te vamos a contactar a la brevedad.</p>
                        </div>
                      </div>

                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <label for="name" class="col-md-3 control-label">Nombre</label>
                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                              @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                          <label for="lastname" class="col-md-3 control-label">Apellido</label>
                          <div class="col-md-6">
                              <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>
                              @if ($errors->has('lastname'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('lastname') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                          <label for="city" class="col-md-3 control-label">Barrio</label>
                          <div class="col-md-6">
                              <input id="city" type="text" class="form-control title" name="city" value="{{ old('city') }}" required autofocus>
                              @if ($errors->has('city'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('city') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <label for="email" class="col-md-3 control-label">E-Mail</label>
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
                          <label for="telephone" class="col-md-3 control-label">Teléfono</label>
                          <div class="col-md-6">
                              <input id="telephone" type="text" class="form-control title" name="telephone" value="{{ old('telephone') }}" required autofocus>
                              @if ($errors->has('telephone'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('telephone') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-3">
                              <button type="submit" class="btn btn-primary">
                                  Enviar
                              </button>
                          </div>
                      </div>
                  </form>
        </div>
    </div>
</div>
