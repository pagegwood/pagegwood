<?php

namespace Wood\Planks;

class Planker {

  public static function make($class, $properties)
  {
      $class =  new $class($properties);

      return $class;
  }
}
