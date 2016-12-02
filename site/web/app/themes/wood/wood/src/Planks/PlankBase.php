<?php

namespace Wood\Planks;

class PlankBase {


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
