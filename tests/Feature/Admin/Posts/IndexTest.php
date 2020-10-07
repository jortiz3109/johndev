<?php

namespace Tests\Feature\Admin\Posts;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Admin\AdminIndexTestCase;

class IndexTest extends AdminIndexTestCase
{
    use RefreshDatabase;

    protected function route(): string
    {
        return 'admin.posts.index';
    }

    protected function view(): string
    {
        return 'admin.posts.index';
    }

    protected function collection(): string
    {
        return 'posts';
    }

    protected function model(): string
    {
        return Post::class;
    }
}
