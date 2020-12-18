<?php

namespace App\Content\Blocks;

use App\Content\Blocks\Traits\CatTagPosts;

class Posts extends BlockBuilder
{
    use CatTagPosts;

    public $view = 'blocks.posts';
}
