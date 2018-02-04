</div><!--END SITE CONTENT-->

<!-- Modal -->
<div id="search-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content container-fluid">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <form id="search-main">

            <input type="text" placeholder="Buscar..." id="search-input-main" autocomplete="off">

          <button type="submit" class="btn btn-default"><i class="material-icons">search</i></button>
        </form>

      </div>
    </div>
  </div>

<div class="footer container-fluid">
  <a class="toTop" href='#top'><i class="material-icons">keyboard_arrow_up</i></a>
<div class="row">
  <div class="col-md-1 hidden-xs"></div>
  <div class="col-xs-6 col-sm-3 col-md-2">
    @if($sections[3]->getSubSections())
    <span>{{$sections[3]->name}}</span>
    <ul class="list-unstyled">
      @foreach($sections[3]->getSubSections() as $subsection)
      <li><a href="{{$subsection->getFullUrl()}}">{{$subsection->name}}</a></li>
      @endforeach
    </ul>
    @else
    <a class="link" href="{{$sections[3]->getFullUrl()}}">{{$sections[3]->name}}</a>
    @endif

    @if(count($sections) > 9)
    @if($sections[9]->getSubSections())
    <span>{{$sections[9]->name}}</span>
    <ul class="list-unstyled">
      @foreach($sections[9]->getSubSections() as $subsection)
      <li><a href="{{$subsection->getFullUrl()}}">{{$subsection->name}}</a></li>
      @endforeach
    </ul>
    @else
    <a class="link" href="{{$sections[9]->getFullUrl()}}">{{$sections[9]->name}}</a>
    @endif
    @endif



  </div>

  <div class="col-xs-6 col-sm-3 col-md-3">
    @if($sections[2]->getSubSections())
    <span>{{$sections[2]->name}}</span>
    <ul class="list-unstyled">
      @foreach($sections[2]->getSubSections() as $subsection)
      <li><a href="{{$subsection->getFullUrl()}}">{{$subsection->name}}</a></li>
      @endforeach
    </ul>
    @else
    <a class="link" href="{{$sections[2]->getFullUrl()}}">{{$sections[2]->name}}</a>
    @endif

    @if($sections[1]->getSubSections())
    <span>{{$sections[1]->name}}</span>
    <ul class="list-unstyled">
      @foreach($sections[1]->getSubSections() as $subsection)
      <li><a href="{{$subsection->getFullUrl()}}">{{$subsection->name}}</a></li>
      @endforeach
    </ul>
    @else
    <a class="link" href="{{$sections[2]->getFullUrl()}}">{{$sections[1]->name}}</a>
    @endif
  </div>

  <div class="col-xs-6 col-sm-3 col-md-2">

    @if($sections[4]->getSubSections())
    <span>{{$sections[4]->name}}</span>
    <ul class="list-unstyled">
      @foreach($sections[4]->getSubSections() as $subsection)
      <li><a href="{{$subsection->getFullUrl()}}">{{$subsection->name}}</a></li>
      @endforeach
    </ul>
    @else
    <a class="link" href="{{$sections[4]->getFullUrl()}}">{{$sections[4]->name}}</a>
    @endif

    @if($sections[5]->getSubSections())
    <span>{{$sections[5]->name}}</span>
    <ul class="list-unstyled">
      @foreach($sections[5]->getSubSections() as $subsection)
      <li><a href="{{$subsection->getFullUrl()}}">{{$subsection->name}}</a></li>
      @endforeach
    </ul>
    @else
    <a class="link" href="{{$sections[5]->getFullUrl()}}">{{$sections[5]->name}}</a>
    @endif

    @if(count($sections)>6)
    @if($sections[6]->getSubSections())
    <span>{{$sections[6]->name}}</span>
    <ul class="list-unstyled">
      @foreach($sections[6]->getSubSections() as $subsection)
      <li><a href="{{$subsection->getFullUrl()}}">{{$subsection->name}}</a></li>
      @endforeach
    </ul>
    @else
    <a class="link" href="{{$sections[6]->getFullUrl()}}">{{$sections[6]->name}}</a>
    @endif
    @endif

    @if(count($sections)>7)
    @if($sections[7]->getSubSections())
    <span>{{$sections[7]->name}}</span>
    <ul class="list-unstyled">
      @foreach($sections[7]->getSubSections() as $subsection)
      <li><a href="{{$subsection->getFullUrl()}}">{{$subsection->name}}</a></li>
      @endforeach
    </ul>
    @else
    <a class="link" href="{{$sections[7]->getFullUrl()}}">{{$sections[7]->name}}</a>
    @endif
    @endif

  </div>

  <div class="col-xs-6 col-sm-3 col-md-2">

    @if(count($sections)>8)
    @if($sections[8]->getSubSections())
    <span>{{$sections[8]->name}}</span>
    <ul class="list-unstyled">
      @foreach($sections[8]->getSubSections() as $subsection)
      <li><a href="{{$subsection->getFullUrl()}}">{{$subsection->name}}</a></li>
      @endforeach
    </ul>
    @else
    <a class="link" href="{{$sections[8]->getFullUrl()}}">{{$sections[8]->name}}</a>
    @endif
    @endif


    @if(count($sections)>10)
    @if($sections[10]->getSubSections())
    <span>{{$sections[10]->name}}</span>
    <ul class="list-unstyled">
      @foreach($sections[10]->getSubSections() as $subsection)
      <li><a href="{{$subsection->getFullUrl()}}">{{$subsection->name}}</a></li>
      @endforeach
    </ul>
    @else
    <a class="link" href="{{$sections[10]->getFullUrl()}}">{{$sections[10]->name}}</a>
    @endif
    @endif

  </div>


</div>

<div class="row the-end">
  <div class="col-md-1"></div>
  <div class="col-md-11">© 2017 - Proyecto Segunda República - Todos los derechos reservados</div>

</div>

</div>
