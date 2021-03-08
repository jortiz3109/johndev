<?php

namespace Tests\Feature\Admin\Authors\Concerns;

use App\Models\Author;

trait HasAuthor
{
    protected function models()
    {
        Author::factory()->count(40)->create();
    }

    protected function model(): Author
    {
        return Author::factory()->create();
    }

    protected function collectionName(): string
    {
        return 'authors';
    }

    protected function modelName(): string
    {
        return 'post';
    }
}
