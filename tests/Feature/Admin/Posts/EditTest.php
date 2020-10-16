<?php

namespace Tests\Feature\Admin\Posts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Admin\Concerns\HasResponseTests;
use Tests\Feature\Admin\Concerns\HasAuthorizationTests;
use Tests\TestCase;

class EditTest extends TestCase
{
    use RefreshDatabase;
    use HasResponseTests;
    use HasAuthorizationTests;

    private Model $post;

    protected function setUp(): void
    {
        parent::setUp();
        $this->post = Post::factory()->create();
    }

    protected function route(): string
    {
        return route('admin.posts.edit', $this->post);
    }

    protected function viewName(): string
    {
        return 'admin.posts.edit';
    }
}
