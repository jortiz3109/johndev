@extends('layouts.main')
@section('content-top')
    <div class="container">
        @include('main-navbar')
        @yield('admin-content-top')
    </div>
@endsection
@section('content')
    <div class="box container mt-3">
        @yield('admin-content')
    </div>
@endsection
@section('content-bottom')
    <div class="container">
        @yield('admin-content-bottom')
    </div>
@endsection
@push('scripts-top')
    <script>
        window._locale = '{{ app()->getLocale() }}';
        window._translations = {!! cache('translations') !!};
        window._sitePath = '{{ url('') }}';
        window._apiPath = '{{ url('/api') }}';
        @auth()
            window._apiToken = '{{ auth()->user()->api_token }}';
        @endauth
    </script>
@endpush
