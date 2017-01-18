<?php

namespace Wood\PostTypes;
use TimberImage;

class Project extends Post
{

	protected static $postType = 'wood_project';


  public function previewImage()
  {
  	$id = get_field('wood_preview_image_id', $this->ID);

    if (is_int($id)) {
        return new TimberImage($id);
    }
  }

  public function hasPreviewImage()
  {
    return !is_null($this->preview_image);
  }

  public function logoImage()
  {
  	$id = get_field('wood_logo_image_id', $this->ID);

    if (is_int($id)) {
        return new TimberImage($id);
    }
  }

  public function hasLogoImage()
  {
    return !is_null($this->logo_image);
  }
}
