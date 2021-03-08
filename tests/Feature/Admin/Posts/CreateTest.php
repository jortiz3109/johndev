<?php

namespace Tests\Feature\Admin\Posts;

use Tests\Feature\Admin\AdminCreateTestCase;
use Tests\Feature\Admin\Posts\Concerns\HasFieldsProvider;
use Tests\Feature\Admin\Posts\Concerns\HasPost;
use Tests\Feature\Admin\Posts\Concerns\HasUser;

class CreateTest extends AdminCreateTestCase
{
    use HasPost;
    use HasUser;
    use HasFieldsProvider;

    protected function route(): string
    {
        return route('admin.posts.create');
    }

    protected function viewName(): string
    {
        return 'admin.posts.create';
    }
}
