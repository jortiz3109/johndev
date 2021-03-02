<?php

namespace Tests\Feature\Admin\Posts\Concerns;

use Illuminate\Support\Str;

trait HasValidationProviders
{
    public function validationDataProvider(): array
    {
        return [
            'Test title rule required' => ['title', ''],
            'Test title rule min' => ['title', 'asd'],
            'Test title rule max' => ['title', Str::random(121)],
            'Test body rule required' => ['body', ''],
            'Test summary rule required' => ['summary', ''],
            'Test summary rule min' => ['summary', 'abc'],
            'Test summary rule max' => ['summary', Str::random(101)],
            'Test published rule filled' => ['published', ''],
            'Test featured rule filled' => ['featured', ''],
        ];
    }
}
