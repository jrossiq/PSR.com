@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4><a href="/backend/sections">Secciones</a> / Editar</h4></div>
                <div class="panel-body">

                  @if(isset($message))
                    <div class="col-md-10 col-md-offset-1">
                        <div class="alert alert-success message">
                            <h5>{{ $message }}</h5>
                        </div>
                    </div>
                  @endif

                  <form class="form-horizontal" role="form" method="POST" action="/backend/sections/{{ $section->id }}">

                      {{ csrf_field() }}
                      {{ method_field('patch') }}

                      <div class="form-group{{ $errors->has('topnav') ? ' has-error' : '' }}">
                          <div class="col-md-6 col-md-offset-4">

                              @if($section->topnav)
                                <input type="checkbox" name="topnav"  checked/> Activo en Top-Nav
                              @else
                                <input type="checkbox" name="topnav"/> Activo en Top-Nav
                              @endif

                              @if ($errors->has('topnav'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('topnav') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                          <label for="level" class="col-md-4 control-label">Nivel</label>
                          <div class="col-md-6">
                              <select class="form-control level" name="level" disabled>
                                  @if($section->level == 1)
                                    <option value="1" selected>Principal</option>
                                    <option value="2">Sub Sección</option>
                                  @else
                                    <option value="1">Principal</option>
                                    <option value="2" selected>Sub Sección</option>
                                  @endif
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

                              @include('backend.sections.includes.select-section-edit')

                              @if ($errors->has('section_id'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('section_id') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('typeview_id') ? ' has-error' : '' }} principal">
                          <label for="typeview_id" class="col-md-4 control-label">Tipo de Vista</label>

                          <div class="col-md-6">

                              @include('backend.sections.includes.select-typeview-edit')

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
                              <input id="name" type="text" class="form-control title" name="name"
                                @if(old('name'))
                                  value="{{ old('name') }}"
                                @else
                                  value="{{ $section->name }}"
                                @endif
                              required>

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
                              <input id="html_title" type="text" class="form-control title" name="html_title"
                                @if(old('html_title'))
                                  value="{{ old('html_title') }}"
                                @else
                                  value="{{ $section->html_title }}"
                                @endif
                              required>

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
                              <input id="url" type="text" class="form-control url" name="url"
                                @if(old('url'))
                                  value="{{ old('url') }}"
                                @else
                                  value="{{ $section->url }}"
                                @endif
                              required>

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
                              @if(old('social_desc'))
                                <textarea rows="3" id="social_desc" class="form-control" name="social_desc" required/>{{ old('social_desc') }}</textarea>
                              @else
                                <textarea rows="3" id="social_desc" class="form-control" name="social_desc" required/>{{ $section->social_desc }}</textarea>
                              @endif

                              @if ($errors->has('social_desc'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('social_desc') }}</strong>
                                  </span>
                              @endif
                              <div class="social-helper">
                                <strong><span class="social-count"></span> caracteres</strong>
                                <span> - Se recomienda no más de <strong>150</strong> caracteres(facebook)</span>
                              </div>
                          </div>
                      </div>

                      <hr />
                        <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-2 control-label">Texto</label>

                            <div class="col-md-8">
                                @if(old('text'))
                                  <textarea id="text" class="form-control text" name="text" />{!! old('text') !!}</textarea>
                                @else
                                  <textarea id="text" class="form-control text" name="text" />{!! $section->text !!}</textarea>
                                @endif

                                @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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
