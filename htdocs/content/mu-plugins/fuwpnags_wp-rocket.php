<?php

if (!function_exists('fuwpnags_wprocket_remove_imagify_notice')) {
    function fuwpnags_wprocket_remove_imagify_notice()
    {
        if (function_exists('rocket_imagify_notice')) {
            remove_action('admin_notices', 'rocket_imagify_notice');
        }
    }
}

add_action('admin_init', 'fuwpnags_wprocket_remove_imagify_notice');
