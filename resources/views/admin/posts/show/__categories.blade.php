<div class="tags">
    @foreach($categories as $category)
        <span class="tag is-primary is-light">{{ $category->name }}</span>
    @endforeach
</div>
