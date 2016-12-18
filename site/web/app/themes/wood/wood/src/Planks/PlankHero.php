<?php

namespace Wood\Planks;

use Wood\Planks\PlankBase;
use TimberImage;

class PlankHero extends PlankBase
{

	public $view = 'planks/hero.twig';

  public $style = 'planks/hero_style.twig';

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

}
