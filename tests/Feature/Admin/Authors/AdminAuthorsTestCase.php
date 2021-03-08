<?php


namespace Tests\Feature\Admin\Authors;

use App\Models\Author;
use App\Models\User;
use Tests\TestCase;

class AdminAuthorsTestCase extends TestCase
{
    protected function model(): Author
    {
        return Author::factory()->create();
    }

    protected function user(): User
    {
        return User::factory()->create();
    }

    protected function modelName(): string
    {
        return 'author';
    }
}
