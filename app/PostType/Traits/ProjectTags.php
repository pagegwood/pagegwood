<?php

namespace App\PostType\Traits;

use App\Taxonomy\ProjectTag as Tag;

use Illuminate\Support\Collection;

trait ProjectTags
{
    public function getTagsAttribute()
    {
        return Tag::query()->post($this->ID)->get();
    }

    public function hasTags()
    {
        return !is_null($this->tags);
    }

    public function getFilterTagsAttribute()
    {
        if ($this->hasTags()) {

            return $this->tags->implode('slug', ',');
        }
    }
}
