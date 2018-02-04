@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>
                <a href="/backend/contents/section/2  ">Contenidos</a>
            </h4>
          </div>
        </div>
      </div>
      <div class="col-md-3">
          <div class="panel panel-default">
            <div class="panel-heading"><h3>Secciones</h3>
            </div>
              <div class="panel-body">
                  <ul>
                    @forelse($menuLeftSections as $principalSection)
                      @if($principalSection->id > 1 && $principalSection->topnav_back == 1)
                        @if($principalSection->childrens()->count() > 0)
                          <li><a href="/backend/contents/section/{{ $principalSection->id }}">{{ $principalSection->name }} ({{ $principalSection->childrens()->count() }})</a></li>
                        @else
                          @if($principalSection->contents()->count() > 0)
                            <li><a href="/backend/contents/section/{{ $principalSection->id }}">{{ $principalSection->name }} ({{ $principalSection->contents()->count() }})</a></li>
                          @else
                            @if($principalSection->id == 9)
                              <li><a href="/backend/contents/section/{{ $principalSection->id }}">{{ $principalSection->name }} ({{ $principalSection->contents()->count() }})</a></li>
                            @else
                              <li><a href="">{{ $principalSection->name }} ({{ $principalSection->childrens()->count() }})</a></li>
                            @endif
                          @endif
                        @endif
                          @if($principalSection->id == $section->id)
                            <ul>
                              @forelse($principalSection->childrens->where('active', 1) as $children)
                                @if($children->childrens()->count() > 0)
                                  <li><a href="">{{ $children->name }}</a></li>
                                    <ul>
                                      @foreach($children->childrens->where('active', 1) as $subChildren)
                                        <li><a href="/backend/contents/subSection/{{ $subChildren->id }}">{{ $subChildren->name }}</a></li>
                                      @endforeach
                                    </ul>
                                @else
                                  <li><a href="/backend/contents/subSection/{{ $children->id }}">{{ $children->name }}</a></li>
                                @endif
                              @empty

                              @endforelse
                            </ul>
                          @endif
                      @endif
                    @empty
                      No hay secciones aquí.
                    @endforelse
                  </ul>
              </div>
          </div>
      </div>
      <div class="col-md-9">
          <div class="panel panel-default">
              <div class="panel-heading">
                @if(isset($subSection))
                  <h4>{{ $subSection->parent->name }} / {{ $subSection->name }}
                    <a class="btn btn-success article-create" href="/backend/contents/createBySection/{{ $section->id }}/{{ $subSection->id }}">Crear</a>
                  </h4>
                @else
                  <h4>{{ $section->name }}
                    <a class="btn btn-success article-create" href="/backend/contents/createBySection/{{ $section->id }}">Crear</a>
                  </h4>
                @endif
              </div>
              <div class="panel-body">
                @if(isset($message))
                    <div class="alert alert-success message">
                        <h5>{{ $message }}</h5>
                    </div>
                @endif

                    <table class="table table-hover table-contents">
                      @if(isset($contents))
                        @forelse($contents as $content)
                          @if($content->section_id == 9)
                            <tr>
                              <td class="line-hight" rowspan="3"><img src="{{ $content->getSmallImg($content->typeview_id) }}" width="140px" height="200px"></td>
                              <td colspan="5"><h4><a href="/backend/contents/{{ $content->id }}">{{ $content->title }}</a></h4></td>
                            </tr>
                          @else
                            <tr>
                              <td class="line-hight" rowspan="2"><img src="{{ $content->getSmallImg($content->typeview_id) }}" width="140px"></td>
                              <td colspan="5"><h4><a href="/backend/contents/{{ $content->id }}">{{ $content->title }}</a></h4></td>
                            </tr>
                          @endif
                          @if($content->section_id == 9)
                            <tr>
                              @if($content->typeview_id == 4)
                                <td>Pgrama N°: {{ $content->reference }}</td>
                                <td>{{ $content->renderDate() }}</td>
                              @else
                                <td colspan="2">{{ $content->renderDate() }}</td>
                              @endif
                              <td>
                                @if(isset($content->creator->name))
                                  {{ $content->creator->name }}
                                @endif
                              </td>
                              <td><a href="/backend/contents/{{ $content->id }}/edit" class="btn btn-primary btn-xs article-edit">Editar</a></td>
                              <td>
                                  {!! Form::open(['method' => 'DELETE','route' => ['contents.destroy', $content->id],'style'=>'display:inline']) !!}
                                  {!! Form::submit('Eliminar', ['class' => 'btn btn-danger pull-right btn-xs']) !!}
                                  {!! Form::close() !!}
                              </td>
                            </tr>
                          @else
                            <tr class="line-hight">
                              @if($content->typeview_id == 4)
                                <td>Pgrama N°: {{ $content->reference }}</td>
                                <td>{{ $content->renderDate() }}</td>
                              @else
                                <td colspan="2">{{ $content->renderDate() }}</td>
                              @endif
                              <td>
                                @if(isset($content->creator->name))
                                  {{ $content->creator->name }}
                                @endif
                              </td>
                              <td><a href="/backend/contents/{{ $content->id }}/edit" class="btn btn-primary btn-xs article-edit">Editar</a></td>
                              <td>
                                  {!! Form::open(['method' => 'DELETE','route' => ['contents.destroy', $content->id],'style'=>'display:inline']) !!}
                                  {!! Form::submit('Eliminar', ['class' => 'btn btn-danger pull-right btn-xs']) !!}
                                  {!! Form::close() !!}
                              </td>
                            </tr>
                          @endif

                            @if($content->section_id == 9)
                              <tr class="line-hight">
                                <td></td>
                                <td></td>
                              </tr>
                            @endif
                        @empty
                          - No hay contenidos aquí.
                        @endforelse
                      @endif
                    </table>
                    {{ $contents->links() }}
                  </div>
                </div>
              </div>
          </div>
      </div>
    </div>
</div>
@endsection
