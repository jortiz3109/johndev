@extends('layouts.app')
@push('main-navbar-end')
    <div class="navbar-item">
        <a href="{{ config('site.links.github') }}" class="button is-white">
            <span class="icon is-small"><i class="fab fa-github"></i></span>
        </a>
    </div>
    <div class="navbar-item">
        <a href="{{ config('site.links.twitter') }}" class="button is-white">
            <span class="icon is-small"><i class="fab fa-twitter"></i></span>
        </a>
    </div>
    <div class="navbar-item">
        <a href="{{ url('') }}" class="button is-info">
            <span class="icon is-small"><i class="fas fa-envelope"></i></span>
            <span>{{ __('site.navbar.contact') }}</span>
        </a>
    </div>
@endpush
@section('content')
    <section class="hero is-light is-medium is-bold">
        <div class="hero-body">
            <div class="container is-max-desktop">
                <h2 class="title is-1">
                    {{ __('¡Welcome!') }}
                </h2>
                <p class="subtitle">
                    I'm John Edisson Ortiz, lead developer at Evertec Medellín.
                </p>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <h2 class="title is-2">Latest blog posts</h2>

        </div>
    </section>
@endsection
