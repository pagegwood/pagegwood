<?php

namespace App\Content\Blocks\Fields;

use App\Content\Blocks\Traits\FeaturedImage;
use App\Content\Blocks\Traits\Image;

use Illuminate\Support\Collection;

class RepeaterField extends \WPFluent\Support\Fluent
{
    use FeaturedImage,
        Image;

    protected $fieldPrefix = 'wood_field_repeater_';


    public function getItemsAttribute()
    {
        $value = is_array($this->repeater_array) ? $this->repeater_array : [];

        return Collection::make($value)->map(function ($value) {

            return self::make($value);
        });
    }

    public function hasItems()
    {
        return !is_null($this->items);
    }
}
