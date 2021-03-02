<?php

namespace Tests\Feature\Admin\Posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\Feature\Admin\Concerns\HasAuthorizationTests;
use Tests\Feature\Admin\Concerns\HasValidationTests;
use Tests\Feature\Admin\Posts\Concerns\HasValidationProviders;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;
    use HasValidationTests;
    use HasAuthorizationTests;
    use WithFaker;
    use HasValidationProviders;

    private Post $post;
    private string $method = 'put';

    protected function setUp(): void
    {
        parent::setUp();
        $this->post = Post::factory()->create();
    }

    public function testItUpdatesAPost()
    {
        $user = User::factory()->create();
        $data = [
            'title' => $this->faker->words(2, true),
            'summary' => $this->faker->words(3, true),
            'body' => $this->faker->paragraphs(3, true),
        ];

        $response = $this->actingAs($user)->put($this->route(), $data);
        $this->post->refresh();

        $response->assertRedirect(route('admin.posts.show', $this->post));
        $response->assertSessionHasNoErrors();
        $this->assertSame($data['title'], $this->post->title);
        $this->assertSame($data['summary'], $this->post->summary);
        $this->assertSame($data['body'], $this->post->body);

    }

    protected function route(): string
    {
        return route('admin.posts.update', $this->post);
    }
}
