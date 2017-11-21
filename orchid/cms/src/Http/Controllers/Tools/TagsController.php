<?php

namespace Orchid\CMS\Http\Controllers\Tools;

use Orchid\CMS\Core\Models\Post;
use Orchid\Platform\Http\Controllers\Controller;

class TagsController extends Controller
{

    /**
     * @param null $tag
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($tag = null)
    {
        if (is_null($tag)) {
            $tags = Post::allTags()->orderBy('count', 'desc')->limit(10)->get();
        } else {
            $tags = Post::allTags()->orderBy('count', 'desc')->where('name', 'like', '%' . $tag . '%')->limit(10)->get();
        }

        $tags->transform(function ($item, $key) {
            return  [
                'id' => $item['name'],
                'text' => $item['name'],
                'count' => $item['count']
            ];
        });

        return response()->json($tags);
    }
}
