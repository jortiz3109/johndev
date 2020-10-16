<?php

namespace Tests\Feature\Api\Admin\Posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\Feature\Api\Concerns\HasAuthorizationTests;
use Tests\Feature\Api\Concerns\HasValidationTests;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;
    use HasValidationTests;
    use HasAuthorizationTests;
    use WithFaker;

    private Post $post;
    private string $method = 'PUT';

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
            'body' => $this->faker->paragraphs(3, true),
        ];

        $response = $this->actingAs($user, 'api')->json($this->method, $this->route(), $data);
        $this->post->refresh();

        $response->assertOk();
        $response->assertJson([
            'message' => trans('posts.messages.updated'),
            'data' => [
                'links' => [
                    'show' => route('admin.posts.show', $this->post),
                ],
            ],
        ]);
    }

    public function validationDataProvider(): array
    {
        return [
            'Test title rule required' => ['title', ''],
            'Test title rule min' => ['title', 'asd'],
            'Test title rule max' => ['title', Str::random(121)],
            'Test body rule required' => ['body', ''],
        ];
    }

    protected function route(): string
    {
        return route('api.admin.posts.update', $this->post);
    }
}
