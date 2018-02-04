
<ul class="inner-menu nav nav-tabs nav-justified hidden-xs">
  @foreach($subs as $pilar)
  <li role="presentation" class="{{$target->url == $pilar->url ? 'active': ''}}">
    <a href="{{$pilar->getFullUrl()}}">{{$pilar->btnName}}</a></li>
  @endforeach

</ul>
