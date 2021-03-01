@extends('layouts.main')
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
    <section class="hero is-dark is-large">
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
                <div class="field is-grouped is-grouped-multiline" style="justify-content: center">
                    <div class="control">
                        <div class="tags is-large has-addons">
                            <span class="tag is-white">
                                <b-icon size="is-small" pack="fab" icon="github"></b-icon>
                            </span>
                            <span class="tag is-white"><a href="https://github.com/jortiz3109" target="_blank">jortiz3109</a></span>
                        </div>
                    </div>

                    <div class="control">
                        <div class="tags has-addons">
                            <span class="tag is-white">
                                <b-icon size="is-small" pack="fab" icon="linkedin"></b-icon>
                            </span>
                            <span class="tag is-white"><a href="https://www.linkedin.com/in/don-chiche/" target="_blank">John Edisson</a></span>
                        </div>
                    </div>

                    <div class="control">
                        <div class="tags has-addons">
                            <span class="tag is-white">
                                <b-icon size="is-small" pack="fab" icon="twitter"></b-icon>
                            </span>
                            <span class="tag is-white"><a href="https://twitter.com/chiche" target="_blank">@chiche</a></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
