<?php

namespace Theme\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\View;

use App\PostType\Post;

class PostController extends BaseController
{
    public function showArchive($post, $query = null)
    {
        $posts = null;

        if (!empty($query)) {

            $posts = Post::hydrate($query->posts);
        }

        $isSearch = false;

        $title = get_the_archive_title();

        return View::make('archive-posts', compact('posts', 'title'));
    }
}
