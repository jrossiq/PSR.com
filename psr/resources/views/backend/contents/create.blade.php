@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">

                  <h4>
                      @if(isset($subSection))
                        @if(isset($subSubSection))
                          <a href="/backend/contents/subSection/{{ $subSubSection->id }}"> {{ $subSubSection->name }}</a>
                          / Nuevo {{ $subSubSection->typeview->name }}
                        @else
                              @if(Auth::user()->type_id == 2)
                                {{ $subSection->name }}
                              @else
                                <a href="/backend/contents/subSection/{{ $subSection->id }}"> {{ $subSection->name }}</a>
                              @endif
                            @if($section->typeview_id == 5)
                              / Nuevo programa
                            @else
                              / Nuevo {{ $subSection->typeview->name }}
                            @endif
                        @endif
                      @else
                        <a href="/backend/contents/section/{{ $section->id }}"> {{ $section->name }}</a>
                        / Nuevo {{ $section->typeview->name }}
                      @endif
                  </h4>
                </div>
                <div class="panel-body">

                  @if(session('message'))
                      <div class="alert alert-success message col-md-8 col-md-offset-2">
                          <h5>{{ session('message') }}</h5>
                      </div>
                  @endif

                  <form class="form-horizontal" role="form" enctype='multipart/form-data' method="POST" action="/backend/contents">
                      {{ csrf_field() }}

                      <input type="hidden" name="typeview_id" value="{{ $section->typeview_id }}" />

                      @if($section->typeview_id == 5 || $section->typeview_id == 6)

                        @if($section->typeview_id == 5)

                        <div class="form-group{{ $errors->has('section_id') ? ' has-error' : '' }}">
                            <label for="section_id" class="col-md-4 control-label">Radio</label>
                            <div class="col-md-6">
                              <select class="form-control" name="section_id" required>
                                        <option value="{{ $subSection->id }}" selected>{{ $subSection->name }}</option>
                              </select>

                                @if ($errors->has('section_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('section_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('radio_url') ? ' has-error' : '' }}">
                              <label for="radio_url" class="col-md-4 control-label">Radio URL</label>
                              <div class="col-md-6">
                                  <input id="radio_url" type="text" class="form-control radio_url" name="radio_url" value="{{ old('radio_url') }}">
                                  @if ($errors->has('radio_url'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('radio_url') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('reference') ? ' has-error' : '' }}">
                              <label for="reference" class="col-md-4 control-label">Programa N°: </label>
                              <div class="col-md-6">
                                  <input id="reference" type="text" class="form-control" name="reference" value="{{ old('reference') }}" required>
                                  @if ($errors->has('reference'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('reference') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                        @else
                          <input type="hidden" name="section_id" value="{{ $section->id }}" />

                          <div class="form-group{{ $errors->has('filter_id') ? ' has-error' : '' }}">
                              <label for="filter_id" class="col-md-4 control-label">Medio</label>
                              <div class="col-md-6">
                                <select class="form-control" name="filter_id" required>
                                    <option value="0">Elegir...</option>
                                      @foreach($medios as $medio)
                                        @if(old('filter_id') && old('filter_id') == $medio->id)
                                          <option value="{{ $medio->id }}" selected>{{ $medio->name }}</option>
                                        @else
                                          <option value="{{ $medio->id }}">{{ $medio->name }}</option>
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

                          <div class="form-group{{ $errors->has('mediatype_id') ? ' has-error' : '' }}">
                              <label for="mediatype_id" class="col-md-4 control-label">Tipo de Medio</label>
                              <div class="col-md-6">
                                <select class="form-control" name="mediatype_id" required>
                                    <option value="0">Elegir...</option>
                                      @foreach($mediaTypes as $mediatype)
                                        @if(old('mediatype_id') && old('mediatype_id') == $mediatype->id)
                                          <option value="{{ $mediatype->id }}" selected>{{ $mediatype->name }}</option>
                                        @else
                                          <option value="{{ $mediatype->id }}">{{ $mediatype->name }}</option>
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



                          <div class="form-group{{ $errors->has('radio_url') ? ' has-error' : '' }}">
                              <label for="radio_url" class="col-md-4 control-label">Radio URL</label>
                              <div class="col-md-6">
                                  <input id="radio_url" type="text" class="form-control radio_url" name="radio_url" value="{{ old('radio_url') }}">
                                  @if ($errors->has('radio_url'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('radio_url') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                        @endif
                      @else

                        <div class="form-group">
                            <label class="col-md-4 control-label">Sección</label>
                            <div class="col-md-6">
                                <select class="form-control">
                                  @if(isset($section))
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                  @else
                                    <option value="0">Elegir...</option>
                                  @endif
                                </select>

                            </div>
                        </div>

                        @if($section->typeview_id == 9)
                          <input type="hidden" name="section_id" value="{{ $section->id }}" />
                          <input type="hidden" name="typeview_id" value="{{ $section->typeview_id }}" />
                        @else

                          <div class="form-group{{ $errors->has('section_id') ? ' has-error' : '' }}">
                              <label for="section_id" class="col-md-4 control-label">Sub Sección</label>
                              <div class="col-md-6">
                                <select class="form-control" name="section_id" required>
                                  @if(isset($subSection))
                                    <option value="{{ $subSection->id }}">{{ $subSection->name }}</option>
                                  @else
                                    <option value="0">Elegir...</option>
                                      @foreach($subSections as $otherSubSection)
                                        @if(old('section_id') && old('section_id') == $otherSubSection->id)
                                          <option value="{{ $otherSubSection->id }}" selected>{{ $otherSubSection->name }}</option>
                                        @else
                                          <option value="{{ $otherSubSection->id }}">{{ $otherSubSection->name }}</option>
                                        @endif
                                      @endforeach
                                  @endif
                                </select>

                                  @if ($errors->has('section_id'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('section_id') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>



                        @endif
                      @endif



                        <div class="form-group{{ $errors->has('dest') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-4">

                              <input type="checkbox" name="dest"  /> Destacado

                                @if ($errors->has('dest'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dest') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      @if($section->id == 4 || $section->id == 5 || $section->id == 11)
                        <div class="form-group{{ $errors->has('videotype_id') ? ' has-error' : '' }}">
                            <label for="videotype_id" class="col-md-4 control-label">Tipo de Video</label>
                            <div class="col-md-6">
                                <select class="form-control" name="videotype_id" required autofocus>
                                    <option value="0">Elegir...</option>
                                      @foreach($videoTypes as $videotype)
                                        @if(old('videotype_id') && old('videotype_id') == $videotype->id)
                                          <option value="{{ $videotype->id }}" selected>{{ $videotype->name }}</option>
                                        @else
                                          <option value="{{ $videotype->id }}">{{ $videotype->name }}</option>
                                        @endif
                                      @endforeach
                                </select>

                                @if ($errors->has('videotype_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('videotype_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('video_id') ? ' has-error' : '' }}">
                            <label for="video_id" class="col-md-4 control-label">Video ID</label>
                            <div class="col-md-6">
                                <input id="video_id" type="text" class="form-control video_id" name="video_id" value="{{ old('video_id') }}" required>
                                @if ($errors->has('video_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('video_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('reference') ? ' has-error' : '' }}">
                            <label for="reference" class="col-md-4 control-label">Programa N°: </label>
                            <div class="col-md-6">
                                <input id="reference" type="text" class="form-control" name="reference" value="{{ old('reference') }}" required>
                                @if ($errors->has('reference'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reference') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      @endif

                      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                          <label for="title" class="col-md-4 control-label">Título</label>
                          <div class="col-md-6">
                              <input id="title" type="text" class="form-control title" name="title" value="{{ old('title') }}" required autofocus>
                              @if ($errors->has('title'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('title') }}</strong>
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

                      <div class="form-group{{ $errors->has('canonical') ? ' has-error' : '' }}">
                          <label for="canonical" class="col-md-4 control-label">Canonical</label>

                          <div class="col-md-6">
                              <input id="canonical" type="text" class="form-control" name="canonical" value="{{ old('canonical') }}">

                              @if ($errors->has('canonical'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('canonical') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('social_desc') ? ' has-error' : '' }}">
                          <label for="social_desc" class="col-md-4 control-label">Desc. Social</label>

                          <div class="col-md-6">
                              <textarea rows="3" id="social_desc" class="form-control" name="social_desc" required/>{{ old('social_desc') }}</textarea>
                              <div class="social-helper">
                                <strong><span class="social-count"></span> caracteres</strong>
                                <span> - Se recomienda no más de <strong>150</strong> caracteres(facebook)</span>
                              </div>
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

                      <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                          <label for="tags" class="col-md-4 control-label">Tags</label>
                          <div class="col-md-6">
                              <select class="form-control tags" name="tags[]" multiple="multiple" required>
                                <option value="0">Elegir...</option>
                                  @foreach($tags as $tag)
                                        @if(isset($tagId->id) && $tagId->id == $tag->id)
                                          <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
                                        @endif

                                        @if(old('tag_id') && old('tag_id') == $tag->id)
                                          <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
                                        @else
                                          <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endif
                                  @endforeach
                              </select>

                              @if ($errors->has('tags'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('tags') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                          <div for="tags" class="col-md-4 control-label"></div>
                          <div class="col-md-6">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-summary btn-sm" data-toggle="modal" data-target="#myModal">
                              Agregar Tag
                            </button>
                            <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Nuevo Tag</h4>
                                      </div>
                                      <div class="modal-body">
                                        <input type="text" class="form-control newTag" />
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-primary saveNewTag" data-dismiss="modal">Guardar</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                          </div>
                      </div>

                      @if($section->id == 3 || $section->id == 9)
                        <div class="form-group{{ $errors->has('author_id') ? ' has-error' : '' }}">
                            <label for="author_id" class="col-md-4 control-label">Autor</label>
                            <div class="col-md-6">
                                <select class="form-control" name="author_id" required>
                                  <option value="0">Elegir...</option>
                                  @foreach($authors as $author)
                                    @if(old('author') && old('author') == $author->id)
                                      <option value="{{ $author->id }}" selected>{{ $author->name }}</option>
                                    @else
                                      <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endif
                                  @endforeach
                                </select>

                                @if ($errors->has('author_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('author_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      @endif

                      <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                          <label for="date" class="col-md-4 control-label">Fecha</label>
                          <div class="col-md-6">
                              <input id="date" type="date" class="form-control" name="date" value="{{ old('date') }}" required>
                              @if ($errors->has('date'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('date') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
                          <label for="img" class="col-md-4 control-label">Imágen</label>
                          <div class="col-md-6">
                              <input id="img" type="file" class="form-control" name="img" value="{{ old('img') }}" >
                              @if ($errors->has('img'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('img') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

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
