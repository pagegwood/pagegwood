<?php

namespace Wood\Planks;

use Wood\Planks\PlankBase;
use TimberImage;

class PlankFloatingContent extends PlankBase
{

	public $view = 'planks/floating-content.twig';

  public function image()
  {
    if (!is_null($this->image_id)){

      return $this->image = new TimberImage($this->image_id);
    }
  }

  public function hasImage()
  {
    return !is_null($this->image);
  }

  public function mediaSize()
  {

    switch ($this->content_size) {
      case '1of2':
      $result = '1of2';
      break;

      case '1of3':
      $result = '2of3';
      break;

      case '2of3':
      $result = '1of3';
      break;

      case '3of4':
      $result = '1of4';
      break;

      default:
      $result = '1of2';
      break;
    }

    return $this->media_size = $result;
  }
}
