<?php

namespace App\Http\Controllers\Api\Admin;

use App\Actions\Posts\StoreOrUpdatePostAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StorePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Http\Resources\Api\Admin\PostCollection;
use App\Http\Responses\ApiResponse;
use App\Models\Post;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ResourceCollection
     */
    public function index(): ResourceCollection
    {
        return new PostCollection(
            Post::select(['id', 'title', 'slug', 'created_at', 'featured_at', 'published_at', 'user_id'])
                ->with('author:id,name,email')
                ->withCount('visits')
                ->orderBy('id', 'DESC')
                ->paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @return JsonResponse
     */
    public function store(StorePostRequest $request): JsonResponse
    {
        $post = StoreOrUpdatePostAction::execute($request->validated());

        return ApiResponse::dispatch(trans('posts.messages.created'), [
            'links' => [
                'show' => route('admin.posts.show', $post)
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return JsonResponse
     */
    public function update(UpdatePostRequest $request, Post $post): JsonResponse
    {
        $post = StoreOrUpdatePostAction::execute($request->validated(), $post);

        return ApiResponse::dispatch(trans('posts.messages.updated'), [
            'links' => [
                'show' => route('admin.posts.show', $post)
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Post $post): JsonResponse
    {
        $post->delete();
        return ApiResponse::dispatch(trans('Post deleted'));
    }

    public function toggleFeatured(Post $post): JsonResponse
    {
        $post->toggleFeatured();
        $post->save();

        $message = $post->isFeatured() ? trans('posts.messages.featured') : trans('posts.messages.not-featured');

        return ApiResponse::dispatch($message, ['featured' => $post->isFeatured()]);
    }

    public function togglePublished(Post $post): JsonResponse
    {
        $post->togglePublished();
        $post->save();

        $message = $post->isPublished() ? trans('posts.messages.published') : trans('posts.messages.not-published');

        return ApiResponse::dispatch($message, ['published' => $post->isPublished()]);
    }
}
