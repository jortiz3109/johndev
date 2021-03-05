<?php

namespace Tests\Feature\Api\Admin\Posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Api\Concerns\HasAuthorizationTests;
use Tests\TestCase;

class DestroyTest extends TestCase
{
    use RefreshDatabase;
    use HasAuthorizationTests;

    private Post $post;
    private string $method = 'DELETE';

    protected function setUp(): void
    {
        parent::setUp();

        $this->post = Post::factory()->create();
    }

    private function route(): string
    {
        return route('api.admin.posts.destroy', $this->post);
    }

    public function testItCanDeleteAPost()
    {
        $user = User::factory()->create();
        app()->setLocale('en');

        $response = $this->actingAs($user, 'api')->json($this->method, $this->route());

        $response->assertJson(['message' => trans('posts.messages.deleted')]);
    }
}
