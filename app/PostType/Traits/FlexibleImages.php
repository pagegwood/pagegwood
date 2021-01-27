<?php

namespace App\PostType\Traits;

use WPFluent\PostType\Image;

trait FlexibleImages
{
    public function getDesktopImageAttribute()
    {
        $id = get_field('wood_desktop_image_id', $this->ID);

        if (is_numeric($id)) {
            return Image::query()->find((int) $id);
        }

    }

    public function hasDesktopImage()
    {

        return !is_null($this->desktop_image);
    }

    public function hasMobileImage()
    {

        return !is_null($this->mobile_image);
    }

    public function getMobileImageAttribute()
    {

        $id = get_field('wood_mobile_image_id', $this->ID);

        if (is_numeric($id)) {
            return Image::query()->find((int) $id);
        }

    }
}
