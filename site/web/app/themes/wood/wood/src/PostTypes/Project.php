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

  public function desktopFeaturedImage()
  {
    $id = get_field('wood_featured_image_desktop_id', $this->ID);

    if (is_int($id)) {
        return new TimberImage($id);
    }
  }

  public function mobileFeaturedImage()
  {
    $id = get_field('wood_featured_image_mobile_id', $this->ID);

    if (is_int($id)) {
        return new TimberImage($id);
    }
  }


  public function logoImage()
  {
  	$id = get_field('wood_logo_image_id', $this->ID);

    if (is_int($id)) {
        return new TimberImage($id);
    }
  }


  public function projectUrl()
  {
    $text = get_field('wood_project_url', $this->ID);

    if (!empty($text)) {
        return $text;
    }
  }

  public function projectLaunchDate()
  {
    $text = get_field('wood_project_launch_date', $this->ID);

    if (!empty($text)) {
      return $text;
    }
  }
}
