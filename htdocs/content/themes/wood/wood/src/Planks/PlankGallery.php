<?php

namespace Wood\Planks;

use Wood\Planks\PlankBase;
use Wood\PostTypes\Gallery;

class PlankGallery extends PlankBase
{

	public $view = 'planks/gallery.twig';

  public function gallery ()
  {
    return $this->gallery = new Gallery($this->gallery_id);
  }

  public function hasGallery()
  {
    return !is_null($this->gallery);
  }

}
