@extends('layouts.app')
@guest()
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
            <span>@lang('Contact me')</span>
        </a>
    </div>
@endpush
@endguest
@section('content')
    <section class="hero is-white is-medium">
        <div class="hero-body">
            <div class="container is-max-desktop">
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-128x128">
                            <img src="{{ asset('images/logo.svg') }}">
                        </p>
                    </figure>
                    <div class="media-content">
                        <h2 class="title is-1">
                            {{ __('¡Welcome!') }}
                        </h2>
                        <p class="subtitle">
                            I'm John Edisson Ortiz, lead developer at Evertec Medellín.
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>
@endsection
@push('footer-top')
    <section class="section has-background-dark-light">
        <div class="container">
            <div class="content">
                <h1 class="title">@lang('Latest posts')</h1>
                @foreach($posts as $post)
                    <div class="box">
                        <article class="media">
                            <div class="media-left">
                                <i class="fas fa-fw fa-cog fa-5x"></i>
                            </div>
                            <div class="media-content">
                                <div class="content">
                                    <h2 class="title">
                                        <a href="{{ route('admin.posts.show', $post) }}">{{ $post->title }}</a>
                                    </h2>
                                    {{ $post->summary() }}
                                </div>
                                <div class="tags">
                                        <span class="tag is-info">
                                            <i class="fas fa-fw fa-envelope"></i> {{ $post->author->email }}
                                        </span>
                                    <span class="tag is-info">
                                            <i class="fas fa-fw fa-calendar"></i> {{ $post->created_at->toDateString() }}
                                        </span>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endpush
