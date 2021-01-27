<?php

namespace App\Content\Blocks;

use App\Content\Blocks\Traits\FlexibleImages;

class PlankContent extends BlockBuilder
{
    use FlexibleImages;

    public $view = 'planks/interior-hero.twig';

    public $style = 'planks/interior-hero_style.twig';
}
