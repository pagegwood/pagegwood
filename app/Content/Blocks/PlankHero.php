<?php

namespace App\Content\Blocks;

use App\Content\Blocks\Traits\FlexibleImages;

class PlankHero extends BlockBuilder
{
    use FlexibleImages;

    public $view = 'planks/hero.twig';

    public $style = 'planks/hero_style.twig';
}
