<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate();

        return response()->view('admin.posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->load('categories', 'author:id,name,email');
        return view('admin.posts.show', compact('post'));
    }
}
