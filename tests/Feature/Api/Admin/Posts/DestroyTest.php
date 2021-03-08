<?php

namespace Tests\Feature\Api\Admin\Posts;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Admin\Posts\Concerns\HasPost;
use Tests\Feature\Admin\Posts\Concerns\HasUser;
use Tests\Feature\Api\Concerns\HasAuthorizationTests;
use Tests\TestCase;

class DestroyTest extends TestCase
{
    use RefreshDatabase;
    use HasAuthorizationTests;
    use HasUser;
    use HasPost;

    private Post $post;
    private string $method = 'DELETE';

    protected function setUp(): void
    {
        parent::setUp();
        $this->post = $this->model();
    }

    public function testItCanDeleteAPost()
    {
        $user = $this->user();
        app()->setLocale('en');

        $response = $this->actingAs($user, 'api')->json($this->method, $this->route());

        $response->assertJson(['message' => trans('posts.messages.deleted')]);
    }

    private function route(): string
    {
        return route('api.admin.posts.destroy', $this->post);
    }
}
