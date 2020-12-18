<?php

namespace App\Content\Blocks;

use WPFluent\Support\Fluent;

class BlockBuilder extends Fluent
{
    public $view;

    protected $fieldPrefix = 'sw_field_';

    public function getCssClassAttribute()
    {
        return substr($this->view, strrpos($this->view, '.') + 1);
    }

    public function getPaddingClassAttribute()
    {

        $string = 'Block--topPadding' . $this->top_padding;

        $string .= ' Block--bottomPadding' . $this->bottom_padding;

        return $string;
    }
}
