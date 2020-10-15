<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('site.title') }}</title>

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
@stack('footer-top')
<footer class="footer">
    <div class="container">
        <div class="columns">
            <div class="column">
                <p class="content">
                    © {{ now()->year }} John Edisson Ortiz, All rights reserved
                </p>
            </div>
            <div class="column">
                <a href="https://bulma.io" target="_blank" class="is-pulled-right">
                    <img src="https://bulma.io/images/made-with-bulma--white.png" alt="Made with Bulma" width="128" height="24">
                </a>
            </div>
        </div>
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
