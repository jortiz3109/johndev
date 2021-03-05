@extends('layouts.main')
@section('content-top')
    <div class="container">
        @include('main-navbar')
        @yield('site-content-top')
    </div>
@endsection
@section('content')
    <section class="section has-background-dark">
        <div class="container">
            @yield('site-content')
        </div>
    </section>
@endsection
