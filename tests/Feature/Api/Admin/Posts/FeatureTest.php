<?php

namespace Tests\Feature\Api\Admin\Posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Api\Concerns\HasAuthorizationTests;
use Tests\TestCase;

class FeatureTest extends TestCase
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

    public function testItCanFeatureAPost()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'api')->json($this->method, $this->route());

        $response->assertJson([
            'message' => trans('posts.messages.featured'),
            'data' => [
                'featured' => true,
            ]
        ]);
    }

    public function testItCanUnFeatureAPost()
    {
        $user = User::factory()->create();
        $this->post->toggleFeatured();
        $this->post->save();

        $response = $this->actingAs($user, 'api')->json($this->method, $this->route());

        $response->assertJson([
            'message' => trans('posts.messages.not-featured'),
            'data' => [
                'featured' => false,
            ]
        ]);
    }

    private function route(): string
    {
        return route('api.admin.posts.toggle-featured', $this->post);
    }
}
