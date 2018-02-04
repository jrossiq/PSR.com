<link rel="icon" type="image/png" href="/favicon.png">

<title>{{$target->html_title}}</title>
<meta name="description" content="{{str_limit($target->social_desc,200)}}" />
<!--Page description. No longer than 155 characters.-->
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="{{$target->title}}">
<meta itemprop="description" content="{{$target->social_desc}}">
<meta itemprop="image" content="{{asset($target->getImageByType(2))}}">

<!-- Twitter Card data -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@Salbuchi">
<meta name="twitter:title" content="{{$target->title}}">
<meta name="twitter:description" content="{{str_limit($target->social_desc,200)}}">
<meta name="twitter:creator" content="@Salbuchi">
<!-- Twitter summary card with large image must be at least 280x150px -->
<meta name="twitter:image:src" content="{{asset($target->getImageByType(2))}}">

<!-- Open Graph data -->
<meta property="og:title" content="{{$target->title}}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{url($target->getFullUrl())}}" />
<meta property="og:image" content="{{asset($target->getImageByType(2))}}" />
<meta property="og:description" content="{{$target->social_description}}" />
<meta property="og:site_name" content="http://www.proyectosegundarepublica.com.ar" />
<meta property="article:published_time" content="{{$target->date}}" />
<meta property="article:modified_time" content="{{$target->updated_at}}" />
<?php $data = get_defined_vars();?>
@if(!empty($data['section']))<meta property="article:section" content="{{$section->title}}" />@endif
@if(!empty($data['content']))<meta property="article:tag" content="{{$content->tags[0]->name}}" />@endif
<meta property="og:author" content="PSR" />
<meta property="article:publisher" content="http://www.facebook.com/ProyectoSegundaRepublica" />
<meta property="article:author" content="http://facebook.com/ProyectoSegundaRepublica" />
<meta property="fb:app_id" content="1698679477089861"/>
