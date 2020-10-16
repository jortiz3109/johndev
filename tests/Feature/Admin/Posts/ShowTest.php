<?php

namespace Tests\Feature\Admin\Posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Admin\Concerns\HasAuthorizationTests;
use Tests\Feature\Admin\Concerns\HasResponseTests;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use HasAuthorizationTests;
    use HasResponseTests;
    use RefreshDatabase;

    private Model $post;

    protected function setUp(): void
    {
        parent::setUp();
        $this->post = Post::factory()->create();
    }

    private function route(): string
    {
        return route('admin.posts.show', $this->post);
    }

    private function viewName(): string
    {
        return 'admin.posts.show';
    }

    public function testItShowPostData()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get($this->route());
        $response->assertOk();
    }
}
