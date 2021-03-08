<?php

namespace Tests\Feature\Api\Admin\Posts;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Admin\Posts\Concerns\HasPost;
use Tests\Feature\Admin\Posts\Concerns\HasUser;
use Tests\Feature\Api\Concerns\HasAuthorizationTests;
use Tests\TestCase;

class PublishTest extends TestCase
{
    use RefreshDatabase;
    use HasAuthorizationTests;
    use HasPost;
    use HasUser;

    private Post $post;
    private string $method = 'POST';

    public function testItCanPublishAPost()
    {
        $user = $this->user();

        $response = $this->actingAs($user, 'api')->json($this->method, $this->route());

        $response->assertJson([
            'message' => trans('posts.messages.published'),
            'data' => [
                'published' => true,
            ]
        ]);
    }

    private function route(): string
    {
        return route('api.admin.posts.toggle-published', $this->post);
    }

    public function testItCanUnPublishAPost()
    {
        $user = $this->user();
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

    protected function setUp(): void
    {
        parent::setUp();

        $this->post = $this->model();
    }
}
