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

class StoreTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    use HasAuthorizationTests;
    use HasValidationTests;

    private string $method = 'POST';

    public function testItStoresAPost()
    {
        $user = User::factory()->create();
        $data = [
            'title' => $this->faker->words(2, true),
            'body' => $this->faker->paragraphs(3, true),
        ];

        $response = $this->actingAs($user, 'api')->postJson($this->route(), $data);
        $post = Post::first();

        $response->assertOk();
        $response->assertJson([
            'message' => trans('posts.messages.created'),
            'data' => [
                'links' => [
                    'show' => route('admin.posts.show', $post),
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
        return route('api.admin.posts.store');
    }
}
