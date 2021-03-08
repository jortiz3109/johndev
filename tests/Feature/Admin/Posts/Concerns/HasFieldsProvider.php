<?php

namespace Tests\Feature\Admin\Posts\Concerns;

trait HasFieldsProvider
{
    public function fieldsProvider(): array
    {
        return [
            ['title'], ['body'], ['summary']
        ];
    }
}
