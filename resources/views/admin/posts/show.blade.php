@extends('layouts.admin')
@section('admin-content-top')
    <x-module-main-bar title="{{ $post->title }}">
        <div class="level-item">
            <b-button
                tag="a"
                type="is-primary"
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
                icon-left="edit"
                icon-pack="fas"
                href="{{ route('admin.posts.edit', $post) }}">
            </b-button>
        </div>
    </x-module-main-bar>
@endsection
@section('admin-content')
    @include('admin.posts.show.__categories', ['categories' => $post->categories])
    <div class="columns">
        <div class="column">
            <div class="content">
                <p>{{ $post->summary }}</p>
            </div>
            <hr>
            <article>
                <div class="content">
                    {!! $post->body !!}
                </div>
            </article>
        </div>
        <div class="column is-narrow-desktop">
            @include('admin.posts.show.__meta')
        </div>
    </div>
@endsection
