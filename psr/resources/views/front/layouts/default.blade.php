<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('front.layouts.assets.social-meta')
    @include('front.layouts.assets.header')

    @include('front.layouts.assets.nav')
    @yield('content')
    @include('front.layouts.assets.footer')
    @include('front.layouts.assets.closer')

