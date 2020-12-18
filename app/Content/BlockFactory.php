<?php

namespace App\Content;

class BlockFactory
{
    public static function make($class, $properties)
    {
        $class =  new $class($properties);

        return $class;
    }

    public function basicContent($properties)
    {
        return static::make('App\Content\Blocks\BasicContent', $properties);
    }

    public function code($properties)
    {
        return static::make('App\Content\Blocks\Code', $properties);
    }

    public function hero($properties)
    {
        return static::make('App\Content\Blocks\Hero', $properties);
    }

    public function posts($properties)
    {
        return static::make('App\Content\Blocks\Posts', $properties);
    }
}
