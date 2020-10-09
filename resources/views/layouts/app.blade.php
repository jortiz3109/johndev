<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('site.title') }}</title>

    <!-- BULMA framework -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    @stack('head')
</head>
<body class="has-background-light">
<div id="app">
    @include('main-navbar')
    @yield('content-top')
    @yield('content')
    @yield('content-bottom')
    <notification />
</div>
<footer class="footer has-background-light">
    <div class="content has-text-centered">
        © {{ now()->year }} John Edisson Ortiz, All rights reserved
    </div>
</footer>
<script>
    window._locale = '{{ app()->getLocale() }}';
    window._translations = {!! cache('translations') !!};
    window._sitePath = '{{ url('') }}';
    window._apiPath = '{{ url('/api') }}';
</script>
<script src="{{ asset(mix('js/manifest.js')) }}"></script>
<script src="{{ asset(mix('js/vendor.js')) }}"></script>
<script src="{{ asset(mix('js/app.js')) }}"></script>
</body>
</html>
