@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>
                @if(isset($subSection))
                  <a href="/backend/contents/subSection/{{ $subSection->id }}">Contenidos</a>
                  <!-- <a class="btn btn-success article-create" href="/backend/contents/{{ $section->id }}/createBySection">Crear</a> -->
                @else
                  <a href="/backend/contents/section/{{ $section->id }}">Contenidos</a>
                  <!-- <a class="btn btn-success article-create" href="/backend/contents/{{ $section->id }}/createBySection">Crear</a> -->
                @endif
            </h4>
          </div>
        </div>
      </div>
      <div class="col-md-3">
          <div class="panel panel-default">
            @if(isset($subSection))
              <div class="panel-heading"><h3>{{ $section->name }}</h3>
                <a class="btn btn-success" href="/backend/contents/createBySection/{{ $section->id }}/{{ $subSection->id }}">Crear</a>
              </div>
            @else
            <div class="panel-heading"><h3>{{ $section->name }}</h3>
              <a class="btn btn-success" href="/backend/contents/createBySection/{{ $section->id }}">Crear</a></h3>
            </div>
            @endif
              <div class="panel-body">
                  <ul>
                    @if($sections)
                      @forelse($sections->where('active', 1) as $section)
                        @if($section->id == $subSection->id)
                          <li><a href="/backend/contents/{{ $section->contents()->first()->id }}">{{ $subSection->name }} ({{ $section->contents()->count() }})</a></li>
                            <ul>
                              @forelse($subSection->contents as $contentNav)
                                <li><a href="/backend/contents/{{ $contentNav->id }}">{{ $contentNav->title }}</a></li>
                              @empty
                                No hay contenidos aquí.
                              @endforelse
                            </ul>
                        @else
                          @if($section->contents()->count() > 0)
                            <li><a href="/backend/contents/{{ $section->contents()->first()->id }}">{{ $section->name }} ({{ $section->contents()->count() }})</a></li>
                          @else
                            <li><a href="">{{ $section->name }} ({{ $section->contents()->count() }})</a></li>
                          @endif
                        @endif
                      @empty
                      @endforelse
                    @endif
                  </ul>
              </div>
          </div>
      </div>
      <div class="col-md-9">
          <div class="panel panel-default">
              <div class="panel-heading">
                <h4>{{ $content->title }}
                    <a class="btn btn-primary article-create" href="/backend/contents/{{ $content->id }}/edit">Editar</a>
                    <a class="btn btn-default btn-xs pull-right" href="{{ $content->getFullUrl() }}" target="_blank">Ver Online</a>
                </h4>
              </div>
              <div class="panel-body">
                @if(isset($message))
                    <div class="alert alert-success message">
                        <h5>{{ $message }}</h5>
                    </div>
                @endif

                @if($content->typeview_id == 4)
                  <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{ $content->video_id }}" frameborder="0" allowfullscreen>
                  </iframe>
                  <hr />
                    <div class="row">
                      <div class="col-md-6">
                        <img src="{{ $content->getSmallImg($content->typeview_id) }}" />
                      </div>
                      <div class="col-md-6">
                        <p><b>Creado por:</b></p>
                          @if(isset($content->creator->name))
                            <p class="editor">{{ $content->creator->name }} - {{ $content->getDate() }}</p>
                          @endif
                        <p><b>Editado por:</b></p>
                          @forelse($content->editors as $editor)
                            <p class="editor">{{ $editor->name }} - {{ $editor->pivot->date }} </p>
                          @empty
                          @endforelse
                      </div>
                    </div>
                  <hr />

                  <p><b>Video ID: </b>
                    @if($content->video_id)
                      {{ $content->video_id }}
                    @else
                      No hay ID especificado.
                    @endif
                  </p>

                @elseif($content->typeview_id == 2 || $content->typeview_id == 3)
                  <div class="row">
                    <div class="col-md-6">
                      <img src="{{ $content->getSmallImg($content->typeview_id) }}" />
                    </div>
                    <div class="col-md-6">
                      <p><b>Creado por:</b></p>
                        @if(isset($content->creator->name))
                          <p class="editor">{{ $content->creator->name }}</p>
                        @endif
                      <p><b>Editado por:</b></p>
                        @forelse($content->editors as $editor)
                          <p class="editor">{{ $editor->name }}</p>
                        @empty
                        @endforelse
                    </div>
                  </div>

                  <hr />
                @endif

                @if($content->typeview_id == 3)
                  <p><b>Autor: </b> {{ $content->author->name }}</p>
                  <p><img src="{{ $content->author->getFullImgUrl() }}" /></p>
                @endif

                <p><b>Título HTML: </b> {{ $content->html_title }}</p>
                <p><b>URL: </b> {{ $content->url }}</p>
                <p><b>Canonical: </b> {{ $content->canonical }}</p>
                <p><b>Descripción: </b> {!! $content->text !!}</p>
                <p><b>Desc. Social: </b> {{ $content->social_desc }}</p>
                <p><b>Tags: </b>
                  @if(isset($content->tags))
                    @forelse($content->tags as & $tag)
                      <span class="label label-default">{{ $tag->name }}</span>
                    @empty
                      No hay Tags asociados.
                    @endforelse
                  @else
                    No hay Tags asociados.
                  @endif
                </p>
                <p><b>Fecha: </b> {{ $content->renderDate() }}</p>
                <!-- <img src="{{ $content->getStandardImg($content->typeview_id) }}" />
                <img src="{{ $content->getMediumImg($content->typeview_id) }}" /> -->

              </div>
          </div>
      </div>
    </div>
</div>
@endsection
