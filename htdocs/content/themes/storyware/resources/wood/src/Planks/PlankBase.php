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

    $this->css_class =  $this->getClassName();
  }

  public function getClassName()
  {
    $plank = $this->acf_fc_layout;

    if(!is_null($plank)) {
      $plank = str_replace('plank_', '', $plank);

      return $plank;
    }
  }
}
