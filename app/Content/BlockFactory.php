<?php

namespace App\Content;

class BlockFactory
{
    public static function make($class, $properties)
    {
        $class =  new $class($properties);

        return $class;
    }

    public function plankContent($properties)
    {
        return static::make('App\Content\Blocks\PlankContent', $properties);
    }

    public function plankCta($properties)
    {
        return static::make('App\Content\Blocks\PlankCta', $properties);
    }

    public function plankFloatingContent($properties)
    {
        return static::make('App\Content\Blocks\PlankFloatingContent', $properties);
    }

    public function plankGallery($properties)
    {
        return static::make('App\Content\Blocks\PlankGallery', $properties);
    }

    public function plankHero($properties)
    {
        return static::make('App\Content\Blocks\PlankHero', $properties);
    }

    public function plankInstagram($properties)
    {
        return static::make('App\Content\Blocks\PlankInstagram', $properties);
    }

    public function plankInteriorHero($properties)
    {
        return static::make('App\Content\Blocks\PlankInteriorHero', $properties);
    }

    public function plankPosts($properties)
    {
        return static::make('App\Content\Blocks\PlankPosts', $properties);
    }

    public function plankProjects($properties)
    {
        return static::make('App\Content\Blocks\plankProjects', $properties);
    }
}
