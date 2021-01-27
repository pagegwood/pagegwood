<?php

namespace App\Content\Blocks;

use WPFluent\Support\Fluent;

class BlockBuilder extends Fluent
{
    public $view;

    protected $fieldPrefix = 'plank_';

    public function getCssClassAttribute()
    {
        $plank = $this->acf_fc_layout;

        if (!is_null($plank)) {

            $plank = str_replace('plank_', '', $plank);

            return $plank;
        }
    }
}
