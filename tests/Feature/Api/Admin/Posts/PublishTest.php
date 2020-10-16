<?php

namespace Tests\Feature\Api\Admin\Posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Api\Concerns\HasAuthorizationTests;
use Tests\TestCase;

class PublishTest extends TestCase
{
    use RefreshDatabase;
    use HasAuthorizationTests;

    private Post $post;
    private string $method = 'POST';

    protected function setUp(): void
    {
        parent::setUp();

        $this->post = Post::factory()->create();
    }

    public function testItCanPublishAPost()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'api')->json($this->method, $this->route());

        $response->assertJson([
            'message' => trans('posts.messages.published'),
            'data' => [
                'published' => true,
            ]
        ]);
    }

    public function testItCanUnPublishAPost()
    {
        $user = User::factory()->create();
        $this->post->togglePublished();
        $this->post->save();

        $response = $this->actingAs($user, 'api')->json($this->method, $this->route());

        $response->assertJson([
            'message' => trans('posts.messages.not-published'),
            'data' => [
                'published' => false,
            ]
        ]);
    }

    private function route(): string
    {
        return route('api.admin.posts.toggle-published', $this->post);
    }
}
