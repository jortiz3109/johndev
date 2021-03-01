@extends('layouts.admin')
@push('head')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/monokai.min.css">
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
    @include('admin.posts.show.__meta')
    @include('admin.posts.show.__categories', ['categories' => $post->categories])
    <div class="columns">
        <div class="column">
            <article>
                <div class="content">
                    {!! $post->body !!}
                </div>
            </article>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endpush
