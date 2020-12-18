<?php

if (!function_exists('fuwpnags_wp_remove_update_nag')) {
    function fuwpnags_wp_remove_update_nag()
    {
        remove_action('admin_notices', 'update_nag', 3);
    }
}

add_action('admin_init', 'fuwpnags_wp_remove_update_nag');
