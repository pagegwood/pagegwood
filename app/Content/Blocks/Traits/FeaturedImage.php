<?php

namespace App\Content\Blocks\Traits;

use WPFluent\PostType\Image as BaseImage;

trait FeaturedImage
{
    public function getFeaturedImageAttribute()
    {
        if (is_numeric($this->featured_image_id)) return BaseImage::query()->find((int)$this->featured_image_id);
    }

    public function hasFeaturedImage()
    {
        return !is_null($this->featured_image);
    }
}
