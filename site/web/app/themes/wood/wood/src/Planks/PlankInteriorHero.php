<?php

namespace Wood\Planks;

use Wood\Planks\PlankBase;
use TimberImage;

class PlankInteriorHero extends PlankBase
{

	public $view = 'planks/interior-hero.twig';

  public $style = 'planks/interior-hero_style.twig';

  public function desktop_image()
  {
    if (!is_null($this->desktop_image_id)){

      return $this->desktop_image = new TimberImage($this->desktop_image_id);
    }
  }

  public function hasDesktopImage()
  {
    return !is_null($this->desktop_image);
  }

  public function mobile_image()
  {
    if (!is_null($this->mobile_image_id)){

      return $this->mobile_image = new TimberImage($this->mobile_image_id);
    }
  }

  public function hasMobileImage()
  {
    return !is_null($this->mobile_image);
  }

}
