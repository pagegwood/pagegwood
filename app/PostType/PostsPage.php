<?php

namespace App\PostType;

class PostsPage extends Page
{
    public function newQuery()
    {
        return parent::newQuery()->post((int)get_option('page_for_posts'))->first();
    }
}
