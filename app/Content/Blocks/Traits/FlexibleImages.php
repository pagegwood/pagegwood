<?php

namespace App\Content\Blocks\Traits;

use WPFluent\PostType\Image;

trait FlexibleImages
{
  public function getDesktopImageAttribute()
  {

    if (is_numeric($this->desktop_image_id)) return Image::query()->find((int)$this->desktop_image_id);
  }

  public function hasDesktopImage()
  {

    return !is_null($this->desktop_image);
  }

  public function hasMobileImage ()
  {

    return !is_null($this->mobile_image);
  }

  public function getMobileImageAttribute()
  {

    if (is_numeric($this->mobile_image_id)) return Image::query()->find((int)$this->mobile_image_id);
  }
}
