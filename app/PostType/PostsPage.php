<?php

namespace App\PostType;

use App\PostType\Traits\FlexibleImages;

class PostsPage extends Page
{
    use FlexibleImages;

    public function newQuery()
    {
        return parent::newQuery()->post((int)get_option('page_for_posts'))->first();
    }

    public function getHeadingAttribute()
    {
        $text = get_field('wood_heading', $this->ID);

        if (!empty($text)) {
            return $text;
        }
    }

    public function getSubheadingAttribute()
    {
        $text = get_field('wood_subheading', $this->ID);

        if (!empty($text)) {
            return $text;
        }
    }
}
