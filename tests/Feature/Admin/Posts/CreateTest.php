<?php

namespace Tests\Feature\Admin\Posts;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Admin\Concerns\HasAuthorizationTests;
use Tests\Feature\Admin\Concerns\HasResponseTests;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;
    use HasResponseTests;
    use HasAuthorizationTests;


    protected function route(): string
    {
        return route('admin.posts.create');
    }

    protected function viewName(): string
    {
        return 'admin.posts.create';
    }
}
