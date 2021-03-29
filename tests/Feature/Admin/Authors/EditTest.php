<?php

namespace Tests\Feature\Admin\Authors;

use Tests\Feature\Admin\AdminEditTestCase;
use Tests\Feature\Admin\Authors\Concerns\HasAuthor;
use Tests\Feature\Admin\Authors\Concerns\HasFieldsProvider;
use Tests\Feature\Admin\Authors\Concerns\HasUser;

class EditTest extends AdminEditTestCase
{
    use HasAuthor;
    use HasUser;
    use HasFieldsProvider;


    protected function viewName(): string
    {
        return 'admin.authors.edit';
    }

    protected function route(): string
    {
        $author = $this->model();
        return route('admin.authors.edit', $author);
    }
}
