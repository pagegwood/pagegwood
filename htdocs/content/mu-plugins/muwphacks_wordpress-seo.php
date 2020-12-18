<?php

if (!function_exists('muwphacks_wpseo_set_metabox_priority')) {
    function muwphacks_wpseo_set_metabox_priority()
    {
        return 'low';
    }
}

add_filter('wpseo_metabox_prio', 'muwphacks_wpseo_set_metabox_priority');
