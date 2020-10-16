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
    <logout-component>
        <form id="logoutForm" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </logout-component>

    <notification />
</div>
@stack('footer-top')
<footer class="footer">
    <div class="content has-text-centered">
        <p>
            © {{ now()->year }} John Edisson Ortiz, All rights reserved
        </p>
        <a href="https://bulma.io" target="_blank">
            <img src="https://bulma.io/images/made-with-bulma--white.png" alt="Made with Bulma" width="128" height="24">
        </a>
    </div>
</footer>
<script>
    window._locale = '{{ app()->getLocale() }}';
    window._translations = {!! cache('translations') !!};
    window._sitePath = '{{ url('') }}';
    window._apiPath = '{{ url('/api') }}';
    @auth()
    window._apiToken = '{{ auth()->user()->api_token }}';
    @endauth
</script>
<script src="{{ asset(mix('js/manifest.js')) }}"></script>
<script src="{{ asset(mix('js/vendor.js')) }}"></script>
<script src="{{ asset(mix('js/app.js')) }}"></script>
</body>
</html>
