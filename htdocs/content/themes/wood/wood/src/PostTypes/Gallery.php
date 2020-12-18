<?php

namespace Wood\PostTypes;

use Illuminate\Support\Collection;

use TimberImage;

class Gallery extends Post
{

	protected static $postType = 'wood_gallery';

  public function __construct($id = null)
  {
    //Make sure timber post does not grab post ID from loop
    parent::__construct($id);

    $this->images = $this->getImages();
  }

  public function getImages() {

    $images = get_field('wood_gallery', $this->ID);

    if (is_array($images)) {
      foreach ($images as &$image) {

        $image = new TimberImage($image['id']);

      }
      return Collection::make($images);
    }

  }
}
