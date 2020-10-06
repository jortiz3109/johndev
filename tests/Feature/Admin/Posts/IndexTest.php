<?php

namespace Tests\Feature\Admin\Posts;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Admin\AdminIndexTestCase;

class IndexTest extends AdminIndexTestCase
{
    use RefreshDatabase;

    public const ROUTE_NAME = 'admin.posts.index';
    public const VIEW_NAME = 'admin.posts.index';
    public const COLLECTION_NAME = 'posts';
    public const MODEL_NAME = Post::class;
}
