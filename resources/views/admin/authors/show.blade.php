@extends('layouts.admin')
@section('admin-content-top')
    <x-module-main-bar title="{{ $author->name }}">
        <x-slot name="right">
            <div class="level-item">
                <b-button
                    tag="a"
                    type="is-primary"
                    class="is-fullwidth"
                    icon-left="chevron-left"
                    icon-pack="fas"
                    href="{{ route('admin.authors.index') }}">
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
                    href="{{ route('admin.authors.edit', $author) }}">
                    @lang('common.actions.edit')
                </b-button>
            </div>
        </x-slot>
    </x-module-main-bar>
@endsection
@section('admin-content')
    <div class="media">
        <div class="media-left">
            <figure class="image is-64x64 is-rounded">
                <img src="{{ $author->avatar }}" alt="@lang('author.avatar_for', ['name', $author->name])">
            </figure>
        </div>
        <div class="media-content">
            <div class="content">
                <blockquote>
                    <strong>{{ $author->name }}</strong> <small>{{ $author->email }}</small>
                    <br>
                    {{ $author->about }}
                </blockquote>
            </div>
        </div>
    </div>
    <hr>
    <h2 class="title">@lang('authors.latest_posts')</h2>
    @if($author->posts_count)
    <table class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>@lang('posts.title')</th>
                <th>@lang('common.created_at')</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>
                    <a href="{{ route('admin.posts.show', $post) }}">{{ $post->title }}</a>
                </td>
                <td>{{ $post->created_at->toDateString() }}</td>
                <td class="has-text-right">@include('admin.authors.show.posts.actions', ['post' => $post])</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <div class="notification">
            @lang('authors.messages.posts.empty')
        </div>
    @endif
@endsection
