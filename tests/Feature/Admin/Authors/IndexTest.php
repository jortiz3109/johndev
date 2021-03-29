<?php

namespace Tests\Feature\Admin\Authors;

use Tests\Feature\Admin\AdminIndexTestCase;
use Tests\Feature\Admin\Authors\Concerns\HasAuthor;
use Tests\Feature\Admin\Posts\Concerns\HasUser;

class IndexTest extends AdminIndexTestCase
{
    use HasUser;
    use HasAuthor;

    protected function viewName(): string
    {
        return 'admin.authors.index';
    }

    protected function route(): string
    {
        return route('admin.authors.index');
    }

    public function fieldsProvider(): array
    {
        return [['name'], ['email']];
    }
}
