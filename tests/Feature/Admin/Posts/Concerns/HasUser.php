<?php


namespace Tests\Feature\Admin\Posts\Concerns;


use App\Models\Author;
use App\Models\User;

trait HasUser
{
    protected function user(): User
    {
        $author = Author::factory()->create();
        return $author->user;
    }
}
