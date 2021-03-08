<?php

namespace Tests\Feature\Admin\Posts;

use Tests\Feature\Admin\AdminIndexTestCase;
use Tests\Feature\Admin\Posts\Concerns\HasPost;
use Tests\Feature\Admin\Posts\Concerns\HasUser;

class IndexTest extends AdminIndexTestCase
{
    use HasPost;
    use HasUser;

    protected function viewName(): string
    {
        return 'admin.posts.index';
    }

    protected function route(): string
    {
        return route('admin.posts.index');
    }
}
