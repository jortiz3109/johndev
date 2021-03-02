@extends('layouts.site')
@section('site-content')
    <div class="container is-max-desktop">
        @foreach($posts as $post)
            <div class="box">
                <article class="media">
                    <div class="media-left">
                        <i class="fas fa-laptop fa-2x"></i>
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
    </div>
@endsection
