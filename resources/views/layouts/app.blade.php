<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('site.title') }}</title>

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    @stack('head')
</head>
<body>
<div id="app">
    @include('main-navbar')
    @yield('content-top')
    @yield('content')
    @yield('content-bottom')
    @auth()
    <logout-component>
        <form id="logoutForm" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </logout-component>
    @endauth

    <notification />
</div>
@yield('footer')
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
