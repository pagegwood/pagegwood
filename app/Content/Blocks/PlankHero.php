<?php

namespace App\Content\Blocks;

use App\Content\Blocks\Traits\FlexibleImages;

class PlankHero extends BlockBuilder
{
    use FlexibleImages;

    public $view = 'blocks.hero';
}
