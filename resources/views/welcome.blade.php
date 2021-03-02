@extends('layouts.main')
@section('content')
    <section class="hero is-dark is-medium">
        <div class="hero-body">
            <div class="container is-max-desktop has-text-centered" style="justify-content: center">
                <figure class="image is-128x128 has-shadow is-inline-block mb-6">
                    <img src="{{ asset('images/profile-pic.jpg') }}" class="is-rounded">
                </figure>
                <p class="title">
                    John Edisson Ortiz
                </p>
                <p class="subtitle">
                    @lang('Lead developer at Evertec Medellín.')
                </p>
                <b-button
                    tag="a"
                    type="is-primary"
                    icon-left="book-reader"
                    icon-pack="fas"
                    href="{{ route('posts.index') }}">
                    Blog
                </b-button>
            </div>
        </div>
        <div class="hero-foot">
            <nav class="tabs is-centered">
                <div class="container is-max-desktop">
                    <ul>
                        @foreach(config('site.social') as $network => $data)
                        <li>
                            <a href="{{ $data['link'] }}">
                                <span class="icon is-small"><i class="fab fa-{{ $network }}" aria-hidden="true"></i></span>
                                <span>{{ $data['text'] }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </div>
    </section>
    </section>
@endsection
