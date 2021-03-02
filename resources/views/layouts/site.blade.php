@extends('layouts.app')
@section('content-top')
    @include('main-navbar')
    @yield('site-content-top')
@endsection
@section('content')
    <section class="section has-background-dark">
        @yield('site-content')
    </section>
@endsection
