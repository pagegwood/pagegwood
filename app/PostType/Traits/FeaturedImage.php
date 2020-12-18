<?php

namespace App\PostType\Traits;

use WPFluent\PostType\Image;

trait FeaturedImage
{
    public function getFeaturedImageAttribute()
    {
        $id = get_field('sw_featured_image_id', $this->ID);

        if (!empty($id)) {
            return Image::query()->find((int)$id);
        }
    }

    public function hasFeaturedImage()
    {
        return !is_null($this->featured_image);
    }
}
