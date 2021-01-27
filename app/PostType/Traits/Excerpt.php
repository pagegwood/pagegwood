<?php

namespace App\PostType\Traits;

trait Excerpt
{
    public function getExcerptAttribute()
    {
        $text = get_field('wood_excerpt', $this->ID);

        if (!empty($text)) {
            return $text;
        }
    }

    public function hasExcerpt()
    {
        return !is_null($this->excerpt);
    }
}
