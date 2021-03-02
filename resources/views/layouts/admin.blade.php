@extends('layouts.main')
@section('content-top')
    @include('main-navbar')
    @yield('admin-content-top')
@endsection
@section('content')
    <div class="box container is-max-desktop">
        @yield('admin-content')
    </div>
@endsection
@section('content-bottom')
    <div class="container is-max-desktop">
        @yield('admin-content-bottom')
    </div>
@endsection
