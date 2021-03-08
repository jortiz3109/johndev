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
use Illuminate\Http\Response;

class PostController extends Controller
{
    private const SHOW_ROUTE = 'admin.posts.show';

    public function index(): Response
    {
        $posts = Post::orderBy('id', 'desc')->paginate();

        return response()->view('admin.posts.index', compact('posts'));
    }

    public function show(Post $post): Response
    {
        $post->load('categories', 'author:id,user_id', 'author.user:id,name,email');
        return response()->view(self::SHOW_ROUTE, compact('post'));
    }

    public function create(CreateViewModel $viewModel): Response
    {
        return response()->view('admin.posts.create', $viewModel->toArray());
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $post = StoreOrUpdatePostAction::execute($request->validated());
        return redirect()->route(self::SHOW_ROUTE, $post);
    }

    public function edit(Post $post): Response
    {
        return response()->view('admin.posts.edit', (new EditViewModel($post))->toArray());
    }

    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $post = StoreOrUpdatePostAction::execute($request->validated(), $post);
        return redirect()->route(self::SHOW_ROUTE, $post);
    }
}
