<?php

namespace Tests\Feature\Admin\Posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Admin\Concerns\HasValidationTests;
use Tests\Feature\Admin\Concerns\HasAuthorizationTests;
use Tests\Feature\Admin\Posts\Concerns\HasValidationProviders;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    use HasAuthorizationTests;
    use HasValidationTests;
    use HasValidationProviders;

    private string $method = 'post';

    public function testItStoresAPost()
    {
        $user = User::factory()->create();
        $data = [
            'title' => $this->faker->words(2, true),
            'summary' => $this->faker->words(3, true),
            'body' => $this->faker->paragraphs(3, true),
        ];

        $response = $this->actingAs($user)->post($this->route(), $data);
        $post = Post::first();

        $response->assertRedirect(route('admin.posts.show', $post));
    }

    public function testItStoresTheAuthorOfAPost()
    {
        $user = User::factory()->create();
        $data = [
            'title' => $this->faker->words(2, true),
            'summary' => $this->faker->words(3, true),
            'body' => $this->faker->paragraphs(3, true),
        ];

        $this->actingAs($user)->post($this->route(), $data);
        $post = Post::first();

        $this->assertSame($user->id, $post->author->id);
    }

    public function testItCannotStoreANotUniquePost()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();
        $data = [
            'title' => $post->title,
            'summary' => $this->faker->words(3, true),
            'body' => $this->faker->paragraphs(3, true),
        ];

        $response = $this->actingAs($user)->post($this->route(), $data);

        $response->assertSessionHasErrors('title');

    }

    protected function route(): string
    {
        return route('admin.posts.store');
    }
}
