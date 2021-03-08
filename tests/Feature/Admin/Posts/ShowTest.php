<?php

namespace Tests\Feature\Admin\Posts;

use Tests\Feature\Admin\AdminShowTestCase;
use Tests\Feature\Admin\Posts\Concerns\HasPost;
use Tests\Feature\Admin\Posts\Concerns\HasUser;

class ShowTest extends AdminShowTestCase
{
    use HasPost;
    use HasUser;

    public function testItShowPostData()
    {
        $user = $this->user();
        $response = $this->actingAs($user)->get($this->route());
        $response->assertOk();
    }

    protected function route(): string
    {
        $post = $this->model();
        return route('admin.posts.show', $post);
    }

    protected function viewName(): string
    {
        return 'admin.posts.show';
    }
}
