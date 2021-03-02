<?php

namespace Tests\Feature\Admin\Posts;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Admin\Concerns\HasAuthorizationTests;
use Tests\Feature\Admin\Concerns\HasResponseTests;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;
    use HasAuthorizationTests;
    use HasResponseTests;

    protected function viewName(): string
    {
        return 'admin.posts.index';
    }

    protected function route(): string
    {
        return route('admin.posts.index');
    }
}
