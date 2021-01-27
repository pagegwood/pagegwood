<?php

namespace App\Content\Blocks;

use WPFluent\PostType\Image;

class PlankFloatingContent extends BlockBuilder
{

    public $view = 'planks/floating-content.twig';

    public function getImageAttribute()
    {
        if (!is_null($this->image_id)){

            return Image::query()->find((int)$this->image_id);
        }
    }

    public function hasImage()
    {
        return !is_null($this->image);
    }

    public function getMediaSizeAttribute()
    {
        switch ($this->content_size) {
            case '1of2':
            $result = '1of2';
            break;

            case '1of3':
            $result = '2of3';
            break;

            case '2of3':
            $result = '1of3';
            break;

            case '3of4':
            $result = '1of4';
            break;

            default:
            $result = '1of2';
            break;
        }

        return $result;
    }
}
