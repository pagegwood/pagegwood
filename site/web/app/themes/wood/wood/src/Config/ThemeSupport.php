<?php

namespace Wood\Config;

class ThemeSupport
{
    public static function register()
    {
        add_theme_support('post-formats');
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
        add_filter( 'upload_mimes', [get_called_class(), 'addSvg']);
    }

    public static function addSvg()
    {
    	$mimes['svg'] = 'image/svg+xml';
			// return the modified array
			return $mimes;
    }
}
