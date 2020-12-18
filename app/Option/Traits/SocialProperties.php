<?php

namespace App\Option\Traits;

trait SocialProperties
{
    public function getSocialPropertiesAttribute()
    {

        $array = get_field('sw_social_properties', $this->ID);

        if (!empty($array)) {
            return $array;
        }
    }

    public function hasSocialPropertiesAttribute()
    {
        return !is_null($this->social_properties);
    }
}
