<?php

namespace App\Content\Blocks\Traits;

use WPFluent\PostType\Image as BaseImage;

trait Image
{
    public function getImageAttribute()
    {
        if (is_numeric($this->image_id)) return BaseImage::query()->find((int)$this->image_id);
    }

    public function getFirstImageAttribute()
    {
        if (is_numeric($this->first_image_id)) return BaseImage::query()->find((int)$this->first_image_id);
    }

    public function getSecondImageAttribute()
    {
        if (is_numeric($this->second_image_id)) return BaseImage::query()->find((int)$this->second_image_id);
    }

    public function hasImage()
    {
        return !is_null($this->image);
    }
}
