<?php


namespace Tests\Feature\Admin\Posts\Concerns;


use App\Models\Post;

trait HasPost
{
    protected function model(): Post
    {
        $post = Post::factory()->make();
        $post->saveQuietly();

        return $post;
    }

    protected function models()
    {
        Post::withoutEvents(function (){
            Post::factory()->count(40)->create();
        });
    }

    protected function collectionName(): string
    {
        return 'posts';
    }

    protected function modelName(): string
    {
        return 'post';
    }
}
