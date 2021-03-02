@extends('layouts.admin')
@push('head')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/styles/atom-one-dark.min.css">
@endpush
@section('admin-content-top')
    <x-module-main-bar title="{{ $post->title }}">
        <x-slot name="right">
            <div class="level-item">
                <b-button
                    tag="a"
                    type="is-primary"
                    class="is-fullwidth"
                    icon-left="chevron-left"
                    icon-pack="fas"
                    href="{{ route('admin.posts.index') }}">
                    @lang('common.actions.back')
                </b-button>
            </div>
            <div class="level-item">
                <b-button
                    tag="a"
                    type="is-primary"
                    class="is-fullwidth"
                    icon-left="edit"
                    icon-pack="fas"
                    href="{{ route('admin.posts.edit', $post) }}">
                    @lang('common.actions.edit')
                </b-button>
            </div>
        </x-slot>
    </x-module-main-bar>
@endsection
@section('admin-content')
    @include('posts.show.meta')
    @include('posts.show.categories', ['categories' => $post->categories])
    <div class="columns">
        <div class="column">
            <article>
                {!! $post->body !!}
            </article>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/highlight.min.js" integrity="sha512-zol3kFQ5tnYhL7PzGt0LnllHHVWRGt2bTCIywDiScVvLIlaDOVJ6sPdJTVi0m3rA660RT+yZxkkRzMbb1L8Zkw==" crossorigin="anonymous"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endpush
