<?php

namespace Tests\Feature\Api\Admin\Posts;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Admin\Posts\Concerns\HasPost;
use Tests\Feature\Admin\Posts\Concerns\HasUser;
use Tests\Feature\Api\Concerns\HasAuthorizationTests;
use Tests\TestCase;

class FeatureTest extends TestCase
{
    use RefreshDatabase;
    use HasAuthorizationTests;
    use HasPost;
    use HasUser;

    private Post $post;
    private string $method = 'POST';

    public function testItCanFeatureAPost()
    {
        $user = $this->user();

        $response = $this->actingAs($user, 'api')->json($this->method, $this->route());

        $response->assertJson([
            'message' => trans('posts.messages.featured'),
            'data' => [
                'featured' => true,
            ]
        ]);
    }

    private function route(): string
    {
        return route('api.admin.posts.toggle-featured', $this->post);
    }

    public function testItCanUnFeatureAPost()
    {
        $user = $this->user();
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

    protected function setUp(): void
    {
        parent::setUp();

        $this->post = $this->model();
    }
}
