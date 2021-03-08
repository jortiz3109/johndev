<?php

namespace Tests\Feature\Api\Admin\Posts;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Admin\Posts\Concerns\HasPost;
use Tests\Feature\Admin\Posts\Concerns\HasUser;
use Tests\Feature\Api\Concerns\HasAuthorizationTests;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    use HasAuthorizationTests;
    use HasPost;
    use HasUser;

    private string $method = 'GET';

    public function testItCanListPosts()
    {
        $post = $this->model();
        $user = $this->user();

        $response = $this->actingAs($user, 'api')->getJson($this->route());

        $response->assertJsonPath('posts.0.id', $post->slug);
        $response->assertJsonPath('posts.0.title', $post->title);
        $response->assertJsonPath('posts.0.author.user.name', $post->author->user->name);
        $response->assertJsonPath('posts.0.author.user.email', $post->author->user->email);
        $response->assertJsonPath('posts.0.created_at', $post->created_at->toDateTimeString());
        $response->assertJsonPath('posts.0.featured', $post->isFeatured());
        $response->assertJsonPath('posts.0.published', $post->isPublished());
    }

    protected function route(array $params = []): string
    {
        return route('api.admin.posts.index', $params);
    }

    public function testItCanPaginatePosts()
    {
        Post::withoutEvents(function () {
            Post::factory()->count(45)->create();
        });

        $user = $this->user();

        $response = $this->actingAs($user, 'api')->getJson($this->route(['page' => 2]));

        $response->assertJsonPath('meta.current_page', 2);
        $response->assertJsonPath('meta.last_page', 3);
        $response->assertJsonPath('meta.from', 16);
        $response->assertJsonPath('meta.to', 30);
        $response->assertJsonPath('meta.total', 45);
    }
}
