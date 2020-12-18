<?php

namespace App\Content\Blocks;

use App\Content\Blocks\Traits\FlexibleImages;

class Hero extends BlockBuilder
{
    use FlexibleImages;

    public $view = 'blocks.hero';
}
