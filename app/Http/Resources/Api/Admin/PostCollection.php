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
    public function toArray($request)
    {
        return $this->collection->map(function ($post) {
            return [
                'id' => $post->id,
                'title' => $post->title,
                'author' => $post->author,
                'summary' => $post->summary,
                'created_at' => $post->created_at,
                'featured' => $post->isFeatured(),
                'published' => $post->isPublished(),
                'visits' => $post->visits_count,
            ];
        })->toArray();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function with($request)
    {
        return [
            'meta' => [
                'texts' => [
                    'delete' => [
                        'button' => trans('common.delete')
                    ],
                ],
            ],
        ];
    }
}
