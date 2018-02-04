@extends('front.layouts.interna')

@section('content')

<?php $video = ($content->video_id != "") ? true:false; ?>


@include('front.articles.assets.content',$content)
@endsection
