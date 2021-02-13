<?php

namespace App\Option;

use WPFluent\Option\Base as BaseOption;

use App\Option\Traits\FooterTrackingCodes;
use App\Option\Traits\HeaderTrackingCodes;

class Site extends BaseOption
{
    use FooterTrackingCodes,
        HeaderTrackingCodes;

    public static function registerSettings()
    {
        if (function_exists('acf_add_options_sub_page')) {
            acf_add_options_sub_page([
                'capability' => 'manage_options',
                'menu_slug' => 'wood_site_settings',
                'page_title' => 'Site Options',
                'parent_slug' => 'options-general.php',
            ]);
        }
    }

}
