<?php
$social = [
  ['name'=>"facebook",'url'=>'http://www.facebook.com/ProyectoSegundaRepublica/'],
  ['name'=>"twiter",'url'=>'http://twitter.com/psr_argentina'],
  ['name'=>"youtube",'url'=>'https://www.youtube.com/channel/UCavo9XFsHVXtp00jxJVZjLQ'],
  ['name'=>"tlv1",'url'=>'http://www.youtube.com/channel/UCgF9ahMxHViwYu-wF8OD0Dw'],
  //['name'=>"gplus",'url'=>'http://wwww.facebook.com'],
];
?>

<div class="redes">
  @foreach($social as $red)
    <a target="_blank" href="{{$red['url']}}"><img src="/img/social/{{$red['name']}}.jpg" alt=""></a>
  @endforeach
</div>
