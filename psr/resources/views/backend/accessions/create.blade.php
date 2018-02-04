@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4><a href="/backend/sections">Secciones</a> / Neva Sección</h4></div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="/backend/sections">
                      {{ csrf_field() }}

                      <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                          <label for="level" class="col-md-4 control-label">Nivel</label>
                          <div class="col-md-6">
                              <select class="form-control level" name="level" required>
                                <option value="0">Elegir...</option>
                                <option value="1">Principal</option>
                                <option value="2">Sub Sección</option>
                              </select>

                              @if ($errors->has('level'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('level') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('section_id') ? ' has-error' : '' }} principal">
                          <label for="section_id" class="col-md-4 control-label">Sección Principal</label>
                          <div class="col-md-6">
                              <select class="form-control" name="section_id" required>
                                <option value="0">Elegir...</option>
                                  @forelse($sections as $section)
                                    @if($section->level == 1)
                                      <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endif
                                  @empty
                                    <option value="0">No hay secciones</option>
                                  @endforelse
                              </select>

                              @if ($errors->has('section_id'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('section_id') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('typeview_id') ? ' has-error' : '' }}">
                          <label for="typeview_id" class="col-md-4 control-label">Tipo de Vista</label>
                          <div class="col-md-6">
                              <select class="form-control" name="typeview_id" required>
                                <option value="0">Elegir...</option>
                                @foreach($typeviews as $typeview)
                                  @if(old('typeview') && old('typeview') == $typeview->id)
                                    <option value="{{ $typeview->id }}" selected>{{ $typeview->name }}</option>
                                  @else
                                    <option value="{{ $typeview->id }}">{{ $typeview->name }}</option>
                                  @endif
                                @endforeach
                              </select>

                              @if ($errors->has('typeview_id'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('typeview_id') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

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

                      <div class="form-group{{ $errors->has('html_title') ? ' has-error' : '' }}">
                          <label for="html_title" class="col-md-4 control-label">Título HTML</label>
                          <div class="col-md-6">
                              <input id="html_title" type="text" class="form-control title" name="html_title" value="{{ old('html_title') }}" required autofocus>
                              @if ($errors->has('html_title'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('html_title') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                          <label for="url" class="col-md-4 control-label">URL</label>

                          <div class="col-md-6">
                              <input id="url" type="text" class="form-control url" name="url" value="{{ old('url') }}" required>

                              @if ($errors->has('url'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('url') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('social_desc') ? ' has-error' : '' }}">
                          <label for="social_desc" class="col-md-4 control-label">Desc. Social</label>

                          <div class="col-md-6">
                              <textarea id="social_desc" class="form-control" name="social_desc" required/>{{ old('social_desc') }}</textarea>

                              @if ($errors->has('social_desc'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('social_desc') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <hr />

                        <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-2 control-label">Texto</label>

                            <div class="col-md-8">
                                <textarea id="text" class="form-control text" name="text" />{{ old('text') }}</textarea>

                                @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      <hr />

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Crear
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
