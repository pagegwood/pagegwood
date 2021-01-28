<?php

namespace App\Content;

class BlockFactory
{
    public static function  make($class, $properties)
    {
        $class =  new $class($properties);

        return $class;
    }

    public function content($properties)
    {
        return static::make('App\Content\Blocks\PlankContent', $properties);
    }

    public function cta($properties)
    {
        return static::make('App\Content\Blocks\PlankCta', $properties);
    }

    public function floatingContent($properties)
    {
        return static::make('App\Content\Blocks\PlankFloatingContent', $properties);
    }

    public function gallery($properties)
    {
        return static::make('App\Content\Blocks\PlankGallery', $properties);
    }

    public function hero($properties)
    {
        return static::make('App\Content\Blocks\PlankHero', $properties);
    }

    public function instagram($properties)
    {
        return static::make('App\Content\Blocks\PlankInstagram', $properties);
    }

    public function interiorHero($properties)
    {
        return static::make('App\Content\Blocks\PlankInteriorHero', $properties);
    }

    public function posts($properties)
    {
        return static::make('App\Content\Blocks\PlankPosts', $properties);
    }

    public function projects($properties)
    {
        return static::make('App\Content\Blocks\PlankProjects', $properties);
    }
}
