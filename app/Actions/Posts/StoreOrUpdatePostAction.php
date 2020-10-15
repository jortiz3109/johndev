<?php

namespace App\Actions\Posts;

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class StoreOrUpdatePostAction
{
    public static function execute(array $data, Post $post = null): ?Post
    {
        $post = $post ?? new Post;

        $post->title = Arr::get($data, 'title');
        $post->slug = Str::slug(Arr::get($data, 'title'));
        $post->summary = Arr::get($data, 'summary');
        $post->body = Arr::get($data, 'body');
        $post->published_at = Arr::get($data, 'published', false) ? now() : null;
        $post->featured_at = Arr::get($data, 'featured', false) ? now() : null;

        $post->save();

        return $post;
    }
}
