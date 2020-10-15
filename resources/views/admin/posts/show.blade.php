@extends('layouts.admin')
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
                    icon-left="edit"
                    icon-pack="fas"
                    href="{{ route('admin.posts.edit', $post) }}">
                </b-button>
            </div>
        </x-slot>
    </x-module-main-bar>
@endsection
@section('admin-content')
    @include('admin.posts.show.__categories', ['categories' => $post->categories])
    <div class="columns">
        <div class="column">
            <article>
                <div class="content">
                    {!! $post->parseBody() !!}
                </div>
            </article>
        </div>
        <div class="column is-narrow-desktop">
            @include('admin.posts.show.__meta')
        </div>
    </div>
@endsection
