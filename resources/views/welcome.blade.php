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
@endsection
@push('footer-top')
    <div class="hero is-white">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-3">
                        <div class="content">
                            <a href="{{ url('') }}" class="is-size-5 has-text-grey-dark">Home</a>
                        </div>
                        <div class="content">
                            <a href="{{ url('blog') }}" class="is-block is-size-4 has-text-grey-dark">Blog</a>
                            <a href="{{ url('blog') }}" class="is-block is-size-6 has-text-grey-dark">First article</a>
                            <a href="{{ url('blog') }}" class="is-block is-size-6 has-text-grey-dark">Second article</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
