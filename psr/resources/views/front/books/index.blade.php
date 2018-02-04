@extends('front.layouts.interna-innermenu-layout')
@section('content')

<div class="container-fluid books">


@foreach($libros as $content)
@include('front.books.assets.libro',$content)
@endforeach


</div>
@endsection
