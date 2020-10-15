<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::paginate();

        return view('admin.posts.index', compact('posts'));
    }

    public function show(Post $post): View
    {
        $post->load('categories', 'author:id,name,email');
        return view('admin.posts.show', compact('post'));
    }

    public function create(): View
    {
        return view('admin.posts.create');
    }

    public function edit(Post $post): View
    {
        $post = [
            'id' => $post->getRouteKey(),
            'title' => $post->title,
            'body' => $post->body,
            'published' => $post->isPublished(),
            'featured' => $post->isFeatured(),
        ];
        return view('admin.posts.edit', compact('post'));
    }
}
