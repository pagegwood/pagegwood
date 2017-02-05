<?php

namespace Wood\PostTypes;

use Illuminate\Support\Collection;
use Wood\Planks\Planker as Planker;

class PlankPage extends Page
{

	protected static $postType = 'page';


  public function __construct($id = null)
  {
    //Make sure timber post does not grab post ID from loop
    parent::__construct($id);

    $this->planks = $this->getPlanks();
  }

  public function getPlanks(){
    $planks = get_field('wood_planks', $this->ID);

    if(is_array($planks)){
      foreach ($planks as &$plank) {

        $plank = Planker::createPlank($plank);

      }
      return $context['planks'] = Collection::make($planks);
    }
  }
}
