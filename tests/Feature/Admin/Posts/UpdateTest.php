<?php

namespace Tests\Feature\Admin\Posts;

use Tests\Feature\Admin\AdminUpdateTestCase;
use Tests\Feature\Admin\Posts\Concerns\HasPost;
use Tests\Feature\Admin\Posts\Concerns\HasUser;

class UpdateTest extends AdminUpdateTestCase
{
    use HasPost;
    use HasUser;

    public function testItUpdatesAPost()
    {
        $user = $this->user();
        $data = [
            'title' => 'Test post',
            'summary' => 'Test summary',
            'body' => '<p>Test body</p>',
        ];

        $response = $this->actingAs($user)->put($this->route(), $data);
        $this->model->refresh();

        $response->assertRedirect(route('admin.posts.show', $this->model));
        $response->assertSessionHasNoErrors();
        $this->assertSame($data['title'], $this->model->title);
        $this->assertSame($data['summary'], $this->model->summary);
        $this->assertSame($data['body'], $this->model->body);
    }

    protected function route(): string
    {
        return route('admin.posts.update', $this->model);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = $this->model();
    }
}
