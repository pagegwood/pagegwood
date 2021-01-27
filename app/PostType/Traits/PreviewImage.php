<?php

namespace App\PostType\Traits;

use WPFluent\PostType\Image;

trait PreviewImage
{
    public function getPreviewImageAttribute()
    {
        $id = get_field('wood_preview_image_id', $this->ID);

        if (!empty($id)) {
            return Image::query()->find((int)$id);
        }
    }

    public function hasPreviewImage()
    {
        return !is_null($this->preview_image);
    }
}
