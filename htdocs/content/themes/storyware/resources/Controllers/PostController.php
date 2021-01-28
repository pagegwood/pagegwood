<?php

namespace Theme\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\View;

use App\PostType\Post;

use App\PostType\PostsPage;

class PostController extends BaseController
{
    public function showArchive($post, $query = null)
    {
        $posts = null;

        if (!empty($query)) {

            $posts = Post::hydrate($query->posts);
        }


        $page = PostsPage::query();

        $isSearch = false;

        $title = get_the_archive_title();

        if ($query->is_posts_page == true) {

            $title = $page->heading;
        }

        return View::make('archive-posts', compact('page', 'posts', 'title'));
    }
}
