<?php

namespace Tests\Feature\Api\Admin\Posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Api\Concerns\HasAuthorizationTests;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    use HasAuthorizationTests;

    private string $method = 'GET';

    protected function route(array $params = []): string
    {
        return route('api.admin.posts.index', $params);
    }

    public function testItCanListPosts()
    {
        $post = Post::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'api')->getJson($this->route());

        $response->assertJsonPath('posts.0.id', $post->slug);
        $response->assertJsonPath('posts.0.title', $post->title);
        $response->assertJsonPath('posts.0.author.name', $post->author->name);
        $response->assertJsonPath('posts.0.author.email', $post->author->email);
        $response->assertJsonPath('posts.0.created_at', $post->created_at->toDateTimeString());
        $response->assertJsonPath('posts.0.featured', $post->isFeatured());
        $response->assertJsonPath('posts.0.published', $post->isPublished());
    }

    public function testItCanPaginatePosts()
    {
        Post::factory()->count(45)->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'api')->getJson($this->route(['page' => 2]));

        $response->assertJsonPath('meta.current_page', 2);
        $response->assertJsonPath('meta.last_page', 3);
        $response->assertJsonPath('meta.from', 16);
        $response->assertJsonPath('meta.to', 30);
        $response->assertJsonPath('meta.total', 45);
    }
}
