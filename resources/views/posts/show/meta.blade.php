<div class="field is-grouped is-grouped-multiline">
    <div class="control">
        <span class="tags has-addons">
            <span class="tag">
                <b-icon size="is-small" pack="fas" icon="user"></b-icon>
            </span>
            <span class="tag">{{ $post->author->user->name }}</span>
        </span>
    </div>

    <div class="control">
        <span class="tags has-addons">
            <span class="tag">
                <b-icon size="is-small" pack="fas" icon="calendar"></b-icon>
            </span>
            <span class="tag">{{ $post->created_at->toDateString() }}</span>
        </span>
    </div>

    @if($post->isPublished())
        <div class="control">
            <span class="tags has-addons">
                <span class="tag">
                    <b-icon size="is-small" pack="fas" icon="check"></b-icon>
                </span>
                <span class="tag">{{ $post->published_at->toDateString() }}</span>
            </span>
        </div>
    @endif
    @if($post->isFeatured())
        <div class="control">
            <span class="tags has-addons">
                <span class="tag">
                    <b-icon size="is-small" pack="fas" icon="star"></b-icon>
                </span>
                <span class="tag">{{ $post->featured_at->toDateString() }}</span>
            </span>
        </div>
    @endif
</div>
