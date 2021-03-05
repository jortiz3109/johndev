@extends('layouts.site')
@section('site-content')
    @foreach($posts as $post)
        <div class="box">
            <article class="media">
                <div class="media-left">
                    <em class="fas fa-laptop fa-2x"></em>
                </div>
                <div class="media-content">
                    <div class="content">
                        <p class="title is-size-3">
                            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                        </p>
                        <p class="subtitle is-size-6">
                            <strong>{{ $post->author->name }}</strong> {{ $post->author->email }}{{ $post->relativeCreationDate() }}
                        </p>
                        <p>{{ $post->summary }}</p>
                    </div>
                </div>
            </article>
        </div>
    @endforeach
@endsection
