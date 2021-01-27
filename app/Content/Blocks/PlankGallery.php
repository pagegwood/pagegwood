<?php

namespace App\Content\Blocks;

use App\PostType\Gallery;

class PlankGallery extends BlockBuilder
{
    public $view = 'planks/gallery.twig';

    public function getGalleryAttribute()
    {
        return Gallery::query()->find($this->gallery_id);
    }

    public function hasGallery()
    {
        return !is_null($this->gallery);
    }
}
