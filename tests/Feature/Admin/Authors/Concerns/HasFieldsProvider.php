<?php

namespace Tests\Feature\Admin\Authors\Concerns;

trait HasFieldsProvider
{
    public function fieldsProvider(): array
    {
        return [
            ['name'], ['email'], ['about']
        ];
    }
}
