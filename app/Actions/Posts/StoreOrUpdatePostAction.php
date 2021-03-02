<?php

namespace App\Actions\Posts;

use App\Helpers\PostBodyHelper;
use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class StoreOrUpdatePostAction
{
    /**
     * @param array $data
     * @param Post|null $post
     * @return Post|null
     */
    public static function execute(array $data, Post $post = null): ?Post
    {
        $post = $post ?? new Post();

        $post->title = Arr::get($data, 'title');
        $post->slug = Str::slug(Arr::get($data, 'title'));
        $post->body = PostBodyHelper::prepare(Arr::get($data, 'body'));
        $post->summary = Arr::get($data, 'summary');
        $post->published_at = Arr::has($data, 'published') ? now() : null;
        $post->featured_at = Arr::has($data, 'featured') ? now() : null;

        $post->save();

        return $post;
    }
}
