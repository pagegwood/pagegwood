<?php

namespace Wood\PostTypes;

use TimberImage;

class PostsPage extends Post
{
    protected static $postType = 'page';

    public function __construct($id = null)
	  {
	    //Make sure timber post does not grab post ID from loop
	    parent::__construct($id);


	    //TODO: automate.
	    $this->desktop_image = $this->getDesktopImage();
	    $this->mobile_image = $this->getMobileImage();
	    $this->heading = $this->getHeading();
	    $this->subheading = $this->getSubheading();
	  }

	public function getHeading()
  {
    $text = get_field('wood_heading', $this->ID);

    if (!empty($text)) {
      return $text;
    }
  }

  public function getSubheading()
  {
    $text = get_field('wood_subheading', $this->ID);

    if (!empty($text)) {
      return $text;
    }
  }

  public function getDesktopImage()
  {
  	$id = get_field('wood_desktop_image_id', $this->ID);

    if (is_int($id)) {
        return new TimberImage($id);
    }
  }

  public function getMobileImage()
  {
  	$id = get_field('wood_mobile_image_id', $this->ID);

    if (is_int($id)) {
        return new TimberImage($id);
    }
  }

}



