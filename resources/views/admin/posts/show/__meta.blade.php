<article class="message">
    <div class="message-body">
        <div class="content">
            <p class="has-border-bottom is-border-dashed">
                <b-tooltip label="@lang('posts.author')">
                            <span class="mr-2">
                                <b-icon size="is-small" pack="fas" icon="user" ></b-icon>
                            </span>
                </b-tooltip>
                <span>{{ $post->author->name }}</span>
            </p>
            <p class="has-border-bottom is-border-dashed">
                <b-tooltip label="@lang('common.email')">
                            <span class="mr-2">
                                <b-icon size="is-small" pack="fas" icon="envelope" ></b-icon>
                            </span>
                </b-tooltip>
                <span>{{ $post->author->email }}</span></p>
            <p class="has-border-bottom is-border-dashed">
                <b-tooltip label="@lang('common.created_at')">
                            <span class="mr-2">
                                <b-icon size="is-small" pack="fas" icon="calendar" ></b-icon>
                            </span>
                </b-tooltip>
                <span>{{ $post->created_at->toDateString() }}</span>
            </p>
            @if($post->isPublished())
                <p class="has-border-bottom is-border-dashed">
                    <b-tooltip label="@lang('posts.published_at')">
                                <span class="mr-2">
                                    <b-icon size="is-small" pack="fas" icon="check" ></b-icon>
                                </span>
                    </b-tooltip>
                    <span>{{ $post->created_at->toDateString() }}</span>
                </p>
            @endif
            @if($post->isFeatured())
                <p class="has-border-bottom is-border-dashed">
                    <b-tooltip label="@lang('posts.featured_at')">
                                <span class="mr-2">
                                    <b-icon size="is-small" pack="fas" icon="star" ></b-icon>
                                </span>
                    </b-tooltip>
                    <span>{{ $post->featured_at->toDateString() }}</span>
                </p>
            @endif
        </div>
    </div>
</article>
