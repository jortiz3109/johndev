<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('site.title') }}</title>

    <!-- BULMA framework -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body>
@include('main-navbar')
@yield('content-top')
@yield('content')
@yield('content-bottom')
<script src="{{ asset(mix('js/app.js')) }}" defer></script>
</body>
</html>
