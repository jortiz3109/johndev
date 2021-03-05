<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{

    public function index(): View
    {
        $posts = Post::orderBy('id', 'desc')
            ->published()
            ->with('author')
            ->paginate();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post): View
    {
        return view('posts.show', compact('post'));
    }
}
