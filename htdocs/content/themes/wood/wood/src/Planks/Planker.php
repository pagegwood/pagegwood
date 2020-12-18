<?php

namespace Wood\Planks;

class Planker {

  public static function make($class, $properties)
  {
      $class =  new $class($properties);

      return $class;
  }

  public static function createPlank($plank)
  {
	  if (array_key_exists('acf_fc_layout', $plank)) {

      $plankType = $plank['acf_fc_layout'];

      $plankType = camel_case($plankType);

      $plankType = ucfirst($plankType);

      $classPrefix = 'Wood\\Planks\\';

      $plankClass = $classPrefix . $plankType;

      if(class_exists($plankClass)){
      	return $plank = self::make($plankClass, $plank);
      }

      else{
      	/// fail gracefully
      }
	  }
	}
}
