<?php

namespace App\Http\Resources\Api\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    public static $wrap = 'posts';

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return $this->collection->map(function ($post) {
            return [
                'id' => $post->getRouteKey(),
                'title' => $post->title,
                'author' => $post->author,
                'created_at' => $post->created_at->toDateTimeString(),
                'featured' => $post->isFeatured(),
                'published' => $post->isPublished(),
                'visits' => $post->visits_count,
            ];
        })->toArray();
    }
}
