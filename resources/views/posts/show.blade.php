@extends('layouts.site')
@push('head')
    <link rel="stylesheet" href="{{ asset('enlighter/enlighterjs.min.css') }}" />
@endpush
@section('site-content')
    <div class="box">
        <x-module-main-bar title="{{ $post->title }}">
            <x-slot name="right">
                <div class="level-item">
                    <b-button
                        tag="a"
                        type="is-primary"
                        class="is-fullwidth"
                        icon-left="chevron-left"
                        icon-pack="fas"
                        href="{{ route('posts.index') }}">
                        @lang('common.actions.back')
                    </b-button>
                </div>
            </x-slot>
        </x-module-main-bar>
        <div class="content">
            @include('posts.show.meta')
            @include('posts.show.categories', ['categories' => $post->categories])
            <article>
                <p>{{ $post->summary }}</p>
                {!! $post->body !!}
            </article>
        </div>
    </div>
    </section>
@endsection
@push('scripts-bottom')
    <script type="text/javascript" src="{{ asset('enlighter/enlighterjs.min.js') }}"></script>

    <script type="text/javascript">
        EnlighterJS.init('pre', 'code', {
            theme: 'droide',
            textOverflow: 'scroll',
            indent : 4
        });
    </script>
@endpush
