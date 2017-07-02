<?php

namespace Wood\PostTypes;

use Illuminate\Support\Collection;
use Wood\Planks\Planker as Planker;

class PlankPage extends Page
{

	protected static $postType = 'page';


  public function planks(){

    $planks = get_field('wood_planks', $this->ID);

    if(is_array($planks)){
      foreach ($planks as &$plank) {

        $plank = Planker::createPlank($plank);

      }
      return Collection::make($planks);
    }
  }
}
