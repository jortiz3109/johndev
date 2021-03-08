<?php

namespace Tests\Feature\Admin\Authors;

use Tests\Feature\Admin\AdminCreateTestCase;
use Tests\Feature\Admin\Authors\Concerns\HasAuthor;
use Tests\Feature\Admin\Authors\Concerns\HasUser;

class CreateTest extends AdminCreateTestCase
{
    use HasAuthor;
    use HasUser;

    protected function viewName(): string
    {
        return 'admin.authors.create';
    }

    protected function route(): string
    {
        return route('admin.authors.create');
    }

    public function fieldsProvider(): array
    {
        return [
            ['name'], ['email'], ['about']
        ];
    }
}
