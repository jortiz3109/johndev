<article class="media">
    <div class="media-left">
        <figure class="image is-64x64 is-rounded">
            <img src="{{ $post->author->avatar }}" alt="@lang('author.avatar_for', ['name', $post->author->name])">
        </figure>
    </div>
    <div class="media-content">
        <div class="content">
            <p>
                <strong>{{ $post->author->name }}</strong> <small>{{ $post->author->email }}</small>
                <br>
                {{ $post->author->about }}
            </p>
        </div>
    </div>
</article>
