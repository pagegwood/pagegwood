<?php

namespace Wood\Planks;

use Wood\PostTypes\Post;

class PlankPosts {

	public $view = 'planks/posts.twig';

	public function __construct($properties)
  {
  	$keys = array_keys($properties);

  	array_walk($keys,
  		function (&$value, $omit, $prefix) {
    	$value = str_replace($prefix, '', $value);
		}, 'plank_');

  	$remappedArray = array_combine($keys, $properties);

    foreach($remappedArray AS $key => $value)
    {

        $this->$key = $value;
    }
  }
}
