@extends('layouts.site')
@push('head')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/styles/atom-one-dark.min.css">
@endpush
@section('site-content-top')
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
@endsection
@section('site-content')
    <div class="container is-max-desktop has-background-white">
        <div class="content p-5">
            @include('posts.show.meta')
            @include('posts.show.categories', ['categories' => $post->categories])
            <article>
                {{ $post->summary }}
                <ht></ht>
                {!! $post->body !!}
            </article>
        </div>
    </div>
    </section>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/highlight.min.js" integrity="sha512-zol3kFQ5tnYhL7PzGt0LnllHHVWRGt2bTCIywDiScVvLIlaDOVJ6sPdJTVi0m3rA660RT+yZxkkRzMbb1L8Zkw==" crossorigin="anonymous"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endpush
