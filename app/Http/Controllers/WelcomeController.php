<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function show(): View
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(10)->get();

        return view('welcome', compact('posts'));
    }
}
