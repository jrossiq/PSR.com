@if(!empty($content))<span class="stats">{{$content->renderDate()}}@endif

@if(isset($video) && $video == false)
<span class="views"><i class="material-icons eye">remove_red_eye</i>{{$content->views}}</span>
@elseif(isset($ytviews))
<span class="views"><i class="material-icons eye">remove_red_eye</i>{{$ytviews}}</span>
@endif

</span>
