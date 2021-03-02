<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Posts\StoreOrUpdatePostAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StorePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Models\Post;
use App\View\ViewModels\Admin\Posts\CreateViewModel;
use App\View\ViewModels\Admin\Posts\EditViewModel;
use Illuminate\Http\RedirectResponse;
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

    public function create(CreateViewModel $viewModel): View
    {
        return view('admin.posts.create', $viewModel->toArray());
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $post = StoreOrUpdatePostAction::execute($request->validated());
        return redirect()->route('admin.posts.show', $post);
    }

    public function edit(Post $post): View
    {
        return view('admin.posts.edit', (new EditViewModel($post))->toArray());
    }

    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $post = StoreOrUpdatePostAction::execute($request->validated(), $post);
        return redirect()->route('admin.posts.show', $post);
    }
}
