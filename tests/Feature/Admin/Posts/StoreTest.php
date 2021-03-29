<?php

namespace Tests\Feature\Admin\Posts;

use App\Models\Post;
use Tests\Feature\Admin\AdminStoreTestCase;
use Tests\Feature\Admin\Posts\Concerns\HasPost;
use Tests\Feature\Admin\Posts\Concerns\HasUser;
use Tests\Feature\Admin\Posts\Concerns\HasValidationProviders;

class StoreTest extends AdminStoreTestCase
{
    use HasPost;
    use HasUser;
    use HasValidationProviders;

    public function testItStoresAPost()
    {
        $user = $this->user();
        $data = [
            'title' => $this->faker->words(2, true),
            'summary' => $this->faker->words(3, true),
            'body' => $this->faker->paragraphs(3, true),
        ];

        $response = $this->actingAs($user)->post($this->route(), $data);
        $post = Post::first();

        $response->assertRedirect(route('admin.posts.show', $post));
    }

    protected function route(): string
    {
        return route('admin.posts.store');
    }

    public function testItStoresTheAuthorOfAPost()
    {
        $user = $this->user();
        $data = [
            'title' => $this->faker->words(2, true),
            'summary' => $this->faker->words(3, true),
            'body' => $this->faker->paragraphs(3, true),
        ];

        $this->actingAs($user)->post($this->route(), $data);
        $post = Post::first();

        $this->assertSame($user->author->id, $post->author_id);
    }

    public function testItCannotStoreANotUniquePost()
    {
        $user = $this->user();
        $post = $this->model();
        $data = [
            'title' => $post->title,
            'summary' => $this->faker->words(3, true),
            'body' => $this->faker->paragraphs(3, true),
        ];

        $response = $this->actingAs($user)->post($this->route(), $data);

        $response->assertSessionHasErrors('title');
    }
}
