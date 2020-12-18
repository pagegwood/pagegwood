<?php

namespace Wood\PostTypes;

use Illuminate\Support\Collection;

use TimberImage;
use TimberTerm;

class Project extends Post
{

	protected static $postType = 'wood_project';


  public function __construct($id = null)
  {
    //Make sure timber post does not grab post ID from loop
    parent::__construct($id);


    //TODO: automate.
    $this->desktop_featured_image = $this->getDesktopFeaturedImage();
    $this->tags = $this->getTags();
    $this->website_url = $this->getWebsiteUrl();
    $this->preview_image = $this->getPreviewImage();
    $this->launch_date = $this->getLaunchDate();
    $this->mobile_featured_image = $this->getMobileFeaturedImage();
    $this->logo_image = $this->getLogoImage();
  }

  public function getTags()
  {
    if (!$this->tags) {

      $tags = $this->get_terms('wood_project_tag');

      if (is_array($tags) && count($tags)) {
          $this->tags = $tags;
      }
    }
    return $this->tags;
  }

  public function getPreviewImage()
  {
  	$id = get_field('wood_preview_image_id', $this->ID);

    if (is_int($id)) {
        return new TimberImage($id);
    }
  }

  public function getDesktopFeaturedImage()
  {
    $id = get_field('wood_featured_image_desktop_id', $this->ID);

    if (is_int($id)) {
        return new TimberImage($id);
    }
  }

  public function getMobileFeaturedImage()
  {
    $id = get_field('wood_featured_image_mobile_id', $this->ID);

    if (is_int($id)) {
        return new TimberImage($id);
    }
  }


  public function getLogoImage()
  {
  	$id = get_field('wood_logo_image_id', $this->ID);

    if (is_int($id)) {
        return new TimberImage($id);
    }
  }


  public function getWebsiteUrl()
  {
    $text = get_field('wood_project_url', $this->ID);

    if (!empty($text)) {
        return $text;
    }
  }

  public function getLaunchDate()
  {
    $text = get_field('wood_project_launch_date', $this->ID);

    if (!empty($text)) {
      return $text;
    }
  }
}
