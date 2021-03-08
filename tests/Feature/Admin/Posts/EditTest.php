<?php

namespace Tests\Feature\Admin\Posts;

use Tests\Feature\Admin\AdminEditTestCase;
use Tests\Feature\Admin\Posts\Concerns\HasFieldsProvider;
use Tests\Feature\Admin\Posts\Concerns\HasPost;
use Tests\Feature\Admin\Posts\Concerns\HasUser;

class EditTest extends AdminEditTestCase
{
    use HasUser;
    use HasPost;
    use HasFieldsProvider;

    protected function route(): string
    {
        $post = $this->model();
        return route('admin.posts.edit', $post);
    }

    protected function viewName(): string
    {
        return 'admin.posts.edit';
    }
}
