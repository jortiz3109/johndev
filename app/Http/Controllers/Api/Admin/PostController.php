<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Admin\PostCollection;
use App\Models\Post;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ResourceCollection
     */
    public function index(): ResourceCollection
    {
        return new PostCollection(Post::with('author:id,name,email')->withCount('visits')->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
        return response()->json(['message' => 'Post deleted successfully']);
    }

    public function toggleFeatured(Post $post): JsonResponse
    {
        $post->toggleFeatured();
        $post->save();

        $response = [
            'message' => $post->isFeatured() ? trans('Post marked as featured') : trans('Post marked as not featured'),
            'featured' => $post->isFeatured(),
        ];

        return response()->json($response);
    }

    public function togglePublished(Post $post): JsonResponse
    {
        $post->togglePublished();
        $post->save();

        $response = [
            'message' => $post->isPublished() ? trans('Post published') : trans('Post unpublished'),
            'published' => $post->isPublished(),
        ];

        return response()->json($response);
    }
}
